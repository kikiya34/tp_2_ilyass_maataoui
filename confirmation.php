<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Confirmation</title>
</head>
<body>

    <div class="container">
        <h2>Confirmation des adresses</h2>
        
        <?php
        $servername = "localhost";
        $username = "root";
        $password = "ilyass";
        $dbname = "ecom_tp2";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $conn->prepare("SELECT street FROM addresses");
            $stmt->execute();
            $addresses = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($addresses) > 0) {
                echo "<ul>";
                foreach ($addresses as $address) {
                    echo "<li>" . $address['street'] . "</li>";
                    echo "<li><strong>Rue :</strong> " . $address['street'] . "</li>";
                    echo "<li><strong>Numéro de rue :</strong> " . $address['street_nb'] . "</li>";
                    echo "<li><strong>Type :</strong> " . $address['type'] . "</li>";
                    echo "<li><strong>Ville :</strong> " . $address['city'] . "</li>";
                    echo "<li><strong>Code postal :</strong> " . $address['zipcode'] . "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p>Aucune adresse n'a été enregistrée.</p>";
            }
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
        }

        $conn = null;
        ?>

    </div>

</body>
</html>
