<?php
include '../Controller/PostC.php';
$x=new PostC();
$x->DeletePost($_GET['id']);
header('location:ListePostss.php');
?>