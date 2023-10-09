<!-- Maakt connectiem met de database -->
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "deverzamelaar"; 

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>
