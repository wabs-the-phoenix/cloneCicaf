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
  if(!item.classList.contains(`active`)) {
    switch (item.href) {
      case sidebarItems[0].href: {
        const scriptJs = document.createElement(`script`);
        scriptJs.classList.add(`addedScript`);
        scriptJs.src = `assets/js/Projet.js`;
        document.body.appendChild(scriptJs);
        break;
      }
        
    
      default:
        break;
    }
     loadPage(item.href);
     $('.ui.sidebar').sidebar('toggle');
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
let scriptJs = document.createElement(`script`);
scriptJs.classList.add(`addedScript`);
scriptJs.src = `assets/js/Projet.js`;
document.body.appendChild(scriptJs);
loadPage(`/Projet`);
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




  
