google.charts.load('current', {packages: ['corechart']});
google.setOnLoadCallback(drawChart);

function drawChart() {


  // var data = google.visualization.arrayToDataTable([
  //   ['Day of the month', 'Hours by contract', 'Worked hours'],
  //   ['02/01', 8, 3.5],
  //   ['03/01', 8, 4],
  //   ['07/01', 8, 8],
  //   ['03/01', 8, 4],
  //   ['03/01', 8, 6],
  //   ['03/01', 8, 7.5],
  //   ['03/01', 8, 4],
  //   ['05/01', 8, 7],
  //   ['03/01', 8, 5],
  //   ['03/01', 8, 4],
  //   ['03/01', 8, 3],
  //   ['03/01', 8, 8],
  //   ['09/01', 8, 6],
  //   ['03/01', 8, 4],
  //   ['03/01', 8, 6.5],
  //   ['03/01', 8, 4],
  //   ['03/01', 8, 4],
  //   ['15/01', 8, 3.2],
  //   ['03/01', 8, 4],
  //   ['03/01', 8, 4.5],
  //   ['03/01', 8, 4],
  //   ['03/01', 8, 2],
  //   ['03/01', 8, 0]

  // ]);
  var jsonData = $.ajax({
    url: "sendData",
    dataType: "json",
    async: false
    }).responseText;

  // var jsonData = $.ajax({
  //   url: "sendData",
  //   dataType: "json",
  //   async: false
  //   }).done( function(respuesta){
  //       console.log(respuesta);
  //   });


  var options = {
    title: 'Worked hours',
    hAxis: {title: 'Working days'},
    vAxis: {title: 'Worked hours', minValue: 0},
    legend: { position: 'bottom'}
  };

  //console.log("entra en draw");
  var data = new google.visualization.DataTable(jsonData);
  var chart = new google.visualization.AreaChart(document.getElementById('employeeChart_div'));
  chart.draw(data, options);
 // chart.draw(data, {width: 400, height: 240});

 
}

// $(window).resize(function(){
//   drawChart();
 
// });