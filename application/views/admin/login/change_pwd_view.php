<?php //echo "<pre>"; print_r($user);die; ?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Change password</h3>
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
            <?php echo form_open_multipart(base_url('admin/login/change_pwd/'), 'class="form-horizontal"' )?>
              <div class="form-group">
                    <label for='old_password'>Old Password</label>
                    <input type='password' class="form-control" name="old_password"/>                    
              </div>
              <div class="form-group">
                    <label for='new_password'>New Password</label>
                    <input type='password' class="form-control" name="new_password"/>                    
              </div>
              <div class="form-group">
                    <label for='confirm_password'>Confirm Password</label>
                    <input type='password' class="form-control" name="confirm_password"/>                    
              </div>                             
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Submit" class="btn btn-success pull-right">            
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