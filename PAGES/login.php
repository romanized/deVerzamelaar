<!-- PHP voor inlog systeem -->
<?php
session_start();
include '../PHP/db_connection.php';
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];
    try {
        $stmt = $conn->prepare("SELECT * FROM users WHERE username = :username");
        $stmt->bindParam(':username', $username);
        $stmt->execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['is_admin'] = $user['is_admin'];
                $_SESSION['username'] = $user['username'];
                header("Location: admin_panel.php");
                exit;
            } else {
                $error = "Onjuiste gebruikersnaam of wachtwoord.<br> Wachtwoord komt niet overeen.";
            }
        } else {
            $error = "Onjuiste gebruikersnaam of wachtwoord.<br> Gebruiker niet gevonden.";
        }        
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
}
?>

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log in</title>
    <!-- Styling -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/login.css">
    <!-- Logo -->
    <link rel="shortcut icon" href="../MEDIA/login.png" type="image/x-icon">
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
    <!-- Login section -->
    <main>
    <div class="login-container">
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post" action="">
            <label for="username">Gebruikersnaam:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Wachtwoord:</label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
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