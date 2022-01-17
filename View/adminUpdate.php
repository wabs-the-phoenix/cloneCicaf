<?php
require "elements/header.php";?>

<div class="all">
    <div class="ui blue inverted segment">
        <div class="ui container">
            <div class="ui blue inverted labeled menu">
                <div class="item">
                    Logo Cicaf
                </div>
                <a class="item right" href="#">
                    <i class="user icon"></i>
                    <span class="nav-home-link">Mon Compte</span>
                </a>
                <a class="item" href="/quit">
                    <i class="power off icon"></i>
                    <span class="nav-home-link">Se deconnecter</span>
                </a>
            </div>
        </div>
    </div>
    <div class="mainContent">
        <div class="container">
            <div class="updateForm">
                <div class="header-user">
                    <div class=" circular ui  massive primary icon button"><i class="user icon"></i></div>
                    <div class="ui basic segment"><?php
                        echo $user->getNom();
                    ?></div>
                  
                </div>
                <div class="body">
                    <form action="" method="POST">
                    <?php if(isset($messageItem)) {
                      echo $messageItem;
                   }
                   ?>
                        <div class="section-groupe">
                            <div class="form-line">
                                <div class="description">Nom</div>
                                <div class="row center-item space-btw">
                                <input type="text" id="newName" name="newName" value=<?= '"'.$user->getNom().'"'; ?>>
                                
                            </div>
                            
                        </div>
                        <div class="section-groupe">
                            <div class="form-line">
                                <div class="description">Login</div>
                                <div class="row center-item space-btw">
                                <input type="text" id="newLogin" name="newLogin" value=<?= '"'.$user->getLogin().'"'; ?>>
                                
                            </div>
                            
                        </div>
                            <div class="ui hidden divider"></div>
                            <button class="ui labeled icon primary button">
                                <i class="edit icon"></i>
                                Confirmer
                            </button>
                            
                        </div>
                    </form>
                    <div class="updatePass">
                        <a href="/update-pass">Modifier son mot de passe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require "elements/footer.php";
?>