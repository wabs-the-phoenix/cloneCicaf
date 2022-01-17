<?php



namespace App\Model;

class Depart extends Model
{
    protected $idDepart;
    protected $AgentId;
    protected $dateDepart;
    protected $dateEnregistrement;
    protected $cause;
    protected $soubassement;

    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    public function getAgentId()
    {
        return $this->AgentId;
    }
        /**
     * Set the value of AgentId
     *
     * @return  self
     */ 
    public function setAgentId($AgentId)
    {
        $this->AgentId = $AgentId;

        return $this;
    }


    /**
     * Get the value of idDepart
     */ 
    public function getIdDepart()
    {
        return $this->idDepart;
    }

    /**
     * Set the value of idDepart
     *
     * @return  self
     */ 
    public function setIdDepart($idDepart)
    {
        $this->idDepart = $idDepart;

        return $this;
    }

    /**
     * Get the value of dateDepart
     */ 
    public function getDateDepart()
    {
        return $this->dateDepart;
    }

    /**
     * Set the value of dateDepart
     *
     * @return  self
     */ 
    public function setDateDepart($dateDepart)
    {
        $this->dateDepart = $dateDepart;

        return $this;
    }

    /**
     * Get the value of dateEnregistrement
     */ 
    public function getDateEnregistrement()
    {
        return $this->dateEnregistrement;
    }

    /**
     * Set the value of dateEnregistrement
     *
     * @return  self
     */ 
    public function setDateEnregistrement($dateEnregistrement)
    {
        $this->dateEnregistrement = $dateEnregistrement;

        return $this;
    }

    /**
     * Get the value of cause
     */ 
    public function getCause()
    {
        return $this->cause;
    }

    /**
     * Set the value of cause
     *
     * @return  self
     */ 
    public function setCause($cause)
    {
        $this->cause = $cause;

        return $this;
    }

    /**
     * Get the value of soubassement
     */ 
    public function getSoubassement()
    {
        return $this->soubassement;
    }

    /**
     * Set the value of soubassement
     *
     * @return  self
     */ 
    public function setSoubassement($soubassement)
    {
        $this->soubassement = $soubassement;

        return $this;
    }
}
