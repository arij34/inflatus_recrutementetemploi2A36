<?php
include '../controller/UserC.php';

$userC = new UserC();

if (isset($_GET["idEtudiant"])) {
    $userC->deleteUser($_GET["idEtudiant"]);
}

header('Location: ../view/afficher.php');
?>
