<?php


namespace App\Model;

class SousCompte extends Model
{
    protected $idSousCompte;
    protected $CodeSousCompte;
    protected $Designation;
    protected $ComptePrincipal_idComptePrincipal;

    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of ComptePrincipal_idComptePrincipal
     */ 
    public function getComptePrincipal_idComptePrincipal()
    {
        return $this->ComptePrincipal_idComptePrincipal;
    }

    /**
     * Set the value of ComptePrincipal_idComptePrincipal
     *
     * @return  self
     */ 
    public function setComptePrincipal_idComptePrincipal($ComptePrincipal_idComptePrincipal)
    {
        $this->ComptePrincipal_idComptePrincipal = $ComptePrincipal_idComptePrincipal;

        return $this;
    }

    /**
     * Get the value of Designation
     */ 
    public function getDesignation()
    {
        return $this->Designation;
    }

    /**
     * Set the value of Designation
     *
     * @return  self
     */ 
    public function setDesignation($Designation)
    {
        $this->Designation = $Designation;

        return $this;
    }

    /**
     * Get the value of CodeSousCompte
     */ 
    public function getCodeSousCompte()
    {
        return $this->CodeSousCompte;
    }

    /**
     * Set the value of CodeSousCompte
     *
     * @return  self
     */ 
    public function setCodeSousCompte($CodeSousCompte)
    {
        $this->CodeSousCompte = $CodeSousCompte;

        return $this;
    }

    /**
     * Get the value of idSousCompte
     */ 
    public function getIdSousCompte()
    {
        return $this->idSousCompte;
    }

    /**
     * Set the value of idSousCompte
     *
     * @return  self
     */ 
    public function setIdSousCompte($idSousCompte)
    {
        $this->idSousCompte = $idSousCompte;

        return $this;
    }
}
