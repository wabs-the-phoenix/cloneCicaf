<?php require "elements/header.php";?>
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
                    <?php
                            if(isset($messageItem)) {
                                echo $messageItem;
                            }
                        ?>
                    <form action="" method="POST" class="ui form">
                        
                        <div class="section-groupe">
                            <div class="section">
                                <div class="description">Ancien mot  de passe</div>
                                <div>
                                    <input type="password" id="oldPass" name="oldPass" class="row-all">
                                
                                </div>
                            </div>
                            <div class="section">
                                <div class="description">Nouveau mot de passe</div>
                                <div>
                                    <input type="password" id="newPass" name="newPass" class="row-all">
                                   
                                </div>
                            </div>
                            <div class="section">
                                <div class="description">Confirmer le mot de passe</div>
                                <div >
                                    <input type="password" id="confPass" name="confPass" class="row-all">
                                   
                                </div>
                            </div>
                            <button class="ui primary labeled icon button">
                                <i class="edit icon"></i>
                                Confirmer
                            </button>
                        </div>
                    </form>
                   
                </div>
            </div>
        </div>
    </div>
</div>
<?php
    require "elements/footer.php";