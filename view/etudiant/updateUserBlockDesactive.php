<?php
include "C:/xampp/htdocs/web/gestionUser/controller/etudiantC.php";

$userC = new UserC();

if (isset($_GET["idEtudiant"])) {
    $userC->updateUserBlockDesactive($_GET["idEtudiant"]);
}

header('Location: afficher.php');
?>
