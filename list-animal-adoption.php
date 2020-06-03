<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
</head>
<?php 
$sql = "SELECT id from animal where famille='adoption'";
$query = $dbh -> prepare($sql);
$query->bindParam(':vhid',$vhid, PDO::PARAM_STR);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=$query->rowCount();
?>
</div>
</div>

<?php $sql = "SELECT *  from animal where famille='adoption' ";
$query = $dbh -> prepare($sql);
$query->execute();
$results=$query->fetchAll(PDO::FETCH_OBJ);
$cnt=1;
if($query->rowCount() > 0)
{
foreach($results as $result)
{  ?>
<ul>
	<li >
	<div> <a href="animal-detail.php?vhid=<?php echo htmlentities($result->id);?>"><img src="img/animal/<?php echo htmlentities($result->img);?>" alt="image"></a> </div>
	<div> <a href="animal-detail.php?vhid=<?php echo htmlentities($result->id);?>"><?php echo htmlentities($result->nome);?></a>
	<p><?php echo htmlentities($result->description);?></p>
		<p><?php echo htmlentities($result->city);?></p>
	</div>
	</li>
</ul>
<?php }} ?>