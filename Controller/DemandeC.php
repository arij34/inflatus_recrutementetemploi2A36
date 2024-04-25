<?php
include '../config.php';
include '../Model/Demande.php';

class DemandeC
{
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

    function addDemande($demande)
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
