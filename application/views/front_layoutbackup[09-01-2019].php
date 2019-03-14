<!doctype html><?php //echo "<pre>"; print_r($settings); die;?>
<html lang="en">
<head>
<!-- Required meta tags -->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Waka Church</title>
<link rel="icon" href="fav.ico">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<!-- Custom css -->
<link rel="stylesheet" href="<?= base_url() ?>front_assets/css/style.css">
<!-- Custom fonts for this template -->
<link href="<?= base_url() ?>front_assets/fonts/css/all.min.css" rel="stylesheet" type="text/css">
<!-- Carouse Css -->
<link rel="stylesheet" type="text/css" href="<?= base_url() ?>front_assets/css/owl.carousel.css" />
<!-- Light Box Css -->
<link href="<?= base_url() ?>front_assets/css/darkbox.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" href="<?= base_url() ?>front_assets/css/SelectBox.css">
<link href="<?= base_url() ?>front_assets/css/jquery.datetimepicker.css" rel="stylesheet" type="text/css">
<!-- Date Picker -->
<script src="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/js/gijgo.min.js" type="text/javascript"></script>
<link href="https://cdn.jsdelivr.net/npm/gijgo@1.9.10/css/gijgo.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
<!-- <button onclick="topFunction()" id="myBtn" title="Go to top"><img src="images/top.png" alt=""></button> --> 
<!-- Header -->
<header>
  <section class="header-top-area" id="navbar">
    <div class="container">
      <div class="row">
        <div class="col-md-4 col-lg-3 align-self-center">
          <div class="logo"> <a href="<?php echo base_url(); ?>"><img src="<?php echo $settings[0]['logo']; ?>" class="img-fluid" alt=""></a> </div>
        </div>
        <div class="col-md-8 col-lg-9 align-self-center d-flex justify-content-lg-end mt-2 mt-md-0 mt-lg-0"> 
          
          <!-- Navigation -->
          
          <nav class="navbar navbar-expand-lg navbar-light align-self-center">
            <button class="navbar-toggler navbar-toggler-rightq" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"> <i class="fas fa-bars"></i> </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
              <ul class="navbar-nav ml-auto">
                <?php foreach($header_menu as $head_menu){ ?>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo $head_menu['menu_link']; ?>"><?php echo $head_menu['menu_name']; ?></a></li>
                <?php } ?>

                <?php if(!$this->session->userdata('user_sess_data')){
                $user_sess_data = $this->session->userdata('user_sess_data');?>
                <li><a href="#" class="modal-anchor nav-link" data-toggle="modal" data-target="#log">Add Event</a></li>
                <li><a href="#" class="modal-anchor nav-link" data-toggle="modal" data-target="#log">Add Listing</a></li>
                <?php }else{ ?>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url("add_event"); ?>">Add Event</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo base_url("add_listing"); ?>">Add Listing</a></li>               
                <?php } ?>                    
              </ul>
            </div>
          </nav>
          <div class="reg-area align-self-center">
            <ul>
              <?php if(!$this->session->userdata('user_sess_data')){?>
              <li><a href="#" class="modal-anchor lgoin" data-toggle="modal" data-target="#log">Login</a></li>
              <li><a href="#" class="modal-anchor register" data-toggle="modal" data-target="#reg">Register</a></li>
              <?php }else{
              $user_sess_data = $this->session->userdata('user_sess_data');?>
              <li><a href="<?php echo base_url('users'); ?>" class="modal-anchor lgoin">My Profile</a></li>
              <li><a href="<?php echo base_url('users/logout'); ?>" class="modal-anchor register">Logout</a></li>                
              <?php } ?>  
              <div class="clearfix"></div>
            </ul>
          </div>
          
          <!-- Login -->
          <div class="modal fade" id="log" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header border-0">
                  <h5 class="modal-title" id="exampleModalLongTitle">Login</h5>
                  <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <i class="fas fa-times"></i> </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="login_frm">
                      <div class="form-modal">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="success_msg"></div>
                            <div class="error_msg"></div>
                          </div> 
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label>Email<sup>*</sup> : </label>
                              <input type="text" class="form-control" name="email">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label>Password<sup>*</sup> : </label>
                              <input type="password" class="form-control" name="password">
                            </div>
                          </div>
                          <div class="col-lg-12 mt-3">
                            <div class="row">
                              <div class="col-lg-6">
                                <label><!-- <input type="checkbox" aria-label="Checkbox for following text input">
                                  Remember me? --></label>
                              </div>
                              <div class="col-lg-6"> <a class="forget-pw float-right" href="#" data-toggle="modal" data-target="#forgot">Forgot password?</a> </div>
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <input type="submit" class="btn btn-secondary log_btn" value="Login" name="submit">
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Login -->

          <!-- Forgot -->
          <div class="modal fade" id="forgot" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header border-0">
                  <h5 class="modal-title" id="exampleModalLongTitle">Forgot Password</h5>
                  <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <i class="fas fa-times"></i> </button>
                </div>
                <div class="modal-body">
                    <form method="post" id="forgot_frm">
                      <div class="form-modal">
                        <div class="row">
                          <div class="col-lg-12">
                            <div class="success_msg"></div>
                            <div class="error_msg"></div>
                          </div> 
                          <div class="col-lg-12">
                            <div class="form-group">
                              <label>Email<sup>*</sup> : </label>
                              <input type="text" class="form-control" name="email">
                            </div>
                          </div>
                          <div class="col-lg-12">
                            <input type="submit" class="btn btn-secondary log_btn" value="Submit" name="submit">
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
              </div>
            </div>
          </div>
          <!-- Forgot -->          

          <!-- Register -->
          <div class="modal fade" id="reg" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header border-0">
                  <h5 class="modal-title" id="exampleModalLongTitle">Sign Up</h5>
                  <button type="button" class="close close-modal" data-dismiss="modal" aria-label="Close"> <i class="fas fa-times"></i> </button>
                </div>
                <div class="modal-body">
                  <div class="row">
                    <div class="col-lg-12">
                      <ul class="nav nav-pills mb-3 reg-area mx-auto d-flex" id="pills-tab" role="tablist">
                      <li class="nav-item">
                          <a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Want to be Registered?</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Want to be member?</a>
                        </li>
                      </ul>
                      <div class="tab-content" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
                          <form action="<?php echo base_url('add_listing'); ?>" method="post" id="register_frm">
                            <div class="form-modal">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Name<sup>*</sup> : </label>
                                    <input type="text" class="form-control" name="name">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Email<sup>*</sup> : </label>
                                    <input type="text" class="form-control" name="email">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Password<sup>*</sup> : </label>
                                    <input type="text" class="form-control" name="password">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>I agree to the terms and conditions <input type="checkbox" name="agree"></label>
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <input type="submit" class="btn btn-secondary reg_btn" value="Register">
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
      
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
                          <form method="post" id="register_member_frm">
                            <div class="form-modal">
                              <div class="row">
                                <div class="col-lg-12">
                                  <div class="success_msg"></div>
                                  <div class="error_msg"></div>
                                </div>                                
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Name<sup>*</sup> : </label>
                                    <input type="text" class="form-control" name="name">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Email<sup>*</sup> : </label>
                                    <input type="text" class="form-control" name="email">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Church : </label>
                                    <?php
                                    $church_query = $this->db->query("select listings_id,name from listings where ministry_options='church' and status = '1'");
                                    $church_row = $church_query->result_array();
                                    ?>
                                    <select class="form-control" name="listings_id1">
                                      <?php foreach($church_row as $church){ ?>
                                      <option value="<?php echo $church['listings_id']; ?>"><?php echo $church['name']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Choir : </label>
                                    <?php
                                    $choir_query = $this->db->query("select listings_id,name from listings where ministry_options='choir' and status = '1'");
                                    $choir_row = $choir_query->result_array();
                                    ?>
                                    <select class="form-control" name="listings_id2">
                                      <?php foreach($choir_row as $choir){ ?>
                                      <option value="<?php echo $choir['listings_id']; ?>"><?php echo $choir['name']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Band : </label>
                                    <?php
                                    $band_query = $this->db->query("select listings_id,name from listings where ministry_options='band' and status = '1'");
                                    $band_row = $band_query->result_array();
                                    ?>
                                    <select class="form-control" name="listings_id3">
                                      <?php foreach($band_row as $band){ ?>
                                      <option value="<?php echo $band['listings_id']; ?>"><?php echo $band['name']; ?></option>
                                      <?php } ?>
                                    </select>
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>Password<sup>*</sup> : </label>
                                    <input type="text" class="form-control" name="password">
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <div class="form-group">
                                    <label>I agree to the terms and conditions <input type="checkbox" name="agree"></label>
                                  </div>
                                </div>
                                <div class="col-lg-12">
                                  <input type="submit" class="btn btn-secondary reg_btn" value="Register" name="submit">
                                </div>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                  
                </div>
                
              </div>
            </div>
          </div>
          <!-- Register -->

        </div>
      </div>
    </div>
  </section>
  <?php if($this->uri->segment(1) == "" || $this->uri->segment(1) == "home"){ ?>
  <section class="banner-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="heading-part text-center">
            <h2 class="common-heading"><?php echo $settings[0]['banner_title']; ?></h2>
            <p class="text-white"><?php echo $settings[0]['banner_sub_title']; ?></p>
          </div>
        </div>
        <div class="col-lg-12 mt-5">
          
            <div class="banner-form">
              <ul class="nav" id="myTab" role="tablist">
                <li class="nav-item-tab"> <a class="nav-link-tab active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fas fa-list-ul"></i> Listing</a> </li>
                <li class="nav-item-tab"> <a class="nav-link-tab" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fas fa-calendar-alt"></i> Event</a> </li>
                <li class="nav-item-tab"> <a class="nav-link-tab" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false"><i class="fas fa-user-friends"></i> Friends</a> </li>
              </ul>
              <div class="tab-content search-tab-area" id="myTabContent">
				    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
				  				<?php
				  				  // LISTING FORM
				  				  echo form_open(base_url('search/listingByCatState'),'autocomplete="off"');  
				  				?>
				                    <div class="col-lg-12">
				                      <div class="row">
				                        <div class="col-lg-3 align-self-center">
				                          <div class="form-group mb-0">
				                            <input type="text" class="form-control" placeholder="What are you looking for?" name="name" id="name">
				                          </div>
				                        </div>
				                        <div class="col-lg-3 align-self-center">
				                          <div class="form-group mb-0">
				                            <select class="form-control" name="state" id="state">
				                              <option value="">Select State</option>
				                              <option value="lagos">Lagos</option>
				                              <option value="abuja">Abuja</option>
				                              <option value="abia">Abia</option>
				                              <option value="adamawa">Adamawa</option>
				                              <option value="akwa ibom">Akwa Ibom</option>
				                              <option value="anambra">Anambra</option>
				                              <option value="bauchi">Bauchi</option>
				                              <option value="bayelsa">Bayelsa</option>
				                              <option value="benue">Benue</option>
				                              <option value="borno">Borno</option>
				                              <option value="cross river">Cross River</option>
				                              <option value="delta">Delta</option>
				                              <option value="ebonyi">Ebonyi</option>
				                              <option value="enugu">Enugu</option>
				                              <option value="edo">Edo</option>
				                              <option value="ekiti">Ekiti</option>
				                              <option value="gombe">Gombe</option>
				                              <option value="imo">Imo</option>
				                              <option value="jigawa">Jigawa</option>
				                              <option value="kaduna">Kaduna</option>
				                              <option value="kano">Kano</option>
				                              <option value="kastina">Kastina</option>
				                              <option value="kebbi">Kebbi</option>
				                              <option value="kogi">Kogi</option>
				                              <option value="kwara">Kwara</option>
				                              <option value="nasarawa">Nasarawa</option>
				                              <option value="niger" >Niger</option>
				                              <option value="ogun">Ogun</option>
				                              <option value="ondo">Ondo</option>
				                              <option value="osun">Osun</option>
				                              <option value="oyo">Oyo</option>
				                              <option value="plateau">Plateau</option>
				                              <option value="rivers">Rivers</option>
				                              <option value="sokoto">Sokoto</option>
				                              <option value="taraba">Taraba</option>
				                              <option value="yobe">Yobe</option>
				                              <option value="zamfara">Zamfara</option>   
				                            </select>
				                          </div>
				                        </div>
				                        <div class="col-lg-3 align-self-center">
				                          <div class="form-group mb-0">
				                            <select class="form-control" name="ministry_options" id="ministry_options" >
				                              <option value="">Select Category</option>
				                              <option value="church">Church</option>
				                              <option value="choir">Choir</option>
				                              <option value="band">Band</option>
				                              <<!-- option>Events</option> -->
				                            </select>
				                          </div>
				                        </div>
				                        <div class="col-lg-3 align-self-center">
				                          <div class="form-btn-area">
				                            <button class="ml-3 red-bg align-self-center"><i class="fas fa-search"></i> Search Now</button>
				                          </div>
				                        </div>
				                      </div>
				                    </div>
				  				<?php
				  				  echo form_close();  
				  				  // END LISTING FORM
				  				?>
				    </div>
				    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
								<?php
								  // EVENT FORM   
								  echo form_open(base_url('search/eventByTimeState'),'autocomplete="off"');  
								?>
				                  <div class="col-lg-12">
				                    <div class="row">
				                      <div class="col-lg-2 align-self-center">
				                        <div class="form-group mb-0">
                                  <input type="text" class="form-control" placeholder="Event Date" name="event_date" id="top_event_date">
				                        </div>
				                      </div>

				            					<div class="col-lg-3 align-self-center">
				            						<div class="form-group mb-0">
                                    <input type="text" class="form-control" placeholder="Start Time" name="event_start" id="top_event_start">
				            						</div>
				            					</div>
									
				            					<div class="col-lg-3 align-self-center">
				            						<div class="form-group mb-0">   
                                    <input type="text" class="form-control" placeholder="End Time" name="event_end" id="top_event_end">
				            						</div>
				            					</div>
				                      
				                      <div class="col-lg-2 align-self-center">
				                        <div class="form-group mb-0">
				                          <select class="form-control" name="state" id="state" >
				                            <option value="">Select State</option>
				                            <option value="lagos">Lagos</option>
				                            <option value="abuja">Abuja</option>
				                            <option value="abia">Abia</option>
				                            <option value="adamawa">Adamawa</option>
				                            <option value="akwa ibom">Akwa Ibom</option>
				                            <option value="anambra">Anambra</option>
				                            <option value="bauchi">Bauchi</option>
				                            <option value="bayelsa">Bayelsa</option>
				                            <option value="benue">Benue</option>
				                            <option value="borno">Borno</option>
				                            <option value="cross river">Cross River</option>
				                            <option value="delta">Delta</option>
				                            <option value="ebonyi">Ebonyi</option>
				                            <option value="enugu">Enugu</option>
				                            <option value="edo">Edo</option>
				                            <option value="ekiti">Ekiti</option>
				                            <option value="gombe">Gombe</option>
				                            <option value="imo">Imo</option>
				                            <option value="jigawa">Jigawa</option>
				                            <option value="kaduna">Kaduna</option>
				                            <option value="kano">Kano</option>
				                            <option value="kastina">Kastina</option>
				                            <option value="kebbi">Kebbi</option>
				                            <option value="kogi">Kogi</option>
				                            <option value="kwara">Kwara</option>
				                            <option value="nasarawa">Nasarawa</option>
				                            <option value="niger" >Niger</option>
				                            <option value="ogun">Ogun</option>
				                            <option value="ondo">Ondo</option>
				                            <option value="osun">Osun</option>
				                            <option value="oyo">Oyo</option>
				                            <option value="plateau">Plateau</option>
				                            <option value="rivers">Rivers</option>
				                            <option value="sokoto">Sokoto</option>
				                            <option value="taraba">Taraba</option>
				                            <option value="yobe">Yobe</option>
				                            <option value="zamfara">Zamfara</option>  
				                          </select>
				                        </div>
				                      </div>
				                      <div class="col-lg-2 align-self-center">
				                        <div class="form-btn-area">
				                          <button class="ml-3 red-bg align-self-center"><i class="fas fa-search"></i> Search Now</button>
				                        </div>
				                      </div>
				                      
				                    </div>
				               </div>
				          				<?php
				          				  echo form_close();  
				          				  // END EVENT FORM
				          				?>
				    </div>
			        <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
			                  <?php
			                    // FRIEND FORM
			                    echo form_open(base_url('search/listingByNameCat'),'autocomplete="off"');     
			                  ?>
			                  <div class="col-lg-12">
			                    <div class="row">
			                      <div class="col-lg-5 align-self-center">
			                        <div class="form-group mb-0">
			                          <input type="text" class="form-control" placeholder="Name" name="frd_name" id="frd_name" onkeyup="listing()">
			                        </div>
			                      </div>
			                      <!-- <div class="col-lg-3 align-self-center">
			                        <div class="form-group mb-0">
			                          <input type="text" class="form-control" placeholder="Place">
			                        </div>
			                      </div> -->
			                      <div class="col-lg-4 align-self-center">
			                        <div class="form-group mb-0">
			                          <select class="form-control" name="frd_cat" id="frd_cat" onchange="listing()">
			                            <option value="" >Category</option>
			                            <option value="church" >Church</option>
			                            <option value="choir" >Choir</option>
			                            <option value="band" >Band</option>
			                          </select>
			                        </div>
			                      </div>
			                      <div class="col-lg-3 align-self-center">
			                        <div class="form-btn-area">
			                          <button class="ml-3 red-bg align-self-center"><i class="fas fa-search"></i> Search Now</button>
			                        </div>
			                      </div>
			                    </div>
			                  </div>
			                  <?php
			                    echo form_close();  
			                    // END FRIEND FORM   
			                  ?>
			        </div>
              </div>
              <span id="frd_listing"></span>
            </div>
       
        </div>
        <div class="col-lg-12 pt-5 mt-5">
          <div class="listing-list">
            <div class="col-md-12 col-lg-12">
              <div class="row">
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                  <div class="each-icon-banner"> <span class="d-block text-white"><!-- <i class="fas fa-church"></i> --> 
                    
                    <img src="<?php echo $settings[0]['top_church_icon']; ?>" class="img-fluid d-table mx-auto" alt=""> 
                    
                    </span> <a class="nu my-3 d-inline-block" href="listing.html"><?php echo $settings[0]['top_church_title']; ?></a> 
                    
                    <!-- <p>Add and Search for churches,choirs & bands.</p> --> 
                    
                  </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                  <div class="each-icon-banner"> <span class="d-block text-white"><!-- <i class="fas fa-users"></i> --> 
                    
                    <img src="<?php echo $settings[0]['top_choir_icon']; ?>" class="img-fluid d-table mx-auto" alt=""> 
                    
                    </span> <a class="nu my-3 d-inline-block" href="listing.html"> <?php echo $settings[0]['top_choir_title']; ?></a> 
                    
                    <!-- <p>Review and rate churches, choirs & bands</p> --> 
                    
                  </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                  <div class="each-icon-banner"> <span class="d-block text-white"><!-- <i class="fas fa-handshake"></i> --> 
                    
                     <img src="<?php echo $settings[0]['top_band_icon']; ?>" class="img-fluid d-table mx-auto" alt=""> 
                    
                    </span> <a class="nu my-3 d-inline-block" href="listing.html"> <?php echo $settings[0]['top_band_title']; ?> </a> 
                    
                    <!-- <p>Search for nearby churches.</p> --> 
                    
                  </div>
                </div>
                <div class="col-6 col-sm-6 col-md-6 col-lg-3">
                  <div class="each-icon-banner"> <span class="d-block text-white"><!-- <i class="fas fa-calendar-alt"></i> --> 
                    
                    <img src="<?php echo $settings[0]['top_event_icon']; ?>" class="img-fluid d-table mx-auto" alt=""> 
                    
                    </span> <a class="nu my-3 d-inline-block" href="listing.html"> <?php echo $settings[0]['top_event_title']; ?></a> 
                    
                    <!-- <p>Add and share your Events.</p> --> 
                    
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <?php } ?>
</header>
<!-- Header --> 

<?php $this->load->view($view);?>

<!-- Footer -->
<footer>
  <section class="footer-top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="footer-nav">
            <ul class="d-table mx-auto mb-3">
              <?php foreach($footer_menu as $foot_menu){ ?>
                    <li><a href="<?php echo $foot_menu['menu_link']; ?>"><?php echo $foot_menu['menu_name']; ?></a></li>
              <?php } ?>
            </ul>
          </div>
        </div>
        <div class="col-sm-12 col-md-8 col-lg-6 d-flex align-self-center"> <img src="<?= base_url() ?>front_assets/images/footer-logo.png" class="align-self-center" alt="">
          <p class="align-self-center m-0 ml-3 font-weight-bold nu"><?php echo $settings[0]['copyright']; ?></p>
        </div>
        <div class="col-sm-12 col-md-4 col-lg-6 align-self-center">
          <ul class="float-lg-right">
            <li><a href="<?php echo $settings[0]['facebook_link']; ?>" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
            <li><a href="<?php echo $settings[0]['twitter_link']; ?>" target="_blank"><i class="fab fa-twitter"></i></a></li>
            <li><a href="<?php echo $settings[0]['googleplus_link']; ?>" target="_blank"><i class="fab fa-google-plus-g"></i></a></li>
            <li><a href="<?php echo $settings[0]['instagram_link']; ?>" target="_blank"><i class="fab fa-instagram"></i></a></li>
            <li><a href="<?php echo $settings[0]['youtube_link']; ?>" target="_blank"><i class="fab fa-youtube"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </section>
</footer>
<!-- Footer Close --> 
<!-- Optional JavaScript --> 
<!-- jQuery first, then Popper.js, then Bootstrap JS --> 
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> --> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> 
<script type="text/javascript" src="<?= base_url() ?>front_assets/js/jquery.validate.js"></script> 
<script type="text/javascript" src="<?= base_url() ?>front_assets/js/owl.carousel.js"></script> 
<script src="<?= base_url() ?>front_assets/js/darkbox.js"></script> 
<script src="<?= base_url() ?>front_assets/js/darkbox.js"></script> 
<script src="<?= base_url() ?>front_assets/js/review.js"></script>
<script src="<?= base_url() ?>front_assets/js/SelectBox.js"></script>
<script src="<?= base_url() ?>front_assets/js/jquery.datetimepicker.js"></script>



<script>
  //register form  
  $(document).ready(function() {
    $("form#register_frm").validate({
      ignore: [],
      debug: false,
      rules: {
        name: "required",
        email:  { required: true, email: true },
        password: "required",
        agree: "required"
      },

      messages: {
        name: "Please provide Name",
        email:  { required: "Email Required", email: "Provide Valid Email" },
        password: "Please provide Password",
        agree: "Please Agree the terms and conditions!"
      }     
    });
  });

  //register member form  
  $(document).ready(function() {
    $("form#register_member_frm").validate({
      ignore: [],
      debug: false,
      rules: {
        name: "required",
        email:  { required: true, email: true },
        password: "required",
        listings_id1:"required",
        listings_id2:"required",
        listings_id3:"required",
        agree: "required"
      },

      messages: {
        name: "Please provide Name",
        email:  { required: "Email Required", email: "Provide Valid Email" },
        password: "Please provide Password",
        listings_id1:"Please Provide Church",
        listings_id2:"Please Provide Church",
        listings_id3:"Please Provide Band",
        agree: "Please Agree the terms and conditions!"
      },
        submitHandler: function(form) {
          var formData = new FormData(form);
          $.ajax({
              type: "POST",
              url: "<?php echo base_url('add_listing/add_member_data'); ?>",
              data: formData,
              dataType: "html",
              success: function(data){
                  if(data == 1){
                    $(".success_msg").text("Registered Successfully.Please Login.");
                  }else if(data = 2){
                    $(".error_msg").text("Your Email already exist...");
                  }else if(data = 0){
                    $(".error_msg").text("Error in uploading Details...");
                  }
              },
              cache: false,
              contentType: false,
              processData: false
          });
        }           
    });
  }); 

  //login form  
  $(document).ready(function() {
    $("form#login_frm").validate({
      ignore: [],
      debug: false,
      rules: {
        email:  { required: true, email: true },
        password: "required",
      },

      messages: {
        email:  { required: "Email Required", email: "Provide Valid Email" },
        password: "Please provide Password",
      },
        submitHandler: function(form) {
          var formData = new FormData(form);
          $.ajax({
              type: "POST",
              url: "<?php echo base_url('users/login'); ?>",
              data: formData,
              dataType: "html",
              success: function(data){
                  if(data == 1){
                    $(".success_msg").text("Logged in Successfully...");
                    setTimeout("window.location.href='<?php echo base_url() ?>';",500);
                  }else if(data = 2){
                    $(".error_msg").text("Your Email Not exist...");
                  }else if(data = 3){
                    $(".error_msg").text("Your Email is not active...");
                  }
              },
              cache: false,
              contentType: false,
              processData: false
          });
        }           
    });
  }); 

  //forgot form  
  $(document).ready(function() {
    $("form#forgot_frm").validate({
      ignore: [],
      debug: false,
      rules: {
        email:  { required: true, email: true }
      },

      messages: {
        email:  { required: "Email Required", email: "Provide Valid Email" }
      },
        submitHandler: function(form) {
          var formData = new FormData(form);
          $.ajax({
              type: "POST",
              url: "<?php echo base_url('users/reset_password_request'); ?>",
              data: formData,
              dataType: "html",
              success: function(data){
                  if(data == 1){
                    $(".success_msg").text("Mail sent with otp.");
                    setTimeout("window.location.href='<?php echo base_url() ?>';",500);
                  }else if(data = 2){
                    $(".error_msg").text("Invalid Email");
                  }else if(data = 3){
                    $(".error_msg").text("Please Provide Email");
                  }else if(data = 4){
                    $(".error_msg").text("Email Required");
                  }
              },
              cache: false,
              contentType: false,
              processData: false
          });
        }           
    });
  }); 

  //Reset form  
  $(document).ready(function() {
    $("form#reset_frm").validate({
      ignore: [],
      debug: false,
      rules: {
        otp: "required",
        email:  { required: true, email: true },
        new_password: "required"
      },

      messages: {
        otp: "Otp Required",
        email:  { required: "Email Required", email: "Provide Valid Email" },
        new_password: "New Password Required"
      },
        submitHandler: function(form) {
          var formData = new FormData(form);
          $.ajax({
              type: "POST",
              url: "<?php echo base_url('users/reset_password'); ?>",
              data: formData,
              dataType: "html",
              success: function(data){
                  if(data == 1){
                    $(".success_msg").text("Password Resetted Successfully!");
                    setTimeout("window.location.href='<?php echo base_url() ?>';",500);
                  }else if(data = 2){
                    $(".error_msg").text("Email or Otp Not Matched!");
                  }else if(data = 3){
                    $(".error_msg").text("All fields are required");
                  }
              },
              cache: false,
              contentType: false,
              processData: false
          });
        }           
    });
  });    

function listing() { 
var frd_name = $('#frd_name').val();    
var frd_cat = $('#frd_cat').val();    
	$.ajax({
	type: 'POST',             
	url: "<?php echo base_url();?>Search/ajaxListingByNameCat",        
	data:'frd_name='+frd_name,                 
	    beforeSend: function () {   
	    //$('.loading-overlay').show();  
	    },  
	    success: function (html) {     
	      $('#frd_listing').html(html);  
	    }    
	});
}    
</script>


<script>
  window.onscroll = function() {myFunction()};
  var navbar = document.getElementById("navbar");
  var sticky = navbar.offsetTop;
  function myFunction() {
    if (window.pageYOffset >= sticky) {
      navbar.classList.add("sticky")
    } else {
      navbar.classList.remove("sticky");
    }
  }
</script> 

<script type="text/javascript">
  $(document).ready(function() {
  var owls = $("#owl-demo1");
  owls.owlCarousel({
  items : 4,
  itemsDesktop : [1000,3],
  itemsDesktopSmall : [992,2],
  itemsTablet: [767,2],
  itemsMobile : [576,1],
  autoPlay: true,
  autoPlayTimeout: 100
  });        
  // Custom Navigation Events
  $("#next").click(function(e){
  e.preventDefault();
    owls.trigger('owl.next');
  })
  $("#prev").click(function(e){
  e.preventDefault();
    owls.trigger('owl.prev');
  })
  var owlss = $("#owl-demo2");
  owlss.owlCarousel({
  items : 5,
  itemsDesktop : [1000,4],
  itemsDesktopSmall : [992,3],
  itemsTablet: [767,2],
  itemsMobile : [576,1],
  autoPlay: true,
  autoPlayTimeout: 100
  }); 
  // Custom Navigation Events
  $("#next-sc").click(function(e){
  e.preventDefault();
    owlss.trigger('owl.next');
  })
  $("#prev-sc").click(function(e){
  e.preventDefault();
    owlss.trigger('owl.prev');
  }) 
  });

  $(document).ready(function() {
  var owls = $("#owl-demo3");
  owls.owlCarousel({
  items : 1,
  itemsDesktop : [1000,1],
  itemsDesktopSmall : [992,1],
  itemsTablet: [767,1],
  itemsMobile : [576,1],
  autoPlay: true,
  autoPlayTimeout: 100
  }); 

  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
  })
  }); 
</script> 

<!-- Light Box Js --> 
<script>
  $(document).ready(function(){  
      $('#event_date,#top_event_date').datetimepicker({
        timepicker:true,
        format:'Y-m-d h:i:s',
        formatDate:'YYYY-MM-DD H:i:s',
        minDate:new Date(),
        closeOnDateSelect: true
      });
      $('#top_event_date').datetimepicker({
        timepicker:false,
        format:'Y-m-d',
        formatDate:'YYYY-MM-DD',
        minDate:new Date(),
        closeOnDateSelect: true
      });      
      $('#event_start,#event_end,#top_event_start,#top_event_end').datetimepicker({
        datepicker:false,
        format: "h:i A",
        formatTime:'h:i A',
        step:5
        });     
    });

</script>

<!-- <script>
    $('select').SelectBox();
    var select = new SelectBox($('#favorites'));
    $('#btn-readonly').click(function() {
      select.readonly = !select.readonly;
    });

    $('#btn-disabled').click(function() {
      select.disabled = !select.disabled;
    });

    $('#btn-multiple').click(function() {
      select.multiple = !select.multiple;
    });

    $('#btn-render').click(function() {
      select.renderSelectBox();
    });

    $('#btn-show').click(function(event) {
      select.show(event);
    });

    $('#btn-hide').click(function() {
      select.hide();
    });

    $('#btn-destroy').click(function() {
      select.destroy();
    });

    function change(select) {
      console.log('onchange', select);
    }

    $('#favorites').change(function(event) {
      console.log(event.target);
    })

    setTimeout(function() {
      // 通过数据设置select
      select.options = [
        { label: 'A1', value: 'a1' },
        { label: 'News'},
        { label: 'Domestic News', value: 'news-1', inGroup: true },
        { label: 'International News', value: 'news-2', inGroup: true },
        { label: 'A2', value: 'A2' }
      ];
    }, 5000);
</script> -->
        
</body>
</html>