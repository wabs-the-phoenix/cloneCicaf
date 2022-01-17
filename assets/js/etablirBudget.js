(
    function () {
        //#region : listenners
        const loadPcoPage = (e) => {
            e.preventDefault();
            content.removeChild(pcHome);
            content.appendChild(pcoList);

            const xhr = new XMLHttpRequest();
            xhr.open('GET', '/etablir-budget');
            xhr.onreadystatechange = () => {
                if (xhr.readyState == 4) {
                    if (xhr.status == 200) {
                        let res = xhr.responseText;
                        pcoList.innerHTML = res;
                    }
                }
            }
            xhr.send();
        }
        //#endregion
       //#region : selection des elements
        const btnUpdate = document.querySelector('#btnUpdate');
        const content = document.querySelector('#contentPc');
        const pcHome = content.children[0];
        const pcoList = document.createElement('div');
       //#endregion
       //#region : addevents listeners to elements
       btnUpdate.addEventListener('click', loadPcoPage);
       //#endregion
    }
)()