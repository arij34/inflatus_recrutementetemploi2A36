<?php
require_once 'C:\xampp\htdocs\gestion entretien\front end\controler\testC.php';
require_once 'C:\xampp\htdocs\gestion entretien\front end\controler\entretienC.php';
<<<<<<< HEAD

$userC = new UserC();
$userC2 = new UserC2();

$error = "";

$id_test = isset($_POST['id_test']) ? $_POST['id_test'] : '';
$email_test = isset($_POST['email_test']) ? $_POST['email_test'] : '';
$nom_entre = isset($_POST['nom_entre']) ? $_POST['nom_entre'] : '';
$prenom_entre = isset($_POST['prenom_entre']) ? $_POST['prenom_entre'] : '';
$nom_entreprise_test = isset($_POST['nom_entreprise_test']) ? $_POST['nom_entreprise_test'] : '';
$date_entre = isset($_POST['date_entre']) ? $_POST['date_entre'] : '';
$type_entre = isset($_POST['type_entre']) ? $_POST['type_entre'] : '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["email_test"]) && isset($_POST["nom_entreprise_test"]) && isset($_POST["domaine_informatique_test"]) && isset($_POST["date_test"])) {
        if (!empty($_POST['email_test']) && !empty($_POST["nom_entreprise_test"]) && !empty($_POST["domaine_informatique_test"]) && !empty($_POST["date_test"])) {
=======
$userC = new UserC();

$error = "";

// Check if the form is submitted
if (
    isset($_POST["email_test"]) &&
    isset($_POST["nom_entreprise_test"]) &&
    isset($_POST["domaine_informatique_test"]) &&
    isset($_POST["date_test"])
) {
    // Check if the selected option is "web"
    if ($_POST["domaine_informatique_test"] === "web") {
        // Redirect to the quiz.html page
        header("Location: /gestion%20entretien/front%20end/view/quiz.html");
        exit; // Ensure that subsequent code is not executed
    } else {
        // Proceed with the form submission
        if (
            !empty($_POST['email_test']) &&
            !empty($_POST["nom_entreprise_test"]) &&
            !empty($_POST["domaine_informatique_test"]) &&
            !empty($_POST["date_test"])
        ) {
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
            $user = new User(
                null,
                $_POST['email_test'],
                $_POST['nom_entreprise_test'],
                $_POST['domaine_informatique_test'],
                $_POST['date_test']
            );
<<<<<<< HEAD
            $userC->addUser($user);
            echo '<script>alert("Utilisateur ajouté avec succès.");</script>';
            // No need to prevent form submission here
=======

            $userC->addUser($user);

            header('Location: success.php');
            exit;
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
        } else {
            $error = "Tous les champs doivent être remplis";
        }
    }
<<<<<<< HEAD

    if (isset($_POST["id_test"]) && isset($_POST["email_test"]) && isset($_POST["nom_entre"]) && isset($_POST["prenom_entre"]) && isset($_POST["nom_entreprise_test"]) && isset($_POST["date_entre"]) && isset($_POST["type_entre"])) {
        if (!empty($_POST['id_test']) && !empty($_POST['email_test']) && !empty($_POST["nom_entre"]) && !empty($_POST["prenom_entre"]) && !empty($_POST["nom_entreprise_test"]) && !empty($_POST["date_entre"]) && !empty($_POST["type_entre"])) {
            $id_test = $_POST['id_test'];
            $pdo = new PDO(
                'mysql:host=localhost;dbname=entretien',
                'root',
                '',
                [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
                ]
            );
            $query = "SELECT id_test FROM test WHERE id_test = ?";
            $statement = $pdo->prepare($query);
            $statement->execute([$id_test]);
            $existing_id_test = $statement->fetchColumn();

            if (!$existing_id_test) {
                echo '<script>alert("Le id_test fourni n\'existe pas. Veuillez entrer un id_test valide.");</script>';
            } else {
                $user2 = new User2(
                    null,
                    $_POST['id_test'],
                    $_POST['email_test'],
                    $_POST['nom_entre'],
                    $_POST['prenom_entre'],
                    $_POST['nom_entreprise_test'],
                    $_POST['date_entre'],
                    $_POST['type_entre']
                );
                $userC2->addUser2($user2);
                echo '<script>alert("Utilisateur ajouté avec succès."); handleSuccess();</script>';
                // No need to prevent form submission here
            }
        } else {
            $error = "Tous les champs doivent être remplis";
        }
        echo '<script>
    // Include the JavaScript code
    ' . file_get_contents("script_certif.js") . '

    // Call the submitForm function when the form is submitted
    submitForm();
  </script>';
    }

    
}
?>
<html>
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


    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
=======
}

$userC2 = new UserC2();

if (
    isset($_POST["email_test"]) &&
    isset($_POST["nom_entre"]) &&
    isset($_POST["prenom_entre"]) &&
    isset($_POST["nom_entreprise_test"])&&
    isset($_POST["date_entre"])&&
    isset($_POST["type_entre"])
) {
    if (
        !empty($_POST['email_test']) &&
        !empty($_POST["nom_entre"]) &&
        !empty($_POST["prenom_entre"]) &&
        !empty($_POST["nom_entreprise_test"])&&
        !empty($_POST["date_entre"])&&
        !empty($_POST["type_entre"])
    ) {
        $user2 = new User2(
            null,
            $_POST['email_test'],
            $_POST['nom_entre'],
            $_POST['prenom_entre'],
            $_POST['nom_entreprise_test'],
            $_POST['date_entre'],
            $_POST['type_entre']
        );

        $userC2->addUser2($user2);

        header('Location: success.php');
        exit;
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}

?>


<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test entretien</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        /* Add your CSS styles here */
        .input-box {
            width: 100%;
        }
    </style>



    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <title>Space Dynamic - SEO HTML5 Template</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/style.css">
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
<<<<<<< HEAD
    <link rel="stylesheet" href="style_certif.css">

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
                <!-- ***** Logo Start ***** -->
                <a href="acceuil.html" class="logo">
                  <h4>
                    <div class="corner-container">
                      <img src="assets/img/logo.png" >
                    </div> 
                  Kha<span>Damni</span></h4>
                </a>
    
                <!-- ***** Logo End ***** -->
                <!-- ***** Menu Start ***** -->
                <ul class="nav">
                  <li class="scroll-to-section"><a href="index.html">Home</a></li>
                  <li class="scroll-to-section"><a href="#about"></a></li>
                  <li class="scroll-to-section"><a href="#services">Offres&demandes</a></li>
                  <li class="scroll-to-section"><a href="#portfolio" class="active">Entretien</a></li>
                  <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
                  <li class="scroll-to-section"><a href="#contact">Reclamation</a></li> 
                  <li class="scroll-to-section"><div class="main-red-button"><a href="C:\Users\21628\OneDrive\Desktop\projet_web\loginn\loginn\Untitled-1.html">Se connecter</a></div></li> 
                </ul>        
                <a class='menu-trigger'>
                    <span>Menu</span>
                </a>
                <!-- ***** Menu End ***** -->
              </nav>
            </div>
          </div>
        </div>
    </header>
    
    <div class="form-container">
        <style>
            /* POPPINS FONT */
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
=======
<!--
    
TemplateMo 562 Space Dynamic

https://templatemo.com/tm-562-space-dynamic

-->
  </head>

<body>

  <!-- ***** Preloader Start ***** -->
  <div id="js-preloader" class="js-preloader">
    <div class="preloader-inner">
      <span class="dot"></span>
      <div class="dots">
        <span></span>
        <span></span>
        <span></span>
      </div>
    </div>
  </div>
  <!-- ***** Preloader End ***** -->

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <nav class="main-nav">
            <!-- ***** Logo Start ***** -->
            <a href="index.html" class="logo">
              <h4>KHA<span>DEMNI</span></h4>
            </a>
            <!-- ***** Logo End ***** -->
            <!-- ***** Menu Start ***** -->
            <ul class="nav">
              <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
              <li class="scroll-to-section"><a href="#about">About Us</a></li>
              <li class="scroll-to-section"><a href="#services">Entretien</a></li>
              <li class="scroll-to-section"><a href="#portfolio">Portfolio</a></li>
              <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
              <li class="scroll-to-section"><a href="#contact">Message Us</a></li> 
              <li class="scroll-to-section"><div class="main-red-button"><a href="#contact">Contact Now</a></div></li> 
            </ul>        
            <a class='menu-trigger'>
                <span>Menu</span>
            </a>
            <!-- ***** Menu End ***** -->
          </nav>
        </div>
      </div>
    </div>
  </header>
  <!-- ***** Header Area End ***** -->

 


  <style>
  

        footer {
            margin-top: auto;
            text-align: center;
            padding: 20px 0;
        }

        /* POPPINS FONT */
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90

/* ====== BASE ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* ====== Body ===== */
body {
<<<<<<< HEAD
    /*background: #f5f2f2;*/ /* Remove or comment out this line */
    
=======
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
<<<<<<< HEAD
    min-height: 100vh;
    padding: 0 20px;
}


/* ====== Form container ===== */
.form-container {
    display: flex;
    width: 1000px;
    height: 680px;
=======
    min-height: 800vh;
    padding: 0 20px;
}

/* ====== Form container ===== */
.form-container {
    display: flex;
    width: 900px;
    height: 750px;
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
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
<<<<<<< HEAD
    backdrop-filter: blur(20px);
=======
    backdrop-filter: blur(30px);
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
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

<<<<<<< HEAD

=======
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
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
<<<<<<< HEAD
    font-weight: 400;
=======
    font-weight: 600;
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
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
<<<<<<< HEAD
    margin-top: 0px;
    
=======
    margin-top: 20px;
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
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
<<<<<<< HEAD
    left: -150%;
=======
    left: -50%;
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 0 4vw;
    transition: .3s;
}

.register-form .form-title {
<<<<<<< HEAD
    margin-block: 5px 5px;
}

.form-title {
    margin: 1px 0;
    color: #fe3f40;
    font-size: 25px;
    font-weight: 500;
=======
    margin-block: 40px 20px;
}

.form-title {
    margin: 40px 0;
    color: #fe3f40;
    font-size: 28px;
    font-weight: 600;
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
}

.form-inputs {
    width: 100%;
}

.input-box {
    position: relative;
<<<<<<< HEAD

}


.input-field {
    width: 100%;
    height: 40px;
    padding: 0 20px;
    margin: 5px 0;
    color: #ffff;
=======
}

.input-field {
    width: 100%;
    height: 55px;
    padding: 0 15px;
    margin: 10px 0;
    color: #fff;
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
    background: #acd7f6f0;
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    border: none;
    border-radius: 10px;
    outline: none;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
<<<<<<< HEAD
.input-field2 {
    width: 100%;
    height: 40px;
    padding: 0 15px;
    margin: 5px 0;
    color: #ffff;
=======

.input-field2 {
    width: 100%;
    height: 55px;
    padding: 0 15px;
    margin: 10px 0;
    color: #fff;
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
    box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
    border: none;
    border-radius: 10px;
    outline: none;
    backdrop-filter: blur(20px);
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}

<<<<<<< HEAD

=======
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
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
<<<<<<< HEAD
    height: 30px;
    padding: 0 15px;
    margin: 5px 0;
=======
    height: 55px;
    padding: 0 15px;
    margin: 10px 0;
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
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

<<<<<<< HEAD

=======
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
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
<<<<<<< HEAD
        </style>
       <div class="col col-1">
        <div class="image-layer">
            <img src="assets\img\about-left-image.png" class="form-image-main">
            <img src="assets/img/cloud.png" class="form-image cloud">
            <img src="assets/img/stars.png" class="form-image stars">
        </div>
        <p class="featured-words">Bienvenue sur <span> Khadamni</span></p>
        </div>
     <div class="col col-2">
        
        <div class="login-form">
            <div class="form-title">
                <span> Entretien </span>
            </div>
            
                            <form id="test-form" action="register2.php" method="post">
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="id de test" name="id_test" value="<?= htmlspecialchars($id_test) ?>">
                        </div>
                    </div>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" id="email" class="input-field" placeholder="Email" name="email_test" value="<?= htmlspecialchars($email_test) ?>">
                            <span style="color:red; font-size: smaller;" id="email_error"></span>

                        </div>
                    </div>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" id="nom" class="input-field" placeholder="Nom" name="nom_entre" value="<?= htmlspecialchars($nom_entre) ?>">
                            <span style="color:red; font-size: smaller;" id="nom_error" ></span>
                            <input type="text" id="prenom" class="input-field" placeholder="Prenom" name="prenom_entre" value="<?= htmlspecialchars($prenom_entre) ?>">
                            <span style="color:red; font-size: smaller;" id="prenom_error" ></span>
                        </div>
                    </div>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" id="entreprise" class="input-field" placeholder="Nom Entreprise" name="nom_entreprise_test" value="<?= htmlspecialchars($nom_entreprise_test) ?>">
                            <span style="color:red; font-size: smaller;" id="entreprise_error" ></span>
                        </div>
                    </div>
                    <div class="form-inputs">
                        <input type="date" id="date" class="input-field" placeholder="Date d'entretien'" name="date_entre" value="<?= htmlspecialchars($date_entre) ?>">
                        <span style="color:red; font-size: smaller;" id="date_error" ></span>
                    </div>
                    <div class="form-inputs">
                        <select class="input-field" name="type_entre" style="width: 100%;">
                            <option value="" disabled selected hidden> Type d'entretien</option>
                            <option value="en ligne" <?= ($type_entre == 'en ligne') ? 'selected' : '' ?>>En ligne</option>
                            <option value="presentiel" <?= ($type_entre == 'presentiel') ? 'selected' : '' ?>>Presentiel</option>
                        </select>
                    </div>
                    <div class="form-inputs">    
                        <div class="input-box">
                            <button type="submit" class="input-submit" id="submit-btn">
                                <span>Envoyer!</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                        <button type="button" class="input-submit" id="export-btn">
                    <span>Exporter</span>
                    <i class="bx bx-file-pdf"></i>
                </button>
            </form> 

        </div>
    </div>
</div>
<?php if (!empty($error)) : ?>
    <div><?php echo $error; ?></div>
<?php endif; ?>
=======



</style>
        
 
</head>
<body>

<header class="header-area header-sticky wow slideInDown" data-wow-duration="0.75s" data-wow-delay="0s">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <a href="index.html" class="logo">
                        <h4>KHA<span>DEMNI</span></h4>
                    </a>
                    <ul class="nav">
                        <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                        <li class="scroll-to-section"><a href="#about">About Us</a></li>
                        <li class="scroll-to-section"><a href="#services">Entretien</a></li>
                        <li class="scroll-to-section"><a href="#portfolio">Portfolio</a></li>
                        <li class="scroll-to-section"><a href="#blog">Blog</a></li> 
                        <li class="scroll-to-section"><a href="#contact">Message Us</a></li> 
                        <li class="scroll-to-section"><div class="main-red-button"><a href="#contact">Contact Now</a></div></li> 
                    </ul>        
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                </nav>
            </div>
        </div>
    </div>
</header>


<div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
<div class="form-container">
    <div class="col col-1">
        <div class="image-layer">
            <img src="assets\images\about-left-image.png" class="form-image-main">
            <img src="assets/images/cloud.png" class="form-image cloud">
            <img src="assets/images/stars.png" class="form-image stars">
        </div>
        <p class="featured-words">Bienvenue sur <span>   Khadamni</span></p>
    </div>
    <div class="col col-2">
        <div class="btn-box">
            <button class="btn btn-2" id="test"> Entretien</button>
            
        </div>
        

    <div class="login-form">
    <form id="test-form" action="register2.php" method="post">
        
            
            <div class="form-inputs">
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Email" name="email_test">
                    <td><span id="erreurEmail" style='color:red'></span></td>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Nom" name="nom_entre">
                    <td><span id="erreurNom" style='color:red'></span></td>
                    <input type="text" class="input-field" placeholder="Prenom" name="prenom_entre">
                    <td><p id="errorPrenom" style='color:red'></p></td>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field" placeholder="Nom Entreprise" name="nom_entreprise_test">
                    <td><p id="errorEntre" style='color:red'></p></td>
                </div>
                <div class="input-box">
                    <input type="date" class="input-field" placeholder="Date d'entretien'" name="date_entre">
                    <td><span id="errorDate_naissance" style='color:red'></span></td>
                </div>
                <div class="input-box">
                    <select class="input-field" name="type_entre" style="width: 100%;">
                        <option value="" disabled selected hidden> Type d'entretien</option>
                        <option value="en ligne">En ligne</option>
                        <option value="presentiel">Presentiel</option>
                    </select>
                    <button type="submit" class="input-submit">
                        <span>register</span>
                        <i class="bx bx-right-arrow-alt"></i>
                    </button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>


<script>
    function onSubmit() {
        var selectedOption = document.getElementById("domaine").value;
        if (selectedOption === "web") {
            window.location.href = "/gestion%20entretien/front%20end/view/quiz.html";
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>

>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90

<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
<<<<<<< HEAD
                <p>© Copyright 2024 Khadamni. All Rights Reserved.</p>
=======
                <p>© Copyright 2021 Space Dynamic Co. All Rights Reserved.
                    <br>Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
            </div>
        </div>
    </div>
</footer>
<<<<<<< HEAD
</div>



<script type="text/javascript">
const email = document.getElementById('email');
const nom = document.getElementById('nom');
const prenom = document.getElementById('prenom');
const entreprise = document.getElementById('entreprise');
const date = document.getElementById('date');
const form = document.getElementById('test-form');
const email_error = document.getElementById('email_error');
const nom_error = document.getElementById('nom_error');
const prenom_error = document.getElementById('prenom_error');
const entreprise_error = document.getElementById('entreprise_error');
const date_error = document.getElementById('date_error');

form.addEventListener('submit', (e) => {
    const alphabetSpaceRegex = /^[a-zA-Z\s]+$/; // Regex to allow alphabetic characters and spaces
    const email_check = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;

    // Clear previous error messages
    email_error.innerHTML = "";
    nom_error.innerHTML = "";
    prenom_error.innerHTML = "";
    entreprise_error.innerHTML = "";
    date_error.innerHTML = "";

    // Email validation
    if (!email.value.match(email_check)) {
        e.preventDefault();
        email_error.innerHTML = "Email valide est requis";
    }

    // Nom validation
    if (nom.value.trim() === '') {
        e.preventDefault();
        nom_error.innerHTML = "Le nom est requis";
    } else if (!alphabetSpaceRegex.test(nom.value.trim())) {
        e.preventDefault();
        nom_error.innerHTML = "Le nom doit contenir uniquement des lettres et des espaces";
    }

    // Prenom validation
    if (prenom.value.trim() === '') {
        e.preventDefault();
        prenom_error.innerHTML = "Le prénom est requis";
    } else if (!alphabetSpaceRegex.test(prenom.value.trim())) {
        e.preventDefault();
        prenom_error.innerHTML = "Le prénom doit contenir uniquement des lettres et des espaces";
    }

    // Entreprise validation
    if (entreprise.value.trim() === '') {
        e.preventDefault();
        entreprise_error.innerHTML = "Le nom de l'entreprise est requis";
    } else if (!alphabetSpaceRegex.test(entreprise.value.trim())) {
        e.preventDefault();
        entreprise_error.innerHTML = "Le nom de l'entreprise doit contenir uniquement des lettres et des espaces";
    }

    // Date validation
    const currentDate = new Date();
    const selectedDate = new Date(date.value);
    if (selectedDate <= currentDate) {
        e.preventDefault();
        date_error.innerHTML = "La date doit être dans le futur";
    }
});
</script>

<script>
    // Include the JavaScript code
    <?php echo file_get_contents("script_certif.js"); ?>
    
    // Add event listener to the "Exporter" button
    document.getElementById("export-btn").addEventListener("click", function() {
        // Call the submitForm function when the "Exporter" button is clicked
        submitForm();
    });
</script>

<script>
    // Function to handle success and export PDF
    function handleSuccess() {
        // Show success alert
        alert("Utilisateur ajouté avec succès.");

        // Get form data
        var formData = {
            id_test: document.getElementsByName("id_test")[0].value,
            email_test: document.getElementsByName("email_test")[0].value,
            nom_entre: document.getElementsByName("nom_entre")[0].value,
            prenom_entre: document.getElementsByName("prenom_entre")[0].value,
            nom_entreprise_test: document.getElementsByName("nom_entreprise_test")[0].value,
            date_entre: document.getElementsByName("date_entre")[0].value,
            type_entre: document.getElementsByName("type_entre")[0].value
        };

        // Display form data and export PDF
        displayFormData(formData);
    }

    // Function to display form data and export PDF
    function displayFormData(formData) {
        var emailContent = `
        <div class="email-content">
            <h2>Objet: Confirmation de votre Entretien ${formData.type_entre}</h2>
            <br>
            <br>
            <p>Chère Mr/Mme <strong> ${formData.nom_entre} ${formData.prenom_entre}</strong>,</p>
            <br>
            <p>Nous vous remercions sincèrement d'avoir pris le temps de postuler pour le poste chez <strong> ${formData.nom_entreprise_test}</strong>. Nous avons le plaisir de vous informer que vous avez été sélectionnée pour passer à l'étape suivante : l'entretien en ligne.</p>
            <p>Votre performance exceptionnelle lors du test en ligne a captivé notre attention, démontrant votre engagement et votre compétence dans le domaine. Nous sommes impatients de discuter avec vous de vos compétences, de vos expériences professionnelles et de votre vision pour le poste.</p>
            <br>
            <p>Voici les détails de votre entretien :</p>
            <p><strong>ID de Test:</strong> ${formData.id_test}</p>
            <p><strong>Email de contact:</strong> ${formData.email_test}</p>
            <p><strong>Date d'entretien:</strong> ${formData.date_entre}</p>
            <p><strong>Type d'entretien:</strong> ${formData.type_entre}</p>
            <br>
            <p>Nous avons hâte de vous rencontrer et d'échanger avec vous lors de cet entretien. Votre succès jusqu'à présent est un témoignage de votre détermination et de votre capacité à exceller. Nous sommes convaincus que cette conversation sera fructueuse et nous rapprochera de la possibilité de travailler ensemble.</p>
            <p>Si vous avez des questions ou des préoccupations avant l'entretien, n'hésitez pas à nous contacter à l'adresse e-mail fournie. Nous sommes là pour vous aider dans tout ce dont vous pourriez avoir besoin pour préparer votre entretien.</p>
            <p>Encore une fois, félicitations pour votre réussite jusqu'à présent, et nous avons hâte de vous voir briller lors de notre entretien en ligne.</p>
            <br>
            <br>
            <br>
            <p>Cordialement,</p>
            <p><strong>${formData.nom_entreprise_test}</strong</p>
        </div>
        `;

        var certificateContent = `
        <div class="submitted-data">
            <img src="assets/img/logo.png" alt="Logo" class="logo" width="100" height="auto">
            ${emailContent}
        </div>
        <button id="toPDF">Export to PDF</button>
        `;

        document.body.innerHTML = certificateContent;
        
        // Attach event listener to the "Export to PDF" button
        document.getElementById("toPDF").addEventListener("click", function() {
            toPDF(formData);
        });
    }

    // Function to export PDF
    function toPDF(formData) {
        const htmlContent = document.querySelector(".submitted-data").innerHTML;
        const htmlCode = `
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Khadamni Entretien</title>
            <link rel="stylesheet" type="text/css" href="style_certif.css">
        </head>
        <body>
            ${htmlContent}
        </body>
        </html>`;

        const newWindow = window.open();
        newWindow.document.write(htmlCode);

        setTimeout(() => {
            newWindow.print();
            newWindow.close();
        }, 400);
    }

    // Trigger handleSuccess function after window loads
    window.onload = function() {
        // Attach event listener to the "OK" button of the success alert
        if(document.querySelector(".alert button")) {
            document.querySelector(".alert button").addEventListener("click", handleSuccess);
        }
    };
</script>

<!-- JS -->
<script src="script_certif.js"></script>
<script src="assets/js/main.js"></script>
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
=======


<!-- Inside this JavaScript file I've inserted Questions and Options only -->
<script src="js/questions.js"></script>

<!-- Inside this JavaScript file I've coded all Quiz Codes -->
<script src="js/script.js"></script>

<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
>>>>>>> add5478c6eb71824396c18a6da6030b5af3e2f90
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/templatemo-custom.js"></script>
</body>
</html>