<?php


namespace App\Model;

class CompteFamille extends Model
{
    protected $idCompteFamille;
    protected $CodeCompteFamille;
    protected $DesigantionCompteFamille;
    protected $CompteDivisionnaire_idCompteDivisionnaire;

    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }



    /**
     * Get the value of DesigantionCompteFamille
     */ 
    public function getDesigantionCompteFamille()
    {
        return $this->DesigantionCompteFamille;
    }

    /**
     * Set the value of DesigantionCompteFamille
     *
     * @return  self
     */ 
    public function setDesigantionCompteFamille($DesigantionCompteFamille)
    {
        $this->DesigantionCompteFamille = $DesigantionCompteFamille;

        return $this;
    }

    /**
     * Get the value of CompteDivisionnaire_idCompteDivisionnaire
     */ 
    public function getCompteDivisionnaire_idCompteDivisionnaire()
    {
        return $this->CompteDivisionnaire_idCompteDivisionnaire;
    }

    /**
     * Set the value of CompteDivisionnaire_idCompteDivisionnaire
     *
     * @return  self
     */ 
    public function setCompteDivisionnaire_idCompteDivisionnaire($CompteDivisionnaire_idCompteDivisionnaire)
    {
        $this->CompteDivisionnaire_idCompteDivisionnaire = $CompteDivisionnaire_idCompteDivisionnaire;

        return $this;
    }

    /**
     * Get the value of CodeCompteFamille
     */ 
    public function getCodeCompteFamille()
    {
        return $this->CodeCompteFamille;
    }

    /**
     * Set the value of CodeCompteFamille
     *
     * @return  self
     */ 
    public function setCodeCompteFamille($CodeCompteFamille)
    {
        $this->CodeCompteFamille = $CodeCompteFamille;

        return $this;
    }

    /**
     * Get the value of idCompteFamille
     */ 
    public function getIdCompteFamille()
    {
        return $this->idCompteFamille;
    }

    /**
     * Set the value of idCompteFamille
     *
     * @return  self
     */ 
    public function setIdCompteFamille($idCompteFamille)
    {
        $this->idCompteFamille = $idCompteFamille;

        return $this;
    }
}