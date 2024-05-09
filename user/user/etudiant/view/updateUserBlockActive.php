<?php
include '../controller/UserC.php';

$userC = new UserC();

if (isset($_GET["idEtudiant"])) {
    $userC->updateUserBlockActive($_GET["idEtudiant"]);
}

header('Location: afficher.php');
?>
