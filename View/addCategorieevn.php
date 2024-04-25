<?php
include '../Controller/categorieevnC.php'; // Inclure le fichier EvenementC.php
$error = "";
$categorieevn = null;

// create an instance of the controller
$categorieevnC = new CategorieevnC();
if (
    isset($_POST["nomCategorieEVN"]) &&
) {
    if (
        !empty($_POST["nomCategorieEVN"]) &&
    ) {
        $categorieevn = new Categorieevn(
            NULL,
            $_POST["nomCategorieEVN"],
        );
        $categorieevnC->addcategorieevn($categorieevn);
        header('Location:ListCategorieevn.php');
    } else {
        $error = "Missing information";
    }
}
?>
