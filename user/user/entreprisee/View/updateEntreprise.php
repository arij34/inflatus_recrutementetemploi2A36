<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include '../Controller/EntrepriseC.php';


// create an instance of the controller
$entrepriseC = new EntrepriseC();
$error = "";
$success_message = "";
// create entreprise
$entreprise = null;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["idE"]) && !empty($_POST["idE"])) {
        $idE = $_POST["idE"];
        $entreprise = $entrepriseC->showEntreprise($idE);
        if (!$entreprise) {
            $error = "Aucun utilisateur trouvé pour l'identifiant fourni.";
        }
    }
if (isset($_POST["modifier"]) && $entreprise && isset($_POST["nomEntreprise"]) && isset($_POST["adresse"]) && isset($_POST["dateCreation"]) && isset($_POST["telephoneEn"]) && isset($_POST["descriptionE"]) && isset($_POST["emailEn"]) && isset($_POST["MDPEn"])) 
{
    $nomEntreprise=$_POST["nomEntreprise"]?? '';
    $adresse=$_POST["adresse"]?? '';
    $dateCreation=$_POST["dateCreation"]?? '';
    $telephoneEn=$_POST["telephoneEn"]?? '';
    $descriptionE=$_POST["descriptionE"]?? '';
    $emailEn=$_POST["emailEn"]?? '';
    $MDPEn=$_POST["MDPEn"]?? '';
        // Vérification des champs requis
        if (empty($nomEntreprise) || empty($adresse) || empty($dateCreation) || empty($telephoneEn) || empty($descriptionE) || empty($emailEn) || empty($MDPEn)) {
            $error = "Tous les champs doivent être remplis";
        } else {
            $result = $entrepriseC->updateEntreprise($idE, $nomEntreprise, $adresse, $dateCreation, $telephoneEn, $descriptionE, $emailEn, $MDPEn);
            if ($result) {
                // Affichage du message de succès
                $success_message = "Modifications enregistrées avec succès.";
                header("Location: http://localhost/web/entreprisee/view/table.php");
                
            } else {
                $error = "Erreur lors de la mise à jour de l'utilisateur.";
            }
        }
    }
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>KHADAMNI - Dashboard</title>
    <!-- Pignose Calender -->
    <link href="../view/dashboard/plugins/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
    <!-- Chartist -->
    <link rel="stylesheet" href="../view/dashboard/plugins/chartist/css/chartist.min.css">
    <link rel="stylesheet" href="../view/dashboard/plugins/chartist-plugin-tooltips/css/chartist-plugin-tooltip.css">
    <!-- Custom Stylesheet -->
    <link href="../view/dashboard/css/style.css" rel="stylesheet">
    <style>
        
        .error-message {
            left: 0;
            color: red;
            font-size: 15px;
        }
    </style>
</head>

<body>
<div id="preloader">
        <div class="loader">
            <svg class="circular" viewBox="25 25 50 50">
                <circle class="path" cx="50" cy="50" r="20" fill="none" stroke-width="3" stroke-miterlimit="10" />
            </svg>
        </div>
    </div>
    <div id="main-wrapper">
        <div class="corner-container">
                  <img src="../View/dashboard/images/logoooooo.png" >
                  <style>
                    .corner-container {
                        position: fixed; /* Position fixe pour que le logo reste fixe lors du défilement */
                        top: 0; /* Distance depuis le haut */
                        left: 70px; /* Distance depuis la gauche */
                        z-index: 9999; /* Assure que le logo est au-dessus de tout le contenu */
                    }

                    .corner-container img {
                        width: 90px; /* Largeur minimale du logo */
                        top: 0; /* Distance depuis le haut */

                        height: auto; /* Hauteur ajustée automatiquement pour conserver les proportions */
                    }
                  </style>
        </div> 
        <div class="header">    
            <div class="header-content clearfix">
                
                <div class="nav-control">
                    <div class="hamburger">
                        <span class="toggle-icon"><i class="icon-menu"></i></span>
                    </div>
                </div>
                <div class="header-left">
                    <div class="input-group icons">
                        <div class="input-group-prepend">
                            <span class="input-group-text bg-transparent border-0 pr-2 pr-sm-3" id="basic-addon1"><i class="mdi mdi-magnify"></i></span>
                        </div>
                        <input type="search" class="form-control" placeholder="Search Dashboard" aria-label="Search Dashboard">
                        <div class="drop-down   d-md-none">
							<form action="#">
								<input type="text" class="form-control" placeholder="Search">
							</form>
                        </div>
                    </div>
                </div>
                <div class="header-right">
                    <ul class="clearfix">
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-email-outline"></i>
                                <span class="badge gradient-1 badge-pill badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">3 New Messages</span>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li class="notification-unread">
                                            <a href="javascript:void()">
                                                <img class="float-left mr-3 avatar-img" src="images/avatar/1.jpg" alt="">
                                                <div class="notification-content">
                                                    <div class="notification-heading">Saiful Islam</div>
                                                    <div class="notification-timestamp">08 Hours ago</div>
                                                    <div class="notification-text">Hi Teddy, Just wanted to let you ...</div>
                                                </div>
                                            </a>
                                        </li>
                                    

                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown"><a href="javascript:void(0)" data-toggle="dropdown">
                                <i class="mdi mdi-bell-outline"></i>
                                <span class="badge badge-pill gradient-2 badge-primary">3</span>
                            </a>
                            <div class="drop-down animated fadeIn dropdown-menu dropdown-notfication">
                                <div class="dropdown-content-heading d-flex justify-content-between">
                                    <span class="">2 New Notifications</span>  
                                    
                                </div>
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="javascript:void()">
                                                <span class="mr-3 avatar-icon bg-success-lighten-2"><i class="icon-present"></i></span>
                                                <div class="notification-content">
                                                    <h6 class="notification-heading">Events near you</h6>
                                                    <span class="notification-text">Within next 5 days</span> 
                                                </div>
                                            </a>
                                        </li>
                                    </ul>
                                    
                                </div>
                            </div>
                        </li>
                        <li class="icons dropdown">
                            <div class="user-img c-pointer position-relative"   data-toggle="dropdown">
                                <span class="activity active"></span>
                                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" height="40" width="40" alt="">
                            </div>
                            <div class="drop-down dropdown-profile animated fadeIn dropdown-menu">
                                <div class="dropdown-content-body">
                                    <ul>
                                        <li>
                                            <a href="http://localhost/web/final/back/viewProfil/profil.php"><i class="icon-user"></i> <span>Profile</span></a>
                                        </li>
                                        <li>
                                            <a href="javascript:void()">
                                                <i class="icon-envelope-open"></i> <span>Inbox</span> <div class="badge gradient-3 badge-pill gradient-1">3</div>
                                            </a>
                                        </li>
                                        
                                        <hr class="my-2">
                                        <li><a href="aff.php"><i class="icon-key"></i> <span>Logout</span></a></li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="nk-sidebar">           
            <div class="nk-nav-scroll">
                <ul class="metismenu" id="menu">
                    <li class="nav-label">Dashboard</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-speedometer menu-icon"></i><span class="nav-text">Dashboard</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/final/back/view/afficher.php">Acceuil</a></li>
                            <!-- <li><a href="./index-2.html">Home 2</a></li> -->
                        </ul>
                    </li>
                    <li class="nav-label">Gestions</li>
                    <li>
                        <a class="has-arrow" href="javascript:void()" aria-expanded="false">
                            <i class="icon-menu menu-icon"></i><span class="nav-text">Gestion Utilisateurs</span>
                        </a>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/entreprisee/view/table.php" aria-expanded="false">Tableau Entreprise</a></li>
                        </ul>
                        <ul aria-expanded="false">
                            <li><a href="http://localhost/web/etudiant/view/afficher.php" aria-expanded="false">Tableau Etudiant</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>

        <div class="content-body">
            <style>
                .content-body {
                display: flex;
                justify-content: center;
                align-items: center;
                min-height: 100vh;
                background-color: #f0f0f0;
                }

                .register {
                    width: 400px;
                    padding: 20px 10px; /* Increased top and bottom padding */
                    background-color: #fff;
                    border: 2px solid orange;
                    border-radius: 10px;
                    box-shadow: 0 0 10px #fe3f40;
                }

                .form-title {
                    text-align: center; /* Center the title horizontally */
                    color: #fe3f40;
                    font-size: 28px;
                    font-weight: 600;
                    margin-bottom: 40px; /* Adjusted margin for spacing */
                    margin-top: 20px; /* Added margin to move title towards the top */
                }

                .input-box {
                    position: relative;
                }

                .input-field {
                    width: 100%;
                    height: 30px;
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

                .input-submit {
                    display: flex;
                    align-items: center;
                    justify-content: center;
                    gap: 10px;
                    width: 100%;
                    height: 50px;
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
                    background-color: #fe3f40
                }
            </style>
            <div class="register">
                <?php if ($success_message != "") { ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $success_message; ?>
                        </div>
                <?php } ?>
                <form action="" method="POST" name="myForm" id="registrationForm" >
                    <div class="form-inputs">
                        <input type="hidden" name="idE"  value="<?php echo $entreprise['idE']; ?>">
                        <div class="input-box">
                            <input type="text" class="input-field" placeholder="Nom d'entreprise" name="nomEntreprise"  value="<?php echo $entreprise['nomEntreprise']?? ''; ?>">
                            <span class="error-message" id="nom-error"></span> 
                            <input type="text" class="input-field" placeholder="Adresse" name="adresse"  value="<?php echo $entreprise['adresse']?? ''; ?>">
                            <input type="date" class="input-field" placeholder="Date de creation" name="dateCreation"  value="<?php echo $entreprise['dateCreation']?? ''; ?>">
                            <span class="error-message" id="date-error"></span> 
                            <input type="text" class="input-field" placeholder="Telephone" name="telephoneEn" value="<?php echo $entreprise['telephoneEn']?? ''; ?>" onkeypress="allowNumbersOnly(event)">
                            <span class="error-message" id="telephone-error"></span> 
                            <input type="text" class="input-field" placeholder="Description" name="descriptionE"  value="<?php echo $entreprise['descriptionE']?? ''; ?>" maxlength="20" onkeypress="allowLettersOnly(event)" >
                            <input type="text" class="input-field" placeholder="Email" name="emailEn" value="<?php echo $entreprise['emailEn'] ?? ''; ?>">
                            <span class="error-message" id="email-error"></span>
                            <input type="text" class="input-field" placeholder="Mot De Passe" name="MDPEn" value="<?php echo $entreprise['MDPEn'] ?? ''; ?>">
                            <span class="error-message" id="mdp-error"></span> 
                        </div>
                        <div class="input-box">
                            <button type="submit" class="input-submit" name="modifier">
                                <span>Modifier</span>
                                <i class="bx bx-right-arrow-alt"></i>
                            </button>
                        </div>
                    </div>
                </form>

                
            </div>
        </div>
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
                var nom = form.querySelector('input[name="nomEntreprise"]').value;
                var adresse = form.querySelector('input[name="adresse"]').value;
                var dateCreation = form.querySelector('input[name="dateCreation"]').value;
                var telephone = form.querySelector('input[name="telephoneEn"]').value;
                var Description = form.querySelector('input[name="descriptionE"]').value;
                var email = form.querySelector('input[name="emailEn"]').value;
                var password = form.querySelector('input[name="MDPEn"]').value;

                // Check if any required field is empty
                if (nom.trim() === '' || adresse.trim() === '' || dateCreation.trim() === '' || telephone.trim() === '' || Description.trim() === '' || email.trim() === '' || password.trim() === '') {
                    alert("Veuillez saisir tous les champs.");
                    event.preventDefault();
                    return; // Stop further processing
                }
                // Get the current date
                var currentDate = new Date();
                var currentYear = currentDate.getFullYear();
                // Calculate the time difference in years
                var creationDate = new Date(dateCreation);
                var creationYear = creationDate.getFullYear();
                var timeDifference = currentYear - creationYear;
                
                // Regular expressions for validation
                var nameRegex = /^[a-zA-Z\s]+$/;
                var phoneRegex = /^\d{8}$/;

                // Clear previous error messages
                clearErrorMessages();

                // Validate NomE and PrenomE (only characters)
                if (!nameRegex.test(nom)) {
                    displayErrorMessage('nom-error', "Lettres seulement.");
                    event.preventDefault();
                }

                // Validate TelephoneE (exactly 8 numbers)
                if (!phoneRegex.test(telephone)) {
                    displayErrorMessage('telephone-error', "Le téléphone doit contenir 8 chiffres.");
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
                // Validate dateCreation (at least 5 years old)
                if (timeDifference < 5) {
                    displayErrorMessage('date-error', "La date de création doit avoir au moins 5 ans.");
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
   

                 

    <script src="../view/dashboard/plugins/common/common.min.js"></script>
    <script src="../view/dashboard/js/custom.min.js"></script>
    <script src="../view/dashboard/js/settings.js"></script>
    <script src="../view/dashboard/js/gleek.js"></script>
    <script src="../view/dashboard/js/styleSwitcher.js"></script>

    <!-- Chartjs -->
    <script src="../view/dashboard/plugins/chart.js/Chart.bundle.min.js"></script>
    <!-- Circle progress -->
    <script src="../view/dashboard/plugins/circle-progress/circle-progress.min.js"></script>
    <!-- Datamap -->
    <script src="../view/dashboard/plugins/d3v3/index.js"></script>
    <script src="../view/dashboard/plugins/topojson/topojson.min.js"></script>
    <script src=".../view/dashboard/plugins/datamaps/datamaps.world.min.js"></script>
    <!-- Morrisjs -->
    <script src="../view/dashboard/plugins/raphael/raphael.min.js"></script>
    <script src="../view/dashboard/plugins/morris/morris.min.js"></script>
    <!-- Pignose Calender -->
    <script src="../view/dashboard/plugins/moment/moment.min.js"></script>
    <script src="../view/dashboard/plugins/pg-calendar/js/pignose.calendar.min.js"></script>
    <!-- ChartistJS -->
    <script src="../view/dashboard/plugins/chartist/js/chartist.min.js"></script>
    <script src="../view/dashboard/plugins/chartist-plugin-tooltips/js/chartist-plugin-tooltip.min.js"></script>



    <script src="../view/dashboard/js/dashboard/dashboard-1.js"></script>

   
</body>

</html>
