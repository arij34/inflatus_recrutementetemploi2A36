<?php
include '../config.php';
include '../Model/Entreprise.php';

class EntrepriseC
{
    public function listEntreprises()
    {
        $sql = "SELECT * FROM entreprise";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteEntreprise($idEntreprise)
    {
        $sql = "DELETE FROM entreprise WHERE idEntreprise = :idEntreprise";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idEntreprise', $idEntreprise);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addEntreprise($entreprise)
    {
        $sql = "INSERT INTO entreprise  
        VALUES (NULL, :nomEntreprise, :adresse, :telephone1, :telephone2, :email, :dateCreation, :idCategorie, :cheminImage)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomEntreprise' => $entreprise->getNomEntreprise(),
                'adresse' => $entreprise->getAdresse(),
                'telephone1' => $entreprise->getTelephone1(),
                'telephone2' => $entreprise->getTelephone2(),
                'email' => $entreprise->getEmail(),
                'dateCreation' => $entreprise->getDateCreation()->format('Y-m-d'),
                'idCategorie' => $entreprise->getIdCategorie(),
                'cheminImage' => $entreprise->getCheminImage() // Nouvelle propriété pour le chemin de l'image
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateEntreprise($entreprise, $idEntreprise)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE entreprise SET 
                    nomEntreprise = :nomEntreprise, 
                    adresse = :adresse, 
                    telephone1 = :telephone1, 
                    telephone2 = :telephone2, 
                    email = :email, 
                    dateCreation = :dateCreation, 
                    idCategorie = :idCategorie,
                    cheminImage = :cheminImage
                WHERE idEntreprise = :idEntreprise'
            );
            $query->execute([
                'idEntreprise' => $idEntreprise,
                'nomEntreprise' => $entreprise->getNomEntreprise(),
                'adresse' => $entreprise->getAdresse(),
                'telephone1' => $entreprise->getTelephone1(),
                'telephone2' => $entreprise->getTelephone2(),
                'email' => $entreprise->getEmail(),
                'dateCreation' => $entreprise->getDateCreation()->format('Y-m-d'),
                'idCategorie' => $entreprise->getIdCategorie(),
                'cheminImage' => $entreprise->getCheminImage() // Nouvelle propriété pour le chemin de l'image
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showEntreprise($idEntreprise)
    {
        $sql = "SELECT * from entreprise where idEntreprise = $idEntreprise";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $entreprise = $query->fetch();
            return $entreprise;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
   
}
