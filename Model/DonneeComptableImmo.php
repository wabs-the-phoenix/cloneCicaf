<?php



namespace App\Model;

class DonneeComptableImmo extends Model
{
    protected $idDonneeComptableImmo;
    protected $CoefficientReev;
    protected $AgeImmo;
    protected $DateReevaluation;
    protected $ExerciceComptable;
    protected $Entreprise_idEntreprise;
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
     * Get the value of Entreprise_idEntreprise
     */ 
    public function getEntreprise_idEntreprise()
    {
        return $this->Entreprise_idEntreprise;
    }

    /**
     * Set the value of Entreprise_idEntreprise
     *
     * @return  self
     */ 
    public function setEntreprise_idEntreprise($Entreprise_idEntreprise)
    {
        $this->Entreprise_idEntreprise = $Entreprise_idEntreprise;

        return $this;
    }

    /**
     * Get the value of ExerciceComptable
     */ 
    public function getExerciceComptable()
    {
        return $this->ExerciceComptable;
    }

    /**
     * Set the value of ExerciceComptable
     *
     * @return  self
     */ 
    public function setExerciceComptable($ExerciceComptable)
    {
        $this->ExerciceComptable = $ExerciceComptable;

        return $this;
    }

    /**
     * Get the value of DateReevaluation
     */ 
    public function getDateReevaluation()
    {
        return $this->DateReevaluation;
    }

    /**
     * Set the value of DateReevaluation
     *
     * @return  self
     */ 
    public function setDateReevaluation($DateReevaluation)
    {
        $this->DateReevaluation = $DateReevaluation;

        return $this;
    }

    /**
     * Get the value of AgeImmo
     */ 
    public function getAgeImmo()
    {
        return $this->AgeImmo;
    }

    /**
     * Set the value of AgeImmo
     *
     * @return  self
     */ 
    public function setAgeImmo($AgeImmo)
    {
        $this->AgeImmo = $AgeImmo;

        return $this;
    }

    /**
     * Get the value of CoefficientReev
     */ 
    public function getCoefficientReev()
    {
        return $this->CoefficientReev;
    }

    /**
     * Set the value of CoefficientReev
     *
     * @return  self
     */ 
    public function setCoefficientReev($CoefficientReev)
    {
        $this->CoefficientReev = $CoefficientReev;

        return $this;
    }

    /**
     * Get the value of idDonneeComptableImmo
     */ 
    public function getIdDonneeComptableImmo()
    {
        return $this->idDonneeComptableImmo;
    }

    /**
     * Set the value of idDonneeComptableImmo
     *
     * @return  self
     */ 
    public function setIdDonneeComptableImmo($idDonneeComptableImmo)
    {
        $this->idDonneeComptableImmo = $idDonneeComptableImmo;

        return $this;
    }
}
