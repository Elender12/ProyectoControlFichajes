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
    function editData(){
        // $startDate =$_POST["startDate"];
        // $endDate=$_POST["endDate"];
        // $worker=$_SESSION["worker"];
        //test data
        $startDate =$_POST["2020-01-01"];
        $endDate=$_POST["2020-04-01"];
        $worker=$_SESSION["Y3423283H"];
        $conexion = new UsersModel();
        $result = $conexion-> editDataClockIn($worker,$startDate,$endDate);
        var_dump($result);
    }
    function showIncompleteDays(){
        //TODO
    }
    function showNoClockedInDays(){
        //TODO
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