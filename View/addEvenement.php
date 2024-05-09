<?php
include '../Controller/EvenementC.php'; // Inclure le fichier EvenementC.php
$error = "";

// Créer un événement
$evenement = null;
$categorieevnC = new CategorieevnC();
$listeCategorieevns = $categorieevnC->listcategorieevns();
// Créer une instance du contrôleur
$evenementC = new EvenementC();

// Vérifier si une adresse est envoyée via l'URL
if (isset($_GET["adresseEVN"])) {
    $adresseEVN = $_GET["adresseEVN"];
} else {
    $adresseEVN = ""; // Adresse par défaut si aucune adresse n'est envoyée
}

if (
    isset($_POST["nomEvenement"]) &&
    isset($_POST["dateEVN"]) &&
    isset($_POST["idCategorieEVN"])
) {
    if (
        !empty($_POST["nomEvenement"]) &&
        !empty($_POST["dateEVN"]) &&
        !empty($_POST["idCategorieEVN"])
    ) {
        $nomCategorie = $_POST["idCategorieEVN"];
        // Vérifier si une nouvelle catégorie a été saisie
        if (isset($_POST["nouvelleCategorie"]) && !empty($_POST["nouvelleCategorie"])) {
            // Ajouter la nouvelle catégorie
            $categorieevnC->addcategorieevn($_POST["nouvelleCategorie"]);
            // Récupérer l'ID de la nouvelle catégorie ajoutée
            $nomCategorie = $categorieevnC->getLastInsertedId();
        }
        $evenement = new Evenement(
            NULL,
            $_POST["nomEvenement"],
            $adresseEVN, // Utiliser l'adresse récupérée depuis l'URL
            new DateTime($_POST['dateEVN']),
            $nomCategorie, // Utiliser l'ID de la catégorie
            $adresseEVN, // Ancienne adresse par défaut
            new DateTime($_POST['dateEVN']) // Ancienne date par défaut
        );
        $evenementC->addEvenement($evenement);
        header('Location:ListEvenement.php');
        exit(); // Terminer le script après la redirection
    } else {
        $error = "Missing information";
    }
}
?>


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Ludiflex | Login & Register</title>
        <!-- BOXICONS -->
        <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

        <meta name="description" content="">
        <meta name="author" content="">
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    
        <!-- STYLE -->
        <link rel="stylesheet" href="assets/css/style.css">

        <link href="../assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    
        <!-- Additional CSS Files -->
        <link rel="stylesheet" href="../assets/css/fontawesome.css">
        <link rel="stylesheet" href="../assets/css/templatemo-space-dynamic.css">
        <link rel="stylesheet" href="../assets/css/animated.css">
        <link rel="stylesheet" href="../assets/css/owl.css">
    
        <style>
            /* Ajout de marge entre le header et le formulaire */
            .form-container {
                margin-top: 120px; /* Ajustez la marge selon vos besoins */
                 margin-bottom: 1px;
            }
    
            /* Styles spécifiques au logo */
            .corner-container {
                position: fixed; /* Position fixe pour que le logo reste fixe lors du défilement */
                top: 0; /* Distance depuis le haut */
                left: 10px; /* Distance depuis la gauche */
                z-index: 9999; /* Assure que le logo est au-dessus de tout le contenu */
            }
    
            .corner-container img {
                width: 50px; /* Largeur minimale du logo */
                top: 0; /* Distance depuis le haut */
                height: auto; /* Hauteur ajustée automatiquement pour conserver les proportions */
            }
        </style>
    </head>
<body>
    <div class="content">
        <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
            <div class="container">
              <div class="row">
                <div class="col-12">
                  <nav class="main-nav">
                    <!-- * Logo Start * -->
                    <a href="acceuil.html" class="logo">
                      <h4>
                        <div class="corner-container">
                          <img src="../assets/images/logo.png" >
                        </div> 
                      Kha<span>Damni</span></h4>
                    </a>
        
                    <!-- * Logo End * -->
                    <!-- * Menu Start * -->
                    <ul class="nav">
                      <li class="scroll-to-section"><a href="acceuil.html" class="active">Home</a></li>
                      <li class="scroll-to-section"><a href="#about"></a></li>
                      <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
                      <li class="scroll-to-section"><a href="#portfolio">Entretien</a></li>
                      <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
                      <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
                      <li class="scroll-to-section"><div class="main-red-button"><a href="C:\Users\21628\OneDrive\Desktop\projet_web\loginn\loginn\Untitled-1.html">Se connecter</a></div></li> 
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- * Menu End * -->
                  </nav>
                </div>
              </div>
            </div>
        </header>
    

<div class="form-container" >
    <style>
        /* POPPINS FONT */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');

/* ====== BASE ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* ====== Body ===== */
body {
    /*background: #f5f2f2;*/ /* Remove or comment out this line */
    
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 100vh;
    padding: 0 20px;
}


/* ====== Form container ===== */
.form-container {
    display: flex;
    width: 1000px;
    height: 680px;
    border: 3px solid #fe3f40;
    border-radius: 50px;
    backdrop-filter: blur(20px);
    overflow: hidden;
}

/* ====== First Column ===== */
.col-1 {
    display: flex;
    align-items: center;
    justify-content: center;
    flex-direction: column;
    width: 55%;
    background: #fe3f40;
    backdrop-filter: blur(20px);
    border-radius: 0 30% 20% 0;
    transition: border-radius .3s;
}

.image-layer {
    position: relative;
}

.form-image-main {
    width: 400px;
    animation: scale-up 3s ease-in-out alternate infinite;
}

.form-image {
    position: absolute;
    left: 0;
    width: 400px;
}
.form-image1 {
    position: fixed; /* Positioning the image relative to the viewport */
    top: 0; /* Positioning the image at the top of the viewport */
    left: 0; /* Positioning the image at the left of the viewport */
    width: 100px;
    z-index: 999; /* Adjust z-index as needed to ensure it's above other elements */
}


/* ====== Form Image Animation ===== */
.coin {
    animation: scale-down 3s ease-in-out alternate infinite;
}

.spring {
    animation: scale-down 3s ease-in-out alternate infinite;
}

.dots {
    animation: scale-up 3s ease-in-out alternate infinite;
}

.rocket {
    animation: up-down 3s ease-in-out alternate infinite;
}

.cloud {
    animation: left-right 3s ease-in-out alternate infinite;
}

.stars {
    animation: scale-down 3s ease-in-out alternate infinite;
}

@keyframes left-right {
    to {
        transform: translateX(10px);
    }
}

@keyframes up-down {
    to {
        transform: translateY(10px);
    }
}

@keyframes scale-down {
    to {
        transform: scale(0.95);
    }
}

@keyframes scale-up {
    to {
        transform: scale(1.05);
    }
}

/* ====== Featured Words ===== */
.featured-words {
    text-align: center;
    color: #edeff0;
    width: 500px;
}

.featured-words span {
    font-weight: 400;
    color: #03a4ed;
}

/* ====== Second Column ===== */
.col-2 {
    position: relative;
    width: 45%;
    padding: 20px;
    overflow: hidden;
}

.btn-box {
    display: flex;
    justify-content: center;
    gap: 10px;
    margin-top: 0px;
    
}

.btn {
    font-weight: 500;
    padding: 5px 30px;
    border: none;
    border-radius: 30px;
    background: rgba(255, 255, 255, 0.3);
    color: #0b0b0b;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: .1s;
}

.btn-1 {
    background: #03a4ed;
}

.btn:hover {
    opacity: 0.85;
}

/*  ======= Login Form ========  */
.login-form {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 0 4vw;
    transition: .3s;
}

/*  ======= Register Form ========  */
.register-form {
    position: absolute;
    left: -150%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 0 4vw;
    transition: .3s;
}

.register-form .form-title {
    margin-block: 5px 5px;
}

.form-title {
    margin: 1px 0;
    color: #fe3f40;
    font-size: 25px;
    font-weight: 500;
}

.form-inputs {
    width: 100%;
}

.input-box {
    position: relative;

}


.input-field {
    width: 100%;
    height: 35px;
    padding: 0 15px;
    margin: 5px 0;
    color: #ffff;
    background: #acd7f6f0;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    border: none;
    border-radius: 10px;
    outline: none;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
.input-field2 {
    width: 100%;
    height: 40px;
    padding: 0 15px;
    margin: 5px 0;
    color: #ffff;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    border: none;
    border-radius: 10px;
    outline: none;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}


::placeholder {
    color: #fff;
    font-size: 15px;
}

.input-submit {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 10px;
    width: 100%;
    height: 30px;
    padding: 0 15px;
    margin: 5px 0;
    color: #fff;
    background: #03a4ed;
    border: none;
    border-radius: 10px;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    cursor: pointer;
    transition: .3s;
}

.input-submit:hover {
    gap: 15px;
    background-color: #fe3f40;
}


/* ====== Responsive ====== */
@media (max-width: 892px) {
    .form-container {
        width: 400px;
    }

    .col-1 {
        display: none;
    }

    .col-2 {
        width: 100%;
    }
}

    </style>
    <div class="col col-1">
        <div class="image-layer">
            
            
            <img src="..\assets\images\about-left-image.png" class="form-image-main">
            
            <img src="..\assets\images\cloud.png" class="form-image cloud">
            <img src="..\assets\images\stars.png" class="form-image stars">
        </div>

        <p class="featured-words">Bienvenue sur <span>   Khademni</span></p>
    </div>
    <div class="col col-2">
    <div class="login-form">
    <div class="form-title">
        <span>ajouter evenement </span>
    </div>
    <form name="monFormulaire" method="POST" action="" onsubmit="return validateForm();">
        <div class="input-box">
            <input type="text" class="input-field" placeholder="nomEvenement" name="nomEvenement">
            <div id="nomEvenementError" style="color: red;"></div> <!-- Ajout de l'élément d'erreur -->
        </div>
        <div class="input-box">
            <input type="text" class="input-field" placeholder="adresseEVN" name="adresseEVN" value="<?php echo isset($adresseEVN) ? $adresseEVN : ''; ?>">
            <div id="adresseEVNError" style="color: red;"></div> <!-- Ajout de l'élément d'erreur -->
        </div>
        <a href="map.php" style="margin-left: 10px;">Choisir localisation</a> <!-- Ajout du lien -->
        <div class="input-box">
            <input type="date" class="input-field" placeholder="dateEVN" name="dateEVN">
            <div id="dateEVNError" style="color: red;"></div> <!-- Ajout de l'élément d'erreur -->
        </div>
        <div class="input-box">
            <select name="idCategorieEVN" id="idCategorieEVN" class="input-field">
                <?php
                foreach ($listeCategorieevns as $categorieevn) {
                    echo '<option value="' . $categorieevn['idCategorieEVN'] . '">' . $categorieevn['nomCategorieEVN'] . '</option>';
                }
                ?>
            </select>
            <a href="javascript:void(0);" id="ajouterCategorie">Ajouter une catégorie</a>
            <div id="nouvelleCategorie" style="display: none;">
                <input type="text" class="input-field" placeholder="Nouvelle catégorie" name="nouvelleCategorie" id="nouvelleCategorieInput">
                <button type="button" id="validerNouvelleCategorie">Valider</button>
            </div>
        </div>
        <div class="input-box">
            <button type="submit" name="envoyer" style="background-color: #3498db; color: white; border: none; padding: 10px 20px; border-radius: 5px; cursor: pointer;">envoyer<i class="bx bx-right-arrow-alt"></i></button>
        </div>
    </form>
<script src="validation.js"></script> 
<script>
    document.getElementById('ajouterCategorie').addEventListener('click', function() {
        document.getElementById('nouvelleCategorie').style.display = 'block';
    });

    document.getElementById('validerNouvelleCategorie').addEventListener('click', function() {
        var nouvelleCategorieInput = document.getElementById('nouvelleCategorieInput').value;
        var selectCategorie = document.getElementById('idCategorieEVN');
        var optionExists = false;
        for (var i = 0; i < selectCategorie.options.length; i++) {
            if (selectCategorie.options[i].text === nouvelleCategorieInput) {
                optionExists = true;
                break;
            }
        }
        if (!optionExists) {
            var newOption = new Option(nouvelleCategorieInput, '');
            selectCategorie.appendChild(newOption);
        }
        document.getElementById('nouvelleCategorie').style.display = 'none';
    });
</script>


    </div>
</div>
</div>
<footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                    <p>© Copyright 2024 Khadamni. All Rights Reserved.</p>
                </div>
            </div>
        </div>
</footer>
</div>    


<!-- JS -->
<script src="../assets/js/main.js"></script>
<script src="../assets/js/validation.js"></script>
<script src="../vendor/jquery/jquery.min.js"></script>
<script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/owl-carousel.js"></script>
<script src="../assets/js/animation.js"></script>
<script src="../assets/js/imagesloaded.js"></script>
<script src="../assets/js/templatemo-custom.js"></script>
</body>
</html>
