<!-- PHP voor contact -->
<?php
session_start();
include('../PHP/db_connection.php');
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $message = $_POST['message'] ?? '';

    if(empty($name) || empty($email) || empty($message)) {
        echo '<p class="p-error">Vul S.V.P alles in<p>';
    } else {
        try {
            $stmt = $conn->prepare("INSERT INTO contact_messages (name, email, message, sent_at) VALUES (?, ?, ?, NOW())");
            $stmt->bindParam(1, $name, PDO::PARAM_STR);
            $stmt->bindParam(2, $email, PDO::PARAM_STR);
            $stmt->bindParam(3, $message, PDO::PARAM_STR);

            if ($stmt->execute()) {
                $_SESSION['message'] = "Bericht succesvol verzonden!";
            } else {
                echo "Er is iets misgegaan, error code : " . $stmt->error;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
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
    <title>Contact</title>
    <!-- Styling -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/contact.css">
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
                <li><a href="./index.php">Home</a></li>
                <li><a href="./verzameling.php">Verzameling</a></li>
                <li><a class="active" href="#">Contact</a></li>
            </ul>
        </nav>
        <!-- Login voor admins -->
        <a href="./login.php" class="cta"><button class="loginbutton">Log in</button></a>
    </header>

    <!-- Contact -->
    <section class="form-section animate__animated animate__bounceInUp">
<div class="form-container">
<div class="form">
    <span class="heading">Contact ons</span>
    <form action="contact.php" method="POST">
        <input name="name" placeholder="Naam" type="text" class="input" required>
        <input name="email" placeholder="Email" id="mail" type="email" class="input" required>
        <textarea placeholder="Uw bericht" rows="10" cols="30" name="message" class="textarea" required></textarea>
        <div class="button-container">
        <input type="submit" class="send-button" value="Versturen">
        </div>
    </form>
</div>
</div>
</section>

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
            <li><a href="#">Contact</a></li>
        </ul>
        <p>© 2023 de Verzamelaars. Alle rechten voorbehouden.</p>
    </footer>

    <!-- PHP Code voor popup -->
    <?php if(isset($_SESSION['message'])): ?>
    <script type="text/javascript">
        alert("<?php echo $_SESSION['message']; ?>");
        setTimeout(() => {
            if(document.querySelector('.alert')) {
                document.querySelector('.alert').remove();
            }
        }, 3000);
    </script>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
</body>
</html>