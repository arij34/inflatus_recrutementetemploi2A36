<?php

include '../Controller/OffreC.php';

$error = "";

// create employe
$offre = null;

// create an instance of the controller
$offreC = new OffreC();

if (
    isset($_POST["domaine_informatique"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["description_o"]) &&
    isset($_POST["type_o"]) &&
    isset($_POST["entreprise"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["date_publication"]) &&
    isset($_POST["date_limite"]) &&
    isset($_POST["contact"]) &&
    isset($_POST["status_o"])
) {
    if (
        !empty($_POST["domaine_informatique"]) &&
        !empty($_POST["titre"]) &&
        !empty($_POST["description_o"]) &&
        !empty($_POST["type_o"]) &&
        !empty($_POST["entreprise"]) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST["date_publication"]) &&
        !empty($_POST["date_limite"]) &&
        !empty($_POST["contact"]) &&
        !empty($_POST["status_o"])
    ) {
        $offre = new Offre(
            null, // Laisser l'ID être défini automatiquement
            $_POST["domaine_informatique"],
            $_POST["titre"],
            $_POST["description_o"],
            $_POST["type_o"],
            $_POST["entreprise"],
            $_POST["lieu"],
            new DateTime($_POST['date_publication']),
            new DateTime($_POST['date_limite']),
            $_POST["contact"], // Assurez-vous que le contact est un entier
            $_POST["status_o"]
        );
        var_dump($_POST);
        $offreC->addOffre($offre);
        header('Location:ListeOffres.php');
        exit; // Ajout de l'exit après la redirection
    } else {
        $error = "Missing information";
    }
}
?>
