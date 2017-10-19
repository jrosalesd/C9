<?php
include 'header.php';
$temp = $_GET['temp'];
$back = --$temp;
$forth= ++$back;
$one_day_sec = 86400;
$current = date("Y");
if (strtotime("now") < strtotime("first Sunday of November $current") && strtotime("now")>strtotime("second Sunday of March $current")) {
	$setDst = 1;
}else{
	$setDst = 0;
}

?>
<?php
if ($_GET['col'] == 1) {
	if ($_GET['temp'] == 1) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button" title="Delinquent 1">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			
			<div class="row">
				<div class="col-md-3">
					<h2>
						Collection Department Email – ‘Hey, you’re in Collection!’
					</h2>
					<font color="red">
						<h5>
							<b>Generate:</b> Copy and Paste<br>
							<b>Template:</b> Spotloan email with logo<br>
							<b>Action:</b> Manual - RM/FR to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if ($_GET['set'] == "on") {
						$brwName = $_GET['brwName'];
						$rm = $_GET['rm'];
						$loanAmt = $_GET['loanAmt'];
						$laonDate = date_format(date_create($_GET['loanDate']),'F jS, Y');
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<br>
						<div>
							<p>
								<strong>
									Subject:
								</strong> 
								Save money. Call me, <?php echo $SysName;?>, at Spotloan
							</p>
							<br>
							
							<p>
								Hi <?php echo $brwName;?>,
							</p>
							<br>
							
							<p>
								<g class="proper"><?php echo $rm;?></g>. sent me your account to review because of your recent missed payment(s). Looking at your account, you received $<?php echo number_format($loanAmt,2,".",",");?> on <?php echo $laonDate;?>. Now is the time to keep this loan on track.
							</p>
							
							<p>
								I can help you save money. If you’re willing to make your payments, we can create a schedule that works for you.
							</p>
							
							<p>
								Please give me a call at 1(888) 681-6811  or reply to this email as soon as possible.
							</p>
							
							<br>
							<?php
							include('includes/signature.inc.php');
							?>
						</div>
						<?php
						
					}else{
						?>
						<h2 class="text-center">
							Fill out all Fields
						</h2>
						<br>
						<br>
						<form class="form-vertical" method="get" >
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower Name:
										</label>
										<input type="text" class="form-control"  name="brwName" required>
									</div>
									<div class="form-group">
										<label for="loanDate">
											Loan Deposit Date:
										</label>
										<input type="date" class="form-control" name="loanDate" required>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="rm">
											Previous RM:
										</label>
										<select class="form-control" name="rm" required>
											<option>Choose Name</option>
											<?php
											include 'includes/dbh.inc.php';
											$q = "SELECT * FROM users WHERE user_status=1 AND user_sec_profile>2 ORDER BY user_role, user_first ASC";
											$result = mysqli_query($conn, $q);
											$numrows = mysqli_num_rows($result);
											if ($numrows > 0) {
												while($row=mysqli_fetch_array($result)){
													?>
													<option class="text-capitalize" value="<?php echo $row['user_shortname'];?>">
													<?php echo $row['user_shortname'];?>.
													</option>
													<?php
												}
											}
											$conn->close();
											?>
										</select>
									</div>
									<div class="form-group">
										<label for="loanAmt">
											Loan Amount:
										</label>
										<select name="loanAmt" class="form-control" required>
											<option value=""></option>
											<?php for($i = 300; $i <= 800; $i+=100){
												?>
												<option value="<?php echo $i;?>"><?php echo "$".number_format($i,2,".",",");?></option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>	
							<br>
							<button type="submit" name="set" class="btn btn-success" value="on">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>	
		</div>
		<?php
	}elseif ($_GET['temp'] == 2) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						DQ 1 Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$pastdue = $_GET['pastdue'];
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<br>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject: 
							</strong>
							<?php echo $brwName;?>, something went wrong. Please call me!
						</p>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							Something went wrong with your most recent Spotloan payment and I need you to contact me as soon as possible so that we can get this sorted out.
						</p>
						<p>
							Your account is now <?php echo $pastdue;?> days past due.
						</p>
						<p>
							Missing a payment not only extends the life of your loan, but also causes more interest to add up. This can result in extra payments if we don’t work to get back on track quickly.
						</p>
						<p>
							You can call me at 1(888) 681-6811 and I can work with you.
						</p>
						<br>
						
						<?php
						include('includes/signature.inc.php');
						?>
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="form form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">Borrower Name:</label>
										<input type="text" class="form-control"  name="brwName" required>
									</div>
									<div class="form-group">
										<label for="pastdue">Past Due Days:</label>
										<input type="number" class="form-control" min="0" name="pastdue" required>
									</div>
								</div>
								<div class="col-md-5">
									
								</div>
								<div class="col-md-2"></div>
							</div>
							<br>
							<button type="submit" name="set" class="btn btn-success" value="on">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 3) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						DQ 2 Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						$brwName = trim($_GET['brwName']);
						$lstmspmt = date_format(date_create($_GET['lstmspmt']),"F jS, Y");
						$nxtpmt = date_format(date_create($_GET['nxtpmt']),"l, F jS, Y");
						$nextpmtamt = number_format($_GET['nxtpmtamt'],2,".",",");
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<br>
						<div>
							<p>
								<strong>
									Subject:
								</strong> 
								<?php echo $brwName;?>, call to save your account
							</p>
							<br>
							
						    <p>
						    	Hi <?php echo $brwName;?>,
						    </p>
						    <br>
						    
						    <p>
						    	I still have not heard from you regarding your missed Spotloan payment on <?php echo $lstmspmt;?>. Your next payment is due on <?php echo $nxtpmt;?> for $<?php echo $nextpmtamt;?>.
						    </p>
						    
						    <p>
						    	You can call me at  1(888) 681-6811 so we can chat about your situation and how I can help. You can also reply to this email to let me know what happened. I'd like to get you back on track and save you money.
						    </p>
						
						    <p>
						    	Please contact me today.
						    </p>
						    <br>
						    <?php
						    include('includes/signature.inc.php');
						    ?>
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill out all Fields
						</h2>
						<br>
						
						<form class="form form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">Borrower Name:</label>
										<input type="text" class="form-control"  name="brwName" required>
									</div>
									<div class="form-group">
										<label for="nxtpmtamt">Next Payment Date:</label>
										<input type="number" class="form-control" step="0.01" name="nxtpmtamt" required>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="lstmspmt">First Missed Payment:</label>
										<input type="date" class="form-control" name="lstmspmt" required>
									</div>
									<div class="form-group">
										<label for="nxtpmt">Next Payment Date:</label>
										<input type="date" class="form-control" name="nxtpmt" required>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>		
		<?php
	}elseif ($_GET['temp'] == 4) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						DQ 3 Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$lstmspmt = date_format(date_create($_GET['lstmspmt']),"F jS, Y");
						$nxtpmt = date_format(date_create($_GET['nxtpmt']),"l, F jS, Y");
						$nextpmtamt = number_format($_GET['nxtpmtamt'],2,".",",");$brwName = trim($_GET['brwName']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject:
							</strong>
							<?php echo $brwName;?>, call to save your account
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							I still have not heard from you regarding your missed Spotloan payment on <?php echo $lstmspmt;?>. Your next payment is due on <?php echo $nxtpmt;?> for $<?php echo $nextpmtamt;?>.
						</p>
						
						<p>
							You can call me at  1(888) 681-6811 so we can chat about your situation and how I can help. You can also reply to this email to let me know what happened. I'd like to get you back on track and save you money.
						</p>
						<p>
							Please contact me today.
						</p>
						<br>
						
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill out all Fields
						</h2>
						<br>
						
						<form class="form form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">Borrower Name:</label>
										<input type="text" class="form-control"  name="brwName" required>
									</div>
									<div class="form-group">
										<label for="nxtpmtamt">Next Payment Amount:</label>
										<input type="number" class="form-control" step="0.01" name="nxtpmtamt" required>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="lstmspmt">First Missed Payment:</label>
										<input type="date" class="form-control" name="lstmspmt" required>
									</div>
									<div class="form-group">
										<label for="nxtpmt">Next Payment Date:</label>
										<input type="date" class="form-control" name="nxtpmt" required>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 5) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						Broken Agreement Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer misses a payment arrangement and the agent wants to follow up. 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>Manual - RM/FR to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$arrangementDate = date_format(date_create($_GET['misspmtdate']),"F jS, Y");
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject:
							</strong> 
							A quick follow up
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							When we last connected, you promised me that you would make a payment on <?php echo $arrangementDate;?>. I see that this payment wasn’t made. I’m willing to work with you, but I need your cooperation.
						</p>
						<p>
        					Please give me a call at 1(888) 681-6811  or reply to this email as soon as possible.
        				</p>
        				<br>
        				
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower Name:
										</label>
										<input type="text" class="form-control"  name="brwName" required>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="misspmtdate">
											Next Payment Date:
										</label>
										<input type="date" class="form-control" name="misspmtdate" required>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
}elseif ($_GET['col'] == 2) {
	// First payment Default (temp)
	if ($_GET['temp'] == 1) {
		//First Pay Default 1st Email
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4"></li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						First Pay Default 1st Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b> Manual - Agent to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject: 
							</strong>
							Call Spotloan quickly to get back on track!
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<p>
							You’ve missed your first payment on your Spotloan. It is critical that we get your account back on track.
						</p>
						<p>
							Ignoring this situation will only make it worse. I’d like to help you, and the first step is just talking about what went wrong with this payment.
						</p>
						<p>
							Please call me at 1(888) 681-6811 You can also reply to this email to let me know what happened.
						</p>
						<br>
						
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 2) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						First Pay Default 2<sup>nd</sup> Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$orLoanDate = date_format(date_create($_GET['orLoanDate']),"F jS, Y");
						$orLoanAmt = $_GET['orLoanAmt'];
						$orLoanLength = $_GET['orLoanLength'];
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject: 
							</strong> 
							Let me know what happened. Call Spotloan RM.
						</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						<p>
							On <?php echo $orLoanDate;?>, when you needed some help, Spotloan gave you $<?php echo number_format($orLoanAmt,2,".",",");?>. In return, you promised to repay the loan over <?php echo $orLoanLength;?> months. You have not made a single payment on this debt.
						</p>
						<p>
							Call  1(888) 681-6811 or email me right away to let me know what happened.
						</p>
						<p>
							I look forward to talking with you.
						</p>
						<br>
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
									<div class="form-group">
										<label for="orLoanAmt">
											Original Loan Amount:
										</label>
										<select class="form-control" name="orLoanAmt" required>
											<option value=""></option>
											<?php for($i = 300; $i <= 800; $i+=100){
												?>
												<option value="<?php echo $i;?>"><?php echo "$".number_format($i,2,".",",");?></option>
												<?php
											}
											?>
										</select>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="orLoanDate">
											Original Loan Date:
										</label>
										<input class="form-control" type="date" name="orLoanDate" required/>
									</div>
									<div class="form-group">
										<label for="orLoanLength">
											Original Loan Length:
										</label>
										<input class="form-control" type="number" min="3" name="orLoanLength" required/>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 3) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						First Pay Default 3<sup>rd</sup> Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject: 
							</strong>
							Spotloan payment due ASAP! Call Spotloan
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							I have tried repeatedly to connect with you about your delinquent Spotloan. This is a serious situation that needs to be resolved immediately.
						</p>
						<p>
							If you call me, I can save you a lot of money – missing a payment makes your loan last longer and adds interest. By contacting me, we can make up your missed payment in a way that works for you.
						</p>
						<p>
							You can call me at  1(888) 681-6811 so we can chat about your situation and how I can help. You can also reply to this email to let me know what happened.
						</p>
						<br>
						
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 4) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						First Pay Default 4<sup>th</sup> Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$dayPastDue = $_GET['dayPastDue'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset <span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject: 
							</strong> 
							Your payment is <?php echo $dayPastDue;?> days past due. Please call me
						</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							I have tried to reach you repeatedly by phone and email.
						</p>
						
						<p>
							Failure to call 1(888) 681-6811 will result in the following actions:
						</p>
						<div style="margin-left: 25px;">
							<p>
								1. Your account will continue to accrue interest; waiting will only put you more in debt.<br>
								2. Spotloan will continue its collection efforts.<br>
								3. Our lawyers may review your account and take legal action.<br>
							</p>
						</div>
						
						<p>
							You <b><i>must</i></b> contact me as soon as you receive this email. I can’t help you if you don’t call me. I’m willing to work with you on this account to save you money and get you back on track.
						</p>
						<p>
							Please call 1(888) 681-6811 right away.
						</p> 
						<br>
						
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="dayPastDue">
											Days Past Due:
										</label>
										<input class="form-control" type="number" name="dayPastDue" required/>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
}elseif ($_GET['col'] == 3) {
	// General Collection Emails
	if ($_GET['temp'] == 1) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						Settlement Offer Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>(For when we can’t call someone, but we can send them an email) 
							<br>
							<b>Template: </b> Spotloan email with logo
							<br>
							<b>Action: </b>Manual - RM/FR to edit and send
							<br>
							<br>
							<b>Description: </b>Use this template to provide settlement options to borrowers.
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$balance = $_GET['balance'];
						$optOne = $_GET['optOne'];
						$optOneDeadLine = date_format(date_create($_GET['optOneDeadLine']),"F jS, Y");
						$optOneSave= $balance - $optOne;
						$optTwo = $_GET['optTwo'];
						$optTwocount = $_GET['optTwocount'];
						$optTwoFreq = $_GET['optTwoFreq'];
						$optTwoAmt = $optTwo/$optTwocount;
						$optTwoSave= $balance - $optTwo;
						$dueDate = date_format(date_create($_GET['dueDate']),"F jS, Y");
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject:
							</strong> 
							Special Spotloan offer for you
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							Great news – You’re eligible for a settlement with Spotloan! I’ve taken a look at your account and right now you have an outstanding balance of $<?php echo number_format($balance,2,".",",");?> However, we are willing to settle your account in full if you pay a portion of the remaining balance.
						</p>
						<p>Here are two options:</p>
						<div style="margin-left: 25px;">
							<p>
								1) Pay $<?php echo number_format($optOne,2,".",",");?> all at once as a lump sum payment. This saves you $<?php echo number_format($optOneSave,2,".",",");?> and is your best option. If you want to do this, make sure that we receive the funds no later than <?php echo $optOneDeadLine;?>.
							</p>
							<p>
								2) Pay $<?php echo number_format($optTwo,2,".",",");?> as <?php echo $optTwocount." ".$optTwoFreq;?> payments of $<?php echo number_format($optTwoAmt,2,".",",");?>. This still saves you money – $<?php echo number_format($optTwoSave,2,".",",");?> – but not as much as Option 1.
							</p>
						</div>
						<p>
							Either way, I need to know if you would like to accept this offer by <?php echo $dueDate;?>. Please call me at 1(888) 681-6811. I’m here to help so let’s work together to settle this debt.
						</p>
						
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<h3>General</h3>
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
									<div class="form-group">
										<label for="balance">
											Current Balance:
										</label>
										<input class="form-control" type="number" step="0.01" name="balance" id="balance" required/>
									</div>
									<div class="form-group">
									<label for="dueDate" title="Last Date for Borrower to take this option">
										Response Due Date:
									</label>
									<input span="3" class="form-control" type="date"  name="dueDate" required/>
								</div>
								</div>
								<div class="col-md-4">
									<h3>Option One</h3>
									<div class="form-group">
										<label for="percent">
											percent of Balance:
										</label>
										<input class="form-control" type="number" step="0.01" name="percent" id="percent" value="75" required/>
									</div>
									<div class="form-group">
										<label for="optOne">
											Lump Sum Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="optOne" id="optOne" required/>
									</div>
									<div class="form-group">
										<label for="optOneDeadLine" title="Date payment should be received by Spotloan">
											Option 1 Payment due Date:
										</label>
										<input class="form-control" type="date"  name="optOneDeadLine" required/>
									</div>
								</div>
								<div class="col-md-4">
									<h3>Option Two</h3>
									<div class="form-group">
										<label for="percent">
											percent of Balance:
										</label>
										<input class="form-control" type="number" step="0.01" name="percent2" id="percent2" value="85" required/>
									</div>
									<div class="form-group">
										<label for="optTwo">
											Settlement Offer Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="optTwo" id="optTwo" required/>
									</div>
									<div class="form-group">
										<label for="optTwocount">
											Number Of payments:
										</label>
										<input class="form-control" type="number"  name="optTwocount" required/>
									</div>
									<div class="form-group">
										<label for="optTwoFreq">
											Payment Frequency:
										</label>
										<select class="form-control"  name="optTwoFreq" required>
											<option value=""></option>
											<option value="bi-weekly">Bi-Weekly</option>
											<option value="semi-monthly">Semi-Monthly</option>
											<option value="monthly">Monthly</option>
										</select>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-6">
									<button type="submit" name="set" class="btn btn-success" value="on">
									Generate Email
									</button>
								</div>
								<div class="col-md-6">
									<button type="reset" class="btn btn-warning">
									<span class="glyphicon glyphicon-refresh"></span>
									Reset
									</button>
								</div>
							</div>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 2) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						New Settlement Arrangement Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Agent selects to send this from the servicing screen
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>Manual - RM/FR to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$loanID = $_GET['loanID'];
						$start=strtotime($_GET['start']);
						$pmtnum= $_GET['pmtnum'];
						$daynum = $_GET['daynum'];
						$end= $start + ($one_day_sec*($daynum * $pmtnum));
						$stl = $_GET['stl'];
						$stlpmt = $stl/$pmtnum;
						$currentYear = date('Y');
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
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
							<a class="btn btn-warning col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>&brwName=<?php echo $_GET['brwName'];?>&loanID=<?php echo $_GET['loanID'];?>&daynum=<?php echo $_GET['daynum'];?>&start=<?php echo $_GET['start'];?>&pmtnum=<?php echo $_GET['pmtnum'];?>&stl=<?php echo $_GET['stl'];?>">
								<span class="glyphicon glyphicon-edit"></span>
									Edit
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject: 
							</strong>
							Your Spotloan settlement agreement
						</p>
						<br>
						<p>
							Hi <?php echo $brwName?>,
						</p>
						<br>
						<p>
							I would like to recap our conversation and confirm that we have reached an agreement to settle your Spotloan account for the amount of $<?php echo number_format($stl,2,".",",");?>.
						</p>
						
						<p>
							You have agreed to make <?php echo $pmtnum;?> <?php if($daynum==14){echo "Bi-Weekly";}elseif ($daynum==30) {
								echo "Montly";}elseif($daynum==15){echo "Semi-Montly";}?> payments of $<?php echo number_format($stlpmt,2,".",",");?>. Here’s your payment schedule:
						</p>
						<div style="margin-left: 25px;">
							<table class="table table-bordered">
								
								<tr>
									<th>Date</th>
									<th>Payment</th>
									<th>Remaining</th>
								</tr>
								<tr>
									<td class="text-right" colspan=2>
										Initial Balance
									</td>
									<td>
										<?php
										echo "$".number_format($stl,2,".",",");
										?>
									</td>
								</tr>
								<?php
								if ($daynum == 15) {
									$fpmt = date("d",$start);
									$spmt = date("d",$tart+15);
									
									for ($date=$start, $bal=$stl; $date<$end; $date=strtotime("+15 day",$date)) {
										$pmt= $stlpmt;
								        $bal-=$pmt;
								        
								        if (date("m/t/d",$date-(30*$one_day_sec))==31 && date("d",$date) < 17) {
											$date+=$one_day_sec;
										}
								        
								        if (date("w",$date)==6) {
								            $date+=(2*$one_day_sec);
								        }
								        
								        if (date("w",$date)==0) {
								            $date+=$one_day_sec;
								        }
								        
								        if (in_array($date,$holidays)) {
								            $date+=$one_day_sec;
								        }
								        
								        
								        ?>
								        <tr>
								            <td>
								                <?php
								                 echo date("D, M jS, Y", $date);
								                ?>
								            </td>
								            <td>
								                <?php
								                 echo "$".number_format($pmt,2,".",",");
								                ?>
								            </td>
								            <td>
								                <?php
								                 echo "$".number_format($bal,2,".",",");
								                ?>
								            </td>
								        </tr>
								    <?php
									
									}
								}else{
									for ($date=$start, $bal=$stl; $date<$end; $date=strtotime("+$daynum day", $date)) {
									    $pmt= $stlpmt;
								        $bal-=$pmt;
								        if (date("w",$date)==6) {
								            $date+=(2*$one_day_sec);
								        }
								        
								        if (date("w",$date)==0) {
								            $date+=$one_day_sec;
								        }
								        
								        if (in_array($date,$holidays)) {
								            $date+=$one_day_sec;
								        }
								        ?>
								        <tr>
								            <td>
								                <?php
								                 echo date("D, M jS, Y", $date);
								                ?>
								            </td>
								            <td>
								                <?php
								                 echo "$".number_format($pmt,2,".",",");
								                ?>
								            </td>
								            <td>
								                <?php
								                 echo "$".number_format($bal,2,".",",");
								                ?>
								            </td>
								        </tr>
								    <?php    
									}
								}
								
								?>
							</table>
						</div>
						<p>
							You have authorized us to withdraw these payments on the dates shown above from the bank account you provided to Spotloan. You have indicated that you understand your authorization will remain in full force and effect unless you contact us at least <u>2 business days</u> before your scheduled payment to let us know that you would like to revoke this authorization.</p>
						</p>
						<p>
							To send a money order, please mail it to our mail processor at:
						</p>
						<p style="margin-left: 25px;">
							Spotloan
							<br>PO Box 927
							<br>Palatine, IL 60078-0927
							<br>Attention to: <b><?php echo $loanID;?></b> 
						</p>
						<p>
							When you make payments, it is critical that the auto-debits payments be successfully completed and not returned; and that mailed payments arrive by the due date, not just be postmarked. If you do not make your payments in full and on time, this settlement agreement will be void and you will be responsible for repaying the full outstanding balance at the time of default. This would include any interest that would have accrued on that balance if this settlement agreement did not exist (minus any payments you made).
						</p>
						<p>
							Thank you for resolving this debt and fulfilling your commitment. Please let me know if you have any questions or if there’s anything else I can do to help.
						</p>
						<br>
						
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-3">
									<div class="form-group">
										<label for="bal">
											Oustading Balance
										</label>
										<input class="form-control" type="text" id="bal">
									</div>
									<div class="form-group">
										<label for="disc">
											Discount %
										</label>
										<input class="form-control" type="text" id="disc">
									</div>
									<div class="form-group">
										<label for="pmtnums">
											Number of Payments
										</label>
										<input class="form-control" type="text" id="pmtnums">
									</div>
								</div>
								<div class="col-md-9">
									
									<p id="stl0"></p>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" value="<?php echo $_GET['brwName']; ?>" required/>
									</div>
									<div class="form-group">
										<label for="loanID">
											Loan Id:
										</label>
										<input class="form-control" type="text" name="loanID" value="<?php echo $_GET['loanID']; ?>" required/>
									</div>
									<div class="form-group">
										<label for="daynum">
											Payment Frequency:
										</label>
										<select class="form-control" name="daynum" required>
											<option value="14" <?php if($_GET['daynum']==14){echo "selected";}?>>Bi-Weekly</option>
											<option value="15" <?php if($_GET['daynum']==15){echo "selected";}?>>Semi-Monthly</option>
											<option value="30" <?php if($_GET['daynum']==30){echo "selected";}?>>Monthly</option>
										</select>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="start">
											First Payment Date:
										</label>
										<input class="form-control" type="date" name="start" value="<?php echo $_GET['start']; ?>" required/>
									</div>
									<div class="form-group">
										<label for="pmtnum">
											Number of payments:
										</label>
										<input class="form-control" type="text" name="pmtnum" id="pmtnum1" value="<?php echo $_GET['pmtnum']; ?>" required/>
									</div>
									<div class="form-group">
										<label for="stl">
											Settlement amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="stl" id="stl" value="<?php echo $_GET['stl']; ?>" required/>
									</div>
								</div>
								<div class="col-md-4">
									
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<script>
							document.getElementById('bal').onchange=function() {settlement()};
							document.getElementById('disc').onchange=function() {settlement()};
							document.getElementById('pmtnums').onchange=function() {settlement()};

						    function settlement() {
						        var bal = document.getElementById('bal').value;
						        var disc = document.getElementById('disc').value;
						        var pmtnum = document.getElementById('pmtnums').value;
						        
						        var stl =bal*(disc/100);
						        var pmts = stl/pmtnum;
						    
						        var x = document.getElementById('stl0');
						        var y = document.getElementById('stl');
						        var z = document.getElementById('pmtnum1');
						        
						        x.innerHTML = disc+"% Settlement would be in the Amout of $" + stl.toFixed(2)
						        +"<br>"
						        +"This can be solved in " + pmtnum + " payments of $" + pmts.toFixed(2);
						        y.value = stl.toFixed(2);
						        z.value = pmtnum;
						    }
						</script>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 3) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						61 - 90 Additional Opportunity
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Manual send by collection agent
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>Manual - Collection Manager to edit and send
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$date=$_GET['date'];
						$start=$_GET['start'];
						$end = $_GET['end'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>Subject</strong>
							Great News!
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
					    <p>
					    	My name is Spotloan <?php echo $SysName;?>.  and I have been assigned as your account manager with Spotloan. I’ve got some great news about your Spotloan account!  Your account has qualified to receive a special offer that you will not want to miss. This information is sensitive, and I’d prefer to talk with your directly by phone.
					    </p>
					    <p>
					    	Please give me a call at 1(888) 681-6811and ask for <?php echo $SysName;?>. If I am not available,  another capable account manager can also walk your through some options and would be happy to work with you. The best times for you to reach me are as follows:
					    	<br>
					    	<g style="margin-left: 25px; font-weight: bold;">
					    		<?php
					    		if($setDst==1){
					    			$begin = strtotime($start)+3600;
					    		}else{
					    			$begin = strtotime($start);
					    		}
					    		
					    		if($setDst==1){
					    			$finish = strtotime($end)+3600;
					    		}else{
					    			$finish = strtotime($end);
					    		}
					    		
					    		echo date("l, F jS, Y", strtotime($date))." from ".date("g:i A",$begin)." to ".date("g:i A",$finish)." Central Time";
					    		?>
					    	</g>
					    </p>
					    <p>This is a great option for you, please don’t miss it. I look forward to hearing from you soon.</p>
					    
					    
					    <br>
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<?php
								$startTime = new DateTime();
								
								$startTime->setTime(6,0,0);
								
								
								$endTime= clone $startTime;
								
								$endTime->setTime(20,30,0);
								
								$interval = new DateInterval('PT30M');
								
								$dateRange =  new DatePeriod($startTime, $interval, $endTime);
								?>
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="date">
											Call Back Date:
										</label>
										<input class="form-control" type="date" name="date" required/>
									</div>
									<div class="form-group">
										<label for="start">
											Schedule Start:
										</label>
										<select class="form-control" name="start" required>
											<option value=""></option>
											<?php foreach ($dateRange as $time):?>
											<option value="<?php echo $time->format("h:i A");?>"><?php echo $time->format("h:i A");?></option>
											<?php endforeach?>
										</select>
									</div>
									<div class="form-group">
										<label for="end">
											Schedule End:
										</label>
										<select class="form-control" name="end" required>
											<option value=""></option>
											<?php foreach ($dateRange as $time):?>
											<option value="<?php echo $time->format("h:i A");?>"><?php echo $time->format("h:i A");?></option>
											<?php endforeach?>
										</select>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 4) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						20 Day Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>20 days after the account misses a payment.
							<br>
							<b>Template: </b>Spotloan email with log
							<br>
							<b>Action: </b>Automatic
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$outbal = $_GET['outbal'];
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject:
							</strong> 
							Save
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							Your Spotloan is now 20 days past due and in Collection. You currently owe: $<?php echo number_format($outbal,2,".",".");?>. Everyday counts against you when you add up the interest.
						</p>
						<p>
							Please call me at  1(888) 681-6811 and I'll work with you.
						</p>
						<br>
						
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="outbal">
											Outstading Balance:
										</label>
										<input class="form-control" type="number" step="0.01" name="outbal" required/>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 5) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						30 Day Email <small>Agent Action Currently Required</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>30 days after the account misses a payment.
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>FR to update and send as required.
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$outbal = $_GET['outbal'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject:
							</strong> 
							Spotloan 30 day notice - call me ASAP
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							Your Spotloan is now 30 days past due and in Collection. You currently owe: $<?php echo number_format($outbal,2,".",".");?>. Every day that you delay this payment, your loan amount increases due to interest.
						</p>
						<p>
							Please call me at  1(888) 681-6811 and I'll work with you.
						</p>
						<br>
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="outbal">
											Outstading Balance:
										</label>
										<input class="form-control" type="number" step="0.01" name="outbal" required/>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 6) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						40 Day Email <small>Agent Action Currently Required</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>40 days after the account misses a payment.
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>FR to update and send as required
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$loanAmt = $_GET['loanAmt'];
						$depoDate = strtotime($_GET['depoDate']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<strong>
								Subject:
							</strong> 
							Spotloan 30 day notice - call me ASAP
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							We have tried contacting you several times about your seriously delinquent Spotloan account.
						</p>
						
						<p>
							On <?php echo date("F jS, Y",$depoDate);?>, when you received $<?php echo number_format($loanAmt,2,".",".");?> from Spotloan, you committed to pay us back. This loan will not go away and will not get resolved on its own.
						</p>
						
						<p>
							Your Spotloan is now 30 days past due and in Collection. You currently owe: $<?php echo number_format($outbal,2,".",".");?>. Every day that you delay this payment, your loan amount increases due to interest.
						</p>
						<p>
							I want to help you, but you must call me immediately at 1(888) 681-6811  so we can resolve this together.
						</p>
						<br>
						<?php
						include('includes/signature.inc.php');
						?>
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="loanAmt">
											Original Loan Amount:
										</label>
										<select name="loanAmt" class="form-control" required>
											<option value=""></option>
											<?php for($i = 300; $i <= 800; $i+=100){
												?>
												<option value="<?php echo $i;?>"><?php echo "$".number_format($i,2,".",",");?></option>
												<?php
											}
											?>
										</select>
											
									</div>
									<div class="form-group">
										<label for="depoDate">
											Loan Deposit Date:
										</label>
										<input class="form-control" type="date" name="depoDate" required/>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 7) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						50 Day Email <small>Agent Action Currently Required</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>50 days after the account misses a payment. 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>FR to update and send as required
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$outbal = $_GET['outbal'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<Strong>Subject:</strong> Your Spotloan is 50 days past due. Call Spotloan RM.
						</p>
						<br>
						
						<p>Hi <?php echo $brwName;?>,</p>
						<br>
						
						<p>
							You currently owe Spotloan $<?php echo number_format($outbal,2,".",",");?>. This debt will not go away.
						</p>
						
						<p>
							Next steps may include referring this account to our lawyers for additional legal action. Please call me at  1(888) 681-6811 and we can work something out.
						</p>

					    <p>
					    	<b>
					    		I am willing to work with you on your payments – even a good faith partial payment can bring your account current.
					    	</b>
					    </p>
					
					    <p>
					    	I need to hear from you today!
					    </p>    
					    <br>
						
						<?php
						include('includes/signature.inc.php');
						?>
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="outbal">
											Outstading Balance:
										</label>
										<input class="form-control" type="number" step="0.01" name="outbal" required/>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 8) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
								Next Template
								<span class="glyphicon glyphicon-arrow-right"></span>
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						60 Day Email <small>Agent Action Currently Required</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>60 days after the account misses a payment. 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>FR to update and send as required
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$outbal = $_GET['outbal'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<Strong>Subject:</strong> Do yourself a favor! Call me <?php echo $SysName;?>.
						</p>
						<br>

						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							You’ve only got so much cash and it’s easy for finances to spiral out of control. Like you, we would rather not have these conversations about missed payments because they are hard.
						</p>
						
						<p>
							But the thing is: You currently owe Spotloan $<?php echo number_format($outbal,2,".",",");?>.
						</p>
						
						<p>
							Please call me at  1(888) 681-6811 and I’ll do my best to work something out.
						</p>
						
						<p>
							It doesn’t have to be <b><i><u>so</u></i></b> hard.
						</p>
						<br>
						
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5">
									<div class="form-group">
										<label for="outbal">
											Outstading Balance:
										</label>
										<input class="form-control" type="number" step="0.01" name="outbal" required/>
									</div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}elseif ($_GET['temp'] == 9) {
		?>
		<div class="jumbotron">
			<hr>
				<div class="row">
					<ul class="list-inline text-center">
						<li class="col-md-4">
							<a href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
								<span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
							</a>
						</li>
						<li class="col-md-4">
							<a href="cmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								Collection Menu
							</a>
						</li>
					</ul>
				</div>
			<hr>
			<div class="row">
				<div class="col-md-3">
					<h2>
						65 Day Email <small>Agent Action Currently Required</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>65 days after the account misses a payment. 
							<br>
							<b>Template: </b>Spotloan email with logo
							<br>
							<b>Action: </b>FR to update and send as required
						</h5>
					</font>
				</div>
				<div class="col-md-9" style="border-left: solid;">
					<?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = trim($_GET['brwName']);
						$outbal = $_GET['outbal'];
						$pastdue = $_GET['pastdue']
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="cmmenu.php?col=<?php echo $_GET['col'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p>
							<Strong>Subject:</strong> Spotloan settlement – let’s make a deal
						</p>
						<br>

						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							Your Spotloan account is <?php echo $pastdue;?> days past due and is scheduled to move to our Recovery Department for additional action.
						</p>
						
						<p>
							At this time, your balance is $<?php echo number_format($outbal,2,".",",")?>. I am willing to work with you on a settlement.
						</p>
						
						<p>
							We can reduce the amount you owe and make this more manageable. And after you make your last payment, your account status will change to "Settled in Full" and all collection efforts will stop.
						</p>
						
						<p>
							Please call me right away at 1(888) 681-6811.
						</p>
						
						
						<br>
						<?php
						include('includes/signature.inc.php');
						?>	
						</div>
						<?php
					}else{
						?>
						<h2 class="text-center">
							Fill Out All Fiels
						</h2>
						<br>
						<br>
						<form class="fom form-vertical" method="get">
							<input type="hidden" name="col" value="<?php echo $_GET['col'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="outbal">
											Outstading Balance:
										</label>
										<input class="form-control" type="number" step="0.01" name="outbal" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="pastdue">
											Days Past Due:
										</label>
										<input class="form-control" type="number" name="pastdue" required/>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="2">
								Generate Email
							</button>
						</form>
						<?php
					}
					?>
				</div>
			</div>
		</div>
		<?php
	}
}else{
?>
<div class="jumbotron">
	<div>
	    <h2 class="text-center">
	        <font color="#3793D2">
	            Collection
	            <br>Email Templates
	        </font>
	    </h2>
	</div>
	<hr>
	<div>
	    <h3 class="text-center">
	        <font color="#3793D2">
	            Missed Payments
	        </font>
	    </h3>
	</div>
	<div class="row center">
	    <ul class="zest">
	        <li class="col-md-4">
	            <a href="cmmenu.php?col=1&temp=1">
	                Collections - ‘Hey, you’re in Collection!’
	            </a>
	        </li>
            <li class="col-md-4">
                <a href="cmmenu.php?col=1&temp=2">
                    Delinquent 1
                </a>
            </li>
            <li class="col-md-4">
                <a href="cmmenu.php?col=1&temp=3">
                    Delinquent 2
                </a>
            </li>
	    </ul>
	</div>
	<br>
	
	<div class="row">
	    <ul class="zest">      
	        <li class="col-md-4">
	            <a href="cmmenu.php?col=1&temp=4">
	                Delinquent 3
	            </a>
	        </li>
            <li class="col-md-4">
                <a href="cmmenu.php?col=1&temp=5">
                    Broken Agreement
                </a>
            </li>
    	</ul>
    </div>
    <br>
    
    <div>
        <h3 class="text-center">
            <font color="#3793D2">
                First Pay Default (temp)
            </font>
        </h3>
    </div>
    <div class="row">
        <ul class="zest">    
	        <li class="col-sm-3">
	            <a href="cmmenu.php?col=2&temp=1">
	                First PMT Default 1
	            </a>
	        </li>
	        <li class="col-sm-3">
	            <a href="cmmenu.php?col=2&temp=2">
	                First PMT Default 2
	            </a>
	        </li>
	        <li class="col-sm-3">
	            <a href="cmmenu.php?col=2&temp=3">
	                First PMT Default 3
	            </a>
	        </li>
	        <li class="col-sm-3">
	            <a href="cmmenu.php?col=2&temp=4">
	                First PMT Default 4
	            </a>
	        </li>
	    </ul>
	</div>
	<br>
	
	<div>
	    <h3 class="text-center">
	        <font color="#3793D2">
	            Collection
	        </font>
	    </h3>
	</div>
	<div class="row">
		<ul class="zest">    
		<li class="col-md-4">
			<a href="cmmenu.php?col=3&temp=1">
				Settlement Offer
			</a>
		</li>
		<li class="col-md-4">
			<a href="cmmenu.php?col=3&temp=2">
				New Settlement Arrangement
			</a>
		</li>
		<li class="col-md-4">
			<a href="cmmenu.php?col=3&temp=3">
				61 - 90 Additional Opportunity
			</a>
		</li>  	    
		</ul>
	</div>
	<br>

	<div class="row">
	    <ul class="zest">    
	        <li class="col-md-4">
	            <a href="cmmenu.php?col=3&temp=4">
	                20 Days Past Due
	            </a>
	        </li>
            <li class="col-md-4">
                <a href="cmmenu.php?col=3&temp=5">
                    30 Days Past Due
                </a>
            </li>    
	        <li class="col-md-4">
	            <a href="cmmenu.php?col=3&temp=6">
	                40 Days Past Due
	            </a>
	        </li>    
	    </ul>
	</div>
	<br>
	
    <div class="row">
	    <ul class="zest">
	        <li class="col-md-4">
	            <a href="cmmenu.php?col=3&temp=7">
	                50 Days Past Due
	            </a>
	        </li>
            <li class="col-md-4">
                <a href="cmmenu.php?col=3&temp=8">
                    60 Days Past Due
                </a>
            </li>    
	        <li class="col-md-4">
	            <a href="cmmenu.php?col=3&temp=9">
	                65 Days Past Due -Settlement
	            </a>
	        </li>
	    </ul>
    </div>
    
</div>
<?php
}
include 'footer.php';
?>
<script>
	document.getElementById('percent').onchange=function() {optionOne()};
	document.getElementById('balance').onchange=function() {optionOne(); offer()};

    function optionOne() {
        var percent = document.getElementById('percent').value;
        var Balance = document.getElementById('balance').value;
        var lump =Balance*(percent/100);
    
        var x = document.getElementById('optOne');
        x.value = lump.toFixed(2);
    }
    
    document.getElementById('percent2').onchange=function() {offer()};
    

    function offer() {
        var percent2 = document.getElementById('percent2').value;
        var Balance2 = document.getElementById('balance').value;
        var lump =Balance2*(percent2/100);
    
        var x = document.getElementById('optTwo');
        x.value = lump.toFixed(2);
    }
</script>