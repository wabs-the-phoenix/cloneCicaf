<?php
use App\Model\User;
use App\Model\Entreprise;

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


if($_POST['SCodeEntreprise'] !== "" && $_POST['SNomEntreprise'] !== ""
    && $_POST['RespoEntreprise'] !== "") {
    $newEntrDatas = [];
    foreach ($_POST as $key => $value) {
        $newEntrDatas[$key] = trim(htmlentities($value));
        
    }
    //echo json_encode($newEntrDatas);
    $newEntr = new Entreprise();
    $newEntr->hydrated($newEntrDatas);
    $newEntr->Create($newEntrDatas);
    $entrList = $newEntr->findAll();
    $entrString = json_encode($entrList);
    echo $entrString;
}

else {
    echo '{}';
}