<?php


namespace App\Model;

class CorpBulletin extends Model
{
    protected $idCorpBulletin;
    protected $Montant1;
    protected $Avantage;
    protected $Retenue;
    protected $Remuneration;
    protected $QPPatronale;
    protected $RubriqueId;
    protected $userId;
    protected $EnteteBulId;
    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }


    /**
     * Get the value of EnteteBulId
     */ 
    public function getEnteteBulId()
    {
        return $this->EnteteBulId;
    }

    /**
     * Set the value of EnteteBulId
     *
     * @return  self
     */ 
    public function setEnteteBulId($EnteteBulId)
    {
        $this->EnteteBulId = $EnteteBulId;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of RubriqueId
     */ 
    public function getRubriqueId()
    {
        return $this->RubriqueId;
    }

    /**
     * Set the value of RubriqueId
     *
     * @return  self
     */ 
    public function setRubriqueId($RubriqueId)
    {
        $this->RubriqueId = $RubriqueId;

        return $this;
    }

    /**
     * Get the value of QPPatronale
     */ 
    public function getQPPatronale()
    {
        return $this->QPPatronale;
    }

    /**
     * Set the value of QPPatronale
     *
     * @return  self
     */ 
    public function setQPPatronale($QPPatronale)
    {
        $this->QPPatronale = $QPPatronale;

        return $this;
    }

    /**
     * Get the value of Remuneration
     */ 
    public function getRemuneration()
    {
        return $this->Remuneration;
    }

    /**
     * Set the value of Remuneration
     *
     * @return  self
     */ 
    public function setRemuneration($Remuneration)
    {
        $this->Remuneration = $Remuneration;

        return $this;
    }

    /**
     * Get the value of Retenue
     */ 
    public function getRetenue()
    {
        return $this->Retenue;
    }

    /**
     * Set the value of Retenue
     *
     * @return  self
     */ 
    public function setRetenue($Retenue)
    {
        $this->Retenue = $Retenue;

        return $this;
    }

    /**
     * Get the value of Avantage
     */ 
    public function getAvantage()
    {
        return $this->Avantage;
    }

    /**
     * Set the value of Avantage
     *
     * @return  self
     */ 
    public function setAvantage($Avantage)
    {
        $this->Avantage = $Avantage;

        return $this;
    }

    /**
     * Get the value of Montant1
     */ 
    public function getMontant1()
    {
        return $this->Montant1;
    }

    /**
     * Set the value of Montant1
     *
     * @return  self
     */ 
    public function setMontant1($Montant1)
    {
        $this->Montant1 = $Montant1;

        return $this;
    }

    /**
     * Get the value of idCorpBulletin
     */ 
    public function getIdCorpBulletin()
    {
        return $this->idCorpBulletin;
    }

    /**
     * Set the value of idCorpBulletin
     *
     * @return  self
     */ 
    public function setIdCorpBulletin($idCorpBulletin)
    {
        $this->idCorpBulletin = $idCorpBulletin;

        return $this;
    }
}