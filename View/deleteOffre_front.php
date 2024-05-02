<?php
include '../Controller/OffreC.php';
$offreC = new OffreC();
if (isset($_POST["id_o"])) {
    $offreC->deleteOffre($_POST["id_o"]);
    header('Location: ListeOffres_front.php');
    exit;
} else {
    echo "ID de l'offre non spécifié";
}
?>
