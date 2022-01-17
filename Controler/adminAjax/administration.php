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
$usersList = $user->findAll();
$usersString = json_encode($usersList);

echo $usersString;
