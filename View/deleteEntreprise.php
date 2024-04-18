<?php
include '../Controller/EntrepriseC.php';
$entrepriseC = new EntrepriseC();
$entrepriseC->deleteEntreprise($_POST["idEntreprise"]);
header('Location:ListEntreprise.php');