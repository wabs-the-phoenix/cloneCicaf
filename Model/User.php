<?php

namespace App\Model;

class User extends Model
{
    protected $idUser;
    protected $nom;
    //protected $role;
    protected $login;
    protected $mpd;
    protected $specialCode;
    protected $entrepriseId;
    protected $agentId;
    protected $email;
    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }
    /**
     * recuperer l'id de l'entreprise de l'utilisateur
     * @return {string} id || null
     */
    public function getEntrepriseId() {
        return $this->entrepriseId;
    }
    /**
     * definir l'entreprise 
     * @param {string or int} id
     * @return void
     */
    public function setEntrepriseId($entrepriseId) {
        $this->entrepriseId = $entrepriseId;
    }
    /**
     * Get the value of specialCode
     */ 
    public function getSpecialCode()
    {
        return $this->specialCode;
    }

    /**
     * Set the value of specialCode
     *
     * @return  self
     */ 
    public function setSpecialCode($specialCode)
    {
        $this->specialCode = $specialCode;

        return $this;
    }

    /**
     * Get the value of mpd
     */ 
    public function getMpd()
    {
        return $this->mpd;
    }

    /**
     * Set the value of mpd
     *
     * @return  self
     */ 
    public function setMpd($mpd)
    {
        $this->mpd = $mpd;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

        return $this;
    }

    /**
     * Get the value of role
     */ 
    /*public function getRole()
    {
        return $this->role;
    }

    /**
     * Set the value of role
     *
     * @return  self
     */ 
    /*
    public function setRole($role)
    {
        $this->role = $role;

        return $this;
    }*/

    /**
     * Get the value of nom
     */ 
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set the value of nom
     *
     * @return  self
     */ 
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get the value of idUser
     */ 
    public function getIdUser()
    {
        return $this->idUser;
    }

    /**
     * Set the value of idUser
     *
     * @return  self
     */ 
    public function setIdUser($idUser)
    {
        $this->idUser = $idUser;

        return $this;
    }

    /**
     * Get the value of agentId
     */ 
    public function getAgentId()
    {
        return $this->agentId;
    }

    /**
     * Set the value of agentId
     *
     * @return  self
     */ 
    public function setAgentId($agentId)
    {
        $this->agentId = $agentId;

        return $this;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of email
     *
     * @return  self
     */ 
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }
}
