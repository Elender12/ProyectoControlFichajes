<?php

require_once 'controllers/Errors.php';
class App {
    function __construct(){
        //gets the url
        $url= isset($_GET['url']) ? $_GET['url']: null;
        //separates the arguments
        $url = rtrim($url, '/');
        $url = explode('/',$url);
        
        //no argument in the URL
        if(empty($url[0])){
            //redirects to the main page
            $fileController = "controllers/main.php";
            require_once $fileController;
            $controller = new Main();
            $controller->loadModel('main');
            return false;
        }

        $fileController = 'controllers/'.$url[0].'.php';
    
        if(file_exists($fileController)){
            require_once $fileController;
            $controller = new $url[0];
            $controller->loadModel($url[0]);
            //calls a method from the class
            if(isset($url[1])){
                $controller->{$url[1]}();
            }else {
                //
            }
        }else {
            //shows an error
            $controller = new Errors("There was an error.");
        }
       
    }
}

?>