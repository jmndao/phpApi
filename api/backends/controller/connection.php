<?php

     class Connection {
          // Database and table connection

          private $conn;
          private $tableName = "AccountManager";

          // Object Properties for Account Managers
          public $username;
          public $password;
          public $passwordConfirmation;
          public $first_name;
          public $last_name;

          public $message;

          // Constructor 
          public function __construct($db) {
               $this->conn = $db;
          }

          public function login($uname, $pwd) {

               // sanitize data
               $this->username = htmlspecialchars(strip_tags($uname));
               $this->password = htmlspecialchars(strip_tags($pwd));

               if (
                    !empty($this->username) &&
                    !empty($this->password)
               ) {
                    $query = " SELECT * 
                                   FROM " . $this->tableName . " 
                                   WHERE 
                                        (username=:username AND password=:password)"; 
                    
                    // Prepare the query
                    $stmt = $this->conn->prepare($query);

                    // Bind parameters
                    $stmt->bindParam(":username", $this->username);
                    $stmt->bindParam(":password", $this->password);


                    // execute query
                    if ($stmt->execute()) {
                         $cpt = $stmt->rowCount();
                         if ($cpt > 0) {
                              return true;
                         } else {
                              return false;
                         }
                    }

                    return false;
               }
          }

          public function register($uname, $pwd, $pwdConf) {

               // sanitize data
               $this->username = htmlspecialchars(strip_tags($uname));
               $this->password = htmlspecialchars(strip_tags($pwd));
               $this->passwordConfirmation = htmlspecialchars(strip_tags($pwdConf));


               if (
                    !empty($this->username) &&
                    !empty($this->password) &&
                    !empty($this->passwordConfirmation)
               ) {

                    if ($this->password != $this->passwordConfirmation) {
                         $this->message = array(
                              "message" => "Confirmation Password doesn't match.",
                              "level" => 2,
                         );
                         echo $this->message;
                         return false;
                    } else {

                         $query = "INSERT INTO
                              " . $this->tableName . "
                         SET
                              username=:username, password=:password"; 
               
                         // Prepare the query
                         $stmt = $this->conn->prepare($query);

                         // Bind parameters
                         $stmt->bindParam(":username", $this->username);
                         $stmt->bindParam(":password", $this->passwordConfirmation);


                         // execute query
                         if ($stmt->execute()) {
                              return true;
                         } else {
                              $this->message = array(
                                   "message" => "Error values consistencies.",
                                   "level" => 3,
                              );
                              return false;
                         }
                    }
                     return false;
               }
          }
          
     }
