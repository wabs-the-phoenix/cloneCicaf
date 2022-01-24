<?php
use App\Model\User;
use App\Model\UserPermission;
$res = "";
$user = new User();
$userPerm = new UserPermission();

$cd = new User();
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
    if(count($_GET) == 1 && isset($_GET['id'])) {
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
    if (isset($_GET["Ids"])) {
        $ids = $_GET["Ids"];
        for ($i=0; $i < count($ids) ; $i++) { 
           $ids[$i] = htmlentities(trim($ids[$i]));
        }
        $users = [];
        try {
            foreach ($ids as $key => $value) {
                $users[] = $user->find($value);
            }
        } catch (\Throwable $th) {
            $response = [
                "type" => "error",
                "message" => "Problème interne du serveur",
                "datas" => []
            ];
            echo json_encode($response);
            die();
        }
        $userDatas = [];
        foreach ($users as $key => $value) {
            $util = [
                "idUser" => $value->idUser,
                "nom" => $value->nom,
                "specialCode" => $value->specialCode
            ];
            $userDatas[] = $util;
            $response = [
                "type" => "success",
                "message" => "Okay",
                "datas" => $userDatas
            ];
            echo json_encode($response);
            die();
        }
    
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
             "message" => "Probleme du serveur",
             "datas" => $_GET
         ];
         echo json_encode($response);
         die();
     }
     $response = [
         "type" => "success",
         "message" => "critres",
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
            if ($keys[$i] == "mpd") {
                $champs[$keys[$i]] = sha1(htmlentities(trim($_POST[$keys[$i]])));
                continue;
            }
            $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
        }
        try {
            $cd->update($id, $champs);
        } catch (\Throwable $th) {
            $response = [
            "type" => "error",
            "message" => "Mis a jour impossible",
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
             "message" => "Impossible l'utilisateur",
             "datas" => $th
            ];
            echo json_encode($response);
            die();
        }
        $response = [
            "type" => "success",
            "message" => "L'utilisateur a été modifié avec succès",
            "datas" => $cdUpdated
            ];
            echo  json_encode($response);
            die();
    }
    $keys = array_keys($_POST);
    $champs = [];
    for ($i=0; $i < count($keys) ; $i++) { 
        if ($keys[$i] == "mpd") {
            $champs[$keys[$i]] = sha1(htmlentities(trim($_POST[$keys[$i]])));
            continue;
        }
        $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
    }
    try {
        $cd->Create($champs);
        $lastuserId = $cd->findLast();
        $lastUser = $cd->find($lastuserId->id);
        switch ($lastUser->role) {
            case 'admin':
                $modelUserPerm = [
                    "adminRead" => 1,
                    "adminWrite" => 1,
                    "comptaRead" => 1,
                    "comptaWrite" => 1,
                    "budgetRead" => 1,
                    "budgetWrite" => 1,
                    "personnelRead"=> 1,
                    "personnelWrite" => 1,
                    "amortissementRead" => 1,
                    "amortissementWrite" => 1,
                    "entrepriseRead" => 1,
                    "entrepriseWrite" => 1,
                    "userId" => $lastuserId->id
                ];
                break;
            
            default:
                # code...
                break;
        }
        
        $userPerm->Create($modelUserPerm);

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
        "message" => "1 Utilisateur a été ajouté avec succès ",
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