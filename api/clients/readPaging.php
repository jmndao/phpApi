<?php
    // required headers
    header("Access-Control-Allow-Origin: *");
    header("Content-Type: application/json; charset=UTF-8");
    
    // include database and object files
    include_once '../config/core.php';
    include_once '../shared/utilities.php';
    include_once '../config/database.php';
    include_once '../objects/client.php';
    
    // utilities
    $utilities = new Utilities();
    
    // instantiate database and client object
    $database = new DB();
    $db = $database->getConnection();
    
    // initialize object
    $client = new Client($db);
    
    // query products
    $stmt = $client->readPaging($from_record_num, $records_per_page);
    $num = $stmt->rowCount();
    
    // check if more than 0 record found
    if($num > 0){
    
        // client array
        $client_arr=array();
        $client_arr["records"]=array();
        $client_arr["paging"]=array();
    
        // retrieve our table contents
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            // extract row
            // this will make $row['first_name'] to
            // just $first_name only
            extract($row);
    
            $client_item=array(
                "id" => $id,
                "first_name" => $first_name,
                "last_name" => $last_name,
                "accountNo" => $accountNo,
                "amount" => $amount,
                "code" => $code,
                "startedDate" => $startedDate
            );
    
            array_push($client_arr["records"], $client_item);
        }
    
    
        // include paging
        $total_rows=$client->count();
        $page_url="{$home_url}client/readPaging.php?";
        $paging=$utilities->getPaging($page, $total_rows, $records_per_page, $page_url);
        $client_arr["paging"]=$paging;
    
        // set response code - 200 OK
        http_response_code(200);
    
        // make it json format
        echo json_encode($client_arr);
    }
    
    else{
    
        // set response code - 404 Not found
        http_response_code(404);
    
        // tell the user products does not exist
        echo json_encode(
            array("message" => "No Client found.")
        );
    }
?>