
//next payment
						$pmtnote = htmlspecialchars($_GET['pmtnote']);
						$nextpmtdate = date_create(htmlspecialchars($_GET['nextpmtdate']));
						$nextpmtamt = htmlspecialchars($_GET['nextpmtamt']);


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
-----------------------------------
//number format//

<?php echo number_format($pmtAmt,2,".",","); ?>
<?php echo date_format($pmtdate,"l, F jS, Y"); ?>

<p>
Hi <?php echo $brwName;?>,
</p>
<br>

-------------------------


<?php echo $bankname;?>
<?php echo $lastfour;?>
bank information


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


**********************

$pmtAmt = htmlspecialchars($_GET['pmtAmt']);
						$pmtdate = date_create($_GET['pmtdate']);
                        $bankname = nl2br(htmlspecialchars($_GET['bankname']));
                        $lastfour = htmlspecialchars($_GET['lastfour']);

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