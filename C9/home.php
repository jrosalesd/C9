<?php
include 'header.php';
?>
<div class="jumbotron">
    <div class="row text-center">
        <div class="col-md-4">
            <a class="btn" href="https://admin.spotloan.com/" target="_blank">
                <img src="format/img/adminlink.jpg" height="100pg" width="270pt" alt="Go to Spotloan Admin"/>
            </a>
        </div>
        <div class="col-md-4">
            <a class="btn" href="https://mail.google.com" target="_blank">
                <img src="format/img/mail.jpg" height="100pg" width="270pt" alt="Go to Gmail"/>
            </a>
        </div>
        <div class="col-md-4">
            <a class="btn" href="https://login.incontact.com" target="_blank">
                <img src="format/img/incon.png" height="100pg" width="270pt" alt="Go to Gmail"/>
            </a>
        </div>
    </div>
    <hr>
        <p>
            Please be aware that we are not able to process any PDS debit card payments in the following states:<br/> 
            <?php
            include 'includes/dbh.inc.php';
            $q="SELECT  `state_name`, `state_abr` FROM  `servicing_states` WHERE  `state_status` =  'Yes' AND  `state_dc_status` =  'no'";
            $result = mysqli_query($conn, $q);
            $numrows = mysqli_num_rows($result);
            if ($numrows >0) {
                while($row = mysqli_fetch_array($result)){
                    echo "<b>".$row[0]."(".$row[1].")</b>, ";
                }echo ".";
                $result->close();
            }
            ?>
        </p>
    <hr/>
        <p>
            Please be aware we no longer lend on the following states:<br/> 
            <?php
            include 'includes/dbh.inc.php';
            $q="SELECT  `state_name`, `state_abr`  FROM  `servicing_states` WHERE  `state_status` =  'no'";
            $result = mysqli_query($conn, $q);
            $numrows = mysqli_num_rows($result);
            if ($numrows >0) {
                while($row = mysqli_fetch_array($result)){
                echo "<b>".$row[0]."(".$row[1].")</b>, ";
                }echo ".";
            }
            $result->close();
            ?>
        </p>
    <hr>
        <div class="panel-group" id="tools">
            <div>
                <button class="btn col-sm-3 btn-default " data-parent="#tools" data-toggle="collapse" href="#memos">Memo Builder <span class="caret"></span></button>
            </div>
            <br><br>
            <div id="memos" class="panel-collapse collapse"><br> 
                <div class="row">
                    <div>
                        Enter Caller ID:<br>
                        <input type="text" id="cid">
                    </div>
                    <br>
                    <div class="col-md-4">       
                        Call Reason:<br>
                        <textarea rows="4" cols="4" wrap="hard" id="reason"></textarea>       
                        <br>Info Provided:<br>
                        <textarea rows="4" cols="4" wrap="hard" id="info"> </textarea>       
                        <br>Changes:<br>
                        <textarea rows="4" cols="4" wrap="hard" id="action"></textarea>        
                        <br>
                        <button type="submit" onclick="txtMemo();return false">Create Note</button>
                    </div>      
                    <div class="col-md-8">      
                        <div>
                        <p id="riaOutcome"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <br><br>    
    <hr>
    <div>  
        <div>
            <ul class="nav nav-pills">
                <li>
                    <a class="btn btn-success <?php if($_GET['c'] == 1){echo "active";}?>" href="home.php?c=1#calculators">
                        Daily Interest Calculator
                    </a>
                </li>
                <li>
                    <a class="btn btn-success <?php if($_GET['c'] == 2){echo "active";}?>" href="home.php?c=2#calculators">
                        DC Payoff Calculator
                    </a>
                </li>
            </ul>
        </div>
        <hr>
        <div id="calculators">
            <?php
            if (isset($_GET['c'])) {
                if ($_GET['c']== 1) {
                    //Daily Interest Calculator
                    ?>
                    <div id="daily">
                        <div class="row text-center">
                            <h2 class="text-center">
                                Interest Calculator
                            </h2>
                            <br>
                            <div class="col-md-6" style="border-right:solid;">
                                <form class="form-horizontal" role="form">
                                    <div class="form-group">
                                        <label class="control-label col-sm-6">
                                            Principal Balance:
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="number" class="form-control" id="principal" size="10" placeholder="ie: 800" step="0.01" max="800" min="0" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-6">
                                            Interest rate:
                                        </label>
                                        <div class="col-sm-6"> 
                                            <input type="number" max="500" min="0" class="form-control" id="rate" size="10" placeholder="ie: 450" step="1">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-6">
                                            Next Payment Date:
                                        </label>
                                        <div class="col-sm-6"> 
                                            <input type="date"class="form-control" id="days" placeholder="mm/dd/yyyy">
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button class="btn btn-default" onclick="calc(); return false">
                                                Get Daily Interest
                                            </button>      
                                        </div>
                                    </div>      
                                </form>
                            </div>
                            <div class="col-md-6 text-left">
                                <h3 id="demo"></h3>
                                <h3 id="demo0"></h3>
                            </div>
                        </div>   
                    </div>
                    <?php
                }
                elseif($_GET['c'] == 2){
                    //Debit Card Calculator
                    $outstading= $_GET['CurrentBalance'];
                    $principal= $_GET['CurrentPrincipal'];
                    ?>
                    <div>
                        <div class="row text-center">
                            <h2 class="text-center">
                               Debit Card Payoff Calculator
                            </h2>
                            <br>
                            <div class="col-md-6" style="border-right:solid;">
                                <form class="form-horizontal" role="form" method="get">
                                    <input type="hidden" name="c" value="2"/>
                                    <div class="form-group">
                                        <label class="control-label col-sm-6">
                                            Outstanding Balance:
                                        </label>
                                        <div class="col-sm-6">
                                            <input name="CurrentBalance" type="number" min="0" class="form-control" id="CurrentBalance" size="10" placeholder="ie: 1200.20" step="0.01" value="<?php echo $outstading;?>" required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-6">
                                            Principal Balance:
                                        </label>
                                        <div class="col-sm-6">
                                            <input type="number" max="800" min="0" class="form-control" name="CurrentPrincipal" id="CurrentPrincipal" size="10" placeholder="ie: 800" step="0.01" value="<?php echo $principal;?>"required/>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="control-label col-sm-6">
                                            Interest rate:
                                        </label>
                                        <div class="col-sm-6"> 
                                            <select class="form-control" name="apr" id="APR" required/>
                                                <?php
                                                include 'includes/dbh.inc.php';
                                                $q = "SELECT * FROM rates";
                                                $result = mysqli_query($conn,$q);
                                                $numrows = mysqli_num_rows($result);
                                                if ($numrows > 0) {
                                                    $row=mysqli_fetch_array($result);
                                                    ?>
                                                    <option value="<?php echo $row['new_brw'];?>" <?php if($_GET['apr'] == $row['new_brw']){ echo "selected=selected";}?>>
                                                        <?php echo $row['new_brw']."%";?>
                                                    </option>
                                                    <option value="<?php echo $row['return_brw'];?>" <?php if($_GET['apr'] == $row['return_brw']){ echo "selected=selected";}?>>
                                                        <?php echo $row['return_brw']."%";?>
                                                    </option>
                                                    <?php
                                                }
                                                $conn->close();
                                                ?>
                                                <option value="99" <?php if($_GET['apr'] == 99){ echo "selected=selected";}?>>99%</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group"> 
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button class="submit" class="btn btn-default" name="getpayoff" value=1>
                                                Get CC Payoff
                                            </button>      
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <div class="col-md-6 text-left">
                                <?php
                                if ($_GET['getpayoff']==1) {
                                    include 'includes/holidays.php';
                                    $cur_bal = $_GET['CurrentBalance'];
                                    $pri_bal = $_GET['CurrentPrincipal'];
                                    $rate = $_GET['apr']/100;
                                    
                                    //next Business day
                                    $currentYear = date('Y');
                                    $tmpDate = date('m/d/Y');
                                    $holidays = [ 
                                        date("m/d/Y",mktime(0, 0, 0, 1, 1,$currentYear)), 
                                        date("m/d/Y",strtotime("3 Mondays", mktime(0, 0, 0, 1, 1, $currentYear))), 
                                        date("m/d/Y",strtotime("3 Mondays", mktime(0, 0, 0, 2, 1, $currentYear))), 
                                        date("m/d/Y",strtotime("last Monday of May $currentYear")), 
                                        date("m/d/Y",mktime(0, 0, 0, 7, 4, $currentYear)), 
                                        date("m/d/Y",strtotime("first Monday of September $currentYear")), 
                                        date("m/d/Y",strtotime("2 Mondays", mktime(0, 0, 0, 10, 1, $currentYear))), 
                                        date("m/d/Y",mktime(0, 0, 0, 11, 11, $currentYear)), 
                                        date("m/d/Y",strtotime("4 Thursdays", mktime(0, 0, 0, 11, 1, $currentYear))), 
                                        date("m/d/Y",mktime(0, 0, 0, 12, 25, $currentYear))
                                    ];
                                    
                                    $i = 1;
                                    $nextBusinessDay = date('m/d/Y', strtotime($tmpDate . ' +' . $i . ' Weekday'));
                                    
                                    while (in_array($nextBusinessDay, $holidays)) {
                                        $i++;
                                        $nextBusinessDay = date('m/d/Y', strtotime($tmpDate . ' +' . $i . ' Weekday'));
                                    }
                                    
                                    $d1 = strtotime($tmpDate)/86400;
                                    $d2 = strtotime($nextBusinessDay)/86400;
                                    $date_diff = ($d2 - $d1);
                                    
                                    $brw_pay = $cur_bal-($date_diff*(($pri_bal * $rate)/365));
                                    $brw_save = $cur_bal - $brw_pay;
                                    $confID = strtoupper(substr(md5(uniqid(rand(), true)), 8, 8));
                                    
                                    ?>
                                    <p>
                                        <?php
                                        echo "Today is: <b>".date('l')."</b>";
                                        
                                        ?>
                                        <br><b>Payoff ID:</b> <?php echo $confID;?>
                                    </p>
                                    <p>
                                        <b>Current Balance:</b> <?php if(empty($cur_bal)){echo "Enter outstanding Balance";}else{ echo "$".number_format($cur_bal,2,".",",");}?>
                                        
                                        <br><b>Principal Balance:</b> <?php if(empty($pri_bal)){echo "Enter Principal Balance";}else{ echo "$".number_format($pri_bal,2,".",",");}?> 
                                        
                                        <br><b>Interest rate:</b> <?php echo $rate*100;?>%
                                        <br><b>Debit Card Payoff:</b> $<?php echo number_format($brw_pay,2,".",",");?>
                                        <br><b>Borrower will Save:</b> $<?php echo number_format($brw_save,2,".",",");?>
                                    </p>
                                    <p>
                                        <b><u>Read This Verbatim</u></b><br>
                                        By providing me with your debit card information, you represent that you are the owner of the debit card and you authorize Spotloan to electronically process a one-time debit card payment in the amount of <b>$<?php echo number_format($brw_pay,2,".",",");?> Today, <?php echo date("l, F d, Y h:m:s a");?></b>. Do you understand and agree with this statement?
                                    </p>
                                <?php    
                                }
                                ?>    
                            </div>
                        </div>
                    </div>
                    <?php
                    
                }
            }
            ?>
        </div>
    </div>
</div>
<?php
include 'footer.php'
?>