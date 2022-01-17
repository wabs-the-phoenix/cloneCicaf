<?php

namespace App\Model;

class Fonction extends Model
{
    protected $idFonction;
    protected $Fonction;
    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of Fonction
     */ 
    public function getFonction()
    {
        return $this->Fonction;
    }

    /**
     * Set the value of Fonction
     *
     * @return  self
     */ 
    public function setFonction($Fonction)
    {
        $this->Fonction = $Fonction;

        return $this;
    }

    /**
     * Get the value of idFonction
     */ 
    public function getIdFonction()
    {
        return $this->idFonction;
    }

    /**
     * Set the value of idFonction
     *
     * @return  self
     */ 
    public function setIdFonction($idFonction)
    {
        $this->idFonction = $idFonction;

        return $this;
    }
}
