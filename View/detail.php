<?php
include '../Controller/EvenementC.php';

// Instanciation de la classe EvenementC
$evenementC = new EvenementC();

// Vérifier si l'identifiant de l'Evenement est défini dans la requête
if(isset($_GET['id'])) {
    // Récupérez l'ID de l'Evenement depuis l'URL
    $idEvenement = $_GET['id'];
    
    // Utilisez la méthode getEvenementById() pour récupérer les détails de l'Evenement
    $evenement = $evenementC->showEvenement($idEvenement);

    // Vérifiez si l'Evenement existe
    if($evenement) {
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="CodeHim">
    <title>Detail de l'Evenement - Dashboard Profile Page Theme Color CSS Vanilla JS Example </title>
    <!-- Style CSS -->
    <link rel="stylesheet" href="user-profile-page-template-in-html-css/css/style.css">
    <!-- Demo CSS (No need to include it into your project) -->
    <link rel="stylesheet" href="user-profile-page-template-in-html-css/css/demo.css">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&display=swap" rel="stylesheet">
</head>
<body>
<header class="cd__intro">
    <h1> Detail de l'Evenement - Dashboard Profile Page Theme Color CSS Vanilla JS Example </h1>
</header>
<main class="cd__main">
    <div class="profile-page">
        <div class="content">
            <div class="content__cover">
                <div class="content__avatar">
                </div>
                <div class="content__bull">
                </div>
            </div>
            <div class="content__title">
                <h1><?php echo $evenement['nomEvenement']; ?></h1><span><?php echo $evenement['adresseEVN']; ?></span>
            </div>
            <div class="content__description">
                <p><?php echo $evenement['dateEVN']; ?></p>
                <p><?php echo $evenement['idCategorieEVN']; ?></p>
            </div>
        </div>
        <div class="bg">
            <div><span></span><span></span><span></span><span></span><span></span><span></span><span></span>
            </div>
        </div>
        <div class="theme-switcher-wrapper" id="theme-switcher-wrapper"><span>Themes color</span>
            <ul>
               <li><em class="is-active" data-theme="orange"></em></li>
               <li><em data-theme="blue"></em></li>
            </ul>
         </div>
         <div class="theme-switcher-button" id="theme-switcher-button">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
               <path fill="currentColor" d="M352 0H32C14.33 0 0 14.33 0 32v224h384V32c0-17.67-14.33-32-32-32zM0 320c0 35.35 28.66 64 64 64h64v64c0 35.35 28.66 64 64 64s64-28.65 64-64v-64h64c35.34 0 64-28.65 64-64v-32H0v32zm192 104c13.25 0 24 10.74 24 24 0 13.25-10.75 24-24 24s-24-10.75-24-24c0-13.26 10.75-24 24-24z"></path>
            </svg>
         </div>
      </div>
</main>
<!-- Script JS -->
<script src="user-profile-page-template-in-html-css/js/script.js"></script>
<!--$%analytics%$-->
</body>
</html>

<?php
    } else {
        echo "L'Evenement avec l'ID spécifié n'existe pas.";
    }
} else {
    echo "L'identifiant de l'Evenement n'est pas spécifié.";
}
?>
