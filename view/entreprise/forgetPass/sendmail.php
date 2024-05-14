<?php
include 'C:/xampp/htdocs/web/controller/EntrepriseC.php';

    // Utilisation de PHPMailer pour envoyer l'e-mail
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once "mail/Exception.php";
    require_once "mail/PHPMailer.php";
    require_once "mail/SMTP.php";

    // Vérifie si l'adresse e-mail est définie dans les données POST
    if(isset($_POST["email"])) {
        $email = $_POST["email"];
        $userC = new EntrepriseC();
        $user = $userC->getUserByEmail($email);

        // Check if user with email exists
        if($user) {
        try {
            // Instanciation de PHPMailer en activant les exceptions
            $mail = new PHPMailer(true);
            
            // Configuration du serveur SMTP
            $mail->isSMTP();                                          
            $mail->Host       = 'smtp.gmail.com';                   
            $mail->SMTPAuth   = true;                                  
            $mail->Username   = 'mahaallani123@gmail.com';
            $mail->Password   = "druc dzic zkaz nuqw";                               
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
            $mail->Port       = 587;                                  
    
            // Définition de l'expéditeur et du destinataire
            $mail->setFrom('mahaallani123@gmail.com', 'KHADEMNI');
            $mail->addAddress($email);    

            // Contenu de l'e-mail
            $mail->isHTML(true);                                 
            $mail->Subject = 'Changer Mot De Passe';
            $mail->Body    = 'Voici votre lien pour modifier votre mot de passe : <a href="http://localhost/web/view/entreprise/forgetPass/reset.php">Cliquez ici</a>';
            $mail->AltBody = 'Vous avez eu de problème pour charger le formulaire.';

            // Envoi de l'e-mail
            if($mail->send()) {
                // Redirection après l'envoi de l'e-mail
                header('Location:http://localhost/web/view/entreprise/forgetPass/mailenvoyee.html');
                exit();
            } else {
                echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
            }
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$e->getMessage()}";
        }    
    } else {
        echo '<script>alert("L\'adresse e-mail n\'est pas enregistrée."); window.location.href = "forget.php";</script>';    }
} else {
    echo "L'adresse e-mail est manquante.";
}
?>