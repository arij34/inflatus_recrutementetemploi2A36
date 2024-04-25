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
}
