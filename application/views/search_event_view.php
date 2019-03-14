<!-- Listing banner -->
<!-- Listing -->
<section class="listing-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="filter d-flex justify-content-between">
          <p class=" align-self-center fcontent">Found <?php echo $event_count; ?> results</p>
        </div>
      </div>
      <div class="col-lg-12">
        <div class="all-listing">
          <div class="row">
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