<?php

include '../Contrller/RecruteurC.php';

$error = "";


// Créer une instance de réclamation
$reclamation = null;

// Créer une instance du contrôleur de réclamation
$reclamationC = new reclamationC();
if (
    isset($_POST["id_reclamation"]) &&
    isset($_POST["date"]) &&
    isset($_POST["categorie_reclamation"]) &&
    isset($_POST["explication"])
) {
    if (
        !empty($_POST["id_reclamation"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["categorie_reclamation"]) &&
        !empty($_POST["explication"])
    ) {
        // Créer un objet reclamation
        $reclamation = new reclamation(
            $_POST['id_reclamation'],
            new DateTime($_POST['date']),
            $_POST['categorie_reclamation'],
            $_POST['explication']
        );
        // Mettre à jour la réclamation
        $reclamationC->updatereclamation($reclamation, $_POST["id_reclamation"]);
        // Rediriger vers la page de liste
        header('Location:listereclame.php');
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reclamation Display</title>
</head>

<body>
<button style="background-color: white; border: 2px solid red; padding: 10px 20px; font-size: 16px; border-radius: 20px;">
    <a href="listereclame.php" style="text-decoration: none; color: black;">Retour à la liste</a>
</button>

    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_reclamation'])) {
        $reclamation = $reclamationC->showrecruteur($_POST['id_reclamation']);

    ?>

<form action="" method="POST" style="text-align: center;">
    <div style="margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block;">
        <label for="id_reclamation" style="display: block; margin-bottom: 5px;">id_reclamation:</label>
        <input type="text" name="id_reclamation" id="id_reclamation" value="<?php echo $reclamation['id_reclamation']; ?>" maxlength="20" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block;">
        <label for="date" style="display: block; margin-bottom: 5px;">date:</label>
        <input type="text" name="date" id="date" value="<?php echo date('Y-m-d'); ?>" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;" readonly>
    </div>
    <div style="margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block;">
        <label for="categorie_reclamation" style="display: block; margin-bottom: 5px;">Catégorie:</label>
        <input type="text" name="categorie_reclamation" value="<?php echo $reclamation['categorie_reclamation']; ?>" id="categorie_reclamation" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
    <div style="margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; padding: 10px; display: inline-block;">
        <label for="explication" style="display: block; margin-bottom: 5px;">explication:</label>
        <input type="text" name="explication" value="<?php echo $reclamation['explication']; ?>" id="explication" style="width: 200px; padding: 5px; border: 1px solid #ccc; border-radius: 5px;">
    </div>
   
    <div>
        <input type="submit" value="Update" style="padding: 8px 20px; background-color: #fe3f40; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
        <input type="reset" value="Reset" style="padding: 8px 20px; background-color: #ccc; color: #fff; border: none; border-radius: 5px; cursor: pointer;">
    </div>
    <div style="margin-bottom: 300px;">
    <img src="services-left-image.png" alt="" style="width: 400px; height: 300px;">
</div>

</form>



    <?php
    }
    ?>
</body>

</html>
