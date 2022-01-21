<?php
use App\Model\Entreprise;
$res = "";
$entreprise = new Entreprise();

if(isset($_GET['page']) ) {
    $lines;
    
    $page = trim(htmlentities($_GET['page']));
    if (isset($_GET['entitede'])) {
        $mother = trim(htmlentities($_GET['entitede']));
        if ($mother == 'NULL') {
            $lines = $entreprise->countNull(["entitede" => $mother ]);
        }
        elseif ($mother == 'NOT_NULL') {
            $mother = str_replace('_', ' ', $mother);
            $lines = $entreprise->countNull(["entitede" => $mother ]);
        }
        else {
            $lines = $entreprise->countBy(["entitede" => $mother ]);
        }
        
    }
    else {
        $lines = $entreprise->count();
    }
    $lignes = $lines->lignes;
    $start = ($page * 10) - 10;
    $end = ($page * 10);
    $nombreDePage;
    if ($lignes < 10) {
        $nombreDePage = 1;
    }
    else {
        $nombreDePage = intdiv($lignes, 10);
        $modulo = $lignes % 10;
        if ( $modulo > 0) {
            $nombreDePage++;
        }
        
    }
    if ($nombreDePage == $page) {
        $end = $lignes;
    }
    if ($nombreDePage < $page) {
        $end = $lignes;
    }
    $all;
    if (isset($_GET['entitede'])) {
        $mother = trim(htmlentities($_GET['entitede']));
        if ($mother == 'NULL' ) {
            try {
                $all = $entreprise->findByNull(["entitede" => $mother ]);
            } catch (\Throwable $th) {
                $response = [
                    "type" => "error",
                    "message" => "Problème interne du serveur",
                    "datas" => []
                ];
                echo  json_encode($th);
                die();
            }
        }
        elseif($mother == 'NOT_NULL') {
            $mother = str_replace('_', ' ', $mother);
            try {
                $all = $entreprise->findByNotNull(["entitede" => $mother ]);
            } catch (\Throwable $th) {
                $response = [
                    "type" => "error",
                    "message" => "Problème interne du serveur",
                    "datas" => $th
                ];
                echo json_encode($response);
                die();
            }
        }
        else {
            try {
                $all = $entreprise->findBy(["entitede" => $mother ], 10);
            } catch (\Throwable $th) {
                $response = [
                    "type" => "error",
                    "message" => "Problème interne du serveur",
                    "datas" => []
                ];
                echo  json_encode($response);
                die();
            }
        }

    }
    else {
        try {
            $all  = $entreprise->findAll(10);
        } catch (\Throwable $th) {
            $response = [
                "type" => "error",
                "message" => "Problème interne du serveur",
                "datas" => []
            ];
            echo  json_encode($response);
            die();
        }
    }
    $rows = [];
   
    for ($i=$start; $i < $end; $i++) { 
        $rows[] = $all[$i];
    }
    $response = [
        "type" => "success",
        "message" => "Okay",
        "datas" => $rows,
        "pages" => $nombreDePage,
        "page" => $page
    ];
    echo  json_encode($response);
    die();
    
}
elseif(isset($_GET['action'])) {
    $action = htmlentities(trim($_GET['action']));
    if ($action == 'delete') {
       if (is_array($_GET['Ids'])) {
            $ids = $_GET['Ids'];
            $entitede = htmlentities(trim($_GET['entitede']));
            for ($i=0; $i < count($ids); $i++) { 
                $ids[$i] = htmlentities(trim($ids[$i]));
                $id = $ids[$i];
                try {
                    $entreprise->Supprimer($id);
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
               
            if ($entitede === 'NULL') {
                $response = [
                    "type" => "success",
                    "message" => "La suppression a réussie",
                    "datas" => $ids
                ];
               }
               else {
                $response = [
                    "type" => "success",
                    "message" => "La suppression a réussie",
                    "datas" => $ids
                ];
               }
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
    if ($action == 'update') {
        if (isset($_GET['id'])) {
            $id = htmlentities(trim($_GET['id']));
            if (isset($_POST)) {
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
                //a proteger
                $last = $entreprise->find($id);
                $response = [
                    "type" => "success",
                    "message" => "Entreprise ajoutée avec succès",
                    "datas" => $last
                ];
                echo json_encode($response);
                die();
            }
        }
    }
    
}
elseif (isset($_GET['SNomEntreprise'])) {
    $nomEntreprise = htmlentities(trim($_GET['SNomEntreprise']));
    $all = [];
    try {
        $all = $entreprise->findBy(['SNomEntreprise' => $nomEntreprise]);
    } catch (\Throwable $th) {
        $response = [
            "type" => "error",
            "message" => "Nom d'Entreprise inexistant",
            "datas" => []
        ];
        echo json_encode($response);
        die();
    }
    $response = [
        "type" => "success",
        "message" => "Okay",
        "datas" => $all
    ];
    echo json_encode($response);
    die();
}
elseif($_POST && count($_POST) > 0) {
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
            "message" => "Problème interne du serveur",
            "datas" => $th
        ];
        echo json_encode($response);
        die();
    }
    $last = $entreprise->findLast();
    $lastEl = $entreprise->find($last->id);
    $response = [
        "type" => "success",
        "message" => "Entreprise ajoutée avec succès",
        "datas" => $lastEl
    ];
    echo json_encode($response);
    die();
}
elseif (isset($_GET['idEntreprise'])) {
    $id = htmlentities(trim($_GET['idEntreprise']));
    try {
        $data = $entreprise->find($id);
    } catch (\Throwable $th) {
        $response = [
            "type" => "error",
            "message" => "Problème interne du serveur",
            "datas" => []
        ];
        echo json_encode($response);
        die();
    }

    $response = [
        "type" => "success",
        "message" => "Okay",
        "datas" => $data
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
            "datas" => []
        ];
        echo json_encode($response);
        die();
    }
    for ($i=0; $i < count($all); $i++) { 
        $data = $all[$i];
        $data->SNomEntreprise  = html_entity_decode($data->SNomEntreprise);
        $data->RespoEntreprise    = html_entity_decode($data->RespoEntreprise);
        $data->TypeEntreprise  = html_entity_decode($data->TypeEntreprise);
        $data->SNomRue  = html_entity_decode($data->SNomRue);
    }
    $socities = [];
    $entites = [];
    foreach ($all as $key => $value) {
        if($value->entitede == NULL) {
            $socities[] = $value;
        }
        else {
            $entites[] = $value;
        }
    }
    $response = [
        "type" => "success",
        "message" => "Okay",
        "datas" => [
            "entreprises" => $socities,
            "entites" => $entites
        ]
    ];
    echo  json_encode($response);
    die();
}