<?php
include 'header.php';
$msg=$_GET['msg'];
?>
        <div class="jumbotron">
            <div class="row">
                <div class="col-md-6">
                    <div>
                        <form action="" method='get' class="navbar-form navbar-left">
                            <div class="form-group">
                                <input type="text" name="term" class="form-control" value="<?php echo $_GET['term'];?>" placeholder="Search">
                            </div>
                            <button type="submit"  name="search" class="btn btn-default">Search</button>
                        </form>
                    </div><br/>
                </div>
                <div class="col-md-6 text-right">
                    <?php
                    if($seclevel<2){
                        echo '<div align="right">Uploan update for SoldList</div>';
                        echo '
                            <form action="includes/soldlist.update.inc.php" method="post" enctype="multipart/form-data">
                                <div align="right">
                                    <input type="file" name="file"/>
                                    <input type="submit" name="import" value="Upload"/>
                                </div>
                            </form>';
                        echo '<div align="right"><font color="red">'.$msg.'</font></div>';
                        ?>
                        <div align="right">
                            <a href="./files/docUpload.csv">
                                <button align="right" type="button" class="btn btm-default col-md-4">
                                    <span class="glyphicon glyphicon-cloud-download"></span>
                                    Download Template
                                </button>
                            </a>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        <div class="jumbotron">
            <div class="table-responsive">
                <table class="table table striped">
                    <tr>
                        <th>Loan ID</th>
                        <th>Buyer Code</th>
                        <th>Buyer Name</th>
                        <th>Phone Number</th>
                        <th>Sold Date</th>
                    </tr>
                    <?php
                        include 'includes/dbh.inc.php';
                        if(isset($_GET['search'])){
                            if(!empty($_REQUEST['term'])){
                                $term = trim(mysqli_real_escape_string($conn,$_GET['term']));
                                $slq = "SELECT soldlist.Loan_ID, soldlist.Buyer, debtsalebuyers.Name, debtsalebuyers.PhoneNumber, soldlist.Sold_Date FROM soldlist, debtsalebuyers WHERE soldlist.Buyer = debtsalebuyers.Code AND soldlist.Loan_ID LIKE '%$term%' OR soldlist.Buyer LIKE '%$term%' OR debtsalebuyers.Name LIKE '%$term%'";
                                $slq_result = mysqli_query($conn,$slq);
            
                                if(mysqli_num_rows($slq_result) != 0){
                                    while($row = mysqli_fetch_array($slq_result)){
                    ?>
                    <tr>
                        <td><?php echo $row[0]; ?></td>
                        <td><?php echo $row[1]; ?></td>
                        <td><?php echo $row[2]; ?></td>
                        <td><?php echo $row[3]; ?></td>
                        <td><?php echo $row[4]; ?></td>
                    </tr>
                    <?php
                        }
                        $slq_result->close();
                    }else{
                        echo "<p>No Recods Found</p>";
                        }
                         
                    }
                        }
                    ?>
                </table>
            </div>
        </div>
        
<?php
    include 'footer.php';
?>