<?php
use App\Model\CategorieJournaux;
use App\Model\User;

if(isset($_GET['id'])) {
    if($_GET['id'] != null) {
        $id = strip_tags(trim($_GET['id']));
        
    }
}