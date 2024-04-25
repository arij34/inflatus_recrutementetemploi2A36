<?php
class reponse
{
    private ?int $id_reponse = null;
    private ?string $etat_reponse = null;
    private ?int $idr = null;
   
    public function __construct(?int $id_reponse, ?string $etat_reponse, ?int $idr)
    {
        $this->id_reponse = $id_reponse;
        $this->etat_reponse = $etat_reponse;
        $this->idr = $idr;
    }

    public function getid_reponse()
    {
        return $this->id_reponse;
    }
    
    public function getetat_reponse()
    {
        return $this->etat_reponse;
    }

    public function setetat_reponse($etat_reponse)
    {
        $this->etat_reponse = $etat_reponse;
        return $this;
    }

    public function getidr()
    {
        return $this->idr;
    }

    public function setidr($idr)
    {
        $this->idr = $idr;
        return $this;
    }
}
?>
