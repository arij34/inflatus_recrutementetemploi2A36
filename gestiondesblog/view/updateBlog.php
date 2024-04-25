<?php
include '../controller/BlogC.php';

$blogC = new BlogC();

$error = "";
$success_message = "";
$blog = null;

if (isset($_POST["idBlog"]) && !empty($_POST["idBlog"])) {
    $idBlog = $_POST["idBlog"];
    $blog = $blogC->getBlogById($idBlog);
    if (!$blog) {
        $error = "Aucun blog trouvé pour l'identifiant fourni.";
    }
}

if (isset($_POST["modifier"]) && $blog) {
    // Les données du formulaire ont été soumises
    // Récupération des valeurs soumises
    $titre = isset($_POST['titre']) ? $_POST['titre'] : '';
    $contenu = isset($_POST['contenu']) ? $_POST['contenu'] : '';
    $auteur = isset($_POST['auteur']) ? $_POST['auteur'] : '';
    $dateDePublication = isset($_POST['dateDePublication']) ? $_POST['dateDePublication'] : '';
    $etiquette = isset($_POST['etiquette']) ? $_POST['etiquette'] : '';

    // Vérification des champs requis
    if (empty($titre) || empty($contenu) || empty($auteur) || empty($dateDePublication) || empty($etiquette)) {
        $error = "Tous les champs doivent être remplis";
    } else {
        // Mise à jour du blog
        $result = $blogC->updateBlog($idBlog, $titre, $contenu, $auteur, $dateDePublication, $etiquette);

        // Vérification si la mise à jour a réussi
        if ($result) {
            // Affichage du message de succès
            $success_message = "Modifications enregistrées avec succès.";
        } else {
            $error = "Erreur lors de la mise à jour du blog.";
        }
    }
}

// Redirection uniquement si la modification a été effectuée avec succès
if (!empty($success_message)) {
    header("Location: ListBlogs.php?idBlog=$idBlog&success_message=" . urlencode($success_message));
    exit(); // Arrêter l'exécution du script après la redirection
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Update</title>
</head>

<body>
    <button><a href="ListEmployes.php">Retour à la liste</a></button>
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <!-- Formulaire de mise à jour du blog -->
    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td>
                    <label for="idBlog">ID du blog:</label>
                </td>
                <td><input type="text" name="idBlog" id="idBlog" value="<?php echo isset($blog['idblog']) ? $blog['idblog'] : ''; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td>
                    <label for="titre">Titre:</label>
                </td>
                <td><input type="text" name="titre" id="titre" value="<?php echo isset($blog['titre']) ? $blog['titre'] : ''; ?>" maxlength="255"></td>
            </tr>
            <tr>
                <td>
                    <label for="contenu">Contenu:</label>
                </td>
                <td><textarea name="contenu" id="contenu" maxlength="1000"><?php echo isset($blog['contenu']) ? $blog['contenu'] : ''; ?></textarea></td>
            </tr>
            <tr>
                <td>
                    <label for="auteur">Auteur:</label>
                </td>
                <td><input type="text" name="auteur" id="auteur" value="<?php echo isset($blog['auteur']) ? $blog['auteur'] : ''; ?>" maxlength="100"></td>
            </tr>
            <tr>
                <td>
                    <label for="datedepublication">Date de Publication:</label>
                </td>
                <td><input type="date" name="datedepublication" id="datedepublication" value="<?php echo isset($blog['datedepublication']) ? $blog['datedepublication'] : ''; ?>"></td>
            </tr>
            <tr>
                <td>
                    <label for="etiquette">Tags:</label>
                </td>
                <td><input type="text" name="etiquette" id="etiquette" value="<?php echo isset($blog['etiquette']) ? $blog['etiquette'] : ''; ?>" maxlength="255"></td>
            </tr>
            <tr>
                <td></td>
                <td>
                    <input type="submit" value="Mettre à jour">
                </td>
                <td>
                    <input type="reset" value="Réinitialiser">
                </td>
            </tr>
        </table>
    </form>
</body>

</html>
