<section class="explre-states">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="heading-common text-center">
          <h2><?php echo $settings[0]['section1_title']; ?></h2>
          <p class="nu"><?php echo $settings[0]['section1_subtitile']; ?></p>
        </div>
      </div>
      <div class="col-md-12 col-lg-12">
        <div id="owl-demo1"><!-- class="row" -->
          <div class="col-md-12 col-lg-12"> <a href="<?php echo base_url(); ?>search/state_listing/lagos">
            <div class="each-explore text-white"> <img src="<?= base_url() ?>front_assets/images/explore1.jpg" class="img-fluid mx-auto d-table" alt="">
              <div class="explore-describe">
                <h3>lagos</h3>
                <p><?php echo $lagos_count; ?> listings</p>
              </div>
            </div>
            </a> </div>
          <div class="col-md-12 col-lg-12"> <a href="<?php echo base_url(); ?>search/state_listing/abuja">
            <div class="each-explore text-white"> <img src="<?= base_url() ?>front_assets/images/explore2.jpg" class="img-fluid mx-auto d-table" alt="">
              <div class="explore-describe">
                <h3>abuja</h3>
                <p><?php echo $abuja_count; ?> listings</p>
              </div>
            </div>
            </a> </div>
          <div class="col-md-12 col-lg-12"> <a href="<?php echo base_url(); ?>search/state_listing/oyo">
            <div class="each-explore text-white"> <img src="<?= base_url() ?>front_assets/images/explore3.jpg" class="img-fluid mx-auto d-table" alt="">
              <div class="explore-describe">
                <h3>oyo</h3>
                <p><?php echo $oyo_count; ?> listings</p>
              </div>
            </div>
            </a> </div>
          <div class="col-md-12 col-lg-12"> <a href="<?php echo base_url(); ?>search/state_listing/akwa">
            <div class="each-explore text-white"> <img src="<?= base_url() ?>front_assets/images/explore4.jpg" class="img-fluid mx-auto d-table" alt="">
              <div class="explore-describe">
                <h3>akwa ibom</h3>
                <p><?php echo $akwa_count; ?> listings</p>
              </div>
            </div>
            </a> </div>
          <div class="col-md-12 col-lg-12"> <a href="<?php echo base_url(); ?>search/state_listing/ogun">
            <div class="each-explore text-white"> <img src="<?= base_url() ?>front_assets/images/explore6.jpg" class="img-fluid mx-auto d-table" alt="">
              <div class="explore-describe">
                <h3>ogun</h3>
                <p><?php echo $ogun_count; ?> listings</p>
              </div>
            </div>
            </a> </div>
          <div class="col-md-12 col-lg-12"> <a href="<?php echo base_url(); ?>search/state_listing/kaduna">
            <div class="each-explore text-white"> <img src="<?= base_url() ?>front_assets/images/explore7.jpg" class="img-fluid mx-auto d-table" alt="">
              <div class="explore-describe">
                <h3>Kaduna</h3>
                <p><?php echo $kaduna_count; ?> listings</p>
              </div>
            </div>
            </a> </div>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="add-listing text-center">
          <div class="row">
            <div class="col-lg-12 text-white">
              <?php echo $settings[0]['section1_register_desc']; ?>
            </div>
            <div class="col-lg-12 mt-2 d-flex justify-content-center">
            <?php if(!$this->session->userdata('user_sess_data')){?>
              <a class="more-btn red-bg mx-2" href="#" data-toggle="modal" data-target="#log">Add Ministry</a> 
              <a class="more-btn red-bg mx-2" href="#" data-toggle="modal" data-target="#log">Add Event</a>                   
            <?php }else{ 
            /* if($this->session->userdata['user_sess_data']['is_member']!='1'){ */ ?>
              <a class="more-btn red-bg mx-2" href="<?php echo base_url("add_listing"); ?>">Add Ministry</a> 
           <?php //} ?>
              <a class="more-btn red-bg mx-2" href="<?php echo base_url("Add_Event"); ?>">Add Event</a>             
            <?php } ?> 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Explore States close --> 
<!-- Choirs Listing -->
<section class="choirs-listing">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="heading-common text-center">
          <h2><?php echo $settings[0]['section2_title']; ?></h2>
          <p><?php echo $settings[0]['section2_subtitle']; ?></p>
        </div>
      </div>
      <div class="col-md-12 col-lg-12">
        <div class="row">
            <?php 
              $i= 0;
            ?>
            <?php foreach($row_choir as $choir){ //echo "<pre>"; print_r($choir);
                $current_day = date('l'); 
                if($current_day == "Monday"){
                  if($choir['mon_start'] && $choir['mon_end']){
                      $choir_time = 'Monday '.$choir['mon_start'].' - '.$choir['mon_end'];
                  }else{
                      $choir_time = 'Monday Closed';
                  }
                }elseif($current_day == "Tuesday"){
                  if($choir['tue_start'] && $choir['tue_end']){
                      $choir_time = 'Tuesday '.$choir['tue_start'].' - '.$choir['tue_end'];
                  }else{
                      $choir_time = 'Tuesday Closed';
                  }           
                }elseif($current_day == "Wednesday"){
                 if($choir['wed_start'] && $choir['wed_end']){
                      $choir_time = 'Wednesday '.$choir['wed_start'].' - '.$choir['wed_end'];
                  }else{
                      $choir_time = 'Wednesday Closed';
                  }  
                }elseif($current_day == "Thursday"){
                 if($choir['thu_start'] && $choir['thu_end']){
                      $choir_time = 'Thursday '.$choir['thu_start'].' - '.$choir['thu_end'];
                  }else{
                      $choir_time = 'Thursday Closed';
                  }
                }elseif($current_day == "Friday"){
                 if($choir['fri_start'] && $choir['fri_end']){
                      $choir_time = 'Friday '.$choir['fri_start'].' - '.$choir['fri_end'];
                  }else{
                      $choir_time = 'Friday Closed';
                  }
                }elseif($current_day == "Saturday"){
                  if($choir['sat_start'] && $choir['sat_end']){
                      $choir_time = 'Saturday '.$choir['sat_start'].' - '.$choir['sat_end'];
                  }else{
                      $choir_time = 'Saturday Closed';
                  }
                }elseif($current_day == "Sunday"){
                  if($choir['sun_start'] && $choir['sun_end']){
                      $choir_time = 'Sunday '.$choir['sun_start'].' - '.$choir['sun_end'];
                  }else{
                      $choir_time = 'Sunday Closed';
                  }
                }                
                $choir_image = $choir["thumbnail"];
                $choir_name = $choir["name"];
                $choir_phone_number = $choir["phone_number"];
            ?>
                  <?php if($i == 0 || $i == 5){ ?>
                      <!--div class="col-md-12 col-lg-6 my-3" -->
                  <?php }else{?>
                  <?php } ?>
                      <div class="col-6 col-sm-6 col-md-6 col-lg-3 my-3">
                  <div class="each-choirs"> <img src="<?php echo $choir_image; ?>" class="img-fluid mx-auto d-table" alt=""> <a href="<?php echo base_url();?>listing/details/<?php echo $choir['listings_id']; ?>" class="link-listing"><i class="fas fa-eye"></i></a>
                    <div class="choirs-describe">
                      <p class="close-notice"><?php echo $choir_time; ?></p>
                      <h4 class="event-name"><?php echo $choir_name; ?></h4>
                      <ul class="event-address">
                        <li><i class="fas fa-phone"></i> <a href="tel:<?php echo str_replace(array("-"," ","(",")","_"),'',$choir_phone_number);?>"><?php echo $choir_phone_number; ?></a></li>
                      </ul>
                    </div>
                  </div>
                </div>              
            <?php $i++; } ?>
        </div>
      </div>
      <div class="col-lg-12 mt-2 d-flex justify-content-center">  
            <?php if(!$this->session->userdata('user_sess_data')){?>
              <a class="more-btn red-bg mx-2" href="#" data-toggle="modal" data-target="#log">Add More Listing</a> 
              <a class="more-btn red-bg mx-2" href="<?php echo base_url(); ?>/listing/index/choir">View More Listing</a>                                   
            <?php }else{ 
               if($this->session->userdata['user_sess_data']['is_member']!='1'){?>
              <a class="more-btn red-bg mx-2" href="<?php echo base_url("add_listing"); ?>">Add More Listing</a> 
           <?php } ?> 
              <a class="more-btn red-bg mx-2" href="<?php echo base_url(); ?>/listing/index/choir">View More Listing</a>             
            <?php } ?> 
      </div>
 <?php if(!$this->session->userdata('user_sess_data')){?>
      <div class="col-lg-12 mt-5">
        <div class="add-listing text-center">
          <div class="row">
            <div class="col-lg-12 text-white">
              <?php echo $settings[0]['section2_join_desc']; ?>
              <p class="d-flex justify-content-center">
                <img class="align-self-center" src="<?= base_url() ?>front_assets/images/register-icon.png" alt=""> 
                <span class="align-self-center ml-3"><b><?php echo $settings[0]['section2_join_subtitle']; ?></b></span>
              </p>
            </div>
            <div class="col-lg-12 mt-2 d-flex justify-content-center"> 
              <a href="#" class="more-btn red-bg mx-2" data-toggle="modal" data-target="#reg">Become a Member</a>
            </div>
          </div>
        </div>
      </div>
<?php } ?>
    </div>
  </div>
</section>
<!-- Choirs Listing close --> 
<!-- church listing -->
<section class="church-listing">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="heading-common text-center">
          <h2><span><?php echo $settings[0]['section3_title']; ?></h2>
          <p class="nu"><?php echo $settings[0]['section3_subtitle']; ?></p>
        </div>
      </div>
      <div class="col-md-12 col-lg-12">
        <div class="row">
          <?php //echo "<pre>"; print_r($row_church_random); ?>
          <?php foreach($row_church_random as $church_random){ 
              $current_day = date('l'); 
              if($current_day == "Monday"){
                if($church_random['mon_start'] && $church_random['mon_end']){
                    $church_random_time = 'Monday '.$church_random['mon_start'].' - '.$church_random['mon_end'];
                }else{
                    $church_random_time = 'Monday Closed';
                }
              }elseif($current_day == "Tuesday"){
                if($church_random['tue_start'] && $church_random['tue_end']){
                    $church_random_time = 'Tuesday '.$church_random['tue_start'].' - '.$church_random['tue_end'];
                }else{
                    $church_random_time = 'Tuesday Closed';
                }           
              }elseif($current_day == "Wednesday"){
               if($church_random['wed_start'] && $church_random['wed_end']){
                    $church_random_time = 'Wednesday '.$church_random['wed_start'].' - '.$church_random['wed_end'];
                }else{
                    $church_random_time = 'Wednesday Closed';
                }  
              }elseif($current_day == "Thursday"){
               if($church_random['thu_start'] && $church_random['thu_end']){
                    $church_random_time = 'Thursday '.$church_random['thu_start'].' - '.$church_random['thu_end'];
                }else{
                    $church_random_time = 'Thursday Closed';
                }
              }elseif($current_day == "Friday"){
               if($church_random['fri_start'] && $church_random['fri_end']){
                    $church_random_time = 'Friday '.$church_random['fri_start'].' - '.$church_random['fri_end'];
                }else{
                    $church_random_time = 'Friday Closed';
                }
              }elseif($current_day == "Saturday"){
                if($church_random['sat_start'] && $church_random['sat_end']){
                    $church_random_time = 'Saturday '.$church_random['sat_start'].' - '.$church_random['sat_end'];
                }else{
                    $church_random_time = 'Saturday Closed';
                }
              }elseif($current_day == "Sunday"){
                if($church_random['sun_start'] && $church_random['sun_end']){
                    $church_random_time = 'Sunday '.$church_random['sun_start'].' - '.$church_random['sun_end'];
                }else{
                    $church_random_time = 'Sunday Closed';
                }
              }              
              $church_random_image 			= $church_random["thumbnail"];
              $church_random_name 			= $church_random["name"];
              $church_random_phone_number 	= $church_random["phone"];
              //$church_random_phone_number 	= $church_random["phone_number"];
              $church_random_ratings 		= $church_random["ratings"];
              $church_random_desc 			= $church_random["faq_details"];
			
          ?>
            <div class="col-md-12 col-lg-6 mb-4">
              <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                  <div class="each-choirs each-choirs-img">
				  <img src="<?php echo $church_random_image; ?>" class="img-fluid mx-auto d-table listing_image" alt="" >
				  <a href="<?php echo base_url();?>listing/details/<?php echo $church_random['listings_id']; ?>" class="link-listing listing_link"></a>
                  </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6">
                  <div class="church-list-decribe listing_details">
                    <div class="row">
                      <div class="col-lg-12">
                        <p class="close-notice m-0 listing_time"><?php echo $church_random_time; ?></p>
                      </div>
                      <div class="col-lg-12">
                        <h4 class="event-name listing_title text-dark my-2 pt-2"><?php echo $church_random_name; ?></h4>
                      </div>
                      <div class="col-lg-12">
                        <ul class="event-address mb-3 py-2">
                          <li><i class="fas fa-phone"></i> <a class="text-dark font-weight-bold listing_phone" href="tel:<?php echo str_replace(array("-"," ","(",")","_"),'',$church_random_phone_number);?>"><?php echo $church_random_phone_number;?></a></li>
                        </ul>
                      </div>
                      <div class="col-lg-12">
                        <ul class="rating">
                          <?php for( $i=1; $i <= $church_random_ratings; $i++){ ?>
                            <li><i class="fas fa-star"></i></li>
                          <?php } ?>
                        </ul>
                      </div>
                      <div class="col-lg-12">
                        <p class="nu my-2 py-2 d-block church-bt listing_excerpt">
							<?php if($church_random_desc){ ?>
							<?php echo substr($church_random_desc,0,110)."..."; ?>
							<?php }else{ ?>
							
							<?php } ?>
						</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-12 mt-2 d-flex justify-content-center"> 
          <?php if(!$this->session->userdata('user_sess_data')){ ?>
            <a class="more-btn red-bg mx-2" href="#" data-toggle="modal" data-target="#log">Add More Listing</a> 
            <a class="more-btn red-bg mx-2" href="<?php echo base_url(); ?>/listing/index/church">View More Listing</a>                                   
          <?php }else{ 
          if($this->session->userdata['user_sess_data']['is_member']!='1'){ ?>
            <a class="more-btn red-bg mx-2" href="<?php echo base_url("add_listing"); ?>">Add More Listing</a> 
       <?php } ?>
            <a class="more-btn red-bg mx-2" href="<?php echo base_url(); ?>/listing/index/church">View More Listing</a>             
          <?php } ?>          
      </div>
      <div class="col-lg-12 mt-3 d-flex justify-content-center"> 
        <a class="more-btn red-bg mx-2" href="<?php echo base_url("cms/index/support"); ?>">Support</a>
      </div>
    </div>
  </div>
</section>
<!-- church listing close --> 
<!-- Band Listing -->
<section class="choirs-listing">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="heading-common text-center">
          <h2><?php echo $settings[0]['section4_title']; ?></h2>
          <p><?php echo $settings[0]['section4_subtitle']; ?></p>
        </div>
      </div>
      <div class="col-md-12 col-lg-12">
        <div class="row">
            <?php 
              $i= 0;
            ?>
            <?php foreach($row_band as $band){ //echo "<pre>"; print_r($choir);
                $current_day = date('l'); 
                if($current_day == "Monday"){
                  if($band['mon_start'] && $band['mon_end']){
                      $band_time = 'Monday '.$band['mon_start'].' - '.$band['mon_end'];
                  }else{
                      $band_time = 'Monday Closed';
                  }
                }elseif($current_day == "Tuesday"){
                  if($band['tue_start'] && $band['tue_end']){
                      $band_time = 'Tuesday '.$band['tue_start'].' - '.$band['tue_end'];
                  }else{
                      $band_time = 'Tuesday Closed';
                  }           
                }elseif($current_day == "Wednesday"){
                 if($band['wed_start'] && $band['wed_end']){
                      $band_time = 'Wednesday '.$band['wed_start'].' - '.$band['wed_end'];
                  }else{
                      $band_time = 'Wednesday Closed';
                  }  
                }elseif($current_day == "Thursday"){
                 if($band['thu_start'] && $band['thu_end']){
                      $band_time = 'Thursday '.$band['thu_start'].' - '.$band['thu_end'];
                  }else{
                      $band_time = 'Thursday Closed';
                  }
                }elseif($current_day == "Friday"){
                 if($band['fri_start'] && $band['fri_end']){
                      $band_time = 'Friday '.$band['fri_start'].' - '.$band['fri_end'];
                  }else{
                      $band_time = 'Friday Closed';
                  }
                }elseif($current_day == "Saturday"){
                  if($band['sat_start'] && $band['sat_end']){
                      $band_time = 'Saturday '.$band['sat_start'].' - '.$band['sat_end'];
                  }else{
                      $band_time = 'Saturday Closed';
                  }
                }elseif($current_day == "Sunday"){
                  if($band['sun_start'] && $band['sun_end']){
                      $band_time = 'Sunday '.$band['sun_start'].' - '.$band['sun_end'];
                  }else{
                      $band_time = 'Sunday Closed';
                  }
                }                
                $band_image = $band["thumbnail"];
                $band_name = $band["name"];
                $band_phone_number = $band["phone_number"];
            ?>
                  <?php if($i == 0 || $i == 5){ ?>
                      <!--div class="col-12 col-md-12 col-lg-6 my-3"-->
                  <?php }else{?>
                  <?php } ?>
                      <div class="col-12 col-sm-6 col-md-6 col-lg-3 my-3">
                  <div class="each-choirs"> <img src="<?php echo $band_image; ?>" class="img-fluid mx-auto d-table" alt=""> <a href="<?php echo base_url();?>listing/details/<?php echo $band['listings_id']; ?>" class="link-listing"><i class="fas fa-eye"></i></a>
                    <div class="choirs-describe">
                      <p class="close-notice"><?php echo $band_time; ?></p>
                      <h4 class="event-name"><?php echo $band_name; ?></h4>
                      <ul class="event-address">
                        <li><i class="fas fa-phone"></i> <a href="tel:<?php echo str_replace(array("-"," ","(",")","_"),'',$band_phone_number);?>"><?php echo $band_phone_number; ?></a></li>
                      </ul>
                    </div>
                  </div>
                </div>              
            <?php $i++; } ?>
        </div>
      </div>
      <!-- <div class="col-lg-12 mt-5"> <a class="more-btn d-table mx-auto red-bg" href="listing.html">View More Listing</a> </div> -->
      <div class="col-lg-12 mt-2 d-flex justify-content-center"> 
          <?php if(!$this->session->userdata('user_sess_data')){?>
            <a class="more-btn red-bg mx-2" href="#" data-toggle="modal" data-target="#log">Add More Listing</a> 
            <a class="more-btn red-bg mx-2" href="<?php echo base_url(); ?>/listing/index/band">View More Listing</a>                                   
          <?php }else{ 
  if($this->session->userdata['user_sess_data']['is_member']!='1'){ ?>
            <a class="more-btn red-bg mx-2" href="<?php echo base_url("add_listing"); ?>">Add More Listing</a> 
 <?php  } ?>
            <a class="more-btn red-bg mx-2" href="<?php echo base_url(); ?>/listing/index/band">View More Listing</a>             
          <?php } ?> 
      </div>
    </div>
  </div>
</section>
<!-- Band Listing --> 
<!-- church listing -->
<section class="church-listing">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="heading-common text-center">
          <h2><?php echo $settings[0]['section5_title']; ?></h2>
          <p class="nu"><?php echo $settings[0]['section5_subtitle']; ?></p>
        </div>
      </div>
      <div class="col-md-12 col-lg-12">
        <div class="row">
          <?php //echo "<pre>"; print_r($row_church_random); ?>
          <?php foreach($row_church as $church){ 
              $current_day = date('l'); 
                if($current_day == "Monday"){
                  if($church['mon_start'] && $church['mon_end']){
                      $church_time = 'Monday '.$church['mon_start'].' - '.$church['mon_end'];
                  }else{
                      $church_time = 'Monday Closed';
                  }
                }elseif($current_day == "Tuesday"){
                  if($church['tue_start'] && $church['tue_end']){
                      $church_time = 'Tuesday '.$church['tue_start'].' - '.$church['tue_end'];
                  }else{
                      $church_time = 'Tuesday Closed';
                  }           
                }elseif($current_day == "Wednesday"){
                 if($church['wed_start'] && $church['wed_end']){
                      $church_time = 'Wednesday '.$church['wed_start'].' - '.$church['wed_end'];
                  }else{
                      $church_time = 'Wednesday Closed';
                  }  
                }elseif($current_day == "Thursday"){
                 if($church['thu_start'] && $church['thu_end']){
                      $church_time = 'Thursday '.$church['thu_start'].' - '.$church['thu_end'];
                  }else{
                      $church_time = 'Thursday Closed';
                  }
                }elseif($current_day == "Friday"){
                 if($church['fri_start'] && $church['fri_end']){
                      $church_time = 'Friday '.$church['fri_start'].' - '.$church['fri_end'];
                  }else{
                      $church_time = 'Friday Closed';
                  }
                }elseif($current_day == "Saturday"){
                  if($church['sat_start'] && $church['sat_end']){
                      $church_time = 'Saturday '.$church['sat_start'].' - '.$church['sat_end'];
                  }else{
                      $church_time = 'Saturday Closed';
                  }
                }elseif($current_day == "Sunday"){
                  if($church['sun_start'] && $church['sun_end']){
                      $church_time = 'Sunday '.$church['sun_start'].' - '.$church['sun_end'];
                  }else{
                      $church_time = 'Sunday Closed';
                  }
                }              
              $church_image = $church["thumbnail"];
              $church_name = $church["name"];
              $church_phone_number = $church["phone_number"];
              $church_phone_number = $church["phone"];
              $church_ratings = $church["ratings"];
              $church_desc = $church["faq_details"];
          ?>
            <div class="col-md-12 col-lg-6 mb-4">
              <div class="row">
                <div class="col-6 col-md-6 col-lg-6">
                  <div class="each-choirs each-choirs-img">
				  <img src="<?php echo $church_image; ?>" class="img-fluid mx-auto d-table listing_image" alt="" style="border: 1px solid grey; border-radius: 4px;"> 
				  <a href="<?php echo base_url();?>listing/details/<?php echo $church['listings_id']; ?>" class="link-listing listing_link"></a>
                  </div>
                </div>
                <div class="col-6 col-md-6 col-lg-6">
                  <div class="church-list-decribe listing_details">
                    <div class="row">
                      <div class="col-lg-12">
                        <p class="close-notice m-0 listing_time"><?php echo $church_time; ?></p>
                      </div>
                      <div class="col-lg-12">
                        <h4 class="event-name text-dark my-2 pt-2 listing_title"><?php echo $church_name; ?></h4>
                      </div>
                      <div class="col-lg-12">
                        <ul class="event-address mb-3 py-2">
                          <li><i class="fas fa-phone"></i> <a class="text-dark font-weight-bold listing_phone" href="tel:<?php echo str_replace(array("-"," ","(",")","_"),'',$church_phone_number);?>"><?php echo $church_phone_number;?></a></li>
                        </ul>
                      </div>
                      <div class="col-lg-12">
                        <ul class="rating">
                          <?php for( $i=1; $i <= $church_ratings; $i++){ ?>
                            <li><i class="fas fa-star"></i></li>
                          <?php } ?>
                        </ul>
                      </div>
                      <div class="col-lg-12">
                        <p class="nu my-2 py-2 d-block church-bt">
							<?php if($church_desc){ ?>
							<?php echo substr($church_desc,0,110)."..."; ?>
							<?php }else{ ?>
							
							<?php } ?>
						</p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php } ?>          
        </div>
      </div>
      <div class="col-lg-12 mt-2 d-flex justify-content-center"> 
          <?php if(!$this->session->userdata('user_sess_data')){?>
            <a class="more-btn red-bg mx-2" href="#" data-toggle="modal" data-target="#log">Add More Listing</a> 
            <a class="more-btn red-bg mx-2" href="<?php echo base_url(); ?>/listing/index/church">View More Listing</a>                                   
          <?php }else{ 
 if($this->session->userdata['user_sess_data']['is_member']!='1'){?>
            <a class="more-btn red-bg mx-2" href="<?php echo base_url("add_listing"); ?>">Add More Listing</a> 
 <?php } ?>
            <a class="more-btn red-bg mx-2" href="<?php echo base_url(); ?>/listing/index/church">View More Listing</a>             
          <?php } ?> 
      </div>
    </div>
  </div>
</section>
<!-- church listing close --> 
<!-- how Works -->
<section class="how-it-works">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="heading-common text-center work-heading">
          <h2 class="text-white"><?php echo $settings[0]['section6_title']; ?></h2>
          <p class="nu text-white"><?php echo $settings[0]['section6_subtitle']; ?></p>
        </div>
      </div>
      <div class="col-md-12 col-lg-12 pt-5">
        <div class="listing-list">
          <div class="col-md-12 col-lg-12">
            <div class="row">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="each-icon-banner"> <span class="d-block text-white"><!-- <i class="fas fa-church"></i> --> </span>
                  <a href="#">
                    <img src="<?php echo $settings[0]['bottom_church_image']; ?>" class="img-fluid d-table mx-auto" alt="">  <!-- <a class="nu my-3 d-inline-block" href="listing.html">CHURCHES</a> -->
                    <p><?php echo $settings[0]['bottom_church_title']; ?></p>
                  </a>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="each-icon-banner"> <span class="d-block text-white"><!-- <i class="fas fa-users"></i> --> </span> 
                  <a href="#">
                    <img src="<?php echo $settings[0]['bottom_choir_image']; ?>" class="img-fluid d-table mx-auto" alt=""> <!-- <a class="nu my-3 d-inline-block" href="listing.html"> CHOIRS</a> -->
                    <p><?php echo $settings[0]['bottom_choir_title']; ?></p></a>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="each-icon-banner"> <span class="d-block text-white"><!-- <i class="fas fa-handshake"></i> --> </span>
                  <a href="#">
                    <img src="<?php echo $settings[0]['bottom_band_image']; ?>" class="img-fluid d-table mx-auto" alt="">  <!-- <a class="nu my-3 d-inline-block" href="listing.html"> BANDS </a> -->
                    <p><?php echo $settings[0]['bottom_band_title']; ?></p></a>
                </div>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3">
                <div class="each-icon-banner"> <span class="d-block text-white"><!-- <i class="fas fa-calendar-alt"></i> --> </span>
                  <a href="#">
                    <img src="<?php echo $settings[0]['bottom_event_image']; ?>" class="img-fluid d-table mx-auto" alt="">  <!-- <a class="nu my-3 d-inline-block" href="listing.html"> EVENTS</a> -->
                    <p><?php echo $settings[0]['bottom_event_title']; ?></p></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- How Works close --> 
<!-- Event listing -->
<section class="choirs-listing">
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="heading-common text-center">
          <h2><?php echo $settings[0]['section7_title']; ?></h2>
          <p><?php echo $settings[0]['section7_subtitle']; ?></p>
        </div>
      </div>
      <div class="col-md-12 col-lg-12">
        <section class="latest-blog-area">
            <div class="row">
                <?php
                $i= 0;
                ?>
                <?php foreach($row_events as $event){ //echo "<pre>"; print_r($event);
                    $old_date_timestamp = strtotime($event['event_date']);
                    $new_date = date('d/m/Y', $old_date_timestamp);
                    $event_time = $event['event_start'].' - '.$event['event_end'];
                    $get_day = date('D, M d', $old_date_timestamp);
                    $event_image = $event["event_image"];
                    $event_name = $event["event_name"];
                    $host = $event["host"];
                    $address = $event['address'];
                    $state = $event['state'];
                    $details = $event['details'];
                    ?>
                    <?php if($i == 0 || $i == 5){ ?>
                        <!--div class="col-12 col-md-12 col-lg-6 my-3"-->
                    <?php }else{?>
                    <?php } ?>
                    <div class="col-12 col-sm-12 col-md-12 col-lg-6 my-6">
                        <div class="single-blog-item">
                            <div class="img-holder">
                                <img src="<?php echo $event_image; ?>" class="img-fluid mx-auto d-table" style="height: 275px !important;"
                                     alt="News & Events Image">
                                <div class="overlay">
                                    <div class="box">
                                        <div class="content">
                                            <a href="<?php echo base_url();?>event/details/<?php echo $event['event_id']; ?>"><i
                                                        class="fa fa-link" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-holder">
                                <ul class="meta-info">
                                    <li><i class="fa fa-clock" aria-hidden="true"></i><a
                                                href="#"><?= $get_day.' At '.$event_time ?></a>
                                    </li>
                                </ul>
                                <a href="<?php echo base_url();?>event/details/<?php echo $event['event_id']; ?>">
                                    <h3 class="blog-title"><?php echo $event_name; ?></h3>
                                </a>
                                <ul class="meta-info">
                                    <li><i class="fa fa-address-card" aria-hidden="true"></i><a
                                                href="#"><?php echo $address.','.$state; ?></a></li>
                                </ul>
                                <div class="text">
                                    <p><?= substr($details, 0, 200) ?></p>
                                    <a class="readmore"
                                       href="<?php echo base_url();?>event/details/<?php echo $event['event_id']; ?>">Read
                                        More<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <?php $i++; } ?>
            </div>
        </section>
      </div>
      <div class="col-lg-12 mt-2 d-flex justify-content-center">  
          <?php if(!$this->session->userdata('user_sess_data')){?>
            <a class="more-btn red-bg mx-2" href="#" data-toggle="modal" data-target="#log">Add More Events</a> 
            <a class="more-btn red-bg mx-2" href="<?php echo base_url(); ?>/event/index/event">View More Events</a>                                   
          <?php }else{ ?>
            <a class="more-btn red-bg mx-2" href="<?php echo base_url("Add_Event"); ?>">Add More Events</a> 
            <a class="more-btn red-bg mx-2" href="<?php echo base_url(); ?>/event/index/event">View More Events</a>             
          <?php } ?>        
      </div>
    </div>
  </div>
</section>
<!-- Event listing -->
<!-- Memebers -->
<style type="text/css">
  /*.rounded-circle {
      border-radius: 2%!important;
  }
  .rounded-circle {
      width: 100%;
  }*/
  .each-members{
      padding: 8px;
  }
.threed:hover
{
    border: 2px solid #a20000; 
}
.threed
  {
      border: 1px solid #ccc; 
  }
.more-btn:hover {
    color: #a20000 !important;
    transition: 0.2s;
    border:1px solid #a20000 !important;
}
</style>
<section class="all-members">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12 col-lg-12">
        <div class="heading-common text-center work-heading">
          <h2>Discover <span> New Friends </span></h2>
          <p class="nu">Discover and follow members from your church and other churches.</p>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="members">
          <div id="owl-demo2">
 <?php //print_r($listing_members); ?> 
            <?php foreach($listing_members as $members){ //echo "<pre>"; print_r($listing_members); ?>
              <div class="col-lg-12 " style="padding-bottom: 10px">
                <div class="each-members text-center threed">
                  <a href="<?php echo base_url("users/profile_view/").$members['user_id']; ?>">
                      <?php if($members['image']) { ?><img src="<?php echo $members['image']; ?>" class="rounded-circle mx-auto d-table img-thumbnail" alt="" style="border-radius: 2%!important;width: 100%;min-height: 170px !important;max-height: 170px !important">
                      <?php }else{?>
                      <img src="<?php echo base_url(); ?>/front_assets/images/user.png" class="rounded-circle mx-auto d-table img-thumbnail" alt="" style="border-radius: 2%!important;width: 100%; min-height: 170px !important;max-height: 170px !important" >
                      <?php }?></a>
                  <!-- <hr> -->
                  <a href="<?php echo base_url("users/profile_view/").$members['user_id']; ?>">
                  <h3 class="py-3" style="margin: 0;padding-bottom: 0 !important;font-weight: 400"><a href="#" style="color: #a40808 !important;"><?php echo $members['name']; ?> <a href="#" style="color: #a40808;"></h3></a><?php echo isset($members['church_name']) ? $members['church_name'] :''; ?></a>
                  <!-- (<span class="py-3"><?php echo $members['church_name']; ?></span>) -->
                  <hr>
                  <!-- <p class="pb-2"><?php echo $members['state']; ?></p> -->
	                  <a href="#" class="btn btn-info more-btn" style="color: #fff; background-color: #a40808; width: 100%; border:none;"><i class="fa fa-user-plus"></i> Follow</a>
                  <!-- <div class="follow-area">
                    <ul>
                      <li><span>0</span> <a href="#">Follower</a></li>
                      <li><span>0</span> <a href="#">Following</a></li>
                      <div class="clearfix"></div>
                    </ul>
                  </div> -->
                </div>
              </div>
            <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</section> 
<!-- Members close -->
<!-- follow church  -->
<?php include('church_feature.php') ?>
<!-- follow church closed -->