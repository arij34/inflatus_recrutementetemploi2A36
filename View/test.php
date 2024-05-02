<?php
require_once "../Controller/DemandeC.php";
require_once 'PHPMailer/PHPMailer.php'; // Include PHPMailer
require_once 'PHPMailer/Exception.php';
require_once 'PHPMailer/SMTP.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Assuming $demande is defined somewhere with required properties
    $demande = new DemandeC();

    // Call the sendEmailToStudent function
    sendEmailToStudent($demande);
}

function sendEmailToStudent($demande)
{
    try {
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'c2c953ff28d5ac';
        $phpmailer->Password = '54e8ce31cfdd32';

        // Destinataire
        $phpmailer->setFrom('chebanefarah@gmail.com', 'chebane');
        $phpmailer->addAddress($demande->getemail_d(), $demande->getnom_d() . ' ' . $demande->getprenom_d());

        // Contenu de l'e-mail
        $phpmailer->isHTML(true);
        $phpmailer->Subject = 'Mise à jour de votre demande';
        $phpmailer->Body = 'Votre demande a été ' . ($demande->getstatus_d() == 'accepté' ? 'acceptée' : 'refusée');

        // Envoyer l'e-mail
        $phpmailer->send();
        echo 'E-mail sent successfully';
    } catch (Exception $e) {
        echo 'Error sending e-mail: ' . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Send Email Form</title>
</head>
<body>
    <h2>Send Email</h2>
    <form method="post">
        <label for="nom_d">Nom:</label><br>
        <input type="text" id="nom_d" name="nom_d" required><br><br>

        <label for="prenom_d">Prénom:</label><br>
        <input type="text" id="prenom_d" name="prenom_d" required><br><br>

        <label for="email_d">Email:</label><br>
        <input type="email" id="email_d" name="email_d" required><br><br>

        <label for="status_d">Statut:</label><br>
        <input type="text" id="status_d" name="status_d" required><br><br>

        <input type="submit" value="Send Email">
    </form>
</body>
</html>
