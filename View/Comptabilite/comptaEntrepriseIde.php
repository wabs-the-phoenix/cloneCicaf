
   
<div class= "">
        <div class="ui hidden divider"></div>
        <div class="title">
            <h2>Liste des Entreprises</h2>
        </div>
        <div class="ui divider"></div>
        <div class="board">
            <button class="ui  small primary labeled icon button " id="addEntrepriseBtn">
                <i class="plus icon"></i> Ajouter
            </button>
            <button class="ui  small red labeled icon button " id="deleteEntrepriseBtn">
                <i class="trash icon"></i> Supprimer
            </button>
            <div class="ui hidden divider"></div>
            <table class="ui celled table" style="width:100%" id="entreprisesList">
                <thead class="full-width">
                    <tr>
                        <th></th>
                        <th>Code entreprise</th>
                        <th>Nom de l'entreprise</th>
                        <th>Type de l'entreprise</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                   <?php
                            foreach ($entreprises as $key => $value) {?>
                                <tr>
                                    <td class="collapsing">
                                        <div class="field">
                                            <div class="ui checkbox">
                                            <input type="checkbox" tabindex="0" id="<?=$value->getIdEntreprise()?>" name="<?=$value->getIdEntreprise()?>">
                                            <label></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo html_entity_decode($value->getSCodeEntreprise())?></td>
                                    <td><?php echo  html_entity_decode($value->getSNomEntreprise())?></td>
                                    <td><?php echo html_entity_decode($value->getTypeEntreprise())?></td>
                                    <td class="collapsing">
                                        <button class="ui icon blue button vueDetailBtnEntreprise" id="vue<?=$value->getIdEntreprise()?>">
                                            <i class="ui  search plus icon"></i>
                                        </button>
                                        <button class="ui icon green  button editBtnEntreprise" id="edit<?=$value->getIdEntreprise()?>">
                                            <i class="ui  edit  icon"></i>
                                        </button>
                                        <button class="ui icon red button deleteBtnEntreprise" id="delete<?=$value->getIdEntreprise()?>">
                                            <i class="ui  trash alternate outline  icon"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php }
                        
                   ?>
                </tbody>
                <tfoot class="full-width">
                </tfoot>
            </table>
            <div class="ui modal entrepriseForm">
                <i class="close icon"></i>
                <div class="header">Ajouter Entreprise</div>
                <div class="content">
                    <form action="" method="POST" class="ui form" id="newEntrepriseForm">
                        <div class="field">
                            <label for="SCodeEntreprise">Code Entreprise</label>
                            <input type="text" name = "SCodeEntreprise" id="SCodeEntreprise">
                        </div>
                        <div class="field">
                            <label for="SNomEntreprise">Nom de l'entreprise</label>
                            <input type="text" name="SNomEntreprise" id = "SNomEntreprise">
                        </div>
                        <div class="field">
                            <label for="RespoEntreprise">Responsable del'Entreprise</label>
                            <input type="text" name="RespoEntreprise" id="RespoEntreprise">
                        </div>
                        <div class="field">
                            <label for="TypeEntreprise">Type d'Entreprise</label>
                            <input type="text" name="TypeEntreprise" id="TypeEntreprise">
                        </div>
                        <div class="field">
                            <label for="SNumRue">Numero d'adresse</label>
                            <input type="text" name="SNumRue" id="SNumRue">
                        </div>
                        <div class="field">
                            <label for="SNomRue">Rue</label>
                            <input type="text" name="SNomRue" id="SNomRue">
                        </div>
                        <div class="field">
                            <label for="communeEntr">Commune</label>
                            <div class="ui search communeEntr">
                                <input class="prompt" type="text" id="communeEntr" name="communeEntr">
                                <div class="results"></div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="">Numero de Téléphone</label>
                            <input type="text" name="SNumTel" id="SNumTel">
                        </div>
                        <div class="field">
                            <label for="NumEmail">Adresse e-mail</label>
                            <input type="text" name="NumEmail" id="NumEmail">
                        </div>
                        <div class="field">
                            <label for="DDebutActivite">Début des activités</label>
                            <input type="date" name="DDebutActivite" id="DDebutActivite">
                        </div>
                        <div class="field">
                            <label for="DDComptabilite">Debut de la Comptabilité</label>
                            <input type="date" name="DDComptabilite" id="DDComptabilite">
                        </div>
                        
                        <div class="field">
                            <label for="NIF">NIF</label>
                            <input type="text" name="NIF" id="NIF">
                        </div>
                        <div class="field">
                            <label for="NbreHeureDeTravailParJour">Nombre d'heure de travail</label>
                            <input type="number" name="NbreHeureDeTravailParJour" id="NbreHeureDeTravailParJour">
                        </div>
                        <div class="field">
                            <label for="NbreJourTravailParSemaine">Nombre de jour hebdomadaire</label>
                            <input type="number" name="NbreJourTravailParSemaine" id="NbreJourTravailParSemaine">
                        </div>
                    </form>
                </div>
                <div class="actions">
                    <button class="ui blue labeled icon button" id="submitEntrInfo">
                        <i class="edit icon"></i>
                        Ajouter
                    </button>
                    <button class="ui red labeled icon button closeModalBtn" id="cancelEntrInfo">
                        <i class="close icon"></i>
                        Annuler
                    </button>
                </div>
            </div>
        </div>
        <div class="ui hidden divider"></div>
        <div class="title">
            <h2>Liste des Entites</h2>
        </div>
        <div class="ui divider"></div>
        <div class="board">
            <button class="ui  small primary labeled icon button" id="addEntiteBtn">
                <i class="plus icon"></i> Ajouter
            </button>
            <button class="ui  small red labeled icon button" id="deleteEntiteBtn">
                <i class="trash icon"></i> Supprimer
            </button>
            <div class="ui divider hidden"></div>
            <table class="ui compact celled definition table"  id="entitesList">
                <thead class="full-width">
                    <tr>
                        <th></th>
                        <th>Code Entité</th>
                        <th>Nom de l'Entité</th>
                        <th>Entreprise mère</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                            foreach ($entites as $key => $value) {?>
                                <tr>
                                    <td class=" collapsing">
                                        <div class="field">
                                            <div class="ui checkbox">
                                            <input type="checkbox" tabindex="0" id="<?=$value->getIdEntreprise()?>" name="<?=$value->getIdEntreprise()?>">
                                            <label></label>
                                            </div>
                                        </div>
                                    </td>
                                    <td><?php echo  $value->getSCodeEntreprise()?></td>
                                    <td><?php echo html_entity_decode($value->getSNomEntreprise())?></td>
                                    <td><?php 
                                        $filtered = array_filter($entreprises, function($x) use($value) {
                                            if ($x->getIdEntreprise() == $value->getEntiteDe()) {
                                                return $x;
                                            }
                                        });
                                        foreach ($filtered as $k => $v) {
                                            echo html_entity_decode($v->getSNomEntreprise());
                                            break;
                                        }
                                        //
                                        ?></td>
                                    <td class="collapsing">
                                        <button class="ui icon  blue button vueDetailBtnEntitie" id="vue<?=$value->getIdEntreprise()?>">
                                            <i class="ui  search plus icon"></i>
                                        </button>
                                        <button class="ui icon  green button editEntiteBtn" id="edit<?=$value->getIdEntreprise()?>">
                                            <i class="ui  edit  icon"></i>
                                        </button>
                                        <button class="ui icon  red button deleteBtnEntreprise" id="delete<?=$value->getIdEntreprise()?>">
                                            <i class="ui  trash alternate outline  icon"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php }
                    ?>
                </tbody>
                <tfoot class="full-width">
                    
                </tfoot>
            </table>
            <div class="ui modal entiteForm">
                <i class="close icon"></i>
                <div class="header">
                    Ajouter une entité
                </div>
                <div class="content">
                    <form action="" method="POST" class="ui form" id="newEntityForm">
                        <div class="field">
                            <label for="SCodeEntreprise">Code Entité</label>
                            <input type="text" name="SCodeEntreprise" id="SCodeEntreprise">
                        </div>
                        <div class="field">
                            <label for="entitede">Entreprise</label>
                            <div class="ui search entr">
                                <input class="prompt" type="text" placeholder="Nom de l'Entreprise..." name="entitede" id="entitede">
                                <div class="results"></div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="SNomEntreprise">Nom de l'Entité</label>
                            <input type="text" name="SNomEntreprise" id="SNomEntreprise">
                        </div>
                        
                        <div class="field">
                            <label for="RespoEntreprise">Responsable</label>
                            <input type="text" name="RespoEntreprise" id="RespoEntreprise">
                        </div>
                        <div class="field">
                            <label for="SNumTel">Numéro de téléphone</label>
                            <input type="text" name="SNumTel" id="SNumTel">
                        </div>
                        <div class="field">
                            <label for="SNumRue">Numéro de la rue</label>
                            <input type="text" name="SNumRue" id="SNumRue">
                        </div>
                        <div class="field">
                            <label for="SNomRue">Nom de la rue</label>
                            <input type="text" name="SNomRue" id="SNomRue">
                        </div>
                        <div class="field">
                            <label for="commune">Commune</label>
                            <div class="ui search commune">
                                <input class="prompt" type="text" name="commune" id="commune">
                                <div class="results"></div>
                            </div>
                        </div>
                        
                    </form>
                </div>
                <div class="actions">
                    <button class="ui  blue labeled icon button" id="submitEntityInfo">
                        <i class="edit icon"></i>
                        Ajouter
                    </button>
                    <button class="ui  red labeled icon button closeModalBtn" id="cancelEntityInfo">
                        <i class="close icon"></i>
                        Annuler
                    </button>
                </div>
            </div>
        </div>
        <div class="ui hidden divider"></div>
        <div class="ui modal UserMessage">
            <i class="close icon"></i>
            <div class="header"></div>
            <div class="content">
            </div>
            <div class="actions">
                <button class="ui primary  button" id="modalMessageBtn">Okay</button>
            </div>
        </div>
        <div class="ui modal details " id="modalEntrepriseDetails">
            <i class="close icon"></i>
            <div class="header"></div>
            <div class="content">
                <div class="ui two column grid color white">

                </div>
            </div>
            <div class="actions">
                <button class="ui primary button" id="closeDetail">Okay</button>
            </div>
        </div>
        <div class="ui modal edit entreprise">
            <i class="close icon"></i>
            <div class="header">
                Modifier entreprise
            </div>
            <div class="content">
                    <div  class="ui form" id="editEntrepriseForm">
                        <div class="field">
                            <label for="editEtr_SCodeEntreprise">Code Entreprise</label>
                            <input type="text" name = "editEtr_SCodeEntreprise" id="editEtr_SCodeEntreprise">
                        </div>
                        <div class="field">
                            <label for="editEtr_SNomEntreprise">Nom de l'entreprise</label>
                            <input type="text" name="editEtr_SNomEntreprise" id = "editEtr_SNomEntreprise">
                        </div>
                        <div class="field">
                            <label for="editEtr_RespoEntreprise">Responsable del'Entreprise</label>
                            <input type="text" name="editEtr_RespoEntreprise" id="editEtr_RespoEntreprise">
                        </div>
                        <div class="field">
                            <label for="editEtr_TypeEntreprise">Type d'Entreprise</label>
                            <input type="text" name="editEtr_TypeEntreprise" id="editEtr_TypeEntreprise">
                        </div>
                        <div class="field">
                            <label for="editEtr_SNumRue">Numero d'adresse</label>
                            <input type="text" name="editEtr_SNumRue" id="editEtr_SNumRue">
                        </div>
                        <div class="field">
                            <label for="editEtr_SNomRue">Rue</label>
                            <input type="text" name="editEtr_SNomRue" id="editEtr_SNomRue">
                        </div>
                        <div class="field">
                            <label for="communeEntr">Commune</label>
                            <div class="ui search communeEntr">
                                <input class="prompt" type="text" id="editEtr_communeEntr" name="editEtr_communeEntr">
                                <div class="results"></div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="">Numero de Téléphone</label>
                            <input type="text" name="editEtr_SNumTel" id="editEtr_SNumTel">
                        </div>
                        <div class="field">
                            <label for="editEtr_NumEmail">Adresse e-mail</label>
                            <input type="text" name="editEtr_NumEmail" id="editEtr_NumEmail">
                        </div>
                        <div class="field">
                            <label for="editEtr_DDebutActivite">Début des activités</label>
                            <input type="date" name="editEtr_DDebutActivite" id="editEtr_DDebutActivite">
                        </div>
                        <div class="field">
                            <label for="editEtr_DDComptabilite">Debut de la Comptabilité</label>
                            <input type="date" name="editEtr_DDComptabilite" id="editEtr_DDComptabilite">
                        </div>
                        
                        <div class="field">
                            <label for="editEtr_NIF">NIF</label>
                            <input type="text" name="editEtr_NIF" id="editEtr_NIF">
                        </div>
                        <div class="field">
                            <label for="editEtr_NbreHeureDeTravailParJour">Nombre d'heure de travail</label>
                            <input type="number" name="editEtr_NbreHeureDeTravailParJour" id="editEtr_NbreHeureDeTravailParJour">
                        </div>
                        <div class="field">
                            <label for="editEtr_NbreJourTravailParSemaine">Nombre de jour hebdomadaire</label>
                            <input type="number" name="editEtr_NbreJourTravailParSemaine" id="editEtr_NbreJourTravailParSemaine">
                        </div>
                    </div>
            </div>
            <div class="actions">
                <button class="ui green labeled icon button" id="saveEdit">
                    <i class="save icon"></i>
                    Enregistrer
                </button>
                <button class="ui red labeled  icon button closeModalBtn">
                    <i class="close icon"></i>
                    Annuler
                </button>
            </div>
        </div>
        <div class="ui modal edit entite">
            <i class="close icon"></i>
            <div class="header">
                Modifier entité
            </div>
            <div class="content">
                    <div action="" method="POST" class="ui form" id="editEntiteForm">
                        <div class="field">
                            <label for="editEnti_SCodeEntreprise">Code Entité</label>
                            <input type="text" name="editEnti_SCodeEntreprise" id="editEnti_SCodeEntreprise">
                        </div>
                        <div class="field">
                            <label for="editEnti_entitede">Entreprise</label>
                            <div class="ui search entr">
                                <input class="prompt" type="text" placeholder="Nom de l'Entreprise..." name="editEnti_entitede" id="editEnti_entitede">
                                <div class="results"></div>
                            </div>
                        </div>
                        <div class="field">
                            <label for="editEnti_SNomEntreprise">Nom de l'Entité</label>
                            <input type="text" name="editEnti_SNomEntreprise" id="editEnti_SNomEntreprise">
                        </div>
                        
                        <div class="field">
                            <label for="editEnti_RespoEntreprise">Responsable</label>
                            <input type="text" name="editEnti_RespoEntreprise" id="editEnti_RespoEntreprise">
                        </div>
                        <div class="field">
                            <label for="editEnti_SNumTel">Numéro de téléphone</label>
                            <input type="text" name="editEnti_SNumTel" id="editEnti_SNumTel">
                        </div>
                        <div class="field">
                            <label for="editEnti_SNumRue">Numéro de la rue</label>
                            <input type="text" name="editEnti_SNumRue" id="editEnti_SNumRue">
                        </div>
                        <div class="field">
                            <label for="editEnti_SNomRue">Nom de la rue</label>
                            <input type="text" name="editEnti_SNomRue" id="editEnti_SNomRue">
                        </div>
                        <div class="field">
                            <label for="editEnti_commune">Commune</label>
                            <div class="ui search commune">
                                <input class="prompt" type="text" name="editEnti_commune" id="editEnti_commune">
                                <div class="results"></div>
                            </div>
                        </div>
                    </div>
            </div>
            <div class="actions">
                <button class="ui green labeled icon button" id="saveEntiEditBtn">
                    <i class="save icon"></i>
                    Enregistrer
                </button>
                <button class="ui red labeled  icon button closeModalBtn">
                    <i class="close icon"></i>
                    Annuler
                </button>
            </div>
        </div>
        <div class="ui modal delete confirm">
            <div class="close icon"></div>
            <div class="ui inverted red header">Confirmation nécessaire</div>
            <div class="content">
                <h4>Voulez-vous vraiment supprimer <span id="entrepriseToDeleteName"></span>?</h4>
            </div>
            <div class="actions">
                <button class="ui small labeled icon green button" id="confirmDeleteBtn"><i class="check icon"></i>Confirmer</button>
                <button class="ui small labeled icon red button closeModalBtn"><i class="close icon"></i>Annuler</button>
            </div>
        </div>
</div>