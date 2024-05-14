<?php

include '../controller/offreC.php';

$error = "";

// create offre
$offre = null;

// create an instance of the controller
$offreC = new OffreC();
if (
    isset($_POST["id_o"]) &&
    isset($_POST["id_dom"]) &&
    isset($_POST["titre"]) &&
    isset($_POST["description_o"]) &&
    isset($_POST["type_o"]) &&
    isset($_POST["idEntreprise"]) &&
    isset($_POST["lieu"]) &&
    isset($_POST["date_publication"]) &&
    isset($_POST["date_limite"]) &&
    isset($_POST["contact"]) &&
    isset($_POST["status_o"])
) {
    if (
        !empty($_POST["id_o"]) &&
        !empty($_POST["id_dom"]) &&
        !empty($_POST["titre"]) &&
        !empty($_POST["description_o"]) &&
        !empty($_POST["type_o"]) &&
        !empty($_POST["idEntreprise"]) &&
        !empty($_POST["lieu"]) &&
        !empty($_POST["date_publication"]) &&
        !empty($_POST["date_limite"]) &&
        !empty($_POST["contact"]) &&
        !empty($_POST["status_o"])
    ) {
        $offre = new Offre(
            $_POST["id_o"],
            $_POST["id_dom"],
            $_POST["titre"],
            $_POST["description_o"],
            $_POST["type_o"],
            $_POST["idEntreprise"],
            $_POST["lieu"],
            new DateTime($_POST["date_publication"]),
            new DateTime($_POST["date_limite"]),
            $_POST["contact"],
            $_POST["status_o"]
        );
        $offreC->updateOffre($offre, $_POST["id_o"]);
        header('Location:ListeOffres.php');
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
    <title>offre Display</title>
</head>

<body>
    <button><a href="ListeOffres.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
   if (isset($_POST['update'])) {
        $offre = $offreC->showOffre($_POST['id_o']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_o">Id offre:</label>
                    </td>
                    

                    <td><input type="hidden" name="id_o" value="<?php echo $offre['id_o']; ?>"> </td>
                </tr>
                <tr>
                    <td>
                        <label for="id_dom">Domaine Informatique:</label>
                    </td>
                    <td><input type="text" name="id_dom" id="id_dom" value="<?php echo $offre['id_dom']; ?>" maxlength="100"></td>
                </tr>
                <tr>
                    <td>
                        <label for="titre">Titre:</label>
                    </td>
                    <td><input type="text" name="titre" id="titre" value="<?php echo $offre['titre']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="description_o">Description:</label>
                    </td>
                    <td><input type="text" name="description_o" id="description_o" value="<?php echo $offre['description_o']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="type_o">Type:</label>
                    </td>
                    <td><input type="text" name="type_o" id="type_o" value="<?php echo $offre['type_o']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="idEntreprise">idEntreprise:</label>
                    </td>
                    <td><input type="text" name="idEntreprise" id="idEntreprise" value="<?php echo $offre['idEntreprise']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lieu">Lieu:</label>
                    </td>
                    <td><input type="text" name="lieu" id="lieu" value="<?php echo $offre['lieu']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="date_publication">Date Publication:</label>
                    </td>
                    <td>
                        <input type="date" name="date_publication" id="date_publication" value="<?php echo $offre['date_publication']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date_limite">Date Limite:</label>
                    </td>
                    <td>
                        <input type="date" name="date_limite" id="date_limite" value="<?php echo $offre['date_limite']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="contact">Contact:</label>
                    </td>
                    <td><input type="text" name="contact" id="contact" value="<?php echo $offre['contact']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="status_o">Status:</label>
                    </td>
                    <td><input type="text" name="status_o" id="status_o" value="<?php echo $offre['status_o']; ?>" maxlength="255"></td>
                </tr>
                <form action="" method="POST">
    <input type="hidden" name="id_o" value="<?php echo $offre['id_o']; ?>">
    <table border="1" align="center">
        <!-- Reste du formulaire -->
        <tr>
            <td></td>
            <td>
                <input type="submit" name="update" value="Update">
            </td>
            <td>
                <input type="reset" value="Reset">
            </td>
        </tr>
    </table>
</form>


            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>
