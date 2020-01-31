<?php

/* manages CRUD operations */
class UsersModel extends Model{

    //constructor
    public function __construct() {
        parent::__construct();
    }

    //checks who is logs in
    public function checkLogin($worker,$pass){
            try {
                $db = DataBase::db();
                //prepares the query
                $query = "SELECT dni, password, admin FROM users WHERE dni like'".$worker."' and password like'".$pass."'";
                //executes  the query
                $statement = $db->query($query);
                $data = $statement->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
                
                // checks if the query returns valid data
                if($data == null)
                {
                    //calls the error view
                    $result= new Errors("Login error");
                    return;
                }else {
                    //stores the type of user
                    $userType = $data[0]->admin;
            
                    //checks if it's an admin or worker
                   
                    if (strcmp($userType, "admin") !==0){
                        //it's a user and calls the view
                        $query = "SELECT date, time, type FROM clokinginregisters WHERE dniUser like'".$worker."'";
                        //executes  the query
                        $statement = $db->query($query);
                        $data = $statement->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
                        //echo $data;
                        require "views/user/index.php";
                    }else {
                        //it's an admin and calls the view
                        require "views/admin/index.php";
                    } 
                }
                
            } catch (Exception $e) {
                echo "<p>There was en error with the login</p>";
            }
            return $userType;
        
    }

    public function showMonthRegister($worker){
        try{
            echo "el valor de worker es $worker";
        $db = DataBase::db();
        //prepares the query
        $query = "SELECT date, time, type FROM clokinginregisters WHERE dniUser like'".$worker."'";
        //executes  the query
        $statement = $db->query($query);
        $data = $statement->fetchAll(PDO::FETCH_CLASS, UsersModel::class);
        // require "views/user/index.html";
        }catch(Exception $e) {
            echo "<p>There was en error with the query</p>";
        }
    }



}



?>