(() => {
   
    //#region : usuals functions
    //#endregion

    //#region : datas functions
    const loadEntreprises = () => {
        getApiDatas("/api/entreprises", (res) => {
            entreprises = res.datas.entreprises;
            for (let index = 0; index < entreprises.length; index++) {
                const element = entreprises[index];
                if (element.status == 1) {
                    activesEntreprises.push(element);
                }
                else {
                    blockedEntreprises.push(element);
                }
            }
            const numberEntreBlocked = document.querySelector("#numberEntreBlocked");
            numberEntreBlocked.innerHTML = blockedEntreprises.length;
            let activePercents = activesEntreprises.length * 100 / entreprises.length;
            let blockedPercents = blockedEntreprises.length * 100 / entreprises.length;
            const numberEntreActive = document.querySelector("#numberEntreActive");
            numberEntreActive.innerHTML = activesEntreprises.length;
            const numberEntreCreated = document.querySelector("#numberEntreCreated");
            numberEntreCreated.innerHTML = entreprises.length;
            let data = [
                {
                    name: 'Actives',
                    y: activePercents,
                    sliced: true,
                    selected: true
                  }, {
                    name: 'Bloquées',
                    y: blockedPercents
                  }
            ]
            drawPieDiagramme(data, "pieEntreprises");
        })
    }
    
   
    //#endregion

    
    //#region : selections
        //#region: navigarion element
        //#endregion 
    //#endregion

    //#region : on loading
   
    let entreprises;
    let activesEntreprises = [];
    let blockedEntreprises = [];
    let EntreByState = [];
    loadEntreprises();
    //#endregion

    //#region : add event listenners
    submitEntrInfo.addEventListener("click", submitEntreprise);
    //#endregion
})()