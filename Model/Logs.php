<?php


namespace App\Model;

class Logs extends Model
{
    protected $idLogs;
    protected $logintime;
    protected $logouttime;
    protected $user_idUser;
    
    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
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

    /**
     * Get the value of logouttime
     */ 
    public function getLogouttime()
    {
        return $this->logouttime;
    }

    /**
     * Set the value of logouttime
     *
     * @return  self
     */ 
    public function setLogouttime($logouttime)
    {
        $this->logouttime = $logouttime;

        return $this;
    }

    /**
     * Get the value of logintime
     */ 
    public function getLogintime()
    {
        return $this->logintime;
    }

    /**
     * Set the value of logintime
     *
     * @return  self
     */ 
    public function setLogintime($logintime)
    {
        $this->logintime = $logintime;

        return $this;
    }

    /**
     * Get the value of idLogs
     */ 
    public function getIdLogs()
    {
        return $this->idLogs;
    }

    /**
     * Set the value of idLogs
     *
     * @return  self
     */ 
    public function setIdLogs($idLogs)
    {
        $this->idLogs = $idLogs;

        return $this;
    }
}