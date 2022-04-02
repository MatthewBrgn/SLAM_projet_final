<?php
require_once '../persistance/dialogueBD.php';

try {
    $undlg = new DialogueBD();
    $menuHotels = $undlg->selectHotel();
    $select_option_ch = $undlg->SelectOptionCh();
    $select_option_s = $undlg->SelectOptionSuite();

}
catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Anoï Resort</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Lora:400,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cabin:400,500,600,700&display=swap" rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/nice-select.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
    <link rel="stylesheet" href="css/result.css" type="text/css">
</head>

<body>
<!-- Offcanvas Menu Section Begin -->
<div class="offcanvas-menu-overlay"></div>
<div class="canvas-open">
    <i class="icon_menu"></i>
</div>
<div class="offcanvas-menu-wrapper">
    <div class="canvas-close">
        <i class="icon_close"></i>
    </div>
    <div class="header-configure-area">
        <a href="#reservation" class="bk-btn">Réserver</a>
    </div>
    <nav class="mainmenu mobile-menu">
        <ul>
            <li class="active"><a href="./index.php">Accueil</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="./hotels.html">Hotels</a>
                <ul class="dropdown">
                    <?php
                    foreach($menuHotels as $ligne) {
                        $hotels = $ligne['nomHotel'];

                        echo "<li><a href=\"./hotels.php#$hotels\">$hotels</a>";
                    }
                    ?>
                </ul>
            </li>
            <li><a href="./contact.html">Contact</a></li>
        </ul>
    </nav>
    <div id="mobile-menu-wrap"></div>
    <div class="top-social">
        <a href="#"><i class="fa fa-facebook"></i></a>
        <a href="#"><i class="fa fa-twitter"></i></a>
        <a href="#"><i class="fa fa-tripadvisor"></i></a>
        <a href="#"><i class="fa fa-instagram"></i></a>
    </div>
    <ul class="top-widget">
        <li><i class="fa fa-phone"></i> 04 24 46 56 72</li>
        <li><i class="fa fa-envelope"></i> info@anoi-resort.com</li>
    </ul>
</div>
<!-- Offcanvas Menu Section End -->

<!-- Header Section Begin -->
<header class="header-section">
    <div class="top-nav">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <ul class="tn-left">
                        <li><i class="fa fa-phone"></i> 04 24 46 56 72</li>
                        <li><i class="fa fa-envelope"></i> info@anoi-resort.com</li>
                    </ul>
                </div>
                <div class="col-lg-6">
                    <div class="tn-right">
                        <div class="top-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                        <a href="#reservation" class="bk-btn">Réserver</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="menu-item">
        <div class="container">
            <div class="row">
                <div class="col-lg-2">
                    <div class="logo">
                        <a href="./index.php">
                            <h3>Anoï Resort</h3>
                        </a>
                    </div>
                </div>
                <div class="col-lg-10">
                    <div class="nav-menu">
                        <nav class="mainmenu">
                            <ul>
                                <li class="active"><a href="./index.php">Accueil</a></li>
                                <li><a href="#services">Services</a></li>
                                <li><a href="./hotels.php">Hotels</a>
                                    <ul class="dropdown">
                                        <?php
                                        foreach($menuHotels as $ligne) {
                                            $hotels = $ligne['nomHotel'];

                                            echo "<li><a href=\"./hotels.php#$hotels\">$hotels</a>";
                                        }
                                        ?>
                                    </ul>
                                </li>
                                <li><a href="./contact.html">Contact</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header End -->


<section class="services-section spad">
    <div class="container" id="services">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <?php
                    $hotel = $_GET['nomHotel'];
                    $nom_ch = $_GET['nomCh'];

                    echo "<h3>$hotel : $nom_ch</h3>";
                    ?>
                </div>
            </div>

            <?php
            $InfosCh = $undlg->getAllInfoCh();
            $Infos_Suites = $undlg->getAllInfoSuites();

                    $name = $_GET['nomCh'];
                    $Hotels = $_GET['nomHotel'];
                    if (isset($_POST['optionCh'])) {
                        $options = $_POST['optionCh'];
                    }
                    $price = $_POST['prixCh'];
                    $chemin = $_POST['images'];
                    $optSuite = $_POST['optionSuite'];

                    if ()

                    echo "<div class=\"row justify-content-sm-center\">
                <div class=\"col-xl-9 col-sm-6\">
                    <div class=\"card text-dark bg-light mb-xl-5\">
                        <div class=\"row\">
                            <div class=\"col-md-8\">
                                <img src='img/chambres/$chemin'>
                            </div>
                            <div class=\"col-md-8\">
                                <form class=\"formulaire\" action=\"reservation.php\" method=\"get\" id=\"formCh\" name='send'>
                                    <p>$price euros/nuits</p>
                                    <p><small class=\"text-muted\">$options</small></p>
                                    <p><small class=\"text-muted\">Options supplémentaires : $optSuite</small></p>
                                </form>
                                    <a href='reservation.php?nomCh=$name&nomHotel=$Hotels' class=\"btn btn-primary\" onclick='document.getElementById(\"formCh\").submit()'>Réserver maintenant</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
            ?>
        </div>
    </div>
</section>
