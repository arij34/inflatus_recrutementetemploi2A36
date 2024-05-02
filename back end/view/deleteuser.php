<?php
include '../controler/testC.php';

$userC = new UserC();

if (isset($_GET["id_test"])) {
    $userC->deleteUser($_GET["id_test"]);
}

header('Location: ../view/table-basic.php');
?>