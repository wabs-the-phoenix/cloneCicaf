<?php
use App\Model\User;

$sessionUser = $_SESSION['user'];
$user = new User();
$userStd = $user->findBy([
    'login' => $sessionUser['login'],
    "mpd" => $sessionUser['mpd']
]);
$response;
$resString;
if(count($userStd) > 0) {
    $response = [
        "status" => 200,
        "value" => $userStd[0]
    ];
    $resString = json_encode($response);
}
else {
    $response = [
        "status" => 404,
        "value" => new stdClass()
    ];
    $resString = json_encode($response);
}

echo $resString;
