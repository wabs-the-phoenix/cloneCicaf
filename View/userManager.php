<?php require "elements/header.php";?>
<div>
    <nav>
            
        <div class="container">
                <ul>
                    <li><a href="/admin-home">
                        <i class="fas fa-home"></i>
                        <span class="nav-home-link">Acceuil</span>
                    </a></li>
                    <li><a href= "Update?role=admin" class="active">
                        <img src="assets/img/user.png" alt="fleche" class="icoNav">
                        <span class="nav-home-link">Mon Compte</span>
                    </a></li>
                    <li><a href="/quit" id="btnDeconnexion">
                        <i class="fas fa-power-off"></i>
                        <span class="nav-home-link">Déconnexion</span>
                    </a></li>
                </ul>
        </div>
    </nav>
    <div class="adminPage">
    <div class="top-bar bgGray"></div>
    <div class="row">
        <div class="sideBar">
            <ul>
                <li><a href="#">Gestion des utilisateurs</a></li>
                <li><a href="#">Gestion des entreprises</a></li>
                <li><a href="#">Messages</a></li>
                <li><a href="#">Notifications</a></li>
            </ul>
        </div>
        <div class="container bg-white w100 pd-t-60">
            <div class="modal" id="modalAddUser" style="display: none">
                <div class="bg-white pd-40 relative">
                    <h2>Ajouter un utilisateur</h2>
                    <button id="closeModalAddUser" class="transparent"><i class="fa fa-window-close"></i></button>
                    <form action="" method="POST" id="addUserForm">
                        <div class="column">
                            <input type="text" name="newUserName" id="newUserName" placeholder="Nom du nouvel utilisateur">
                            <input type="text" name="newUserCode" id="newUserCode" placeholder="Code comptable">
                            <select name="newUserRole" id="newUserRole">
                                <option value="" selected>Choisir un rôle</option>
                                <option value="admin">Administrateur</option>
                                <option value="comptable">Comptable</option>
                                <option value="consultant">Consultant</option>
                            </select>
                            <input id="addUserBtn"type="submit" value="Ajouter">
                        </div>
                    </form>
                </div>
            </div>
            <div class="relative">
                <button class="btn-link bg-primary" id="showModalAddUser"><i  class="fas fa-plus"></i>Ajouter</button>
            </div>
                <div class="bg-white" id="users">
                <h2 class="fz-1o2 table-title">Liste des utilisateurs</h2>
                <div class="row jst-center ">
                    <table class="w100">
                        <thead>
                            <th>Nom</th>
                            <th>role</th>
                            <th>code</th>
                        </thead>
                        <tbody id="usersList">
                           <?php 
                           /*
                                for ($i=0; $i < count($users); $i++) { 
                                   $item = $users[$i];
                                   echo '<tr>';
                                   foreach ($item as $key => $value) {
                                       if($key !== 'mpd' && $key !=='login') {
                                        echo '<td>'.$value.'</td>';
                                       }
                                   }
                                   echo '</tr>';
                                }
                                */
                            ?>
                        </tbody>
                    </table>
                </div>
                <div id="barPagUser" class="mg-t-20 row jst-center"> </div>
                <!--<div id="pagination" class="row jst-center">
                    <a href="#" class="mg-r-20"><i class="fas fa-caret-left fa-4x"></i></a>
                    <a href="#" class="mg-l-20"><i class="fas fa-caret-right fa-4x"></i></a>
                </div>-->
            </div>
            <div class="bg-white" id="entreprises">
                <h2 class="fz-1o2 table-title">Liste des Entreprises</h2>
                <div class="row jst-center ">
                    <table class="w100">
                        <thead>
                            <th>Nom de l'entreprise</th>
                            <th>Nom du responsable</th>
                            <th>type de l'entreprise</th>
                            <th>Numero</th>
                            <th>Email</th>
                        </thead>
                        <tbody id="entreprisesList">
                        </tbody>
                    </table>
                </div>
                <div id="barEntreprise" class="mg-t-20 row jst-center"></div>
            </div>
            <div class="bg-white pad30">
                <h2>Ajouter entreprise</h2>
                <div id="entrepriseForm" class="">
                    <form action="" method="POST" class="entrForm" id='entrForm'>
                            <input type="text" id="code" name="code" placeholder="code de l'entreprise">
                            <input type="text" id="nomEntreprise" name="nomEntreprise" placeholder="nom de l'entreprise ex: Cicaf">
                            <input type="text" id="responsable" name="responsable" placeholder="Responsable de l'entreprise ex: Josue Kalubi">
                            <select name="typeEntreprise" id="typeEntreprise">
                                <option value="">Chosissez un type d'entreprise</option>
                                <option value="sarl">Société à Responsablilité limitée</option>

                            </select>
                            <input type="text" id="numRue" name="numRue" placeholder="Numero de la residence ex: 14Bis">
                            <input type="text" id="nomRue" name="nomRue" placeholder="Nom de la rue de residence ex: Mayenge">
                            <input type="text" id="numTel" name="numTel" placeholder="Numero de téléphone ex: 0824756525">
                            <input type="email" id="email" name="email" placeholder="Adresse mail ex: monadressemail@gmail.com">
                            <label for="debutActivite">Debut des activites</label>
                            <input type="date" id="debutActivite" name="debutActivite" >
                            <label for="debutCompta">Debut de la comptabilite</label>
                            <input type="date" id="debutCompta" name="debutCompta">
                            <select name="commune" id="commune">
                                <option value="">commune</option>
                                <option value="1">Gombe</option>
                            </select>
                            <input type="text" id="nif" name="nif" placeholder="numero d'impots">
                            <input type="number" id="days" name="days" placeholder="nombre de jours de travail">
                            <input type="number" id="hours" name="hours" placeholder="nombre d'heures de travail">
                            <input type="submit" id="addEntr" value="Ajouter entreprise">
                        
                    </form>
                
                </div>
            </div>
            

        </div>
    </div>
    </div>
</div>
<?php
    require "elements/footer.php";
?>