<!-- <?php session_start(); ?> -->
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>User statistics</title>

  <!-- Icono con la m de movicoders en la ventana -->
	<link rel="shortcut icon" href="../views/static/img/favicon.ico" />

  <!-- JavaScript funcion para el movimiento lateral   -->
  <script defer src="../views/static/JavaScript/user.js"></script>

  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css"
    integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- MI CSS -->
  <link rel="stylesheet" href="../views/static/css/user.css">
  <!-- La Scrollbar con CSS -->
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

  <!-- LA Fuente Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js"
    integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ"
    crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js"
    integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY"
    crossorigin="anonymous"></script>
    
  <!-- Los iconos tipo Solid de Fontawesome los importo y los utilizo mas adelante-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <!-- Iconos filtros gráficos -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script type="text/javascript"
    src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
  <link rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

    
    <link rel="stylesheet2" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
   <!-- <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script> -->
   
   
   <script src="http://code.highcharts.com/highcharts.js"></script>
   
    <!--YEARPICKER cogido de esta web: https://www.itsolutionstuff.com/post/bootstrap-year-picker-example-using-datepicker-jsexample.html -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>
    <link rel="stylesheet" href="css/jquery.monthpicker.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <!-- <script src="jquery-3.4.1.min.js"></script> -->
   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

   
    <!--el script que crea la chart está aquí:-->
    <script type="text/javascript" src="../views/static/JavaScript/EmployeeChartScript.js"></script>
  

    <!-- CSS de la chart -->
    <link rel="stylesheet" href="../views/static/css/chartsStyle.css">
    <!--Loader de la chart de google  -->



</head>

<body>

	<!-- php sessions START-->
  
  
	<!-- php sessions END -->
	
	
  <div class="wrapper">
    <!-- Sidebar Con todas sus partes  -->
    <nav id="sidebar">
      <div class="sidebar-header">

        <h3>Movicoders</h3>
      </div>

      <ul class="list-unstyled components">
        <!-- <p><i class="fas fa-chevron-circle-down"></i>  Menu</p>-->
        <li>
          <a class="d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" a href="#pageSubmenu"
            data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-mobile-alt"></i> Phone</i></a>
          <ul class="collapse list-unstyled" id="pageSubmenu">

            <li class="nav-item active">
              <!--User-->
              <a class="nav-link d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" href="#"><i
                  class="fas fa-user"id="userid"></i> User</a>
            </li>

            <li class="nav-item">
              <!--Home-->
              <a class="nav-link d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none"
                href="https://movicoders.com/"  target="_blank"><i class="fas fa-home" ></i> Home</a>
            </li>
            <li class="nav-item">
              <!--CONFIG -->
              <a class="nav-link d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" data-toggle="modal"
                id="btn-config" data-target=".bd-example-modal-lg">
                <i class="fas fa-user-cog "></i> Config</a>

              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    ..............
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
              <!--Salida-->
              <a class="nav-link   d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none"
                href="exit"><i class="fas fa-sign-out-alt" ></i> Exit</a>
            </li>
          </ul>
        </li>




        <!--START FILTROS GRAFICOS-->
        <li class="active">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class=" -toggle"><i
              class="fas fa-filter"></i> Filter statistics</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseOne"
                      aria-expanded="false" aria-controls="collapseOne" id="colorBtn"> <i class="material-icons">event</i>
                      Select date range
                    </button>
                  </h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <!--START: fechas para elegir-->
                    <div class="form-group row">
                <label for="dateRange1" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <input class="date-own form-control" id="dateRange1" type="text" value="Select date">
                  <script type="text/javascript">
                  $('.date-own').datepicker({
                    autoclose: true,
                    weekStart:1,
                    todayHighlight: true,
                    clearBtn: true,
                    disableTouchKeyboard: true,
                    format: "yyyy-mm-dd",
                    viewMode: "months", 
                    minViewMode: "days"
                  });
              </script>
              </div>
              </div>
              <div class="form-group row">
                <label for="dateRange2" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <input class="date-own form-control" id="dateRange2" type="text" value=" Select date">
                  <script type="text/javascript">
                  $('.date-own').datepicker({
                    autoclose: true,
                    weekStart:1,
                    todayHighlight: true,
                    clearBtn: true,
                    disableTouchKeyboard: true,
                    format: "yyyy-mm-dd",
                    viewMode: "months", 
                    minViewMode: "days"
                  });
              </script>
              </div>
              </div> 
              <!-- <div class="form-group row">
                <label for="example-date-input" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <input class="form-control" type="date" value=" 2-2-2020" id="example-date-input">
                </div>
              </div>
              <div class="form-group row">
                <label for="example-date-input1" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <input class="form-control" type="date" value=" End" id="example-date-input1">
                </div>
              </div> -->
              <button type="button" class="btn btn-light" id="btn-outline-light"><i class="fas fa-share"></i>
                Filter</button>
          <!--END: fechas para elegir-->
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo"
                      aria-expanded="false" aria-controls="collapseTwo" id="colorBtn2"><i class="material-icons">date_range</i>
                      Select month
                    </button>
                  </h5>
                </div>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                  <div class="card-body">
                  <!--START: meses para elegir-->
                  <div class="form-group row">
                <label for="monthFilter" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <input class="date-own form-control" id="monthFilter" type="text" value=" Select month">
                <script type="text/javascript">
                  $('.date-own').datepicker({
                    autoclose: true,
                    weekStart:1,
                    todayHighlight: true,
                    clearBtn: true,
                    disableTouchKeyboard: true,
                    format: "yyyy-mm-dd",
                    viewMode: "years", 
                    minViewMode: "months"
                  });
              </script>
              </div>
              </div>
                  <button type="button" class="btn btn-light" id="btn-outline-light"><i class="fas fa-share"></i>
                    Filter</button>
                  <!--END: meses para elegir-->
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree"
                      aria-expanded="false" aria-controls="collapseThree" id="colorBtn3"><i class="fas fa-calendar-alt"></i>
                      Select year
                    </button>
                  </h5>
                </div>
                <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                  <div class="card-body">
                   <!--START: años para elegir-->
                   <div class="form-group row">
                <label for="yearFilter" class="col-2 col-form-label"></label>
                <div class="col-10">
                  <input class="date-own form-control" id="yearFilter" type="text" value=" Select year">
                <script type="text/javascript">
                  $('.date-own').datepicker({
                    autoclose: true,
                    weekStart:1,
                    todayHighlight: true,
                    clearBtn: true,
                    disableTouchKeyboard: true,
                    minViewMode: 2,
                    format: 'yyyy'
                  });
              </script>
              </div>
              </div>
                  <button type="button" class="btn btn-light" id="btn-outline-light"><i class="fas fa-share"></i>
                    Filter</button>
                  <!--END: años para elegir-->
                  </div>
                </div>
              </div>
              <div class="card">
                <div class="card-header" id="headingFour">
                  <h5 class="mb-0">
                    <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseFour"
                      aria-expanded="false" aria-controls="collapseFour" id="colorBtn4"><i class="material-icons">assignment_return</i>
                      All time
                    </button>
                  </h5>
                </div>
              </div>
            </div>

    </nav>
            <!--END FILTROS GRAFICOS-->



    <!-- El content de la pagina  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-outline-secondary">
            <i class="fas fa-bars"></i>
            <span> Menu </span>
          </button>

		  <div class="topnav-centered d-none d-xl-block d-lg-block">
    				<a href="#" class="active ">Statistics</a>
  							</div>

          <!--La Barra donde aparecen los diferentes iconos que podemos ver en pantalla -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto  ">

              <li class="nav-item active">
                <!--User-->
                <a class="nav-link" href="#"><i class="fas fa-user"></i></i></a>
              </li>

              <li class="nav-item">
                <!--Home que llama al método del controlador-->
                <a class="nav-link" href="goIndex" ><i class="fas fa-home" id="homeid"></i> </a>
              </li>

              <li class="nav-item">
                <!--CONFIG -->
                <a class="nav-link" data-toggle="modal" id="btn-config" data-target=".bd-example-modal-lg">
                  <i class="fas fa-user-cog "></i> </a>

                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog"
                  aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      ..............
                    </div>
                  </div>
                </div>
              </li>

              <li class="nav-item">
                <!--Salida-->
                <a class="nav-link" href="exit"><i class="fas fa-sign-out-alt" id="exitid"></i> </a>

              </li>
            </ul>
          </div>
        </div>
      </nav>
      <!--AQUÍ ES DONDE SE LLAMA AL GRÁFICO-->
      <div id="employeeChart_div"></div>

<!--Prueba V4--->

      <!--<p>Date: <input type="text" id="fromDate"> TO <input type="text" id="toDate"></p>-->

      <!-- jQuery CDN -  AJAX -->
      <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script> -->
      <!-- Popper.JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"
        integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ"
        crossorigin="anonymous"></script>
      <!-- Bootstrap JS -->
      <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"
        integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm"
        crossorigin="anonymous"></script>
      <!-- jQuery Custom Scroller CDN -->
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>


</body>

</html>