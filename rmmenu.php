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
						$brwName = trim($_GET['brwName']);	
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
						$brwName = trim($_GET['brwName']);
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
								<?php echo $_GET['additionalnote']?>
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
								<div class="checkbox">
									<label for="pmtnote">
										<input type="checkbox"  id="pmtnote" name="pmtnote"/><b>Next Payment Notice</b>
										<br>
										<input type="checkbox"  id="additional" name="additional"/><b>Other Notes</b>
									</label>
								</div>
								<g id="pmtnotebody"></g>
								<g id="additionalnote"></g>
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
						$brwName = trim($_GET['brwName']);
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
						$brwName = trim($_GET['brwName']);
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
						$brwName = trim($_GET['brwName']);
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
						$brwName = trim($_GET['brwName']);
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
						$brwName = trim($_GET['brwName']);
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
						$brwName = trim($_GET['brwName']);
						
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
								<div class="col-md-5">
									<div class="form-group">
										<label for="brwName">
											Borrower´s First Name:
										</label>
										<input class="form-control" type="text" placeholder="i. e. David" name="brwName" required/>
									</div>
								</div>
								<div class="col-md-5"></div>
								<div class="col-md-2"></div>
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
	document.getElementById('pmtnote').onclick = function(){nextpmt()};
	
	function nextpmt(){
		var pmtbody = document.getElementById('pmtnotebody');
		pmtbody.innerHTML =
			"<p class='text-center'>Next Payment Details</p>"
			+"<div class='col-md-4' id='pmtnotebody'>"
				+"<div class='form-group'>"
					+"<label for='nextpmtdate'>"
						+"Next Payment Date"
					+"</label>"
					+"<input class='form-control' type='date' id='nextpmtdate' name='nextpmtdate' required/>"
				+"</div>"
			+"</div>"
			
			+"<div class='col-md-4'>"
				+"<div class='form-group'>"
					+"<label for='nextpmtamt'>"
						+"Next Payment Date"
					+"</label>"
					+"<input class='form-control' type='number' step='0.01' id='nextpmtamt' name='nextpmtamt' required/>"
				+"</div>"
			+"</div>"
			
			//+"<div class='col-md-4'>"
			//	+
			//+"</div>"
			;
			
	}
	document.getElementById('additional').onclick = function(){additionalnote()}
	function additionalnote(){
		var notebody = document.getElementById('additionalnote');
		notebody.innerHTML=
		"<p class='text-center'>Additional Inforamtion</p>"
		+"<div class='form-group'>"
			+"<label for='nextpmtdate'>"
				+"Additional notes"
			+"</label>"
			+"<textarea name='nextpmtdate' class='form-control' rows='6' col='6' id='nextpmtdate'></textarea>"
		+"</div>"	
		;
	}
	
</script>

