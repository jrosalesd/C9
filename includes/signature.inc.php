<p>Sincerely,</p>
<br>
<div>
    <p >
        <g class="text-capitalize"><?php echo $SysName;?>.</g>
        <br>
        <?php echo $role;?>
        
        <br>
        <?php
        if($role !="Relationship Manager"){
            echo $email."<br>";
        }else{
            echo "help@spotloan.com"."<br>";
        }
        
        if($role !="Relationship Manager" && $role !="Collection Manager"){
            echo "1 (888) 681-6811 <br>1 (701) 248-7277(Fax)"."<br>";
        }else{
            echo   "1 (888) 681-6811"."<br>";
        }
        ?>
        www.spotloan.com 
    </p>
</div>
        
        
</div>
