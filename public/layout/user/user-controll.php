<div class="user-control">
	<div id="left-menu-hide" class="gray-style pro-hide"><a href="" class="active"><i class="icofont icofont-navigation-menu"></i></a></div>
	<div id="admin-pro-hide" class="gray-style pro-hide"><a href="" class=""><i class="icofont icofont-settings"></i></a></div>
	<div class="admin-details">
		<div id="admin-pro" class="main-section" ku-toggle="hide">
			<form action="" id="profile-form" method="post" enctype="multipart/form-data">
				<div class="user-profile-photo">
					<div class="pro-img">
						<label for="profilePhoto" id="pro-label">
							<input type="file" id="profilePhoto" name="profile-photo" onchange="uploadFile();">
                         <?php
                           $exts = array('bmp','png','jpg','jpeg', 'gif');
                           $file_exits = false;
                           foreach($exts as $ext) {
                              $profile_path = ABSPATH . "/public/assets/img/upload/user_". $user['user_id'] . "." . $ext;
                              if(file_exists($profile_path)){
                                 $path = link_img("upload/user_") .$user['user_id'] . "." . $ext;
                                 $file_exits = true;
                                 break;
                              } else {
                                 $path = link_img("user.png");
                              }
                           }
                         ?>
                        <img id="profilePic" src="<?php echo $path ?>" alt="user-img">
                        <div id="sizeStatus"></div>
                        <div class="refresh" onclick="return window.location.reload();">
                           <i class="icofont icofont-refresh"></i>
                        </div>
						</label>
                  <div class="progress skyProgress">
                     <div id="skyProBar" class="progress-bar bg-success" role="progressbar" style="width: 0%" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
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

<script>
   var progressbar = getById("skyProBar");
   var sizeStatus = getById("sizeStatus");
   var profilePic = getById("profilePic");
   var persent;
   function getById(ele) {
      return document.getElementById(ele);
   }
   function uploadFile() {

      // get my uploaded file
      var profilePhoto = getById("profilePhoto").files[0];

      // sent uploaded file data with form data object
      var formData = new FormData();
      formData.append("profilePhoto", profilePhoto);

      // ajax request for upload form data
      var ajax = new XMLHttpRequest();

      // upload progress - not for ajax progress
      ajax.upload.addEventListener("progress", progressHandler, false);

      // ajax compeleted
      ajax.addEventListener("load", completeHandler, false);

      // ajax error
      ajax.addEventListener("error", errorHandler, false);

      // ajax abort
      ajax.addEventListener("abort", abortHandler, false);

      // ajax open
      ajax.open("POST", "<?php echo link_href('upload_parser.php'); ?>");

      // ajax send data
      ajax.send(formData);
   }

   function progressHandler(e) {
      persent = Math.round((e.loaded / e.total) * 100);
      var total_byte = e.total;
      var loaded_byte = e.loaded;
      var total_kb = Math.round(0.001 * total_byte);
      var loaded_kb = Math.round(0.001 * loaded_byte);
      var total_mb = Math.round(0.001 * total_kb);
      var loaded_md = Math.round(0.001 * loaded_kb);
      console.log("loaded: ", e.loaded);
      console.log("Total: ", e.total);
      console.log("Persent: ", persent);

      progressbar.style.width = persent + "%";
      sizeStatus.style.display = "flex";
//      sizeStatus.innerHTML = "<div>" + loaded_kb + "kb/ " + total_kb +"kb</div><div>uploading...</div>";
      sizeStatus.innerHTML = "<div>" + persent +"%</div></div><div>uploading...</div>";
   }

   function completeHandler(e) {
      var res = JSON.parse(e.target.responseText);
      if(res.errors) {
         sizeStatus.innerHTML = "<div>upload failed</div>";
      } else {
         sizeStatus.innerHTML = "<div>" + persent +"%</div></div><div>compeleted</div>";
         $(".refresh").css("display", "flex");
         $("#pro-label").attr("for", "");
      }
      console.log(res);
   }

   function errorHandler(e) {

   }

   function abortHandler(e) {

   }
</script>