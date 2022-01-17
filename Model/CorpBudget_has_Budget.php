<?php

namespace App\Model;

class CorpBudget_has_Budget extends Model
{
    protected $CorpBudget_idCorpBudget;
    protected $Budget_idBudget;
    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }
    

    /**
     * Get the value of Budget_idBudget
     */ 
    public function getBudget_idBudget()
    {
        return $this->Budget_idBudget;
    }

    /**
     * Set the value of Budget_idBudget
     *
     * @return  self
     */ 
    public function setBudget_idBudget($Budget_idBudget)
    {
        $this->Budget_idBudget = $Budget_idBudget;

        return $this;
    }

    /**
     * Get the value of CorpBudget_idCorpBudget
     */ 
    public function getCorpBudget_idCorpBudget()
    {
        return $this->CorpBudget_idCorpBudget;
    }

    /**
     * Set the value of CorpBudget_idCorpBudget
     *
     * @return  self
     */ 
    public function setCorpBudget_idCorpBudget($CorpBudget_idCorpBudget)
    {
        $this->CorpBudget_idCorpBudget = $CorpBudget_idCorpBudget;

        return $this;
    }
}