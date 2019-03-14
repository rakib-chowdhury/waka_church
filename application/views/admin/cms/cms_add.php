<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Cms Page</h3>
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
           
            <?php echo form_open_multipart(base_url('admin/admin_cms/add'), 'class="form-horizontal"');?>                          
              <div class="form-group">   
                <label for="page_slug" class="col-sm-2 control-label">Page Slug</label>
                <div class="col-sm-9">
                  <input type="text" name="page_slug" class="form-control" id="page_slug" value="<?php if(isset($details['page_slug'])){ echo $details['page_slug']; }else{ echo ''; };?>" placeholder="Page Slug">
                </div>   
              </div>
              <div class="form-group">   
                <label for="page_title" class="col-sm-2 control-label">Page Title</label>
                <div class="col-sm-9">
                  <input type="text" name="page_title" class="form-control" id="page_title" value="<?php if(isset($details['page_title'])){ echo $details['page_title']; }else{ echo ''; };?>" placeholder="Page Title">
                </div>   
              </div>
              <div class="form-group">   
                <label for="page_sub_title" class="col-sm-2 control-label">Page Sub Title</label>
                <div class="col-sm-9">
                  <input type="text" name="page_sub_title" class="form-control" id="page_sub_title" value="<?php if(isset($details['page_sub_title'])){ echo $details['page_sub_title']; }else{ echo ''; };?>" placeholder="Page Sub Title">
                </div>   
              </div>                            
              <div class="form-group">   
                <label for="page_content" class="col-sm-2 control-label">Page Content</label>
                <div class="col-sm-9">
                  <textarea name="page_content" class="form-control" id="page_content"><?php if(isset($details['page_content'])){ echo $details['page_content']; }else{ echo ''; };?></textarea>
                </div>   
              </div> 

              <div class="form-group">
                <label for="page_image" class="col-sm-2 control-label">Image</label>
                <div class="col-sm-9">
                  <input type="file" name="page_image" class="form-control" id="page_image">
                </div>
              </div>                            
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add" class="btn btn-success pull-right">
                  <a href="<?php echo base_url('admin/admin_cms'); ?>" class="btn btn-warning back_bt">Back</a>
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
$("#cms").addClass('active');
</script>    

  