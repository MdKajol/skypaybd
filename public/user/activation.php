<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php
	// find the user form the url
	if(isset($_GET["mail"]) && isset($_GET["key"])) {
		$user_email = urldecode(es($_GET["mail"]));
		$activation_key = urldecode($_GET["key"]);
		$current_time = time();
		// find user if exits
		$user = find_user_by_email($user_email);
		if($user) {
			// check user activation status
			$user_id = $user["user_id"];
			$user_full_name  = $user["user_full_name"];
			$user_email = $user["user_email"];
			$user_activation_status = $user["user_activation_status"];
			$user_activation_expire = (int) $user["user_activation_expire"];
			$user_activation_key = $user["user_activation_key"];

			if(!$user_activation_status) {
				// check for link expiration
				if( ($user_activation_expire > $current_time) ) {
					// i will update user user status
					// clear out all the activation_key and activation_exprire
					if(($user_activation_key === $activation_key)) {
						$updated = update_user_status($user_id, $user_email);
						if($updated) {
							$cleared = clear_user_activation($user_id, $user_email);
							if($cleared) {echo "user has been activated please <a href='". link_href("user/signin.php")."'>signin</a>"; }
						}
					} else {
						echo "invalid link";
					}
				} else {
					$user_activation_expire = (time() +  60 * 5);
					$user_activation_key = generateRandomString();
					update_user_activation($user_id, $user_email, $user_activation_key, $user_activation_expire);
					$message = "click here to active your account: " . DOMAIN_PATH . "/user/activation.php?mail=" . urlencode($user_email) . "&key=" . urlencode($user_activation_key);
					$sent = phpMailer(array(
						"from" => ["email" => "test@skypaybd.org", "name" => "Sky Pay BD"],
						"to" => ["email" => $user_email, "name" => $user_full_name],
						"subject" => "Account Verification",
						"body" => $message
					));
					if($sent) {
						echo "link exprire a new mail has been send to your. please check your inbox or spam to active your account";
					} else {
						exit("some problem encounter");
					}
				}
			} else {
				echo "you are already activated please <a href='". link_href("user/signin.php") ."'>signin</a>";
			}
		} else {
			echo "not register";
		}
	}

?>