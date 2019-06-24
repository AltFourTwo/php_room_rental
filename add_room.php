<?php
include_once('./Classes/Salle.class.php');
include_once('./Classes/SalleDAO.class.php');
include_once('./Classes/salle_adresseDAO.class.php');
include_once('./Classes/salle_adresse.class.php');

$sDao = new SalleDAO();
$saDao = new salle_adresseDAO();
$db = Database::getInstance();

$no_civique = "";
$no_local = "";
$rue = "";
$ville = "";
$code_postal = "";
$province = "";
$pays = "";
$superficie = "";
$capacite = "";
$titre = "";
$desc = "";

if (ISSET($_REQUEST['action'])) {
    $no_civique = "'" . $_REQUEST['noCivique'] . "'";
    $no_local = "'" . $_REQUEST['local-room'] . "'";
    $rue = "'" . $_REQUEST['rue-room'] . "'";
    $ville = "'" . $_REQUEST['ville-room'] . "'";
    $code_postal = "'" . $_REQUEST['codePostal-room'] . "'";
    $province = "'" . $_REQUEST['province-room'] . "'";
    $pays = "'" . $_REQUEST['pays-room'] . "'";
    $superficie = (int)$_REQUEST['superficie'];
    $capacite = (int)$_REQUEST['capacite'];
    var_dump($superficie);
    var_dump($capacite);
    var_dump($superficie);
    var_dump($capacite);
    $titre = "'" . $_REQUEST['titre'] . "'";
    $desc = "'" . $_REQUEST['description-room'] . "'";
    $adresse = new Salle_adresse($no_civique, $no_local, $rue, $ville, $code_postal, $province, $pays);
    $adr = $saDao->create($adresse);
    $id_adr = $db->lastInsertId();
    $salle = new Salle($titre, $superficie, $capacite, $id_adr, $desc, 1);
    $res = $sDao->create($salle);
    echo "Salle enregister!!!";
    var_dump($superficie);
    var_dump($capacite);
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Abbys'List - Connexion</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">

    <link rel="stylesheet" href="css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="css/aos.css">
    <link rel="stylesheet" href="css/rangeslider.css">

    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<div class="site-wrap">

    <div class="site-mobile-menu">
        <div class="site-mobile-menu-header">
            <div class="site-mobile-menu-close mt-3">
                <span class="icon-close2 js-menu-toggle"></span>
            </div>
        </div>
        <div class="site-mobile-menu-body"></div>
    </div>

    <header class="site-navbar container py-0 bg-white" role="banner">

        <!-- <div class="container"> -->
        <div class="row align-items-center">

            <div class="col-6 col-xl-2">
                <h1 class="mb-0 site-logo"><a href="index.php" class="text-black mb-0">Abbys'<span class="text-primary">List</span>
                    </a></h1>
            </div>
            <div class="col-12 col-md-10 d-none d-xl-block">
                <nav class="site-navigation position-relative text-right" role="navigation">

                    <ul class="site-menu js-clone-nav mr-auto d-none d-lg-block">
                        <li class="active"><a href="index.php">Accueil</a></li>
                        <li><a href="listings.php">salles</a></li>
                        <li class="has-children">
                            <a href="about.php">Comment ca marche</a>
                            <ul class="dropdown">
                                <li><a href="#">Comment louer</a></li>
                                <li><a href="#">Comment afficher</a></li>
                                <li><a href="#">prix</a></li>
                                <li><a href="#">FAQ</a></li>
                            </ul>
                        </li>
                        <li><a href="blog.php">Blog</a></li>
                        <li><a href="contact.php">Contact</a></li>

                        <li class="ml-xl-3 login"><a href="login.php"><span class="border-left pl-xl-4"></span>Se
                                Connecter</a></li>
                        <li><a href="register.php">Devenir Membre</a></li>

                        <li><a href="#" class="cta"><span
                                        class="bg-primary text-white rounded">+ Afficher votre salle</span></a></li>
                    </ul>
                </nav>
            </div>


            <div class="d-inline-block d-xl-none ml-auto py-3 col-6 text-right" style="position: relative; top: 3px;">
                <a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a>
            </div>

        </div>
        <!-- </div> -->

    </header>


    <div class="site-blocks-cover inner-page-cover overlay" style="background-image: url(images/banquet_login.jpg);"
         data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center text-center">

                <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">


                    <div class="row justify-content-center mt-5">
                        <div class="col-md-8 text-center">
                            <h1>Afficher votre salle</h1>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>

    <div class="site-section bg-light">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12 mb-12" data-aos="fade">


                    <form action="#" method="post" class="p-5 bg-white">

                        <div class=" form-group">

                            <div class=" row col-md-12">
                                <p>Veuillez remplir tous les champs.</p>
                            </div>
                            <div class="row col-12">
                                <div class="col-2 form-room">
                                    <label class="text-black" for="noCivique">No civique</label>
                                    <input type="text" name="noCivique" class="form-control">
                                </div>
                                <div class="col-1 form-room">
                                    <label class="text-black" for="local-room">Local</label>
                                    <input type="text" name="local-room" class="form-control">
                                </div>
                                <div class="col-5 form-room">
                                    <label class="text-black" for="rue-room">Rue</label>
                                    <input type="text" name="rue-room" class="form-control">
                                </div>
                                <div class="col-4 form-room">
                                    <label class="text-black" for="ville-room">Ville</label>
                                    <input type="text" name="ville-room" class="form-control">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-3 form-room">
                                    <label class="text-black" for="codePostal-room">Code postal</label>
                                    <input type="text" name="codePostal-room" class="form-control">
                                </div>
                                <div class="col-4 form-room">
                                    <label class="text-black" for="province-room">Province</label>
                                    <input type="text" name="province-room" class="form-control">
                                </div>
                                <div class="col-5 form-room">
                                    <label class="text-black" for="pays-room">Pays</label>
                                    <input type="text" name="pays-room" class="form-control">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-12 form-room">
                                    <label class="text-black" for="titre">Titre</label>
                                    <input type="text" name="titre" class="form-control">
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-12 form-room">
                                    <label class="text-black" for="description-room">Description</label>
                                    <textarea rows="5" name="description-room" class="form-control"></textarea>
                                </div>
                            </div>
                            <br/><br/>
                            <div class="row col-md-12">
                                <div class="col-3 form-room">
                                    <label class="text-black" for="capaciteRoom">Capacité</label>
                                    <input type="text" name="capaciteRoom" class="form-control"/>
                                </div>
                                <div class="col-3 form-room">
                                    <label class="text-black" for="superficieRoom">Superficie (en M²)</label>
                                    <input type="text" name="superficieRoom" class="form-control"/>
                                </div>
                                <div class="col-3 form-room">
                                    <label class="text-black" for="prix_jour">Prix journalier</label>
                                    <input type="text" min="1" step="any" name="prix_jour" class="form-control"/>
                                </div>
                            </div>
                            <div class="row col-md-12">
                                <div class="col-12 form-room">

                                </div>
                            </div>
                        </div>


                        <div class="row col-12">
                            <div class="form-room col-12">
                                <input type="submit" value="Suivant"
                                       class="btn btn-primary py-2 px-4 text-white btn-suivant">
                                <input type="hidden" name="action" value="suivant"/>
                            </div>
                        </div>


                    </form>
                </div>

            </div>
        </div>
    </div>


    <div class="newsletter bg-primary py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h2>Newsletter</h2>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
                </div>
                <div class="col-md-6">

                    <form class="d-flex">
                        <input type="text" class="form-control" placeholder="Email">
                        <input type="submit" value="Subscribe" class="btn btn-white">
                    </form>
                </div>
            </div>
        </div>
    </div>


    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-9">
                    <div class="row">
                        <div class="col-md-6">
                            <h2 class="footer-heading mb-4">About</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident rerum unde possimus
                                molestias dolorem fuga, illo quis fugiat!</p>
                        </div>

                        <div class="col-md-3">
                            <h2 class="footer-heading mb-4">Navigations</h2>
                            <ul class="list-unstyled">
                                <li><a href="#">About Us</a></li>
                                <li><a href="#">Services</a></li>
                                <li><a href="#">Testimonials</a></li>
                                <li><a href="#">Contact Us</a></li>
                            </ul>
                        </div>
                        <div class="col-md-3">
                            <h2 class="footer-heading mb-4">Follow Us</h2>
                            <a href="#" class="pl-0 pr-3"><span class="icon-facebook"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-twitter"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-instagram"></span></a>
                            <a href="#" class="pl-3 pr-3"><span class="icon-linkedin"></span></a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <form action="#" method="post">
                        <div class="input-group mb-3">
                            <input type="text" class="form-control border-secondary text-white bg-transparent"
                                   placeholder="Search products..." aria-label="Enter Email"
                                   aria-describedby="button-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary text-white" type="button" id="button-addon2">Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/jquery-ui.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/jquery.countdown.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/bootstrap-datepicker.min.js"></script>
<script src="js/aos.js"></script>
<script src="js/rangeslider.min.js"></script>

<script src="js/main.js"></script>

</body>

