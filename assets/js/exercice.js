(function() {
    //#region : usual functions
    const displayMoveDetails = (result) => {
        console.log(result);
        const moveDetails = document.querySelector(`.ui.modal.moveDetails`);
        const content = moveDetails.querySelector(`.content`);
        content.innerHTML = ``;
        let compte = result.corps.CCompte != null ? result.corps.CCompte : result.corps.DCompte;
        let cDivi = result.corps.CDivisionnaire;
        let montant = result.corps.CMontant != null ? result.corps.CMontant : result.corps.DMontant;

        content.innerHTML = `
        <div class="ui two column grid">
            <div class="column">Date du Mouvement</div>
            <div class="column">${result.entetes.DateMouv}</div>
            <div class="column">Date de l'opération</div>
            <div class="column">${result.entetes.DateOper}</div>
            <div class="column">Exercice</div>
            <div class="column">${result.entetes.Exercice}</div>
            <div class="column">Taux appliqué</div>
            <div class="column">${result.entetes.TauxApp}</div>
            <div class="column">Utilisateur</div>
            <div class="column">${result.userName.nom}</div>
            <div class="column">Journal</div>
            <div class="column">${result.journal.NomJournal}</div>
            <div class="column">Compte opération</div>
            <div class="column">${compte}</div>
            <div class="column">Compte divisionnaire</div>
            <div class="column">${cDivi}</div>
            <div class="column">Solde au débit</div>
            <div class="column">${result.corps.DSolde}</div>
            <div class="column">Imputation</div>
            <div class="column">${result.corps.Imputation}</div>
            <div class="column">Libellé</div>
            <div class="column">${result.corps.Libelle}</div>
            <div class="column">Sous compte</div>
            <div class="column">${result.corps.SCompte}</div>
            
        </div>
        `;
        $(`.ui.modal.moveDetails`).modal('show');
    }
    const createTableMove = (dataToShow) => {
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
        let start = (pageActuelle * 10) - 10;
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
        if (number === 0) {
            let row = document.createElement(`tr`);
            row.innerHTML = `
                <td></td>
                <td colspan="7">
                    Aucun Mouvement ne correspond à l'exercice demandé
                </td>
            `;
            passedMovesList.appendChild(row);
        }
        for (let index = start; index < end; index++) {
            const dataRow = dataToShow[index];
            let row = document.createElement('tr');
            const checkMove = document.createElement('input');
            checkMove.type = 'checkbox';
            checkMove.id = dataRow.idCorpMouv;
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
            let dateCell = document.createElement('td');
            dateCell.innerHTML = dataRow.DateMouv;
            let codeJournalCell = document.createElement('td');
            codeJournalCell.innerHTML = dataRow.CategorieJournaux_idCategorieJournaux;
            let caCell = document.createElement('td');
            caCell.innerHTML = dataRow.T6_CodeAnal;
            let impCell = document.createElement('td');
            impCell.innerHTML = dataRow.Imputation;
            let compteCell = document.createElement('td');
            compteCell.innerHTML = dataRow.compte;

            let montantCell = document.createElement('td');
            montantCell.innerHTML = dataRow.montant;
            row.appendChild(dateCell);
            row.appendChild(codeJournalCell);
            row.appendChild(caCell);
            row.appendChild(impCell);
            row.appendChild(compteCell);
            row.appendChild(montantCell);
            const actionCell = document.createElement('td');
            actionCell.classList.add('text-center');
            const actioBtn = document.createElement('button');
            actioBtn.classList.add('ui');
            actioBtn.classList.add('basic');
            //actioBtn.classList.add('blue');
            actioBtn.classList.add('icon');
            actioBtn.classList.add('button');
            actioBtn.innerHTML = `<i class="search plus blue icon"></i>`;
            actioBtn.id = `${dataRow.idCorpMouv}`;
            actioBtn.addEventListener('click', showMoveDetails)
            actionCell.appendChild(actioBtn);
            actionCell.classList.add('center');
            actionCell.classList.add('aligned');
            row.appendChild(actionCell);
            passedMovesList.appendChild(row);
            
        }
        
    } 
    const changeInputValue = (origin, target, source) => {
        origin.value = origin.value.trim();
        for (let i = 0; i < source.length; i++) {
            const element = source[i];
            if (origin.value === element.title.trim()) {
                target.value = element.description.trim();
            }
        }
    }
    const showMoveList = () => {
        const movesHttp = new XMLHttpRequest();
        movesHttp.open('GET', '/api/moves');
        movesHttp.onreadystatechange = () => {
            if(movesHttp.readyState == 4) {
               if(movesHttp.status == 200) {
                   try {
                       let res = movesHttp.responseText;
                       exercicesData = JSON.parse(res);
                       showExercices(exercicesData);
                       
                   } catch (error) {
                    console.log(error)
                   }
                   
               }
            }
        }
        movesHttp.send();
    }
    const getMoveDetails = (id) => {
        const xhr = new XMLHttpRequest();
        xhr.open('GET', `/api/mouvements?idCorpMouv=${id}`);
        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4) {
                if (xhr.status == 200) {
                    let res = xhr.responseText;
                    try {
                        res = JSON.parse(res);
                    } catch (error) {
                        console.log(error);
                        return;
                    }
                    let result = res.datas[0];
                    if(res.type) {
                        if (res.type == 'success' ) {
                            displayMoveDetails(result);
                        }
                    }
                }
            }
        }
        xhr.send();
    }
    //#endregion
    //#region : listenner

    const loadPage = (e) => {
        passedMoves.style.display = "none";
        newMove.style.display = "block";
    }
    const backToMovesList = (e) => {
        passedMoves.style.display = "block";
        newMove.style.display = "none";
        showMoveList();
    }
    const fillCA = () => {
        libeles = document.querySelectorAll('.libele');
        const caFinder = new XMLHttpRequest();
        caFinder.open('GET', `/codeAnal?value=${codeAnal.value}`)
        caFinder.onreadystatechange = () => {
            if(caFinder.readyState == 4) {
                if(caFinder.status == 200) {
                    let res = JSON.parse(caFinder.responseText);
                    if(res.status == 200) {
                        
                        for (let i = 0; i < libeles.length; i++) {
                            const element = libeles[i];
                            element.value = res.body.DesiAnal;
                            
                        }
                    }
                   
                }
            }
        }
        caFinder.send();
    }
    
    const saveMove = (e) => {
        e.preventDefault();
        if(montantGlobal.value === "") {
            return;
        }
        const ca = document.querySelector('#ca');
        //#region : recuperation des entetes
        for (let i = 0; i < headerInputs.length; i++) {
            const champ = headerInputs[i];
            headerMove[`${champ.name}`] = champ.value;
        }
        //#endregion
        let move = {};
        move.ca = ca.value;
        let data = new FormData();
        let actions = [];
        actions = addNewAction(actions, moveDivs);
        for (let j = 0; j < actions.length; j++) {
            const inputs = actions[j];
            move[`trans${j+1}`] = {};
            for (let k = 0; k < inputs.length; k++) {
                const input = inputs[k];
                let trans = move[`trans${j+1}`];
                trans[`${input.name}`] = input.value;
            }
        }
        let fullMove = {};
        fullMove.head = headerMove;
        fullMove.body = move;
        let moveString = JSON.stringify(fullMove);
        data.append("move", moveString);
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "/addMove");
        xhr.onreadystatechange = () => {
            if(xhr.readyState == 4) {
                if(xhr.status == 200) {
                    let resp = xhr.responseText;
                    //let message = JSON.parse(resp);
                   console.log(resp);
                }
            }
        }
        xhr.send(data);
        let allNewInputs = newMove.querySelectorAll('input');
        for (let m = 0; m < allNewInputs.length; m++) {
            const element = allNewInputs[m];
            if (element.classList.contains('notToErase') || element.classList.contains('libele') ) {
                if (element.id === 'numMouv') {
                    element.value = parseInt(element.value) + 1;
                }
                continue;
            }
            element.value = "";
        }

    }
    const somme = (e) => {
        debitInputs = document.querySelectorAll('.debitValue');
        creditInputs = document.querySelectorAll(".creditValue");
        const montantCredit = document.querySelector('#montantCredit');
        const montantDebit = document.querySelector('#montantDebit');
        let sommeD = 0;
        let sommeC = 0;
        for (let i = 0; i < debitInputs.length; i++) {

            const element = debitInputs[i];
            try {
                sommeD += element.value === "" ? 0 :  parseFloat(element.value);
            } catch (error) {
                sommeD = 0
            }
            
        }
        for (let i = 0; i < creditInputs.length; i++) {

            const element = creditInputs[i];
            try {
                sommeC += element.value === "" ? 0 :  parseFloat(element.value);
            } catch (error) {
                sommeC = 0
            }
            
        }
        montantDebit.value = sommeD.toString();
        montantCredit.value = sommeC.toString();

        if(sommeC === sommeD) {
            for(let i = 0; i < radios.length ; i++) {
                const radio = radios[i];
                if(radio.id === "fc" && radio.checked) {
                    montantGlobal.value = sommeC;
                }
                else if(radio.id === "usd" && radio.checked) {
                    montantGlobal.value = sommeC * allTaux[1].value;
                   
                }
                else if(radio.id === "euro" && radio.checked) {
                    montantGlobal.value = sommeC * allTaux[1].value;
                }
            }
            
        }
        else {
            montantGlobal.value = ""
        }
    }
    const addNewMove = (e) => {
        e.preventDefault();
        const moves = document.querySelector('#moves');
        const lastMove = moves.lastElementChild;
        let lastId = lastMove.id;
        let indexStart = lastId.indexOf('e');
        let numeroString = lastId.substr(indexStart + 1);
        let numero;
        try {
            numero = parseInt(numeroString);
        } catch (error) {
            numero = 0;
        }
       
        let newMove = document.createElement('tr');
        newMove.id = `move${numero + 1}`;
        newMove.innerHTML = lastMove.innerHTML;
        moves.appendChild(newMove);
        
        let debitInput = newMove.querySelector('.debitValue');
        let creditInput = newMove.querySelector('.creditValue');
        let lastLibele = lastMove.querySelector('.libele');
        let libele = newMove.querySelector('.libele');
        debitInput.addEventListener('keyup', somme);
        creditInput.addEventListener('keyup', somme);
        libele.value = lastLibele.value;

        let compte = newMove.children[0].children[1];
        for (let j = 0; j < compte.classList.length; j++) {
            const item =  compte.classList[j];
            if(item.search(/file\B/) > -1) {
                wab$(compte, item);
            }
        }
        fillCA();
       
    }
    const checkNumericValue = (e) => {
        const input = e.currentTarget;
        let value = e.key;
        let condition = /[\d]/;
        if(value == "Backspace" || value.search(condition) == 0 || value==".") {

        }
        else {
            e.preventDefault();
        }
        
    }
    const checkKey = (e) => {
        let inputMove = e.currentTarget;
        let selectMove = inputMove.parentElement.parentElement.querySelector("select");
        if(selectMove.value === "D" && inputMove.classList.contains('creditValue')) {
            e.preventDefault();
            return;
        }
        else if (selectMove.value === "C" && inputMove.classList.contains('debitValue')) {
            
            e.preventDefault();
            return;
        }
        let value = e.key;
        let condition = /[\d]/;
        if(value == "Backspace" || value.search(condition) == 0 || value==".") {

        }
        else {
            e.preventDefault();
        }
    }
    const showMoveDetails = (e) => {
        const btnDetails = e.currentTarget;
        getMoveDetails(btnDetails.id);
    }
    const showExercices = (_datas, callBackSort) => {
        passedMovesList.innerHTML = "";
        let headers = _datas.headers;
        let bodies = _datas.moves;
        if(headers.length < 1) {
            passedMovesList.innerHTML = `<tr><td colspan=8><h3 class="text-center">Aucun Mouvement Correspondant</h3></td></tr>`
        }
        let dataToShow = [];
        for (let i = 0; i < bodies.length; i++) {
            const element = bodies[i];
            let  elementHeader;
            for (let j = 0; j < headers.length; j++) {
                const head = headers[j];
                
                if(element.NumMouv == head.idEnteteMouv) {
                elementHeader = head;
                break;
                }
            }
            if(elementHeader == null) {
                continue;
            }
            let dataRow = {};
            dataRow.idCorpMouv = element.idCorpMouv;
            dataRow.DateMouv = elementHeader.DateMouv;
            dataRow.CategorieJournaux_idCategorieJournaux = elementHeader.CategorieJournaux_idCategorieJournaux;
            dataRow.T6_CodeAnal = element.T6_CodeAnal;
            dataRow.Imputation = element.Imputation;
            dataRow.compte = element.CCompte == null ? element.DCompte : element.CCompte;
            dataRow.montant = element.CMontant == null ? element.DMontant : element.CMontant;
            dataToShow.push(dataRow);
        }
        if (callBackSort) {
            dataToShow = callBackSort(dataToShow);
        }
        createTableMove(dataToShow);
        
    }
    const selectLike = (criteres, _datas) => {
        let trueDatas = [];
        for(critere in criteres) {
            for(item in _datas) {
                if(_datas[item][critere].search(criteres[critere]) > -1) {
                    trueDatas.push(_datas[item]);
                }
            }
        }
        return trueDatas;
    }
    const changeDesignationCompte = (e) => {
        const compteOpe = e.currentTarget;
        const designation =compteOpe.parentElement.nextElementSibling.children[0];
        changeInputValue(compteOpe, designation, compteAndDesignation )
    }
    
    
    const addNewAction = (actions, moveDivs) => {
        actions = [];
        moveDivs = document.querySelectorAll("#moves > div");
        for (let i = 0; i < moveDivs.length; i++) {
            const moveDiv = moveDivs[i];
            const element = moveDiv.querySelectorAll("input, select");
            actions.push(element);
        }
        
        return actions;
    }
    const sortMoveDatas = (e) => {
        e.preventDefault();
        const select = e.currentTarget;
        
        if (select != null) {
            showExercices(exercicesData,(dataToShow) => {
                let value = sortMove.value;
                switch (value) {
                    case "date": 
                      if (sens) {
                        dataToShow.sort((x,b) => x.DateMouv > b.DateMouv ? -1 : 1);
                        
                       }
                       else {
                       
                        dataToShow.sort((x,b) => x.DateMouv < b.DateMouv ? -1 : 1);
                        console.log(dataToShow)
                       }
                        break;
                    
                    case "cj": {
                        if (sens) {
                         dataToShow.sort((x,b) => {
                             return x.CategorieJournaux_idCategorieJournaux > b.CategorieJournaux_idCategorieJournaux ? -1 : 1;
                         });
                        }
                        else {
                         dataToShow.sort((x,b) => {
                             return x.CategorieJournaux_idCategorieJournaux < b.CategorieJournaux_idCategorieJournaux ? -1 : 1;
                         });
                        }
                         break;
                     }
                     case "ca": {
                        if (sens) {
                         dataToShow.sort((x,b) => {
                             return x.T6_CodeAnal > b.T6_CodeAnal ? -1 : 1;
                         });
                        }
                        else {
                         dataToShow.sort((x,b) => {
                             return x.T6_CodeAnal < b.T6_CodeAnal ? -1 : 1;
                         });
                        }
                         break;
                     }
                    default:
                            break;
                }
                //console.log(dataToShow);
                return dataToShow;
            } );
        }
    }
    const sortMoveWithBtn = (e) => {
        e.preventDefault();
        const select = e.currentTarget;
        if (select.id === "sortSens") {
            sens = sens ? false : true;
            select.innerHTML = select.innerHTML === `<i class="angle down icon"></i>`? `<i class="angle up icon"></i>` : `<i class="angle down icon"></i>`;
        }
        if (select != null) {
            showExercices(exercicesData,(dataToShow) => {
                let value = sortMove.value;
                switch (value) {
                    case "date": 
                      if (sens) {
                        dataToShow.sort((x,b) => x.DateMouv > b.DateMouv ? -1 : 1);
                        
                       }
                       else {
                       
                        dataToShow.sort((x,b) => x.DateMouv < b.DateMouv ? -1 : 1);
                        
                       }
                        break;
                    
                    case "cj": {
                        if (sens) {
                         dataToShow.sort((x,b) => {
                             return x.CategorieJournaux_idCategorieJournaux > b.CategorieJournaux_idCategorieJournaux ? -1 : 1;
                         });
                        }
                        else {
                         dataToShow.sort((x,b) => {
                             return x.CategorieJournaux_idCategorieJournaux < b.CategorieJournaux_idCategorieJournaux ? -1 : 1;
                         });
                        }
                         break;
                     }
                     case "ca": {
                        if (sens) {
                         dataToShow.sort((x,b) => {
                             return x.T6_CodeAnal > b.T6_CodeAnal ? -1 : 1;
                         });
                        }
                        else {
                         dataToShow.sort((x,b) => {
                             return x.T6_CodeAnal < b.T6_CodeAnal ? -1 : 1;
                         });
                        }
                         break;
                     }
                    default:
                        if (sens) {
                            dataToShow.sort((x,b) => x.DateMouv > b.DateMouv ? -1 : 1);
                            
                           }
                           else {
                           
                            dataToShow.sort((x,b) => x.DateMouv < b.DateMouv ? -1 : 1);
                           }
                        break;
                }
                //console.log(dataToShow);
                return dataToShow;
            } );
        }
        
    }
    const selectMoveOfYear = (e) => {
        e.preventDefault();
        const yearOfExercice = e.currentTarget;
        showExercices(exercicesData, (dataToShow) => {
            let result = dataToShow.filter(data => data.DateMouv.match(yearOfExercice.value));
            return result;
        })
    }
    const selectMoveByJournal = (e) => {
        e.preventDefault();
        let select = e.currentTarget;
        let value = select.value;
        showExercices(exercicesData, (dataToShow) => {
            let result = dataToShow.filter(data => data.CategorieJournaux_idCategorieJournaux.match(value));
            return result;
        })
    }
    //#endregion
    //#region : selections des elements
    let exercicesData;
    let moveHeadersDatas;
    let planComptables;
    let pageActuelle = 1;
    let nombreDePage;
    let compteAndDesignation = [];
    let sens = true;
    const sortMove = document.querySelector('#sortMove');
    const sortSens = document.querySelector(`#sortSens`);
    const passedMoves = document.querySelector('#passedMoves');
    const addMove = document.querySelector("#addMove");
    const newMove = document.querySelector("#newMove");
    const moveForm = document.querySelector("#moveForm");
    let moveDivs = document.querySelectorAll("#moves > div");
    const moveHeaderForms = document.querySelectorAll("#headerMove form");
    const headerInputs = document.querySelectorAll("#headerMove input");
    const numeroMouv = document.querySelector("#numMouv");
    const chooseExercice = document.querySelector('#chooseExercice');
    const codeComptable = document.querySelector('#codeComptable');
    const addTransac = document.querySelector('#addTransac');
    let debitInputs = document.querySelectorAll('.debitValue');
    let creditInputs = document.querySelectorAll(".creditValue");
    const montantGlobal = document.querySelector("#montantGlobal");
    const codeAnal = document.querySelector("#ca");
    let libeles = document.querySelectorAll('.libele');
    let headerMove = {};
    const deviseChoice = document.querySelector("#deviseChoice");
    const radios = deviseChoice.querySelectorAll('input[type="radio"]');
    const allTaux = document.querySelectorAll('.taux');
    const passedMovesList = document.querySelector('#passedMoveList');
    const exercice = chooseExercice.querySelector('input');
    const journal = chooseExercice.querySelector('select');
    let compteOperations = document.querySelectorAll('.compteOperationCell input');
    const seeMoveBtn = document.querySelector('#seeMoveBtn');
    const prevMove = document.querySelector('#prevMove');
    const nextMove = document.querySelector('#nextMove');
    const closeDetail = document.querySelector(`.ui.modal.moveDetails button`)
    //#endregion
    //#region : operations diverses au chargement
    //#region : suppression de l'autocompletion PAR DEFAUT
    const champs = document.querySelectorAll("#newMove input");
    for (let index = 0; index < champs.length; index++) {
        const element = champs[index];
        element.autocomplete = "off";
        
    }
    //#endregion
    //#region : remplissage des champs dates
    for (let i = 0; i < champs.length; i++) {
        const element = champs[i];
        if(element.type == "date") {
            element.value = moment().format("YYYY-MM-DD");
        } 
    }
    //#endregion
    //#region : Chargement Des numero d'entetes
    const ajax = new XMLHttpRequest();
    ajax.open("GET", "/headerMove");
    ajax.onreadystatechange = () => {
        if(ajax.readyState == 4) {
            if(ajax.status == 200) {
                let res = ajax.responseText;
                numeroMouv.value = res;
            }
        }
    }
    ajax.send();
    //#endregion
    //#endregion
    //#region : set default exercice
     let anneeActuelle = moment().format('YYYY');
     exercice.max = anneeActuelle;
     exercice.value = anneeActuelle;
    //#endregion
    //#region : recuperations du code analytique
    
    fillCA();
    //#endregion
    //#region : charger les comptes operation
        
        (
            ()=> {
                const xhr = new XMLHttpRequest();
                xhr.open('GET', '/api/planComptables');
                xhr.onreadystatechange = () => {
                    if (xhr.readyState == 4) {
                        if (xhr.status == 200) {
                            let res;
                            try {
                                res = JSON.parse(xhr.responseText);
                            } catch (error) {
                                planComptables = [];
                                return;
                            }
                            if (res.type == "success") {
                                let datas = res.datas;
                                planComptables = datas;
                                for (let i = 0; i < datas.length; i++) {
                                    const element = datas[i];
                                    let sourceData = {
                                        title: element.CompteOperation,
                                        description: element.DesiOperation
                                    }
                                    compteAndDesignation.push(sourceData);
                                }
                            }
                            else {
                                planComptables = [];
                            }
                            
                        }
                    }
                }
                xhr.send()
            }
        )()
    //#endregion
    //#region afficher tous les mouvements passer
    //afficher tous les mouvements passer
   showMoveList();
    //#endregion
    //#region : autocmpletion
    const inputsToComplete = document.querySelectorAll(".toComplete");
        for (let i = 0; i < inputsToComplete.length; i++) {
        const element = inputsToComplete[i];
        for (let j = 0; j < element.classList.length; j++) {
            const item =  element.classList[j];
            if(item.search(/file\B/) > -1) {
                wab$(element, item);
            }
        }
    }
    //#endregion
    //#region : add events listenner
    addMove.addEventListener('click', loadPage);
    moveForm.addEventListener('submit', saveMove);
    for (let i = 0; i < moveHeaderForms.length; i++) {
        const form = moveHeaderForms[i];
        form.addEventListener('submit', (e) => {
            e.preventDefault();
        });
        
    }
    chooseExercice.addEventListener('submit', (e) => {
        e.preventDefault();
    });
    //ajouter un nouveau mouvement
    addTransac.addEventListener('click', addNewMove);
    deviseChoice.addEventListener('submit', (e) => {
        e.preventDefault();
        console.log(deviseChoice.nodeValue);
    });
    codeAnal.addEventListener('change', (e) => {
        fillCA();
    })
    //Faire la somme de tout les credits
    for (let m = 0; m < creditInputs.length; m++) {
        const element = creditInputs[m];
        element.addEventListener('keydown', checkKey)
        element.addEventListener('keyup', somme)
        
    }
    for (let m = 0; m < debitInputs.length; m++) {
        const element = debitInputs[m];
        element.addEventListener('keydown', checkKey)
        element.addEventListener('keyup', somme)
        
    }
    for (let index = 0; index < allTaux.length; index++) {
        const element = allTaux[index];
        element.addEventListener('keydown', checkNumericValue);
        
    }
    exercice.addEventListener('change', selectMoveOfYear);
    journal.addEventListener(`change`, selectMoveByJournal)
    for (let k = 0; k < compteOperations.length; k++) {
        const element = compteOperations[k];
        element.addEventListener('blur', changeDesignationCompte)
    }
    seeMoveBtn.addEventListener('click', backToMovesList);
    prevMove.addEventListener('click', (e) => {
        if (pageActuelle != 1) {
            pageActuelle--;
            showExercices(exercicesData);
        }
        e.preventDefault;
    })
    nextMove.addEventListener('click', (e) => {
        if (pageActuelle != nombreDePage) {
            pageActuelle++;
            showExercices(exercicesData);
        }
    })
    //fermer la boite donnat les details d'u mouvemet
    closeDetail.addEventListener(`click`, (e) => {
        e.preventDefault();
        $(`.ui.modal.moveDetails`).modal(`toggle`);
    })
    sortMove.addEventListener(`change`, sortMoveDatas)
    sortSens.addEventListener(`click`, sortMoveWithBtn)
    //#endregion
    //#region : remplissage du code journal
    
    //#endregion
})()