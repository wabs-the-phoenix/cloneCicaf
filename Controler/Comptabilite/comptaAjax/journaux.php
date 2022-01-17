<?php
use App\Model\CategorieJournaux;

if(isset($_GET["value"])) {
    $limit = strip_tags(trim($_GET["limit"]));
    $limit = intval($limit);
    $value = strip_tags(trim($_GET["value"]));
    $journal = new CategorieJournaux();
    $journauxStd;
    if($value === "") {
        $journauxStd = $journal->findAll($limit);
    }
    else {
        $journauxStd = $journal->findBy(["codeJournal" => $value]);
    }
    $response;
    if(count($journauxStd) > 0) {
        $result = [];
        foreach ($journauxStd as $key => $val) {
            $result[] = $val->CodeJournal;
        }
        $response = [
            "status" => "200",
            "body" => $result
        ];
    }
    else {
        $response = [
            "status" => "404",
            "body" => '<div class="text-center">Aucun element trouvé</div>'
        ];
    }
    echo json_encode($response);
}