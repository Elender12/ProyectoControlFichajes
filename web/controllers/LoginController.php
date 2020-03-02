<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
class LoginController extends Controller
{
    public function __construct()
    {
        //llamo al contructor del Controller
        parent::__construct();
        //call the object and the method
        //$this->view->render("login/index");
        //$this->view->render("main/index");
    }

    public function login()
    {
        
        //gets the data from the index
        if (count($_POST) > 0) {
            $_SESSION['worker'] = $_POST['worker'];
            $_SESSION['workerInicial'] = $_POST['worker'];
            $_SESSION['pass'] = $_POST['pass'];
            header("HTTP/1.1 303 See Other");
            header("Location: /ControlFichajes/web/LoginController/login");
            die();
        }
        else if (isset($_SESSION['worker'])){
            $worker= $_SESSION["worker"];
            $worker1 =  $_SESSION['workerInicial'];

            $pass = $_SESSION["pass"];
            $conexion = new UsersModel();
            $result = $conexion->checkLogin($worker1, $pass);
            echo $result;
        }

    }
    function checkFilteredData(){
       
        $worker=$_GET["worker"];
        echo $worker;

       if($worker == null){
           //cambiar aqui
        
            $worker = $_SESSION["worker"];
       }
        if(isset($_GET["startDate"]) && isset($_GET["endDate"]) ){
            $startDate =$_GET["startDate"];
            $endDate=$_GET["endDate"];
            $conexion = new UsersModel();
            $result = $conexion-> checkFilteredDataClockIn($worker, $startDate, $endDate);
            //prints the data
            echo $result;
        } else {
            return;
        }
    }

    public function showIncompleteDays()
    {
        //TODO
       // $worker=$_SESSION["worker"];
        $worker=$_GET["worker"];
        $conexion = new UsersModel();
        $result = $conexion->checkIncompleteDays($worker);
        echo $result;
    }
    
    public function showNoClockedInDays()
    {
        //TODO
       // $worker=$_SESSION["worker"];
       $worker=$_GET["worker"]; 
       $conexion = new UsersModel();
        $result= $conexion->checkNoClockedInDays($worker);
        echo $result;
    }

    public function getInputFromFiltersRange()
    {
        $_SESSION["filterStartDate"] = $_GET["startDate"];
        
        if (($_GET["endDate"])== "0000-00-00") {
            $date= explode('-', $_SESSION["filterStartDate"]);
            $year  = $date[0];
            $month = $date[1];
            $day   = "31";
            $_SESSION["filterEndDate"]=$year."-".$month."-".$day;
        }else if (($_GET["endDate"])== "1111-00-00"){
            $_SESSION["filterEndDate"]=$_SESSION["filterStartDate"]."-"."12"."-"."31";
        } else  {
           $_SESSION["filterEndDate"] = $_GET["endDate"];
        }
       
        $result = $this->chartsTest();
        echo $result;
    }

    public function exit()
    {
        $conexion = new UsersModel();
        $result = $conexion->exitBack();
        echo $result;
    }

    public function chartsTest()
    {
        $conexion = new UsersModel();
        $result = $conexion->testCharts();
        echo $result;
    }
    
    public function goIndex()
    {
        // $conexion = new UsersModel();
        // $result = $conexion->goHome();
        // echo $result;
        $worker= $_SESSION["worker"];
        $pass = $_SESSION["pass"];
        // $worker = "Y3423283H";
        //$pass = "123";
        $conexion = new UsersModel();
        //calls the method that has the query prepared
        $result = $conexion->checkLogin($worker, $pass);
        echo $result;
    }



    public function sendData()
    {
        $conexion = new UsersModel();
        //calls the method that has the query prepared
        $result = $conexion->statisticsData();
        echo $result;
    }
    public function insertMissedClocking()
    {
        $conexion = new UsersModel();
        $timeHours= $_POST["timeHours"];
        $type= $_POST["type"];
        $selecDate= $_POST["selectedDate"];
      
       echo $_SESSION["adminDNI"]." valor de adminName";
       //$worker=$_GET["worker"];
       if($_GET["targetWorker"] == null){
       //desde el user normal
        $worker= $_SESSION["worker"];
        $result = $conexion->insertData( $worker,$selecDate,$timeHours,$type);
        header("Location: /ControlFichajes/web/LoginController/login");
       }else {
        $worker = $_GET["targetWorker"]; //datos del trabajador
        
        
        if($_SESSION["adminDNI"] != null){

            $result = $conexion->insertData( $_SESSION["adminDNI"] ,$selecDate,$timeHours,$type);
           header("Location: /ControlFichajes/web/LoginController/login");

        }
       }
     
        
        // echo $worker." valor de session worker";
         //echo $_SESSION["adminDNI"]." valor de admin dni" ;
  //************** */
        // if($_SESSION["worker"] != null){
        //     $result = $conexion->insertData( $worker,$selecDate,$timeHours,$type);
        //     //header("Location: /ControlFichajes/web/LoginController/login");

        // }
    
       
        
     }
     function showUserInfoFromAdmin(){
         $_SESSION["worker"]= $_GET["worker"];
         $worker = $_SESSION["worker"];
         //require "views/user/index.php";
         //$worker= $_GET["dni"];
        //echo "$worker";
        
        $conexion = new UsersModel();
        $result = $conexion->showUserInfoFromAdminPage($worker);
         echo $result;
     }
     function getWorkerName($worker){
        $worker = $_GET["worker"];
        $conexion = new UsersModel();
        $name = $conexion->getWorkerName($worker);
        echo $name;
     }

}
