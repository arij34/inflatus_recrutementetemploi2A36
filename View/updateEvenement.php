<?php
include '../Controller/EvenementC.php';

$error = "";

// create Evenement
$evenement = null;

// create an instance of the controller
$evenementC = new EvenementC();
if (
    isset($_POST["idEvenement"]) &&
    isset($_POST["nomEvenement"]) &&
    isset($_POST["adresseEVN"]) &&
    isset($_POST["dateEVN"]) &&
    isset($_POST["idCategorieEVN"]) 
) {
    if (
        !empty($_POST["idEvenement"]) &&
        !empty($_POST["nomEvenement"]) &&
        !empty($_POST["adresseEVN"]) &&
        !empty($_POST["dateEVN"]) &&
        !empty($_POST["idCategorieEVN"])
    ) {
        $evenement = new Evenement(
            $_POST["idEvenement"],
            $_POST["nomEvenement"],
            $_POST["adresseEVN"],
            new DateTime($_POST['dateEVN']),
            $_POST["idCategorieEVN"],
        );
        $evenementC->updateEvenement($evenement, $_POST["idEvenement"]);
        header('Location:ListEvenement.php');
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
    <button><a href="ListEvenement.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idEvenement'])) {
        $Evenement =$evenementC->showEvenement($_POST['idEvenement']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idEvenement">Id Evenement:
                        </label>
                    </td>
                    <td><input type="text" name="idEvenement" id="idEvenement" value="<?php echo $Evenement['idEvenement']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nomEvenement">Nom de l'Evenement:
                        </label>
                    </td>
                    <td><input type="text" name="nomEvenement" id="nomEvenement" value="<?php echo $Evenement['nomEvenement']; ?>" maxlength="100"></td>
                </tr>
                <tr>
                    <td>
                        <label for="adresseEVN">Adresse:
                        </label>
                    </td>
                    <td><input type="text" name="adresseEVN" id="adresseEVN" value="<?php echo $Evenement['adresseEVN']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="dateEVN">Date d'Evenement:
                        </label>
                    </td>
                    <td>
                        <input type="date" name="dateEVN" id="dateEVN" value="<?php echo $Evenement['dateEVN']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="idCategorieEVN">Catégorie d'Evenement:
                        </label>
                    </td>
                    <td>
                        <input type="text" name="idCategorieEVN" value="<?php echo $Evenement['idCategorieEVN']; ?>" id="idCategorieEVN">
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
