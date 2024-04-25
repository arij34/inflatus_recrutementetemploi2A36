<?php
include '../Controller/categorieevnC.php';
$CategorieevnC = new CategorieevnC();
$CategorieevnC->deletecategorieevn($_POST["idCategorieEVN"]);
header('Location:ListCategorieevn.php');