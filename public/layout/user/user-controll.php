<div class="user-control">
	<div id="admin-pro-hide" class="gray-style pro-hide"><a href="" class=""><i class="icofont icofont-settings"></i></a></div>
	<div class="admin-details">
		<div id="admin-pro" class="main-section" ku-toggle="hide">
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
				<div class="single-label"><label class="user-label">User Full Name</label><span class="user-label-data"><?php echo $user["user_full_name"]; ?></span></div>
				<div class="single-label"><label class="user-label">User Email</label><span class="user-label-data"><?php echo $user["user_email"]; ?></span></div>
				<div class="single-label"><label class="user-label">User Status</label><span class="user-label-data"><?php echo $user["user_activation_status"]; ?></span></div>
				<div class="single-label"><label class="user-label">User Phone</label><span class="user-label-data"><?php echo $user["user_phone"]; ?></span></div>
				<div class="single-label"><label class="user-label">User Last Login</label><span class="user-label-data"><?php echo date("g:i:s A", $user["user_last_login"]); ?></span></div>
			</div>
			<div class="gray-style logout"><a href="<?php echo link_href("user/logout.php"); ?>">logout</a></div>
		</div>
	</div>
</div>