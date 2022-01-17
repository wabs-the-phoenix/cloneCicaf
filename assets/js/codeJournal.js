(
    function() {
        //#region : usual function
        const getApiDatas = (url, callBack) => {
            let xhr = new XMLHttpRequest();
            xhr.open(`GET`, url);
            xhr.onreadystatechange = (e) => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res;
                        try {
                            res = JSON.parse(xhr.responseText);
                        } catch (error) {
                            
                        }
                        callBack(res);
                    }
                }
            }
            xhr.send();
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
        const get
        //#endregion
        //#region : listenners
        const showJournalDetails = (e) => {
            e.preventDefault();
            
        }
        //#endregion
        //#region : Selection des elements
        const searchBtns = document.querySelectorAll('.journalActions searchBtn');
        let contentJournaux;
        let contentUserJournaux;
        let journaux;
        //#endregion
        //#region : code a executer au chargement
        getJournauxForSearch(`/api/journaux`);
        getRespoJournauxForSearch(`/api/UserJournal`);
        getAllJournaux(`/api/journaux`);
        getAllUserJournaux(`/api/UserJournal`);
        //#endregion
        //#region : add events listenner aux actions
        for (let i = 0; i < searchBtns.length; i++) {
            const element = searchBtns[i];
            element.addEventListener(`click`, showJournalDetails);
        }
        //pour chaque cellules d'actions
        //#endregion
    }
)()