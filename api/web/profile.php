<?php session_start() ?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../static/css/master.css">
</head>
<body>
    
    <div class="container">
        <div class="row">
            <div class="col s8 card-panel">
                <ul class="tabs profileTab">
                    <li class="tab col s3"><a class="active" href="#get">Get</a></li>
                    <li class="tab col s3"><a href="#post">Post</a></li>
                    <li class="tab col s3 "><a href="#update">Update</a></li>
                    <li class="tab col s3"><a href="#delete">Delete</a></li>
                </ul>


                <!-------------- Get Section ------------->
                <div id="get" class="col s12">
                    <form class="col s12" action="../shared/get.php" method="GET">
                        <div class="container ptb-3">
                        <p class="ptb-2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Omnis natus itaque at amet officiis aperiam voluptates eligendi in alias, nobis quo maxime deleniti iste ullam magni totam dolor, illum soluta.
                        </p>
                        <button class="btn waves-effect waves-light blue accent-3" type="submit">GET
                            <i class="material-icons right">get_app</i>
                        </button>
                        </div>
                    </form>
                </div>


                <!-------------- Post Section ------------->
                <div id="post" class="col s12 valign-wrapper">

                    <form class="col s12" action="profile.php" method="POST">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="fname" name="first_name" type="text">
                                <label for="fname">First Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="lname" name="last_name" type="text">
                                <label for="lname">Last Name</label>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="amnt" name="amount" type="text">
                                    <label for="amnt">Amount</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="codee" name="code" type="text">
                                    <label for="codee">Code</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s12">
                                    <input id="accno" name="accountNo" type="text">
                                    <label for="accno">Account Number</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light green accent-3 right" type="submit">POST
                            <i class="material-icons right">post_add</i>
                        </button>
                    </form>
                </div>

                
                <!-------------- Update Section ------------->
                <div id="update" class="col s12">

                    <form class="col s12" action="../shared/update.php" method="POST">
                        <div class="row">
                            <div class="input-field col s6">
                                <input id="fnameU" name="first_name_u" type="text">
                                <label for="fnameU">First Name</label>
                            </div>
                            <div class="input-field col s6">
                                <input id="lnameU" name="last_name_u" type="text">
                                <label for="lnameU">Last Name</label>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="amntU" name="amount_u" type="text">
                                    <label for="amntU">Amount</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="codeeU" name="code_u" type="text">
                                    <label for="codeeU">Code</label>
                                </div>
                            </div>
                            <div class="row">
                                <div class="input-field col s6">
                                    <input id="accnoU" name="accountNo_u" type="text">
                                    <label for="accnoU">Account Number</label>
                                </div>
                                <div class="input-field col s6">
                                    <input id="pkU" name="id_u" type="number">
                                    <label for="pkU">Id</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn waves-effect waves-light green accent-3 right" type="submit">UPDATE
                            <i class="material-icons right">update</i>
                        </button>
                    </form>

                </div>

                <!-------------- Delete Section ------------->
                <div id="delete" class="col s12">

                    <form class="col s12" action="../shared/delete.php" method="POST">
                        <p class="ptb-2">
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Doloremque at sunt quidem vero sint hic quia laudantium illum ullam accusamus.
                        </p>
                        <div class="row valign-wrapper">
                            <div class="input-field col s6">
                                <input id="pkD" name="pk" type="text">
                                <label for="pkD">Id</label>
                            </div>
                            <div class="col s6">
                                <button class="btn waves-effect waves-light red right" type="submit">DELETE
                                    <i class="material-icons right">delete</i>
                                </button>
                            </div>
                        </div>
                    </form>

                </div>

            </div>

            <div class="col s4">
                <div class="card">
                    <div class="card-image waves-effect waves-block waves-light">
                        <img class="activator" src="../static/img/user.jpg">
                    </div>
                    <div class="card-content">
                        <span class="card-title activator grey-text text-darken-4"><?php echo $_SESSION['username'] ?><i class="material-icons right">more_vert</i></span>
                    </div>
                    <div class="card-reveal">
                        <span class="card-title grey-text text-darken-4">Account Manager<i class="material-icons right">close</i></span>
                        <p>Here is some more information about this product that is only revealed once clicked on.</p>
                    </div>
                </div>

                <div class="card-panel">
                    <p>
                        <?php 
                            if ($_SESSION['message']) {
                                echo $_SESSION['message'];
                            } else {
                                echo "Message ...";
                            }
                        ?>
                    </p>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="col s8 card-panel">
                <table class="striped highlight"> 
                    <thead>
                        <tr>
                        <th>Id</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Account Number</th>
                        <th>Amount</th>
                        <th>Code</th> 
                        </tr>
                    </thead>

                    <tbody>
                        <tr>
                        <?php foreach ($_SESSION['response']['records'] as $client){ ?>
                        <td> <?php echo $client['id']; ?> </td>
                        <td> <?php echo $client['first_name']; ?> </td>
                        <td> <?php echo $client['last_name']; ?> </td>
                        <td> <?php echo $client['accountNo']; ?> </td>
                        <td> <?php echo $client['amount']; ?> </td>
                        <td> <?php echo $client['code']; ?> </td> 
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
        
    </div>

    <?php

        include('../shared/utilities.php');

        $ut = new Utilities();

        if($_SERVER['REQUEST_METHOD'] == "POST") {

            $payload = array(
                "first_name" => $_POST['first_name'],
                "last_name" => $_POST['last_name'],
                "accountNo" => $_POST['accountNo'],
                "amount" => $_POST['amount'],
                "code" => $_POST['code'] 
            );

            $data = json_encode($payload);

            if($ut->APIRequest("POST", $data)) {
                echo "POST data has been successfully posted.";
                echo $ut->response;
            } else {
                header("Location: error_connection.php");
            }

        }
    ?>

</body>

<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="../static/js/script.js"></script>
</html>