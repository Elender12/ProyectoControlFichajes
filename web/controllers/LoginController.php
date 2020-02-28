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
            $_SESSION['pass'] = $_POST['pass'];
        
            // require "views/user/index.php";
          
            //echo $result;
    
            header("HTTP/1.1 303 See Other");
            header("Location: /ControlFichajes/web/LoginController/login");
            die();
        } elseif (isset($_SESSION['worker'])) {
    
            /*
                Put database-affecting code here.
            */

            $worker= $_SESSION["worker"];
            $pass = $_SESSION["pass"];
            $conexion = new UsersModel();
            //calls the method that has the query prepared
            // $result = $conexion->checkLogin($_SESSION['worker'] , $_SESSION['pass']);
            $result = $conexion->checkLogin($worker, $pass);
            echo $result;
            // session_unset();
           // session_destroy();
        }

        // if (!isset($_SESSION["worker"])) {
        //     $_SESSION["worker"] = $_POST["worker"];
        //     $_SESSION["pass"] = $_POST["pass"];
        //     $worker= $_SESSION["worker"];
        //     $pass = $_SESSION["pass"];
        //   }else {
        //    $worker= $_SESSION["worker"];
        //    $pass = $_SESSION["pass"];
        
        //   }
        //  $worker=  $_SESSION["worker"];
         // $pass= $_SESSION["pass"];
        // $worker=$_POST["worker"];
         //$pass = $_POST["pass"];
       
       
        //
    }
    // function showData(){
    //     $worker=$_SESSION["worker"];
    //     $conexion = new UsersModel();
    //     $result = $conexion->showMonthRegister($worker);
    //     echo $result;
    // }
    
    public function checkFilteredData()
    {
        $worker = $_SESSION["worker"];
        if (isset($_GET["startDate"]) && isset($_GET["endDate"])) {
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
    public function displayStatsRangeFilterResult()
    {
        if (isset($_GET["startDate"]) && isset($_GET["endDate"])) {
            $startDate =$_GET["startDate"];
            $endDate=$_GET["endDate"];
            $conexion = new UsersModel();
            $result = $conexion-> statisticsFilteredData($startDate, $endDate);
            //prints the data
            echo $result;
        } else {
            return;
        }
    }
    public function showIncompleteDays()
    {
        //TODO
        $worker=$_SESSION["worker"];
        $conexion = new UsersModel();
        $result = $conexion->checkIncompleteDays($worker);
        echo $result;
    }
    
    public function showNoClockedInDays()
    {
        //TODO
        $worker=$_SESSION["worker"];
        $conexion = new UsersModel();
        $result= $conexion->checkNoClockedInDays($worker);
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
        $worker= $_SESSION["worker"];
        $result = $conexion->statisticsData($worker);
        echo $result;
    }
    public function insertMissedClocking()
    {
        $conexion = new UsersModel();
        $worker= $_SESSION["worker"];
        $timeHours= $_POST["timeHours"];
        $type= $_POST["type"];
        $selecDate= $_POST["selectedDate"];
        // echo $timeHours;
        //echo $type;
        //echo $selecDate;
        $result = $conexion->insertData($worker, $selecDate, $timeHours, $type);
        // echo $result;
        header("Location: /ControlFichajes/web/LoginController/login");
    }
    public function showUserInfoFromAdmin()
    {
        $_SESSION["worker"]= $_GET["worker"];
        $conexion = new UsersModel();
        $result = $conexion->showUserInfoFromAdminPage($_SESSION["worker"]);
        echo $result;
    }
}

?>