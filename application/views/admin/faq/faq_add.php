<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Faq</h3>
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
           
            <?php echo form_open_multipart(base_url('admin/faq/add'), 'class="form-horizontal"');?>                          
              <div class="form-group">   
                <label for="title" class="col-sm-2 control-label">Title</label>
                <div class="col-sm-9">
                  <input type="text" name="title" class="form-control" id="title" value="<?php if(isset($details['title'])){ echo $details['title']; }else{ echo ''; };?>" placeholder="Title">
                </div>   
              </div>
              <div class="form-group">   
                <label for="description" class="col-sm-2 control-label">Description</label>
                <div class="col-sm-9">
                  <textarea name="description" class="form-control" id="description"><?php if(isset($details['description'])){ echo $details['description']; }else{ echo ''; };?></textarea>
                </div>   
              </div>              
              
              <div class="form-group">
                <label for="role" class="col-sm-2 control-label">Status</label>
                <div class="col-sm-9">
                  <select name="status" class="form-control">
                    <option value="">Select Status</option>
                    <option value="1" selected>Active</option>
                    <option value="0">Inactive</option>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add" class="btn btn-success pull-right">
                  <a href="<?php echo base_url('admin/faq'); ?>" class="btn btn-warning back_bt">Back</a>
                </div>
              </div>
            <?php echo form_close(); ?>
          </div>
          <!-- /.box-body -->
      </div>
    </div>
  </div>  

</section> 
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
 <script>

    CKEDITOR.replace('description');

</script>

<script>
$("#faq").addClass('active');
</script>    

  