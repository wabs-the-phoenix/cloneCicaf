const wab$ = (
    function autocomplete() {
        const wab$ = (input, url, loadFirst = true) => {

            //#region : listenners
            const changeColor = (e) => {
                const child = e.currentTarget;
                child.style.backgroundColor = '#eee';
            }
            const changeInputValue = (e) => {
                let divChild = e.currentTarget;
                input.value = divChild.innerHTML;
            }
            const returnColor = (e) => {
                const child = e.currentTarget;
                child.style.backgroundColor = '';
            }
            const onFocus = (e) => {
                const champ = e.currentTarget;
                const path = "/api/" + url.replace("file", "")+`?limit=5&value=${champ.value}`;
                let theParent = champ.parentElement;
                champ.parentElement.style.position = "relative";
                champ.style.position = "relative";
                let y = champ.parentElement.clientHeight
                document.body.getClientRects;
                let x = champ.getClientRects()[0].left - theParent.getClientRects()[0].left;
                
                const completionDiv = document.createElement('div');
                completionDiv.style.position = "absolute";
                completionDiv.style.top = `${y + 4}px`;
                
                completionDiv.style.zIndex = `100`;
                completionDiv.style.padding = `0px`;
                completionDiv.style.backgroundColor = `#fff`;
                completionDiv.style.border = `1px solid #ccc`;
                completionDiv.style.borderRadius = '4px';
                completionDiv.style.color = `#555`;
                completionDiv.style.left = `${x}px`;
                completionDiv.style.width = `${champ.clientWidth}px`;
                champ.parentElement.appendChild(completionDiv);
                if(input.value !== "") {
                    onKeyPress(e);
                }
                else {
                    onKeyPress(e);
                }
                
            }
            const onKeyPress = (e) => {
                const champ = e.currentTarget;
                const path = "/" + url.replace("file", "")+`?limit=5&value=${champ.value}`;
                const xhr = new XMLHttpRequest();
                xhr.open('GET', path);
                xhr.onreadystatechange = () => {
                    if(xhr.readyState == 4) {
                       if( xhr.status == 200) {
                           let res = JSON.parse(xhr.responseText);
                           
                           if(res.status == "200") {
                            const div = input.parentElement.lastElementChild;
                            div.innerHTML = "";
                                for (let index = 0; index < res.body.length; index++) {
                                    const r = res.body[index];
                                    const divChild = document.createElement('div');
                                    divChild.innerHTML = r;
                                    divChild.style.padding = `5px 10px`;
                                    divChild.style.borderBottom = '1px solid #eee'
                                    divChild.style.fontWeight = 'bold'
                                    divChild.addEventListener('mouseover', changeColor);
                                    divChild.addEventListener('mouseout', returnColor);
                                    divChild.addEventListener('pointerdown', changeInputValue);
                                    div.appendChild(divChild);
                                    
                                }
                                
                            
                           }
                           else {
                                const div = input.parentElement.lastElementChild;
                                div.innerHTML = res.body;
                           }
                       }
                    }
                }
                xhr.send();
            }
            //#endregion
            //#region : add event listenner
            input.addEventListener("focus", onFocus);
            input.addEventListener("blur", (e) => {
               
                let last = input.parentElement.lastElementChild;
                input.parentElement.removeChild(last);
                let value = input.value.toUpperCase();
                input.value = value;
            });
            input.addEventListener("keyup", onKeyPress);
            //#endregion
        }
        return wab$;
    }
)()