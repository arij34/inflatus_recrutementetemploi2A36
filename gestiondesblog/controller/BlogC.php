<?php
include '../config.php';
include '../model/Blog.php';

class BlogC
{
    public function listBlogs()
    {
        $sql = "SELECT * FROM blog"; // Keep the table name as 'blog'
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteBlog($idBlog)
    {
        $sql = "DELETE FROM blog WHERE idBlog = :idblog"; // Keep the table name as 'blog'
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':idblog', $idBlog);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function addBlog($blog)
    {
        $sql = "INSERT INTO blog (idBlog, Titre, Contenu, Auteur, DateDePublication, Etiquette)  
                VALUES (NULL, :titre, :contenu, :auteur, :dateDePublication, :etiquette)";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'titre' => $blog->getTitre(),
                'contenu' => $blog->getContenu(),
                'auteur' => $blog->getAuteur(),
                'dateDePublication' => $blog->getDateDePublication(),
                'etiquette' => $blog->getEtiquette()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function updateBlog($blog, $idBlog)
    {
        try {
            $db = config::getConnexion();
            $query = $db->prepare(
                'UPDATE blog SET 
                    titre = :titre, 
                    contenu = :contenu, 
                    auteur = :auteur, 
                    datedepublication = :datedepublication,
                    etiquette = :etiquette
                WHERE idBlog = :idblog'
            );
            $query->execute([
                'idblog' => $idBlog,
                'titre' => $blog->getTitre(),
                'contenu' => $blog->getContenu(),
                'auteur' => $blog->getAuteur(),
                'datedepublication' => $blog->getDateDePublication(),
                'etiquette' => $blog->getEtiquette()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }

    function showBlog($id)
    {
        $sql = "SELECT * FROM blog WHERE idBlog = $id"; // Keep the table name as 'blog'
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute();

            $blog = $query->fetch();
            return $blog;
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    public function getBlogById($idBlog)
{
    $sql = "SELECT * FROM blog WHERE idblog = :idBlog";
    $db = Config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':idBlog', $idBlog);
        $query->execute();
        return $query->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        // Gérer les exceptions
        die('Error: ' . $e->getMessage());
    }
}

}
?>
