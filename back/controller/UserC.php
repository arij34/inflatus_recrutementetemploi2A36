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
                'dateR' => $user->getDateNaissance()->format('Y-m-d'),
                'emailR' => $user->getEmail(),
                'MDPR' => $user->getMDP()
            ]);
            return "Utilisateur ajouté avec succès.";
        } catch (PDOException $e) {
            return 'Erreur lors de l\'ajout de l\'utilisateur: ' . $e->getMessage();
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
            $query->bindParam(':nomR', $nomR);
            $query->bindParam(':prenomR', $prenomR);
            $query->bindParam(':telephoneR', $telephoneR);
            $query->bindParam(':dateR', $dateR);
            $query->bindParam(':emailR', $emailR);
            $query->bindParam(':MDPR', $MDPR);
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
    
            // Check if any rows are returned
            if ($query->rowCount() > 0) {
                // Return the fetched user data
                return $query->fetch(PDO::FETCH_ASSOC);
            } else {
                // Handle case when no user is found with the specified ID
                return null;
            }
        } catch (PDOException $e) {
            // Handle PDO exceptions
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
