<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">

  <title>Error</title>

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

  
  


</head>
<body>
 
  <div class="wrapper">
    <!-- Sidebar Con todas sus partes  -->
    <nav id="sidebar">
      <div class="sidebar-header">
		<h3>Movicoders</h3>

		
      </div>
      <ul class="list-unstyled components">
        
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
            <a href="#" class="active ">Error</a>
          </div>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="nav navbar-nav ml-auto  ">

              <li class="nav-item">
                <!--Salida-->
                <a class="nav-link" href="exit"><i class="fas fa-sign-out-alt" id="exitid"></i> </a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      
      <p id="error"><?php echo $this->msg; ?></p>
      

      
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