<?php
include '../controler/entretienC.php';

$userC = new UserC();

if (isset($_GET["id_test"])) {
    $userC->deleteUser($_GET["id_test"]);
}

header('Location: ../view/listuser.php');
?>