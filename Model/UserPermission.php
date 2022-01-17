<?php

namespace App\Model;
class UserPermission extends Model {
    protected $idUserPermission;
    protected $adminRead;
    protected $adminWrite;
    protected $comptaRead;
    protected $comptaWrite;
    protected $budgetRead;
    protected $budgetWrite;
    protected $personnelRead;
    protected $personnelWrite;
    protected $amortissementRead;
    protected $amortissementWrite;
    protected $userId;
    protected $entrepriseRead;
    protected $entrepriseWrite;
    protected $manageAdmin;
    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }
     /**
     * Get the value of entrepriseWrite
     */ 
    public function getEntrepriseWrite()
    {
        return $this->entrepriseWrite;
    }

    /**
     * Set the value of entrepriseWrite
     *
     * @return  self
     */ 
    public function setEntrepriseWrite($entrepriseWrite)
    {
        $this->entrepriseWrite = $entrepriseWrite;

        return $this;
    }
    public function getEntrepriseRead()
    {
        return $this->entrepriseRead;
    }

    /**
     * Set the value of entrepriseRead
     *
     * @return  self
     */ 
    public function setEntrepriseRead($entrepriseRead)
    {
        $this->entrepriseRead = $entrepriseRead;

        return $this;
    }
    /**
     * Get the value of userId
     */ 
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * Set the value of userId
     *
     * @return  self
     */ 
    public function setUserId($userId)
    {
        $this->userId = $userId;

        return $this;
    }

     /**
     * Get the value of amortissementWrite
     */ 
    public function getAmortissementWrite()
    {
        return $this->amortissementWrite;
    }

    /**
     * Set the value of amortissementWrite
     *
     * @return  self
     */ 
    public function setAmortissementWrite($amortissementWrite)
    {
        $this->amortissementWrite = $amortissementWrite;

        return $this;
    }

    /**
     * Get the value of amortissementRead
     */ 
    public function getAmortissementRead()
    {
        return $this->amortissementRead;
    }

    /**
     * Set the value of amortissementRead
     *
     * @return  self
     */ 
    public function setAmortissementRead($amortissementRead)
    {
        $this->amortissementRead = $amortissementRead;

        return $this;
    }
    /**
     * Get the value of personnelWrite
     */ 
    public function getPersonnelWrite()
    {
        return $this->personnelWrite;
    }

    /**
     * Set the value of personnelWrite
     *
     * @return  self
     */ 
    public function setPersonnelWrite($personnelWrite)
    {
        $this->personnelWrite = $personnelWrite;

        return $this;
    }
     /**
     * Get the value of personnelRead
     */ 
    public function getPersonnelRead()
    {
        return $this->personnelRead;
    }

    /**
     * Set the value of personnelRead
     *
     * @return  self
     */ 
    public function setPersonnelRead($personnelRead)
    {
        $this->personnelRead = $personnelRead;

        return $this;
    }
    /**
     * Get the value of budgetWrite
     */ 
    public function getBudgetWrite()
    {
        return $this->budgetWrite;
    }

    /**
     * Set the value of budgetWrite
     *
     * @return  self
     */ 
    public function setBudgetWrite($budgetWrite)
    {
        $this->budgetWrite = $budgetWrite;

        return $this;
    }
     /**
     * Get the value of budgetRead
     */ 
    public function getBudgetRead()
    {
        return $this->budgetRead;
    }

    /**
     * Set the value of budgetRead
     *
     * @return  self
     */ 
    public function setBudgetRead($budgetRead)
    {
        $this->budgetRead = $budgetRead;

        return $this;
    }
     /**
     * Get the value of comptaWrite
     */ 
    public function getComptaWrite()
    {
        return $this->comptaWrite;
    }

    /**
     * Set the value of comptaWrite
     *
     * @return  self
     */ 
    public function setComptaWrite($comptaWrite)
    {
        $this->comptaWrite = $comptaWrite;

        return $this;
    }
       /**
     * Get the value of comptaRead
     */ 
    public function getComptaRead()
    {
        return $this->comptaRead;
    }

    /**
     * Set the value of comptaRead
     *
     * @return  self
     */ 
    public function setComptaRead($comptaRead)
    {
        $this->comptaRead = $comptaRead;

        return $this;
    }
     /**
     * Get the value of adminWrite
     */ 
    public function getAdminWrite()
    {
        return $this->adminWrite;
    }

    /**
     * Set the value of adminWrite
     *
     * @return  self
     */ 
    public function setAdminWrite($adminWrite)
    {
        $this->adminWrite = $adminWrite;

        return $this;
    }
     /**
     * Get the value of adminRead
     */ 
    public function getAdminRead()
    {
        return $this->adminRead;
    }

    /**
     * Set the value of adminRead
     *
     * @return  self
     */ 
    public function setAdminRead($adminRead)
    {
        $this->adminRead = $adminRead;

        return $this;
    }
    /**
     * Get the value of idUserPermission
     */ 
    public function getIdUserPermission()
    {
        return $this->idUserPermission;
    }

    /**
     * Set the value of idUserPermission
     *
     * @return  self
     */ 
    public function setIdUserPermission($idUserPermission)
    {
        $this->idUserPermission = $idUserPermission;

        return $this;
    }


    /**
     * Get the value of manageAdmin
     */ 
    public function getManageAdmin()
    {
        return $this->manageAdmin;
    }

    /**
     * Set the value of manageAdmin
     *
     * @return  self
     */ 
    public function setManageAdmin($manageAdmin)
    {
        $this->manageAdmin = $manageAdmin;

        return $this;
    }
}