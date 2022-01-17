(function () {
  //#region : usuals functions
  const loadPage = (url) => {
    const xhr = new XMLHttpRequest();
    xhr.open(`GET`, url);
    xhr.onreadystatechange = () => {
      if(xhr.readyState == 4) {
        if(xhr.status == 200) {
          let res = xhr.responseText;
          pageContent.innerHTML = res;
          
        }
      }
    }
    xhr.send();
  }
  const loadFirstPage = (url) => {
    const xhr = new XMLHttpRequest();
    xhr.open(`GET`, url);
    xhr.onreadystatechange = () => {
      if(xhr.readyState == 4) {
        if(xhr.status == 200) {
          let res = xhr.responseText;
          pageContent.innerHTML = res;
          let scriptJs = document.createElement(`script`);
          scriptJs.classList.add(`addedScript`);
          scriptJs.src = `assets/js/comptaEntr.js`;
          document.body.appendChild(scriptJs);
        }
      }
    }
    xhr.send();
  }
  //#endregion
//#region : listenner
const onSideItemClick = (e) => {
  e.preventDefault();
  const item = e.currentTarget;
  for (let index = 0; index < document.body.children.length; index++) {
    const element = document.body.children[index];
    if(element.classList.contains(`addedScript`)) {
      document.body.removeChild(element);
    }
  }
  loadPage(item.href);
  $('.ui.sidebar').sidebar('toggle');
  let dummyAct = document.body.getClientRects();
  if(!item.classList.contains(`active`)) {
    switch (item.href) {
      case sidebarItems[0].href: {
        const scriptJs = document.createElement(`script`);
        scriptJs.classList.add(`addedScript`);
        scriptJs.src = `assets/js/comptaEntr.js`;
        document.body.appendChild(scriptJs);
        break;
      }
      case sidebarItems[1].href: {
        const scriptJs = document.createElement(`script`);
        scriptJs.classList.add(`addedScript`);
        scriptJs.src = `assets/js/codeJournal.js`;
        document.body.appendChild(scriptJs);
        break;
      }
      case sidebarItems[2].href: {
        const scriptJs = document.createElement(`script`);
        scriptJs.classList.add(`addedScript`);
        scriptJs.src = `assets/js/planComptable.js`;
        document.body.appendChild(scriptJs);
        break;
      }
      case sidebarItems[3].href: {
        const scriptJs = document.createElement(`script`);
        scriptJs.classList.add(`addedScript`);
        scriptJs.src = `assets/js/exercice.js`;
        document.body.appendChild(scriptJs);
        break;
      }
      default:
        break;
    }
     
     for (let i = 0; i < sidebarItems.length; i++) {
      const element = sidebarItems[i];
      if(element.classList.contains(`active`)) {
        element.classList.remove(`active`)
      }
      
    }
     item.classList.add(`active`);
  }
  
}
//#endregion

//#region: select elements
const menuBtn = document.querySelector(`#menuBtn`);
const pageContent = document.querySelector(`#pageContent`);
const sidebarItems = document.querySelectorAll(`.sidebar a.item`);


//#endregion

//#region : on component mount
loadFirstPage(`/identifier-entreprise`);
//#endregion
//#region : add listenner
menuBtn.addEventListener(`click`, (e) => {
  $('.ui.sidebar').sidebar('toggle');
});

//charger la bonne page a chaque click
for (let i = 0; i < sidebarItems.length; i++) {
  const item = sidebarItems[i];
  item.addEventListener(`click`, onSideItemClick);
  
}
//#endregion

    
    }
)()
