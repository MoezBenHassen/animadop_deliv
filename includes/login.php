<?php
session_start();
include('config.php');
if (isset($_POST['login'])) {
	$mail = $_POST['mail'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM utilisateur WHERE mail=:mail and password=:password";
	$query = $dbh->prepare($sql);
	$query->bindParam(':mail', $mail, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$_SESSION['alogin'] = $_POST['mail'];
		echo "<script type='text/javascript'> document.location = '../frontend/pages/homeUser.html' </script>";
	} else {

		echo "<script>alert('Invalid Details');</script>";
	}
}

?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">

	<link rel="stylesheet" href="../adminmag/css/font-awesome.min.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap.min.css">
	<link rel="stylesheet" href="../adminmag/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap-social.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap-select.css">
	<link rel="stylesheet" href="../adminmag/css/fileinput.min.css">
	<link rel="stylesheet" href="../adminmag/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="../adminmag/css/style.css">
	<style>
		body {
			height: 100%;
			width: 100%;
			margin: 0;
			background-image: url("bg_pink.png");
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
			overflow-x: hidden;
		}

		h1 {

			text-align: center;
			color: #d82b6d;
			font-weight: bold;
			margin-bottom: 20px;
		}

		.text-color {
			color: #d82b6d;
		}

		.button_color {
			background-color: #d82b6d;
		}

		.button_color:hover {
			background-color: #138a7e;
		}

		.login_form {
			-webkit-box-shadow: 0px 3px 54px -11px rgba(0, 0, 0, 0.75);
			-moz-box-shadow: 0px 3px 54px -11px rgba(0, 0, 0, 0.75);
			box-shadow: 0px 3px 54px -11px rgba(0, 0, 0, 0.75);
			border-radius: 40px;
		}

		#logo {
			display: flex;
			justify-content: flex-end;
			align-items: flex-end;
			width: 100vw;

			margin-top: 390px;
		}

		#logo a img {

			margin: 0;
			padding: 0;
			width: 200px;
			height: 150px;
		}
		a {
			margin-left: 140px;
			margin-top: 50px;
			text-align: center;
		}
	</style>
</head>

<body>


	<div class="login-page ">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 id="singIn" class="">Sign in User</h1>
						<div class="well row pt-2x pb-3x bk-light login_form">
							<div class="col-md-8 col-md-offset-2 ">
								<form method="post">
									<label for="" class=" text-uppercase text-sm text-color" >Your Mail </label>
									<input type="text" placeholder="Email" name="mail" class="form-control mb">
									<label for="" class="text-uppercase text-sm text-color">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">
									<button name="login" type="submit" class="btn btn-primary btn-block button_color">LOGIN</button>
								</form>
								<a href="register.php">Sign up ?</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div id="logo">
			<a href="">
				<img id="img2" src="logo-animadop.png" alt="animadop.html">
			</a>

		</div>

</body>

</html>