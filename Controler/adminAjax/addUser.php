<?php
use App\Model\User;

$criteres = $_SESSION['user'];
/*creer un utilisateur
on cree un objet user, on recupere les criteres stocker dans
la session et on hydratele user
*/
$user = new User();
$usersFound = $user->findBy($criteres);
$user->hydrated($usersFound[0]);

/**-------------------------- */

/*on recupere tout les users et on les transform en json puis on les affiches*/


if(isset($_POST['newUserName']) && $_POST['newUserName'] !== "" &&
isset($_POST['newUserCode']) && $_POST['newUserCode'] !== ""
&& isset($_POST['newUserRole']) && $_POST['newUserRole'] !== "") {
$newUserDatas = [];
$newUserDatas['nom'] = trim(htmlentities($_POST['newUserName']));
$newUserDatas['specialCode'] = trim(htmlentities($_POST['newUserCode']));
$newUserDatas['role'] = trim(htmlentities($_POST['newUserRole']));
$newUser = new User();

$newUserDatas['login'] = $newUserDatas['specialCode'];
$newUserDatas['mpd'] = sha1($newUserDatas['specialCode']);
$newUser->hydrated($newUserDatas);
$newUser->Create($newUser);
$compeur = 0;
$usersList = $user->findAll();
$usersString = json_encode($usersList);
echo $usersString;
}

else {
    var_dump($_POST);
}