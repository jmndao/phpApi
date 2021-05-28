<?php
    
    session_start();

    include('utilities.php');

    $ut = new Utilities();

    

    if($_POST) {

        $payload = array(
            "first_name" => $_POST['first_name_u'],
            "last_name" => $_POST['last_name_u'],
            "accountNo" => $_POST['accountNo_u'],
            "amount" => $_POST['amount_u'],
            "code" => $_POST['code_u'],
            "id" => $_POST['id_u'] 
        );

        $data = json_encode($payload);

        if($ut->APIRequest("UPDATE", $data)) {
            $_SESSION['message'] = $payload['id'] ." has been successfully updated.";
            header("Location: ../web/profile.php");
        } else {
            $_SESSION['message'] = "Update operation has failed.";
            header("Location: ../web/profile.php");
        }

    } else {
        return false;
    }

    
    
?>