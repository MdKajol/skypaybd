<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
	      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" href="<?php echo link_img('favicon.ico') ?>" type="image/x-icon"/>
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
<!--            <img src="--><?php //echo link_img(""); ?><!--" alt="SkyPayBd">-->
            <h1>SkyPayBD</h1>
         </a>

      </div>
      <div class="olympia-menu flex-item">
         <nav class="olympia-nav">
            <ul class="flex-container">
               <li class="flex-item"><a href="<?php echo $link = link_href(); ?>" class="<?php active_page($link); ?>" >Home</a></li>
               <li class="flex-item">
                  <a href="<?php echo $link = link_href("user/signin.php"); ?>" class="<?php active_page($link); ?>">Sign in</a>
                  <!--<ul class="dropdown">
                     <li><a href="<?php /*echo $link = link_href("user/signin.php"); */?>" class="<?php /*active_page($link); */?>">Basic User</a></li>
                  </ul>-->
               </li>
               <li class="flex-item"><a href="<?php echo $link = link_href("user/register.php"); ?>" class="<?php active_page($link); ?>">Sign up</a></li>
            </ul>
         </nav>
      </div>
   </header>
	<!-- header end -->

