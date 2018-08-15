<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php require_admin_login(); ?>

<?php $admin = $_SESSION["admin_login"]; ?>
<?php require_once(inc_file("layout/dashboard-header.php")); ?>

<?php require_once(inc_file("layout/admin/user-controll.php")); ?>
<?php require_once(inc_file("layout/admin/left-menu.php")); ?>



<div class="dashboard-content-area menu-left-gap">

   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <ul class="nav nav-tabs" id="myTab" role="tablist">
               <li class="nav-item">
                  <a class="nav-link active" id="" data-toggle="tab" href="#buy" role="tab" aria-controls="buy" aria-selected="true">Buy</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="" data-toggle="tab" href="#sell" role="tab" aria-controls="sell" aria-selected="false">Sell</a>
               </li>
               <li class="nav-item">
                  <a class="nav-link" id="" data-toggle="tab" href="#exchange" role="tab" aria-controls="exchange" aria-selected="false">Exchange</a>
               </li>
            </ul>
            <div class="tab-content" id="myTabContent">
               <!-- buy start-->
               <div class="tab-pane fade show active" id="buy" role="tabpanel" aria-labelledby="home-tab">
                  <table class="table table-responsive table-light table-bordered">
                     <thead>
                     <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User Information</th>
                        <th scope="col">Payment Receive Details</th>
                        <th scope="col">Payment Send Details</th>
                     </tr>
                     </thead>
                     <tbody>
                     <?php
                        $sql = "SELECT * FROM sky_buy";
                        $result = $db->query($sql);
                        $count = 1;
                        if($result->num_rows) {
                        while($row = $result->fetch_assoc()) {
                           $user = find_user_by_id($row["user_id"]);
                           $receive_details = json_decode($row["buy_receive_details"], true);
                           $payment_details = json_decode($row["buy_payment_details"], true);
                     ?>

                        <tr>
                           <th scope="row"><?php echo $row["buy_id"]; ?></th>
                           <td>
                              <table class="table-dark table-bordered">
                                 <tr><th>Name</th><td><?php echo $user["user_full_name"]; ?></td></tr>
                                 <tr><th>Email</th><td><?php echo $user["user_email"]; ?></td></tr>
                                 <tr><th>Phone</th><td><?php echo $user["user_phone"]; ?></td></tr>
                              </table>
                           </td>
                           <td>
                              <table class="table-dark table-bordered">
                                 <tr><th>Buy Dollar</th><td><?php echo $row["buy_dollar_amount"] . "\$"; ?></td></tr>
                                 <?php foreach ($receive_details as $key => $value) { ?>
                                 <tr><th><?php echo str_replace("_", " ", $key); ?></th><td><?php echo $value; ?></td></tr>
                                 <?php } ?>
                              </table>
                           </td>
                           <td>
                              <table class="table-dark table-bordered">
                                 <tr><th>Taka Sent</th><td><?php echo $row["buy_dollar_to_taka"] . "&#2547;"; ?></td></tr>
                                 <?php foreach ($payment_details as $key => $value) { ?>
                                  <tr><th><?php echo str_replace("_", " ", $key); ?></th><td><?php echo $value; ?></td></tr>
                                 <?php } ?>
                              </table>
                           </td>
                        </tr>

                     <?php $count++; } } else {echo "<tr><td colspan='4'>no request fount</td></tr>"; } ?>
                     </tbody>
                  </table>
               </div><!-- buy end-->





               <!-- sell start-->
               <div class="tab-pane fade" id="sell" role="tabpanel" aria-labelledby="profile-tab">
                  <table class="table table-responsive table-light table-bordered">
                     <thead>
                     <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User Information</th>
                        <th scope="col">Payment Send Details</th>
                        <th scope="col">Payment Receive Details</th>
                     </tr>
                     </thead>
                     <tbody>
	                 <?php
	                 $sql = "SELECT * FROM sky_sell";
	                 $result = $db->query($sql);
	                 $count = 1;
	                 if($result->num_rows) {
		                 while($row = $result->fetch_assoc()) {
			                 $user = find_user_by_id($row["user_id"]);
			                 $receive_details = json_decode($row["sell_receive_details"], true);
			                 $payment_details = json_decode($row["sell_payment_details"], true);
			                 ?>

                            <tr>
                               <th scope="row"><?php echo $row["sell_id"]; ?></th>
                               <td>
                                  <table class="table-dark table-bordered">
                                     <tr><th>Name</th><td><?php echo $user["user_full_name"]; ?></td></tr>
                                     <tr><th>Email</th><td><?php echo $user["user_email"]; ?></td></tr>
                                     <tr><th>Phone</th><td><?php echo $user["user_phone"]; ?></td></tr>
                                  </table>
                               </td>
                               <td style="vertical-align: middle; margin: 0 auto;">
                                  <table class="table-dark table-bordered">
                                     <tr><th>Sell Dollar</th><td><?php echo $row["sell_dollar_amount"] . "\$"; ?></td></tr>
					                  <?php foreach ($payment_details as $key => $value) { ?>
                                         <tr><th><?php echo str_replace("_", " ", $key); ?></th><td><?php echo $value; ?></td></tr>
					                  <?php } ?>
                                  </table>
                               </td>
                               <td style="vertical-align: middle; margin: 0 auto;">
                                  <table class="table-dark table-bordered">
                                     <tr><th>Want Taka</th><td><?php echo $row["sell_dollar_to_taka"] . "&#2547;"; ?></td></tr>
					                  <?php foreach ($receive_details as $key => $value) { ?>
                                         <tr><th><?php echo str_replace("_", " ", $key); ?></th><td><?php echo $value; ?></td></tr>
					                  <?php } ?>
                                  </table>
                               </td>
                            </tr>

			                 <?php $count++; } } else {echo "<tr><td colspan='4'>no request fount</td></tr>"; } ?>
                     </tbody>
                  </table>
               </div><!-- sell end-->


               <!-- excange start-->
               <div class="tab-pane fade" id="exchange" role="tabpanel" aria-labelledby="contact-tab">
                  <table class="table table-responsive table-light table-bordered">
                     <thead>
                     <tr>
                        <th scope="col">Id</th>
                        <th scope="col">User Information</th>
                        <th scope="col">Payment Receive Details</th>
                        <th scope="col">Payment Send Details</th>
                     </tr>
                     </thead>
                     <tbody>
	                 <?php
	                 $sql = "SELECT * FROM sky_exchange";
	                 $result = $db->query($sql);
	                 $count = 1;
	                 if($result->num_rows) {
		                 while($row = $result->fetch_assoc()) {
			                 $user = find_user_by_id($row["user_id"]);
			                 $receive_details = json_decode($row["exchange_receive_details"], true);
			                 $payment_details = json_decode($row["exchange_payment_details"], true);
			                 ?>

                            <tr>
                               <th scope="row"><?php echo $row["exchange_id"] ?></th>
                               <td>
                                  <table class="table-dark table-bordered">
                                     <tr><th>Name</th><td><?php echo $user["user_full_name"]; ?></td></tr>
                                     <tr><th>Email</th><td><?php echo $user["user_email"]; ?></td></tr>
                                     <tr><th>Phone</th><td><?php echo $user["user_phone"]; ?></td></tr>
                                  </table>
                               </td>
                               <td>
                                  <table class="table-dark table-bordered">
                                     <tr><th>Exchange Dollar</th><td><?php echo $row["exchange_dollar_amount"] . "\$"; ?></td></tr>
					                  <?php foreach ($receive_details as $key => $value) { ?>
                                         <tr><th><?php echo str_replace("_", " ", $key); ?></th><td><?php echo $value; ?></td></tr>
					                  <?php } ?>
                                  </table>
                               </td>
                               <td>
                                  <table class="table-dark table-bordered">
                                     <tr><th>Give Dollar</th><td><?php echo $row["exchange_dollar_get"] . "\$";; ?></td></tr>
					                  <?php foreach ($payment_details as $key => $value) { ?>
                                         <tr><th><?php echo str_replace("_", " ", $key); ?></th><td><?php echo $value; ?></td></tr>
					                  <?php } ?>
                                  </table>
                               </td>
                            </tr>

			                 <?php $count++; } } else {echo "<tr><td colspan='4'>no request fount</td></tr>"; } ?>
                     </tbody>
                  </table>
               </div><!-- exchange end-->
            </div>
         </div>
      </div>
   </div>
</div>

<?php require_once(inc_file("layout/dashboard-footer.php")); ?>


