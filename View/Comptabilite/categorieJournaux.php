<div>
    <div class="title">
        <h2>Categorie des Journaux</h2>
    </div>
    <div class="ui  divider"></div>
    <div class="ui hidden divider"></div>
    <div class= "">
        <div class="board">
            <?php ?>
                
                    <button class="ui  small primary labeled icon button" id="newJournalBtn">
                        <i class="plus icon"></i> Nouveau
                    </button>
                    <div class="ui hidden divider"></div>
                    <table class="ui compact celled definition table" id="journauxTable">
                        <thead>
                            <th></th>
                            <th class="collapsing">Code Journal</th>
                            <th>Nom du journal</th>
                            <th></th>
                        </thead>
                        <tbody id="journauxContent">
                        <?php 
                            foreach ($categories as $key => $value) {?>
                                <tr>
                                <td class="collapsing">
                                    <div class="ui checkbox">
                                        <input type="checkbox" id="jour<?php echo $value->getIdCategorieJournaux() ?>"> <label></label>
                                    </div>
                                </td>
                                    <td class="center aligned">
                                        <div class="ui small header">
                                            <?php echo $value->getCodeJournal();?>
                                        </div>
                                        
                                    </td>
                                    <td>
                                        <?php echo html_entity_decode($value->getNomJournal());?>
                                    </td>
                                    <td class="center aligned collapsing journalActions">
                                        <button class="ui icon small blue button vueDetailBtn" id="see<?php echo $value->getIdCategorieJournaux();?>">
                                            <i class="ui  search plus icon"></i>
                                        </button>
                                        <button class="ui icon small green button editBtn" id="edit<?php echo $value->getIdCategorieJournaux();?>">
                                            <i class="ui  edit icon"></i>
                                        </button>
                                        <button class="ui icon small red button deleteBtn" id="delete<?php echo $value->getIdCategorieJournaux();?>">
                                            <i class="ui  trash alternate outline  icon"></i>
                                        </button>
                                        <button class="ui icon small teal button" id="more<?php echo $value->getIdCategorieJournaux();?>">
                                            <i class="ui  plus  icon"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php } ?>
                        </tbody>
                        <tfoot class="full-width">
                            
                        </tfoot>
                    </table>
                    <div class="ui modal addJournal">
                        <i class="close icon"></i>
                        <div class="header">Détails</div>
                        <div class="content">
                            <div class="ui form" id="">
                                <div class="field">
                                    <label for="CodeJournal"></label>
                                    <input type="text" id="CodeJournal" name="CodeJournal">
                                </div>
                            </div>
                        </div>
                        <div class="actions">
                            <button class="ui labeled icon button"></button>
                        </div>
                    </div>
        </div>
        <div class="ui modal details journal"> 
            <div class="header">Détails du Journal</div>
            <div class="content">
                <div class="ui two column grid color white">
                    <div class="row even">
                        <div class="column">Code du journal</div>
                        <div class="column" id="codeValue"></div>
                    </div>
                    <div class="row odd">
                        <div class="column">Nom du journal</div>
                        <div class="column" id="nameValue"></div>
                    </div>
                    <div class="row even">
                        <div class="column">Responsables</div>
                        <div class="column" id="respoValue"></div>
                    </div>
                </div>
            </div>
            <div class="actions">
                <button class="ui primary button closeModalBtn">Okay</button>
            </div>
        </div>
        <div class="ui modal addJournalModal">
            <i class="close icon"></i>
            <div class="header">Créer un nouveau journal</div>
            <div class="content">
                <div class="ui form" id="addJournalForm">
                    <div class="field">
                        <label for="form_CodeJournal">Code du journal</label>
                        <input type="text" autocomplete="off" name="form_CodeJournal" placeholder="Le code doit être une lettre de l'alphabet">
                    </div>
                    <div class="field">
                        <label for="form_NomJournal">Nom du journal</label>
                        <input type="text" autocomplete="off" name="form_NomJournal">
                    </div>
                </div>
            </div>
            <div class="actions">
                <button class="ui primary labeled icon button" id="submitAdd"><i class="plus icon"></i> Créer</button>
                <button class="ui red labeled icon button closeModalBtn"><i class="close icon"></i>Annuler</button>
            </div>
        </div>
        <div class="ui modal userMessage">
            <i class="close icon"></i>
            <div class="header"></div>
            <div class="content">
            </div>
            <div class="actions">
                <button class="ui primary  button closeModalBtn">Okay</button>
            </div>
        </div>
        <div class="ui modal delete confirm">
            <div class="close icon"></div>
            <div class="ui inverted red header">Confirmation nécessaire</div>
            <div class="content">
                <h4>Voulez-vous vraiment supprimer <span id="journalToDelete"></span>?</h4>
            </div>
            <div class="actions">
                <button class="ui small labeled icon green button" id="confirmDeleteBtn"><i class="check icon"></i>Confirmer</button>
                <button class="ui small labeled icon red button closeModalBtn"><i class="close icon"></i>Annuler</button>
            </div>
        </div>
        <div class="ui modal edit">
            <i class="close icon"></i>
            <div class="header">Modifier Journal</div>
            <div class="content">
                <div class="ui form" id="editForm">
                    <div class="field">
                        <label for="edit_CodeJournal">Code du journal</label>
                        <input type="text" autocomplete="off" name="edit_CodeJournal" placeholder="Le code doit être une lettre de l'alphabet">
                    </div>
                    <div class="field">
                        <label for="edit_NomJournal">Nom du journal</label>
                        <input type="text" autocomplete="off" name="edit_NomJournal">
                    </div>
                </div>
            </div>
            <div class="actions">
                <button class="ui green labeled icon button" id="submitEditionBtn"><i class="edit icon"></i>Modifier</button>
                <button class="ui red labeled icon button closeModalBtn"><i class="close icon"></i>Fermer</button>
            </div>
        </div>
    </div>
    <div class="ui hidden divider"></div>
</div>