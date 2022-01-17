<?php require "elements/header.php";?>
<div class="ui sidebar vertical inverted labeled icon menu">
    <div class="item">
        <a href="/admin-home">
            <i class="bars icon"></i>Menu
        </a>      
        
    </div>
    <a href="/identifier-entreprise" class=" active item">
        <i class="building icon"></i>
        Entreprise
    </a>
    <a href="/categorie-journaux" class=" item">
        <i class="file alternate icon"></i>
        Journaux
    </a>
    <a href="/plan-comptable" class=" item">
        <i class="list alternate icon"></i>
        Plan comptable
    </a>
    <a href="/exercices" class=" item">
        <i class="edit icon"></i>
        Exercice
    </a>
    <a href="#" class=" item">
        <i class="print icon"></i>
        Impression des etats
    </a>
    <a href="#" class=" item">
        <i class="book icon"></i>
        Grand Livre
    </a>
</div>
<div class="pusher">
    <div class="ui blue  inverted segment not radius">
        <div class="ui container">
            <div class="ui  blue inverted labeled menu">
                <div class="item">
                    Logo Cicaf
                </div>
                <a href="#" class="item" id="menuBtn">
                    <i class="bars icon"></i>
                    Menu
                </a>
                <a class="item right" href="/admin-home">
                    <i class="left arrow icon"></i>
                    <span class="nav-home-link">Retour</span>
                </a>
                <a class="item " href= <?=$UpdateProfil ?>>
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
    <div class="ui container">
        <div id="pageContent">

        </div>
    </div>
    <div class="ui hidden divider"></div>
    
</div>

<?php if(isset($js)) {
    if(count($js) > 0) {
        foreach ($js as $key => $value) {
            echo $value;
        }
    }
    }?>
</body>