
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
                    <h1>Codes Analytique</h1>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Gerer les codes analytiques
                    </small>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                            <div>
                            <button class="btn btn-primary " data-toggle="modal" data-target="#addEntrModal"> <i class="fa fa-plus"></i> Ajouter</button>
                            <div class="space-6"></div>
                            <div id="userMessage">

                            </div>
                            <table class="table table-striped table-bordered table-hover"  id="entreprises-tables">
                                <thead class="full-width">
                                    <tr>
                                        <th>Designation</th>
                                        <th>Date</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        foreach ($codes as $key => $value) {?>
                                            <tr>
                                                <td><?=$value->DesiAnal?></td>
                                                <td><?=$value->DateAnal?></td>
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="green editEntrBtn" href="#" identifiant="<?=$value->idCompteAnalytique?>">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red deleteEntrBtn" href="#" identifiant="<?=$value->idCompteAnalytique?>">
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
                                                                    <a href="#" class="tooltip-success editEntrBtn" data-rel="tooltip" title="Edit" identifiant="<?=$value->idCompteAnalytique?>">
                                                                        <span class="green">
                                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="tooltip-error deleteEntrBtn" data-rel="tooltip" title="Delete" identifiant="<?=$value->idCompteAnalytique?>">
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
                                                <label for="SCodeEntreprise">Designation</label>
                                                <input type="text" name = "DesiAnal"  class="form-control">
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
                                                    <label for="DesiAnal">Designation</label>
                                                    <input type="text" name="DesiAnal"  class="form-control">
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
                                            Voulez-vous vraiment supprimer le code analytique <span id="entrToRemoveName"></span>
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