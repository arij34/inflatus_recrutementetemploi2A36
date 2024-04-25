<?php
include '../Controller/categorieevnC.php';

$error = "";

// create CategorieEVN
$categorieEVN = null;

// create an instance of the controller
$categorieEVNC = new CategorieevnC();
if (
    isset($_POST["idCategorieEVN"]) &&
    isset($_POST["nomCategorieEVN"])
) {
    if (
        !empty($_POST["idCategorieEVN"]) &&
        !empty($_POST["nomCategorieEVN"])
    ) {
        $categorieEVN = new categorieevn(
            $_POST["idCategorieEVN"],
            $_POST["nomCategorieEVN"]
        );
        $CategorieEVNC->updateCategorieevn($CategorieEVN, $_POST["idCategorieEVN"]);
        header('Location:ListCategorieevn.php');
    } else {
        $error = "Missing information";
    }
}
?>
