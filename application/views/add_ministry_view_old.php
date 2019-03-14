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
        <div style="text-align: center;">
          <img src="http://googlyexpert.com/wakachurch/uploads/settings/logo.png" width="50%" height="auto">
        <h2>Add Ministry</h2>
        </div>
        <h3>Step1- Verufy Ministry</h3>
        <div>
          <strong>Note:</strong><span> Ensure you are a bonafide member of the ministry before you add ministry below</span> 
        </div>
        <div style="border: 1px solid #ccc;text-align: center;">
        <div class="row" style="padding: 10px;">
          <div class="col-lg-4">
            <label class="label">Church</label>
          </div>
          <div class="col-lg-4">
            <input type="text" name="verify_church" id="verify_church" class="form-control" placeholder="NAME OF CHURCH">
          </div>
          <div class="col-lg-4">
            <button class="btn btn-default btn-md">VERIFY</button>
          </div>
        </div>

        <div class="row" style="padding: 10px;">
          <div class="col-lg-4">
            <label class="label">CHOIR</label>
          </div>
          <div class="col-lg-4">
            <input type="text" name="verify_choir" id="verify_choir" class="form-control" placeholder="NAME OF CHOIR">
          </div>
          <div class="col-lg-4">
            <button class="btn btn-default btn-md">VERIFY</button>
          </div>
        </div>

        <div class="row" style="padding: 10px;">
          <div class="col-lg-4">
            <label class="label">BAND</label>
          </div>
          <div class="col-lg-4">
            <input type="text" name="verify_band" id="verify_band" class="form-control" placeholder="NAME OF BAND">
          </div>
          <div class="col-lg-4">
            <button class="btn btn-default btn-md">VERIFY</button>
          </div>
        </div>
        <div class="row" style="padding: 10px;">
          <div class="col-lg-4">
          </div>
          <div class="col-lg-4">
            <button class="btn btn-default btn-lg" disabled="">Continue</button>
          </div>
          <div class="col-lg-4">
          </div>
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