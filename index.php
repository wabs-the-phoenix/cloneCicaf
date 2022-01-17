<?php
require_once('vendor/autoload.php');
setLocale(LC_TIME, "fr");
session_start();

$router = new AltoRouter();

//Toutes les routes de l'application
$router->map('GET', '/', 'login');
$router->map('POST','/', 'login');
$router->map('GET', '/admin-home', 'adminHome');
$router->map('GET', '/quit', 'quit');
$router->map('GET', '/Update', 'adminUpdate');
//Manager
$router->map('GET', '/manager-home', 'superAdmin/home');
$router->map('GET', '/manager-entreprises', 'superAdmin/manageEntreprises' );

$router->map('POST', '/Update', 'adminUpdate');
$router->map('GET', '/update-pass', 'adminUpdatePass');
$router->map('POST', '/update-pass', 'adminUpdatePass');
$router->map('GET', '/user-manager', 'userManager');
$router->map('GET', '/administration-datas', 'adminAjax/administration');
$router->map('POST', '/administration-datas', 'adminAjax/administration');
$router->map('GET', '/entreprise-datas', 'adminAjax/entreprisesHandler');
$router->map('POST', '/entreprise-datas', 'adminAjax/entreprisesHandler');
$router->map('POST', '/user-manager', 'userManager');
$router->map('GET', '/comptabilite-menu', 'Comptabilite/comptaMenu');
$router->map('POST', '/comptabilite-menu', 'Comptabilite/comptaMenu');
$router->map('GET', '/identifier-entreprise', 'Comptabilite/comptaEntrepriseIde');
$router->map('POST', '/identifier-entreprise', 'Comptabilite/comptaEntrepriseIde');
$router->map('GET', '/categorie-journaux', 'Comptabilite/categorieJournaux');
$router->map('POST', '/categorie-journaux', 'Comptabilite/categorieJournaux');
$router->map('GET', '/plan-comptable', 'Comptabilite/planComptable');
$router->map('GET', '/comptes-all', 'Comptabilite/comptes');
$router->map('GET', '/code-analytique', 'Comptabilite/codeAnalytique');
$router->map('POST', '/code-analytique', 'Comptabilite/codeAnalytique');
$router->map('GET', '/feuille-imputation', 'Comptabilite/feuilleImputation');
$router->map('POST', '/choose-entreprise', 'Comptabilite/comptaAjax/entrepriseAjax');
$router->map('POST', '/add-user', 'adminAjax/addUser');
$router->map('POST', '/add-entreprise', 'adminAjax/addEntreprise');
$router->map('POST', '/classes/manager/', 'Comptabilite/classes');


//requettes ajax comptabilite
$router->map('GET', '/categorie', 'Comptabilite/comptaAjax/categorieAjax');
$router->map('POST', '/choose-entreprise', 'Comptabilite/comptaAjax/entrepriseAjax');
$router->map('GET', '/comptable-list', 'Comptabilite/comptaAjax/planComptableAjax');
$router->map('GET', '/exercices', 'Comptabilite/exercices');
$router->map('POST', '/addMove', 'Comptabilite/comptaAjax/addMoveAjax' );
$router->map('GET', '/headerMove', 'Comptabilite/comptaAjax/getHeaderMove' );
$router->map('GET', '/journaux', 'Comptabilite/comptaAjax/journaux' );
$router->map('GET', '/getUser', 'Comptabilite/comptaAjax/getUserAjax' );
$router->map('GET', '/comptes', 'Comptabilite/comptaAjax/comptes' );
$router->map('GET', '/codeAnal', 'Comptabilite/comptaAjax/codeAnal' );

//Amortissements routes
$router->map('GET', '/amortissement', 'Amortissement/Home');
$router->map('GET', '/Biens', 'Amortissement/Biens');



//Routes Budget
$router->map('GET', '/Budget', 'Budget/Home');
$router->map('GET', '/Projet', 'Budget/Projet');
$router->map('GET', '/etablir-budget', 'Budget/Budget');

//Routes Gestion personnels
$router->map('GET', '/personnel', 'Personnel/Home');
$router->map('GET', '/Agents', 'Personnel/Agents');
//apis
$router->map('GET', '/api/moves', 'Comptabilite/comptaAjax/getMoves' );
$router->map('GET', '/api/entreprises', 'api/entreprises' );
$router->map('POST', '/api/entreprises', 'api/entreprises' );
$router->map('GET', '/api/communes', 'api/communes' );
$router->map('GET', '/api/journaux', 'api/journaux' );
$router->map('POST', '/api/journaux', 'api/journaux' );
$router->map('GET', '/api/planComptables', 'api/planComptable' );
$router->map('POST', '/api/planComptables', 'api/planComptable' );
$router->map('GET', '/api/mouvements', 'api/mouvements' );
$router->map('GET', '/api/classes', 'api/classes' );
$router->map('POST', '/api/classes', 'api/classes' );
$router->map('GET', '/api/comptePrincipaux', 'api/comptePrincipaux' );
$router->map('POST', '/api/comptePrincipaux', 'api/comptePrincipaux' );
$router->map('GET', '/api/sousComptes', 'api/sousComptes' );
$router->map('POST', '/api/sousComptes', 'api/sousComptes' );
$router->map('GET', '/api/comptesDivisionnaires', 'api/comptesDivisionnaires' );
$router->map('POST', '/api/comptesDivisionnaires', 'api/comptesDivisionnaires' );
$router->map('GET', '/api/familles', 'api/familles' );
$router->map('POST', '/api/familles', 'api/familles' );
$router->map('GET', '/api/UserJournal', 'api/UserJournal' );
$router->map('GET', '/api/users', 'api/users' );

$match  = $router->match();

if($match !== null  && $match  !== false) {
    
    ob_start();
     if(is_callable($match['target'])) {
          call_user_func_array($match['target'], $match['params']);
     }
     else {
         if($match['target']!== 'login') {
            require "Controler/".$match['target'].".php";
         }
         else {
             require 'Controler/login.php';
         }
     }
     $content = ob_get_clean();
     $template;
     if (preg_match("/api/",$match['target']) > 0 ) {
        $template = (isset($tmp)) ? $tmp : "View/empty.php";
        require $template;
        die();
     }
     $template = (isset($tmp)) ? $tmp : "View/template.php";
     require $template;
}
else {
    require('Controler/error404.php');
}