<?php

namespace App\Model;

class UserJournal extends Model
{
    protected $idUserJournal;
    protected $user_id;
    protected $journal_id;
    protected $table;

    public function __construct()
    {
        $this->table = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
    }

    //obtenir l'id du journal
    public function getJournalId () {
        return $this->journal_id;
    }
    
}