<?php

declare(strict_types=1);

namespace App\Model;

class SuiviImmo extends Model
{
    protected $idSuiviImmo;
    protected $DateSuivi;
    protected $QteDepart;
    protected $EtatMateriel;
    protected $QteDeplace;
    protected $CauseDap;
    protected $NouveauLieu;
    protected $NouveauRespo;
    protected $T9_QteInvantaire;
    protected $RenseignementImmoId;

    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }


    /**
     * Get the value of RenseignementImmoId
     */ 
    public function getRenseignementImmoId()
    {
        return $this->RenseignementImmoId;
    }

    /**
     * Set the value of RenseignementImmoId
     *
     * @return  self
     */ 
    public function setRenseignementImmoId($RenseignementImmoId)
    {
        $this->RenseignementImmoId = $RenseignementImmoId;

        return $this;
    }

    /**
     * Get the value of T9_QteInvantaire
     */ 
    public function getT9_QteInvantaire()
    {
        return $this->T9_QteInvantaire;
    }

    /**
     * Set the value of T9_QteInvantaire
     *
     * @return  self
     */ 
    public function setT9_QteInvantaire($T9_QteInvantaire)
    {
        $this->T9_QteInvantaire = $T9_QteInvantaire;

        return $this;
    }

    /**
     * Get the value of NouveauRespo
     */ 
    public function getNouveauRespo()
    {
        return $this->NouveauRespo;
    }

    /**
     * Set the value of NouveauRespo
     *
     * @return  self
     */ 
    public function setNouveauRespo($NouveauRespo)
    {
        $this->NouveauRespo = $NouveauRespo;

        return $this;
    }

    /**
     * Get the value of NouveauLieu
     */ 
    public function getNouveauLieu()
    {
        return $this->NouveauLieu;
    }

    /**
     * Set the value of NouveauLieu
     *
     * @return  self
     */ 
    public function setNouveauLieu($NouveauLieu)
    {
        $this->NouveauLieu = $NouveauLieu;

        return $this;
    }

    /**
     * Get the value of CauseDap
     */ 
    public function getCauseDap()
    {
        return $this->CauseDap;
    }

    /**
     * Set the value of CauseDap
     *
     * @return  self
     */ 
    public function setCauseDap($CauseDap)
    {
        $this->CauseDap = $CauseDap;

        return $this;
    }

    /**
     * Get the value of QteDeplace
     */ 
    public function getQteDeplace()
    {
        return $this->QteDeplace;
    }

    /**
     * Set the value of QteDeplace
     *
     * @return  self
     */ 
    public function setQteDeplace($QteDeplace)
    {
        $this->QteDeplace = $QteDeplace;

        return $this;
    }

    /**
     * Get the value of EtatMateriel
     */ 
    public function getEtatMateriel()
    {
        return $this->EtatMateriel;
    }

    /**
     * Set the value of EtatMateriel
     *
     * @return  self
     */ 
    public function setEtatMateriel($EtatMateriel)
    {
        $this->EtatMateriel = $EtatMateriel;

        return $this;
    }

    /**
     * Get the value of QteDepart
     */ 
    public function getQteDepart()
    {
        return $this->QteDepart;
    }

    /**
     * Set the value of QteDepart
     *
     * @return  self
     */ 
    public function setQteDepart($QteDepart)
    {
        $this->QteDepart = $QteDepart;

        return $this;
    }

    /**
     * Get the value of DateSuivi
     */ 
    public function getDateSuivi()
    {
        return $this->DateSuivi;
    }

    /**
     * Set the value of DateSuivi
     *
     * @return  self
     */ 
    public function setDateSuivi($DateSuivi)
    {
        $this->DateSuivi = $DateSuivi;

        return $this;
    }

    /**
     * Get the value of idSuiviImmo
     */ 
    public function getIdSuiviImmo()
    {
        return $this->idSuiviImmo;
    }

    /**
     * Set the value of idSuiviImmo
     *
     * @return  self
     */ 
    public function setIdSuiviImmo($idSuiviImmo)
    {
        $this->idSuiviImmo = $idSuiviImmo;

        return $this;
    }
}
