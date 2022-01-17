<?php

function loadData ($fichier) {
     $users = file_get_contents($fichier);
     $users = json_decode($users);
     return $users;
}
function createSelectionFonction($user) {

}
function change_password($password, $id) {
      $users = loadData("tools/data.json");
      $users_selected = findUserBy("id", $id);
       $user = $users_selected[0];
       $user->password =   $password;
      $key = get_user_key( $users, $id);
      if($key !== null) {
              $users[$key] = $user;
              $users = json_encode($users);
              $data = writeData($users, "tools/data.json");
               return $data !== false? true: false;
              return true;
          }
          else {
               return false;
          }
     
}
function changer_identite($first, $name, $last, $id) {
       $users = loadData("tools/data.json");
       $users_selected = findUserBy("id", $id);
       $user = $users_selected[0];
       $user->name =   $name === ""? $user->name: $name;
       $user->firstName =   $first === ""? $user->firstName: $first;
       $user->lastName  = $last === ""? $user->lastName: $last;
       $key = get_user_key( $users, $id);
       if($key !== null) {
               $users[$key] = $user;
                $users = json_encode($users);
                 $data = writeData($users, "tools/data.json");
               return $data !== false? true: false;
           }
           else {
                return false;
           }
}
function get_user_key($array, $id) {
     foreach ($array as $key => $value) {
          if($value->id === $id) {
               return $key;
          }
     }
     return null;
}

function findUser ($user, $users) {
      $filtered_users = array_filter($users, function($el) use($user){
           if($el->login === $user['login']) {
                return true;
           }
           return false;
      });
      if(empty($filtered_users)) {
           return null;
      }
      else  {
           foreach ($filtered_users as $key => $value) {
                
                if($value->password === $user['password']) {
                     return $value;
                }
           }
      } 
}
function findUserBy($critere, $value) {
     $fileAudit = "tools/data.json";
     $datas;
     switch ($critere) {
          case 'id':
               $datas = file_get_contents($fileAudit);
               $datas = json_decode($datas);
               return  array_filter( $datas, function($el) use($value) {
                    return  $el->id === $value?true : false;
               });
               break;
          
          default:
               return null;
               break;
     }
}

function writeData($datas, $fichier) {
     $wrottenData = file_put_contents($fichier, $datas);
     return $wrottenData? $datas: false;
}
function findAuditBy($critere, $value) {
     $fileAudit = "tools/audit.json";
     $datas;
     switch ($critere) {
          case 'id':
               $datas = file_get_contents($fileAudit);
               $datas = json_decode($datas);
               return $datas;
               break;
          
          default:
               return null;
               break;
     }
     
}
