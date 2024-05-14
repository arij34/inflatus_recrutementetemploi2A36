<?php
include 'C:\xampp\htdocs\integfy\config.php';
require_once 'C:\xampp\htdocs\integfy\model\Offre.php';
require_once 'C:\xampp\htdocs\integfy\controller\DomaineC.php';

class OffreC
{

    
    
    public function getOffresByEntrepriseId($idEntreprise)
    {
        $sql = "SELECT  *
                FROM offre
                WHERE idEntreprise = :idEntreprise";
        
        $db = config::getConnexion();
        
        try {
            $query = $db->prepare($sql);
            $query->execute(['idEntreprise' => $idEntreprise]);
            $events = $query->fetchAll(PDO::FETCH_ASSOC);
            return $events;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }





    function statistiqueOffresParDomaine()
    {
        $sql = "SELECT id_dom, COUNT(*) as nombre_offres FROM offre GROUP BY id_dom";
        $db = config::getConnexion();
        try {
            $query = $db->query($sql);
            $statistiques = $query->fetchAll();
            return $statistiques;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    




    /*
     function ListeOffres()
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
   */
  function ListeOffres($id_dom = null, $tri = null)
  {
      $sql = "SELECT * FROM offre";
      if ($id_dom !== null) {
          $sql .= " WHERE id_dom = :id_dom";
      }
      if ($tri !== null) {
          $sql .= " ORDER BY $tri";
      }
      $db = config::getConnexion();
      try {
          $query = $db->prepare($sql);
          if ($id_dom !== null) {
              $query->bindParam(':id_dom', $id_dom);
          }
          $query->execute();
          $liste = $query->fetchAll();
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
        $sql = "INSERT INTO offre (id_dom, titre, description_o, type_o, idEntreprise, lieu, date_publication, date_limite, contact, status_o)  
                VALUES (:id_dom, :titre, :description_o, :type_o, :idEntreprise, :lieu, :date_publication, :date_limite, :contact, :status_o)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
    
            $query->bindParam(':id_dom', $offre->getid_dom());
            $query->bindParam(':titre', $offre->gettitre());
            $query->bindParam(':description_o', $offre->getdescription_o());
            $query->bindParam(':type_o', $offre->gettype_o());
            $query->bindParam(':idEntreprise', $offre->getidEntreprise());
            $query->bindParam(':lieu', $offre->getlieu());
            $query->bindParam(':date_publication', $offre->getdate_publication()->format('Y-m-d'));
            $query->bindParam(':date_limite', $offre->getdate_limite()->format('Y-m-d'));
            $query->bindParam(':contact', $offre->getcontact());
            $query->bindParam(':status_o', $offre->getstatus_o());
    
            $query->execute();
    
            // Redirection vers ListeOffres.php après l'ajout de l'offre
            header('Location: ListeOffres_front.php');
            exit();
    
        } catch (PDOException $e) {
            // Gérer l'erreur de manière appropriée
            echo 'Error: ' . $e->getMessage();
        }
    }
    


          function updateOffre($offre, $id_o)
{
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE offre SET 
            id_dom=:id_dom, 
            titre=:titre, 
            description_o=:description_o, 
            type_o=:type_o, 
            idEntreprise=:idEntreprise, 
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
            'id_dom' => $offre->getid_dom(),
            'titre' => $offre->gettitre(),
            'description_o' => $offre->getdescription_o(),
            'type_o' => $offre->gettype_o(),
            'idEntreprise' => $offre->getidEntreprise(),
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

    function getdomaine_informatique($id_dom)
    {
        $sql = "SELECT domaine_informatique FROM domaine WHERE id_dom = :id_dom";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute(['id_dom' => $id_dom]);
            $result = $query->fetchColumn();
            return $result;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
}
