  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">        
          <div class="box-header with-border">
            <h3 class="box-title">Menu List</h3>
            <a style="float: right; width: 15%;" href="<?= base_url('admin/menu/add'); ?>" class="btn btn-default btn-xs">Add</a>
            </div>
             <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>Menu Name</th>   
                      <th>Menu Category</th>
                      <th>Menu Link</th>
                      <th>Menu Order</th>
                      <th>Status</th>  
                      <th>Action</th>   
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    if( !empty($menu_list) ){
                      foreach( $menu_list as $list ){
                        if( $list['status']==1 ){  
                          $status='<strong><font color="green">Active</font></strong>';
                          $opp_stat = 0;
                        }else{
                          $status='<strong><font color="red">Inactive</font></strong>';
                          $opp_stat = 1;
                        }
                        ?>
                        <tr>
                          <td><?php echo $list['menu_id'];?></td>
                          <td><?php echo $list['menu_name'];?></td>                      
                          <td><?php echo ucwords(str_replace("_"," ",$list['menu_category']));?></td>
                          <td><?php echo $list['menu_link'];?></td>
                          <td><?php echo $list['menu_order'];?></td>                     
                          <td><a href="<?php echo base_url('admin/menu/status_change/'.$list['menu_id'].'/'.$opp_stat);?>"><?php echo $status;?></a></td>
                          <td>
                            <a href="<?php echo base_url('admin/menu/edit/'.$list['menu_id']);?>" class="btn btn-info btn-flat">Edit</a>
                            <input type="button" onclick="ConfirmDelete(<?php echo $list['menu_id']; ?>)" value="Delete" class="btn btn-danger btn-flat"></td>     
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
$("#menu").addClass('active'); 
function ConfirmDelete(ID){
  var gourl = '<?= base_url('admin/menu/del/'); ?>'+ID;
      if (confirm("Are you sure you want to delete this data?"))
           location.href = gourl;
}
</script> 