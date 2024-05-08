<?php
include '../config.php';
include '../model/recruteur.php';

class reclamationC
{
    public function listereclamation()
    {
        $sql = "SELECT * FROM reclamation";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $r) {
            die('Error:' . $r->getMessage());
        } 
    }

    function deletereclamation($id_reclamation)
    {
        $sql = "DELETE FROM reclamation WHERE id_reclamation = :id_reclamation";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_reclamation', $id_reclamation);

        try {
            $req->execute();
        } catch (Exception $r) {
            die('Error:' . $r->getMessage());
        }
    }

    public function addreclamation($reclamation)
    {
        $sql = "INSERT INTO reclamation ( date, categorie_reclamation, explication) 
            VALUES (:date, :categorie_reclamation, :explication)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                ':date' => $reclamation->getdate()->format('Y-m-d'),
                ':categorie_reclamation' => $reclamation->getcategorie_reclamation(),
                ':explication' => $reclamation->getexplication(),
            ]);
            echo 'Reclamation added successfully.';
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }

    function updatereclamation($reclamation, $id_reclamation)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE reclamation SET 
                date =:date,
                categorie_reclamation =:categorie_reclamation,
                explication =:explication
                WHERE id_reclamation=:id_reclamation'
            );
            $query->execute([
                'id_reclamation' => $reclamation->getid_reclamation(),
                'date' => $reclamation->getdate()->format('Y-m-d'),
                'categorie_reclamation' => $reclamation->getcategorie_reclamation(),
                'explication' => $reclamation->getexplication(),
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $r) {
            $r->getMessage();
        }
    }

    function showrecruteur($id_reclamation)
    {
        $sql = "SELECT * FROM reclamation WHERE id_reclamation = :id_reclamation";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':id_reclamation', $id_reclamation, PDO::PARAM_INT);
            $query->execute();

            $reclamation = $query->fetch();
            return $reclamation;
        } catch (Exception $r) {
            die('Error: ' . $r->getMessage());
        }
    }

    function showReclamationDetails($id_reclamation)
    {
        $db = config::getConnexion();
        try {
            // Requête pour récupérer les détails de la réclamation en fonction de son ID
            $sql = "SELECT * FROM reclamation WHERE id_reclamation = :id";
            $stmt = $db->prepare($sql);
            $stmt->bindParam(':id', $id_reclamation);
            $stmt->execute();
            $reclamation = $stmt->fetch(PDO::FETCH_ASSOC);

            // Retourner les détails de la réclamation
            return $reclamation;
        } catch (PDOException $e) {
            // Gérer les erreurs de requête SQL
            echo "Erreur de base de données: " . $e->getMessage();
            return false; // Retourner false en cas d'erreur
        }
    }

    public function filterBadWords($text) {
        $badWords = ['farah', 'arij'];

        foreach ($badWords as $word) {
            $replacement = str_repeat("*", mb_strlen($word));
            $text = str_ireplace($word, $replacement, $text);
        }

        return $text;
    }

    public function Listereclames($categorie_reclamation = null)
    {
        $sql = "SELECT * FROM reclamation";
        if ($categorie_reclamation) {
            $sql .= " WHERE categorie_reclamation = :categorie_reclamation"; // Utilisation de $categorie_reclamation dans la condition SQL
        }
        $db = config::getConnexion();
        try {
            $stmt = $db->prepare($sql);
            if ($categorie_reclamation) {
                $stmt->bindParam(':categorie_reclamation', $categorie_reclamation);
            }
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur de base de données: " . $e->getMessage();
            return false;
        }
    }
}
?>
