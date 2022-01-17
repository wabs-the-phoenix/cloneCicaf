(function() {
    //#region : events functions;
    //#endregion

    const findPageNumber = (userNbr, maxShownUser) => {
        if(isNaN(userNbr)) {
            return 1;
        }
        if(userNbr <= maxShownUser) {
            return 1;
        }
        else {
            let pageNumber = parseInt(userNbr/ maxShownUser);
            if(userNbr % maxShownUser > 0) {
                return pageNumber +1;
            } 
        }
    }
    const showUserByPage = (userItem, usersDiv, maxshown, page) => {
        let index = (maxshown * page)-maxshown;
        let limit = index + 9;
        for (let j = 0; j < userItem.length; j++) {
            if(j < index) {
                continue;
            }
            if(j > limit) {
                break;
            }
            const element = userItem[j];
            usersDiv.innerHTML += element;
            
        }
    }
    const showPagination = (pagination, userItem, usersDiv, maxPage, pageNumber) => {
        let btnPrev = document.createElement('button');
        let btnNext = document.createElement('button');
        btnPrev.innerHTML = '<i class="fas fa-chevron-circle-left color-primary fa-3x"></i>';
        btnPrev.classList.add('mg-r-8');
        btnPrev.classList.add('transparent');
        btnNext.innerHTML = '<i class="fas fa-chevron-circle-right color-primary fa-3x"></i>';
        btnNext.classList.add('mg-l-8');
        btnNext.classList.add('transparent');
        const divBtn = document.createElement('div');
        divBtn.classList.add('row');
        divBtn.classList.add('jst-center');
        divBtn.appendChild(btnPrev);
        divBtn.appendChild(btnNext);
        pagination.appendChild(divBtn);

        btnPrev.addEventListener('click', (e) => {
           if(pageNumber === 1) {
               console.log('is min');
           }
           else if(pageNumber > 1) {
                pageNumber--;
                let maxshown = 10;
                console.log(pageNumber);
                usersDiv.innerHTML = "";
                showUserByPage(userItem, usersDiv, maxshown, pageNumber);
           }
        });
        btnNext.addEventListener('click', (e) => {
            console.log(maxPage);
            if(pageNumber === maxPage) {
                console.log('is max');
            }
            else if(pageNumber < maxPage) {
                
            }
            else {
                pageNumber++;
                usersDiv.innerHTML = "";
                let maxshown = 10;
                usersDiv.innerHTML = "";
                showUserByPage(userItem, usersDiv, maxshown, pageNumber);
                console.log(pageNumber);
                
            }
         });
    }
    const checkFormEntries = (formular) => {
        for (let i = 0; i < formular.length; i++) {
            const element = formular[i];
            if(element.value === ''){
                return false;
            }
            
        }
        return true;
    }
    let userItem;
    const usersDiv = document.querySelector('#usersList');
    const entrepriseDiv = document.querySelector('#entreprisesList');
    const showModalAddUser = document.querySelector('#showModalAddUser');
    const modalAddUser = document.querySelector('#modalAddUser');
    const closeModalAddUser = document.querySelector('#closeModalAddUser');
    const addUserBtn = document.querySelector('#addUserBtn');
    const pagination = document.querySelector('#barPagUser');
    const barEtr = document.querySelector('#barEntreprise');
    let page = 1;
    let nbrePage;

    //les entrees de l'utilisateurs
    let inputsUser = [];
    const name = document.querySelector('#newUserName');
    const code = document.querySelector('#newUserCode');
    const role = document.querySelector('#newUserRole');
    const formUser = new FormData();

//#region  first region: code en executer au chargement

    /*
    *code permettant de charger les utilisateurs via un code
    ajax
    *
    */
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '/administration-datas', true);
    xhr.onreadystatechange = () => {
        if(xhr.readyState === 4) {
            let result = "";
            if (xhr.status === 200) {
                result += xhr.responseText;
                let users = JSON.parse(result);
                 userItem = [users.length];
                
                if(users.length <= 0) {
                    usersDiv.innerHTML = '<h1 class="text-center>"Aucun utilisateur</h2>';
                    return;
                }
                //#region affichages des utilisateurs
                for (let i = 0; i < users.length; i++) {
                    let user = users[i];
                    userItem[i] = "<tr>";
                        for(item in user) {
                            userItem[i] += item !== 'mpd' && item !== 'login'  && item !== 'idUser'? '<td>' + user[item] + '</td>': "";
                        }
                    userItem[i] += "</tr>";
                }
                let longueur = userItem.length;
                nbrePage  = findPageNumber(users.length, 10);
                showUserByPage(userItem, usersDiv, 10, 1);
                if(userItem.length > 10) {
                    showPagination(pagination, userItem, usersDiv, nbrePage, page);
                }
                //#endregion

            }
            else {
                let errorTitle = document.createElement('h1');
                errorTitle.innerHTML = "Aucun utilisateur trouvé";
                userListDiv.appendChild(errorTitle);
            }
        }
    }
    let form = new FormData();
    xhr.send(form);
    const xhr2 = new XMLHttpRequest();
    //#region : charger les entreprises
    //charger les entreprises
    xhr2.open('GET', 'entreprise-datas', true);
    xhr2.onreadystatechange = () => {
        if(xhr2.readyState === 4) {
            let result = "";
            if (xhr2.status === 200) {
                result += xhr2.responseText;
                let entreprises = JSON.parse(result);
                let entrItem = [entreprises.length];
                if(entreprises.length <= 0) {
                    entreprises.innerHTML = '<h1 class="text-center>"Aucun utilisateur</h2>';
                    return;
                }
                for (let i = 0; i < entreprises.length; i++) {
                    let entr = entreprises[i];
                    //entrItem[i] = "<tr>";
                    entrItem[i] = "";
                        for(item in entr) {
                            entrItem[i] +=  item ==='SNomEntreprise'|| item === 'RespoEntreprise'|| item === 'TypeEntreprise' || item === 'SNumTel' || item === 'NumEmail'?'<td>' + entr[item] + '</td>': "";
                        }
                    //entrItem[i] += "</tr>";
                    
               
                }
                let entrePage = findPageNumber(entrItem,10);
                showUserByPage(entrItem, entrepriseDiv, 10,1);
                if(entrItem.length > 10) {
                    showPagination(barEtr,entrItem, entrepriseDiv, 10,1);
                }
                /*
                let pgEntr = entrItem.length % 10;
                for (let j = 0; j < entrItem.length; j++) {
                    const element = entrItem[j];
                    let row = document.createElement('tr');
                    row.innerHTML = element;
                    entrepriseDiv.appendChild(row);
                   // entrepriseDiv.innerHTML += element;
                    
                }
                if(pgEntr <= 1) {
                   // pagination.style.display = "none";
                }*/
            }
            else {
            }
        }
    }
    xhr2.send();
    //#endregion
    //#region : events listenner
    showModalAddUser.addEventListener('click', (e)=> {
        modalAddUser.style.display = "";
    });
    closeModalAddUser.addEventListener('click', (e) => {
        modalAddUser.style.display = "none";
    })

    //#endregion

    //#region : submit form
    addUserBtn.addEventListener('click', (e) => {
        formUser.append('newUserName', name.value);
        formUser.append('newUserCode', code.value);
        formUser.append('newUserRole', role.value);
        usersDiv.innerHTML = "";
        const xreq = new XMLHttpRequest();
        xreq.open('POST', '/add-user');
        xreq.onreadystatechange = () => {
            if(xreq.readyState === 4) {
                if(xreq.status === 200) {
                    let messageContainer = document.createElement('div');
                    messageContainer.classList.add('relative');
                    let message = document.createElement('div');
                    message.classList.add('alert');
                    message.classList.add('alert-sucess');
                    message.innerHTML = "Utilisateur ajoute avec succes";
                    let result = xreq.response;
                    let users = JSON.parse(result);
                    let userItem = [users.length];
                    
                    if(users.length <= 0) {
                        usersDiv.innerHTML = '<h1 class="text-center>"Aucun utilisateur</h2>';
                        return;
                    }
                    
                    for (let i = 0; i < users.length; i++) {
                        let user = users[i];
                        userItem[i] = "<tr>";
                            for(item in user) {
                                userItem[i] += item !== 'mpd' && item !== 'login' && item !== 'idUser'? '<td>' + user[item] + '</td>': "";
                            }
                        userItem[i] += "</tr>";
                    }
                    nbrePage  = findPageNumber(userItem.length, 10);
                    showUserByPage(userItem, usersDiv, 10, 1);
                    if(userItem.length > 10) {
                        pagination.innerHTML = "";
                        showPagination(pagination, userItem, usersDiv, nbrePage, page);
                    }
                    modalAddUser.style.display = "none";
                }
            }
        }
        xreq.send(formUser);
        
        e.preventDefault();
    });
    //#endregion

    //#region : submit user form
    const codeEntr = document.querySelector('#code');
    const nom = document.querySelector('#nomEntreprise');
    const responsable = document.querySelector('#responsable');
    const type = document.querySelector('#typeEntreprise');
    const numRue = document.querySelector('#numRue');
    const nomRue = document.querySelector('#nomRue');
    const numTel = document.querySelector('#numTel');
    const email = document.querySelector('#email');
    const debutActi = document.querySelector('#debutActivite');
    const debutCompta = document.querySelector('#debutCompta');
    const commune = document.querySelector('#commune');
    const nif = document.querySelector('#nif');
    const days = document.querySelector('#days');
    const hours =  document.querySelector('#hours');
    const entrForm = document.querySelector('#entrForm');

    let inputList = [codeEntr, nom, responsable, type, numRue, nomRue, numTel, debutActi, debutCompta, commune, nif, days, hours];
  
    entrForm.addEventListener('submit', (e) => {
        e.preventDefault();
        let iscomplet = checkFormEntries(inputList);
        if(iscomplet){
            let entrxhr = new XMLHttpRequest();
            entrxhr.open('POST', '/add-entreprise', true);
            entrxhr.onreadystatechange = () => {
                if(entrxhr.readyState === 4) {
                    let result = "";
                    if (entrxhr.status === 200) {
                        result += entrxhr.responseText;
                        let socities = JSON.parse(result);
                        
                         socitiyItem = [socities.length];
                        
                        if(socities.length <= 0) {
                            entrepriseDiv.innerHTML = '<h1 class="text-center>"Aucun utilisateur</h2>';
                            return;
                        }
                        //#region affichages des utilisateurs
                        for (let i = 0; i < socities.length; i++) {
                            let socity = socities[i];
                            //entrItem[i] = "<tr>";
                            socitiyItem[i] = "";
                                for(item in socity) {
                                    socitiyItem[i] +=  item ==='SNomEntreprise'|| item === 'RespoEntreprise'|| item === 'TypeEntreprise' || item === 'SNumTel' || item === 'NumEmail'?'<td>' + socity[item] + '</td>': "";
                                }
                        console.log(socitiyItem[i]);

                            //entrItem[i] += "</tr>";
                            
                       
                        }
                        let entrePage = findPageNumber(socitiyItem,10);
                        entrepriseDiv.innerHTML = "";
                        showUserByPage(socitiyItem, entrepriseDiv, 10,1);
                     
                        //#endregion
        
                    }
                    else {
                    }
                }
            }
            let form = new FormData();
            form.append('SCodeEntreprise', codeEntr.value );
            form.append('SNomEntreprise', nom.value);
            form.append('RespoEntreprise', responsable.value);
            form.append('TypeEntreprise', type.value);
            form.append('SNumRue', numRue.value);
            form.append('SNomRue', nomRue.value);
            form.append('SNumTel', numTel.value);
            form.append('NumEmail', email.value);
            form.append('DDebutActivite', debutActi.value);
            form.append('DDComptabilite', debutCompta.value);
            form.append('commune_idCommune',commune.value);
            form.append('NIF', nif.value);
            form.append('NbreJourTravailParSemaine',days.value);
            form.append('NbreHeureDeTravailParJour', hours.value);
            entrxhr.send(form);
        }
    });
    //#endregion
})();