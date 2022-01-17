//donner une classe commune a tous les liens
//ici je donne la clqsse actionRev
//selectionner tous ces liens

const actions = document.querySelectorAll(".actionRev");

//selectionne ensuite la pageContent
//pour selectionner avec les id ne jamais oublier le diese
const pageContent = document.querySelector("#pageContent")

for (let i = 0; i < actions.length; i++) {
    const element = actions[i];
    //ajouter les ecouteur d'evenements
    element.addEventListener("click", (e) => {
        e.preventDefault();
        //recuperer notre lien ou bouton
        const a = e.currentTarget;
        //recouperer l'id du bien a reevaluer*//noter que l'id est ecrite sous lq forme reevidDuBien
        //exeple reev78
        //supprimer le prefixe
        let id = a.id.replace("reev", "")
        id = id.trim()

        //effectuer les operations desiree
        //le resultat est dans dans la variable resultat
        let resultat = ""

        //qfficher le resultat dans page content
        pageContent.innerHTML = "";
        pageContent.innerHTML = resultat;
    })
}