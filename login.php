<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();
$userid = $_SESSION['uid'];
if(isset($userid)){
    header("Location: home.php");
}
$errorMsg = $_GET['login'];
?>
<html>
    <head>  
        <meta charset ="utf-8">
        <link rel="stylesheet" type="text/css" href="format/css/bootstrap.css"/>
        <link rel="stylesheet" type="text/css" href="format/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="format/css/style.css"/>
        <script src="format/js/script.js" type="text/javascript"></script>
        <script src="format/js/bootstrap.js" type="text/javascript"></script>       
        <title>Login Page</title>
        <link rel="shortcut icon" href="format/img/icon.png" type="image/png"/>
    </head>
    <body class="container" onload="regTime()"><br/><br/><br/><br/><br/>
        <div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4 jumbotron">
                    <h2 class="text-center">Welcome Please Login!</h2>
                    <div class="text-center"><font color="red"><b><?php echo $errorMsg;?></b></font></div>
                    <div class="form-group">
                        <form action="includes/login.inc.php" method="POST">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" class="form-control" id="username" name="username" placeholder="username or E-mail">
                            </div>
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="text-center">
                                <input class="btn btn-default" type="submit" name="log_in" value="Log In">
                                <input class="btn btn-warning" type="reset" name="reset" value="Reset">
                            </div>                     
                        </form>
                    </div>
                    <div class="text-center">
                        <p>
                            <script>
                                var date = new Date();
                                document.write("&copy;Julio R 2015-"+date.getFullYear());
                            </script>
                        </p>
                        <p class="text-center" id="today"></p>
                    </div>
                </div>
            </div>
            <div class="col-md-4"></div>            
        </div>
    </body>
</html>