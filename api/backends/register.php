<?php
    
    session_start();

    include('../config/database.php');
    include('../backends/controller/connection.php');

    $dbase = new DB();
    $db = $dbase->getConnection();

    // Initialize connection
    $c = new Connection($db);

    // Retrieve credentials from form to log the account manager
    if (!empty($_POST)) {
        $username = $_POST['usernameReg'];
        $password = $_POST['passwordReg1'];
        $passwordConfirmation = $_POST['passwordReg2'];

        if($c->register($username, $password, $passwordConfirmation)) {
            header("Location: ../web/profile.php");
        } else {
            header("Location: ../web/error_connection.php");
        }
        $_SESSION['username'] = $username;
        $_SESSION['message'] = $c->message;
    }
?>
