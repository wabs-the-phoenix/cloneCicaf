<?php
use App\Model\UserJournal;
$res = "";
$userJournal = new UserJournal();
if(isset($_GET) && count($_GET) > 0) {
    
    $keys = array_keys($_GET);
    $criteres = [];
    for ($i=0; $i < count($keys) ; $i++) {
        $key = $keys[$i];
         $criteres[$key] = htmlentities(trim($_GET[$key]));
     }
   
     try {
         $all = $userJournal->findBy($criteres);
     } catch (\Throwable $th) {
         $response = [
             "type" => "error",
             "message" => "Problème interne du serveur",
             "datas" => $th
         ];
         echo json_encode($response);
     }
     $response = [
         "type" => "success",
         "message" => "Okay",
         "datas" => $all
     ];
     echo  json_encode($response);
 }
elseif($_POST && count($_POST) > 0) {
    $keys = array_keys($_POST);
    $champs = [];
    for ($i=0; $i < count($keys) ; $i++) { 
        $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
    }
    try {
        $userJournal->Create($champs);
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
        "datas" => []
    ];
    echo json_encode($response);
}
 else {
     $all;
     try {
         $all =  $userJournal->findAll();
         
     } catch (\Throwable $th) {
         $response = [
             "type" => "error",
             "message" => "Problème interne du serveur",
             "datas" => $th
         ];
         echo json_encode($response);
     }
     $response = [
         "type" => "success",
         "message" => "Okay",
         "datas" => $all
     ];
     echo  json_encode($response);
 }