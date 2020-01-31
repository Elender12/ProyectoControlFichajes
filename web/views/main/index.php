<?php session_start();
?>
<!DOCTYPE html>
<html>
<!-- este es el index de main -->

<head>
    <meta charset="utf-8">
    <title>Login</title>



    <!--Hay que usar JQUERY para usar bien BOOTSTRAP  -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- FRAMEWORK BOOTSTRAP para el estilo de la pagina tambien es importado-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Los iconos tipo Solid de Fontawesome los importo y los utilizo mas adelante-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.8/css/solid.css">
    <script src="https://use.fontawesome.com/releases/v5.0.7/js/all.js"></script>

    <!-- Es de donde se importa el  css-->
    <link rel="stylesheet" type="text/css" href="views/static/css/index.css" th:href="@{/css/index.css}">

</head>

<body>


    <div class="modal-dialog text-center">
        <div class="col-sm-8 main-section">
            <div class="modal-content">
                <div class="col-sm-12 user-img">
                    <img src="views/static/img/user-avatar-pngrepo-com.png">
                </div>
                <form class="col-12" action="<?php echo constant('URL'); ?>/LoginController/login" method="POST">

                    <input type="text" class="from-control" placeholder="Usuario" name="worker" autofocus required />
                  
                    <div class="form-group" id="user-group">
                  
                    </div>

                    <div class="form-group" id="contrasena-group">
                        <input type="password" class="from-control" placeholder="Contraseña" name="pass" autofocus required />
                    </div>
                    <button type="submit" class="btn btn-dark"><i class="fas fa-sign-in-alt "></i> Entrar </button>
                
                </form>
            </div>
        </div>
    </div>
</body>

</html>