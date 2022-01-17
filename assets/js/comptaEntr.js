(function () {
    let pagiEntreprise = 0;
    //#region : usual

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
    const createTableEntreprise = (response) => {
        let entreprises = response.datas;
        
        if(entreprises == undefined ||entreprises.length < 1){
            entreprisesList.innerHTML = `<td colspan="5">Aucune entreprise</td>`;
            return;
        }
        else {
            pagesEntreprises = response.pages;
            pageEntrepriseActuelle =  response.page;
            pagesEntreprises = parseInt(pagesEntreprises);
            pageEntrepriseActuelle = parseInt(pageEntrepriseActuelle);
            let nombreEntreprise = entreprises.length;
            entreprisesList.innerHTML = "";
            for (let i = 0; i < entreprises.length; i++) {
                const element = entreprises[i];
                const row = document.createElement('tr');
                const cellCheck = document.createElement(`td`);
                cellCheck.classList.add(`collapsing`);
                cellCheck.innerHTML = `<div class="ui fitted slider checkbox"></div>`;
                    
                const divCheck = cellCheck.children[0];
                const radio = document.createElement(`input`);
                const label = document.createElement(`label`);
                radio.type = `checkbox`;
                radio.name = `entre`+element.idEntreprise ;
                radio.id = `entre`+element.idEntreprise ;
                //radio.addEventListener(`click`, );
                divCheck.appendChild(radio);
                divCheck.appendChild(label);
                cellCheck.appendChild(divCheck);
                
                const codeEntreprise = document.createElement(`td`);
                codeEntreprise.innerHTML = `${element.SCodeEntreprise}`;
                const nomEntreprise = document.createElement(`td`);
                nomEntreprise.innerHTML = element.SNomEntreprise;
                const typeEntreprise = document.createElement(`td`);
                typeEntreprise.innerHTML = element.TypeEntreprise;
                const actionsCell = document.createElement(`td`);
                actionsCell.classList.add(`collapsing`);
                const vueBtn = document.createElement(`button`);
                vueBtn.classList.add(`ui`);
                vueBtn.classList.add(`basic`);
                vueBtn.classList.add(`icon`);
                vueBtn.classList.add(`button`);
                vueBtn.id = `vue`+element.idEntreprise;
                //ajouter ecouteur d'evenement
                vueBtn.addEventListener(`click`, showEntrepriseDetails);
                vueBtn.innerHTML = `<i class="blue search plus icon"></i>`;
                const editBtn = document.createElement(`button`);
                editBtn.classList.add(`ui`);
                editBtn.classList.add(`basic`);
                editBtn.classList.add(`icon`);
                editBtn.classList.add(`button`);
                //ajouter ecouteur d'evenement
                //editBtn.addEventListener(`click`, editEntreprise);
                editBtn.innerHTML = `<i class="ui green edit icon"></i>`;
                editBtn.id = `edit`+element.idEntreprise;
                actionsCell.appendChild(vueBtn);
                actionsCell.appendChild(editBtn);
                row.appendChild(cellCheck);
                row.appendChild(codeEntreprise);
                row.appendChild(nomEntreprise);
                row.appendChild(typeEntreprise);
                row.appendChild(actionsCell);
                entreprisesList.appendChild(row);
            }
            const entreprisePageNumber = document.querySelector(`#entreprisePageNumber`);
            entreprisePageNumber.innerHTML = pageEntrepriseActuelle;
            const allEntreprisePageNumber = document.querySelector(`#allEntreprisePageNumber`);
            allEntreprisePageNumber.innerHTML = pagesEntreprises;
        }
                  
    }
    const createTableEntite = (response) => {
        let entites = response.datas;
        if(entites == undefined || entites.length < 1) {
            entitesList.innerHTML = `<td colspan="5">Aucune entreprise</td>`
        }
        else {
            entitesList.innerHTML = "";
            pagesEntites = response.pages;
            pageEntiteActuelle =  response.page;
            pagesEntites = parseInt(pagesEntites);
            pageEntiteActuelle = parseInt(pageEntiteActuelle);
            for (let i = 0; i < entites.length; i++) {
                const element = entites[i];
                const row = document.createElement('tr');
                    const cellCheck = document.createElement(`td`);
                    cellCheck.classList.add(`collapsing`);
                    cellCheck.innerHTML = `<div class="ui fitted slider checkbox">
                    <input type="checkbox" name="enti${element.idEntreprise}" id="enti${element.idEntreprise}"> <label></label>
                    </div>`
                    const codeEntreprise = document.createElement(`td`);
                    codeEntreprise.innerHTML = `${element.SCodeEntreprise}`;
                    const nomEntreprise = document.createElement(`td`);
                    nomEntreprise.innerHTML = element.SNomEntreprise;
                    const typeEntreprise = document.createElement(`td`);
                    let entrepriseFound = contentEntreprise.find(x => x.descriptions.match(element.entitede));
                    
                    typeEntreprise.innerHTML = entrepriseFound != undefined? entrepriseFound.title : "Aucune entreprise mère";
                    const actionsCell = document.createElement(`td`);
                    actionsCell.classList.add(`collapsing`);
                    const vueBtn = document.createElement(`button`);
                    vueBtn.classList.add(`ui`);
                    vueBtn.classList.add(`basic`);
                    vueBtn.classList.add(`icon`);
                    vueBtn.classList.add(`button`);
                    vueBtn.id = `vue_`+element.idEntreprise;
                    //ajouter ecouteur d'evenement
                    vueBtn.addEventListener(`click`, showEntiteDetails);
                    vueBtn.innerHTML = `<i class="blue search plus icon"></i>`;
                    const editBtn = document.createElement(`button`);
                    editBtn.classList.add(`ui`);
                    editBtn.classList.add(`basic`);
                    editBtn.classList.add(`icon`);
                    editBtn.classList.add(`button`);
                    //ajouter ecouteur d'evenement
                    //editBtn.addEventListener(`click`, editEntreprise);
                    editBtn.innerHTML = `<i class="ui green edit icon"></i>`;
                    editBtn.id = `edit_`+element.idEntreprise;
                    actionsCell.appendChild(vueBtn);
                    actionsCell.appendChild(editBtn);
                    row.appendChild(cellCheck);
                    row.appendChild(codeEntreprise);
                    row.appendChild(nomEntreprise);
                    row.appendChild(typeEntreprise);
                    row.appendChild(actionsCell);
                    entitesList.appendChild(row);
            }
            const entitePageNumber = document.querySelector(`#entitePageNumber`);
            entitePageNumber.innerHTML = pageEntiteActuelle;
            const allEntitePageNumber = document.querySelector(`#allEntitePageNumber`);
            allEntitePageNumber.innerHTML = pagesEntites;
        }
             
    }
    const getApiDatas = (url, callBack) => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', url);
        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    let res;
                    try {
                        res = JSON.parse(xhr.responseText)
                    } catch (error) {
                        res = [];
                    }
                    callBack(res);
                }
            }
        }
        xhr.send();
    }
    const getAllEntreprises =  (url) => {
        getApiDatas(url, (res) => {
            if (res.type == 'success') {
                let results = [];
                let datas = res.datas.entreprises;
                if(datas) {
                    for (let i = 0; i < datas.length; i++) {
                        const data = datas[i];
                        const content = {
                            title: data.SNomEntreprise,
                            descriptions:data.idEntreprise
                        }
                        results.push(content);
                    }
                    contentEntreprise = results;
                    $(`.ui.search.entreprise`).search({
                        source: contentEntreprise
                    });
                }
            }
            else {
                contentEntreprise = [];
            }
        });
        

        //let results = [];
        
    }
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
                        const content = {
                            title: data.commune,
                            id: data.idCommune
                        }
                        results.push(content);
                    }
                    contentCommune = results;
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
                        let modal = $(`.ui.modal.UserMessage`);
                        let modalEl = document.querySelector(`.ui.modal.UserMessage`);
                        let type = `success`;
                        let content = `Entreprise ajoutée avec succès`
                        showModal(modal, modalEl, type, content);
                        getAllEntreprises('/api/entreprises');
                        getEntreprises('/api/entreprises?page=1&entitede=NULL', createTableEntreprise);
                        getEntreprises('/api/entreprises?page=1&entitede=NOT_NULL', createTableEntite);
                    }
                    else if(res.type == `error`){
                        let modal = $(`.ui.modal.UserMessage`);
                        let modalEl = document.querySelector(`.ui.modal.UserMessage`);
                        let type = `error`;
                        let content = res.message;
                        showModal(modal, modalEl, type, content);
                    }
                }
                else {
                    let modal = $(`.ui.modal.UserMessage`);
                    let modalEl = document.querySelector(`.ui.modal.UserMessage`);
                    let type = `error`;
                    let content = `Impossible d'atteindre la base de donnée`;
                    showModal(modal, modalEl, type, content);
                    getAllEntreprises('/api/entreprises');
                }
            }
        }
        xhr.send(form);
    }
    const getEntreprises = (url, callBack) => {
        const xhr = new XMLHttpRequest();
        getApiDatas(url, callBack);
    }

    //#endregion
    //#region : listenner
    const showEntrepriseForm = (e) => {
        e.preventDefault();
        $(`.ui.modal.entrepriseForm`).modal(`show`);
        $('.ui.search.communeEntr')
        .search({
            source: contentCommune
        });
    }
    const addEntite = (e) => {
        e.preventDefault();
        $(`.ui.modal.entiteForm`).modal(`show`);
        $('.ui.search.entr')
        .search({
            source: contentEntreprise
        });
        $('.ui.search.commune')
        .search({
            source: contentCommune
        });
;
    }
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
    const submitEntity = (e) => {
        e.preventDefault();
        const inputs = newEntityForm.querySelectorAll('input');
        let formData = new FormData();
        for (let i = 0; i < inputs.length; i++) {
            let dataLenght = 0;
            const element = inputs[i];
            if(element.name == "commune") {
                getCommuneIdByName(`/api/communes?commune=${element.value.trim()}`, (res) => {
                    
                    if (res.type === `success`) {
                        if (res.datas.length > 0) {
                            formData.append('commune_idCommune', res.datas[0].idCommune);
                            let entries = 0;
                            for(let pair of formData.entries()) {
                                entries++;
                            }
                            if (entries < 8) {
                                $(`.ui.modal.entiteForm`).modal(`close`);
                                return;
                            }
                            createToDB('/api/entreprises', formData);
                        }
                        else {
                            let modal = $(`.ui.modal.UserMessage`);
                            let modalEl = document.querySelector(`.ui.modal.UserMessage`);
                            let type = `error`;
                            let content = `Commune inexistante dans la base de données`;
                            showModal(modal, modalEl, type, content);
                            return;
                        }
                    }
                    else {
                        let modal = $(`.ui.modal.UserMessage`);
                        let modalEl = document.querySelector(`.ui.modal.UserMessage`);
                        let type = `error`;
                        let content = `Problème interne dans la base de données`;
                        showModal(modal, modalEl, type, content);
                        return;
                    }
                } )
                continue;
            }
            else if(element.name == "entitede") {
                getIdByName(`/api/entreprises?SNomEntreprise=${element.value.trim()}`, (res) => {
                    
                    if (res.type != `success`) {
                        let modal = $(`.ui.modal.UserMessage`);
                        let modalEl = document.querySelector(`.ui.modal.UserMessage`);
                        let type = `error`;
                        let content = res.message;
                        showModal(modal, modalEl, type, content);
                        return;
                    }
                    else {
                        if (res.datas) {
                            if (res.datas.length < 1) {
                                let modal = $(`.ui.modal.UserMessage`);
                                let modalEl = document.querySelector(`.ui.modal.UserMessage`);
                                let type = `error`;
                                let content = "Le nom de l'Entreprise est incorrect";
                                showModal(modal, modalEl, type, content);
                                return;
                            }
                            else {
                                formData.append('entitede', res.datas[0].idEntreprise);
                            }
                        }
                    }
                   
                } )
            }
            else {
                formData.append(element.name, element.value);
            }
        }
    }
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
    const deleteEntite = (e) => {
        e.preventDefault();
        let checks = entitesList.querySelectorAll(`input[type="checkbox"]`);
        let checkedItem = [];
        for (let i = 0; i < checks.length; i++) {
            const element = checks[i];
            if (element.checked) {
                checkedItem.push(element);
            }
        }
        if (checkedItem.length > 0) {
            entitesToDelete = [];
            for (let i = 0; i < checkedItem.length; i++) {
                const element = checkedItem[i];
                let id = element.id;
                id = id.replace(`enti`, ``);
                entitesToDelete.push(id);
            }
            let url = `/api/entreprises?action=delete&entitede=NOT_NULL`;
            for (let j = 0; j < entitesToDelete.length; j++) {
                const id = entitesToDelete[j];
                url += `&Ids[]=${id}`;
            }
            getApiDatas(url,(res) => {
                if (res.type == 'success') {
                        let modal = $(`.ui.modal.UserMessage`);
                        let modalEl = document.querySelector(`.ui.modal.UserMessage`);
                        let type = `success`;
                        let content = res.message;
                        showModal(modal, modalEl, type, content);
                        getEntreprises('/api/entreprises?page=1&entitede=NOT_NULL', createTableEntite);
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
    const showEntiteDetails = (e) => {
        e.preventDefault();
        const target = e.currentTarget;
        let id = target.id;
        id = id.replace(`vue_`, ``);
        id = id.trim();
        getApiDatas(`/api/entreprises?idEntreprise=${id}`, (res) => {
            if (res.type == `success`) {
                let modal = $(`.ui.modal.details`);
                let modalEl = document.querySelector(`.ui.modal.details`);
                let header = modalEl.querySelector(`.header`);
                header.innerHTML = `Details de l'Entité`;
                let grid = modalEl.querySelector(`.content`).firstElementChild;
                grid.innerHTML = "";
                let i = 0;
                let entreKeys = [`Id`, `Code`, `Nom`, `Responsable`, `Type`, `Numéro d'adresse`, `Rue`, `Téléphone`, 'e-mail', 'Début des activités', 'Début de la comptabilité','Entreprise', 'Commune', 'Nombre de jour par Semaine', "Nombre d'heure par jour"];
                
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
                    div1.innerHTML = `Entreprise`;
                    let entr = contentEntreprise.find(x=>x.descriptions == res.datas[key]);
                    div2.innerHTML = entr?entr.title : "Aucune commune mensionnée";
                   }
                   else if(key == `NIF`) {
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
    const showEntiteDetailsByInput = (e) => {
        e.preventDefault();
        const target = e.currentTarget;
        let name = searchEntity.value.trim();
        let nameFound = contentEntite.find(x=>x.title == name);
        if (nameFound == undefined) {
            return;
        }
        getApiDatas(`/api/entreprises?SNomEntreprise=${name}`, (res) => {
            if (res.type == `success`) {
                let modal = $(`.ui.modal.details`);
                let modalEl = document.querySelector(`.ui.modal.details`);
                let header = modalEl.querySelector(`.header`);
                header.innerHTML = `Details de l'Entité`;
                let grid = modalEl.querySelector(`.content`).firstElementChild;
                grid.innerHTML = "";
                let i = 0;
                let entreKeys = [`Id`, `Code`, `Nom`, `Responsable`, `Type`, `Numéro d'adresse`, `Rue`, `Téléphone`, 'e-mail', 'Début des activités', 'Début de la comptabilité','Entreprise', 'Commune', 'Nombre de jour par Semaine', "Nombre d'heure par jour"];
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
                    div1.innerHTML = `Entreprise`;
                    let entr = contentEntreprise.find(x=>x.descriptions == res.datas[0][key]);
                    div2.innerHTML = entr?entr.title : "Aucune commune mensionnée";
                   }
                   else if(key == `NIF`) {
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
            }
        });
    }
    //#endregion
    //#region : identification des elements dom
    
    const modalMessageBtn = document.querySelector(`#modalMessageBtn`);
    const entreprisesList = document.querySelector(`#entreprisesList`);
    const entitesList = document.querySelector(`#entitesList`);
    //const entreprisePagination = document.querySelector(`#entreprisePagination`);
    const addEntrepriseBtn = document.querySelector(`#addEntrepriseBtn`);

    //bouton de suppression d'entreprise
    const deleteEntrepriseBtn = document.querySelector(`#deleteEntrepriseBtn`);
    const addEntiteBtn = document.querySelector('#addEntiteBtn');
    const deleteEntiteBtn = document.querySelector(`#deleteEntiteBtn`);
    const dateInputs = document.querySelectorAll('input[type="date"]');
    const entreprisePaginationBtns = document.querySelector(`#entreprisePagination`).children;
    const entitePaginationBtns = document.querySelector(`#entitePagination`).children;
    let contentEntreprise = [];
    let contentEntite = [];
    let contentPays = [];
    let pageEntrepriseActuelle;
    let pagesEntreprises;
    let pageEntiteActuelle;
    let pagesEntites;
    let contentCommune = [];
    let entreprisesToDelete = [];
    let entitesToDelete = [];
    let entities;
    const newEntrepriseForm = document.querySelector('#newEntrepriseForm');
    const newEntityForm = document.querySelector('#newEntityForm');
    const submitEntrInfo = document.querySelector('#submitEntrInfo');
    const submitEntityInfo  = document.querySelector('#submitEntityInfo');
    const closeDetail = document.querySelector(`#closeDetail`);
    const searchEntreprise = document.querySelector(`#searchEntreprise`);
    const searchEntity = document.querySelector(`#searchEntity`);
    const searchEntityBtn = document.querySelector(`#searchEntityBtn`);
    const searchEntrepriseBtn = document.querySelector(`#searchEntrepriseBtn`);


    //#endregion
    //#region : code à executer au chargement
    //obtenir toutes les entreprises
    getAllEntreprises('/api/entreprises');
    getAllEntites('/api/entreprises');
    getEntreprises('/api/entreprises?page=1&entitede=NULL', createTableEntreprise);
    getEntreprises('/api/entreprises?page=1&entitede=NOT_NULL', createTableEntite);
    getAllCommunes('/api/communes');
  
    
    //#region : add event listenner
    if(addEntrepriseBtn) {
        addEntrepriseBtn.addEventListener(`click`, showEntrepriseForm);
    }
    if(addEntiteBtn) {
        addEntiteBtn.addEventListener('click', addEntite);
    }
    if(dateInputs) {
        for (let i = 0; i < dateInputs.length; i++) {
            const element = dateInputs[i];
            element.value = moment().format("YYYY-MM-DD");
        }
    }
    if(submitEntrInfo) {
        submitEntrInfo.addEventListener('click', submitEntreprise);
    }
    if (submitEntityInfo) {
        submitEntityInfo.addEventListener('click', submitEntity );
    }
    newEntrepriseForm.addEventListener('submit', (e) => {
        e.preventDefault();
    });
    newEntityForm.addEventListener('submit', (e) => {
        e.preventDefault();
    });
    modalMessageBtn.addEventListener(`click`, closeModal)
    if (entreprisePaginationBtns) {
        entreprisePaginationBtns[0].addEventListener(`click`, (e) => {
            e.preventDefault();
            if (pageEntrepriseActuelle <= 1) {
                return;
            }
            pageEntrepriseActuelle--;
            getEntreprises(`/api/entreprises?page=${pageEntrepriseActuelle}&entitede=NULL`, createTableEntreprise);
        });
        entreprisePaginationBtns[1].addEventListener(`click`, (e) => {
            e.preventDefault();
            if (pageEntrepriseActuelle >= pagesEntreprises) {
                return;
            }
            pageEntrepriseActuelle++;
            getEntreprises(`/api/entreprises?page=${pageEntrepriseActuelle}&entitede=NULL`, createTableEntreprise);
        })
    }
    
    if (entitePaginationBtns) {
        ;
        entitePaginationBtns[0].addEventListener(`click`, (e) => {
            e.preventDefault();
            if (pageEntiteActuelle <= 1) {
                return;
            }
            pageEntiteActuelle--;
            getEntreprises(`/api/entreprises?page=${pageEntiteActuelle}&entitede=NOT_NULL`, createTableEntite);
        });
        entitePaginationBtns[1].addEventListener(`click`, (e) => {
            e.preventDefault();
            if (pageEntiteActuelle >= pagesEntites) {
                return;
            }
            pageEntiteActuelle++;
            getEntreprises(`/api/entreprises?page=${pageEntiteActuelle}&entitede=NOT_NULL`, createTableEntite);
        })
    }
    deleteEntrepriseBtn.addEventListener(`click`, deleteEntreprise);
    deleteEntiteBtn.addEventListener(`click`, deleteEntite)
    closeDetail.addEventListener(`click`, closeModal);
    let listennerEntity;
    
    searchEntityBtn.addEventListener(`click`, showEntiteDetailsByInput);
    searchEntrepriseBtn.addEventListener(`click`, showEntrepriseDetailsByInput);
    //#endregion
})()