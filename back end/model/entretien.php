<?php
class User
{
    private $id_test = null;
    private $email_test = null;
    private $nom_entreprise_test = null;
    private $domaine_informatique_test = null;
    private $date_test = null;
    private $nom_entre = null;
    private $prenom_entre = null;
    private $date_entre = null;
    private $type_entre = null;

    public function __construct($id_test, $email_test, $nom_entreprise_test, $domaine_informatique_test, $date_test)
    {
        $this->id_test = $id_test;
        $this->email_test = $email_test;
        $this->nom_entreprise_test = $nom_entreprise_test;
        $this->domaine_informatique_test = $domaine_informatique_test;
        $this->date_test = $date_test;
    }

    // Constructor for entretien table
    public static function createEntretienUser($id_test, $email_test, $nom_entre, $prenom_entre, $nom_entreprise_test, $date_entre, $type_entre)
    {
        $user = new self($id_test, $email_test, '', '', ''); // Only id_test, email_test are needed
        $user->setNomEntre($nom_entre);
        $user->setPrenomEntre($prenom_entre);
        $user->setNomEntrepriseTest($nom_entreprise_test);
        $user->setDateEntre($date_entre);
        $user->setTypeEntre($type_entre);
        return $user;
    }

    // Getters and setters for entretien table
    public function getNomEntre()
    {
        return $this->nom_entre;
    }

    public function setNomEntre($nom_entre)
    {
        $this->nom_entre = $nom_entre;
    }

    public function getPrenomEntre()
    {
        return $this->prenom_entre;
    }

    public function setPrenomEntre($prenom_entre)
    {
        $this->prenom_entre = $prenom_entre;
    }

    public function getDateEntre()
    {
        return $this->date_entre;
    }

    public function setDateEntre($date_entre)
    {
        $this->date_entre = $date_entre;
    }

    public function getTypeEntre()
    {
        return $this->type_entre;
    }

    public function setTypeEntre($type_entre)
    {
        $this->type_entre = $type_entre;
    }

    // Getters and setters for test table
    public function getIdTest()
    {
        return $this->id_test;
    }

    public function setIdTest($id_test)
    {
        $this->id_test = $id_test;
    }

    public function getEmailTest()
    {
        return $this->email_test;
    }

    public function setEmailTest($email_test)
    {
        $this->email_test = $email_test;
    }

    public function getNomEntrepriseTest()
    {
        return $this->nom_entreprise_test;
    }

    public function setNomEntrepriseTest($nom_entreprise_test)
    {
        $this->nom_entreprise_test = $nom_entreprise_test;
    }

    public function getDomaineInformatiqueTest()
    {
        return $this->domaine_informatique_test;
    }

    public function setDomaineInformatiqueTest($domaine_informatique_test)
    {
        $this->domaine_informatique_test = $domaine_informatique_test;
    }

    public function getDateTest()
    {
        return $this->date_test;
    }

    public function setDateTest($date_test)
    {
        $this->date_test = $date_test;
    }
}
?>
