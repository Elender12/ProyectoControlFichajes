
        google.charts.load('current', { 'packages': ['corechart'] });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
            ['Day of the month', 'Hours by contract', 'Actual worked hours'],
                ['02/01', 4, 3.5],
                ['03/01', 4, 4],
                ['07/01', 4, 4],
                ['08/01', 4, 4],
                ['09/01', 4, 4],
                ['10/01', 4, 4],
                ['13/01', 4, 4.5],
                ['14/01', 4, 0],
                ['15/01', 4, 3.9],
                ['16/01', 4, 4],
                ['17/01', 4, 4],
                ['20/01', 4, 4.75], 
                ['21/01', 4, 4],
                ['22/01', 4, 4],
                ['23/01', 4, 4.5],
                ['24/01', 4, 4],
                ['27/01', 4, 4.05],
                ['28/01', 4, 4],
                ['30/01', 4, 3.75],
                ['31/01', 4, 4],
            ]);

            var options = {
                title: 'Worked hours, January',
                hAxis: { title: 'Working days'},
                vAxis: { title: 'Worked hours' , minValue: 0},
                legend: { position: 'top right' },
                responsive: true
            };

            var chart = new google.visualization.AreaChart(document.getElementById('employeeChart_div'));

            chart.draw(data, options);
        }
