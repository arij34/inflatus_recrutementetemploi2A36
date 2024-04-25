<?php
include '../controller/BlogC.php';

$blogC = new BlogC();

$error = "";
$success_message = "";
$blog = null;

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize input data
    $Titre = trim($_POST['titre']);
    $Contenu = trim($_POST['contenu']);
    $Auteur = trim($_POST['auteur']);
    $DateDePublication = trim($_POST['dateDePublication']);
    $Etiquette = trim($_POST['etiquette']);

    // Validate input
    if (empty($Titre) || empty($Contenu) || empty($Auteur) || empty($DateDePublication) || empty($Etiquette)) {
        $error = "All fields are required.";
    } elseif (!preg_match("/^[a-zA-Z0-9\s]+$/", $Titre)) {
        $error = "Title can only contain letters, numbers, and spaces.";
    } elseif (!filter_var($Auteur, FILTER_VALIDATE_EMAIL)) {
        $error = "Invalid email format for Author.";
    } elseif (!strtotime($DateDePublication)) {
        $error = "Invalid date format for Publication Date.";
    } else {
        // Proceed to add the blog if there are no validation errors
        // Create a new Blog object
        $blog = new Blog(
            null,
            $Titre,
            $Contenu,
            $Auteur,
            $DateDePublication,
            $Etiquette
        );

        // Add the blog using BlogC controller
        $blogC->addBlog($blog);
        header('Location: ListEmployes.php'); // Redirect to list page
        exit(); // Stop further execution
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khadamni | Add Blog</title>
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- STYLE -->
    <link rel="stylesheet" href="../view/front end/assets/css/style.css">
    <style>
        /* Additional CSS for adjusting input box dimensions */
        .register-form .input-box {
            margin-bottom: 20px;
        }

        .register-form .input-box input,
        .register-form .input-box select {
            width: 100%;
        }
    </style>
</head>

<body>
    <a href="ListEmployes.php">Back to list</a>

    <div class="form-container">
        <div class="col col-1">
            <div class="image-layer">
                <img src="../view/front end/assets/img/about-left-image.png" class="form-image-main">
                <img src="../view/front end/assets/img/cloud.png" class="form-image cloud">
                <img src="../view/front end/assets/img/stars.png" class="form-image stars">
            </div>
            
            <p class="featured-words">Welcome to <span>Khadamni</span></p>
        </div>

        <div class="col col-2">
            <div class="login-form">
                <div class="form-title">
                    <span>Add a Blog</span>
                </div>
                <div class="form-inputs">
                    <?php if (!empty($error)) : ?>
                        <div class="error-message"><?php echo $error; ?></div>
                    <?php endif; ?>
                    <form action="" method="POST">
                        <div class="input-box">
                            <input type="text" name="titre" class="input-field" placeholder="Title" required>
                        </div>
                        <div class="input-box">
                            <textarea name="contenu" class="input-field" rows="5" cols="40" placeholder="Content" required></textarea>
                        </div>
                        <div class="input-box">
                            <input type="text" name="auteur" class="input-field" placeholder="Author" required>
                        </div>
                        <div class="input-box">
                            <input type="date" name="dateDePublication" class="input-field" placeholder="Publication Date" required max="<?php echo date('Y-m-d'); ?>">
                        </div>
                        <div class="input-box">
                            <input type="text" name="etiquette" class="input-field" placeholder="Tags" required>
                        </div>
                        <div class="input-box">
                            <button type="submit" class="input-submit">
                                <span>Add</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- JS -->
    <script src="../assets/js/main.js"></script>
    <script>
        // Add event listener to the comment button
        document.getElementById('entretien').addEventListener('click', function() {
            // Display the comment form
            document.getElementById('comment-form').innerHTML = `
            <div class="input-box">
                <input type="text" name="idc" class="input-field" placeholder="ID" required>
            </div>
            <div class="input-box">
                <input type="text" name="contenu" class="input-field" placeholder="Content" required>
            </div>
            <div class="input-box">
                <input type="text" name="auteur" class="input-field" placeholder="Author" required>
            </div>
            <div class="input-box">
                <input type="date" name="date" class="input-field" placeholder="Date" required>
            </div>
        `;
        });
    </script>
</body>

</html>
