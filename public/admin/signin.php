<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php ob_start(); ?>
<?php admin_access_deny(); ?>
<?php user_access_deny(); ?>

<?php require_once(inc_file("layout/header.php")); ?>

<!-- home fullscreen video start -->
<?php require_once(inc_file("layout/admin/signin-form.php")); ?>
<!-- home fullscreen video end -->


<?php require_once(inc_file("layout/footer.php")); ?>
<?php ob_end_flush(); ?>
