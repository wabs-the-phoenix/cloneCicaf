<?php

declare(strict_types=1);

namespace App\Model;

class CompteDivisionnaire extends Model
{
    protected $idCompteDivisionnaire;
    protected $CodeCompteDivisionnaire;
    protected $DesigantionCD;
    protected $SousCompte_idSousCompte;

    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of SousCompte_idSousCompte
     */ 
    public function getSousCompte_idSousCompte()
    {
        return $this->SousCompte_idSousCompte;
    }

    /**
     * Set the value of SousCompte_idSousCompte
     *
     * @return  self
     */ 
    public function setSousCompte_idSousCompte($SousCompte_idSousCompte)
    {
        $this->SousCompte_idSousCompte = $SousCompte_idSousCompte;

        return $this;
    }

    /**
     * Get the value of DesigantionCD
     */ 
    public function getDesigantionCD()
    {
        return $this->DesigantionCD;
    }

    /**
     * Set the value of DesigantionCD
     *
     * @return  self
     */ 
    public function setDesigantionCD($DesigantionCD)
    {
        $this->DesigantionCD = $DesigantionCD;

        return $this;
    }

    /**
     * Get the value of CodeCompteDivisionnaire
     */ 
    public function getCodeCompteDivisionnaire()
    {
        return $this->CodeCompteDivisionnaire;
    }

    /**
     * Set the value of CodeCompteDivisionnaire
     *
     * @return  self
     */ 
    public function setCodeCompteDivisionnaire($CodeCompteDivisionnaire)
    {
        $this->CodeCompteDivisionnaire = $CodeCompteDivisionnaire;

        return $this;
    }

    /**
     * Get the value of idCompteDivisionnaire
     */ 
    public function getIdCompteDivisionnaire()
    {
        return $this->idCompteDivisionnaire;
    }

    /**
     * Set the value of idCompteDivisionnaire
     *
     * @return  self
     */ 
    public function setIdCompteDivisionnaire($idCompteDivisionnaire)
    {
        $this->idCompteDivisionnaire = $idCompteDivisionnaire;

        return $this;
    }
}
