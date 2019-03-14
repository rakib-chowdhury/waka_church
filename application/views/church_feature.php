<style type="text/css">
  .fa-window-close:hover{
    color: #fff !important;
    transition: 0.2s;
    cursor: pointer;
    background-color:#a20000; 
    border:1px solid #a20000 !important;
  }
</style>
<?php 
// echo "<pre>"; print_r($row_church_random1); die(); 
?>
<section class="all-members">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="heading-common text-center work-heading">
          <h2>Follow <span> Church, Choir, Bands </span></h2>
          <p class="nu">Discover and follow church, Choir and Bands.</p>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="members">
          <div id="owl-demo3">
            <?php foreach($get_random_listing as $church_random1){ ?>
              <div class="col-lg-12 " style="padding-bottom: 10px;">
                <div class="each-members text-center threed">
                  <i class="fa fa-window-close" style="float: right; color: #a40808"></i>
                  <a href="<?php echo base_url("users/profile_view/").$church_random1['listings_id']; ?>">
                      <?php if($church_random1['thumbnail']) { ?><img src="<?php echo $church_random1['thumbnail']; ?>" class="rounded-circle mx-auto d-table" alt="" style="min-height: 160px !important">
                      <?php }else{?>
                      <img src="<?php echo base_url(); ?>/front_assets/images/user.png" class="rounded-circle mx-auto d-table" alt="" style="min-height: 160px !important">
                      <?php }?></a>
                  <a href="<?php echo base_url("users/profile_view/").$church_random1['listings_id']; ?>">
                  <h3 class="py-3" style="margin: 0;padding-bottom: 0 !important;"><a href="#" style="color: #a40808 !important;"><?php echo $church_random1['name']; ?></h3></a>
                  <!-- <a href="<?php echo base_url("users/profile_view/").$church_random1['user_id']; ?>">
                  <h3 class="py-3" style="margin: 0;padding-bottom: 0 !important;font-weight: 400"><a href="#" style="color: #a40808 !important;">State address of the church/choir/bands</h3></a> -->
                  <hr>
                    <a href="#" class="btn btn-info more-btn" style="color: #fff; background-color: #a40808; width: 50%; border:none;"><i class="fa fa-user-plus"></i> Follow</a><a href="#" class="btn btn-info more-btn" style="color: #fff; background-color: #a40808; width: 50%; border:none;"><i class="fa fa-thumbs-up"></i> 8.5k</a>
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>