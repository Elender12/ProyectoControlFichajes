<?php

class LoginController extends Controller{
    function __construct()  {
        //llamo al contructor del Controller
        parent::__construct();
        //call the object and the methodf
       // $this->view->render("login/index");
        //$this->view->render("main/index");
       
    }

    function login(){
        //gets the data from the index
         $worker=$_POST["worker"];
         $pass = $_POST["pass"];
        //makes an object
        $conexion = new UsersModel();
        //calls the method that has the query prepared
        $result = $conexion->checkLogin($worker,$pass);
        echo $result;
    }
    function showData(){
        echo"<p>Gelou from showData</p>";
        $worker=$_SESSION["worker"];
        echo "el valor de worker de la sesion es $worker";

        $conexion = new UsersModel();
        $result = $conexion->showMonthRegister($worker);
        echo $result;

    }
 

}


?>