<?php



namespace App\Model;

class Agent extends Model
{
    protected $idAgent;
    protected $SNumEntreprise;
    protected $MatriAgent;
    protected $NomAgent;
    protected $PostNomAgent;
    protected $Prenom;
    protected $SexeAgent;
    protected $DateEmbauche;
    protected $DateEmbaucheRel;
    protected $EtatCivil;
    protected $NomEpouse;
    protected $NbreEnfant;
    protected $Nationalite;
    protected $NumRue;
    protected $NomRue;
    protected $CoeffHS2;
    protected $NumTel;
    protected $Salheure;
    protected $SalJour;
    protected $TauxAlloc;
    protected $AllocExtra;
    protected $CoeffHS1;
    protected $CoeffHF;
    protected $Logement;
    protected $Transport;
    protected $DivIndem;
    protected $NumINSS;
    protected $NumImpot;
    protected $TauxINSS;
    protected $TauxImpot;
    protected $TauxTPJ;
    protected $Categorie;
    protected $Bareme;
    protected $CompteBancaire;
    protected $DateSortie;
    protected $Tension;
    protected $BaseTension;
    protected $SortieAgent;
    protected $TauxIER;
    protected $communeId;
    protected $FonctionId;
    protected $ServiceId;
    protected $user_idUser;
    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }
    

    /**
     * Get the value of TauxIER
     */ 
    public function getTauxIER()
    {
        return $this->TauxIER;
    }

    /**
     * Set the value of TauxIER
     *
     * @return  self
     */ 
    public function setTauxIER($TauxIER)
    {
        $this->TauxIER = $TauxIER;

        return $this;
    }

    /**
     * Get the value of SortieAgent
     */ 
    public function getSortieAgent()
    {
        return $this->SortieAgent;
    }

    /**
     * Set the value of SortieAgent
     *
     * @return  self
     */ 
    public function setSortieAgent($SortieAgent)
    {
        $this->SortieAgent = $SortieAgent;

        return $this;
    }

    /**
     * Get the value of BaseTension
     */ 
    public function getBaseTension()
    {
        return $this->BaseTension;
    }

    /**
     * Set the value of BaseTension
     *
     * @return  self
     */ 
    public function setBaseTension($BaseTension)
    {
        $this->BaseTension = $BaseTension;

        return $this;
    }

    /**
     * Get the value of Tension
     */ 
    public function getTension()
    {
        return $this->Tension;
    }

    /**
     * Set the value of Tension
     *
     * @return  self
     */ 
    public function setTension($Tension)
    {
        $this->Tension = $Tension;

        return $this;
    }

    /**
     * Get the value of DateSortie
     */ 
    public function getDateSortie()
    {
        return $this->DateSortie;
    }

    /**
     * Set the value of DateSortie
     *
     * @return  self
     */ 
    public function setDateSortie($DateSortie)
    {
        $this->DateSortie = $DateSortie;

        return $this;
    }

    /**
     * Get the value of CompteBancaire
     */ 
    public function getCompteBancaire()
    {
        return $this->CompteBancaire;
    }

    /**
     * Set the value of CompteBancaire
     *
     * @return  self
     */ 
    public function setCompteBancaire($CompteBancaire)
    {
        $this->CompteBancaire = $CompteBancaire;

        return $this;
    }

    /**
     * Get the value of Bareme
     */ 
    public function getBareme()
    {
        return $this->Bareme;
    }

    /**
     * Set the value of Bareme
     *
     * @return  self
     */ 
    public function setBareme($Bareme)
    {
        $this->Bareme = $Bareme;

        return $this;
    }

    /**
     * Get the value of Categorie
     */ 
    public function getCategorie()
    {
        return $this->Categorie;
    }

    /**
     * Set the value of Categorie
     *
     * @return  self
     */ 
    public function setCategorie($Categorie)
    {
        $this->Categorie = $Categorie;

        return $this;
    }

    /**
     * Get the value of TauxTPJ
     */ 
    public function getTauxTPJ()
    {
        return $this->TauxTPJ;
    }

    /**
     * Set the value of TauxTPJ
     *
     * @return  self
     */ 
    public function setTauxTPJ($TauxTPJ)
    {
        $this->TauxTPJ = $TauxTPJ;

        return $this;
    }

    /**
     * Get the value of TauxImpot
     */ 
    public function getTauxImpot()
    {
        return $this->TauxImpot;
    }

    /**
     * Set the value of TauxImpot
     *
     * @return  self
     */ 
    public function setTauxImpot($TauxImpot)
    {
        $this->TauxImpot = $TauxImpot;

        return $this;
    }

    /**
     * Get the value of TauxINSS
     */ 
    public function getTauxINSS()
    {
        return $this->TauxINSS;
    }

    /**
     * Set the value of TauxINSS
     *
     * @return  self
     */ 
    public function setTauxINSS($TauxINSS)
    {
        $this->TauxINSS = $TauxINSS;

        return $this;
    }

    /**
     * Get the value of NumImpot
     */ 
    public function getNumImpot()
    {
        return $this->NumImpot;
    }

    /**
     * Set the value of NumImpot
     *
     * @return  self
     */ 
    public function setNumImpot($NumImpot)
    {
        $this->NumImpot = $NumImpot;

        return $this;
    }

    /**
     * Get the value of NumINSS
     */ 
    public function getNumINSS()
    {
        return $this->NumINSS;
    }

    /**
     * Set the value of NumINSS
     *
     * @return  self
     */ 
    public function setNumINSS($NumINSS)
    {
        $this->NumINSS = $NumINSS;

        return $this;
    }

    /**
     * Get the value of DivIndem
     */ 
    public function getDivIndem()
    {
        return $this->DivIndem;
    }

    /**
     * Set the value of DivIndem
     *
     * @return  self
     */ 
    public function setDivIndem($DivIndem)
    {
        $this->DivIndem = $DivIndem;

        return $this;
    }

    /**
     * Get the value of Transport
     */ 
    public function getTransport()
    {
        return $this->Transport;
    }

    /**
     * Set the value of Transport
     *
     * @return  self
     */ 
    public function setTransport($Transport)
    {
        $this->Transport = $Transport;

        return $this;
    }

    /**
     * Get the value of Logement
     */ 
    public function getLogement()
    {
        return $this->Logement;
    }

    /**
     * Set the value of Logement
     *
     * @return  self
     */ 
    public function setLogement($Logement)
    {
        $this->Logement = $Logement;

        return $this;
    }

    /**
     * Get the value of CoeffHF
     */ 
    public function getCoeffHF()
    {
        return $this->CoeffHF;
    }

    /**
     * Set the value of CoeffHF
     *
     * @return  self
     */ 
    public function setCoeffHF($CoeffHF)
    {
        $this->CoeffHF = $CoeffHF;

        return $this;
    }

    /**
     * Get the value of CoeffHS1
     */ 
    public function getCoeffHS1()
    {
        return $this->CoeffHS1;
    }

    /**
     * Set the value of CoeffHS1
     *
     * @return  self
     */ 
    public function setCoeffHS1($CoeffHS1)
    {
        $this->CoeffHS1 = $CoeffHS1;

        return $this;
    }

    /**
     * Get the value of AllocExtra
     */ 
    public function getAllocExtra()
    {
        return $this->AllocExtra;
    }

    /**
     * Set the value of AllocExtra
     *
     * @return  self
     */ 
    public function setAllocExtra($AllocExtra)
    {
        $this->AllocExtra = $AllocExtra;

        return $this;
    }

    /**
     * Get the value of TauxAlloc
     */ 
    public function getTauxAlloc()
    {
        return $this->TauxAlloc;
    }

    /**
     * Set the value of TauxAlloc
     *
     * @return  self
     */ 
    public function setTauxAlloc($TauxAlloc)
    {
        $this->TauxAlloc = $TauxAlloc;

        return $this;
    }

    /**
     * Get the value of SalJour
     */ 
    public function getSalJour()
    {
        return $this->SalJour;
    }

    /**
     * Set the value of SalJour
     *
     * @return  self
     */ 
    public function setSalJour($SalJour)
    {
        $this->SalJour = $SalJour;

        return $this;
    }

    /**
     * Get the value of Salheure
     */ 
    public function getSalheure()
    {
        return $this->Salheure;
    }

    /**
     * Set the value of Salheure
     *
     * @return  self
     */ 
    public function setSalheure($Salheure)
    {
        $this->Salheure = $Salheure;

        return $this;
    }

    /**
     * Get the value of NumTel
     */ 
    public function getNumTel()
    {
        return $this->NumTel;
    }

    /**
     * Set the value of NumTel
     *
     * @return  self
     */ 
    public function setNumTel($NumTel)
    {
        $this->NumTel = $NumTel;

        return $this;
    }

    /**
     * Get the value of CoeffHS2
     */ 
    public function getCoeffHS2()
    {
        return $this->CoeffHS2;
    }

    /**
     * Set the value of CoeffHS2
     *
     * @return  self
     */ 
    public function setCoeffHS2($CoeffHS2)
    {
        $this->CoeffHS2 = $CoeffHS2;

        return $this;
    }

    /**
     * Get the value of NomRue
     */ 
    public function getNomRue()
    {
        return $this->NomRue;
    }

    /**
     * Set the value of NomRue
     *
     * @return  self
     */ 
    public function setNomRue($NomRue)
    {
        $this->NomRue = $NomRue;

        return $this;
    }

    /**
     * Get the value of NumRue
     */ 
    public function getNumRue()
    {
        return $this->NumRue;
    }

    /**
     * Set the value of NumRue
     *
     * @return  self
     */ 
    public function setNumRue($NumRue)
    {
        $this->NumRue = $NumRue;

        return $this;
    }

    /**
     * Get the value of Nationalite
     */ 
    public function getNationalite()
    {
        return $this->Nationalite;
    }

    /**
     * Set the value of Nationalite
     *
     * @return  self
     */ 
    public function setNationalite($Nationalite)
    {
        $this->Nationalite = $Nationalite;

        return $this;
    }

    /**
     * Get the value of NbreEnfant
     */ 
    public function getNbreEnfant()
    {
        return $this->NbreEnfant;
    }

    /**
     * Set the value of NbreEnfant
     *
     * @return  self
     */ 
    public function setNbreEnfant($NbreEnfant)
    {
        $this->NbreEnfant = $NbreEnfant;

        return $this;
    }

    /**
     * Get the value of NomEpouse
     */ 
    public function getNomEpouse()
    {
        return $this->NomEpouse;
    }

    /**
     * Set the value of NomEpouse
     *
     * @return  self
     */ 
    public function setNomEpouse($NomEpouse)
    {
        $this->NomEpouse = $NomEpouse;

        return $this;
    }

    /**
     * Get the value of EtatCivil
     */ 
    public function getEtatCivil()
    {
        return $this->EtatCivil;
    }

    /**
     * Set the value of EtatCivil
     *
     * @return  self
     */ 
    public function setEtatCivil($EtatCivil)
    {
        $this->EtatCivil = $EtatCivil;

        return $this;
    }

    /**
     * Get the value of DateEmbaucheRel
     */ 
    public function getDateEmbaucheRel()
    {
        return $this->DateEmbaucheRel;
    }

    /**
     * Set the value of DateEmbaucheRel
     *
     * @return  self
     */ 
    public function setDateEmbaucheRel($DateEmbaucheRel)
    {
        $this->DateEmbaucheRel = $DateEmbaucheRel;

        return $this;
    }

    /**
     * Get the value of DateEmbauche
     */ 
    public function getDateEmbauche()
    {
        return $this->DateEmbauche;
    }

    /**
     * Set the value of DateEmbauche
     *
     * @return  self
     */ 
    public function setDateEmbauche($DateEmbauche)
    {
        $this->DateEmbauche = $DateEmbauche;

        return $this;
    }

    /**
     * Get the value of SexeAgent
     */ 
    public function getSexeAgent()
    {
        return $this->SexeAgent;
    }

    /**
     * Set the value of SexeAgent
     *
     * @return  self
     */ 
    public function setSexeAgent($SexeAgent)
    {
        $this->SexeAgent = $SexeAgent;

        return $this;
    }

    /**
     * Get the value of Prenom
     */ 
    public function getPrenom()
    {
        return $this->Prenom;
    }

    /**
     * Set the value of Prenom
     *
     * @return  self
     */ 
    public function setPrenom($Prenom)
    {
        $this->Prenom = $Prenom;

        return $this;
    }

    /**
     * Get the value of PostNomAgent
     */ 
    public function getPostNomAgent()
    {
        return $this->PostNomAgent;
    }

    /**
     * Set the value of PostNomAgent
     *
     * @return  self
     */ 
    public function setPostNomAgent($PostNomAgent)
    {
        $this->PostNomAgent = $PostNomAgent;

        return $this;
    }

    /**
     * Get the value of NomAgent
     */ 
    public function getNomAgent()
    {
        return $this->NomAgent;
    }

    /**
     * Set the value of NomAgent
     *
     * @return  self
     */ 
    public function setNomAgent($NomAgent)
    {
        $this->NomAgent = $NomAgent;

        return $this;
    }

    /**
     * Get the value of MatriAgent
     */ 
    public function getMatriAgent()
    {
        return $this->MatriAgent;
    }

    /**
     * Set the value of MatriAgent
     *
     * @return  self
     */ 
    public function setMatriAgent($MatriAgent)
    {
        $this->MatriAgent = $MatriAgent;

        return $this;
    }

    /**
     * Get the value of SNumEntreprise
     */ 
    public function getSNumEntreprise()
    {
        return $this->SNumEntreprise;
    }

    /**
     * Set the value of SNumEntreprise
     *
     * @return  self
     */ 
    public function setSNumEntreprise($SNumEntreprise)
    {
        $this->SNumEntreprise = $SNumEntreprise;

        return $this;
    }

    /**
     * Get the value of idAgent
     */ 
    public function getIdAgent()
    {
        return $this->idAgent;
    }

    /**
     * Set the value of idAgent
     *
     * @return  self
     */ 
    public function setIdAgent($idAgent)
    {
        $this->idAgent = $idAgent;

        return $this;
    }

    /**
     * Get the value of communeId
     */ 
    public function getCommuneId()
    {
        return $this->communeId;
    }

    /**
     * Set the value of communeId
     *
     * @return  self
     */ 
    public function setCommuneId($communeId)
    {
        $this->communeId = $communeId;

        return $this;
    }

    /**
     * Get the value of FonctionId
     */ 
    public function getFonctionId()
    {
        return $this->FonctionId;
    }

    /**
     * Set the value of FonctionId
     *
     * @return  self
     */ 
    public function setFonctionId($FonctionId)
    {
        $this->FonctionId = $FonctionId;

        return $this;
    }

    /**
     * Get the value of ServiceId
     */ 
    public function getServiceId()
    {
        return $this->ServiceId;
    }

    /**
     * Set the value of ServiceId
     *
     * @return  self
     */ 
    public function setServiceId($ServiceId)
    {
        $this->ServiceId = $ServiceId;

        return $this;
    }

    /**
     * Get the value of user_idUser
     */ 
    public function getUser_idUser()
    {
        return $this->user_idUser;
    }

    /**
     * Set the value of user_idUser
     *
     * @return  self
     */ 
    public function setUser_idUser($user_idUser)
    {
        $this->user_idUser = $user_idUser;

        return $this;
    }
}
