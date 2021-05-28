<?php

    class DB {
        
        // Database credentials
        private $hostname = "mysql";
        private $dbname = "Banque";
        private $username = "malcom";
        private $pwd = "Passer123";
        public $conn;

        // Get the database connection 
        public function getConnection() {
            $this->conn = null;

            try {
                $this->conn = new PDO("mysql:host=".$this->hostname.";dbname=".$this->dbname, $this->username, $this->pwd);
                $this->conn->exec("set names utf8");
            } catch(PDOException $e) {
                echo "Connection error: ". $e->getMessage();
            }
            return $this->conn;
        }
    }

?>