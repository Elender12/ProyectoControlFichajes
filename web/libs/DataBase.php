<?php

// Cargamos la configuracion para el acceso a la bd
require_once 'config/config.php';
use const Config\DSN;
use const Config\USER;
use const Config\PASSWORD;
//use PDO;

class DataBase{
        //returns a database object
    
        public function db(){
            try {
                //makes a new object
                $db = new PDO(DSN, USER, PASSWORD);
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo 'There was a problem connecting to the DataBase: ' . $e->getMessage();
        }
        return $db;
    }
}
