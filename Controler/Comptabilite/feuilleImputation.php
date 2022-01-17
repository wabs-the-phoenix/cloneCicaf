<?php
use App\Model\User;
use App\Model\Entreprise;
use App\Model\PlanComptable;

$page = "Feuille d'imputation";
$js = [];
$js[] = "jquery-3.6.0.js";
$js[] = "moment.js";
$js[] = "anime-master/lib/anime.min.js";
$js[] = "comptes.js";

for ($i=0 ; $i < count($js) ; $i++ ) {
    $js[$i] = '<script src="assets/js/'.$js[$i].'"></script>';
}
$stylePerso = '<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/fontawesome.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/brands.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/regular.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/solid.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/svg-with-js.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/v4-shims.min.css">
<link rel="stylesheet" href="assets/css/adminHome.css">
<link rel="stylesheet" href="assets/css/comptaMenu.css">
<link rel="stylesheet" href="assets/css/adminHome.css">
<link rel="stylesheet" href="assets/css/comptes.css">';

require "View/Comptabilite/feuilleImputation.php";