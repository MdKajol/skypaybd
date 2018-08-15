<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php
	$up_error = [];
	$file_name = $_FILES["profilePhoto"]["name"];
	$file_ext = pathinfo($file_name, PATHINFO_EXTENSION);
	$file_size = $_FILES["profilePhoto"]["size"];
	$file_type = $_FILES["profilePhoto"]["type"];
	$file_temp_name = $_FILES['profilePhoto']['tmp_name'];
	$file_allowed_type = ['image/gif', 'image/png', 'image/jpeg', 'image/bmp', 'image/webp'];

	// validate file
	// check file size
	if($file_size > 1e+6) {
		$up_error['errors']['size'] = "Please upload less then 1M file";
	}
	// check file correct type
	if(!in_array($file_type, $file_allowed_type)) {
		$up_error['errors']["type"] = "Invalid file type";
	}

	// check if there is any errors
	if(!$up_error && $_FILES["profilePhoto"]["error"] === 0) {
		// no errors found
		// process the upload file
		if(isset($_SESSION['user_login']['user_id'])) {
			$id = "user_" . $_SESSION['user_login']['user_id'];
		} else if(isset($_SESSION['admin_login']['admin_id'])) {
			$id = "admin_" . $_SESSION['admin_login']['admin_id'];
		} else {
			$id = $file_name;
		}
		if(move_uploaded_file($file_temp_name, ABSPATH ."/public/assets/img/upload/{$id}.{$file_ext}")) {
			$success["success"] = "upload successful";
			$success["path"] = link_img("upload/{$id}.{$file_ext}");
			echo json_encode($success);
		} else {
			$up_error["errors"]["fails"] = "upload failed";
			echo json_encode($up_error);
		}
	} else {
		// errors happens
		echo json_encode($up_error);
	}


?>