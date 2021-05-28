<?php

    session_start();
    

    include('utilities.php');

    $ut = new Utilities();


    $data = "";

    if($ut->APIRequest("GET", $data)) {

         $_SESSION['response'] = $ut->response;
         $_SESSION['message'] = "Data Available.";
         header("Location: ../web/profile.php");
        
    } else {
       $_SESSION['message'] = "Data Not Available.";
        header("Location: ../web/profile.php");
    }

    return false;

    
    
?>