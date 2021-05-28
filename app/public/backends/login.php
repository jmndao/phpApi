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
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($c->login($username, $password)) {
            header("Location: ../web/profile.php");
        } else {
            header("Location: ../web/error_connection.php");

        }
        $_SESSION['message'] = $c->message;
        $_SESSION['username'] = $username;

    }
?>
