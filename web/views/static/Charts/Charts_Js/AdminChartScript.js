google.charts.load('current', {'packages':['corechart']});
      google.charts.setOnLoadCallback(drawVisualization);

      function drawVisualization() {
        
        var data = google.visualization.arrayToDataTable([
          ['Month', 'Employee1', 'Employee2', 'Employee3', 'Employee4', 'Employee5', 'Average'],
          ['January',  165,      938,         522,             998,           450,      614.6],
          ['February',  135,      1120,        599,             1268,          288,      682],
          ['March',  157,      1167,        587,             807,           397,      623],
          ['April',  139,      1110,        615,             968,           215,      609.4],
          ['May',  136,      691,         629,             1026,          366,      569.6],
          ['June',  139,      1110,        615,             968,           215,      609.4],
          ['July',  139,      1110,        615,             968,           215,      609.4],
          ['August',  139,      1110,        615,             968,           215,      609.4],
          ['September',  139,      1110,        615,             968,           215,      609.4],
          ['October',  139,      1110,        615,             968,           215,      609.4],
          ['November',  139,      1110,        615,             968,           215,      609.4],
          ['December',  139,      1110,        615,             968,           215,      609.4]
        ]);

        var options = {
          title : 'Worked hours for all employees',
          vAxis: {title: 'Worked hours'},
          hAxis: {title: 'Month'},
          seriesType: 'bars',
          series: {5: {type: 'line'}}        };

        var chart = new google.visualization.ComboChart(document.getElementById('adminChart_div'));
        chart.draw(data, options);
      }