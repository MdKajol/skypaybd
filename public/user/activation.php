<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php
	// find the user form the url
	if(isset($_GET["mail"]) && isset($_GET["key"])) {
		$user_email = es($_GET["mail"]);
		$activation_key = $_GET["key"];
		$user = find_user_by_email($user_email);
		$current_time = time();


		if($user) {
			// check user activation status
			$user_id = $user["user_id"];
			$user_email = $user["user_email"];
			$user_activation_status = $user["user_activation_status"];
			$user_activation_expire = (int) $user["user_activation_expire"];
			$user_activation_key = $user["user_activation_key"];
			if(!$user_activation_status) {
				// check for link expiration
				if( ($user_activation_expire > $current_time) && ($user_activation_key === $activation_key) ) {
					// i will update user user status
					// clear out all the activation_key and activation_exprire
					$updated = update_user_status($user_id, $user_email);
					if($updated) {
						$cleared = clear_user_activation($user_id, $user_email);
						if($cleared) {echo "please signin"; }
					}
				} else {
					echo time() + 120;
					echo "link has been expire";
				}
			} else {
				echo "you are already activated please signin";
			}
		}


	}

?>