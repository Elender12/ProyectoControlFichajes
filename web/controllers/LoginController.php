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
        $conexion = new UsersModel();
        //calls the method that has the query prepared
        $result = $conexion->checkLogin($worker,$pass);
        echo $result;
    }
    function showData(){
  
        $worker=$_SESSION["worker"];
        $conexion = new UsersModel();
        $result = $conexion->showMonthRegister($worker);
        echo $result;

    }
    function checkFilteredData(){
        $startDate =$_POST["startDate"];
        $endDate=$_POST["endDate"];
        $worker=$_SESSION["worker"];
        
        $conexion = new UsersModel();
        $result = $conexion-> checkFilteredDataClockIn($worker,$startDate,$endDate);
        echo $result;
    }
    function showIncompleteDays(){
        //TODO
        $worker=$_SESSION["worker"];
        $conexion = new UsersModel();
        $result = $conexion->checkIncompleteDays($worker);
      
    }
    function showNoClockedInDays(){
        //TODO
        $worker=$_SESSION["worker"];
        $conexion = new UsersModel();
        $result= $conexion->checkNoClockedInDays($worker);
        echo $result;
    }
    public function exit(){
        $conexion = new UsersModel();
        $result = $conexion->exitBack();
        echo $result;
        
    }

 

}


?>