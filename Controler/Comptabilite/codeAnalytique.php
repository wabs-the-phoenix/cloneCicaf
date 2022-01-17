<?php
use App\Model\User;
use App\Model\Entreprise;
use App\Model\PlanComptable;
use App\Model\CompteAnalytique;

$codeAnal = new CompteAnalytique();
$codeAnalListStd  = $codeAnal->findAll();
$codeAnalList = [];
foreach ($codeAnalListStd as $key => $value) {
   $ca = new CompteAnalytique();
   $ca->hydrated($value);
   $codeAnalList[] = $ca;
}

require "Controler/Comptabilite/tools/userCheck.php";
require "View/Comptabilite/codeAnalytique.php";