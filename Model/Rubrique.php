<?php



namespace App\Model;

class Rubrique extends Model
{
    protected $idRubrique;
    protected $CodeRub;
    protected $NomRub;
    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of NomRub
     */ 
    public function getNomRub()
    {
        return $this->NomRub;
    }

    /**
     * Set the value of NomRub
     *
     * @return  self
     */ 
    public function setNomRub($NomRub)
    {
        $this->NomRub = $NomRub;

        return $this;
    }

    /**
     * Get the value of CodeRub
     */ 
    public function getCodeRub()
    {
        return $this->CodeRub;
    }

    /**
     * Set the value of CodeRub
     *
     * @return  self
     */ 
    public function setCodeRub($CodeRub)
    {
        $this->CodeRub = $CodeRub;

        return $this;
    }

    /**
     * Get the value of idRubrique
     */ 
    public function getIdRubrique()
    {
        return $this->idRubrique;
    }

    /**
     * Set the value of idRubrique
     *
     * @return  self
     */ 
    public function setIdRubrique($idRubrique)
    {
        $this->idRubrique = $idRubrique;

        return $this;
    }
}
