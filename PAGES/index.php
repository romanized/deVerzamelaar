<!-- PHP -->
<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>
<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Styling -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <!-- Logo -->
    <link rel="shortcut icon" href="../MEDIA/logo1.png" type="image/x-icon">
    <!-- Animate.css library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@100;400&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@500&display=swap" rel="stylesheet"> 
    <link href="https://fonts.googleapis.com/css2?family=Alkatra:wght@500&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap" rel="stylesheet"> 
    <!-- Javascript -->
    <script defer src="../JS/script.js"></script>
    <!-- Ionic icons -->
    <script defer type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script defer nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</head>
<body>
    <!-- Preloader -->
    <div class="loader"></div>

    <!-- Header - Navbar -->
    <header class="animate__animated animate__fadeInDown">
        <a href="./index.php"><img src="../MEDIA/logo1.png" alt="logo" class="logo"></a> 
        <nav>
            <ul class="nav_links">
                <li><a class="active" href="#">Home</a></li>
                <li><a href="./verzameling.php">Verzameling</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                <li><a href="admin_panel.php">Admin</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- Login voor admins -->
        <a href="./login.php" class="cta"><button>Log in</button></a>
    </header>

    <main>
        <!-- Listing games -->
        <section class="grid-container">
            <h1 class="main-title animate__animated animate__slideInLeft">Trending producten</h1>
    
            <div class="grid-item animate__animated animate__fadeInUp animate__faster">
                <img src="../MEDIA/listing1.jpeg" width="175vw" alt="Afbeelding 1">
                <h2>Super Mario Bros</h2>
                <a href="./verzameling.php">Meer info</a>
            </div>
            <div class="grid-item animate__animated animate__fadeInUp animate__fast">
                <img src="../MEDIA/listing2.jpg" width="195vw" alt="Afbeelding 2">
                <h2>God of War</h2>
                <a href="./verzameling.php">Meer info</a>
            </div>
            <div class="grid-item animate__animated animate__fadeInUp">
                <img src="../MEDIA/listing3.jpg" width="170vw" alt="Afbeelding 3">
                <h2>Fortnite</h2>
                <a href="./verzameling.php">Meer info</a>
            </div>
            <div class="grid-item animate__animated animate__fadeInUp animate__faster">
                <img src="../MEDIA/listing4.jpg" width="175vw" alt="Afbeelding 4">
                <h2>Five Nights at Freddy's</h2>
                <a href="./verzameling.php">Meer info</a>
            </div>
            <div class="grid-item animate__animated animate__fadeInUp animate__fast">
                <img src="../MEDIA/listing5.jpg" width="205vw" alt="Afbeelding 5">
                <h2>League of Legends</h2>
                <a href="./verzameling.php">Meer info</a>
            </div>
            <div class="grid-item animate__animated animate__fadeInUp">
                <img src="../MEDIA/listing6.png" width="350vw" alt="Afbeelding 6">
                <h2>Consoles</h2>
                <a href="./verzameling.php">Meer info</a>
            </div>
        </section>

        <hr class="custom-hr">

        <!-- Informatie  -->
        <section class="info-section" id="info-section-scrolling">
            
            <div class="info-content animate__animated animate__lightSpeedInLeft">
                <h2 class="titel-overons">Over 'de Verzamelaars'</h2>
                <p>Welkom bij de Verzamelaars, dé plek voor unieke verzamelingen en collectie-items van games. Wij bieden items uit diverse gamegenres, dus er is voor elk wat wils. Neem gerust een kijkje en laat je verrassen door ons uitgebreide assortiment. Heb je vragen of opmerkingen? Aarzel dan niet om onze <a href="./contact.php">contactpagina</a> te bezoeken. Wij staan klaar om je te helpen!</p>
            </div>

            <div class="slideshow-container animate__animated animate__lightSpeedInRight">
                <div class="slide fade">
                    <img src="../MEDIA/info1.jpg" alt="Slide 1">
                </div>
                <div class="slide fade">
                    <img src="../MEDIA/info2.jpeg" alt="Slide 2">
                </div>
                <div class="slide fade">
                    <img src="../MEDIA/info3.jpg" alt="Slide 3">
                </div>
                <div class="slide fade">
                    <img src="../MEDIA/info4.jpg" alt="Slide 4">
                </div>
                <div class="slide fade">
                    <img src="../MEDIA/info5.jpg" alt="Slide 5">
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <div class="waves">
            <div class="wave" id="wave1"></div>
            <div class="wave" id="wave2"></div>
            <div class="wave" id="wave3"></div>
            <div class="wave" id="wave4"></div>
        </div>
        <ul class="social_icon">
            <li><a target="_blank" href="https://www.instagram.com/sfzls/"><ion-icon name="logo-instagram"></ion-icon></a></li>
            <li><a target="_blank" href="https://www.glr.nl/"><ion-icon name="school-outline"></ion-icon></a></li>
            <li><a target="_blank" href="https://github.com/romanized"><ion-icon name="logo-github"></ion-icon></a></li>
        </ul>
        <ul class="menu">
            <li><a href="#">Home</a></li>
            <li><a href="./verzameling.php">Verzameling</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
        <p>© 2023 de Verzamelaars. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>