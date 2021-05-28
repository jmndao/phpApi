<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: GET");
    header("Access-Control-Allow-Credentials: true");
    header('Content-Type: application/json');
    
    // include database and object files
    include_once '../config/database.php';
    include_once '../objects/client.php';
    
    // get database connection
    $database = new DB();
    $db = $database->getConnection();
    
    // prepare client object
    $client = new Client($db);
    
    // set ID property of record to read
    $client->id = isset($_GET['id']) ? $_GET['id'] : die();
    
    // read the details of the client to be edited
    $client->readOne();
    
    if($client->first_name!=null && $client->last_name!=null){
        // create array
        $client_arr = array(
            "id" =>  $client->id,
            "first_name" => $client->first_name,
            "last_name" => $client->last_name,
            "accountNo" => $client->accountNo,
            "amount" => $client->amount,
            "code" => $client->code
        );
    
        // set response code - 200 OK
        http_response_code(200);
    
        // make it json format
        echo json_encode($client_arr);
    }
    
    else{
        // set response code - 404 Not found
        http_response_code(404);
    
        // tell the user client does not exist
        echo json_encode(array("message" => "Client does not exist."));
    }
?>