

<?php
    if (session_status() == PHP_SESSION_NONE) {
		session_start();
	}

    $echoedShout = "";

    if(count($_POST) > 0) {
		$_SESSION['worker'] = $_POST['worker'];
		$_SESSION['pass'] = $_POST['pass'];

        header("HTTP/1.1 303 See Other");
		header("Location: /ControlFichajes/web/LoginController/login");
        die();
    }
    else if (isset($_SESSION['worker'])){
        $echoedShout = $_SESSION['worker'];

        /*
            Put database-affecting code here.
        */

        session_unset();
        session_destroy();
    }
?>


<html>
    <head>
        <meta charset="utf-8">
    <title>Login</title>
    <!--Hay que usar JQUERY para usar bien BOOTSTRAP  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
      <!-- Icono con la m de movicoders en la ventana -->
	  <link rel="shortcut icon" href="../views/static/img/favicon.ico" />
	  
    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina tambien es importado-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
 
    <!-- Es de donde se importa el  css-->
    <link rel="stylesheet" type="text/css" href="./views/static/css/index.css" th:href="@{/css/index.css}">
    <link rel="stylesheet" type="text/css" href="../views/static/css/index.css" th:href="@{/css/index.css}">
	</head>
	 <!---->
    <body>
	<div class="limiter">
		<div class="container-login100">
			<div class="wrap-login100">
			<form  action="<?php echo constant('URL'); ?>/LoginController/login" method="POST">
				<form class="login100-form validate-form">
					<span class="login100-form-title p-b-26">
					MOVICODERS
					</span>
					<span class="login100-form-title p-b-48">
						<i class="zmdi zmdi-font"></i>
					</span>

					<div class="wrap-input100 validate-input" data-validate = "User:">
						<input class="input100" type="text" placeholder="Usuario" name = "worker"  autofocus required />
						<span class="focus-input100"></span>
					</div>

					<div class="wrap-input100 validate-input" data-validate="Enter password">
						<span class="btn-show-pass">
							<i class="zmdi zmdi-eye"></i>
						</span>
						<input class="input100" type="password" placeholder="Contraseña" name = "pass"  autofocus required/>
						<span class="focus-input100"></span>
					</div>
					<div class="col text-center">
					<button type="submit" class="btn btn-outline-primary"><i class ="fas fa-sign-in-alt "></i> Entrar </button>
					</div>		
					</form>
				</form>
				<div class="text-center p-t-115" >
						
						<a class="txt2" href="#">
							Forgot password?
			</div>
		</div>
	</div>
    </body>
</html>
	
 