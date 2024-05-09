<?php

use Twilio\Rest\Client;
require_once "C:/xampp/htdocs/G_offres/vendor/autoload.php";

// Remplacez les valeurs ci-dessous par vos propres identifiants Twilio
$sid    = "ACcd3a9bd154367fdf085909a01ed35638";
$token  = "f926b2c64e3a2b53ea54d5ee3faf93e0";

// Remplacez également ces valeurs par votre numéro Twilio et le numéro du destinataire
$twilio_number = "+12192244059"; // Votre numéro Twilio
$recipient_number = "+216" . $_GET['recipient']; // Le numéro du destinataire

// Corps du message
$message_body = "Bonjour, votre demande est " . $_GET['message'] . ".";



try {
    // Initialisez le client Twilio
    $twilio = new Client($sid, $token);

    // Envoyer le message SMS
    $message = $twilio->messages->create(
        $recipient_number,
        array(
            'from' => $twilio_number,
            'body' => $message_body
        )
    );

    // Afficher l'identifiant du message
    echo 'Message envoyé avec succès. ID du message : ' . $message->sid;
} catch (Exception $e) {
    // Gérer les erreurs d'envoi de message
    echo 'Erreur lors de l\'envoi du message : ' . $e->getMessage();
}
?>
