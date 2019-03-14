  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <div class="box box-info">        
          <div class="box-header with-border">
            <h3 class="box-title">Event List</h3>
            </div>
             <div class="box-body table-responsive">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>ID</th>
                      <th>User Name</th>   
                      <th>Event Name</th>
                      <th>Event Date</th>
                      <th>Event Start</th>
                      <th>Event End</th>
                      <th>Status</th>
                      <th>Review Option</th>   
                      <th>Action</th>   
                    </tr>
                  </thead>
                  
                  <tbody>
                    <?php
                    if( !empty($event_list) ){
                      foreach( $event_list as $list ){
                        if( $list['status']==1 ){  
                          $status='<strong><font color="green">Approved</font></strong>';
                          $opp_stat = 0;
                        }else{
                          $status='<strong><font color="red">Pending</font></strong>';
                          $opp_stat = 1;
                        }
                        ?>
                        <tr>
                          <td><?php echo $list['event_id'];?></td>
                          <td><a href="<?php echo base_url(); ?>admin/users/view/<?php echo $list['user_id']; ?>"><?php echo $list['user_name'];?></a></td>
                          <td><?php echo $list['event_name'];?></td>                      
                          <td><?php echo $list['event_date'];?></td>
                          <td><?php echo $list['event_start'];?></td>
                          <td><?php echo $list['event_end'];?></td>                       
                          <td><a href="<?php echo base_url('admin/event/status_change/'.$list['event_id'].'/'.$opp_stat);?>"><?php echo $status;?></a></td>
                          <td><a class="btn btn-primary btn-xs" href="<?php echo base_url('admin/event_reviews/index/'.$list['event_id'].'/'.'event');?>">Show Reviews</a></td> 
                          <td>
                            <a href="<?php echo base_url('admin/event/view/'.$list['event_id']);?>" class="btn btn-warning btn-flat">View</a>
                            <a href="<?php echo base_url('admin/event/edit/'.$list['event_id']);?>" class="btn btn-info btn-flat">Edit</a>
                            <input type="button" onclick="ConfirmDelete(<?php echo $list['event_id']; ?>)" value="Delete" class="btn btn-danger btn-flat"></td>     
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
$("#event").addClass('active'); 
function ConfirmDelete(ID){
  var gourl = '<?= base_url('admin/event/del/'); ?>'+ID;
      if (confirm("Are you sure you want to delete this data?"))
           location.href = gourl;
}
</script> 