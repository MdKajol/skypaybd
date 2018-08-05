<?php
   $user_full_name = "";
   $user_email = "";
   $user_password = "";
   $user_confirm_pass = "";
   $user_phone = "";


   if(is_post_request()) {
      $user_full_name = es( $_POST["user_full_name"] );
      $user_email = es( $_POST["user_email"] );
      $user_password = es( $_POST["user_password"] );
      $user_confirm_pass = es( $_POST["user_confirm_pass"] );
      $user_phone = es( $_POST["user_phone"] );
      $captcha_input = checkGoogleCaptcha( $google_secretKey, $_POST["g-recaptcha-response"]);
	   $user_password_hash = password_hash($user_password, PASSWORD_BCRYPT);
	   $user_activation_key = generateRandomString();
	   $user_activation_expire = (time() +  60 * 5);

      // validate user data
      if(is_blank($user_full_name)) {
		   $errors[] = "User full name cannot be blank";
      }
	   if(is_blank($user_email)) {
		   $errors[] = "Email cannot be blank";
	   }
	   if(is_blank($user_password)) {
		   $errors[] = "Password cannot be blank";
	   }
	   if(is_blank($user_confirm_pass)) {
		   $errors[] = "Confirm cannot be blank";
	   }
	   if(is_blank($user_phone)) {
		   $errors[] = "Phone cannot be blank";
	   }
	   if($captcha_input === false) {
	      $errors[] = "Please validate the captcha";
      }
      if(has_length_less_than($user_password, 6)) {
         $errors[] = "Password is too small";
      }
      if(!same_value($user_password, $user_confirm_pass)) {
	      $errors[] = "Password doesn't match";
      }
      if(!has_valid_email_format($user_email)) {
	      $errors[] = "plsease enter a valid Email";
      }
      $user_email_exits = find_user_by_email($user_email);
	   if($user_email_exits) {
	      $errors[] = "Email already exits";
      }
      if(!has_valid_phone_format($user_phone)) {
	      $errors[] = "Invalid phone number";
      }
      // check validation errors
       if(!$errors) {
	       // validation success insert user data to database
         // insert user in the database
	       $col = ["user_full_name", "user_email", "user_password_hash", "user_phone", "user_activation_key", "user_activation_expire"];
	       $val = [$user_full_name, $user_email, $user_password_hash, $user_phone, $user_activation_key, $user_activation_expire];
	       $user_inserted = db_insert("sky_user", $col, $val);
	       if($user_inserted) {
            $message = "click here to active your account: " . DOMAIN_PATH . "/user/activation.php?mail=" . $user_email . "&key=" . $user_activation_key;

            $sent = phpMailer(array(
               "from" => ["email" => "skypaybd.org", "name" => "Sky Pay BD"],
               "to" => ["email" => $user_email, "name" => $user_full_name],
               "subject" => "Account Verification",
               "body" => $message
            ));
            if($sent) {
               $_SESSION["message"] =  "A mail has been send to " . $user_email . "<br>Please check your inbox or spam";
            }
          }
       }
   }
?>

<section class="home-fullscreen">
   <div class="full-screen-v admin">
      <div class="container">
         <div class="row">
            <div class="col-md-6 offset-md-3 mt-60 mb-60">
               <div class="olympia-form">
                  <div class="showError"></div>
                  <?php echo showMsg("success"); ?>
                  <?php echo showError(); ?>
                  <h2 class="olympia-title-min">Register</h2>
                  <div class="user form-wrapper">
                     <form id="regitration-form" action="" method="POST">
                        <div class="form-group">
                           <label for="">Full name</label>
                           <input id="userFullName" autocomplete="off" value="<?php echo h($user_full_name); ?>"  name="user_full_name" type="text" placeholder="Your Full Name" required>
                        </div>
                        <div class="form-group">
                           <label for="">Email</label>
                           <input id="userEmail" autocomplete="off" value="<?php echo h($user_email); ?>"  name="user_email" type="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                           <label for="">Password</label>
                           <input id="userPassword" autocomplete="off" value="<?php echo h($user_password); ?>" name="user_password"  type="password" placeholder="Your Password" required>
                        </div>
                        <div class="form-group">
                           <label for="">Confirm password</label>
                           <input id="userConfirmPassword" autocomplete="off" value="<?php echo h($user_confirm_pass); ?>" name="user_confirm_pass"  type="password" placeholder="Confirm Password" required>
                        </div>
                        <div class="form-group">
                           <label for="">Phone Number</label>
                           <input id="userPhoneNumber" autocomplete="off" value="<?php echo h($user_phone); ?>"  name="user_phone" type="text" placeholder="Your Phone Number" required>
                        </div>

                        <div class="googleCaptcha">
                           <div class="g-recaptcha" data-sitekey="6LfLYWgUAAAAALqyTqvpqZkXQrmoWH4YldMpcENV"></div>
                        </div>
                        <input id="userSubmit" class="btn btn-coral border-0" name="user_register" type="submit" value="Submit">
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</section>