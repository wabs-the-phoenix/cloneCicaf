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
                    <h1>Categorie des journaux</h1>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Gerer les entités
                    </small>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="ui  divider"></div>
                        <div class="ui hidden divider"></div>
                        <div class= "">
                        <div class="board">
                                <div id="userMessage">
                                    
                                </div>
                                <button class="btn btn-primary " data-toggle="modal" data-target="#addJournalModal"> <i class="fa fa-plus"></i> Ajouter</button>
                                <div class="space-6"></div>
                                <div class="ui hidden divider"></div>
                                <table class="table table-striped table-bordered table-hover" id="journauxTable">
                                    <thead>
                                        <th>Code Journal</th>
                                        <th>Nom du journal</th>
                                        <th></th>
                                    </thead>
                                    <tbody id="journauxContent">
                                    <?php 
                                        foreach ($categories as $key => $value) {?>
                                            <tr>
                                                <td class="center aligned">
                                                    <?php echo $value->CodeJournal;?>
                                                </td>
                                                <td>
                                                    <?php echo html_entity_decode($value->NomJournal);?>
                                                </td>
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                        <a class="blue searchBtn" href="#" identifiant="<?=$value->idCategorieJournaux?>">
                                                            <i class="ace-icon fa fa-search-plus bigger-130"></i>
                                                        </a>
                                                        <a class="green editJournalBtn" href="#" identifiant="<?=$value->idCategorieJournaux?>">
                                                            <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                        </a>

                                                        <a class="red deleteJournalBtn" href="#" identifiant="<?=$value->idCategorieJournaux?>">
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
                                                                    <a href="#" class="tooltip-info" data-rel="tooltip" title="View" identifiant="<?=$value->idCategorieJournaux?>">
                                                                        <span class="blue">
                                                                            <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="tooltip-success editEntrBtn" data-rel="tooltip" title="Edit" identifiant="<?=$value->idCategorieJournaux?>">
                                                                        <span class="green">
                                                                            <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="#" class="tooltip-error deleteEntrBtn" data-rel="tooltip" title="Delete" identifiant="<?=$value->idCategorieJournaux?>">
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
                                        <?php } ?>
                                    </tbody>
                                    <tfoot class="full-width">
                                        
                                    </tfoot>
                                </table>
                                <div class="modal fade" id="addJournalModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="addEntrModalLabel">Ajouter journal</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" id="addJournalForm">
                                                <div class="form-group">
                                                    <label for="CodeJournal">Code du journal</label>
                                                    <input type="text"name="CodeJournal" class="form-control oneCharString upperCase" autocomplete="off">
                                                </div>
                                                <div class="form-group">
                                                    <label for="NomJournal">Nom du journal</label>
                                                    <input type="text"name="NomJournal" class="form-control letterString" autocomplete="off">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitJournalBtn">Enregistrer</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="journalDetailsModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="">Détails du journal</h4>
                                    </div>
                                    <div class="modal-body">
                                        <h5 class="bold">Journal <span id="journalCodeDetail"></span> - <span id="journalNomDetail"></span></h5>
                                       <h6 class="bold">Utilisateur(s) autorisé(s)</h6>
                                        <table class="table table-striped table-bordered table-hover">
                                           <thead>
                                                <th>Nom</th>
                                                <th>Role</th>
                                           </thead>
                                           <tbody id="respoList">

                                           </tbody>
                                       </table>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="deleteJournalModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="">Détails du journal</h4>
                                    </div>
                                    <div class="modal-body">
                                        Voulez-vous supprimer le journal <span id="journalToRemoveName" class="bold"></span>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitDeletionBtn">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="editJournalModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="">Détails du journal</h4>
                                    </div>
                                    <div class="modal-body">
                                       <form action="">
                                           <div class="form-group">
                                               <label for="NomJournal"></label>
                                               <input type="text" name="NomJournal" id="changeJournalName" class="form-control letterStringValue">
                                           </div>
                                       </form>
                                    </div>
                                    <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitEditionBtn">Supprimer</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui hidden divider"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>