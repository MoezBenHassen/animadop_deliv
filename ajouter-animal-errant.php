<?php
session_start();
error_reporting(0);
include('includes/config.php');
if (strlen($_SESSION['alogin']) == 0) {
    header('location:includes/login.php');
} else {

    if (isset($_POST['submit'])) {
        $description = $_POST['description'];

        $date = $_POST['date'];

        $blasa = $_POST['blasa'];

        $img = $_FILES["img"]["name"];

        move_uploaded_file($_FILES["img"]["tmp_name"], "img/animal/" . $_FILES["img"]["name"]);


        //$sql1="SELECT id from utilisateur where id=animal.id_user ";
        //$query1 = $dbh->prepare($sql1);
        //$id=$_POST['id'];
        //$query1->bindParam(':id',$id,PDO::PARAM_STR);
        $sql = "INSERT INTO errant(description,date,blasa,img) VALUES(:description ,:date,:blasa,:img)";
        $query = $dbh->prepare($sql);
        $query->bindParam(':description', $description, PDO::PARAM_STR);
        $query->bindParam(':date', $date, PDO::PARAM_STR);
        $query->bindParam(':blasa', $blasa, PDO::PARAM_STR);
        $query->bindParam(':img', $img, PDO::PARAM_STR);



        $query->execute();
        $lastInsertId = $dbh->lastInsertId();
        if ($lastInsertId) {
            $msg = "Animal added successfully";
        } else {
            $error = "Something went wrong. Please try again";
        }
    }


?>
    <!doctype html>
    <html>

    <head>
        <meta charset="UTF-8">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ajout_errant</title>
        <!--BOOTSTRAP CDN-->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <link rel="stylesheet" href="https:/7/cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

        <!--JQUERY CDN-->
        <script src="https://code.jquery.com/jquery-3.5.0.min.js" integrity="sha256-xNzN2a4ltkB44Mc/Jz3pT4iU1cmeR0FkXs4pru/JxaQ=" crossorigin="anonymous"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-1.11.0.min.js"></script>
        <script type="text/javascript" src="//code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

        <!--SLICK JS CDN-->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick-theme.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.9.0/slick.min.js"></script>

        <!--AOS JS CDN-->
        <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

        <!--FONT AWSOME CDN-->
        <script src="https://kit.fontawesome.com/4af995e81b.js"></script>
        <script src="https://kit.fontawesome.com/yourcode.js"></script>

        <!--CUSTOM CSS -->
        <link rel="stylesheet" href="frontend/styles/style_headerSearchBar.css">
        <link rel="stylesheet" href="frontend/styles/style.css">

        <!--<link rel="stylesheet" href="../styles/style_waves.css">-->
        <link rel="stylesheet" href="frontend/styles/style_responsive_commun.css">
        <link rel="stylesheet" href="frontend/styles/css_adoption_result.css">
        <link rel="stylesheet" href="frontend/styles/css_acceuil.css">
        <link rel="stylesheet" href="frontend/styles/ajout_adoption.css">

        <style>
            body {
                height: 100%;
                margin: 0;
                background-image: url("frontend/ressources/images/bg_pink.png");
                background-size: cover;
                background-repeat: no-repeat;
                /*overflow-x: hidden;*/
            }
        </style>

        <script type="text/javascript">
            window.onload = function() {
                var chart = new CanvasJS.Chart("chartContainer", {
                    title: {
                        text: "% Adoption"
                    },
                    data: [{
                        type: "doughnut",
                        dataPoints: [{
                                y: 53.37,
                                indexLabel: "Android"
                            },
                            {
                                y: 35.0,
                                indexLabel: "Apple iOS"
                            },
                            {
                                y: 7,
                                indexLabel: "Blackberry"
                            },
                            {
                                y: 2,
                                indexLabel: "Windows Phone"
                            },
                            {
                                y: 5,
                                indexLabel: "Others"
                            }
                        ]
                    }]
                });

                chart.render();
            }
        </script>
        <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

    </head>

    <body>

        <header>
            <!--HEADER-->
            <div id="main_header_div" data-aos="zoom-out" data-aos-delay="300">

                <!-- HEADER LOGO -->
                <div id="header_logo" data-aos="fade-down-right">
                    <img src="frontend/ressources/images/logo_pink.png" alt="logo-animadop" id="logo">
                    <img src="frontend/ressources/images/logoWriting_pink.png" alt="logo" id="logo_writing">
                </div>

                <!-- HEADER MENU -->
                <div id="header_menu" data-aos="fade-down">
                    <ul>
                        <li>
                            <a class="header_menu_item " href="frontend/pages/home.html">Acceuil</a>
                        </li>
                        <li>
                            <a class="header_menu_item" href="frontend/pages/infos.html">Infos</a>
                        </li>
                        <li>
                            <a class="header_menu_item" href="../../includes/login.php">Logout &nbsp;<i class="fas fa-power-off" style="font-size:15px;"></i> </a>
                        </li>
                    </ul>
                </div>

                <!-- SEARCH BAR -->
                <div id="header_search_div" data-aos="fade-down-left">
                    <div class="cntr">
                        <div class="cntr-innr">
                            <label class="search" for="inpt_search">
                                <input id="inpt_search" type="text" />
                            </label>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <section>
            <section id="main_body1">
                <aside id="aside_left" data-aos="fade-up-right">
                    <div id="aside_menu" class="topnav ">

                        <div class="menu-toggler">
                            <div class="bar half start"></div>
                            <div class="bar"></div>
                            <div class="bar half end"></div>
                        </div>
                        <ul id="list" class="hiddenUl">
                            <li class="box-e">
                                <img id="aside_menu_adoption" class="aside_menu_img_icon" src="frontend/ressources/images/icons/adoption_pink.png" alt="Adoption icon">
                                <a class="custom-underline" href="frontend/pages/results_adoption.php">Adoption</a>
                            </li>
                            <li class="box-e">
                                <img id="aside_menu_lost" class="aside_menu_img_icon" src="frontend/ressources/images/icons/paw_search_pink.png" alt="lost animal icon">
                                <a class="custom-underline" href="frontend/pages/results_perdu.php">Animaux perdus</a>
                            </li>
                            <li class="box-e">
                                <img id="aside_menu_errant_animals" class="aside_menu_img_icon" src="frontend/ressources/images/icons/paw_plus_pink.png" alt="errant animals icon">
                                <a class="custom-underline" href="frontend/pages/results_errant.php">Animaux errant</a>
                            </li>
                            <li class="box-e">
                                <img id="aside_menu_vet" class="aside_menu_img_icon" src="frontend/ressources/images/icons/vet_pink.png" alt="Vet icon">
                                <a class="custom-underline" href="frontend/pages/results_veto.pp">Nos vétérinaires</a>
                            </li>
                            <li class="box-e">
                                <img id="aside_menu_breeding" class="aside_menu_img_icon" src="frontend/ressources/images/icons/heart_paw_pink.png" alt="breeding icon">
                                <a class="custom-underline" href="frontend/pages/results_accouplement.php">Accouplement</a>
                            </li>
                            <li class="box-e">
                                <img id="aside_menu_shop" class="aside_menu_img_icon" src="frontend/ressources/images/icons/shop_pink.png" alt="shop icon">
                                <a class="custom-underline" href="frontend/pages/results_magasin.php">Magasin</a>
                            </li>

                        </ul>
                    </div>

                </aside>

                <?php if ($error) { ?><div><strong>ERROR</strong>:<?php echo htmlentities($error); ?> </div><?php } else if ($msg) { ?><div><strong>SUCCESS</strong>:<?php echo htmlentities($msg); ?> </div><?php } ?>

                <div id="list_result" data-aos="fade-down">
                    <h2 id="titre_ajout">Accouplement animal</h2>
                    <img src="frontend/ressources/images/x3.png" alt="logo-animadop" id="f1">
                    <form method="post" enctype="multipart/form-data" action="ajouter-animal-errant.php">

                        <div id="formContainer">

                            <div style="display: flex;flex-direction: column; margin: 0px 40px 0px 40px;">
                                <div class="formItem">


                                    <input type="date" name="date" required>

                                </div>
                                <div class="formItem">

                                    <input type="text" name="blasa" placeholder="Lieu" required>


                                </div>
                                <div class="formItem">


                                    <textarea name="description" placeholder="description" rows="3"></textarea>

                                </div>


                                <h4><b>Upload Images</b></h4>
                                <div>Image <input type="file" name="img" required></div>


                                <div class="formItem"><button type="reset" class="btn btn-primary  button_color">Cancel</button>
                                    <button name="submit" class="btn btn-primary  button_color" type="submit">Save changes</button></div>
                    </form>

                </div>


                </div>
            </section>
            <footer style="border: none;">

                </div>
                <h5>Contact</h5>
                <div id="footer_socials">
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                </div>
                <div id="footer_contact">
                    <p> <em>E-mail :</em> <i> animadop@gmail.com </i></p>
                    <p> <em>Tel : </em> <i> +216 65 849 878</i></p>
                </div>
                </div>
            </footer>
        </section>

        <script>
            /*SLIDESHOW SCRIPT WTIH SLICK JS */
            $(document).ready(() => {
                $('.slick').slick({
                    autoplay: true,
                    autoplaySpeed: 2000,
                    speed: 1000,
                    infinite: true,
                    fade: true,
                    dots: true,
                });
            });
        </script>
        <!-- SCRIPTS -->
        <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
        <script src='https://cdnjs.cloudflare.com/ajax/libs/zepto/1.0/zepto.min.js'></script>
        <script src="frontend/scripts/script_headerSearchBar.js"></script>
        <script src="frontend/scripts/script_menu.js"></script>
    </body>

    </html>
<?php } ?>