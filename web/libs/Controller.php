<?php


    class Controller {
         //in the same controller, there's the view and the model
        function __construct(){
            //VIEW
            $this->view = new View();
        }
        function loadModel($model){
            $url = "models/".$model."model.php";
            if(file_exists($url)){
                require $url;
                $modelName = $model.'Model';
                //MODEL
                $this->model = new $modelName();
            }
        }


    }



?>