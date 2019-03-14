<!-- Profile section -->

<?php 
// echo "<pre>"; print_r($this->session->userdata()); echo "</pre>"; die(); 

$user_sess_data = $this->session->userdata('user_sess_data');?>

<section class="profile-sec">

  <div class="container">

    <div class="row">

      <div class="col-lg-12">

        <div class="profile-form-field">

          <div class="row">

            <div class="col-lg-12 mb-3">

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

              <h3 class="m-0 red-text"><b>Add Listing</b></h3>

              <p><i>Make sure you fill out adequate and correct information about your church, choir  or band.</i></p>

            </div>

            <div class="col-lg-12 mb-3">

              <div class="field-area">

                <!-- <p class="font-weight-bold"><i class="fas fa-calendar-alt"></i> mailtn </p> -->

                <form action="<?php echo base_url("add_listing/add_data") ?>" method="post" enctype="multipart/form-data" id="add_list_frm">

                  <input type="hidden" name="user_id" value="<?php if(isset($user_sess_data['user_id'])){ echo $user_sess_data['user_id'];} ?>">

                  <input type="hidden" name="user_name" value="<?php if(isset($register_data['name'])) {echo $register_data['name'];} ?>">

                  <input type="hidden" name="user_email" value="<?php if(isset($register_data['email'])) {echo $register_data['email'];}?>">

                  <input type="hidden" name="user_password" value="<?php if(isset($register_data['password'])) {echo $register_data['password'];}?>">

                  <div class="row">

                    <div class="col-lg-12 align-self-center">

                      <div class="form-group">

                        <select class="form-control" name="ministry_options" id="ministry_option">

                          <option>Ministry Options</option>

                          <option value="church">Church</option>

                          <option value="choir">Choir</option>

                          <option value="band">Band</option>

                        </select>

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <input type="text" class="form-control" placeholder="Name" name="name">

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <input type="text" class="form-control" placeholder="Slogan" name="slogan">

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <div class="custom-file">

                          <input type="file" class="custom-file-input" id="inputGroupFile01" aria-describedby="inputGroupFileAddon01" name="thumbnail">

                          <label class="custom-file-label" for="inputGroupFile01">Thumbnail</label>

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-12 align-self-center">

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
                    <div class="col-lg-12 align-self-center">

                      <div class="form-group">

                        <select class="form-control" name="country">
                          <option value="" selected>Country</option>
                          <option value="Afghanistan">Afghanistan</option>
                          <option value="Albania">Albania</option>
                          <option value="Algeria">Algeria</option>
                          <option value="American Samoa">American Samoa</option>
                          <option value="Andorra">Andorra</option>
                          <option value="Angola">Angola</option>
                          <option value="Anguilla">Anguilla</option>
                          <option value="Antartica">Antarctica</option>
                          <option value="Antigua and Barbuda">Antigua and Barbuda</option>
                          <option value="Argentina">Argentina</option>
                          <option value="Armenia">Armenia</option>
                          <option value="Aruba">Aruba</option>
                          <option value="Australia">Australia</option>
                          <option value="Austria">Austria</option>
                          <option value="Azerbaijan">Azerbaijan</option>
                          <option value="Bahamas">Bahamas</option>
                          <option value="Bahrain">Bahrain</option>
                          <option value="Bangladesh">Bangladesh</option>
                          <option value="Barbados">Barbados</option>
                          <option value="Belarus">Belarus</option>
                          <option value="Belgium">Belgium</option>
                          <option value="Belize">Belize</option>
                          <option value="Benin">Benin</option>
                          <option value="Bermuda">Bermuda</option>
                          <option value="Bhutan">Bhutan</option>
                          <option value="Bolivia">Bolivia</option>
                          <option value="Bosnia and Herzegowina">Bosnia and Herzegowina</option>
                          <option value="Botswana">Botswana</option>
                          <option value="Bouvet Island">Bouvet Island</option>
                          <option value="Brazil">Brazil</option>
                          <option value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                          <option value="Brunei Darussalam">Brunei Darussalam</option>
                          <option value="Bulgaria">Bulgaria</option>
                          <option value="Burkina Faso">Burkina Faso</option>
                          <option value="Burundi">Burundi</option>
                          <option value="Cambodia">Cambodia</option>
                          <option value="Cameroon">Cameroon</option>
                          <option value="Canada">Canada</option>
                          <option value="Cape Verde">Cape Verde</option>
                          <option value="Cayman Islands">Cayman Islands</option>
                          <option value="Central African Republic">Central African Republic</option>
                          <option value="Chad">Chad</option>
                          <option value="Chile">Chile</option>
                          <option value="China">China</option>
                          <option value="Christmas Island">Christmas Island</option>
                          <option value="Cocos Islands">Cocos (Keeling) Islands</option>
                          <option value="Colombia">Colombia</option>
                          <option value="Comoros">Comoros</option>
                          <option value="Congo">Congo</option>
                          <option value="Congo">Congo, the Democratic Republic of the</option>
                          <option value="Cook Islands">Cook Islands</option>
                          <option value="Costa Rica">Costa Rica</option>
                          <option value="Cota D'Ivoire">Cote d'Ivoire</option>
                          <option value="Croatia">Croatia (Hrvatska)</option>
                          <option value="Cuba">Cuba</option>
                          <option value="Cyprus">Cyprus</option>
                          <option value="Czech Republic">Czech Republic</option>
                          <option value="Denmark">Denmark</option>
                          <option value="Djibouti">Djibouti</option>
                          <option value="Dominica">Dominica</option>
                          <option value="Dominican Republic">Dominican Republic</option>
                          <option value="East Timor">East Timor</option>
                          <option value="Ecuador">Ecuador</option>
                          <option value="Egypt">Egypt</option>
                          <option value="El Salvador">El Salvador</option>
                          <option value="Equatorial Guinea">Equatorial Guinea</option>
                          <option value="Eritrea">Eritrea</option>
                          <option value="Estonia">Estonia</option>
                          <option value="Ethiopia">Ethiopia</option>
                          <option value="Falkland Islands">Falkland Islands (Malvinas)</option>
                          <option value="Faroe Islands">Faroe Islands</option>
                          <option value="Fiji">Fiji</option>
                          <option value="Finland">Finland</option>
                          <option value="France">France</option>
                          <option value="France Metropolitan">France, Metropolitan</option>
                          <option value="French Guiana">French Guiana</option>
                          <option value="French Polynesia">French Polynesia</option>
                          <option value="French Southern Territories">French Southern Territories</option>
                          <option value="Gabon">Gabon</option>
                          <option value="Gambia">Gambia</option>
                          <option value="Georgia">Georgia</option>
                          <option value="Germany">Germany</option>
                          <option value="Ghana">Ghana</option>
                          <option value="Gibraltar">Gibraltar</option>
                          <option value="Greece">Greece</option>
                          <option value="Greenland">Greenland</option>
                          <option value="Grenada">Grenada</option>
                          <option value="Guadeloupe">Guadeloupe</option>
                          <option value="Guam">Guam</option>
                          <option value="Guatemala">Guatemala</option>
                          <option value="Guinea">Guinea</option>
                          <option value="Guinea-Bissau">Guinea-Bissau</option>
                          <option value="Guyana">Guyana</option>
                          <option value="Haiti">Haiti</option>
                          <option value="Heard and McDonald Islands">Heard and Mc Donald Islands</option>
                          <option value="Holy See">Holy See (Vatican City State)</option>
                          <option value="Honduras">Honduras</option>
                          <option value="Hong Kong">Hong Kong</option>
                          <option value="Hungary">Hungary</option>
                          <option value="Iceland">Iceland</option>
                          <option value="India">India</option>
                          <option value="Indonesia">Indonesia</option>
                          <option value="Iran">Iran (Islamic Republic of)</option>
                          <option value="Iraq">Iraq</option>
                          <option value="Ireland">Ireland</option>
                          <option value="Israel">Israel</option>
                          <option value="Italy">Italy</option>
                          <option value="Jamaica">Jamaica</option>
                          <option value="Japan">Japan</option>
                          <option value="Jordan">Jordan</option>
                          <option value="Kazakhstan">Kazakhstan</option>
                          <option value="Kenya">Kenya</option>
                          <option value="Kiribati">Kiribati</option>
                          <option value="Democratic People's Republic of Korea">Korea, Democratic People's Republic of</option>
                          <option value="Korea">Korea, Republic of</option>
                          <option value="Kuwait">Kuwait</option>
                          <option value="Kyrgyzstan">Kyrgyzstan</option>
                          <option value="Lao">Lao People's Democratic Republic</option>
                          <option value="Latvia">Latvia</option>
                          <option value="Lebanon">Lebanon</option>
                          <option value="Lesotho">Lesotho</option>
                          <option value="Liberia">Liberia</option>
                          <option value="Libyan Arab Jamahiriya">Libyan Arab Jamahiriya</option>
                          <option value="Liechtenstein">Liechtenstein</option>
                          <option value="Lithuania">Lithuania</option>
                          <option value="Luxembourg">Luxembourg</option>
                          <option value="Macau">Macau</option>
                          <option value="Macedonia">Macedonia, The Former Yugoslav Republic of</option>
                          <option value="Madagascar">Madagascar</option>
                          <option value="Malawi">Malawi</option>
                          <option value="Malaysia">Malaysia</option>
                          <option value="Maldives">Maldives</option>
                          <option value="Mali">Mali</option>
                          <option value="Malta">Malta</option>
                          <option value="Marshall Islands">Marshall Islands</option>
                          <option value="Martinique">Martinique</option>
                          <option value="Mauritania">Mauritania</option>
                          <option value="Mauritius">Mauritius</option>
                          <option value="Mayotte">Mayotte</option>
                          <option value="Mexico">Mexico</option>
                          <option value="Micronesia">Micronesia, Federated States of</option>
                          <option value="Moldova">Moldova, Republic of</option>
                          <option value="Monaco">Monaco</option>
                          <option value="Mongolia">Mongolia</option>
                          <option value="Montserrat">Montserrat</option>
                          <option value="Morocco">Morocco</option>
                          <option value="Mozambique">Mozambique</option>
                          <option value="Myanmar">Myanmar</option>
                          <option value="Namibia">Namibia</option>
                          <option value="Nauru">Nauru</option>
                          <option value="Nepal">Nepal</option>
                          <option value="Netherlands">Netherlands</option>
                          <option value="Netherlands Antilles">Netherlands Antilles</option>
                          <option value="New Caledonia">New Caledonia</option>
                          <option value="New Zealand">New Zealand</option>
                          <option value="Nicaragua">Nicaragua</option>
                          <option value="Niger">Niger</option>
                          <option value="Nigeria">Nigeria</option>
                          <option value="Niue">Niue</option>
                          <option value="Norfolk Island">Norfolk Island</option>
                          <option value="Northern Mariana Islands">Northern Mariana Islands</option>
                          <option value="Norway">Norway</option>
                          <option value="Oman">Oman</option>
                          <option value="Pakistan">Pakistan</option>
                          <option value="Palau">Palau</option>
                          <option value="Panama">Panama</option>
                          <option value="Papua New Guinea">Papua New Guinea</option>
                          <option value="Paraguay">Paraguay</option>
                          <option value="Peru">Peru</option>
                          <option value="Philippines">Philippines</option>
                          <option value="Pitcairn">Pitcairn</option>
                          <option value="Poland">Poland</option>
                          <option value="Portugal">Portugal</option>
                          <option value="Puerto Rico">Puerto Rico</option>
                          <option value="Qatar">Qatar</option>
                          <option value="Reunion">Reunion</option>
                          <option value="Romania">Romania</option>
                          <option value="Russia">Russian Federation</option>
                          <option value="Rwanda">Rwanda</option>
                          <option value="Saint Kitts and Nevis">Saint Kitts and Nevis</option> 
                          <option value="Saint LUCIA">Saint LUCIA</option>
                          <option value="Saint Vincent">Saint Vincent and the Grenadines</option>
                          <option value="Samoa">Samoa</option>
                          <option value="San Marino">San Marino</option>
                          <option value="Sao Tome and Principe">Sao Tome and Principe</option> 
                          <option value="Saudi Arabia">Saudi Arabia</option>
                          <option value="Senegal">Senegal</option>
                          <option value="Seychelles">Seychelles</option>
                          <option value="Sierra">Sierra Leone</option>
                          <option value="Singapore">Singapore</option>
                          <option value="Slovakia">Slovakia (Slovak Republic)</option>
                          <option value="Slovenia">Slovenia</option>
                          <option value="Solomon Islands">Solomon Islands</option>
                          <option value="Somalia">Somalia</option>
                          <option value="South Africa">South Africa</option>
                          <option value="South Georgia">South Georgia and the South Sandwich Islands</option>
                          <option value="Span">Spain</option>
                          <option value="SriLanka">Sri Lanka</option>
                          <option value="St. Helena">St. Helena</option>
                          <option value="St. Pierre and Miguelon">St. Pierre and Miquelon</option>
                          <option value="Sudan">Sudan</option>
                          <option value="Suriname">Suriname</option>
                          <option value="Svalbard">Svalbard and Jan Mayen Islands</option>
                          <option value="Swaziland">Swaziland</option>
                          <option value="Sweden">Sweden</option>
                          <option value="Switzerland">Switzerland</option>
                          <option value="Syria">Syrian Arab Republic</option>
                          <option value="Taiwan">Taiwan, Province of China</option>
                          <option value="Tajikistan">Tajikistan</option>
                          <option value="Tanzania">Tanzania, United Republic of</option>
                          <option value="Thailand">Thailand</option>
                          <option value="Togo">Togo</option>
                          <option value="Tokelau">Tokelau</option>
                          <option value="Tonga">Tonga</option>
                          <option value="Trinidad and Tobago">Trinidad and Tobago</option>
                          <option value="Tunisia">Tunisia</option>
                          <option value="Turkey">Turkey</option>
                          <option value="Turkmenistan">Turkmenistan</option>
                          <option value="Turks and Caicos">Turks and Caicos Islands</option>
                          <option value="Tuvalu">Tuvalu</option>
                          <option value="Uganda">Uganda</option>
                          <option value="Ukraine">Ukraine</option>
                          <option value="United Arab Emirates">United Arab Emirates</option>
                          <option value="United Kingdom">United Kingdom</option>
                          <option value="United States">United States</option>
                          <option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
                          <option value="Uruguay">Uruguay</option>
                          <option value="Uzbekistan">Uzbekistan</option>
                          <option value="Vanuatu">Vanuatu</option>
                          <option value="Venezuela">Venezuela</option>
                          <option value="Vietnam">Viet Nam</option>
                          <option value="Virgin Islands (British)">Virgin Islands (British)</option>
                          <option value="Virgin Islands (U.S)">Virgin Islands (U.S.)</option>
                          <option value="Wallis and Futana Islands">Wallis and Futuna Islands</option>
                          <option value="Western Sahara">Western Sahara</option>
                          <option value="Yemen">Yemen</option>
                          <option value="Yugoslavia">Yugoslavia</option>
                          <option value="Zambia">Zambia</option>
                          <option value="Zimbabwe">Zimbabwe</option>
                        </select>

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <h5 class="red-color">Working Hours</h5>

                      <p><i>Use all two fields for each day. If you're not working on some of the days, simply leave that field empty. You can write the working time as, for example 09:00 or 09:00 AM.</i></p>

                    </div>

                    <div class="col-lg-12">

                      <div class="row">

                        <div class="col-lg-12 my-2">

                          <div class="row">

                            <div class="col-lg-2">

                              <label><b>Sunday</b></label>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="sun_start">

                              </div>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="sun_end">

                              </div>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-12 my-2">

                          <div class="row">

                            <div class="col-lg-2">

                              <label><b>Monday</b></label>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                  <input type="time" class="form-control" name="mon_start">

                              </div>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="mon_end">

                              </div>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-12 my-2">

                          <div class="row">

                            <div class="col-lg-2">

                              <label><b>Tuesday</b></label>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="tue_start">

                              </div>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="tue_end">

                              </div>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-12 my-2">

                          <div class="row">

                            <div class="col-lg-2">

                              <label><b>Wednesday</b></label>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="wed_start">  

                              </div>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="wed_end">

                              </div>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-12 my-2">

                          <div class="row">

                            <div class="col-lg-2">

                              <label><b>Thursday</b></label>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="thu_start">

                              </div>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="thu_end">

                              </div>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-12 my-2">

                          <div class="row">

                            <div class="col-lg-2">

                              <label><b>Friday</b></label>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="fri_start">

                              </div>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="fri_end">

                              </div>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-12 my-2">

                          <div class="row">

                            <div class="col-lg-2">

                              <label><b>Saturday</b></label>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="sat_start">

                              </div>

                            </div>

                            <div class="col-lg-5">

                              <div class="form-group">

                                <input type="time" class="form-control" name="sat_end">

                              </div>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <h5 class="red-color">Contact Information</h5>

                      <p><i>Use the following field to show contact information about your listing on the details page</i></p>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="Address" name="address"></textarea>

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <input type="text" class="form-control" placeholder="Phone" name="phone">

                      </div>

                    </div>



                    <div class="col-lg-12">

                      <div class="form-group">

                        <input type="text" class="form-control" placeholder="Email Address" name="email">

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <input type="text" class="form-control" placeholder="Website" name="website">

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <h5 class="red-color">Social Networks</h5>

                      <p><i>Fill out the social networks links to your listing fan page and profiles</i></p>

                    </div>

                    <div class="col-lg-12">

                      <div class="row">

                        <div class="col-lg-3">

                          <div class="form-group">

                            <input type="text" class="form-control" placeholder="Facebook URL:" name="facebook_url">

                          </div>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <input type="text" class="form-control" placeholder="Twitter URL:" name="twitter_url">

                          </div>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <input type="text" class="form-control" placeholder="Instagram URL:" name="instagram_url">

                          </div>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <input type="text" class="form-control" placeholder="YouTube URL:" name="youtube_url">

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <h5 class="red-color">FAQ</h5>

                      <p><i>If there's something that you'd like to inform your new members/fans about, use this section</i></p>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <textarea name="" id="" cols="30" rows="4" class="form-control" placeholder="FAQ" name="faq_details"></textarea>

                      </div>

                    </div>
                    <div class="col-lg-12">

                      <h5 class="red-color">Contact Form</h5>

                      <p><i>If you want user to contact you directly from website, via contact form, simply put your email that a form will send you an email to.</i></p>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">
                        <label>Contact Email</label>
                        <input type="text" name="contact" class="form-control" placeholder="Contact">
                      </div>

                    </div>
                      <div class="chuch_check">

                        <div class="col-lg-12">

                          <h5 class="red-color">Church Amenities</h5>

                          <p><i>Use this section to show what your church support and offers to its members</i></p>

                        </div>

                        <div class="col-lg-12 mb-3">

                          <div class="add-amenities">

                            <ul>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am1" name="church_parking" value="1">

                                  <label class="custom-control-label" for="am1">Parking</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am2" name="church_wifi" value="1">

                                  <label class="custom-control-label" for="am2">Free Wi-Fi</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am3" name="church_wheelchair" value="1">

                                  <label class="custom-control-label" for="am3">Wheelchair Accessible</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am4" name="church_family_friendly" value="1">

                                  <label class="custom-control-label" for="am4">Family Friendly</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am5" name="church_online_transfer" value="1">

                                  <label class="custom-control-label" for="am5">Accepting online Transfer/POS</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am6" name="church_air_conditioned" value="1">

                                  <label class="custom-control-label" for="am6">Air Conditioned</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am7" name="church_kids_dept" value="1">

                                  <label class="custom-control-label" for="am7">Kids Dept</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am8" name="church_rest_room" value="1">

                                  <label class="custom-control-label" for="am8">Rest Room</label>

                                </div>

                              </li>

                            </ul>

                          </div>

                        </div>

                      </div>

                       <div class="choir_check">

                        <div class="col-lg-12">

                          <h5 class="red-color">Choir Amenities</h5>

                          <p><i>use this section to show what your choir support and offers to its fans</i></p>

                        </div>

                       </div>

                       <div class="band_check">  

                            <div class="col-lg-12">

                              <h5 class="red-color">Band Amenities</h5>

                              <p><i>Use this section to show what your band support and offers to its fans</i></p>

                            </div>

                        </div>

                      <div class="choir_band_cont">                           

                        <div class="col-lg-12 mb-3">

                          <div class="add-amenities">

                            <ul>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am9" name="choir_dope_vocalist" value="1">

                                  <label class="custom-control-label" for="am9">Dope Vocalist(s)</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am10" name="choir_nice_backups" value="1">

                                  <label class="custom-control-label" for="am10">Nice Backups</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am11" name="choir_keyboardist" value="1">

                                  <label class="custom-control-label" for="am11">Keyboardist </label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am12" name="choir_bassist" value="1">

                                  <label class="custom-control-label" for="am12">Bassist</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am13" name="choir_talking_drummer" value="1">

                                  <label class="custom-control-label" for="am13">Talking drummer</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am14" name="choir_dope_music" value="1">

                                  <label class="custom-control-label" for="am14">Dope Music Director</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am15" name="choir_saxophonist" value="1">

                                  <label class="custom-control-label" for="am15">Saxophonist</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am16" name="choir_drummer" value="1">

                                  <label class="custom-control-label" for="am16">Drummer</label>

                                </div>

                              </li>

                              <li>

                                <div class="custom-control custom-checkbox mx-2">

                                  <input type="checkbox" class="custom-control-input" id="am17" name="choir_guitarist" value="1">

                                  <label class="custom-control-label" for="am17">Guitarist </label>

                                </div>

                              </li>

                            </ul>

                          </div>

                        </div>

                      </div>  

                     



                       

                    <div class="col-lg-12">

                      <h5 class="red-color">Photo Gallery</h5>

                      <p><i>Upload the photos of your church, choir or band to show it in a more interesting way. One picture is worth more than a thousand of words.</i></p>

                    </div>

                    <div class="col-lg-12 my-2">

                      <div class="row">

                        <div class="col-lg-3">

                          <label><b>Features images</b></label>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <div class="custom-file">

                              <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="feature_image1">

                              <label class="custom-file-label" for="inputGroupFile01">Image 1</label>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <div class="custom-file">

                              <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="feature_image2">

                              <label class="custom-file-label" for="inputGroupFile01">Image 2</label>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <div class="custom-file">

                              <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="feature_image3">

                              <label class="custom-file-label" for="inputGroupFile01">Image 3</label>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-12 my-2">

                      <div class="row">

                        <div class="col-lg-3">

                          <label><b>Exterior images</b></label>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <div class="custom-file">

                              <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="exterior_image1">

                              <label class="custom-file-label" for="inputGroupFile01">Image 1</label>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <div class="custom-file">

                              <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="exterior_image2">

                              <label class="custom-file-label" for="inputGroupFile01">Image 2</label>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <div class="custom-file">

                              <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="exterior_image3">

                              <label class="custom-file-label" for="inputGroupFile01">Image 3</label>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-12 my-2">

                      <div class="row">

                        <div class="col-lg-3">

                          <label><b>Interior images</b></label>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <div class="custom-file">

                              <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="interior_image1">

                              <label class="custom-file-label" for="inputGroupFile01">Image 1</label>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <div class="custom-file">

                              <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="interior_image2">

                              <label class="custom-file-label" for="inputGroupFile01">Image 2</label>

                            </div>

                          </div>

                        </div>

                        <div class="col-lg-3">

                          <div class="form-group">

                            <div class="custom-file">

                              <input type="file" class="custom-file-input" aria-describedby="inputGroupFileAddon01" name="interior_image3">

                              <label class="custom-file-label" for="inputGroupFile01">Image 3</label>

                            </div>

                          </div>

                        </div>

                      </div>

                    </div>

                    <div class="col-lg-12">

                      <div class="form-group">

                        <div class="custom-control custom-checkbox mx-2">

                          <label class="custom-control-label" for="aggree-terms"> I agree to the terms and conditions of wakachurch</label>

                          <input type="checkbox" class="custom-control-input" id="aggree-terms" name="agree">

                        </div>

                      </div>

                    </div>

                  </div>

                  <div class="col-lg-12">

                    <input type="submit" class="more-btn btn btn-secondary float-right" value="Submit" name="submit">

                  </div>                  

                </form>

              </div>

            </div>



            <!-- <div class="col-lg-12">

              <p my-3><b>Your listing will go live once verified</b></p>

            </div> -->

          </div>

        </div>

      </div>

    </div>

  </div>

</section>



<script>

    $(function(){

      $(".chuch_check").hide();

      $(".choir_check").hide(); 

      $(".band_check").hide();

      $(".choir_band_cont").hide();     

      $('#ministry_option').on('change', function () {

          var opt = $(this).val();

          if (opt == "church") {

              $(".chuch_check").show();

              $(".choir_check").hide();

              $(".band_check").hide();

              $(".choir_band_cont").hide();

          }else if(opt == "choir"){

              $(".choir_check").show();

              $(".choir_band_cont").show();

              $(".chuch_check").hide();

              $(".band_check").hide();

          }else if(opt == "band"){

              $(".band_check").show();

              $(".choir_band_cont").show();

              $(".chuch_check").hide();

              $(".choir_check").hide();

          }

      });

    });



  //register form  

  $(document).ready(function() {

    $("form#add_list_frm").validate({

      ignore: [],

      debug: false,

      rules: {

        ministry_options: "required",

        name: "required",

        slogan: "required",

        thumbnail: "required",

        state: "required",

        mon_start: "required",

        mon_end: "required",

        tue_start: "required",

        tue_end: "required",

        wed_start: "required",

        wed_end: "required",

        thu_start: "required",

        thu_end: "required",

        fri_start: "required",

        fri_end: "required",

        sat_start: "required",

        sat_end: "required",

        sun_start: "required",

        sun_end: "required",

        address: "required",

        phone: "required",

        email:  { required: true, email: true },

        website: "required",

        facebook_url: "required",

        twitter_url: "required",

        instagram_url: "required",

        youtube_url: "required",

        faq_details: "required",

        feature_image1: "required",

        feature_image2: "required",

        feature_image3: "required",

        exterior_image1: "required",

        exterior_image2: "required",

        exterior_image3: "required",

        interior_image1: "required",

        interior_image2: "required",

        interior_image3: "required",

        agree: "required"     

      },



      messages: {

        ministry_options: "Please provide Ministry Option",

        name: "Please provide Name",

        slogan: "Please provide Slogan",

        thumbnail: "Please provide Thumbnail",

        state: "Please provide State",

        mon_start: "Please provide Monday Start Time",

        mon_end: "Please provide Monday Start Time",

        tue_start: "Please provide Tuesday Start Time",

        tue_end: "Please provide Tuesday End Time",

        wed_start: "Please provide Tuesday Start Time",

        wed_end: "Please provide Wednesday Start Time",

        thu_start: "Please provide Wednesday Start Time",

        thu_end: "Please provide Thursday Start Time",

        fri_start: "Please provide Thursday Start Time",

        fri_end: "Please provide Friday Start Time",

        sat_start: "Please provide Friday Start Time",

        sat_end: "Please provide Saturday Start Time",

        sun_start: "Please provide Saturday Start Time",

        sun_end: "Please provide Sunday Start Time",

        address: "Please provide Sunday Start Time",

        phone: "Please provide Phone",

        email:  { required: "Email Please provide Name", email: "Provide Valid Email" },

        website: "Please provide Website",

        facebook_url: "Please provide Facebook Url",

        twitter_url: "Please provide Twitter Url",

        instagram_url: "Please provide Instagram url",

        youtube_url: "Please provide Youtube Url",

        faq_details: "Please provide Details",

        feature_image1: "Please provide Featured Image1",

        feature_image2: "Please provide Featured Image2",

        feature_image3: "Please provide Featured Image3",

        exterior_image1: "Please provide Exterior Image1",

        exterior_image2: "Please provide Exterior Image2",

        exterior_image3: "Please provide Exterior Image3",

        interior_image1: "Please provide Interior Image1",

        interior_image2: "Please provide Interior Image2",

        interior_image3: "Please provide Interior Image3",

        agree: "Please Check this field"         

      }     

    });

  });    

</script>

<!-- Profile section close --> 