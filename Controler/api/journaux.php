<?php
use App\Model\CategorieJournaux;
$res = "";
$journal = new CategorieJournaux();
if(isset($_GET) && count($_GET) > 0 && !isset($_GET['action'])) {
    
    $keys = array_keys($_GET);
    $criteres = [];
    for ($i=0; $i < count($keys) ; $i++) {
        $key = $keys[$i];
         $criteres[$key] = htmlentities(trim($_GET[$key]));
     }
     try {
         $all = $journal->findBy($criteres);
     } catch (\Throwable $th) {
         $response = [
             "type" => "error",
             "message" => "Problème interne du serveur",
             "datas" => $th
         ];
         echo json_encode($response);
     }
     for ($i=0; $i < count($all); $i++) { 
        $data = $all[$i];
        $data->NomJournal = html_entity_decode($data->NomJournal);
    }
     $response = [
         "type" => "success",
         "message" => "Okay",
         "datas" => $all
     ];
     echo  json_encode($response);
 }
elseif($_POST && count($_POST) > 0  && !isset($_GET['action']) ) {
    $keys = array_keys($_POST);
    $champs = [];
    for ($i=0; $i < count($keys) ; $i++) { 
        $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
    }
    try {
        $journal->Create($champs);
    } catch (\Throwable $th) {
        $response = [
            "type" => "error",
            "message" => "Problème interne du serveur",
            "datas" => $th
        ];
        echo json_encode($response);
        die();
    }
    try {
        $last = $journal->findLast();
        $lastEl = $journal->find($last->id);
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
        "message" => "Journal ajouté avec succès",
        "datas" => $lastEl
    ];
    echo json_encode($response);
    die();
}
elseif(isset($_GET['action'])) {
    $action = htmlentities(trim($_GET['action']));
    if ($action == 'delete') {
       if (is_array($_GET['Ids'])) {
            $ids = $_GET['Ids'];
            for ($i=0; $i < count($ids); $i++) { 
                $ids[$i] = htmlentities(trim($ids[$i]));
                $id = $ids[$i];
                try {
                    $journal->Supprimer($id);
                } catch (\Throwable $th) {
                    $response = [
                        "type" => "error",
                        "message" => "Proleme interne du serveur",
                        "datas" => $th
                    ];
                    echo json_encode($response);
                    die();
                }
                
            }
            $response;
             
            $response = [
            "type" => "success",
            "message" => "La suppression a réussie",
            "datas" => $ids
            ];
            echo json_encode($response);
            die();

       }
       else {
        $response = [
            "type" => "error",
            "message" => "Parametres incorrectes",
            "datas" => $th
        ];
        echo json_encode($response);
        die();
       }
    }
    elseif ($action == 'update') {
        if (isset($_GET['id'])) {
            $id = htmlentities(trim($_GET['id']));
            if (isset($_POST)) {
                $keys = array_keys($_POST);
                $champs = [];
                for ($i=0; $i < count($keys) ; $i++) { 
                    $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
                }
                try {
                    $journal->update($id, $champs);
                } catch (\Throwable $th) {
                    $response = [
                        "type" => "error",
                        "message" => "Problème interne du serveur",
                        "datas" => $th
                    ];
                    echo json_encode($response);
                    die();
                }
                //a proteger
                $last = $journal->find($id);
                $response = [
                    "type" => "success",
                    "message" => "Journal modifié avec succès",
                    "datas" => $last
                ];
                echo json_encode($response);
                die();
            }
        }
    }
}
 else {
     $all;
     try {
         $all =  $journal->findAll();
         
     } catch (\Throwable $th) {
         $response = [
             "type" => "error",
             "message" => "Problème interne du serveur",
             "datas" => $th
         ];
         echo json_encode($response);
     }
     for ($i=0; $i < count($all); $i++) { 
        $data = $all[$i];
        $data->NomJournal = html_entity_decode($data->NomJournal);
    }
     $response = [
         "type" => "success",
         "message" => "Okay",
         "datas" => $all
     ];
     echo  json_encode($response);
 }