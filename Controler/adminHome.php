<?php
use App\Model\User;
use App\Model\Token;
use App\Model\UserPermission;

$page = "Administration Home";
$token = $_SESSION['user'];
$userPerm = new UserPermission();
$result = Token::verifyToken($token);
if($result == false || $result == null) {
    header('Location: /');
    die();
}
$userId = $result["id"];
$_SESSION['user'] = $result['token'];
$user = new User();
$userStd = $user->find($userId);
$user->hydrated($userStd);
$userPerm = new UserPermission();
$perms = $userPerm->findBy(["userId" => $userId]);
if ($perms !== NULL) {
    if (count($perms) > 0) {
        $userPerm->hydrated($perms[0]);
    }
    else {
        header('Location: /');
    }
}
if($userPerm->getAdminRead() != "1") {
    header('Location: /');
}
if($userPerm->getAdminWrite() == "1") {
    $admnin = $user;
    $stylePerso = '
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/fontawesome.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/brands.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/regular.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/solid.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/svg-with-js.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/v4-shims.min.css">
    <link rel="stylesheet" href="assets/css/semantic/semantic.min.css">
    <link rel="stylesheet" href="assets/css/adminHome.css">';
    $UpdateProfil = '/Update?role=admin';
    $js = [];
    $js[] = '<script src="assets/js/jquery-3.6.0.js"></script>';
    $js[] = '<script src="assets/js/moment.js"></script>';
    $js[] = '<script src="assets/js/anime-master/lib/anime.min.js"></script>';
    $js[] = '<script src="assets/js/slick.js"></script>';
    $js[] = '<script src="assets/css/semantic/semantic.min.js"></script>';
    $js[] = '<script src="assets/js/adminHome.js"></script>';
    require "View/adminHome.php";
}
else {
    
    header('Location:/');
    die();
}