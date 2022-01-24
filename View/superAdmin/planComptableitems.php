
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
                    <h1>Gestion des éléments du plan comptables</h1>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Gérer les classes, comptes principaux, sous comptes, comptes divisionnaires et familles
                    </small>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="space-6">
                        </div>
                        <div id="userMessage">
                           
                        </div>
                        <div>
                            <div>
                                <div id="userMessage">

                                </div>
                                <h3>Classes</h3>
                                <button class="btn btn-primary " data-toggle="modal" data-target="#addClasseModal"> <i class="fa fa-plus"></i> Ajouter</button>
                                <div class="space-6"></div>
                                <table id="classes-tables" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code de classe</th>
                                            <th>Designation</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                        <?php
                                            foreach ($classes as $value) {?>
                                                <tr>
                                                    <td><?php echo html_entity_decode($value->CodeClasse)?></td>
                                                    <td><?php echo  html_entity_decode($value->Designation)?></td>
                                                    <td>
                                                                <div class="hidden-sm hidden-xs action-buttons">
                                                                   

                                                                    <a class="green editClassBtn" href="#" classeId="<?=$value->idClasse?>">
                                                                        <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                                    </a>

                                                                    <a class="red deleteClasseBtn" href="#" classeId="<?=$value->idClasse?>">
                                                                        <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                                    </a>
                                                                </div>

                                                                <div class="hidden-md hidden-lg">
                                                                    <div class="inline pos-rel">
                                                                        <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                            <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                                        </button>

                                                                        <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                            <!--<li>
                                                                                <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                                    <span class="blue">
                                                                                        <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                                    </span>
                                                                                </a>
                                                                            </li>-->

                                                                            <li>
                                                                                <a href="#" class="tooltip-success editClassBtn" data-rel="tooltip" title="Edit" classeId="<?=$value->idClasse?>">
                                                                                    <span class="green">
                                                                                        <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                                    </span>
                                                                                </a>
                                                                            </li>

                                                                            <li>
                                                                                <a href="#" class="tooltip-error deleteClasseBtn" data-rel="tooltip" title="Delete" classeId="<?=$value->idClasse?>">
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
                                </table>
                                <!-- modal ajout classes -->
                                <div class="modal fade" id="addClasseModal" tabindex="-1" role="dialog" aria-labelledby="addClasseModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="">Ajouter une Classe</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" id="newClassForm">
                                                <div class="form-group">
                                                    <label for="CodeClasse">Code de la classe</label>
                                                    <input type="text" name="CodeClasse" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Designation">Designation</label>
                                                    <input type="text" name="Designation" class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitClasseInfo">Enregistrer</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalEditClasse" tabindex="-1" role="dialog" aria-labelledby="editClasseLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="">Modifier  la classe</h4>
                                            </div>
                                            <div class="modal-body">
                                            <form action="" method="POST" id="editClasseForm">
                                                <div class="form-group">
                                                    <label for="Designation">Nom de l'entreprise</label>
                                                    <input type="text" name="Designation" class="form-control">
                                                </div>
                                            </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="submitEditClasseBtn">Enregistrer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalClasseDelete" tabindex="-1" role="dialog" aria-labelledby="deleteClassLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="addEntrModalLabel">Confirmassion de Suppression</h4>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer la classe <span id="classeToRemoveName"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-primary" id="destroyClassBtn">Confirmer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3>Comptes Principaux</h3>
                                <button class="btn btn-primary " data-toggle="modal" data-target="#addComptePrincipal"> <i class="fa fa-plus"></i> Ajouter</button>
                                <div class="space-6"></div>
                                <table id="comptesPrincipaux-tables" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code Compte principaux</th>
                                            <th>Designation</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                        <?php
                                            foreach ($comptePrincipaux as $value) {?>
                                                <tr>
                                                    <td><?php echo html_entity_decode($value->CodeComptePrincipal)?></td>
                                                    <td><?php echo  html_entity_decode($value->DesignationCompte)?></td>
                                                    <td>
                                                        <div class="hidden-sm hidden-xs action-buttons">

                                                            <a class="green editCPBtn" href="#" identifiant="<?=$value->idComptePrincipal?>">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>

                                                            <a class="red deleteCPBtn" href="#" identifiant="<?=$value->idComptePrincipal?>">
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
                                                                        <a href="#" class="tooltip-success editCPBtn" data-rel="tooltip" title="Edit" identifiant="<?=$value->idComptePrincipal?>">
                                                                            <span class="green">
                                                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                            </span>
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="#" class="tooltip-error deleteCPBtn" data-rel="tooltip" title="Delete" identifiant="<?=$value->idComptePrincipal?>">
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
                                </table>
                                <!-- modal ajout comptes principaux -->
                                <div class="modal fade" id="addComptePrincipal" tabindex="-1" role="dialog" aria-labelledby="addComptePrincipalModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="addComptePrincipalModalLabel">Ajouter Compte principal</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" id="newComptePrincipalForm">
                                                <div class="form-group">
                                                    <label for="SCodeEntreprise">Code du Compte Principal</label>
                                                    <input type="text" name="CodeComptePrincipal" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="DesignationCompte">Designation</label>
                                                    <input type="text" name="DesignationCompte" class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitCPInfo">Enregistrer</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalCPEdition" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="">Editer classe</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form id="editCPForm">
                                                    <div class="form-group">
                                                        <label for="DesignationCompte">Nom</label>
                                                        <input type="text" name="DesignationCompte"  class="form-control">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-primary" id="submitCPEditionBtn">Enregistrer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalCPDeleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="cpDeleteConfirmationLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="cpDeleteConfirmationLabel">Confirmassion de Suppression</h4>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer le compte principal <span id="comptePrincipalName"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-primary" id="destroyCPBtn">Confirmer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3>Sous Comptes</h3>
                                <button class="btn btn-primary " data-toggle="modal" data-target="#addSousCompteModal"> <i class="fa fa-plus"></i> Ajouter</button>
                                <div class="space-6"></div>
                                <table id="sousComptes-tables" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code Sous Comptes</th>
                                            <th>Désignation</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                        <?php
                                            foreach ($sousComptes as $value) {?>
                                                <tr>
                                                    <td><?php echo html_entity_decode($value->CodeSousCompte)?></td>
                                                    <td><?php echo  html_entity_decode($value->Designation)?></td>
                                                    <td>
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <a class="green editSCBtn" href="#" identifiant="<?=$value->idSousCompte?>">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>

                                                            <a class="red deleteSCBtn" href="#" identifiant="<?=$value->idSousCompte?>">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        </div>

                                                        <div class="hidden-md hidden-lg">
                                                            <div class="inline pos-rel">
                                                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                                </button>

                                                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                    <!--<li>
                                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                            <span class="blue">
                                                                                <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                            </span>
                                                                        </a>
                                                                    </li>-->

                                                                    <li>
                                                                        <a href="#" class="tooltip-success editSCBtn" data-rel="tooltip" title="Edit" identifiant="<?=$value->idSousCompte?>">
                                                                            <span class="green">
                                                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                            </span>
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="#" class="tooltip-error deleteSCBtn" data-rel="tooltip" title="Delete" identifiant="<?=$value->idSousCompte?>">
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
                                </table>
                                <!-- modal ajout classes -->
                                <div class="modal fade" id="addSousCompteModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="">Ajouter Sous Compte</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" id="newSCForm">
                                                <div class="form-group">
                                                    <label for="CodeSousCompte">Code du Sous compte</label>
                                                    <input type="number" name="CodeSousCompte"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="Designation">Designation</label>
                                                    <input type="text" name="Designation"  class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitSCInfo">Enregistrer</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="editSousCompteModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="editSCModalLabel">Modifier le sous compte</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" id="editSCForm">
                                                <div class="form-group">
                                                    <label for="Designation">Designation</label>
                                                    <input type="text" name="Designation"  class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitSCEditionBtn">Enregistrer</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalSCDeleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="deleteModalLabel">Confirmer la Suppression</h4>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer le sous compte <span id="sousCompteRemoveName"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-primary" id="destroySCBtn">Confirmer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <h3>Compte Divisionnaire</h3>
                                <button class="btn btn-primary " data-toggle="modal" data-target="#addCDModal"> <i class="fa fa-plus"></i> Ajouter</button>
                                <div class="space-6"></div>
                                <table id="compteDivi-tables" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code compte divisionnaire</th>
                                            <th>Designation</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                        <?php
                                            foreach ($compteDivisionnaires as $value) {?>
                                                <tr>
                                                    <td><?php echo html_entity_decode($value->CodeCompteDivisionnaire)?></td>
                                                    <td><?php echo  html_entity_decode($value->DesigantionCD)?></td>
                                                    <td>
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                           

                                                            <a class="green editCDBtn" href="#" identifiant="<?=$value->idCompteDivisionnaire?>">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>

                                                            <a class="red deleteCDBtn" href="#" identifiant="<?=$value->idCompteDivisionnaire?>">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                        </div>

                                                        <div class="hidden-md hidden-lg">
                                                            <div class="inline pos-rel">
                                                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                                </button>

                                                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                    <!--<li>
                                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                            <span class="blue">
                                                                                <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                            </span>
                                                                        </a>
                                                                    </li>-->

                                                                    <li>
                                                                        <a href="#" class="tooltip-success editCDBtn" data-rel="tooltip" title="Edit" identifiant="<?=$value->idCompteDivisionnaire?>">
                                                                            <span class="green">
                                                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                            </span>
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="#" class="tooltip-error deleteCDBtn" data-rel="tooltip" title="Delete" identifiant="<?=$value->idCompteDivisionnaire?>">
                                                                            <span class="red">
                                                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            <?php }
                                        
                                        ?>
                                    </tbody>
                                </table>
                                <!-- modal ajout classes -->
                                <div class="modal fade" id="addCDModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="addCDModalLabel">Ajouter Compte Divisionnaire</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" id="newCDForm">
                                                <div class="form-group">
                                                    <label for="CodeCompteDivisionnaire">Code Compte Divisionnaire</label>
                                                    <input type="number" name="CodeCompteDivisionnaire"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="DesigantionCD">Designation</label>
                                                    <input type="text" name="DesigantionCD"  class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitCompteDInfo">Enregistrer</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="editCompteDiviModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="editCompteDiviModalLabel">Modifier le sous compte</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" id="editCDForm">
                                                <div class="form-group">
                                                    <label for="DesigantionCD">Designation</label>
                                                    <input type="text" name="DesigantionCD"  class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitCDEditionBtn">Enregistrer</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="modalCDDeleteConfirmation" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title red" id="">Confirmer la Suppression</h4>
                                            </div>
                                            <div class="modal-body">
                                                <i class="fa fa-exclamation-triangle red"></i> Voulez-vous vraiment supprimer le  compte divisionnaire<span id="cdRemoveName"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-primary" id="destroyCDBtn">Confirmer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- <div>
                                <h3>Familles</h3>
                                <button class="btn btn-primary " data-toggle="modal" data-target="#addFamilleModal"> <i class="fa fa-plus"></i> Ajouter</button>
                                <div class="space-6"></div>
                                <table id="familles-tables" class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Code famille</th>
                                            <th>designation</th>
                                            <th></th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    
                                        <?php
                                            foreach ($familles as $value) {?>
                                                <tr>
                                                    <td class="center">
                                                        <label class="pos-rel">
                                                            <input type="checkbox" class="ace" id="<?=$value->idEntreprise?>" name="<?=$value->IdEntreprise?>" />
                                                            <span class="lbl"></span>
                                                        </label>
                                                    </td>
                                                    <td><?php echo html_entity_decode($value->CodeCompteFamille)?></td>
                                                    <td><?php echo  html_entity_decode($value->DesigantionCompteFamille)?></td>
                                                    <td>
                                                        <div class="hidden-sm hidden-xs action-buttons">
                                                            <a class="dark blockActiveBtn" href="#" indentifiant="<?=$value->idCompteFamille?>">
                                                                <i class="ace-icon fa fa-<?php echo $value->status == 1? "check" : "ban";?> bigger-130"></i>
                                                            </a>

                                                            <a class="green editEntrBtn" href="#" indentifiant="<?=$value->idCompteFamille?>">
                                                                <i class="ace-icon fa fa-pencil bigger-130"></i>
                                                            </a>

                                                            <a class="red deleteEntrBtn" href="#" indentifiant="<?=$value->idCompteFamille?>">
                                                                <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                            </a>
                                                            <a class="blue addAdminBtn" href="#" indentifiant="<?=$value->idCompteFamille?>" data-target="#modalAdmin">
                                                                <i class="ace-icon fa fa-user-plus bigger-130"></i>
                                                            </a>
                                                        </div>

                                                        <div class="hidden-md hidden-lg">
                                                            <div class="inline pos-rel">
                                                                <button class="btn btn-minier btn-yellow dropdown-toggle" data-toggle="dropdown" data-position="auto">
                                                                    <i class="ace-icon fa fa-caret-down icon-only bigger-120"></i>
                                                                </button>

                                                                <ul class="dropdown-menu dropdown-only-icon dropdown-yellow dropdown-menu-right dropdown-caret dropdown-close">
                                                                    <!--<li>
                                                                        <a href="#" class="tooltip-info" data-rel="tooltip" title="View">
                                                                            <span class="blue">
                                                                                <i class="ace-icon fa fa-search-plus bigger-120"></i>
                                                                            </span>
                                                                        </a>
                                                                    </li>-->

                                                                    <li>
                                                                        <a href="#" class="tooltip-success editEntrBtn" data-rel="tooltip" title="Edit" indentifiant="<?=$value->idCompteFamille?>">
                                                                            <span class="green">
                                                                                <i class="ace-icon fa fa-pencil-square-o bigger-120"></i>
                                                                            </span>
                                                                        </a>
                                                                    </li>

                                                                    <li>
                                                                        <a href="#" class="tooltip-error deleteEntrBtn" data-rel="tooltip" title="Delete" indentifiant="<?=$value->idCompteFamille?>">
                                                                            <span class="red">
                                                                                <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                            </span>
                                                                        </a>
                                                                    </li>
                                                                    <li>
                                                                        <a href="#modalAdmin" class="tooltip-error addAdminBtn" data-rel="tooltip" title="Delete" data-toggle="modal"  indentifiant="<?=$value->idCompteFamille?>">
                                                                            <span class="blue">
                                                                                <i class="ace-icon fa fa-user-plus bigger-120"></i>
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
                                <!--</table> -->
                                <!-- modal ajout famille -->
                                <!--<div class="modal fade" id="addFamilleModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="">Ajouter Compte Divisionnaire</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" id="newFamilleForm">
                                                <div class="form-group">
                                                    <label for="CodeCompteFamille">Code Famille</label>
                                                    <input type="number" name="CodeCompteFamille"  class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="DesigantionCompteFamille">Designation</label>
                                                    <input type="number" name="DesigantionCompteFamille"  class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitFamilleInfo">Enregistrer</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="editFamilleModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="editCompteDiviModalLabel">Modifier la famille</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" id="editCDForm">
                                                <div class="form-group">
                                                    <label for="DesigantionCompteFamille">Designation</label>
                                                    <input type="number" name="DesigantionCompteFamille"  class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitFamilleEditionBtn">Enregistrer</button>
                                        </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="confirmDeleteFamilleModal" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                                <h4 class="modal-title" id="">Confirmer la Suppression</h4>
                                            </div>
                                            <div class="modal-body">
                                                Voulez-vous vraiment supprimer la famille<span id="FamilleRemoveName"></span>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                                                <button type="button" class="btn btn-primary" id="destroyFamilleBtn">Confirmer</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>