<?php
session_start();
class LoginController extends Controller{
    function __construct()  {
        //llamo al contructor del Controller
        parent::__construct();
        //call the object and the method
        //$this->view->render("login/index");
        //$this->view->render("main/index");
       
    }

    function login(){
        //gets the data from the index
         $worker=$_POST["worker"];
         $pass = $_POST["pass"];
        $conexion = new UsersModel();
        //calls the method that has the query prepared
        $result = $conexion->checkLogin($worker,$pass);
       // require "views/user/index.php";
        echo $result;
       
        //
    }
    // function showData(){
    //     $worker=$_SESSION["worker"];
    //     $conexion = new UsersModel();
    //     $result = $conexion->showMonthRegister($worker);
    //     echo $result;
    // }
    
    function checkFilteredData(){
        //probando datos

        if(isset($_POST["startDate"])){
            $startDate =$_POST["startDate"];
        }
        //controlar cuando no hay datos
        if(isset($_POST["endDate"])){
            $endDate=$_POST["endDate"];
        }
       //echo $_POST["startDate"];
       $worker = $_SESSION["worker"];
       $conexion = new UsersModel();
        $result = $conexion-> checkFilteredDataClockIn($worker,$startDate,$endDate);
        //prints the data
        echo $result;
        //var_dump($result);
    }
    function showIncompleteDays(){
        //TODO
        $worker=$_SESSION["worker"];
        $conexion = new UsersModel();
        $result = $conexion->checkIncompleteDays($worker);
        echo $result;
      
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
	
    function goIndex(){
        // $conexion = new UsersModel();
        // $result = $conexion->goHome();
        // echo $result;
        $worker= $_SESSION["worker"];
        $pass = $_SESSION["pass"];
       // $worker = "Y3423283H";
        //$pass = "123";
       $conexion = new UsersModel();
       //calls the method that has the query prepared
       $result = $conexion->checkLogin($worker,$pass);
       echo $result;
    }



    function sendData(){
        $conexion = new UsersModel();
        //calls the method that has the query prepared
        $worker= $_SESSION["worker"];
        $result = $conexion->statisticsData($worker);
        echo $result;
     }
}


?>