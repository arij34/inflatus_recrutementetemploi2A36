<?php
include '../controler/entretienC.php';

$userC2 = new UserC2();

if (isset($_GET["id_test"])) {
    $userC2->deleteUser2($_GET["id_test"]);
}

<<<<<<< HEAD
header('Location: ../view/table-basic.php');
=======
header('Location: ../view/listuser.php');
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
?>