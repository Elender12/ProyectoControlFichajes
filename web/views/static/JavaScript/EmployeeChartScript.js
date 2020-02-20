google.charts.load('current', {packages: ['corechart']});
google.setOnLoadCallback(drawChart);
function drawChart() {
  var data = google.visualization.arrayToDataTable([
    ['Day of the month', 'Hours by contract', 'Worked hours'],
    ['02/01', 8, 3.5],
    ['03/01', 8, 4],
    ['07/01', 8, 8],
    ['03/01', 8, 4],
    ['03/01', 8, 6],
    ['03/01', 8, 7.5],
    ['03/01', 8, 4],
    ['05/01', 8, 7],
    ['03/01', 8, 5],
    ['03/01', 8, 4],
    ['03/01', 8, 3],
    ['03/01', 8, 8],
    ['09/01', 8, 6],
    ['03/01', 8, 4],
    ['03/01', 8, 6.5],
    ['03/01', 8, 4],
    ['03/01', 8, 4],
    ['15/01', 8, 3.2],
    ['03/01', 8, 4],
    ['03/01', 8, 4.5],
    ['03/01', 8, 4],
    ['03/01', 8, 2],
    ['03/01', 8, 0]

  ]);

  var options = {
    title: 'Worked hours',
    hAxis: {title: 'Working days'},
    vAxis: {title: 'Worked hours', minValue: 0},
    legend: { position: 'bottom'}
  };

  var chart = new google.visualization.AreaChart(document.getElementById('employeeChart_div'));
  chart.draw(data, options);
}

// $(window).resize(function(){
//   drawChart();
 
// });