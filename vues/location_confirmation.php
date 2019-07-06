<?php
if (isset($_SESSION['connecte'])) {
    $loggedIn = true;
} else {
    return "erreur";
}
if (!isset($_SESSION['facture'])) {
    return "erreur";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>ClassyAds &mdash; Colorlib Website Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Nanum+Gothic:400,700,800" rel="stylesheet">
    <link rel="stylesheet" href="../fonts/icomoon/style.css">

    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/magnific-popup.css">
    <link rel="stylesheet" href="../css/jquery-ui.css">
    <link rel="stylesheet" href="../css/owl.carousel.min.css">
    <link rel="stylesheet" href="../css/owl.theme.default.min.css">

    <link rel="stylesheet" href="../css/bootstrap-datepicker.css">

    <link rel="stylesheet" href="../fonts/flaticon/font/flaticon.css">

    <link rel="stylesheet" href="../css/aos.css">
    <link rel="stylesheet" href="../css/rangeslider.css">

    <link rel="stylesheet" href="../css/style.css">

</head>
<body>
<?php
include('header.php');
?>
<div class="site-blocks-cover inner-page-cover overlay" data-aos="fade" data-stellar-background-ratio="0.5">
    <div class="site-blocks-cover inner-page-cover overlay salleBanniere m-auto col-8"
         style="background-image: url(./images/banquet_login.jpg);">
    </div>
    <div class="container">
        <div class="row align-items-center justify-content-center text-center">
            <div class="col-md-10" data-aos="fade-up" data-aos-delay="400">
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="">
            <div class="mb-5">
                <div class="col-6 m-auto">
                    <table>
                        <tr>
                            <td>Salle Reserver :</td>
                            <td><?php echo $_SESSION['facture']['salle'] ?></td>
                        </tr>
                        <tr>
                            <td>Adresse :</td>
                            <td><?php echo $_SESSION['facture']['adresse'] ?></td>
                        </tr>
                        <tr>
                            <td>Date de debut :</td>
                            <td><?php echo $_SESSION['facture']['date_debut'] ?></td>
                        </tr>
                        <tr>
                            <td>Date de fin :</td>
                            <td><?php echo $_SESSION['facture']['date_fin'] ?></td>
                        </tr>
                        <tr>
                            <td>Prix journalier :</td>
                            <td><?php echo $_SESSION['facture']['prix_jour'] ?></td>
                        </tr>
                        <tr>
                            <td>Prix total :</td>
                            <td><?php echo $_SESSION['facture']['total'] ?></td>
                        </tr>
                        <tr>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="action" value="annuler_reservation">
                                    <input type="submit" value="Annuler" class="bg-primary text-white rounded">
                                </form>
                            </td>
                            <td>
                                <form method="post">
                                    <input type="hidden" name="action" value="confirmer_reservation">
                                    <input type="submit" value="Confirmer" class="bg-primary text-white rounded">
                                </form>
                            </td>
                        </tr>
                    </table>


                </div>
            </div>


            <footer class="site-footer">
                <?php
                include('vues/footer.php');
                ?>
            </footer>
        </div>
    </div>
</div>


</body>
</html>