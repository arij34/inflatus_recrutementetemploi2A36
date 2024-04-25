<?php
include '../config.php';
include '../model/User.php';

class UserC
{
    public function listUsers()
    {
        $sql = "SELECT * FROM recruteur";
        $db = Config::getConnexion();
        try {
            $data = $db->query($sql);
            return $data;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    public function deleteUser($idR)
    {
        $sql = "DELETE FROM recruteur WHERE idR = :idR";
        $db = Config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idR', $idR);
    
        // Ajoutez un message de débogage pour afficher l'ID
        echo "ID à supprimer : " . $idR;
    
        try {
            $req->execute();
        } catch (Exception $e) {
            // Affichez les erreurs SQL en cas d'échec de l'exécution de la requête
            die('Error:' . $e->getMessage());
        }
    }
    
    public function addUser($user)
    {
        $sql = "INSERT INTO recruteur (nomR, prenomR, telephoneR, dateR, emailR, MDPR) 
                VALUES (:nomR, :prenomR, :telephoneR, :dateR, :emailR, :MDPR)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'nomR' => $user->getNom(),
                'prenomR' => $user->getPrenom(),
                'telephoneR' => $user->getTelephone(),
                'dateR' => $user->getDateNaissance()->format('Y-m-d'), // Formatage de la date
                'emailR' => $user->getEmail(),
                'MDPR' => $user->getMDP(),
            ]);
            echo "Utilisateur ajouté avec succès.";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function updateUser($idR, $nomR, $prenomR, $telephoneR, $dateR, $emailR, $MDPR)
    {
        $sql = "UPDATE recruteur 
                SET nomR=:nomR, prenomR=:prenomR, telephoneR=:telephoneR, dateR=:dateR, emailR=:emailR, MDPR=:MDPR 
                WHERE idR=:idR";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idR', $idR);
            $query->bindParam(':nomR', $nomR); // Modifier ici
            $query->bindParam(':prenomR', $prenomR); // Modifier ici
            $query->bindParam(':telephoneR', $telephoneR); // Modifier ici
            $query->bindParam(':dateR', $dateR);
            $query->bindParam(':emailR', $emailR); // Modifier ici
            $query->bindParam(':MDPR', $MDPR); // Modifier ici
    
            $query->execute();
            return $query->rowCount();
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
    public function getUserById($idR)
    {
        $sql = "SELECT * FROM recruteur WHERE idR = :idR";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':idR', $idR);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les exceptions
            die('Error: ' . $e->getMessage());
        }
    }

    public function getUserByEmail($emailR)
    {
        $sql = "SELECT * FROM recruteur WHERE emailR = :emailR";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':emailR', $emailR);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Gérer les exceptions
            die('Error: ' . $e->getMessage());
        }
    }
    public function getUserByPassword($MDPR)
    {
        $sql = "SELECT * FROM recruteur WHERE MDPR = :MDPR";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':MDPR', $MDPR);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exceptions
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
