<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>
 <!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	
	
	<title>User</title>

  

</head>

<body>
   
<?php 
$id=intval($_GET['vhid']);

$sql = "SELECT * from animal ,utilisateur where animal.id=:vhid and animal.id_user=utilisateur.id";
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

 <p>nom</p>
 <?php echo htmlentities($result->nom);?>
 <p>Prenom</p>
<?php echo htmlentities($result->prenom);?>
 <p>adresse Mail</p>
<?php echo htmlentities($result->mail);?>
 <p>Numero de Telephone</p>
<?php echo htmlentities($result->num_telephone);?>



</body>
</html>
<?php }}?>