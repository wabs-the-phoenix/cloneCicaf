<?php
use App\Model\User;
use App\Model\EnteteMouv;
use App\Model\CorpMouv;
use App\Model\UserJournal;
use App\Model\CategorieJournaux;
use App\Model\CompteAnalytique;
use App\Model\Token;
use App\Model\UserPermission;

$page = "Administration Home";
$token = $_SESSION['user'];
$result = Token::verifyToken($token);
$userId = $result["id"];
$_SESSION['user'] = $result['token'];
$user = new User();
$userStd = $user->find($userId);
$user->hydrated($userStd);
/* Mettre l'exercice en fonction de l'annee actuel
ici l'annee est mis en dur

*/
//change this code
$exercice = 2021;
//code to change
$exerciceList = [];
for ($i=2000; $i <= $exercice ; $i++) { 
    $exerciceList[] = $i;
}
$entete = new EnteteMouv();
$allEntetesStd = $entete->findAll();
$corp = new CorpMouv();
$allMouvsStd = $corp->findAll();
$journal = new CategorieJournaux();
$journauxStd;
$journaux = [];
$userPerm = new UserPermission();
$perms = $userPerm->findBy(["userId" => $user->getIdUser()]);
if ($perms !== NULL) {
    if (count($perms) > 0) {
        $userPerm->hydrated($perms[0]);
        if ($userPerm->getComptaRead() == "1") {
            $journauxStd = $journal->findAll();
            foreach ($journauxStd as $key => $value) {
                $jour = new CategorieJournaux();
                $jour->hydrated($value);
                $journaux[] = $jour;
            }
            
        } else {
            # code...
        }
    }
    else {
       //code a executer en cas de manque de permisssion
    }
}
$entetes = [];
if(count($allEntetesStd) > 0) {
    foreach ($allEntetesStd as $key => $value) {
        $et = new EnteteMouv();
        $et->hydrated($value);
        $entetes[] = $et;
    }
}
$ca = new CompteAnalytique();
$codesStd = $ca->findAll();
$codes = [];
foreach ($codesStd as $key => $value) {
    $code = new CompteAnalytique();
    $code->hydrated($value);
    $codes[] = $code;
}

if ($userPerm->getComptaWrite() == "1") {
    require "View/Comptabilite/exercices.php";
}

else {
     //code to execute
}


