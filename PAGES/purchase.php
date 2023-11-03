<!-- PHP -->
<?php
include '../PHP/db_connection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $product_id = $_GET['id'];

    try {
        $stmt = $conn->prepare("INSERT INTO orders (product_id, name, email, phone_number, address) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$product_id, $name, $email, $phone_number, $address]);
        if($stmt) {
            header("Location: bevestiging.html");
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} elseif(isset($_GET['id'])) {
    $productId = $_GET['id'];
    try {
        $stmt = $conn->prepare("SELECT * FROM verzameling WHERE ID = ?");
        $stmt->execute([$productId]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kopen</title>
    <!-- Styling -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/purchase.css">
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
                <li><a href="./verzameling.php">Verzameling</a></li>
                <li><a href="./contact.php">Contact</a></li>
                <?php if (isset($_SESSION['is_admin']) && $_SESSION['is_admin'] == 1): ?>
                <li><a href="admin_panel.php">Admin</a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <!-- Login voor admins -->
        <a href="./login.php" class="cta"><button class="loginbutton">Log in</button></a>
    </header>

<!-- Kopen product -->
    <?php if(isset($product)): ?>
    <div class="product-info">
        <img class="image-product animate__animated animate__fadeIn" src="<?php echo $product['image']; ?>" alt="<?php echo $product['naam']; ?>">
        <p class="beschrijving animate__animated animate__fadeIn "><span class="beschrijving-titel"><?php echo $product['naam']; ?></span><br><span class="beschrijving-eigenschappen"><?php echo $product['eigenschappen']; ?></span><br><?php echo $product['beschrijving']; ?></p>
    </div>

    <form method="POST" action="">
            <p class="form-tekst">Vul de onderstaande gegevens in om uw aankoop te voltooien</p>
            <label for="name">Volledige naam:</label>
            <input type="text" id="name" name="name" required><br>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required><br>
            
            <label for="email">Telefoonnummer:</label>
            <input type="number" id="phone_number" name="phone_number" required><br>

            <label for="email">Adres:</label>
            <input type="text" id="address" name="address" required><br>

            <input type="submit" value="Buy">
            <p class="prijs animate__animated animate__fadeIn ">Prijs: €<?php echo $product['prijs']; ?></p>
            </form>
    <?php endif; ?>

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