(()=> {
    //#region : data functions
    const getAllCommunes =  (url) => {
        getApiDatas(url, (res) => {
            if (res.type == 'success') {
                let datas = res.datas;
                if(datas) {
                    for (let i = 0; i < datas.length; i++) {
                        const data = datas[i];
                        const content = data.commune;
                        results.push(content);
                    }
                    contentCommune = results;
                    $( "#communeEntr" ).autocomplete({
                        source: contentCommune
                    });

                }
            }
            else {
                contentCommune = [];
            }
        });
        let results = [];
        
    }
    const getCommuneIdByName = (url, callBack) => {
        
        getApiDatas(url, callBack);
    }
    const getIdByName = (url, callBack) => {
        getApiDatas(url, callBack);
    }
    const createToDB = (url, form) => {
        const xhr = new XMLHttpRequest();
        xhr.open(`POST`, url);
        xhr.onreadystatechange = () => {
            if(xhr.readyState == 4) {
                if(xhr.status == 200) {
                    let res = xhr.responseText;
                    try {
                        res = JSON.parse(res);
                    } catch (error) {
                        console.log(res);
                    }
                    if (res.type == `success`) {
                        localStorage.serverResponse = JSON.stringify({type: "success", message: res.message})
                        document.location.reload();
                    }
                    else if(res.type == `error`){
                        localStorage.serverResponse = JSON.stringify({type: "danger", message: res.message});
                        document.location.reload();
                    }
                }
                else {
                    localStorage.serverResponse = JSON.stringify({type: "danger", message: res.message})
                }
            }
        }
        xhr.send(form);
    }
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
    //#endregion
    //#region : listenner
    const submitEntreprise = (e) => {
        e.preventDefault();
        const inputs = newEntrepriseForm.querySelectorAll('input');
        let formData = new FormData();
        for (let i = 0; i < inputs.length; i++) {
            const element = inputs[i];
            formData.append(element.name, element.value)
            
        }
        createToDB('/api/entreprises', formData)
        
    }
    const showEntrepriseDetails = (e) => {
        e.preventDefault();
        const target = e.currentTarget;
        let id = target.id;
        id = id.replace(`vue`, ``);
        id = id.trim();
        getApiDatas(`/api/entreprises?idEntreprise=${id}`, (res) => {
            if (res.type == `success`) {
                let modal = $(`.ui.modal.details`);
                let modalEl = document.querySelector(`.ui.modal.details`);
                let header = modalEl.querySelector(`.header`);
                header.innerHTML = `Details de l'Entreprise`;
                let grid = modalEl.querySelector(`.content`).firstElementChild;
                grid.innerHTML = "";
                let i = 0;
                let entreKeys = [`Id`, `Code`, `Nom`, `Responsable`, `Type`, `Numéro d'adresse`, `Rue`, `Téléphone`, 'e-mail', 'Début des activités', 'Début de la comptabilité', 'Commune', 'NIF', 'Nombre de jour par Semaine', "Nombre d'heure par jour"];
                
                for(let key in res.datas) {
                    const row = document.createElement(`div`);
                    row.classList.add(`row`);
                   const div1 = document.createElement(`div`);
                   div1.classList.add(`column`);
                   const div2 = document.createElement(`div`);
                   div2.classList.add(`column`);
                   if (key == `commune_idCommune`) {
                       div1.innerHTML = `Commune`;
                       let commune = contentCommune.find(x=>x.id == res.datas[key]);
                       div2.innerHTML = commune?commune.title : "Aucune commune mensionnée";
                   }
                   else if(key == `entitede`) {
                    continue;
                   }
                   else {
                        div1.innerHTML = entreKeys[i];
                        div2.innerHTML = res.datas[key];
                   }
                   
                    row.appendChild(div1);
                    row.appendChild(div2);
                    grid.appendChild(row);
                   i++;
                }
                modal.modal(`show`);
            }
            else {
                //condition en cas d'echec
            }
        });
        

    }
    const showEntrepriseDetailsByInput = (e) => {
        e.preventDefault();
        let name = searchEntreprise.value.trim();
        let nameFound = contentEntreprise.find(x=>x.title == name);
        if (nameFound == undefined) {
            return;
        }
        getApiDatas(`/api/entreprises?SNomEntreprise=${name}`, (res) => {
            if (res.type == `success`) {
                let modal = $(`.ui.modal.details`);
                let modalEl = document.querySelector(`.ui.modal.details`);
                let header = modalEl.querySelector(`.header`);
                header.innerHTML = `Details de l'Entreprise`;
                let grid = modalEl.querySelector(`.content`).firstElementChild;
                grid.innerHTML = "";
                let i = 0;
                let entreKeys = [`Id`, `Code`, `Nom`, `Responsable`, `Type`, `Numéro d'adresse`, `Rue`, `Téléphone`, 'e-mail', 'Début des activités', 'Début de la comptabilité', 'Commune', 'NIF', 'Nombre de jour par Semaine', "Nombre d'heure par jour"];
                
                for(let key in res.datas[0]) {
                    const row = document.createElement(`div`);
                    row.classList.add(`row`);
                   const div1 = document.createElement(`div`);
                   div1.classList.add(`column`);
                   const div2 = document.createElement(`div`);
                   div2.classList.add(`column`);
                   if (key == `commune_idCommune`) {
                       div1.innerHTML = `Commune`;
                       let commune = contentCommune.find(x=>x.id == res.datas[0][key]);
                       div2.innerHTML = commune?commune.title : "Aucune commune mensionnée";
                   }
                   else if(key == `entitede`) {
                    continue;
                   }
                   else {
                        div1.innerHTML = entreKeys[i];
                        div2.innerHTML = res.datas[0][key];
                   }
                   
                    row.appendChild(div1);
                    row.appendChild(div2);
                    grid.appendChild(row);
                   i++;
                }
                modal.modal(`show`);
            }
            else {
                //condition en cas d'echec
            }
        });
    }
    const addAdmin = (e) => {
        $("#modalAdmin").modal("show");
        let id = e.currentTarget.id;
        id = id.replace(/\D+/, "");
        id = id.trim();
        entrepriseId = id;
    }
    const submitAdmin = (e) => {
        e.preventDefault();
        let adminForm = document.querySelector("#admin-form");
        let inputs = adminForm.querySelectorAll("input");
        let formData = new FormData();
        for (let index = 0; index < inputs.length; index++) {
            const element = inputs[index];
            let name = element.name;
            name = name.replace("_admin", "").trim()
            console.log(name)
            let value = element.value;
            value = value.trim();
            if (value == "") {
                return;
                //a completer
            }
            if (name !== "mpd" && name !=="email") {
                if (!isValidSpacedString(value)) {
                    localStorage.serverResponse = JSON.stringify({type: "danger", message: "Usage de caractère non autorisé. Enregistrement avorté"});
                    document.location.reload();
                }
            }
            if (name !== "mpd") {
                motDePasseTempo = value;
            }
            formData.append(name, value);
        }
        formData.append("role", "admin");
        formData.append("entrepriseId", entrepriseId);
        createToDB("/api/users", formData);

    }
    const askDeleteConfirmation = (e) => {
        e.preventDefault();
        let btn = e.currentTarget;
        let id = btn.getAttribute("entrepriseId");
        id = id?id.trim() : undefined;
        if (!id) {
            return;
        }
        idEntreToRemove = id;
        getApiDatas(`/api/entrs?id=${id}`, (res) => {
            let nameEntreprise = res.datas.SNomEntreprise;
            let span = document.querySelector("#entrToRemoveName");
            if (!span) {
               return;
            }
            span.innerHTML = `<strong>${nameEntreprise}</strong>`;
            span.className = "blue";
            $("#modalEntrDelete").modal("show");
        })
       
    }
    const destroyEntreprise = (e) => {
        e.preventDefault();
        getApiDatas(`/api/entrs?id=${idEntreToRemove}&action=delete`, showAlert);
        //
    }
    const editEntreprise = (e) => {
        e.preventDefault();
        let btn = e.currentTarget;
        let id = btn.getAttribute("entrepriseId");
        id = id?id.trim() : undefined;
        if (!id) {
            return;
        }
        entrepriseId = id;
        const editEntrForm = document.querySelector("#editEntrForm");
        const inputs = editEntrForm.querySelectorAll("input");
        getApiDatas(`/api/entrs?id=${id}`, (res) => {
            let nameEntreprise = res.datas.SNomEntreprise;
            let codeEntreprise = res.datas.SCodeEntreprise;
            inputs[0].value = codeEntreprise;
            inputs[1].value = nameEntreprise;
            $("#modalEditEntr").modal("show");
        })
       
    }
    const confirmEntrEdition = (e) => {
        let editEntrForm = document.querySelector("#editEntrForm");
        let inputs = editEntrForm.querySelectorAll("input");
        
        let formData = new FormData();
        for (let index = 0; index < inputs.length; index++) {
            const element = inputs[index];
            let name = element.name;
            name = name.replace("_edit", "").trim()
            let value = element.value;
            value = value.trim();
            if (value == "") {
                return;
                //a completer
            }
            formData.append(name, value);
        }
        postApiDatas(`/api/entrs?id=${entrepriseId}`, formData, (res) => {
            showAlert(res);
        })
    }
    const blockActive = (e) => {
        e.preventDefault();
        let btn = e.currentTarget;
        let id = btn.getAttribute("entrepriseId");
        id = id.trim();
        getApiDatas(`/api/entrs?id=${id}`, (res) => {
            let entrFound = res.datas;
            let status = entrFound.status;
            status = status == "1" ? "0" : "1";
            let message = status == "0" ? "L'entreprise a été bloquée avec succès" : "L'entre prise a été déverouillée avec succès";
            let formData = new FormData();
            formData.append("status", status );
            postApiDatas(`/api/entrs?id=${id}`, formData, (res) => {
                if (res.type == `success`) {
                    localStorage.serverResponse = JSON.stringify({type: "success", message: message})
                    document.location.reload();
                }
                else if(res.type == `error`){
                    localStorage.serverResponse = JSON.stringify({type: "danger", message: message});
                    document.location.reload();
                }
            })
        });
        
        
    }
    //#endregion
    //#region : selections
    
    const submitEntrInfo = document.querySelector("#submitEntrInfo");
    const addAdminBtns = document.querySelectorAll(".addAdminBtn");
    let contentCommune = [];
    let entrepriseId;
    let submitAdminBtn = document.querySelector("#submitAdminBtn");
    let motDePasseTempo = "";
    const deleteEntrBtns = document.querySelectorAll(".deleteEntrBtn");
    const destroyEntrBtn = document.querySelector("#destroyEntrBtn");
    const editEntrBtns = document.querySelectorAll(".editEntrBtn");
    const confirmEntrEditionBtn = document.querySelector("#confirmEntrEditionBtn");
    const blockActiveBtns = document.querySelectorAll(".blockActiveBtn");
    let idEntreToRemove;
    let idEntrepriseToBlock;
    //#endregion
    getAllCommunes('/api/communes');
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
     //#region : add event listenners
     submitEntrInfo.addEventListener("click", submitEntreprise);
     for (let index = 0; index < addAdminBtns.length; index++) {
         const element = addAdminBtns[index];
         element.addEventListener("click", addAdmin);
     }
     submitAdminBtn.addEventListener("click", submitAdmin);
     for (let index = 0; index < deleteEntrBtns.length; index++) {
         const element = deleteEntrBtns[index];
         element.addEventListener("click", askDeleteConfirmation);
     }
     destroyEntrBtn.addEventListener("click", destroyEntreprise);
     for (let index = 0; index < editEntrBtns.length; index++) {
         const element = editEntrBtns[index];
         element.addEventListener("click", editEntreprise);
     }
     confirmEntrEditionBtn.addEventListener("click", confirmEntrEdition);
     for (let index = 0; index < blockActiveBtns.length; index++) {
         const element = blockActiveBtns[index];
         element.addEventListener("click", blockActive);
     }
     //#endregion
})()