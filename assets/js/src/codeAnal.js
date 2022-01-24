(() => {
    const submitEntreprise = (e) => {
        e.preventDefault();
        const inputs = newEntrepriseForm.querySelectorAll('input');
        let formData = new FormData();
        for (let i = 0; i < inputs.length; i++) {
            const element = inputs[i];
            formData.append(element.name, element.value);
        }
        let today = moment().format("YYYY-MM--DD H:m:s");
        formData.append("DateAnal", today);
        createToDB('/api/codeAnal', formData)
        
    }
    const askDeleteConfirmation = (e) => {
        e.preventDefault();
        let btn = e.currentTarget;
        let id = btn.getAttribute("identifiant");
        id = id?id.trim() : undefined;
        if (!id) {
            return;
        }
        idEntreToRemove = id;
        getApiDatas(`/api/codeAnal?id=${id}`, (res) => {
            let nameEntreprise = res.datas.DesiAnal;
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
        getApiDatas(`/api/codeAnal?id=${idEntreToRemove}&action=delete`, showAlert);
        //
    }
    const editEntreprise = (e) => {
        e.preventDefault();
        let btn = e.currentTarget;
        let id = btn.getAttribute("identifiant");
        id = id?id.trim() : undefined;
        if (!id) {
            return;
        }
        entrepriseId = id;
        const editEntrForm = document.querySelector("#editEntrForm");
        const inputs = editEntrForm.querySelectorAll("input");
        getApiDatas(`/api/codeAnal?id=${id}`, (res) => {
            let codeEntreprise = res.datas.DesiAnal;
            inputs[0].value = codeEntreprise;
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
            let value = element.value;
            value = value.trim();
            if (value == "") {
                return;
                //a completer
            }
            formData.append(name, value);
        }
        postApiDatas(`/api/codeAnal?id=${entrepriseId}`, formData, (res) => {
            showAlert(res);
        })
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
    //#region : selections
    
    const submitEntrInfo = document.querySelector("#submitEntrInfo");
    const addAdminBtns = document.querySelectorAll(".addAdminBtn");
    let contentCommune = [];
    let entrepriseId;
    const deleteEntrBtns = document.querySelectorAll(".deleteEntrBtn");
    const destroyEntrBtn = document.querySelector("#destroyEntrBtn");
    const editEntrBtns = document.querySelectorAll(".editEntrBtn");
    const confirmEntrEditionBtn = document.querySelector("#confirmEntrEditionBtn");
    let idEntreToRemove;
    //verifier si l'entreprise est connecte
    
    //#endregion
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