<?php
include '..\contrller\reponseC.php';
$reponseC = new reponseC();
$reponseC->deletereponse($_POST[" id_reponse"]);
header('Location:listereponse.php');
