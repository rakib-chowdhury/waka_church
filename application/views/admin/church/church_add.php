<?php //echo "<pre>"; print_r($all_users);die; ?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Church</h3>
        </div>
        <!-- /.box-header -->
        <!-- form start -->
        <div class="box-body my-form-body">
          <?php if(isset($msg) || validation_errors() !== ''): ?>
              <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                  <h4><i class="icon fa fa-warning"></i> Alert!</h4>
                  <?= validation_errors();?>
                  <?= isset($msg)? $msg: ''; ?>
              </div>
            <?php endif; ?>       
           
            <?php echo form_open_multipart(base_url('admin/church/add/'), 'class="form-horizontal"');?>  
            <div class="form-group">
              <label for="user_id" class="col-sm-2 control-label">User Name</label>
              <div class="col-sm-9">
                <select name="user_id" class="form-control">
                  <option value="">Select User Options...</option>
                  <?php foreach($all_users as $users){ ?>
                  <option value="<?php if(isset($users['user_id'])){ echo $users['user_id']; }else{ echo ''; };?>"><?php if(isset($users['name'])){ echo $users['name']; }else{ echo ''; }; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>                                    
            <div class="form-group">
              <label for="ministry_options" class="col-sm-2 control-label">Ministry Options</label>
              <div class="col-sm-9">
                <select name="ministry_options" class="form-control">
                  <option value="">Select Ministry Options...</option>
                  <option value="church">Church</option>
                  <option value="choir">Choir</option>
                  <option value="band">Band</option>
                </select>
              </div>
            </div> 
            <div class="form-group">   
              <label for="name" class="col-sm-2 control-label">Name</label>
              <div class="col-sm-9">
                <input type="text" name="name" class="form-control" id="name" placeholder="Name">
              </div>   
            </div>
            <div class="form-group">   
              <label for="slogan" class="col-sm-2 control-label">Slogan</label>
              <div class="col-sm-9">
                <input type="text" name="slogan" class="form-control" id="slogan" placeholder="Slogan">
              </div>   
            </div>                           
            <div class="form-group">
              <label for="thumbnail" class="col-sm-2 control-label">Thumbnail</label>
              <div class="col-sm-9">
                <input type="file" name="thumbnail" class="form-control" id="thumbnail">
              </div>
            </div>
            <div class="form-group">   
              <label for="state" class="col-sm-2 control-label">State</label>
              <div class="col-sm-9">
                <select class="form-control" name="state" id="state">
                    <option value="">Select State Options...</option>
                    <option value="state" <?php if(isset($details['state']) && $details['state'] == "state"){echo "selected";} ?>>State</option>
                    <option value="lagos" <?php if(isset($details['state']) && $details['state'] == "lagos"){echo "selected";} ?>>Lagos</option>
                    <option value="abuja" <?php if(isset($details['state']) && $details['state'] == "abuja"){echo "selected";} ?>>Abuja</option>
                    <option value="abia" <?php if(isset($details['state']) && $details['state'] == "abia"){echo "selected";} ?>>Abia</option>
                    <option value="adamawa" <?php if(isset($details['state']) && $details['state'] == "adamawa"){echo "selected";} ?>>Adamawa</option>
                    <option value="akwa ibom" <?php if(isset($details['state']) && $details['state'] == "akwa ibom"){echo "selected";} ?>>Akwa Ibom</option>
                    <option value="anambra" <?php if(isset($details['state']) && $details['state'] == "anambra"){echo "selected";} ?>>Anambra</option>
                    <option value="bauchi" <?php if(isset($details['state']) && $details['state'] == "bauchi"){echo "selected";} ?>>Bauchi</option>
                    <option value="bayelsa" <?php if(isset($details['state']) && $details['state'] == "bayelsa"){echo "selected";} ?>>Bayelsa</option>
                    <option value="benue" <?php if(isset($details['state']) && $details['state'] == "benue"){echo "selected";} ?>>Benue</option>
                    <option value="borno" <?php if(isset($details['state']) && $details['state'] == "borno"){echo "selected";} ?>>Borno</option>
                    <option value="cross river" <?php if(isset($details['state']) && $details['state'] == "cross river"){echo "selected";} ?>>Cross River</option>
                    <option value="delta" <?php if(isset($details['state']) && $details['state'] == "delta"){echo "selected";} ?>>Delta</option>
                    <option value="ebonyi" <?php if(isset($details['state']) && $details['state'] == "ebonyi"){echo "selected";} ?>>Ebonyi</option>
                    <option value="enugu" <?php if(isset($details['state']) && $details['state'] == "enugu"){echo "selected";} ?>>Enugu</option>
                    <option value="edo" <?php if(isset($details['state']) && $details['state'] == "edo"){echo "selected";} ?>>Edo</option>
                    <option value="ekiti" <?php if(isset($details['state']) && $details['state'] == "ekiti"){echo "selected";} ?>>Ekiti</option>
                    <option value="gombe" <?php if(isset($details['state']) && $details['state'] == "gombe"){echo "selected";} ?>>Gombe</option>
                    <option value="imo" <?php if(isset($details['state']) && $details['state'] == "imo"){echo "selected";} ?>>Imo</option>
                    <option value="jigawa" <?php if(isset($details['state']) && $details['state'] == "jigawa"){echo "selected";} ?>>Jigawa</option>
                    <option value="kaduna" <?php if(isset($details['state']) && $details['state'] == "kaduna"){echo "selected";} ?>>Kaduna</option>
                    <option value="kano" <?php if(isset($details['state']) && $details['state'] == "kano"){echo "selected";} ?>>Kano</option>
                    <option value="kastina" <?php if(isset($details['state']) && $details['state'] == "kastina"){echo "selected";} ?>>Kastina</option>
                    <option value="kebbi" <?php if(isset($details['state']) && $details['state'] == "kebbi"){echo "selected";} ?>>Kebbi</option>
                    <option value="kogi" <?php if(isset($details['state']) && $details['state'] == "kogi"){echo "selected";} ?>>Kogi</option>
                    <option value="kwara" <?php if(isset($details['state']) && $details['state'] == "kwara"){echo "selected";} ?>>Kwara</option>
                    <option value="nasarwa" <?php if(isset($details['state']) && $details['state'] == "nasarwa"){echo "selected";} ?>>Nasarawa</option>
                    <option value="niger" <?php if(isset($details['state']) && $details['state'] == "niger"){echo "selected";} ?>>Niger</option>
                    <option value="ogun" <?php if(isset($details['state']) && $details['state'] == "ogun"){echo "selected";} ?>>Ogun</option>
                    <option value="ondo" <?php if(isset($details['state']) && $details['state'] == "ondo"){echo "selected";} ?>>Ondo</option>
                    <option value="osun" <?php if(isset($details['state']) && $details['state'] == "osun"){echo "selected";} ?>>Osun</option>
                    <option value="oyo" <?php if(isset($details['state']) && $details['state'] == "oyo"){echo "selected";} ?>>Oyo</option>
                    <option value="plateau" <?php if(isset($details['state']) && $details['state'] == "plateau"){echo "selected";} ?>>Plateau</option>
                    <option value="rivers" <?php if(isset($details['state']) && $details['state'] == "rivers"){echo "selected";} ?>>Rivers</option>
                    <option value="sokoto" <?php if(isset($details['state']) && $details['state'] == "sokoto"){echo "selected";} ?>>Sokoto</option>
                    <option value="taraba" <?php if(isset($details['state']) && $details['state'] == "taraba"){echo "selected";} ?>>Taraba</option>
                    <option value="yobe" <?php if(isset($details['state']) && $details['state'] == "yobe"){echo "selected";} ?>>Yobe</option>
                    <option value="zamfara" <?php if(isset($details['state']) && $details['state'] == "zamfara"){echo "selected";} ?>>Zamfara</option>
                </select>                
              </div>   
            </div>
            <div class="form-group">   
              <label for="working_hours" class="col-sm-2 control-label">Working Hours</label>
              <div class="col-sm-9">
                  <div class="col-sm-12 cust_work">
                    <div class="col-sm-4">
                        <label>Monday</label>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='mon_start'>
                          <input type='text' class="form-control" name="mon_start"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>                       
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='mon_end'>
                          <input type='text' class="form-control" name="mon_end"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div> 
                    </div>
                  </div>
                  <div class="col-sm-12 cust_work">
                    <div class="col-sm-4">
                        <label>Tuesday</label>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='tue_start'>
                          <input type='text' class="form-control" name="tue_start"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div> 
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='tue_end'>
                          <input type='text' class="form-control" name="tue_end"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div> 
                    </div>
                  </div>
                  <div class="col-sm-12 cust_work">
                    <div class="col-sm-4">
                        <label>Wednesday</label>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='wed_start'>
                          <input type='text' class="form-control" name="wed_start"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='wed_end'>
                          <input type='text' class="form-control" name="wed_end"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                    </div>
                  </div> 
                  <div class="col-sm-12 cust_work">
                    <div class="col-sm-4">
                        <label>Thursday</label>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='thu_start'>
                          <input type='text' class="form-control" name="thu_start"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='thu_end'>
                          <input type='text' class="form-control" name="thu_end"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                    </div>
                  </div> 
                  <div class="col-sm-12 cust_work">
                    <div class="col-sm-4">
                        <label>Friday</label>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='fri_start'>
                          <input type='text' class="form-control" name="fri_start"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='fri_end'>
                          <input type='text' class="form-control" name="fri_end"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                    </div>
                  </div> 
                  <div class="col-sm-12 cust_work">
                    <div class="col-sm-4">
                        <label>Saturday</label>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='sat_start'>
                          <input type='text' class="form-control" name="sat_start"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='sat_end'>
                          <input type='text' class="form-control" name="sat_end"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                    </div>
                  </div> 
                  <div class="col-sm-12 cust_work">
                    <div class="col-sm-4">
                        <label>Sunday</label>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='sun_start'>
                          <input type='text' class="form-control" name="sun_start"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                    </div>
                    <div class="col-sm-4">
                      <div class='input-group date' id='sun_end'>
                          <input type='text' class="form-control" name="sun_end"/>
                          <span class="input-group-addon">
                              <span class="glyphicon glyphicon-time"></span>
                          </span>
                      </div>
                    </div>
                  </div>                                                                                                             
              </div>   
            </div>
            <div class="form-group">   
              <label for="address" class="col-sm-2 control-label">Address</label>
              <div class="col-sm-9">
                <textarea name="address" class="form-control" id="address"></textarea>
              </div>   
            </div>
            <div class="form-group">   
              <label for="phone" class="col-sm-2 control-label">Phone</label>
              <div class="col-sm-9">
                <input type="text" name="phone" class="form-control" id="phone" placeholder="Phone" >
              </div>   
            </div>
            <div class="form-group">   
              <label for="email" class="col-sm-2 control-label">Email</label>
              <div class="col-sm-9">
                <input type="text" name="email" class="form-control" id="email" placeholder="email">
              </div>   
            </div> 
            <div class="form-group">   
              <label for="website" class="col-sm-2 control-label">Website</label>
              <div class="col-sm-9">
                <input type="text" name="website" class="form-control" id="website" placeholder="website">
              </div>   
            </div>
            <div class="form-group">   
              <label for="facebook_url" class="col-sm-2 control-label">Facebook Url</label>
              <div class="col-sm-9">
                <input type="text" name="facebook_url" class="form-control" id="facebook_url" placeholder="Facebook Url">
              </div>   
            </div>
            <div class="form-group">   
              <label for="twitter_url" class="col-sm-2 control-label">Twitter Url</label>
              <div class="col-sm-9">
                <input type="text" name="twitter_url" class="form-control" id="twitter_url" placeholder="Twitter Url">
              </div>   
            </div> 
            <div class="form-group">   
              <label for="instagram_url" class="col-sm-2 control-label">Instagram Url</label>
              <div class="col-sm-9">
                <input type="text" name="instagram_url" class="form-control" id="instagram_url" placeholder="Instagram Url">
              </div>   
            </div> 
            <div class="form-group">   
              <label for="youtube_url" class="col-sm-2 control-label">Youtube Url</label>
              <div class="col-sm-9">
                <input type="text" name="youtube_url" class="form-control" id="youtube_url" placeholder="Youtube Url">
              </div>   
            </div> 
            <div class="form-group">   
              <label for="faq_details" class="col-sm-2 control-label">Faq</label>
              <div class="col-sm-9">
                <textarea name="faq_details" class="form-control" id="faq_details"></textarea>
              </div>   
            </div>                                                                                                                                        
            <div class="form-group"> 
              <h3 class="col-sm-2 control-label">Amenities</h3>  
              <div class="col-sm-9">
                <div class="checkbox">
                  <label><input type="checkbox" name="church_parking" value="1">Church Parking</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="church_wifi" value="1">Church Wifi</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="church_wheelchair" value="1">Church WheelChair</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="church_family_friendly" value="1">Church family Friendly</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="church_online_transfer" value="1">Church Online Transfer</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="church_air_conditioned" value="1">Church Air Conditioned</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="church_kids_dept" value="1">Church Kids dept</label>
                </div>
                <div class="checkbox">
                  <label><input type="checkbox" name="church_rest_room" value="1">Church Rest Room</label>
                </div>                                                 
              </div>   
            </div>

            <div class="form-group">
              <label for="feature_image1" class="col-sm-2 control-label">Feature Image1</label>
              <div class="col-sm-9">
                <input type="file" name="feature_image1" class="form-control" id="feature_image1">
              </div>
            </div>
            <div class="form-group">
              <label for="feature_image2" class="col-sm-2 control-label">Feature Image2</label>
              <div class="col-sm-9">
                <input type="file" name="feature_image2" class="form-control" id="feature_image2">
              </div>
            </div>
            <div class="form-group">
              <label for="feature_image3" class="col-sm-2 control-label">Feature Image3</label>
              <div class="col-sm-9">
                <input type="file" name="feature_image3" class="form-control" id="feature_image3">
              </div>
            </div> 

            <div class="form-group">
              <label for="exterior_image1" class="col-sm-2 control-label">Exterior Image1</label>
              <div class="col-sm-9">
                <input type="file" name="exterior_image1" class="form-control" id="exterior_image1">
              </div>
            </div>
            <div class="form-group">
              <label for="exterior_image2" class="col-sm-2 control-label">Exterior Image2</label>
              <div class="col-sm-9">
                <input type="file" name="exterior_image2" class="form-control" id="exterior_image2">
              </div>
            </div>
            <div class="form-group">
              <label for="exterior_image3" class="col-sm-2 control-label">Exterior Image3</label>
              <div class="col-sm-9">
                <input type="file" name="exterior_image3" class="form-control" id="exterior_image3">
              </div>
            </div>

            <div class="form-group">
              <label for="interior_image1" class="col-sm-2 control-label">Interior Image1</label>
              <div class="col-sm-9">
                <input type="file" name="interior_image1" class="form-control" id="interior_image1">
              </div>
            </div>
            <div class="form-group">
              <label for="interior_image2" class="col-sm-2 control-label">Interior Image2</label>
              <div class="col-sm-9">
                <input type="file" name="interior_image2" class="form-control" id="interior_image2">
              </div>
            </div> 
            <div class="form-group">
              <label for="interior_image3" class="col-sm-2 control-label">Interior Image3</label>
              <div class="col-sm-9">
                <input type="file" name="interior_image3" class="form-control" id="interior_image3">
              </div>
            </div>
                                                                                                    
            <div class="form-group">
              <label for="role" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-9">
                <select name="status" class="form-control">
                  <option value="">Select Status...</option>
                  <option value="1">Approved</option>
                  <option value="0">Pending</option>
                </select>
              </div>    
            </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add" class="btn btn-success pull-right">
                  <a href="<?php echo base_url('admin/church'); ?>" class="btn btn-warning back_bt">Back</a>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 


<script>
$("#church").addClass('active');
$(function () {
    $('.working_hour').datetimepicker({
        format: 'LT'
    });
});
</script>    

  