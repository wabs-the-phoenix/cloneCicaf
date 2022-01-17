<?php


namespace App\Model;

class CorpBilanNormalise extends Model
{
    protected $idCorpBilanNormalise;
    protected $SoldePrecedent;
    protected $MontantBrut;
    protected $AmortProvision;
    protected $MontantNet;
    protected $TauxMoyen1;
    protected $TauxMoyen2;
    protected $EnteteBilanNormalId;
    protected $ListeCodeSystemeNormalId;
    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }
    

    /**
     * Get the value of ListeCodeSystemeNormalId
     */ 
    public function getListeCodeSystemeNormalId()
    {
        return $this->ListeCodeSystemeNormalId;
    }

    /**
     * Set the value of ListeCodeSystemeNormalId
     *
     * @return  self
     */ 
    public function setListeCodeSystemeNormalId($ListeCodeSystemeNormalId)
    {
        $this->ListeCodeSystemeNormalId = $ListeCodeSystemeNormalId;

        return $this;
    }

    /**
     * Get the value of EnteteBilanNormalId
     */ 
    public function getEnteteBilanNormalId()
    {
        return $this->EnteteBilanNormalId;
    }

    /**
     * Set the value of EnteteBilanNormalId
     *
     * @return  self
     */ 
    public function setEnteteBilanNormalId($EnteteBilanNormalId)
    {
        $this->EnteteBilanNormalId = $EnteteBilanNormalId;

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
     * Get the value of MontantNet
     */ 
    public function getMontantNet()
    {
        return $this->MontantNet;
    }

    /**
     * Set the value of MontantNet
     *
     * @return  self
     */ 
    public function setMontantNet($MontantNet)
    {
        $this->MontantNet = $MontantNet;

        return $this;
    }

    /**
     * Get the value of AmortProvision
     */ 
    public function getAmortProvision()
    {
        return $this->AmortProvision;
    }

    /**
     * Set the value of AmortProvision
     *
     * @return  self
     */ 
    public function setAmortProvision($AmortProvision)
    {
        $this->AmortProvision = $AmortProvision;

        return $this;
    }

    /**
     * Get the value of MontantBrut
     */ 
    public function getMontantBrut()
    {
        return $this->MontantBrut;
    }

    /**
     * Set the value of MontantBrut
     *
     * @return  self
     */ 
    public function setMontantBrut($MontantBrut)
    {
        $this->MontantBrut = $MontantBrut;

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
     * Get the value of idCorpBilanNormalise
     */ 
    public function getIdCorpBilanNormalise()
    {
        return $this->idCorpBilanNormalise;
    }

    /**
     * Set the value of idCorpBilanNormalise
     *
     * @return  self
     */ 
    public function setIdCorpBilanNormalise($idCorpBilanNormalise)
    {
        $this->idCorpBilanNormalise = $idCorpBilanNormalise;

        return $this;
    }
}
