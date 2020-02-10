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
            $query = "SELECT dni, password, admin FROM users WHERE dni like :worker and password like :pass ";
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
                $result = new Errors("Login error");
                return;
            } else {
                //stores the type of user
                $userType = $data[0]->admin;
                //checks if it's an admin or worker
                if (strcmp($userType, "admin") !== 0) {
                    //it's a user and calls the view
                    $query = "SELECT orderN, date, time, type FROM clokinginregisters WHERE dniUser like'" . $worker . "'";
                    //executes  the query
                    $statement = $db->query($query);
                    $data = $statement->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
                    //echo $data;
                    $registers = $this->showMonthRegister($worker);
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

    public function showMonthRegister($worker)
    {
        try {

            $db = DataBase::db();
            //prepares the query
            $query = "SELECT date, time, type FROM clokinginregisters WHERE dniUser like'" . $worker . "'";
            //executes  the query
            $statement = $db->query($query);
            $data = $statement->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
            for ($i = 0; $i < count($data); $i++) {
                // echo $data[$i]->type."<br>";
                // echo $data[$i]->time."<br>";
                // echo $data[$i]->date."<br>";
            }

            return $data;
            //require "views/user/index.php";
        } catch (Exception $e) {
            echo "<p>There was en error with the query</p>";
        }
    }
    public function editDataClockIn($worker, $startDate, $endDate)
    {
        try {

            $db = DataBase::db();

            //prepares the query --REVISE
            /* $query = " SELECT date, type, time FROM clokinginregisters where dniUser like '". $worker ."';
            and date >= CAST('". $startDate ."' AS DATE) AND date <= CAST('" . $endDate . "' AS DATE) order by date "; */
            $query = " SELECT date, type, time FROM clokinginregisters where dniUser like :worker
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


    public function checkIncompleteDays()
    {
        //TODO --lleva procedimiento
    }
    public function checkNoClockedInDays()
    {
        //TODO -- simple query
    }


    public function exitBack()
    {
        require "views/main/index.php";
    }
}
