<?php
include '../Controller/EntrepriseC.php';

$error = "";

// create employe
$entreprise = null;

// create an instance of the controller
$entrepriseC = new EntrepriseC();
if (
    isset($_POST["nomEntreprise"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["telephone1"]) &&
    isset($_POST["telephone2"]) &&
    isset($_POST["email"]) &&
    isset($_POST["dateCreation"]) &&
    isset($_POST["idCategorie"]) &&
    isset($_POST["cheminImage"]) // Ajout de la vérification de la nouvelle propriété cheminImage
) {
    if (
        !empty($_POST["nomEntreprise"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["telephone1"]) &&
        !empty($_POST["telephone2"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["dateCreation"]) &&
        !empty($_POST["idCategorie"]) &&
        !empty($_POST["cheminImage"]) // Ajout de la vérification de la nouvelle propriété cheminImage
    ) {
        $entreprise = new Entreprise(
            NULL,
            $_POST["nomEntreprise"],
            $_POST["adresse"],
            $_POST["telephone1"],
            $_POST["telephone2"],
            $_POST["email"],
            new DateTime($_POST['dateCreation']),
            $_POST["idCategorie"],
            $_POST["cheminImage"] // Passer la valeur de la nouvelle propriété cheminImage
        );
        $entrepriseC->addEntreprise($entreprise);
        header('Location:ListEntreprise.php');
    } else {
        $error = "Missing information";
    }
}

