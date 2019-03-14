
<!-- Profile section -->

<section class="profile-sec">
  <div class="container-fluid">
    <div class="row">
      <?php $this->load->view('profile/sidebar'); ?>
      <div class="col-lg-9">
        <div class="profile-form-field">
          <div class="row">
            <div class="col-lg-12 mb-3">
              <div class="field-area">
                <p>Hello <?php echo $res_user['name']; ?> (if not <?php echo $res_user['name']; ?>? <a class="red-color" href="<?php echo base_url("users/logout"); ?>">Log out</a>)</p>
                <p>We do not sell or share your details without your permission. Find out more in our <a href="<?php echo base_url("cms/index/privacy-policy"); ?>" class="red-color">Privacy Policy</a>.</p>
                <!-- <a class="more-btn d-table red-bg" href="#"><i class="far fa-user"></i> View Profile</a> --> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Profile section close --> 