<!-- PHP -->
<?php
include '../PHP/db_connection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

try {
    $stmt = $conn->prepare("SELECT * FROM `verzameling`");
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}

error_reporting(E_ALL);
ini_set('display_errors', 1);
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verzameling</title>
    <!-- Styling -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/verzameling.css">
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
                <li><a href="./index.php">Home</a></li>
                <li><a class="active" href="#">Verzameling</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                <li><a href="admin_panel.php">Admin</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- Login voor admins -->
        <a href="./login.php" class="cta"><button>Log in</button></a>
    </header>

    <!-- Verzameling -->
    <div class="grid-container">
    <?php foreach ($products as $product) : ?>
    <div class="grid-item animate__animated animate__zoomIn" data-id="<?php echo $product['ID']; ?>">
        <p class="items-p padding-items"><?php echo $product['eigenschappen']; ?></p>
        <img class="verzameling-img" src="<?php echo $product['image']; ?>" alt="<?php echo $product['naam']; ?>">
        <h2><?php echo $product['naam']; ?></h2>
        <p class="items-p"><?php echo $product['beschrijving']; ?></p>
        <a href="purchase.php?id=<?php echo $product['ID']; ?>" class="buy-btn">Kopen</a>
    </div>
    <?php endforeach; ?>
    </div>

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
            <li><a href="./index.php">Home</a></li>
            <li><a href="./verzameling.php">Verzameling</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
        <p>© 2023 de Verzamelaars. Alle rechten voorbehouden.</p>
    </footer>    

</body>
</html>