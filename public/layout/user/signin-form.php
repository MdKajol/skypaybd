<?php
$user_email = "";
$user_password = "";

if(is_post_request()) {
	$user_email = es($_POST["email"]);
	$user_password = es($_POST["password"]);
	// validate data over here



	// after validation find the admin
	$user = find_user_by_email($_POST["email"]);

	// if admin exits
	if($user) {
		// check admin is activated or not
		if($user["user_activation_status"] === "active") {
			// user found now check password
			if(check_password($user_password, $user["user_password_hash"])) {
				// password match AND he is a admin
				// store the admin details
			   login_user($user);
				redirect_to(link_href("user/index.php"));
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
            <div class="col-12 col-sm-12 col-md-8 col-lg-4 col-xl-4 offset-md-2 offset-lg-4 offset-xl-4 mt-60 mb-60">
               <div class="olympia-form">
                  <div class="showError"></div>
				   <?php echo showMsg("error"); ?>
                  <h2 class="olympia-title-min">Sign In</h2>
                  <div class="form-wrapper">
                     <form id="admin-form" action="" method="POST">
                        <input id="admin-email" autocomplete="off" data-toggle="popover" name="email" value="<?php echo $user_email; ?>" type="email" placeholder="Your Email" required>
                        <input id="admin-password" autocomplete="off" name="password" value="<?php echo $user_password; ?>" data-toggle="popover" type="password" placeholder="Your Password" required>
                        <p class="mb-20"><a href="<?php echo link_href("user/register.php"); ?>" class="text-success">Click here</a> to Register</p>
                        <input id="admin-submit" class="btn btn-coral border-0" name="admin-submit" type="submit" value="Submit">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>