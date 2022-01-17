<div>
    <div class="">
        <h1>Exercices</h1>
        <div>
            <div id="passedMoves" class="">
                    <button class="ui labeled icon small blue button" id="addMove"><i class="plus icon"></i>  Nouveau</button>
                    <button class="ui labeled icon small red button">
                        <i class="trash icon"></i>
                        Supprimer
                    </button>
                    <div class="ui hidden divider"></div>
                    <table class="ui compact celled definition table _sort" id="passedMoveList">
                        <thead class="full-width" >
                            <th>Date</th>
                            <th class ="collapsing">Numero Journal</th>
                            <th class ="collapsing">Designation analytique</th>
                            <th class ="collapsing">Imputation</th>
                            <th>Plan Comptable</th>
                            <th>Montant</th>
                        </thead>
                        <tbody >
                            <?php
                                for ($i=0; $i < count($allMouvsStd); $i++) { 
                                    $corps = $allMouvsStd[$i];
                                    $headers = array_filter($allEntetesStd, function($x) use ($corps) {
                                        if ($x->idEnteteMouv == $corps->NumMouv) {
                                            return $x;
                                        }
                                    });
                                    $header;
                                    if ($headers !== NULL) {
                                        foreach ($headers as $key => $value) {
                                            $header = $value;
                                            break;
                                        }
                                    }?>
                                   <tr>
                                       <td><?=$header->DateMouv?></td>
                                       <td>
                                           <?php
                                                $jrs = array_filter($journaux, function($x) use ($header) {
                                                    if ($x->getIdCategorieJournaux() == $header->CategorieJournaux_idCategorieJournaux) {
                                                        return $x;
                                                    }
                                                });
                                                foreach ($jrs as $key => $value) {
                                                    echo $value->getCodeJournal();
                                                    break;
                                                }
                                                ?>
                                       </td>
                                       <td>
                                            <?php
                                                $jrs = array_filter($codes, function($x) use ($corps) {
                                                    if ($x->getIdCompteAnalytique() == $corps->T6_CodeAnal) {
                                                        return $x;
                                                    }
                                                });
                                                foreach ($jrs as $key => $value) {
                                                    echo $value->getDesiAnal();
                                                    break;
                                                }
                                                ?>
                                       </td>
                                       <td><?=$corps->Imputation ?></td>
                                       <td><?=$corps->CCompte !=NULL?$corps->CCompte : $corps->DCompte ?></td>
                                       <td><?=$corps->CMontant !=NULL?$corps->CMontant : $corps->DMontant ?></td>
                                       
                                   </tr>
                                <?php }                            
                            ?>
                        </tbody>
                        <tfoot class="full-width">
                            
                        </tfoot>
                    </table>
            </div>
            <div>
            <div class="ui divider"></div>
            
            <div class="ui hidden divider"></div>
            </div>
            <div id="newMove" style="display: none">
                <div class="" id="headerMove">
                    <div class="ui stackable three column grid">
                        <div class="headerDiv column">
                            <h3>Mouvement</h3>
                            <form action="" class="ui form">
                                <div class="disabled field">
                                    <label for="numMouv" class="ui tiny header">Numero :</label>
                                    <input type="text" disabled name="numMouv" id="numMouv" class="notToErase">
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Date :</label>
                                    <input type="date" name="dateMouv" class="notToErase">
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Code journal :</label>
                                    <input type="text" name="codeJournal" class="toComplete filejournaux">
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Exercice :</label>
                                    <input type="text" name="exercice" id="exerciceInput">
                                </div>
                            </form>
                        </div>
                        <div class="headerDiv column">
                            <h3>Document</h3>
                            <form action="" class="ui form">
                                <div class="field">
                                    <label for="" class="ui tiny header">Code :</label>
                                    <input type="text" name="codeDoc" autocomplete="off">
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Nom :</label>
                                    <input type="text" name="nomDoc">
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Numero  :</label>
                                    <input type="text" name="numDoc">
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Comptable :</label>
                                    <input type="text" name="codeCompta" autocomplete="off" id="codeComptable">
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Numero :</label>
                                    <input type="text" name="numDocTrue" disabled>
                                </div>
                            </form>
                        </div>
                        <div class="headerDiv column">
                            <h3>Informations sur la transaction</h3>
                            <form action="" class="ui form">
                                <div class="field">
                                    <label for="" class="ui tiny header">Débit :</label>
                                    <input type="text" name="montantDebit" id="montantDebit" autocomplete="off" disabled>
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Crédit :</label>
                                    <input type="text" name="montantCredit" id="montantCredit" autocomplete="off" disabled>
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Montant :</label>
                                    <input type="text" name="montantValue" autocomplete="off" disabled id="montantGlobal">
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Code Entite :</label>
                                    <input type="text" name="codeEntite" autocomplete="off">
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Bénéficiaire :</label>
                                    <input type="text" name="beneficiaire" autocomplete="off">
                                </div>
                                <div class="field">
                                    <label for="" class="ui tiny header">Débiteur :</label>
                                    <input type="text" name="debiteur" autocomplete="off">
                                </div>
                            </form>
                        </div>
                    </div>
                    <form class="ui form">
                        <div class="field">
                            <label for="">Motif de payments</label>
                            <input type="text" name="motif" autocomplete="off">
                        </div>
                        <div class="fields">
                            <div class="field">
                                <label for="">Euro</label>
                                <input type="text" name="tauxEuro" autocomplete="off" class="taux">
                            </div>
                            <div class="field">
                                <label for="">USD</label>
                                <input type="text" name="tauxUSD" autocomplete="off" id="tauxUSD" class="taux">
                            </div>
                        </div>
                    </form>
                </div>
                <form action="" method="POST" id="deviseChoice" class="ui form">
                    <h4>Quelle est la devise utilisée</h4>
                    <div class="field">
                        <div class="ui toggle checkbox">
                            <input type="radio" name="devise" id="fc" checked>
                            <label for="fc">Franc Congolais</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui toggle checkbox">
                            <input type="radio" name="devise" id="usd">
                            <label for="usd">Dollards Americain</label>
                        </div>
                    </div>
                    <div class="field">
                        <div class="ui toggle checkbox">
                            <input type="radio" name="devise" id="euro">
                            <label for="euro">Euro</label>
                        </div>
                    </div>
                </form>
                <div id="bodyMove" class="">
                    <form action="" method="POST" id="moveForm" class="ui form">
                        <div class="" id="complementInfo">
                            <div class=" inline field">
                                <label for="">Code Analytique</label>
                                <select name="ca" id="ca">
                                        <?php
                                            foreach ($codes as $key => $value) {?>
                                                <option value="<?php echo $value->getIdCompteAnalytique()?>"><?php echo $value->getIdCompteAnalytique()?></option>
                                                
                                        <?php }
                                        ?>
                                </select>
                                
                            </div>
                        </div>
                        <table class="ui compact celled definition table ">
                            <thead class="full-width">
                                <th>Imputation</td>
                                <th>Compte</th>
                                <th>Désignation</th>
                                <th>Libélé</th>
                                <th class="collapsing">Référence</th>
                                <th>Débit</th>
                                <th>Crédit</th>
                                <th>CD</th>
                            </thead>
                            <tbody id="moves">
                                <tr id="move1" class="mouvement">
                                    <td class="">
                                        <select name="imp">
                                            <option value="D">D</option>
                                            <option value="C">C</option>
                                        </select>
                                    </td>
                                    <td class="compteOperationCell">
                                        <input type="text" name="compteOpe" class="toComplete filecomptes">
                                    </td>
                                    <td>
                                        <input type="text" name="desiCompte">
                                    </td>
                                    <td>
                                        <input type="text" name="libelleOpe" class="libele">
                                    </td>
                                    <td>
                                        <input type="text" name="pieceRef">
                                    </td>
                                    <td>
                                        <input type="text" name="montantDebit" class="debitValue">
                                    </td>
                                    <td>
                                        <input type="text" name="montantCredit" class="creditValue">
                                    </td>
                                    <td>
                                        <input type="text" name="compteDivisio">
                                    </td>  
                                </tr>
                                <tr id="move2" class="mouvement">
                                    <td class="">
                                        <select name="imp">
                                            <option value="C">C</option>
                                            <option value="D">D</option>
                                        </select>
                                    </td>
                                    <td class="compteOperationCell">
                                        <input type="text" name="compteOpe" class="toComplete filecomptes">
                                    </td>
                                    <td>
                                        <input type="text" name="desiCompte">
                                    </td>   
                                    <td>
                                        <input type="text" name="libelleOpe" class="libele">
                                    </td>
                                    <td>
                                    <input type="text" name="pieceRef">
                                    </td>
                                    <td>
                                        <input type="text" name="montantDebit" class="debitValue">
                                    </td>
                                    <td>
                                        <input type="text" name="montantCredit" class="creditValue">
                                    </td>
                                    <td>
                                        <input type="text" name="compteDivisio">
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot class="full-width">
                                <tr>
                                <th colspan="8">
                                <button id="addTransac" class="ui labeled icon blue small button">
                                    <i class="plus icon"></i>
                                    Ajouter Mouvement
                                </button>
                                <div id="movesActions" class="ui right floated buttons">
                                    <button class="ui green labeled icon small button"> <i class="save outline icon "></i> Enregistrer</button>
                                    <button class="ui red labeled icon small button"><i class="close icon "></i>Annuler</button>
                                </div>
                                </th>
                                </tr>
                            </tfoot>
                        </table>
                       
                    </form>
                </div>
                <div>
                    <div class="ui hidden divider"></div>
                    <button class="ui secondary labeled icon button" id="seeMoveBtn">
                        <i class="sync alternate icon"></i>
                        Mouvements
                    </button>
                </div>
                <div class="ui hidden divider"></div>
            </div>
        </div>
        <div class="ui modal moveDetails">
            <div class="header">Détails du Mouvement</div>
            <div class="content">

            </div>
            <div class="actions">
                <button class="ui primary button">OK</button>
            </div>
        </div>
        <div class="ui modal userMessage">
            <div class="header"></div>
            <div class="content"></div>
            <div class="actions"></div>
        </div>
    </div>
</div>