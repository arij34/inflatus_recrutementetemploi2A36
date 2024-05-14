<?php
include '../contrller/PostC.php';
$x=new PostC();
$x->DeletePost($_GET['id']);
header('location:ListePostss.php');
?>