<?php



namespace App\Model;

class CodeProjet extends Model
{
    protected $idCodeProjet;

    protected $DateDebutProjet;

    protected $DateFinProjet;

    protected $NomBailleur;

    protected $NomResponsable;

    protected $PersonneCible;

    protected $NomProjet;

    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }


    /**
     * Get the value of NomProjet
     */ 
    public function getNomProjet()
    {
        return $this->NomProjet;
    }

    /**
     * Set the value of NomProjet
     *
     * @return  self
     */ 
    public function setNomProjet($NomProjet)
    {
        $this->NomProjet = $NomProjet;

        return $this;
    }

    /**
     * Get the value of PersonneCible
     */ 
    public function getPersonneCible()
    {
        return $this->PersonneCible;
    }

    /**
     * Set the value of PersonneCible
     *
     * @return  self
     */ 
    public function setPersonneCible($PersonneCible)
    {
        $this->PersonneCible = $PersonneCible;

        return $this;
    }

    /**
     * Get the value of NomResponsable
     */ 
    public function getNomResponsable()
    {
        return $this->NomResponsable;
    }

    /**
     * Set the value of NomResponsable
     *
     * @return  self
     */ 
    public function setNomResponsable($NomResponsable)
    {
        $this->NomResponsable = $NomResponsable;

        return $this;
    }

    /**
     * Get the value of NomBailleur
     */ 
    public function getNomBailleur()
    {
        return $this->NomBailleur;
    }

    /**
     * Set the value of NomBailleur
     *
     * @return  self
     */ 
    public function setNomBailleur($NomBailleur)
    {
        $this->NomBailleur = $NomBailleur;

        return $this;
    }

    /**
     * Get the value of DateFinProjet
     */ 
    public function getDateFinProjet()
    {
        return $this->DateFinProjet;
    }

    /**
     * Set the value of DateFinProjet
     *
     * @return  self
     */ 
    public function setDateFinProjet($DateFinProjet)
    {
        $this->DateFinProjet = $DateFinProjet;

        return $this;
    }

    /**
     * Get the value of DateDebutProjet
     */ 
    public function getDateDebutProjet()
    {
        return $this->DateDebutProjet;
    }

    /**
     * Set the value of DateDebutProjet
     *
     * @return  self
     */ 
    public function setDateDebutProjet($DateDebutProjet)
    {
        $this->DateDebutProjet = $DateDebutProjet;

        return $this;
    }

    /**
     * Get the value of idCodeProjet
     */ 
    public function getIdCodeProjet()
    {
        return $this->idCodeProjet;
    }

    /**
     * Set the value of idCodeProjet
     *
     * @return  self
     */ 
    public function setIdCodeProjet($idCodeProjet)
    {
        $this->idCodeProjet = $idCodeProjet;

        return $this;
    }
}
