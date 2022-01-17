<?php

namespace App\Model;

class Pays extends Model
{
    protected $idPays;

    protected $Pays;

    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of Pays
     */ 
    public function getPays()
    {
        return $this->Pays;
    }

    /**
     * Set the value of Pays
     *
     * @return  self
     */ 
    public function setPays($Pays)
    {
        $this->Pays = $Pays;

        return $this;
    }

    /**
     * Get the value of idPays
     */ 
    public function getIdPays()
    {
        return $this->idPays;
    }

    /**
     * Set the value of idPays
     *
     * @return  self
     */ 
    public function setIdPays($idPays)
    {
        $this->idPays = $idPays;

        return $this;
    }
}