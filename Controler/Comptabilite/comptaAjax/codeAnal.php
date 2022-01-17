<?php
use App\Model\CompteAnalytique;

if(isset($_GET["value"])) {
    $value = strip_tags(trim($_GET["value"]));
    $compte = new CompteAnalytique();
    $comptesStd;
    $comptesStd = $compte->find($value);
    
    $response;
    if($comptesStd !== null) {
        
        $response = [
            "status" => "200",
            "body" => $comptesStd
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