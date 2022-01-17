<div id="contentPc">
    <div class="">
        <div class="">
            <div class="ui divider"></div>
            <h2 class="ui big header">
                Plan Comptable
            </h2>
            <div class="ui inverted pointing  menu" id="menuPc">
                <a href="#" class="active item">Plan comptable</a>
                <a href="#" class=" item">Afficher Comptes</a>
            </div>
        </div>
        <div class="ui hidden divider"></div>
        <div id="firstPcPage">
            <form action="" id="planCompta" class="ui form">
                <div class="ui grid">
                    <div class="row">
                        <div class="three wide column"> <div class="ui basic segment "><label for="">Numero</label></div></div>
                        <div class="four wide column">
                            <div class="disabled field">
                                <input type="text" name="id" id="id" value='<?php echo $plan->getIdPlanComptable(); ?>'>
                            </div></div>
                        <div class="five wide column"></div>
                    </div>
                    <div class="row">
                        <div class="three wide column"> <div class="ui basic segment "><label for="">Classe</label></div></div>
                        <div class="four wide column">
                            <div class="field">
                            <input type="text" value='<?php echo $plan->getNumclasse(); ?>' >
                            </div></div>
                        <div class="five wide column"><div class="ui basic segment "><?php echo $plan->getDesiClassel();?></div></div>
                    </div>
                    <div class="row">
                        <div class="three wide column"> <div class="ui basic segment "><label for="">Compte Principal</label></div></div>
                        <div class="four wide column">
                            <div class="field">
                            <input type="text" value='<?php echo $plan->getComptePrinci(); ?>'>
                            </div></div>
                        <div class="five wide column"><div class="ui basic segment "><?php echo $plan->getDesiComptePrinci();?></div></div>
                    </div>
                    <div class="row">
                        <div class="three wide column"> <div class="ui basic segment "><label for="">Sous Compte</label></div></div>
                        <div class="four wide column">
                            <div class="field">
                                <input type="text" value='<?php echo $plan->getSousCompte(); ?>'>
                            </div></div>
                        <div class="four wide column"><div class="ui basic segment"><?php echo $plan->getDesiSousCompte();?></div></div>
                    </div>
                    <div class="row">
                        <div class="three wide column"> <div class="ui basic segment "><label for="">Compte Divisionnaire</label></div></div>
                        <div class="four wide column">
                            <div class="field">
                            <input type="text" value='<?php echo $plan->getCodeDivision(); ?>'>
                            </div></div>
                        <div class="five wide column"> <div class="ui basic segment"><?php echo $plan->getDesiDivision();?></div></div>
                    </div>
                    <div class="row">
                        <div class="three wide column"> <div class="ui basic segment "><label for="">Compte Famille</label></div></div>
                        <div class="four wide column">
                            <div class="field">
                            <input type="text" value='<?php echo $plan->getCodeFamille(); ?>'>
                            </div></div>
                        <div class="five wide column"><div class="ui basic segment"><?php echo $plan->getDesiFamille();?></div></div>
                    </div>
                    <div class="row">
                        <div class="three wide column"> <div class="ui basic segment "><label for="">Code Operation</label></div></div>
                        <div class="four wide column">
                            <div class="field">
                                <input type="text" value='<?php echo $plan->getCompteOperation(); ?>'>
                            </div></div>
                        <div class="five wide column"><div class="ui basic segment"><?php echo $plan->getDesiOperation();?></div></div>
                    </div>
                    <div class="row">
                        <div class="three wide column"> <div class="ui basic segment "><label for="">Lettrage</label></div></div>
                        <div class="four wide column">
                            <div class="field">
                                <input type="text" value='<?php echo $plan->getLettrage1(); ?>'>
                            </div></div>
                        <div class="five wide column"></div>
                    </div>
                </div>
            </form>
            <div class="ui divider"></div>
            <div id="navPlanComptable" class="">
                <button class="ui  basic teal icon button item" id="prevBtn"><i class="angle left icon"></i> Précédant</button>
                <button class="ui  basic teal icon button item" id="nextBtn">Suivant <i class="angle right icon"></i></button>
            </div>
            <div>
                <div class="ui divider"></div>
                <div class="ui grid  stackable five column">
                    <div class="column"><button class="ui teal fluid button">Plan Famille 1</button></div>
                    <div class="column"><button class="ui teal fluid button">Plan Famille 2</button></div>
                    <div class="column"><button class="ui teal fluid button">Plan Famille 3</button></div>
                    <div class="column"><button class="ui teal fluid button">Plan Famille 4</button></div>
                    <div class="column"><button class="ui teal fluid button">Plan Famille Détaillé</button></div>
                </div>
            </div>
        </div>
        <div id="secondPcPage" style="display: none" >
            <button class="ui primary labeled icon small button" id="addCompteBtn"><i class="plus icon"></i>Nouveau</button>
            <div class="ui divider"></div>
            <table class="ui compact celled table" id="allCopmtesList">
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
                                <button class="ui green  icon button editBtn" id="edit<?php echo $value->idPlanComptable ?>"><i class="edit icon"></i></button>
                                <button class="ui red  icon button deleteBtn" id="delete<?php echo $value->idPlanComptable ?>"><i class="trash alternate outline icon"></i></button>
                            </td>
                        </tr>
                      <?php  }
                    ?>
                </tbody>
                <tfoot>
                    
                </tfoot>
            </table>
            
            <div class="ui modal compteForm">
                <i class="close icon"></i>
                <div class="header">Nouveau Compte</div>
                <div class="content">
                    <div class="ui form" id="newCompteForm">
                        <div class="disabled field">
                            <label>Compte Principal</label>
                            <input placeholder="Read Only" type="text" disabled="" tabindex="-1" id="ComptePrinci">
                        </div>
                        <div class="field">
                            <label for="">Compte opération</label>
                            <input type="number" name="CompteOperation" id="CompteOperation">
                        </div>
                        <div class="field">
                            <label for="">Désignation</label>
                            <input type="text" name="DesiOperation" id="DesiOperation">
                        </div>
                        <?php
                            if ($myEntreprise === NULL) { ?>
                                <div class="field">
                                    <label for="entiteId">Entité</label>
                                    <div class="ui search entite">
                                        <input class="prompt" type="text" id="entiteId" name="entiteId">
                                        <div class="results"></div>
                                    </div>
                                </div>
                          <?php  }
                          elseif ($myEntreprise->getEntiteDe() === NULL) {?>
                                 <div class="field">
                                    <label for="entiteId">Entité</label>
                                    <div class="ui search entite">
                                        <input class="prompt" type="text" id="entiteId" name="entiteId">
                                        <div class="results"></div>
                                    </div>
                                </div>
                        <?php  }
                        else { ?>
                            <input type="hidden" name="entiteId" id="entiteId" value="<?= $myEntreprise->getIdEntreprise() ?>">
                       <?php }
                        ?>
                    </div>
                </div>
                <div class="actions">
                    <button class="ui primary small labeled icon button" id="saveNewCompte"><i class="save icon"></i>Enregistrer</button>
                    <button class="ui red small labeled icon button closeModalBtn" id="cancelSauvegarde"><i class="close icon"></i>Annuler</button>
                </div>
            </div>
            <div class="ui modal newCompteComprincipal">
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
                <div class="actions">
                    <button class="ui blue labeled icon button small button" id="valideNewCompteCPBtn"><i class="check icon"></i>Valider</button>
                    <button class="ui red labeled icon button small button closeModalBtn"><i class="close icon"></i>Annuler</button>
                </div>
            </div>
            <div class="ui modal UserMessage">
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
            <div class="ui modal submitDestroy">
                <i class="close icon"></i>
                <div class="header"></div>
                <div class="content"></div>
                <div class="actions">
                    <div class="ui small labeled icon primary button" id="confirmDestroy"><i class="check icon"></i> Confirmer</div>
                    <div class="ui small labeled icon red button closeModalBtn"><i class="close icon"></i>Annuler</div>
                </div>
            </div>
            <div class="ui padded divider"></div>
            <div>
                <!-- Gerer les elements du plan comptable
                supprimer, ajouter les classes, comptes principaux etc... -->

                <div class="ui big header">Gérer éléments du plan comptable</div>
                <div class="ui trigger example accordion">
                    <div class="title ">
                        <i class="dropdown icon"></i>
                        Classes
                    </div>
                    <div class="content">
                        <div class="transition hidden">
                           <button class="ui primary labeled icon button" id="addNewClassBtn"><i class="plus icon"></i>Nouveau</button>
                           <div id="classeMessage" class="ui hidden message serverResponse">
                                <i class="close icon"></i>
                                <div class="header"></div>
                                <p>
                                    
                                </p>
                           </div>
                           <div class="ui divider"></div>
                           <table class="ui compact celled  table" id="allClassesList">
                                <thead class="full width">
                                   <th>Code Classe</th>
                                   <th>Description</th>
                                   <th></th>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($classesStd as $key => $value) {?>
                                            <tr id="classe<?=$value->idClasse?>">
                                                <td><?=$value->CodeClasse?></td>
                                                <td><?=$value->Designation?></td>
                                                <td  class="collapsing">
                                                    <button class="ui small green icon button editClasseBtn" id="editClass<?=$value->idClasse?>"><i class="edit icon"></i></button>
                                                    <button class="ui small red icon button deleteClasseBtn" id="deleteClasse<?=$value->idClasse?>"><i class="trash alternate outline icon"></i></button>
                                                </td>
                                            </tr>
                                        <?php }
                                    ?>
                                </tbody>
                           </table>
                           <div class="ui basic deleteClassConfirm modal">
                               <div class="ui icon header">
                                    <i class="trash alternate outline icon"></i>
                                    Suppression de la classe
                               </div>
                               <div class="content">
                                   <p>Vous êtes entrain d'effectuer une action qui entraînera des changements du plan comptable. Voulez-vous vraiment supprimer ?</p>
                               </div>
                               <div class="actions">
                                   <button class="ui green ok inverted button" id="destroyClassBtn">
                                       <i class="remove icon"></i>
                                       Oui
                                   </button>
                                   <button class="ui red inverted cancel button">
                                       <i class="checkmark icon"></i>
                                       Non
                                   </button>
                               </div>
                           </div>
                           <div class="ui modal editClassModal">
                               <i class="close icon"></i>
                               <div class="header">Editer Classe</div>
                               <div class="content">
                                    <div class="ui form" id="editClasseForm">
                                        <div class="field">
                                            <label for="CodeClasse_edit">Code de la classe</label>
                                            <input type="text" name="CodeClasse_edit">
                                        </div>
                                        <div class="field">
                                            <label for="Designation_edit">Designation</label>
                                            <input type="text" name="Designation_edit">
                                        </div>
                                    </div>
                               </div>
                               <div class="actions">
                                    <button class="ui labeled icon green button" id="saveClassEditionBtn"><i class="edit icon"></i>Editer</button>
                                    <button class="ui labeled icon red button closeModalBtn"><i class="edit icon"></i>Supprimer</button>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="title">
                        <i class="dropdown icon"></i>
                        Comptes principaux
                    </div>
                    <div class="content">
                        <div class="transition hidden">
                            <button class="ui primary labeled icon button" id="addNewComptePrincipalBtn"><i class="plus icon"></i>Nouveau</button>
                            <div id="comptePrincipauxMessage" class="ui hidden message serverResponse">
                                <i class="close icon"></i>
                                <div class="header"></div>
                                <p>
                                    
                                </p>
                           </div>
                            <div class="ui divider"></div>
                            <table class="ui compact celled  table" id="allComptePrincipalList">
                                <thead class="full width">
                                   <th>Code Compte principal</th>
                                   <th>Designation</th>
                                   <th></th>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($comptePrincipauxStd as $key => $value) {?>
                                            <tr id="CP<?=$value->idComptePrincipal?>">
                                                <td><?=$value->CodeComptePrincipal?></td>
                                                <td><?=$value->DesignationCompte?></td>
                                                <td  class="collapsing">
                                                    <button class="ui small green icon button editCPBtn" id="editCP<?=$value->idComptePrincipal?>"><i class="edit icon"></i></button>
                                                    <button class="ui small red icon button deleteCPBtn" id="deleteCP<?=$value->idComptePrincipal?>"><i class="trash alternate outline icon"></i></button>
                                                </td>
                                            </tr>
                                        <?php }
                                    ?>
                                </tbody>
                           </table>
                           <div class="ui basic deleteComptePrinciConfirm modal">
                               <div class="ui icon header">
                                    <i class="trash alternate outline icon"></i>
                                    Suppression du Compte Principal
                               </div>
                               <div class="content">
                                   <p>Vous êtes entrain d'effectuer une action qui entraînera des changements du plan comptable. Voulez-vous vraiment supprimer ?</p>
                               </div>
                               <div class="actions">
                                   <button class="ui green ok inverted button" id="destroyCompptePrinciBtn">
                                       <i class="remove icon"></i>
                                       Oui
                                   </button>
                                   <button class="ui red inverted cancel button">
                                       <i class="checkmark icon"></i>
                                       Non
                                   </button>
                               </div>
                           </div>
                           <div class="ui modal editCPModal">
                               <i class="close icon"></i>
                               <div class="header">Editer Compte principal</div>
                               <div class="content">
                                    <div class="ui form" id="editCPForm">
                                        <div class="field">
                                            <label for="CodeComptePrincipal_edit">Code du compte principal</label>
                                            <input type="text" name="CodeComptePrincipal_edit">
                                        </div>
                                        <div class="field">
                                            <label for="DesignationCompte_edit_CP">Designation</label>
                                            <input type="text" name="DesignationCompte_edit_CP">
                                        </div>
                                    </div>
                               </div>
                               <div class="actions">
                                    <button class="ui labeled icon green button" id="saveCPEditionBtn"><i class="edit icon"></i>Editer</button>
                                    <button class="ui labeled icon red button closeModalBtn"><i class="close icon"></i>Annuler</button>
                               </div>
                           </div>
                        </div>
                    </div>
                    <div class="title">
                        <i class="dropdown icon"></i>
                        Sous Comptes
                    </div>
                    <div class="content">
                           <div class="transition hidden">
                                <button class="ui primary labeled icon button" id="addNewSousCompteBtn"><i class="plus icon"></i>Nouveau</button>
                                <div id="sousCompteMessage" class="ui hidden message serverResponse">
                                    <i class="close icon"></i>
                                    <div class="header"></div>
                                    <p>
                                        
                                    </p>
                                </div>
                                <div class="ui divider"></div>
                                <table class="ui compact celled  table" id="allSousCompteList">
                                    <thead class="full width">
                                    <th>Code Sous-Compte</th>
                                    <th>Designation</th>
                                    <th></th>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach ($sousComptesStd as $key => $value) {?>
                                                <tr id="SC<?=$value->idSousCompte?>">
                                                    <td><?=$value->CodeSousCompte?></td>
                                                    <td><?=$value->Designation?></td>
                                                    <td  class="collapsing">
                                                        <button class="ui small green icon button editSCBtn" id="editSC<?=$value->idSousCompte?>"><i class="edit icon"></i></button>
                                                        <button class="ui small red icon button deleteSCBtn" id="deleteSC<?=$value->idSousCompte?>"><i class="trash alternate outline icon"></i></button>
                                                    </td>
                                                </tr>
                                            <?php }
                                        ?>
                                    </tbody>
                                </table>
                           </div>
                           
                    </div>
                    <div class="title">
                        <i class="dropdown icon"></i>
                       Comptes Divisionnaires
                    </div>
                    <div class="content">
                        <div class="transition hidden">
                           <button class="ui primary labeled icon button" id="addNewCompteDivisioBtn"><i class="plus icon"></i>Nouveau</button>
                           <div id="compteDivisioMessage" class="ui hidden message serverResponse">
                                <i class="close icon"></i>
                                <div class="header"></div>
                                <p>
                                    
                                </p>
                           </div>
                           <div class="ui divider"></div>
                           <table class="ui compact celled  table" id="allCompteDivList">
                                <thead class="full width">
                                   <th>Code Comptes Divisionnaires</th>
                                   <th>Designation</th>
                                   <th></th>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($comptesDivisioStd as $key => $value) {?>
                                            <tr id="CD<?=$value->idCompteDivisionnaire?>">
                                                <td><?=$value->CodeCompteDivisionnaire?></td>
                                                <td><?=$value->DesigantionCD?></td>
                                                <td  class="collapsing">
                                                    <button class="ui small green icon button"><i class="edit icon"></i></button>
                                                    <button class="ui small red icon button deleteCDBtn" id="deleteCD<?=$value->idCompteDivisionnaire?>"><i class="trash alternate outline icon"></i></button>
                                                </td>
                                            </tr>
                                        <?php }
                                    ?>
                                </tbody>
                           </table>
                        </div>
                    </div>
                    <div class="title">
                        <i class="dropdown icon"></i>
                        Comptes Familles
                    </div>
                    <div class="content">
                        <div class="transition hidden">
                            <button class="ui primary labeled icon button" id="addNewCompteFamilleBtn"><i class="plus icon"></i>Nouveau</button>
                            <div id="familleMessage" class="ui hidden message serverResponse">
                                <i class="close icon"></i>
                                <div class="header"></div>
                                <p>
                                    
                                </p>
                            </div>
                            <div class="ui divider"></div>
                            <table class="ui compact celled  table" id="allFamilleList">
                                <thead class="full width">
                                    <th class="collapsing">Code Compte Famille</th>
                                    <th>Designation</th>
                                    <th class="collapsing"></th>
                                </thead>
                                <tbody>
                                    <?php
                                        foreach ($famillesStd as $key => $value) {?>
                                            <tr id="famille<?=$value->idCompteFamille?>">
                                                <td><?=$value->CodeCompteFamille?></td>
                                                <td><?=$value->DesigantionCompteFamille?></td>
                                                <td  class="collapsing">
                                                    <button class="ui small green icon button"><i class="edit icon"></i></button>
                                                    <button class="ui small red icon button deleteFamilleBtn" id="deleteFamille<?=$value->idCompteFamille?>"><i class="trash alternate outline icon"></i></button>
                                                </td>
                                            </tr>
                                        <?php }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="ui modal newClass">
                <i class="close icon"></i>
                <div class="header">Nouvelle Classe</div>
                <div class="content">
                    <div class="ui form" id="newClassForm">
                        <div class="field">
                            <label for="CodeClasse_classe">Classe</label>
                            <input type="text" name="CodeClasse_classe" autocomplete="off">
                        </div>
                        <div class="field">
                            <label for="Designation_classe">Description</label>
                            <input type="text" name="Designation_classe" autocomplete="off">
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <button class="ui primary labeled icon button" id="createClassBtn"><i class="save icon"></i>Créer</button>
                    <button class="ui red labeled icon button closeModalBtn"><i class="close icon"></i>Annuler</button>
                </div>
            </div>
            <div class="ui modal newComptePrincipal">
                <i class="close icon"></i>
                <div class="header">Nouveau Compte Principal</div>
                <div class="content">
                    <div class="ui form" id="newComptePrincipalForm">
                        <div class="field">
                            <label for="CodeComptePrincipal_cp">Compte Principal</label>
                            <input type="text" name="CodeComptePrincipal_cp">
                        </div>
                        <div class="field">
                            <label for="">Designation</label>
                            <input type="text" name="DesignationCompte_cp">
                        </div>
                    </div>
                </div>
                <div class="actions">
                <button class="ui primary labeled icon button" id="createComptePrinciBtn"><i class="save icon"></i>Créer</button>
                    <button class="ui red labeled icon button closeModalBtn"><i class="close icon"></i>Annuler</button>
                </div>
            </div>
            <div class="ui modal newSousCompte">
                <i class="close icon"></i>
                <div class="header">Nouveau Sous-Compte</div>
                <div class="content">
                    <div class="ui form" id="newSousCompteForm">
                        <div class="field">
                            <label for="CodeSousCompte_sc">Sous Compte</label>
                            <input type="text" name="CodeSousCompte_sc">
                        </div>
                        <div class="field">
                            <label for="Designation_sc">Désignation</label>
                            <input type="text" name="Designation_sc">
                        </div>
                    </div>
                </div>
                <div class="actions">
                <button class="ui primary labeled icon button" id="createSousCompteBtn"><i class="save icon"></i>Créer</button>
                    <button class="ui red labeled icon button closeModalBtn"><i class="close icon"></i>Annuler</button>
                </div>
            </div>
            <div class="ui modal newCompteDivisionnaire">
                <i class="close icon"></i>
                <div class="header">Nouveau Compte Divisionnaire</div>
                <div class="content">
                    <div class="ui form" id="newCompteDivisionnaireForm">
                        <div class="field" >
                            <label for="CodeCompteDivisionnaire_cd">Compte Divisionnaire</label>
                            <input type="text" name="CodeCompteDivisionnaire_cd">
                        </div>
                        <div class="field">
                            <label for="DesigantionCD_cd">Désignation</label>
                            <input type="text" name="DesigantionCD_cd">
                        </div>
                    </div>
                </div>
                <div class="actions">
                <button class="ui primary labeled icon button" id="createCompteDivisioBtn"><i class="save icon"></i>Créer</button>
                    <button class="ui red labeled icon button closeModalBtn"><i class="close icon"></i>Annuler</button>
                </div>
            </div>
            <div class="ui modal newFamille">
                <i class="close icon"></i>
                <div class="header">Nouveau Compte Famille</div>
                <div class="content">
                    <div class="ui form" id="newFamilleForm">
                        <div class="field" >
                            <label for="CodeCompteFamille_f">Famille</label>
                            <input type="text" name="CodeCompteFamille_f">
                        </div>
                        <div class="field">
                            <label for="DesigantionCompteFamille_f">Désignation</label>
                            <input type="text" name="DesigantionCompteFamille_f">
                        </div>
                    </div>
                </div>
                <div class="actions">
                <button class="ui primary labeled icon button" id="createCompteFamilleBtn"><i class="save icon"></i>Créer</button>
                    <button class="ui red labeled icon button closeModalBtn"><i class="close icon"></i>Annuler</button>
                </div>
            </div>
            <div class="ui modal editSCModal">
                <i class="close icon"></i>
                <div class="header">Editer Sous compte</div>
                <div class="content">
                    <div class="ui form" id="editSCForm">
                        <div class="field">
                            <label for="CodeSousCompte_edit">Code du sous compte</label>
                            <input type="text" name="CodeSousCompte_edit">
                        </div>
                        <div class="field">
                            <label for="Designation_edit_SC">Designation</label>
                            <input type="text" name="Designation_edit_SC">
                        </div>
                    </div>
                </div>
                <div class="actions">
                    <button class="ui labeled icon green button" id="saveSCEditionBtn"><i class="edit icon"></i>Editer</button>
                    <button class="ui labeled icon red button closeModalBtn"><i class="close icon"></i>Annuler</button>
                </div>
            </div>
            <div class="ui basic deleteSousCompteConfirm modal">
                <div class="ui icon header">
                    <i class="trash alternate outline icon"></i>
                    Suppression du Sous compte
                </div>
                <div class="content">
                    <p>Vous êtes entrain d'effectuer une action qui entraînera des changements du plan comptable. Voulez-vous vraiment supprimer ?</p>
                </div>
                <div class="actions">
                    <button class="ui green ok inverted button" id="destroySCBtn">
                        <i class="remove icon"></i>
                        Oui
                    </button>
                    <button class="ui red inverted cancel button">
                        <i class="checkmark icon"></i>
                        Non
                    </button>
                </div>
            </div>
            <div class="ui basic deleteCompteDivisioConfirm modal">
                <div class="ui icon header">
                    <i class="trash alternate outline icon"></i>
                    Suppression de compte divisionnaire
                </div>
                <div class="content">
                    <p>Vous êtes entrain d'effectuer une action qui entraînera des changements du plan comptable. Voulez-vous vraiment supprimer ?</p>
                </div>
                <div class="actions">
                    <button class="ui green ok inverted button" id="destroyCDBtn">
                        <i class="remove icon"></i>
                        Oui
                    </button>
                    <button class="ui red inverted cancel button">
                        <i class="checkmark icon"></i>
                        Non
                    </button>
                </div>
            </div>
            <div class="ui basic deleteFamilleConfirm modal">
                <div class="ui icon header">
                    <i class="trash alternate outline icon"></i>
                    Suppression la famille
                </div>
                <div class="content">
                    <p>Vous êtes entrain d'effectuer une action qui entraînera des changements du plan comptable. Voulez-vous vraiment supprimer ?</p>
                </div>
                <div class="actions">
                    <button class="ui green ok inverted button" id="destroyFamilleBtn">
                        <i class="remove icon"></i>
                        Oui
                    </button>
                    <button class="ui red inverted cancel button">
                        <i class="checkmark icon"></i>
                        Non
                    </button>
                </div>
            </div>
            <div class="ui very paddded hidden divider"></div>
            <div class="ui very paddded hidden divider"></div>
        </div>
    </div>
</div>