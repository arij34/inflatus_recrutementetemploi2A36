<?php
require_once "../Controller/DomaineC.php";
$domaineC = new DomaineC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['id_dom']) && isset($_POST['search'])) {
        $id_dom = $_POST['domaine_informatique'];
        $liste = $domaineC->afficheOffres($id_dom);
    }
}

$domaines = $domaineC->afficheDomaines();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Recherche d'offre</title>
</head>
<body>
    <h1>Recherche d'offre par domaine_informatique</h1>
    <form action="" method="POST">
        <label for="domaine_informatique">Sélectionnez un domaine_informatique : </label>
        <select name="domaine_informatique" id="domaine_informatique">
            <?php
            foreach ($domaines as $domaine) {
                echo '<option value="' . $domaine['id_dom'] . '">' . $domaine['domaine_informatique'] . '</option>';
            }
            ?>
        </select>
        <input type="submit" value="Recherche" name="search">
    </form>
    <?php if (isset($liste)) {?>
        <br>
        <h2>Offres correspondants au domaine_informatique Sélectionné :</h2>
        <ul>
            <?php foreach ($liste as $offre){?>
                <li><?= $offre['titre'] ?> - <?= $offre['description_o'] ?> </li>
           <?php } ?>
        </ul>
    <?php } ?>
</body>
</html>
