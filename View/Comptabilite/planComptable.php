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
                    <h1>Plan Comptable</h1>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Gerer le plan comptable
                    </small>
                </div>
                <div class="row">
                    <div id="contentPc" class="col-xs-12">
                        <div class="">
                            <div class="">
                                <div class="inverted menu" id="menuPc">
                                    <a href="#" class="active item">Plan comptable</a>
                                    <a href="#" class=" item">Afficher Comptes</a>
                                </div>
                            </div>
                            <div class="ui hidden divider"></div>
                            <div id="firstPcPage">
                                <form action="" id="planCompta" class="ui form">
                                    <div class="space-10"></div>
                                    <div class="ui grid">
                                        <div class="row">
                                            <div class="col-md-2">Numero</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="idPlanComptable" class="form-control" id="idPlanComptable" disabled>
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" disabled>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">Classe</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="Numclasse" class="form-control" id="Numclasse">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" disabled id="DesiClassel">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">Compte principal</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" id="ComptePrinci">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" disabled id="DesiComptePrinci">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">Sous Compte</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" class="form-control" id="SousCompte">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" disabled id="DesiSousCompte">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">Numero</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" id="CodeDivision">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" disabled id="DesiDivision">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">Famille</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text" name="idPlanComptable" class="form-control" id="CodeFamille">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" disabled id="DesiFamille">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">Code Operation</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" id="CompteOperation">
                                                </div>
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" disabled id="DesiOperation">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-2">Lettrage</div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <input type="text"  class="form-control" id="Lettrage4">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="ui divider"></div>
                                <div id="navPlanComptable" class="">
                                    <button class="btn btn-primary" id="prevBtn"><i class="angle left icon"></i> Précédant</button>
                                    <button class="btn btn-primary" id="nextBtn">Suivant <i class="angle right icon"></i></button>
                                </div>
                                <div class="space-10"></div>
                                <div>
                                    <div class="ui divider"></div>
                                    <div class="ui grid  stackable five column">
                                        <div class="column"><button class="btn btn-default">Plan Famille</button></div>
                                    </div>
                                </div>
                            </div>
                            <div id="userMessage">
                                
                            </div>
                            <div id="secondPcPage" style="display: none" >
                                <div class="space-10"></div>
                                <button class="btn btn-primary" id="addCompteBtn"><i class="fa fa-plus"></i>Nouveau</button>
                                <div class="space-6"></div>
                                <table class="table table-striped table-bordered table-hover" id="allCopmtesList">
                                    <thead class="">
                                        <tr>
                                            <th>Classe</th>
                                            <th>Code opération</th>
                                            <th>Désignation</th>
                                            <th>Compte principal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($plans as $key => $value) { ?>
                                            <tr id="line<?php echo $value->idPlanComptable ?>">
                                                <td><?php echo $value->Numclasse ?></td>
                                                <td><?php echo $value->CompteOperation   ?></td>
                                                <td><?php echo html_entity_decode($value->DesiOperation)  ?></td>
                                                <td><?php echo $value->ComptePrinci  ?></td>
                                                <td class="collapsing" >
                                                    <button class="ui basic  icon button editBtn" id="edit<?php echo $value->idPlanComptable ?>"><i class="edit green icon"></i></button>
                                                    <button class="ui basic  icon button deleteBtn" id="delete<?php echo $value->idPlanComptable ?>"><i class="trash alternate outline red icon"></i></button>
                                                </td>
                                            </tr>
                                        <?php  }
                                        ?>
                                    </tbody>
                                </table>
                                
                                <div class="ui modal compteForm" id="createNouveauCompteModal" style="top: 20%; bottom: 20%; left: 15%!important; right: 15%!important;">
                                    <i class="close icon"></i>
                                    <div class="header">Nouveau Compte</div>
                                    <div class="content">
                                        <div class="ui form" id="newCompteForm">
                                            
                                            <div class="field">
                                                <label for="">Compte opération</label>
                                                <input type="number" name="CompteOperation" id="CompteOperation">
                                            </div>
                                            <div class="field">
                                                <label for="">Désignation</label>
                                                <input type="text" name="DesiOperation" id="DesiOperation" autocomplete="off">
                                            </div>
                                            <input type="hidden" name="entiteId" value="<?=$entrepriseFound->idEntreprise?>">
                                        </div>
                                    </div>
                                    <div class="actions">
                                        <button class="btn btn-default closeModalBtn" id="cancelSauvegarde">Annuler</button>
                                        <button class="btn btn-primary" id="saveNewCompte"><i class="fa fa-check"></i> Enregistrer</button>
                                       
                                    </div>
                                </div>
                                <div class="ui modal newCompteComprincipal" style="top: 28%; bottom: 28%; left: 15%!important; right: 15%!important;">
                                    <i class="close icon"></i>
                                    <div class="header">Indiquez le compte principal</div>
                                    <div class="content" id="contentNewComptePc">
                                        <div class="ui form">
                                            <div class="field">
                                                <label for="newCompteCPNumber">Classe</label>
                                                <input type="number" id="newCompteCPNumber" placeholder="Ex: 40" class="two number">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button class="btn btn-default closeModalBtn">Annuler</button>
                                        <button class="btn btn-primary" id="valideNewCompteCPBtn"><i class="check icon"></i>Valider</button>
                                        
                                    </div>
                                </div>
                                <div class="ui hidden divider"></div>
                                <div class="ui modal UserMessage" style="margin-top: 20px;">
                                    <i class="close icon"></i>
                                    <div class="header"></div>
                                    <div class="content">
                                    </div>
                                    <div class="actions">
                                        <button class="ui primary  button" id="modalMessageBtn">Okay</button>
                                    </div>
                                </div>
                                <div class="ui modal submitCreation">
                                    <div class="header"></div>
                                    <div class="content"></div>
                                    <div class="actions">
                                        <div class="ui small labeled icon primary button" id="savePlanComptableBtn"><i class="save icon"></i> Confirmer</div>
                                        <div class="ui small labeled icon green button" id="ReopenFormBtn"><i class="edit icon"></i> Modifier</div>
                                        <div class="ui small labeled icon red button closeModalBtn"><i class="close icon"></i>Annuler</div>
                                    </div>
                                </div>
                                <div class="ui modal submitDestroy" style="top: 30%; bottom: 30%; left: 15%!important; right: 15%!important;">
                                    <i class="close icon"></i>
                                    <div class="header"></div>
                                    <div class="content"></div>
                                    <div class="actions">
                                    <div class="btn btn-default closeModalBtn"></i>Annuler</div>
                                        <div class="btn btn-primary" id="confirmDestroy"><i class="check icon"></i> Confirmer</div>
                                        
                                    </div>
                                </div>
                                <div class="ui padded divider"></div>
                                
                                <div class="ui very paddded hidden divider"></div>
                                <div class="ui very paddded hidden divider"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>