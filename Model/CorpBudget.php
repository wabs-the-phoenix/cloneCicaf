<?php



namespace App\Model;

class CorpBudget extends Model
{
    protected $idCorpBudget;
    protected $QtePrevue;
    protected $LibelleBudgetaire;
    protected $ProvisionBudgetaire;
    protected $ProvisionCumule;
    protected $Commentaires;

    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of idCorpBudget
     */ 
    public function getIdCorpBudget()
    {
        return $this->idCorpBudget;
    }

    /**
     * Set the value of idCorpBudget
     *
     * @return  self
     */ 
    public function setIdCorpBudget($idCorpBudget)
    {
        $this->idCorpBudget = $idCorpBudget;

        return $this;
    }

    /**
     * Get the value of QtePrevue
     */ 
    public function getQtePrevue()
    {
        return $this->QtePrevue;
    }

    /**
     * Set the value of QtePrevue
     *
     * @return  self
     */ 
    public function setQtePrevue($QtePrevue)
    {
        $this->QtePrevue = $QtePrevue;

        return $this;
    }

    /**
     * Get the value of LibelleBudgetaire
     */ 
    public function getLibelleBudgetaire()
    {
        return $this->LibelleBudgetaire;
    }

    /**
     * Set the value of LibelleBudgetaire
     *
     * @return  self
     */ 
    public function setLibelleBudgetaire($LibelleBudgetaire)
    {
        $this->LibelleBudgetaire = $LibelleBudgetaire;

        return $this;
    }

    /**
     * Get the value of ProvisionBudgetaire
     */ 
    public function getProvisionBudgetaire()
    {
        return $this->ProvisionBudgetaire;
    }

    /**
     * Set the value of ProvisionBudgetaire
     *
     * @return  self
     */ 
    public function setProvisionBudgetaire($ProvisionBudgetaire)
    {
        $this->ProvisionBudgetaire = $ProvisionBudgetaire;

        return $this;
    }

    /**
     * Get the value of ProvisionCumule
     */ 
    public function getProvisionCumule()
    {
        return $this->ProvisionCumule;
    }

    /**
     * Set the value of ProvisionCumule
     *
     * @return  self
     */ 
    public function setProvisionCumule($ProvisionCumule)
    {
        $this->ProvisionCumule = $ProvisionCumule;

        return $this;
    }

    /**
     * Get the value of Commentaires
     */ 
    public function getCommentaires()
    {
        return $this->Commentaires;
    }

    /**
     * Set the value of Commentaires
     *
     * @return  self
     */ 
    public function setCommentaires($Commentaires)
    {
        $this->Commentaires = $Commentaires;

        return $this;
    }
}
