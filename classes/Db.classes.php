<?php

class Db {
    private $dbHost="localhost";
        private $dbUser="root";
        private $dbPassword="";
        private $dbName="se";
        protected $connection;
        
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
    public function getConnection() { return $this->connection; }
    public function openConnection()
        {
           $this->connection=new mysqli($this->dbHost,$this->dbUser,$this->dbPassword,$this->dbName);
           if ($this->connection->connect_error) {
            die("Connection failed: " . $this->connection->connect_error);
            return false;
          }
          return true; 
        }
    public function closeConnection()
    {
        if($this->connection)
        {
            $this->connection->close();
            return true;
        }
        return false;
    }
    public function select($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        return $result->fetch_all(MYSQLI_ASSOC);
    }
    public function insert($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        return $this->connection->insert_id;
    }
    public function delete($qry)
    {
        $result=$this->connection->query($qry);
        if(!$result)
        {
            echo "Error : ".mysqli_error($this->connection);
            return false;
        }
        return true;
    }

}