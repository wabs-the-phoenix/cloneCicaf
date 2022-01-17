<?php
use App\Model\User;
use App\Model\Entreprise;

require 'functions/userHandler.php';
$criteres = $_SESSION['user'];
$user = new User();
$userList = $user->findBy($criteres);

$entreprise = new Entreprise();
if($userList === null || count($userList) === 0) {
    header('Location: /');
}
/*chargement des javascript*/
$js = [];
$js[] = "jquery-3.6.0.js";
$js[] = "moment.js";
$js[] = "admin.js";

for ($i=0 ; $i < count($js) ; $i++ ) {
    $js[$i] = '<script src="assets/js/'.$js[$i].'"></script>';
}


/*lien concret*/
$page = "Update admin data";
$datas = $userList[0];

$user->hydrated($datas);
$users = $user->findAll();


$stylePerso = '
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/fontawesome.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/brands.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/regular.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/solid.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/svg-with-js.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/v4-shims.min.css">
<link rel="stylesheet" href="assets/css/adminHome.css">
<link rel="stylesheet" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/slick-theme.css">
<link rel="stylesheet" href="assets/css/adminUpdate.css"><link rel="stylesheet" href="assets/css/userManager.css">';

 /*charger tous les utilisateurs
 --code a changer--
 */
/**** */

 require "View/userManager.php";
