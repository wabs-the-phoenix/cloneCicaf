<?php



namespace App\Model;

class EnteteBilanNormal extends Model
{
    protected $idEnteteBilanNormal;
    protected $NumeroBilan;
    protected $DateBilan;
    protected $DateClotureBilan;
    protected $NomResponsable;
    protected $ExerciceComptable;
    protected $TauxApplique;
    protected $EntrepriseId;

    protected $table;

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
     * Get the value of TauxApplique
     */ 
    public function getTauxApplique()
    {
        return $this->TauxApplique;
    }

    /**
     * Set the value of TauxApplique
     *
     * @return  self
     */ 
    public function setTauxApplique($TauxApplique)
    {
        $this->TauxApplique = $TauxApplique;

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
     * Get the value of DateClotureBilan
     */ 
    public function getDateClotureBilan()
    {
        return $this->DateClotureBilan;
    }

    /**
     * Set the value of DateClotureBilan
     *
     * @return  self
     */ 
    public function setDateClotureBilan($DateClotureBilan)
    {
        $this->DateClotureBilan = $DateClotureBilan;

        return $this;
    }

    /**
     * Get the value of NomResponsable
     */ 
    public function getNomResponsable()
    {
        return $this->NomResponsable;
    }

    /**
     * Set the value of NomResponsable
     *
     * @return  self
     */ 
    public function setNomResponsable($NomResponsable)
    {
        $this->NomResponsable = $NomResponsable;

        return $this;
    }

    /**
     * Get the value of DateBilan
     */ 
    public function getDateBilan()
    {
        return $this->DateBilan;
    }

    /**
     * Set the value of DateBilan
     *
     * @return  self
     */ 
    public function setDateBilan($DateBilan)
    {
        $this->DateBilan = $DateBilan;

        return $this;
    }

    /**
     * Get the value of NumeroBilan
     */ 
    public function getNumeroBilan()
    {
        return $this->NumeroBilan;
    }

    /**
     * Set the value of NumeroBilan
     *
     * @return  self
     */ 
    public function setNumeroBilan($NumeroBilan)
    {
        $this->NumeroBilan = $NumeroBilan;

        return $this;
    }

    /**
     * Get the value of idEnteteBilanNormal
     */ 
    public function getIdEnteteBilanNormal()
    {
        return $this->idEnteteBilanNormal;
    }

    /**
     * Set the value of idEnteteBilanNormal
     *
     * @return  self
     */ 
    public function setIdEnteteBilanNormal($idEnteteBilanNormal)
    {
        $this->idEnteteBilanNormal = $idEnteteBilanNormal;

        return $this;
    }
}
