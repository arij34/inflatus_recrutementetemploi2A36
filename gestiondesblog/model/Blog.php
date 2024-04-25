<?php
class Blog
{
    private ?int $idBlog = null;
    private ?string $Titre = null;
    private ?string $Contenu = null;
    private ?string $Auteur = null;
    private ?string $DateDePublication = null;
    private ?string $Etiquette = null;

    public function __construct($idBlog = null, $titre, $contenu, $auteur, $dateDePublication, $etiquette)
    {
        $this->idBlog = $idBlog;
        $this->Titre = $titre;
        $this->Contenu = $contenu;
        $this->Auteur = $auteur;
        $this->DateDePublication = $dateDePublication;
        $this->Etiquette = $etiquette;
    }

    /**
     * Get the value of idBlog
     */
    public function getIdBlog()
    {
        return $this->idBlog;
    }

    /**
     * Get the value of Titre
     */
    public function getTitre()
    {
        return $this->Titre;
    }

    /**
     * Set the value of Titre
     *
     * @return  self
     */
    public function setTitre($Titre)
    {
        $this->Titre = $Titre;

        return $this;
    }

    /**
     * Get the value of Contenu
     */
    public function getContenu()
    {
        return $this->Contenu;
    }

    /**
     * Set the value of Contenu
     *
     * @return  self
     */
    public function setContenu($Contenu)
    {
        $this->Contenu = $Contenu;

        return $this;
    }

    /**
     * Get the value of Auteur
     */
    public function getAuteur()
    {
        return $this->Auteur;
    }

    /**
     * Set the value of Auteur
     *
     * @return  self
     */
    public function setAuteur($Auteur)
    {
        $this->Auteur = $Auteur;

        return $this;
    }

    /**
     * Get the value of DateDePublication
     */
    public function getDateDePublication()
    {
        return $this->DateDePublication;
    }

    /**
     * Set the value of DateDePublication
     *
     * @return  self
     */
    public function setDateDePublication($DateDePublication)
    {
        $this->DateDePublication = $DateDePublication;

        return $this;
    }

    /**
     * Get the value of Etiquette
     */
    public function getEtiquette()
    {
        return $this->Etiquette;
    }

    /**
     * Set the value of Etiquette
     *
     * @return  self
     */
    public function setEtiquette($Etiquette)
    {
        $this->Etiquette = $Etiquette;

        return $this;
    }
}


