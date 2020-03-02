

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
	
	
	function GetSelectedValue(){
		var e = document.getElementById("country");
		var result = e.options[e.selectedIndex].value;
		
		document.getElementById("result").innerHTML = result;
		
	}

	function GetSelectedText(){
		var e = document.getElementById("country");
		var result = e.options[e.selectedIndex].text;
		
		document.getElementById("result").innerHTML = result;
		
	}
	