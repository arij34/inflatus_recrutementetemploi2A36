<?php
session_start();
include "../tabAdmin/controller/UserC.php"; 
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
        header('Location: success.php');
        exit;
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}
if(isset($_POST['afficher'])) {
    // Check if email and password are provided
    if(isset($_POST['emailR']) && isset($_POST['MDPR'])) {
        $emailR = $_POST['emailR'];
        $MDPR = $_POST['MDPR'];

        // Check if email and password are not empty
        if(!empty($emailR) && !empty($MDPR)) {
            $userC = new UserC();
            
            // Check if the user with the given email exists
            $userByEmail = $userC->getUserByEmail($emailR);

            // Check if the user with the given password exists
            $userByPassword = $userC->getUserByPassword($MDPR);

            // Verify both conditions
            if(!empty($userByEmail) && !empty($userByPassword)) {
                // Both email and password are correct
                $_SESSION['idR'] = $userByEmail['idR'];
                $_SESSION['nomR'] = $userByEmail['nomR'];
                $_SESSION['prenomR'] = $userByEmail['prenomR'];
                $_SESSION['telephoneR'] = $userByEmail['telephoneR'];
                $_SESSION['dateR'] = $userByEmail['dateR'];
                $_SESSION['emailR'] = $emailR;
                $_SESSION['MDPR'] = $MDPR;
                header("Location: http://localhost/web/final/back/view/afficher.php");
                exit;
            } else {
                // Incorrect email or password
                $error = "Incorrect email or password";
            }
        } else {
            // Email or password is empty
            $error = "Email and password are required";
        }
    } else {
        // Email or password not provided
        $error = "Email and password are required";
    }

    // If there's an error, redirect back to login page with error message
    if(isset($error)) {
        header("Location: ../aff.php?error=$error");
        exit;
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

<form  action="" method="POST">
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
                <form action="login.php" method="post">
                    <div class="form-title">
                        <span>SE CONNECTER </span>
                    </div>
                    <?php if(isset($_GET['error'])){ ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $_GET['error']; ?>
                        </div>
                    <?php } ?>
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Email" name="emailR" value="<?php echo $user['emailR'] ??''; ?>">
                        </div>
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Mot de passe" name="MDPR" value="<?php echo $user['MDPR'] ??''; ?>">
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
                            <button class="input-submit" name="afficher">
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
                </form>
            </div>

            <div class="register">
                <script>
                    function validateForm() {
                        var nomR = document.forms["myForm"]["nomR"].value;
                        var prenomR = document.forms["myForm"]["prenomR"].value;
                        var telephoneR = document.forms["myForm"]["telephoneR"].value;
                        var dateR = document.forms["myForm"]["dateR"].value;
                        var emailR = document.forms["myForm"]["emailR"].value;
                        var MDPR = document.forms["myForm"]["MDPR"].value;

                        // Vérification du nom et prénom (lettres uniquement)
                        var letters = /^[A-Za-z]+$/;
                        if (!nomR.match(letters) || !prenomR.match(letters)) {
                            alert("Le nom et le prénom ne doivent contenir que des lettres");
                            return false;
                        }

                        // Vérification de la date de naissance (format YYYY-MM-DD)
                        if (!dateR.match(/^\d{4}-\d{2}-\d{2}$/)) {
                            alert("La date de naissance doit être au format YYYY-MM-DD");
                            return false;
                        }

                        // Vérification du format de l'e-mail
                        var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailR.match(emailPattern)) {
                            alert("Veuillez saisir une adresse e-mail valide");
                            return false;
                        }

                        var hasUppercase = /[A-Z]/.test(MDPR);
                        var hasLowercase = /[a-z]/.test(MDPR);
                        var hasDigit = /\d/.test(MDPR);

                        if (!(hasUppercase && hasLowercase && hasDigit && MDPR.length >= 8)) {
                            alert("Le mot de passe doit contenir au moins une lettre majuscule, une lettre minuscule, un chiffre, et avoir une longueur minimale de 8 caractères.");
                            return false;
                        }

                        // Vérification du numéro de téléphone (8 chiffres exactement)
                        var phoneNumbers = /^\d{8}$/;
                        if (!phoneNumbers.test(telephoneR)) {
                            alert("Le numéro de téléphone doit contenir exactement 8 chiffres");
                            return false;
                        }

                        return true;
                    }

                    // Fonction pour intercepter les événements de frappe et empêcher la saisie de chiffres dans les champs nom et prénom
                    function allowNumbersOnly(event) {
                        var charCode = event.which || event.keyCode;
                        var inputValue = event.target.value;

                        // Check if the character is a digit from 0 to 9
                        if (charCode >= 48 && charCode <= 57) {
                            // Check if the total number of digits in the input is already 8
                            if (inputValue.length >= 8) {
                                event.preventDefault(); // Prevent further input
                            }
                        } else {
                            event.preventDefault(); // Prevent input if not a digit
                        }
                    }
                </script>
                    <div class="form-title">
                        <span>S'INSECRIRE </span>
                    </div>
                    <form action="" method="POST" onsubmit="return validateForm()">
                        <div class="form-inputs">
                            <div class="input-box">
                                <input type="text" class="input-field" placeholder="Nom" name="nomR" onkeypress="allowLettersOnly(event)" required>
                                <input type="text" class="input-field" placeholder="Prénom" name="prenomR" onkeypress="allowLettersOnly(event)" required>
                            </div>
                            <div class="input-box">
                                <input type="tel" class="input-field" placeholder="Telephone" name="telephoneR" onkeypress="allowNumbersOnly(event)" required>
                            </div>
                            <div class="input-box">
                                <input type="date" class="input-field" placeholder="Date de naissance" name="dateR" required>
                            </div> 
                            <div class="input-box">
                                <input type="email" class="input-field" placeholder="Email" name="emailR" required>
                            </div>      
                            <div class="input-box">
                                <input type="password" class="input-field" placeholder="Mot De Passe" name="MDPR" required>
                            </div>
                            <div class="wraer">
                                <div class="option">
                                    <input checked="" value="option1" name="btn" type="radio" class="input">
                                    <div class="btnn">
                                    <span class="span">etudiant</span>
                                    </div>
                                </div>
                                <div class="option">
                                    <input value="option2" name="btn" type="radio" class="input">
                                    <div class="btnn">
                                    <span class="span">recruteur</span>
                                    </div>  </div>
                                <div class="option">
                                    <input value="option3" name="btn" type="radio" class="input">
                                    <div class="btnn">
                                    <span class="span">admin</span>
                                    </div>  
                                </div>
                                </div>
                            <style>
                                .wraer {
                                    --font-color-dark: #111;/*LOUN EL KTIBA*/
                                    --font-color-light: #111;
                                    --bg-color: #fcfdfd;
                                    --main-color: #03a4ed;
                                    position: relative;
                                    width: 280px;
                                    height: 36px;
                                    background-color: var(--bg-color);
                                    border: 2px solid #fffdfd;
                                    border-radius: 34px;
                                    display: flex;
                                    flex-direction: row;
                                    box-shadow: 4px 4px #03a4ed;
                                    font-size: 15px;
                                }
                                .option {
                                    width: 100px;
                                    height: 28px;
                                    position: relative;
                                    top: 2px;
                                    left: 2px;
                                    margin-bottom: 30px;
                                }
                                
                                .input {
                                    width: 100%;
                                    height: 100%;
                                    position: absolute;
                                    left: 0;
                                    top: 0;
                                    appearance: none;
                                    cursor: pointer;
                                }
                                
                                .btnn {
                                    width: 100%;
                                    height: 100%;
                                    background-color: var(--bg-color);
                                    border-radius: 50px;
                                    display: flex;
                                    justify-content: center;
                                    align-items: center;
                                }
                                
                                .span {
                                    color: var(--font-color-dark);
                                }
                                
                                .input:checked + .btnn {
                                    background-color: var(--main-color);
                                }
                                
                                .input:checked + .btnn .span {
                                    color: var(--font-color-light);
                                }
                            </style>
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
</form>
<!-- JS -->
<script src="assets/js/main.js"></script>

</body>
</html>
