<?php
$adresseEVN = ""; // Initialisation de la variable adresseEVN

if (isset($_POST["submit_address"])) {
    $address = $_POST["address"];
    $address = str_replace(" ", "+", $address);
    $adresseEVN = $address; // Enregistrement de l'adresse dans la variable adresseEVN
    ?>
    <iframe width="100%" height="500" src="https://maps.google.com/maps?q=<?php echo $address; ?>&output=embed"></iframe>
<?php
}
?>

<form method="POST">
    <p>
        <input type="text" name="address" placeholder="Enter address" value="<?php echo $adresseEVN; ?>">
    </p>
    <p>
        <?php echo $adresseEVN; ?>
    </p>
    <a href="addEvenement.php?adresseEVN=<?php echo urlencode($adresseEVN); ?>"><button type="button">Valider adresse</button></a>
    <input type="submit" name="submit_address">
</form>

