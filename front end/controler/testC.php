<?php
include __DIR__ . '/../config.php';
include 'C:\xampp\htdocs\gestion entretien\front end\model\test.php';

class UserC
{
    
    public function addUser($user)
    {
        $sql = "INSERT INTO test (email_test, nom_entreprise_test, domaine_informatique_test, date_test) 
                VALUES (:email_test, :nom_entreprise_test, :domaine_informatique_test, :date_test)";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'email_test' => $user->getEmailTest(),
                'nom_entreprise_test' => $user->getNomEntrepriseTest(), // Corrected method name
                'domaine_informatique_test' => $user->getDomaineInformatiqueTest(),
                'date_test' => $user->getDateTest(),
            ]);
            echo "Utilisateur ajouté avec succès.";
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function updateUser($id_test, $email_test, $nom_entreprise_test, $domaine_informatique_test, $date_test)
{
    $sql = "UPDATE test 
            SET email_test=:email_test, nom_entreprise_test=:nom_entreprise_test, domaine_informatique_test=:domaine_informatique_test, date_test=:date_test
            WHERE id_test=:id_test";
    $db = Config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_test', $id_test);
        $query->bindParam(':email_test', $email_test);
        $query->bindParam(':nom_entreprise_test', $nom_entreprise_test);
        $query->bindParam(':domaine_informatique_test', $domaine_informatique_test);
        $query->bindParam(':date_test', $date_test);
        $query->execute();
        return $query->rowCount();
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    public function getUserById($id_test)
    {
        $sql = "SELECT * FROM test WHERE id_test = :id_test";
        $db = Config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id_test', $id_test);
            $query->execute();
            return $query->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            // Handle exceptions
            die('Error: ' . $e->getMessage());
        }
    }
}
?>
