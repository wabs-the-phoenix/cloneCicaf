<?php

namespace App\Model;

class Entreprise extends Model 
{
    protected $idEntreprise;
    protected $SCodeEntreprise;
    protected $SNomEntreprise;
    protected $RespoEntreprise;
    protected $TypeEntreprise;
    protected $SNumRue;
    protected $SNomRue;
    protected $SNumTel;
    protected $NumEmail;
    protected $DDebutActivite;
    protected $DDComptabilite;
    protected $EntiteDe;
    protected $status;
    protected $commune_idCommune;

    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    

    /**
     * Get the value of commune_idCommune
     */ 
    public function getCommune_idCommune()
    {
        return $this->commune_idCommune;
    }

    /**
     * Set the value of commune_idCommune
     *
     * @return  self
     */ 
    public function setCommune_idCommune($commune_idCommune)
    {
        $this->commune_idCommune = $commune_idCommune;

        return $this;
    }

    /**
     * Get the value of EntiteDe
     */ 
    public function getEntiteDe()
    {
        return $this->EntiteDe;
    }

    /**
     * Set the value of EntiteDe
     *
     * @return  self
     */ 
    public function setEntiteDe($EntiteDe)
    {
        $this->EntiteDe = $EntiteDe;

        return $this;
    }

    /**
     * Get the value of DDComptabilite
     */ 
    public function getDDComptabilite()
    {
        return $this->DDComptabilite;
    }

    /**
     * Set the value of DDComptabilite
     *
     * @return  self
     */ 
    public function setDDComptabilite($DDComptabilite)
    {
        $this->DDComptabilite = $DDComptabilite;

        return $this;
    }

    /**
     * Get the value of DDebutActivite
     */ 
    public function getDDebutActivite()
    {
        return $this->DDebutActivite;
    }

    /**
     * Set the value of DDebutActivite
     *
     * @return  self
     */ 
    public function setDDebutActivite($DDebutActivite)
    {
        $this->DDebutActivite = $DDebutActivite;

        return $this;
    }

    /**
     * Get the value of NumEmail
     */ 
    public function getNumEmail()
    {
        return $this->NumEmail;
    }

    /**
     * Set the value of NumEmail
     *
     * @return  self
     */ 
    public function setNumEmail($NumEmail)
    {
        $this->NumEmail = $NumEmail;

        return $this;
    }

    /**
     * Get the value of SNumTel
     */ 
    public function getSNumTel()
    {
        return $this->SNumTel;
    }

    /**
     * Set the value of SNumTel
     *
     * @return  self
     */ 
    public function setSNumTel($SNumTel)
    {
        $this->SNumTel = $SNumTel;

        return $this;
    }

    /**
     * Get the value of SNomRue
     */ 
    public function getSNomRue()
    {
        return $this->SNomRue;
    }

    /**
     * Set the value of SNomRue
     *
     * @return  self
     */ 
    public function setSNomRue($SNomRue)
    {
        $this->SNomRue = $SNomRue;

        return $this;
    }

    /**
     * Get the value of SNumRue
     */ 
    public function getSNumRue()
    {
        return $this->SNumRue;
    }

    /**
     * Set the value of SNumRue
     *
     * @return  self
     */ 
    public function setSNumRue($SNumRue)
    {
        $this->SNumRue = $SNumRue;

        return $this;
    }

    /**
     * Get the value of TypeEntreprise
     */ 
    public function getTypeEntreprise()
    {
        return $this->TypeEntreprise;
    }

    /**
     * Set the value of TypeEntreprise
     *
     * @return  self
     */ 
    public function setTypeEntreprise($TypeEntreprise)
    {
        $this->TypeEntreprise = $TypeEntreprise;

        return $this;
    }

    /**
     * Get the value of RespoEntreprise
     */ 
    public function getRespoEntreprise()
    {
        return $this->RespoEntreprise;
    }

    /**
     * Set the value of RespoEntreprise
     *
     * @return  self
     */ 
    public function setRespoEntreprise($RespoEntreprise)
    {
        $this->RespoEntreprise = $RespoEntreprise;

        return $this;
    }

    /**
     * Get the value of SNomEntreprise
     */ 
    public function getSNomEntreprise()
    {
        return $this->SNomEntreprise;
    }

    /**
     * Set the value of SNomEntreprise
     *
     * @return  self
     */ 
    public function setSNomEntreprise($SNomEntreprise)
    {
        $this->SNomEntreprise = $SNomEntreprise;

        return $this;
    }

    /**
     * Get the value of SCodeEntreprise
     */ 
    public function getSCodeEntreprise()
    {
        return $this->SCodeEntreprise;
    }

    /**
     * Set the value of SCodeEntreprise
     *
     * @return  self
     */ 
    public function setSCodeEntreprise($SCodeEntreprise)
    {
        $this->SCodeEntreprise = $SCodeEntreprise;

        return $this;
    }

    /**
     * Get the value of idEntreprise
     */ 
    public function getIdEntreprise()
    {
        return $this->idEntreprise;
    }

    /**
     * Set the value of idEntreprise
     *
     * @return  self
     */ 
    public function setIdEntreprise($idEntreprise)
    {
        $this->idEntreprise = $idEntreprise;

        return $this;
    }

    /**
     * Get the value of status
     */ 
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     *
     * @return  self
     */ 
    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }
}
