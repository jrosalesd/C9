<?php
include 'header.php';
$msg = $_GET['msg'];
if ($seclevel>2) {
    header("Location: home.php");
}
?>
<?php
if (isset($_GET['c'])) {
    if($_GET['c']==1){
        include 'profile.signup.php';
    }else{
        if ($_GET['c']==2) {
            include 'edit.signup.php';
        }else{
            
        }
    }
}else {
    include 'main.signup.php';
}
?>
<?php
include 'footer.php';
?>
