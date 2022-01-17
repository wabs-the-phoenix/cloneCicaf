<?php

require_once('../../vendor/autoload.php');
use App\Model\RenseignementImmo;
$res = "";
$bien = new RenseignementImmo();
$datas=[];
foreach ($bien->findAll() as $data) {
    $datas=["datas"=>$data];
}
echo json_encode($datas);