<?php require "elements/header.php";?>
<div>
    <nav>
        <div class="container">
            <ul>
                <li><a href="/comptabilite-menu">
                    <img src="assets/img/arrow.png" alt="fleche" class="icoNav">
                    <span class="nav-home-link">Home</span>
                </a></li>
                <li><a href= "Update?role=admin" class="active">
                    <img src="assets/img/user.png" alt="fleche" class="icoNav">
                    <span class="nav-home-link">Mon Compte</span>
                </a></li>
            </ul>
        </div>
    </nav>
    <div class="container pad60 bgGray">
        <div  class="bg-white pad40">
            <div class="head">
                <h1>Feuille d'imputation</h1>
            </div>
            <div class="header">
                <h2>Entetes</h2>
                <div class="header-content">
                    <div class="grayLine row">
                        <div class="row">
                            <div class="grid">
                                <form action="" method="POST" class="grid grid-2-s75">
                                    <div>Numero Mouvement</div>
                                    <div>1</div>
                                    <label for="">Date du mouvement</label>
                                    <input type="text">
                                    <label for="">Code du mouvement</label>
                                    <select name="" id=""></select>
                                    <label for="">Exercice</label>
                                    <input type="text">
                                </form>
                            </div>
                            <div>
                                <form action="" method="POST" >
                                    <div class="grid grid-2-s75">
                                        <label for="">Code du document</label>
                                        <select name="" id=""></select>
                                    </div>
                                    <div class="grid grid-2-s75">
                                        <label for="">Numero document</label>
                                        <input type="text">
                                    </div>
                                </form>
                            </div>
                            <div>
                                <form action="" method="POST">
                                    <div class="grid grid-2-s75">
                                        <div>Debit:</div>
                                        <div>1000</div>
                                    </div>
                                    <div class="grid grid-2-s75">
                                        <div>Credit:</div>
                                        <div>1000</div>
                                    </div>
                                    <div class="grid grid-2-s75">
                                        <div>Entite</div>
                                        <div>Cicaf Kinshasa</div>
                                    </div>
                                    <div class="grid grid-2-s75">
                                        <label for="">Beneficiaire</label>
                                        <input type="text">
                                    </div>
                                    <div class="grid grid-2-s75">
                                        
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "elements/footer.php"; ?>