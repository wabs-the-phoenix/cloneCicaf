$(function(){
    $('#TableBien').DataTable();
    $('#addBien').click(function(){
        $('#addBienForm').modal('show');
    });

    $("#addBienForm").modal({
		closable: true
	});
});

(function () {
    

    //#region : identification des elements dom
    let BiensList = document.querySelector("#BiensList");
    
    //#endregion
    //#region : les listenners
    (() => {
        
        const xhr = new XMLHttpRequest();
        xhr.open(`GET`, '/api/Biens');
        xhr.onreadystatechange = () => {
            if(xhr.readyState == 4) {
                if(xhr.status == 200) {
                   let response = xhr.responseText;
                   response = JSON.parse(response);
                   if(response.type == `error`) {
                    const modal = document.createElement(`div`);
                    modal.className = `ui modal internal error`
                    modal.innerHTML = `<div class="header">Erreur interne</div>
                    <div class="content">Impossible de se connecter</div>
                    `
                    document.body.appendChild(modal);
                    $('.ui.modal.internal.error').modal(`show`);
                    }else {
                       let biens = response.datas.biens;
                       
                            for (let i = 0; i < biens.length; i++) {
                                const element = biens[i];

                                let rowTable = document.createElement('tr');
                                
                                const designation = document.createElement(`td`);
                                designation.innerHTML = `${element.DesignationImmo}`;
                                const valeurbrute = document.createElement(`td`);
                                valeurbrute.innerHTML = element.ValeurBrute;
                                const dateAcquisition = document.createElement(`td`);
                                dateAcquisition.innerHTML = element.DateAcquisition;                               
                                const dure = document.createElement(`td`);
                                dure.innerHTML = element.DureeImmo;
                                const affectation=document.createElement('td');
                                affectation.innerHTML=element.LieuAffectation;
                                const button=document.createElement('td');
                                let actions='<div class="ui compact menu"> Actions';
                                actions+='<i class="dropdown icon"></i>';
                                actions+='<div class="menu">';
                                actions+='<div class="item"><i class="pencil icon"></i>Modifier</div>';
                                actions+='</div>';
                                actions+='</div>';
                                button.innerHTML=actions;

                                rowTable.appendChild(designation);
                                rowTable.appendChild(valeurbrute);
                                rowTable.appendChild(dateAcquisition);
                                rowTable.appendChild(dure);
                                rowTable.appendChild(affectation);
                                BiensList.appendChild(rowTable);
                                
                                
                        
                       }
                       
                       
                   }
                }
            }
        }
        xhr.send();
    })()
})()
  