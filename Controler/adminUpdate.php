<?php
use App\Model\User;
use App\Model\Entreprise;
use App\Model\Token;
$token;
if(!isset($_SESSION['user'])) {
    header('Location: /');
    die();
}
$token = $_SESSION['user'];
$result = Token::verifyToken($token);
if($result == false || $result == null) {
    header('Location: /');
    die();
}
$userId = $result["id"];
$page = "Update admin data";
$user = new User();
$userStd = $user->find($userId);
$user->hydrated($userStd);
$stylePerso = '
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/fontawesome.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/all.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/brands.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/regular.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/solid.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/svg-with-js.min.css">
<link rel="stylesheet" href="vendor/fortawesome/font-awesome/css/v4-shims.min.css">
<link rel="stylesheet" href="assets/css/adminHome.css">
<link rel="stylesheet" href="assets/css/semantic/semantic.min.css">
<link rel="stylesheet" href="assets/css/slick.css">
<link rel="stylesheet" href="assets/css/slick-theme.css">
<link rel="stylesheet" href="assets/css/adminUpdate.css">';
/*code a changer recuperer la date de la derniere connexion*/
//$audits = findAuditBy("id", $user->id); 
//
// $lastIndex = array_key_last($audits);
 /*si l'utilisateur a poste quelque chose*/
 if(isset($_POST['newLogin']) && isset($_POST['newName'])) {
    /*changer les informatoions personnelles*/ 
    $login = trim(htmlentities($_POST['newLogin']));
    $name = trim(htmlentities($_POST['newName']));
    
    $user->setNom($name);
    $user->setLogin($login);
    $user->update($user->getIdUser(), $user);
    $dataChanged = isset($user) || $user === null?true: false;
    $message;
    $messageItem;
    if($dataChanged) {
        $_SESSION['user'] = $result["token"];
        $message = "Changement effectué";
        $messageItem = '<div class="ui success message">'.$message.'</div>';
        require "View/adminUpdate.php";
    }
    else {
        $message = "Un problème est survenu";
        $messageItem = '<div class="ui error message">'.$message.'</div>';
    }
     
 }
 else {
    require "View/adminUpdate.php";
 }
