<?php

namespace App\Model;

class Commune extends Model
{
    protected $idCommune;

    protected $commune;

    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of commune
     */ 
    public function getCommune()
    {
        return $this->commune;
    }

    /**
     * Set the value of commune
     *
     * @return  self
     */ 
    public function setCommune($commune)
    {
        $this->commune = $commune;

        return $this;
    }

    /**
     * Get the value of idCommune
     */ 
    public function getIdCommune()
    {
        return $this->idCommune;
    }

    /**
     * Set the value of idCommune
     *
     * @return  self
     */ 
    public function setIdCommune($idCommune)
    {
        $this->idCommune = $idCommune;

        return $this;
    }
}
