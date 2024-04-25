<?php
include '../config.php';
include '../model/reponse.php';


class reclamationC
{
    public function listereponse()
    {
        $sql = "SELECT * FROM reponse";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $r) {
            die('Error:' . $r->getMessage());
        } 
    }

    function deletereclamation($id_reponse)
    {
        $sql = "DELETE FROM reponse WHERE id_reponse = :id_reponse";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_reponse', $id_reponse);
    
        try {
            $req->execute();
        } catch (Exception $r) {
            die('Error:' . $r->getMessage());
        }
    }
    

    public function addreclamation($reponse)
{
    $sql = "INSERT INTO reponse ( etat_reponse, idr) 
            VALUES (:etat_reponse, :idr)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            ':etat_reponse' => $reponse->getetat_reponse(),
            ':idr' => $reponse->getidr(),
            
        ]);
        echo 'Reponse added successfully.';
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

function updatereponse($reponse, $id_reponse)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE reponse SET 
                etat_reponse = :etat_reponse,
                idr = :idr
            WHERE id_reponse = :id_reponse'
        );
        $query->execute([
            'etat_reponse' => $reponse->getetat_reponse(),
            'idr' => $reponse->getidr(),
            'id_reponse' => $id_reponse
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $r) {
        $r->getMessage();
    }
}

function showreponse($id_reponse)
{
    $sql = "SELECT * FROM reponse WHERE id_reponse = :id_reponse";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':id_reponse', $id_reponse, PDO::PDO::PARAM_INT); // Change PDO::PARAM_INT to PDO::PARAM_STR
        $query->execute();

        $reponse = $query->fetch();
        return $reponse;
    } catch (Exception $r) {
        die('Error: ' . $r->getMessage());
    }
}
