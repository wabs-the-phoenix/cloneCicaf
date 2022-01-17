<?php require "elements/header.php";?>
<div class="ui sidebar vertical inverted labeled icon menu">
    <div class="item">
        <a href="/admin-home">
            <i class="bars icon"></i>Menu
        </a>
        
        
    </div>
    <a href="/amortissement" class=" active item">
        <i class="building icon"></i>
        Biens
    </a>
    <a href="/categorie-journaux" class=" item">
        <i class="file alternate icon"></i>
        Réévaluations
    </a>
    <a href="#" class=" item">
        <i class="list alternate icon"></i>
        amortissements
    </a>
    <a href="#" class=" item">
        <i class="edit icon"></i>
        Exercice
    </a>
</div>
<div class="pusher">
    <div class="ui blue inverted segment">
        <div class="ui container">
            <div class="ui blue inverted labeled menu">
                <div class="item">
                    Logo Cicaf
                </div>
                <a href="#" class="item" id="menuBtn">
                    <i class="bars icon"></i>
                    Menu
                </a>
                <a class="item right" href= <?=$UpdateProfil ?>>
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
    <div class="ui pusher container">
        <div id="pageContent">
        </div>
    </div>
</div>
<?php if(isset($js)) {
    if(count($js) > 0) {
        foreach ($js as $key => $value) {
            echo $value;
        }
    }
    }?>
</body>