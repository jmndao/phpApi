<?php

    // Database and table connection
    class Client {

        private $conn;
        private $tableName = "Client";

        // Object Properties
        public $first_name;
        public $last_name;
        public $accountNo;
        public $amount;
        public $code;
        public $startedDate;

        // Constructor 
        public function __construct($db) {
            $this->conn = $db;
        }

        // read client
        function read(){
        
            // select all query
            $query = "SELECT
                        id, first_name, last_name, accountNo, amount, code, startedDate 
                    FROM 
                        " . $this->tableName . " 
                    ORDER BY
                        startedDate DESC";
        
            // prepare query statement
            $stmt = $this->conn->prepare($query);
        
            // execute query
            $stmt->execute();
        
            return $stmt;
        }

        // create client
        function create(){
        
            // query to insert record
            $query = "INSERT INTO
                        " . $this->tableName . "
                    SET
                        first_name=:first_name, last_name=:last_name, accountNo=:accountNo, amount=:amount, code=:code";
        
            // prepare query
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->accountNo=htmlspecialchars(strip_tags($this->accountNo));
            $this->amount=htmlspecialchars(strip_tags($this->amount));
            $this->code=htmlspecialchars(strip_tags($this->code));
            // $this->startedDate=htmlspecialchars(strip_tags($this->startedDate));
        
            // bind values
            $stmt->bindParam(":first_name", $this->first_name);
            $stmt->bindParam(":last_name", $this->last_name);
            $stmt->bindParam(":accountNo", $this->accountNo);
            $stmt->bindParam(":amount", $this->amount);
            $stmt->bindParam(":code", $this->code);
            // $stmt->bindParam(":startedDate", $this->startedDate);
        
            // execute query
            if($stmt->execute()){
                return true;
            }
        
            return false;
        }

        // used when filling up the update client form
        function readOne(){
        
            // query to read single record
            $query = "SELECT
                        id, first_name, last_name, accountNo, amount, code, startedDate
                    FROM
                        " . $this->tableName . "
                    WHERE
                        id = ?
                    LIMIT
                        0,1";
        
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
        
            // bind id of the client to be updated
            $stmt->bindParam(1, $this->id);
        
            // execute query
            $stmt->execute();
        
            // get retrieved row
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            // set values to object properties
            $this->first_name = $row['first_name'];
            $this->last_name = $row['last_name'];
            $this->accountNo = $row['accountNo'];
            $this->amount = $row['amount'];
            $this->code = $row['code'];
            $this->startedDate = $row['startedDate'];
        }


        // update the client
        function update(){
        
            // update query
            $query = "UPDATE
                        " . $this->tableName . "
                    SET
                        first_name = :first_name,
                        last_name = :last_name,
                        accountNo = :accountNo,
                        amount = :amount,
                        code = :code
                    WHERE
                        id = :id";
        
            // prepare query statement
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $this->first_name=htmlspecialchars(strip_tags($this->first_name));
            $this->last_name=htmlspecialchars(strip_tags($this->last_name));
            $this->accountNo=htmlspecialchars(strip_tags($this->accountNo));
            $this->amount=htmlspecialchars(strip_tags($this->amount));
            $this->code=htmlspecialchars(strip_tags($this->code));
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind new values
            $stmt->bindParam(':first_name', $this->first_name);
            $stmt->bindParam(':last_name', $this->last_name);
            $stmt->bindParam(':accountNo', $this->accountNo);
            $stmt->bindParam(':amount', $this->amount);
            $stmt->bindParam(':code', $this->code);
            $stmt->bindParam(':id', $this->id);
        
            // execute the query
            if($stmt->execute()){
                return true;
            }
        
            return false;
        }

        // delete the client
        function delete(){
        
            // delete query
            $query = "DELETE FROM " . $this->tableName . " WHERE id = ?";
        
            // prepare query
            $stmt = $this->conn->prepare($query);
        
            // sanitize
            $this->id=htmlspecialchars(strip_tags($this->id));
        
            // bind id of record to delete
            $stmt->bindParam(1, $this->id);
        
            // execute query
            if($stmt->execute()){
                return true;
            }
        
            return false;
        }

        // read client with pagination
        public function readPaging($from_record_num, $records_per_page){
        
            // select query
            $query = "SELECT
                        id, first_name, last_name, accountNo, amount, code, startedDate
                    FROM
                        " . $this->tableName . " 
                    ORDER BY startedDate DESC
                    LIMIT ?, ?";
        
            // prepare query statement
            $stmt = $this->conn->prepare( $query );
        
            // bind variable values
            $stmt->bindParam(1, $from_record_num, PDO::PARAM_INT);
            $stmt->bindParam(2, $records_per_page, PDO::PARAM_INT);
        
            // execute query
            $stmt->execute();
        
            // return values from database
            return $stmt;
        }

        // used for paging products
        public function count(){
            $query = "SELECT COUNT(*) as total_rows FROM " . $this->tableName . "";
        
            $stmt = $this->conn->prepare( $query );
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
        
            return $row['total_rows'];
        }


    }

?>