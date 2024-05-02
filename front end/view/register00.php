<?php
require_once 'C:\xampp\htdocs\gestion entretien\front end\controler\testC.php';
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

        echo '<script>alert("Utilisateur ajouter avec succés.");</script>';
        exit;
    } else {
        $error = "Tous les champs doivent être remplis";
    }
}

$userC2 = new UserC2();

if (
    isset($_POST["id_test"]) &&
    isset($_POST["email_test"]) &&
    isset($_POST["nom_entre"]) &&
    isset($_POST["prenom_entre"]) &&
    isset($_POST["nom_entreprise_test"]) &&
    isset($_POST["date_entre"]) &&
    isset($_POST["type_entre"])
) {
    if (
        !empty($_POST['id_test']) &&
        !empty($_POST['email_test']) &&
        !empty($_POST["nom_entre"]) &&
        !empty($_POST["prenom_entre"]) &&
        !empty($_POST["nom_entreprise_test"]) &&
        !empty($_POST["date_entre"]) &&
        !empty($_POST["type_entre"])
    ) {
        // Check if the provided id_test exists in the test table
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

        // If the provided id_test does not exist, display an alert message
        if (!$existing_id_test) {
            echo '<script>alert("Le id_test fourni n\'existe pas. Veuillez entrer un id_test valide.");</script>';
        } else {
            // Proceed with adding the user to the entretien table
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

            echo '<script>alert("Utilisateur ajouter avec succés.");</script>';
            exit;
        }
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


<div class="login-form">
    <form id="test-form" action="register.php" method="post">
        <div class="register-form">
            <div class="form-title">
                <span>Entretien</span>
            </div>
            <div class="form-inputs">
            <div class="input-box">
                    <input type="text" class="input-field" placeholder="id de test" name="id_test"value="<?= isset($existing_id_test['id_test']) ? $existing_id_test['id_test'] : '' ?>">
                </div>
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
    function validateIdTest() {
        var id_test = document.getElementById("id_test").value;
        // Perform AJAX request to check if the id_test exists in the database
        // You can use XMLHttpRequest or fetch API for this purpose
        // For demonstration, I'll assume a function called checkIdTestExists is used
        checkIdTestExists(id_test);
        return false; // Prevent form submission until AJAX request completes
    }

    function checkIdTestExists(id_test) {
        // Make an AJAX request to your PHP script to check if the id_test exists
        // Here, you would send the id_test to your PHP script and handle the response
        // For demonstration, I'll assume a simple example using fetch API
        fetch('check_id_test.php?id_test=' + id_test)
            .then(response => response.json())
            .then(data => {
                if (data.exists) {
                    // If id_test exists, allow form submission
                    document.getElementById("id_test_error").innerText = "";
                    document.getElementById("entretien-form").submit();
                } else {
                    // If id_test does not exist, display an error message
                    document.getElementById("id_test_error").innerText = "ID de test incorrect";
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
    }
</script>

<script src="assets/js/main.js"></script>
<script src="front end/contr_saisie.js"></script>
</body>
</html>

