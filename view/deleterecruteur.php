<?php
include '..\contrller\RecruteurC.php';
$reclamationC = new reclamationC();
$reclamationC->deletereclamation($_POST["id_reclamation"]);
header('Location:listerecruteur.php');
