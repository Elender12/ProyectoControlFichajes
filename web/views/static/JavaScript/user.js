

    $(document).ready(function () {
        $("#sidebar").mCustomScrollbar({
            theme: "minimal"
        });

        $('#sidebarCollapse').on('click', function () {
            $('#sidebar, #content').toggleClass('active');
            $('.collapse.in').toggleClass('in');
            $('a[aria-expanded=true]').attr('aria-expanded', 'false');
        });
    });
    
    $(document).ready(function () {
        $('#dtVerticalScrollExample').DataTable({  //AQUÍ PETA Y NO CARGA LA TABLA
        "scrollY": "200px",
        "scrollCollapse": true,
        });
        $('.dataTables_length').addClass('bs-select');
        });

 