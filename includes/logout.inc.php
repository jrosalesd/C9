<?php
session_start();
$userid = $_SESSION['uid'];
$SysName = $_SESSION['SysName'];
$email = $_SESSION['email'];
$role = $_SESSION['role'];
$username = $_SESSION['username'];
$userstatus = $_SESSION['status'];
session_unset();
session_destroy();
header("Location: ../login.php?login=You have been successfully logged out!");
exit();
?>