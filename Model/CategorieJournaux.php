<?php



namespace App\Model;

class CategorieJournaux extends Model
{
    protected $idCategorieJournaux;
    protected $CodeJournal;
    protected $NomJournal;
    protected $RespoJournal;
    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }
    

    /**
     * Get the value of RespoJournal
     */ 
    public function getRespoJournal()
    {
        return $this->RespoJournal;
    }

    /**
     * Set the value of RespoJournal
     *
     * @return  self
     */ 
    public function setRespoJournal($RespoJournal)
    {
        $this->RespoJournal = $RespoJournal;

        return $this;
    }

    /**
     * Get the value of NomJournal
     */ 
    public function getNomJournal()
    {
        return $this->NomJournal;
    }

    /**
     * Set the value of NomJournal
     *
     * @return  self
     */ 
    public function setNomJournal($NomJournal)
    {
        $this->NomJournal = $NomJournal;

        return $this;
    }

    /**
     * Get the value of CodeJournal
     */ 
    public function getCodeJournal()
    {
        return $this->CodeJournal;
    }

    /**
     * Set the value of CodeJournal
     *
     * @return  self
     */ 
    public function setCodeJournal($CodeJournal)
    {
        $this->CodeJournal = $CodeJournal;

        return $this;
    }

    /**
     * Get the value of idCategorieJournaux
     */ 
    public function getIdCategorieJournaux()
    {
        return $this->idCategorieJournaux;
    }

    /**
     * Set the value of idCategorieJournaux
     *
     * @return  self
     */ 
    public function setIdCategorieJournaux($idCategorieJournaux)
    {
        $this->idCategorieJournaux = $idCategorieJournaux;

        return $this;
    }
}
