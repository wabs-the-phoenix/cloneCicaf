<?php
use App\Model\PlanComptable;
$res = "";
$pc = new PlanComptable();
if(isset($_GET) && count($_GET) > 0 && !isset($_GET['action'])) {
    
    $keys = array_keys($_GET);
    $criteres = [];
    for ($i=0; $i < count($keys) ; $i++) {
        $key = $keys[$i];
         $criteres[$key] = htmlentities(trim($_GET[$key]));
     }
   
     try {
         $all = $pc->findBy($criteres);
     } catch (\Throwable $th) {
         $response = [
             "type" => "error",
             "message" => "Problème interne du serveur",
             "datas" => $th
         ];
         echo json_encode($response);
     }
     for ($i=0; $i < count($all); $i++) { 
        $element = $all[$i];
        $element->DesiOperation = html_entity_decode( $element->DesiOperation);
        $element->DesiClassel = html_entity_decode( $element->DesiClassel);
        $element->DesiComptePrinci = html_entity_decode( $element->DesiComptePrinci);
        $element->DesiSousCompte = html_entity_decode( $element->DesiSousCompte);
        $element->DesiFamille = html_entity_decode( $element->DesiFamille);
        $element->DesiDivision = html_entity_decode( $element->DesiDivision);
     }
     $response = [
         "type" => "success",
         "message" => "Okay",
         "datas" => $all
     ];
     echo  json_encode($response);
 }
elseif (isset($_GET['action'])) {
   if (isset($_GET['id']) && $_GET['action'] == "delete") {
       $id = htmlentities($_GET['id']);
       $id = trim($id);
        try {
            $pc->Supprimer($id);
        } catch (\Throwable $th) {
            $response = [
                "type" => "error",
                "message" => "Problème à la création",
                "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        $response = [
            "type" => "success",
            "message" => "Plan comptable supprimer avec succès",
            "datas" => $id
        ];
        echo json_encode($response);
        die();
   }
}
elseif($_POST && count($_POST) > 0) {
    $keys = array_keys($_POST);
    $champs = [];
    for ($i=0; $i < count($keys) ; $i++) { 
        $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
    }
    try {
        $pc->Create($champs);
    } catch (\Throwable $th) {
        $response = [
            "type" => "error",
            "message" => "Problème à la création",
            "datas" => $th
        ];
        echo json_encode($response);
        die();
    }
    $last;
    try {
        $last = $pc->findLast();
    } catch (\Throwable $th) {
        $response = [
            "type" => "error",
            "message" => "Problème interne du serveur",
            "datas" => $th
        ];
        echo json_encode($response);
        die();
    }
    $lastEl;
    try {
        $lastEl = $pc->find($last->id);
    } catch (\Throwable $th) {
        $response = [
            "type" => "error",
            "message" => "Problème interne du serveur",
            "datas" => $th
        ];
        echo json_encode($response);
        die();
    }
    $response = [
        "type" => "success",
        "message" => "Utilisateurs ajoutée avec succès",
        "datas" => $lastEl
    ];
    echo json_encode($response);
}
 else {
     $all;
     try {
         $all =  $pc->findAll();
     } catch (\Throwable $th) {
         $response = [
             "type" => "error",
             "message" => "Problème interne du serveur",
             "datas" => $th
         ];
         echo json_encode($response);
         die();
     }
     for ($i=0; $i < count($all); $i++) { 
        $element = $all[$i];
        $element->DesiOperation = html_entity_decode( $element->DesiOperation);
        $element->DesiClassel = html_entity_decode( $element->DesiClassel);
        $element->DesiComptePrinci = html_entity_decode( $element->DesiComptePrinci);
        $element->DesiSousCompte = html_entity_decode( $element->DesiSousCompte);
        $element->DesiFamille = html_entity_decode( $element->DesiFamille);
        $element->DesiDivision = html_entity_decode( $element->DesiDivision);
     }
     $response = [
         "type" => "success",
         "message" => "Okay",
         "datas" => $all
     ];
    if (json_encode($response !== false)) {
        echo json_encode($response);
    }
    else
        echo json_encode([]);
 }