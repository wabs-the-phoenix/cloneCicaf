<?php


namespace App\Model;

class Province extends Model
{
    protected $idProvince;
    protected $province;

    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    /**
     * Get the value of province
     */ 
    public function getProvince()
    {
        return $this->province;
    }

    /**
     * Set the value of province
     *
     * @return  self
     */ 
    public function setProvince($province)
    {
        $this->province = $province;

        return $this;
    }

    /**
     * Get the value of idProvince
     */ 
    public function getIdProvince()
    {
        return $this->idProvince;
    }

    /**
     * Set the value of idProvince
     *
     * @return  self
     */ 
    public function setIdProvince($idProvince)
    {
        $this->idProvince = $idProvince;

        return $this;
    }
}
