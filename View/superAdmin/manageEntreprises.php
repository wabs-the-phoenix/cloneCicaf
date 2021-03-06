
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
                    <h1>Entreprises</h1>
                    <small>
                        <i class="ace-icon fa fa-angle-double-right"></i>
                        Voir les statistiques relatives aux entreprises
                    </small>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <div class="space-6">
                        </div>
                        <div id="userMessage">
                           
                        </div>
                        <div>
                            <button class="btn btn-primary " data-toggle="modal" data-target="#addEntrModal"> <i class="fa fa-plus"></i> Ajouter</button>
                            <div class="space-6"></div>
                            <table id="entreprises-tables" class="table table-striped table-bordered table-hover">
                                <thead>
                                    <tr>
                                        <th class="center">
                                            <label class="pos-rel">
                                                <input type="checkbox" class="ace" id="allchecks"/>
                                                <span class="lbl"></span>
                                            </label>
                                        </th>
                                        <th>Code entreprise</th>
                                        <th>Nom de l'entreprise</th>
                                        <th>Type de l'entreprise</th>
                                        <th>Administrateur</th>
                                        <th></th>
                                    </tr>
                                </thead>

                                <tbody>
                                  
                                    <?php
                                        foreach ($entrs as $value) {?>
                                            <tr>
                                                <td class="center">
                                                    <label class="pos-rel">
                                                        <input type="checkbox" class="ace" id="<?=$value->idEntreprise?>" name="<?=$value->IdEntreprise?>" />
                                                        <span class="lbl"></span>
                                                    </label>
                                                </td>
                                                <td><?php echo html_entity_decode($value->SCodeEntreprise)?></td>
                                                <td><?php echo  html_entity_decode($value->SNomEntreprise)?></td>
                                                <td><?php echo html_entity_decode($value->TypeEntreprise)?></td>
                                                <td><?php
                                                   
                                                    $arrayAdmin = array_filter($admins, function($k) use ($value) {
                                                        return $k->entrepriseId == $value->idEntreprise;
                                                    });
                                                   /* echo '<pre>';
                                                    var_dump($admins[0]->entrepriseId);
                                                    echo '</pre>';*/
                                                    $ad = NULL;
                                                    if (count($arrayAdmin) > 0) {
                                                        $ad = array_shift($arrayAdmin);
                                                    }
                                                    if($ad == NULL) {
                                                        echo "";
                                                    }
                                                    else {
                                                        echo $ad->nom;
                                                    }
                                                ?></td>
                                                <td>
															<div class="hidden-sm hidden-xs action-buttons">
																<a class="dark blockActiveBtn" href="#" entrepriseid="<?=$value->idEntreprise?>">
																	<i class="ace-icon fa fa-<?php echo $value->status == 1? "check" : "ban";?> bigger-130"></i>
																</a>

																<a class="green editEntrBtn" href="#" entrepriseid="<?=$value->idEntreprise?>">
																	<i class="ace-icon fa fa-pencil bigger-130"></i>
																</a>

																<a class="red deleteEntrBtn" href="#" entrepriseid="<?=$value->idEntreprise?>">
																	<i class="ace-icon fa fa-trash-o bigger-130"></i>
																</a>
                                                                <a class="blue addAdminBtn" href="#" id="addAdminlg<?=$value->idEntreprise?>" data-target="#modalAdmin">
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
                                                                        <li>
																			<a href="#modalAdmin" class="tooltip-error addAdminBtn" data-rel="tooltip" title="Delete" data-toggle="modal"  id="addAdminsm<?=$value->idEntreprise?>">
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
                            </table>
                            <!-- Modal ajout -->
                            
                            <div class="modal fade" id="addEntrModal" tabindex="-1" role="dialog" aria-labelledby="addEntrModalLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                        <h4 class="modal-title" id="addEntrModalLabel">Ajouter entreprise</h4>
                                    </div>
                                    <div class="modal-body">
                                        <form action="" method="POST" id="newEntrepriseForm">
                                            <div class="form-group">
                                                <label for="SCodeEntreprise">Code Entreprise</label>
                                                <input type="text" name = "SCodeEntreprise" id="SCodeEntreprise" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="SNomEntreprise">Nom de l'entreprise</label>
                                                <input type="text" name="SNomEntreprise" id = "SNomEntreprise" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="RespoEntreprise">Responsable del'Entreprise</label>
                                                <input type="text" name="RespoEntreprise" id="RespoEntreprise" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="TypeEntreprise">Type d'Entreprise</label>
                                                <input type="text" name="TypeEntreprise" id="TypeEntreprise" class="form-control">
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
                                                <label for="">Numero de T??l??phone</label>
                                                <input type="text" name="SNumTel" id="SNumTel" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="NumEmail">Adresse e-mail</label>
                                                <input type="text" name="NumEmail" id="NumEmail" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="DDebutActivite">D??but des activit??s</label>
                                                <input type="date" name="DDebutActivite" id="DDebutActivite" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="DDComptabilite">Debut de la Comptabilit??</label>
                                                <input type="date" name="DDComptabilite" id="DDComptabilite" class="form-control">
                                            </div>
                                            
                                            <div class="form-group">
                                                <label for="NIF">NIF</label>
                                                <input type="text" name="NIF" id="NIF" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="NbreHeureDeTravailParJour">Nombre d'heure de travail</label>
                                                <input type="number" name="NbreHeureDeTravailParJour" id="NbreHeureDeTravailParJour" class="form-control">
                                            </div>
                                            <div class="form-group">
                                                <label for="NbreJourTravailParSemaine">Nombre de jour hebdomadaire</label>
                                                <input type="number" name="NbreJourTravailParSemaine" id="NbreJourTravailParSemaine" class="form-control">
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
                            <div class="modal fade" id="modalAdmin" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="addEntrModalLabel">Ajouter Administrateur</h4>
                                        </div>
                                        <div class="modal-body">
                                            <form id="admin-form">
                                                <div class="form-group">
                                                    <label for="nom_admin">Nom</label>
                                                    <input type="text" name = "nom_admin" id="nom_admin" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="login_admin">Login</label>
                                                    <input type="text" name = "login_admin" id="login_admin" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="mpd_admin">Mot de passe temporaire</label>
                                                    <input type="password" name = "mpd_admin" id="mpd_admin" class="form-control">
                                                </div>
                                                <div class="form-group">
                                                    <label for="email_admin">Email</label>
                                                    <input type="email" name = "email_admin" id="email_admin" class="form-control">
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                            <button type="button" class="btn btn-primary" id="submitAdminBtn">Enregistrer</button>
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
                            <div class="modal fade" id="modalEditEntr" tabindex="-1" role="dialog" aria-labelledby="addAdminLabel">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                            <h4 class="modal-title" id="addEntrModalLabel">Mise ?? jour Entreprise</h4>
                                        </div>
                                        <div class="modal-body">
                                           <form action="" id="editEntrForm">
                                               <div class="form-group">
                                                   <label for="SCodeEntreprise_edit">Code de l'entreprise</label>
                                                   <input type="text" name="SCodeEntreprise_edit" class="form-control">
                                               </div>
                                               <div class="form-group">
                                                   <label for="SNomEntreprise_edit">Nom de l'entreprise</label>
                                                   <input type="text" name="SNomEntreprise_edit" class="form-control">
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
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>