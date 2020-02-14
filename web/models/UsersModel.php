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
                //checks if it's an admin or worker
                if (strcmp($userType, "0") == 0) {  
                    //method showMonthRegister 
                   require "views/user/index.php";
                   //header("Location: views/user/index.php");
                    
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
            $query = "SELECT orderN, clockingDate, clockingTime, clockingType FROM clokinginregisters WHERE dniUser like :worker ";
            $query = $db->prepare($query);
            $query->bindParam(':worker',$worker);
            //executes  the query
            $query->execute();
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
            and clockingDate >= CAST(:fecha1 AS DATE) AND clockingDate <= CAST(:fecha2 AS DATE) order by clockingDate ";
        
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
            //ignora el require 
            //require "views/user/index.php";
            //returns the results of the query
            return $data;
        } catch (Exception $e) {
            echo "<p>There was en error with the query</p>";
        }
    }


    public function checkIncompleteDays($worker)
    {
        //TODO --lleva procedimiento --
        try {
        
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
//Prueba 2v
    public function testCharts(){
        require "views\charts\EmployeeStatisticsPage.php";
	}
	//Prueba v4	
	public function goHome(){
		require "views/user/index.php";
	}
}
