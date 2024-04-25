<?php
class Demande
{
    private ?int $id_d = null;
    private ?int $id_etudiant = null;
    private ?string $nom_d = null;
    private ?string $prenom_d = null;
    private ?string $email_d = null;
    private ?int $telephone_d = null;
    private ?string $cv_d = null;
    private ?string $lettre_motivation = null;
    private ?int $id_o = null;
    private ?DateTime $date_d = null;
    private ?string $status_d  = null;




    public function __construct($id_d = null, $id_e, $nd, $pd, $ed, $td, $cvd, $lm, $id_o, $dd, $sd)
{
    $this->id_d = $id_d;
    $this->id_etudiant = $id_e;
    $this->nom_d = $nd;
    $this->prenom_d = $pd;
    $this->email_d = $ed;
    $this->telephone_d = $td;
    $this->cv_d = $cvd;
    $this->lettre_motivation = $lm;
    $this->id_o = $id_o;
    $this->date_d = $dd;
    $this->status_d = $sd;
}


    /**
     * Get the value of id
     */
    public function getid_d()
    {
        return $this->id_d;
    }
   
    /**
     * Get the value of lastName
     */
    public function getid_etudiant()
    {
        return $this->id_etudiant;
    }

    /**
     * Set the value of lastName
     *
     * @return  self
     */
    public function setid_etudiant($id_etudiant)
    {
        $this->id_etudiant = $id_etudiant;

        return $this;
    }

    /**
     * Get the value of firstName
     */
    public function getnom_d()
    {
        return $this->nom_d;
    }

    /**
     * Set the value of firstName
     *
     * @return  self
     */
    public function setnom_d($nom_d)
    {
        $this->nom_d = $nom_d;

        return $this;
    }

    /**
     * Get the value of email
     */
    public function getprenom_d()
    {
        return $this->prenom_d;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */
    public function setprenom_d($prenom_d)
    {
        $this->prenom_d = $prenom_d;

        return $this;
    }

    /**
     * Get the value of dob
     */
    public function getemail_d()
    {
        return $this->email_d;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setemail_d($email_d)
    {
        $this->email_d = $email_d;

        return $this;
    }



    public function gettelephone_d()
    {
        return $this->telephone_d;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function settelephone_d($telephone_d)
    {
        $this->telephone_d= $telephone_d;

        return $this;
    }

    public function getcv_d()
    {
        return $this->cv_d;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setcv_d($cv_d)
    {
        $this->cv_d = $cv_d;

        return $this;
    }

    public function getlettre_motivation()
    {
        return $this->lettre_motivation;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setlettre_motivation($lettre_motivation)
    {
        $this->lettre_motivation= $lettre_motivation;

        return $this;
    }

    public function getid_o ()
    {
        return $this->id_o ;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setid_o ($id_o )
    {
        $this->id_o  = $id_o ;

        return $this;
    }
    public function getdate_d ()
    {
        return $this->date_d ;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setdate_d ($date_d )
    {
        $this->date_d  = $date_d ;

        return $this;
    }

    public function getstatus_d()
    {
        return $this->status_d;
    }

    /**
     * Set the value of dob
     *
     * @return  self
     */
    public function setstatus_d($status_d)
    {
        $this-> status_d= $status_d;

        return $this;
    }
}
