<?php
include '../Controller/EntrepriseC.php';

$error = "";

// create entreprise
$entreprise = null;

// create an instance of the controller
$entrepriseC = new EntrepriseC();
if (
    isset($_POST["idEntreprise"]) &&
    isset($_POST["nomEntreprise"]) &&
    isset($_POST["adresse"]) &&
    isset($_POST["telephone1"]) &&
    isset($_POST["telephone2"]) &&
    isset($_POST["email"]) &&
    isset($_POST["dateCreation"]) &&
    isset($_POST["idCategorie"])&&
    isset($_POST["cheminImage"])
) {
    if (
        !empty($_POST["idEntreprise"]) &&
        !empty($_POST["nomEntreprise"]) &&
        !empty($_POST["adresse"]) &&
        !empty($_POST["telephone1"]) &&
        !empty($_POST["telephone2"]) &&
        !empty($_POST["email"]) &&
        !empty($_POST["dateCreation"]) &&
        !empty($_POST["idCategorie"])&&
        !empty($_POST["cheminImage"])
    ) {
        $entreprise = new Entreprise(
            $_POST["idEntreprise"],
            $_POST["nomEntreprise"],
            $_POST["adresse"],
            $_POST["telephone1"],
            $_POST["telephone2"],
            $_POST["email"],
            new DateTime($_POST["dateCreation"]),
            $_POST["idCategorie"],
            $_POST["cheminImage"] // Ajout de la nouvelle propriété cheminImage
        );
        $entrepriseC->updateEntreprise($entreprise, $_POST["idEntreprise"]);
        header('Location:ListEntreprise.php');
    } else {
        $error = "Missing information";
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Quixlab - Bootstrap Admin Dashboard Template by Themefisher.com</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="images/favicon.png">
    <!-- Custom Stylesheet -->
    <link href="quixlab-master\css\style.css" rel="stylesheet">

</head>

<body>
    <button><a href="ListEntreprise.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idEntreprise'])) {
        $entreprise = $entrepriseC->showEntreprise($_POST['idEntreprise']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idEntreprise">Id Entreprise:
                        </label>
                    </td>
                    <td><input type="text" name="idEntreprise" id="idEntreprise" value="<?php echo $entreprise['idEntreprise']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nomEntreprise">Nom de l'entreprise:
                        </label>
                    </td>
                    <td><input type="text" name="nomEntreprise" id="nomEntreprise" value="<?php echo $entreprise['nomEntreprise']; ?>" maxlength="100"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresse">Adresse:
                        </label>
                    </td>
                    <td><input type="text" name="adresse" id="adresse" value="<?php echo $entreprise['adresse']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="telephone1">Téléphone 1:
                        </label>
                    </td>
                    <td>
                        <input type="tel" name="telephone1" value="<?php echo $entreprise['telephone1']; ?>" id="telephone1">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="telephone2">Téléphone 2:
                        </label>
                    </td>
                    <td>
                        <input type="tel" name="telephone2" value="<?php echo $entreprise['telephone2']; ?>" id="telephone2">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="email">Email:
                        </label>
                    </td>
                    <td>
                        <input type="email" name="email" value="<?php echo $entreprise['email']; ?>" id="email">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="dateCreation">Date de création:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dateCreation" id="dateCreation" value="<?php echo $entreprise['dateCreation']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="idCategorie">Catégorie:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="idCategorie" value="<?php echo $entreprise['idCategorie']; ?>" id="idCategorie">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="cheminImage">Chemin de l'image:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="cheminImage" value="<?php echo $entreprise['cheminImage']; ?>" id="cheminImage">
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
