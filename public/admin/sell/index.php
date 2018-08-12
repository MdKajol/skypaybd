<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php require_admin_login(); ?>

<?php $admin = $_SESSION["admin_login"]; ?>
<?php require_once(inc_file("layout/header.php")); ?>

<?php require_once(inc_file("layout/admin/user-controll.php")); ?>
<?php require_once(inc_file("layout/admin/left-menu.php")); ?>



<div class="dashboard-content-area menu-left-gap">

	<div class="container">
		<div class="row">
			<div class="col-md-12">
				working.... all sell request
			</div>
		</div>
	</div>
</div>

<?php require_once(inc_file("layout/dashboard-footer.php")); ?>
