<?php
include '../Controller/PostC.php';
$error = "";
$post = null;
$postC = new PostC();



if (isset($_GET['ID_Post'])) {
    $postID = $_GET['ID_Post'];
    $post = $postC->showPost($postID);
    if (isset($_POST["Titre"]) && isset($_POST["Contenu"]) && isset($_POST["Auteur"]) && isset($_POST["Tags"]) && isset($_FILES["Image"]["name"])) {
        if (!empty($_POST["Titre"]) && !empty($_POST["Contenu"]) && !empty($_POST["Auteur"]) && !empty($_POST["Tags"]) && !empty($_FILES["Image"]["name"])) {
            $imageFileName = basename($_FILES["Image"]["name"]);
            $post = new Post(
                $_POST['ID_Post'],
                $_POST['Titre'],
                $_POST['Contenu'],
                $_POST['Auteur'],
                new DateTime($_POST['Date_Publication']),
                $_POST['Tags'],
                $_POST['Likes'],
                $_POST['Dislikes'],
                $_POST['Comments'],
                $imageFileName
            );
            $postC->updatePost($post, $_POST["ID_Post"]);
            header('Location:ListePostss.php');
        } else {
            $error = "Missing information";
        }
    }
}
?>

<html lang="en">
<head>
<script>
function validerForm() {
    var titre = document.getElementById("Titre").value;
    var contenu = document.getElementById("Contenu").value;
    var auteur = document.getElementById("Auteur").value;
    var tags = document.getElementById("Tags").value;
    var image = document.getElementById("Image").value;

    if (titre == "" || contenu == "" || auteur == "" || tags == "" || image == "") {
        alert("Veuillez remplir tous les champs.");
        return false;
    }

    if (!tags.startsWith("#")) {
        alert("Le tag doit commencer par un #.");
        return false;
    }

    if (titre.charAt(0) !== titre.charAt(0).toUpperCase()) {
        alert("Le titre doit commencer par une majuscule.");
        return false;
    }

    if (contenu.length <= 10) {
        alert("Le contenu doit contenir plus de 10 lettres.");
        return false;
    }

    if (/\d/.test(titre)) {
        alert("Le titre ne doit pas contenir de chiffres.");
        return false;
    }

    if (/\d/.test(auteur)) {
        alert("L'auteur ne doit pas contenir de chiffres.");
        return false;
    }

    return true;
}
</script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Display</title>
</head>
<body>
<button><a href="ListePosts.php">Back to list</a></button>
<hr>

<div id="error">
    <?php echo $error; ?>
</div>

<?php if ($post) { ?>
    <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validerForm()">
        <table border="1" align="center">
            <tr>
                <td><label for="ID_Post">Id Post:</label></td>
                <td><input type="text" name="ID_Post" id="ID_Post" value="<?php echo $post['ID_Post']; ?>" readonly disabled="disabled"></td>
            </tr>
            <tr>
                <td><label for="Titre">Titre :</label></td>
                <td><input type="text" name="Titre" id="Titre" value="<?php echo $post['Titre']; ?>"></td>
            </tr>
            <tr>
                <td><label for="Contenu">Contenu :</label></td>
                <td><input type="text" name="Contenu" id="Contenu" value="<?php echo $post['Contenu']; ?>"></td>
            </tr>
            <tr>
                <td><label for="Auteur">Auteur :</label></td>
                <td><input type="text" name="Auteur" value="<?php echo $post['Auteur']; ?>" id="Auteur"></td>
            </tr>
            <tr>
                <td><label for="Tags">Tags :</label></td>
                <td><input type="text" name="Tags" id="Tags" value="<?php echo $post['Tags']; ?>"></td>
            </tr>
            <tr>
                <td><label for="Image">Image :</label></td>
                <td>
                    <input type="file" id="Image" name="Image">
                    <?php if (!empty($_FILES["Image"]["name"])): ?>
                    <?php elseif (!empty($post['Image'])): ?>
                        <img src="../Images/<?php echo $post['Image']; ?>" alt="Current Image" width="10%">
                    <?php endif; ?>
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
<?php } ?>
</body>
</html>