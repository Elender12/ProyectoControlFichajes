$(function() {
    $('#monthpicker').monthpicker({
    years: [2030, 2029, 2028, 2027, 2026, 2025, 2024, 2023, 2022, 2021, 2020, 2019, 2018, 2017, 2016],
    topOffset: 6,
    onMonthSelect: function(m, y) {
    console.log('Month:  '+ m + ', year: ' + y);
    $("#selectedMonth").val(m+"/"+y)
    }
    });
    });