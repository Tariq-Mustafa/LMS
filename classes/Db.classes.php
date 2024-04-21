<?php

class Db {
    protected function connect() {
        try {
            $username = "root";
            $pass = "";
            $db = new PDO('mysql:host=localhost;dbname=SE', $username, $pass);
            return $db;
        } 
        catch (PDOException $e) {
            print "Error!" . $e->getMessage() . "<br/>";
            die();
        }
    }
}