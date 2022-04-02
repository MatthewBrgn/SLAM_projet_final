<?php
require_once '../persistance/dialogueBD.php';

$date_debut = $_POST['dateD'];
$date_fin = $_POST['dateF'];
$nb_adulte = $_POST['nb_adulte'];
$type_ch = $_POST['typeCh'];

try {
    $undlg = new DialogueBD();
    $menuHotels = $undlg->selectHotel();
    $maReservation = $undlg->getReservation($date_debut, $date_fin, $nb_adulte);
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/flaticon.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/css/nice-select.css" integrity="sha512-uHuCigcmv3ByTqBQQEwngXWk7E/NaPYP+CFglpkXPnRQbSubJmEENgh+itRDYbWV0fUZmUz7fD/+JDdeQFD5+A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css" integrity="sha512-aOG0c6nPNzGk+5zjwyJaoRUgCdOrfSDhmMID2u4+OIslr0GjpLKo7Xm0Ao3xmpM4T8AmIouRkqwj1nrdVsLKEQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.css" integrity="sha512-WEQNv9d3+sqyHjrqUZobDhFARZDko2wpWdfcpv44lsypsSuMO0kHGd3MQ8rrsBn/Qa39VojphdU6CMkpJUmDVw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">
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

<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-xl-10 col-lg-5 offset-xl-1 offset-lg-1">
                <div class="result-form" id="reservation">
                    <h3 style="text-align: center">Votre recherche</h3></br></br>

                    <form class="formulaire" action="resultats.php" method="post" id="form">
                        <div class="check-date">
                            <label for="date-in">Arrivée</label>
                            <?php if ($date_debut == $_POST['dateD']): ?>
                                <input type="text" class="date-input" id="date-in" name="dateD" value="<?php echo $date_debut ?>" required>
                            <?php endif; ?>
                            <i class="icon_calendar"></i>
                        </div></br>

                        <div class="check-date">
                            <label for="date-out">Départ</label>
                            <?php if ($date_fin == $_POST['dateF']): ?>
                                <input type="text" class="date-input" id="date-out" name="dateF" value="<?php echo $date_fin ?>" required>
                            <?php endif; ?>
                            <i class="icon_calendar"></i>
                        </div></br></br>

                        <div class="select-option">
                            <label for="type">Type</label>
                            <select id="type" name="typeCh">
                                <?php
                                    if ($type_ch == $_POST['typeCh']){

                                        switch ($type_ch) {
                                            case 'Suites premium':
                                                echo "<option value=\"Suites premium\">$type_ch</option>
                                                <option value=\"Chambres\">Chambres</option>";
                                            break;
                                            case 'Chambres':
                                                echo "<option value=\"Chambres\">$type_ch</option>
                                                <option value=\"Suites premium\">Suites premium</option>";
                                            break;
                                        }
                                    }
                                ?>
                            </select>
                        </div></br>

                        <div class="select-option">
                            <label for="nbpersonne">Adultes</label>
                            <?php if ($nb_adulte == $_POST['nb_adulte']): ?>
                                <input id="nbpersonne" type="number" min="1" max="8" value="<?php echo $nb_adulte ?>" style="width: 278px" name="nb_adulte">
                            <?php endif; ?>
                        </div></br>

                        <div class="select-option">
                            <label for="prix">Prix</label>
                            <select id="selec_prix" name="prix">
                                <?php 
                                    $prix = $_POST['prix'];                      

                                    if (isset($_POST['prix'])) {

                                        if ($prix == 'Decr') {
                                            echo "<option value=\"Decr\">Du + cher au - cher</option>
                                            <option>Du - cher au + cher</option>";
                                        }

                                        if ($prix != 'Decr') {
                                            echo "<option>Du - cher au + cher</option>
                                            <option value=\"Decr\">Du + cher au - cher</option>";
                                        }
                                    }
                                ?>
                            </select>
                        </div></br>

                        <div class="form-check" id="filtreB">
                            <?php
                                if ($type_ch == "Chambres") {
                                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"SpaBox\" name='Spa'>";

                                    if (isset($_POST['Spa'])) {
                                        $spa = $_POST['Spa'];

                                        if ($spa == 'Yes') {
                                            echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"SpaBox\" name='Spa' checked>";
                                        }
                                    }
                                    echo "<label class=\"form-check-label\" for=\"SpaBox\">
                                        Spa
                                    </label></br>";
                                }

                                if ($type_ch == "Suites premium") {
                                    echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"spaSuite\" name='Spa'>";

                                    if (isset($_POST['Spa'])) {
                                        $spa = $_POST['Spa'];

                                        if ($spa == 'Yes') {
                                            echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"SpaBox\" name='Spa' checked>";
                                            $get_Spa = $undlg->FiltreSpa($spa);
                                        }
                                    }
                                    echo "<label class=\"form-check-label\" for=\"spaSuite\">
                                        Spa
                                    </label></br>";
                                }
                            ?>
                            <?php
                                echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"TVbox\" name=\"tv\">";

                                if (isset($_POST['tv'])) {
                                    $tv = $_POST['tv'];

                                    if ($tv == 'Yes') {
                                        echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"TVbox\" name=\"tv\" checked>";
                                        $get_TV = $undlg->FiltreTV($tv);
                                    }
                                }
                                echo "<label class=\"form-check-label\" for=\"TVbox\">
                                  Accès TV
                                </label>";
                            ?>
                        </div>

                        <?php 
                            if ($type_ch == "Suites premium") {
                                echo "</br><div class=\"form-check\">
                                <input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"chaufBox\" name='chauffeur'>";

                                if (isset($_POST['chauffeur'])) {
                                    $chauf = $_POST['chauffeur'];

                                    if ($chauf == 'Yes') {
                                        echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"chaufBox\" name='chauffeur' checked>";
                                        $get_Chauf = $undlg->FiltreChauffeur($chauf);
                                    }
                                }
                                echo "<label class=\"form-check-label\" for=\"chaufBox\">
                                    Chauffeur
                                </label></div>
                            
                                <div class=\"form-check\">
                                <input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"hamam\" name='hamam'>";

                                if (isset($_POST['hamam'])) {
                                    $hamam = $_POST['hamam'];

                                    if ($hamam == 'Yes') {
                                        echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"hamam\" name='hamam' checked>";
                                        $get_Hamam = $undlg->FiltreHamam($hamam);
                                    }
                                }
                                echo "<label class=\"form-check-label\" for=\"hamam\">
                                    Hamam
                                </label></div>
                        
                                <div class=\"form-check\">
                                <input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"restauration\" name='restauration'>";

                                if (isset($_POST['restauration'])) {
                                    $restau = $_POST['restauration'];

                                    if ($restau == 'Yes') {
                                        echo "<input class=\"form-check-input\" type=\"checkbox\" value=\"Yes\" id=\"restauration\" name='restauration' checked>";
                                        $get_restau = $undlg->FiltreRestauration($restau);
                                    }
                                }
                                echo "<label class=\"form-check-label\" for=\"restauration\">
                                    Service de restauration à la demande
                                </label>
                                </div>";
                            }
                        ?>
                        <button type="submit">Rechercher</button>
                    </form>
                </div>
            </div>
    </div>
</div>
    <div class="hero-slider owl-carousel">
        <div class="hs-item set-bg" data-setbg="img/diapo/caroussel1.jpg"></div>
        <div class="hs-item set-bg" data-setbg="img/diapo/caroussel2.jpg"></div>
        <div class="hs-item set-bg" data-setbg="img/diapo/caroussel3.jpg"></div>
        <div class="hs-item set-bg" data-setbg="img/diapo/caroussel4.jpg"></div>
    </div>
</section>


<section class="services-section spad">
    <div class="container" id="services">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <h3>Résultats de votre recherche</h3>
                </div>
            </div>

            <?php
            $InfosCh = $undlg->getAllInfoCh();
            $Infos_Suites = $undlg->getAllInfoSuites();

            $filtre = $undlg->FiltrePrixCroi();

            if ($type_ch == "Chambres") {

                foreach ($InfosCh as $ligne) {
                    $name = $ligne['nomCh'];
                    $options = $ligne['optionCh'];
                    $Hotels = $ligne['nomHotel'];
                    $chemin = $ligne['images'];

                    $price = "";
                    if ($prix == 'Croi') {
                        foreach (arsort($filtre) as $key => $value) {
                            $price .= $value.',';
                        }
                    }
                    if ($prix == 'Decr') {
                        foreach (asort($filtre) as $key => $value) {
                            $price .= $value.',';
                        }
                    }
                    var_dump($price);
                    var_dump($Hotels);

                    echo "<div class=\"row justify-content-sm-center\">
                <div class=\"col-lg-9 col-sm-6\">
                    <div class=\"card text-dark bg-light mb-xl-5\">
                        <div class=\"row\">
                            <div class=\"col-md-4\">
                                <img src='img/chambres/$chemin'>
                            </div>
                            <div class=\"col-md-8\">
                                <div class=\"card-body\">
                                <form class=\"formulaire\" action=\"reservation.php\" method=\"get\" id=\"formCh\" name='send'>
                                    <h5 class=\"card-title\">$Hotels : $name</h5>
                                    <p class=\"card-text\">$price euros/nuits</p>
                                    <p class=\"card-text\"><small class=\"text-muted\">$options</small></p>
                                </form>
                                    <a href='reservation.php?nomCh=$name&nomHotel=$Hotels;optionCh=$options&prixCh=$price&images=$chemin' class=\"btn btn-primary\" onclick='document.getElementById(\"formCh\").submit()'>Réserver maintenant</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
                }
            }

            if ($type_ch == "Suites premium") {
                foreach ($Infos_Suites as $ligne) {
                    $name = $ligne['nomCh'];
                    $options = $ligne['optionCh'];
                    $Hotels = $ligne['nomHotel'];
                    $price = $ligne['prixCh'];
                    $optSuite = $ligne['optionSuite'];
                    $chemin = $ligne['images'];

                    echo "<div class=\"row justify-content-sm-center\">
                <div class=\"col-lg-9 col-sm-6\">
                    <div class=\"card text-dark bg-light mb-xl-5\">
                        <div class=\"row\">
                            <div class=\"col-md-4\">
                                <img src='img/suites/$chemin'>
                            </div>
                            <div class=\"col-md-8\">
                                <div class=\"card-body\">
                                <form class=\"formulaire\" action=\"reservation.php\" method=\"get\" id=\"formSp\" name='send'>
                                    <h5 class=\"card-title\">$Hotels : $name</h5>
                                    <p class=\"card-text\">$price euros/nuits</p>
                                    <p class=\"card-text\"><small class=\"text-muted\">$options</small></p></br>
                                    <p class=\"card-text\"><small class=\"text-muted\">Options supplémentaires : $optSuite</small></p>
                                </form>
                                    <a href='reservation.php?nomCh=$name&nomHotel=$Hotels;optionCh=$options&prixCh=$price&images=$chemin;optionSuite=$optSuite' class=\"btn btn-primary\" onclick='document.getElementById(\"formSp\").submit()'>Réserver maintenant</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>";
                }
            }
            ?>
        </div>
    </div>
</section>


<!-- Footer Section Begin -->
<footer class="footer-section">
    <div class="container">
        <div class="footer-text">
            <div class="row">
                <div class="col-lg-4">
                    <div class="ft-about">
                        <div class="logo">
                            <a href="#">
                                <h4 style="color: white">Anoï Resort</h4>
                            </a>
                        </div>
                        <p>Les meilleurs hotels de Chiang Mai a prix réduis</p>
                        <div class="fa-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-tripadvisor"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-contact">
                        <h6>Contactez nous</h6>
                        <ul>
                            <li>04 24 46 56 72</li>
                            <li>info@anoi-resort.com</li>
                            <li>Muen Dam Pla Kot Rd 6, Chiang Mai, Thaïlande</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 offset-lg-1">
                    <div class="ft-newslatter">
                        <h6>Rester informé</h6>
                        <p>Recevez les dernières mises à jour et offres.</p>
                        <form action="#" class="fn-form">
                            <input type="email" placeholder="Email">
                            <button type="submit"><i class="fa fa-send"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright-option">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <ul>
                        <li><a href="#">Contact</a></li>
                        <li><a href="#">CGU</a></li>
                        <li><a href="#">Ajouter un hotel</a></li>
                    </ul>
                </div>
                <div class="col-lg-5">
                    <div class="co-text"><p>Anoï Resort &copy;<script>document.write(new Date().getFullYear());</script> Tous droits réservés</p></div>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section End -->

<!-- Js Plugins -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-nice-select/1.1.0/js/jquery.nice-select.min.js" integrity="sha512-NqYds8su6jivy1/WLoW8x1tZMRD7/1ZfhWG/jcRQLOzV1k1rIODCpMgoBnar5QXshKJGV7vi0LXLNXPoFsM5Zg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js" integrity="sha512-uto9mlQzrs59VwILcLiRYeLKPPbS/bT71da/OEBYEwcdNUk8jYIy+D176RYoop1Da+f9mvkYrmj5MCLZWEtQuA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js" integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="js/jquery.slicknav.js"></script>
<script src="js/main.js"></script>
</body>

</html>