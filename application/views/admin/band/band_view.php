<?php //echo "<pre>"; print_r($details);die; ?>
<section class="content church_view">
  <div class="row">
    <div class="col-md-12">
      <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?php echo $details['name']; ?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> 
                  <?php if(!empty($details['thumbnail'])){ ?>
                    <img alt="details Pic" src="<?php echo $details['thumbnail'];?>" class="img-square img-responsive" style="width: 100%;">
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
                        <td class="cust_head"><strong>Ministry Options</strong></td>
                        <td><?php echo $details['ministry_options'];?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Slogan</strong></td>
                        <td><?php echo $details['slogan'];?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>State</strong></td>
                        <td><?php echo $details['state'];?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>working Hours</strong></td>
                        <td>
                            <ul> 
                                <li><?php echo ($details['mon_start'] && $details['mon_end']) ? 'Mon '.$details['mon_start'].' - '.$details['mon_end'] : 'Mon Closed';  ?></li>
                                <li><?php echo ($details['tue_start'] && $details['tue_end']) ? 'Tue '.$details['tue_start'].' - '.$details['tue_end'] : 'Tue Closed';  ?></li>
                                <li><?php echo ($details['wed_start'] && $details['wed_end']) ? 'Wed '.$details['wed_start'].' - '.$details['wed_end'] : 'Wed Closed';  ?></li>
                                <li><?php echo ($details['thu_start'] && $details['thu_end']) ? 'Thu '.$details['thu_start'].' - '.$details['thu_end'] : 'Thu Closed';  ?></li>
                                <li><?php echo ($details['fri_start'] && $details['fri_end']) ? 'Mon '.$details['fri_start'].' - '.$details['fri_end'] : 'Fri Closed';  ?></li>
                                <li><?php echo ($details['sat_start'] && $details['sat_end']) ? 'Mon '.$details['sat_start'].' - '.$details['sat_end'] : 'Sat Closed';  ?></li>
                                <li><?php echo ($details['sun_start'] && $details['sun_end']) ? 'Mon '.$details['sun_start'].' - '.$details['sun_end'] : 'Sun Closed';  ?></li>
                            </ul>
                        </td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>address</strong></td>
                        <td><?php echo $details['address'];?></td>
                      </tr>                      
                      <tr>
                        <td class="cust_head"><strong>Phone</strong></td>
                        <td><?php echo $details['phone'];?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Email</strong></td>
                        <td><?php echo $details['email'];?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Website</strong></td>
                        <td><?php echo $details['website'];?></td>
                      </tr> 
                      <tr>
                        <td class="cust_head"><strong>Facebook Url</strong></td>
                        <td><?php echo $details['facebook_url'];?></td>
                      </tr> 
                      <tr>
                        <td class="cust_head"><strong>Twitter Url</strong></td>
                        <td><?php echo $details['twitter_url'];?></td>
                      </tr> 
                      <tr>
                        <td class="cust_head"><strong>Instagram Url</strong></td>
                        <td><?php echo $details['instagram_url'];?></td>
                      </tr> 
                      <tr>
                        <td class="cust_head"><strong>Youtube Url</strong></td>
                        <td><?php echo $details['youtube_url'];?></td>
                      </tr> 
                      <tr>
                        <td class="cust_head"><strong>Faq Details</strong></td>
                        <td><?php echo $details['faq_details'];?></td>
                      </tr> 
                      <tr>
                        <td class="cust_head"><strong>Choir Dope Vocalist</strong></td>
                        <td><?php if($details['choir_dope_vocalist'] == 1){ echo "Yes"; }else{ echo "No"; }?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Choir Nice Backups</strong></td>
                        <td><?php if($details['choir_nice_backups'] == 1){ echo "Yes"; }else{ echo "No"; }?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Choir Kayboardist</strong></td>
                        <td><?php if($details['choir_keyboardist'] == 1){ echo "Yes"; }else{ echo "No"; }?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Choir Bassist</strong></td>
                        <td><?php if($details['choir_bassist'] == 1){ echo "Yes"; }else{ echo "No"; }?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Choir Talking Drummer</strong></td>
                        <td><?php if($details['choir_talking_drummer'] == 1){ echo "Yes"; }else{ echo "No"; }?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Choir Dope Music</strong></td>
                        <td><?php if($details['choir_dope_music'] == 1){ echo "Yes"; }else{ echo "No"; }?></td>
                      </tr> 
                      <tr>
                        <td class="cust_head"><strong>Choir Saxophonist</strong></td>
                        <td><?php if($details['choir_saxophonist'] == 1){ echo "Yes"; }else{ echo "No"; }?></td>
                      </tr>                                                                                                                                           
                      <tr>
                        <td class="cust_head"><strong>Choir Drummer</strong></td>
                        <td><?php if($details['choir_drummer'] == 1){ echo "Yes"; }else{ echo "No"; }?></td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Choir Guitarist</strong></td>
                        <td><?php if($details['choir_guitarist'] == 1){ echo "Yes"; }else{ echo "No"; }?></td>
                      </tr>         
                      <tr>
                        <td class="cust_head"><strong>Feature Images</strong></td>
                        <td>
                          <img src="<?php echo $details['feature_image1'];?>">
                          <img src="<?php echo $details['feature_image2'];?>">
                          <img src="<?php echo $details['feature_image2'];?>">
                        </td>
                      </tr>
                      <tr>
                        <td class="cust_head"><strong>Exterior Images</strong></td>
                        <td>
                          <img src="<?php echo $details['exterior_image1'];?>">
                          <img src="<?php echo $details['exterior_image2'];?>">
                          <img src="<?php echo $details['exterior_image3'];?>">
                        </td>
                      </tr>                                                                                                                         
                      <tr>
                        <td class="cust_head"><strong>Interior Image 1</strong></td>
                        <td>
                          <img src="<?php echo $details['interior_image1'];?>">
                          <img src="<?php echo $details['interior_image2'];?>">
                          <img src="<?php echo $details['interior_image3'];?>">
                        </td>
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
                <a href="<?php echo base_url('admin/band'); ?>" class="btn btn-warning back_bt"><?php if($this->lang->line('back_btn')){echo $this->lang->line('back_btn');}else{ echo "Back";} ?></a>
            </div>
      </div>
    </div>
  </div>  
</section> 
<script>
  $("#band").addClass('active');
</script>