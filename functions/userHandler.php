<?php
function fillUser(&$user, $datas) {
    $user->setSpecialCode($datas->specialCode);
    $user->setMpd($datas->mpd);
    $user->setLogin($datas->login);
    $user->setRole($datas->role);
    $user->setNom($datas->nom);
    $user->setIdUser($datas->idUser);

}