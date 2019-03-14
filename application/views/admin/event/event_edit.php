<?php //echo "<pre>"; print_r($all_users);die; ?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Event</h3>
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
           
            <?php echo form_open_multipart(base_url('admin/event/edit/'.$details['event_id']), 'class="form-horizontal"');?>  
            <div class="form-group">
              <label for="user_id" class="col-sm-2 control-label">User Name</label>
              <div class="col-sm-9">
                <select name="user_id" class="form-control">
                  <?php foreach($all_users as $users){ ?>
                  <option value="<?php if(isset($users['user_id'])){ echo $users['user_id']; }else{ echo ''; };?>" <?php if(isset($details['user_id']) && $details['user_id'] == $users['user_id']){echo "selected";} ?>><?php if(isset($users['name'])){ echo $users['name']; }else{ echo ''; }; ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>                                    
            <div class="form-group">   
              <label for="event_name" class="col-sm-2 control-label">Event Name</label>
              <div class="col-sm-9">
                <input type="text" name="event_name" class="form-control" id="event_name" placeholder="Name" value="<?php if(isset($details['event_name'])){ echo $details['event_name']; }else{ echo ''; };?>">
              </div>   
            </div>                         
            <div class="form-group">
              <label for="event_image" class="col-sm-2 control-label">Event Image</label>
              <div class="col-sm-6">
                <input type="file" name="event_image" class="form-control" id="event_image">
              </div>
              <div class="col-sm-3">
                <img src="<?php echo $details['event_image'];?>" width="40%" height="10%">
              </div>
            </div>
            <div class="form-group">   
              <label for="event_date" class="col-sm-2 control-label">Event Date</label>
              <div class="col-sm-9">
                  <div class='input-group date' id='event_date'>
                    <input type='text' class="form-control" name="event_date" value="<?php if(isset($details['event_date'])){ echo $details['event_date']; }else{ echo ''; };?>"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
                  </div>   
              </div>
            </div>
            <div class="form-group">   
              <label for="event_start" class="col-sm-2 control-label">Event Start</label>
              <div class="col-sm-9">
                <div class='input-group date' id='event_start'>
                    <input type='text' class="form-control" name="event_start" value="<?php if(isset($details['event_start'])){ echo $details['event_start']; }else{ echo ''; };?>"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>  
              </div>   
            </div>
            <div class="form-group">   
              <label for="event_end" class="col-sm-2 control-label">Event End</label>
              <div class="col-sm-9">
                <div class='input-group date' id='event_end'>
                    <input type='text' class="form-control" name="event_end" value="<?php if(isset($details['event_end'])){ echo $details['event_end']; }else{ echo ''; };?>"/>
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-time"></span>
                    </span>
                </div>                
              </div>   
            </div>                        
            <div class="form-group">   
              <label for="address" class="col-sm-2 control-label">Details</label>
              <div class="col-sm-9">
                <textarea name="details" class="form-control" id="details"><?php if(isset($details['details'])){ echo $details['details']; }else{ echo ''; };?></textarea>
              </div>   
            </div>
            <div class="form-group">   
              <label for="host" class="col-sm-2 control-label">Host</label>
              <div class="col-sm-9">
                <input type="text" name="host" class="form-control" id="host" placeholder="Host" value="<?php if(isset($details['host'])){ echo $details['host']; }else{ echo ''; };?>">
              </div>   
            </div>
            <div class="form-group">   
              <label for="state" class="col-sm-2 control-label">State</label>
              <div class="col-sm-9">
                <select class="form-control" name="state" id="state">
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
              <label for="address" class="col-sm-2 control-label">Address</label>
              <div class="col-sm-9">
                <input type="text" name="address" class="form-control" id="address" placeholder="Host" value="<?php if(isset($details['address'])){ echo $details['address']; }else{ echo ''; };?>">
              </div>   
            </div>                                                                
            <div class="form-group">
              <label for="role" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-9">
                <select name="status" class="form-control">
                  <option value="">Select Status</option>
                  <option value="1" <?php if(isset($details['status']) && $details['status'] == 1){echo "selected";} ?> >Approved</option>
                  <option value="0" <?php if(isset($details['status']) && $details['status'] == 0){echo "selected";} ?> >Pending</option>
                </select>
              </div>    
            </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update" class="btn btn-success pull-right">
                  <a href="<?php echo base_url('admin/event'); ?>" class="btn btn-warning back_bt">Back</a>
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
$("#event").addClass('active');
</script>    

  