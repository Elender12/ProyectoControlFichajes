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
        //probando datos
        if(isset($_POST["startDate"])){
            $startDate =$_POST["startDate"];
        }
        if(isset($_POST["endDate"])){
            $endDate=$_POST["endDate"];
        }

        if(isset($_SESSION["worker"]) != NULL){
            echo "te has salvado del null";
        }
         $worker= "Y3423283H";


    
       

        $conexion = new UsersModel();
        $result = $conexion-> checkFilteredDataClockIn($worker,$startDate,$endDate);
        //prints the data
        print_r( $result);
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
    function chartsTest(){
        $conexion = new UsersModel();
        $result = $conexion->testCharts();
        echo $result;
    }

 

}


?>