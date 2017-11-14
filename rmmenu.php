<?php
include 'header.php';
$temp = $_GET['temp'];
$back = --$temp;
$forth= ++$back;
?>
<?php
if ($_GET['cs'] == 1) {
    //Specific To Payment Issues
    if ($_GET['temp'] == 1) {
        //Payoff Notification emial
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4"></li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Payment Arrangement Email <small>(Bank/Payoff)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>When a customer contacts an agent to pay off her loan and it is set up.
							<br>
							<b>Action: </b>Manual - Agent to update and send accordingly.
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));	
						$payoffDate = date_create($_GET['payoffDate']);
						$payoffAmt = $_GET['payoffAmt'];
						$bankname = $_GET['bankname'];
						$lastfour = $_GET['lastfour'];
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong>
							Your payoff – $<?php echo number_format($payoffAmt,2,".",",");?> due on <?php echo date_format($payoffDate,"l F jS, Y");?>
						</p>
						<br>

					    <p>
					    	Hi <?php echo $brwName;?>,
					    </p>
					    <br>
					    
					    <p>
					    	You’re all set to pay off your loan on <?php echo date_format($payoffDate,"l F jS, Y");?>, in the amount of $<?php echo number_format($payoffAmt,2,".",",");?> from your <?php echo $bankname;?> account ending in <?php echo $lastfour;?>.
					    </p>
					    
					    <p>
					    	Let me know if anything changes so we can keep you on track.
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="payoffAmt">
											Payoff Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="payoffAmt" required/>
									</div>
									<div class="form-group">
										<label for="payoffDate">
											Payoff Date:
										</label>
										<input class="form-control" type="date" name="payoffDate" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="$bankname">
											Bank Name:
										</label>
										<input class="form-control" type="text" name="$bankname" required/>
									</div>
									<div class="form-group">
										<label for="lastfour">
											Last 4 Bank Account:
										</label>
										<input class="form-control" type="text" maxlength="4"  name="lastfour" required/>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Payment Arrangement Email <small>(Bank)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer contacts an agent to change an existing payment and the RM sets up a Special Payment.
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = $_GET['pmtAmt'];
						$pmtdate = date_create($_GET['pmtdate']);
						$bankname = $_GET['bankname'];
						$lastfour = $_GET['lastfour'];
						//next payment
						$pmtnote = $_GET['pmtnote'];
						$nextpmtdate = date_create($_GET['nextpmtdate']);
						$nextpmtamt = $_GET['nextpmtamt'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> Your new payment – $<?php echo number_format($pmtAmt,2,".",",");?> due on <?php echo date_format($pmtdate,"l F jS, Y");?>
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							You’re all set to make a payment of $<?php echo number_format($pmtAmt,2,".",",");?> from your <?php echo $bankname;?> account ending in <?php echo $lastfour;?> on <?php echo date_format($pmtdate,"l F jS, Y");?>.
						</p>
						<?php
						if ($pmtnote == 'on') {
							?>
							<p>
								As a friendly reminder, your next schedule payment of $<?php echo number_format($nextpmtamt,2,".",",");?> will be due on <?php echo date_format($nextpmtdate,"l F jS, Y");?>.
							</p>
							<?php
						}
						?>
						<?php
						if ($_GET['additional'] == 'on') {
							?>
							<p>
								<?php echo nl2br(htmlspecialchars($_GET['additionalnote']))?>
							</p>
							<?php
						}
						?>
						<p>
							Let me know if anything changes so we can keep you on track.
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="pmtAmt">
											Payment Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
									</div>
									<div class="form-group">
										<label for="pmtdate">
											Payment Date:
										</label>
										<input class="form-control" type="date" name="pmtdate" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="bankname">
											Bank Name:
										</label>
										<input class="form-control" type="text" name="bankname" required/>
									</div>
									<div class="form-group">
										<label for="lastfour">
											Last 4 Bank Account:
										</label>
										<input class="form-control" type="text" maxlength="4"  name="lastfour" required/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="checkbox">
										<label for="pmtnote">
									<input type="checkbox"  id="pmtnote" name="pmtnote"/><b>Next Payment Notice</b>
									</label>
									</div>
									<div class="checkbox">
									<label for="">
										<input type="checkbox"  id="additional" name="additional"/><b>Other Notes</b>
									</label>
									</div>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-6">
											<g id="pmtnotebody"></g>
										</div>
										<div class="col-md-6">
											<g id="additionalnote"></g>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Payment Arrangement Email<small> (Check, Money Order)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer contacts an agent to change an existing payment. Check and money order  are lumped together because we need to let the customer know the mailing address and that we need extra time to process. 
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$nextpmtdate = date_create($_GET['nextpmtdate']);
						$nextpmtamt = $_GET['nextpmtamt'];
						$pmtmethod = $_GET['pmtmethod']

						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> Snail mail alert! How to send your new payment of $<?php echo number_format($nextpmtamt,2,".",",");?> due on <?php echo date_format($nextpmtdate,"l, F jS, Y");?>
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							Now that your new payment is set up, the hard part’s behind you. Just send your <?php echo $pmtmethod;?> of $<?php echo number_format($nextpmtamt,2,".",",");?> here:
						</p>
						<p>
							Spotloan
							<br>P.O. Box 927
							<br>Palatine, IL 60078-0927
						</p>
						<p>
							As we discussed, this payment is due on <?php echo date_format($nextpmtdate,"l, F jS, Y");?>, so please allow enough time for your payment to be received and then give us 5 days to process it.
						</p>
    					<p>
    						Let me know right away if anything changes so we can keep you on track.
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="nextpmtdate">
											Next Payment Date:
										</label>
										<input class="form-control" type="date" name="nextpmtdate" required/>
									</div>
									<div class="form-group">
										<label for="nextpmtamt">
											Next Payment Amount
										<input class="form-control" type="number" step="0.01" name="nextpmtamt" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="$pmtmethod">
											Payment Method
										</label>
										<select class="form-control" name="$pmtmethod" required>
											<option value=""></option>
											<option value="Money Order">Money Order</option>
											<option value="Check">Check</option>
										</select>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Pay-Off Request<small> (Customer Inquiry)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>When someone contacts  RM requesting Payoff amount.
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$payoffdate = date_create($_GET['payoffdate']);
						$payoffamt = $_GET['payoffam'];
						$nextpmtdate = date_create($_GET['nextpmtdate']);
						$nextpmtamt = $_GET['nextpmtamt'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> This Would be your payoff as of <?php echo date_format($payoffdate,"l, F jS, Y"); ?>
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							Thank you for contacting us today. To pay off your account you will need to call us two business days in advance to set up the payoff. When you pay off your account through ACH, you will need to wait 5-7 business days from the day the payment is processed to reapply.
						</p>
						<p>
							Your account payoff balance for <?php echo date_format($payoffdate,"l, F jS, Y"); ?> is $<?php echo number_format($payoffamt,2,".",","); ?> and your next payment of $<?php echo number_format($nextpmtamt,2,".",","); ?> is due on <?php echo date_format($nextpmtdate,"l, F jS, Y"); ?>. Remember, your account balance changes daily to reflect interest.
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="payoffdate">
											Potencial Payoff Date:	
										</label>
										<input class="form-control" type="date" name="payoffdate" required/>
									</div>
									<div class="form-group">
										<label for="payoffam">
											Potencial Payoff Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="payoffam" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="nextpmtdate">
											Next Payment Date:
										</label>
										<input class="form-control" type="date" name="nextpmtdate" required/>
									</div>
									<div class="form-group">
										<label for="nextpmtamt">
											Next Payment Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="nextpmtamt" required/>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Pay-Off Request - No Date <small> (Customer Inquiry)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When Borrower contacts  RM requesting Payoff amount, but does not specify the date.
							<br>
							<b>Template: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$currbal = $_GET['currbal'];
						$payoffdate = date_create($_GET['payoffdate']);
						$payoffamt = $_GET['payoffam'];
						$nextpmtdate = date_create($_GET['nextpmtdate']);
						$nextpmtamt = $_GET['nextpmtamt'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
								<strong>Subject:</strong> This would be your payoff as of <?php echo date_format($payoffdate,"l, F jS, Y"); ?>
							</p>
							<br>
							
							<p>
								Hi <?php echo $brwName;?>,
							</p>
							<br>
							
							<p>
								Thanks for contacting me. I hope you are well.
							</p>      
							
							<p>As of today your current balance is of $<?php echo number_format($currbal,2,".",","); ?>. Remember that we need a two business days notice in order to make any changes in the payment schedule. So the next available date to schedule a payoff is for <?php echo date_format($payoffdate,"l, F jS, Y"); ?> in the amount of $<?php echo number_format($payoffamt,2,".",","); ?>. If you wish for it to be on any other date keep in mind the amount would change because of the interest that accrues daily.</p>
							
							<p>Let me know what you decide so I can set it up in the system.</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
									<div class="form-group">
										<label for="currbal">
											Current Balance:
										</label>
										<input class="form-control" type="number" step="0.01" name="currbal" id="currbal" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="payoffdate">
											Potential Payoff Date:
										</label>
										<input class="form-control" type="date" name="payoffdate" required/>
									</div>
									<div class="form-group">
										<label for="payoffam">
											Potential Payoff Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="payoffam" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="nextpmtdate">
											Next Payment Date
										</label>
										<input class="form-control" type="date" name="nextpmtdate" required/>
									</div>
									<div class="form-group">
										<label for="nextpmtamt">
											Next  payment Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="nextpmtamt" required/>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Date of Next Payment Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer contacts an agent to ask when the next payment is. “By clicking here” is a tokenized account information.
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = $_GET['pmtAmt'];
						$pmtdate = date_create($_GET['pmtdate']);
						$bankname = $_GET['bankname'];
						$lastfour = $_GET['lastfour'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> Your next Spotloan payment
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						<p>
							Thanks for contacting me. 
							<br>Your next payment of $<?php echo number_format($pmtAmt,2,".",","); ?> is due on <?php echo date_format($pmtdate,"l, F jS, Y"); ?> and will be pulled from your <?php echo $bankname;?> account ending on <?php echo $lastfour;?>. Please call or email me at least 2 business days before your next payment is due if you need to make any changes.
						</p><br>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="pmtdate">
											Payment Date:
										</label>
										<input class="form-control" type="date" name="pmtdate" required/>
									</div>
									<div class="form-group">
										<label for="pmtAmt">
											Payment Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="bankname">
											Bank Name:
										</label>
										<input class="form-control" type="text" name="bankname" required/>
									</div>
									<div class="form-group">
										<label for="lastfour">
											Last 4 Bank Account:
										</label>
										<input class="form-control" type="text" maxlength="4"  name="lastfour" required/>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						First Request for Deferral Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer emails their RM or help@ asking for a payment deferral, an agent can generate this response email.
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = $_GET['pmtAmt'];
						$pmtdate = date_create($_GET['pmtdate']);
						$pmtnum = $_GET['pmtnum'];
						$pmtfreq = $_GET['pmtfreq'];
						$resamt = $_GET['resamt'];
						$ressdate = date_create($_GET['ressdate']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong>
							1, 2, 3 – Options to keep your Spotloan loan on track
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>Thanks for contacting me. I’m always happy to help with payment changes.</p>

					    <p>Making changes to your Spotloan gets expensive fast – it can extend the life of your loan and add more interest. As your Manager, I want to help you save money.</p>
					
					    <p>Check out your options and let me know what you want to do. I’ll wait to make changes until I hear back from you.</p>
					
					    <p>If you absolutely need to change your payment plan, here are your options:<p>
					
					    <div style="margin-left: 75px;">
					      	<p>
					      	<b>1) Pay a smaller amount</b> on <?php echo date_format($pmtdate,"l, F jS, Y"); ?>, when your payment is due. <b>This is your best option.</b> Most customers try to make half the payment amount, That would be $<?php echo number_format(($pmtAmt/2),2,".",","); ?>.
					      	</p>
					
					      	<p>
					      		<b>2) Make up your payment at a later time.</b> Every day you accrue interest. The longer you wait the more expensive this option becomes. I’m here to work with you. Call me at 1(888) 681-6811 to set this up.
					      	</p>
					
					      	<p>
					      		<b>3) Change your payment size.</b> If you want to miss this next payment, but don’t want your interest to get away from you, we can increase your payment amount to keep you on track. This usually costs about $10 more each payment.
					      		<br>
					      		We could set you up with <?php echo $pmtnum;?> payments of  <?php echo number_format($resamt,2,".",","); ?> starting on <?php echo date_format($ressdate,"l, F jS, Y"); ?>.
					      	<p>
					    </div>
					
					    <p><b>All of these options will cost you more because of additional interest that happens when you extend your loan terms.</b> Please let me know right away what option above works best for you. I need at least <b><u>2 business days</u></b> before your payment is due to make these changes.</p>
					    
					    <p>Again, I won't make any changes to your account until you confirm what you’d like me to do. Let me know!</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="pmtdate">
										Next Payment Date:
										</label>
										<input class="form-control" type="date" name="pmtdate" required/>
									</div>
									<div class="form-group">
										<label for="pmtAmt">
										Regular Payment Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
									</div>
								</div>
								<div class="col-md-4">
									<h4 class="text-center">Restructure Option</h4>
									<div class="form-group">
										<label for="pmtnum">Number Of Payments</label>
										<input class="form-control" type="number" name="pmtnum" required/>
									</div>
									<div class="form-group">
										<label for="pmtfreq">
											Payment Frequency:
										</label>
										<select class="form-control" name="pmtfreq" required>
											<option value="Bi-Weekly">Bi-Weekly</option>
											<option value="Semi-Montly">Semi-Montly</option>
											<option value="Monthly">Monthly</option>
										</select>
									</div>
									<div class="form-group">
									    <label for="resamt">
									        Restructure Payment Amount:
									    </label>
									    <input class="form-control" type="number" step="0.01" name="resamt" required/>
									</div>
									<div class="form-group">
										<label for="ressdate">
										Restructure Payment Date:
										</label>
										<input class="form-control" type="date" name="ressdate" required/>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Second & Subsequent Request for Deferral Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer emails their RM or help@ asking for a second & subsequent payment deferral, an agent can generate this response email.
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = $_GET['pmtAmt'];
						$pmtdate = date_create($_GET['pmtdate']);
						$pmtnum = $_GET['pmtnum'];
						$pmtfreq = $_GET['pmtfreq'];
						$resamt = $_GET['resamt'];
						$ressdate = date_create($_GET['ressdate']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> Spot your savings! Your payment options
						</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						<p>
							Thanks for working with me. As you know, making changes to your Spotloan gets expensive fast – it can extend the life of your loan and add more interest. My goal is to help you save money. Check out your options and let me know what you want to do. I’ll wait to make changes until I hear back from you
						</p>
						<p>Options:<p>
					    <div style="margin-left: 75px;">
							<p><b>1) Pay a smaller amount</b> on <?php echo date_format($pmtdate,"l, F jS, Y"); ?>, when your payment is due. Most customers try to make half the payment amount, That would be $<?php echo number_format(($pmtAmt/2),2,".",","); ?>.</p>
							
							<p><b>2) Make up your payment at a later time.</b> . Every day you accrue interest. The longer you wait the more expensive this option becomes. I’m here to work with you. Call me at 1(888) 681-6811 to set this up.</p>
							
							<p>
					      		<b>3) Change your payment size.</b> If you want to miss this next payment, but don’t want your interest to get away from you, we can increase your payment amount to keep you on track. This usually costs about $10 more each payment.
					      		<br>
					      		We could set you up with <?php echo $pmtnum." ".$pmtfreq;?> payments of  <?php echo number_format($resamt,2,".",","); ?> starting on <?php echo date_format($ressdate,"l, F jS, Y"); ?>.
					      	<p>
					    </div>
					
					    <p>Please get back to me right away. I need at least <b><u>2 business days</u></b> before your payment is due to make these changes.</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="pmtdate">
										Next Payment Date:
										</label>
										<input class="form-control" type="date" name="pmtdate" required/>
									</div>
									<div class="form-group">
										<label for="pmtAmt">
										Regular Payment Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
									</div>
								</div>
								<div class="col-md-4">
									<h4 class="text-center">Restructure Option</h4>
									<div class="form-group">
										<label for="pmtnum">Number Of Payments</label>
										<input class="form-control" type="number" name="pmtnum" required/>
									</div>
									<div class="form-group">
										<label for="pmtfreq">
											Payment Frequency:
										</label>
										<select class="form-control" name="pmtfreq" required>
											<option value="Bi-Weekly">Bi-Weekly</option>
											<option value="Semi-Montly">Semi-Monthly</option>
											<option value="Monthly">Monthly</option>
										</select>
									</div>
									<div class="form-group">
									    <label for="resamt">
									        Restructure Payment Amount:
									    </label>
									    <input class="form-control" type="number" step="0.01" name="resamt" required/>
									</div>
									<div class="form-group">
										<label for="ressdate">
										Restructure Payment Date:
										</label>
										<input class="form-control" type="date" name="ressdate" required/>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Deferral Confirmation Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When an agent makes a deferral and selects to send this confirmation email. 
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$approxint = $_GET['approxint'];
						//next payment
						$pmtnote = $_GET['pmtnote'];
						$nextpmtdate = date_create($_GET['nextpmtdate']);
						$nextpmtamt = $_GET['nextpmtamt'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> <?php echo $brwName;?>, your Spotloan is updated
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						
						<p>
							Thanks for contacting me. To confirm, we will not be taking out your next scheduled payment.
						</p>
					    <p>
					    	Deferring your payment increases your total amount due, it could add up to  $<?php echo number_format($approxint,2,".",","); ?> in extra interest. You can make up this payment at any time if you want to save some money.
					    <p>
					    
						<?php
						if ($pmtnote == 'on') {
							?>
							<p>
								As a friendly reminder, your next schedule payment of $<?php echo number_format($nextpmtamt,2,".",",");?> will be due on <?php echo date_format($nextpmtdate,"l F jS, Y");?>.
							</p>
							<?php
						}
						?>
						<?php
						if ($_GET['additional'] == 'on') {
							?>
							<p>
								<?php echo nl2br(htmlspecialchars($_GET['additionalnote']))?>
							</p>
							<?php
						}
						?>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="approxint">
											Approximate Interest for Defering:
										</label>
										<input class="form-control" type="number" step="0.01" name="approxint" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="checkbox">
										<label for="pmtnote">
									<input type="checkbox"  id="pmtnote" name="pmtnote"/><b>Next Payment Notice</b>
									</label>
									</div>
									<div class="checkbox">
									<label for="">
										<input type="checkbox"  id="additional" name="additional"/><b>Other Notes</b>
									</label>
									</div>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-6">
											<g id="pmtnotebody"></g>
										</div>
										<div class="col-md-6">
											<g id="additionalnote"></g>
										</div>
									</div>
								</div>
									
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 10) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Deferral Window Missed Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer contacts their agent and misses the two-day window.
							<br>
							<b>Action: </b> Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = $_GET['pmtAmt'];
						$pmtdate = date_create($_GET['pmtdate']);
						//next payment
						$pmtnote = $_GET['pmtnote'];
						$nextpmtdate = date_create($_GET['nextpmtdate']);
						$nextpmtamt = $_GET['nextpmtamt'];
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> <?php echo $brwName;?>, we missed your 2-day window
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>Thanks for contacting me. As a reminder, we need at least 2 business days to make payment changes. That means I won’t be able to adjust your payment of $<?php echo number_format($pmtAmt,2,".",","); ?> that’s due on <?php echo date_format($pmtdate,"l, F jS, Y"); ?>.
						</p>
						
						<?php
                        if ($pmtnote == 'on') {
                            ?>
                            <p>
                                As a friendly reminder, your next schedule payment of $<?php echo number_format($nextpmtamt,2,".",",");?> will be due on <?php echo date_format($nextpmtdate,"l, F jS, Y");?>.
                            </p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($_GET['additional'] == 'on') {
                            ?>
                            <p>
                                <?php echo nl2br(htmlspecialchars($_GET['additionalnote']))?>
                            </p>
                            <?php
                        }
                        ?>
    					<p>Let me know if you want to connect about this or talk about your future payments.</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
		                            <label for="pmtdate">
		                                Payment Date:
		                            </label>
		                            <input class="form-control" type="date" name="pmtdate" required/>
		                        </div>
		                        <div class="form-group">
		                            <label for="pmtAmt">
		                                Payment Amount:
		                            </label>
		                            <input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
		                        </div>
								</div>
								<div class="col-md-2"></div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="checkbox">
										<label for="pmtnote">
									<input type="checkbox"  id="pmtnote" name="pmtnote"/><b>Next Payment Notice</b>
									</label>
									</div>
									<div class="checkbox">
									<label for="">
										<input type="checkbox"  id="additional" name="additional"/><b>Other Notes</b>
									</label>
									</div>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-6">
											<g id="pmtnotebody"></g>
										</div>
										<div class="col-md-6">
											<g id="additionalnote"></g>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 11) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						4 Business Days Reminder Emai
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>4 business days before a payment is auto-scheduled.
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = htmlspecialchars($_GET['pmtAmt']);
						$pmtdate = date_create($_GET['pmtdate']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong>Spotloan payment of $<?php echo number_format($pmtAmt,2,".",","); ?> due on <?php echo date_format($pmtdate,"l, F jS, Y"); ?>
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							I just want to remind you that your Spotloan payment of $<?php echo number_format($pmtAmt,2,".",","); ?> is scheduled for <?php echo date_format($pmtdate,"l, F jS, Y"); ?>. Please let me know right away if you have any questions.
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
			                            <label for="pmtdate">
			                                Payment Date:
			                            </label>
			                            <input class="form-control" type="date" name="pmtdate" required/>
			                        </div>
			                        <div class="form-group">
			                            <label for="pmtAmt">
			                                Payment Amount:
			                            </label>
			                            <input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
                    				</div>
								</div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 12) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Payment Confirmation Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>If requested by borrower.
							<br>
							<b>Action: </b> Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = htmlspecialchars($_GET['pmtAmt']);
						$pmtdate = date_create($_GET['pmtdate']);
                        $bankname = nl2br(htmlspecialchars($_GET['bankname']));
                        $lastfour = htmlspecialchars($_GET['lastfour']);
                        $pmtconf = htmlspecialchars($_GET['pmtconf']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> $<?php echo number_format($pmtAmt,2,".",","); ?> Spotloan payment confirmation
						</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						<p><b>Payment Receipt</b></p>
						<?php
						if($_GET['ach'] == "on"){
							?>
							<p>This is an email confirmation that you made a payment of $<?php echo number_format($pmtAmt,2,".",","); ?> on <?php echo date_format($pmtdate,"l, F jS, Y"); ?>, from your <?php echo $bankname;?> account ending in <?php echo $pmtconf;?>. Thanks!</p>
							<?php
						}elseif ($_GET['dc'] == "on") {
							?>
							<p>This is an email confirmation that you made a one time payment in the amount of $<?php echo number_format($pmtAmt,2,".",","); ?> today, <?php echo date_format($pmtdate,"F jS, Y"); ?>, with your debit card. Thanks!</p>
							
							<p>
								Your confirmation ID is: <?php echo $pmtconf;?>
							</p>
							<?php
						}
						?>
						<p>I really appreciate having you as a customer!</p>
						<br />
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div>
								<div>
									<div class="checkbox">
										<label for="dc">
											<input type="checkbox"  id="dc" name="dc"/><b>Check if payment was via Debit Card</b>
										</label>
									</div>
									<div class="checkbox">
										<label for="ach">
											<input type="checkbox"  id="ach" name="ach"/><b>Check if payment is via ACH</b>
										</label>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div id="landform"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
								Generate Email
							</button>
						</form>
						<script type="text/javascript">
							//payment confirmation
							//ACH payment notification
							document.getElementById('ach').onclick = function(){achpmt();};
							
							function achpmt(){
								var formLanding = document.getElementById('landform');
								var status = document.getElementById('ach').checked;
								
								if (status){
									formLanding.innerHTML = 
									'<div class="col-md-4">'
										+'<div class="form-group">'
											+'<label for="pmtdate">'
												+'Payment Date:'
											+'</label>'
											+'<input class="form-control" type="date" name="pmtdate" required/>'
										+'</div>'
										+'<div class="form-group">'
											+'<label for="pmtAmt">'
												+'Payment Amount:'
											+'</label>'
											+'<input class="form-control" type="number" step="0.01" name="pmtAmt" required/>'
										+'</div>'
									+'</div>'
									+'<div class="col-md-4">'
										+'<div class="form-group">'
											+'<label for="bankname">'
												+'Bank Name:'
											+'</label>'
											+'<input class="form-control" type="text" name="bankname" required/>'
										+'</div>'
										+'<div class="form-group">'
											+'<label for="lastfour">'
												+'Last 4 Bank Account:'
											+'</label>'
											+'<input class="form-control" type="text" maxlength="4"  name="lastfour" required/>'
										+'</div>'
									+'</div>'
									;
								}else{
									formLanding.innerHTML = '<div id="landform"></div>';
								}
							}
							
							//DC payment notification
							document.getElementById('dc').onclick = function(){dcpmt();};
							
							function dcpmt(){
								var formLanding = document.getElementById('landform');
								var status = document.getElementById('dc').checked;
								
								if (status){
									formLanding.innerHTML = 
									'<div class="col-md-4">'
										+'<div class="form-group">'
											+'<label for="pmtdate">'
												+'Payment Date:'
											+'</label>'
											+'<input class="form-control" type="date" name="pmtdate" required/>'
										+'</div>'
										+'<div class="form-group">'
											+'<label for="pmtAmt">'
												+'Payment Amount:'
											+'</label>'
											+'<input class="form-control" type="number" step="0.01" name="pmtAmt" required/>'
										+'</div>'
									+'</div>'
									+'<div class="col-md-4">'
										+'<div class="form-group">'
											+'<label for="pmtconf">'
												+'DC Payment Confirmation ID:'
											+'</label>'
											+'<input class="form-control" type="text" name="pmtconf" required/>'
										+'</div>'
									+'</div>'
									;
								}else{
									formLanding.innerHTML = '<div id="landform"></div>';
								}
							}
							
						</script>
						<?php
					}
					?>
                </div>
            </div>
        </div>
        <?php
    }elseif ($_GET['temp'] == 13) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Missed payment <small>(NSF)</small>
					</h2>
					<h4>(For the less than 1% who will still miss their payment)</h4>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$bankname = nl2br(htmlspecialchars($_GET['bankname']));
						$pmtAmt = htmlspecialchars($_GET['pmtAmt']);
						$pmtdate = date_create($_GET['pmtdate']);
						$return = htmlspecialchars($_GET['return']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong> Whoops! You’ve missed a Spotloan payment</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							I sent you a payment confirmation email two days ago. Unfortunately, <?php echo $bankname;?> just told me that your payment of $<?php echo number_format($pmtAmt,2,".",","); ?> on <?php echo date_format($pmtdate,"l, F jS, Y"); ?>, didn’t go through because <?php echo $return;?>. This means that the payment confirmation you received is incorrect and we have added a $10 fee to your loan balance.
						</p>
						<p>
							I know that sometimes it's tough to cover all of your expenses. But it’s important that you get your account back on track quickly to avoid extra interest. Even a payment of just $20 can bring your account current.
						</p>
						<p>
							I’d like to help you out, so please call me at 1(888) 681-6811.
						</p>
						<br />
						
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
	                                    <label for="pmtdate">
	                                        Missed Payment Date:
	                                    </label>
	                                    <input class="form-control" type="date" name="pmtdate" required/>
	                                </div>
	                                <div class="form-group">
	                                    <label for="pmtAmt">
	                                        Missed Payment Amount:
	                                    </label>
	                                    <input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
	                                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
			                            <label for="bankname">
			                                Bank Name:
			                            </label>
			                            <input class="form-control" type="text" name="bankname" required/>
			                        </div>
			                        <div class="form-group">
			                        	<label for="return">
			                        		Return Reason:
			                        	</label>
			                        	<select name="return" class="form-control">
			                        		<option value="">Choose Return Code</option>
			                        		<?php
			                        		include 'includes/dbh.inc.php';
			                        		$q = "SELECT * FROM ach_return_codes";
			                        		$result = mysqli_query($conn, $q);
			                        		$numrows = mysqli_num_rows($result);
			                        		if ($numrows > 0) {
			                        			while($row = mysqli_fetch_array($result)){
			                        				?>
			                        				<option value="<?php echo $row['brw_expo'];?>"><?php echo $row['code']." - ".$row['desc'];?></option>
			                        				<?php
			                        			}
			                        		}
			                        		$conn->close();
			                        		?>
			                        	</select>
			                        </div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 14) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Missed payment <small>(No NSF)</small>
					</h2>
					<h4>(For the less than 1% who will still miss their payment)</h4>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$bankname = nl2br(htmlspecialchars($_GET['bankname']));
						$pmtAmt = htmlspecialchars($_GET['pmtAmt']);
						$pmtdate = date_create($_GET['pmtdate']);
						$return = htmlspecialchars($_GET['return']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong> Whoops! You’ve missed a Spotloan payment</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							I sent you a payment confirmation email two days ago. Unfortunately, <?php echo $bankname;?> just told me that your payment of $<?php echo number_format($pmtAmt,2,".",","); ?> on <?php echo date_format($pmtdate,"l, F jS, Y"); ?>, didn’t go through because <?php echo $return;?>. This means that the payment confirmation you received is incorrect.
						</p>
						<p>
							I know that sometimes it's tough to cover all of your expenses. But it’s important that you get your account back on track quickly to avoid extra interest. Even a payment of just $20 can bring your account current.
						</p>
						<p>
							I’d like to help you out, so please call me at 1(888) 681-6811.
						</p>
						<br />
						
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
	                                    <label for="pmtdate">
	                                        Missed Payment Date:
	                                    </label>
	                                    <input class="form-control" type="date" name="pmtdate" required/>
	                                </div>
	                                <div class="form-group">
	                                    <label for="pmtAmt">
	                                        Missed Payment Amount:
	                                    </label>
	                                    <input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
	                                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
			                            <label for="bankname">
			                                Bank Name:
			                            </label>
			                            <input class="form-control" type="text" name="bankname" required/>
			                        </div>
			                        <div class="form-group">
			                        	<label for="return">
			                        		Return Reason:
			                        	</label>
			                        	<select name="return" class="form-control">
			                        		<option value="">Choose Return Code</option>
			                        		<?php
			                        		include 'includes/dbh.inc.php';
			                        		$q = "SELECT * FROM ach_return_codes";
			                        		$result = mysqli_query($conn, $q);
			                        		$numrows = mysqli_num_rows($result);
			                        		if ($numrows > 0) {
			                        			while($row = mysqli_fetch_array($result)){
			                        				?>
			                        				<option value="<?php echo $row['brw_expo'];?>"><?php echo $row['code']." - ".$row['desc'];?></option>
			                        				<?php
			                        			}
			                        		}
			                        		$conn->close();
			                        		?>
			                        	</select>
			                        </div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 15) {
       ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						NSF Respose Email
					</h2>
					<h4>(For the less than 1% who will still miss their payment)</h4>
					<font color="red">
						<h5>
							<b>Generate: </b>se when customer asks why we charge NSF fee
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = htmlspecialchars($_GET['pmtAmt']);
                        $bankname = nl2br(htmlspecialchars($_GET['bankname']));
						$return = htmlspecialchars($_GET['return']);
						
						//variables changes
						$pmtAmt *=2;
						
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
                        
                        $i = 2;
                        $nextBusinessDay = date('m/d/Y', strtotime($tmpDate . ' +' . $i . ' Weekday'));
                        
                        while (in_array($nextBusinessDay, $holidays)) {
                            $i++;
                            $nextBusinessDay = date('m/d/Y', strtotime($tmpDate . ' +' . $i . ' Weekday'));
                        }
                        
                        $pmtdate = date_create($nextBusinessDay);
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong>Non Sufficient Fund Fee? Here is why!
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							I understand that you are going through a tough time and by not doing payments your Spotloan gets expensive fast – it can extend the life of your loan and add more interest plus the $10.00 fee for insufficient funds. As your Relationship Manager, I want to help you save money.
						</p>
						<p>
							Your best option is to make up your payment soon. Every day you accrue interest. The longer you wait the more expensive this option becomes. I’m here to work with you.
						</p>
						
						<ol>
							<li>
								<p>
									We can set a double payment on <?php echo date_format($pmtdate,"l, F jS, Y"); ?> of $<?php echo number_format($pmtAmt,2,".",","); ?>.	
								</p>
							</li>
							<li>
								<p>
									We can set the failed payment as an extra payment at a later time, just let me know when you'd be able to make it up.
								</p>
							</li>
						</ol>
						
						<p>
							All of these options will cost you more because of additional interest that happens when you extend your loan terms. Please let me know right away what option above works best for you. I need at least 2 business days before your payment is due to make these changes.
						</p>
						<p>
							Also your <?php echo $bankname;?> account appears as <?php echo strtolower($return);?> in our system. Let me know if you will change your banking information so I can update the system before your future payments.
						</p>
						<p>
							Also you can make debit card payments, just call us the day you want to make the payment and we can charge it. Remember that if you want to make a regular payment with a card, let us know 2 business days before, in order for us to stop the payment from coming out from your banking account through ACH.
						</p>
						<p>
							Again, I won't make any changes to your account until you confirm what you’d like me to do. Let me know!
						</p>
						<br />
						
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
	                                    <label for="pmtAmt">
	                                        Regular Payment Amount:
	                                    </label>
	                                    <input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
	                                </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
			                            <label for="bankname">
			                                Bank Name:
			                            </label>
			                            <input class="form-control" type="text" name="bankname" required/>
			                        </div>
									<div class="form-group">
			                        	<label for="return">
			                        		Return Reason:
			                        	</label>
			                        	<select name="return" class="form-control">
			                        		<option value="">Choose Return Code</option>
			                        		<?php
			                        		include 'includes/dbh.inc.php';
			                        		$q = "SELECT * FROM ach_return_codes";
			                        		$result = mysqli_query($conn, $q);
			                        		$numrows = mysqli_num_rows($result);
			                        		if ($numrows > 0) {
			                        			while($row = mysqli_fetch_array($result)){
			                        				?>
			                        				<option value="<?php echo $row['short_desc'];?>"><?php echo $row['code']." - ".$row['desc'];?></option>
			                        				<?php
			                        			}
			                        		}
			                        		$conn->close();
			                        		?>
			                        	</select>
			                        </div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 16) {
       ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Cancel Extra Payment Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer sets up an extra payment through their online account or when they call to make special arrangements with their agent -- and then decide they can’t/don’t want to go through with it. 
							<br>
							<b>Action: </b>Manual - Agent to edit and sen
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = htmlspecialchars($_GET['pmtAmt']);
						
						//next payment
						$pmtnote = htmlspecialchars($_GET['pmtnote']);
						$nextpmtdate = date_create(htmlspecialchars($_GET['nextpmtdate']));
						$nextpmtamt = htmlspecialchars($_GET['nextpmtamt']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> Extra Spotloan payment cancelled
						</p>
						<br />
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br />
						
						<p>
							Thanks for contacting me. I have cancelled your extra payment of $<?php echo number_format($pmtAmt,2,".",","); ?>.
						</p>
						
    					<?php
                        if ($pmtnote == 'on') {
                            ?>
                            <p>
                                As a friendly reminder, your next schedule payment of $<?php echo number_format($nextpmtamt,2,".",",");?> will be due on <?php echo date_format($nextpmtdate,"l, F jS, Y");?>.
                            </p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($_GET['additional'] == 'on') {
                            ?>
                            <p>
                                <?php echo nl2br(htmlspecialchars($_GET['additionalnote']))?>
                            </p>
                            <?php
                        }
                        ?>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
	                                    <label for="pmtAmt">
	                                        Payment Amount:
	                                    </label>
	                                    <input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
	                                </div>
								</div>
								<div class="col-md-4"></div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="checkbox">
										<label for="pmtnote">
    									    <input type="checkbox"  id="pmtnote" name="pmtnote"/><b>Next Payment Notice</b>
    									</label>
									</div>
									<div class="checkbox">
    									<label for="">
    										<input type="checkbox"  id="additional" name="additional"/><b>Other Notes</b>
    									</label>
									</div>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-6">
											<g id="pmtnotebody"></g>
										</div>
										<div class="col-md-6">
											<g id="additionalnote"></g>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 17) {
       ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4"></li>
                </ul>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h2>
						Settlement Completion Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Action: </b>Once a borrower has completed a settlement.
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong> Great! Your account is settled.</p>
						<br />
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							Hope you're having a wonderful day. Here's a confirmation email that your account has been settled. Thank you for working with me.
						</p>
						
						<p>
							And for being a repeat borrower, you're eligible to apply for a new loan with us.
						</p>
						<p>
							Please visit our website.
						</p>
						<p>
							www.Spotloan.com
						</p>
						<br />
						
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
}elseif ($_GET['cs'] == 2) {
    //General Payment Issues
    if ($_GET['temp'] == 1) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4"></li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Broken Agreement Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a borrower fails to keep a payment promise.
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtdate = date_create($_GET['pmtdate']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> A quick follow-up
						</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							When we last connected, you promised me that you would make a payment on <?php echo date_format($pmtdate,"l, F jS, Y"); ?>. I see that this payment wasn’t made. I’m willing to work with you, but I need your cooperation.
						</p>
						<p>
							Please call me at 888-681-6811 and ask for <?php echo $SysName;?>.
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
                                        <label for="pmtdate">
                                            Missed Agreement Date:
                                        </label>
                                        <input class="form-control" type="date" name="pmtdate" required/>
                                    </div>
								</div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Payment History Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer requests their payment history. 
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmthist =  nl2br($_GET['pmthist']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong> Check it out – Your payment history</p><br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						<p>Thanks for checking in on your loan. I’ve attached your payment history. Please let me know if you have any questions.</p>
						<p>
								<?php
								echo $pmthist;
								?>
							
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label for="brwName">
											Date - Status - Amount
										</label>
										<textarea class="form-control text-left " name="pmthist" rows="10" required>Date - Status - Amount</textarea>
									</div>
										
								</div>
							</div>
							
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Account Balance Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer asks an agent what their account balance is.
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = htmlspecialchars($_GET['pmtAmt']);
						
						//next payment
						$pmtnote = htmlspecialchars($_GET['pmtnote']);
						$nextpmtdate = date_create(htmlspecialchars($_GET['nextpmtdate']));
						$nextpmtamt = htmlspecialchars($_GET['nextpmtamt']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						<p>
							You’ve just made my “Favorite Customer of the Day” list! Thanks for checking in on your loan. Your account balance is $<?php echo number_format($pmtAmt,2,".",","); ?>.
    					</p>
    					<?php
                        if ($pmtnote == 'on') {
                            ?>
                            <p>
                                As a friendly reminder, your next schedule payment of $<?php echo number_format($nextpmtamt,2,".",",");?> will be due on <?php echo date_format($nextpmtdate,"l, F jS, Y");?>.
                            </p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($_GET['additional'] == 'on') {
                            ?>
                            <p>
                                <?php echo nl2br(htmlspecialchars($_GET['additionalnote']))?>
                            </p>
                            <?php
                        }
                        ?>
                        <p>
							Remember, your account balance changes daily to reflect interest.
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
                                        <label for="pmtAmt">
                                            Account Balance:
                                        </label>
                                        <input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
                                    </div>
								</div>
								<div class="col-md-4"></div>
							</div>
							<div class="row">
        								<div class="col-md-3">
        									<div class="checkbox">
        										<label for="pmtnote">
            									    <input type="checkbox"  id="pmtnote" name="pmtnote"/><b>Next Payment Notice</b>
            									</label>
        									</div>
        									<div class="checkbox">
            									<label for="">
            										<input type="checkbox"  id="additional" name="additional"/><b>Other Notes</b>
            									</label>
        									</div>
        								</div>
        								<div class="col-md-9">
        									<div class="row">
        										<div class="col-md-6">
        											<g id="pmtnotebody"></g>
        										</div>
        										<div class="col-md-6">
        											<g id="additionalnote"></g>
        										</div>
        									</div>
        								</div>
        							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Authorization for ACH Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Reauthorization of ACH by customer after that customer decides that payments can once again be taken from their bank account. 
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						//next payment
						$pmtnote = htmlspecialchars($_GET['pmtnote']);
						$nextpmtdate = date_create(htmlspecialchars($_GET['nextpmtdate']));
						$nextpmtamt = htmlspecialchars($_GET['nextpmtamt']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong> Your payments are about to get easier!</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>Hurray! I’m so glad you’ve decided to re-authorize automatic debits from your account. It’s definitely the easiest way to ensure your payments get made on time.</p>
						
						<?php
                        if ($pmtnote == 'on') {
                            ?>
                            <p>
                                As a friendly reminder, your next schedule payment of $<?php echo number_format($nextpmtamt,2,".",",");?> will be due on <?php echo date_format($nextpmtdate,"l, F jS, Y");?>.
                            </p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($_GET['additional'] == 'on') {
                            ?>
                            <p>
                                <?php echo nl2br(htmlspecialchars($_GET['additionalnote']))?>
                            </p>
                            <?php
                        }
                        ?>
						<p>Please let me know if you have any questions.</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<div class="row">
        								<div class="col-md-3">
        									<div class="checkbox">
        										<label for="pmtnote">
            									    <input type="checkbox"  id="pmtnote" name="pmtnote"/><b>Next Payment Notice</b>
            									</label>
        									</div>
        									<div class="checkbox">
            									<label for="">
            										<input type="checkbox"  id="additional" name="additional"/><b>Other Notes</b>
            									</label>
        									</div>
        								</div>
        								<div class="col-md-9">
        									<div class="row">
        										<div class="col-md-6">
        											<g id="pmtnotebody"></g>
        										</div>
        										<div class="col-md-6">
        											<g id="additionalnote"></g>
        										</div>
        									</div>
        								</div>
        							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Payment Options Email
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer declines to make ACH payments after thinking about it and wants to pay another way.
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$loanid	= htmlspecialchars($_GET['loanid']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong> Your payments, your way</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>Thanks for contacting me. I’ve updated your account records to show that you have declined automatic payments from your bank account.</p>
    					<p>You can also mail checks and money orders to:</p>
    					<p>
    						Spotloan
    						<br>Attn: Accounting
    						<br>P. O. Box 927
    						<br>Palatine, IL 60078-00927
    					</p>
    					<p>
    						Please make sure to include your Loan ID in the memo section your Check or Money Order. Your Loan ID is <?php echo "<b>".$loanid."</b>"?>
    					</p>
						<?php
                            if ($pmtnote == 'on') {
                                ?>
                                <p>
                                    As a friendly reminder, your next schedule payment of $<?php echo number_format($nextpmtamt,2,".",",");?> will be due on <?php echo date_format($nextpmtdate,"l, F jS, Y");?>.
                                </p>
                                <?php
                            }
                            ?>
                            <?php
                            if ($_GET['additional'] == 'on') {
                                ?>
                                <p>
                                    <?php echo nl2br(htmlspecialchars($_GET['additionalnote']))?>
                                </p>
                                <?php
                            }
                            ?>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
									<div class="form-group">
										<label for="loanid">
											Borrower´s Loan ID:
										</label>
										<input class="form-control" type="text" placeholder="Enter Loan ID" name="loanid" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="checkbox">
										<label for="pmtnote">
										    <input type="checkbox"  id="pmtnote" name="pmtnote"/><b>Next Payment Notice</b>
										</label>
									</div>
									<div class="checkbox">
										<label for="">
											<input type="checkbox"  id="additional" name="additional"/><b>Other Notes</b>
										</label>
									</div>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-6">
											<g id="pmtnotebody"></g>
										</div>
										<div class="col-md-6">
											<g id="additionalnote"></g>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Restructure Loan Offer Email  
						<small>(RM should probably call on this one)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Use this email template to provide Borrowers with a Restructure Offer
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						$pmt_new = htmlspecialchars($_GET['pmt_new']);
						$pmt_number_new = htmlspecialchars($_GET['pmt_number_new']);
						$pmt_freq_new = htmlspecialchars($_GET['pmt_freq_new']);
						$pmt_start_date = date_create($_GET['pmt_start_date']);
						$pmt_end_date = date_create($_GET['pmt_end_date']);
						
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong> Restructure Offer.</p><br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							Thank you for contacting me about your Spotloan. This option is called a restructure and this is our offer:
						</p>
						
						<p>
							<?php echo $pmt_number_new." ".$pmt_freq_new;?> payments of $<?php echo number_format($pmt_new,2,".",","); ?>. <br>Your first payment would be on  <?php echo date_format($pmt_start_date,"l, F jS, Y"); ?>  and your final payment would be on <?php echo date_format($pmt_end_date,"l, F jS, Y"); ?>.
						</p>
						
						<p>Anytime your payments fall on weekends or holidays, they will be taken out the next business day available.</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<p>Restructure Offer Details</p>
									<div class="form-group">
										<label for="pmt_start_date">
											First Payment Date:
										</label>
										<input class="form-control" type="date" name="pmt_start_date" required/>
									</div>
									<div class="form-group">
										<label for="pmt_end_date">
											Last Payment Date:
										</label>
										<input class="form-control" type="date" name="pmt_end_date" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="pmt_number_new">
											Number Of Payments:
										</label>
										<input class="form-control" type="text" name="pmt_number_new" required/>
									</div>
									<div class="form-group">
										<label for="pmt_new">
											New Payment Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="pmt_new" required/>
									</div>
									<div class="form-group">
										<label for="pmt_freq_new">
											Payment Frequency:
										</label>
										<select class="form-control" name="pmt_freq_new" required>
											<option value="">Choose One</option>
											<option value="Semi-Monthly">Semi-Monthly</option>
											<option value="Monthly">Monthly</option>
											<option value="Bi-Weekly">Bi-Weekly</option>
										</select>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Restructure Loan Notification Email  
						<small>(RM should probably call on this one)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>when you restructure account and need to notify customer before account restructure is updated.
							
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						$pmt_new = htmlspecialchars($_GET['pmt_new']);
						$pmt_number_new = htmlspecialchars($_GET['pmt_number_new']);
						$pmt_freq_new = htmlspecialchars($_GET['pmt_freq_new']);
						$pmt_start_date = date_create($_GET['pmt_start_date']);
						$pmt_end_date = date_create($_GET['pmt_end_date']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Your Spotloan Change in progress.
						</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						<p>I’m glad we could make adjustments so that you can stay on track with paying off your loan.</p>

					    <p>I did restructure your payment schedule as follows:</p>
					    <p>New schedule is now <?php echo $pmt_number_new;?> payments of $<?php echo number_format($pmt_new,2,".",","); ?>.
					    <br> Your first payment is on <?php echo date_format($pmt_start_date,"l, F jS, Y"); ?>, and your last payment will be on <?php echo date_format($pmt_end_date,"l, F jS, Y"); ?></p>
					    
					    <p>Please let me know if you have any questions.</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<p>Restructure Details</p>
									<div class="form-group">
										<label for="pmt_start_date">
											First Payment Date:
										</label>
										<input class="form-control" type="date" name="pmt_start_date" required/>
									</div>
									<div class="form-group">
										<label for="pmt_end_date">
											Last Payment Date:
										</label>
										<input class="form-control" type="date" name="pmt_end_date" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
										<label for="pmt_number_new">
											Number Of Payments:
										</label>
										<input class="form-control" type="text" name="pmt_number_new" required/>
									</div>
									<div class="form-group">
										<label for="pmt_new">
											New Payment Amount:
										</label>
										<input class="form-control" type="number" step="0.01" name="pmt_new" required/>
									</div>
									<div class="form-group">
										<label for="pmt_freq_new">
											Payment Frequency:
										</label>
										<select class="form-control" name="pmt_freq_new" required>
											<option value="">Choose One</option>
											<option value="Semi-Monthly">Semi-Monthly</option>
											<option value="Monthly">Monthly</option>
											<option value="Bi-Weekly">Bi-Weekly</option>
										</select>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Restructure Schedule update <small>(RM should probably call on this one)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a loan is restructured and the system is updated and Borrower request an updated payment schedule
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmthist =  nl2br($_GET['pmthist']);
						
						//next payment
						$pmtnote = htmlspecialchars($_GET['pmtnote']);
						$nextpmtdate = date_create(htmlspecialchars($_GET['nextpmtdate']));
						$nextpmtamt = htmlspecialchars($_GET['nextpmtamt']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						<p>I really appreciate you contacting me. I’m glad we could make adjustments so that you can stay on track with paying off your loan. Attached is a copy of your new payment schedule.</p>
						
						<p>
								<?php
								echo $pmthist;
								?>
							
						</p>
						<?php
                        if ($pmtnote == 'on') {
                            ?>
                            <p>
                                As a friendly reminder, your next schedule payment of $<?php echo number_format($nextpmtamt,2,".",",");?> will be due on <?php echo date_format($nextpmtdate,"l, F jS, Y");?>.
                            </p>
                            <?php
                        }
                        ?>
                        <?php
                        if ($_GET['additional'] == 'on') {
                            ?>
                            <p>
                                <?php echo nl2br(htmlspecialchars($_GET['additionalnote']))?>
                            </p>
                            <?php
                        }
                        ?>
                        
						<p>Let me know if you have any questions.</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-8">
									<div class="form-group">
										<label for="brwName">
											Date - Amount
										</label>
										<textarea class="form-control text-left " name="pmthist" rows="10" required>Due Date - Amount</textarea>
									</div>
										
								</div>
							</div>
							<div class="row">
								<div class="col-md-3">
									<div class="checkbox">
										<label for="pmtnote">
										    <input type="checkbox"  id="pmtnote" name="pmtnote"/><b>Next Payment Notice</b>
										</label>
									</div>
									<div class="checkbox">
										<label for="">
											<input type="checkbox"  id="additional" name="additional"/><b>Other Notes</b>
										</label>
									</div>
								</div>
								<div class="col-md-9">
									<div class="row">
										<div class="col-md-6">
											<g id="pmtnotebody"></g>
										</div>
										<div class="col-md-6">
											<g id="additionalnote"></g>
										</div>
									</div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Why is my loan so expensive
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Use when customer asks why he or she is paying so much for his/her Spotloan.
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmthist =  nl2br($_GET['pmthist']);
						$loan = htmlspecialchars($_GET['loan']);
						$int_charge = htmlspecialchars($_GET['int_charge']);
						$payback = $loan+$int_charge;
						$lst_pmt_date = date_create(htmlspecialchars($_GET['lst_pmt_date']));
						$missedpmt = date_create(htmlspecialchars($_GET['missedpmt']));
						$bal = htmlspecialchars($_GET['bal']);
						$nxtpmt = htmlspecialchars($_GET['nxtpmt']);
						$nxtpmt_date = date_create(htmlspecialchars($_GET['nxtpmt_date']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong>How your Spotloan works.</p>
						<br>
						
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>Thank you for emailing us today, we are always glad to assist you. In your original loan terms, it does explain that you were borrowing the $<?php echo number_format($loan,2,".",","); ?> from us and paying $<?php echo number_format($int_charge,2,".",","); ?> in interest back to us bringing your total payback to $<?php echo number_format($payback,2,".",","); ?> assuming that you were not to miss or defer any payments. Underneath that information it explained that if you miss or defer a payment that you will pay more interest on your loan over time. In the loan documents it does have your last payment date as <?php echo date_format($lst_pmt_date,"F jS, Y"); ?> assuming that there would be no missed or deferred payments.</p>
						
						<p>Since you have missed 1 payment on your loan, you agreed to the added interest that was explained in your loan documents. You have not made up your missed payment for <?php echo date_format($missedpmt,"l, F jS, Y"); ?>. When you don’t make up the payments that you miss, you accrue interest on those payments until they are made up or made at the end of the loan.</p>
						
						<p>Your account balance is $<?php echo number_format($bal,2,".",","); ?> and your next payment of $<?php echo number_format($nxtpmt,2,".",","); ?> is due on <?php echo date_format($nxtpmt_date,"l, F jS, Y"); ?>. As a reminder your interest does reflect on the account balance daily, this is for your benefit so that if you were to pay off early you would save on the interest. I have gone ahead and attached your remaining payment schedule.</p>
						
						<p>
							<?php
							echo $pmthist;
							?>	
						</p>
						
						<p>Please remember that if you do miss anymore payment on your account that you will be adding additional interest to your loan and extending the length of your loan. If you have any more questions please don't hesitate to give us a call at 888-681-6811.</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<div class="row">
								<h3>Original Loan Terms</h3>
								<div class="col-md-4">
									<div class="form-group">
										<label for="loan">
											Original Loan
										</label>
										<select class="form-control" name="loan" required>
											<option value="">Choose Loan amount</option>
											<?php
											for ($i = 300; $i <= 800; $i+=100) {
												?>
												<option value="<?php echo $i;?>" >$<?php echo number_format($i,2,".",","); ?></option>
												<?php
											}
											?>
										</select>
									</div>
									
									<div class="form-group">
                                        <label for="missedpmt">
                                            Missed Payment Date:
                                        </label>
                                        <input class="form-control" type="date" name="missedpmt" required/>
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
                                        <label for="int_charge">
                                            Interest Charge:
                                        </label>
                                        <input class="form-control" type="number" min="0" step="0.01" name="int_charge" required/>
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
                                        <label for="lst_pmt_date">
                                            Last Payment Date:
                                        </label>
                                        <input class="form-control" type="date" name="lst_pmt_date" required/>
                                    </div>
                                </div>
							</div>
							<div class="row">
								<h3>Current Loan Terms</h3>
								<div class="col-md-4">
									<div class="form-group">
                                        <label for="bal">
                                            Outstanding Balance:
                                        </label>
                                        <input class="form-control" type="number" step="0.01" name="bal" required/>
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
                                        <label for="nxtpmt">
                                            Next Payment Amount:
                                        </label>
                                        <input class="form-control" type="number" step="0.01" name="nxtpmt" required/>
                                    </div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
                                        <label for="nxtpmt_date">
                                            Next Payment Date:
                                        </label>
                                        <input class="form-control" type="date" name="nxtpmt_date" required/>
                                    </div>
								</div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 10) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4"></li>
                </ul>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h2>
						Final Payment Pending<small> Processing last payment</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When Borrower asks about the status of the last payment.
							<br>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtdate = date_create($_GET['pmtdate']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong> Pending last payment - Payment will clear on <?php echo date_format($pmtdate,"l, F jS"); ?></p><br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>Thank you for contacting us, your final payment is still being processed by our system, and should clear on <?php echo date_format($pmtdate,"l, F jS"); ?>. If you wish to reapply you may do so, all you need to do is go to our website and submit a new application, just like the first time.</p>
    
					    <p>Keep in mind that if your final payment is returned and you are approved for a new loan, you will be responsible for both balances.</p>
					
					    <p>If you have any questions or concerns, don't hesitate to give us a call or send us an email and any one of our Relationship Managers will be more than pleased to assist you.</p>
					    
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
									<div class="form-group">
                                        <label for="pmtdate">
                                            Last Payment Clear Date:
                                        </label>
                                        <input class="form-control" type="date" name="pmtdate" required/>
                                    </div>
								</div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
}elseif ($_GET['cs'] == 3) {
    //General Emails
    if ($_GET['temp'] == 1) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4"></li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Deposit Information Email
						<br>
						<small>(Funds didn’t arrive in account)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong>What happened? Let’s find out</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>Thanks for letting me know that you haven’t received your loan. Let’s put our heads together and figure out what happened. Usually it means your bank doesn’t have the funds yet or there’s an issue with the banking information.</p>
    
    					<p>Please call me right away at 1(888) 681-6811 so we can get this fixed.</p>
    					
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Deposit Information Email 2 
						<br>
						<small>(Funds sent to bank - still having issues/probably wrong account)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When a customer emails or calls the RM and says the funds have been deposited into the wrong account OR that they want to change the bank account where the funds were deposited.
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong> Your Spotloan deposit</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>Thanks for contacting me about your Spotloan deposit. Our deposits almost always go through. When they don’t, it usually means the banking information is wrong.</p>
    
					    <p>Here’s what we need to do to get this deposit to you as quickly as possible:</p>
					    
					    <div style="margin-left: 40px;">     
					      <p>1) Wait – It takes 5-7 business days to confirm the money has been returned to Spotloan.</p>
					      <p>2)Touch Base – I’ll follow up with you as soon as we receive it.</p>
					      <p>3) Re-apply – You’ll need to apply with your new account information. Keep in mind this doesn’t mean you’ll be automatically approved for another loan.</p>
					      <p>4) Money! – If approved, the funds can be in your account within the next business day.</p>    
					    </div>
					    <p>You can speed up this process by contacting your bank and asking them to return the funds.</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Banking Information Update Request Email 
						<br>
						<small>(New account)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When someone contacts their RM asking if they can update their banking information.
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = htmlspecialchars($_GET['pmtAmt']);
						$pmtdate = date_create($_GET['pmtdate']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
									Reset
								<span class="glyphicon glyphicon-refresh"></span>
							</a>
						</div>
						<br>
						<br>
						<hr>
						<div>
						<!-- Email Temaplate -->
						<p><strong>Subject:</strong> Your payment, your way</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>Thanks for contacting me. In regards to your e-mail, I can update the banking information so that the payment of $<?php echo number_format($pmtAmt,2,".",","); ?> due on <?php echo date_format($pmtdate,"l, F jS, Y"); ?>, comes from a different account.</p>
						<p>Please provide me with the following information:</p>
						<ol>
							
						    <li><p>Routing Number</li>
						    <li><p>Bank Name</li>
						    <li><p>Account Number</li>
						    <li><p>Type of account (Checking or Savings)</li>
						    </p>
					    </ol>
					    <p>Please keep in mind that we do require at least 2 business days before your payment is due in order to make any changes.</p>
					    
					    <p>Let me know as soon as possible please.</p>
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pmtdate">
                                            First Payment Date:
                                        </label>
                                        <input class="form-control" type="date" name="pmtdate" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="pmtAmt">
                                            First Payment Amount:
                                        </label>
                                        <input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
                                    </div>
                                </div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Banking Information Change Email
						<br>
						<small>(New account)</small>
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>When someone contacts their RM with new bank account information, and this change has been made in our system. This can happen at any point after a customer has received their loan disbursement, but not before.
							<br>
							<b>Action: </b>Manual - Agent to edit and send
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						$pmtAmt = htmlspecialchars($_GET['pmtAmt']);
						$pmtdate = date_create($_GET['pmtdate']);
                        $bankname = nl2br(htmlspecialchars($_GET['bankname']));
                        $lastfour = htmlspecialchars($_GET['lastfour']);
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							<strong>Subject:</strong> We’ve updated your info!
						</p>
						<br>
						<p>
							Hi <?php echo $brwName;?>,
						</p>
						<br>
						
						<p>
							Thanks for letting me know about the changes to your bank account. I really appreciate it! Everything has been updated in our system.
						</p>
						<p>
							As a friendly reminder, your next payment of $[Scheduled Payment Amount] is due on [Next Scheduled Payment Date (Tuesday, January 7)], and will be pulled from your new [Bank Name] account ending in [Last 4 Digits Customer Bank Account].<
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4">
                                    <div class="form-group">
                                        <label for="pmtdate">
                                            Next Payment Date:
                                        </label>
                                        <input class="form-control" type="date" name="pmtdate" required/>
                                    </div>
                                    <div class="form-group">
                                        <label for="pmtAmt">
                                            Next Payment Amount:
                                        </label>
                                        <input class="form-control" type="number" step="0.01" name="pmtAmt" required/>
                                    </div>
                                </div>
								<div class="col-md-4">
                                        <div class="form-group">
                                            <label for="bankname">
                                                New Bank Name:
                                            </label>
                                            <input class="form-control" type="text" name="bankname" required/>
                                        </div>
                                        <div class="form-group">
                                            <label for="lastfour">
                                                Last 4 of New Bank Account:
                                            </label>
                                            <input class="form-control" type="text" maxlength="4"  name="lastfour" required/>
                                        </div>
                                    </div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 10) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 11) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 12) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 13) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 14) {
        ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo ++$forth;?>" class="btn btn-success" role="button">
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
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" id="embody" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
    }elseif ($_GET['temp'] == 15) {
       ?>
        <div class="jumbotron">
            <hr>
            <div class="row">
                <ul class="list-inline text-center">
                    <li class="col-md-4">
                        <a href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo --$back;?>" class="btn btn-success" role="button">
                            <span class="glyphicon glyphicon-arrow-left"></span>
								Previous Template
                        </a>
                    </li>
                    <li class="col-md-4">
                        <a href="rmmenu.php" class="btn btn-primary" role="button">
								<span class="glyphicon glyphicon-menu-hamburger"></span>
								RM Menu
						</a>
                    </li>
                    <li class="col-md-4"></li>
                </ul>
            </div>
            <hr>
            <div class="row">
                <div class="col-md-3">
                    <h2>
						Template Name
					</h2>
					<font color="red">
						<h5>
							<b>Generate: </b>Copy and Paste 
							<br>
							<b>Template: </b>
							<br>
							<b>Action: </b>
						</h5>
					</font>
                </div>
                <div class="col-md-9" style="border-left: solid;">
                    <?php
					if($_GET['set'] == "on"){
						//variables to complete template
						$brwName = htmlspecialchars(trim($_GET['brwName']));
						
						?>
						<div>
							<a class="btn btn-danger col-md-3" href="rmmenu.php?cs=<?php echo $_GET['cs'];?>&temp=<?php echo $_GET['temp'];?>">
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
							Hi <?php echo $brwName;?>,
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
							<input type="hidden" name="cs" value="<?php echo $_GET['cs'];?>"/>
							<input type="hidden" name="temp" value="<?php echo $_GET['temp'];?>"/>
							<div class="row">
								<div class="col-md-4">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-4"></div>
								<div class="col-md-4"></div>
							</div>
							<button type="submit" name="set" class="btn btn-success" value="on" colspan="3">
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
} else {
    //RM Email Menu
?>
    <div class="jumbotron">
		<div class="tab-content">
            <br>
            <div>
                <h2 class="text-center"><font color="#3793D2">Customer Service<br>
                    Email Templates</font></h2>  
            </div>
            <hr>
            <div>
                <h3 class="text-center"><font color="#3793D2">Specific To Payment Issues</font></h3>
            </div>
            <br>

            <div class="row">
                <ul class="zest">	    
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=1">Pay-Off Notification</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=2">Payment Arrangement - Additional</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=3">Payment Arrangement - Mailed</a></li>
                </ul>
            </div>
            <br>

            <div class="row">
                <ul class="zest">	    
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=4">Pay-Off Request Email</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=5">Pay-Off Request Email - no date</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=6">Next Payment Date</a></li>
                </ul>
            </div>
            <br>

            <div class="row">
                <ul class="zest">
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=7">First Deferral Request</a></li>	    
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=8">Second Deferral Request</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=9">Deferral Confirmation</a></li>
                </ul>
            </div>
            <br>

            <div class="row">
                <ul class="zest">
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=10">Deferral Window Missed</a></li>	    
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=11">4 Business Days Reminder</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=12">Payment Confirmation</a></li>
                </ul>
            </div>
            <br>

            <div class="row">
                <ul class="zest">
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=13">Missed Payment - NSF Fee</a></li>	    
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=14">Missed Payment - No NSF Fee</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=15">NSF Response</a></li>
                </ul>
            </div>
            <br>
            
            <div class="row">
                <ul class="zest">
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=16">Additional Payment Cancelation</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=1&temp=17">Settlement Completed</a></li>
                </ul>
            </div>
            <br>

            <div>     
                <h3 class="text-center"><font color="#3793D2">General Payment Issues</font></h3>  
            </div>

            <div class="row">
                <ul class="zest">	    
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=2&temp=1">Broken Agreement</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=2&temp=2">Payment History</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=2&temp=3">Account Balance</a></li>
                </ul>
            </div>
            <br>

            <div class="row">
                <ul class="zest">	    
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=2&temp=4">ACH Authtorization</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=2&temp=5">Payment Options</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=2&temp=6">Restructure Offer</a></li>
                </ul>
            </div>
            <br>

            <div class="row">
                <ul class="zest">
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=2&temp=7">Restructure confirmation</a></li>	    
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=2&temp=8">Restructure Schedule Update</a></li>
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=2&temp=9">Expensive Loan Question Email.</a></li>
                </ul>
            </div>
            <br>

            <div class="row">
                <ul class="zest">
                    <li class="col-sm-4"><a href="./rmmenu.php?cs=2&temp=10">Last payment procesing Email.</a></li>
                </ul>
            </div>
            <br>	

            <div>
                <div>  
                    <h3 class="text-center"><font color="#3793D2">General Emails</font></h3>  
                </div>
                
                <div class="row">
                    <ul class="zest">	    
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=1">Deposit Issues 1</a></li>
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=2">Deposit Issues 2</a></li>
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=3">Funds deposit date</a></li>
                    </ul>
                </div>
                <br>

                <div class="row">
                    <ul class="zest">
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=4">Banking Information update Request</a></li>
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=6">Banking Information Change</a></li>	    
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=7">Request for More Funds</a></li>	     	    
                    </ul>
                </div>
                <br>

                <div class="row">
                    <ul class="zest">
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=7">Request for an Email to be Resent</a></li>
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=8">Contact Information Change</a></li>	    
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=9">Attempt to Call</a></li>
    	   
                    </ul>
                </div>
                <br>
                <div class="row">
                    <ul class="zest">
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=10">Mailing Payment</a></li>
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=11">Voided Check</a></li>
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=12">All Other Situations</a></li>
                    </ul>
                </div>
                <br>
                <div class="row">
                    <ul class="zest">
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=13">Online account issues</a></li>
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=14">C2C confirmation Email</a></li>
                        <li class="col-sm-4"><a href="./rmmenu.php?cs=3&temp=15">Sold Account Check</a></li>
                    </ul>
                </div>
                <br>
            </div>
        </div>
    </div>
<?php
}
include 'footer.php';
?>
<script>
	//next pmt script
	document.getElementById('pmtnote').onclick = function(){nextpmt();};
	function nextpmt(){
		var pmtbody = document.getElementById('pmtnotebody');
		var status = document.getElementById('pmtnote').checked;
		if(status){
			pmtbody.innerHTML =
				"<div class='form-group' id='pmtnote'>"
					+"<label for='nextpmtdate'>"
						+"Next Payment Date"
					+"</label>"
					+"<input class='form-control' type='date' id='nextpmtdate' name='nextpmtdate' required/>"
				+"</div>"
				+"<div class='form-group'>"
					+"<label for='nextpmtamt'>"
						+"Next Payment Amount"
					+"</label>"
					+"<input class='form-control' type='number' step='0.01' id='nextpmtamt' name='nextpmtamt' required/>"
				+"</div>"
				;
		}else {
			pmtbody.innerHTML = 
			'<div class="col-md-6">'
				+'<g id="pmtnotebody"></g>'
			+'</div>'
			;
		}
			
			
	}
	document.getElementById('additional').onclick = function(){additionalnote();};
	function additionalnote(){
		var notebody = document.getElementById('additionalnote');
		var status = document.getElementById('additional').checked;
		if(status){
			notebody.innerHTML=
			"<div class='form-group' id='additionalnote'>"
				+"<label for='additionalnote'>"
					+"Additional notes"
				+"</label>"
				+"<textarea name='additionalnote' class='form-control' rows='6' col='6' id='nextpmtdate'></textarea>"
			+"</div>"	
			;
		}else {
			notebody.innerHTML=
			'<div class="col-md-6">'
				+'<g id="additionalnote"></g>'
			+'</div>'
			;
		}
	}
	
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var maxfields = 60;
		var addButton = $('.add_button'); //Add button selector
		var wrapper = $('.pmthist'); //Input field wrapper
		var x=1;
		var insetHTML = 
		'<tr>'
		+	'<td><input class="form-control" type="date" name="date[]" id="date[]"></td>'
		+	'<td>'
		+		'<select class="form-control" name="tran_type[]" id="tran_type[]">'
		+			'<option value=""></option>'
		+			'<option value="Deferred Loan Payment">Deferred Loan Payment</option>'
		+			'<option value="Successful Payment">Successful Payment</option>'
		+			'<option value="Failed Payment">Failed Payment</option>'
		+			'<option value="New Loan Draw">New Loan Draw</option>'
		+			'<option value="Return Check Fee">Return Check Fee</option>'
		+		'</select>'
		+	'</td>'
		+	'<td><input class="form-control" type="number" step="0.01" name="amount[]"></td>'
		+	'<td>'
		+	'<a href="javascript:void(0);" class="btn btn-danger remove_button" title="Remove field" style="font-size:16px;color:#b30000"><span class="glyphicon glyphicon-remove-circle" style="font-size:24px;color:#b30000"></span> Remove</a>'
		+	'</td>'
		+'</tr>'
		;
		$(addButton).click(
			function(){
				if(x < maxfields){
					x++;
					$(wrapper).append(insetHTML);
				}	
			}
		);
		$(wrapper).on('click', '.remove_button', function(e){ //Once remove button is clicked
	        e.preventDefault();
	        $(this).parent('td').parent('tr').remove();
	        x--;
	        });
	});
	
</script>

