<?php
include '../controller/UserC.php';

$userC = new UserC();

if (isset($_GET["idR"])) {
    $userC->deleteUser($_GET["idR"]);
}

header('Location: ../dash.php');
?>
