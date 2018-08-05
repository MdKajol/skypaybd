<?php

if(is_post_request()) {
	$admin_email = es($_POST["email"]);
	$admin_password = es($_POST["password"]);
	// validate data over here



	// after validation find the admin
	$admin = find_admin_by_email($_POST["email"]);

	// if admin exits
	if($admin) {
		// check admin is activated or not
		if($admin["admin_activated"]) {
			// admin found now check password
			if(check_password($admin_password, $admin["admin_hash_password"])) {
				// password match AND he is a admin
				// store the admin details
				login_admin($admin);
				redirect_to("index.php");
			} else {
				// show password doesn't match error
				$_SESSION["message"] = "Invalid Password";
			}
		} else {
			$_SESSION["message"] = "Invalid Email and Password";
		}
	} else {
		// admin did not found throw error
		$_SESSION["message"] = "Invalid Email";
	}

}

?>
<section class="home-fullscreen">
   <div class="full-screen-v admin">
      <div class="container">
         <div class="row">
            <div class="col-md-4 offset-md-4 mt-60 mb-60">
               <div class="olympia-form">
                  <div class="showError"></div>
				   <?php echo showMsg("error"); ?>
                  <h2 class="olympia-title-min">Sign In</h2>
                  <div class="form-wrapper">
                     <form id="admin-form" action="" method="POST">
                        <input id="admin-email" autocomplete="off" data-toggle="popover" name="email" type="email" placeholder="Your Email" required>
                        <input id="admin-password" autocomplete="off" name="password" data-toggle="popover" type="password" placeholder="Your Password" required>
                        <input id="admin-submit" class="btn btn-coral border-0" name="admin-submit" type="submit" value="Submit">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>