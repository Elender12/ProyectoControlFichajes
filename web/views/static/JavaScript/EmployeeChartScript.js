google.charts.load('current', {packages: ['corechart']});
google.setOnLoadCallback(drawChart);

function drawChart() {
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
   var data = new google.visualization.DataTable(jsonData);
   //var chart = new google.visualization.AreaChart(document.getElementById('employeeChart_div'));
    var chart = new google.visualization.ColumnChart(document.getElementById('employeeChart_div'));
   chart.draw(data, options);
}

