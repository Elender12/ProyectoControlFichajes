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
        if(isset($_POST["endDate"])){
            $endDate=$_POST["endDate"];
        }
       $worker = $_SESSION["worker"];
       //$worker= "Y3423283H"; 
       $conexion = new UsersModel();
        $result = $conexion-> checkFilteredDataClockIn($worker,$startDate,$endDate);
        //prints the data
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
        	/* Database connection settings */
	$host = 'localhost';
	$user = 'root';
	$pass = 'root';
	$db = 'fingerprintassistancecontrol';
	$mysqli = new mysqli($host,$user,$pass,$db) or die($mysqli->error);

	//query to get data from the table
	$sql = "SELECT * FROM `charts` ";
    $result = mysqli_query($mysqli, $sql);

	//loop through the returned data
    while ($data = mysqli_fetch_assoc($result)) {
        $userData[] = $data;
	}
    echo json_encode($userData);

    }
}


?>