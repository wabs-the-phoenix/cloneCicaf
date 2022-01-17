<?php
use App\Model\Commune;
$res = "";
$commune = new Commune();
if(isset($_GET) && count($_GET) > 0) {
    
   $keys = array_keys($_GET);
   $criteres = [];
   for ($i=0; $i < count($keys) ; $i++) {
       $key = $keys[$i];
        $criteres[$key] = htmlentities(trim($_GET[$key]));
    }
  
    try {
        $all = $commune->findBy($criteres);
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
else {
    $all;
    try {
        $all =  $commune->findAll();
        
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