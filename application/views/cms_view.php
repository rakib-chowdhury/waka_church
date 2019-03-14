<?php //echo "<pre>"; print_r($settings); ?>

<?php if($row_cms['page_slug'] == "about-us"){ ?>

	<section class="church-listing">

	  <div class="container">

	    <div class="row">

	      <div class="col-md-12 col-lg-12">

	        <div class="heading-common text-center">

	          <h2><?php if(isset($row_cms['page_title'])){echo $row_cms['page_title'];} ?></h2>

	          <p class="nu"><?php if(isset($row_cms['page_subtitle'])){echo $row_cms['page_subtitle'];} ?></p>

	        </div>

	      </div>

	      <div class="col-md-12 col-lg-12">

	        <div class="row">

	          <div class="col-12 col-md-6 col-lg-6">

	            <div class="each-choirs"> <img src="<?php if(isset($row_cms['page_image'])){echo $row_cms['page_image'];} ?>" class="img-fluid mx-auto d-table" alt=""> </div>

	          </div>

	          <div class="col-12 col-md-6 col-lg-6">

	            <div class="church-list-decribe">

	              <div class="row">

						<div class="col-lg-12">

						<?php if(isset($row_cms['page_content'])){echo $row_cms['page_content'];} ?>

						</div>

	              </div>

	            </div>

	          </div>

	        </div>

	      </div>

	    </div>

	  </div>

	</section>

<?php }elseif($row_cms['page_slug'] == "contact-us"){ ?>

<section class="contact-area" id="contact-query">

  <article>

    <div class="container">

      <div class="row">
           <div class="col-md-12 col-lg-12">

	        <div class="heading-common text-center">

	          <h2><span>Contact</span> Us</h2>

	          <p class="nu"></p>

	        </div>

	      </div>
           <p>Thank you for using wakachurch.com today! Whether you are a believer, still exploring your faith, or you are just browsing our site, we want to make this website as beneficial to you as possible. If you have any questions, suggestions for improving the platform, or comments, please feel free to contact us!</p>
           
<p></p>Meanwhile, we’ll attempt to continue building Nigeria’s largest church social platform! Not to mention, keeping you informed of all the latest Church around the country! Again, thank you and enjoy your day! Blessings.</p>

        <div class="col-12 col-sm-12 col-lg-12">

          <div class="land-mark">

            <div class="row">

              <div class="col-sm-12 col-lg-5 mt-lg-0 mt-sm-3">

                <div class="contact-map">

                  <?php echo html_entity_decode($settings[0]['map']); ?>
                 

                </div>

              </div>

              <div class="col-12 col-sm-12 col-lg-7 mb-3">

                <div class="row">

                  <div class="col-sm-12 col-lg-12 mb-3">

                    <div class="address-contact">

                      <ul>

                        <li><i class="fa fa-phone"></i> <?php echo $settings[0]['phone']; ?></li>

                        <li><i class="fa fa-envelope"></i> <?php echo $settings[0]['email']; ?></li>

                        <!--<li><i class="fa fa-map"></i> <?php echo $settings[0]['address']; ?></li>-->

                        <li><i class="fas fa-clock"></i> <?php echo $settings[0]['working_hours']; ?></li>

                        <div class="clearfix"></div>

                      </ul>

                    </div>

                  </div>

                  <div class="col-12 col-sm-6 col-lg-12">

                    <form method="post" id="conatct_form">

                      <div class="row">

                        <div class="col-12 col-sm-12 col-lg-6 mb-3">

                          <div class="each-form">

                            <input type="text" class="form-control" placeholder="Name" name="name">

                          </div>

                        </div>

                        <div class="col-12 col-sm-12 col-lg-6 mb-3">

                          <div class="each-form">

                            <input type="tel" class="form-control" placeholder="Phone" name="phone">

                          </div>

                        </div>

                        <div class="col-12 col-sm-12 col-lg-6 mb-3">

                          <div class="each-form">

                            <input type="email" class="form-control" placeholder="Email" name="email">

                          </div>

                        </div>

                        <div class="col-12 col-sm-12 col-lg-6 mb-3">

                          <div class="each-form">

                            <input type="text" class="form-control" placeholder="Address" name="address">

                          </div>

                        </div>

                        <div class="col-12 col-sm-12 col-lg-12 mb-3">

                          <div class="each-form">

                            <textarea cols="30" class="form-control" rows="5" placeholder="Message" name="message"></textarea>

                          </div>

                        </div>

                        <div class="col-12 col-sm-12 col-lg-12">

                          <div class="form-button">

                            <!-- <button class="float-right" type="Submit" name="submit" value="submit">Submit <i class="fa fa-send"></i></button> -->

                            <input type="submit" name="submit" value="Submit" class="float-right">

                          </div>

                        </div>

                        <div class="col-12 col-sm-12 col-lg-12">

	                        <div class="success_msg"></div>

	                        <div class="error_msg"></div>

                    	</div>

                        <div class="clearfix"></div>

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

  </article>

</section>

<script>

  $(document).ready(function() {

    $("form#conatct_form").validate({

      ignore: [],

      debug: false,

      rules: {

        name: "required",

        phone: "required",

        email:  { required: true, email: true },

        address: "required",

        message: "required"

      },



      messages: {

        name: "Please provide Name",

        phone: "Please provide Phone Number",

        email:  { required: "Please provide Email", email: "Provide Valid Email" },

        address: "Please provide Address",

        message:"Please Provide Message"

      },

        submitHandler: function(form) {

          var formData = new FormData(form);

          $.ajax({

              type: "POST",

              url: "<?php echo base_url("cms/contactfrm"); ?>",

              data: formData,

              dataType: "html",

              success: function(data){

                  if(data == 1){

                    $(".success_msg").text("Mail Send Successfully.");

                  }else{

                    $(".error_msg").text("Error in Sending Mail...");

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

<?php }elseif($row_cms['page_slug'] == "faq"){ ?>	

<section class="church-listing">

  <div class="container">

    <div class="row">

      <div class="col-md-12 col-lg-12">

        <div class="heading-common text-center">

          <h2>FAQ</h2>

        </div>

      </div>

      <div class="col-md-12 col-lg-12">

        <div class="row">

          <div class="col-12 col-md-12 col-lg-12">

            <div class="accordion" id="accordionExample">

            	<?php if(isset($row_faq)){ ?>

            		<?php $count=1; foreach($row_faq as $row){?>

			              <div class="card">

				                <div class="card-header" id="heading<?php echo $row["faq_id"]; ?>">

				                  <h5 class="mb-0">

				                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse<?php echo $row["faq_id"]; ?>" aria-expanded="true" aria-controls="collapse<?php echo $row["faq_id"]; ?>"><?php echo $row["title"]; ?></button>

				                  </h5>

				                </div>



				                <div id="collapse<?php echo $row["faq_id"]; ?>" class="collapse <?php if($count == 1){echo "show";} ?>" aria-labelledby="heading<?php echo $row["faq_id"]; ?>" data-parent="#accordionExample">

				                  <div class="card-body">

				                    <?php echo $row["description"]; ?>

				                  </div>

				                </div>

			              </div>            			

            		<?php $count++; } ?>

            	<?php } ?>	

            </div>

          </div>

        </div>

      </div>

    </div>

  </div>

</section>	

<?php }else{ ?>

	<section class="church-listing">

	  <div class="container">

	    <div class="row">

	      <div class="col-md-12 col-lg-12">

	        <div class="heading-common text-center">

	          <h2><?php echo $row_cms["page_title"]; ?></h2>

	        </div>

	      </div>

	      <div class="col-md-12 col-lg-12">

	        <div class="row">

	          <div class="col-12 col-md-12 col-lg-12">

	            <div class="church-list-decribe">

	              <div class="row">

	                <div class="col-lg-12">

	                  <p class="my-2"><b><?php echo $row_cms["page_sub_title"]; ?></b></p>

	                  <?php echo $row_cms["page_content"]; ?>

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