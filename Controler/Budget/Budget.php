<?php

use App\Model\Budget;
use App\Model\CodeProjet;
use App\Model\CompteAnalityque;
use App\Model\ExerciceComptable;

$page = "Etablir-Budget";
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
$projet=new CodeProjet;
$code=new CompteAnalityque;
$budget=new Budget;
$exercice=new ExerciceComptable;
$DescProjet= $projet->find($_GET['idProjet']);
if (isset($_POST['ajout'])) 
{
extract($_POST);
$exercices=htmlentities(trim($exercices));
$datOuverture=htmlentities(trim($datOuverture));
$dateFin=htmlentities(trim($dateFin));
$codeAnalytique=htmlentities(trim($codeAnalytique));
$Devise=htmlentities(trim($Devise));
if ($exercices && $datOuverture && $dateFin && $codeAnalytique && $Devise) {
    //On combine les données pour les transformer en clé valeur

    $dataCombine=array_combine($mois, $montant);
    
    //Transformation en données json
    $planningDatas=json_encode($dataCombine);            

    $dataBudget=[
        "ExerciceBudget"=>$exercices,
        "DateOuverture"=>$datOuverture,
        "DateCloture"=>$dateFin,
        "TotalPlaning"=>array_sum($montant),
        "CodeProjetId"=>$_GET['idProjet'],
        "EntrepriseId"=>"",
        "CompteAnalityqueId"=>$codeAnalytique,
        "Datas"=>$planningDatas,
        "PlanComptableId"=>"",
        "userId"=> ""        
    ];
    //On fait l'hydratation
    $budget->hydrated($dataBudget);
    if($budget->Create()){
        $success="Un Nouveau budget a été enregistré";
    }
        
                       
        
    }else{
        $error="Un petit problème est survenu dans l'enregistrement";
        
    }
   
}else {
    $error="Tous les chmaps sont requis";
    
}


require "View/Budget/Budget.php";