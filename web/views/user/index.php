<?php if (session_status() == PHP_SESSION_NONE) {
    session_start();
  
  //evita que se guarde la sesion vacia si ya existia
  if (!isset($_SESSION["worker"])) {
    $_SESSION["worker"] = $_GET["worker"];
   
    $_SESSION["pass"] = $_GET["pass"];
    

  }
}

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
      //  var idWorker= document.getElementById("idWorker").innerText;
      //console.log("entra aqui");
      
      //console.log(idWorker);
        // test= document.getElementById("myId").innerText;
        var url_string = window.location.href;
        console.log(url_string);
        var url = new URL(url_string);
        var c = url.searchParams.get("worker");
        console.log(c);
        document.getElementById("targetWorker").value = c;
        document.getElementById("incomButon1").value = c;
        document.getElementById("incomButon2").value = c;
        document.getElementById("incomButon3").value = c;
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
   echo '<p hidden id="idWorker">'.$_SESSION["worker"].'</p>';
  // //evita que se guarde la sesion vacia si ya existia
  // if (!isset($_SESSION["worker"])) {
  //   $_SESSION["worker"] = $_GET["worker"];
   
  //   $_SESSION["pass"] = $_GET["pass"];
    

  //}
  ?>
  
  <!-- php sessions END -->
  <div class="wrapper">
    <!-- Sidebar Con todas sus partes  -->
    <nav id="sidebar">
      <div class="sidebar-header">
		<h3>Movicoders</h3>

		<br><h6> <i class="fas fa-lg fa-user" ></i>   <?php 
                  if(isset($_SESSION["workerName"])){
					echo '<th class="idworker">' . $_SESSION["workerName"] . '</th>';
				
                  }else if(isset($_SESSION["adminName"])){
					  
                      echo '<th class="idadmin">' . $_SESSION["adminName"]. '</th>';
                  }
                
                 ?></br></h6>
				 
					   <?php 
					
      //  if(isset($_SESSION["workerNAME"])){
      //   echo $_SESSION["workerNAME"];
      //   echo $_SESSION["NOMBRE"];
      // }
      if(isset($_SESSION["NOMBRE"])){
       // nombre del trabajador 
        echo " User :".' '. $_SESSION["NOMBRE"] ;
      }
       ?>
	  
      </div>
      <ul class="list-unstyled components">
        <!-- <p><i class="fas fa-chevron-circle-down"></i>  Menu</p>-->
        <li>
			
          <a class="d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">
            <i class="fas fa-mobile-alt"></i> Phone</i></a>
          <ul class="collapse list-unstyled" id="pageSubmenu">

            <li class="nav-item active">
              <!--User-->
              <a class="nav-link d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" href="goIndex" ><i class="fas fa-home"></i> Home</a>
			</li>
			
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
                    <input type="hidden" id="incomButon1" name="worker" value="">
                    </form>
                    <button type="submit" form="form1" class="btn btn-light" id="btn-outline-light"><i class="fas fa-share"></i>
                      Filter</button>
                  </div>
                </div>
              </div>
              <div class="card2">
                <div class="card-header" id="headingTwo">
                  <h5 class="mb-0">
                    <form action="<?php echo constant('URL'); ?>/LoginController/showIncompleteDays" method="get" id="form2">
                    <input type="hidden" id="incomButon2" name="worker" value="">
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
                    <input type="hidden" id="incomButon3" name="worker" value=""> 
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
    
    <!-- El coment de la pagina  -->
    <div id="content">
      <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
          <button type="button" id="sidebarCollapse" class="btn btn-outline-secondary">
            <i class="fas fa-bars"></i>
            <span id="menucolor"></span>
          </button>
          <div class="topnav-centered d-none d-xl-block d-lg-block">
            <a href="#" class="active ">Assistance control</a>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto  ">

              <li class="nav-item active">
                <!--User-->
              <li class="nav-item active">
                <!-- nombre usuario-->
                <?php 
                //quien está realmente en la sesion -- debe salir en el log
                  if(isset($_SESSION["workerName"])){
                   // echo $_SESSION["workerName"];
                  }else if(isset($_SESSION["adminName"])){
                     // echo $_SESSION["adminName"];
                  }
                
                 ?>
                <!--User-->
              <!--  <a class="nav-link" href="#"><i class="fas fa-user " id="userid"></i></i></a>
			  </li>-->
			  <li class="nav-item">
                <!--Home que llama al método del controlador-->
                <a class="nav-link" href="goIndex" ><i class="fas fa-home" id="homeid"></i> </a>
              </li>

              <li class="nav-item">
                <!--Salida-->
                <a class="nav-link" href="exit"><i class="fas fa-sign-out-alt" id="exitid"></i> </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>

      <!-- <p class="h1" id="nombre-centrados ">Entradas Semanales </p> -->
      <p class="h1" id="nombre-centrados ">Weekly clocking-in registers</p>
      <table class="table table-borderless " id="datos-centrados">
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
				echo '<th scope="col" class="edit1" id="'.$data[$i]->clockingDate.'"><i class="far fa-lg fa-calendar-alt" ></i> ' .'        <span data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">'.'  '.$data[$i]->clockingDate . "</span></th>";
                echo "<tr>";
                echo '<th scope="col" class="edit2">'.' <i class="far  fa-lg fa-clock"></i>'."</th>";
                echo '<th scope="col" class="edit3">'.'  <i class="fas fa-lg fa-door-open"></i>'.'</th>';
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
                <input type="hidden" id="targetWorker" name="targetWorker" value="">
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