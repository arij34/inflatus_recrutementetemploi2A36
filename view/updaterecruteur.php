<?php

include '../Contrller/RecruteurC.php';

$error = "";


// Créer une instance de réclamation
$reclamation = null;

// Créer une instance du contrôleur de réclamation
$reclamationC = new reclamationC();
if (
    isset($_POST["id_reclamation"]) &&
    isset($_POST["prenom"]) &&
    isset($_POST["nom"]) &&
    isset($_POST["email"]) &&
    isset($_POST["tel"]) &&
    isset($_POST["date"]) &&
    isset($_POST["categorie_reclamation"]) &&
    isset($_POST["explication"])
) {
    if (
        !empty($_POST["id_reclamation"]) &&
        !empty($_POST["prenom"]) &&
        !empty($_POST["nom"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["tel"]) &&
        !empty($_POST["date"]) &&
        !empty($_POST["categorie_reclamation"]) &&
        !empty($_POST["explication"])
    ) {
        // Créer un objet reclamation
        $reclamation = new reclamation(
            $_POST['id_reclamation'],
            $_POST['prenom'],
            $_POST['nom'],
            $_POST['email'],
            $_POST['tel'],
            new DateTime($_POST['date']),
            $_POST['categorie_reclamation'],
            $_POST['explication']
        );
        // Mettre à jour la réclamation
        $reclamationC->updatereclamation($reclamation, $_POST["id_reclamation"]);
        // Rediriger vers la page de liste
        header('Location:listerecruteur.php');
        exit(); // Arrêter l'exécution du script après la redirection
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reclamation Display</title>
</head>

<body>
    <button><a href="listerecruteur.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id_reclamation'])) {
        $reclamation = $reclamationC->showrecruteur($_POST['id_reclamation']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_reclamation">id_reclamation:
                        </label>
                    </td>
                    <td><input type="text" name="id_reclamation" id="id_reclamation" value="<?php echo $reclamation['id_reclamation']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom">prenom :
                        </label>
                    </td>
                    <td><input type="text" name="prenom" id="prenom" value="<?php echo $reclamation['prenom']; ?>" maxlength="100"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom">nom:
                        </label>
                    </td>
                    <td><input type="text" name="nom" id="nom" value="<?php echo $reclamation['nom']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email">email:
                        </label>
                    </td>
                    
                    <td><input type="text" name="email" id="email" value="<?php echo $reclamation['email']; ?>" maxlength="255"></td>
                    
                </tr>
                <tr>
                    <td>
                        <label for="tel">tel:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="tel" value="<?php echo $reclamation['tel']; ?>" id="tel">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date">date:
                        </label>
                    </td>
                    <td>
                    <input type="date" name="date" id="date" value="<?php echo $reclamation['date']; ?>">
                    </td>
                </tr>
                
                <tr>
                    <td>
                        <label for="categorie_reclamation">Catégorie:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="categorie_reclamation" value="<?php echo $reclamation['categorie_reclamation']; ?>" id="categorie_reclamation">
                    </td>
                </tr>

                <tr>
                    <td>
                        <label for="explication">explication:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="explication" value="<?php echo $reclamation['explication']; ?>" id="explication">
                    </td>
                </tr>

                <tr>
                    <td></td>
                    <td>
                        <input type="submit" value="Update">
                    </td>
                    <td>
                        <input type="reset" value="Reset">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>
