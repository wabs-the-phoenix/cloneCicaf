<?php
require "elements/header.php";?>

<div class=" all">
    <div class="ui blue inverted segment">
        <div class="ui container">
            <div class="ui blue inverted labeled menu">
                <div class="item">
                    Logo Cicaf
                </div>
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
    <div class="ui hidden divider"></div>
    <div class="ui hidden divider"></div>
    <div class="ui container">
        <div class="ui two column stackable grid">
           <div class="wide column">
                <a href="comptabilite-menu" class="gridEl">
                    <div class="elContainer">
                        <h2>COMPTABILITE</h2>
                        <div class="space-btw row">
                            <div class="description-light">
                                Accéder dans journal, le grand livre, passer des écritures et ajouter des comptes
                            </div>
                            <div>
                                <img src="assets/img/finance.png" alt="diagnostic" width="50px" height="50px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="wide column">
                <a href="personnel" class="gridEl">
                    <div class="elContainer">
                        <h2>GESTION DU PERSONNEL</h2>
                        <div class="space-btw row">
                            <div class="description-light">
                                Gestion de ressources humaines. Gestion informatisée du personnel et de la paie
                            </div>
                            <div>
                                <img src="assets/img/group.png" alt="diagnostic" width="50px" height="50px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="wide column">
                <a href="Budget" class="gridEl">
                    <div class="elContainer">
                        <h2>GESTION BUDGETAIRE</h2>
                        <div class="row space-btw">
                            <div class="description-light">
                            Gestion et contrôle budgetaire
                            </div>
                            <div>
                                <img src="assets/img/wallet.png" alt="diagnostic" width="50px" height="50px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="wide column">
                <a href="#" class="gridEl">
                    <div class="elContainer">
                        <h2>DIAGNOSTIC DES ETATS FINANCIERS</h2>
                        <div class="space-btw row">
                            <div class="description-light">
                                Rrem ipsum consequuntur aliquam, at recusandae, numquam officiis enim porro.
                            </div>
                            <div>
                                <img src="assets/img/coin.png" alt="diagnostic" width="50px" height="50px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="wide column">
                <a href="amortissement" class="gridEl">
                    <div class="elContainer">
                        <h2>AMORTISSEMENT </h2>
                        <div class="space-btw row">
                            <div class="description-light">
                                Gestion d'amortissement des biens
                            </div>
                            <div>
                                <img src="assets/img/bars.png" alt="diagnostic" width="50px" height="50px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
            <div class="wide column">
                <a href="/user-manager" class="gridEl">
                    <div class="elContainer">
                        <h2>ADMINISTRATION</h2>
                        <div class="row space-btw">
                            <div class="description-light">
                            pudiandae , at recusandae, numquam officiis enim porro.
                            </div>
                            <div>
                                <img src="assets/img/administrator.png" alt="diagnostic" width="50px" height="50px">
                            </div>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <div class="ui hidden divider"></div>

<?php
    require "elements/footer.php";
?>