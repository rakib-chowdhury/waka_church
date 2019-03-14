  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">        
          <div class="box-header with-border">
            <h3 class="box-title">Cms Pages List</h3>

            <a style="float: right; width: 15%;" href="<?= base_url('admin/admin_cms/add'); ?>" class="btn btn-default btn-xs">Add</a>

          </div>
             <div class="box-body">
               
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Cms ID</th>   
                    <th>Page Slug</th>
                    <th>Page Title</th>
                    <th>Page Sub Title</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Action</th>   
                  </tr>
                </thead>
                
                <tbody>
                  <?php
                  if( !empty($details) ){
                    foreach( $details as $record ){?>
                      <tr>
                        <td><?php echo $record['id'];?></td>
                        <td><?php echo $record['page_slug'];?></td>
                        <td><?php echo $record['page_title'];?></td>
                        <td><?php echo $record['page_sub_title'];?></td>
                        <td style="width: 30%;"><?php echo $record['page_content'];?></td>
                        <td style="width: 10%;"><?php if(!empty($record['page_image'])){ echo '<img src="'.$record['page_image'].'">';}?></td>
                        <td><a href="<?php echo base_url('admin/admin_cms/edit/'.$record['id']);?>" class="btn btn-info btn-flat">Edit</a><input type="button" onclick="ConfirmDelete(<?php echo $record['id']; ?>)" value="Delete" class="btn btn-danger btn-flat"></td>     
                      </tr>
                  <?php
                    }
                  }
                  ?>
                 </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
  </section>


<script>
$("#cms").addClass('active');  
function ConfirmDelete(ID){
  var gourl = '<?= base_url('admin/admin_cms/del/'); ?>'+ID;
      if (confirm("Are you sure you want to delete this data?"))
           location.href = gourl;
}
</script> 