<?php
ob_start();
error_reporting (E_ALL ^ E_NOTICE);
session_start();
$userid = $_SESSION['uid'];
$SysName = $_SESSION['SysName'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];
$username = $_SESSION['username'];
$userstatus = $_SESSION['status'];
$seclevel = $_SESSION['usersec'];
if(!isset($userid) && !isset($username)){
   header("Location: login.php?login=Session Timeout, Please Log in!");
}
//set user timezone
include "includes/dbh.inc.php";
$q = "SELECT * FROM users WHERE user_id='$userid'";
$query = mysqli_query($conn, $q);
if (mysqli_num_rows($query)>0) {
    $row=mysqli_fetch_array($query);
    $timezone = $row['user_timezone'];
    $q2 = "SELECT * FROM time_zones WHERE id='$timezone'";
    $query2 = mysqli_query($conn, $q2);
    if (mysqli_num_rows($query)>0) {
        $row2=mysqli_fetch_array($query2);
        $usertimezone = $row2['timezone'];
        date_default_timezone_set($usertimezone);
    }
}

$conn->close();
?>
<html>
    <head>
        <meta charset ="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

        <link rel="stylesheet" type="text/css" href="format/css/style.css"/>
        <link rel="stylesheet" type="text/css" href="format/css/modal.css"/>
        <script src="format/js/script.js" type="text/javascript"></script>
        
        <link rel="shortcut icon" href="format/img/icon.png" type="image/png">
        
        
        <title class="text-capitalize">
            <?php echo ucwords($SysName.". Resource Website");?>
        </title>
    </head>
        <!- This is the navigation bar. ->
        <nav class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span> 
                    </button>
                    <a class="navbar-brand" href="home.php">Spotloan Community</a>
                </div>
                <div class="collapse navbar-collapse" id="myNavbar">
                    <ul class="nav navbar-nav">
                        <li class="dropdown">
                            <a class="active dropdown-toggle" data-toggle="dropdown" href="#">Email Template
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="rmmenu.php">Customer Service</a></li>
                                <li><a href="cmmenu.php">Collection Manager</a></li>
                            </ul>
                        </li>
                        <li><a href="tz.php">Time Zone Map</a></li>
                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="#">Call Handling
                                <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="escalate.php">Escalations</a></li>
                                <li><a href="creditcheck.php">Credit Check</a></li>
                                <li><a href="abr.php">Approved Note abbreviation</a></li>
                                <li class="divider"></li>
                                <li class="dropdown-header">Scripts</li>
                                <li><a href="script.php">App Scripts</a></li>
                                <li><a href="vcp.php">VCP Scripts</a></li>
                                <li><a href="deferals.php">Deferrals and Restructures</a></li>
                                <li><a href="vmspill.php">VM Spills</a></li>
                                <li><a href="scrpt.add.php">Additional Scripts</a></li>
                            </ul>
                        </li>
                        <li><a href="spinfo.php">Things To know!</a></li>
                        <li><a href="faq.php">FAQ</a></li>
                        <li><a href="soldlist.php">Sold List</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li class="navbar-text" id="today"></li>
                        <?php 
                        if($_SESSION['usersec']<3){
                            echo '<li><a href="signup.php?statuscheck=active"><span class="glyphicon glyphicon-user"></span>User List</a></li>
                             <li><a href="includes/logout.inc.php"><span class="glyphicon glyphicon-log-out"></span> Logoff</a></li>';
                        }else{
                            echo '<li><a href="includes/logout.inc.php"><span class="glyphicon glyphicon-log-out"></span> Logoff</a></li>';
                        }
                        ?>
                    </ul>
                </div>
            </div>
        </nav>
        <br>
        <br>
        <br>
        <br>
        <body class="container">