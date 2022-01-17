<?php
use App\Model\User;
use App\Model\Entreprise;
use App\Model\Commune;

$_SESSION['entreprise'] = isset($_COOKIE['entreprise'])?strip_tags($_COOKIE['entreprise']):null;
$entrepriseActuelID = $_SESSION['entreprise'] !== null?$_SESSION['entreprise']:null;
$entreprises = [];
$entites = [];
$entreprise = new Entreprise();
$entreprisesStd = $entreprise->findAll();
$commune = new Commune();
$communes = $commune->findAll();

if($entreprisesStd !== null) {
        
    foreach ($entreprisesStd as $key => $value) {
        $entr = new Entreprise();
        $entr->hydrated($value);
        if ($entr->getEntiteDe() == NULL) {
           $entreprises[] = $entr;
        }
        else {
            $entites[] = $entr;
            
        }
        
    }
}
else {
    require "View/Comptabilite/dataBaseError.php";
}
require "View/Comptabilite/comptaEntrepriseIde.php";