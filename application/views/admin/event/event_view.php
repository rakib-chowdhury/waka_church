<?php //echo "<pre>"; print_r($details);die; ?>
<section class="content church_view">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $details['event_name']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
                  <?php if(!empty($details['event_image'])){ ?>
                    <img alt="details Pic" src="<?php echo $details['event_image'];?>" class="img-square img-responsive" style="width: 100%;">
                  <?php }else{ ?>
                    <img alt="details Pic" src="<?php echo base_url(); ?>/assets/images/dummydetails.jpg" class="img-square img-responsive" style="width: 100%;">
                  <?php } ?>
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-details-information">
                    <tbody>
                      <tr>
                        <td class="cust_head"><strong>User Name</strong></td>
                        <td><?php echo $details['user_name'];?></td>
                      </tr>                      
                      <tr>
                        <td class="cust_head"><strong>Event Date</strong></td>
                        <td><?php echo $details['event_date'];?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Event Start</strong></td>
                        <td><?php echo $details['event_start'];?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Event End</strong></td>
                        <td><?php echo $details['event_end'];?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Details</strong></td>
                        <td><?php echo $details['details'];?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Host</strong></td>
                        <td><?php echo $details['host'];?></td>
                      </tr> 
                      <tr>
                        <td class="cust_head"><strong>State</strong></td>
                        <td><?php echo $details['state'];?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Address</strong></td>
                        <td><?php echo $details['address'];?></td>
                      </tr>                                                                                         
                      <tr>
                        <td class="cust_head"><strong>Status</strong></td>
                        <td><?php 
                              if( $details['status']==1 ){  
                                echo $status='<strong><font color="green">Approved</font></strong>';
                              }else{
                                echo $status='<strong><font color="red">Pending</font></strong>';
                              }
                            ?>
                        </td>
                      </tr> 
                      <tr>
                        <td class="cust_head"><strong>Date Created</strong></td>
                        <td><?php echo $details['date_created'];?></td>
                      </tr> 
                      <tr>
                        <td class="cust_head"><strong>Date Modified</strong></td>
                        <td><?php echo $details['date_modified'];?></td>
                      </tr>                                                               
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer back_bt">
                <a href="<?php echo base_url('admin/event'); ?>" class="btn btn-warning back_bt">Back</a>
            </div>
      </div>
    </div>
  </div>  
</section> 
<script>
  $("#event").addClass('active');
</script>