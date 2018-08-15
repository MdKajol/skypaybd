<?php
$buy_dollar_amount = "";
$paymentMethod = "";
$bkash_trxid = "";
$rocket_number = "";
$rocket_trxid = "";
$bank_details = "";
$receiving_method = "";
$paypal_email = "";
$neteller_id = "";
$skrill_email = "";
$user_register = "";

if(is_post_request()) {
	$buy_dollar_amount = $_POST["buy_dollar_amount"];
	$buy_dollar_to_taka = $_POST["buy_dollar_to_taka"];
	$pay_d = json_encode($_POST["pay_d"]);
	$rec_d = json_encode($_POST["rec_d"]);

	// validate data
	if(is_blank($buy_dollar_amount)) {
		$errors[] = "please enter an valid dollar amount";
	}

	// check for errors
	if(!$errors) {
		// validation success - insert the data
		$col = ["user_id", "exchange_dollar_amount", "exchange_payment_details", "exchange_dollar_get", "exchange_receive_details"];
		$val = [$user["user_id"], $buy_dollar_amount, $rec_d, $buy_dollar_to_taka, $pay_d];
		$inserted = db_insert("sky_exchange", $col, $val);
		if($inserted) {
			$_SESSION["message"] = "your exchanging request has been done";
		} else {
			$errors[] = "some problem occure please try letter";
		}
	}
}
?>


<div class="container">
   <div class="row">
      <div class="col-12 order-1 col-sm-12 order-sm-1 col-md-6 order-md-0">
         <div class="olympia-form">
            <div class="showError"></div>
			   <?php echo showMsg("success"); ?>
			   <?php echo showError(); ?>
            <h2 class="olympia-title-min">Exchange Dollar</h2>
            <div class="user form-wrapper">
               <form id="regitration-form" action="" method="POST">
                  <div class="row">
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="">Your Amount <small>(dollar)</small></label>
                           <input id="exchangeDollar" type="text" name="buy_dollar_amount" value="" autocomplete="off" placeholder="Dollar" required>
                        </div>
                     </div>
                     <div class="col-md-6">
                        <div class="form-group">
                           <label for="">You will get <small>(dollar)</small></label>
                           <input id="dollarInTaka" type="text" name="buy_dollar_to_taka" value="" autocomplete="off" placeholder="Taka" readonly>
                        </div>
                     </div>
                  </div>

                  <div class="user-payment how-user-pay">
                     <div class="paymentMethod">
                        <div class="form-group">
                           <label for="">How you pay <small>(dollar)</small></label>
                           <!-- Default checked -->
                           <select name="pay_d[pay_method]" id="exchangeMethod" class="custom-select" required>
                              <option value="">Select One</option>
                              <option value="paypal">Paypal</option>
                              <option value="payoneer">Payoneer</option>
                              <option value="neteller">Neteller</option>
                              <option value="skrill">skrill</option>
                           </select>
                        </div>
                     </div>
                     <div class="paymentMethodDetails">

                        <div class="form-group exchangeDetails paypal">
                           <label for="">Your Paypal Email<small></small></label>
                           <input id="paypalEmail" class="empty email" type="text" name="pay_d[paypal_email]" value="" autocomplete="off" placeholder="Your Paypal Email" required>
                        </div>

                        <div class="form-group exchangeDetails payoneer">
                           <label for="">Your Payoneer Email<small></small></label>
                           <input id="payoneerEmail" class="empty email" type="text" name="pay_d[payoneer_email]" value="" autocomplete="off" placeholder="Your Payoneer Email" required>
                        </div>

                        <div class="form-group exchangeDetails neteller">
                           <label for="">Your Neteller Id<small></small></label>
                           <input id="netellerId" class="empty" type="text" name="pay_d[neteller_id]" value="" autocomplete="off" placeholder="Your Neteller Id" required>
                        </div>

                        <div class="form-group exchangeDetails skrill">
                           <label for="">Your Skrill Email<small></small></label>
                           <input id="skrillEmail" class="empty email" type="text" name="pay_d[skrill_email]" value="" autocomplete="off" placeholder="Your Skrill Email" required>
                        </div>

                     </div>
                  </div>

                  <div class="user-payment how-user-receive">
                     <div class="receivedMethod">
                        <div class="form-group">
                           <label for="">How you want to receive <small>(dollar)</small></label>
                           <!-- Default checked -->
                           <select name="rec_d[receive_method]" id="receivedMethod" class="custom-select" required>
                              <option value="">Select One</option>
                              <option value="paypal">Paypal</option>
                              <option value="payoneer">Payoneer</option>
                              <option value="neteller">Neteller</option>
                              <option value="skrill">skrill</option>
                           </select>
                        </div>
                     </div>
                     <div class="receivedMethodDetails">
                        <div class="form-group receiveDetails paypal">
                           <label for="">Your Paypal Email<small></small></label>
                           <input id="paypalEmail" class="empty email" type="text" name="rec_d[paypal_email]" value="" autocomplete="off" placeholder="Your Paypal Email" required>
                        </div>

                        <div class="form-group receiveDetails payoneer">
                           <label for="">Your Payoneer Email<small></small></label>
                           <input id="payoneerEmail" class="empty email" type="text" name="rec_d[payoneer_email]" value="" autocomplete="off" placeholder="Your Payoneer Email" required>
                        </div>

                        <div class="form-group receiveDetails neteller">
                           <label for="">Your Neteller Id<small></small></label>
                           <input id="netellerId" class="empty" type="text" name="rec_d[neteller_id]" value="" autocomplete="off" placeholder="Your Neteller Id" required>
                        </div>

                        <div class="form-group receiveDetails skrill">
                           <label for="">Your Skrill Email<small></small></label>
                           <input id="skrillEmail" class="empty email" type="text" name="rec_d[skrill_email]" value="" autocomplete="off" placeholder="Your Skrill Email" required>
                        </div>
                     </div>
                  </div>

                  <input id="buySubmit" class="btn btn-coral border-0" name="buy_register" type="submit" value="Submit">
               </form>
            </div>
         </div>
      </div>

      <div class="col-12 order-0 col-sm-12 order-sm-0 col-md-6 order-md-1">
         <div class="card mb-20">
            <div class="card-header bg-warning ">
               <h4 class="m-0 text-white">Warning</h4>
            </div>
            <div class="card-body bg-white">
               <div class="card-text text-dark">
                  <p>Paypall Minimum 50$ Buy Order করতে হবে । 50$ এর নিচে অর্ডার করলে ৫% সার্ভিস চার্জ রেখে বাকি টাকা ফেরত দেওয়া হবে ।</p>

                  <p>Minimum Buy Order 10$. এর নিচে অর্ডার করলে ৫% সার্ভিস চার্জ রেখে বাকি টাকা ফেরত দেওয়া হবে ।</p>

                  <p>Skrill এর ফি বেড়ে যাওয়ার কারনে 40$ এর নিচে অর্ডার করলে ০.5$ কম দেওয়া হবে । আমরা Regular Fee বহন করব ।</p>

                  <p>Neteller এর ফি বেড়ে যাওয়ার কারনে 40$ এর নিচে অর্ডার করলে ০.5$ কম দেওয়া হবে । আমরা Regular Fee বহন করব ।</p>

                  <p>100$ এর বেশি অর্ডার করবেন না । করলে পরেদিন দেওয়া হবে ।</p>

                  <p>Payonner Minimum 50$ Buy Order করতে হবে ।</p>

                  <p>আমাদের অনেক সদস্যদের অনুরুধ এ DbseWallet পুনরায় Coin লেনদেন চালু করল । এখন থেকে আমাদের সকল সদস্যগণ Coin লেনদেন করতে পারবেন।</p>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
