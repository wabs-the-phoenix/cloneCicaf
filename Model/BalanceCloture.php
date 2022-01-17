<?php



namespace App\Model;

class BalanceCloture extends Model
{
    protected $idBalanceCloture;
    protected $DateBalance;
    protected $ExerciceBalance;
    protected $EntrepriseId;
    
    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
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
     * Get the value of ExerciceBalance
     */ 
    public function getExerciceBalance()
    {
        return $this->ExerciceBalance;
    }

    /**
     * Set the value of ExerciceBalance
     *
     * @return  self
     */ 
    public function setExerciceBalance($ExerciceBalance)
    {
        $this->ExerciceBalance = $ExerciceBalance;

        return $this;
    }

    /**
     * Get the value of DateBalance
     */ 
    public function getDateBalance()
    {
        return $this->DateBalance;
    }

    /**
     * Set the value of DateBalance
     *
     * @return  self
     */ 
    public function setDateBalance($DateBalance)
    {
        $this->DateBalance = $DateBalance;

        return $this;
    }

    /**
     * Get the value of idBalanceCloture
     */ 
    public function getIdBalanceCloture()
    {
        return $this->idBalanceCloture;
    }

    /**
     * Set the value of idBalanceCloture
     *
     * @return  self
     */ 
    public function setIdBalanceCloture($idBalanceCloture)
    {
        $this->idBalanceCloture = $idBalanceCloture;

        return $this;
    }
}
