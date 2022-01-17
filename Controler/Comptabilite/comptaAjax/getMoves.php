<?php
use App\Model\CorpMouv;
use App\Model\EnteteMouv;
use App\Model\planComptable;
use App\Model\Entreprise;
use App\Model\User;
use App\Model\UserJournal;
use App\Model\CategorieJournaux;

/*code a changer*/
//verifier l'utilisateur
/********* */
$moveBody = new CorpMouv();
$movesStd = $moveBody->findAll();
$header = new EnteteMouv();
$headers = $header->findAll();
$moves = [
    "headers"=> $headers,
    "moves" => $movesStd
];

echo json_encode($moves);
