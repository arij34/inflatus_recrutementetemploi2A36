<?php
include '../controler/entretienC.php';

$userC2 = new UserC2();

if (isset($_GET["id_test"])) {
    $userC2->deleteUser2($_GET["id_test"]);
}

header('Location: ../view/listuser.php');
?>