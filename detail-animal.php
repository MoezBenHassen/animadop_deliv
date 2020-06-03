<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
 <!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	
	
	<title>User  |  Detail-animal </title>

  

</head>

<body>
   
<?php 
$id=intval($_GET['vhid']);

$sql = "SELECT * from animal where id=:vhid ";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$id, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  

?>  

 <div><img src="img/animal/<?php echo htmlentities($result->img);?>"   alt="image" ></div>
 <p>nom</p>
<?php echo htmlentities($result->nome);?>
 <p>Sexe</p>
<?php echo htmlentities($result->sexe);?>
 <p>Race</p>
<?php echo htmlentities($result->race);?>
<p>Description</p>
<?php echo htmlentities($result->description);?>
 <p>Lieu</p>
<?php echo htmlentities($result->city);?>
 <a href="user.php?vhid=<?php echo htmlentities($result->id);?>">Contacter</a>










</body>
</html>
<?php }}?>
