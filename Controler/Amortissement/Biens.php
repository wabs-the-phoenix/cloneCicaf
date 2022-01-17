<?php
use App\Model\User;
use App\Model\RenseignementImmo;

$_SESSION['idBien'] = isset($_COOKIE['idBien'])?strip_tags($_COOKIE['idBien']):null;
$entrepriseActuelID = $_SESSION['idBien'] !== null?$_SESSION['idBien']:null;
$Biens = [];
$bien = new RenseignementImmo;
$BiensStd = $bien->findAll();
if($BiensStd !== null && count($BiensStd) !== 0 ) {
        
    foreach ($BiensStd as $key => $value) {
        $element = new RenseignementImmo;
        $element->hydrated($value);
        $Biens[] = $element;
    }
}
if($entrepriseActuelID === null) {
   
    $entrepriseActuelStd = $bien->findBy(['idRenseignementImmo'=>$entrepriseActuelID]);
    $bien->hydrated($entrepriseActuelStd);
}
else {
    
}

if (isset($_POST['ajout'])) {
    extract($_POST);
    $designation=htmlentities(trim($designation));
    $valeurbrute=htmlentities(trim($valeurbrute));
    $taux=htmlentities(trim($taux));
    $codeImmo=htmlentities(trim($codeImmo));
    $date=htmlentities(trim($date));
    $QteInitiale=htmlentities(trim($QteInitiale));
    $QteInventaire=htmlentities(trim($QteInventaire));
    $Affectation=htmlentities(trim($Affectation));
    $dure=htmlentities(trim($Dure));
    $compte14106=htmlentities(trim($compte14106));
    $compte24=htmlentities(trim($compte24));
    $compte28=htmlentities(trim($compte28));
    $compte68=htmlentities(trim($compte68));
    if($designation && $valeurbrute && $taux && $date  && $QteInitiale  && $QteInventaire && $Affectation && $dure  && $compte14106 && $compte24 && $compte28 && $compte68 && $codeImmo){
        if(($dure)>0){
            $tauxAmortissement=1/$dure;
        }else $tauxAmortissement=1;
        $data=[
            "CodeImmo"=>$codeImmo,
            "DesignationImmo" =>$designation,
            "DateAcquisition" =>$date,                    
            "TauxAmortissement" =>$tauxAmortissement,
            "DureeImmo" =>$dure,
            "ValeurBrute" =>$valeurbrute,
            "LieuAffectation" =>$Affectation,
            "TauxChangeIitial" =>$taux,
            "EcartDeReev_14_106" =>$compte14106,
            "QteInitiale" =>$QteInitiale,
            "QteInvantaire" =>$QteInventaire,
            "Compte24" =>$compte24,
            "Compte28" =>$compte28,
            "Compte68" =>$compte68
        ];
        $Rens->hydrated($data);
        if($Rens->Create()){
            $success="Le bien a été créé avec succès";

        }else {
            $error=" Un petit problème est survenu dans la création du bien";
        }

    }else $error="Tous les champs sont requis";
}

require "View/Amortissement/Biens.php";