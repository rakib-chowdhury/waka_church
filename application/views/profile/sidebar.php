<script type="text/javascript">
    $(function () {
        var fileupload = $("#FileUpload1");
        var filePath = $("#spnFilePath");
        var image = $(".imgFileUpload");
        image.click(function () {
            fileupload.click();
        });
        fileupload.change(function () {
            /* var fileName = $(this).val().split('\\')[$(this).val().split('\\').length - 1];
            filePath.html("<b>Selected File: </b>" + fileName); */
			$('#pic_update_form').submit();
        });
    });
</script>
<?php $uri = $_SERVER["PHP_SELF"]; 
$exp_uri = explode("/",$uri);
$last_seg = end($exp_uri);?>
<div class="col-lg-3">
  <div class="profile-show-area"> 
	<div class="row" >
    <?php if($res_user['image']) { ?>
        <img src="<?php echo $res_user['image']; ?>" class="rounded-circle mx-auto d-table" alt="" id="imgFileUpload" style="cursor: pointer" width="100" height="100">
       <?php } else{?>
            <img src="http://www.wakachurch.com/front_assets/images/user.png" class="rounded-circle mx-auto d-table" alt="" style="cursor: pointer" id="imgFileUpload" width="100" height="100">
        <?php }?>
		<i class="fa fa-camera imgFileUpload" aria-hidden="true"></i>
		</div>
	<form action="<?php echo base_url("users/profile_edit"); ?>" method="post" enctype="multipart/form-data" id="pic_update_form">
	<input type="hidden" value="<?php echo $res_user['user_id']; ?>" name="user_id">
	<input type="hidden" name="profile_picture_submit" value="true" />
	<input type="file" name="profile_image" id="FileUpload1" accept="image/*" style="display: none" />
	</form>
    <h4 class="my-3 text-center"><?php  echo $res_user['name']; ?></h4>
    <!-- <div class="follow-area">
      <ul>
        <li><span>0</span> <a href="#">Follower</a></li>
        <li><span>0</span> <a href="#">Following</a></li>
        <div class="clearfix"></div>
      </ul>
    </div> -->
    <div class="profile-status">
      <ul>
        <li class="<?php if($last_seg == "users"){echo "active-pro";}else{echo "";} ?>"><i class="fas fa-home"></i> <a href="<?php echo base_url("users"); ?>">Dashboard</a> <span class="float-right"></span></li>
        <li class="<?php if($last_seg == "profile_edit"){echo "active-pro";}else{echo "";} ?>"><i class="far fa-user"></i> <a href="<?php echo base_url("users/profile_edit"); ?>">Profile</a> <span class="float-right"></span></li>
        <li class="<?php if($last_seg == "listings"){echo "active-pro";}else{echo "";} ?>"><i class="fas fa-list-ul"></i> <a href="<?php echo base_url("users/listings"); ?>">Listings</a> <!-- <span class="float-right">1</span> --></li>
        <!-- <li><i class="far fa-envelope"></i> <a href="#">Messages</a> <span class="float-right">1</span></li> -->
        <!-- <li><i class="far fa-heart"></i> <a href="#">Favorites</a> <span class="float-right"></span></li> -->
        <li class="<?php if($last_seg == "events"){echo "active-pro";}else{echo "";} ?>"><i class="fas fa-calendar-alt"></i> <a href="<?php echo base_url("users/events"); ?>">Events</a> <span class="float-right"></span></li>
        <li><i class="fas fa-sign-out-alt"></i> <a href="<?php echo base_url("users/logout") ?>">Logout</a> <span class="float-right"></span></li>
      </ul>
    </div>
  </div>
</div>