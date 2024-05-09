<?php
include "../controller/UserC.php"; 

$error = "";
$user = null;
$userC = new UserC();
if (
    isset($_POST["nomR"]) &&
    isset($_POST["prenomR"]) &&
    isset($_POST["telephoneR"]) &&
    isset($_POST["dateR"]) &&
    isset($_POST["emailR"]) &&
    isset($_POST["MDPR"]) 
) {
    if (
        !empty($_POST["nomR"]) &&
        !empty($_POST["prenomR"]) &&
        !empty($_POST["telephoneR"]) &&
        !empty($_POST["dateR"]) &&
        !empty($_POST["emailR"]) &&
        !empty($_POST["MDPR"]) 
    ) {
        $user = new User(
            null,
            $_POST["nomR"],
            $_POST["prenomR"],
            $_POST["telephoneR"], 
            $_POST["dateR"],
            $_POST["emailR"],
            $_POST["MDPR"] 
        );
        $userC->addUser($user);
        header('Location: register.php');
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOGIN</title>
    <!-- BOXICONS -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <!-- STYLE -->
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="form-container">
        <div class="col col-1">
            <div class="image-layer">
                
                
                <img src="assets\img\about-left-image.png" class="form-image-main">
                
                <img src="assets/img/cloud.png" class="form-image cloud">
                <img src="assets/img/stars.png" class="form-image stars">
            </div>

            <p class="featured-words">Bienvenue sur <span>   Khadamni</span></p>
        </div>


        <div class="col col-2">
            <div class="btn-box">
                <button class="btn btn-1" id="test">SE CONNECTER </button>
                <button class="btn btn-2" id="entretien"> S'INSECRIRE </button>
            </div>


            <div class="login-form">
                <div class="form-title">
                    <span>SE CONNECTER </span>
                </div>
                <div class="form-inputs">
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Email">
                    </div>
                    <div class="input-box">
                        <input type="password" class="input-field" placeholder="Mot de passe" >
                    </div>
                    <a href="C:\xampp\htdocs\web\gestion_user\view\loginn\loginn\forget.html" class="forgot-password">Mot de passe oublié?</a>
                    <style>
                    
                        /* Style for the options */
                        .forgot-password{
                            color: #03a4ed;
                            font-size: 14px;
                        }
                    </style>               
                    <div class="input-box">
                        <button class="input-submit">
                            <span>SE CONNECTER </span>
                            <i class="bx bx-right-arrow-alt"></i>
                        </button>
                    </div>
                    <div class="signUp-link">
                        <p>Vous n'avez pas de compte?<a href="signup.html" class="signUpBtn-link">Sign Up</a></p>
                    </div>
                    <style>
                        .signUp-link {
                        font-size: 14px;
                        text-align: center;
                        margin: 15px 0;
                        }
                        .signUp-link p {
                        color: #03a4ed;
                        }
                        .signUp-link p a {
                        color: #fe3f40;
                        text-decoration: none;
                        font-weight: 500;
                        }
                        .signUp-link p a:hover {
                        text-decoration: underline;
                        }
                    </style>  
                </div>
            </div>

            <div class="register">
                <div class="form-title">
                    <span>S'INSECRIRE </span>
                </div>
                <form action="" method="POST">
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Nom" name="nomR" >
                            <input type="text" class="input-field" placeholder="Prénom" name="prenomR">
                        </div>
                        <div class="input-box">
                            <input type="tel" class="input-field" placeholder="Telephone" name="telephoneR" >
                        </div>
                        <div class="input-box">
                            <input type="date" class="input-field" placeholder="Date de naissance" name="dateR">
                        </div> 
                        <div class="input-box">
                            <input type="email" class="input-field" placeholder="Email" name="emailR">
                        </div>      
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Mot De Passe" name="MDPR">
                        </div>
                        <div class="input-box">
                            <button type="submit" class="input-submit">
                                <span>S'INSECRIRE</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
<!-- JS -->
<script src="assets/js/main.js"></script>

</body>
</html>
