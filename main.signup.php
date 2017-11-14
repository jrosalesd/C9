<?php

?>
<div class="jumbotron">

<div class="row">
    <div class="col-lg-6">
        <button onclick="document.getElementById('id01').style.display='block'" style="width:auto;"> <span class="fa fa-user-plus"></span> New User</button>
        
        <div class="error0">
            <p>
                <?php echo $_GET['message'];?>
            </p>
        </div>
        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
            <form class="modal-content animate" action="includes/signup.inc.php" method="post">
                <div class="container">
                    <div class="error">
                        <p>
                            <?php echo $_GET['message'];?>
                        </p>
                    </div>
                    <label><b>First Name</b></label>
                    <input type="text" placeholder="First Name" name="user_first" id="user_first" value="<?php echo $_GET['user_first']; ?>" required>

                    <label><b>Last Name</b></label>
                    <input type="text" placeholder="Last Name" name="user_last" id="user_last" value="<?php echo $_GET['user_last']; ?>" required>
    
                    <label><b>Short Name</b></label>
                    <input type="text" placeholder="Short Name" name="user_shortname" id="user_shortname" value="<?php echo $_GET['user_shortname']; ?>" required>
    
                    <label><b>Username</b></label>
                    <input  type="text" placeholder="Username" name="user_uid" id="user_uid" value="<?php echo $_GET['user_uid']; ?>" required>
      
                    <label><b>E-mail</b></label>
                    <input  type="email" placeholder="E-mail" name="user_email" id="user_email" value="<?php echo $_GET['user_email']; ?>" required>
      
                    <label><b>Role</b></label>
                    <select name="user_role" id="user_role" required>
                        <option value ="">Select One</option>
                        <option value ="Manager/Supervisor" <?php if($_GET['user_role']=="Manager/Supervisor"){ echo 'selected="selected"';} ?> >Manager/Supervisor</option>
                        <option value ="Collection Manager" <?php if($_GET['user_role']=="Collection Manager"){ echo 'selected="selected"';} ?>>Collection Manager</option>
                        <option value ="Credit Service Manager" <?php if($_GET['user_role']=="Credit Service Manager"){ echo 'selected="selected"';} ?>>Credit Service Manager</option>
                        <option value ="Debt Consolidation" <?php if($_GET['user_role']=="Debt Consolidation"){ echo 'selected="selected"';} ?>>Debt Consolidation</option>
                        <option value ="Relationship Manager" <?php if($_GET['user_role']=="Relationship Manager"){ echo 'selected="selected"';} ?>>Relationship Manager</option>
                        <option value ="Servicing" <?php if($_GET['user_role']=="Servicing"){ echo 'selected="selected"';} ?>>Servicing</option>
                    </select>
            
                    <label><b>Security Level</b></label>
                        <?php
                        include 'includes/dbh.inc.php';
                        $q_sec="SELECT * FROM sec_profile";
                        $q_sec_query=mysqli_query($conn, $q_sec);
                        $numrows_sec=mysqli_num_rows($q_sec_query);
                        if($numrows_sec > 0){
                            ?>
                            <select name="user_sec_profile" id="user_sec_profile" required> 
                                <option value="">Choose One</option>
                                <?php
                                while($row_sec=mysqli_fetch_array($q_sec_query)){
                                    ?>
                                    <option value="<?php echo $row_sec[0]?>" <?php if($_GET['user_sec_profile']==$row_sec[0]){ echo 'selected="selected"';} ?>><?php echo $row_sec[1]?></option>
                                    <?php
                                }
                       }   
                       ?>
                    </select>
                    <label><b>User Timezone</b></label>
                    <?php
                        $q_time_zones="SELECT * FROM time_zones";
                        $q_time_zones_query=mysqli_query($conn, $q_time_zones);
                        $numrows_time_zones=mysqli_num_rows($q_time_zones_query);
                        if($numrows_time_zones > 0){
                            ?>
                            <select name="user_timezone" id="user_timezone" required> 
                                <option value="">Choose One</option>
                                <?php
                                while($row_time_zones=mysqli_fetch_array($q_time_zones_query)){
                                    ?>
                                    <option value="<?php echo $row_time_zones[0]?>" <?php if($_GET['user_sec_profile']==$row_time_zones[0]){ echo 'selected="selected"';} ?>><?php echo $row_time_zones[1]." - ".$row_time_zones[2];?></option>
                                    <?php
                                }
                       }   
                       ?>
                    </select>
    
                    <label><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="user_pass" required>
            
                    <label><b>Repeat Password</b></label>
                    <input type="password" placeholder="Repeat Password" name="user_pass_repeat" required>
            
                    <input type="hidden" name="user_status" value="1"/>
                    <input type="hidden" name="pass_status" value="0"/>

                    <div class="clearfix">
                        <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                        <button type="submit" name="usercreate" class="signupbtn">Sign Up</button>
                    </div>
                </div>
                
            </form>
        </div>
    </div>
    <div class="col-lg-6">
        <?php
        include 'includes/dbh.inc.php';
        $q="SELECT * FROM users WHERE user_id='$userid'";
        $result=mysqli_query($conn, $q);
        $row=mysqli_fetch_array($result);
        if($row[9] == 1){
            ?>
            <div class="form">
                <div><h4>Uploan users in bulk</h4></div>
                <div>
                    <form action="includes/newbulkuser.inc.php" method="post" enctype="multipart/form-data">
                        <div>
                            <input class="form-control" type="file" name="file"/>
                            <input class="btn btn-success" type="submit" name="import" value="Upload"/>
                        </div>
                    </form>
                </div>
            </div>
            <?php
        }
        $conn->close();
        ?>
    </div>
    <?php echo $msg;?>
</div>    
</div>
<div class="jumbotron">
    <h3 class="text-center">Users</h3>
    <div class="pull-right">
        <form class="form-inline" method="get" action="signup.php">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="Search" name="search" value="<?php echo $_GET['search']; ?>">
            </div>
            <div class="form-group">
                <select name="statuscheck" id="statuscheck" class="form-control col-md-3 pull-right">
                    <option value=""></option>
                    <option value="active" <?php if($_GET['statuscheck']=='active'){echo "selected";}?>>Active</option>
                    <option value="inactive"<?php if($_GET['statuscheck']=='inactive'){echo "selected";}?>>In-Active</option>
                </select>
            </div>
            <button type="submit" class="form-control btn btn-default col-md-3 pull-right" name="searchbtn">
                <span class="glyphicon glyphicon-search"></span> Search
            </button>
            
        </form>
    </div>
    <div>
        <table class="user-table table-hover">
            <thead>
            <tr class="text-center">
                <th>Name</th>
                <th>Short Name</th>
                <th>Username</th>
                <th>Role</th>
                <th>E-Mail</th>
                <th>Status</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
                <?php
                include 'includes/dbh.inc.php';
                
                    if (isset($_GET['searchbtn'])) {
                        $srchitem = trim(mysqli_real_escape_string($conn, $_GET['search']));
                        if ($_GET['statuscheck']=='inactive'){
                            $statuscheck = 0;
                        }elseif($_GET['statuscheck']=='active'){
                            $statuscheck = 1;    
                        }
                        if (!empty($_GET['statuscheck'])&& empty($_GET['search'])) {
                            $query = "SELECT * FROM users Where user_status=$statuscheck ORDER BY user_sec_profile ASC";
                        }elseif (empty($_GET['statuscheck'])&& !empty($_GET['search'])) {
                           $query = "SELECT * FROM users WHERE  user_first LIKE '%$srchitem%' OR user_last LIKE '%$srchitem%' OR user_shortname  LIKE '%$srchitem%' OR user_email LIKE '%$srchitem%' OR user_uid LIKE '%$srchitem%' OR user_role LIKE '%$srchitem%'";
                        }elseif (!empty($_GET['statuscheck'])&& !empty($_GET['search'])){
                            $query = "SELECT * FROM users WHERE user_first LIKE '%$srchitem%' OR user_last LIKE '%$srchitem%' OR user_shortname  LIKE '%$srchitem%' OR user_email LIKE '%$srchitem%' OR user_uid LIKE '%$srchitem%' OR user_role LIKE '%$srchitem%' AND user_status=$statuscheck";
                        }elseif(empty($_GET['statuscheck'])&&empty($_GET['search'])){
                            $query = "SELECT * FROM users ORDER BY user_status DESC, user_sec_profile ASC";
                        }
                    }else{
                        $query = "SELECT * FROM users ORDER BY user_status DESC, user_sec_profile ASC";
                    }
                    $result = mysqli_query($conn, $query);
                    $numrows = mysqli_num_rows($result);
                    if($numrows >0){
                        while($row= mysqli_fetch_array($result)){
                            ?>
                            <tr>
                                <td class="first-capital">
                                    <?php echo $row['user_first']." ".$row['user_last'];?>
                                </td>
                                <td class="first-capital">
                                    <?php echo $row['user_shortname'];?>
                                </td>
                                <td>
                                    <?php echo $row['user_uid']; ?>
                                </td>
                                <td class="first-capital">
                                    <?php echo $row['user_role']; ?>
                                </td>
                                <td>
                                    <?php echo $row['user_email']; ?>
                                </td>
                                <td>
                                    <?php if($row['user_status']==1){echo "Active";}else{echo "In-Active";} ?>
                                </td>
                                <td>
                                    <a class="btn btn-default" href="./signup.php?c=1&id=<?php echo $row['user_id'];?>">
                                        <span class="glyphicon glyphicon-user"></span>
                                        User Profile
                                    </a>
                                </td>
                            </tr>    
                            <?php
                        }
                    }else{
                        ?>
                        <tr colspan="7">
                            <td class="text-center"><h3><b><?php echo $numrows;?> Recods Found</b></h3></td>
                        </tr>
                        <?php
                    }
                $conn->close();
                ?>
            </tbody>
            <tfoot>
                <?php
                    echo "<p>".$numrows." items found</p>";
                ?> 
            </tfoot>
        </table>
    </div>
</div>
<script>
    var modal = document.getElementById('id01');

    // When the user clicks anywhere outside of the modal, close it
    window.onclick = function(event) {
        if (event.target == modal) {
            modal.style.display = "none";
        }
    }

    document.getElementById('user_last').onchange=function() {shortName()};
    

    function shortName() {
        var fName = document.getElementById('user_first').value;
        var lName = document.getElementById('user_last').value;
        var replace = fName + " " + lName.substring(0,1);
        var replaceuid = fName + lName.substring(0,1);
    
        var x = document.getElementById('user_shortname');
        var z = document.getElementById('user_uid');
        x.value = replace;
        z.value = replaceuid.toLowerCase();
    }
    document.getElementById('statuscheck').onchange=function() {updatelist()};
    
    function updatelist(){
        var statuscheck = document.getElementById('statuscheck').value
    }
</script>


