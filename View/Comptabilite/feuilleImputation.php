<div id="nav-bar" class="navbar navbar-default ace-save-state">
    <div class="navbar-container ace-save-state" id="navbar-container">
        <button type="button" class="navbar-toggle menu-toggler pull-left">
            <span class="sr-only">Basculer la sideBar</span>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
            <div class="icon-bar"></div>
        </button>
        <div class="navbar-header pull-left">
            <a href="#" class="navbar-brand">
                <small>
                    <i class="fa fa-bank"></i>
                    Stereo Compte
                </small>
            </a>
        </div>
        <div class="navbar-buttons navbar-header pull-right" role="navigation">
            <ul class="nav ace-nav" style>
                <li class="light-blue">
                    <span id="dateNow">
                        <span id="dateDay"></span>
                        <span id="dateTime"></span>
                    </span>
                </li>
                <li class="light-blue dropdown-modal">
                    <a href="#" data-toggle="dropdown" class="dropdown-toggle">
                        <i class="fa fa-user"></i> <?= $user->getNom() ?>
                        <i class="ace-icon fa fa-caret-down"></i>
                    </a>
                    <ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close" style>
                        <li>
                            <a href="/Update">
                                <i class="ace-icon fa fa-user"></i>
                                Profil
                            </a>
                            
                        </li>
                        <li>
                            <a href="/quit">
                                <i class="ace-icon fa fa-power-off"></i>
                                Deconnexion
                            </a>
                            
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
<div class="main-container ace-save-state" id="main-container">
    <div class="main-content">
        <div class="main-content-inner">
            <div class="breadcrumbs ace-save-state" id="breadcrumbs"></div>
            <div class="page-content">
                <div class="page-header">
                    <h1>Feuille imputation</h1>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Passer écriture
                    </small>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="">
                            <div class="row bg-success pad-20">
                                <div class="col-md-3">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="DateMouv">Date du mouvement</label>
                                            <input type="text" name="DateMouv" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="DateOper">Code journal</label>
                                            <input type="text" name="DateOper" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="Exercice">Exercice</label>
                                            <input type="text" name="Exercice" class="form-control">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="CodeDoc">Code du document</label>
                                            <select type="text" name="CodeDoc" class="form-control">
                                            </select>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="NumDoc">Numéro du document</label>
                                            <input type="text" name="NumDoc" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="NomDoc">Nom du document</label>
                                            <input type="text" name="NomDoc" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="NumDoc1">Nom du document</label>
                                            <input type="text" name="NumDoc1" class="form-control">
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <form action="">
                                        <div class="form-group">
                                            <label for="DMontant">Montant débit</label>
                                            <input type="text" name="DMontant" class="form-control" disabled>
                                        </div>
                                    
                                        <div class="form-group">
                                            <label for="CMontant">Montant crédit</label>
                                            <input type="text" name="CMontant" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="FCMontant">Montant</label>
                                            <input type="text" name="FCMontant" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="Entite">Code Entité</label>
                                            <input type="text" name="Entite" class="form-control" disabled>
                                        </div>
                                        <div class="form-group">
                                            <label for="NomBeneficiaire">Bénéficiaire</label>
                                            <input type="text" name="NomBeneficiaire" class="form-control">
                                        </div>
                                        <div class="form-group">
                                            <label for="NomDebiteur">Débiteur</label>
                                            <input type="text" name="NomDebiteur" class="form-control">
                                        </div>
                                        
                                    </form>
                                </div>
                                <div class="col-md-3">
                                    <div>
                                        <button class="btn btn-primary form-control"><i class="fa fa-card"></i>Sauvegarder</button>
                                    </div>
                                    <div class="space-6"></div>
                                    <div>
                                        <button class="btn btn-danger form-control"><i class="fa fa-card"></i>Quitter</button>
                                    </div>
                                    <div class="space-6"></div>
                                    <div>
                                        <button class="btn btn-success form-control"><i class="fa fa-card"></i>Nouveau</button>
                                    </div>
                                </div>
                            </div>
                            <div class="row bg-info pad-20">
                                <div class="col-md-3">
                                    <div class="form-group">
                                        <label for="MotifGeneral">Motif Général</label>
                                        <input type="text" name="MotifGeneral" class="form-control">
                                    </div>
                                </div>
                                <div class="col-md-1">               
                                    <div class="radio">
                                    <label>
                                        <input type="radio" name="devise"  value="option1" checked>
                                        Franc Congolais
                                    </label>
                                    </div>
                                    <div class="radio">
                                    <label>
                                        <input type="radio" name="devise"  value="option2">
                                        Dollards
                                    </label>
                                    </div>
                                    
                                </div>
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <label for="TauxEuro">Taux Euro</label>
                                        <input type="text" name="TauxEuro" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="TauxEuro">Taux Euro</label>
                                        <input type="text" name="TauxEuro" class="form-control">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div>
                            <table class="table table-striped table-bordered table-hover">
                                <thead>
                                    <th>Code Analytique</th>
                                    <th>Imputation</th>
                                    <th>Compte Opération</th>
                                    <th>Designation</th>
                                    <th>Libellé Opération</th>
                                    <th>Montant Crédit</th>
                                    <th>Montant Dédit</th>
                                    <th>CD</th>
                                    <th>Compte Crédit</th>
                                    <th>Compte Débit</th>
                                    <th>Transite</th>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                        <td><input type="text"></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>