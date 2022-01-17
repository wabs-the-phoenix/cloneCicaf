<?php require "elements/header.php";?>
<div>
    <nav>
        <div class="container">
            <ul>
                <li><a href="/plan-comptable">
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
        <h1>Tous les Comptes</h1>
        <div class="bg-white pad4080 mainMenu">
            <div class="search-bar">
                <form action="" method="POST">
                    <input type="text" name="compteFinder" id="compteFinder" placeholder="Rechercher compte">
                </form>
            </div>
            <div class="mesComptes">
                <div class="header-board grid grid-5 mar40 bgGray pad510">
                    <div>Numero compte</div>
                    <div>Classe du compte</div>
                    <div>Compte principal</div>
                    <div>Code comptable</div>
                    <div>Designation du compte</div>
                </div>
                <div class="boardContent" id="comptesList">
                    <h1 class="text-center">Aucun compte trouve</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<?php require "elements/footer.php"; ?>