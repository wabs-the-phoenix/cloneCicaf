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
    $specificStyle = '
        <link rel="stylesheet" href="assets/css/jquery-ui.custom.min.css" />
        <link rel="stylesheet" href="assets/css/chosen.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-datepicker3.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-timepicker.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-datetimepicker.min.css" />
        <link rel="stylesheet" href="assets/css/bootstrap-select-country.min.css" />
        <link rel="stylesheet" href="assets/css/jquery.dataTables.min.css" />
        <link rel="stylesheet" href="assets/css/semantic/semantic.min.css" />
        <link rel="stylesheet" href="assets/css/superStyle.css">
        <link rel="stylesheet" href="assets/css/autocompleJs.css">
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
        <link rel="stylesheet" href="assets/css/exercices.css">';
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
        <script src="assets/js/jquery-ui-1.9.2.custom.min.js"></script>
        <script src="assets/js/autoComplete.js"></script>';

        $specificScript='
        <script src="assets/js/src/dataFunctions.js"></script>
        <script src="assets/js/src/aceScript.js"></script>
        <script src="assets/css/semantic/semantic.min.js/aceScript.js"></script>
        <script src="assets/js/src/exercice.js"></script>';
        
}

else {
     //code to execute
}


