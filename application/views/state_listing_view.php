<!-- Listing banner -->
<!-- Listing -->
<section class="listing-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="filter d-flex justify-content-between">
          <p class=" align-self-center fcontent">Found <?php echo $event_count + $listing_count; ?> results</p>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="all-listing">
          <div class="row">
              <?php foreach($listings as $listing){ 
              $current_day = date('l'); 
              if($current_day == "Monday"){
                if($listing['mon_start'] && $listing['mon_end']){
                    $listing_time = 'Monday '.$listing['mon_start'].' - '.$listing['mon_end'];
                }else{
                    $listing_time = 'Monday Closed';
                }
              }elseif($current_day == "Tuesday"){
                if($listing['tue_start'] && $listing['tue_end']){
                    $listing_time = 'Tuesday '.$listing['tue_start'].' - '.$listing['tue_end'];
                }else{
                    $listing_time = 'Tuesday Closed';
                }           
              }elseif($current_day == "Wednesday"){
               if($listing['wed_start'] && $listing['wed_end']){
                    $listing_time = 'Wednesday '.$listing['wed_start'].' - '.$listing['wed_end'];
                }else{
                    $listing_time = 'Wednesday Closed';
                }  
              }elseif($current_day == "Thursday"){
               if($listing['thu_start'] && $listing['thu_end']){
                    $listing_time = 'Thursday '.$listing['thu_start'].' - '.$listing['thu_end'];
                }else{
                    $listing_time = 'Thursday Closed';
                }
              }elseif($current_day == "Friday"){
               if($listing['fri_start'] && $listing['fri_end']){
                    $listing_time = 'Friday '.$listing['fri_start'].' - '.$listing['fri_end'];
                }else{
                    $listing_time = 'Friday Closed';
                }
              }elseif($current_day == "Saturday"){
                if($listing['sat_start'] && $listing['sat_end']){
                    $listing_time = 'Saturday '.$listing['sat_start'].' - '.$listing['sat_end'];
                }else{
                    $listing_time = 'Saturday Closed';
                }
              }elseif($current_day == "Sunday"){
                if($listing['sun_start'] && $listing['sun_end']){
                    $listing_time = 'Sunday '.$listing['sun_start'].' - '.$listing['sun_end'];
                }else{
                    $listing_time = 'Sunday Closed';
                }
              }
              $listing_image = $listing["thumbnail"];
              $listing_name = $listing["name"];
              $listing_phone_number = $listing["phone_number"];?>
                <div class="col-6 col-sm-6 col-md-6 col-lg-4 my-3">
                  <div class="each-choirs adjt_height"> 
                    <img src="<?php echo $listing_image; ?>" class="img-fluid mx-auto d-table" alt=""> <a href="<?php echo base_url();?>listing/details/<?php echo $listing['listings_id']; ?>" class="link-listing"><i class="fas fa-eye"></i></a>
                    <div class="choirs-describe">
                      <p class="close-notice mt-0"><?php echo $listing_time;?></p>
                      <h4 class="event-name"><?php echo $listing_name; ?></h4>
                      <ul class="event-address">
                        <li><i class="fas fa-phone"></i> <a href="tel:<?php echo str_replace(array("-"," ","(",")","_"),'',$listing_phone_number);?>"><?php echo $listing_phone_number; ?></a></li>
                      </ul>
                    </div>
                  </div>
                </div>
              <?php } ?>
              <?php foreach($events as $event){
                  $old_date_timestamp = strtotime($event['event_date']);
                  $new_date = date('d/m/Y', $old_date_timestamp); 
                  $event_time = $new_date.' '.$event['event_start'].' - '.$event['event_end'];
                  $event_image = $event["event_image"];
                  $event_name = $event["event_name"];?>
                <div class="col-6 col-sm-6 col-md-6 col-lg-4 my-3">
                  <div class="each-choirs adjt_height"> 
                    <img src="<?php echo $event_image; ?>" class="img-fluid mx-auto d-table" alt=""> <a href="<?php echo base_url();?>event/details/<?php echo $event['event_id']; ?>" class="link-listing"><i class="fas fa-eye"></i></a>
                    <div class="choirs-describe">
                      <p class="close-notice mt-0"><?php echo $event_time;?></p>
                      <h4 class="event-name"><?php echo $event_name; ?></h4>
                    </div>
                  </div>
                </div>
              <?php } ?>                          
          </div>      
        </div>       
      </div>     
  </div>
</section>
<!-- Listing close --> 