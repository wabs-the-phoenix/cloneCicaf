<?php 
    use App\Model\CorpMouv;
    use App\Model\EnteteMouv;

    $entete = new EnteteMouv();
    $entetes = $entete->findAll();
    if(count($entetes) === 0) {
        echo "1";
    }
    else {
        
         echo intval($entetes[0]->idEnteteMouv) + 1;
    }