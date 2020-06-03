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
	
	
	<title>User  |Liste Article </title>

  

</head>

<body>
   
    <h2>Liste Article </h2>
	<table >
        <thead>
			<tr>
				<th>#</th>
				<th>Nom</th>
				<th>Prix </th>
                <th>Referance</th>
                <th>Categorie</th>
				
				<th>Action</th>
				
			</tr>
		</thead>
		<tfoot>
			<tr>
			<th>#</th>
			<th>Nom</th>
			<th>Prix </th>
            <th>Referance</th>
            <th>Categorie</th>
				
			<th>Action</th>
			</tr>
			
		</tfoot>
	    <tbody>

<?php $sql = "SELECT * from article";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{?>	
			<tr>
				<td><?php echo htmlentities($result->img);?><img src="img/<?php echo htmlentities($result->img);?>"  alt="Image" /></td>
				<td><?php echo htmlentities($result->name);?></td>
	            <td><?php echo htmlentities($result->prix);?></td>
                <td><?php echo htmlentities($result->referance);?></td>
                <td><?php echo htmlentities($result->categorie);?></td>
	            
	            <td><a href="detail-animal.php?vhid=<?php echo $result->id;?>" class="btn">Passer commande</a></td>
											
		       
			</tr>
			<?php $cnt=$cnt+1; }} ?>
										
		</tbody>
	</table>


</body>
</html>
<?php }?>