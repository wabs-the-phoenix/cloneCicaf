<?php
if(isset($_POST['entreprise'])) {
    if($_POST['entreprise'] == null) {
        $message = [
            "type" => "danger",
            "content"=> "Données vides"
        ];
        echo json_encode($message);
    }
    else {
        $idEntreprise = strip_tags(trim($_POST['entreprise']));
        $response = [
            "message" => [
                "type" => "success",
                "content"=> "Entreprise choisie avec succès"
            ],
            "entreprise" => $idEntreprise
        ];
        echo json_encode($response);
    }

}