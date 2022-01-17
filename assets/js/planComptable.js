(
    function () {
        //#region : usuals function
        const confirmCreation = () => {
            if(compteAcreer) {
                let modal = $(`.ui.modal.submitCreation`);
                let modalEl = document.querySelector(`.ui.modal.submitCreation`)
                let type = `submit`;
                let message = `
                <div class="ui medium header">Voulez créer ce compte?</div>
                <div class="ui two column grid">
                    <div class="column">Numéro de Compte:</div>
                    <div class="column">${compteAcreer.numeroCompte}</div>
                    <div class="column">Designation</div>
                    <div class="column">${compteAcreer.desi}</div>
                    <div class="column">Type de Compte</div>
                    <div class="column">${compteAcreer.typeCompte}</div>
                    <div class="column">Lettrage</div>
                    <div class="column">${compteAcreer.lettrage}</div>
                    <div class="column">Compte Divisionnaire</div>
                    <div class="column">${compteAcreer.compteDivisio}</div>
                </div>
                `;
                showModal(modal, modalEl, type, message);
            }
        }
        const showModal = (modal, modalEl, type, content) => {
            const header = modalEl.querySelector(`.header`);
            if (type === `error`) {
                header.innerHTML = `Echec de l'opération`;
                header.classList.add(`ui`)
                header.classList.add(`red`)
            }
            else if(type === `success`) {
                header.innerHTML = `L'opération s'est effectuée`;
                header.classList.add(`ui`);
                header.classList.add(`green`);
            }
            else if(type === `submit`) {
                header.innerHTML = `Veuillez Confirmer`;
                header.classList.add(`ui`);
                header.classList.add(`blue`);
            }
            else if(type === `info`) {
                header.innerHTML = `Veuillez Confirmer`;
                header.classList.add(`ui`);
                header.classList.add(`teal`);
            }
            const messageContent = modalEl.querySelector(`.content`);
            messageContent.innerHTML = content;
            modal.modal(`toggle`);
        }
        const showAlertAndCloseModal = (modal, type, content) => {
            modal.modal('toggle');
            let message = document.querySelector(`.ui.modal.UserMessage`);
            const header = message.querySelector(`.header`);
            if (type === `error`) {
                header.innerHTML = `Echec de l'opération`;
                header.classList.add(`ui`)
                header.classList.add(`red`)
            }
            else if(type === `success`) {
                header.innerHTML = `L'opération s'est effectuée`;
                header.classList.add(`ui`);
                header.classList.add(`green`);
            }
            const messageContent = message.querySelector(`.content`);
            messageContent.innerHTML = content;
            $(`.ui.modal.UserMessage`).modal(`toggle`);
            
        }
        //ajouter foctio permettat de redre impossile tout les champs
        //de type umer d'etrer autre chose que des omres

        const loadAllPc = () => {
            const xhr = new XMLHttpRequest();
            xhr.open(`GET`, `/api/planComptables`);
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res = xhr.responseText;
                        try {
                            res = JSON.parse(res);
                        } catch (error) {
                            console.log(error)
                            return;
                        }
                        if (res.type == `success`) {
                            planComptables = res.datas;
                            if (planComptables.length > 0) {
                                pcActuel = planComptables[0];
                            }
                            showPcs(planComptables);
                        }
                    }
                    else {
                        //To complete
                    }
                }
            }
            xhr.send();
        }
        const findCompteEl = (value, collectes, tableName) => {
            let collectionObject;
            let elementValue;
            switch (tableName) {
                case `Classe`:
                    elementValue = value.substr(0,1);
                    break;
                case `ComptePrincipal`:
                    elementValue = value.substr(0,2);
                    break;
                case `SousCompte`:
                    elementValue = value.substr(0,3);
                    break;
                case `CompteDivisionnaire`:
                    elementValue = value.substr(0,4);
                break;
                default:
                    elementValue = value.substr(0,6);
                    break;
            }
            collectionObject = collectes.find(x => x[`Code${tableName}`] === elementValue);
            console.log(value)
            if (collectionObject == undefined) {
                return undefined;
            }
            return collectionObject;
        }
        //charger toutes les classess
        const loaAllClasses = () => {
            const xhr = new XMLHttpRequest();
            xhr.open(`GET`, `/api/classes`);
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res = xhr.responseText;
                        try {
                            res = JSON.parse(res);
                        } catch (error) {
                            console.log(error)
                            return;
                        }
                        if (res.type == `success`) {
                            classes = res.datas;
                        }
                    }
                    else {
                        //To complete
                    }
                }
            }
            xhr.send();
        }
        const loadAllComptePrinci = () => {
            const xhr = new XMLHttpRequest();
            xhr.open(`GET`, `/api/comptePrincipaux`);
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res = xhr.responseText;
                        try {
                            res = JSON.parse(res);
                        } catch (error) {
                            console.log(error)
                            return;
                        }
                        if (res.type == `success`) {
                            comptePrincipaux = res.datas;
                        }
                    }
                    else {
                        //To complete
                    }
                }
            }
            xhr.send();
        }
        const loadAllSousCompte = () => {
            const xhr = new XMLHttpRequest();
            xhr.open(`GET`, `/api/sousComptes`);
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res = xhr.responseText;
                        try {
                            res = JSON.parse(res);
                        } catch (error) {
                            console.log(error)
                            return;
                        }
                        if (res.type == `success`) {
                            sousComptes = res.datas;
                        }
                    }
                    else {
                        //To complete
                    }
                }
            }
            xhr.send();
        }
        const loadAllCompteDivision = () => {
            const xhr = new XMLHttpRequest();
            xhr.open(`GET`, `/api/comptesDivisionnaires`);
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res = xhr.responseText;
                        try {
                            res = JSON.parse(res);
                        } catch (error) {
                            console.log(error)
                            return;
                        }
                        if (res.type == `success`) {
                            comptesDivisionnaires = res.datas;
                        }
                    }
                    else {
                        //To complete
                    }
                }
            }
            xhr.send();
        }
        const loadAllFamille = () => {
            const xhr = new XMLHttpRequest();
            xhr.open(`GET`, `/api/familles`);
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res = xhr.responseText;
                        try {
                            res = JSON.parse(res);
                        } catch (error) {
                            console.log(error)
                            return;
                        }
                        if (res.type == `success`) {
                            familles = res.datas;
                        }
                    }
                    else {
                        //To complete
                    }
                }
            }
            xhr.send();
        }
        const showPcInfo = (pc) => {
            dataCompteRows[0].querySelector(`input`).value = pc.idPlanComptable;
            dataCompteRows[1].querySelector(`input`).value = pc.Numclasse;
            dataCompteRows[1].children[2].children[0].innerHTML = pc.DesiClassel;
            dataCompteRows[2].querySelector(`input`).value = pc.ComptePrinci;
            dataCompteRows[2].children[2].children[0].innerHTML = pc.DesiComptePrinci;
            dataCompteRows[3].querySelector(`input`).value = pc.SousCompte;
            dataCompteRows[3].children[2].children[0].innerHTML = pc.DesiSousCompte;
            dataCompteRows[4].querySelector(`input`).value = pc.CodeDivision;
            dataCompteRows[4].children[2].children[0].innerHTML = pc.DesiDivision;
            dataCompteRows[5].querySelector(`input`).value = pc.CodeFamille;
            dataCompteRows[5].children[2].children[0].innerHTML = pc.DesiFamille;
            dataCompteRows[6].querySelector(`input`).value = pc.CompteOperation;
            dataCompteRows[6].children[2].children[0].innerHTML = pc.DesiOperation;
            dataCompteRows[7].querySelector(`input`).value = pc.Lettrage4 ;
        }
        const createPcTable = (dataToShow) => {
            let number = dataToShow.length;
            if (number > 10) {
                let page = parseInt(number / 10);
                let supp = number % 10;
                if(supp > 1) {
                    page++ ;
                }
            }
            nombreDePage = parseInt(number / 10);
            if ((number % 10) >  0) {
                nombreDePage++;
            }
            let start = (pageComptes * 10) - 10;
            let end;
            
            if (nombreDePage == pageActuelle) {
                end = number;
            }
            else if(number < 10){
                end = number;
            }
            else {
                end = 10;
            }
            allCopmtesList.innerHTML = "";
            if (number === 0) {
                let row = document.createElement(`tr`);
                row.innerHTML = `
                    <td></td>
                    <td colspan="7">
                        Aucun Mouvement ne correspond à l'exercice demandé
                    </td>
                `;
                allCopmtesList.appendChild(row);
            }
            for (let i = start; i < end; i++) {
                const dataRow = dataToShow[i];
                let row = document.createElement('tr');
                const checkMove = document.createElement('input');
                checkMove.type = 'checkbox';
                checkMove.id = dataRow.idPlanComptable;
                let label = document.createElement('label');
                let cellDiv = document.createElement('div');
                cellDiv.classList.add('ui');
                cellDiv.classList.add('fitted');
                cellDiv.classList.add('slider');
                cellDiv.classList.add('checkbox');
                const checkCell = document.createElement('td');
                checkCell.classList.add('collapsing');
                cellDiv.appendChild(checkMove);
                cellDiv.appendChild(label);
                checkCell.append(cellDiv);
                row.appendChild(checkCell);
                let numeroCell = document.createElement('td');
                numeroCell.innerHTML = dataRow.idPlanComptable;
                let classCell = document.createElement('td');
                classCell.innerHTML = dataRow.Numclasse ;
                let compteOpeCell = document.createElement('td');
                compteOpeCell.innerHTML = dataRow.CompteOperation;
                let desiCell = document.createElement('td');
                desiCell.innerHTML = dataRow.DesiOperation;
                let ComptePrinciCell = document.createElement('td');
                ComptePrinciCell.innerHTML = dataRow.ComptePrinci;
                row.appendChild(numeroCell);
                row.appendChild(classCell);
                row.appendChild(compteOpeCell);
                row.appendChild(desiCell);
                row.appendChild(ComptePrinciCell);
                const actionCell = document.createElement('td');
                actionCell.classList.add('text-center');
                const actioBtn = document.createElement('button');
                actioBtn.classList.add('ui');
                actioBtn.classList.add('basic');
                //actioBtn.classList.add('blue');
                actioBtn.classList.add('icon');
                actioBtn.classList.add('button');
                actioBtn.innerHTML = `<i class="search plus blue icon"></i>`;
                actioBtn.id = `${dataRow.idPlanComptable}`;
                actioBtn.addEventListener('click', showMoveDetails)
                actionCell.appendChild(actioBtn);
                actionCell.classList.add('center');
                actionCell.classList.add('aligned');
                row.appendChild(actionCell);
                allCopmtesList.appendChild(row);
            }
        }
        const showPcs = (planComptables, callBack) => {
            console.log(planComptables)
            let pcs;
            if (callBack) {
               console.log(planComptables)
                pcs = callBack(planComptables);
                createPcTable(pcs);
                return;
            }
            createPcTable(planComptables);
        }
        const extractCompteItems = (CompteOperation) => {
            let classe = findCompteEl(CompteOperation, classes, `Classe`);
            console.log(classe)
            let sousCompte = findCompteEl(CompteOperation, sousComptes, `SousCompte`);
            let comptePrincipal = findCompteEl(CompteOperation, comptePrincipaux, `ComptePrincipal`);
            let compteDivisio = findCompteEl(CompteOperation, comptesDivisionnaires, `CompteDivisionnaire`);
            let compteFamille = findCompteEl(CompteOperation, familles, `CompteFamille`);
            if (classe == undefined) {
                showAlertAndCloseModal( $(`.ui.modal.compteForm`), `error`, `Classe inexistante! veuillez la créer au préalable`);
                return;
            }
            
            else if (comptePrincipal == undefined) {
                showAlertAndCloseModal( $(`.ui.modal.compteForm`), `error`, `Compte Principal inexistant! veuillez la créer au préalable`);
                return;
                
            }
            if (sousCompte == undefined) {
                showAlertAndCloseModal( $(`.ui.modal.compteForm`), `error`, `Sous compte inexistant! veuillez la créer au préalable`);
                return;
            }
            else if (compteDivisio == undefined) {
                showAlertAndCloseModal( $(`.ui.modal.compteForm`), `error`, `Compte Divisionnaire inexistant! veuillez la créer au préalable`);
                return;
            }
            else if (compteFamille == undefined) {
                showAlertAndCloseModal( $(`.ui.modal.compteForm`), `error`, `Compte Famille inexistant! veuillez la créer au préalable`);
                return;
            }
            return {
                classe,
                comptePrincipal,
                sousCompte,
                compteDivisio,
                compteFamille
            }
           
        }
        //#endregion

        //#region : listenners
        const loadPcoPage = (e) => {
            e.preventDefault();
            content.removeChild(pcHome);
            content.appendChild(pcoList);

            const xhr = new XMLHttpRequest();
            xhr.open('GET', '/comptable-list');
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res = xhr.responseText;
                        pcoList.innerHTML = res;
                    }
                }
            }
            xhr.send();
        }
        const loadPrevPc = (e) => {
            e.preventDefault();
            if (pageActuelle > 1) {
                pageActuelle --;
            }
            else {
                pageActuelle = 1;
            }
            let number = planComptables.length;
            if (number < 1) {
                //Behavior to add
                return;
            }
            
            pcActuel = planComptables[pageActuelle - 1];
            showPcInfo(pcActuel);
        }
        const loadNextPc = (e) => {
            e.preventDefault();
            let number = planComptables.length;
            if (pageActuelle < number) {
                pageActuelle ++;
            }
            else {
                pageActuelle = number;
            }
            if (number < 1) {
                //Behavior to add
                
                return;
            }
            
            pcActuel = planComptables[pageActuelle - 1];
            showPcInfo(pcActuel);
        }
        //To complete
        const loadRealPcPage = (e) => {
            e.preventDefault();
            const link = e.currentTarget;
            
            if (link.classList.contains(`active`)) {
                return;
            }
            for (let i = 0; i < menuPcLink.length; i++) {
                const element = menuPcLink[i];
                if (element !== link) {
                    if (element.classList.contains(`active`)) {
                        element.classList.remove(`active`)
                    }
                }

            }
            link.classList.add(`active`);
            switch (link) {
                case menuPcLink[0]:
                    firstPcPage.style.display = ``;
                    secondPcPage.style.display = `none`;
                    break;
                case menuPcLink[1]:
                    secondPcPage.style.display = ``;
                    firstPcPage.style.display = `none`;
                    break;
                default:
                    break;
            }
        }
        const showMoveDetails = (e) => {
            e.preventDefault();
        }
        const addCompte = (e) => {
            e.preventDefault();
            $(`.ui.modal.compteForm`).modal(`toggle`);
        }
        const createCompte = (e) => {
            let CompteOperation = newCompteData[1].value;
            console.log(CompteOperation)
            let desi = newCompteData[1].value;
            let typeCompte = newCompteData[2].value;
            CompteOperation = CompteOperation.trim();
            let compteItems = extractCompteItems(CompteOperation);
            if (compteItems == undefined) {
                return;
            }
            let numeroCompte;
            //To Do verifier omre de caractere @CompteOperation
            //TO DO completer les rags maquqt pqr des zero @CompteOperation
            //TO DO proteger le champ desi
            let formData = new FormData();
            try {
                numeroCompte = parseInt(CompteOperation);
            } catch (error) {
            }
            
            formData.append(`NumCompte`, numeroCompte);
            formData.append(`CompteOperation`, CompteOperation )
            formData.append(`DesiOperation`, desi);
            formData.append(`typeCompte`, typeCompte);
            let lettrage = ``;
            formData.append(`Lettrage4`, lettrage);
            
            //create lettrageFunction
            formData.append(`Numclasse`, compteItems.classe.CodeClasse);
            formData.append(`DesiClassel`, compteItems.classe.CodeClasse);
            formData.append(`ComptePrinci`, compteItems.comptePrincipal.CodeComptePrincipal );
            formData.append(`DesiComptePrinci`, compteItems.comptePrincipal.DesignationCompte );
            formData.append(`SousCompte`, compteItems.sousCompte.CodeSousCompte );
            formData.append(`DesiSousCompte`, compteItems.sousCompte.Designation );
            formData.append(`CodeDivision`, compteItems.compteDivisio.CodeCompteDivisionnaire );
            formData.append(`DesiDivision`, compteItems.compteDivisio.DesigantionCD);
            formData.append(`CodeFamille`, compteItems.compteFamille.CodeCompteFamille  );
            formData.append(`DesiFamille`, compteItems.compteFamille.DesigantionCompteFamille);
            formData.append(`debit`, 0);
            formData.append(`credit`, 0);
              
            compteAcreer = {
                numeroCompte,
                desi,
                typeCompte,
                lettrage,
                classe : compteItems.classe.CodeClasse,
                comptePrincipal : compteItems.comptePrincipal.CodeComptePrincipal,
                sousCompte : compteItems.sousCompte.CodeSousCompte,
                compteDivisio : compteItems.compteDivisio.CodeCompteDivisionnaire,
                compteFamille : compteItems.compteFamille.CodeCompteFamille
            }
            formDataToCreateCompte = formData;
            confirmCreation();
            
        }
        const closeSelfModal = (e) => {
            let button = e.currentTarget;
            let modal = button.parentElement.parentElement;
            let itemClasses = ``;
            for (let i = 0; i < modal.classList.length; i++) {
                const cl = modal.classList[i];
                itemClasses += `.${cl}`;
            }
            $(itemClasses).modal(`toggle`);
        }
        const savePcToDB = (e) => {
            e.preventDefault();
            const xhr = new XMLHttpRequest();
            xhr.open(`POST`, `/api/planComptables`);
            xhr.onreadystatechange = () => {
                if(xhr.readyState == 4) {
                    if(xhr.status == 200) {
                        let res = xhr.responseText;
                        try {
                            res = JSON.parse(res);
                        } catch (error) {
                            //TO  DO : changer le code d'erreur
                            console.log(error);
                        }
                        if(res.type == "success" ) {
                            let modal = $(`.ui.modal.UserMessage`);
                            let modalEl = document.querySelector(`.ui.modal.UserMessage`)
                            let type = `success`;
                            let message = `
                            <div class="ui two column grid">
                                <div class="column">
                                    <div class="ui basic segment">
                                        Compte créé avec succès
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="ui basic segement">
                                        <div class="ui green circular big icon button">
                                            <i class="check icon"></i>
                                        </div>
                                </div>
                            </div>
                            `;
                            showModal(modal, modalEl, type, message);
                            loadAllPc();
                        }
                        else {
                            let modal = $(`.ui.modal.UserMessage`);
                            let modalEl = document.querySelector(`.ui.modal.UserMessage`)
                            let type = `error`;
                            let message = `
                            <div class="ui two column grid">
                                <div class="column">
                                    <div class="ui basic segment">
                                        Le compte n'a pas été créé
                                    </div>
                                </div>
                                <div class="column">
                                    <div class="ui basic segement">
                                        <div class="ui red circular big icon button">
                                        <i class="ban icon"></i>
                                    </div>
                                </div>
                            </div>
                            `;
                            console.log(res.message)
                            showModal(modal, modalEl, type, message);
                        }
                       
                    }
                }
            }
            xhr.send(formDataToCreateCompte);
        }
        const sortByCriteres = (e) => {
            e.preventDefault();
            const select = e.currentTarget;
            console.log(planComptables)
            if (select != null) {
                showPcs(planComptables,(dataToShow) => {
                    let value = sortPC.value;
                    console.log(dataToShow)
                    switch (value) {
                        case "id": 
                            if (sens) {
                                dataToShow.sort((x,b) => {
                                    return x.idPlanComptable > b.idPlanComptable ? -1 : 1;
                                });
                            }
                            else {
                                dataToShow.sort((x,b) => {
                                    return x.idPlanComptable < b.idPlanComptable ? -1 : 1;
                                });
                            }
                            break;
                        
                        case "co": {
                            if (sens) {
                                dataToShow.sort((x,b) => {
                                    return x.NumCompte > b.NumCompte ? -1 : 1;
                                });
                            }
                            else {
                                dataToShow.sort((x,b) => {
                                    return x.NumCompte < b.NumCompte ? -1 : 1;
                                });
                            }
                            break;
                        }
                        
                        default:
                                break;
                    }
                    return dataToShow;
                } );
            }
        }
        const sortByBtn = (e) => {
            e.preventDefault();
            const select = e.currentTarget;
            if (select.id === "sortPCBtn") {
                sens = sens ? false : true;
                select.innerHTML = select.innerHTML === `<i class="angle down icon"></i>`? `<i class="angle up icon"></i>` : `<i class="angle down icon"></i>`;
            }
            if (select != null) {
                showPcs(planComptables,(dataToShow) => {
                    let value = sortPC.value;
                    switch (value) {
                        case "id": 
                            if (sens) {
                                dataToShow.sort((x,b) => {
                                    return x.idPlanComptable > b.idPlanComptable ? -1 : 1;
                                });
                            }
                            else {
                                dataToShow.sort((x,b) => {
                                    return x.idPlanComptable < b.idPlanComptable ? -1 : 1;
                                });
                            }
                            break;
                        
                        case "co": {
                            if (sens) {
                                dataToShow.sort((x,b) => {
                                    return x.NumCompte > b.NumCompte ? -1 : 1;
                                });
                            }
                            else {
                                dataToShow.sort((x,b) => {
                                    return x.NumCompte < b.NumCompte ? -1 : 1;
                                });
                            }
                            break;
                        }
                        
                        default:
                                break;
                    }
                    return dataToShow;
                } );
            }
            
        }
        //#endregion
       //#region : selection des elements
        const btnUpdate = document.querySelector('#btnUpdate');
        const content = document.querySelector('#contentPc');
        const pcHome = content.children[0];
        const pcoList = document.createElement('div');
        const menuPcLink = document.querySelectorAll('#menuPc a');
        const allCopmtesList = document.querySelector(`#allCopmtesList`);
        const firstPcPage = document.querySelector(`#firstPcPage`);
        const secondPcPage = document.querySelector(`#secondPcPage`);
        const addCompteBtn = document.querySelector(`#addCompteBtn`);
        const saveNewCompte = document.querySelector(`#saveNewCompte`);
        const cancelSauvegarde = document.querySelector(`#cancelSauvegarde`);
        const newCompteData = document.querySelectorAll(`#newCompteForm input, select`);
        console.log(newCompteData)
        const savePlanComptableBtn = document.querySelector(`#savePlanComptableBtn`);
        const sortPC = document.querySelector(`#sortPC`);
        const sortPCBtn = document.querySelector(`#sortPCBtn`);
        //champ des donnees
        const dataCompteRows = document.querySelectorAll(`#planCompta .ui.grid .row`);
        //
        //navigation entre les differents plan comptables
        const prevBtn = document.querySelector(`#prevBtn`);
        const nextBtn = document.querySelector(`#nextBtn`);
        let modalMessageBtn = document.querySelector(`#modalMessageBtn`);

        //correspond au numero de plan comptable sur lequelle on se trouve
        let pageActuelle = 1;
        let pageComptes = 1;
        let planComptables = [];
        let classes = [];
        let comptePrincipaux = [];
        let sousComptes = [];
        let comptesDivisionnaires = [];
        let familles = [];
        let compteAcreer;
        let formDataToCreateCompte;
        //les donnees du plan comptable sur lequelle on se trouve
        let pcActuel;
        let sens = true;
       //#endregion

       //#region: load all plan comptable
            loadAllPc();
            loaAllClasses();
            loadAllComptePrinci();
            loadAllSousCompte();
            loadAllCompteDivision();
            loadAllFamille();
       //#endregion

       //#region : addevents listeners to elements
       btnUpdate.addEventListener('click', loadPcoPage);
       prevBtn.addEventListener(`click`, loadPrevPc);
       nextBtn.addEventListener(`click`, loadNextPc);
       for (let i = 0; i < menuPcLink.length; i++) {
           const link = menuPcLink[i];
           link.addEventListener(`click`, loadRealPcPage);
       }
       addCompteBtn.addEventListener(`click`, addCompte);
       saveNewCompte.addEventListener(`click`, createCompte)
       modalMessageBtn.addEventListener(`click`, closeSelfModal)
       savePlanComptableBtn.addEventListener(`click`, savePcToDB);
       sortPC.addEventListener(`change`, sortByCriteres)
       sortPCBtn.addEventListener(`click`, sortByBtn )
       //#endregion
    }
)()