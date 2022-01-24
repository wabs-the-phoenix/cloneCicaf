<?php
use App\Model\User;
use App\Model\Entreprise;
use App\Model\Token;
use App\Model\UserPermission;

$token = $_SESSION['user'];
$userPerm = new UserPermission();
$result = Token::verifyToken($token);
if($result == false || $result == null) {
    //header('Location: /');
    die();
}
$userId = $result["id"];
$_SESSION['user'] = $result['token'];
$user = new User();
$userStd = $user->find($userId);
$entreprise = new Entreprise();
$entrepriseStd = $entreprise->find($userStd->entrepriseId);
$response = [
    "datas" => [
        "user" => $userStd,
        "entreprise" => $entrepriseStd
    ],
    "type" => "success",
    "message" => "okay"
];
echo json_encode($response);