<?php

namespace App\Model;

class EnteteBul extends Model
{
    protected $idEnteteBul;
    protected $MoiSal;
    protected $AnneeSal;
    protected $NHeureNor;
    protected $NJours;
    protected $NJourMaladie;
    protected $NheureS1;
    protected $NHeureS2;
    protected $NHeureF;
    protected $SalHeure1;
    protected $SalJour1;
    protected $TauxAlloc1;
    protected $TauxAllocExtra1;
    protected $RemBrute;
    protected $Retenue;
    protected $RemNette;
    protected $DateJour;
    protected $Anciennete;
    protected $DateValeur;
    protected $TauxTPJ;
    protected $TauxPrimeAncien;
    protected $RembDiv;
    protected $TauxId;
    protected $AgentId;

    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of AgentId
     */ 
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
     * Get the value of TauxId
     */ 
    public function getTauxId()
    {
        return $this->TauxId;
    }

    /**
     * Set the value of TauxId
     *
     * @return  self
     */ 
    public function setTauxId($TauxId)
    {
        $this->TauxId = $TauxId;

        return $this;
    }

    /**
     * Get the value of RembDiv
     */ 
    public function getRembDiv()
    {
        return $this->RembDiv;
    }

    /**
     * Set the value of RembDiv
     *
     * @return  self
     */ 
    public function setRembDiv($RembDiv)
    {
        $this->RembDiv = $RembDiv;

        return $this;
    }

    /**
     * Get the value of TauxPrimeAncien
     */ 
    public function getTauxPrimeAncien()
    {
        return $this->TauxPrimeAncien;
    }

    /**
     * Set the value of TauxPrimeAncien
     *
     * @return  self
     */ 
    public function setTauxPrimeAncien($TauxPrimeAncien)
    {
        $this->TauxPrimeAncien = $TauxPrimeAncien;

        return $this;
    }

    /**
     * Get the value of TauxTPJ
     */ 
    public function getTauxTPJ()
    {
        return $this->TauxTPJ;
    }

    /**
     * Set the value of TauxTPJ
     *
     * @return  self
     */ 
    public function setTauxTPJ($TauxTPJ)
    {
        $this->TauxTPJ = $TauxTPJ;

        return $this;
    }

    /**
     * Get the value of DateValeur
     */ 
    public function getDateValeur()
    {
        return $this->DateValeur;
    }

    /**
     * Set the value of DateValeur
     *
     * @return  self
     */ 
    public function setDateValeur($DateValeur)
    {
        $this->DateValeur = $DateValeur;

        return $this;
    }

    /**
     * Get the value of Anciennete
     */ 
    public function getAnciennete()
    {
        return $this->Anciennete;
    }

    /**
     * Set the value of Anciennete
     *
     * @return  self
     */ 
    public function setAnciennete($Anciennete)
    {
        $this->Anciennete = $Anciennete;

        return $this;
    }

    /**
     * Get the value of DateJour
     */ 
    public function getDateJour()
    {
        return $this->DateJour;
    }

    /**
     * Set the value of DateJour
     *
     * @return  self
     */ 
    public function setDateJour($DateJour)
    {
        $this->DateJour = $DateJour;

        return $this;
    }

    /**
     * Get the value of RemNette
     */ 
    public function getRemNette()
    {
        return $this->RemNette;
    }

    /**
     * Set the value of RemNette
     *
     * @return  self
     */ 
    public function setRemNette($RemNette)
    {
        $this->RemNette = $RemNette;

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
     * Get the value of RemBrute
     */ 
    public function getRemBrute()
    {
        return $this->RemBrute;
    }

    /**
     * Set the value of RemBrute
     *
     * @return  self
     */ 
    public function setRemBrute($RemBrute)
    {
        $this->RemBrute = $RemBrute;

        return $this;
    }

    /**
     * Get the value of TauxAllocExtra1
     */ 
    public function getTauxAllocExtra1()
    {
        return $this->TauxAllocExtra1;
    }

    /**
     * Set the value of TauxAllocExtra1
     *
     * @return  self
     */ 
    public function setTauxAllocExtra1($TauxAllocExtra1)
    {
        $this->TauxAllocExtra1 = $TauxAllocExtra1;

        return $this;
    }

    /**
     * Get the value of TauxAlloc1
     */ 
    public function getTauxAlloc1()
    {
        return $this->TauxAlloc1;
    }

    /**
     * Set the value of TauxAlloc1
     *
     * @return  self
     */ 
    public function setTauxAlloc1($TauxAlloc1)
    {
        $this->TauxAlloc1 = $TauxAlloc1;

        return $this;
    }

    /**
     * Get the value of SalJour1
     */ 
    public function getSalJour1()
    {
        return $this->SalJour1;
    }

    /**
     * Set the value of SalJour1
     *
     * @return  self
     */ 
    public function setSalJour1($SalJour1)
    {
        $this->SalJour1 = $SalJour1;

        return $this;
    }

    /**
     * Get the value of SalHeure1
     */ 
    public function getSalHeure1()
    {
        return $this->SalHeure1;
    }

    /**
     * Set the value of SalHeure1
     *
     * @return  self
     */ 
    public function setSalHeure1($SalHeure1)
    {
        $this->SalHeure1 = $SalHeure1;

        return $this;
    }

    /**
     * Get the value of NHeureF
     */ 
    public function getNHeureF()
    {
        return $this->NHeureF;
    }

    /**
     * Set the value of NHeureF
     *
     * @return  self
     */ 
    public function setNHeureF($NHeureF)
    {
        $this->NHeureF = $NHeureF;

        return $this;
    }

    /**
     * Get the value of NHeureS2
     */ 
    public function getNHeureS2()
    {
        return $this->NHeureS2;
    }

    /**
     * Set the value of NHeureS2
     *
     * @return  self
     */ 
    public function setNHeureS2($NHeureS2)
    {
        $this->NHeureS2 = $NHeureS2;

        return $this;
    }

    /**
     * Get the value of NheureS1
     */ 
    public function getNheureS1()
    {
        return $this->NheureS1;
    }

    /**
     * Set the value of NheureS1
     *
     * @return  self
     */ 
    public function setNheureS1($NheureS1)
    {
        $this->NheureS1 = $NheureS1;

        return $this;
    }

    /**
     * Get the value of NJourMaladie
     */ 
    public function getNJourMaladie()
    {
        return $this->NJourMaladie;
    }

    /**
     * Set the value of NJourMaladie
     *
     * @return  self
     */ 
    public function setNJourMaladie($NJourMaladie)
    {
        $this->NJourMaladie = $NJourMaladie;

        return $this;
    }

    /**
     * Get the value of NJours
     */ 
    public function getNJours()
    {
        return $this->NJours;
    }

    /**
     * Set the value of NJours
     *
     * @return  self
     */ 
    public function setNJours($NJours)
    {
        $this->NJours = $NJours;

        return $this;
    }

    /**
     * Get the value of NHeureNor
     */ 
    public function getNHeureNor()
    {
        return $this->NHeureNor;
    }

    /**
     * Set the value of NHeureNor
     *
     * @return  self
     */ 
    public function setNHeureNor($NHeureNor)
    {
        $this->NHeureNor = $NHeureNor;

        return $this;
    }

    /**
     * Get the value of AnneeSal
     */ 
    public function getAnneeSal()
    {
        return $this->AnneeSal;
    }

    /**
     * Set the value of AnneeSal
     *
     * @return  self
     */ 
    public function setAnneeSal($AnneeSal)
    {
        $this->AnneeSal = $AnneeSal;

        return $this;
    }

    /**
     * Get the value of MoiSal
     */ 
    public function getMoiSal()
    {
        return $this->MoiSal;
    }

    /**
     * Set the value of MoiSal
     *
     * @return  self
     */ 
    public function setMoiSal($MoiSal)
    {
        $this->MoiSal = $MoiSal;

        return $this;
    }

    /**
     * Get the value of idEnteteBul
     */ 
    public function getIdEnteteBul()
    {
        return $this->idEnteteBul;
    }

    /**
     * Set the value of idEnteteBul
     *
     * @return  self
     */ 
    public function setIdEnteteBul($idEnteteBul)
    {
        $this->idEnteteBul = $idEnteteBul;

        return $this;
    }
}
