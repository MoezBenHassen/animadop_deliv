<?php
session_start();
error_reporting(0);
include('includes/config.php');
if(strlen($_SESSION['alogin'])==0)
	{	
header('location:includes/login.php');
}
else{

if(isset($_POST['submit']))
  {
    $name=$_POST['nome'];
    $race=$_POST['race'];
    $sexe=$_POST['sexe'];
    $description=$_POST['descr'];
    $img=$_FILES["img"]["name"];	
	$img1=$_FILES["img1"]["name"];	
	$img2=$_FILES["img2"]["name"];	
	$img3=$_FILES["img3"]["name"];	
	$img4=$_FILES["img4"]["name"];	
	$img5=$_FILES["img5"]["name"];	
	$img6=$_FILES["img6"]["name"];
	$img7=$_FILES["img7"]["name"];
	$img8=$_FILES["img8"]["name"];
	$img9=$_FILES["img9"]["name"];
	move_uploaded_file($_FILES["img"]["tmp_name"],"img/articles/".$_FILES["img"]["name"]);
	move_uploaded_file($_FILES["img1"]["tmp_name"],"img/articles/".$_FILES["img1"]["name"]);
	move_uploaded_file($_FILES["img2"]["tmp_name"],"img/articles/".$_FILES["img2"]["name"]);
	move_uploaded_file($_FILES["img3"]["tmp_name"],"img/articles/".$_FILES["img3"]["name"]);
	move_uploaded_file($_FILES["img4"]["tmp_name"],"img/articles/".$_FILES["img4"]["name"]);
	move_uploaded_file($_FILES["img5"]["tmp_name"],"img/articles/".$_FILES["img5"]["name"]);
	move_uploaded_file($_FILES["img6"]["tmp_name"],"img/articles/".$_FILES["img6"]["name"]);
	move_uploaded_file($_FILES["img7"]["tmp_name"],"img/articles/".$_FILES["img7"]["name"]);
	move_uploaded_file($_FILES["img8"]["tmp_name"],"img/articles/".$_FILES["img8"]["name"]);
    move_uploaded_file($_FILES["img9"]["tmp_name"],"img/articles/".$_FILES["img9"]["name"]);

$sql1="SELECT id from utilisateur where id=animal.id_user ";
$query1 = $dbh->prepare($sql1);
$id=$_POST['id'];
$query1->bindParam(':id',$id,PDO::PARAM_STR);
$sql="INSERT INTO animal(nome,race,sexe,img,descr,img1,img2,img3,img4,img5,img6,img7,img8,img9,id_user) VALUES(:nome ,:race,:sexe,:img,:descr,:img1,:img2,:img3,:img4,:img5,:img6,:img7,:img8,:img9,:id)";
$query = $dbh->prepare($sql);
$query->bindParam(':nome',$name,PDO::PARAM_STR);
$query->bindParam(':race',$race,PDO::PARAM_STR);
$query->bindParam(':sexe',$sexe,PDO::PARAM_STR);
$query->bindParam(':descr',$description,PDO::PARAM_STR);
$query->bindParam(':img',$img,PDO::PARAM_STR);
$query->bindParam(':img1',$img1,PDO::PARAM_STR);
$query->bindParam(':img2',$img2,PDO::PARAM_STR);
$query->bindParam(':img3',$img3,PDO::PARAM_STR);
$query->bindParam(':img4',$img4,PDO::PARAM_STR);
$query->bindParam(':img5',$img5,PDO::PARAM_STR);
$query->bindParam(':img6',$img6,PDO::PARAM_STR);
$query->bindParam(':img7',$img7,PDO::PARAM_STR);
$query->bindParam(':img8',$img8,PDO::PARAM_STR);
$query->bindParam(':img9',$img9,PDO::PARAM_STR);


$query->execute();
$lastInsertId = $dbh->lastInsertId();
if($lastInsertId)
{
$msg="Article added successfully";
}
else 
{
$error="Something went wrong. Please try again";
}

}


	?>
<!doctype html>
<html >

<head>
	<meta charset="UTF-8">

	

</head>

<body>
	<?php include('includes/header.php');?>
	
	<?php include('includes/leftbar.php');?>
		
					
						<h2 >Ajouter animal</h2>

					
									<div >Basic Info</div>
<?php if($error){?><div ><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } 
				else if($msg){?><div ><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php }?>

<form method="post"  enctype="multipart/form-data">

<label >Nom</label>

<input type="text" name="name"  required>

<label >Race</label>

<input type="text"  name="race"  required>

<label >sexe</label>

<input type="text" name="sexe"  required>


<label >description</label>

<textarea  name="descr" rows="3" ></textarea>




<h4><b>Upload Images</b></h4>
<div >Image 1<input type="file" name="img" required></div>				
<div >Image 2<input type="file" name="img1" ></div>		
<div >Image 3<input type="file" name="img2" ></div>		
<div >Image 4<input type="file" name="img3" ></div>
<div >Image 5<input type="file" name="img4" ></div>				
<div >Image 6<input type="file" name="img5" ></div>		
<div >Image 7<input type="file" name="img6"></div>		
<div >Image 8<input type="file" name="img7" ></div>	
<div >Image 9<input type="file" name="img8" ></div>	
<div >Image 10<input type="file" name="img9" ></div>								
	<button type="reset">Cancel</button>
	<button name="submit" type="submit">Save changes</button>
</form>
</body>
</html>
<?php }?>