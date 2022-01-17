<?php

use App\Model\Agent;
use App\Model\Budget;
use App\Model\Depart;
use App\Model\Commune;
use App\Model\Service;
use App\Model\Fonction;
use App\Model\Entreprise;

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
$agent= new Agent;  
$service=new Service;
$fonction = new Fonction;
$entite=new Entreprise;
$commune=new Commune;
$depart=new Depart;


if (isset($_POST['ajout']) ) 
{
extract($_POST);
$nom=strip_tags(trim($nom));
$postnom=strip_tags(trim($postnom));
$prenom=strip_tags(trim($prenom));
$genre=htmlentities(trim($genre));
$date=htmlentities(trim($date));
$nationalite=htmlentities(trim($nationalite));
$numero=strip_tags(trim($numero));
$avenue=strip_tags(trim($avenue));
$communes=strip_tags(trim($communes));
$phone=htmlentities(trim($phone));
$etacivil=htmlentities(trim($etacivil));
$conjoint=htmlentities(trim($conjoint));
$enfant=htmlentities(trim($enfant));
$embauche=htmlentities(trim($embauche));
$embaucheR=htmlentities(trim($embaucheR));
$services=htmlentities(trim($services));
$fonctions=htmlentities(trim($fonctions));
$cnss=htmlentities(trim($cnss));
$matricule=htmlentities(trim($matricule));
$categorie=htmlentities(trim($categorie));
$tension=htmlentities(trim($tension));
$Btension=htmlentities(trim($Btension));
$bareme=htmlentities(trim($bareme));
$compteB=htmlentities(trim($compteB));
$services=htmlentities(trim($services));
$fonctions=htmlentities(trim($fonctions));
$salaireJ=htmlentities(trim($salaireJ));
$salaireH=htmlentities(trim($salaireH));
$allocation=htmlentities(trim($allocation));
$CoeffHS1=htmlentities(trim($CoeffHS1));
$CoeffHS2=htmlentities(trim($CoeffHS2));
$CoeffJF=htmlentities(trim($CoeffJF));
$Logement=htmlentities(trim($Logement));
$transport=htmlentities(trim($transport));
$inddiv=htmlentities(trim($inddiv));
$tauxCNSS=htmlentities(trim($tauxCNSS));
$tauxImpot=htmlentities(trim($tauxImpot));
$tauxTrpt=htmlentities(trim($tauxTrpt));
$tauxIER=htmlentities(trim($tauxIER));



if ($nom && $postnom && $prenom && $etacivil && $embauche && $embaucheR && $nationalite && $date && $services && $fonctions) 
{
    $searchService=$service->findBy(['Service'=>ucfirst($services)]);
    if($searchService){
        $idService=$searchService[0]->idService;
    }else{
        $service->setService($services);
        if($service->Create()){
            $idService=$service->findLast();
        }
    }

    $data=[
        "NomAgent"=>$nom,
        "PostNomAgent"=>$postnom,
        "Prenom"=>$prenom,
        "SexeAgent"=>$genre,
        "DateEmbauche"=>$embauche,
        "DateEmbaucheRel"=>$embaucheR,
        "EtatCivil"=>$etacivil,
        "NomEpouse"=>$conjoint,
        "NbreEnfant"=>$enfant,
        "Nationalite"=>$nationalite,
        "NumRue"=>$numero,
        "NomRue"=>$avenue,
        "NumTel"=>$phone,
        "communeId"=>$communes,
        "FonctionId"=>$fonctions,
        "ServiceId"=>$idService,
        "NumINSS"=>$cnss,
        "MatriAgent"=>$matricule,
        "Categorie"=>$categorie,
        "BaseTension"=>$Btension,
        "Tension"=>$tension,
        "CompteBancaire"=>$compteB,
        "Bareme"=>$bareme,
        "TauxINSS"=>$tauxCNSS,
        "TauxImpot"=>$tauxImpot,
        "TauxTPJ"=>$tauxTrpt,
        "TauxIER"=>$tauxIER,
        "CoeffHS1"=>$CoeffHS1,
        "CoeffHS2"=>$CoeffHS2,
        "CoeffHF"=>$CoeffJF,
        "Logement"=>$Logement,
        "Transport"=>$transport,
        "DivIndem"=>$inddiv

    ];
    $agent->hydrated($data);
    if ($agent->Create() ) {
        $success="l'opération a réussi";
    }else{
        $error='Un petit problème lors de l\'enregistrement';
    }        
    
}else{
    $error="Tous les champs sont requis";
}

   
}
if (isset($_POST["cause"])) 
{             
    extract($_POST);
    $cause = strip_tags(trim($cause));
    $dateDepart=strip_tags(trim($datedepart));
    $idAgent=strip_tags(trim($idAgentOut));
    $MAXIMUM_FILESIZE = 5 * 1024 * 1024;


    $Directory="./Core/Soubassements/";

    $nomfichier= $_FILES['soubassement']['name'];
    //déplacement du fichier vers le tmp
    $file=$_FILES['soubassement']['tmp_name'];
    $safe_filename = preg_replace( array("/\s+/", "/[^-\.\w]+/"),array("_", ""), trim($nomfichier));
    $rEFileTypes = "/^\.(jpg|jpeg|png|pdf|PDF){1}$/i"; 
    if ($_FILES['soubassement']['size'] <= $MAXIMUM_FILESIZE && preg_match($rEFileTypes, strrchr($safe_filename, '.')))
    {
        $isMove = move_uploaded_file ( $file,$Directory.$safe_filename);
        if($isMove)
        {
            //Introduction dans la base des données
            $data=[
                "dateDepart"=>$dateDepart,
                "cause"=>$cause,
                "soubassement"=>$Directory.$safe_filename,
                "AgentId"=>$idAgent
            ];
            $depart->hydrated($data);
            if ($depart->Create() ) {
                $success="l'opération a réussi";
            }else{
                $error='Un petit problème lors de l\'enregistrement';
            } 
            
        }
    }
}
if (isset($_POST['supprimer'])) 
{
    if($agent->Supprimer($_POST['id']))
    {
        $success="La suppression d'un agent a réussi";
    }else{
        $error="La suppression a échoué";
    }        
}
if (isset($_POST['modifier']) ) 
{
    extract($_POST);
    $nom=strip_tags(trim($nom));
    $postnom=strip_tags(trim($postnom));
    $prenom=strip_tags(trim($prenom));
    $genre=htmlentities(trim($genre));
    $date=htmlentities(trim($date));
    $nationalite=htmlentities(trim($nationalite));
    $numero=strip_tags(trim($numero));
    $avenue=strip_tags(trim($avenue));
    $communes=strip_tags(trim($communes));
    $phone=htmlentities(trim($phone));
    $etacivil=htmlentities(trim($etacivil));
    $conjoint=htmlentities(trim($conjoint));
    $enfant=htmlentities(trim($enfant));
    $embauche=htmlentities(trim($embauche));
    $embaucheR=htmlentities(trim($embaucheR));
    $services=htmlentities(trim($services));
    $fonctions=htmlentities(trim($fonctions));
    $cnss=htmlentities(trim($cnss));
    $matricule=htmlentities(trim($matricule));
    $categorie=htmlentities(trim($categorie));
    $tension=htmlentities(trim($tension));
    $Btension=htmlentities(trim($Btension));
    $bareme=htmlentities(trim($bareme));
    $compteB=htmlentities(trim($compteB));
    $services=htmlentities(trim($services));
    $fonctions=htmlentities(trim($fonctions));
    $salaireJ=htmlentities(trim($salaireJ));
    $salaireH=htmlentities(trim($salaireH));
    $allocation=htmlentities(trim($allocation));
    $CoeffHS1=htmlentities(trim($CoeffHS1));
    $CoeffHS2=htmlentities(trim($CoeffHS2));
    $CoeffJF=htmlentities(trim($CoeffJF));
    $Logement=htmlentities(trim($Logement));
    $transport=htmlentities(trim($transport));
    $inddiv=htmlentities(trim($inddiv));
    $tauxCNSS=htmlentities(trim($tauxCNSS));
    $tauxImpot=htmlentities(trim($tauxImpot));
    $tauxTrpt=htmlentities(trim($tauxTrpt));
    $tauxIER=htmlentities(trim($tauxIER));

        $searchService=$service->findBy(['Service'=>ucfirst($services)]);
        if($searchService){
            $idService=$searchService[0]->idService;
        }else{
            $service->setService($services);
            if($service->Create()){
                $idService=$service->findLast();
            }
        }

        $data=[
            "NomAgent"=>$nom,
            "PostNomAgent"=>$postnom,
            "Prenom"=>$prenom,
            "SexeAgent"=>$genre,
            "DateEmbauche"=>$embauche,
            "DateEmbaucheRel"=>$embaucheR,
            "EtatCivil"=>$etacivil,
            "NomEpouse"=>$conjoint,
            "NbreEnfant"=>$enfant,
            "Nationalite"=>$nationalite,
            "NumRue"=>$numero,
            "NomRue"=>$avenue,
            "NumTel"=>$phone,
            "communeId"=>$communes,
            "FonctionId"=>$fonctions,
            "ServiceId"=>$idService,
            "NumINSS"=>$cnss,
            "MatriAgent"=>$matricule,
            "Categorie"=>$categorie,
            "BaseTension"=>$Btension,
            "Tension"=>$tension,
            "CompteBancaire"=>$compteB,
            "Bareme"=>$bareme,
            "TauxINSS"=>$tauxCNSS,
            "TauxImpot"=>$tauxImpot,
            "TauxTPJ"=>$tauxTrpt,
            "TauxIER"=>$tauxIER,
            "CoeffHS1"=>$CoeffHS1,
            "CoeffHS2"=>$CoeffHS2,
            "CoeffHF"=>$CoeffJF,
            "Logement"=>$Logement,
            "Transport"=>$transport,
            "DivIndem"=>$inddiv

        ];
        $agent->hydrated($data);
        if ($agent->update($_POST['id']) ) {
            $success="l'opération a réussi";
        }else{
            $error='Un petit problème lors de l\'enregistrement';
        }    
   
}



require "View/Personnel/Agents.php";