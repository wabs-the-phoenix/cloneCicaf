const getApiDatas = (url, callBack) => {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4) {
            if (xhr.status == 200) {
                let res = xhr.responseText;
                try {
                    res = JSON.parse(res);
                    
                } catch (error) {
                  console.log(res)
                    //showUserMessage("Problème interne du Serveur", "Les données ne peuvent être récupérer depuis la base de donnée")
                    return;
                }
                if(res.type === "success") {
                    if (callBack) {
                        callBack(res);
                    }
                }
                else {
                    console.log(res.type)
                }
                
            }
        }
    }
    xhr.send();
}
/**
 * 
 * @param {string} url 
 * @param {FormData} form
 * @param {function} callBack
 */
const postApiDatas = (url, form, callBack) => {
  const xhr = new XMLHttpRequest();
  xhr.open(`POST`, url);
  xhr.onreadystatechange = () => {
      if (xhr.readyState == 4) {
          if (xhr.status == 200) {
              let res = xhr.responseText;
              try {
                  res = JSON.parse(res);
                  
              } catch (error) {
                console.log(res)
                console.log(res);
                  //showUserMessage("Problème interne du Serveur", "Les données ne peuvent être récupérer depuis la base de donnée")
                  return;
              }
              if(res.type === "success") {
                  if (callBack) {
                      callBack(res);
                  }
              }
              else {
                  console.log(res)
              }
              
          }
      }
  }
  xhr.send(form);
}

/**
 * 
 */
const drawPieDiagramme = (data, idElement) => {
    Highcharts.chart(idElement, {
        chart: {
          plotBackgroundColor: null,
          plotBorderWidth: null,
          plotShadow: false,
          type: 'pie'
        },
        title: {
          text: 'Statistique des entreprises'
        },
        tooltip: {
          pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        accessibility: {
          point: {
            valueSuffix: '%'
          }
        },
        plotOptions: {
          pie: {
            allowPointSelect: true,
            cursor: 'pointer',
            dataLabels: {
              enabled: true,
              format: '<b>{point.name}</b>: {point.percentage:.1f} %'
            }
          }
        },
        series: [{
          name: 'Brands',
          colorByPoint: true,
          data
        }]
      });
}
/**
 * Verifie si une chaine de caractere ne contient
 * que des lettres et pas de chiffre ou autre caractere
 * @param {string} str 
 */
const isValidString = (str) => {
   if (str.search(/[\d\W]/) == - 1) {
     return true;
   }
   return false;
}
const isValidSpacedString = (str) => {
  let tempo = str.replace(/\s/,"");
  if (isValidString(str)) {
    return true;
  }
  return false;
}
