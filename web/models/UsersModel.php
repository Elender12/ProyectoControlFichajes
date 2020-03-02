<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
/* manages CRUD operations */
class UsersModel extends Model
{

    //constructor
    public function __construct()
    {
        parent::__construct();
    }

    //checks who is logs in
    public function checkLogin($worker, $pass)
    {
        try {
            $db = DataBase::db();
            //declare the query            
            $query = "SELECT employeeDni, employeeName, employeePsw, isAdmin, contractStartDate FROM users WHERE employeeDni like :worker and employeePsw like :pass ";
            //prepares the query
            $query = $db->prepare($query);
            //introduces data in order to avoid injections

            $query->bindParam(':worker', $worker);
            $query->bindParam(':pass', $pass);
            //executes the query
            $query->execute();
            $data = $query->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            // checks if the query returns valid data
            if ($data == null) {
                //calls the error view
                $result = new Errors("Login error:data is null from the database");
                return;
            } else {
                //stores the type of user
                $userType = $data[0]->isAdmin;
                
                //checks if it's an admin or worker
                if (strcmp($userType, "0") == 0) {
                    $userName = $data[0]->employeeName;
                    $_SESSION["workerName"]= $userName;
                    $_SESSION["DNI"]= $data[0]->employeeDni;
                    //method showMonthRegister 
                    $db = DataBase::db();
                    $query = "SELECT clockingDate, clockingTime, clockingType FROM clokinginregisters WHERE dniUser like :worker AND clockingDate between  DATE_FORMAT(NOW(),'%Y-%m-01') AND CURDATE() ORDER BY clockingDate desc, clockingTime asc";
                    $query = $db->prepare($query);
                    $query->bindParam(':worker', $worker);
                    //executes  the query
                    $query->execute();
                    $data = $query->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
                    require "views/user/index.php";
                      //return $data;
                } else {
                    //it's an admin and calls the view
                    $userName = $data[0]->employeeName;
                    $dniBoss= $data[0]->employeeDni;
                    $_SESSION["adminName"]= $userName;
                    $_SESSION["adminDNI"]= $dniBoss;
                    $db = DataBase::db();
                    $queryWorkers= "SELECT employeeName, employeeDni FROM users";
                    $queryWorkers = $db->prepare($queryWorkers);
                    $queryWorkers->execute();
                    $data = $queryWorkers->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
                    //var_dump($data);
                    require "views/admin/index.php";
                }
            }
        } catch (Exception $e) {
            echo $e;
            echo "<p>There was en error with the login</p>";
        }
        //return $userType;
    }
    // //revise this method
    // public function showMonthRegister($worker)
    // {
    //     try {

    //         $db = DataBase::db();
    //         //prepares the query
    //         $query1 = "SELECT clockingDate, clockingTime, clockingType FROM clokinginregisters 
    //         WHERE dniUser like :worker AND clockingDate between  DATE_FORMAT(NOW() ,'%Y-%m-01') AND CURDATE())";
    //         $query1 = $db->prepare($query1);
    //         $query1->bindParam(':worker',$worker);
    //         //executes  the query
    //         $query1->execute();
    //         $data = $query1->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
    //         return $data;
    //     } catch (Exception $e) {
    //         echo "<p>There was en error with the query</p>";
    //     }
    // }
    public function checkFilteredDataClockIn($worker, $startDate, $endDate)
    {
        try {

            $_SESSION["NOMBRE"] = $this->getWorkerName($worker);
            //echo $_SESSION["NOMBRE"];
            $db = DataBase::db();

            //prepares the query --REVISE
            $query = " SELECT clockingDate, clockingTime, clockingType FROM clokinginregisters where dniUser like :worker
            and clockingDate >= :fecha1 AND clockingDate <= :fecha2 order by clockingDate ";

            //data is separated from the query*/
            $query2 = $db->prepare($query);
            //entra desde user normal
            if($_SESSION["DNI"]== null){
                $query2->bindParam(':worker', $worker);
            }else if ($worker == null ){
                $query2->bindParam(':worker', $_SESSION["DNI"]);
            }

            
            $query2->bindParam(':fecha1', $startDate);
            $query2->bindParam(':fecha2', $endDate);
            //executes  the query
            $query2->execute();
            $data = $query2->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            //ignora el require 
            require "views/user/index.php";
            //echo $_SESSION["DNI"]."es el dni de session";
            //echo $worker." valor de worker"; //
            //returns the results of the query
            //return $data;
        } catch (Exception $e) {
            echo "<p>There was en error with the query</p>";
        }
    }


    public function checkIncompleteDays($worker)
    {
        //TODO --lleva procedimiento --
        try {
            if(isset( $_SESSION["NOMBRE"])){
            $_SESSION["NOMBRE"] = $this->getWorkerName($worker);
            echo $_SESSION["NOMBRE"];
        }
            $db = DataBase::db();
            //stores the call to the procedure
            $query = "CALL find_incomplete_days( ? )";
            $sql = $db->prepare("CALL find_incomplete_days( :param )");
           // $sql->bindParam('param', $worker);
             //entra desde user normal
             if($_SESSION["DNI"]== null){
                $sql->bindParam(':param', $worker);
            }else if ($worker == null ){
                $sql->bindParam(':param', $_SESSION["DNI"]);
            }

           //$sql->bindParam('param', $_SESSION["DNI"]);
           $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            echo  $_SESSION["workerName"];
            require "views/user/index.php";
        } catch (PDOException $e) {
            die("Error occurred with the incomlete days query:" . $e->getMessage());
        }
    }
    public function checkNoClockedInDays($worker)
    {
        //TODO -- simple query
        try {
            $_SESSION["NOMBRE"] = $this->getWorkerName($worker);
            echo $_SESSION["NOMBRE"];
            $db = DataBase::db();
            $query = "SELECT calendarDate FROM calendar_table WHERE calendarDate NOT IN
            (SELECT clockingDate FROM clokinginregisters WHERE dniUser LIKE :worker)
            AND calendarDate <= CURDATE() 
            AND isHoliday = 0 
            AND dayName NOT LIKE 'saturday' 
            AND dayName NOT LIKE 'sunday'
            AND calendarDate NOT IN (SELECT holidayDate FROM usersholidays WHERE userDni LIKE :worker )";
            $query2 = $db->prepare($query);
            $query2->bindParam(':worker', $worker);
            $query2->bindParam(':worker', $worker);
            $query2->execute();
            $data = $query2->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            //returns the results of the query
            require "views/user/index.php";
            //return $data;
        } catch (PDOException $e) {
            die("Error occurred with the incomplete days query:" . $e->getMessage());
        }
    }
    public function exitBack()
    {
        require "views/main/index.php";
    }
    //Prueba 2v
    public function testCharts()
    {
        require "views/charts/EmployeeStatisticsPage.php";
    }
    //Prueba v4	
    public function goHome()
    {
        require "views/user/index.php";
    }

    public function statisticsData()
    {
        try {
            $db = DataBase::db();
            $worker = $_SESSION["worker"];
            //QUERY data contract
            $contractTypeQUERY = "SELECT contractType FROM users WHERE employeeDni like :worker ";
            $querycONTRACT = $db->prepare($contractTypeQUERY);
            $querycONTRACT->bindParam(':worker', $worker);
            $querycONTRACT->execute();
            $dataCONTRACT = $querycONTRACT->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            $horasContratadas = 0;
            if ($dataCONTRACT[0]->contractType == "partial") {

                $horasContratadas = 4;    //VAR A USAR
            } else {
                $horasContratadas = 8;
            }
            //******************************************** */
            //fechas que ha trabajado --> 
            $queryWD = "SELECT clockingDate FROM clokinginregisters WHERE dniUser like :worker AND clockingDate between  DATE_FORMAT(NOW(),'%Y-%m-01') AND CURDATE() ORDER BY clockingDate asc, clockingTime asc";
            $queryWorkedDays = $db->prepare($queryWD);
            $queryWorkedDays->bindParam(':worker', $worker);
            $queryWorkedDays->execute();
            $dataWorkedDays = $queryWorkedDays->fetchAll(PDO::FETCH_CLASS, UsersModel::class);

            $arrayFechas = array(); //VAR A USAR
            $curDate = 0;
            //array solo con las fechas
            for ($i = 0; $i < count($dataWorkedDays); $i++) {
                if ($dataWorkedDays[$i]->clockingDate != $curDate) {
                    array_push($arrayFechas,  $dataWorkedDays[$i]->clockingDate);
                    $curDate = $dataWorkedDays[$i]->clockingDate;
                }
            }
            //array de horas trabajadas CADA DÍA
            $dailyWorkedHours = array();
            for ($i = 0; $i < count($arrayFechas); $i++) {
                $queryHour_Day = $db->prepare("CALL calculate_hours_in_day( :param1 , :param2 )");
                $queryHour_Day->bindParam('param1', $arrayFechas[$i]);
                $queryHour_Day->bindParam('param2', $worker);
                $queryHour_Day->execute();
                $data = $queryHour_Day->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
                array_push($dailyWorkedHours, $data[0]->hours);
            }
            $tabla = array();
            $tabla['cols'] = array(

                array('label' => 'Date', 'type' => 'string'),
                array('label' => 'Contract Hours', 'type' => 'number'),
                array('label' => 'Worked Hours', 'type' => 'number')
            );
            $rows = array();
            for ($i=0; $i < count($arrayFechas) ; $i++) { 
                $temp = array();
                // each column needs to have data inserted via the $temp array
                $temp[] = array('v' => $arrayFechas[$i]);
                $temp[] = array('v' => $horasContratadas);
                $valor = explode(':', $dailyWorkedHours[$i]);
                $temp[] = array('v' => $valor[0]+floor(($valor[1]/60)*100) / 100);

                // insert the temp array into $rows
                $rows[] = array('c' => $temp);
            }
        
            // populate the table with rows of data
            $tabla['rows'] = $rows;

            // encode the table as JSON
            $jsonTable = json_encode($tabla);
            echo $jsonTable;
        } catch (PDOException $e) {
            die("Error occurred with the incomplete days query:" . $e->getMessage());
        }
    }
    public function insertData( $worker,$selecDate,$timeHours,$type){
        $db = DataBase::db();
        //dni del admin
       // echo " datos de la session DNI desde model users:".$_SESSION["adminDNI"]."</br>";
       //dni del trabajador
        //echo " worker desde users model tiene el valor ".$worker;
        //$worker = $_SESSION["worker"];
        //QUERY data contract
        $insertQuery = "INSERT INTO clokinginregisters (dniUser, clockingDate, clockingTime, clockingType)
        VALUES (:worker, :fecha, :horaS, :tipo)";
        $queryInsert = $db->prepare($insertQuery);
        $queryInsert->bindParam(':worker', $worker);
        $queryInsert->bindParam(':fecha', $selecDate);
        $queryInsert->bindParam(':horaS', $timeHours);
        $queryInsert->bindParam(':tipo', $type);
        $queryInsert->execute();
        $queryLog = "INSERT INTO loginfo (logWho, logAction) VALUES ( :worker, :logAction)";
       //$workerAEditar=$_GET["targetWorker"];
        //echo $workerAEditar;
       if($_SESSION["adminDNI"] !=null){
        $logAction ="New clocking on ".date("Y/m/d")." and ".date("h:i")."  with date  ".$selecDate. " time  ".$timeHours."  and type ".$type."for ".$worker;
        $queryLog = $db->prepare($queryLog);
        $queryLog->bindParam(':worker', $_SESSION["adminDNI"]);
        $queryLog->bindParam(':logAction',$logAction);
        $queryLog->execute();
    
    
    }else {
        $logAction ="New clocking on ".date("Y/m/d")." and ".date("h:i")."  with date  ".$selecDate. " time  ".$timeHours."  and type ".$type;
        $queryLog = $db->prepare($queryLog);
        $queryLog->bindParam(':worker', $worker);
        $queryLog->bindParam(':logAction',$logAction);
        $queryLog->execute();
       }
       
        // $queryLog = $db->prepare($queryLog);
        // $queryLog->bindParam(':worker', $worker);
        // $queryLog->bindParam(':logAction',$logAction);
        // $queryLog->execute();
    }

    public function showUserInfoFromAdminPage($worker){
        // $db = DataBase::db();
        // $queryWorkerName= "SELECT employeeName FROM users WHERE employeeDni like :worker";
        // $queryWorkerName= $db->prepare($queryWorkerName);
        // $queryWorkerName->bindParam(':worker',$worker);
        // $queryWorkerName->execute();
        // $data = $queryWorkerName->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
        // $_SESSION["workerNAME"]= $data[0]->employeeName;
        //$_SESSION["NOMBRE"]= $data[0]->employeeName;
        $db1 = DataBase::db();
        $query = "SELECT clockingDate, clockingTime, clockingType FROM clokinginregisters WHERE dniUser like :worker AND clockingDate between  DATE_FORMAT(NOW(),'%Y-%m-01') AND CURDATE() ORDER BY clockingDate desc, clockingTime asc";
        $query = $db1->prepare($query);
        $query->bindParam(':worker', $worker);
        //executes  the query
        $query->execute();
        $data = $query->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
        $_SESSION["NOMBRE"] = $this->getWorkerName($worker);
        echo $_SESSION["NOMBRE"];
        require "views/user/index.php";
    }
    public function getWorkerName($worker){
        if($worker != null){
            $db = DataBase::db();
        $queryWorkerName= "SELECT employeeName FROM users WHERE employeeDni like :worker";
        $queryWorkerName= $db->prepare($queryWorkerName);
        $queryWorkerName->bindParam(':worker',$worker);
        $queryWorkerName->execute();
        $data = $queryWorkerName->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
        //
        $nombre= $data[0]->employeeName;
        return $nombre;
        }
        


    }

}
