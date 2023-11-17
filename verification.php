<?php

$servername = "localhost";
$username = "root";
$password = "ilyass";
$dbname = "ecom_tp2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $num_addresses = isset($_POST['num_addresses']) ? (int)$_POST['num_addresses'] : 0;

        for ($i = 1; $i <= $num_addresses; $i++) {
            $street = $_POST["street$i"];
            $streetNb = $_POST["streetNb$i"];
            $type = $_POST["type$i"];
            $city = $_POST["city$i"];
            $zipcode = $_POST["zipcode$i"];
            
            $stmt = $conn->prepare("INSERT INTO addresses (street) VALUES (:street)");
            $stmt->bindParam(':street', $street);
            $stmt->execute();
        }
        header("Location: confirmation.php");
        exit();
    }
} catch (PDOException $e) {
    echo "Erreur : " . $e->getMessage();
}

$conn = null;
?>
