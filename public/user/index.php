<?php require_once("{$_SERVER["DOCUMENT_ROOT"]}/private/init.php"); ?>
<?php require_user_login(); ?>

<?php $user = $_SESSION["user_login"]; ?>
<?php require_once(inc_file("layout/dashboard-header.php")); ?>

<?php require_once(inc_file("layout/user/user-controll.php")); ?>
<?php require_once(inc_file("layout/user/left-menu.php")); ?>

<div class="dashboard-content-area menu-left-gap">

   <div class="container">
      <div class="row">
         <div class="col-md-12">
            <div class="card">
               <div class="card-body">
                  <h5 class="card-subtitle">Title One</h5>
                  <div class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad alias animi dolore eaque facere ipsum iste nam neque nisi obcaecati odit, perferendis placeat quos repudiandae saepe tempore temporibus vitae voluptas.</div>
               </div>

               <div class="card-body">
                  <h5 class="card-subtitle">Title One</h5>
                  <div class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad alias animi dolore eaque facere ipsum iste nam neque nisi obcaecati odit, perferendis placeat quos repudiandae saepe tempore temporibus vitae voluptas.</div>
               </div>

            </div>
         </div>
      </div>
   </div>
</div>
<?php require_once(inc_file("layout/dashboard-footer.php")); ?>

