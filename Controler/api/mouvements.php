<?php 
    use App\Model\CorpMouv;
    use App\Model\EnteteMouv;
    use App\Model\User;
    use App\Model\CategorieJournaux;

    $user = new User();
    $catJour = new CategorieJournaux();
    $res = "";
    $corp = new CorpMouv();
    $head = new EnteteMouv();
    $mouvements = [];
    if(isset($_GET) && count($_GET) > 0) {
        $keys = array_keys($_GET);
        $criteres = [];
        for ($i=0; $i < count($keys) ; $i++) {
            $key = $keys[$i];
             $criteres[$key] = htmlentities(trim($_GET[$key]));
         }
       $bodiesChoosen = [];
         try {
             $bodiesChoosen = $corp->findBy($criteres);
         } catch (\Throwable $th) {
             $response = [
                 "type" => "error",
                 "message" => "Problème interne du serveur",
                 "datas" => $th
             ];
             echo json_encode($response);
             die();
         }
         for ($i=0; $i < count($bodiesChoosen) ; $i++) { 
             $corpMove[$i] = $bodiesChoosen[$i];
             $idHeader = $corpMove[$i]->NumMouv;
             try {
                $entetes =  $head->find($idHeader);
                $userName = $user->find($entetes->userId);
                $jour = $catJour->find($entetes->CategorieJournaux_idCategorieJournaux);
             } catch (\Throwable $th) {
                $response = [
                    "type" => "error",
                    "message" => "Problème interne du serveur",
                    "datas" => $th
                ];
                echo json_encode($response);
                die();
             }
             $mouvement = [
                 "corps" => $corpMove[$i],
                 "entetes" => $entetes,
                 "userName" => $userName,
                 "journal" => $jour
             ];
             $mouvements[] = $mouvement;
         }
         $response = [
             "type" => "success",
             "message" => "Okay",
             "datas" => $mouvements
         ];
         echo  json_encode($response);
     }
    elseif($_POST && count($_POST) > 0) {
        /*$keys = array_keys($_POST);
        $champs = [];
        for ($i=0; $i < count($keys) ; $i++) { 
            $champs[$keys[$i]] = htmlentities(trim($_POST[$keys[$i]]));
        }
        try {
            $corp->Create($champs);
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
        echo json_encode($response);*/
    }
     else {
        /* $all;
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
         $response = [
             "type" => "success",
             "message" => "Okay",
             "datas" => $all
         ];
         echo  json_encode($response);*/
     }