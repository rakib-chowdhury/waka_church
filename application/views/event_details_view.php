<!-- Listing banner -->
<?php //echo "<pre>"; print_r($event_details); exit; ?>
<section>
  <img src="<?php echo base_url();?>front_assets/images/event-banner.jpg" class="img-fluid mx-auto d-table" alt="">
</section>
<!-- Listing banner close -->
<!-- Listing details -->
<section class="listing-details-area">
  <div class="container">
    <div class="row">
      <div class="col-lg-9">
        <div class="row">
          <div class="col-lg-12">
            <div class="listing-detail">
              <h1 class="my-2"><?php echo $event_details['event_name']; ?></h1>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="whole-gallery-area">
              <div class="row">
                <div class="col-lg-4 my-3">
                  <div class="each-gallery"> 
                    <a data-darkbox="<?php echo $event_details['event_image']; ?>"><img src="<?php echo $event_details['event_image']; ?>" class="img-fluid" alt=""></a> 
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-12">
            <div class="listing-detail">
              <h5 class="font-weight-bold my-2">Details</h5>
              <p class="my-2"><?php echo $event_details['details']; ?></p>
            </div>
          </div>
          <div class="col-lg-12 mt-5">
            <div class="show-review">
              <div id="owl-demo3">
                  <?php foreach($reviews as $review){ //echo "<pre>"; print_r($review); ?>
                    <div class="col-lg-12">
                        <div class="each-review d-flex">
                        <div class="review-img mr-3 align-self-center">
                        <img src="<?php echo $review['image'];?>" class="rounded-circle" alt="">
                        </div>
                        <div class="review-describe align-self-center">
                        <h3><?php echo $review['title'];?></h3>
                        <?php echo $review['description'];?>
                        <div class="d-flex justify-content-between">
                        <h4 class="align-self-center"><?php echo $review['name'];?></h4>
                        <?php $ratings = $review['ratings']; ?>
                        <ul class="align-self-center">
                        <?php for( $i=1; $i <= $ratings; $i++){ ?>
                          <li><i class="fas fa-star"></i></li>
                        <?php } ?>
                        </ul>
                        </div>
                        </div>
                        </div>
                    </div>
                  <?php } ?>
              </div>
            </div>
          </div>           
          <div class="col-lg-12 mt-5" id="put-review">
            <div class="well well-sm">
              <div class="text-left"> <a class="more-btn red-bg" href="javascript:void(0);" id="open-review-box">Write a Review</a> </div>
              <div class="row" id="post-review-box" style="display:none;">
                <div class="col-lg-12">
                  <form method="post" id="review_frm" enctype="multipart/form-data">
                    <div class="row">
                      <input id="ratings-hidden" name="ratings" type="hidden">
                      <input type="hidden" name="event_id" value="<?php echo $event_details['event_id']; ?>">
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Name" name="name">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="email" class="form-control" placeholder="Email" name="email">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="text" class="form-control" placeholder="Review Title" name="title">
                        </div>
                      </div>
                      <div class="col-lg-6">
                        <div class="form-group">
                          <input type="file" class="form-control" name="review_image">
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="form-group">
                          <textarea class="form-control animated" cols="50" id="new-review" name="comment" placeholder="Enter your review here..." rows="5"></textarea>
                        </div>
                      </div>
                      <div class="col-lg-12">
                        <div class="text-left">
                          <div class="stars starrr" data-rating="0"></div>
                          <a class="btn btn-danger btn-sm" href="#" id="close-review-box"> <span class="glyphicon glyphicon-remove"></span>Cancel</a>
                          <button class="btn btn-success btn-sm" type="submit" name="submit">Save</button>
                        </div>
                        <div class="success_msg"></div>
                        <div class="error_msg"></div>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-lg-3">
        <div class="row">
          <div class="col-lg-12">
            <div class="user-details"> 
              <img src="<?php echo $user_name["image"]; ?>" class="img-fluid rounded-circle mx-auto d-table my-3" alt="">
              <h3 class=""><?php echo $event_details['host']; ?></h3>
              <div class="user-detail my-3">
                <ul class="more_cont">
                  <li><i class="fas fa-map-marked-alt"></i> State: <span class="ml-2"><b><?php echo $event_details["state"]; ?></b></span></li>
                  <li><i class="fas fa-map-marker-alt"></i> <span><?php echo $event_details["address"]; ?></span></li>                
                  <li></li>
                </ul>
              </div>
              <a class="more-detail" href="javascript:void(0);">See More Deails..</a>
              <div class="write-review my-3"> <a href="#put-review" data-toggle="tooltip" data-placement="top" title="Write a Review"><i class="fas fa-star"></i><span><?php echo $review_count; ?></span></a> 
              </div>
              <div class="form-group">
                <label for="time"><b>Event Date & Time</b></label>
                <?php $old_date_timestamp = strtotime($event_details['event_date']);
                $new_date = date('d/m/Y', $old_date_timestamp); 
                $event_time = $new_date.' '.$event_details['event_start'].' - '.$event_details['event_end'];?>
                <ul>
                  <li><span><?php echo $event_time; ?></span></li>
                </ul>
                
              </div>
            </div>
          </div>
          <div class="col-lg-12 mt-3">
            <a class="more-btn red-bg d-block text-center mx-2" href="<?php echo base_url(); ?>event/index/event">View More Listing</a>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<script>
  $(document).ready(function(){
    $(".more_cont").hide();
    $(".more-detail").click(function(){
      $(".more_cont").toggle(700);
    })
  })

  $(document).ready(function() {
    $("form#review_frm").validate({
      ignore: [],
      debug: false,
      rules: {
        name: "required",
        email:  { required: true, email: true },
        title: "required",
        review_image: "required",
        comment: "required"
      },

      messages: {
        name: "Please provide Name",
        email:  { required: "Email Required", email: "Provide Valid Email" },
        title: "Please provide Title",
        review_image: "Please provide Image",
        comment: "Please provide Comment"
      },

        submitHandler: function(form) {
          var formData = new FormData(form);
          $.ajax({
              type: "POST",
              url: "<?php echo base_url('event/review_add'); ?>",
              data: formData,
              dataType: "html",
              success: function(data){
                  if(data == 1){
                    $(".success_msg").text("Your review has been saved successfully.");
                  }else{
                    $(".error_msg").text("There was an error in saving your review. Please try again.");
                  }
              },
              cache: false,
              contentType: false,
              processData: false
          });
        }      
    });
  });
 
</script>

<!-- Listing details close --> 