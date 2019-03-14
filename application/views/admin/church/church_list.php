  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">        
          <div class="box-header with-border">
            <h3 class="box-title">Church List</h3>
            <a style="float: right; width: 15%;" href="<?= base_url('admin/church/add'); ?>" class="btn btn-default btn-xs">Add</a> 
            </div>
             <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>   
                      <th>Ministry Options</th>
                      <th>Name</th>
                      <th>Status</th>
                      <th>Review Option</th>   
                      <th>Action</th>   
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    if( !empty($church_list) ){
                      foreach( $church_list as $list ){
                        if( $list['status']==1 ){  
                          $status='<strong><font color="green">Approved</font></strong>';
                          $opp_stat = 0;
                        }else{
                          $status='<strong><font color="red">Pending</font></strong>';
                          $opp_stat = 1;
                        }
                        ?>
                        <tr>
                          <td><?php echo $list['listings_id'];?></td>
                          <td><a href="<?php echo base_url(); ?>admin/users/view/<?php echo $list['user_id']; ?>"><?php echo $list['user_name'];?></a></td>
                          <td><?php echo $list['ministry_options'];?></td>
                          <td><?php echo $list['name'];?></td>
                          <td><a href="<?php echo base_url('admin/church/status_change/'.$list['listings_id'].'/'.$opp_stat);?>"><?php echo $status;?></a></td>
                          <td><a class="btn btn-primary btn-xs" href="<?php echo base_url('admin/listing_reviews/index/'.$list['listings_id'].'/'.'church');?>">Show Reviews</a>
                          </td> 
                          <td>
                            <a href="<?php echo base_url('admin/church/view/'.$list['listings_id']);?>" class="btn btn-warning btn-flat">View</a>
                            <a href="<?php echo base_url('admin/church/edit/'.$list['listings_id']);?>" class="btn btn-info btn-flat">Edit</a>
                            <input type="button" onclick="ConfirmDelete(<?php echo $list['listings_id']; ?>)" value="Delete" class="btn btn-danger btn-flat"></td>     
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
$("#church").addClass('active'); 
function ConfirmDelete(ID){
  var gourl = '<?= base_url('admin/church/del/'); ?>'+ID;
      if (confirm("Are you sure you want to delete this data?"))
           location.href = gourl;
}
</script> 