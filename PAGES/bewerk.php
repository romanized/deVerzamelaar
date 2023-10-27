<!-- PHP-->
<?php
session_start();
include '../PHP/db_connection.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: login.php');
    exit;
}

if (!isset($_GET['id'])) {
    exit('Product ID is required');
}

$productID = $_GET['id'];
$error = '';
$success = false;

try {
    $stmt = $conn->prepare("SELECT * FROM verzameling WHERE ID = :id");
    $stmt->bindParam(':id', $productID);
    $stmt->execute();
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    exit("Error: " . $e->getMessage());
}

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
            $stmt = $conn->prepare("UPDATE verzameling SET naam = :naam, image = :image, beschrijving = :beschrijving, prijs = :prijs, eigenschappen = :eigenschappen WHERE ID = :id");
            $stmt->bindParam(':naam', $naam);
            $stmt->bindParam(':image', $image);
            $stmt->bindParam(':beschrijving', $beschrijving);
            $stmt->bindParam(':prijs', $prijs);
            $stmt->bindParam(':eigenschappen', $eigenschappen);
            $stmt->bindParam(':id', $productID);
            $stmt->execute();
            $success = true;
            $product = ['naam' => $naam, 'image' => $image, 'beschrijving' => $beschrijving, 'prijs' => $prijs, 'eigenschappen' => $eigenschappen];
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bewerk Product</title>
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

    <!-- Bewerk section -->
    <main>
        <div class="admin-container">
            <h1 class="page-title">Bewerk Product</h1>

            <?php if ($error): ?>
                <p class="error-message"><?php echo $error; ?></p>
            <?php endif; ?>

            <?php if ($success): ?>
                <p class="success-message">Product succesvol bijgewerkt!</p> <br>
            <?php endif; ?>

            <?php if ($product): ?>
                <form method="post" action="" class="edit-form">
                    <div class="form-group">
                        <label for="naam">Naam:</label>
                        <input class="tekst-kleur" type="text" id="naam" name="naam" required value="<?php echo $product['naam']; ?>">
                    </div>
                    
                    <div class="form-group">
                        <label for="image">Afbeelding URL:</label>
                        <input class="tekst-kleur" type="text" id="image" name="image" required value="<?php echo $product['image']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="beschrijving">Beschrijving:</label>
                        <textarea class="tekst-kleur" id="beschrijving" name="beschrijving" required><?php echo $product['beschrijving']; ?></textarea>
                    </div>

                    <div class="form-group">
                        <label for="prijs">Prijs:</label>
                        <input class="tekst-kleur" type="text" id="prijs" name="prijs" required value="<?php echo $product['prijs']; ?>">
                    </div>

                    <div class="form-group">
                        <label for="eigenschappen">Eigenschappen:</label>
                        <input class="tekst-kleur" type="text" id="eigenschappen" name="eigenschappen" required value="<?php echo $product['eigenschappen']; ?>">
                    </div>

                    <button type="submit" class="submit-button">Bewerk Product</button>
                    <a class="terug-button" href="./admin_panel.php">Terug</button></a>
                </form>
            <?php else: ?>
                <p class="error-message">Product niet gevonden.</p>
            <?php endif; ?>
        </div>
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
            <li><a href="./index.php">Home</a></li>
            <li><a href="./verzameling.php">Verzameling</a></li>
            <li><a href="./contact.php">Contact</a></li>
        </ul>
        <p>© 2023 de Verzamelaars. Alle rechten voorbehouden.</p>
    </footer>
</body>
</html>
