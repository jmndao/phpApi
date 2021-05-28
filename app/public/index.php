<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sagna Api</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="./static/css/master.css">

</head>

<body>

    <div class="morning-center">

        <div class="row">
            <div class="col s12">
                <ul class="tabs indexTab">
                    <li class="tab col s3"><a href="#login">Login</a></li>
                    <li class="tab col s3"><a class="active" href="#register">Register</a></li>
                </ul>
            </div>
        </div>
        <div class="card-panel" id="login">
            <div class="panel-card__header">
                <h4>Login Form</h4>
            </div>
            <div class="divider"></div>
            <div class="row">
                <form class="col s12" action="../backends/login.php" method="POST">
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="uname" name="username" type="text">
                            <label for="uname">Username</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="pwd" name="password" type="password">
                            <label for="pwd">Password</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light blue right" type="submit">Submit
                        <i class="material-icons right">login</i>
                      </button>
                </form>
            </div>
        </div>
        <div class="card-panel" id="register">
            <div class="panel-card__header">
                <h4>Register Form</h4>
            </div>
            <div class="divider"></div>
            <div class="row">
                <form class="col s12" action="../backends/register.php" method="POST">
                    <div class="row">
                        <div class="input-field col s6">
                            <input id="fname" name="first_name" type="text">
                            <label for="fname">First Name</label>
                        </div>
                        <div class="input-field col s6">
                            <input id="lname" name="last_name" type="text">
                            <label for="lname">Last Name</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="unameReg" name="usernameReg" type="text">
                            <label for="unameReg">Username</label>
                        </div>
                    </div>
                    <div class="row">
                        <div class="input-field col s12">
                            <input id="pwdReg" name="passwordReg1" type="password">
                            <label for="pwdReg">Password</label>
                        </div>
                        <div class="input-field col s12">
                            <input id="pwdRegConf" name="passwordReg2" type="password">
                            <label for="pwdRegConf">Confirmation Password</label>
                        </div>
                    </div>
                    <button class="btn waves-effect waves-light orange right" type="submit">Submit
                        <i class="material-icons right">app_registration</i>
                      </button>
                </form>
            </div>
        </div>
    </div>

</body>
<!-- Materialize JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
<script src="./static/js/script.js"></script>

</html>