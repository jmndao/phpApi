<?php
    
    session_start();

    include('utilities.php');

    $ut = new Utilities();

    if($_POST) {

        $id = $_POST['pk'];

        $data = json_encode(array("id" => $id));

        if($ut->APIRequest("DELETE", $data)) {
            $_SESSION['message']  = $id . " has been successfully deleted.";
            header("Location: ../web/profile.php");
        } else {
            $_SESSION['message']  = "Deletion operation has failed.";
            header("Location: ../web/profile.php");
        }

    } else {
        return false;
    }

    
    
?>