<?

        session_start();

        include('utilities.php');

        $ut = new Utilities();

        if($_POST) {

            $payload = array(
                "first_name" => $_POST['first_name'],
                "last_name" => $_POST['last_name'],
                "accountNo" => $_POST['accountNo'],
                "amount" => $_POST['amount'],
                "code" => $_POST['code'] 
            );

            $data = json_encode($payload);

            if($ut->APIRequest("POST", $data)) {
                $_SESSION['message'] = "POST operation has been successfully done.";
                header("Location: ../web/profile.php");
                // echo $ut->response;
            } else {
                $_SESSION['message'] = "POST Operation has failed.";
                header("Location: ../web/profile.php");
            }

        }
    ?>