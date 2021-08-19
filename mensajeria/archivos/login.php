<?php
// checking for minimum PHP version
if (version_compare(PHP_VERSION, '5.3.7', '<')) {

    exit("Sorry, Simple PHP Login does not run on a PHP version smaller than 5.3.7 !");

} else if (version_compare(PHP_VERSION, '5.5.0', '<')) {
    // if you are using PHP 5.3 or PHP 5.4 you have to include the password_api_compatibility_library.php
    // (this library adds the PHP 5.5 password hashing functions to older versions of PHP)
    require_once("libraries/password_compatibility_library.php");
}
// include the configs / constants for the database connection
require_once("../config/db.php");
// load the login class
require_once("../classes/Login.php");
// create a login object. when this object is created, it will do all login/logout stuff automatically
// so this single line handles the entire login process. in consequence, you can simply ...
$login = new Login();
// ... ask if we are logged in here:
if ($login->isUserLoggedIn() == true) {
    // the user is logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are logged in" view.
   header("location: index.php");
} else {
    // the user is not logged in. you can do whatever you want here.
    // for demonstration purposes, we simply show the "you are not logged in" view.
    ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <style type="text/css">
    .red{ color: red;}
         </style>
    <title>.:CM-Coordinadora Mercantil:.</title>

    <!-- Bootstrap Core CSS -->
    <link href="../vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../vendor/metisMenu/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<!--<body background="../img/foto.png">-->
    <body style="background-image:url(../img/foto.png);">


    <div class="container">
        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                       <!-- <h3 class="panel-title"><img src="../img/logo.png" width="100%" style=""></h3>-->
                       <div style="font-family: arial;font-size: 30px;text-align: center;">
                       <span style="color: red;">INPOS</span><span style="color: blue;">DOM</span>
                       </div>
                    </div>
                    <div class="panel-body">
                        <form method="post" accept-charset="utf-8" action="login.php" name="loginform" autocomplete="off" role="form" class="form-signin">
            <?php
                // show potential errors / feedback (from login object)
                if (isset($login)) {
                    if ($login->errors) {
                        ?>
                        <div class="alert alert-danger alert-dismissible" role="alert">
                            <strong>Error!</strong> 
                        <?php 
                        foreach ($login->errors as $error) {
                            echo $error;
                        }
                        ?>
                        </div>
                        <?php
                    }
                    if ($login->messages) {
                        ?>
                        <div class="alert alert-success alert-dismissible" role="alert">
                            <strong>Aviso!</strong>
                        <?php
                        foreach ($login->messages as $message) {
                            echo $message;
                        }
                        ?>
                        </div> 
                        <?php 
                    }
                }
                ?>
                            <fieldset>
                                <div class="form-group">
                                    <input class="form-control" name="user_name" id="usern" placeholder="Usuario"  type="text" autofocus>
                                </div>
                                <div class="form-group">
                                    <input class="form-control" name="user_password" id="passwd" placeholder="Contrasena"  type="password" value="">
                                </div>
                                <input type="submit" style="background-color:blue;" class="btn btn-lg btn-primary btn-block btn-signin" id="IngresoLog" name="login" id="submit" value="Entrar"><br>

            <div class="opcioncontra">
                <a href="#" onmouseDown="alert('Ponerse en contacto con el administrador del Sistema')">Olvidaste tu contraseña?</a>
            </div>
                            
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jQuery -->
    <script src="../vendor/jquery/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../vendor/metisMenu/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

</body>

</html>
<?php } ?>
