(
    function () {
        //#region : usuals class functions
        
        //#endregion


        //#region : usuals function
        /**
         * verifier si la valeur respecte la condition 
         * donnee dans le callBack
         * @param {string} value 
         * @param {functions} callBack 
         * @returns {boolean}
         */
        const isCorrect = (value, callBack) => {
            return callBack(value)
        }
        /**
         * verifier si le caractere est un nombre en deux chiffre
         * @param {string or integer} value 
         * @returns 
         */
        const isTwoCharNumber = (value) => {
            if (value.search(/^\d\d$/) !== -1) {
                return true;
            }
            return false;
        }
        const isNumberWithDescribeLenght = (value, _lenght) => {
             if (value.search(/\D/) !== -1 && value.length == _lenght) {
                 console.log(value)
                return false;
            }
            return true;
        }
        /**
         * confirmer la creation du compte
         */
        const confirmCreation = () => {
            if(compteAcreer) {
                let modal = $(`.ui.modal.submitCreation`);
                let modalEl = document.querySelector(`.ui.modal.submitCreation`)
                let type = `submit`;
                let message = `
                <div class="ui medium header">Voulez créer ce compte?</div>
                <div class="ui two column grid">
                    <div class="column">Numéro de Compte:</div>
                    <div class="column">${compteAcreer.CompteOperation}</div>
                    <div class="column">Designation</div>
                    <div class="column">${compteAcreer.desi}</div>
                    <div class="column">Lettrage</div>
                    <div class="column">${compteAcreer.lettrage}</div>
                    <div class="column">Compte Divisionnaire</div>
                    <div class="column">${compteAcreer.compteDivisio}</div>
                </div>
                `;
                showModal(modal, modalEl, type, message);
            }
        }
        /**
         * Afficher une boite modal
         * @param {jqueryEl} modal 
         * @param {HTMLElement} modalEl 
         * @param {string} type 
         * @param {string} content 
         */
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
        /**
         * 
         * @param {jqueryEl} modal 
         * @param {string} type 
         * @param {string} content 
         */
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
        /**
         * Afficher un message a l'utilisateur
         * @param {string} headerText : texte d'entete
         * @param {string} contentText : texte de contenu
         */
        const showUserMessage = (headerText ,contentText) => {
            const modal = document.querySelector(".ui.modal.UserMessage");
            const header = modal.querySelector(".header");
            header.innerHTML = headerText;
            const content = modal.querySelector(".content");
            
            content.innerHTML = contentText;
            $(".ui.modal.UserMessage").modal("show");
        }
        /**
         * Afficher un message a l'utilisateur
         * @param {HTMLElement} div 
         * @param {string} message 
         * @param {string} type 
         */
        const showMessageDiv = (div, message, type) => {
            const serverPesponses = document.querySelectorAll(".serverResponse");
            for (let i = 0; i < serverPesponses.length; i++) {
                const element = serverPesponses[i];
                if (!element.classList.contains("hidden")) {
                    element.classList.add("hidden");
                }
            }
            let typeMessage;
            let headerMessage;
            if (type == "success") {
                typeMessage = "success";
                headerMessage = "Opération réussie";
            }
            div.classList.add(typeMessage);
            div.classList.remove("hidden");
            div.querySelector(".header").innerHTML = "Opération réussie";
            div.querySelector("p").innerHTML = message;
        }
        /**
         * ajouter une ligne
         * @param {object} datas : informations sur le compte
         */
        const inserLineBefore = (datas) => {
            const allCopmtesList = document.querySelector("#allCopmtesList");
            const tbody = allCopmtesList.querySelector("tbody");
            const row = document.createElement("tr");
            row.id = `line${datas.idPlanComptable}`;
            const classe = document.createElement("td");
            classe.innerHTML = datas.Numclasse;
            row.appendChild(classe);
            const codeOpe = document.createElement("td");
            codeOpe.innerHTML = datas.CompteOperation;
            row.appendChild(codeOpe);
            const desi = document.createElement("td");
            desi.innerHTML = datas.DesiOperation;
            row.appendChild(desi);
            const princi = document.createElement("td");
            princi.innerHTML = datas.ComptePrinci;
            row.appendChild(princi);
            const lastCell = document.createElement("td");
            const editBtn = document.createElement("button");
            editBtn.className = "ui small green icon button";
            editBtn.innerHTML = `<i class="edit icon"></i>`;
            editBtn.id = `edit${datas.idPlanComptable}`;
            //editBtn.addEventListenner("click", editPc);
            const trash =  document.createElement("button");
            trash.className = "ui small red icon button";
            trash.innerHTML = `<i class="trash alternate outline  icon"></i>`;
            trash.id = `delete${datas.idPlanComptable}`;
            //trash.addEventListenner("click", deletePc);
            lastCell.appendChild(editBtn);
            lastCell.append("\n");
            lastCell.appendChild(trash);
            row.appendChild(lastCell);
            const firstChild = tbody.firstElementChild;
            tbody.insertBefore(row, firstChild);
        }
        /**
         * Ajouter une ligne
         * @param {object} datas 
         */
        const inserLineBeforeClasse = (datas) => {
            const listesTable = document.querySelector("#allClassesList");
            const tbody = listesTable.querySelector("tbody");
            const row = document.createElement("tr");
            row.id = `classe${datas.idClasse}`;
            const cellClass = document.createElement("td");
            cellClass.innerHTML = datas.CodeClasse;
            const cellDesc = document.createElement("td");
            cellDesc.innerHTML = datas.Designation;
            const actionCell = document.createElement("td");
            actionCell.className = "collapsing";
            const editBtn = document.createElement("button");
            editBtn.className = "ui small green icon button";
            editBtn.innerHTML = `<i class="edit icon"></i>`;
            //event listenner
            const deleteBtn = document.createElement("button");
            deleteBtn.className = "ui small red icon button";
            deleteBtn.innerHTML = `<i class="trash alternate outline icon"></i>`;
            deleteBtn.id= `deleteClasse${datas.idClasse}`;
            deleteBtn.addEventListener("click", deleteClass);
            actionCell.appendChild(editBtn);
            actionCell.append("\n");
            actionCell.appendChild(deleteBtn);
            row.appendChild(cellClass);
            row.appendChild(cellDesc);
            row.appendChild(actionCell);
            tbody.appendChild(row);
        }
        
        /**
         * Supprimer une ligne dans le tableau
         * de classe
         * @param {*} id 
         */
        const removeClassLine = (id) => {
            const allClassesList = document.querySelector("#allClassesList");
            let tbody = allClassesList.querySelector("tbody");
            let searchedId = `classe${id}`;
            let row = tbody.querySelector(`#${searchedId}`);
            tbody.removeChild(row);
        }
        const inserLineBeforeComptePrincipal = (datas) => {

        }
        /**
         * supprimer une ligne
         * @param {string} id 
         */
        const removeLine = (id) => {
            let line = "line" + id;
            let row = allCopmtesList.querySelector(`tr#${line}`);
            let tbody = allCopmtesList.querySelector(`tbody`);
            tbody.removeChild(row);
        }
        /**
         * recuperer les donnees via une api
         * @param {string} url 
         * @param {function} callBack 
         */
        const getApiDatas = (url, callBack) => {
            const xhr = new XMLHttpRequest();
            xhr.open('GET', url);
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res = xhr.responseText;
                        try {
                            res = JSON.parse(res);
                            
                        } catch (error) {
                            showUserMessage("Problème interne du Serveur", "Les données ne peuvent être récupérer depuis la base de donnée")
                            return;
                        }
                        if(res.type === "success") {
                            if (callBack) {
                                callBack(res);
                            }
                        }
                        else {
                            console.log(res.datas)
                        }
                        
                    }
                }
            }
            xhr.send();
        }
        /**
         * envoyer les donnees pour les enregistrer
         * @param {string} url 
         * @param {FormData} formData 
         * @param {function} callBack 
         */
        const postApiDatas = (url, formData, callBack) => {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', url);
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res = xhr.responseText;
                        try {
                            res = JSON.parse(res);
                            
                        } catch (error) {
                            //code to complete
                           showUserMessage("Opération échouée", `Impossible d'atteindre la base de donnée <i class="red close icon"></i>`);
                           console.log(res)

                            return;
                        }
                        if(res.type == `success`) {
                            if (callBack) {
                                callBack(res);
                            }
                            return;
                        }
                        else {
                            console.log(res)
                        }
                        
                        
                    }
                }
            }
            xhr.send(formData);
        }
        /**
         * recuperer toutes les entites
         * @param {string} url 
         */
        const getAllEntities = (url) => {
            getApiDatas(url, (res) => {
                if (res.type == 'success') {
                    let results = [];
                    let datas = res.datas.entites;
                    if(datas) {
                        for (let i = 0; i < datas.length; i++) {
                            const data = datas[i];
                            const content = {
                                title: data.SNomEntreprise,
                                descriptions:data.idEntreprise,
                                id: data.idEntreprise
                            }
                            results.push(content);
                        }
                        contentEntite = results;
                        
                        $(`.ui.search.entite`).search({
                            source: contentEntite
                        });
                    }
                }
                else {
                    contentEntite = [];
                }
            });
        }
        /**
         * efface le contenu des champs permettant de creer 
         * des nouveaux plan comptables
         * apres la creation
         */
        const ariseEntries = () => {
            newCompteCPNumber.value = "";
            const ComptePrinci = document.querySelector("#ComptePrinci");
            ComptePrinci.value = "";
            compteOpe.value = "";
        
            desiOp.value = "";
        }
        /**
         * fonction qui demande une confirmation avant de supprimer un element
         */
        const askDeleteConfirmation = () => {
            const modalEl = document.querySelector(".ui.modal.submitDestroy");
            const header = modalEl.querySelector(".header");
            header.innerHTML = `Confirmer la suppression`;
            const content = modalEl.querySelector(".content");
            let pcToRemove = planComptables.find(x => x.idPlanComptable === pcIdToRemove);
            content.innerHTML = `Voulez-supprimer le compte <span style="font-weight : bold">${pcToRemove.CompteOperation} </span> ${pcToRemove.DesiOperation} ?`;
            $(".ui.modal.submitDestroy").modal("show");
        }
        //ajouter foctio permettat de redre impossile tout les champs
        //de type umer d'etrer autre chose que des omres
        const fillDefaultCompteOperationValue = () => {
            const ComptePrinci = document.querySelector("#ComptePrinci");
            ComptePrinci.value = compteAcreer.ComptePrinci;
        }
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
        const extractCompteItems = (CompteOperation) => {
            let classe = findCompteEl(CompteOperation, classes, `Classe`);
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
        const afficherNewInput = (formulaire, name) => {
            const field = document.createElement("div");
            field.className = "field";
            const input = document.createElement("select");
            input.name = name;
            const option1 = document.createElement("option");
            option1.value = "1";
            option1.innerHTML = "Crédité d'augmentation";
            const option2 = document.createElement("option");
            option2.value = "2"
            option2.innerHTML = "Débité d'augmentation";
            input.appendChild(option1);
            input.appendChild(option2);
            field.appendChild(input);
            formulaire.appendChild(field);
        }
        const findTypeCompte = (compte) => {
            let classe = compte.substr(0, 1);
            if (classe !== undefined) {
                if (classe == "2" || classe == "3" || classe == "4" || classe == "5" || classe == "6" ) {
                    return 1;
                }
                else {
                    return 2;
                }
            }
            return 1;
        }
        //#endregion

        //#region : listenners
        const closeModal = (e) => {
            e.preventDefault();
            let closeBtn = e.currentTarget;
            let modal = closeBtn.parentElement.parentElement;
            let classes = ``;
            for (let i = 0; i < modal.classList.length; i++) {
                const element = modal.classList[i];
                classes += `.${element}`;
                
            }
            $(classes).modal(`toggle`);
        }
        /*
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
        }*/
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
            $(`.ui.modal.newCompteComprincipal`).modal(`toggle`);
        }
        const createCompte = (e) => {
            let classeToRespect = newCompteData[0].value;
            classeToRespect = classeToRespect.trim();
            
            let CompteOperation = newCompteData[1].value;
            
            const parentOpe = newCompteData[1].parentElement;
            let desi = newCompteData[2].value;
            let entiteName = newCompteData[3].value;
            let entite = contentEntite.find(x => x.title == entiteName);
            if (entite == undefined) {
                //afficher un message d'erreur
                console.log("pas d'entite");
                return;
            }
            let entiteId = entite.id;
            CompteOperation = CompteOperation.trim();
            if (CompteOperation.length < 7) {
                if (!parentOpe.classList.contains("error")) {
                    parentOpe.classList.add("error");
                }
                return;
            }
            let twoFirstCaracters = CompteOperation.substr(0,2);
            if (twoFirstCaracters !== classeToRespect) {
                if (!parentOpe.classList.contains("error")) {
                    parentOpe.classList.add("error");
                }
                return;
            }
           let pcFound = planComptables.find(x=> x.CompteOperation == CompteOperation);
           if (pcFound) {
               if (pcFound.entiteId == entiteId ) {
                showUserMessage("Conflic lors de la création", "Ce compte existe déjà")
                   return;
               }
           }
            let compteItems = extractCompteItems(CompteOperation);
            let typeInput;
            if (compteItems.classe.CodeClasse == "8") {
                for (let k = 0; k < newCompteData.length; k++) {
                    const element = newCompteData[k];
                    if (element.name == "typeCompte") {
                        typeInput = element;
                    }
                }
                if (!typeInput) {
                    const myForm = document.querySelector("#newCompteForm");
                    afficherNewInput(myForm, "typeCompte");
                    return;
                }
                
            }
            let typeCompte;
            if (typeInput) {
                typeCompte = typeInput.value;
            }
            else {
                typeCompte = findTypeCompte(CompteOperation);
            }
            if (compteItems == undefined) {
                return;
            }
            //To Do verifier omre de caractere @CompteOperation
            //TO DO completer les rags maquqt pqr des zero @CompteOperation
            //TO DO proteger le champ desi
            let formData = new FormData();
            formData.append(`CompteOperation`, CompteOperation )
            formData.append(`DesiOperation`, desi);
            formData.append(`typeCompte`, typeCompte);
            let lettrage = ``;
            formData.append(`Lettrage4`, lettrage);
            formData.append('entiteId', entiteId);
            
            //create lettrageFunction
            formData.append(`Numclasse`, compteItems.classe.CodeClasse);
            formData.append(`DesiClassel`, compteItems.classe.Designation);
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
                CompteOperation,
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
            if (parentOpe.classList.contains("error")) {
                parentOpe.classList.remove("error");
            }
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
                            <div class="">
                                <div class="">
                                    <div class="ui basic segment">
                                        Compte créé avec succès <i class="ui green check icon"></i>
                                    </div>
                                </div>
                               
                            </div>
                            `;
                            showModal(modal, modalEl, type, message);
                            loadAllPc();
                            inserLineBefore(res.datas);
                            ariseEntries();
                        }
                        else {
                            let modal = $(`.ui.modal.UserMessage`);
                            let modalEl = document.querySelector(`.ui.modal.UserMessage`)
                            let type = `error`;
                            let message = `
                            <div class="">
                                <div class="">
                                    <div class="ui basic segment">
                                        ${res.message}  <i class="ui red ban icon"></i>
                                    </div>
                                </div>
                                
                            </div>
                            `;
                            console.log(res.datas);
                            showModal(modal, modalEl, type, message);
                        }
                       
                    }
                }
            }
            xhr.send(formDataToCreateCompte);
        }
        const destroyToDB = (e) => {
            e.preventDefault();
            getApiDatas(`/api/planComptables?action=delete&id=${pcIdToRemove}`, (res) => {
                showMessageDiv()
                loadAllPc();
                removeLine(res.datas);
            })

        }
        const valideNewCompteCP = (e) => {
            e.preventDefault();
            
            let input = document.querySelector("#newCompteCPNumber");
            const contentNewComptePc = document.querySelector("#contentNewComptePc");
            const form = contentNewComptePc.querySelector(".ui.form");
            const field = input.parentElement;
            let value = input.value.trim();
             if (isCorrect(value, isTwoCharNumber)) {
                compteAcreer = {};
                compteAcreer.ComptePrinci = value;
                if (contentNewComptePc.firstElementChild !== form) {
                    contentNewComptePc.removeChild(contentNewComptePc.firstElementChild);
                    if(field.classList.contains("error")) {
                        field.classList.remove("error");
                        input.value = '';
                    }
                }
                fillDefaultCompteOperationValue();
                $(`.ui.modal.compteForm`).modal(`toggle`);
             }
             else {
                 let errorDiv = document.createElement("div");
                 errorDiv.className = "ui error message";
                 errorDiv.innerHTML = "Les données entrées sont incorrectes";
                 for (let index = 0; index < contentNewComptePc.children.length; index++) {
                     const element = contentNewComptePc.children[index];
                     if (element.className === errorDiv.className) {
                         return;
                     }
                 }
                 contentNewComptePc.insertBefore(errorDiv, form);
                 field.classList.add("error")
             }
        }
        /**
         * fonction qui permet d'enclencher le processus de suppression
         * @param {clickEvent} e 
         */
        const deletePc = (e) => {
            e.preventDefault();
            const btn = e.currentTarget;
            let id = btn.id;
            id = id.trim();
            id = id.replace("delete", "");
            pcIdToRemove = id;
            askDeleteConfirmation();
        }
        /**
         * Ajouter les contraintes de verifications de caracteres
         */
        //#region : class Manager
            /**
             * Apparaitre le formulaire d'ajout d'une classe
             * @param {clickEvent} e 
             */
            const addNewClass = (e) => {
                $(".ui.modal.newClass").modal("show");
            }
            /**
             * Creation d'une classe dans la base de donnee
             * @param {clickEvent} e 
             */
            const createClass = (e) => {
                e.preventDefault();
                const newClassForm = document.querySelector("#newClassForm");
                let inputs = newClassForm.querySelectorAll("input");
                let first = inputs[0];
                let content = first.value;
                content = content.trim();
                //verifier les caracteres
                let theClasse = classes.find(x => x.CodeClasse == content);
                if (!theClasse) {
                    let data = new FormData();
                    for (let i = 0; i < inputs.length; i++) {
                        const element = inputs[i];
                        let value = element.value;
                        //code de verification
                        value = value.trim();
                        let name = element.name;
                        name = name.trim();
                        name = name.replace("_classe", "");
                        data.append(name, value);
                    }
                    postApiDatas("/api/classes", data, (res) => {
                        $(".ui.modal.newClass").modal("hide");
                        if (res.type == "success") {
                            showMessageDiv(document.querySelector("#classeMessage"), `<i class="green check icon "></i>` + res.message, "success");
                        let  lastClasse = res.datas[0];
                        inserLineBeforeClasse(lastClasse);
                            
                        }
                        else {

                        }
                        //showUserMessage("Opération réussie", res.message);
                        console.log()
                        loaAllClasses();
                    });
                }
                else {
                    showUserMessage("Opération avortée", `La classe que vous tentez de créer existe déjà <i class="red close icon"></i>`)
                }
                
            }
            /**
             * Ouvrir le formulaire de modifications
             * @param {*} e 
             */
            const editClass = (e) => {
                e.preventDefault();
                let id = e.currentTarget.id;
                id = id.replace("editClass", "");
                id = id.trim();
                idClasseToEdit = id;
                getApiDatas(`/api/classes?id=${idClasseToEdit}`, (res) => {
                    let editClasseForm = document.querySelector("#editClasseForm");
                    let inputs = editClasseForm.querySelectorAll("input");
                    inputs[0].value = res.datas.CodeClasse;
                    inputs[1].value = res.datas.Designation;
                    $(".ui.modal.editClassModal").modal("toggle");
                });
                
               
            }
            /**
             * enregistrer les modifications
             * @param {*} e 
             * @returns 
             */
            const saveClassEdition = (e) => {
                e.preventDefault();
                let editClasseForm = document.querySelector("#editClasseForm");
                let inputs = editClasseForm.querySelectorAll("input");
                const editFormData = new FormData();
                let codeClasse = inputs[0].value;
                codeClasse = codeClasse.trim();
                isAllCorrect = codeClasse.search(/\D/);
                if(isAllCorrect > -1) {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous utilisez des caractères non permis pour ce type de données <i class="red close icon"></i>`);
                    return;
                }
                let desi = inputs[1].value;
                desi = desi.trim();
                let isDesiCorrect = desi.search(/[^\w\s]/);
                if(isDesiCorrect > -1) {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous utilisez des caractères non permis pour ce type de données <i class="red close icon"></i>`);
                    return;
                }
                if(codeClasse == "" || desi == "") {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous ne devez pas entrer des champs vides <i class="red close icon"></i>`);
                    return;
                }
                editFormData.append("CodeClasse", codeClasse);
                editFormData.append("Designation", desi);
                postApiDatas(`/api/classes?id=${idClasseToEdit}`, editFormData, (res) => {
                    const tab = document.querySelector("#allClassesList");
                    const row = tab.querySelector(`#classe${idClasseToEdit}`);
                    let datas = res.datas;
                    let codeCell = row.firstElementChild;
                    codeCell.innerHTML = datas.CodeClasse;
                    let DesiCell = codeCell.nextElementSibling;
                    DesiCell.innerHTML = datas.Designation;
                    $(".ui.modal.editClassModal").modal("hide");
                    showMessageDiv(document.querySelector("#classeMessage"), `<i class="green check icon "></i>` + res.message, "success");
                })

            }
            /**
             * supprimer une classe
             * @param {clickEvent} e 
             */
            const deleteClass = (e) => {
                e.preventDefault();
                $('.ui.basic.deleteClassConfirm.modal').modal('show');
                idClasseToRemove = e.currentTarget.id;
                idClasseToRemove = idClasseToRemove.replace("deleteClasse", "");
                idClasseToRemove = idClasseToRemove.trim();
            }
             /**
             * 
             * @param {clickEvent} e 
             */
            const destroyClass = (e) => {
                e.preventDefault();
                getApiDatas(`/api/classes?action=delete&id=${idClasseToRemove}`, (res) => {
                    showMessageDiv(document.querySelector("#classeMessage"), `<i class="green check icon "></i>` + res.message, "success");
                    loaAllClasses();
                    loadAllPc();
                    removeClassLine(res.datas);
                })
            }
        //#endregion

        /**
         * Ajouter les contraintes de verifications de caracteres
         */
        //#region : compte principal manager
            /**
             * Supprimer le compte principal
             * @param {Event} e 
             */
            const deleteComptePrincipal = (e) => {
                let id = e.currentTarget.id;
                id = id.replace("deleteCP", "");
                idCPToRemove = id.trim();
                $(".ui.basic.deleteComptePrinciConfirm.modal").modal("show");
            }
            /**
             * 
             * @param {*} e 
             */
            const destroyComptePrincipal = (e) => {
                e.preventDefault();
                getApiDatas(`/api/comptePrincipaux?id=${idCPToRemove}&action=delete`, (res) => {
                    let id = res.datas;
                    id = "CP" + id;
                    const allComptePrincipalList = document.querySelector("#allComptePrincipalList");
                    const tbody = allComptePrincipalList.querySelector("tbody");
                    let row = allComptePrincipalList.querySelector(`#${id}`);
                    if(row) {
                         tbody.removeChild(row);
                    }
                    loadAllComptePrinci();
                    showMessageDiv(document.querySelector("#comptePrincipauxMessage"), `<i class="green check icon "></i>` + res.message, "success");
                })
            }

            /**
             * Afficher le formulaire d'ajout de compte 
             * @param {clickEvent} e 
             */
            const addNewComptePrincipal = (e) => {
                e.preventDefault();
                $(".ui.modal.newComptePrincipal").modal("toggle");
            }
            /**
             * Enregistrer un nouveau compte principal
             * @param {*} e 
             * @returns 
             */
            const createComptePrincipal = (e) => {
                e.preventDefault();
                $(".ui.modal.newComptePrincipal").modal("hide");
                const newComptePrincipalForm = document.querySelector("#newComptePrincipalForm");
                let inputs = newComptePrincipalForm.querySelectorAll("input");
                let first = inputs[0];
                
                let comptePrinci = first.value;
                comptePrinci = comptePrinci.trim();
                if (comptePrinci.search(/\D/) !== -1 || comptePrinci.length !== 2) {
                    showUserMessage("Opération avortée", `La valeur du compte principal est incorrecte <i class="red close icon"></i>`)
                    return;
                }
                let codeClasse = comptePrinci.substr(0,1);
                let classeFound = classes.find(x => x.CodeClasse == codeClasse);
                if (classeFound) {
                    let comptePrinciFound = comptePrincipaux.find(x => x.CodeComptePrincipal == comptePrinci);
                    if (comptePrinciFound) {
                        showUserMessage("Opération avortée", `Le compte principal que vous tentez de créer existe déjà <i class="red close icon"></i>`)
                        return;
                    }
                    let data = new FormData();
                    for (let index = 0; index < inputs.length; index++) {
                        const element = inputs[index];
                        let value = element.value;
                        if (value.search(/[<>;]/) !==  -1) {
                            showUserMessage("Opération avortée", `Usage des caratères non autorisés <i class="red close icon"></i>`);
                            return;
                        }
                        value = value.trim();
                        let name = element.name;
                        name = name.replace("_cp", "");
                        data.append(name, value);
                    }
                    let id_classe = classeFound.Classe_idClasse;
                    data.append("Classe_idClasse", id_classe);
                    postApiDatas(`/api/comptePrincipaux`, data, (res) => {
                        showMessageDiv(document.querySelector("#comptePrincipauxMessage"), res.message);
                        let tab = document.querySelector("#allComptePrincipalList");
                        let tbody = tab.querySelector("tbody");
                        let row = document.createElement("tr");
                        row.innerHTML = `
                            <td>${res.datas.CodeComptePrincipal}</td>
                            <td>${res.datas.DesignationCompte}</td>
                        `;
                        row.id = "CP" + res.datas.idComptePrincipal;
                        let actionsCell = document.createElement("td");
                        let editBtn = document.createElement("button");
                        editBtn.className = "ui small green icon button editCPBtn";
                        editBtn.innerHTML = `<i class="edit icon"></i>`;
                        editBtn.id = "editCP" + res.datas.idComptePrincipal;
                        editBtn.addEventListener("click", editComptePrincipal);
                        const deleteBtn = document.createElement("button");
                        deleteBtn.className = "ui small red icon button deletePCBtn";
                        deleteBtn.innerHTML = `<i class="trash alternate outline icon"></i>`;
                        deleteBtn.id = "deleteCP" + res.datas.idComptePrincipal;
                        deleteBtn.addEventListener("click", deleteComptePrincipal);
                        actionsCell.appendChild(editBtn);
                        actionsCell.appendChild(deleteBtn);
                        row.appendChild(actionsCell);
                        let firstChild = tbody.firstElementChild;
                        tbody.insertBefore(row, firstChild);
                    })
                }
                else {
                    showUserMessage("Opération avortée", `La classe de ce compte n'existe pas <i class="red close icon"></i>`);

                }

            }
            
            /**
             */
            const editComptePrincipal = (e) => {
                e.preventDefault();
                let id = e.currentTarget.id;
                id = id.trim();
                id = id.replace("editCP", "");
                idCPToEdit = id;
                
                getApiDatas(`/api/comptePrincipaux?id=${idCPToEdit}`, (res) => {
                    let editClasseForm = document.querySelector("#editCPForm");
                    let inputs = editClasseForm.querySelectorAll("input");
                    inputs[0].value = res.datas.CodeComptePrincipal;
                    inputs[1].value = res.datas.DesignationCompte;
                    $(".ui.modal.editCPModal").modal("show")
                });
            }
            const saveComptePrinciEdition = (e) => {
                e.preventDefault();
                let editCPForm = document.querySelector("#editCPForm");
                let inputs = editCPForm.querySelectorAll("input");
                const editFormData = new FormData();
                let codeCP = inputs[0].value;
                codeCP = codeCP.trim();
                isAllCorrect = codeCP.search(/\D/);
                if(isAllCorrect > -1) {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous utilisez des caractères non permis pour ce type de données <i class="red close icon"></i>`);
                    return;
                }
                if(!isTwoCharNumber(codeCP)) {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Le nombre de caractères ne correspond pas <i class="red close icon"></i>`);
                    return;
                }
                let desi = inputs[1].value;
                desi = desi.trim();
                let isDesiCorrect = desi.search(/[^\w\s]/);
                if(isDesiCorrect > -1) {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous utilisez des caractères non permis pour ce type de données <i class="red close icon"></i>`);
                    return;
                }
                if(codeCP == "" || desi == "") {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous ne devez pas entrer des champs vides <i class="red close icon"></i>`);
                    return;
                }
                editFormData.append("CodeComptePrincipal", codeCP);
                editFormData.append("DesignationCompte", desi);
                postApiDatas(`/api/comptePrincipaux?id=${idCPToEdit}`, editFormData, (res) => {
                    const tab = document.querySelector("#allComptePrincipalList");
                    const row = tab.querySelector(`#CP${idCPToEdit}`);
                    let datas = res.datas;
                    let codeCell = row.firstElementChild;
                    codeCell.innerHTML = datas.CodeComptePrincipal;
                    let DesiCell = codeCell.nextElementSibling;
                    DesiCell.innerHTML = datas.DesignationCompte;
                    $(".ui.modal.editCPModal").modal("hide");
                    showMessageDiv(document.querySelector("#comptePrincipauxMessage"), `<i class="green check icon "></i>` + res.message, "success");
                })
            }
        //#endregion

        //#region : sous compte handlers

            /**
             */
            const addNewSousCompte = (e) => {
                e.preventDefault();
                $(".ui.modal.newSousCompte").modal("toggle");
            }
            /**
             */
            const createSousCompte = (e) => {
                e.preventDefault();
                $(".ui.modal.newSousCompte").modal("hide");
                const newSousCompteForm = document.querySelector("#newSousCompteForm");
                let inputs = newSousCompteForm.querySelectorAll("input");
                let first = inputs[0];
                let sousCompte = first.value;
                sousCompte = sousCompte.trim();
                if (sousCompte.search(/\D/) !== -1 || sousCompte.length !== 3) {
                    showUserMessage("Opération avortée", `La valeur du sous compte est incorrecte <i class="red close icon"></i>`)
                    return;
                }
                let comptePrinci = sousCompte.substr(0,2);
                let comptePrinciFound = comptePrincipaux.find(x => x.CodeComptePrincipal == comptePrinci);
                if (comptePrinciFound) {
                    let sousCompteFound = sousComptes.find(x => x.CodeSousCompte == sousCompte);
                    if (sousCompteFound) {
                        showUserMessage("Opération avortée", `Le sous-compte que vous tentez de créer existe déjà <i class="red close icon"></i>`)
                        return;
                    }
                    let data = new FormData();
                    for (let index = 0; index < inputs.length; index++) {
                        const element = inputs[index];
                        let value = element.value;
                        if (value.search(/[<>;]/) !==  -1) {
                            showUserMessage("Opération avortée", `Usage des caratères non autorisés <i class="red close icon"></i>`);
                            return;
                        }
                        value = value.trim();
                        let name = element.name;
                        name = name.replace("_sc", "");
                        data.append(name, value);
                    }
                    let idCP = comptePrinciFound.idComptePrincipal;
                    data.append("ComptePrincipal_idComptePrincipal", idCP);
                    postApiDatas(`/api/sousComptes`, data, (res) => {
                        showMessageDiv(document.querySelector("#sousCompteMessage"), res.message);
                        let tab = document.querySelector("#allSousCompteList");
                        let tbody = tab.querySelector("tbody");
                        let row = document.createElement("tr");
                        row.innerHTML = `
                            <td>${res.datas.CodeSousCompte}</td>
                            <td>${res.datas.Designation}</td>
                        `;
                        row.id = "SC" + res.datas.idSousCompte;
                        let actionsCell = document.createElement("td");
                        let editBtn = document.createElement("button");
                        editBtn.className = "ui small green icon button editSCBtn";
                        editBtn.innerHTML = `<i class="edit icon"></i>`;
                        editBtn.id = "editSC" + res.datas.idSousCompte;
                        editBtn.addEventListener("click", editSousCompte);
                        const deleteBtn = document.createElement("button");
                        deleteBtn.className = "ui small red icon button deletePCBtn";
                        deleteBtn.innerHTML = `<i class="trash alternate outline icon"></i>`;
                        deleteBtn.id = "deleteSC" + res.datas.idSousCompte;
                        deleteBtn.addEventListener("click", deleteSousCompte);
                        actionsCell.appendChild(editBtn);
                        actionsCell.appendChild(deleteBtn);
                        row.appendChild(actionsCell);
                        let firstChild = tbody.firstElementChild;
                        tbody.insertBefore(row, firstChild);
                    })
                }
                else {
                    showUserMessage("Opération avortée", `La classe de ce compte n'existe pas <i class="red close icon"></i>`);

                }
            }
            /**
            *
             */
            const editSousCompte = (e) => {
                e.preventDefault();
                let id = e.currentTarget.id;
                id = id.replace("editSC", "");
                id = id.trim();
                idSCToEdit = id;
                getApiDatas(`/api/sousComptes?id=${idSCToEdit}`, (res) => {
                    let editSCForm = document.querySelector("#editSCForm");
                    let inputs = editSCForm.querySelectorAll("input");
                    inputs[0].value = res.datas.CodeSousCompte;
                    inputs[1].value = res.datas.Designation;
                    $(".ui.modal.editSCModal").modal("show")
                });
                
            }
            const saveSCEdition = (e) => {
                e.preventDefault();
                let editSCForm = document.querySelector("#editSCForm");
                let inputs = editSCForm.querySelectorAll("input");
                const editFormData = new FormData();
                let codeSC = inputs[0].value;
                codeSC = codeSC.trim();
                isAllCorrect = codeSC.search(/\D/);
                if(isAllCorrect > -1) {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous utilisez des caractères non permis pour ce type de données <i class="red close icon"></i>`);
                    return;
                }
                if(!isNumberWithDescribeLenght(codeSC, 3)) {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Le nombre de caractères ne correspond pas <i class="red close icon"></i>`);
                    return;
                }
                let desi = inputs[1].value;
                desi = desi.trim();
                let isDesiCorrect = desi.search(/[^\w\s]/);
                if(isDesiCorrect > -1) {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous utilisez des caractères non permis pour ce type de données <i class="red close icon"></i>`);
                    return;
                }
                if(codeSC == "" || desi == "") {
                    showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous ne devez pas entrer des champs vides <i class="red close icon"></i>`);
                    return;
                }
                let searchedCP = codeSC.substring(0, 1);
                editFormData.append("CodeSousCompte", codeSC);
                editFormData.append("Designation", desi);
                postApiDatas(`/api/sousComptes?id=${idSCToEdit}`, editFormData, (res) => {
                    const tab = document.querySelector("#allSousCompteList");
                    const row = tab.querySelector(`#SC${idSCToEdit}`);
                    let datas = res.datas;
                    let codeCell = row.firstElementChild;
                    codeCell.innerHTML = datas.CodeSousCompte;
                    let DesiCell = codeCell.nextElementSibling;
                    DesiCell.innerHTML = datas.Designation;
                    $(".ui.modal.editSCModal").modal("hide");
                    showMessageDiv(document.querySelector("#sousCompteMessage"), `<i class="green check icon "></i>` + res.message, "success");
                })
            }
            const deleteSousCompte = (e) => {
                let id = e.currentTarget.id;
                id = id.replace("deleteSC", "");
                idSCToRemove = id.trim();
                $(".ui.basic.deleteSousCompteConfirm.modal").modal("show");
            }
            const destroySousCompte = (e) => {
                e.preventDefault();
                getApiDatas(`/api/sousComptes?id=${idSCToRemove}&action=delete`, (res) => {
                    let id = res.datas;
                    id = "SC" + id;
                    const allSousCompteList = document.querySelector("#allSousCompteList");
                    const tbody = allSousCompteList.querySelector("tbody");
                    let row = tbody.querySelector(`#${id}`);
                    if(row) {
                         tbody.removeChild(row);
                    }
                    loadAllSousCompte();
                    showMessageDiv(document.querySelector("#sousCompteMessage"), `<i class="green check icon "></i>` + res.message, "success");
                })
            }
        //#endregion        
        
        //#region : compte divisionnaire handler
            const addNewCompteDivisio = (e) => {
                e.preventDefault();
                $(".ui.modal.newCompteDivisionnaire").modal("toggle");
            }
            const createCompteDivisionnaire = (e) => {
                e.preventDefault();
                $(".ui.modal.newCompteDivisionnaire").modal("hide");
                const newCompteDivisionnaireForm = document.querySelector("#newCompteDivisionnaireForm");
                let inputs = newCompteDivisionnaireForm.querySelectorAll("input");
                let first = inputs[0];
                let compteDivisio = first.value;
                compteDivisio = compteDivisio.trim();
                if (compteDivisio.search(/\D/) !== -1 || compteDivisio.length !== 4) {
                    showUserMessage("Opération avortée", `La valeur du sous compte est incorrecte <i class="red close icon"></i>`)
                    return;
                }
                let sousCompte = compteDivisio.substr(0,3);
                let sousCompteFound = sousComptes.find(x => x.CodeSousCompte == sousCompte);
                if (sousCompteFound) {
                    let compteDivisioFound = comptesDivisionnaires.find(x => x.CodeCompteDivisionnaire == compteDivisio);
                    if (compteDivisioFound) {
                        showUserMessage("Opération avortée", `Le compte divisionnaire que vous tentez de créer existe déjà <i class="red close icon"></i>`)
                        return;
                    }
                    let data = new FormData();
                    for (let index = 0; index < inputs.length; index++) {
                        const element = inputs[index];
                        let value = element.value;
                        if (value.search(/[<>;]/) !==  -1) {
                            showUserMessage("Opération avortée", `Usage des caratères non autorisés <i class="red close icon"></i>`);
                            return;
                        }
                        value = value.trim();
                        let name = element.name;
                        name = name.replace("_cd", "");
                        data.append(name, value);
                    }
                    let idSC = sousCompteFound.idSousCompte;
                    data.append("SousCompte_idSousCompte", idSC);
                    postApiDatas(`/api/comptesDivisionnaires`, data, (res) => {
                        showMessageDiv(document.querySelector("#compteDivisioMessage"), res.message);
                        let tab = document.querySelector("#allCompteDivList");
                        let tbody = tab.querySelector("tbody");
                        let row = document.createElement("tr");
                        row.innerHTML = `
                            <td>${res.datas.CodeCompteDivisionnaire}</td>
                            <td>${res.datas.DesigantionCD}</td>
                        `;
                        console.log(res.datas);
                        row.id = "CD" + res.datas.idCompteDivisionnaire;
                        let actionsCell = document.createElement("td");
                        let editBtn = document.createElement("button");
                        editBtn.className = "ui small green icon button editSCBtn";
                        editBtn.innerHTML = `<i class="edit icon"></i>`;
                        editBtn.id = "editCD" + res.datas.idCompteDivisionnaire;
                        //editBtn.addEventListener("click", editSousCompte);
                        const deleteBtn = document.createElement("button");
                        deleteBtn.className = "ui small red icon button deletePCBtn";
                        deleteBtn.innerHTML = `<i class="trash alternate outline icon"></i>`;
                        deleteBtn.id = "deleteCD" + res.datas.idCompteDivisionnaire;
                        //deleteBtn.addEventListener("click", deleteSousCompte);
                        actionsCell.appendChild(editBtn);
                        actionsCell.appendChild(deleteBtn);
                        row.appendChild(actionsCell);
                        let firstChild = tbody.firstElementChild;
                        tbody.insertBefore(row, firstChild);
                    })
                }
                else {
                    showUserMessage("Opération avortée", `Le sous compte de ce compte n'existe pas <i class="red close icon"></i>`);

                }
            }
            const deleteCompteDivisionnaire = (e) => {
                e.preventDefault();
                let id = e.currentTarget.id;
                id = id.replace("deleteCD", "");
                idCDToRemove = id.trim();
                $(".ui.basic.deleteCompteDivisioConfirm.modal").modal("show");
            }
            const destroyCompteDivisionnaire = (e) => {
                e.preventDefault();
                getApiDatas(`/api/comptesDivisionnaires?id=${idCDToRemove}&action=delete`, (res) => {
                    let id = res.datas;
                    id = "CD" + id;
                    const allCompteDivList = document.querySelector("#allCompteDivList");
                    const tbody = allCompteDivList.querySelector("tbody");
                    let row = tbody.querySelector(`#${id}`);
                    if(row) {
                         tbody.removeChild(row);
                    }
                    loadAllSousCompte();
                    showMessageDiv(document.querySelector("#sousCompteMessage"), `<i class="green check icon "></i>` + res.message, "success");
                })
            }
        //#endregion
        //#region : famille handler
            const addNewCompteFamille = (e) => {
                e.preventDefault();
                $(".ui.modal.newFamille").modal("toggle");
            }
            const createCompteFamille = (e) => {
                e.preventDefault();
                $(".ui.modal.newFamille").modal("hide");
                const newFamilleForm = document.querySelector("#newFamilleForm");
                let inputs = newFamilleForm.querySelectorAll("input");
                let first = inputs[0];
                let codeFamille = first.value;
                codeFamille = codeFamille.trim();
                if (codeFamille.search(/\D/) !== -1 || codeFamille.length !== 6) {
                    showUserMessage("Opération avortée", `La valeur du sous compte est incorrecte <i class="red close icon"></i>`)
                    return;
                }
                let CD = codeFamille.substr(0,4);
                let CDFound = comptesDivisionnaires.find(x => x.CodeCompteDivisionnaire == CD);
                if (CDFound) {
                    let familleFound = familles.find(x => x.CodeCompteFamille == codeFamille);
                    if (familleFound) {
                        showUserMessage("Opération avortée", `La famille que vous tentez de créer existe déjà <i class="red close icon"></i>`)
                        return;
                    }
                    let data = new FormData();
                    for (let index = 0; index < inputs.length; index++) {
                        const element = inputs[index];
                        let value = element.value;
                        if (value.search(/[<>;]/) !==  -1) {
                            showUserMessage("Opération avortée", `Usage des caratères non autorisés <i class="red close icon"></i>`);
                            return;
                        }
                        value = value.trim();
                        let name = element.name;
                        name = name.replace("_f", "");
                        data.append(name, value);
                    }
                    let idCD = CDFound.idCompteDivisionnaire;
                    data.append("CompteDivisionnaire_idCompteDivisionnaire", idCD);
                    postApiDatas(`/api/familles`, data, (res) => {
                        showMessageDiv(document.querySelector("#familleMessage"), res.message);
                        let tab = document.querySelector("#allFamilleList");
                        let tbody = tab.querySelector("tbody");
                        let row = document.createElement("tr");
                        row.innerHTML = `
                            <td>${res.datas.CodeCompteFamille}</td>
                            <td>${res.datas.DesigantionCompteFamille}</td>
                        `;
                        row.id = "famille" + res.datas.idCompteFamille;
                        let actionsCell = document.createElement("td");
                        let editBtn = document.createElement("button");
                        editBtn.className = "ui small green icon button editFamilleBtn";
                        editBtn.innerHTML = `<i class="edit icon"></i>`;
                        editBtn.id = "editFamille" + res.datas.idCompteFamille;
                        //editBtn.addEventListener("click", editSousCompte);
                        const deleteBtn = document.createElement("button");
                        deleteBtn.className = "ui small red icon button deleteFamilleBtn";
                        deleteBtn.innerHTML = `<i class="trash alternate outline icon"></i>`;
                        deleteBtn.id = "deleteFamille" + res.datas.idCompteFamille;
                        //deleteBtn.addEventListener("click", deleteSousCompte);
                        actionsCell.appendChild(editBtn);
                        actionsCell.appendChild(deleteBtn);
                        row.appendChild(actionsCell);
                        let firstChild = tbody.firstElementChild;
                        tbody.insertBefore(row, firstChild);
                    })
                }
                else {
                    showUserMessage("Opération avortée", `Le sous compte de ce compte n'existe pas <i class="red close icon"></i>`);

                }
            }
            const deleteFamille = (e) => {
                let id = e.currentTarget.id;
                id = id.replace("deleteFamille", "");
                idFamilleToRemove = id.trim();
                $(".ui.basic.deleteFamilleConfirm.modal").modal("show");
            }
            const destroyFamille = (e) => {
                e.preventDefault();
                getApiDatas(`/api/familles?id=${idFamilleToRemove}&action=delete`, (res) => {
                    let id = res.datas;
                    id = "famille" + id;
                    const allFamilleList = document.querySelector("#allFamilleList");
                    const tbody = allFamilleList.querySelector("tbody");
                    let row = tbody.querySelector(`#${id}`);
                    if(row) {
                         tbody.removeChild(row);
                    }
                    loadAllFamille();
                    showMessageDiv(document.querySelector("#familleMessage"), `<i class="green check icon "></i>` + res.message, "success");
                })
            }
        //#endregion
        
        
       
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
        const newCompteData = document.querySelectorAll(`#newCompteForm input`);
        const savePlanComptableBtn = document.querySelector(`#savePlanComptableBtn`);
        const valideNewCompteCPBtn = document.querySelector(`#valideNewCompteCPBtn`);
        
        const closeModalBtns = document.querySelectorAll(".closeModalBtn");
        const ReopenFormBtn = document.querySelector("#ReopenFormBtn");
        //champ des donnees
        const dataCompteRows = document.querySelectorAll(`#planCompta .ui.grid .row`);
        //
        //navigation entre les differents plan comptables
        const prevBtn = document.querySelector(`#prevBtn`);
        const nextBtn = document.querySelector(`#nextBtn`);
        let modalMessageBtn = document.querySelector(`#modalMessageBtn`);
        const newCompteCPNumber = document.querySelector("#newCompteCPNumber");
        const compteOpe = document.querySelector("#CompteOperation");
        const desiOp = document.querySelector("#DesiOperation");
        const deletePcBtns = document.querySelectorAll(".deleteBtn");
        const confirmDestroy = document.querySelector("#confirmDestroy");
        const addNewClassBtn = document.querySelector("#addNewClassBtn");
        const createClassBtn = document.querySelector("#createClassBtn");
        const addNewComptePrincipalBtn = document.querySelector("#addNewComptePrincipalBtn");
        const createComptePrinciBtn = document.querySelector("#createComptePrinciBtn");
        const addNewSousCompteBtn = document.querySelector("#addNewSousCompteBtn");
        const addNewCompteDivisioBtn = document.querySelector("#addNewCompteDivisioBtn");
        const createCompteDivisioBtn = document.querySelector("#createCompteDivisioBtn");
        const addNewCompteFamilleBtn = document.querySelector("#addNewCompteFamilleBtn");
        const createCompteFamilleBtn = document.querySelector("#createCompteFamilleBtn");
        const createSousCompteBtn = document.querySelector("#createSousCompteBtn");
        const deleteClasseBtns = document.querySelectorAll(".deleteClasseBtn");
        const destroyClassBtn = document.querySelector("#destroyClassBtn");
        const editClasseBtns = document.querySelectorAll(".editClasseBtn");
        const saveClassEditionBtn = document.querySelector("#saveClassEditionBtn");
        const deleteCPBtns = document.querySelectorAll(".deleteCPBtn");
        const destroyCompptePrinciBtn = document.querySelector("#destroyCompptePrinciBtn");
        const editCPBtns = document.querySelectorAll(".editCPBtn");
        const saveCPEditionBtn = document.querySelector("#saveCPEditionBtn");
        const deleteFamilleBtns = document.querySelectorAll(".deleteFamilleBtn");
        const destroyFamilleBtn = document.querySelector("#destroyFamilleBtn");
        /**
        * sous comptes buttons
         */
        const editSCBtns = document.querySelectorAll(".editSCBtn");
        const saveSCEditionBtn = document.querySelector("#saveSCEditionBtn");
        const deleteSCBtns = document.querySelectorAll(".deleteSCBtn");
        const destroySCBtn = document.querySelector("#destroySCBtn");
        /**
        * comptes divisionnaires buttons
         */
         const deleteCDBtns = document.querySelectorAll(".deleteCDBtn");
         const destroyCDBtn = document.querySelector("#destroyCDBtn");
        //correspond au numero de plan comptable sur lequelle on se trouve
        let pageActuelle = 1;
        let planComptables = [];
        let classes = [];
        let comptePrincipaux = [];
        let sousComptes = [];
        let comptesDivisionnaires = [];
        let familles = [];
        let compteAcreer;
        let formDataToCreateCompte;
        let contentEntite = [];
        let pcIdToRemove;
        let idClasseToRemove;
        let idClasseToEdit;
        let idCPToRemove;
        let idCPToEdit;
        let idSCToEdit;
        let idSCToRemove;
        let idCDToRemove;
        let idFamilleToRemove;
        //les donnees du plan comptable sur lequelle on se trouve
        let pcActuel;
        let sens = true;
        $(document).ready(function() {
            $('#allCopmtesList').DataTable();
        } );
        $(document).ready(function() {
            $('#allClassesList').DataTable();
        } );
        $(document).ready(function() {
            $('#allComptePrincipalList').DataTable();
        } );
        $(document).ready(function() {
            $('#allSousCompteList').DataTable();
        } );
        $(document).ready(function() {
            $('#allCompteDivList').DataTable();
        } );
        $(document).ready(function() {
            $('#allFamilleList').DataTable();
        } );
        $('.ui.trigger.example.accordion')
            .accordion({
                selector: {
                trigger: '.title'
                }
            })
            $('.message .close')
            .on('click', function() {
              $(this)
                .closest('.message')
                .transition('fade')
              ;
            });
        const serverPesponses = document.querySelectorAll(".serverResponse");
        for (let i = 0; i < serverPesponses.length; i++) {
            const element = serverPesponses[i];
            if (!element.classList.contains("hidden")) {
                element.classList.add("hidden");
            }
        }       
       //#endregion

       //#region: load all plan comptable
            loadAllPc();
            loaAllClasses();
            loadAllComptePrinci();
            loadAllSousCompte();
            loadAllCompteDivision();
            loadAllFamille();
            getAllEntities('/api/entreprises');
            
       //#endregion

       //#region : addevents listeners to elements
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
        for (let index = 0; index < closeModalBtns.length; index++) {
            const element = closeModalBtns[index];
            element.addEventListener("click", closeModal);
        
        }
        ReopenFormBtn.addEventListener('click', addCompte);
        valideNewCompteCPBtn.addEventListener(`click`, valideNewCompteCP)
        for (let j = 0; j < deletePcBtns.length; j++) {
            const element = deletePcBtns[j];
            element.addEventListener("click", deletePc)
        }
        confirmDestroy.addEventListener("click", destroyToDB);
        addNewClassBtn.addEventListener("click", addNewClass);
        createClassBtn.addEventListener("click", createClass);
        addNewComptePrincipalBtn.addEventListener("click", addNewComptePrincipal);
        addNewSousCompteBtn.addEventListener("click", addNewSousCompte);
        addNewCompteDivisioBtn.addEventListener("click", addNewCompteDivisio);
        addNewCompteFamilleBtn.addEventListener("click", addNewCompteFamille);
        createComptePrinciBtn.addEventListener("click", createComptePrincipal);
        createSousCompteBtn.addEventListener("click", createSousCompte);
        createCompteDivisioBtn.addEventListener("click", createCompteDivisionnaire);
        createCompteFamilleBtn.addEventListener("click", createCompteFamille)
        for (let index = 0; index < deleteClasseBtns.length; index++) {
            const element = deleteClasseBtns[index];
            element.addEventListener("click", deleteClass);
        }
        for (let index = 0; index < editClasseBtns.length; index++) {
            const element = editClasseBtns[index];
            element.addEventListener("click", editClass);
        }
        destroyClassBtn.addEventListener("click", destroyClass);
        saveClassEditionBtn.addEventListener("click", saveClassEdition );
        /**
         * Ajouter les listenner aux boutons de suppression
         */
        for (let index = 0; index < deleteCPBtns.length; index++) {
            const element = deleteCPBtns[index];
            element.addEventListener("click", deleteComptePrincipal);
        }
        destroyCompptePrinciBtn.addEventListener("click", destroyComptePrincipal);
        for (let index = 0; index < editCPBtns.length; index++) {
            const element = editCPBtns[index];
            element.addEventListener("click", editComptePrincipal);
        }
        saveCPEditionBtn.addEventListener("click", saveComptePrinciEdition);
        for (let index = 0; index < editSCBtns.length; index++) {
            const element = editSCBtns[index];
            element.addEventListener("click", editSousCompte);
        }
        saveSCEditionBtn.addEventListener("click", saveSCEdition);
        for (let index = 0; index < deleteSCBtns.length; index++) {
            const element = deleteSCBtns[index];
            element.addEventListener("click", deleteSousCompte);
        }
        destroySCBtn.addEventListener("click", destroySousCompte);
        for (let index = 0; index < deleteCDBtns.length; index++) {
            const element = deleteCDBtns[index];
            element.addEventListener("click", deleteCompteDivisionnaire);
        }
        destroyCDBtn.addEventListener("click", destroyCompteDivisionnaire);
        for (let index = 0; index < deleteFamilleBtns.length; index++) {
            const element = deleteFamilleBtns[index];
            element.addEventListener("click", deleteFamille);
        }
        destroyFamilleBtn.addEventListener("click", destroyFamille);
       //#endregion
    }
)()