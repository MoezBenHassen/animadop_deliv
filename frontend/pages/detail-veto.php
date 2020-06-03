<?php
session_start();
include('../../includes/config.php');
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
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
    <link rel="stylesheet" href="../styles/style_headerSearchBar.css">
    <link rel="stylesheet" href="../styles/style.css">
    <link rel="stylesheet" href="../styles/animal_profile.css">

    <!--<link rel="stylesheet" href="../styles/style_waves.css">-->
    <link rel="stylesheet" href="../styles/css_acceuil.css">
    <link rel="stylesheet" href="../styles/style_responsive_commun.css">

    <style>
        body {
            height: 100%;
            margin: 0;
            background-image: url("../ressources/images/bg_pink.png");
            background-size: cover;
            background-repeat: no-repeat;
            /*overflow-x: hidden;*/
        }

        .cont {

            margin: 0;
        }

        #bg_profile {

            display: flex;
            justify-content: space-between;
            margin-top: 50px;
        }

        #bg_container {
            display: flex;
            justify-content: space-between;
            width: 100%;
        }

        #conteneur img {
            border-radius: 40px;
            transition: transform 1s ease;
        }

        #conteneur img:hover {
            transform: scale(1.5);
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
                <img src="../ressources/images/logo_pink.png" alt="logo-animadop" id="logo">
                <img src="../ressources/images/logoWriting_pink.png" alt="logo" id="logo_writing">
            </div>

            <!-- HEADER MENU -->
            <div id="header_menu" data-aos="fade-down">
                <ul>
                    <li>
                        <a class="header_menu_item " href="homeUser.html">Acceuil</a>
                    </li>
                    <li>
                        <a class="header_menu_item" href="infos.html">Infos</a>
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
        <section id="main_body">
            <aside id="aside_left" data-aos="fade-up-right">
                <div id="aside_menu" class="topnav ">
                    <div class="menu-toggler">
                        <div class="bar half start"></div>
                        <div class="bar"></div>
                        <div class="bar half end"></div>
                    </div>
                    <ul id="list" class="hiddenUl">
                        <li class="box-e">
                            <img id="aside_menu_adoption" class="aside_menu_img_icon" src="../ressources/images/icons/adoption_pink.png" alt="Adoption icon">
                            <a class="custom-underline" href="results_adoption.php">Adoption</a>
                        </li>
                        <li class="box-e">
                            <img id="aside_menu_lost" class="aside_menu_img_icon" src="../ressources/images/icons/paw_search_pink.png" alt="lost animal icon">
                            <a class="custom-underline" href="results_perdu.php">Animaux perdus</a>
                        </li>
                        <li class="box-e">
                            <img id="aside_menu_errant_animals" class="aside_menu_img_icon" src="../ressources/images/icons/paw_plus_pink.png" alt="errant animals icon">
                            <a class="custom-underline" href="results_errant.php">Animaux errant</a>
                        </li>
                        <li class="box-e">
                            <img id="aside_menu_vet" class="aside_menu_img_icon" src="../ressources/images/icons/vet_pink.png" alt="Vet icon">
                            <a class="custom-underline" href="results_veto.php">Nos vétérinaires</a>
                        </li>
                        <li class="box-e">
                            <img id="aside_menu_breeding" class="aside_menu_img_icon" src="../ressources/images/icons/heart_paw_pink.png" alt="breeding icon">
                            <a class="custom-underline" href="results_accouplement.php">Accouplement</a>
                        </li>
                        <li class="box-e">
                            <img id="aside_menu_shop" class="aside_menu_img_icon" src="../ressources/images/icons/shop_pink.png" alt="shop icon">
                            <a class="custom-underline" href="results_magasin.php">Magasin</a>
                        </li>

                    </ul>
                </div>
            </aside>

            <div id="bg_profile">
                <div id="bg_container">
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
                            <div id="conteneur">
                                <img src="../ressources/images/<?php echo htmlentities($result->img); ?>" alt="image">
                            </div>

                            <div class="cont" style="position: relative;">
                                <div class="box-e">
                                    <h3 class="titre_bio">Nom</h3>
                                </div>
                                <?php echo htmlentities($result->nom); ?>
                                </p>
                                <div class="box-e">
                                    <h3 class="titre_bio">Prenom</h3>
                                </div>
                                <?php echo htmlentities($result->prenom); ?>

                                <div class="box-e">
                                    <h3 class="titre_bio">Mail</h3>
                                </div>
                                <?php echo htmlentities($result->mail); ?>
                                <div class="box-e">
                                    <h3 class="titre_bio">Description</h3>
                                </div>
                                <?php echo htmlentities($result->description); ?>
                                <div class="box-e">
                                    <h3 class="titre_bio">Numero de Tél</h3>
                                </div>
                                <?php echo htmlentities($result->num_telephone); ?>
                                <div class="box-e">
                                    <h3 class="titre_bio">Adresse</h3>
                                </div>
                            </div>
                            <?php echo htmlentities($result->adresse); ?>
                            <img id="dog_icon" src="../ressources/images/icons/dog_icon.png" alt="dog icon">

                    <?php }
                    } ?>



                </div>



            </div>

        </section>

        <section id="section2" data-aos="fade-in">
            <h3>Abonnez-vous a notre Newsletter !</h3>
            <form onsubmit="verifMail()" action="" method="get">
                <div id="input_div">
                    <input type="text" placeholder="Tapez votre e-mail @" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Tapez votre e-mail @'">
                    <button type="submit" id="submit_button"> <span>&rarr;</button>
                </div>
            </form>
        </section>
        <section id="section3_donate">
            <p data-aos="zoom-out">"On fait Toujours de notre mieux pour aider les animaux en détresse, <br>Si vous voulez faire partie de notre cause,<br> votre aide nous est precieuse,
                <br> faite don! ;) "</p>
            <a id="donate_link" href="#" data-aos="fade-up">Donate</a>
        </section>
        <footer style="border: none">

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
    <script src="../scripts/script_headerSearchBar.js"></script>
    <script src="../scripts/script_menu.js"></script>

</body>

</html>