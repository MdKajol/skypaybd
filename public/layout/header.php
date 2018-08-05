<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="<?php echo link_css("bootstrap.min.css"); ?>">
	<link rel="stylesheet" href="<?php echo link_css("slick.css"); ?>">
	<link rel="stylesheet" href="<?php echo link_css("pe-icon-7-stroke.css"); ?>">
	<link rel="stylesheet" href="<?php echo link_css("icofont.css"); ?>">
	<link rel="stylesheet" href="<?php echo link_css("sinam.css"); ?>">
	<link rel="stylesheet" href="<?php echo link_css("default.css"); ?>">
	<link rel="stylesheet" href="<?php echo link_css("style.css"); ?>">
	<title>Skypaybd - admin</title>
</head>
<body>

	<!-- header start -->
	<header class="header flex-container">
		<div class="olympia-logo flex-item">
			<a href="<?php echo link_href(); ?>">
				<img src="<?php echo link_img("logo/logo.png"); ?>" alt="">
			</a>
		</div>
		<div class="olympia-menu flex-item">
			<nav class="olympia-nav">
				<ul class="flex-container">
					<li class="flex-item"><a href="<?php echo link_href(); ?>" class="<?php active_page("index.php"); ?>" >Home</a></li>
					<li class="flex-item"><a href="<?php echo link_href("pages/olympia_betting.php"); ?>" class="<?php active_page("olympia_betting.php"); ?>">OLYMPIA BETTING</a></li>
					<li class="flex-item">
						<a href="#">GUADAGNI | REGISTRATI</a>
						<ul class="dropdown">
							<li><a href="#">GUADAGNI OLYMPIA SYSTEM (profit link)</a></li>
							<li><a href="#">GUADAGNI OLYMPIA BETTING (profit link)</a></li>
						</ul>
					</li>
					<li class="flex-item"><a href="#">ACCEDI</a></li>
				</ul>
			</nav>
		</div>
	</header>
	<!-- header end -->
