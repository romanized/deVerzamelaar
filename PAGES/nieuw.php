<?php
session_start();
include '../PHP/db_connection.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: login.php');
    exit;
}

$error = '';
$success = false;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $naam = $_POST['naam'];
    $image = $_POST['image'];
    $beschrijving = $_POST['beschrijving'];
    $prijs = $_POST['prijs'];
    $eigenschappen = $_POST['eigenschappen'];

    if (!$naam || !$image || !$beschrijving || !$prijs || !$eigenschappen) {
        $error = 'Alle velden zijn verplicht.';
    } else {
        try {
            $stmt = $conn->prepare("INSERT INTO verzameling (naam, image, beschrijving, prijs, eigenschappen) VALUES (:naam, :image, :beschrijving, :prijs, :eigenschappen)");
            $stmt->bindParam(':naam', $naam);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':beschrijving', $beschrijving);
            $stmt->bindParam(':prijs', $prijs);
            $stmt->bindParam(':eigenschappen', $eigenschappen);
            $stmt->execute();
            $success = true;
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Toevoegen</title>
    <!-- Styling -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/crud.css">
    <!-- Logo -->
    <link rel="shortcut icon" href="../MEDIA/admin.png" type="image/x-icon">
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
    <div class="loader "></div>

    <!-- Header - Navbar -->
    <header class="animate__animated animate__fadeInDown">
        <a href="./index.html"><img src="../MEDIA/logo1.png" alt="logo" class="logo"></a> 
        <nav>
            <ul class="nav_links">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./verzameling.php">Verzameling</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
        <a></a>
    </header>
    <!-- Producten toevoegen -->
    <main class="admin-container">
    <h1 class="page-title">Voeg Product Toe</h1>

    <?php if ($error): ?>
        <p class="error-message"><?php echo $error; ?></p>
    <?php endif; ?>

    <?php if ($success): ?>
        <p class="success-message">Product succesvol toegevoegd!</p>
    <?php endif; ?>

    <form method="post" action="">
        <div class="form-group">
            <label for="naam">Naam:</label>
            <input type="text" id="naam" name="naam" required>
        </div>

        <div class="form-group">
            <label for="image">Afbeelding URL:</label>
            <input type="text" id="image" name="image" required>
        </div>

        <div class="form-group">
            <label for="beschrijving">Beschrijving:</label>
            <textarea id="beschrijving" name="beschrijving" required></textarea>
        </div>

        <div class="form-group">
            <label for="prijs">Prijs:</label>
            <input type="text" id="prijs" name="prijs" required>
        </div>

        <div class="form-group">
            <label for="eigenschappen">Eigenschappen:</label>
            <input type="text" id="eigenschappen" name="eigenschappen" required>
        </div>

        <button type="submit" class="submit-button">Voeg Toe</button>
        <a class="terug-button" href="./admin_panel.php">Terug</button></a>
    </form>
</main>

</body>
</html>
