<?php
session_start();
include('../../includes/config.php');
error_reporting(0);
?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">


	<title>User | Detail-veto </title>



</head>

<body>

	<?php
	$id = intval($_GET['vhid']);

	$sql = "SELECT * from veterinaire where id=:vhid ";
	$query = $dbh->prepare($sql);
	$query->bindParam(':vhid', $id, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	$cnt = 1;
	if ($query->rowCount() > 0) {
		foreach ($results as $result) {

	?>

			<div><img src="../ressources/images/<?php echo htmlentities($result->img); ?>" alt="image"></div>
			<p>nom</p>
			<?php echo htmlentities($result->nom); ?>
			<p>Prenom</p>
			<?php echo htmlentities($result->prenom); ?>
			<p>Adresse Mail</p>
			<?php echo htmlentities($result->mail); ?>
			<p>Description</p>
			<?php echo htmlentities($result->description); ?>
			<p>Numero de Telephone</p>
			<?php echo htmlentities($result->num_telephone); ?>
			<p>Adresse</p>
			<?php echo htmlentities($result->adresse); ?>











</body>

</html>
<?php }
	} ?>