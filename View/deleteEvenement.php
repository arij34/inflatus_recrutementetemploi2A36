<?php
include '../Controller/EvenementC.php';
$evenementC = new EvenementC();
$evenementC->deleteEvenement($_POST["idEvenement"]);
//header('Location:ListEvenement.php');