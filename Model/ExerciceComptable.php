<?php

namespace App\Model;

class ExerciceComptable extends Model
{
    protected $Exercice;
    protected $idExerciceComptable;


    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    

    /**
     * Get the value of idExerciceComptable
     */ 
    public function getIdExerciceComptable()
    {
        return $this->idExerciceComptable;
    }

    /**
     * Set the value of idExerciceComptable
     *
     * @return  self
     */ 
    public function setIdExerciceComptable($idExerciceComptable)
    {
        $this->idExerciceComptable = $idExerciceComptable;

        return $this;
    }

    /**
     * Get the value of Exercice
     */ 
    public function getExercice()
    {
        return $this->Exercice;
    }

    /**
     * Set the value of Exercice
     *
     * @return  self
     */ 
    public function setExercice($Exercice)
    {
        $this->Exercice = $Exercice;

        return $this;
    }
}
