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
                    <h1>Liste des mouvements</h1>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Voir la liste des mouvements
                    </small>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                            <div>
                            <button class="btn btn-primary "  data-toggle="modal" data-target="#addEntrModal" style="display: none;"> <i class="fa fa-plus"></i> Ajouter</button>
                            <div class="space-6"></div>
                            <div id="userMessage">

                            </div>
                            <table class="table table-striped table-bordered table-hover"  id="entreprises-tables">
                                <thead class="full-width">
                                    <tr>
                                        <th></th>
                                        <th>Code analytique</th>
                                        <th>Imputation</th>
                                        <th>Libellé</th>
                                        <th>Montant Crédit</th>
                                        <th>Montant Débit</th>
                                        <th>Compte Débité</th>
                                        <th>Compte Débité</th>
                                        <th>Compte Débité</th>
                                        <th>Compte Crédité</th>
                                        <th>Compte Divisionnaire</th>
                                        <th>Pièce de Référence</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        foreach ($corps as $key => $value) {?>
                                            <tr>
                                                
                                                <td><?=$value->NumMouv?></td>
                                                <td><?=$value->T6_CodeAnal?></td>
                                                <td><?=$value->Imputation?></td>
                                                <td><?=$value->Libelle?></td>
                                                <td><?=$value->DMontant?></td>
                                                <td><?=$value->CMontant ?></td>
                                                <td><?=$value->DCompte?></td>
                                                <td><?=$value->CCompte?></td>
                                                <td><?=$value->CDivisionnaire?></td>
                                                <td><?=$value->NumEmail?></td>
                                                <td><?=$value->NumEmail?></td>
                                                <td><?=$value->NumEmail?></td>
                                                <td><?=$value->NumEmail?></td>
                                                <td><?=$value->NumEmail?></td>
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="green downloadPieces" href="#" identifiant="<?=$value->idCorpMouv?>">
                                                            <i class="ace-icon fa fa-download bigger-130"></i>
                                                        </a>
                                                        <a class="green editEntrBtn" href="#" identifiant="<?=$value->idCorpMouv?>">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red deleteEntrBtn" href="#" identifiant="<?=$value->idCorpMouv?>">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                    </div>
                                                    <div class="hidden-md hidden-lg">
                                                        <div class="inline pos-rel">
                                                            <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                            </button>

                                                            <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                <li>
                                                                    <a href="#" class="tooltip-info downloadPieces" data-rel="tooltip" title="View">
                                                                        <span class="blue">
                                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="tooltip-success editEntrBtn" data-rel="tooltip" title="Edit" entrepriseid="<?=$value->idEntreprise?>">
                                                                        <span class="green">
                                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="tooltip-error deleteEntrBtn" data-rel="tooltip" title="Delete" entrepriseid="<?=$value->idEntreprise?>">
                                                                        <span class="red">
                                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php }
                                    ?>
                                </tbody>
                                <tfoot class="full-width">
                                    
                                </tfoot>
                            </table>
                            <div class="space-6"></div>
                            <?php
                                if($userPerm->getComptaWrite() == "1") { ?>
                                    <a href="/feuille-imputation" class="btn btn-success">Passer écriture <i class="fa fa-arrow-right"></i></a>
                               <?php  }
                            ?>
                            </div>
                            <div class="modal fade" id="addEntrModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="addEntrModalLabel">Ajouter Entité</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" id="newEntrepriseForm">
                                            <div class="form-group">
                                                <label for="SCodeEntreprise">Code Entité</label>
                                                <input type="text" name = "SCodeEntreprise" id="SCodeEntreprise" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="SNomEntreprise">Nom de l'Entité</label>
                                                <input type="text" name="SNomEntreprise" id = "SNomEntreprise" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="RespoEntreprise">Responsable de l'Entité</label>
                                                <input type="text" name="RespoEntreprise" id="RespoEntreprise" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="SNumRue">Numero d'adresse</label>
                                                <input type="text" name="SNumRue" id="SNumRue" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="SNomRue">Rue</label>
                                                <input type="text" name="SNomRue" id="SNomRue" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="commune_idCommune">Commune</label>
                                                <input type="text" id="communeEntr" name="commune_idCommune" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="">Numero de Téléphone</label>
                                                <input type="text" name="SNumTel" id="SNumTel" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="NumEmail">Adresse e-mail</label>
                                                <input type="text" name="NumEmail"  class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <input type="hidden" name="entitede" class="form-control" value="<?php echo $userStd->entrepriseId?>">
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" id="submitEntrInfo">Enregistrer</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalEditEntr" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="addEntrModalLabel">Mise à jour Entité</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form action="" id="editEntrForm">
                                            <div class="form-group">
                                                    <label for="SCodeEntreprise">Code Entité</label>
                                                    <input type="text" name="SCodeEntreprise"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="SNomEntreprise">Nom de l'Entité</label>
                                                    <input type="text" name="SNomEntreprise"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="RespoEntreprise">Responsable de l'Entité</label>
                                                    <input type="text" name="RespoEntreprise"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="SNumRue">Numero d'adresse</label>
                                                    <input type="text" name="SNumRue"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="SNomRue">Rue</label>
                                                    <input type="text" name="SNomRue"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="commune_idCommune">Commune</label>
                                                    <input type="text" id="communeEntite" name="commune_idCommune" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="">Numero de Téléphone</label>
                                                    <input type="text" name="SNumTel"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NumEmail">Adresse e-mail</label>
                                                    <input type="text" name="NumEmail"  class="form-control">
                                                </div>
                                           </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-primary" id="confirmEntrEditionBtn">Confirmer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="modalEntrDelete" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="addEntrModalLabel">Confirmassion de Suppression</h4>
                                        </div>
                                        <div class="modal-body">
                                            Voulez-vous vraiment supprimer l'entreprise <span id="entrToRemoveName"></span>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                            <button type="button" class="btn btn-primary" id="destroyEntrBtn">Confirmer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>