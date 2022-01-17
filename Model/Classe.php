<?php

namespace App\Model;

class Classe extends Model
{
    protected $idClasse;
    protected $CodeClasse;
    protected $Designation;

    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of Designation
     */ 
    public function getDesignation()
    {
        return $this->Designation;
    }

    /**
     * Set the value of Designation
     *
     * @return  self
     */ 
    public function setDesignation($Designation)
    {
        $this->Designation = $Designation;

        return $this;
    }

    /**
     * Get the value of CodeClasse
     */ 
    public function getCodeClasse()
    {
        return $this->CodeClasse;
    }

    /**
     * Set the value of CodeClasse
     *
     * @return  self
     */ 
    public function setCodeClasse($CodeClasse)
    {
        $this->CodeClasse = $CodeClasse;

        return $this;
    }

    /**
     * Get the value of idClasse
     */ 
    public function getIdClasse()
    {
        return $this->idClasse;
    }

    /**
     * Set the value of idClasse
     *
     * @return  self
     */ 
    public function setIdClasse($idClasse)
    {
        $this->idClasse = $idClasse;

        return $this;
    }
}