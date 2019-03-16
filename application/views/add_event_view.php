<?php //echo "<pre>"; print_r($register_data); 

$user_sess_data = $this->session->userdata('user_sess_data');?>

<section class="profile-sec">

  <div class="container">

    <div class="row">

      <div class="col-lg-12">

        <div class="profile-form-field">

          <div class="row">

            <div class="col-lg-12 mb-3">

              <h3 class="m-0 red-text"><b>Create an event in minutes, no matter how big or small the occasion.</b></h3>

            </div>

            <div class="col-lg-12 mb-3">

              <div class="field-area">

                <p class="font-weight-bold"><i class="fas fa-calendar-alt"></i> Expose your upcoming event to thousands of members online. </p>

                 <?php if($this->session->flashdata('msg') != ''): ?>

                    <div class="alert alert-success flash-msg alert-dismissible">

                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                      <h4> Success!</h4>

                      <?= $this->session->flashdata('msg'); ?> 

                    </div>

                 <?php endif; ?>

                 <?php if($this->session->flashdata('err') != ''): ?>

                    <div class="alert alert-danger flash-msg alert-dismissible">

                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>

                      <h4> Error!</h4>

                      <?= $this->session->flashdata('err'); ?> 

                    </div>

                  <?php endif; ?>                 

                <form action="<?php echo base_url('Add_Event/add_data'); ?>" method="post" enctype="multipart/form-data" id="add_event_frm" autocomplete="off">

                  <input type="hidden" name="user_id" value="<?php if(isset($user_sess_data['user_id'])){ echo $user_sess_data['user_id'];} ?>">

                  <div class="row">

                    <div class="col-lg-12">

                      <div class="form-group">

                        <div class="custom-file">

                          <input type="file" multiple class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="event_image">

                          <label class="custom-file-label" for="inputGroupFile01">Add Photo</label>

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <input type="text" class="form-control" placeholder="Event name" name="event_name">

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <input type="text" class="form-control" placeholder="Address" name="address">

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <select class="form-control" name="state">

                            <option>State</option>

                            <option>Lagos</option>

                            <option>Abuja</option>

                            <option>Abia</option>

                            <option>Adamawa</option>

                            <option>Akwa Ibom</option>

                            <option>Anambra</option>

                            <option>Bauchi</option>

                            <option>Bayelsa</option>

                            <option>Benue</option>

                            <option>Borno</option>

                            <option>Cross River</option>

                            <option>Delta</option>

                            <option>Ebonyi</option>

                            <option>Enugu</option>

                            <option>Edo</option>

                            <option>Ekiti</option>

                            <option>Gombe</option>

                            <option>Imo</option>

                            <option>Jigawa</option>

                            <option>Kaduna</option>

                            <option>Kano</option>

                            <option>Kastina</option>

                            <option>Kebbi</option>

                            <option>Kogi</option>

                            <option>Kwara</option>

                            <option>Nasarawa</option>

                            <option>Niger</option>

                            <option>Ogun</option>

                            <option>Ondo</option>

                            <option>Osun</option>

                            <option>Oyo</option>

                            <option>Plateau</option>

                            <option>Rivers</option>

                            <option>Sokoto</option>

                            <option>Taraba</option>

                            <option>Yobe</option>

                            <option>Zamfara</option>

                          </select>

                      </div>

                    </div>                    

                    <div class="col-lg-12">

                      <div class="form-group">

                        <label for="Starting by">Date</label>

                        <input type="text" class="form-control" placeholder="Event Date" name="event_date" id="event_date">

                      </div>

                    </div>

                    <div class="col-lg-6 align-self-center">

                      <div class="form-group">

                        <label for="Starting by">Start Time</label>

                        <input type="text" class="form-control" placeholder="Start Time" name="event_start" id="event_start">

                      </div>

                    </div>

                    <div class="col-lg-6 align-self-center">

                      <div class="form-group">

                        <label for="Ending By">End Time</label>

                        <input type="text" class="form-control" placeholder="End Time" name="event_end" id="event_end">

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <textarea id="" cols="30" rows="5" class="form-control" placeholder="Details" name="details"></textarea>

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <input type="text" class="form-control" placeholder="Hosted By" name="host">

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <input type="submit" class="more-btn btn btn-secondary float-right" name="submit" value="Create Event">

                    </div>                    

                    <!-- <div class="col-lg-12">

                      <div class="custom-control custom-checkbox">

                        <input type="checkbox" class="custom-control-input" id="same-address">

                        <label class="custom-control-label" for="same-address"> add this event for free </label>

                      </div>

                    </div> -->

                  </div>

                </form>

              </div>

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>



<script>

  //register form  

  $(document).ready(function() {
      $('#event_date').datetimepicker({
          timepicker:false,
          format:'Y-m-d',
          formatDate:'YYYY-MM-DD',
          minDate:new Date(),
          closeOnDateSelect: true
      });

    $("form#add_event_frm").validate({

      ignore: [],

      debug: false,

      rules: {

        event_name: "required",

        event_image: "required",

        event_date: "required",

        event_start: "required",

        event_end: "required",

        details: "required",

        host: "required",

        state: "required",

        address:  "required"

      },



      messages: {

        event_name: "Please provide Event Name",

        event_image: "Please provide Image",

        event_date: "Please provide Event Date",

        event_start: "Please provide Event Start Time",

        event_end: "Please provide Event End Time",

        details: "Please provide Details",

        host: "Please provide Host",

        state: "Please provide State",

        address:  "Please provide Address"

      }     

    });

  });

</script>