(() => {
    jQuery(function($) {
        //initiate dataTables plugin
        var myTable = 
        $('#compteDivi-tables')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable();
        var tableTwo = 
        $('#familles-tables')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable();
        var table3 = 
        $('#sousComptes-tables')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable();
        var table4 = 
        $('#comptesPrincipaux-tables')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable();
        /** var table5 = 
        $('#classes-tables')
        //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
        .DataTable();*/
    });
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
    //#region : usual functions
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
    //#endregion
    //#region : data functions
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
    //#endregion
    //#region : listenner
        //#region :classe Manager
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
                    data.append(name, value);
                }
                postApiDatas("/api/classes", data, (res) => {
                    //$(".ui.modal.newClass").modal("hide");
                    showAlert(res);
                });
            }
            else {
                //afficher message 
                //showUserMessage("Opération avortée", `La classe que vous tentez de créer existe déjà <i class="red close icon"></i>`)
            }
            
        }
         /**
         * Ouvrir le formulaire de modifications
         * @param {*} e 
         */
          const editClass = (e) => {
            e.preventDefault();
            let id = e.currentTarget.getAttribute("classeId");
            id = id.trim();
            idClasseToEdit = id;
            getApiDatas(`/api/classes?id=${idClasseToEdit}`, (res) => {
                $("#modalEditClasse").modal("show");
                let editClasseForm = document.querySelector("#editClasseForm");
                let inputs = editClasseForm.querySelectorAll("input");
                inputs[0].value = res.datas.Designation;
               
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
            let desi = inputs[0].value;
            desi = desi.trim();
            let isDesiCorrect = desi.search(/[^\w\s]/);
            if(isDesiCorrect > -1) {
                //code a implementer
                //showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous utilisez des caractères non permis pour ce type de données <i class="red close icon"></i>`);
                return;
            }
            if(desi == "") {
                //code a implementer
                //showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous ne devez pas entrer des champs vides <i class="red close icon"></i>`);
                return;
            }
            editFormData.append("Designation", desi);
            postApiDatas(`/api/classes?id=${idClasseToEdit}`, editFormData, (res) => {
                showAlert(res);
            })

        }
        /**
         * supprimer une classe
         * @param {clickEvent} e 
         */
         const deleteClass = (e) => {
            e.preventDefault();
            $('#modalClasseDelete').modal('show');
            idClasseToRemove = e.currentTarget.getAttribute("classeId");
            idClasseToRemove = idClasseToRemove.trim();
            let classe = classes.find(x => x.idClasse == idClasseToRemove);
            if (classe) {
                let span = document.querySelector("#classeToRemoveName");
                span.className = "bold";
                span.innerHTML = classe.Designation;
                $('#modalClasseDelete').modal('show');
            }
        }
        /**
             * 
             * @param {clickEvent} e 
             */
         const destroyClass = (e) => {
            e.preventDefault();
            getApiDatas(`/api/classes?action=delete&id=${idClasseToRemove}`, (res) => {
                showAlert(res);
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
                let id = e.currentTarget.getAttribute("identifiant");
                idCPToRemove = id.trim();
                let span = document.querySelector("#comptePrincipalName");
                let cp = comptePrincipaux.find(x => x.idComptePrincipal == idCPToRemove);
                if (cp) {
                    let span = document.querySelector("#comptePrincipalName");
                    span.className = "bold";
                    span.innerHTML = cp.DesignationCompte;
                    $("#modalCPDeleteConfirmation").modal("show");
                }
                
            }
            /**
             * 
             * @param {*} e 
             */
            const destroyComptePrincipal = (e) => {
                e.preventDefault();
                getApiDatas(`/api/comptePrincipaux?id=${idCPToRemove}&action=delete`, (res) => {
                    showAlert(res);
                })
            }
            /**
             * Enregistrer un nouveau compte principal
             * @param {*} e 
             * @returns 
             */
            const createComptePrincipal = (e) => {
                e.preventDefault();
                const newComptePrincipalForm = document.querySelector("#newComptePrincipalForm");
                let inputs = newComptePrincipalForm.querySelectorAll("input");
                let first = inputs[0];
                
                let comptePrinci = first.value;
                comptePrinci = comptePrinci.trim();
                if (comptePrinci.search(/\D/) !== -1 || comptePrinci.length !== 2) {
                    //code a implementer
                    //showUserMessage("Opération avortée", `La valeur du compte principal est incorrecte <i class="red close icon"></i>`)
                    return;
                }
                let codeClasse = comptePrinci.substr(0,1);
                let classeFound = classes.find(x => x.CodeClasse == codeClasse);
                if (classeFound) {
                    let comptePrinciFound = comptePrincipaux.find(x => x.CodeComptePrincipal == comptePrinci);
                    if (comptePrinciFound) {
                        //code a implementer
                        //showUserMessage("Opération avortée", `Le compte principal que vous tentez de créer existe déjà <i class="red close icon"></i>`)
                        return;
                    }
                    let data = new FormData();
                    for (let index = 0; index < inputs.length; index++) {
                        const element = inputs[index];
                        let value = element.value;
                        if (value.search(/[<>;]/) !==  -1) {
                            //code a implementer
                            //showUserMessage("Opération avortée", `Usage des caratères non autorisés <i class="red close icon"></i>`);
                            return;
                        }
                        value = value.trim();
                        let name = element.name;
                        data.append(name, value);
                    }
                    let id_classe = classeFound.idClasse;
                    data.append("Classe_idClasse", id_classe);
                    postApiDatas(`/api/comptePrincipaux`, data, (res) => {
                        showAlert(res);
                    })
                }
                else {
                    //code a implementer
                    //showUserMessage("Opération avortée", `La classe de ce compte n'existe pas <i class="red close icon"></i>`);

                }

            }
            
            /**
             */
            const editComptePrincipal = (e) => {
                e.preventDefault();
                let id = e.currentTarget.getAttribute("identifiant");
                id = id.trim();
                idCPToEdit = id;
                
                getApiDatas(`/api/comptePrincipaux?id=${idCPToEdit}`, (res) => {
                    let editCPForm = document.querySelector("#editCPForm");
                    let inputs = editCPForm.querySelectorAll("input");
                    inputs[0].value = res.datas.DesignationCompte;
                    $("#modalCPEdition").modal("show");
                });
            }
            const saveComptePrinciEdition = (e) => {
                e.preventDefault();
                let editCPForm = document.querySelector("#editCPForm");
                let inputs = editCPForm.querySelectorAll("input");
                const editFormData = new FormData();
                
                let desi = inputs[0].value;
                desi = desi.trim();
                let isDesiCorrect = desi.search(/[^\w\s]/);
                if(isDesiCorrect > -1) {
                    //showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous utilisez des caractères non permis pour ce type de données <i class="red close icon"></i>`);
                    return;
                }
                if( desi == "") {
                   // showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous ne devez pas entrer des champs vides <i class="red close icon"></i>`);
                    return;
                }
                editFormData.append("DesignationCompte", desi);
                postApiDatas(`/api/comptePrincipaux?id=${idCPToEdit}`, editFormData, (res) => {
                    showAlert(res);
                })
            }
        //#endregion

        //#region : sous compte handlers

           
            /**
             */
            const createSousCompte = (e) => {
                e.preventDefault();
                const newSousCompteForm = document.querySelector("#newSCForm");
                let inputs = newSousCompteForm.querySelectorAll("input");
                let first = inputs[0];
                let sousCompte = first.value;
                sousCompte = sousCompte.trim();
                if (sousCompte.search(/\D/) !== -1 || sousCompte.length !== 3) {
                    //showUserMessage("Opération avortée", `La valeur du sous compte est incorrecte <i class="red close icon"></i>`)
                    return;
                }
                let comptePrinci = sousCompte.substr(0,2);
                let comptePrinciFound = comptePrincipaux.find(x => x.CodeComptePrincipal == comptePrinci);
                if (comptePrinciFound) {
                    let sousCompteFound = sousComptes.find(x => x.CodeSousCompte == sousCompte);
                    if (sousCompteFound) {
                        //showUserMessage("Opération avortée", `Le sous-compte que vous tentez de créer existe déjà <i class="red close icon"></i>`)
                        return;
                    }
                    let data = new FormData();
                    for (let index = 0; index < inputs.length; index++) {
                        const element = inputs[index];
                        let value = element.value;
                        if (value.search(/[<>;]/) !==  -1) {
                            //showUserMessage("Opération avortée", `Usage des caratères non autorisés <i class="red close icon"></i>`);
                            return;
                        }
                        value = value.trim();
                        let name = element.name;
                        data.append(name, value);
                    }
                    let idCP = comptePrinciFound.idComptePrincipal;
                    data.append("ComptePrincipal_idComptePrincipal", idCP);
                    postApiDatas(`/api/sousComptes`, data, (res) => {
                        showAlert(res);
                    })
                }
                else {
                   // showUserMessage("Opération avortée", `La classe de ce compte n'existe pas <i class="red close icon"></i>`);

                }
            }
            /**
            *
             */
            const editSousCompte = (e) => {
                e.preventDefault();
                let id = e.currentTarget.getAttribute("identifiant");
                id = id.trim();
                idSCToEdit = id;
                getApiDatas(`/api/sousComptes?id=${idSCToEdit}`, (res) => {
                    let editSCForm = document.querySelector("#editSCForm");
                    let inputs = editSCForm.querySelectorAll("input");
                    let value = res.datas.Designation;
                    inputs[0].value = value;
                    console.log(inputs[0].value)
                    $("#editSousCompteModal").modal("show");
                });
                
            }
            const saveSCEdition = (e) => {
                e.preventDefault();
                let editSCForm = document.querySelector("#editSCForm");
                let inputs = editSCForm.querySelectorAll("input");
                const editFormData = new FormData();
                
                let desi = inputs[0].value;
                desi = desi.trim();
                let isDesiCorrect = desi.search(/[^\w\s]/);
                if(isDesiCorrect > -1) {
                    //showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous utilisez des caractères non permis pour ce type de données <i class="red close icon"></i>`);
                    return;
                }
                if(desi == "") {
                    //showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous ne devez pas entrer des champs vides <i class="red close icon"></i>`);
                    return;
                }
                editFormData.append("Designation", desi);
                postApiDatas(`/api/sousComptes?id=${idSCToEdit}`, editFormData, (res) => {
                    showAlert(res);   
                })
            }
            const deleteSousCompte = (e) => {
                let id = e.currentTarget.getAttribute("identifiant")
                idSCToRemove = id.trim();
                let sc = sousComptes.find(x => x.idSousCompte == idSCToRemove);
                if (sc) {
                    let span = document.querySelector("#sousCompteRemoveName");
                    span.className = "bold";
                    span.innerHTML = sc.Designation;
                    $("#modalSCDeleteConfirmation").modal("show");
                }
            }
            const destroySousCompte = (e) => {
                e.preventDefault();
                getApiDatas(`/api/sousComptes?id=${idSCToRemove}&action=delete`, (res) => {
                   showAlert(res);
                })
            }
        //#endregion        
        //#region : compte divisionnaire handler
        
        const createCompteDivisionnaire = (e) => {
            e.preventDefault();
            const newCompteDivisionnaireForm = document.querySelector("#newCDForm");
            let inputs = newCompteDivisionnaireForm.querySelectorAll("input");
            let first = inputs[0];
            let compteDivisio = first.value;
            compteDivisio = compteDivisio.trim();
            if (compteDivisio.search(/\D/) !== -1 || compteDivisio.length !== 4) {
                //
                //showUserMessage("Opération avortée", `La valeur du sous compte est incorrecte <i class="red close icon"></i>`)
                return;
            }
            let sousCompte = compteDivisio.substr(0,3);
            let sousCompteFound = sousComptes.find(x => x.CodeSousCompte == sousCompte);
            if (sousCompteFound) {
                let compteDivisioFound = comptesDivisionnaires.find(x => x.CodeCompteDivisionnaire == compteDivisio);
                if (compteDivisioFound) {
                    //
                    //showUserMessage("Opération avortée", `Le compte divisionnaire que vous tentez de créer existe déjà <i class="red close icon"></i>`)
                    return;
                }
                let data = new FormData();
                for (let index = 0; index < inputs.length; index++) {
                    const element = inputs[index];
                    let value = element.value;
                    if (value.search(/[<>;]/) !==  -1) {
                        //showUserMessage("Opération avortée", `Usage des caratères non autorisés <i class="red close icon"></i>`);
                        return;
                    }
                    value = value.trim();
                    let name = element.name;
                    data.append(name, value);
                }
                let idSC = sousCompteFound.idSousCompte;
                data.append("SousCompte_idSousCompte", idSC);
                postApiDatas(`/api/comptesDivisionnaires`, data, (res) => {
                    showAlert(res);
                })
            }
            else {
                showUserMessage("Opération avortée", `Le sous compte de ce compte n'existe pas <i class="red close icon"></i>`);

            }
        }
        const deleteCompteDivisionnaire = (e) => {
            e.preventDefault();
            let id = e.currentTarget.getAttribute("identifiant");
            idCDToRemove = id.trim();
            let cd = comptesDivisionnaires.find(x => x.idCompteDivisionnaire == idCDToRemove);
            if (cd) {
                let span = document.querySelector("#cdRemoveName");
                span.className = "bold";
                span.innerHTML = cd.DesigantionCD;
                $("#modalCDDeleteConfirmation").modal("show");
            }
            
        }
        const destroyCompteDivisionnaire = (e) => {
            e.preventDefault();
            getApiDatas(`/api/comptesDivisionnaires?id=${idCDToRemove}&action=delete`, (res) => {
            showAlert(res)});
        }
        const editCompteDivisionnaire = (e) => {
            e.preventDefault();
            let id = e.currentTarget.getAttribute("identifiant");
            id = id.trim();
            idCDToEdit = id;
            getApiDatas(`/api/comptesDivisionnaires?id=${idCDToEdit}`, (res) => {
                let editCDForm = document.querySelector("#editCDForm");
                let inputs = editCDForm.querySelectorAll("input");
                let value = res.datas.DesigantionCD;
                inputs[0].value = value;
                $("#editCompteDiviModal").modal("show");
            });
            
        }
        const saveCDEdition = (e) => {
            e.preventDefault();
            let editCDForm = document.querySelector("#editCDForm");
            let inputs = editCDForm.querySelectorAll("input");
            const editFormData = new FormData();
            
            let desi = inputs[0].value;
            desi = desi.trim();
            let isDesiCorrect = desi.search(/[^\w\s]/);
            if(isDesiCorrect > -1) {
                //showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous utilisez des caractères non permis pour ce type de données <i class="red close icon"></i>`);
                return;
            }
            if(desi == "") {
                //showUserMessage(`Usage de caractère(s) non-autorisé(s) <i class="red warning icon"></i>`, `Vous ne devez pas entrer des champs vides <i class="red close icon"></i>`);
                return;
            }
            editFormData.append("DesigantionCD", desi);
            postApiDatas(`/api/comptesDivisionnaires?id=${idCDToEdit}`, editFormData, (res) => {
                showAlert(res);   
            })
        }
    //#endregion
    
        //#endregion
    //#region : selection
    let idSCToRemove;
    let idCDToEdit;
    let idCDToRemove;
    let classes = [];
    let comptePrincipaux = [];
    let sousComptes = [];
    let comptesDivisionnaires = [];
    let familles = [];
    let idClasseToEdit;
    const submitClasseInfo = document.querySelector("#submitClasseInfo");
    const editClassBtns = document.querySelectorAll(".editClassBtn");
    const submitEditClasseBtn = document.querySelector("#submitEditClasseBtn");
    const deleteClasseBtns = document.querySelectorAll(".deleteClasseBtn");
    const destroyClassBtn = document.querySelector("#destroyClassBtn");
    const submitCPInfo = document.querySelector("#submitCPInfo");
    const editCPBtns = document.querySelectorAll(".editCPBtn");
    let idCPToEdit;
    let idCPToRemove;
    const submitCPEditionBtn = document.querySelector("#submitCPEditionBtn");
    const deleteCPBtns = document.querySelectorAll(".deleteCPBtn");
    const destroyCPBtn = document.querySelector("#destroyCPBtn");
    const submitSCInfo = document.querySelector("#submitSCInfo");
    let idSCToEdit;
    const editSCBtns = document.querySelectorAll(".editSCBtn");
    const submitSCEditionBtn = document.querySelector("#submitSCEditionBtn");
    //const addComptePrincipal = document.querySelector("#addComptePrincipal");
    const deleteSCBtns = document.querySelectorAll(".deleteSCBtn");
    const destroySCBtn = document.querySelector("#destroySCBtn");
    const submitCompteDInfo = document.querySelector("#submitCompteDInfo");
    const editCDBtns = document.querySelectorAll(".editCDBtn");
    const deleteCDBtns = document.querySelectorAll(".deleteCDBtn");
    const submitCDEditionBtn = document.querySelector("#submitCDEditionBtn");
    const destroyCDBtn = document.querySelector("#destroyCDBtn");
    //#endregion
    loaAllClasses();
    loadAllCompteDivision();
    loadAllComptePrinci();
    loadAllSousCompte();
    loadAllCompteDivision();
    loadAllFamille();
    //#region : add event listenner
    submitClasseInfo.addEventListener("click", createClass);
    for (let index = 0; index < editClassBtns.length; index++) {
        const element = editClassBtns[index];
        element.addEventListener("click", editClass);
        
    }
    submitEditClasseBtn.addEventListener("click", saveClassEdition);
    for (let index = 0; index < deleteClasseBtns.length; index++) {
        const element = deleteClasseBtns[index];
        element.addEventListener("click", deleteClass);
    }
    destroyClassBtn.addEventListener("click", destroyClass);
    submitCPInfo.addEventListener("click", createComptePrincipal);
    for (let index = 0; index < editCPBtns.length; index++) {
        const element = editCPBtns[index];
        element.addEventListener("click", editComptePrincipal);
    }
    submitCPEditionBtn.addEventListener("click", saveComptePrinciEdition);
    for (let index = 0; index < deleteCPBtns.length; index++) {
        const element = deleteCPBtns[index];
        element.addEventListener("click", deleteComptePrincipal);
        
    }
    destroyCPBtn.addEventListener("click", destroyComptePrincipal);
    submitSCInfo.addEventListener("click", createSousCompte);
    for (let index = 0; index < editSCBtns.length; index++) {
        const element = editSCBtns[index];
        element.addEventListener("click", editSousCompte);
    }
    submitSCEditionBtn.addEventListener("click", saveSCEdition);
    for (let index = 0; index < deleteSCBtns.length; index++) {
        const element = deleteSCBtns[index];
        element.addEventListener("click", deleteSousCompte);
    }
    destroySCBtn.addEventListener("click", destroySousCompte);
    submitCompteDInfo.addEventListener("click", createCompteDivisionnaire);
    for (let index = 0; index < editCDBtns.length; index++) {
        const element = editCDBtns[index];
        element.addEventListener("click", editCompteDivisionnaire);
    }
    for (let index = 0; index < deleteCDBtns.length; index++) {
        const element = deleteCDBtns[index];
        element.addEventListener("click", deleteCompteDivisionnaire);
    }
    submitCDEditionBtn.addEventListener("click", saveCDEdition);
    destroyCDBtn.addEventListener("click", destroyCompteDivisionnaire);
    //#endregion
})()