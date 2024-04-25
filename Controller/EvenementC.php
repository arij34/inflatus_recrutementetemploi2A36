<?php
include '../config.php';
include '../Model/Evenement.php';
include '../Model/categorieevn.php';

class EvenementC
{
    public function listEvenements()
    {
        $sql = "SELECT * FROM evenement";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteEvenement($idEvenement)
    {
        $sql = "DELETE FROM evenement  WHERE idEvenement = :idEvenement";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idEvenement', $idEvenement);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addEvenement($Evenement)
    {
        $sql = "INSERT INTO evenement  
        VALUES (NULL, :nomEvenement, :adresseEVN, :dateEVN, :idCategorieEVN)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomEvenement' => $Evenement->getNomEvenement(),
                'adresseEVN' => $Evenement->getAdresseEVN(),
                'dateEVN' => $Evenement->getDateEVN()->format('Y-m-d'),
                'idCategorieEVN' => $Evenement->getIdCategorieEVN(),
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateEvenement($Evenement, $idEvenement)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE evenement SET 
                    nomEvenement = :nomEvenement, 
                    adresseEVN = :adresseEVN, 
                    dateEVN = :dateEVN, 
                    idCategorieEVN = :idCategorieEVN,
                WHERE idEvenement = :idEvenement'
            );
            $query->execute([
                'idEvenement' => $idEvenement,
                'nomEvenement' => $Evenement->getNomEvenement(),
                'adresseEVN' => $Evenement->getadresseEVN(),
                'dateEVN' => $Evenement->getdateEVN()->format('Y-m-d'),
                'idCategorieEVN' => $Evenement->getIdCategorieEVN(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showEvenement($idEvenement)
    {
        $sql = "SELECT * from evenement where idEvenement = $idEvenement";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $Evenement = $query->fetch();
            return $Evenement;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function getNomCategorie($idCategorieEVN)
    {
        $sql = "SELECT nomCategorieEVN FROM categorieevn WHERE idCategorieEVN = :idCategorieEVN";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idCategorieEVN' => $idCategorieEVN]);
            $result = $query->fetchColumn();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

   
}
