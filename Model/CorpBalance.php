<?php


namespace App\Model;

class CorpBalance extends Model
{
    protected $idCorpBalance;
    protected $Imput;
    protected $SoldePrecedent;
    protected $MouvDebit;
    protected $MouvCredit;
    protected $CumulDebit;
    protected $CumulCredit;
    protected $SoldeNouveau;
    protected $Transit;
    protected $TauxMoyen1;
    protected $TauxMoyen2;
    protected $TauxMoyen3;
    protected $TauxMoyen4;
    protected $PlanComptableId;
    protected $BalanceClotureId;

    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of BalanceClotureId
     */ 
    public function getBalanceClotureId()
    {
        return $this->BalanceClotureId;
    }

    /**
     * Set the value of BalanceClotureId
     *
     * @return  self
     */ 
    public function setBalanceClotureId($BalanceClotureId)
    {
        $this->BalanceClotureId = $BalanceClotureId;

        return $this;
    }

    /**
     * Get the value of PlanComptableId
     */ 
    public function getPlanComptableId()
    {
        return $this->PlanComptableId;
    }

    /**
     * Set the value of PlanComptableId
     *
     * @return  self
     */ 
    public function setPlanComptableId($PlanComptableId)
    {
        $this->PlanComptableId = $PlanComptableId;

        return $this;
    }

    /**
     * Get the value of TauxMoyen4
     */ 
    public function getTauxMoyen4()
    {
        return $this->TauxMoyen4;
    }

    /**
     * Set the value of TauxMoyen4
     *
     * @return  self
     */ 
    public function setTauxMoyen4($TauxMoyen4)
    {
        $this->TauxMoyen4 = $TauxMoyen4;

        return $this;
    }

    /**
     * Get the value of TauxMoyen3
     */ 
    public function getTauxMoyen3()
    {
        return $this->TauxMoyen3;
    }

    /**
     * Set the value of TauxMoyen3
     *
     * @return  self
     */ 
    public function setTauxMoyen3($TauxMoyen3)
    {
        $this->TauxMoyen3 = $TauxMoyen3;

        return $this;
    }

    /**
     * Get the value of TauxMoyen2
     */ 
    public function getTauxMoyen2()
    {
        return $this->TauxMoyen2;
    }

    /**
     * Set the value of TauxMoyen2
     *
     * @return  self
     */ 
    public function setTauxMoyen2($TauxMoyen2)
    {
        $this->TauxMoyen2 = $TauxMoyen2;

        return $this;
    }

    /**
     * Get the value of TauxMoyen1
     */ 
    public function getTauxMoyen1()
    {
        return $this->TauxMoyen1;
    }

    /**
     * Set the value of TauxMoyen1
     *
     * @return  self
     */ 
    public function setTauxMoyen1($TauxMoyen1)
    {
        $this->TauxMoyen1 = $TauxMoyen1;

        return $this;
    }

    /**
     * Get the value of SoldeNouveau
     */ 
    public function getSoldeNouveau()
    {
        return $this->SoldeNouveau;
    }

    /**
     * Set the value of SoldeNouveau
     *
     * @return  self
     */ 
    public function setSoldeNouveau($SoldeNouveau)
    {
        $this->SoldeNouveau = $SoldeNouveau;

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
     * Get the value of CumulCredit
     */ 
    public function getCumulCredit()
    {
        return $this->CumulCredit;
    }

    /**
     * Set the value of CumulCredit
     *
     * @return  self
     */ 
    public function setCumulCredit($CumulCredit)
    {
        $this->CumulCredit = $CumulCredit;

        return $this;
    }

    /**
     * Get the value of CumulDebit
     */ 
    public function getCumulDebit()
    {
        return $this->CumulDebit;
    }

    /**
     * Set the value of CumulDebit
     *
     * @return  self
     */ 
    public function setCumulDebit($CumulDebit)
    {
        $this->CumulDebit = $CumulDebit;

        return $this;
    }

    /**
     * Get the value of MouvCredit
     */ 
    public function getMouvCredit()
    {
        return $this->MouvCredit;
    }

    /**
     * Set the value of MouvCredit
     *
     * @return  self
     */ 
    public function setMouvCredit($MouvCredit)
    {
        $this->MouvCredit = $MouvCredit;

        return $this;
    }

    /**
     * Get the value of MouvDebit
     */ 
    public function getMouvDebit()
    {
        return $this->MouvDebit;
    }

    /**
     * Set the value of MouvDebit
     *
     * @return  self
     */ 
    public function setMouvDebit($MouvDebit)
    {
        $this->MouvDebit = $MouvDebit;

        return $this;
    }

    /**
     * Get the value of SoldePrecedent
     */ 
    public function getSoldePrecedent()
    {
        return $this->SoldePrecedent;
    }

    /**
     * Set the value of SoldePrecedent
     *
     * @return  self
     */ 
    public function setSoldePrecedent($SoldePrecedent)
    {
        $this->SoldePrecedent = $SoldePrecedent;

        return $this;
    }

    /**
     * Get the value of Imput
     */ 
    public function getImput()
    {
        return $this->Imput;
    }

    /**
     * Set the value of Imput
     *
     * @return  self
     */ 
    public function setImput($Imput)
    {
        $this->Imput = $Imput;

        return $this;
    }

    /**
     * Get the value of idCorpBalance
     */ 
    public function getIdCorpBalance()
    {
        return $this->idCorpBalance;
    }

    /**
     * Set the value of idCorpBalance
     *
     * @return  self
     */ 
    public function setIdCorpBalance($idCorpBalance)
    {
        $this->idCorpBalance = $idCorpBalance;

        return $this;
    }
}
