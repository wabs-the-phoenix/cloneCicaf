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
                  console.log(error)
                    //showUserMessage("Problème interne du Serveur", "Les données ne peuvent être récupérer depuis la base de donnée")
                    return;
                }
                if(res.type === "success") {
                    if (callBack) {
                        callBack(res);
                    }
                }
                else {
                    console.log(res.datas)
                }
                
            }
        }
    }
    xhr.send();
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
