<?php
	if(!defined('ABSPATH')) { define("ABSPATH", "{$_SERVER["DOCUMENT_ROOT"]}"); }
	if(!defined('DOMAIN_PATH')) { define("DOMAIN_PATH", $_SERVER["REQUEST_SCHEME"] . "://" . "{$_SERVER["HTTP_HOST"]}"); }
	if(!defined("DB_HOST")) { define("DB_HOST", "localhost"); }
	if(!defined("DB_USER")) { define("DB_USER", "root"); }
	if(!defined("DB_PASS")) { define("DB_PASS", "1234"); }
	if(!defined("DB_NAME")) { define( "DB_NAME", "skypwmcx_ku_db" ); }

	$google_secretKey = "6LfLYWgUAAAAAPjHS2gj4lPV1PR-chmdT2LM90LD";
	$errors = [];
?>