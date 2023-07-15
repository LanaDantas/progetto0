<?php
session_start();


$cssPaths = [
    "../../assets/css/homepage.css",
    "https://use.fontawesome.com/releases/v5.14.0/css/all.css",
    "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css"
];

$jsPaths = [
    "../../assets/js/homepage.js",
    "../../assets/js/riepilogo.js"
];

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> Homepage </title>

    <?php foreach ($cssPaths as $cssPath) : ?>
        <link rel="stylesheet" href="<?php echo $cssPath; ?>">
    <?php endforeach; ?>
    <?php foreach ($jsPaths as $jsPath) : ?>
        <script src="<?php echo $jsPath; ?>" defer></script>
    <?php endforeach; ?>

</head>

<body>


    <!-- Navbar Section -->
    <nav class="navbar">
        <div class="navbar__container">
            <a href="#home" id="navbar__logo">TORINO SPETTACOLI</a>
            <div class="navbar__toggle" id="mobile-menu">
                <span class="bar"></span> <span class="bar"></span>
                <span class="bar"></span>
            </div>
            <ul class="navbar__menu">
                <li class="navbar__item">
                    <a href="http://localhost/progetto0/views/homepage/homepage.php" class="navbar__links" id="home-page">Home</a>
                </li>
                <li class="navbar__item">
                    <a href="#regio" class="navbar__links" id="regio-page">Teatro Regio</a>
                </li>
                <li class="navbar__item">
                    <a href="#carignano" class="navbar__links" id="carignano-page">Teatro Carignano</a>
                </li>
                <li class="navbar__item">
                    <a href="#alfieri" class="navbar__links" id="alfieri-page">Teatro Alfieri</a>
                </li>
                <li class="navbar__item">
                    <a href="http://localhost/progetto0/views/riepilogo/riepilogo.php" class="navbar__links" id="riepilogo-page">
                        <i class="fa-brands fa-opencart"></i>
                    </a>
                </li>

                <?php
                if (!isset($_SESSION['COD_CLIENTE'])) { ?>
                    <li class="navbar__btn">
                        <a href="#sign-up" class="button" id="signup">Accedi</a>
                    </li>
                <?php } ?>
                <?php
                if (isset($_SESSION['COD_CLIENTE'])) { ?>
                    <li class="navbar__btn">
                        <a href="http://localhost/progetto0/views/login-registrazione/logout.php" class="button" id="signup">Logout</a>
                    </li>
                <?php } ?>
                
            </ul>
        </div>
    </nav>