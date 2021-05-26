<?php
    
    session_start();

    include('utilities.php');

    $ut = new Utilities();

    if($_POST) {

        $id = $_POST['pk'];

        $data = json_encode(array("id" => $id));

        if($ut->APIRequest("DELETE", $data)) {
            echo $id . " has been successfully deleted.";
        } else {
            header('Location: ../web/error_connection.php');
        }

    } else {
        return false;
    }

    
    
?>