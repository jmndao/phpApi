<?php
    
    session_start();

    include('utilities.php');

    $ut = new Utilities();


    $data = "";

    if($ut->APIRequest("GET", $data)) {

         $_SESSION['response'] = $ut->response;
         header("Location: ../web/profile.php");
        
    } else {
        echo "Bad Request.";
    }

    return false;

    
    
?>