<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:index.php');
}
else{


 ?>
 <!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	
	
	<title>User  |Liste Animaux </title>

  

</head>

<body>
   
    <h2>Liste Animaux errant </h2>
	<table >
        <thead>
			<tr>
				<th>#</th>
			<th>description</th>
			<th>date</th>
            <th>lieu</th>
           	
			<th>Action</th>
				
			</tr>
		</thead>
		<tfoot>
			<tr>
			<th>#</th>
			<th>description</th>
			<th>date</th>
            <th>lieu</th>
           	
			<th>Action</th>
				
			
		</tfoot>
	    <tbody>

<?php $sql = "SELECT errant.id,errant.description,errant.date,errant.blasa,errant.img from errant ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{?>	
			<tr>
				<td><?php echo htmlentities($result->img);?></td>
				<td><?php echo htmlentities($result->id);?></td>
				<td><?php echo htmlentities($result->description);?></td>
	            <td><?php echo htmlentities($result->date);?></td>
                <td><?php echo htmlentities($result->blasa);?></td>
                
	            <td><button>Contacter</button></td>
											
		       
			</tr>
			<?php $cnt=$cnt+1; }} ?>
										
		</tbody>
	</table>
<a href="ajouter-animal-errant.php">Ajouter un animal errant</a>

</body>
</html>
<?php }?>