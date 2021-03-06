<?php
function redirect_to($location = '') {
	header("Location: ". $location);
	exit;
}
function home() {
	redirect_to("/");
}

function inc_file($path = '') {
	return trim(ABSPATH. "/public/{$path}");
}
function link_href($path = '') {
	if(empty($path)) {
		return trim(DOMAIN_PATH);
	}
	return trim(DOMAIN_PATH. "/{$path}");
}
function link_assets($path = '') {
	return trim(DOMAIN_PATH. "/public/assets/{$path}");
}
function link_css($path = '') {
	return trim(DOMAIN_PATH. "/public/assets/css/{$path}");
}
function link_img($path = '') {
	return trim(DOMAIN_PATH. "/public/assets/img/{$path}");
}
function link_script($path = '') {
	return trim(DOMAIN_PATH. "/public/assets/js/{$path}");
}
function active_page($page_name, $class_name = 'current_page') {
	$current_page = str_replace("/public/", "", $_SERVER["PHP_SELF"]);
	if($page_name === "index.php" || $page_name === "http://skypaybd.div") {
		echo $class_name;
		return false;
	} else {
		$page_name = str_replace("http://skypaybd.div/", "", $page_name);
	}
	if($current_page == $page_name) {
		echo $class_name;
	} else {
		return;
	}
}

function is_post_request() {
	return $_SERVER["REQUEST_METHOD"] == "POST";
}


function is_admin_login() {
	if(isset($_SESSION["admin_login"]) && count($_SESSION["admin_login"]) > 0) {
		return true;
	}
	return false;
}

function is_user_login() {
	if(isset($_SESSION["user_login"]) && count($_SESSION["user_login"]) > 0) {
		return true;
	}
	return false;
}

function require_admin_login() {
	if(!is_admin_login()) {
		redirect_to(link_href("admin/signin.php"));
	}
}
function require_user_login() {
	if(!is_user_login()) {
		redirect_to(link_href("user/signin.php"));
	}
}

function admin_access_deny() {
	if(is_admin_login()) {
		redirect_to(link_href("admin/index.php"));
	}
}
function user_access_deny() {
	if(is_user_login()) {
		redirect_to(link_href("user/index.php"));
	}
}

function login_admin($admin) {
	session_regenerate_id();
	$_SESSION["admin_login"]["admin_id"] = $admin["admin_id"];
	$_SESSION["admin_login"]["admin_email"] = $admin["admin_email"];
	$_SESSION["admin_login"]["admin_activated"] = $admin["admin_activated"];
	$_SESSION["admin_login"]["admin_status"] = $admin["admin_status"];
	$_SESSION["admin_login"]["admin_last_login"] = time();
	return true;
}

function login_user($usre) {
	session_regenerate_id();
	$_SESSION["user_login"]["user_id"] = $usre["user_id"];
	$_SESSION["user_login"]["user_full_name"] = $usre["user_full_name"];
	$_SESSION["user_login"]["user_email"] = $usre["user_email"];
	$_SESSION["user_login"]["user_activation_status"] = $usre["user_activation_status"];
	$_SESSION["user_login"]["user_phone"] = $usre["user_phone"];
	$_SESSION["user_login"]["user_last_login"] = time();
	return true;
}


function logout_admin() {
	unset($_SESSION["admin_login"]);
	redirect_to(link_href("admin/signin.php"));
	return true;
}

function logout_user() {
	unset($_SESSION["user_login"]);
	redirect_to(link_href("user/signin.php"));
	return true;
}


// validation function
function checkGoogleCaptcha($secretKey, $response, $user_ip = null) {
	if($user_ip) {
		$remote_ip = "&remoteip=". $user_ip;
	} else {
		$remote_ip = "";
	}
	$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretKey&response=$response" . $remote_ip;
	$google_response = file_get_contents($url);
	$google_response = json_decode($google_response);
	$google_response = $google_response->success;
	return $google_response;
}

function h($string) {
	return htmlentities($string);
}

function array_left_right_concant_string($arr, $concat) {
	$concat_array = [];
	foreach ($arr as $value) {
		$concat_array[] = "{$concat}{$value}{$concat}";
	}
	return $concat_array;
}

function showError($class = "") {
	global $errors;
	$output = "";
	if(isset($errors) && count($errors) > 0) {
		$output .= "<div class=\"error {$class}\" >";
		$output .= formatError($errors);
		$output .= "</div>";
	}
	return $output;
}
function formatError($errors) {
	if(isset($errors) && count($errors) > 0) {
		$output = "";
		$output .= "<ul>";
		foreach ( $errors as $error ) {
			$output .= "<li>" . $error . "</li>";
		}
		$output .= "</ul>";
		return $output;
	}
}

function generateRandomString() {
	$length = rand(6, 15);
	$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$charactersLength = strlen($characters);
	$randomString = '';
	for ($i = 0; $i < $length; $i++) {
		$randomString .= $characters[rand(0, $charactersLength - 1)];
	}
	return $randomString;
}

function update_user_status($user_id, $user_email) {
	global $db;
	if(!isset($user_id) || !isset($user_email)) { return false; }
	$sql = "UPDATE sky_user SET ";
	$sql .= "user_activation_status='active' ";
	$sql .= "WHERE user_id = '". es($user_id) ."' AND user_email = '". es($user_email) ."' ";
	$sql .= "LIMIT 1";

	$update = $db->query($sql);
	if($db->affected_rows > 0) {
		return true;
	}
}

function clear_user_activation($user_id, $user_email) {
	global $db;
	if(!isset($user_id) || !isset($user_email)) { return false; }
	$sql = "UPDATE sky_user SET ";
	$sql .= "user_activation_key=null, ";
	$sql .= "user_activation_expire=null ";
	$sql .= "WHERE user_id = '". es($user_id) ."' AND user_email = '". es($user_email) ."' ";
	$sql .= "LIMIT 1";

	$update = $db->query($sql);
	if($db->affected_rows > 0) {
		return true;
	} else {
		echo $db->error;
	}
}

function update_user_activation($user_id, $user_email, $activation_key, $activation_exp) {
	global $db;
	if(!isset($user_id) || !isset($user_email)) { return false; }
	$sql = "UPDATE sky_user SET ";
	$sql .= "user_activation_key='". $activation_key ."', ";
	$sql .= "user_activation_expire='". $activation_exp ."' ";
	$sql .= "WHERE user_id = '". es($user_id) ."' AND user_email = '". es($user_email) ."' ";
	$sql .= "LIMIT 1";

	$update = $db->query($sql);
	if($db->affected_rows > 0) {
		return true;
	} else {
		echo $db->error;
	}
}

function is_dashboard() {
	if( isset($_SESSION["admin_login"]) || isset($_SESSION["user_login"]) ) {
		return true;
	}
}