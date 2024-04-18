<?php
include '../config.php';
include '../Model/Offre.php';

class OffreC
{
    public function ListeOffres()
    {
        $sql = "SELECT * FROM offre";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteOffre($id_o)
    {
        $sql = "DELETE FROM offre WHERE id_o = :id_o";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id_o', $id_o);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addOffre($offre)
{
    $sql = "INSERT INTO offre    
    VALUES (NULL, :di_o,:tit_o, :des_o,:typ_o ,:entr_o,:lieu_o ,:dat_pub_o ,:dat_limt_o ,:contc_o ,:statu_o)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'di_o' => $offre->getdomaine_informatique(),
            'tit_o' => $offre->gettitre(),
            'des_o' => $offre->getdescription_o(),
            'typ_o' => $offre->gettype_o(),
            'entr_o' => $offre->getentreprise(),
            'lieu_o' => $offre->getlieu(),
            'dat_pub_o' => $offre->getdate_publication()->format('Y-m-d'),
            'dat_limt_o' => $offre->getdate_limite()->format('Y-m-d'),
            'contc_o' => $offre->getcontact(),
            'statu_o' => $offre->getstatus_o()
        ]);
    } catch (Exception $e) {
        echo 'Error: ' . $e->getMessage();
    }
}

          function updateOffre($offre, $id_o)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE offre SET 
            domaine_informatique=:domaine_informatique, 
            titre=:titre, 
            description_o=:description_o, 
            type_o=:type_o, 
            entreprise=:entreprise, 
            lieu=:lieu, 
            date_publication=:date_publication, 
            date_limite=:date_limite,
            contact=:contact, 
            status_o=:status_o 
            WHERE id_o=:id_o'
        );

        $date_publication = $offre->getdate_publication() ? $offre->getdate_publication()->format('Y/m/d') : null;
        $date_limite = $offre->getdate_limite() ? $offre->getdate_limite()->format('Y/m/d') : null;

        $query->execute([
            'id_o' => $offre->getid_o(),
            'domaine_informatique' => $offre->getdomaine_informatique(),
            'titre' => $offre->gettitre(),
            'description_o' => $offre->getdescription_o(),
            'type_o' => $offre->gettype_o(),
            'entreprise' => $offre->getentreprise(),
            'lieu' => $offre->getlieu(),
            'date_publication' => $date_publication,
            'date_limite' => $date_limite,
            'contact' => $offre->getcontact(),
            'status_o' => $offre->getstatus_o()
        ]);
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}

    function showOffre($id_o)
    {
        $sql = "SELECT * from offre  where id_o =$id_o" ;
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $offre = $query->fetch();
            return $offre;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
