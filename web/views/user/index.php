<?php @session_start();

// Redirect 301 Moved Permanently
//header("Location: /ControlFichajes/web/LoginController/login");

//error_reporting(E_ERROR | E_PARSE);
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>User</title>

  <link rel="stylesheet" href="../views/static/css/mobiscroll.javascript.min.css">
  <script src="../views/static/JavaScript/mobiscroll.javascript.min.js"></script>

  <!-- Icono con la m de movicoders en la ventana -->
  <link rel="shortcut icon" href="../views/static/img/favicon.ico" />

  <!-- Bootstrap CSS  -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
  <!-- MI CSS -->
  <link rel="stylesheet" href="../views/static/css/user.css">
  <!-- La Scrollbar con CSS -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

  <!-- LA Fuente Awesome JS -->
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
  <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>


  <!-- Los iconos tipo Solid de Fontawesome los importo y los utilizo mas adelante-->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
  <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.22.2/moment.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/js/tempusdominus-bootstrap-4.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tempusdominus-bootstrap-4/5.0.1/css/tempusdominus-bootstrap-4.min.css" />

  <!-- Filtros fechas -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/css/bootstrap-datepicker.css" rel="stylesheet">
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.5.0/js/bootstrap-datepicker.js"></script>

  <script>
      function load() {
        // test= document.getElementById("myId").innerText;
        //document.getElementById("selectedDate").value = test
      }
      window.onload = load;
    </script>
<script>
  $(document).on("click", ".edit1", function () {
     //var myBookId = document.getElementById(this);
     //var test = $(this).data('id');
     var fecha = this.id;
      //cambia el texto de la ventana modal
      var etiqueta = document.getElementById("exampleModalLabel11");
     etiqueta.innerText = fecha;
    
      document.getElementById("selectedDate").value = fecha;
    // alert(fecha);
    // var bookId = $(e.relatedTarget).data('book-id');
    // $(".edit1").val( myBookId );
   // alert(test);
     // As pointed out in comments, 
     // it is unnecessary to have to manually call the modal.
  
     //$('#exampleModal').
});




</script>
</head>

<body>
  <!-- php sessions START-->
  <?php
  //evita que se guarde la sesion vacia si ya existia
  if (!isset($_SESSION["worker"])) {
    $_SESSION["worker"] = $_GET["worker"];
    $_SESSION["pass"] = $_GET["pass"];
  }

  ?>
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
          <a class="d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-mobile-alt"></i> Phone</i></a>
          <ul class="collapse list-unstyled" id="pageSubmenu">

            <li class="nav-item active">
              <!--User-->
              <a class="nav-link d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" href="#"><i class="fas fa-user"></i> User</a>
            </li>

            <li class="nav-item">
              <!--Home-
              <a class="nav-link d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" href="https://movicoders.com/" target="_blank"><i class="fas fa-home"></i> Home</a>
            </li>
            <li class="nav-item">
              CONFIG 
              <a class="nav-link  d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" data-toggle="modal" data-target=".bd-example-modal-lg">
                <i class="fas fa-user-cog "></i> Config</a>

              <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                    ..............
                  </div>
                </div>
              </div>
            </li>
            <li class="nav-item">
				-->
              <!--Salida-->
              <a class="nav-link   d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" href="exit"><i class="fas fa-sign-out-alt"></i> Exit</a>
            </li>

          </ul>
        </li>

        <li class="active">
          <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class=" -toggle"><i class="fas fa-filter"></i> Filter registers</a>
          <ul class="collapse list-unstyled" id="homeSubmenu">
            <div id="accordion">
              <div class="card">
                <div class="card-header" id="headingOne">
                  <h5 class="mb-0">
                    <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" id="colorBtn"><i class="fas fa-calendar-alt"></i>
                      Select date range
                    </button>

                  </h5>
                </div>
                <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                  <div class="card-body">
                    <!--START: fechas para elegir-->
                    <div class="form-group row">
                      <label for="registersDateFilter1" class="col-2 col-form-label"></label>
                      <div class="col-10">
                        <!-- FILTER DATA IN A RANGE-->
                        <form action="<?php echo constant('URL'); ?>/LoginController/checkFilteredData" method="get" id="form1">
                          <input class="date-own form-control" type="text" value="Select date" id="registersDateFilter1" name="startDate">
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
                      <label for="registersDateFilter2" class="col-2 col-form-label"></label>
                      <div class="col-10">
                        <input class="date-own form-control" type="text" value="Select date" id="registersDateFilter2" name="endDate">
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
                    </form>
                    <!-- <input class="btn btn-light" id="btn-outline-light" type="button" name="filterBoton" value="CHECK" type="submit" form="form1"><i class="fas fa-share"></i>  -->
                    <!-- boton provisional test formulario -->
                    <button type="submit" form="form1" class="btn btn-light" id="btn-outline-light"><i class="fas fa-share"></i>
                      Filter</button>
                    <!-- </input> -->
                    <!--VIEJO BOTÓN DE FILTRAR<button type="button" class="btn btn-light" id="btn-outline-light"><i class="fas fa-share"></i>
                Filter</button>-->
                    <!--END: fechas para elegir-->
                  </div>
                </div>
              </div>
              <div class="card2">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <form action="<?php echo constant('URL'); ?>/LoginController/showIncompleteDays" method="get" id="form2">
                    </form>
                    <button type="submit" form="form2" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" id="colorBtn2"> <i class="fas fa-calendar-minus"></i>
                      Incomplete
                    </button>

                  </h5>
                </div>


              </div>
              <div class="card3">
                <div class="card-header" id="headingThree">
                  <h5 class="mb-0">
                    <form action="<?php echo constant('URL'); ?>/LoginController/showNoClockedInDays" method="get" id="form3">
                    </form>
                    <button type="submit" form="form3" class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="colorBtn3"><i class="fas fa-calendar-times"></i>
                      Missed
                    </button>
                  </h5>
                </div>
              </div>
            </div>
          </ul>
        </li>

        <li>
          <!-- AQUÍ LLAMA AL METODO chartsTest  -->
          <a href="chartsTest"><i class="fas fa-chart-pie"></i> Statistics</a>
        </li>
        <li>
          <a href="https://movicoders.com/contact/" target="_blank"> <i class="fas fa-inbox"></i> Contact </a>

        </li>
      </ul>


    </nav>

    </nav>
    <!-- El coment de la pagina  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-outline-secondary">
            <i class="fas fa-bars"></i>
            <span id="menucolor"></span>
          </button>
          <div class="topnav-centered d-none d-xl-block d-lg-block">
            <a href="#" class="active ">Control de fichajes</a>
          </div>


          <!--  <h5 class="modal-title" id="cnt-fichaje"> Control de Fichajes </h5>-->

          <!--La Barra donde aparecen los diferentes iconos que podemos ver en pantall -->
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto  ">

              <li class="nav-item active">
                <!--User-->

              <li class="nav-item active">
                <!--User-->
                <a class="nav-link" href="#"><i class="fas fa-user " id="userid"></i></i></a>
              </li>

              <li class="nav-item">
                <!--Home
                <a class="nav-link" href="https://movicoders.com/" target="_blank"><i class="fas fa-home" id="homeid"></i> </a>
              </li>

              <li class="nav-item">
                CONFIG 
                <a class="nav-link" data-toggle="modal" id="btn-config" data-target=".bd-example-modal-lg"><i class="fas fa-user-cog "></i> </a>
                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                      hola
                    </div>
                  </div>
                </div>
              </li>
-->
              <li class="nav-item">
                <!--Salida-->
                <a class="nav-link" href="exit"><i class="fas fa-sign-out-alt" id="exitid"></i> </a>

              </li>
            </ul>
          </div>
        </div>
      </nav>
     
      <p class="h1" id="nombre-centrados ">Entradas Semanales </p>
      <table class="table table-borderless " id="datos-centrados">
        <!--BOTON MODAL
            <th scope="row">
              <button type="submit" data-toggle="modal" data-target="#PanelModal" id="btn-modal-user" class="btn btn-outline-dark">
                <i class="far fa-address-card"></i> </i></button></th>
            </th>
 -->
            <?php
            error_reporting(E_ERROR | E_PARSE);
            if($data[0]== null){
              echo "<h3>There is no data.</h3>";

            }else {
            //print_r($data[0]->calendarDate);
            $calendarDateExist =property_exists($data[0], 'calendarDate');
            if($calendarDateExist == 1){
              for ($i = 0; $i < count($data); $i++) {
                echo "<tr>";
                echo "<td>" . $data[$i]->calendarDate . "</td>";
                echo "</tr>";
              }
            }else {
              //recorre el num de entradas que hay
            $curDate = 0;
            //verificar datos que le llega: si es del calendario o del clocking
            for ($i = 0; $i < count($data); $i++) {
              if ($data[$i]->clockingDate == $curDate) {
                echo "<tr>";
                echo "<td>" . $data[$i]->clockingTime . "</td>";
                echo "<td>" . $data[$i]->clockingType . "</td>";
                echo "</tr>";
              } else {
				echo '<th scope="col" class="edit1" id="'.$data[$i]->clockingDate.'"><i class="far fa-calendar-alt" ></i>' .'    Date:    <span data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">'.'  '.$data[$i]->clockingDate . "</span></th>";
                echo "<tr>";
                echo '<th scope="col" class="edit2">'.' Hora: '."</th>";
                echo '<th scope="col" class="edit3">'.' Tipo'.'</th>';
                echo "<tr>";
                echo "<td>" . $data[$i]->clockingTime . "</td>";
                echo "<td>" . $data[$i]->clockingType . "</td>";
                echo "</tr>";
                echo "</tr>";
                $curDate = $data[$i]->clockingDate;
              }
                 }
      }
    }
			
			 ?>
			 
        </tbody>
      </table>

      <!-- ventana modal insertar fichajes -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel11">Cambio de Fecha</h5>
              <!-- botón cerrar -->
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			<form action="<?php echo constant('URL'); ?>/LoginController/insertMissedClocking" method="post" id="formInsert">
            <div mbsc-page class="demo-time-picker">
            
                <div class="form-group">
                  <div class="mbsc-grid mbsc-form-grid">
                    <div class="mbsc-form-group">
                      <div class="mbsc-col-sm-12 mbsc-col-md-4">
                        <label>
                          Select Time
                          <input mbsc-input data-input-style="box" data-label-style="stacked" id="demo-time-24h" name="timeHours" />
                        </label>
                      </div>
                    </div>
                  </div>
                </div>
                <select id="comboType" name="type" >
                  <!-- Combo box -->
                  <option value="entrance" >Entrance</option>
                  <option value="exit" selected>Exit</option>
                </select> 
                <input type="hidden" id="selectedDate" name="selectedDate" value="">
               

              </form>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary" form="formInsert">Send message</button>
            </div>
          </div>
        </div>
      </div>
    </div>
    <script>
      mobiscroll.settings = {
        lang: 'en',
        theme: 'ios',
		
        themeVariant: 'light',
        display: 'bubble'
      };

      mobiscroll.time('#demo-time-24h', {
        timeFormat: 'HH:ii',
        onInit: function(event, inst) {
          inst.setVal(now, true);
        }
      });


      document
        .getElementById('show-demo-time-external')
        .addEventListener('click', function() {
          instance.show();
		  
        }, false);
</script>
     
  <!--<p>Date: <input type="text" id="fromDate"> TO <input type="text" id="toDate"></p>-->

  <!-- jQuery CDN -  AJAX -->
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
  <!-- Popper.JS -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
  <!-- Bootstrap JS -->
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  <!-- jQuery Custom Scroller CDN -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

  <!-- JavaScript funcion para el movimiento lateral   -->
  <script defer src="../views/static/JavaScript/user.js"></script>
  <script defer src="../views/static/JavaScript/filtro.js"></script>
  <script src=""></script>


</body>

</html>