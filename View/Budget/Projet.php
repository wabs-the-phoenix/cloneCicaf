
    <div class= "">
        <div class="title">
            <h2>Annuaire des projets</h2>
            
        </div>
        <?php 
            if(isset($error) || isset($success)){
                $class=($error)? "negative": "positive";
                $message=($error)? $error: $success;
                ?>
                <div class="ui <?= $class; ?> message">
                    <i class="close icon"></i>
                    <?= $message; ?>
                </div>
                <?php 
            }
        ?>
        
        
            <div class="item left">
                        <button class="ui right small primary labeled icon button" id="addBien">
                    <i class="plus icon"></i> Nouveau projet
                </button>
            </div>
        <div class="ui divider"></div>
        <div class="board">
            <form action="" method='POST' class="relative" id="entrChoice">
                <table id="TableBien" class="ui compact celled striped definition table">
                    <thead class="full-width">
                        <tr>
                            <th>
                                Intitulé du projet
                            </th>
                            <th>Responsable</th>
                            <th>Bailleur</th>
                            <th class="hidden-480">Personne cible</th>
                            <th class="hidden-480">Début projet</th>		
                            <th class="hidden-480">Fin projet</th>									

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php 
												 $i=0;
												foreach($projet->findAll() as $data): ?>                                  
													<tr>

														<td>
                                                            <?= ucfirst($data->NomProjet); ?>
														</td>
														<td><?= ucwords(html_entity_decode ($data->NomResponsable)) ?></td>
														<td class="hidden-480"> <?= ucwords(html_entity_decode ($data->NomBailleur)); ?> </td>
														<td>
                                                        <?= strtoupper ($data->PersonneCible);?></td>

														<td class="hidden-480">
															<?= utf8_encode(ucfirst(strftime("%A, %d %B %Y", strtotime($data->DateDebutProjet)))); ?>
														</td>
														<td class="hidden-480"> <?= utf8_encode(ucfirst(strftime("%A, %d %B %Y", strtotime($data->DateFinProjet)))); ?>
														</td>

														<td>
                                                        <button class="ui compact primary icon button" id="details" data-tooltip="Plus de détails" >
																	<i class="search plus icon"></i> 
                                                        </button>
                                                        <button class="ui compact green icon button" id="modifier" data-tooltip="Modifier">
																	<i class="pencil icon"></i> 
                                                        </button>
                                                         <a href="/etablir-budget?idProjet=<?= $data->idCodeProjet?>" class="ui compact orange icon button" data-tooltip="Etablir le budget">
															<i class="clipboard check icon" ></i> 
                                                        </a>
                                                        <button class="ui compact red icon button" id="supprimer" data-tooltip="Supprimer">
																	<i class="trash icon"></i> 
                                                        </button>
                                                        <input type="hidden" name="id" id="id" value="<?= $data->idCodeProjet?>">
														</td>
													</tr>
                                                <?php endforeach; ?>
                                                
                        
                    </tbody>
                </table>
                
            </form>
        </div>
</div>

<div id="addBienForm" class="ui modal">
    <i class="close icon"></i>
  <div class="header">Ajouter un nouveau projet </div>
  <div class="content">
    <form  method="post">
        <div class="ten wide column">
            <div class="ui group">
                <label for="designation">Intitulé du projet</label>
                <div class="ui left icon fluid input">
                    <input type="text" id="intitule" name="intitule" placeholder="Intitulé du projet">
                    <i class="columns icon"></i>
                </div>
            </div>
            
            <br>
            <label for="codeImmo">Responsable</label>
            <div class="ui left icon fluid input">
            
                <input type="text" id="responsable"  placeholder="Nom du responsable du projet">
                <i class="user icon"></i>
            </div>
            <br>
            <label for="valeurbrute">Nom du bailleur</label>
            <div class="ui left icon fluid input">
                <input type="text" id="bailleur" name="bailleur" placeholder="Saisir le nom du bailleur">
                <i class="users outline icon"></i>
            </div>
            <br>
            <label for="taux">Personne cible</label>
            <div class="ui left icon fluid input">
                <input type="numeric" id="cible" name="cible"  placeholder="Inscrire les personnes cibles">
                <i class="user alternate icon"></i>
            </div>
            <br>
            <label for="QteInintiale">Date début projet</label>
            <div class="ui left icon fluid input">
                <input type="date" id="debutprojet" name="debutprojet"  >
                <i class="calendar outline icon"></i>
            </div>
            <br>
            <label for="QteInventaire">Date fin de projet</label>
            <div class="ui left icon fluid input">
                <input type="date" id="finprojet" name="finprojet"  >
                <i class="calendar icon"></i>
            </div>
        </div>
        </div>

    
  
    <div class="actions">
    <div class="item right">
                    <button class="ui right small cancel red labeled icon button" >
                        <i class="times icon"></i> Quitter
                    </button>
                
                    <button type="submit" class="ui right small green labeled icon button" name="ajout" id="ajout">
                        <i class="plus icon"></i> Ajouter
                    </button>
                </div>
    </div>
  </form>
</div>
<div id="detailsBox" class="ui modal">
    <i class="close icon"></i>
    <div class="header">Détails du bien </div>
    <div class="content">
                <div class="row">
                    <div class="col-md-8 col-sm-8">
                        <input type="hidden" name="id" id="id">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <th>Libelé</th>
                                <th colspan="2">Valeur</th>
                            </thead>
                                <tbody>
                                    <tr>
                                        <td>Désignation</td>
                                        <td>:</td>
                                        <td> <span id="designation"></span> </td>
                                    </tr>
                                    <tr>
                                        <td>Code Immo</td>
                                        <td>:</td>
                                        <td><span id="codeImmo"></span> </td>
                                    </tr>
                                    <tr>
                                        <td>Valeur brute</td>
                                        <td>:</td>
                                        <td><span id="valeurbrute"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Taux de change</td>
                                        <td>:</td>
                                        <td><span id="taux"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Qté initiale</td>
                                        <td>:</td>
                                        <td><span id="qteinitiale"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Qté Inventoriée</td>
                                        <td>:</td>
                                        <td><span id="qteinventaire"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Lieu d'affectation</td>
                                        <td>:</td>
                                        <td><span id="lieu"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Durée Immo</td>
                                        <td>:</td>
                                        <td><span id="dure"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Taux Amortissement</td>
                                        <td>:</td>
                                        <td><span id="tauxAmortissement"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Date d'acquisition</td>
                                        <td>:</td>
                                        <td><span id="date"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Compte 14 ou 106</td>
                                        <td>:</td>
                                        <td><span id="compte14_106"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Compte 24</td>
                                        <td>:</td>
                                        <td><span id="compte24"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Compte 28</td>
                                        <td>:</td>
                                        <td><span id="compte28"></span></td>
                                    </tr>
                                    <tr>
                                        <td>Compte 68</td>
                                        <td>:</td>
                                        <td><span id="compte68"></span></td>
                                    </tr>
                                </tbody>
                        </table>
                    </div>													

                </div>
            </div>
            
        </div>