<?php



namespace App\Model;

class Service extends Model
{
    protected $idService;
    protected $codeService;
    protected $Service;

    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of codeService
     */ 
    public function getCodeService()
    {
        return $this->codeService;
    }

    /**
     * Set the value of codeService
     *
     * @return  self
     */ 
    public function setCodeService($codeService)
    {
        $this->codeService = $codeService;

        return $this;
    }

    /**
     * Get the value of Service
     */ 
    public function getService()
    {
        return $this->Service;
    }

    /**
     * Set the value of Service
     *
     * @return  self
     */ 
    public function setService($Service)
    {
        $this->Service = $Service;

        return $this;
    }

    /**
     * Get the value of idService
     */ 
    public function getIdService()
    {
        return $this->idService;
    }

    /**
     * Set the value of idService
     *
     * @return  self
     */ 
    public function setIdService($idService)
    {
        $this->idService = $idService;

        return $this;
    }
}
