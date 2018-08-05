<?php
session_start();
function clearMsg() {
	if( isset($_SESSION["message"]) && $_SESSION["message"] != "") {
		unset($_SESSION["message"]);
	}
}
function showMsg($class = "") {
	$output = "";
	if(isset($_SESSION["message"]) && $_SESSION["message"] != "") {
		$output .= "<div class=\"message {$class}\" >";
		$output .= $_SESSION["message"];
		$output .= "</div>";
		clearMsg();
	}
	return $output;
}



?>
