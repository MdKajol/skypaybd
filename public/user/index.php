<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php require_admin_login(); ?>
<?php require_once(inc_file("layout/header.php")); ?>

<?php
   $admin = $_SESSION["admin_login"];

?>


   <div class="admin-details">
      <div id="admin-pro" class="main-section" ku-toggle="show">
         <form action="" id="profile-form" method="post" enctype="multipart/form-data">
            <div class="user-profile-photo">
               <div class="pro-img">
                  <label for="File" id="pro-label">
                     <input type="file" id="File">
                     <img src="<?php echo link_img("logo/logo2.png"); ?>" alt="user-img">
                  </label>
               </div>
            </div>
         </form>
         <div class="user-details">
            <div class="single-label"><label class="user-label">Admin Id</label><span class="user-label-data"><?php echo $admin["admin_id"]; ?></span></div>
            <div class="single-label"><label class="user-label">Admin Email</label><span class="user-label-data"><?php echo $admin["admin_email"]; ?></span></div>
            <div class="single-label"><label class="user-label">Admin Status</label><span class="user-label-data"><?php echo $admin["admin_status"]; ?></span></div>
            <div class="single-label"><label class="user-label">Admin Account</label><span class="user-label-data"><?php echo $admin["admin_activated"]; ?></span></div>
            <div class="single-label"><label class="user-label">Admin Last Login</label><span class="user-label-data"><?php echo $admin["admin_last_login"]; ?></span></div>
         </div>
         <div class="gray-style logout"><a href="<?php echo link_href("admin/logout.php"); ?>">logout</a></div>
      </div>
   </div>
   <div id="admin-pro-hide" class="gray-style pro-hide"><a href="">hide</a></div>





<?php require_once(inc_file("layout/footer.php")); ?>

