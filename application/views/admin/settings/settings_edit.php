<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Settings</h3>
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
            <?php echo form_open_multipart(base_url('admin/settings/index/'.$details['settings_id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="logo" class="col-sm-2 control-label">Logo</label>
                <div class="col-sm-6">
                  <input type="file" name="logo" class="form-control" id="logo" placeholder="">
                </div>
                <div class="col-sm-4">
                  <img src="<?= $details['logo']; ?>" style="width: 25%;">
                </div>
              </div>                                                  
              <div class="form-group">
                <label for="banner_title" class="col-sm-2 control-label">Banner Title</label>
                <div class="col-sm-9">
                  <textarea name="banner_title" class="form-control" id="banner_title"> <?php echo $details['banner_title']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="banner_sub_title" class="col-sm-2 control-label">Banner Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="banner_sub_title" class="form-control" id="banner_sub_title" placeholder="" value="<?php echo $details['banner_sub_title']; ?>">
                </div>
              </div>  
              <div class="form-group">
                <label for="top_church_icon" class="col-sm-2 control-label">Top Church Icon</label>
                <div class="col-sm-6">
                  <input type="file" name="top_church_icon" class="form-control" id="top_church_icon" placeholder="">
                </div>
                <div class="col-sm-4">
                  <img src="<?= $details['top_church_icon']; ?>" style="width: 25%;">
                </div>
              </div> 
              <div class="form-group">
                <label for="top_church_title" class="col-sm-2 control-label">Top Church Title</label>
                <div class="col-sm-9">
                  <input type="text" name="top_church_title" class="form-control" id="top_church_title" placeholder="" value="<?php echo $details['top_church_title']; ?>">
                </div>
              </div> 
              <div class="form-group">
                <label for="top_choir_icon" class="col-sm-2 control-label">Top Choir Icon</label>
                <div class="col-sm-6">
                  <input type="file" name="top_choir_icon" class="form-control" id="top_choir_icon" placeholder="">
                </div>
                <div class="col-sm-4">
                  <img src="<?= $details['top_choir_icon']; ?>" style="width: 25%;">
                </div>
              </div>              
              <div class="form-group">
                <label for="top_church_title" class="col-sm-2 control-label">Top Choir Title</label>
                <div class="col-sm-9">
                  <input type="text" name="top_choir_title" class="form-control" id="top_choir_title" placeholder="" value="<?php echo $details['top_choir_title']; ?>">
                </div>
              </div> 
              <div class="form-group">
                <label for="top_band_icon" class="col-sm-2 control-label">Top Band Icon</label>
                <div class="col-sm-6">
                  <input type="file" name="top_band_icon" class="form-control" id="top_band_icon" placeholder="">
                </div>
                <div class="col-sm-4">
                  <img src="<?= $details['top_band_icon']; ?>" style="width: 25%;">
                </div>
              </div>             
              <div class="form-group">
                <label for="top_band_title" class="col-sm-2 control-label">Top Band Title</label>
                <div class="col-sm-9">
                  <input type="text" name="top_band_title" class="form-control" id="top_band_title" placeholder="" value="<?php echo $details['top_band_title']; ?>">
                </div>
              </div> 
              <div class="form-group">
                <label for="top_event_icon" class="col-sm-2 control-label">Top Event Icon</label>
                <div class="col-sm-6">
                  <input type="file" name="top_event_icon" class="form-control" id="top_event_icon" placeholder="">
                </div>
                <div class="col-sm-4">
                  <img src="<?= $details['top_event_icon']; ?>" style="width: 25%;">
                </div>
              </div>             
              <div class="form-group">
                <label for="top_band_title" class="col-sm-2 control-label">Top Event Title</label>
                <div class="col-sm-9">
                  <input type="text" name="top_event_title" class="form-control" id="top_event_title" placeholder="" value="<?php echo $details['top_event_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section1_title" class="col-sm-2 control-label">Section1 Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section1_title" class="form-control" id="section1_title" placeholder="" value="<?php echo $details['section1_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section1_subtitile" class="col-sm-2 control-label">Section1 Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section1_subtitile" class="form-control" id="section1_subtitile" placeholder="" value="<?php echo $details['section1_subtitile']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section1_register_desc" class="col-sm-2 control-label">Section1 Register Description</label>
                <div class="col-sm-9">
                  <textarea name="section1_register_desc" class="form-control" id="section1_register_desc"><?php echo $details['section1_register_desc']; ?></textarea>
                </div>
              </div> 
              <div class="form-group">
                <label for="section2_title" class="col-sm-2 control-label">Section2 Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section2_title" class="form-control" id="section2_title" placeholder="" value="<?php echo $details['section2_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section2_subtitle" class="col-sm-2 control-label">Section2 Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section2_subtitle" class="form-control" id="section2_subtitle" placeholder="" value="<?php echo $details['section2_subtitle']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section2_join_desc" class="col-sm-2 control-label">Section2 Join Description</label>
                <div class="col-sm-9">
                  <textarea name="section2_join_desc" class="form-control" id="section2_join_desc"><?php echo $details['section2_join_desc']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="section2_join_subtitle" class="col-sm-2 control-label">Section2 Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section2_join_subtitle" class="form-control" id="section2_join_subtitle" placeholder="" value="<?php echo $details['section2_join_subtitle']; ?>">
                </div>
              </div>               
              <div class="form-group">
                <label for="section3_title" class="col-sm-2 control-label">Section3 Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section3_title" class="form-control" id="section3_title" placeholder="" value="<?php echo $details['section3_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section3_subtitle" class="col-sm-2 control-label">Section3 Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section3_subtitle" class="form-control" id="section3_subtitle" placeholder="" value="<?php echo $details['section3_subtitle']; ?>">
                </div>
              </div>  
              <div class="form-group">
                <label for="section4_title" class="col-sm-2 control-label">Section4 Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section4_title" class="form-control" id="section4_title" placeholder="" value="<?php echo $details['section4_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section4_subtitle" class="col-sm-2 control-label">Section4 Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section4_subtitle" class="form-control" id="section4_subtitle" placeholder="" value="<?php echo $details['section4_subtitle']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section5_title" class="col-sm-2 control-label">Section5 Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section5_title" class="form-control" id="section5_title" placeholder="" value="<?php echo $details['section5_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section5_subtitle" class="col-sm-2 control-label">Section5 Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section5_subtitle" class="form-control" id="section5_subtitle" placeholder="" value="<?php echo $details['section5_subtitle']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section6_title" class="col-sm-2 control-label">Section6 Title</label>
                <div class="col-sm-9">
                  <textarea name="section6_title" class="form-control" id="section6_title"><?php echo $details['section6_title']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="section6_subtitle" class="col-sm-2 control-label">Section6 Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section6_subtitle" class="form-control" id="section6_subtitle" placeholder="" value="<?php echo $details['section6_subtitle']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="bottom_church_image" class="col-sm-2 control-label">Bottom Church Image</label>
                <div class="col-sm-6">
                  <input type="file" name="bottom_church_image" class="form-control" id="bottom_church_image" placeholder="">
                </div>
                <div class="col-sm-4">
                  <img src="<?= $details['bottom_church_image']; ?>" style="width: 25%;">
                </div>
              </div>              
              <div class="form-group">
                <label for="bottom_church_title" class="col-sm-2 control-label">Bottom Church Title</label>
                <div class="col-sm-9">
                  <input type="text" name="bottom_church_title" class="form-control" id="bottom_church_title" placeholder="" value="<?php echo $details['bottom_church_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="bottom_choir_image" class="col-sm-2 control-label">Bottom Choir Image</label>
                <div class="col-sm-6">
                  <input type="file" name="bottom_choir_image" class="form-control" id="bottom_choir_image" placeholder="">
                </div>
                <div class="col-sm-4">
                  <img src="<?= $details['bottom_choir_image']; ?>" style="width: 25%;">
                </div>
              </div>              
              <div class="form-group">
                <label for="bottom_choir_title" class="col-sm-2 control-label">Bottom Choir Title</label>
                <div class="col-sm-9">
                  <input type="text" name="bottom_choir_title" class="form-control" id="bottom_choir_title" placeholder="" value="<?php echo $details['bottom_choir_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="bottom_band_image" class="col-sm-2 control-label">Bottom Band Image</label>
                <div class="col-sm-6">
                  <input type="file" name="bottom_band_image" class="form-control" id="bottom_band_image" placeholder="">
                </div>
                <div class="col-sm-4">
                  <img src="<?= $details['bottom_band_image']; ?>" style="width: 25%;">
                </div>
              </div>              
              <div class="form-group">
                <label for="bottom_band_title" class="col-sm-2 control-label">Bottom Band Title</label>
                <div class="col-sm-9">
                  <input type="text" name="bottom_band_title" class="form-control" id="bottom_band_title" placeholder="" value="<?php echo $details['bottom_band_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="bottom_event_image" class="col-sm-2 control-label">Bottom Event Image</label>
                <div class="col-sm-6">
                  <input type="file" name="bottom_event_image" class="form-control" id="bottom_event_image" placeholder="">
                </div>
                <div class="col-sm-4">
                  <img src="<?= $details['bottom_event_image']; ?>" style="width: 25%;">
                </div>
              </div>              
              <div class="form-group">
                <label for="bottom_event_title" class="col-sm-2 control-label">Bottom Event Title</label>
                <div class="col-sm-9">
                  <input type="text" name="bottom_event_title" class="form-control" id="bottom_event_title" placeholder="" value="<?php echo $details['bottom_event_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section7_title" class="col-sm-2 control-label">Section7 Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section7_title" class="form-control" id="section7_title" placeholder="" value="<?php echo $details['section7_title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="section7_subtitle" class="col-sm-2 control-label">Section7 Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="section7_subtitle" class="form-control" id="section7_subtitle" placeholder="" value="<?php echo $details['section7_subtitle']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="copyright" class="col-sm-2 control-label">Copyright</label>
                <div class="col-sm-9">
                  <input type="text" name="copyright" class="form-control" id="copyright" placeholder="" value="<?php echo $details['copyright']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="facebook_link" class="col-sm-2 control-label">Facebook Link</label>
                <div class="col-sm-9">
                  <input type="text" name="facebook_link" class="form-control" id="facebook_link" placeholder="" value="<?php echo $details['facebook_link']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="twitter_link" class="col-sm-2 control-label">Twitter Link</label>
                <div class="col-sm-9">
                  <input type="text" name="twitter_link" class="form-control" id="twitter_link" placeholder="" value="<?php echo $details['twitter_link']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="googleplus_link" class="col-sm-2 control-label">Googleplus Link</label>
                <div class="col-sm-9">
                  <input type="text" name="googleplus_link" class="form-control" id="googleplus_link" placeholder="" value="<?php echo $details['googleplus_link']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="instagram_link" class="col-sm-2 control-label">Instagram Link</label>
                <div class="col-sm-9">
                  <input type="text" name="instagram_link" class="form-control" id="instagram_link" placeholder="" value="<?php echo $details['instagram_link']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="youtube_link" class="col-sm-2 control-label">Youtube Link</label>
                <div class="col-sm-9">
                  <input type="text" name="youtube_link" class="form-control" id="youtube_link" placeholder="" value="<?php echo $details['youtube_link']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="phone" class="col-sm-2 control-label">Phone</label>
                <div class="col-sm-9">
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="" value="<?php echo $details['phone']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-9">
                  <input type="text" name="email" class="form-control" id="email" placeholder="" value="<?php echo $details['email']; ?>">
                </div>
              </div> 
              <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-9">
                  <textarea name="address" class="form-control" id="address"><?php echo $details['address']; ?></textarea>
                </div>
              </div> 
              <div class="form-group">
                <label for="working_hours" class="col-sm-2 control-label">Working Hours</label>
                <div class="col-sm-9">
                  <textarea name="working_hours" class="form-control" id="working_hours"><?php echo $details['working_hours']; ?></textarea>
                </div>
              </div> 
              <div class="form-group">
                <label for="map" class="col-sm-2 control-label">Map</label>
                <div class="col-sm-9">
                  <textarea name="map" class="form-control" id="map"><?php echo $details['map']; ?></textarea>
                </div>
              </div>                                                                                                                                                
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update" class="btn btn-success pull-right">
                  <a href="<?php echo base_url('admin/settings'); ?>" class="btn btn-warning back_bt">Back</a>
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
$("#settings").addClass('active');
</script>