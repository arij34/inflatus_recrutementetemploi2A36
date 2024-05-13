<?php
include '../Model/Evenement.php';
require_once '../Controller/categorieevnC.php';

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
    // Avant de supprimer l'événement, récupérez ses informations
    $evenementToDelete = $this->showEvenement($idEvenement);

    $sql = "DELETE FROM evenement  WHERE idEvenement = :idEvenement";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':idEvenement', $idEvenement);

    try {
        $req->execute();

        // Envoyez l'alerte pour informer que l'événement a été supprimé
        $message = "L'événement avec l'ID " . $idEvenement . " a été supprimé.";
        // Envoyer l'alerte par e-mail
        // mail($to, $subject, $message, $headers);
        // Ou vous pouvez utiliser une autre méthode d'alerte, comme l'envoi d'une notification, l'enregistrement dans un fichier de journal, etc.
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}
function addEvenement($Evenement)
{
    $sql = "INSERT INTO evenement  
            VALUES (NULL, :nomEvenement, :adresseEVN, :dateEVN, :idCategorieEVN, :ancienneAdresseEVN, :ancienneDateEVN, :idEntreprise)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nomEvenement' => $Evenement->getNomEvenement(),
            'adresseEVN' => $Evenement->getAdresseEVN(),
            'dateEVN' => $Evenement->getDateEVN()->format('Y-m-d'),
            'idCategorieEVN' => $Evenement->getIdCategorieEVN(),
            'ancienneAdresseEVN' => $Evenement->getAncienneAdresseEVN() ?? $Evenement->getAdresseEVN(),
            'ancienneDateEVN' => $Evenement->getAncienneDateEVN()->format('Y-m-d') ?? $Evenement->getDateEVN()->format('Y-m-d'),
            'idEntreprise' => $Evenement->getIdEntreprise(),
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


function updateEvenement($Evenement, $idEvenement, $idEntreprise)
{
    try {
        $db = config::getConnexion();
        
        // Récupérer les anciennes valeurs de dateEVN et adresseEVN
        $oldEvenement = $this->showEvenement($idEvenement);
        $ancienneDateEVN = $oldEvenement['dateEVN'];
        $ancienneAdresseEVN = $oldEvenement['adresseEVN'];

        $query = $db->prepare(
            'UPDATE evenement SET 
            nomEvenement = :nomEvenement, 
            adresseEVN = :adresseEVN, 
            ancienneDateEVN = :ancienneDateEVN, 
            ancienneAdresseEVN = :ancienneAdresseEVN, 
            dateEVN = :dateEVN, 
            idCategorieEVN = :idCategorieEVN
        WHERE idEvenement = :idEvenement AND idEntreprise = :idEntreprise'
        );

        $query->execute([
            'idEvenement' => $idEvenement,
            'nomEvenement' => $Evenement->getNomEvenement(),
            'adresseEVN' => $Evenement->getadresseEVN(),
            'ancienneDateEVN' => $ancienneDateEVN,
            'ancienneAdresseEVN' => $ancienneAdresseEVN,
            'dateEVN' => $Evenement->getdateEVN()->format('Y-m-d'),
            'idCategorieEVN' => $Evenement->getIdCategorieEVN(),
            'idEntreprise' => $idEntreprise,
        ]);

        // Votre logique supplémentaire ici...

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
    function getNomEntrepriseById($idEntreprise)
{
    $sql = "SELECT nomEntreprise FROM entreprise WHERE idEntreprise = :idEntreprise";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute(['idEntreprise' => $idEntreprise]);
        $result = $query->fetchColumn();
        return $result;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

}
