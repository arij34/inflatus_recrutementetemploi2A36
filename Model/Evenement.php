<?php
class Evenement
{
    private ?int $idEvenement = null;
    private ?string $nomEvenement = null;
    private ?string $adresseEVN = null;
    private ?dateTime $dateEVN = null;
    private ?string $idCategorieEVN = null;
    public function __construct($id=NULL, $nom, $adresseEVN,$dateEVN,$idCategorieEVN)
    {
        $this->idEvenement = $id;
        $this->nomEvenement = $nom;
        $this->adresseEVN = $adresseEVN;
        $this->dateEVN = $dateEVN;
        $this->idCategorieEVN = $idCategorieEVN;
    }

    /**
     * Get the value of idEvenement
     */
    public function getIdEvenement()
    {
        return $this->idEvenement;
    }

    /**
     * Get the value of nomEvenement
     */
    public function getNomEvenement()
    {
        return $this->nomEvenement;
    }

    /**
     * Set the value of nomEvenement
     *
     * @return  self
     */
    public function setNomEvenement($nomEvenement)
    {
        $this->nomEvenement = $nomEvenement;

        return $this;
    }

    /**
     * Get the value of adresseEVN
     */
    public function getAdresseEVN()
    {
        return $this->adresseEVN;
    }

    /**
     * Set the value of adresseEVN
     *
     * @return  self
     */
    public function setAdresseEVN($adresseEVN)
    {
        $this->adresseEVN = $adresseEVN;

        return $this;
    }

    /**
     * Get the value of dateEVN
     */
    public function getDateEVN()
    {
        return $this->dateEVN;
    }

    /**
     * Set the value of dateEVNCreation
     *
     * @return  self
     */
    public function setDateEVN($dateEVN)
    {
        $this->dateEVN = $dateEVN;

        return $this;
    }
    /**
     * Get the value of CategorieEVN
     */
    public function getIdCategorieEVN()
    {
        return $this->idCategorieEVN;
    }

    /**
     * Set the value of CategorieEVN
     *
     * @return  self
     */
    public function setIdCategorieEVN($idCategorieEVN)
    {
        $this->idCategorieEVN = $idCategorieEVN;

        return $this;
    }
}

