<?php

declare(strict_types=1);

namespace App\Model;

class CorpMouv extends Model
{
    protected $idCorpMouv;
    protected $NumMouv;
    protected $T6_CodeAnal;
    protected $Imputation;
    protected $Libelle;
    protected $DMontant;
    protected $CMontant;
    protected $DCompte;
    protected $CCompte;
    protected $SCompte;
    protected $CDivisionnaire;
    protected $Transit;
    protected $DSolde;
    protected $MC1320;
    protected $MBM1322;
    protected $VA133;
    protected $EBE134;
    protected $RE135;
    protected $T8_RF136;
    protected $RAO137;
    protected $RHAO138;
    protected $RNAIB139;
    protected $Impot89;
    protected $RNADI131;
    protected $DBilan;
    protected $CBilan;
    protected $RefPiece;
    protected $PlanComptable_idPlanComptable;
    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of PlanComptable_idPlanComptable
     */ 
    public function getPlanComptable_idPlanComptable()
    {
        return $this->PlanComptable_idPlanComptable;
    }

    /**
     * Set the value of PlanComptable_idPlanComptable
     *
     * @return  self
     */ 
    public function setPlanComptable_idPlanComptable($PlanComptable_idPlanComptable)
    {
        $this->PlanComptable_idPlanComptable = $PlanComptable_idPlanComptable;

        return $this;
    }

    /**
     * Get the value of RefPiece
     */ 
    public function getRefPiece()
    {
        return $this->RefPiece;
    }

    /**
     * Set the value of RefPiece
     *
     * @return  self
     */ 
    public function setRefPiece($RefPiece)
    {
        $this->RefPiece = $RefPiece;

        return $this;
    }

    /**
     * Get the value of CBilan
     */ 
    public function getCBilan()
    {
        return $this->CBilan;
    }

    /**
     * Set the value of CBilan
     *
     * @return  self
     */ 
    public function setCBilan($CBilan)
    {
        $this->CBilan = $CBilan;

        return $this;
    }

    /**
     * Get the value of DBilan
     */ 
    public function getDBilan()
    {
        return $this->DBilan;
    }

    /**
     * Set the value of DBilan
     *
     * @return  self
     */ 
    public function setDBilan($DBilan)
    {
        $this->DBilan = $DBilan;

        return $this;
    }

    /**
     * Get the value of RNADI131
     */ 
    public function getRNADI131()
    {
        return $this->RNADI131;
    }

    /**
     * Set the value of RNADI131
     *
     * @return  self
     */ 
    public function setRNADI131($RNADI131)
    {
        $this->RNADI131 = $RNADI131;

        return $this;
    }

    /**
     * Get the value of Impot89
     */ 
    public function getImpot89()
    {
        return $this->Impot89;
    }

    /**
     * Set the value of Impot89
     *
     * @return  self
     */ 
    public function setImpot89($Impot89)
    {
        $this->Impot89 = $Impot89;

        return $this;
    }

    /**
     * Get the value of RNAIB139
     */ 
    public function getRNAIB139()
    {
        return $this->RNAIB139;
    }

    /**
     * Set the value of RNAIB139
     *
     * @return  self
     */ 
    public function setRNAIB139($RNAIB139)
    {
        $this->RNAIB139 = $RNAIB139;

        return $this;
    }

    /**
     * Get the value of RHAO138
     */ 
    public function getRHAO138()
    {
        return $this->RHAO138;
    }

    /**
     * Set the value of RHAO138
     *
     * @return  self
     */ 
    public function setRHAO138($RHAO138)
    {
        $this->RHAO138 = $RHAO138;

        return $this;
    }

    /**
     * Get the value of RAO137
     */ 
    public function getRAO137()
    {
        return $this->RAO137;
    }

    /**
     * Set the value of RAO137
     *
     * @return  self
     */ 
    public function setRAO137($RAO137)
    {
        $this->RAO137 = $RAO137;

        return $this;
    }

    /**
     * Get the value of T8_RF136
     */ 
    public function getT8_RF136()
    {
        return $this->T8_RF136;
    }

    /**
     * Set the value of T8_RF136
     *
     * @return  self
     */ 
    public function setT8_RF136($T8_RF136)
    {
        $this->T8_RF136 = $T8_RF136;

        return $this;
    }

    /**
     * Get the value of RE135
     */ 
    public function getRE135()
    {
        return $this->RE135;
    }

    /**
     * Set the value of RE135
     *
     * @return  self
     */ 
    public function setRE135($RE135)
    {
        $this->RE135 = $RE135;

        return $this;
    }

    /**
     * Get the value of EBE134
     */ 
    public function getEBE134()
    {
        return $this->EBE134;
    }

    /**
     * Set the value of EBE134
     *
     * @return  self
     */ 
    public function setEBE134($EBE134)
    {
        $this->EBE134 = $EBE134;

        return $this;
    }

    /**
     * Get the value of VA133
     */ 
    public function getVA133()
    {
        return $this->VA133;
    }

    /**
     * Set the value of VA133
     *
     * @return  self
     */ 
    public function setVA133($VA133)
    {
        $this->VA133 = $VA133;

        return $this;
    }

    /**
     * Get the value of MBM1322
     */ 
    public function getMBM1322()
    {
        return $this->MBM1322;
    }

    /**
     * Set the value of MBM1322
     *
     * @return  self
     */ 
    public function setMBM1322($MBM1322)
    {
        $this->MBM1322 = $MBM1322;

        return $this;
    }

    /**
     * Get the value of MC1320
     */ 
    public function getMC1320()
    {
        return $this->MC1320;
    }

    /**
     * Set the value of MC1320
     *
     * @return  self
     */ 
    public function setMC1320($MC1320)
    {
        $this->MC1320 = $MC1320;

        return $this;
    }

    /**
     * Get the value of DSolde
     */ 
    public function getDSolde()
    {
        return $this->DSolde;
    }

    /**
     * Set the value of DSolde
     *
     * @return  self
     */ 
    public function setDSolde($DSolde)
    {
        $this->DSolde = $DSolde;

        return $this;
    }

    /**
     * Get the value of Transit
     */ 
    public function getTransit()
    {
        return $this->Transit;
    }

    /**
     * Set the value of Transit
     *
     * @return  self
     */ 
    public function setTransit($Transit)
    {
        $this->Transit = $Transit;

        return $this;
    }

    /**
     * Get the value of CDivisionnaire
     */ 
    public function getCDivisionnaire()
    {
        return $this->CDivisionnaire;
    }

    /**
     * Set the value of CDivisionnaire
     *
     * @return  self
     */ 
    public function setCDivisionnaire($CDivisionnaire)
    {
        $this->CDivisionnaire = $CDivisionnaire;

        return $this;
    }

    /**
     * Get the value of SCompte
     */ 
    public function getSCompte()
    {
        return $this->SCompte;
    }

    /**
     * Set the value of SCompte
     *
     * @return  self
     */ 
    public function setSCompte($SCompte)
    {
        $this->SCompte = $SCompte;

        return $this;
    }

    /**
     * Get the value of CCompte
     */ 
    public function getCCompte()
    {
        return $this->CCompte;
    }

    /**
     * Set the value of CCompte
     *
     * @return  self
     */ 
    public function setCCompte($CCompte)
    {
        $this->CCompte = $CCompte;

        return $this;
    }

    /**
     * Get the value of DCompte
     */ 
    public function getDCompte()
    {
        return $this->DCompte;
    }

    /**
     * Set the value of DCompte
     *
     * @return  self
     */ 
    public function setDCompte($DCompte)
    {
        $this->DCompte = $DCompte;

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
     * Get the value of Libelle
     */ 
    public function getLibelle()
    {
        return $this->Libelle;
    }

    /**
     * Set the value of Libelle
     *
     * @return  self
     */ 
    public function setLibelle($Libelle)
    {
        $this->Libelle = $Libelle;

        return $this;
    }

    /**
     * Get the value of Imputation
     */ 
    public function getImputation()
    {
        return $this->Imputation;
    }

    /**
     * Set the value of Imputation
     *
     * @return  self
     */ 
    public function setImputation($Imputation)
    {
        $this->Imputation = $Imputation;

        return $this;
    }

    /**
     * Get the value of T6_CodeAnal
     */ 
    public function getT6_CodeAnal()
    {
        return $this->T6_CodeAnal;
    }

    /**
     * Set the value of T6_CodeAnal
     *
     * @return  self
     */ 
    public function setT6_CodeAnal($T6_CodeAnal)
    {
        $this->T6_CodeAnal = $T6_CodeAnal;

        return $this;
    }

    /**
     * Get the value of NumMouv
     */ 
    public function getNumMouv()
    {
        return $this->NumMouv;
    }

    /**
     * Set the value of NumMouv
     *
     * @return  self
     */ 
    public function setNumMouv($NumMouv)
    {
        $this->NumMouv = $NumMouv;

        return $this;
    }

    /**
     * Get the value of idCorpMouv
     */ 
    public function getIdCorpMouv()
    {
        return $this->idCorpMouv;
    }

    /**
     * Set the value of idCorpMouv
     *
     * @return  self
     */ 
    public function setIdCorpMouv($idCorpMouv)
    {
        $this->idCorpMouv = $idCorpMouv;

        return $this;
    }
}
