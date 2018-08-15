<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php require_user_login(); ?>

<?php $user = $_SESSION["user_login"]; ?>
<?php require_once(inc_file("layout/dashboard-header.php")); ?>

<?php require_once(inc_file("layout/user/user-controll.php")); ?>
<?php require_once(inc_file("layout/user/left-menu.php")); ?>

<div class="dashboard-content-area menu-left-gap">
	<div class="container">
      <div class="row">
         <div class="col-md-6">Half</div>
         <div class="col-md-6">Half</div>
      </div>
   </div>
</div>
<?php require_once(inc_file("layout/dashboard-footer.php")); ?>

