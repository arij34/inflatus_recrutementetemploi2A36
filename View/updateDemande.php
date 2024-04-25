<?php
include '../Controller/demandeC.php';

$error = "";

// create offre
$demande = null;

// create an instance of the controller
$demandeC = new DemandeC();
if (
    isset($_POST["id_d"]) &&
    isset($_POST["id_etudiant"]) &&
    isset($_POST["nom_d"]) &&
    isset($_POST["prenom_d"]) &&
    isset($_POST["email_d"]) &&
    isset($_POST["telephone_d"]) &&
    isset($_POST["cv_d"]) &&
    isset($_POST["lettre_motivation"]) &&
    isset($_POST["id_o"]) &&
    isset($_POST["date_d"]) &&
    isset($_POST["status_d"])
) {
    if (
        !empty($_POST["id_d"]) &&
        !empty($_POST["id_etudiant"]) &&
        !empty($_POST["nom_d"]) &&
        !empty($_POST["prenom_d"]) &&
        !empty($_POST["email_d"]) &&
        !empty($_POST["telephone_d"]) &&
        !empty($_POST["cv_d"]) &&
        !empty($_POST["lettre_motivation"]) &&
        !empty($_POST["id_o"]) &&
        !empty($_POST["date_d"]) &&
        !empty($_POST["status_d"])
    ) {
        $demande = new Demande(
            $_POST["id_d"],
            $_POST["id_etudiant"],
            $_POST["nom_d"],
            $_POST["prenom_d"],
            $_POST["email_d"],
            $_POST["telephone_d"],
            $_POST["cv_d"],
            $_POST["lettre_motivation"],
            $_POST["id_o"],
            new DateTime($_POST['date_d']),
            $_POST["status_d"]
        );
        $demandeC->updateDemande($demande, $_POST["id_d"]);
        header('Location:ListeDemandes.php');
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
    <title>demande Display</title>
</head>

<body>
    <button><a href="ListeDemandes.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
   if (isset($_POST['update'])) {
        $demande = $demandeC->showDemande($_POST['id_d']);

    ?>

        <form action="" method="POST">
            <table border="1" align="center">
                <tr>
                    <td>
                        <label for="id_d">Id demande:</label>
                    </td>
                    <td>
                        <input type="hidden" name="id_d" value="<?php echo $demande['id_d']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="id_etudiant">id_etudiant:</label>
                    </td>
                    <td><input type="text" name="id_etudiant" id="did_etudiant" value="<?php echo $demande['id_etudiant']; ?>" maxlength="100"></td>
                </tr>
                <tr>
                    <td>
                        <label for="nom_d">nom_d:</label>
                    </td>
                    <td><input type="text" name="nom_d" id="nom_d" value="<?php echo $demande['nom_d']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="prenom_d">prenom_d:</label>
                    </td>
                    <td><input type="text" name="prenom_d" id="prenom_d" value="<?php echo $demande['prenom_d']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="email_d">email_d:</label>
                    </td>
                    <td><input type="text" name="email_d" id="email_d" value="<?php echo $demande['email_d']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="telephone_d">telephone_d:</label>
                    </td>
                    <td><input type="text" name="telephone_d" id="telephone_d" value="<?php echo $demande['telephone_d']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="cv_d">cv_d:</label>
                    </td>
                    <td><input type="text" name="cv_d" id="cv_d" value="<?php echo $demande['cv_d']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="lettre_motivation">lettre_motivation:</label>
                    </td>
                    <td><input type="text" name="lettre_motivation" id="lettre_motivation" value="<?php echo $demande['lettre_motivation']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td>
                        <label for="id_o">id_o:</label>
                    </td>
                    <td>
                        <input type="text" name="id_o" id="id_o" value="<?php echo $demande['id_o']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="date_d">date_d:</label>
                    </td>
                    <td>
                        <input type="date" name="date_d" id="date_d" value="<?php echo $demande['date_d']; ?>">
                    </td>
                </tr>
                <tr>
                    <td>
                        <label for="status_d">Status:</label>
                    </td>
                    <td><input type="text" name="status_d" id="status_d" value="<?php echo $demande['status_d']; ?>" maxlength="255"></td>
                </tr>
                <tr>
                    <td colspan="2" align="center">
                        <input type="submit" name="update" value="Update">
                    </td>
                </tr>
            </table>
        </form>
    <?php
    }
    ?>
</body>

</html>
