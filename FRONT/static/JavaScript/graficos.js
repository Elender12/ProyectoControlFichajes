

    $(function () {
        $('#container').highcharts({
            title: {
                text: 'Resumen de Fichaje',
                x: -20 //center
            },
            subtitle: {
                text: 'Semanal',
                x: -20
            },
            xAxis: {
                categories: ['Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes']
            },
            yAxis: {
                title: {
                    text: 'Horas Diarias'
                },
                plotLines: [{
                    value: 0,
                    width: 1,
                    color: '#808080'
                }]
            },
            tooltip: {
                valueSuffix: ' Horas'
            },
            legend: {
                layout: 'vertical',
                align: 'right',
                verticalAlign: 'middle',
                borderWidth: 0
            },
            series: [{
                name: 'Horas Obligatorias',
                data: [8.0, 8.0 ,8.0 ,8.0 ,8.0]
            }, {
                name: 'Horas Trabajadas',
                data: [7.22, 5.8, 7.6, 8.6 ,9.8 ]
            }]
        });
    });

    
    