function cargar_grafica_pie(){

var options={
     // Build the chart
     
            chart: {
                renderTo: 'div_grafica_pie',
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Grafica Asitencia al evento'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: false
                    },
                    showInLegend: true
                }
            },
            series: [{
                name: 'Brands',
                colorByPoint: true,
                data: []
            }]
     
}

$("#div_grafica_pie").html( $("#cargador_empresa").html() );

var url = "grafica_publicaciones";


$.get(url,function(resul){
var datos= jQuery.parseJSON(resul);
var tipos=datos.tipos;
var totattipos=datos.totaltipos;
var numeropublicaciones=datos.numerodepubli;

    for(i=0;i<=totattipos-1;i++){  
    var idTP=parseInt(tipos[i].id);
    var objeto= {name: tipos[i].titulo, y:numeropublicaciones[idTP] };     
    options.series[0].data.push( objeto );  
    }
 //options.title.text="aqui e podria cambiar el titulo dinamicamente";
 chart = new Highcharts.Chart(options);

})








}