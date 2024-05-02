<?php
include '../Controller/categorieevnC.php';

$error = "";

// create CategorieEVN
$categorieevn = null;

// create an instance of the controller
$categorieevnC = new CategorieevnC();
if (
    isset($_POST["idCategorieEVN"]) &&
    isset($_POST["nomCategorieEVN"])
) {
    if (
        !empty($_POST["idCategorieEVN"]) &&
        !empty($_POST["nomCategorieEVN"])
    ) {
        $categorieevn  = new categorieevn(
            $_POST["idCategorieEVN"],
            $_POST["nomCategorieEVN"]
        );
        $categorieevnC->updateCategorieevn($categorieevn, $_POST["idCategorieEVN"]);
        header('Location:ListCategorieevn.php');
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
    <button><a href="ListCategorieevn.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['idCategorieEVN'])) {
       $categorieevn= $categorieevnC->showcategorieevn($_POST['idCategorieEVN']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="idCategorieEVN">Id categorie:
                        </label>
                    </td>
                    <td><input type="text" name="idCategorieEVN" id="idCategorieEVN" value="<?php echo $categorieevn['idCategorieEVN']; ?>" maxlength="20"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nomCategorieEVN">Nom :
                        </label>
                    </td>
                    <td><input type="text" name="nomCategorieEVN" id="nomCategorieEVN" value="<?php echo $categorieevn['nomCategorieEVN']; ?>" maxlength="100"></td>
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
