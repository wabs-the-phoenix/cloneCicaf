<?php



namespace App\Model;

class Budget
{
    protected $idBudget;
    protected $ExerciceBudget;
    protected $DateOuverture;
    protected $DateCloture;
    protected $Janvier;
    protected $Fevrier;
    protected $Mars;
    protected $Avril;
    protected $Mai;
    protected $Juin;
    protected $Juillet;
    protected $Aout;
    protected $Septembre;
    protected $Octobre;
    protected $Novembre;
    protected $Decembre;
    protected $TotalPlaning;
    protected $CodeProjetId;
    protected $EntrepriseId;
    protected $CompteAnalityqueId;
    protected $PlanComptableId;
    protected $userId;

    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of ExerciceBudget
     */ 
    public function getExerciceBudget()
    {
        return $this->ExerciceBudget;
    }

    /**
     * Set the value of ExerciceBudget
     *
     * @return  self
     */ 
    public function setExerciceBudget($ExerciceBudget)
    {
        $this->ExerciceBudget = $ExerciceBudget;

        return $this;
    }

    /**
     * Get the value of idBudget
     */ 
    public function getIdBudget()
    {
        return $this->idBudget;
    }

    /**
     * Set the value of idBudget
     *
     * @return  self
     */ 
    public function setIdBudget($idBudget)
    {
        $this->idBudget = $idBudget;

        return $this;
    }

    /**
     * Get the value of DateOuverture
     */ 
    public function getDateOuverture()
    {
        return $this->DateOuverture;
    }

    /**
     * Set the value of DateOuverture
     *
     * @return  self
     */ 
    public function setDateOuverture($DateOuverture)
    {
        $this->DateOuverture = $DateOuverture;

        return $this;
    }

    /**
     * Get the value of DateCloture
     */ 
    public function getDateCloture()
    {
        return $this->DateCloture;
    }

    /**
     * Set the value of DateCloture
     *
     * @return  self
     */ 
    public function setDateCloture($DateCloture)
    {
        $this->DateCloture = $DateCloture;

        return $this;
    }

    /**
     * Get the value of Janvier
     */ 
    public function getJanvier()
    {
        return $this->Janvier;
    }

    /**
     * Set the value of Janvier
     *
     * @return  self
     */ 
    public function setJanvier($Janvier)
    {
        $this->Janvier = $Janvier;

        return $this;
    }

    /**
     * Get the value of Fevrier
     */ 
    public function getFevrier()
    {
        return $this->Fevrier;
    }

    /**
     * Set the value of Fevrier
     *
     * @return  self
     */ 
    public function setFevrier($Fevrier)
    {
        $this->Fevrier = $Fevrier;

        return $this;
    }

    /**
     * Get the value of Mars
     */ 
    public function getMars()
    {
        return $this->Mars;
    }

    /**
     * Set the value of Mars
     *
     * @return  self
     */ 
    public function setMars($Mars)
    {
        $this->Mars = $Mars;

        return $this;
    }

    /**
     * Get the value of Avril
     */ 
    public function getAvril()
    {
        return $this->Avril;
    }

    /**
     * Set the value of Avril
     *
     * @return  self
     */ 
    public function setAvril($Avril)
    {
        $this->Avril = $Avril;

        return $this;
    }

    /**
     * Get the value of Mai
     */ 
    public function getMai()
    {
        return $this->Mai;
    }

    /**
     * Set the value of Mai
     *
     * @return  self
     */ 
    public function setMai($Mai)
    {
        $this->Mai = $Mai;

        return $this;
    }

    /**
     * Get the value of Juin
     */ 
    public function getJuin()
    {
        return $this->Juin;
    }

    /**
     * Set the value of Juin
     *
     * @return  self
     */ 
    public function setJuin($Juin)
    {
        $this->Juin = $Juin;

        return $this;
    }

    /**
     * Get the value of Juillet
     */ 
    public function getJuillet()
    {
        return $this->Juillet;
    }

    /**
     * Set the value of Juillet
     *
     * @return  self
     */ 
    public function setJuillet($Juillet)
    {
        $this->Juillet = $Juillet;

        return $this;
    }

    /**
     * Get the value of Aout
     */ 
    public function getAout()
    {
        return $this->Aout;
    }

    /**
     * Set the value of Aout
     *
     * @return  self
     */ 
    public function setAout($Aout)
    {
        $this->Aout = $Aout;

        return $this;
    }

    /**
     * Get the value of Septembre
     */ 
    public function getSeptembre()
    {
        return $this->Septembre;
    }

    /**
     * Set the value of Septembre
     *
     * @return  self
     */ 
    public function setSeptembre($Septembre)
    {
        $this->Septembre = $Septembre;

        return $this;
    }

    /**
     * Get the value of Octobre
     */ 
    public function getOctobre()
    {
        return $this->Octobre;
    }

    /**
     * Set the value of Octobre
     *
     * @return  self
     */ 
    public function setOctobre($Octobre)
    {
        $this->Octobre = $Octobre;

        return $this;
    }

    /**
     * Get the value of Novembre
     */ 
    public function getNovembre()
    {
        return $this->Novembre;
    }

    /**
     * Set the value of Novembre
     *
     * @return  self
     */ 
    public function setNovembre($Novembre)
    {
        $this->Novembre = $Novembre;

        return $this;
    }

    /**
     * Get the value of Decembre
     */ 
    public function getDecembre()
    {
        return $this->Decembre;
    }

    /**
     * Set the value of Decembre
     *
     * @return  self
     */ 
    public function setDecembre($Decembre)
    {
        $this->Decembre = $Decembre;

        return $this;
    }

    /**
     * Get the value of TotalPlaning
     */ 
    public function getTotalPlaning()
    {
        return $this->TotalPlaning;
    }

    /**
     * Set the value of TotalPlaning
     *
     * @return  self
     */ 
    public function setTotalPlaning($TotalPlaning)
    {
        $this->TotalPlaning = $TotalPlaning;

        return $this;
    }

    /**
     * Get the value of PlanComptableId
     */ 
    public function getPlanComptableId()
    {
        return $this->PlanComptableId;
    }

    /**
     * Set the value of PlanComptableId
     *
     * @return  self
     */ 
    public function setPlanComptableId($PlanComptableId)
    {
        $this->PlanComptableId = $PlanComptableId;

        return $this;
    }

    /**
     * Get the value of CodeProjetId
     */ 
    public function getCodeProjetId()
    {
        return $this->CodeProjetId;
    }

    /**
     * Set the value of CodeProjetId
     *
     * @return  self
     */ 
    public function setCodeProjetId($CodeProjetId)
    {
        $this->CodeProjetId = $CodeProjetId;

        return $this;
    }

    /**
     * Get the value of EntrepriseId
     */ 
    public function getEntrepriseId()
    {
        return $this->EntrepriseId;
    }

    /**
     * Set the value of EntrepriseId
     *
     * @return  self
     */ 
    public function setEntrepriseId($EntrepriseId)
    {
        $this->EntrepriseId = $EntrepriseId;

        return $this;
    }

    /**
     * Get the value of CompteAnalityqueId
     */ 
    public function getCompteAnalityqueId()
    {
        return $this->CompteAnalityqueId;
    }

    /**
     * Set the value of CompteAnalityqueId
     *
     * @return  self
     */ 
    public function setCompteAnalityqueId($CompteAnalityqueId)
    {
        $this->CompteAnalityqueId = $CompteAnalityqueId;

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
}
