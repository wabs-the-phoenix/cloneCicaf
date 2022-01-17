<?php

use App\Model\User;
use App\Model\Entreprise;

if(!isset($_SESSION['user'])) {
    header('Location: /');
}

$criteres = $_SESSION['user'];
$user = new User();
$userList = $user->findBy($criteres);
if($userList === null || count($userList) === 0) {
    header('Location: /');
}
$datas = $userList[0];
$user->hydrated($datas);
if($user->getRole() !== "admin") {
    header('Location: /');
}