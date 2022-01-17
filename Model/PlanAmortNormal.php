<?php



namespace App\Model;

class PlanAmortNormal extends Model
{
    protected $idPlanAmortNormal;
    protected $AnneeAnuite;
    protected $BaseAmortissement;
    protected $Annuite;
    protected $ValeurComptable;
    protected $Observation;
    protected $RenseignementImmo_idRenseignementImmo;
    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }
    
    

    /**
     * Get the value of RenseignementImmo_idRenseignementImmo
     */ 
    public function getRenseignementImmo_idRenseignementImmo()
    {
        return $this->RenseignementImmo_idRenseignementImmo;
    }

    /**
     * Set the value of RenseignementImmo_idRenseignementImmo
     *
     * @return  self
     */ 
    public function setRenseignementImmo_idRenseignementImmo($RenseignementImmo_idRenseignementImmo)
    {
        $this->RenseignementImmo_idRenseignementImmo = $RenseignementImmo_idRenseignementImmo;

        return $this;
    }

    /**
     * Get the value of Observation
     */ 
    public function getObservation()
    {
        return $this->Observation;
    }

    /**
     * Set the value of Observation
     *
     * @return  self
     */ 
    public function setObservation($Observation)
    {
        $this->Observation = $Observation;

        return $this;
    }

    /**
     * Get the value of ValeurComptable
     */ 
    public function getValeurComptable()
    {
        return $this->ValeurComptable;
    }

    /**
     * Set the value of ValeurComptable
     *
     * @return  self
     */ 
    public function setValeurComptable($ValeurComptable)
    {
        $this->ValeurComptable = $ValeurComptable;

        return $this;
    }

    /**
     * Get the value of Annuite
     */ 
    public function getAnnuite()
    {
        return $this->Annuite;
    }

    /**
     * Set the value of Annuite
     *
     * @return  self
     */ 
    public function setAnnuite($Annuite)
    {
        $this->Annuite = $Annuite;

        return $this;
    }

    /**
     * Get the value of BaseAmortissement
     */ 
    public function getBaseAmortissement()
    {
        return $this->BaseAmortissement;
    }

    /**
     * Set the value of BaseAmortissement
     *
     * @return  self
     */ 
    public function setBaseAmortissement($BaseAmortissement)
    {
        $this->BaseAmortissement = $BaseAmortissement;

        return $this;
    }

    /**
     * Get the value of AnneeAnuite
     */ 
    public function getAnneeAnuite()
    {
        return $this->AnneeAnuite;
    }

    /**
     * Set the value of AnneeAnuite
     *
     * @return  self
     */ 
    public function setAnneeAnuite($AnneeAnuite)
    {
        $this->AnneeAnuite = $AnneeAnuite;

        return $this;
    }

    /**
     * Get the value of idPlanAmortNormal
     */ 
    public function getIdPlanAmortNormal()
    {
        return $this->idPlanAmortNormal;
    }

    /**
     * Set the value of idPlanAmortNormal
     *
     * @return  self
     */ 
    public function setIdPlanAmortNormal($idPlanAmortNormal)
    {
        $this->idPlanAmortNormal = $idPlanAmortNormal;

        return $this;
    }
}
