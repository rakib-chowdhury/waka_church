<style type="text/css">
  .jumbotron{
    padding: 10px;
  }
  .jumbotron img{
    padding: 10px;
  }
</style>
<?php //echo "<pre>"; print_r($register_data); 
$user_sess_data = $this->session->userdata('user_sess_data');?>
<section class="profile-sec">
  <div class="container">
    <div class="row">

      <div class="col-lg-1"></div>

      <div class="col-lg-10 jumbotron">
        <!-- <div style="text-align: center;">
          <img src="http://googlyexpert.com/wakachurch/uploads/settings/logo.png" width="50%" height="auto">
        	<h2>Add Ministry</h2>
        </div> -->
        <h3 style="text-align: center">Terms & Conditions</h3>

        <div style="border: 1px solid #ccc;text-align: center;">
        	<div class="col-lg-12">
        		<p>Adding a church, choir or band means you must be a bonafied member of the ministry.
        		The User adding a ministry would be in chnage of the ministry's account, and would as well be sent a confirmation email by Wakachurch's admin in other authenticate the account.If the user who added the ministry is being Confirmed by Wakachurch's admin as false, This will lead to removal of the ministry's account on the user's profile.
        		A user can only add a church, choir and band in as much as the user is an active member of the three ministries.
        		Once a ministry is added and authenticated no other user can add the ministry again.
        		Ministry added by Wakachurch's admin would be released if the ministry is claimed by owner or leader of the said ministry and Confirmed by us.</p>
        		<h5><form><input type="checkbox" name="terms_conditions" value="" style="left: 20px;
    margin-top: 7px;" required="" /></form> I hereby accept the terms and conditions to be an admin.</h5>

        		<a href="<?php echo base_url('Add_Ministry/send_add_ministry_link'); ?>" class="btn" style="background-color: #a20000; color: #fff">Continue</a> 
        		<!-- <p>a conformation email will be sent to the users email with a link to add listing</p> -->
            <p></p>
        	</div>

        

        
        
        </div>
      </div>

      <div class="col-lg-2"></div>
    </div>
  </div>
</section>

<script>



  $('#verify_church').on('click', function() {
    location.reload();
  });
  $('#verify_choir').on('click', function() {
    location.reload();
  });
  $('#verify_band').on('click', function() {
    location.reload();
  });
</script>