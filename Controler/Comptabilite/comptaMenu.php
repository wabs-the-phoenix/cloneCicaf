<?php
use App\Model\User;
use App\Model\Token;
use App\Model\UserPermission;

$page = "Comptabilite";
$token;
if(!isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
$token = $_SESSION['user'];
$result = Token::verifyToken($token);
if($result == false || $result == null) {
    header('Location: /');
    die();
}
$userId = $result["id"];
$myEntreprise = null;
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
        header('Location: /');
        die();
    }
}
$_SESSION['user'] = $result['token'];

$stylePerso = '
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/fontawesome.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/brands.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/regular.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/solid.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/svg-with-js.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/v4-shims.min.css">
    <link rel="stylesheet" href="assets/css/adminHome.css">
    <link rel="stylesheet" href="assets/css/semantic/semantic.min.css">
    <link rel="stylesheet" href="assets/css/semantic/dataTable.semantic.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/planComptable.css">
    <link rel="stylesheet" href="assets/css/comptaMenu.css">
    <link rel="stylesheet" href="assets/css/exercices.css">
    ';
$UpdateProfil = '/Update?role=admin';
$js = [];
$js[] = "jquery-3.6.0.js";
$js[] = "moment.js";
$js[] = "anime-master/lib/anime.min.js";
$js[] = "slick.js";
$js[] = "dataTables.min.js";
$js[] = "dataTables.semantic.min.js";
$js[] = "semantic/semantic.min.js";
$js[] = "autoComplete.js";
$js[] = "comptaMenu.js";


for ($i=0 ; $i < count($js) ; $i++ ) {
    if($js[$i] == "semantic/semantic.min.js" ) {
        $js[$i] = '<script src="assets/css/'.$js[$i].'"></script>';
        continue;
    }
    $js[$i] = '<script src="assets/js/'.$js[$i].'"></script>';
}
//on verifie si l'utilisateur a des droits d'ecritures sur la compta et les entreprise
if ($userPerm->getEntrepriseWrite() == "1" && $userPerm->getComptaWrite() == "1" ) {
    require "View/Comptabilite/comptaMenu.php";
} else {
    echo $userPerm->getEntrepriseWrite();
    # code...
    //code a executer si l'utilisateur n'a pas droit a l'ecriture
}


