    <section class="content dash_view">
      <!-- Info boxes -->
      <div class="row">
        <div class="col-md-2 col-sm-6 col-xs-12">
          <a href="<?php echo base_url('admin/users'); ?>">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><img src="<?php echo base_url();?>assets/images/users.png"></span>
              <div class="info-box-content">
                <span class="info-box-text">User</span>
                <span class="info-box-number"><?php echo $count_user; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>  
          <!-- /.info-box -->
        </div>         
        <div class="col-md-2 col-sm-6 col-xs-12">
          <a href="<?php echo base_url('admin/church'); ?>">
              <div class="info-box">
                <span class="info-box-icon bg-green"><img src="<?php echo base_url();?>assets/images/church.png"></span>
                <div class="info-box-content">
                  <span class="info-box-text">Church</span>
                  <span class="info-box-number"><?php echo $count_church; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
          </a>
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-2 col-sm-6 col-xs-12">
          <a href="<?php echo base_url('admin/choir'); ?>">
              <div class="info-box">
                <span class="info-box-icon bg-purple"><img src="<?php echo base_url();?>assets/images/choir.png"></span>
                <div class="info-box-content">
                  <span class="info-box-text">CHOIR</span>
                  <span class="info-box-number"><?php echo $count_choir; ?></span>
                </div>
                <!-- /.info-box-content -->
              </div>
          </a>  
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <!-- fix for small devices only -->
        <div class="clearfix visible-sm-block"></div>
        <div class="col-md-2 col-sm-6 col-xs-12">
          <a href="<?php echo base_url('admin/band'); ?>">
            <div class="info-box">
              <span class="info-box-icon bg-green"><img src="<?php echo base_url();?>assets/images/band.png"></span>
              <div class="info-box-content">
                <span class="info-box-text">BAND</span>
                <span class="info-box-number"><?php echo $count_band; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>  
          <!-- /.info-box -->
        </div>
        <!-- /.col -->
        <div class="col-md-2 col-sm-6 col-xs-12">
          <a href="<?php echo base_url('admin/event'); ?>">
            <div class="info-box">
              <span class="info-box-icon bg-purple"><img src="<?php echo base_url();?>assets/images/event.png"></span>
              <div class="info-box-content">
                <span class="info-box-text">Event</span>
                <span class="info-box-number"><?php echo $count_event; ?></span>
              </div>
              <!-- /.info-box-content -->
            </div>
          </a>  
          <!-- /.info-box -->
        </div>         
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
  <script>
    $("#dashboard").addClass('active');
  </script> 
