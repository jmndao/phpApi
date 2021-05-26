<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    

    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/client.php';
    
    // instantiate database and product object
    $database = new DB();
    $db = $database->getConnection();
    
    // initialize object
    $clients = new Client($db);
    
    // query products
    $stmt = $clients->read();
    $cpt = $stmt->rowCount();
    
    // check if more than 0 record found
    if($cpt > 0){
    
        // clients array
        $clients_arr=array();
        $clients_arr["records"]=array();
    
        // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['name'] to
            // just $name only
            extract($row);
    
            $client = array(
                "id" => $id,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "accountNo" => $accountNo,
                "amount" => $amount,
                "code" => $code,
                "startedDate" => $startedDate
            );
    
            array_push($clients_arr["records"], $client);
        }
    
        // set response code - 200 OK
        http_response_code(200);
    
        // show clients data in json format
        echo json_encode($clients_arr);
    }
    
    else {
  
        // set response code - 404 Not found
        http_response_code(404);
      
        // tell the user no client found
        echo json_encode(
            array("message" => "No client found.")
        );
    }


?>