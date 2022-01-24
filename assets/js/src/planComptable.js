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
        const showAlert = (res) => {
            if (res.type == `success`) {
                localStorage.serverResponse = JSON.stringify({type: "success", message: res.message})
                document.location.reload();
            }
            else if(res.type == `error`){
                localStorage.serverResponse = JSON.stringify({type: "danger", message: res.message});
                document.location.reload();
            }
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
                //showAlertAndCloseModal( $(`.ui.modal.compteForm`), `error`, `Compte Principal inexistant! veuillez la créer au préalable`);
                return;
                
            }
            if (sousCompte == undefined) {
                //showAlertAndCloseModal( $(`.ui.modal.compteForm`), `error`, `Sous compte inexistant! veuillez la créer au préalable`);
                return;
            }
            else if (compteDivisio == undefined) {
                //showAlertAndCloseModal( $(`.ui.modal.compteForm`), `error`, `Compte Divisionnaire inexistant! veuillez la créer au préalable`);
                return;
            }
            else if (compteFamille == undefined) {
                //showAlertAndCloseModal( $(`.ui.modal.compteForm`), `error`, `Compte Famille inexistant! veuillez la créer au préalable`);
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
                        tableVisible = tableVisible == false ? true : false;
                        if (tableVisible) {
                            $(document).ready(function() {
                                $('#allCopmtesList').DataTable();
                            } );
                        }
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
            e.preventDefault();
            $(`#createNouveauCompteModal`).modal(`hide`);
            let nouveauCompteForm = document.querySelector("#newCompteForm");
            let fields = nouveauCompteForm.querySelectorAll("input");
            let nouveauCompte = fields[0].value;
            let desiNouveauCompte = fields[1].value;
            nouveauCompte = nouveauCompte.trim();
            if (nouveauCompte.search(/^D/) !== -1) {
                showAlert({type: "danger", message: "Données incorrectes"});
            }
            if(nouveauCompte.length < 7) {
                showAlert({type: "danger", message: "Longueur du compte insuffisante"});
            }
            
            if (comptePrincipalAcreer !== nouveauCompte.substr(0, 2)) {
                showAlert({type: "danger", message: "Compte principal incorrecte"});
            }
            let NCclasse = nouveauCompte.substr(0, 1);
            let NCcomptePrincipal = nouveauCompte.substr(0, 2);
            let NCsousCompte = nouveauCompte.substr(0, 3);
            let NCcompteDivisionnaire = nouveauCompte.substr(0, 4);
            let NCfamille = nouveauCompte.substr(0, 6);
            let famille = familles.find(x => x.CodeCompteFamille == NCfamille);
            if (!famille) {
                let DesigantionCompteFamille = desiNouveauCompte;
                let CodeCompteFamille = NCfamille;
                let fd = new FormData();
                fd.append("CodeCompteFamille",CodeCompteFamille);
                fd.append("DesigantionCompteFamille",DesigantionCompteFamille);
                postApiDatas("/api/familles", fd, (res) => {
                    let _form = new FormData();
                    _form.append("Numclasse", NCclasse);
                    _form.append("ComptePrinci", NCcomptePrincipal);
                    _form.append("SousCompte", NCsousCompte);
                    _form.append("CodeDivision", NCcompteDivisionnaire);
                    _form.append("CodeFamille", NCfamille);
                    _form.append("CompteOperation", nouveauCompte);
                    _form.append("DesiOperation", desiNouveauCompte);
                    _form.append("entiteId", entrepriseUser.idEntreprise);
                    _form.append("debit", 0);
                    _form.append("credit", 0);
                    if (NCclasse == "1" && NCclasse == "4" && NCclasse == "7") {
                        _form.append("typeCompte", 1);
                    }
                    else {
                        _form.append("typeCompte", 2);
                    }
                    postApiDatas("/api/planComptables", _form, (res) => {
                       showAlert(res);
                    });
                    
                })
            }
            else {
                let _form = new FormData();
                    _form.append("Numclasse", NCclasse);
                    _form.append("ComptePrinci", NCcomptePrincipal);
                    _form.append("SousCompte", NCsousCompte);
                    _form.append("CodeDivision", NCcompteDivisionnaire);
                    _form.append("CodeFamille", NCfamille);
                    _form.append("CompteOperation", nouveauCompte);
                    _form.append("DesiOperation", desiNouveauCompte);
                    _form.append("entiteId", entrepriseUser.idEntreprise);
                    _form.append("debit", 0);
                    _form.append("credit", 0);
                    if (NCclasse == "1" && NCclasse == "4" && NCclasse == "7") {
                        _form.append("typeCompte", 1);
                    }
                    else {
                        _form.append("typeCompte", 2);
                    }
                    postApiDatas("/api/planComptables", _form, (res) => {
                       showAlert(res);
                    });
            }
            
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
                showAlert(res);
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
                comptePrincipalAcreer = value;
                if (contentNewComptePc.firstElementChild !== form) {
                    contentNewComptePc.removeChild(contentNewComptePc.firstElementChild);
                    if(field.classList.contains("error")) {
                        field.classList.remove("error");
                        input.value = '';
                    }
                }
                $(`.ui.modal.compteForm`).modal(`toggle`);
             }
             else {
                $(`.ui.modal.compteForm`).modal(`toggle`);
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
        let comptePrincipalAcreer;
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
        let entiteUser;
        let entrepriseUser;
        //les donnees du plan comptable sur lequelle on se trouve
        let pcActuel;
        let sens = true;
        let tableVisible = false;
        
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
         
       //#endregion
        let utilisateur;
       //#region: load all plan comptable
            loadAllPc();
            loaAllClasses();
            loadAllComptePrinci();
            loadAllSousCompte();
            loadAllCompteDivision();
            loadAllFamille();
            getApiDatas("/api/userSession", (res) => {
                utilisateur = res.datas.user;
                entrepriseUser = res.datas.entreprise;
            })
            if (localStorage.length > 0) {
                if(localStorage.serverResponse) {
                    let userMessage = document.querySelector("#userMessage");
                    let dataStored = JSON.parse(localStorage.serverResponse);
                    let ico = dataStored.type == "success" ? `check`: `times`;
                    let exclam = dataStored.type == "success" ? `Félicitations!`: `Oups!`;
                    userMessage.innerHTML = `
                    <div class="alert alert-${dataStored.type}">
                    <button type="button" class="close" data-dismiss="alert">
                        <i class="ace-icon fa fa-times"></i>
                    </button>
        
                    <strong>
                        <i class="ace-icon fa fa-${ico}"></i>
                        ${exclam}
                    </strong>
        
                    ${dataStored.message}
                    <br />
                </div>
                    `
                    Reflect.deleteProperty(localStorage, "serverResponse");
                }
            }
            //getAllEntities('/api/entreprises');
            
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
        for (let index = 0; index < deleteClasseBtns.length; index++) {
            const element = deleteClasseBtns[index];
            element.addEventListener("click", deleteClass);
        }
        for (let index = 0; index < editClasseBtns.length; index++) {
            const element = editClasseBtns[index];
            element.addEventListener("click", editClass);
        }
        for (let index = 0; index < deleteFamilleBtns.length; index++) {
            const element = deleteFamilleBtns[index];
            element.addEventListener("click", deleteFamille);
        }
       //#endregion
    }
)()