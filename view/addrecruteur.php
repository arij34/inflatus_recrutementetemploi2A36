<?php
include '../contrller/RecruteurC.php';

$error = "";

// create reclamation
$reclamation = null;

// create an instance of the controller
$reclamationC = new reclamationC();
if (
   
    isset($_POST["date"]) &&
    isset($_POST["categorie_reclamation"]) &&
    isset($_POST["explication"])
) {
    if (
        !empty($_POST["date"]) &&
        !empty($_POST["categorie_reclamation"]) &&
        !empty($_POST["explication"])
    ) {
        // Note: Ne pas inclure le premier paramètre (NULL) pour l'ID de réclamation si votre base de données gère automatiquement l'ID
        $reclamation = new reclamation(
            NULL,
            new DateTime($_POST["date"]),
            $_POST['categorie_reclamation'],
            $_POST['explication']
        );
        $reclamationC->addreclamation($reclamation);
        header('Location: listerecruteur.php');
        exit(); // Assurez-vous de quitter le script après la redirection
    } else {
        $error = "Missing information";
    }
}
?>
