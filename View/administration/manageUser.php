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
                    <h1>Gestion des utilisateurs</h1>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Gerer les utilisateurs
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
                                        <th>Nom</th>
                                        <th>Code</th>
                                        <th>Rôle</th>
                                        <th>Comptabilité</th>
                                        <th>Bugdet</th>
                                        <th>Personnel</th>
                                        <th>Amortissement</th>
                                        <th>Entreprise</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php
                                        foreach ($userManageables as $key => $value) {?>
                                            <tr>
                                                <td><?=$value->nom?></td>
                                                <td><?=$value->specialCode?></td>
                                                <td><?=$value->role?></td>
                                                <?php
                                                        $somePerms = array_filter($permissions, function($k) use ($value) {
                                                            if ($k->userId == $value->idUser) {
                                                                return $k;
                                                            }
                                                        });
                                                        $thePerm = array_shift($somePerms); ?>
                                                        <td>
                                    
                                                            <input type="checkbox" value="<?=$thePerm->comptaRead?>" name="comptaRead" <?php
                                                                if ($thePerm->comptaRead == "1") {
                                                                    echo "checked";
                                                                }
                                                            ?>> <label for="comptaRead">Lecture</label>
                                                            <input type="checkbox" value="<?=$thePerm->comptaWrite?>" name="comptaWrite" <?php
                                                                if ($thePerm->comptaWrite == "1") {
                                                                    echo "checked";
                                                                }
                                                            ?>> <label for="comptaWrite">Ecriture</label>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" value="<?=$thePerm->budgetRead?>" name="budgetRead" <?php
                                                                if ($thePerm->budgetRead == "1") {
                                                                    echo "checked";
                                                                }
                                                            ?>> <label for="budgetRead">Lecture</label>
                                                            <input type="checkbox" value="<?=$thePerm->budgetWrite?>" name="budgetWrite" <?php
                                                                if ($thePerm->budgetWrite == "1") {
                                                                    echo "checked";
                                                                }
                                                            ?>>  <label for="budgetWrite">Ecriture</label>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" value="<?=$thePerm->personnelRead?>" name="personnelRead" <?php
                                                                if ($thePerm->personnelRead == "1") {
                                                                    echo "checked";
                                                                }
                                                            ?>> <label for="personnelRead">Lecture</label>
                                                            <input type="checkbox" value="<?=$thePerm->personnelWrite?>" name="personnelWrite" <?php
                                                                if ($thePerm->personnelWrite == "1") {
                                                                    echo "checked";
                                                                }
                                                            ?>>  <label for="personnelWrite">Ecriture</label>
                                                        </td>
                                                        <td>
                                                            <input type="checkbox" value="<?=$thePerm->amortissementRead?>" name="amortissementRead" <?php
                                                                if ($thePerm->amortissementRead == "1") {
                                                                    echo "checked";
                                                                }
                                                            ?>> <label for="amortissementRead">Lecture</label>
                                                            <input type="checkbox" value="<?=$thePerm->amortissementWrite?>" name="amortissementWrite" <?php
                                                                if ($thePerm->amortissementWrite == "1") {
                                                                    echo "checked";
                                                                }
                                                            ?>>  <label for="amortissementWrite">Ecriture</label>
                                                        </td>
                                                        <?php

                                                
                                                ?>
                                                <td>
                                                    <div class="hidden-sm hidden-xs action-buttons">
                                                       

                                                        <a class="red deleteEntrBtn" href="#" identifiant="<?=$value->idUser?>">
                                                            <i class="ace-icon fa fa-trash-o bigger-130"></i>
                                                        </a>
                                                        <a class="blue saveUserPermBtn" href="#" identifiant="<?=$value->idUser?>">
                                                            <i class="ace-icon fa fa-save bigger-130"></i>
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
                                                                    <a href="#" class="tooltip-error deleteEntrBtn" data-rel="tooltip" title="Delete" identifiant="<?=$value->idUser?>">
                                                                        <span class="red">
                                                                            <i class="ace-icon fa fa-trash-o bigger-120"></i>
                                                                        </span>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="#" class="tooltip-error saveUserPermBtn" data-rel="tooltip" title="Delete" identifiant="<?=$value->idUser?>">
                                                                        <span class="red">
                                                                            <i class="ace-icon fa fa-save bigger-120"></i>
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
                                                <label for="nom">Nom</label>
                                                <input type="text" name="nom"  class="form-control" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="login">Login</label>
                                                <input type="text" name="login"  class="form-control" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="specialCode">Code</label>
                                                <input type="text" name="specialCode"  class="form-control" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="email">Email</label>
                                                <input type="email" name="email"  class="form-control" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="entrepriseId">Entité</label>
                                                <input type="text" name="entrepriseId"  class="form-control" autocomplete="off">
                                            </div>
                                            <div class="form-group">
                                                <label for="role">Responsable de l'Entité</label>
                                                <select  name="role"  class="form-control">
                                                    <?php
                                                        foreach ($roles as $key => $v) {?>
                                                            <option value="<?=$v?>"><?=$v?></option>
                                                       <?php }
                                                    ?>
                                                </select>
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