<?php
use App\Model\User;
use App\Model\Entreprise;
use App\Model\PlanComptable;
use App\Model\CompteAnalytique;
use App\Model\Token;
use App\Model\UserPermission;

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
if($userPerm->getEntrepriseRead() != "1") {
    header('Location: /');
    die();
}
$entites = [];
$entreprise = new Entreprise();
$entrepriseAdmin = $entreprise->find($userStd->entrepriseId);
if($entrepriseAdmin !== null) {
    if($entrepriseAdmin->entitede == null) {
        if ($entrepriseAdmin->status == "0") {
            die();
        }
    }
    else {
        $entrepriseMere = $entreprise->find($entrepriseAdmin->entitede);
        if($entrepriseMere->status == "0") {
            die();
        }
    }
    

}

$codeAnal = new CompteAnalytique();
$codes = $codeAnal->findAll();
$specificStyle = '
<link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="assets/css/chosen.min.css" />
<link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
<link rel="stylesheet" href="assets/css/bootstrap-select-country.min.css" />
<link rel="stylesheet" href="assets/css/jquery.dataTables.min.css" />
<link rel="stylesheet" href="assets/css/superStyle.css">
<link rel="stylesheet" href="assets/css/autocompleJs.css">';

$specifiqueLibJs='        		
        <script src="assets/js/jquery-ui.custom.min.js"></script>
		<script src="assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>
		<script src="assets/js/spinbox.min.js"></script>
		<script src="assets/js/bootstrap-datepicker.min.js"></script>
		<script src="assets/js/bootstrap-timepicker.min.js"></script>
		<script src="assets/js/moment.min.js"></script>
		<script src="assets/js/autosize.min.js"></script>
		<script src="assets/js/jquery.inputlimiter.min.js"></script>
		<script src="assets/js/jquery.maskedinput.min.js"></script>
		<script src="assets/js/bootstrap-tag.min.js"></script>
        <script src="assets/js/jquery.dataTables.min.js"></script>
        <script src="assets/js/jquery.dataTables.bootstrap.min.js"></script>
        <script src="assets/js/pop.min.js"></script>
        <script src="assets/js/highcharts.js"></script>
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>';

        $specificScript='
        <script src="assets/js/src/dataFunctions.js"></script>
        <script src="assets/js/src/aceScript.js"></script>
        <script src="assets/js/src/codeAnal.js"></script>';
require "View/Comptabilite/codeAnalytique.php";