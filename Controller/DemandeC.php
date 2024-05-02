<?php
require_once '../config.php';
include '../Model/Demande.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/Exception.php';
require 'PHPMailer/SMTP.php';




class DemandeC
{ 
    private ?string $nom_d = null;
    private ?string $prenom_d = null;
    private ?string $email_d = null;
    private ?string $status_d  = null;
    
    function sendEmailToStudent($demande)
{
    try {
        $phpmailer = new PHPMailer(true);

        // Configurer les paramètres SMTP
        $phpmailer = new PHPMailer();
        $phpmailer->isSMTP();
        $phpmailer->Host = 'sandbox.smtp.mailtrap.io';
        $phpmailer->SMTPAuth = true;
        $phpmailer->Port = 2525;
        $phpmailer->Username = 'c2c953ff28d5ac';
        $phpmailer->Password = '54e8ce31cfdd32';

         // Destinataire
         $phpmailer->setFrom('arijachach@gmail.com', 'arij');
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
    


    public function afficheDemandes($id_o){
    try{
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT * from demande WHERE id_o = :id_o");
        $query->execute(['id_o'=>$id_o]);
        return $query->fetchAll();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
   }

   public function afficheOffres(){
    try{
        $pdo = config::getConnexion();
        $query = $pdo->prepare("SELECT * from offre ");
        $query->execute();
        return $query->fetchAll();
    }catch(PDOException $e){
        echo $e->getMessage();
    }
   }
    public function ListeDemandes()
    {
        $sql = "SELECT * FROM demande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function liste_demandes_fronte()
    {
        $sql = "SELECT * FROM demande";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteDemande($id_d)
    {
        $sql = "DELETE FROM demande WHERE id_d = :id_d";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_d', $id_d);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    

    function ajoutDemande($demande)
    {
        $sql = "INSERT INTO demande    
        VALUES (NULL, :id_etudiant, :nom_d, :prenom_d, :email_d, :telephone_d, :cv_d, :lettre_motivation, :id_o, :date_d, :status_d)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'id_etudiant' => $demande->getid_etudiant(),
                'nom_d' => $demande->getnom_d(),
                'prenom_d' => $demande->getprenom_d(),
                'email_d' => $demande->getemail_d(),
                'telephone_d' => $demande->gettelephone_d(),
                'cv_d' => $demande->getcv_d(),
                'lettre_motivation' => $demande->getlettre_motivation(),
                'id_o' => $demande->getid_o(),
                'date_d' => $demande->getdate_d()->format('Y-m-d'),
                'status_d' => $demande->getstatus_d()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    

    function updateDemande($demande, $id_d)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE demande SET 
                id_etudiant=:id_etudiant, 
                nom_d=:nom_d, 
                prenom_d=:prenom_d, 
                email_d=:email_d, 
                telephone_d=:telephone_d, 
                cv_d=:cv_d, 
                lettre_motivation=:lettre_motivation, 
                id_o=:id_o,
                date_d=:date_d, 
                status_d=:status_d 
                WHERE id_d=:id_d'
            );
    
            $date_d = $demande->getdate_d() ? $demande->getdate_d()->format('Y/m/d') : null;
    
            $query->execute([
                'id_d' => $demande->getid_d(),
                'id_etudiant' => $demande->getid_etudiant(),
                'nom_d' => $demande->getnom_d(),
                'prenom_d' => $demande->getprenom_d(),
                'email_d' => $demande->getemail_d(),
                'telephone_d' => $demande->gettelephone_d(),
                'cv_d' => $demande->getcv_d(),
                'lettre_motivation' => $demande->getlettre_motivation(),
                'id_o' => $demande->getid_o(),
                'date_d' => $date_d,
                'status_d' => $demande->getstatus_d()
            ]);
    
            // Envoyer un e-mail à l'étudiant
            $this->sendEmailToStudent($demande);
    
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    function showDemande($id_d)
    {
        $sql = "SELECT * from demande  where id_d =$id_d" ;
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $demande = $query->fetch();
            return $demande;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
   
}
