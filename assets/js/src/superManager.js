(()=> {
    //#region : data functions
    const getAllEntites = (url) => {
        getApiDatas(url, (res) => {
            if (res.type == 'success') {
                let results = [];
                let datas = res.datas.entites;
                if(datas) {
                    for (let i = 0; i < datas.length; i++) {
                        const data = datas[i];
                        const content = {
                            title: data.SNomEntreprise,
                            descriptions:data.idEntreprise
                        }
                        results.push(content);
                    }
                    contentEntite = results;
                    
                    $(`.ui.search.entite`).search({
                        source: contentEntite
                    })
                }
            }
            else {
                contentEntite = [];
            }
        });
    }
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
                        localStorage.serverResponse = JSON.stringify({type: "success", message: "1 Entreprise ajoutée avec succès"})
                       document.location.reload();
                    }
                    else if(res.type == `error`){
                        localStorage.serverResponse = JSON.stringify({type: "danger", message: "Echec de l'enregistrement"});
                    }
                }
                else {
                    localStorage.serverResponse = JSON.stringify({type: "danger", message: "Impossible d'atteindre le serveur"})
                }
            }
        }
        xhr.send(form);
    }
    //#endregion
    //#region : listenner
    const submitEntreprise = (e) => {
        e.preventDefault();
        const inputs = newEntrepriseForm.querySelectorAll('input');
        let formData = new FormData();
        for (let i = 0; i < inputs.length; i++) {
            const element = inputs[i];
            if(element.name == "communeEntr") {
                getCommuneIdByName(`/api/communes?commune=${element.value.trim()}`, (res) => {
                    formData.append('commune_idCommune', res.datas[0].idCommune);
                    createToDB('/api/entreprises', formData)
                } )
                continue;
            }
            else {
                formData.append(element.name, element.value)
            }
        }
        
    }
    const deleteEntreprise = (e) => {
        e.preventDefault();
        let checks = entreprisesList.querySelectorAll(`input[type="checkbox"]`);
        let checkedItem = [];
        for (let i = 0; i < checks.length; i++) {
            const element = checks[i];
            if (element.checked) {
                checkedItem.push(element);
            }
        }
        if (checkedItem.length > 0) {
            entreprisesToDelete = [];
            for (let i = 0; i < checkedItem.length; i++) {
                const element = checkedItem[i];
                let id = element.id;
                id = id.replace(`entre`, ``);
                entreprisesToDelete.push(id);
            }
            let url = `/api/entreprises?action=delete&entitede=NULL`;
            for (let j = 0; j < entreprisesToDelete.length; j++) {
                const id = entreprisesToDelete[j];
                url += `&Ids[]=${id}`;
            }
            getApiDatas(url,(res) => {
                if (res.type == 'success') {
                        let modal = $(`.ui.modal.UserMessage`);
                        let modalEl = document.querySelector(`.ui.modal.UserMessage`);
                        let type = `success`;
                        let content = res.message;
                        showModal(modal, modalEl, type, content);
                        getEntreprises('/api/entreprises?page=1&entitede=NULL', createTableEntreprise);
                }
            });
        }
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
        idAdminToAdd = id;
    }
    //#endregion
    //#region : selections
    
    const submitEntrInfo = document.querySelector("#submitEntrInfo");
    const addAdminBtns = document.querySelectorAll(".addAdminBtn");
    let contentCommune = [];
    let idAdminToAdd;
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

            Change a few things up and try submitting again.
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
     //#endregion
})()