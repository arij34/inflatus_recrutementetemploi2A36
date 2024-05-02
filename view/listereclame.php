<?php
// Inclure le fichier de la classe RecruteurC.php pour accéder aux méthodes
include '../contrller/RecruteurC.php';

// Fonction pour filtrer les mots interdits dans une chaîne et les remplacer par des étoiles
function filterBadWords($text, $badWords) {
    foreach ($badWords as $badWord) {
        $replacement = str_repeat('*', mb_strlen($badWord)); // Remplacer le mot interdit par une chaîne d'étoiles de même longueur
        $text = str_ireplace($badWord, $replacement, $text); // Remplacer le mot interdit par la chaîne d'étoiles dans le texte
    }
    return $text;
}

// Définition des mots interdits
$badWords = ['badword1', 'badword2', 'badword3']; // Ajoutez les mots interdits ici

$reclamationC =  new reclamationC();
$list = $reclamationC->listereclamation();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Réclamations</title>
    <style>
        /* Importation d'une police Google Fonts */
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap');

        /* Utilisation de la police Roboto */
        body {
            font-family: 'Roboto', sans-serif;
        }

        .rectangle {
            background-color: #ADD8E6; /* Couleur du rectangle */
            width: 100%; /* Rectangle occupe toute la largeur de la page */
            max-width: 800px; /* Largeur maximale pour limiter la largeur sur les grands écrans */
            padding: 20px; /* Espacement intérieur du contenu */
            border-radius: 10px; /* Bord arrondi */
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Ombre légère */
            margin: 20px auto; /* Marge pour centrer horizontalement */
            text-align: left; /* Alignement du texte à gauche */
            position: relative; /* Position relative pour positionner l'image */
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

        .animated-image {
            position: absolute;
            top: 50%;
            right: 20px;
            transform: translateY(-50%);
            animation: slideInRight 1s ease forwards;
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
    <?php if ($list) { // Vérifie si $list contient des données ?>
        <?php foreach ($list as $reclamation) { ?>
            <div class="rectangle">
                <div class="col-lg-6">
                    <div class="card" style="width: 1200px;">
                        <div class="card-body">
                            <h4 class="card-title"></h4>
                            <div class="list-group">
                                <div class="list-group-item" style="text-align: left;"> <!-- Alignement du texte à gauche -->
                                    <h5 class="mb-1" style="font-weight: 700;">ID: <?php echo $reclamation['id_reclamation']; ?></h5>
                                    <p class="mb-1">Date: <?php echo $reclamation['date']; ?></p>
                                    <p class="mb-1">Catégorie: <?php echo $reclamation['categorie_reclamation']; ?></p>
                                    <!-- Filtrer et afficher le champ d'explication -->
                                    <p class="mb-1">Explication: <?php echo filterBadWords($reclamation['explication'], $badWords); ?></p>
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
                <img src="contact-decoration.png" alt="Votre Image" class="animated-image">
            </div>
        <?php } ?>
    <?php } else { ?>
        <p>Aucune réclamation trouvée.</p>
    <?php } ?>

</body>

</html>
