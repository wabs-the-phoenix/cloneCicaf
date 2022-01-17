<?php
namespace App\Model;

class PlanComptable extends Model
{
    protected $idPlanComptable;
    protected $Numclasse;
    protected $CompteOperation;
    protected $DesiOperation;
    protected $DesiClassel;
    protected $ComptePrinci;
    protected $DesiComptePrinci;
    protected $SousCompte;
    protected $DesiSousCompte;
    protected $CodeDivision;
    protected $DesiDivision;
    protected $CodeFamille;
    protected $DesiFamille;
    protected $RefCompte;
    protected $Lettrage1;
    protected $Lettrage2;
    protected $Lettrage3;
    protected $Lettrage4;
    protected $Debit;
    protected $Credit;
    protected $solde;
    protected $entiteId;
    protected $typeCompte;

  protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }
    public function getTypeCompte() {
        return $this->typeCompte;
    }
    public function setTypeCompte($typeCompte) {
        $this->typeCompte = $typeCompte;
        return $this;
    }
    public function updateSolde() {
        if ($this->typeCompte == 1) {
           $this->solde = $this->credit - $this->debit;
        }
        else {
            $this->solde = $this->debit - $this->credit;
        }
        return $this;
    }
    public function setSolde($solde) {
        $this->solde = $solde;
        return $this;
    }
    public function getSolde() {
       return $this->solde;
    }
    public function getDebit() {
        return $this->Debit;
    }
    public function setDebit($debit) {
        $this->Debit = $debit;
        return $this;
    }
    public function addDebit($somme) {
        $this->Debit === null? 0 : $this->Debit;
        $somme = intval($somme);
        $this->Debit += $somme;
    }
    public function addCredit($somme) {
        $this->Credit === null? 0 : $this->Credit;
        $somme = intval($somme);
        $this->Credit += $somme;
    }
    public function getCredit() {
        return $this->Credit;
    }

    public function setCredit($credit) {
        $this->Credit = $credit;
        return $this;
    }
    /**
     * Get the value of Lettrage4
     */ 
    public function getLettrage4()
    {
        return $this->Lettrage4;
    }

    /**
     * Set the value of Lettrage4
     *
     * @return  self
     */ 
    public function setLettrage4($Lettrage4)
    {
        $this->Lettrage4 = $Lettrage4;

        return $this;
    }

    /**
     * Get the value of Lettrage3
     */ 
    public function getLettrage3()
    {
        return $this->Lettrage3;
    }

    /**
     * Set the value of Lettrage3
     *
     * @return  self
     */ 
    public function setLettrage3($Lettrage3)
    {
        $this->Lettrage3 = $Lettrage3;

        return $this;
    }

    /**
     * Get the value of Lettrage2
     */ 
    public function getLettrage2()
    {
        return $this->Lettrage2;
    }

    /**
     * Set the value of Lettrage2
     *
     * @return  self
     */ 
    public function setLettrage2($Lettrage2)
    {
        $this->Lettrage2 = $Lettrage2;

        return $this;
    }

    /**
     * Get the value of Lettrage1
     */ 
    public function getLettrage1()
    {
        return $this->Lettrage1;
    }

    /**
     * Set the value of Lettrage1
     *
     * @return  self
     */ 
    public function setLettrage1($Lettrage1)
    {
        $this->Lettrage1 = $Lettrage1;

        return $this;
    }

    /**
     * Get the value of RefCompte
     */ 
    public function getRefCompte()
    {
        return $this->RefCompte;
    }

    /**
     * Set the value of RefCompte
     *
     * @return  self
     */ 
    public function setRefCompte($RefCompte)
    {
        $this->RefCompte = $RefCompte;

        return $this;
    }

    /**
     * Get the value of DesiFamille
     */ 
    public function getDesiFamille()
    {
        return $this->DesiFamille;
    }

    /**
     * Set the value of DesiFamille
     *
     * @return  self
     */ 
    public function setDesiFamille($DesiFamille)
    {
        $this->DesiFamille = $DesiFamille;

        return $this;
    }

    /**
     * Get the value of CodeFamille
     */ 
    public function getCodeFamille()
    {
        return $this->CodeFamille;
    }

    /**
     * Set the value of CodeFamille
     *
     * @return  self
     */ 
    public function setCodeFamille($CodeFamille)
    {
        $this->CodeFamille = $CodeFamille;

        return $this;
    }

    /**
     * Get the value of CodeDivision
     */ 
    public function getCodeDivision()
    {
        return $this->CodeDivision;
    }

    /**
     * Set the value of CodeDivision
     *
     * @return  self
     */ 
    public function setCodeDivision($CodeDivision)
    {
        $this->CodeDivision = $CodeDivision;

        return $this;
    }
      /**
     * Get the value of DesiDivision
     */ 
    public function getDesiDivision()
    {
        return $this->DesiDivision;
    }

    /**
     * Set the value of DesiDivision
     *
     * @return  self
     */ 
    public function setDesiDivision($DesiDivision)
    {
        $this->DesiDivision = $DesiDivision;

        return $this;
    }
    /**
     * Get the value of DesiSousCompte
     */ 
    public function getDesiSousCompte()
    {
        return $this->DesiSousCompte;
    }

    /**
     * Set the value of DesiSousCompte
     *
     * @return  self
     */ 
    public function setDesiSousCompte($DesiSousCompte)
    {
        $this->DesiSousCompte = $DesiSousCompte;

        return $this;
    }

    /**
     * Get the value of SousCompte
     */ 
    public function getSousCompte()
    {
        return $this->SousCompte;
    }

    /**
     * Set the value of SousCompte
     *
     * @return  self
     */ 
    public function setSousCompte($SousCompte)
    {
        $this->SousCompte = $SousCompte;

        return $this;
    }

    /**
     * Get the value of DesiComptePrinci
     */ 
    public function getDesiComptePrinci()
    {
        return $this->DesiComptePrinci;
    }

    /**
     * Set the value of DesiComptePrinci
     *
     * @return  self
     */ 
    public function setDesiComptePrinci($DesiComptePrinci)
    {
        $this->DesiComptePrinci = $DesiComptePrinci;

        return $this;
    }

    /**
     * Get the value of ComptePrinci
     */ 
    public function getComptePrinci()
    {
        return $this->ComptePrinci;
    }

    /**
     * Set the value of ComptePrinci
     *
     * @return  self
     */ 
    public function setComptePrinci($ComptePrinci)
    {
        $this->ComptePrinci = $ComptePrinci;

        return $this;
    }

    /**
     * Get the value of DesiClassel
     */ 
    public function getDesiClassel()
    {
        return $this->DesiClassel;
    }

    /**
     * Set the value of DesiClassel
     *
     * @return  self
     */ 
    public function setDesiClassel($DesiClassel)
    {
        $this->DesiClassel = $DesiClassel;

        return $this;
    }

    /**
     * Get the value of DesiOperation
     */ 
    public function getDesiOperation()
    {
        return $this->DesiOperation;
    }

    /**
     * Set the value of DesiOperation
     *
     * @return  self
     */ 
    public function setDesiOperation($DesiOperation)
    {
        $this->DesiOperation = $DesiOperation;

        return $this;
    }

    /**
     * Get the value of CompteOperation
     */ 
    public function getCompteOperation()
    {
        return $this->CompteOperation;
    }

    /**
     * Set the value of CompteOperation
     *
     * @return  self
     */ 
    public function setCompteOperation($CompteOperation)
    {
        $this->CompteOperation = $CompteOperation;

        return $this;
    }

    /**
     * Get the value of Numclasse
     */ 
    public function getNumclasse()
    {
        return $this->Numclasse;
    }

    /**
     * Set the value of Numclasse
     *
     * @return  self
     */ 
    public function setNumclasse($Numclasse)
    {
        $this->Numclasse = $Numclasse;

        return $this;
    }

    /**
     * Get the value of NumCompte
     */ 
    public function getNumCompte()
    {
        return $this->NumCompte;
    }

    /**
     * Set the value of NumCompte
     *
     * @return  self
     */ 
    public function setNumCompte($NumCompte)
    {
        $this->NumCompte = $NumCompte;

        return $this;
    }

    /**
     * Get the value of idPlanComptable
     */ 
    public function getIdPlanComptable()
    {
        return $this->idPlanComptable;
    }

    /**
     * Set the value of idPlanComptable
     *
     * @return  self
     */ 
    public function setIdPlanComptable($idPlanComptable)
    {
        $this->idPlanComptable = $idPlanComptable;

        return $this;
    }

    public function createLettrage() {
        $lettrage = "";
        $lettres = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        $lettreArray = str_split($lettres);
        for ($i=0; $i < 4; $i++) { 
            if($i < 3 ) {
                $index = rand(0,25);
                $lettrage .= $lettreArray[$index];
            }
            else {
                $index = rand(26,35);
                $lettrage .= $lettreArray[$index];
            }
           
        }
        return $lettrage;
    }
}
