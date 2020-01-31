


/*

NO SE USA LO TENGO PARA 
  $(function () {
    $('#datetimepicker7').datetimepicker();
    $('#datetimepicker8').datetimepicker({
        useCurrent: false
    });
    $("#datetimepicker7").on("change.datetimepicker", function (e) {
        $('#datetimepicker8').datetimepicker('minDate', e.date);
    });
    $("#datetimepicker8").on("change.datetimepicker", function (e) {
        $('#datetimepicker7').datetimepicker('maxDate', e.date);
    });
});
*/

$('.pane--table2').scroll(function() {
    $('.pane--table2 table').width($('.pane--table2').width() + $('.pane--table2').scrollLeft());
  });
