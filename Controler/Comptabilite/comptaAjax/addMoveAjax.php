<?php
use App\Model\CorpMouv;
use App\Model\EnteteMouv;
use App\Model\planComptable;
use App\Model\Entreprise;
use App\Model\User;
use App\Model\UserJournal;
use App\Model\CategorieJournaux;
use App\Model\Token;


if(isset($_POST)) {
    $safe = strip_tags($_POST['move']);
    $move = json_decode($safe);
    $corpMove = new CorpMouv();
    $entetMove = new EnteteMouv();
    $date = new DateTime();
    //code a rendre generique
    $timezone = new DateTimeZone('Africa/Kinshasa');
    //
    $date->setTimeZone($timezone);
    $head = $move->head;
    
    $entite = new Entreprise();
    $entites = $entite->findBy(["SCodeEntreprise" => $head->codeEntite]);
    $idEntite = 1;

    //Trouver l'entreprise
    //
    if(count($entites) > 0) {
        if($entites[0]->entitede !== null) {
            $entite->hydrated($entites[0]);
            $idEntite = $entite->getIdEntreprise();
        }
        else {
            $response = [
                "message" => [
                    "type" => "error",
                    "content"=> "Vous avez entré un code correspondant à une entreprise"
                ]
            ];
            echo json_encode($response);
        }
    }
    else {
        $response = [
            "message" => [
                "type" => "error",
                "content"=> "Code entite inexistant"
            ]
        ];
        echo json_encode($response);
        die();
    }
    //
    
    //find id user
    $token = $_SESSION['user'];
    $result = Token::verifyToken($token);
    if($result == false) {
        $response = [
            "message" => [
                "type" => "error",
                "content"=> "jeton non valide"
            ]
        ];
        echo json_encode($response);
        die();
    }
    $idUser = $result["id"];
    $_SESSION['user'] = $result['token'];
    $user = new User();
    $userStd = $user->find($idUser);
    $user->hydrated($userStd);    
    //Find the journal
    $journal = new CategorieJournaux();
    $journalStd = $journal->findBy(["CodeJournal" => $head->codeJournal]);
    $journal->hydrated($journalStd[0]);
    $headerDatas = [
        "DateMouv" => $date->format("Y-m-d H:i:s"),
        "DateOper" => $head->dateMouv,
        "CodeDoc" => $head->codeDoc,
        "NomDoc" => $head->nomDoc,
        "NumDoc" => $head->numDocTrue,
        "Exercice" => $head->exercice,
        "TauxApp" => $head->tauxUSD,
        "NomBeneficiaire" => $head->beneficiaire,
        "NomDebiteur" => $head->debiteur,
        "MotifGeneral" => $head->motif,
        "DMontant" => $head->montantDebit,
        "CMontant" => $head->montantCredit,
        "FCMontant" => $head->montantValue,
        "NumDoc1" => $head->numDoc,
        "TauxEuro" => $head->tauxEuro,
        "EntrepriseId" => $idEntite,
        "userId" => $idUser,
        "CategorieJournaux_idCategorieJournaux" => $journal->getIdCategorieJournaux()
    ];
    $header = new EnteteMouv();
    $header->hydrated($headerDatas);
    $lastHeader = $header->findLast();
    if($lastHeader->id > 0) {
        $idEntete = $lastHeader[0]->getIdEnteteMouv() + 1;
    }
    else {
        $idEntete = 0;
    }
    //corps du mouvement

    $body = $move->body;
    $allTrans = [];
    foreach ($body as $key => $value) {
        
        $ca = $body->ca;
        $compte = new planComptable();
        if($value === $body->ca) {
            continue;
        }
       
        $compteStd = $compte->findBy(["CompteOperation" => $value->compteOpe]);
       if($value !== $body->ca && count($compteStd) > 0) {
        $compte->hydrated($compteStd[0]);
        if($value->imp === "D") {
            $compte->addDebit($value->montantDebit);
        }
        else {
            $compte->addCredit($value->montantCredit);
        }
        $compte->update($compte->getIdPlanComptable(), $compte);
        $datas = [
            "NumMouv" => $idEntete,
            "CodeAnal" => $body->ca,
            "Imputation" => $value->imp,
            "Libelle" => $value->libelleOpe,
            "DMontant" => $value->montantDebit,
            "CMontant" => $value->montantCredit,
            "DCompte" => $value->imp === "D"?$value->compteOpe : null,
            "CCompte" =>  $value->imp === "C"?$value->compteOpe : null,
            "SCompte" => substr($value->compteOpe, 0, 3),
            "CDivisionnaire" => substr($value->compteOpe, 0, 4),
            "Transit" => $value->imp === "D"?$value->montantDebit : $value->montantCredit,
            "DSolde" => $compte->getSolde(),
            "RefPiece" => $value->pieceRef,
            "PlanComptable_idPlanComptable" => $compte->getIdPlanComptable(),
            "T6_CodeAnal" => $ca,
            "Transit" => $value->imp === "D" ? $value->montantDebit : $value->montantCredit
        ];
        $allTrans[] = $datas;
       }
       
       else {
        $response = [
            "message" => [
                "type" => "error",
                "content"=> "Compte operation inexistant"
                ]
        ];
        echo  json_encode($response);
        die();
       }
       
       
       
                                                       
    }
    $header->Create($headerDatas);
    $last = $header->findLast();
    
    foreach ($allTrans as $key => $value) {
        $mouvement = new CorpMouv();
        $value["NumMouv"] = $last->id;
        $mouvement->hydrated($value);
        try {
            $mouvement->create($mouvement);
        } catch (\Throwable $th) {
            $response = [
                "message" => [
                    "type" => "error",
                    "content"=> "Compte operation inexistant"
                    ]
            ];
            echo  json_encode($response);
            die();
        }
    }

    $response = [
        "message" => [
            "type" => "success",
            "content"=> "Mouvement enregistré avec succès",
            "headerNum" => $idEntete,
            "dummy" => $allTrans
            ]
    ];
    echo  json_encode($response);
    die();
}