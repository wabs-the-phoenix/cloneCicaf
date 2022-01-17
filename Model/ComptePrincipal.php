<?php

namespace App\Model;

class ComptePrincipal extends Model
{
    protected $idComptePrincipal;
    protected $CodeComptePrincipal;
    protected $DesignationCompte;
    protected $Classe_idClasse;

    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of Classe_idClasse
     */ 
    public function getClasse_idClasse()
    {
        return $this->Classe_idClasse;
    }

    /**
     * Set the value of Classe_idClasse
     *
     * @return  self
     */ 
    public function setClasse_idClasse($Classe_idClasse)
    {
        $this->Classe_idClasse = $Classe_idClasse;

        return $this;
    }

    /**
     * Get the value of DesignationCompte
     */ 
    public function getDesignationCompte()
    {
        return $this->DesignationCompte;
    }

    /**
     * Set the value of DesignationCompte
     *
     * @return  self
     */ 
    public function setDesignationCompte($DesignationCompte)
    {
        $this->DesignationCompte = $DesignationCompte;

        return $this;
    }

    /**
     * Get the value of CodeComptePrincipal
     */ 
    public function getCodeComptePrincipal()
    {
        return $this->CodeComptePrincipal;
    }

    /**
     * Set the value of CodeComptePrincipal
     *
     * @return  self
     */ 
    public function setCodeComptePrincipal($CodeComptePrincipal)
    {
        $this->CodeComptePrincipal = $CodeComptePrincipal;

        return $this;
    }

    /**
     * Get the value of idComptePrincipal
     */ 
    public function getIdComptePrincipal()
    {
        return $this->idComptePrincipal;
    }

    /**
     * Set the value of idComptePrincipal
     *
     * @return  self
     */ 
    public function setIdComptePrincipal($idComptePrincipal)
    {
        $this->idComptePrincipal = $idComptePrincipal;

        return $this;
    }
}