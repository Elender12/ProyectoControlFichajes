<?php

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
            $query = "SELECT employeeDni, employeePsw, isAdmin, contractStartDate FROM users WHERE employeeDni like :worker and employeePsw like :pass ";
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
                    //method showMonthRegister 
                    $db = DataBase::db();
                    $query = "SELECT clockingDate, clockingTime, clockingType FROM clokinginregisters WHERE dniUser like :worker AND clockingDate between  DATE_FORMAT(NOW(),'%Y-%m-01') AND CURDATE() ORDER BY clockingDate desc, clockingTime asc";
                    $query = $db->prepare($query);
                    $query->bindParam(':worker', $worker);
                    //executes  the query
                    $query->execute();
                    $data = $query->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
                    require "views/user/index.php";
                    //header("Location: views/user/index.php");
                    //return $data;
                    //return "views/user/index.php";
                } else {
                    //it's an admin and calls the view
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

            $db = DataBase::db();

            //prepares the query --REVISE
            $query = " SELECT clockingDate, clockingTime, clockingType FROM clokinginregisters where dniUser like :worker
            and clockingDate >= :fecha1 AND clockingDate <= :fecha2 order by clockingDate ";

            //data is separated from the query*/
            $query2 = $db->prepare($query);
            $query2->bindParam(':worker', $worker);
            $query2->bindParam(':fecha1', $startDate);
            $query2->bindParam(':fecha2', $endDate);
            //executes  the query
            $query2->execute();
            $data = $query2->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            //ignora el require 
            require "views/user/index.php";
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

            $db = DataBase::db();
            //stores the call to the procedure
            $query = "CALL find_incomplete_days( ? )";
            $sql = $db->prepare("CALL find_incomplete_days( :param )");
            $sql->bindParam('param', $worker);
            $sql->execute();
            $data = $sql->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            require "views/user/index.php";
        } catch (PDOException $e) {
            die("Error occurred with the incomlete days query:" . $e->getMessage());
        }
    }
    public function checkNoClockedInDays($worker)
    {
        //TODO -- simple query
        try {
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
}
