<?php

declare(strict_types=1);

namespace App\Model;

class EnteteMouv extends Model
{
    protected $idEnteteMouv;
    protected $DateMouv;
    protected $DateOper;
    protected $CodeDoc;
    protected $NomDoc;
    protected $NumDoc;
    protected $Exercice;
    protected $TauxApp;
    protected $NomBeneficiaire;
    protected $NomDebiteur;
    protected $MotifGeneral;
    protected $DMontant;
    protected $CMontant;
    protected $FCMontant;
    protected $NumDoc1;
    protected $TauxEuro;
    protected $EntrepriseI;
    protected $userId;
    protected $CategorieJournaux_idCategorieJournaux;
    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }


    /**
     * Get the value of CategorieJournaux_idCategorieJournaux
     */ 
    public function getCategorieJournaux_idCategorieJournaux()
    {
        return $this->CategorieJournaux_idCategorieJournaux;
    }

    /**
     * Set the value of CategorieJournaux_idCategorieJournaux
     *
     * @return  self
     */ 
    public function setCategorieJournaux_idCategorieJournaux($CategorieJournaux_idCategorieJournaux)
    {
        $this->CategorieJournaux_idCategorieJournaux = $CategorieJournaux_idCategorieJournaux;

        return $this;
    }

    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

    /**
     * Get the value of EntrepriseI
     */ 
    public function getEntrepriseI()
    {
        return $this->EntrepriseI;
    }

    /**
     * Set the value of EntrepriseI
     *
     * @return  self
     */ 
    public function setEntrepriseI($EntrepriseI)
    {
        $this->EntrepriseI = $EntrepriseI;

        return $this;
    }

    /**
     * Get the value of TauxEuro
     */ 
    public function getTauxEuro()
    {
        return $this->TauxEuro;
    }

    /**
     * Set the value of TauxEuro
     *
     * @return  self
     */ 
    public function setTauxEuro($TauxEuro)
    {
        $this->TauxEuro = $TauxEuro;

        return $this;
    }

    /**
     * Get the value of NumDoc1
     */ 
    public function getNumDoc1()
    {
        return $this->NumDoc1;
    }

    /**
     * Set the value of NumDoc1
     *
     * @return  self
     */ 
    public function setNumDoc1($NumDoc1)
    {
        $this->NumDoc1 = $NumDoc1;

        return $this;
    }

    /**
     * Get the value of FCMontant
     */ 
    public function getFCMontant()
    {
        return $this->FCMontant;
    }

    /**
     * Set the value of FCMontant
     *
     * @return  self
     */ 
    public function setFCMontant($FCMontant)
    {
        $this->FCMontant = $FCMontant;

        return $this;
    }

    /**
     * Get the value of CMontant
     */ 
    public function getCMontant()
    {
        return $this->CMontant;
    }

    /**
     * Set the value of CMontant
     *
     * @return  self
     */ 
    public function setCMontant($CMontant)
    {
        $this->CMontant = $CMontant;

        return $this;
    }

    /**
     * Get the value of DMontant
     */ 
    public function getDMontant()
    {
        return $this->DMontant;
    }

    /**
     * Set the value of DMontant
     *
     * @return  self
     */ 
    public function setDMontant($DMontant)
    {
        $this->DMontant = $DMontant;

        return $this;
    }

    /**
     * Get the value of MotifGeneral
     */ 
    public function getMotifGeneral()
    {
        return $this->MotifGeneral;
    }

    /**
     * Set the value of MotifGeneral
     *
     * @return  self
     */ 
    public function setMotifGeneral($MotifGeneral)
    {
        $this->MotifGeneral = $MotifGeneral;

        return $this;
    }

    /**
     * Get the value of NomDebiteur
     */ 
    public function getNomDebiteur()
    {
        return $this->NomDebiteur;
    }

    /**
     * Set the value of NomDebiteur
     *
     * @return  self
     */ 
    public function setNomDebiteur($NomDebiteur)
    {
        $this->NomDebiteur = $NomDebiteur;

        return $this;
    }

    /**
     * Get the value of NomBeneficiaire
     */ 
    public function getNomBeneficiaire()
    {
        return $this->NomBeneficiaire;
    }

    /**
     * Set the value of NomBeneficiaire
     *
     * @return  self
     */ 
    public function setNomBeneficiaire($NomBeneficiaire)
    {
        $this->NomBeneficiaire = $NomBeneficiaire;

        return $this;
    }

    /**
     * Get the value of TauxApp
     */ 
    public function getTauxApp()
    {
        return $this->TauxApp;
    }

    /**
     * Set the value of TauxApp
     *
     * @return  self
     */ 
    public function setTauxApp($TauxApp)
    {
        $this->TauxApp = $TauxApp;

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

    /**
     * Get the value of NumDoc
     */ 
    public function getNumDoc()
    {
        return $this->NumDoc;
    }

    /**
     * Set the value of NumDoc
     *
     * @return  self
     */ 
    public function setNumDoc($NumDoc)
    {
        $this->NumDoc = $NumDoc;

        return $this;
    }

    /**
     * Get the value of NomDoc
     */ 
    public function getNomDoc()
    {
        return $this->NomDoc;
    }

    /**
     * Set the value of NomDoc
     *
     * @return  self
     */ 
    public function setNomDoc($NomDoc)
    {
        $this->NomDoc = $NomDoc;

        return $this;
    }

    /**
     * Get the value of CodeDoc
     */ 
    public function getCodeDoc()
    {
        return $this->CodeDoc;
    }

    /**
     * Set the value of CodeDoc
     *
     * @return  self
     */ 
    public function setCodeDoc($CodeDoc)
    {
        $this->CodeDoc = $CodeDoc;

        return $this;
    }

    /**
     * Get the value of DateOper
     */ 
    public function getDateOper()
    {
        return $this->DateOper;
    }

    /**
     * Set the value of DateOper
     *
     * @return  self
     */ 
    public function setDateOper($DateOper)
    {
        $this->DateOper = $DateOper;

        return $this;
    }

    /**
     * Get the value of DateMouv
     */ 
    public function getDateMouv()
    {
        return $this->DateMouv;
    }

    /**
     * Set the value of DateMouv
     *
     * @return  self
     */ 
    public function setDateMouv($DateMouv)
    {
        $this->DateMouv = $DateMouv;

        return $this;
    }

    /**
     * Get the value of idEntetMouv
     */ 
    public function getIdEnteteMouv()
    {
        return $this->idEnteteMouv;
    }

    /**
     * Set the value of idEntetMouv
     *
     * @return  self
     */ 
    public function setIdEnteteMouv($idEnteteMouv)
    {
        $this->idEnteteMouv = $idEnteteMouv;

        return $this;
    }
}
