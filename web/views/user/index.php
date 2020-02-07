<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>User</title>
    
   
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

</head>
<body>
  <!-- php sessions START-->
  <?php $_SESSION["worker"] = $_POST["worker"]; ?> 

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
                <a class="d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none"a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" >
                <i class="fas fa-mobile-alt"></i> Phone</i></a>
                <ul class="collapse list-unstyled" id="pageSubmenu">

                  <li class="nav-item active"> <!--User-->
                    <a class="nav-link d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" href="#"><i class="fas fa-user"></i> User</a>
                </li>
                
                <li class="nav-item"> <!--Home-->
                  <a class="nav-link d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" href="https://movicoders.com/"><i class="fas fa-home"></i> Home</a>
              </li>
                <li class="nav-item"  > <!--CONFIG -->
                  <a class="nav-link   d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none"data-toggle="modal" 
                                        id="btn-config" 
                                        data-target=".bd-example-modal-lg">
                                        <i class="fas fa-user-cog "></i> Config</a> 

                  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg">
                      <div class="modal-content">
                        ..............
                      </div>
                    </div>
                  </div>
              </li>
                <li class="nav-item"><!--Salida-->
                  <a class="nav-link   d-block d-sm-none d-sm-block d-md-none d-md-block d-lg-none" href="../Html/index."><i class="fas fa-sign-out-alt"></i> Exit</a>
                  
              </li>
                  
                </ul>
            </li>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class=" -toggle"><i class="fas fa-filter"></i> Filtro</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                      <div class="form-group row">
                        <label for="example-date-input" class="col-2 col-form-label"></label>
       
                        <div class="col-10">
                          <!-- start FORM for the filter -->
                          <!-- IMPORTANT-> TODO implements form action -->
                        <form action="" method="get" id="form1">
                          <!-- INPUT startDate -->
                          <input class="form-control" type="date" value=" 2-2-2020" id="example-date-input" name="startDate"> <!-- hay que pasar los datos del calenario a  parametro de base de datos-->
                        </div>
                      </div>
                  <div class="form-group row">
                    <label for="example-date-input1" class="col-2 col-form-label"></label>
                      <div class="col-10">
                         <!-- INPUT startDate -->
                        <input class="form-control" type="date" value=" End" id="example-date-input1" name="endDate">
                          </div>
                        </div>
                        <!-- end FORM -->
                </form>   
                      <button type="button" class="btn btn-light" id="btn-outline-light"><i class="fas fa-share"  type="submit" form="form1" value="Enviar"></i> Enviar</button> <!--BOTON ENVIER GRAFICOS-->
                    </ul> 
                    </li>
                <li>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" ><i class="fas fa-chart-pie"></i> Graficos</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                    </ul>
                </li>
                     <li>
                       <a href="https://movicoders.com/contact/"><i class="fas fa-inbox"></i> Contact </a>
                </li>
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
                    </button>
                  <!--  <h5 class="modal-title" id="cnt-fichaje"> Control de Fichajes </h5>-->
                    
                    <!--La Barra donde aparecen los diferentes iconos que podemos ver en pantall -->
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto  ">

                            <li class="nav-item active"> <!--User-->
                                <a class="nav-link" href="#"><i class="fas fa-user"></i></i></a>
                            </li>

                            <li class="nav-item"> <!--Home-->
                                <a class="nav-link" href="https://movicoders.com/"><i class="fas fa-home"></i> </a>
                            </li>

                            <li class="nav-item"  > <!--CONFIG -->
                                <a class="nav-link"data-toggle="modal" 
                                                      id="btn-config" 
                                                      data-target=".bd-example-modal-lg">
                                                      <i class="fas fa-user-cog "></i> </a> 

                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                  <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                      ..............
                                    </div>
                                  </div>
                                </div>
                            </li>

                            <li class="nav-item"><!--Salida-->
                                <a class="nav-link" href="exit"><i class="fas fa-sign-out-alt"></i> </a>
                                
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
                            <table class="table ">
                              
                                <thead>
                                  <tr>
                                    <th scope="col">Dni</th>
                                    <th scope="col">Entrada</th>
                                    <th scope="col">Salida</th>
                                    <th scope="col">ASDAD</th>
                                    <th scope="col">ASDAD</th>
                                    <th scope="col">ASDAD</th>
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
                                    <td >Jacob</td>
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
            
            <p class="h1"id="nombre-centrados">Entradas Semanales </p>
            <table class="table table-striped "id="datos-centrados">
              
                <thead>
                  <tr>
                    <th scope="col"><i class="fas fa-user"></i> User</th>
                    <th scope="col"><i class="far fa-calendar-alt"></i> Fecha </th>
                    <th scope="col"><i class="fas fa-door-open"></i> Entrada</th>
                    <th scope="col"><i class="fas fa-door-closed"></i> Salida</th>
                 
                  </tr>
                </thead>

                <tbody>
                  <tr>
                      <!--BOTON MODAL -->
                      <th scope="row">
                      <button type="submit"  data-toggle="modal" data-target="#PanelModal" 
                      id="btn-modal-user" class="btn btn-outline-dark">
                      <i class ="far fa-address-card"></i> </i></button></th>
                    </th>

                   
                      <td>dato0</td>
                      <td>dato1</td>
                      <td>dato2</td>
               
                    </tr>
               
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
              
                  
             <?php  for ($i=0; $i< count($data); $i++) {
                 //pintar datos correctamente en la tabla principal fichaje mes
                echo "<td>"."num orden".$data[$i]->orderN." fecha".$data[$i]->date."</td><td>".$data[$i]->time.$data[$i]->type."</td><td><br>";
              
             
            }?>
            

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