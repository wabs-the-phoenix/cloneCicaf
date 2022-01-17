<?php


namespace App\Model;

class RenseignementImmo extends Model
{
    protected $idRenseignementImmo;
    protected $DesignationImmo;
    protected $DateAcquisition;
    protected $CodeImmo;
    protected $Compte22;
    protected $Compte28;
    protected $Compte68;
    protected $TauxAmortissement;
    protected $DureeImmo;
    protected $ValeurBrute;
    protected $LieuAffectation;
    protected $TauxChangeIitial;
    protected $EcartDeReev_14_106;
    protected $QteInitiale;
    protected $QteInvantaire;
    protected $TauxReevaluationV;
    protected $ExerciceTauxRev;

    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }
    

    /**
     * Get the value of ExerciceTauxRev
     */ 
    public function getExerciceTauxRev()
    {
        return $this->ExerciceTauxRev;
    }

    /**
     * Set the value of ExerciceTauxRev
     *
     * @return  self
     */ 
    public function setExerciceTauxRev($ExerciceTauxRev)
    {
        $this->ExerciceTauxRev = $ExerciceTauxRev;

        return $this;
    }

    /**
     * Get the value of TauxReevaluationV
     */ 
    public function getTauxReevaluationV()
    {
        return $this->TauxReevaluationV;
    }

    /**
     * Set the value of TauxReevaluationV
     *
     * @return  self
     */ 
    public function setTauxReevaluationV($TauxReevaluationV)
    {
        $this->TauxReevaluationV = $TauxReevaluationV;

        return $this;
    }

    /**
     * Get the value of QteInvantaire
     */ 
    public function getQteInvantaire()
    {
        return $this->QteInvantaire;
    }

    /**
     * Set the value of QteInvantaire
     *
     * @return  self
     */ 
    public function setQteInvantaire($QteInvantaire)
    {
        $this->QteInvantaire = $QteInvantaire;

        return $this;
    }

    /**
     * Get the value of QteInitiale
     */ 
    public function getQteInitiale()
    {
        return $this->QteInitiale;
    }

    /**
     * Set the value of QteInitiale
     *
     * @return  self
     */ 
    public function setQteInitiale($QteInitiale)
    {
        $this->QteInitiale = $QteInitiale;

        return $this;
    }

    /**
     * Get the value of EcartDeReev_14_106
     */ 
    public function getEcartDeReev_14_106()
    {
        return $this->EcartDeReev_14_106;
    }

    /**
     * Set the value of EcartDeReev_14_106
     *
     * @return  self
     */ 
    public function setEcartDeReev_14_106($EcartDeReev_14_106)
    {
        $this->EcartDeReev_14_106 = $EcartDeReev_14_106;

        return $this;
    }

    /**
     * Get the value of TauxChangeIitial
     */ 
    public function getTauxChangeIitial()
    {
        return $this->TauxChangeIitial;
    }

    /**
     * Set the value of TauxChangeIitial
     *
     * @return  self
     */ 
    public function setTauxChangeIitial($TauxChangeIitial)
    {
        $this->TauxChangeIitial = $TauxChangeIitial;

        return $this;
    }

    /**
     * Get the value of LieuAffectation
     */ 
    public function getLieuAffectation()
    {
        return $this->LieuAffectation;
    }

    /**
     * Set the value of LieuAffectation
     *
     * @return  self
     */ 
    public function setLieuAffectation($LieuAffectation)
    {
        $this->LieuAffectation = $LieuAffectation;

        return $this;
    }

    /**
     * Get the value of ValeurBrute
     */ 
    public function getValeurBrute()
    {
        return $this->ValeurBrute;
    }

    /**
     * Set the value of ValeurBrute
     *
     * @return  self
     */ 
    public function setValeurBrute($ValeurBrute)
    {
        $this->ValeurBrute = $ValeurBrute;

        return $this;
    }

    /**
     * Get the value of DureeImmo
     */ 
    public function getDureeImmo()
    {
        return $this->DureeImmo;
    }

    /**
     * Set the value of DureeImmo
     *
     * @return  self
     */ 
    public function setDureeImmo($DureeImmo)
    {
        $this->DureeImmo = $DureeImmo;

        return $this;
    }

    /**
     * Get the value of TauxAmortissement
     */ 
    public function getTauxAmortissement()
    {
        return $this->TauxAmortissement;
    }

    /**
     * Set the value of TauxAmortissement
     *
     * @return  self
     */ 
    public function setTauxAmortissement($TauxAmortissement)
    {
        $this->TauxAmortissement = $TauxAmortissement;

        return $this;
    }

    /**
     * Get the value of Compte68
     */ 
    public function getCompte68()
    {
        return $this->Compte68;
    }

    /**
     * Set the value of Compte68
     *
     * @return  self
     */ 
    public function setCompte68($Compte68)
    {
        $this->Compte68 = $Compte68;

        return $this;
    }

    /**
     * Get the value of Compte28
     */ 
    public function getCompte28()
    {
        return $this->Compte28;
    }

    /**
     * Set the value of Compte28
     *
     * @return  self
     */ 
    public function setCompte28($Compte28)
    {
        $this->Compte28 = $Compte28;

        return $this;
    }

    /**
     * Get the value of Compte22
     */ 
    public function getCompte22()
    {
        return $this->Compte22;
    }

    /**
     * Set the value of Compte22
     *
     * @return  self
     */ 
    public function setCompte22($Compte22)
    {
        $this->Compte22 = $Compte22;

        return $this;
    }

    /**
     * Get the value of CodeImmo
     */ 
    public function getCodeImmo()
    {
        return $this->CodeImmo;
    }

    /**
     * Set the value of CodeImmo
     *
     * @return  self
     */ 
    public function setCodeImmo($CodeImmo)
    {
        $this->CodeImmo = $CodeImmo;

        return $this;
    }

    /**
     * Get the value of DateAcquisition
     */ 
    public function getDateAcquisition()
    {
        return $this->DateAcquisition;
    }

    /**
     * Set the value of DateAcquisition
     *
     * @return  self
     */ 
    public function setDateAcquisition($DateAcquisition)
    {
        $this->DateAcquisition = $DateAcquisition;

        return $this;
    }

    /**
     * Get the value of DesignationImmo
     */ 
    public function getDesignationImmo()
    {
        return $this->DesignationImmo;
    }

    /**
     * Set the value of DesignationImmo
     *
     * @return  self
     */ 
    public function setDesignationImmo($DesignationImmo)
    {
        $this->DesignationImmo = $DesignationImmo;

        return $this;
    }

    /**
     * Get the value of idRenseignementImmo
     */ 
    public function getIdRenseignementImmo()
    {
        return $this->idRenseignementImmo;
    }

    /**
     * Set the value of idRenseignementImmo
     *
     * @return  self
     */ 
    public function setIdRenseignementImmo($idRenseignementImmo)
    {
        $this->idRenseignementImmo = $idRenseignementImmo;

        return $this;
    }
}
