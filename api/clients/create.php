<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // get database connection
    include_once '../config/database.php';
    
    // instantiate client object
    include_once '../objects/client.php';
    
    $database = new DB();
    $db = $database->getConnection();
    
    $client = new Client($db);
    
    // get posted data
    $data = json_decode(file_get_contents("php://input"));
    
    // make sure data is not empty
    if(
        !empty($data->first_name) &&
        !empty($data->last_name) &&
        !empty($data->accountNo) &&
        !empty($data->amount) &&
        !empty($data->code) 
        // !empty($data->startedDate)
    ){
    
        // set product property values
        $client->first_name = $data->first_name;
        $client->last_name = $data->last_name;
        $client->accountNo = $data->accountNo;
        $client->amount = $data->amount;
        $client->code = $data->code;
        // $client->startedDate = date('Y-m-d H:i:s');
    
        // create the product
        if($client->create()){
    
            // set response code - 201 created
            http_response_code(201);
    
            // tell the user
            echo json_encode(array("message" => "Client was created."));
        }
    
        // if unable to create the client, tell the user
        else{
    
            // set response code - 503 service unavailable
            http_response_code(503);
    
            // tell the user
            echo json_encode(array("message" => "Can't create a client."));
        }
    }
    
    // tell the user data is incomplete
    else {
    
        // set response code - 400 bad request
        http_response_code(400);
    
        // tell the user
        echo json_encode(array("message" => "Unable to create a client. Data is incomplete."));
    }


?>