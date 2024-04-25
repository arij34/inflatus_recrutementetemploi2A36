<?php
require_once 'C:\xampp\htdocs\gestion entretien\front end\controler\testC.php';
require_once 'C:\xampp\htdocs\gestion entretien\front end\controler\entretienC.php';
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
            $user = new User(
                null,
                $_POST['email_test'],
                $_POST['nom_entreprise_test'],
                $_POST['domaine_informatique_test'],
                $_POST['date_test']
            );

            $userC->addUser($user);

            header('Location: success.php');
            exit;
        } else {
            $error = "Tous les champs doivent être remplis";
        }
    }
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
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-space-dynamic.css">
    <link rel="stylesheet" href="assets/css/animated.css">
    <link rel="stylesheet" href="assets/css/owl.css">
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

/* ====== BASE ===== */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: 'Poppins', sans-serif;
}

/* ====== Body ===== */
body {
    background-position: center;
    background-repeat: no-repeat;
    background-attachment: fixed;
    background-size: cover;
    display: flex;
    align-items: center;
    justify-content: center;
    min-height: 800vh;
    padding: 0 20px;
}

/* ====== Form container ===== */
.form-container {
    display: flex;
    width: 900px;
    height: 750px;
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
    backdrop-filter: blur(30px);
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
    font-weight: 600;
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
    margin-top: 20px;
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
    left: -50%;
    transform: translateX(-50%);
    display: flex;
    flex-direction: column;
    align-items: center;
    width: 100%;
    padding: 0 4vw;
    transition: .3s;
}

.register-form .form-title {
    margin-block: 40px 20px;
}

.form-title {
    margin: 40px 0;
    color: #fe3f40;
    font-size: 28px;
    font-weight: 600;
}

.form-inputs {
    width: 100%;
}

.input-box {
    position: relative;
}

.input-field {
    width: 100%;
    height: 55px;
    padding: 0 15px;
    margin: 10px 0;
    color: #fff;
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
    height: 55px;
    padding: 0 15px;
    margin: 10px 0;
    color: #fff;
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
    height: 55px;
    padding: 0 15px;
    margin: 10px 0;
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


<footer>
    <div class="container">
        <div class="row">
            <div class="col-lg-12 wow fadeIn" data-wow-duration="1s" data-wow-delay="0.25s">
                <p>© Copyright 2021 Space Dynamic Co. All Rights Reserved.
                    <br>Design: <a rel="nofollow" href="https://templatemo.com">TemplateMo</a></p>
            </div>
        </div>
    </div>
</footer>


<!-- Inside this JavaScript file I've inserted Questions and Options only -->
<script src="js/questions.js"></script>

<!-- Inside this JavaScript file I've coded all Quiz Codes -->
<script src="js/script.js"></script>

<!-- Scripts -->
<script src="vendor/jquery/jquery.min.js"></script>
<script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/main.js"></script>
<script src="assets/js/owl-carousel.js"></script>
<script src="assets/js/animation.js"></script>
<script src="assets/js/imagesloaded.js"></script>
<script src="assets/js/templatemo-custom.js"></script>
</body>
</html>