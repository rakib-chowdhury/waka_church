<?php //echo "<pre>"; print_r($all_users);die; ?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">Add Menu</h3>
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
           
            <?php echo form_open_multipart(base_url('admin/menu/add/'), 'class="form-horizontal"');?>  
            <div class="form-group">   
              <label for="menu_name" class="col-sm-2 control-label">Menu Name</label>
              <div class="col-sm-9">
                <input type="text" name="menu_name" class="form-control" id="menu_name" placeholder="Menu Name" value="<?php if(isset($menu['menu_name'])){ echo $menu['menu_name']; }else{ echo ''; };?>">
              </div>   
            </div>                                    
            <div class="form-group">   
              <label for="menu_category" class="col-sm-2 control-label">Menu Category</label>
              <div class="col-sm-9">
                <select name="menu_category" class="form-control">
                  <option value="">Select Menu Category...</option>
                  <option value="header_menu" <?php if(isset($menu['menu_category']) && $menu['menu_category'] == "header_menu"){echo "selected";} ?> >Header Menu</option>
                  <option value="footer_menu" <?php if(isset($menu['menu_category']) && $menu['menu_category'] == "footer_menu"){echo "selected";} ?> >Footer Menu</option>
                </select>                
              </div>   
            </div>
            <div class="form-group">   
              <label for="menu_link" class="col-sm-2 control-label">Menu Link</label>             
              <div class="col-sm-9">
                <span style="width: 28%; display: inline-block;"><?php echo base_url('/');?></span>
                <input style="width: 70%; display: inline-block;" type="text" name="menu_link" class="form-control" id="menu_link" placeholder="Menu Link" value="<?php if(isset($menu['menu_link'])){ echo $menu['menu_link']; }else{ echo ''; };?>">
              </div>   
            </div>
            <div class="form-group">   
              <label for="menu_order" class="col-sm-2 control-label">Menu Order</label>
              <div class="col-sm-9">
                <input type="number" name="menu_order" class="form-control" id="menu_order" placeholder="Menu Order" value="<?php if(isset($menu['menu_order'])){ echo $menu['menu_order']; }else{ echo ''; };?>">
              </div>   
            </div>                                      
            <div class="form-group">
              <label for="role" class="col-sm-2 control-label">Status</label>
              <div class="col-sm-9">
                <select name="status" class="form-control">
                  <option value="">Select Status...</option>
                  <option value="1" <?php if(isset($menu['status']) && $menu['status'] == 1){echo "selected";} ?> >Active</option>
                  <option value="0" <?php if(isset($menu['status']) && $menu['status'] == 0){echo "selected";} ?> >Inactive</option>
                </select>
              </div>    
            </div>
              <div class="form-group">
                <div class="col-md-11">
                  <input type="submit" name="submit" value="Add" class="btn btn-success pull-right">
                  <a href="<?php echo base_url('admin/menu'); ?>" class="btn btn-warning back_bt">Back</a>
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
$("#menu").addClass('active');
</script>    

  