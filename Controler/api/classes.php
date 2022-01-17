<?php
use App\Model\Classe;
$res = "";
//creer ue instace de classe 
$classe = new Classe();
if(isset($_GET) && count($_GET) > 0 && count($_POST) < 1) {
    if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] === "delete") {
        try {
            $idTRM = htmlentities(trim($_GET["id"]));
            $classe->Supprimer($idTRM);
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
        $singleClass;
        try {
            $singleClass = $classe->find($id);

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
            "datas" => $singleClass
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
         $all = $classe->findBy($criteres);
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
            $classe->update($id, $champs);
        } catch (\Throwable $th) {
            $response = [
            "type" => "error",
            "message" => "Problème interne du serveur",
            "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        $classeUpdated;
        try {
            $classeUpdated = $classe->find($id);

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
            "datas" => $classeUpdated
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
        $classe->Create($champs);
    } catch (\Throwable $th) {
        $response = [
            "type" => "error",
            "message" => "Problème interne du serveur",
            "datas" => $th
        ];
        echo json_encode($response);
        die();
    }
    $newwClassesArray ;
    try {
        $newwClassesArray = $classe->findAll();
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
        "message" => "Classe ajoutée avec succès",
        "datas" => $newwClassesArray
    ];
    echo json_encode($response);
}
 else {
     $all;
     try {
         $all =  $classe->findAll();
         
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