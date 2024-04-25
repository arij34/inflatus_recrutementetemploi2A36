<?php
include '../contrller/reponseC.php';

$error = "";

// create reclamation
$reponse = null;

// create an instance of the controller
$reponseC = new reponseC();
if (
   
    isset($_POST["etat_reponse"]) &&
    isset($_POST["idr"])
) {
    if (
        !empty($_POST["etat_reponse"]) &&
        !empty($_POST["idr"]) 
        
    ) {
        // Note: Ne pas inclure le premier paramètre (NULL) pour l'ID de réclamation si votre base de données gère automatiquement l'ID
        $reponse = new reponse(
            NULL,
            $_POST['etat_reponse'],
            $_POST['idr']
        );
        $reponseC->addreponse($reponse);
        header('Location: listereponse.php');
        exit(); // Assurez-vous de quitter le script après la redirection
    } else {
        $error = "Missing information";
    }
}
?>
