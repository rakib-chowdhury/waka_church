<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Edit Reviews</h3>
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
            <?php echo form_open_multipart(base_url('admin/listing_reviews/edit/'.$details['listing_review_id'].'/'.$details['listings_id'].'/'.$this->uri->segment(6)), 'class="form-horizontal"' )?>                    
              <div class="form-group">
                <label for="name" class="col-sm-2 control-label">Name</label>
                <div class="col-sm-9">
                  <input type="text" name="name" class="form-control" id="name" placeholder="" value="<?php echo $details['name']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="email" class="col-sm-2 control-label">Email</label>
                <div class="col-sm-9">
                  <input type="email" name="email" class="form-control" id="email" placeholder="" value="<?php echo $details['email']; ?>">
                </div>
              </div> 
            <div class="form-group">
              <label for="review_image" class="col-sm-2 control-label">Image</label>
              <div class="col-sm-6">
                <input type="file" name="review_image" class="form-control" id="review_image">
              </div>
              <div class="col-sm-3">
                <img src="<?php echo $details['image'];?>" width="40%" height="10%">
              </div>
            </div>                
              <div class="form-group">
                <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-9">
                  <input type="text" name="title" class="form-control" id="title" placeholder="" value="<?php echo $details['title']; ?>">
                </div>
              </div>
              <div class="form-group">
                <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-9">
                  <textarea name="description" class="form-control"><?php echo $details['description']; ?></textarea>
                </div>
              </div>
              <div class="form-group">
                <label for="rating" class="col-sm-2 control-label">Ratings</label>
                <div class="col-sm-9">
                       <div class="rating">
                        <label>
                          <input type="radio" name="ratings" value="1" <?php if($details['ratings'] == 1){echo "checked='checked'";}else {echo "";} ?> />
                          <span class="icon">★</span>
                        </label>
                        <label>
                          <input type="radio" name="ratings" value="2" <?php if($details['ratings'] == 2){echo "checked='checked'";} ?>/>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                        </label>
                        <label>
                          <input type="radio" name="ratings" value="3" <?php if($details['ratings'] == 3){echo "checked='checked'";} ?>/>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>   
                        </label>
                        <label>
                          <input type="radio" name="ratings" value="4" <?php if($details['ratings'] == 4){echo "checked='checked'";} ?>/>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                        </label>
                        <label>
                          <input type="radio" name="ratings" value="5" <?php if($details['ratings'] == 5){echo "checked='checked'";} ?>/>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                          <span class="icon">★</span>
                        </label>
                      </div> 
                </div>
              </div> 
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-9">
                  <select name="status" class="form-control">
                    <option value="1" <?php if($details['status'] == 1){echo "selected";} ?>>Approved</option>
                    <option value="0" <?php if($details['status'] == 0){echo "selected";} ?>>Pending</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Update" class="btn btn-success pull-right">
                  <a href="<?php echo base_url('admin/listing_reviews/index/'.$details['listings_id'].'/'.$this->uri->segment(6)); ?>" class="btn btn-warning back_bt">Back</a>
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
    <?php if($this->uri->segment(6) == "church"){ ?>
      $("#church").addClass('active');
    <?php }elseif($this->uri->segment(6) == "choir"){ ?>
      $("#choir").addClass('active');
    <?php }elseif($this->uri->segment(6) == "band"){ ?>
      $("#band").addClass('active');
    <?php } ?>
</script> 