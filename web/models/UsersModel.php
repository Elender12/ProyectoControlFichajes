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
            $query->bindParam(':worker',$worker);
            $query->bindParam(':pass',$pass);
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
                $hiredDate = $data[0]->contractStartDate;
                //¿funcionará?
                //$GLOBALS[$hiredDate];
                //var_dump($userType);
                //checks if it's an admin or worker
                if (strcmp($userType, "0") == 0) {
                    //it's a user and calls the view
                    $query = "SELECT orderN, clockingDate, clockingTime, clockingType FROM clokinginregisters WHERE dniUser like :worker ";
                    $query = $db->prepare($query);
                    $query->bindParam(':worker',$worker);
                    //executes  the query
                    $query->execute();
                    $data = $query->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
                    //echo $data;
                    //$registers = $this->showMonthRegister($worker);
                    //var_dump($registers);
                    require "views/user/index.php";
                } else {
                    //it's an admin and calls the view
                    require "views/admin/index.php";
                }
            }
        } catch (Exception $e) {
            echo "<p>There was en error with the login</p>";
        }
        //return $userType;
    }
    //revise this method
    public function showMonthRegister($worker)
    {
        try {

            $db = DataBase::db();
            //prepares the query
            $query = "SELECT date, time, type FROM clokinginregisters WHERE dniUser like :worker ";
            $query = $db->prepare($query);
            $query->bindParam(':worker',$worker);
            //executes  the query
            $query->execute();
            //executes  the query
            $data = $query->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            return $data;
            //require "views/user/index.php";
        } catch (Exception $e) {
            echo "<p>There was en error with the query</p>";
        }
    }
    public function checkFilteredDataClockIn($worker, $startDate, $endDate)
    {
        try {

            $db = DataBase::db();

            //prepares the query --REVISE
            $query = " SELECT clockingDate, clockingTime, clockingType FROM clokinginregisters where dniUser like :worker
            and date >= CAST(:fecha1 AS DATE) AND date <= CAST(:fecha2 AS DATE) order by date ";
        
            //data is separated from the query*/
            $query2 = $db->prepare($query);
            $query2->bindParam(':worker',$worker);
            $query2->bindParam(':fecha1',$startDate);
            $query2->bindParam(':fecha2',$endDate);
            $query2->execute();
            //executes  the query
            //$statement = $db->query($query);
            //$data = $statement->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            $data = $query2->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            //returns the results of the query
            return $data;
        } catch (Exception $e) {
            echo "<p>There was en error with the query</p>";
        }
    }


    public function checkIncompleteDays($worker)
    {
        //TODO --lleva procedimiento -- ¿funcionará?
        try {
            //$hireDate1= $GLOBALS[$hiredDate];
            $db = DataBase::db();
     
            $queryHireDate= "SELECT contractStartDate FROM users WHERE employeeDni like :worker";
            $sql1= $db->prepare($queryHireDate);
            $sql1->bindValue(1,$worker, PDO::PARAM_STR);
            $hiredDate = $sql1->execute();
            //stores the call to the procedure
            $query = 'CALL find_incomplete_days(? , ?)';
           //prepares the query
            $sql = $db->prepare($query);
            //call the stored procedure
            $sql->bindValue(1,$worker, PDO::PARAM_STR);
            $sql->bindValue(2,$hiredDate, PDO::PARAM_STR);
            $data = $sql->execute();
            $data->setFetchMode(PDO::FETCH_ASSOC);
            return $data;
            //$stmt->bindParam(1, $second_name, PDO::PARAM_STR|PDO::PARAM_INPUT_OUTPUT, 32);
            //$stmt->bindParam(2, $weight, PDO::PARAM_INT, 10);
        } catch (PDOException $e) {
            die("Error occurred with the incomlete days query:" . $e->getMessage());
        }
    }
    public function checkNoClockedInDays($worker)
    {
        //TODO -- simple query
        /* */
        try {
            $db = DataBase::db();
            $query = "SELECT calendarDate FROM calendar_table WHERE calendarDate NOT IN
            (SELECT clockingDate FROM clokinginregisters WHERE dniUser LIKE :worker)
            AND calendarDate <= CURDATE() 
            AND isHoliday = 0 
            AND dayName NOT LIKE 'saturday' 
            AND dayName NOT LIKE 'sunday'
            AND calendarDate NOT IN (SELECT holidayDate FROM usersholidays WHERE userDni LIKE :worker )";
            $sql = $db->prepare($query);
            $sql->bindParam(':worker',$worker);
            $data = $sql->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            //returns the results of the query
            return $data;
        } catch (PDOException $e) {
            die("Error occurred with the incomlete days query:" . $e->getMessage());
        }
    }
    public function exitBack()
    {
        require "views/main/index.php";
    }
}
