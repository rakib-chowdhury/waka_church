<?php //echo "<pre>"; print_r($user);die; ?>
<section class="content">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $user['name']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
                  <?php if(!empty($user['image'])){ ?>
                    <img alt="User Pic" src="<?php echo $user['image'];?>" class="img-square img-responsive" style="width: 100%;">
                  <?php }else{ ?>
                    <img alt="User Pic" src="<?php echo base_url(); ?>/assets/images/dummyuser.jpg" class="img-square img-responsive" style="width: 100%;">
                  <?php } ?>
                </div>
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Email:</td>
                        <td><?php echo $user['email'];?></td>
                      </tr>
                      <tr>
                        <td>Phone Number:</td>
                        <td><?php echo $user['phone_number'];?></td>
                      </tr>
                      <tr>
                        <td>Url:</td>
                        <td><?php echo $user['url'];?></td>
                      </tr>                      
                      <tr>
                        <td>Address</td>
                        <td><?php echo $user['address'];?></td>
                      </tr>
                      <tr>
                        <td>City</td>
                        <td><?php echo $user['city'];?></td>
                      </tr>
                      <tr>
                        <td>State</td>
                        <td><?php echo $user['state'];?></td>
                      </tr>                      
                      <tr>
                        <td>Country</td>
                        <td><?php echo $user['country'];?></td>
                      </tr>
                      <tr>
                        <td>Postcode</td>
                        <td><?php echo $user['postcode'];?></td>
                      </tr>                                                                  
                      <tr>
                        <td>Status</td>
                        <td><?php 
                            if($user['status'] == 1){
                              echo "Active";
                            }else{
                              echo "Inactive";
                            }
                            ?>
                        </td>
                      </tr> 
                      <tr>
                        <td>Date Created</td>
                        <td><?php echo $user['date_created'];?></td>
                      </tr> 
                      <tr>
                        <td>Date Modified</td>
                        <td><?php echo $user['date_modified'];?></td>
                      </tr>                                                               
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
            <div class="panel-footer back_bt">
                <a href="<?php echo base_url('admin/users'); ?>" class="btn btn-warning back_bt"><?php if($this->lang->line('back_btn')){echo $this->lang->line('back_btn');}else{ echo "Back";} ?></a>
            </div>
      </div>
    </div>
  </div>  
</section> 
<script>
  $("#users").addClass('active');
</script>