<?php
use App\Model\User;
$res = "";
$user = new User();

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
else {
    $users;
    try {
        $users = $user->findAll();
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