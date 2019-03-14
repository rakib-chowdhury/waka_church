<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">My Profile</h3>
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
            <?php echo form_open_multipart(base_url('admin/login/profile/'.$admin['admin_id']), 'class="form-horizontal"' )?> 
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name" placeholder="" value="<?php echo $admin['name']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" id="email" placeholder="" value="<?php echo $admin['email']; ?>">
                </div>
              </div>   
              <div class="form-group">
                <label for="phone_number" class="col-sm-2 control-label">Phone Number</label>
                <div class="col-sm-9">
                  <input type="number" name="phone_number" class="form-control" id="phone_number" placeholder="" value="<?php echo $admin['phone_number']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="address" class="col-sm-2 control-label">Address</label>
                <div class="col-sm-9">
                  <input type="text" class="form-control" name="address" id="user_location" value="<?php echo $admin['address']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="user_image" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-6">
                  <input type="file" name="user_image" class="form-control" id="user_image" placeholder="">
                </div>
                <div class="col-sm-4">
                  <img src="<?= $admin['image']; ?>" style="width: 40%;">
                </div>
              </div> 
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update" class="btn btn-success pull-right">
                  <a href="<?php echo base_url('admin/dashboard'); ?>" class="btn btn-warning back_bt">Back</a>
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
    $("#dashboard").addClass('active');
  </script> 
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBE6xdPzQ3njIxhMN0Vj_hLURTE9ZROT2Y&v=3.exp&libraries=places"></script>
<script>
function initialize() {
  var input = document.getElementById('user_location');
  var autocomplete = new google.maps.places.Autocomplete(input);
}
google.maps.event.addDomListener(window, 'load', initialize);
</script> 