<?php

    session_start();
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Methods: POST");
    header("Access-Control-Max-Age: 3600");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/client.php';
    
    // get database connection
    $database = new DB();
    $db = $database->getConnection();
    
    // prepare client object
    $client = new Client($db);
    
    // get id of the client to be edited
    $data = json_decode(file_get_contents("php://input"));
    
    // set ID property of the client to be edited
    $client->id = $data->id;
    
    // set client property values
    $client->first_name = $data->first_name;
    $client->last_name = $data->last_name;
    $client->accountNo = $data->accountNo;
    $client->amount = $data->amount;
    $client->code = $data->code;
    
    // update the client
    if($client->update()){
    
        // set response code - 200 ok
        http_response_code(200);
    
        // tell the user
        echo json_encode(array("message" => "Client was updated."));
        $_SESSION['message'] = "Client was updated";
    }
    
    // if unable to update the client, tell the user
    else{
    
        // set response code - 503 service unavailable
        http_response_code(503);
    
        // tell the user
        echo json_encode(array("message" => "Unable to update the Client."));
        $_SESSION['message'] = "Unable to update the Client.";
    }
?>