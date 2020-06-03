<head>


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
<?php
//error_reporting(0);
include("config.php");
if (isset($_POST['signup'])) {
    $nom = $_POST['nom'];
    $mail = $_POST['mail'];
    $prenom = $_POST['prenom'];
    $num_telephone = $_POST['num_telephone'];
    $password = md5($_POST['password']);
    $adresse = $_POST['adresse'];
    $sql = "INSERT INTO  utilisateur(nom,prenom,mail,num_telephone,password,adresse) VALUES(:nom,:prenom,:mail,:num_telephone,:password,:adresse)";
    $query = $dbh->prepare($sql);
    $query->bindParam(':nom', $nom, PDO::PARAM_STR);
    $query->bindParam(':prenom', $prenom, PDO::PARAM_STR);
    $query->bindParam(':mail', $mail, PDO::PARAM_STR);
    $query->bindParam(':num_telephone', $num_telephone, PDO::PARAM_STR);
    $query->bindParam(':password', $password, PDO::PARAM_STR);
    $query->bindParam(':adresse', $adresse, PDO::PARAM_STR);
    $query->execute();
    $lastInsertId = $dbh->lastInsertId();
    if ($lastInsertId) {
        echo "<script>alert('Registration successfull. Now you can login');</script>";
    } else {
        echo "<script>alert('Something went wrong. Please try again');</script>";
    }
}


?>

<script type="text/javascript">
    function checkAvailability() {
        $("#loaderIcon").show();
        jQuery.ajax({
            url: "check_availability.php",
            data: 'mail=' + $("#mail").val(),
            type: "POST",
            success: function(data) {
                $("#user-availability-status").html(data);
                $("#loaderIcon").hide();
            },
            error: function() {}
        });
    }
</script>
<script src="jquery-3.1.1.min.js" type="text/javascript"></script>
<script type="text/javascript">
    function valid() {
        if (document.signup.password.value != document.signup.confirmpassword.value) {
            alert("Password and Confirm Password Field do not match  !!");
            document.signup.confirmpassword.focus();
            return false;
        }
        return true;
    }
</script>

<script>
    $(document).ready(function() {
        $("#mail").keyup(function() {

            var mail = $(this).val().trim();

            if (mail != '') {



                $.ajax({
                    url: 'ajaxfile.php',
                    type: 'post',
                    data: {
                        mail: mail
                    },
                    success: function(response) {

                        $('#user-availability-status').html(response);

                    }
                });
            } else {
                $("#user-availability-status").html("");
            }

        });
    });
</script>

<div class="login-page ">
    <div class="form-content">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <h1 id="singIn" class="">Sign UP User</h1>
                    <div class="well row pt-2x pb-3x bk-light login_form">
                        <div class="col-md-8 col-md-offset-2 ">
                            <form method="post" name="signup" onSubmit="return valid();">

                                <input type="text" name="nom" placeholder="Nom" required="required" class="form-control mb">
                                <input type="text" name="prenom" placeholder="Prenom" required="required" class="form-control mb">
                                <input type="text" name="num_telephone" placeholder="Mobile Number" maxlength="8" required="required" class="form-control mb">
                                <div> <input type="email" name="mail" id="mail" onBlur="checkAvailability()" class="form-control mb" placeholder="Email Address" required="required">
                                    <span id="user-availability-status"></span> </div>
                                <input type="text" name="adresse" placeholder="Adresse" required="required" class="form-control mb">
                                <input type="password" name="password" placeholder="Password" required="required" class="form-control mb">
                                <input type="password" name="confirmpassword" placeholder="Confirm Password" required="required" class="form-control mb">
                                <input type="checkbox" id="terms_agree" required="required" checked="" class="form-control mb">
                                <label for="terms_agree">I Agree with <a href="#">Terms and Conditions</a></label>

                                <input type="submit" value="Sign Up" name="signup" id="submit" class="btn btn-primary btn-block button_color">
                                <a href="login.php">Log in ?</a>
                                <a href="#&">mail, si vous etes veterinaire ;)</a>


                            </form>
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



    <p>Already got an account? <a href="login.php" data-toggle="modal" data-dismiss="modal">Login Here</a></p>