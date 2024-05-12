<?php
include 'C:/xampp/htdocs/web/gestionUser/controller/EntrepriseC.php';
$entrepriseC = new EntrepriseC();
$entrepriseC->deleteEntreprise($_POST["idE"]);
header('Location:http://localhost/web/gestionUser/view/entreprise/table.php');