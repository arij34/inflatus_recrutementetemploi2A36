<?php
session_start();
include "../controller/UserC.php"; 

$error = "";
$user = null;
$userC = new UserC();

// Registration form handling
if (
    isset($_POST["nomE"]) &&
    isset($_POST["prenomE"]) &&
    isset($_POST["telephoneE"]) &&
    isset($_POST["age"]) &&
    isset($_POST["emailE"]) &&
    isset($_POST["MDPE"]) 
) {
    if (
        !empty($_POST["nomE"]) &&
        !empty($_POST["prenomE"]) &&
        !empty($_POST["telephoneE"]) &&
        !empty($_POST["age"]) &&
        !empty($_POST["emailE"]) &&
        !empty($_POST["MDPE"]) 
    ) {
        $user = new User(
            null,
            $_POST["nomE"],
            $_POST["prenomE"],
            $_POST["telephoneE"], 
            $_POST["age"],
            $_POST["emailE"],
            $_POST["MDPE"] 
        );
        $userC->addUser($user);
        header('Location: register.php');
        exit;
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}

// Login form handling
if(isset($_POST['afficher'])) {
    // Check if email and password are provided
    if(isset($_POST['emailE']) && isset($_POST['MDPE'])) {
        $emailE = $_POST['emailE'];
        $MDPE = $_POST['MDPE'];

        // Check if email and password are not empty
        if(!empty($emailE) && !empty($MDPE)) {
            $userC = new UserC();
            
            // Check if the user with the given email exists
            $userByEmail = $userC->getUserByEmail($emailE);

            // Check if the user with the given password exists
            $userByPassword = $userC->getUserByPassword($MDPE);

            // Verify both conditions
            if(!empty($userByEmail) && !empty($userByPassword)) {
                // Both email and password are correct
                $_SESSION['idEtudiant'] = $userByEmail['idEtudiant'];
                $_SESSION['nomE'] = $userByEmail['nomE'];
                $_SESSION['prenomE'] = $userByEmail['prenomE'];
                $_SESSION['telephoneE'] = $userByEmail['telephoneE'];
                $_SESSION['age'] = $userByEmail['age'];
                $_SESSION['emailE'] = $emailE;
                $_SESSION['MDPE'] = $MDPE;
                header("Location: ../view(profil)/Home/templatemo_562_space_dynamic/index.html");
                exit;
            } else {
                // Incorrect email or password
                $error = "Incorrect email or password";
                echo '<script> alert("compte non trouve.") ; window.location.href = "http://localhost/web/etudiant/view(profil)/register.php";</script>';
                exit();
            }
        } else {
            // Email or password is empty
            $error = "Email and password are required";
            echo '<script> alert("Veuillez entrer votre email et mot de passe") ; window.location.href = "http://localhost/web/etudiant/view(profil)/register.php";</script>';
            exit();
        }
    } else {
        // Email or password not provided
        $error = "Email and password are required";
        echo '<script>alert("Veuillez entrer votre email et mot de passe.") ; window.location.href = "http://localhost/web/etudiant/view(profil)/register.php";</script>';
        exit();
    }

    // If there's an error, redirect back to login page with error message
    if(isset($error)) {
        header("Location: ../login.php?error=$error");
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
    <style>
        .error-message {
            position: absolute;
            left: 0;
            top: 69%;
            color: red;
            font-size: 15px;
        }
    </style>
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
                            <input type="text" class="input-field" placeholder="Email" name="emailE" value="<?php echo $user['emailE'] ??''; ?>">
                        </div>
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Mot de passe" name="MDPE" value="<?php echo $user['MDPE'] ??''; ?>">
                        </div>
                        <label for="forgotpassword"><a href="http://localhost/web/etudiant/forgetPass/forget.php" class="forgot-password">Mot de passe oublié?</a></label>
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
                <div class="form-title">
                    <span>S'INSECRIRE </span>
                </div>
                <form action="" method="POST" id="registrationForm">
                    <div class="form-inputs">
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Nom" name="nomE" id="nom">
                            <span class="error-message" id="nom-error"></span> 
                            <input type="text" class="input-field" placeholder="Prénom" name="prenomE" id="prenom">
                            <span class="error-message" id="prenom-error"></span> 
                        </div>
                        
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Telephone" name="telephoneE"id="telephone">
                            <span class="error-message" id="telephone-error"></span> 
                        </div>
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Age" name="age">
                            <span class="error-message" id="age-error"></span> 
                        </div> 
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Email" name="emailE"id="email" >
                            <span class="error-message" id="email-error"></span> 
                        </div>      
                        <div class="input-box">
                            <input type="password" class="input-field" placeholder="Mot De Passe" name="MDPE" id="password">
                            <span class="error-message" id="mdp-error"></span> 
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
<script>
        document.addEventListener('DOMContentLoaded', function () {
            var form = document.getElementById('registrationForm');
            var inputFields = form.querySelectorAll('.input-field');

            inputFields.forEach(function (input) {
                input.addEventListener('input', function () {
                    clearErrorMessage(input.id + '-error');
                });

                input.addEventListener('focus', function () {
                    clearErrorMessage(input.id + '-error');
                });
            });

            form.addEventListener('submit', function (event) {
                var nom = form.querySelector('input[name="nomE"]').value;
                var prenom = form.querySelector('input[name="prenomE"]').value;
                var telephone = form.querySelector('input[name="telephoneE"]').value;
                var age = form.querySelector('input[name="age"]').value;
                var email = form.querySelector('input[name="emailE"]').value;
                var password = form.querySelector('input[name="MDPE"]').value;

                // Check if any required field is empty
                if (nom.trim() === '' || prenom.trim() === '' || telephone.trim() === '' || age.trim() === '' || email.trim() === '' || password.trim() === '') {
                    alert("Veuillez saisir tous les champs.");
                    event.preventDefault();
                    return; // Stop further processing
                }
                // Regular expressions for validation
                var nameRegex = /^[a-zA-Z]+$/;
                var phoneRegex = /^\d{8}$/;
                var ageValue = parseInt(age, 10);

                // Clear previous error messages
                clearErrorMessages();

                // Validate NomE and PrenomE (only characters)
                if (!nameRegex.test(nom)) {
                    displayErrorMessage('nom-error', "Lettres seulement.");
                    event.preventDefault();
                }

                if (!nameRegex.test(prenom)) {
                    displayErrorMessage('prenom-error', "Lettres seulement.");
                    event.preventDefault();
                }

                // Validate TelephoneE (exactly 8 numbers)
                if (!phoneRegex.test(telephone)) {
                    displayErrorMessage('telephone-error', "Le téléphone doit contenir 8 chiffres.");
                    event.preventDefault();
                }

                // Validate Age (between 22 and 30)
                if (ageValue < 22 || ageValue > 30) {
                    displayErrorMessage('age-error', "L'âge entre 22 et 30 ans.");
                    event.preventDefault();
                }

                // Validate Email (using the existing function)
                if (!validateEmail(email)) {
                    displayErrorMessage('email-error', "Veuillez saisir une adresse e-mail valide.");
                    event.preventDefault();
                }

                // Validate Password length
                if (password.length < 8) {
                    displayErrorMessage('mdp-error', "Doit contenir au moins 8 caractères.");
                    event.preventDefault();
                }

                function validateEmail(email) {
                    var regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    return regex.test(email);
                }

                function displayErrorMessage(elementId, message) {
                    var errorElement = document.getElementById(elementId);
                    errorElement.textContent = message;
                }

                function clearErrorMessage(elementId) {
                    var errorElement = document.getElementById(elementId);
                    if (errorElement) {
                        errorElement.textContent = '';
                    }
                }

                function clearErrorMessages() {
                    var errorElements = form.querySelectorAll('.error-message');
                    errorElements.forEach(function (element) {
                        element.textContent = '';
                    });
                }
            });
        });
    </script>


</body>
</html>
