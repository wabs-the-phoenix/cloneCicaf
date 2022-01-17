<?php
use App\Model\User;
use App\Model\Token;
use App\Model\UserPermission;

$page = "Budget";
$token="";
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
$bien = null;
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
<link rel="stylesheet" href="assets/css/dataTable.semanticui.min.css">
<link rel="stylesheet" href="assets/css/semantic/semantic.min.css">
<link rel="stylesheet" href="assets/css/comptaMenu.css">
<link rel="stylesheet" href="assets/css/exercices.css">';
$UpdateProfil = '/Update?role=admin';
$js = [];
$js[] = "jquery-3.6.0.js";
$js[] = "dataTables.min.js";
$js[] = "dataTables.semanticui.min.js";
$js[] = "semantic/semantic.min.js";
$js[] = "bootstrap-datepicker.min.js";
$js[] = "BudgetMenu.js";
for ($i=0 ; $i < count($js) ; $i++ ) {
    if($js[$i] == "semantic/semantic.min.js" ) {
        $js[$i] = '<script src="assets/css/'.$js[$i].'"></script>';
        continue;
    }
    $js[$i] = '<script src="assets/js/'.$js[$i].'"></script>';
}

require "View/Budget/Home.php";
