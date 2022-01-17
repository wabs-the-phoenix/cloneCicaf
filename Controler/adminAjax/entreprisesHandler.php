<?php
use App\Model\Entreprise;

/*creer un utilisateur
on cree un objet user, on recupere les criteres stocker dans
la session et on hydratele user
*/
$entr = new Entreprise();
/**-------------------------- */

/*on recupere tout les users et on les transform en json puis on les affiches*/
$entrList = $entr->findAll();
$usersString = json_encode($entrList);
echo($usersString);
