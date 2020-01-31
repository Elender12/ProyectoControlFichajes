<?php session_start(); ?>
<!DOCTYPE html>
<!-- archivo index de USER   -->
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>User</title>
    
    <!-- JavaScript funcion para el movimiento lateral   -->
    <script defer src="C:\TestServer\ClockingInControl\views\static\JavaScript\filtro.js"></script>
    <!-- <script src="../static/JavaScript/filtro.js"></script> -->
    <!-- <script src=""></script> -->

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <!-- MI CSS -->
    <!-- <link  rel="stylesheet" type="text/css" src="C:/TestServer/ClockingInControl/views/static/css/user.css"> -->
    <!-- <link  rel="stylesheet" src="C:\TestServer\ClockingInControl\views\static\css\user.css"> -->

    <link rel="stylesheet" src="../static/css/user.css">
    
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
</head>
<body>
    <?php $_SESSION["worker"]= $_POST["worker"]; ?>
    <div class="wrapper">
        <!-- Sidebar Con todas sus partes  -->
        <nav id="sidebar">
            <div class="sidebar-header">
               
                <h3>Movicoders</h3>
            </div>
            <ul class="list-unstyled components">
                <p><i class="fas fa-chevron-circle-down"></i>  Menu</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class=" -toggle">Filtro</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">

                      <div class="container">
                        <div class='col-md-15'>
                            <div class="form-group">
                               <div class="input-group date" id="datetimepicker7" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker7"/>
                                    <div class="input-group-append" data-target="#datetimepicker7" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='col-md-15'>
                            <div class="form-group">
                               <div class="input-group date" id="datetimepicker8" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#datetimepicker8"/>
                                    <div class="input-group-append" data-target="#datetimepicker8" data-toggle="datetimepicker">
                                      <div class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
                                </div>
                            </div>
                            <button type="submit" id="btnBuscar" class="btn btn-dark"><i class="fas fa-search"></i> Buscar </button>
                          
                        </div>
                    </div>
                    <script type="text/javascript"></script>
                     </ul>
                     </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" >Graficos</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                    </ul>
                </li>
                <li>
                    <a href="https://movicoders.com/contact/">Contact</a>
                </li>
            </ul>
            <ul class="list-unstyled CTAs">
            </ul>
        </nav>
        <!-- El coment de la pagina  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <button type="button" id="sidebarCollapse" class="btn btn-outline-secondary">
                      <i class="fas fa-bars"></i>
                        <span>Menu</span>
                    </button>

                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <i class="fas fa-align-justify"></i>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active">
                                <a class="nav-link" href="#"><i class="fas fa-building"></i>Movicoders </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="https://movicoders.com/"><i class="fas fa-home"></i> Home</a>
                            </li>
                            <li class="nav-item"  >
                                <a class="nav-link" href="#"><i class="fas fa-user"></i> User</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="../Html/index.html"><i class="fas fa-sign-out-alt"></i> Salir</a>
                                
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div>
                <div class="modal fade bd-example-modal-lg" id="PanelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLabel"> Fichaje Personal </h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          
                          <!--Tabla dentro de la modal -->
                            <table class="table table-striped table-dark">
                                <thead>
                                  <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">First</th>
                                    <th scope="col">Last</th>
                                    <th scope="col">Handle</th>
                                  </tr>
                                </thead>
                                <tbody>
                                  <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                  </tr>
                                  <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                  </tr>
                                </tbody>
                              </table>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div>
            </div>

            <h2>Datos Semanales</h2>
            <table class="table table-striped ">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fecha </th>
                    <th scope="col">Entrada</th>
                    <th scope="col">Salida</th>
                 
                  </tr>
                </thead>
                <tbody>
                  <tr>
                      <!--BOTON MODAL -->
                      <th scope="row">
                      <button type="submit"  data-toggle="modal" data-target="#PanelModal" class="btn btn-outline-dark"><i class ="far fa-address-card"></i> </i></button></th>
                    </th>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <th scope="row">1
                       
                   
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">2</th>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                  <tr>
                    <th scope="row">3</th>
                    <td></td>
                    <td></td>
                    <td></td>
                  </tr>
                </tbody>
              </table>
            <h2></h2>
            <p> </p>

            <div class="line"></div>

            <h2></h2>
            <p> </p>

            <div class="line"></div>

            <h3></h3>
            <p></p>
        </div>
    </div>

    
  <!--<p>Date: <input type="text" id="fromDate"> TO <input type="text" id="toDate"></p>-->

    <!-- jQuery CDN -  AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

   
</body>

</html>