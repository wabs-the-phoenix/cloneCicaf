<?php
use App\Model\User;
use App\Model\UserPermission;
use App\Model\Token;

$page = "Connexion";

$stylePerso = '
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/fontawesome.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/brands.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/regular.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/solid.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/svg-with-js.min.css">
    <link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/v4-shims.min.css">
    <link rel="stylesheet" href="assets/css/semantic/semantic.min.css">
    <link rel="stylesheet" href="assets/css/slick.css">
    <link rel="stylesheet" href="assets/css/slick-theme.css">
    <link rel="stylesheet" href="assets/css/login.css">';
    $js = [];
    $js[] = '<script src="assets/js/jquery-3.6.0.js"></script>';
    $js[] = '<script src="assets/js/moment.js"></script>';
    $js[] = '<script src="assets/js/anime-master/lib/anime.min.js"></script>';
    $js[] = '<script src="assets/js/slick.js"></script>';
    $js[] = '<script src="assets/css/semantic/semantic.min.js"></script>';
    $js[] = '<script src="assets/js/login.js"></script>';


if(isset($_POST['login']) && $_POST['login'] !== "" && $_POST['password'] && isset($_POST['password'])) {
    $login = htmlentities(trim($_POST['login']));
    $password = htmlentities(trim($_POST['password']));
    $password = sha1($password);
    $criteres = [
        'login' => $login,
        'mpd'=> $password
    ];
    $user = new User();
    $userList = $user->findBy($criteres);
    if($userList !== null && count($userList) !== 0) {
        $datas = $userList[0];
        if($datas !== null) {
            $user->hydrated($datas);
            $token = Token::createToken($user->getIdUser());
            $_SESSION['user'] = $token;
            $userPerm = new UserPermission();
            $perms = $userPerm->findBy(["userId" => $user->getIdUser()]);
            if ($perms !== NULL) {
                if (count($perms) > 0) {
                    $userPerm->hydrated($perms[0]);
                }
                else {
                    header('Location: /');
                }
            }
            $userId = $user->getIdUser();
            if($userPerm->getManageAdmin() == "1") {
                header('Location: /manager-home');
                die();
            }
            if($userPerm->getAdminRead() == "1") {                
                header('Location: /admin-home?p=Accueil');
            }
            /*elseif($user->getRole() === "Amortisseur"){
                
            }
            elseif($user->getRole() === "comptable") {
                header('Location: /');
            }
            elseif($user->getRole() === "consultant") {
                header('Location: /');
            }*/
            else {
                header('Location: /');
            }
        }
        
        else {
            header('Location: /');
        }
        
    }
    else {
         $error = "Les données entrées sont incorrects";
         $message = '<div class="ui visible error message">
         <p>'.$error.'</p>
       </div>';
         require 'View/login.php';
    }
    
}
else {
    
    require 'View/login.php';
}