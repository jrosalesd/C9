<?php
include 'header.php';
?>
<div class="jumbotron">
    <div class="row">
        <div class="col-lg-3">
            <h2 class="text-center" style="color:#3793D2;"><b>Spotloan Information</b></h2>
        </div>
        <div class="col-lg-9" style="border-left: solid;">
            <h3 class="text-center" style="color:#3399FF;"><b>Spotloan has been in business since July 2012</b></h3>
            <div class="row">
                <div class="col-sm-5" style="border-right: 1px solid #000;">
                    <b>Fax Number: </b><br>
                    1 (701) 248-7277
                    <br><br>
                    <b>Physical Address:</b><br>
                    914 Chief Little Shell St NE<br>
                    Belcourt, ND 58316
                    <br><br>
                    <b>Mailing Address:</b><br>
                    P.O. Box 927<br>
                    Palatine, IL 60078-0927
                    <br><br>
                    <b>Working Hours:</b><br>
                    Monday - Friday: 7:00AM - 8:00PM CST<br>
                    Saturday: 9:00AM - 6:00PM CST
                    <br><br>
                    <?php
                    include 'includes/dbh.inc.php';
                    $q="SELECT * FROM debtsalebuyers WHERE NOT PhoneNumber='N/A'";
                    $result= mysqli_query($conn, $q);
                    $numrows= mysqli_num_rows($result);
                    if ($numrows>0) {
                        echo "<b><u>Collection Agency</u></b>";
                        while($row=mysqli_fetch_array($result)){
                            echo "<br><i><b>".$row['Name'].":</b></i></br>";
                            echo "Phone Number: <i>".$row['PhoneNumber']."</i>";
                        }
                        $result->close();
                    }
                    ?>
                </div>
                <div class="col-sm-7">
                    <h5 class="text-center">PAID ON:</h5>
                    <ul class="text-center" type="none">
                        <li><b>1<sup>st</sup> week</b> on any day should be set for <b>7<sup>th</sup></b></li>
                        <li><b>2<sup>nd</sup> week</b> on any day should be set for <b>14<sup>th</sup></b></li>
                        <li><b>3<sup>rd</sup> week</b> on any day should be set for <b>21<sup>st</sup></b></li>
                        <li><b>4<sup>th</sup> week</b> on any day should be set for <b>28<sup>th</sup></b></li>
                    </ul>
                    <div class="row list-inline">
                        <div class="col-sm-5">
                            <b>Restricted States</b><br>
                            Reference <a href="tz.php#restricted">Time Zone Map</a>
                        </div>
                        <div class="col-sm-7">
                            <b>Interest Rate: </b><br>
                            <?php
                            include 'includes/dbh.inc.php';
                            $q="SELECT * FROM rates";
                            $result= mysqli_query($conn, $q);
                            $row= mysqli_fetch_array($result);
                            
                            echo "New Borrower: ".$row[1]."%";
                            echo "<br>";
                            echo "Returnig Borrower: ".$row[2]."%";
                            echo "<br>";
                            if ($seclevel<3) {
                                echo '
                                <button data-toggle="collapse" data-target="#rates">Edit Rates</button>
                                
                                <div id="rates" class="collapse">
                                    <form action="spinfo.php" method="POST">
                                        NewBrwRate:<br>
                                        <input type="text" name="nbrwr"/><br>
                                        ReturnBrwRate:<br>
                                        <input type="text" name="rbrwr"/><br>
                                        Update Date:<br>
                                        <input type="date" name="updt"/><br><br>
                                        <input type="submit" name="update" value="update"/>
                                        <div><?php echo msg;?></div>
                                    </form>
                                </div>
                                ';
                                if (isset($_POST['update'])) {
                                    $newbrw = $_POST['nbrwr'];
                                    $retbrw = $_POST['rbrwr'];
                                    $update = $_POST['updt']; 
                                    
                                    include 'includes/dbh.inc.php';
                                    $q="UPDATE `rates` SET `new_brw`='$newbrw',`return_brw`='$retbrw',`update`='$update' WHERE 1";
                                    mysqli_query($conn, $q) or die("Unable to Update ".mysqli_error($conn));
                                    echo '<meta http-equiv="refresh" content="1">';
                                    $result->close();
                                }
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
include 'footer.php';
?>