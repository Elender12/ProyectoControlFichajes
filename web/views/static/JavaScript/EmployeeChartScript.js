
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);
        
        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                //aquí irían los datos para mostrarlos
            ['Day of the month', 'Hours by contract', 'Actual worked hours'],
                ['02/01', 8, 3.5],
                ['03/01', 8, 4],
                ['07/01', 8, 4],
                ['08/01', 8, 4],
                ['09/01', 8, 4],
                ['10/01', 8, 4],
                ['13/01', 8, 4.5],
                ['14/01', 8, 0],
                ['15/01', 4, 3.9],
                ['16/01', 4, 4],
                ['17/01', 4, 4],
                ['20/01', 4, 4.75], 
                ['21/01', 8, 2],
                ['22/01', 4, 4],
                ['23/01', 4, 4.5],
                ['24/01', 4, 4],
                ['27/01', 4, 4.05],
                ['28/01', 4, 4],
                ['30/01', 4, 3.75],
                ['31/01', 4, 4],
            ]);
            console.log(data);
            var options = {
                title: 'Worked hours',
                hAxis: { title: 'Working days'},
                vAxis: { title: 'Worked hours' , minValue: 0},
                legend: { position: 'bottom' },
                responsive: true
            };

            var chart = new google.visualization.AreaChart(document.getElementById('employeeChart_div'));

            chart.draw(data, options);
        }
