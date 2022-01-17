<?php



namespace App\Model;

class ListeCodeSystemeNormal extends Model
{
    protected $idListeCodeSystemeNormal;
    protected $CodeCompte;
    protected $DesignationRubrique;
    protected $ReferenceSysteme;
    protected $Niveau1;
    protected $RefSystemeAllege;
    protected $MasseBilantaireId;

    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    

    /**
     * Get the value of idListeCodeSystemeNormal
     */ 
    public function getIdListeCodeSystemeNormal()
    {
        return $this->idListeCodeSystemeNormal;
    }

    /**
     * Set the value of idListeCodeSystemeNormal
     *
     * @return  self
     */ 
    public function setIdListeCodeSystemeNormal($idListeCodeSystemeNormal)
    {
        $this->idListeCodeSystemeNormal = $idListeCodeSystemeNormal;

        return $this;
    }

    /**
     * Get the value of CodeCompte
     */ 
    public function getCodeCompte()
    {
        return $this->CodeCompte;
    }

    /**
     * Set the value of CodeCompte
     *
     * @return  self
     */ 
    public function setCodeCompte($CodeCompte)
    {
        $this->CodeCompte = $CodeCompte;

        return $this;
    }

    /**
     * Get the value of DesignationRubrique
     */ 
    public function getDesignationRubrique()
    {
        return $this->DesignationRubrique;
    }

    /**
     * Set the value of DesignationRubrique
     *
     * @return  self
     */ 
    public function setDesignationRubrique($DesignationRubrique)
    {
        $this->DesignationRubrique = $DesignationRubrique;

        return $this;
    }

    /**
     * Get the value of ReferenceSysteme
     */ 
    public function getReferenceSysteme()
    {
        return $this->ReferenceSysteme;
    }

    /**
     * Set the value of ReferenceSysteme
     *
     * @return  self
     */ 
    public function setReferenceSysteme($ReferenceSysteme)
    {
        $this->ReferenceSysteme = $ReferenceSysteme;

        return $this;
    }

    /**
     * Get the value of Niveau1
     */ 
    public function getNiveau1()
    {
        return $this->Niveau1;
    }

    /**
     * Set the value of Niveau1
     *
     * @return  self
     */ 
    public function setNiveau1($Niveau1)
    {
        $this->Niveau1 = $Niveau1;

        return $this;
    }

    /**
     * Get the value of RefSystemeAllege
     */ 
    public function getRefSystemeAllege()
    {
        return $this->RefSystemeAllege;
    }

    /**
     * Set the value of RefSystemeAllege
     *
     * @return  self
     */ 
    public function setRefSystemeAllege($RefSystemeAllege)
    {
        $this->RefSystemeAllege = $RefSystemeAllege;

        return $this;
    }

    /**
     * Get the value of MasseBilantaireId
     */ 
    public function getMasseBilantaireId()
    {
        return $this->MasseBilantaireId;
    }

    /**
     * Set the value of MasseBilantaireId
     *
     * @return  self
     */ 
    public function setMasseBilantaireId($MasseBilantaireId)
    {
        $this->MasseBilantaireId = $MasseBilantaireId;

        return $this;
    }
}
