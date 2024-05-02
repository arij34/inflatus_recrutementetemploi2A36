<?php
include '../config.php';
include '../Model/categorieevn.php';
class CategorieevnC
{
    public function listcategorieevns()
    {
        $sql = "SELECT * FROM categorieevn";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deletecategorieevn($idCategorieEVN)
    {
        $sql = "DELETE FROM categorieevn  WHERE idCategorieEVN = :idCategorieEVN";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idCategorieEVN', $idCategorieEVN);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addcategorieevn($nomCategorieEVN)
{
    $sql = "INSERT INTO categorieevn (nomCategorieEVN) VALUES (:nomCategorieEVN)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'nomCategorieEVN'=> $nomCategorieEVN,
           
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function updatecategorieevn($categorieevn, $idCategorieEVN)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE categorieevn SET 
                nomCategorieEVN = :nomCategorieEVN
            WHERE idCategorieEVN = :idCategorieEVN'
        );
        $query->execute([
            'idCategorieEVN' => $idCategorieEVN,
            'nomCategorieEVN' => $categorieevn->getNomCategorieEVN(),
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo 'Error: ' . $e->getMessage();
    }
}


    function showcategorieevn($idCategorieEVN)
    {
        $sql = "SELECT * from categorieevn where idCategorieEVN = $idCategorieEVN";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();
            $categorieevn = $query->fetch();
            return $categorieevn;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    function getLastInsertedId()
    {
        $sql = "SELECT LAST_INSERT_ID() as last_id";
        $db = config::getConnexion();
        try {
            $stmt = $db->query($sql);
            $row = $stmt->fetch();
            return $row['last_id'];
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function affiche_evenement($idCategorieEVN)
    {
        $sql = "SELECT * FROM evenement WHERE idCategorieEVN = :idCategorieEVN";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['idCategorieEVN' => $idCategorieEVN]);
            $evenements = $query->fetchAll();
            return $evenements;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

}

