(
    function() {
        //#region : usual function
         /**
         * 
         * @param {Object} res 
         */
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
        const getJournauxForSearch = (url) => {
            getApiDatas(url, (res) => {
                if (res == undefined ) {
                    //code to execute
                    return;
                    contentJournaux = [];
                }
                if (res.datas.length > 0) {
                    contentJournaux = [];
                    for (let i = 0; i < res.datas.length; i++) {
                        const element = res.datas[i];
                        let journal = {
                            title: element.CodeJournal,
                            descriptions: element.NomJournal,
                            id: element.idCategorieJournaux
                        }
                        contentJournaux.push(journal);
                        
                    }
                }
                else {
                    contentJournaux = [];
                }
            })
        }
        const getRespoJournauxForSearch = (url) => {
            getApiDatas(url, (res) => {
                if (res == undefined ) {
                    //code to execute
                    return;
                    contentUserJournaux = [];
                }
                if (res.datas.length > 0) {
                    contentUserJournaux = [];
                    for (let i = 0; i < res.datas.length; i++) {
                        const element = res.datas[i];
                        let respoJournaux = {
                            title: element.CodeJournal,
                            descriptions: element.NomJournal,
                            id: element.idCategorieJournaux
                        }
                        contentUserJournaux.push(respoJournaux); 
                    }
                }
                else {
                    contentUserJournaux = [];
                }
            })
        }
        const getAllJournaux = (url) => {
            getApiDatas(url, (res) => {
                if (res == undefined) {
                    //code a completer
                    journaux = [];
                    return;            
                }
                if (res.type == `success`) {
                    journaux = [];
                    if (res.datas.length > 0) {
                        for (let i = 0; i < res.datas.length; i++) {
                            const element = res.datas[i];
                            journaux.push(element);
                        }
                    }
                    else {
                        journaux = [];
                    }
                }
            })
        }
        const getAllUserJournaux = (url) => {
            getApiDatas(url, (res) => {
                if (res == undefined) {
                    //code to execute
                    return;
                    contentUserJournaux = [];
                }
                if (res.type == `success`) {
                    if (res.datas.length > 0) {
                        contentUserJournaux = [];
                        for (let i = 0; i < res.datas.length; i++) {
                            const element = res.datas[i];
                            contentUserJournaux.push(element);
                        }
                    }
                    else {
                        //code a ajouter
                        contentUserJournaux = [];
                    }
                }
                else {
                    //code
                }
            })
        }
        const deleteJournal = (e) => {
            e.preventDefault();
            let id = e.currentTarget.getAttribute("identifiant");
            if (!id) {
                return;
            }
            idToDelete = id;
            getApiDatas(`/api/journaux?id=${id}`, (res) => {
                let name = res.datas.NomJournal;
                let span = document.querySelector("#journalToRemoveName");
                if (!span) {
                return;
                }
                span.innerHTML = `<strong>${name}</strong>`;
                span.className = "blue";
                $("#deleteJournalModal").modal("show");
            })
        }
        const destroyJournal = (e) => {
            e.preventDefault();
            getApiDatas(`/api/journaux?id=${idToDelete}&action=delete`, showAlert);
        }
        //#endregion
        //#region : listenners
        const showJournalDetails = (e) => {
            e.preventDefault();
            let target = e.currentTarget;
            let id = target.getAttribute("identifiant");
            getApiDatas(`/api/UserJournal?journal_id=${id}`, (res) => {
                if (res.datas.length == 0) {
                    let tbody = document.querySelector("#respoList");
                    tbody.innerHTML = `
                        <tr>
                            <td colspan="2">Aucun responsable trouvé</td>
                        </tr>
                    `;
                    $("#journalDetailsModal").modal("show");
                }
            })
        }
        const createJournal = (e) => {
            e.preventDefault();
            const addJournalForm = document.querySelector("#addJournalForm");
            const inputs = addJournalForm.querySelectorAll("input");
            const formData = new FormData();
            for (let index = 0; index < inputs.length; index++) {
                const element = inputs[index];
                formData.append(element.name, element.value);
            }
            postApiDatas("/api/journaux", formData, (res) => {
                showAlert(res);
            });
        }
        const editJournal = (e) => {
            e.preventDefault();
            e.preventDefault();
            let id = e.currentTarget.getAttribute("identifiant");
            if (!id) {
                return;
            }
            idToEdit = id;
            getApiDatas(`/api/journaux?id=${id}`, (res) => {
                let name = res.datas.NomJournal;
                let field = document.querySelector("#changeJournalName");
                field.value = name;
                $("#editJournalModal").modal("show");
            })
        }
        const submitEdition = (e) => {
            let formData = new FormData();
            let field = document.querySelector("#changeJournalName");
            formData.append(field.name, field.value);
            postApiDatas(`/api/journaux?id=${idToEdit}&action=delete`, formData, showAlert);
        }
        //#endregion
        //#region : Selection des elements
        let idToDelete;
        let idToEdit;
        const submitJournalBtn = document.querySelector("#submitJournalBtn");
        const searchBtns = document.querySelectorAll('.searchBtn');
        let contentJournaux;
        let contentUserJournaux;
        let journaux;
        const fieldsUpperCase = document.querySelectorAll(".upperCase");
        const deleteJournalBtns = document.querySelectorAll(".deleteJournalBtn");
        const submitDeletionBtn = document.querySelector("#submitDeletionBtn");
        const editJournalBtns = document.querySelectorAll(".editJournalBtn");
        const submitEditionBtn = document.querySelector("#submitEditionBtn");
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
        jQuery(function($) {
            //initiate dataTables plugin
            var myTable = 
            $('#journauxTable')
            //.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
            .DataTable();
        });
        //#endregion
        //#region : code a executer au chargement
        //getJournauxForSearch(`/api/journaux`);
        //getRespoJournauxForSearch(`/api/UserJournal`);
        //getAllJournaux(`/api/journaux`);
        //getAllUserJournaux(`/api/UserJournal`);
        //#endregion
        //#region : add events listenner aux actions
        for (let i = 0; i < searchBtns.length; i++) {
            const element = searchBtns[i];
            element.addEventListener(`click`, showJournalDetails);
        }
        submitJournalBtn.addEventListener("click", createJournal);
        for (let index = 0; index < fieldsUpperCase.length; index++) {
            const element = fieldsUpperCase[index];
            element.addEventListener("blur", (e) => {
                let target = e.currentTarget;
                target.value = target.value.toUpperCase();
            })
        }
        for (let index = 0; index < deleteJournalBtns.length; index++) {
            const element = deleteJournalBtns[index];
            element.addEventListener("click", deleteJournal);
        }
        submitDeletionBtn.addEventListener("click", destroyJournal);
        for (let index = 0; index < editJournalBtns.length; index++) {
            const element = editJournalBtns[index];
            element.addEventListener("click", editJournal);
        }
        submitEditionBtn.addEventListener("click", submitEdition);
        //selection des inputs
        // let inputs = document.querySelectorAll("input");// on peut utiliser n'importe
                                                        //quel selecteur css
        //on ajoute un evenement sur chaque champ
        // for (let index = 0; index < inputs.length; index++) {
        //     const element = inputs[index];
            
        //     element.addEventListener("change", function(e) {
        //         let somme = 0;
        //         //a chaque fois faite la somme de tous les champs
        //         for (let j = 0; j < inputs.length; j++) {
        //             const element = inputs[j];
        //             //le if va permettre d'ignorer les champs vide
        //             //le trim c'est juste pour les espace
        //             if (element.value.trim() == "") {
        //                 continue;
        //             }
        //             let intValue = parseInt(element.value.trim(), 10);// votre radix ;)
        //             somme += intValue;
        //         }
        //     })
        // } 


        //pour chaque cellules d'actions
        //#endregion
    }
)()