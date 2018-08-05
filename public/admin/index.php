<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php require_admin_login(); ?>
<?php $admin = $_SESSION["admin_login"]; ?>
<?php require_once(inc_file("layout/header.php")); ?>
<style>
   .left-menu {
      max-width: 270px;
      background: cornsilk;
      position: absolute;
      top: 72px;
      height: 100%;
      padding: 10px 0px;
      box-sizing: border-box;
      overflow-y: scroll;
   }
   .left-menu > ul{
      margin: initial;
      padding: initial;
   }
   .left-menu > ul > li{
      padding: 15px 10px;
      box-shadow: 0 -5px 9px #e8e2c9;
   }
   .left-menu > ul > li:last-child {
      border: 0px;
   }
   .left-menu > ul > li{}
   .left-menu > ul > li > a > i:before{}
   .dropdown{
      margin: 20px; background: #fff;
      display: none;
   }
   ul.dropdown > li{}
   ul.dropdown > li a {}
   footer {
      margin-left: 270px;
      max-width: 100%;

   }
   .main-content {
      margin-left: 270px;
      padding-left: 20px;
   }
</style>
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
   <div id="admin-pro-hide" class="gray-style pro-hide"><a href="" class="active"><i class="icofont icofont-settings"></i></a></div>

   <div class="left-menu">
      <ul>
         <li><a href=""><i class="icofont icofont-settings">Menu One Menu Two Menu Three</i></a>
            <ul class="dropdown">
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
            </ul>
         </li>
         <li><a href=""><i class="icofont icofont-settings">Menu One Menu Two Menu Three</a></i></li>
         <li><a href=""><i class="icofont icofont-settings">Menu One Menu Two Menu Three</a></i></li>
         <li><a href=""><i class="icofont icofont-settings">Menu One Menu Two Menu Three</a></i></li>
         <li><a href=""><i class="icofont icofont-settings">Menu One Menu Two Menu Three</a></i></li>
         <li><a href=""><i class="icofont icofont-settings">Menu One Menu Two Menu Three</a></i>
            <ul class="dropdown">
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
               <li><a href=""><i class="icofont icofont-settings">Drop Down Menu one two three</i></a></li>
            </ul>
         </li>
      </ul>
   </div>

   <div class="main-content">
      Lorem ipsum dolor sit amet, consectetur adipisicing elit. Asperiores cum dicta, dignissimos dolore ducimus ex laboriosam neque optio repellat sapiente tempora tenetur totam. Ad atque distinctio, odit repellendus ut voluptatibus.
   </div>
<?php require_once(inc_file("layout/footer.php")); ?>

