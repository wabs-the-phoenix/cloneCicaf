<?php

declare(strict_types=1);

namespace App\Model;

class CompteAnalytique  extends Model
{
    protected $idCompteAnalytique;
    protected $DesiAnal;
    protected $DateAnal;
    protected $table;
    /**
     * construct
     */
    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of DateAnal
     */ 
    public function getDateAnal()
    {
        return $this->DateAnal;
    }

    /**
     * Set the value of DateAnal
     *
     * @return  self
     */ 
    public function setDateAnal($DateAnal)
    {
        $this->DateAnal = $DateAnal;

        return $this;
    }

    /**
     * Get the value of DesiAnal
     */ 
    public function getDesiAnal()
    {
        return $this->DesiAnal;
    }

    /**
     * Set the value of DesiAnal
     *
     * @return  self
     */ 
    public function setDesiAnal($DesiAnal)
    {
        $this->DesiAnal = $DesiAnal;
            
        return $this;
    }

    /**
     * Get the value of idCompteAnalityque
     */ 
    public function getIdCompteAnalytique()
    {
        return $this->idCompteAnalytique;
    }

    /**
     * Set the value of idCompteAnalityque
     *
     * @return  self
     */ 
    public function setIdCompteAnalytique($idCompteAnalytique)
    {
        $this->idCompteAnalytique = $idCompteAnalytique;

        return $this;
    }
}
