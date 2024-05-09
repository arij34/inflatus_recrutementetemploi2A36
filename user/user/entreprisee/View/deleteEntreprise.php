<?php
include '../Controller/EntrepriseC.php';
$entrepriseC = new EntrepriseC();
$entrepriseC->deleteEntreprise($_POST["idE"]);
header('Location:http://localhost/web/entreprisee/view/table.php');