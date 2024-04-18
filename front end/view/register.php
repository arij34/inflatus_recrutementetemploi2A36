<?php
require_once 'C:\xampp\htdocs\gestion entretien\front end\controler\entretienC.php';
$userC = new UserC();



$error = "";

if (
    isset($_POST["email_test"]) &&
    isset($_POST["nom_entreprise_test"]) &&
    isset($_POST["domaine_informatique_test"]) &&
    isset($_POST["date_test"])
) {
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

/*if (
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
        $user = new User(
            null,
            $_POST['email_test'],
            $_POST['nom_entre'],
            $_POST['prenom_entre'],
            $_POST['nom_entreprise_test'],
            $_POST['date_entre'],
            $_POST['date_test']
        );

        $userC->addUser($user);

        header('Location: success.php');
        exit;
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}*/
?>
<!DOCTYPE html>
<html lang="en">
<head>
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
            <button class="btn btn-1" id="test"> TEST</button>
            <button class="btn btn-2" id="entretien"> ENTRETIEN </button>
        </div>
        <div class="login-form">
    <form id="test-form" action="register.php" method="post">
        <div class="form-title">
            <span>Test Enligne</span>
        </div>
        <div class="form-inputs">
            <div class="input-box">
                <input type="text" class="input-field" id="email" placeholder="Email" name="email_test" style="width: 100%;" required>
                <div id="email-error" class="error-message"></div>
            </div>
            <div class="input-box">
                <input type="text" class="input-field" id="entreprise" placeholder="Nom de l'entreprise" name="nom_entreprise_test" style="width: 100%;" required>
                <div id="entreprise-error" class="error-message"></div>
            </div>
            <div class="input-box">
                <select class="input-field" id="domaine" name="domaine_informatique_test" style="width: 100%;" required>
                    <option value="" disabled selected hidden> Domaine informatique</option>
                    <option value="web">Développement Web</option>
                    <option value="mobile">Développement Mobile</option>
                    <option value="data">Science des Données</option>
                    <option value="security">Sécurité Informatique</option>
                </select>
                <div id="domaine-error" class="error-message"></div>
            </div>
            <div class="input-box">
                <input type="date" class="input-field" id="date" placeholder="Date de test" name="date_test" style="width: 100%;" required>
                <div id="date-error" class="error-message"></div>
            </div>
            <div class="input-box">
                <button type="submit" class="input-submit" id="submit-btn">
                    <span>envoyer</span>
                    <i class="bx bx-right-arrow-alt"></i>
                </button>
            </div>
        </div>
    </form>
</div>

<style>
    .error-message {
        color: red;
    }
</style>

        <script>
    document.getElementById('test-form').addEventListener('submit', function(event) {
        // Prevent form submission
        event.preventDefault();
        
        // Reset error messages
        document.querySelectorAll('.error-message').forEach(function(error) {
            error.textContent = '';
        });
        
        // Validate email
        var email = document.getElementById('email').value;
        if (!isValidEmail(email)) {
            document.getElementById('email-error').textContent = 'enter une addresse email valide  ';
            return;
        }
        
        // Other validation logic for fields like entreprise, domaine, and date
        
        // If all validations pass, submit the form
        this.submit();
    });

    function isValidEmail(email) {
        // Regular expression to validate email format
        var emailRegex = /\S+@\S+\.\S+/;
        return emailRegex.test(email);
    }
</script>
<form action="" method="POST" onsubmit="return validateForm()">
        <div class="register-form">
            <div class="form-title">
                <span>Entretien </span>
            </div>
            <form action="#" method="post">
            <div class="form-inputs">
                        <div class="input-box">
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Email" name="email_test" onkeypress="handleEmailInput(event)" required>
                        </div>
                        </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Nom" name="nom_test" onkeypress="allowLettersOnly(event)" required>
                        <input type="text" class="input-field" placeholder="Prénom" name="prenom_test" onkeypress="allowLettersOnly(event)" required>
                    </div>
                    <div class="input-box">
                        <input type="text" class="input-field" placeholder="Entreprise" name="nom_entreprise_test" onkeypress="allowLettersOnly(event)" required>
                        
                    </div>
                    <div class="input-box">
                        <input type="date" class="input-field" placeholder="Date d'entretien" name="date_entre" style="width: 100%;" required>
                    </div>
                    <div class="input-box">
                        <select class="input-field" style="width: 100%;" name="type_entre" required>
                            <option value="" disabled selected hidden> Type d'entretien</option>
                            <option value="web">En ligne</option>
                            <option value="mobile">Presentiel</option>
                        </select>
                    </div>
                    <div class="input-box">
                            <button type="submit" class="input-submit">
                                <span>registrer</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                </form>
    
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

    var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailPattern.test(emailR);



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

    function allowLettersOnly(event) {
    var charCode = event.which || event.keyCode;
    if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122)) {
        event.preventDefault();
    }
}

</script>
    </div>
</div>
<script src="assets/js/main.js"></script>
</body>
</html>

