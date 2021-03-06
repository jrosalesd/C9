
<div class="jumbotron">
    <div class="row">
        <?php
        $id = $_GET['id'];
        include 'includes/dbh.inc.php';
        $q = "SELECT * FROM users WHERE user_id='$id'";
        $q_query = mysqli_query($conn, $q);
        $numrows = mysqli_num_rows($q_query);
        if ($numrows > 0) {
           $row =mysqli_fetch_array($q_query);
           ?>
           <div class="col-lg-6 border-right">
               <p class="first-capital">
                   <strong>Name:</strong><br>
                   <?php echo $row['user_first']." ".$row['user_last']; ?>
               </p>
               <p class="first-capital">
                   <strong>Admin Name:</strong><br>
                   <?php echo $row['user_shortname']; ?>
               </p>
               <p>
                   <strong>Email Address:</strong><br>
                   <?php echo $row['user_email']; ?>
               </p class="first-capital">
               <p>
                   <strong>Role:</strong><br>
                   <?php echo $row['user_role']; ?>
               </p>
               <p>
                   <strong>username:</strong><br>
                   <?php echo $row['user_uid']; ?>
               </p>
           </div>
           <div class="col-lg-6">
               <div class="row">
                   <div class="col-md-6">
                       <p class="text-center">
                           <strong>User Status</strong><br>
                           <?php
                           if($row['user_status'] == 1){
                               echo "Active";
                           }else {
                               echo "Inactive";
                           }
                           ?>
                       </p>
                       <br><br><br>
                           
                   </div>
                   <div class="col-md-6">
                       <p class="text-center">
                           <strong>Profile Type</strong><br>
                           <?php
                           $level= $row['user_sec_profile'];
                           $q_sec="SELECT * FROM sec_profile WHERE id='$level'";
                           $q_sec_query=mysqli_query($conn, $q_sec);
                           $numrows_sec=mysqli_num_rows($q_sec_query);
                           if($numrows_sec > 0){
                               $row_sec=mysqli_fetch_array($q_sec_query);
                               echo $row_sec['sec_desc'];
                           } else{
                               echo "No Security Assign";
                           }   
                           ?>
                        </p>
                        <p class="text-center">
                         <strong>User Timezone</strong><br>
                         <?php 
                         $zoneID = $row['user_timezone'];
                         $q="SELECT * FROM time_zones WHERE id='$zoneID'";
                         $q_zone_result = mysqli_query($conn, $q);
                         $numrows = mysqli_num_rows($q_zone_result);
                         if($numrows > 0){
                               $row_zone=mysqli_fetch_array($q_zone_result);
                               echo $row_zone['timezone_name'];
                           } else{
                               echo "No Time Zone Assign";
                           }
                         ?>
                        </p>
                   </div>
                </div>
                <br>
                <div class="text-center">
                    <div class="row">
                        <div class="col-md-6">
                            <a href="./signup.php?c=2&id=<?php echo $id;?>">
                               <button type="button" class="btn btn-primary btn-block active">
                                   <span class="glyphicon glyphicon-edit"></span>
                                   Edit
                               </button>
                            </a>
                        </div>
                        <div class="col-md-6">
                            <a href="./signup.php?statuscheck=1">
                               <button type="button" class="btn btn-success btn-block">
                                   <span class="glyphicon glyphicon-hand-left"></span>
                                   Return
                               </button>
                            </a>
                        </div>
                    </div>
                    <a href="includes/pwreset.inc.php?id=<?php echo $id; ?>">
                       <button type="button" class="btn btn-primary">
                            Password Reset
                        </button> 
                    </a>
                </div>
                <br><br><br>
                <p class="error">
                   <?php echo $_GET['error']; ?>
                </p>
           </div>
           <?php
        }else {
            ?>
            <div class="text-left">
                <p>
                    User with id #<?php echo $_GET['id'];?> does not exit or was deleted from this Database.
                </p>
                <a href="./signup.php?statuscheck=1">
                   <button type="button" class="btn btn-success col-md-2">
                       <span class="glyphicon glyphicon-hand-left"></span>
                       Return
                   </button>
                </a>
            </div>
            <?php
        }
        $conn->close();
        ?>
    </div>
</div>