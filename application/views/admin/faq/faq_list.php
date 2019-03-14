  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">        
          <div class="box-header with-border">
            <h3 class="box-title">Faq List</h3>

            <a style="float: right; width: 15%;" href="<?= base_url('admin/faq/add'); ?>" class="btn btn-default btn-xs">Add</a>

          </div>
             <div class="box-body">
               
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Faq ID</th>   
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>   
                    <th>Action</th>   
                  </tr>
                </thead>
                
                <tbody>
                  <?php
                  if( !empty($details) ){
                    foreach( $details as $record ){
                      if( $record['status']==1 ){  
                        $status='<strong><font color="green">Active</font></strong>';
                      }else{
                        $status='<strong><font color="red">Inactive</font></strong>';
                      }
                      ?>
                      <tr>
                        <td><?php echo $record['faq_id'];?></td>
                        <td><?php echo $record['title'];?></td>
                        <td style="width: 50%;"><?php echo $record['description'];?></td>
                        <td><?php echo $status;?></td> 
                        <td><a href="<?php echo base_url('admin/faq/edit/'.$record['faq_id']);?>" class="btn btn-info btn-flat">Edit</a><input type="button" onclick="ConfirmDelete(<?php echo $record['faq_id']; ?>)" value="Delete" class="btn btn-danger btn-flat"></td>     
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
$("#faq").addClass('active');  
function ConfirmDelete(ID){
  var gourl = '<?= base_url('admin/faq/del/'); ?>'+ID;
      if (confirm("Are you sure you want to delete this data?"))
           location.href = gourl;
}
</script> 