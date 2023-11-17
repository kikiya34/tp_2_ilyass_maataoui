<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Adresse - Page 2</title>
</head>
<body>

<div class="container">
    <h2>Entrez vos adresses</h2>
    <form action="verification.php" method="post">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $num_addresses = isset($_POST['num_addresses']) ? (int)$_POST['num_addresses'] : 0;
            
            for ($i = 1; $i <= $num_addresses; $i++) {
                echo "<h3>Adresse $i</h3>";
                echo '<label for="street_'.$i.'">Rue :</label>';
                echo '<input type="text" name="street_'.$i.'" id="street_'.$i.'" maxlength="50" required>';

                echo '<label for="streetNb_'.$i.'">Numéro de rue :</label>';
                echo '<input type="number" name="streetNb_'.$i.'" id="streetNb_'.$i.'" required>';

                echo '<label for="type_'.$i.'">Type :</label>';
                echo '<select name="type_'.$i.'" id="type_'.$i.'" maxlength="20" required>';
                echo '<option value="livraison">Livraison</option>';
                echo '<option value="facturation">Facturation</option>';
                echo '<option value="autre">Autre</option>';
                echo '</select>';

                echo '<label for="city_'.$i.'">Ville :</label>';
                echo '<select name="city_'.$i.'" id="city_'.$i.'" required>';
                echo '<option value="Montreal">Montreal</option>';
                echo '<option value="Laval">Laval</option>';
                echo '<option value="Toronto">Toronto</option>';
                echo '<option value="Quebec">Quebec</option>';
                echo '</select>';

                echo '<label for="zipcode_'.$i.'">Code postal :</label>';
                echo '<input type="text" name="zipcode_'.$i.'" id="zipcode_'.$i.'" pattern="[0-9]{6}" required>';

                echo '<hr>';
            }
        }
        ?>
        <button type="submit">Vérifier</button>
    </form>
</div>


</body>
</html>
