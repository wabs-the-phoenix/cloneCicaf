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
$page = "Update data";
$user = new User();
$userStd = $user->find($userId);
$user->hydrated($userStd);
if(isset($_POST['oldPass']) && isset($_POST['newPass']) && isset($_POST['confPass'])) {
        $oldPass = trim(htmlentities($_POST['oldPass']));
        $newPass = trim(htmlentities($_POST['newPass']));
        $confPass = trim(htmlentities($_POST['confPass']));
        
        if($oldPass === "" || $newPass === "" || $confPass === "") {
            $message = "Veuillez remplir tous les champs";
            $messageItem = '<div class="ui error message">'.$message.'</div>';
        }
        else {
            $oldPass = sha1($oldPass);
            $newPass = sha1($newPass);
            $confPass = sha1($confPass);
            if($oldPass !== $user->getMpd()) {
                
                $message = "Mot de passe incorrect";
                $messageItem = '<div class="ui error message">'.$message.'</div>';
            }
            else {
                
                if($newPass === $confPass) {
                     $user->setMpd($newPass);
                     $user->update($user->getIdUser(), $user);
                     $passChanged = isset($user)?true:false;
                    if($passChanged) {
                        $_SESSION['user'] = $result["token"];
                     $message = "Mot de passe changé avec succès";
                     $messageItem = '<div class="ui success message">'.$message.'</div>';
                  }
                }
                else {
                    $message = "Mot de passe non confirmé";
                    $messageItem = '<div class="ui error message">'.$message.'</div>';
                }
            }
        }
        /*charger utilisateur code   a changer*/
          
    
}
$admnin = $user;
    $page = "updates";
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
    <link rel="stylesheet" href="assets/css/adminUpdate.css">
    <link rel="stylesheet" href="assets/css/adminUpdate.css">';
    require "View/adminUpdatePass.php";