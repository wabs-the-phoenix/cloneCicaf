<?php
use App\Model\User;
use App\Model\Entreprise;
use App\Model\PlanComptable;
use App\Model\Classe;
use App\Model\ComptePrincipal;
use App\Model\SousCompte;
use App\Model\CompteDivisionnaire;
use App\Model\CompteFamille;
use App\Model\Token;
use App\Model\UserPermission;

$token;
if(!isset($_SESSION['user'])) {
   //code pour retourner une page d'erreur
   //appeler la page 404
}
$token = $_SESSION['user'];
$result = Token::verifyToken($token);
if($result == false || $result == null) {
    //code a appeler si le token a expire
}
$userId = $result["id"];

$message = null;
$user = new User();
$userStd = $user->find($userId);
$user->hydrated($userStd);

$userPerm = new UserPermission();
$perms = $userPerm->findBy(["userId" => $user->getIdUser()]);
if ($perms !== NULL) {
    if (count($perms) > 0) {
        $userPerm->hydrated($perms[0]);
    }
    else {
        //code erreur
    }
}
$_SESSION['user'] = $result['token'];
//verifier l'entreprise
$myEntreprise = new Entreprise();
$userEntrepriseId = $user->getEntrepriseId();
$myEntrepriseStd = $userEntrepriseId === NULL ? NULL : $myEntreprise->find($userEntrepriseId);
$myEntreprise;
if ($myEntrepriseStd === NULL) {
    $myEntreprise = null;
}
else {
    $myEntreprise->hydrated($myEntrepriseStd);
}


$plan = new PlanComptable();
$plans;
if ($myEntreprise === NULL) {
    $plans = $plan->findAll();
}
else {
    $plans = $plan->findBy(["eniteId" => $user->getEntrepriseId()]);
}
if(count($plans) > 0) {
    $plan->hydrated($plans[0]);
}
if($plan->getLettrage1() == NULL) {
    $plan->setLettrage1($plan->createLettrage());
}

$classe = new Classe();
$classesStd = $classe->findAll();

$comptePrincipal = new ComptePrincipal();
$comptePrincipauxStd = $comptePrincipal->findAll();

$sousCompte = new SousCompte();
$sousComptesStd = $sousCompte->findAll();

$compteDivisio = new CompteDivisionnaire();
$comptesDivisioStd = $compteDivisio->findAll();

$famille = new CompteFamille();
$famillesStd = $famille->findAll();

require "View/Comptabilite/planComptable.php";