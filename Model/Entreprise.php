<?php
class Entreprise
{
    private ?int $idEntreprise = null;
    private ?string $nomEntreprise = null;
    private ?string $adresse = null;
    private ?string $email = null;
    private ?DateTime $dateCreation = null;
    private ?int $telephone1 = null;
    private ?int $telephone2 = null;
    private ?string $idCategorie = null;
    private ?string $cheminImage = null; // Nouvelle propriété pour le chemin de l'image

    public function __construct($id=NULL, $nom, $adresse, $telephone1, $telephone2, $email, $dateCreation, $idCategorie, $cheminImage)
    {
        $this->idEntreprise = $id;
        $this->nomEntreprise = $nom;
        $this->adresse = $adresse;
        $this->email = $email;
        $this->dateCreation = $dateCreation;
        $this->telephone1 = $telephone1;
        $this->telephone2 = $telephone2;
        $this->idCategorie = $idCategorie;
        $this->cheminImage = $cheminImage; // Initialisation de la nouvelle propriété
    }

    /**
     * Get the value of idEntreprise
     */
    public function getIdEntreprise()
    {
        return $this->idEntreprise;
    }

    /**
     * Get the value of nomEntreprise
     */
    public function getNomEntreprise()
    {
        return $this->nomEntreprise;
    }

    /**
     * Set the value of nomEntreprise
     *
     * @return  self
     */
    public function setNomEntreprise($nomEntreprise)
    {
        $this->nomEntreprise = $nomEntreprise;

        return $this;
    }

    /**
     * Get the value of adresse
     */
    public function getAdresse()
    {
        return $this->adresse;
    }

    /**
     * Set the value of adresse
     *
     * @return  self
     */
    public function setAdresse($adresse)
    {
        $this->adresse = $adresse;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of dateCreation
     */
    public function getDateCreation()
    {
        return $this->dateCreation;
    }

    /**
     * Set the value of dateCreation
     *
     * @return  self
     */
    public function setDateCreation($dateCreation)
    {
        $this->dateCreation = $dateCreation;

        return $this;
    }

    /**
     * Get the value of telephone1
     */
    public function getTelephone1()
    {
        return $this->telephone1;
    }

    /**
     * Set the value of telephone1
     *
     * @return  self
     */
    public function setTelephone1($telephone1)
    {
        $this->telephone1 = $telephone1;

        return $this;
    }

    /**
     * Get the value of telephone2
     */
    public function getTelephone2()
    {
        return $this->telephone2;
    }

    /**
     * Set the value of telephone2
     *
     * @return  self
     */
    public function setTelephone2($telephone2)
    {
        $this->telephone2 = $telephone2;

        return $this;
    }

    /**
     * Get the value of categorie
     */
    public function getidCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Set the value of categorie
     *
     * @return  self
     */
    public function setidCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }
    public function getCheminImage()
    {
        return $this->cheminImage;
    }

    /**
     * Set the value of cheminImage
     *
     * @return  self
     */
    public function setCheminImage($cheminImage)
    {
        $this->cheminImage = $cheminImage;

        return $this;
    }
}

