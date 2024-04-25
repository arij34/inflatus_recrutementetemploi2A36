<?php

include '../Controller/DemandeC.php';

$error = "";

// Initialiser une demande à null
$demande = null;

// Créer une instance du contrôleur
$demandeC = new DemandeC();

// Vérifier si les données du formulaire sont soumises
if (
    isset($_POST["id_etudiant"]) &&
    isset($_POST["nom_d"]) &&
    isset($_POST["prenom_d"]) &&
    isset($_POST["email_d"]) &&
    isset($_POST["telephone_d"]) &&
    isset($_POST["cv_d"]) &&
    isset($_POST["lettre_motivation"]) &&
    isset($_POST["id_o"]) &&
    isset($_POST["date_d"]) &&
    isset($_POST["status_d"])
) {
    // Vérifier si les champs requis ne sont pas vides
    if (
        !empty($_POST["id_etudiant"]) &&
        !empty($_POST["nom_d"]) &&
        !empty($_POST["prenom_d"]) &&
        !empty($_POST["email_d"]) &&
        !empty($_POST["telephone_d"]) &&
        !empty($_POST["cv_d"]) &&
        !empty($_POST["lettre_motivation"]) &&
        !empty($_POST["id_o"]) &&
        !empty($_POST["date_d"]) &&
        !empty($_POST["status_d"])
    ) {
        // Créer un nouvel objet Demande
        $demande = new Demande(
            null, // Laisser l'ID être défini automatiquement
            $_POST["id_etudiant"],
            $_POST["nom_d"],
            $_POST["prenom_d"],
            $_POST["email_d"],
            $_POST["telephone_d"],
            $_POST["cv_d"],
            $_POST["lettre_motivation"],
            $_POST["id_o"],
            new DateTime($_POST['date_d']),
            $_POST["status_d"]
        );

        // Ajouter la demande à la base de données
        $demandeC->addDemande($demande);

        // Rediriger vers la liste des demandes après l'ajout
        header('Location:ListeDemandes.php');
        exit; // Terminer le script après la redirection
    } else {
        $error = "Missing information";
    }
}
?>
