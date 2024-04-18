<?php
class reclamation
{
    private ?int $id_reclamation = null;
    private ?string $prenom = null;
    private ?string $nom = null;
    private ?string $email = null;
    private ?int $tel = null;
    private ?DateTime $date = null;
    private ?string $categorie_reclamation = null;
    private ?string $explication = null;
   
    public function __construct(?int $id, ?string $pr, ?string $n, ?string $em, ?int $t, ?DateTime $d, ?string $cr, ?string $ex)
    {
        $this->id_reclamation = $id;
        $this->prenom = $pr;
        $this->nom  = $n;
        $this->email = $em;
        $this->tel = $t;
        $this->date = $d;
        $this->categorie_reclamation = $cr;
        $this->explication = $ex;
    }

    /**
     * Get the value of id
     */
    public function getid_reclamation()
    {
        return $this->id_reclamation;
    }
    public function getprenom()
    {
        return $this->prenom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setprenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }


    /**
     * Get the value of lastName
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }


    /**
     * Get the value of firstName
     */
    public function getemail()
    {
        return $this->email;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setemail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function gettel()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function settel($tel)
    {
        $this->tel = $tel;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getdate()
    {
        return $this->date;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setdate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getcategorie_reclamation()
    {
        return $this->categorie_reclamation;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setcategorie_reclamation($categorie_reclamation)
    {
        $this->categorie_reclamation = $categorie_reclamation;

        return $this;
    }
/**
     * Get the value of dob
     */
    public function getexplication()
    {
        return $this->explication;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setexplication($explication)
    {
        $this->explication = $explication;

        return $this;
    }


}