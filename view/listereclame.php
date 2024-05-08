<?php
// Inclure le fichier de la classe RecruteurC.php pour accéder aux méthodes
include '../contrller/RecruteurC.php';

$reclamationC =  new reclamationC();

// Récupérer la catégorie sélectionnée depuis le formulaire
$categorie_reclamation = isset($_POST['categorie_reclamation']) ? $_POST['categorie_reclamation'] : null;

// Utiliser la méthode Listereclames avec la catégorie sélectionnée comme argument
$list = $reclamationC->Listereclames($categorie_reclamation);

// Vérifier si un bouton de tri a été cliqué
if (isset($_POST['tri_asc'])) {
    // Trier les réclamations par ordre de proximité (ascendant)
    usort($list, function($a, $b) {
        return strtotime($a['date']) - strtotime($b['date']);
    });
}

// Tableau de mots interdits
$badWords = array("sirine", "israel", "eya");

// Fonction pour remplacer les mots interdits par des étoiles
function filterBadWords($input) {
    global $badWords;
    foreach ($badWords as $word) {
        $input = str_ireplace($word, str_repeat("*", strlen($word)), $input);
    }
    return $input;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <title>Liste des Réclamations</title>
    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="css/fontawesome.css">
    <link rel="stylesheet" href="css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="css/animated.css">
    <link rel="stylesheet" href="css/owl.css">
    <!-- Custom CSS -->
    <style>
        /* Importation d'une police Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');
        
        /* Utilisation de la police Roboto */
        body {
            font-family: 'Roboto', sans-serif;
            margin-top: 120px; /* Augmentation de la marge supérieure */
        }

        .rectangle {
            background-color: #fff; /* Couleur de fond */
            border: 1px solid red; /* Bordure rouge de 1 pixel d'épaisseur */
            width: 100%;
            max-width: 800px;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            margin: 20px auto;
            text-align: left;
            position: relative;
        }

        .button {
            background-color: #fe3f40; /* Modification de la couleur de fond */
            font-size: 15px;
            font-weight: 400;
            color: #fff;
            text-transform: capitalize;
            padding: 12px 25px;
            border-radius: 23px;
            letter-spacing: 0.25px;
            border: none;
            outline: none;
            transition: all .3s;
            margin-right: 10px; /* Espacement entre les boutons */
            font-family: 'Roboto', sans-serif; /* Utilisation de la police Roboto */
        }

        .button:hover {
            background-color: #03a4ed; /* Couleur de fond au survol */
        }

        .search-button {
            background-color: #fe3f40; /* Couleur de fond du bouton */
            color: #fff; /* Couleur du texte */
            border: none; /* Supprimer la bordure */
            border-radius: 50%; /* Bordure arrondie pour donner une forme de cercle */
            padding: 10px; /* Espacement à l'intérieur du bouton */
            cursor: pointer; /* Curseur au survol */
            outline: none; /* Supprimer la bordure au focus */
            transition: background-color 0.3s; /* Animation de transition de la couleur de fond */
        }

        .search-button:hover {
            background-color: #03a4ed; /* Couleur de fond au survol */
        }

        /* Styliser l'icône de loupe */
        .search-button i {
            font-size: 18px; /* Taille de l'icône */
        }

        .animated-image {
            position: absolute;
            top: 10%;
            right: 20px;
            transform: translateY(-50%);
            animation: slideInRight 1s ease forwards;
            width: 200px; /* Ajuster la largeur de l'image */
            height: auto; /* Garder les proportions de l'image */
        }

        @keyframes slideInRight {
            from {
                transform: translateX(100%);
            }
            to {
                transform: translateX(0);
            }
        }
    </style>
</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s" style="position: fixed; top: 0; width: 100%; z-index: 1000;">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <h4>kha<span>Damni</span></h4>
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">Offres&semandes</a></li>
                            <li class="scroll-to-section"><a href="#services">Entretien</a></li>
                            <li class="scroll-to-section"><a href="#portfolio">Evenement</a></li>
                            <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
                            <li class="scroll-to-section"><a href="#contact">Réclamation</a></li> 
                            <li class="scroll-to-section"><div class="main-red-button"><a href="#contact">Contact Now</a></div></li> 
                        </ul>        
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- Votre formulaire de recherche -->
    <form method="POST" action="listereclame.php">
        <div class="form-inputs" style="display: flex;">
            <div class="input-box" style="display: inline-block; margin-right: 20px;">
                <select name="categorie_reclamation" class="input-field select-field" style="width: 200px; padding: 10px; border: 2px solid #03a4ed; border-radius: 20px; margin-left: auto; margin-right: auto;" required>
                    <option value="" disabled selected hidden>categorie_reclamation</option>
                    <option value="Probleme_connexion">Probleme_connexion</option>
                    <option value="Annonces_trompeuses">Annonces_trompeuses</option>
                    <option value="Probleme_recruteurs">Probleme_recruteurs</option>
                    <option value="Problemes_techniques">Problemes_techniques</option> 
                    <!-- Add more options as needed -->
                </select>
            </div>
            <div class="input-box" style="display: inline-block;">
                <!-- Ajouter l'icône de recherche -->
                <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
            </div>
        </div>
    </form>

    <!-- Ajouter un bouton pour trier les réclamations -->
   <!-- Ajouter un bouton pour trier les réclamations -->
<!-- Ajouter un bouton pour trier les réclamations -->
<!-- Ajouter un bouton pour trier les réclamations -->


<form method="POST" action="listereclame.php" style="margin-top: 20px; text-align: right;">
    <button type="submit" class="button" name="tri_asc" style="background-color: #03a4ed; border: 2px solid #03a4ed; color: #fff;">
        Trier vos reclamations
    </button>
</form>
<!-- Votre contenu de page -->
    <?php if ($list) { // Vérifie si $list contient des données ?>
        <?php foreach ($list as $reclamation) { ?>
            <div class="rectangle">
                <div class="col-lg-6">
                    <div class="card" style="width: 1200px;">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <div class="list-group">
                                <div class="list-group-item" style="text-align: left;"> <!-- Alignement du texte à gauche -->
                                    
                                    <p class="mb-1">Date: <?php echo $reclamation['date']; ?></p>
                                    <p class="mb-1">Catégorie: <?php echo $reclamation['categorie_reclamation']; ?></p>
                                    <p class="mb-1">Explication: <?php echo filterBadWords($reclamation['explication']); ?></p>
                                    <form method="POST" action="updaterecruteur.php" style="display: inline-block;">
                                        <input type="hidden" value="<?php echo $reclamation['id_reclamation']; ?>" name="id_reclamation">
                                        <button type="submit" class="button" name="edit"><i class="fa fa-pencil"></i> Modifier</button>
                                    </form>
                                    <form method="POST" action="deleterecruteur.php" style="display: inline-block;">
                                        <input type="hidden" value="<?php echo $reclamation['id_reclamation']; ?>" name="id_reclamation">
                                        <button type="submit" class="button" name="delete"><i class="fa fa-trash"></i> Supprimer</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <img src="blog-dec.png" alt="Votre Image" class="animated-image">
            </div>
        <?php } ?>
    <?php } else { ?>
        <p>Aucune réclamation trouvée.</p>
    <?php } ?>
    
    <!-- Scripts JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/animation.js"></script>
    <script src="assets/js/imagesloaded.js"></script>
    <script src="assets/js/templatemo-custom.js"></script>
</body>

</html>
