<?php
session_start();
include('includes/config.php');
if (isset($_POST['login'])) {
	$email = $_POST['username'];
	$password = md5($_POST['password']);
	$sql = "SELECT * FROM administrateur WHERE username=:username and password=:password";
	$query = $dbh->prepare($sql);
	$query->bindParam(':username', $email, PDO::PARAM_STR);
	$query->bindParam(':password', $password, PDO::PARAM_STR);
	$query->execute();
	$results = $query->fetchAll(PDO::FETCH_OBJ);
	if ($query->rowCount() > 0) {
		$_SESSION['alogin'] = $_POST['username'];
		echo "<script type='text/javascript'> document.location = 'dashboard.php'; </script>";
	} else {

		echo "<script>alert('Invalid Details');</script>";
	}
}

?>
<!doctype html>
<html>

<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<meta name="description" content="">
	<meta name="author" content="">

	<link rel="stylesheet" href="../adminmag/css/font-awesome.min.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap.min.css">
	<link rel="stylesheet" href="../adminmag/css/dataTables.bootstrap.min.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap-social.css">
	<link rel="stylesheet" href="../adminmag/css/bootstrap-select.css">
	<link rel="stylesheet" href="../adminmag/css/fileinput.min.css">
	<link rel="stylesheet" href="../adminmag/css/awesome-bootstrap-checkbox.css">
	<link rel="stylesheet" href="../adminmag/css/style.css">

	<title>Admin Login</title>

	<style>
		body {
			height: 100%;
			width: 100%;
			margin: 0;
			background-image: url("bg.png");
			background-size: cover;
			background-repeat: no-repeat;
			background-attachment: fixed;
			overflow-x: hidden;
		}

		h1 {

			text-align: center;
			color: #169a8c;
			font-weight: bold;
			margin-bottom: 20px;
		}

		.text-color {
			color: #169a8c;
		}

		.button_color {
			background-color: #169a8c;
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

			margin-top: 170px;
		}

		#logo a img  {
		
			margin: 0;
			padding: 0;
			width: 200px;
			height: 150px;
		}
	</style>

</head>

<body>

	<div class="login-page ">
		<div class="form-content">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-md-offset-3">
						<h1 id="singIn" class="">Sign in</h1>
						<div class="well row pt-2x pb-3x bk-light login_form">
							<div class="col-md-8 col-md-offset-2 ">
								<form method="post">

									<label for="" class="text-uppercase text-sm text-color">Your Username </label>
									<input type="text" placeholder="Username" name="username" class="form-control mb">

									<label for="" class="text-uppercase text-sm text-color">Password</label>
									<input type="password" placeholder="Password" name="password" class="form-control mb">

									<button class="btn btn-primary btn-block button_color" name="login" type="submit">LOGIN</button>

								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="logo">
			<a href="../../frontend/pages/home.html">
				<img id="img2" src="logo-animadop.png" alt="animadop.html">
			</a>
		</div>
	</div>

	<!-- Loading Scripts -->
	<script src="../adminmag/js/jquery.min.js"></script>
	<script src="../adminmag/js/bootstrap-select.min.js"></script>
	<script src="../adminmag/js/bootstrap.min.js"></script>
	<script src="../adminmag/js/jquery.dataTables.min.js"></script>
	<script src="../adminmag/js/dataTables.bootstrap.min.js"></script>
	<script src="../adminmag/js/Chart.min.js"></script>
	<script src="../adminmag/js/fileinput.js"></script>
	<script src="../adminmag/js/chartData.js"></script>
	<script src="../adminmag/js/main.js"></script>


</body>

</html>