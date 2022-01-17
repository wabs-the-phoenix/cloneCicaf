<?php
use App\Model\PlanComptable;

if(isset($_GET["value"])) {
    $limit = strip_tags(trim($_GET["limit"]));
    $limit = intval($limit);
    $value = strip_tags(trim($_GET["value"]));
    $compte = new PlanComptable();
    $comptesStd;
    if($value === "") {
        $comptesStd = $compte->findAll($limit);
    }
    else {
        $comptesStd = $compte->findLike(["CompteOperation" => $value]);
    }
    $response;
    if(count($comptesStd) > 0) {
        $result = [];
        foreach ($comptesStd as $key => $val) {
            $result[] = $val->CompteOperation;
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