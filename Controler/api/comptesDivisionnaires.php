<?php
use App\Model\CompteDivisionnaire;
$res = "";

//creer ue instace de classe 
$cd = new CompteDivisionnaire();
if(isset($_GET) && count($_GET) > 0 && count($_POST) < 1) {
    if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] === "delete") {
        try {
            $idTRM = htmlentities(trim($_GET["id"]));
            $cd->Supprimer($idTRM);
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
            "message" => "1 élément supprimé",
            "datas" => $_GET["id"]
        ];
        echo json_encode($response);
        die();
    }
    if(count($_GET) == 1 && $_GET['id']) {
        $id = htmlentities(trim($_GET['id']));
        $singleCD;
        try {
            $singleCD = $cd->find($id);

        } catch (\Throwable $th) {
            $response = [
             "type" => "error",
             "message" => "Impossible de récuperer la classe",
             "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        $response = [
            "type" => "success",
            "message" => "Okay",
            "datas" => $singleCD
        ];
        echo  json_encode($response);
        die();
    }
    $keys = array_keys($_GET);
    $criteres = [];
    for ($i=0; $i < count($keys) ; $i++) {
        $key = $keys[$i];
         $criteres[$key] = htmlentities(trim($_GET[$key]));
     }
   
     try {
         //charger toutes les classes
         $all = $cd->findBy($criteres);
     } catch (\Throwable $th) {
         //dans le cas d'une erreur renvoyer un ojet sous format json
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
         "message" => "Okay",
         "datas" => $all
     ];
     echo  json_encode($response);
     die();
 }
elseif(isset($_POST) && count($_POST) > 0) {
    if(isset($_GET['id'])) {
        $id = htmlentities(trim($_GET['id']));
        $keys = array_keys($_POST);
        $champs = [];
        for ($i=0; $i < count($keys) ; $i++) { 
            $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
        }
        try {
            $cd->update($id, $champs);
        } catch (\Throwable $th) {
            $response = [
            "type" => "error",
            "message" => "Problème interne du serveur",
            "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        $cdUpdated;
        try {
            $cdUpdated = $cd->find($id);

        } catch (\Throwable $th) {
            $response = [
             "type" => "error",
             "message" => "Impossible de récuperer la classe",
             "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        $response = [
            "type" => "success",
            "message" => "La classe a été modifiée avec succès",
            "datas" => $cdUpdated
            ];
            echo  json_encode($response);
            die();
    }
    $keys = array_keys($_POST);
    $champs = [];
    for ($i=0; $i < count($keys) ; $i++) { 
        $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
    }
    try {
        $cd->Create($champs);
    } catch (\Throwable $th) {
        $response = [
            "type" => "error",
            "message" => "Problème interne du serveur",
            "datas" => $th
        ];
        echo json_encode($response);
        die();
    }
    $newSC;
    try {
        $lastId = $cd->findLast();
        $newSC = $cd->find($lastId->id);
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
        "message" => "1 compte divisionnaire a été ajouté avec succès ",
        "datas" => $newSC
    ];
    echo json_encode($response);
    die();
}
 else {
     $all;
     try {
         $all =  $cd->findAll();
         
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
         "message" => "Okay",
         "datas" => $all
     ];
     echo  json_encode($response);
     die();
 }