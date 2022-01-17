<?php
use App\Model\ComptePrincipal;
$res = "";
//creer ue instace de classe 
$cp = new ComptePrincipal();
if(isset($_GET) && count($_GET) > 0 && count($_POST) == 0) {
    if(isset($_GET["id"])) {
        if (isset($_GET["action"])) {
            $id = htmlentities(trim($_GET["id"]));
            if($_GET["action"] == "delete") {
                try {
                    $cp->Supprimer($id);
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
                    "message" => "Compte principal supprimé avec succès",
                    "datas" => $id
                ];
                echo  json_encode($response);
                die();
            }
            die();
        }
        $id = htmlentities(trim($_GET["id"]));
        $cpFind;
        try {
            $cpFind = $cp->find($id);
        } catch (\Throwable $th) {
            $response = [
                "type" => "error",
                "message" => "Impossible de recuperer l'element demamde",
                "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        if($cpFind == false) {
            $response = [
                "type" => "error",
                "message" => "Impossible de recuperer l'element demamde",
                "datas" => []
            ];
            echo json_encode($response);
            die();
        }
        $response = [
            "type" => "success",
            "message" => "Utilisateur récuperer avec succès",
            "datas" => $cpFind
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
         $all = $cp->findBy($criteres);
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
elseif($_POST && count($_POST) > 0) {
    if(isset($_GET["id"])) {
        $id = htmlentities(trim($_GET["id"]));
        $cpFind;
        try {
            $cpFind = $cp->find($id);
        } catch (\Throwable $th) {
            $response = [
                "type" => "error",
                "message" => "Problème interne du serveur",
                "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        if($cpFind == false) {
            $response = [
                "type" => "error",
                "message" => "Compte principal inexistant",
                "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        $keys = array_keys($_POST);
        $champs = [];
        for ($i=0; $i < count($keys) ; $i++) { 
            $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
        }
        try {
            $cp->update($id, $champs);
        } catch (\Throwable $th) {
            $response = [
                "type" => "error",
                "message" => "Problème interne du serveur",
                "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        $cpUpdated;
        try {
            $cpUpdated = $cp->find($id);
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
            "message" => "1 compte principal a été mis à jour avec succès ",
            "datas" => $cpUpdated
        ];
        echo json_encode($response);
        die();
    }
    $keys = array_keys($_POST);
    $champs = [];
    for ($i=0; $i < count($keys) ; $i++) { 
        $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
    }
    try {
        $cp->Create($champs);
    } catch (\Throwable $th) {
        $response = [
            "type" => "error",
            "message" => "Problème interne du serveur",
            "datas" => $th
        ];
        echo json_encode($response);
        die();
    }
    $newComptePrinci;
    try {
        $lastId = $cp->findLast();
        $newComptePrinci = $cp->find($lastId->id);
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
        "message" => "1 compte principal a été ajouté avec succès ",
        "datas" => $newComptePrinci
    ];
    echo json_encode($response);
    die();
}
 else {
     $all;
     try {
         $all =  $cp->findAll();
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