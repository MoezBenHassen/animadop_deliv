<?php 
session_start();
include('includes/config.php');
error_reporting(0);
?>

<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">



<?php $sql = "SELECT *  from perdu ";
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
                <img src="img/animal/<?php echo htmlentities($result->img);?>" alt="image">
               <?php echo htmlentities($result->lieu);?>
               <?php echo htmlentities($result->date);?>
                <?php echo htmlentities($result->descr);?>
                  
                </div>
              </li>
</ul>
<?php }} ?>