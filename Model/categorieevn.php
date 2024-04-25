<?php
class categorieevn
{
    private ?int $idCategorieEVN = null;
    private ?string $nomCategorieEVN = null;
    public function __construct($id=NULL,$nom)
    {
        $this->idCategorieEVN = $id;
        $this->nomCategorieEVN = $nom;
    }

    /**
     * Get the value of idEvenement
     */
    public function getIdCategorieEVN()
    {
        return $this->idCategorieEVN;
    }

    /**
     * Get the value of nomEvenement
     */
    public function getNomCategorieEVN()
    {
        return $this->nomCategorieEVN;
    }

    /**
     * Set the value of nomEvenement
     *
     * @return  self
     */
    public function setNomCategorieEVN($nomCategorieEVN)
    {
        $this->nomCategorieEVN = $nomCategorieEVN;

        return $this;
    }
}

