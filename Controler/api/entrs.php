<?php
use App\Model\Entreprise;
$res = "";
$entreprise = new Entreprise();
if(isset($_GET) && count($_GET) > 0 && count($_POST) < 1) {
    if (isset($_GET["action"]) && isset($_GET["id"]) && $_GET["action"] === "delete") {
        try {
            $idTRM = htmlentities(trim($_GET["id"]));
            $entreprise->Supprimer($idTRM);
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
            $singleCD = $entreprise->find($id);

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
         $all = $entreprise->findBy($criteres);
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
            $entreprise->update($id, $champs);
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
            $cdUpdated = $entreprise->find($id);

        } catch (\Throwable $th) {
            $response = [
             "type" => "error",
             "message" => "Impossible l'utilisateur",
             "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        $response = [
            "type" => "success",
            "message" => "Modification reussie",
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
        $entreprise->Create($champs);
    } catch (\Throwable $th) {
        $response = [
            "type" => "error",
            "message" => $th,
            "datas" => $th
        ];
        echo json_encode($response);
        die();
    }
    $newSC;
    try {
        $lastId = $entreprise->findLast();
        $newSC = $entreprise->find($lastId->id);
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
        "message" => "1 Utilisateur a été ajouté avec succès ",
        "datas" => $newSC
    ];
    echo json_encode($response);
    die();
}
 else {
     $all;
     try {
         $all =  $entreprise->findAll();
         
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