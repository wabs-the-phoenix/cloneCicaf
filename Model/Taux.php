<?php

declare(strict_types=1);

namespace App\Model;

class Taux
{
    protected $idTaux;
    protected $Dollars;
    protected $Euro;
    protected $Fc;
    protected $dateTaux;

    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of dateTaux
     */ 
    public function getDateTaux()
    {
        return $this->dateTaux;
    }

    /**
     * Set the value of dateTaux
     *
     * @return  self
     */ 
    public function setDateTaux($dateTaux)
    {
        $this->dateTaux = $dateTaux;

        return $this;
    }

    /**
     * Get the value of Fc
     */ 
    public function getFc()
    {
        return $this->Fc;
    }

    /**
     * Set the value of Fc
     *
     * @return  self
     */ 
    public function setFc($Fc)
    {
        $this->Fc = $Fc;

        return $this;
    }

    /**
     * Get the value of Euro
     */ 
    public function getEuro()
    {
        return $this->Euro;
    }

    /**
     * Set the value of Euro
     *
     * @return  self
     */ 
    public function setEuro($Euro)
    {
        $this->Euro = $Euro;

        return $this;
    }

    /**
     * Get the value of Dollars
     */ 
    public function getDollars()
    {
        return $this->Dollars;
    }

    /**
     * Set the value of Dollars
     *
     * @return  self
     */ 
    public function setDollars($Dollars)
    {
        $this->Dollars = $Dollars;

        return $this;
    }

    /**
     * Get the value of idTaux
     */ 
    public function getIdTaux()
    {
        return $this->idTaux;
    }

    /**
     * Set the value of idTaux
     *
     * @return  self
     */ 
    public function setIdTaux($idTaux)
    {
        $this->idTaux = $idTaux;

        return $this;
    }
}
