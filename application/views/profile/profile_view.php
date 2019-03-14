

<!-- Profile section -->



<section class="profile-sec">

  <div class="container-fluid">

    <div class="row">

      <div class="col-lg-3">

        <div class="profile-show-area"> 
     
          <?php if($res_user['image']) { ?>
        <img src="<?php echo $res_user['image']; ?>" class="rounded-circle mx-auto d-table" alt="">
       
          
       <?php } else{?>
                      <img src="http://www.wakachurch.com/front_assets/images/user.png" class="rounded-circle mx-auto d-table" alt="">
        <?php }?>

          <h4 class="my-3 text-center"><?php echo $res_user['name']; ?></h4>

        </div>

      </div>

      <div class="col-lg-9">

        <div class="profile-form-field">

          <div class="row">

                  <div class="col-lg-12 mb-3">

                      <div class="field-area">                     

                        <p class="font-weight-bold"><i class="far fa-user"></i> Basic Info</p>

                          <div class="row">

                                <?php 

                                $name = $res_user['name'];

                                $exp_name = explode(' ',$name);

                                ?>

                                <div class="col-lg-6">

                                  <div class="form-group">

                                    <strong>First Name:</strong> <?php if(isset($exp_name[0])){echo $exp_name[0];} ?>

                                  </div>

                                </div>

                                <div class="col-lg-6">

                                  <div class="form-group">

                                    <strong>Last Name: </strong><?php if(isset($exp_name[1])){echo $exp_name[1].' ';} ?><?php if(isset($exp_name[2])){echo $exp_name[2];} ?>

                                  </div>

                                </div>

                                <div class="col-lg-6">

                                  <div class="form-group">

                                    <strong>Email: </strong><?php echo $res_user['email']; ?>

                                  </div>

                                </div>                   

                                <div class="col-lg-6">

                                  <div class="form-group">

                                    <strong>City: </strong><?php echo $res_user['city']; ?>

                                  </div>

                                </div>

                                <div class="col-lg-6">

                                  <div class="form-group">

                                    <strong>State: </strong><?php echo $res_user['state']; ?>

                                  </div>

                                </div> 

                                <div class="col-lg-6">

                                  <div class="form-group">

                                    <strong>Country: </strong><?php echo $res_user['country']; ?>

                                  </div>

                                </div>

                                <div class="col-lg-6" style="display:none">

                                  <div class="form-group" style="display:none">

                                    <strong>Postcode: </strong><?php echo $res_user['postcode']; ?>

                                  </div>

                                </div> 

                                <div class="col-lg-6">

                                  <div class="form-group">

                                    <strong>Address: </strong><?php echo $res_user['address']; ?>

                                  </div>

                                </div>                                                                                                       

                          </div>

                      </div>

                  </div>

                  <div class="col-lg-12 mb-3">

                    <div class="field-area">

                      <p class="font-weight-bold"><i class="fas fa-user-plus"></i> Follow &amp; Contact</p>

                        <div class="row">

                           <div class="col-lg-6">

                              <div class="form-group">

                                <strong>Phone Number: </strong><?php echo $res_user['phone_number']; ?>

                              </div>

                            </div>

                            <div class="col-lg-6">

                              <div class="form-group">

                                <strong>Website: </strong><?php echo $res_user['url']; ?>

                              </div>

                            </div>

                        </div>                        

                    </div>

                  </div>                

          </div>

        </div>

      </div>

    </div>

  </div>

</section>



<!-- Profile section close --> 