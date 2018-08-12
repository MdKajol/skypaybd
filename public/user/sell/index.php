<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php require_user_login(); ?>

<?php $user = $_SESSION["user_login"]; ?>
<?php require_once(inc_file("layout/header.php")); ?>


<?php require_once(inc_file("layout/user/user-controll.php")); ?>
<?php require_once(inc_file("layout/user/left-menu.php")); ?>

<div class="dashboard-content-area menu-left-gap">

   <div class="buying-dollar-form">
	   <?php require_once(inc_file("layout/user/sell/registration-form.php")); ?>
   </div>
</div>
<?php require_once(inc_file("layout/dashboard-footer.php")); ?>

