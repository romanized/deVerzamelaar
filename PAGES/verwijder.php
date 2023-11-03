<?php
session_start();
include '../PHP/db_connection.php';

if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] != 1) {
    header('Location: login.php');
    exit;
}

$error = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    try {
        $stmt = $conn->prepare("SELECT * FROM verzameling WHERE ID = :id");
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$product) {
            header('Location: admin_panel.php');
            exit;
        }
    } catch (PDOException $e) {
        $error = "Error: " . $e->getMessage();
    }
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        try {
            $stmt = $conn->prepare("DELETE FROM verzameling WHERE ID = :id");
            $stmt->bindParam(':id', $id);
            $stmt->execute();
            
            header('Location: admin_panel.php');
            exit;
        } catch (PDOException $e) {
            $error = "Error: " . $e->getMessage();
        }
    }
} else {
    header('Location: admin_panel.php');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verwijder Product</title>
    <!-- Styling -->
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/navbar.css">
    <link rel="stylesheet" href="../CSS/verwijder.css">
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
    <div class="loader"></div>

    <!-- Header - Navbar -->
    <header class="animate__animated animate__fadeInDown">
        <a href="./index.php"><img src="../MEDIA/logo1.png" alt="logo" class="logo"></a> 
        <nav>
            <ul class="nav_links">
                <li><a href="./index.php">Home</a></li>
                <li><a href="./verzameling.php">Verzameling</a></li>
                <li><a href="./contact.php">Contact</a></li>
            </ul>
        </nav>
        <a></a>
    </header>
    <!-- Producten verwijderen -->
    <main>
        <div class="admin-container">
            <?php if ($error): ?>
                <p><?php echo $error; ?></p>
            <?php else: ?>
                <h1>Weet je zeker dat je dit product wilt verwijderen?</h1>
                <p>Naam: <?php echo htmlspecialchars($product['naam']); ?></p>
                <p>Beschrijving: <?php echo htmlspecialchars($product['beschrijving']); ?></p>
                <p>Prijs: €<?php echo htmlspecialchars($product['prijs']); ?></p>
                <p>Eigenschappen: <?php echo htmlspecialchars($product['eigenschappen']); ?></p>
                <hr class="custom-hr">
                <form method="post" action="">
                    <button type="submit">Verwijder</button>
                    <a class="terug-button" href="./admin_panel.php">Terug</button></a>
                </form>
            <?php endif; ?>
        </div>
    </main>
</body>
</html>
