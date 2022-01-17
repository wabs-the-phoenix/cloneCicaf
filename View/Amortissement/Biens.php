
   
    <div class= "">
        <div class="title">
            <h2>Annuaire des biens</h2>
            
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
                    <i class="plus icon"></i> Nouveau bien
                </button>
            </div>
        <div class="ui divider"></div>
        <div class="board">
            <form action="" method='POST' class="relative" id="entrChoice">
                <table id="TableBien" class="ui compact celled striped definition table">
                    <thead class="full-width">
                        <tr>
                        <th>
                            Désignation du bien
                        </th>
                        <th>
                            Valeur brute
                        </th>
                        <th>
                            Date acquisition
                        </th>
                        <th>Qte initiale</th>
                        <th>Durée Immo</th>
                        <th>Lieu Affectation</th>								
                        <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php foreach($bien->findAll() as $data): ?>                                  
													<tr>
														<td>
                                                        	<?= ucfirst(utf8_encode($data->DesignationImmo))   ?>
														</td>
                                                        <td>
                                                        	<?= number_format($data->ValeurBrute, 2,","," ") ."Fc" ?>
														</td>

														<td>
                                                            <?= utf8_encode(ucfirst(strftime("%A, %d %B %Y", strtotime($data->DateAcquisition)))); ?>
														</td>
														<td><?= $data->QteInitiale ?></td>
														
														<td>
                                                        <?= ($data->DureeImmo>1)? $data->DureeImmo." ans": $data->DureeImmo." an";?></td>

														<td class="hidden-480">
															<?= ucfirst($data->LieuAffectation) ;?>
														</td>

														<td>
                                                        <button class="ui compact primary icon button" id="details" data-tooltip="Plus de détails" >
																	<i class="search plus icon"></i> 
                                                        </button>
                                                        <button class="ui compact green icon button" id="mouvement" data-tooltip="Faire un mouvement">
																	<i class="dolly flatbed icon"></i> 
                                                        </button>
                                                        <button class="ui compact lemon icon button" id="Reevaluation" data-tooltip="Faire une réevaluation">
																	<i class="clipboard check icon"></i> 
                                                        </button>
                                                        <button class="ui compact orange icon button" id="Amortissement" data-tooltip="Faire Amortissement">
																	<i class="pallet icon"></i> 
                                                        </button>
                                                        <button class="ui compact red icon button" id="supprimer" data-tooltip="Supprimer l'enregistrement">
																	<i class="trash icon"></i> 
                                                        </button>
                                                        <input type="hidden" name="idBien" id="idBien" value="<?= $data->idRenseignementImmo?>">

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
  <div class="header">Ajouter un nouveau bien </div>
  <div class="content">
    <form  method="post">
    <div class="ui two column divided grid">
        <div class="ten wide column">
            <div class="ui group">
                <label for="designation">Désignation</label>
                <div class="ui left icon fluid input">
                    <input type="text" id="designation" name="designation" placeholder="Désignation">
                    <i class="columns icon"></i>
                </div>
            </div>
            
            <br>
            <label for="codeImmo">Code Immo</label>
            <div class="ui left icon fluid input">
            
                <input type="text" id="codeImmo" name="codeImmo"  placeholder="Code Immo">
                <i class="building icon"></i>
            </div>
            <br>
            <label for="valeurbrute">Valeur Brute</label>
            <div class="ui left icon fluid input">
                <input type="text" id="valeurbrute" name="valeurbrute" placeholder="Valeur brute">
                <i class="money bill alternate outline icon"></i>
            </div>
            <br>
            <label for="taux">Taux de change</label>
            <div class="ui left icon fluid input">
                <input type="numeric" id="taux" name="taux"  placeholder="Taux de change">
                <i class="money bill alternate icon"></i>
            </div>
            <br>
            <label for="QteInintiale">Quantité initiale</label>
            <div class="ui left icon fluid input">
                <input type="numeric" id="QteInitiale" name="QteInitiale"  placeholder="QteInitiale">
                <i class="keyboard outline icon"></i>
            </div>
            <br>
            <label for="QteInventaire">Quantité inventaire</label>
            <div class="ui left icon fluid input">
                <input type="numeric" id="QteInventaire" name="QteInventaire"  placeholder="Qte Inventaire">
                <i class="keyboard outline icon"></i>
            </div>
            <br>
            <label for="Affectation">Affectation du bien</label>
            <div class="ui left icon fluid input">
                <input type="text" id="Affectation" name="Affectation"  placeholder="Affectation">
                <i class="home icon"></i>
            </div>
            <br>
            <label for="Dure">Durée d'amortissement</label>
            <div class="ui left icon fluid input">
                <input type="text" id="Dure" name="Dure"  placeholder="Dure">
                <i class="clock icon"></i>
            </div>
            <br>
            <div id="tauxAmr">
                <label>Taux d'amortissement</label>
                <div class="ui left icon fluid input">
                    <input type="text" id="tauxammortissement" name="tauxammortissement"  disabled>
                    <i class="braille icon"></i>
                </div>
                <br>
            </div>
            
            
            <label for="date">Date Acquisition</label> 
            
            
                <div class="ui calendar" id="dateAquisition">
                    <div class="ui left icon fluid input">
                        <input type="text" id="date" name="date" class="date-picker"  placeholder="Date d'acquisition">
                        <i class="calendar icon"></i>
                    </div>
            </div>
        </div>
        
        <div class="six wide column">
        <br>
        <div class="ui left icon fluid input">
            <input type="text" id="compte14106" name="compte14106"  placeholder="compte14106">
            <i class="calculator icon"></i>
        </div>
        <br>
        <div class="ui left icon fluid input">
            <input type="text" id="compte24" name="compte24"  placeholder="compte24">
            <i class="calculator icon"></i>
        </div>
        <br>
        <div class="ui left icon fluid input">
            <input type="text" id="compte28" name="compte28"  placeholder="compte28">
            <i class="calculator icon"></i>
        </div>
        <br>
        <div class="ui left icon fluid input">
            <input type="text" id="compte68" name="compte68"  placeholder="compte68">
            <i class="calculator icon"></i>
        </div>
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