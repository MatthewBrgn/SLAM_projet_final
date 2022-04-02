<?php
require_once '../persistance/dialogueBD.php';

try {
    $undlg = new DialogueBD();
    $menuHotels = $undlg->selectHotel();

}
catch (Exception $e) {
    $erreur = $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="keywords" content="Sona, unica, creative, html">
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

<!-- Hero Section Begin -->
<section class="hero-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <div class="hero-text">
                    <h1>Anoï Resort</h1>
                    <p>Des services hoteliers de luxe en 1 clic et à bas coût.</p>
                    <a href="#services" class="primary-btn">En savoir plus</a>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5 offset-xl-2 offset-lg-1">
                <div class="booking-form" id="reservation">
                    <h3 style="text-align: center">Réserver votre hotel</h3>
                    <form class="formulaire" action="resultats.php" method="post">
                        <div class="check-date">
                            <label for="date-in">Arrivée :</label>
                            <input type="text" class="date-input" id="date-in" name="dateD" required>
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="check-date">
                            <label for="date-out">Départ :</label>
                            <input type="text" class="date-input" id="date-out" name="dateF" required>
                            <i class="icon_calendar"></i>
                        </div>
                        <div class="select-option">
                            <label for="type">Type :</label>
                            <select id="type" name="typeCh">
                                <option value="Suites premium">Suites premium</option>
                                <option value="Chambres">Chambres</option>
                            </select>
                        </div>
                        <div class="select-option">
                            <label for="nbpersonne">Adultes :</label>
                            <input id="nbpersonne" type="number" min="1" max="8" value="1" style="width: 278px" name="nb_adulte">
                        </div>
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
<!-- Hero Section End -->

<!-- Services Section End -->
<section class="services-section spad">
    <div class="container" id="services">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Préstations</span>
                    <h2>Decouvrez nos services</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-sm-center">
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-007-swimming-pool"></i>
                    <h4>spa & hamam</h4>
                    <p>Nos hotels disposent de spa, de hamam et de services de massages.
                        Lieux de relaxation et de détente, ils vous offriront un cadre
                        de tranquilité et de sereinité.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-036-parking"></i>
                    <h4>Location de voiture</h4>
                    <p>Location de voitures à la demande. Nos SUV pour les lieux plus difficile d'accès
                        et nos scooters pour réaliser des road trip en pleine ville.</p>
                </div>
            </div>
            <div class="col-lg-4 col-sm-6">
                <div class="service-item">
                    <i class="flaticon-033-dinner"></i>
                    <h4>Restauration</h4>
                    <p>Profitez d'un service de restauration complet proposant des buffets à volonté.
                        Vous pouvez également commander des spécialités culinaire de la Thaïlande.</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->

<!-- Home Room Section Begin -->
<section class="hp-room-section">
    <div class="container-fluid">
        <div class="hp-room-items">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="img/room/chambre-b1.jpg">
                        <div class="hr-text">
                            <h3>Chambres</h3>
                            <h2>299$<span>/nuit</span></h2>
                            <table>
                                <tbody>
                                <tr>
                                    <td class="r-o"><b>Taille:</b></td>
                                    <td>40 à 80 m²</td>
                                </tr>
                                <tr>
                                    <td class="r-o"><b>Nombre de lits:</b></td>
                                    <td>1 à 4</td>
                                </tr>
                                <tr>
                                    <td class="r-o"><b>Nombre de pièces:</b></td>
                                    <td>2 à 4</td>
                                </tr>
                                <tr>
                                    <td class="r-o"><b>Options:</b></td>
                                    <td>Accès TV, Balcon...</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="#" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="hp-room-item set-bg" data-setbg="img/room/suite-b1.jpg">
                        <div class="hr-text">
                            <h3>Suites Premium</h3>
                            <h2>699$<span>/nuit</span></h2>
                            <table id="details">
                                <tbody>
                                <tr>
                                    <td class="r-o"><b>Taille:</b></td>
                                    <td>90 à 125 m²</td>
                                </tr>
                                <tr>
                                    <td class="r-o"><b>Nombre de lits:</b></td>
                                    <td>1 à 4</td>
                                </tr>
                                <tr>
                                    <td class="r-o"><b>Nombre de pièces:</b></td>
                                    <td>3 à 6</td>
                                </tr>
                                <tr>
                                    <td class="r-o"><b>Options:</b></td>
                                    <td>Accès TV, Jacuzzi, Spa, Hamam...</td>
                                </tr>
                                </tbody>
                            </table>
                            <a href="#details" class="primary-btn">More Details</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Home Room Section End -->

<!-- Testimonial Section Begin -->
<section class="testimonial-section spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="section-title">
                    <span>Temoignages</span>
                    <h2>L'avis de nos clients</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="testimonial-slider owl-carousel">
                    <div class="ts-item">
                        <p>Je suis venu en voyage en Thaïlande avec ma famille le mois dernier et nous sommes
                            passés par la ville de Chiang mai. Anoi Resort nous a permis de trouver rapidement et
                            facilement un hotel de qualité dans la région de Chiang Mai.</p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5> - Adrien Denizs</h5>
                        </div>
                        <img src="img/testimonial-logo.png" alt="">
                    </div>
                    <div class="ts-item">
                        <p>J'ai découvert Anoï Resort il y a 2 ans et aujourd'hui je m'en sert quasiment tous
                            les jours. Les hotels disponnibles sont très agréables et les services proposés
                            sont de bonne qualité. Etant travailleur indépendant, les services de coworking
                            qui sont proposés sont également appréciable et trés pratqiue.</p>
                        <div class="ti-author">
                            <div class="rating">
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star"></i>
                                <i class="icon_star-half_alt"></i>
                            </div>
                            <h5> - Julie Morrin</h5>
                        </div>
                        <img src="img/testimonial-logo.png" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Testimonial Section End -->

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
