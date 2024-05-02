<?php

include '../Controller/DomaineC.php';

$error = "";

// Initialiser une demande à null
$domaine = null;

// Créer une instance du contrôleur
$domaineC = new DomaineC();

// Vérifier si les données du formulaire sont soumises
if (
    isset($_POST["domaine_informatique"]) 
   
) {
    // Vérifier si les champs requis ne sont pas vides
    if (
        !empty($_POST["domaine_informatique"]) 
        
    ) {
        // Créer un nouvel objet Demande
        $domaine = new Domaine(
            null, // Laisser l'ID être défini automatiquement
            $_POST["domaine_informatique"]
           
        );

        // Ajouter la demande à la base de données
        $domaineC->addDomaine($domaine);

        // Rediriger vers la liste des demandes après l'ajout
        
        header('Location:ListeDomaines_front.php');
        exit; // Terminer le script après la redirection
    } else {
        $error = "Missing information";
    }
}
?>
