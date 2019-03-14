<!-- Profile section -->
<section class="profile-sec">
  <div class="container-fluid">
    <div class="row">
      <?php $this->load->view('profile/sidebar'); ?>
      <div class="col-lg-9">
        <div class="profile-form-field">
          <div class="row">
              <form action="<?php echo base_url("users/profile_edit"); ?>" method="post" id="ep_frm" enctype="multipart/form-data">
                  <input type="hidden" value="<?php echo $res_user['user_id']; ?>" name="user_id">
                  <div class="col-lg-12 mb-3">
                      <div class="field-area">
                        <?php if($this->session->flashdata('msg') != ''): ?>
                          <div class="alert alert-success flash-msg alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4> Success!</h4>
                            <?= $this->session->flashdata('msg'); ?> 
                          </div>
                       <?php endif; ?>
                       <?php if($this->session->flashdata('err') != ''): ?>
                          <div class="alert alert-danger flash-msg alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <h4> Error!</h4>
                            <?= $this->session->flashdata('err'); ?> 
                          </div>
                        <?php endif; ?>                       
                        <p class="font-weight-bold"><i class="far fa-user"></i> Basic Info</p>
                          <div class="row">
                                <?php 
                                $name = $res_user['name'];
                                $exp_name = explode(' ',$name);
                                ?>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <input type="text" class="form-control" placeholder="First Name" name="fname" value="<?php if(isset($exp_name[0])){echo $exp_name[0];} ?>" <?php echo !$name_update?'readonly':''; ?>>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Last Name" name="lname" value="<?php if(isset($exp_name[1])){echo $exp_name[1].' ';} ?><?php if(isset($exp_name[2])){echo $exp_name[2];} ?>" <?php echo !$name_update?'readonly':''; ?>>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Email" name="email" value="<?php echo $res_user['email']; ?>" disabled>
                                  </div>
                                </div>
                                <!--div class="col-lg-6">
                                  <div class="form-group">
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="profile_image">
                                      <label class="custom-file-label" for="inputGroupFile01">Profile Picture</label>
                                    </div>
                                  </div>
                                </div-->  
								<div class="col-lg-6">
                                  <div class="form-group">
                                    <?php
                                    $church_query = $this->db->query("select listings_id,name from listings where ministry_options='church' and status = '1'");
                                    $church_row = $church_query->result_array();
                                    ?>
                                    <select class="form-control" name="listings_id[]">
                                    	<option>Select Church</option>
                                      <?php foreach($church_row as $church){ ?>
                                      <option value="<?php echo $church['listings_id']; ?>" <?php //echo (in_array($church['listings_id'],$listings))?'selected':''; ?>><?php echo $church['name']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <?php
                                    $choir_query = $this->db->query("select listings_id,name from listings where ministry_options='choir' and status = '1'");
                                    $choir_row = $choir_query->result_array();
                                    ?>
                                    <select class="form-control" name="listings_id[]">
                                    	<option>Select Choir</option>
                                      <?php foreach($choir_row as $choir){ ?>
                                      <option value="<?php echo $choir['listings_id']; ?>" <?php //echo (in_array($choir['listings_id'],$listings))?'selected':''; ?>><?php echo $choir['name']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
                                    <?php
                                    $band_query = $this->db->query("select listings_id,name from listings where ministry_options='band' and status = '1'");
                                    $band_row = $band_query->result_array();
                                    ?>
                                    <select class="form-control" name="listings_id[]">
                                    	<option>Select Band</option>
                                      <?php foreach($band_row as $band){ ?>
                                      <option value="<?php echo $band['listings_id']; ?>" <?php //echo (in_array($band['listings_id'],$listings))?'selected':''; ?>><?php echo $band['name']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Address</label>
                                    <textarea name="address" cols="10" rows="2" class="form-control" placeholder="Address"><?php echo $res_user['address']; ?></textarea>
                                  </div>
                                </div>
                                <div class="col-lg-6 d-none">
                                  <div class="form-group">
                                    <input type="text" class="form-control" placeholder="City" name="city" value="<?php echo $res_user['city']; ?>">
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
									<select name="country" id="country" class="form-control">
										<option value="">Select Country</option>
										<option value="Nigeria" <?php echo ($res_user['country']=='Nigeria') ?>>Nigeria</option>
									</select>
                                  </div>
                                </div>
                                <div class="col-lg-6">
                                  <div class="form-group">
									<select class="form-control" name="state" id="state">
									  <option value="">Select State</option>
									  <option value="lagos">Lagos</option>
									  <option value="abuja">Abuja</option>
									  <option value="abia">Abia</option>
									  <option value="adamawa">Adamawa</option>
									  <option value="akwa ibom">Akwa Ibom</option>
									  <option value="anambra">Anambra</option>
									  <option value="bauchi">Bauchi</option>
									  <option value="bayelsa">Bayelsa</option>
									  <option value="benue">Benue</option>
									  <option value="borno">Borno</option>
									  <option value="cross river">Cross River</option>
									  <option value="delta">Delta</option>
									  <option value="ebonyi">Ebonyi</option>
									  <option value="enugu">Enugu</option>
									  <option value="edo">Edo</option>
									  <option value="ekiti">Ekiti</option>
									  <option value="gombe">Gombe</option>
									  <option value="imo">Imo</option>
									  <option value="jigawa">Jigawa</option>
									  <option value="kaduna">Kaduna</option>
									  <option value="kano">Kano</option>
									  <option value="kastina">Kastina</option>
									  <option value="kebbi">Kebbi</option>
									  <option value="kogi">Kogi</option>
									  <option value="kwara">Kwara</option>
									  <option value="nasarawa">Nasarawa</option>
									  <option value="niger" >Niger</option>
									  <option value="ogun">Ogun</option>
									  <option value="ondo">Ondo</option>
									  <option value="osun">Osun</option>
									  <option value="oyo">Oyo</option>
									  <option value="plateau">Plateau</option>
									  <option value="rivers">Rivers</option>
									  <option value="sokoto">Sokoto</option>
									  <option value="taraba">Taraba</option>
									  <option value="yobe">Yobe</option>
									  <option value="zamfara">Zamfara</option>   
									</select>
                                  </div>
                                </div> 
                                <div class="col-lg-6" style="display:none">
                                  <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Postcode" name="postcode" value="<?php echo $res_user['postcode']; ?>">
                                  </div>
                                </div>                                       
                          </div>
                      </div>
                  </div>
                  <div class="col-lg-12 mb-3">
                    <div class="field-area">
                      <p class="font-weight-bold"><i class="fas fa-user-plus"></i> Follow &amp; Contact</p>
                        <div class="row">
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Phone" name="phone_number" value="<?php echo $res_user['phone_number']; ?>">
                            </div>
                          </div>
                          <div class="col-lg-6">
                            <div class="form-group">
                              <input type="text" class="form-control" placeholder="Website" name="url" value="<?php echo $res_user['url']; ?>">
                            </div>
                          </div>
                          <div class="col-lg-12 mb-3">
                            <input type="submit" class="more-btn btn btn-secondary float-right" value="Save Changes" name="profile_submit">
                          </div>
                        </div>                        
                    </div>
                  </div>                
              </form>
              <div class="col-lg-12 mb-3">
                  <div class="field-area">
                      <p class="font-weight-bold"><i class="fas fa-user-plus"></i> CHANGE PASSWORD</p>
                      <form action="<?php echo base_url("users/change_password"); ?>" method="post" id="cp_frm">
                          <div class="row">
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <input type="password" class="form-control" placeholder="Current Password" name="old_password">
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <input type="password" class="form-control" placeholder="New Password" name="new_password">
                                </div>
                              </div>
                              <div class="col-lg-4">
                                <div class="form-group">
                                  <input type="password" class="form-control" placeholder="Confirm Password" name="confirm_password">
                                </div>
                              </div>
                              <div class="col-lg-12 mb-3">
                                  <input type="submit" class="more-btn btn btn-secondary float-right" value="Save Changes" name="cp_submit">
                              </div>                             
                          </div>
                      </form> 
                  </div>
              </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Profile section close --> 