<!-- Listing banner -->
<!-- Listing -->
<section class="listing-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="filter d-flex justify-content-between">
          <div class="row">
            <div class="col-12 col-lg-6 mb-3 mb-lg-0">
              <p class=" align-self-center fcontent">Found <?php echo $listing_count; ?> results</p>
            </div>
            <div class="col-12 col-lg-6">
              <div class="banner-form align-self-center">
                <form action="">
                  <div class="form-group mb-0">
                    <?php $uri = $this->uri->segment(3); ?>
                    <select class="form-control ministry_opt">
                      <option value="">Select Listings...</option>
                      <option value="church" <?php if($uri == "church"){echo "selected='selected'";} ?>>Church</option>
                      <option value="choir" <?php if($uri == "choir"){echo "selected='selected'";} ?>>Choir</option>
                      <option value="band" <?php if($uri == "band"){echo "selected='selected'";} ?>>Band</option>
                      <option value="event" <?php if($uri == "event"){echo "selected='selected'";} ?>>Events</option>
                    </select>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-12 cust_row1">
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
                <div class="col-12 col-sm-6 col-md-6 col-lg-4 my-3">
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
              <div class="col-lg-12">
                <div class="load-more row"></div>
              </div>
          </div>
        </div>
        <div class="col-md-12 col-lg-12 mt-5 load_btn">
              <input type="hidden" name="limit" id="limit" value="3"/>
              <input type="hidden" name="offset" id="offset" value="3"/>
              <input type="hidden" name="ministry_option" id="ministry_option" value="<?php echo $uri; ?>"/>
              <button type="button" onclick="loadmore()" value="loadmore" class="more-btn d-table mx-auto red-bg"><i class="fas fa-sync-alt"></i> Load More Listing</button>
        </div>
      </div>
      <div class="col-lg-12 cust_row2">
         <p>Please Select 1 Option from Dropdown above.</p>
      </div>
  </div>
</section>

<script>
    $(function(){
      // bind change event to select
      $(".cust_row2").hide();
      $('.ministry_opt').on('change', function () {
          var option = $(this).val();
          if (option == "church" || option == "choir" || option == "band") {
             var go_url = "<?php echo base_url(); ?>/listing/index/"+option; 
             window.location = go_url;
          }else if(option == "event"){
            var go_url = "<?php echo base_url(); ?>event/index/"+option; 
            window.location = go_url;
          }else if(option == ""){
            $(".cust_row2").show();
            $(".cust_row1").hide();
            $(".fcontent").text("Found 0 results"); 
          }
          return false;
      });
    });


$(document).ready(function(){
   $(".fa-sync-alt").hide();
})
function loadmore(){
  $(".fa-sync-alt").show();
  var offset_val = $('#offset').val();
  var limit_val = $('#limit').val();
    $.ajax({
        url: "<?php echo base_url('listing/load_more'); ?>", 
        data:{
          offset :offset_val,
          limit  :limit_val,
          ministry_option : $('#ministry_option').val()
        },
        success :function(data){
          if(data != ""){
             $(".fa-sync-alt").hide();
             $('.load-more').append(data);
             var total = +offset_val + +limit_val;
             $('#offset').val(total);           
          }else{
              $(".load_btn").hide();
          }

        }
    })
}    
</script>
<!-- Listing close --> 