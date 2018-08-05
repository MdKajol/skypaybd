<?php

$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

if($db->connect_error) {
	die("cannot connect to database");
}

function es($string) {
	global $db;
	return $db->escape_string($string);
}

function find_admin_by_email($email) {
	global $db;
	$sql = "SELECT * FROM admin";
	$sql .= " WHERE admin_email = '" . es($email) ."'";
	$sql .= " LIMIT 1";

	$result = $db->query($sql);

	if($result->num_rows) {
		$row = $result->fetch_assoc();
		return $row;
	}
	return false;
}

function find_user_by_email($email) {
	global $db;
	$sql = "SELECT * FROM sky_user";
	$sql .= " WHERE user_email = '" . es($email) ."'";
	$sql .= " LIMIT 1";

	$result = $db->query($sql);

	if($result->num_rows) {
		$row = $result->fetch_assoc();
		return $row;
	}
	return false;
}

function db_insert($tbl, $col, $val) {
	if( empty($col) && empty($val) && (count($col) !== count($val)) ) { return false; }

	global $db;
	$sql = "";
	$col = join(",", $col);
	$val = ins_val($val);
	$sql .= "INSERT INTO $tbl ($col) VALUES ($val)";
	$result = $db->query($sql);
	return $result;
}

function ins_val($arr) {
	$string_val = join(",", array_left_right_concant_string($arr, "'"));
	return $string_val;
}



function check_password($password, $hash_password) {
	return password_verify($password, $hash_password);
}

