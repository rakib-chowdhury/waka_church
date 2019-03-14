<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_listing extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->model('common_model'); 
 		$this->load->library('session');
	}

	public function index(){  		

		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');	

		if(isset($_POST['name']) && isset($_POST['email']) && isset($_POST['password']) || $this->session->userdata('user_sess_data_for_admin')){
		    
		     if($this->session->userdata('user_sess_data_for_admin')){
		            $user_sess_data_for_admin = $this->session->userdata('user_sess_data_for_admin');
			       	$name = $user_sess_data_for_admin['name'];
			    	$email = $user_sess_data_for_admin['email'];
			    	$password = $user_sess_data_for_admin['password']; 
		     } else{
		        	$name = $_POST['name'];
			    	$email = $_POST['email'];
			    	$password = $_POST['password'];  
		         
		     }  	
			$data["register_data"] = array("name"=>$name,"email"=>$email,"password"=>$password);	
			$data['view'] = 'add_listing_view';
			$this->load->view('front_layout', $data);
		}else{
			if(!$this->session->userdata('user_sess_data')){
			
			  redirect(base_url('home'), 'refresh');
			}else{
				$data['view'] = 'add_listing_view';
				$this->load->view('front_layout', $data);				
			} 			
		}					
		
	}

	public function add_data(){
		if($_POST['user_id'] == ""){
			if($this->input->post('submit') ||  $this->session->userdata(' user_sess_data_for_admin')){
			    
			    if($this->session->userdata('user_sess_data_for_admin')){
			       $user_sess_data_for_admin = $this->session->userdata('user_sess_data_for_admin');
			       	$name = $user_sess_data_for_admin['name'];
			    	$email = $user_sess_data_for_admin['email'];
			    	$password = $user_sess_data_for_admin['password']; 
			        $this->session->unset_userdata('user_sess_data_for_admin');
			    }else{
    				$name = $_POST['user_name'];
    				$email = $_POST['user_email'];
    				$password = $_POST['user_password'];
			    }
				$email_chk_query = $this->db->query("select * from users where email='".$email."'");
				$count_users = $email_chk_query->num_rows();
				if($count_users == 0){
					$data_user = array('name'=>$name,'email'=>$email,'password'=>md5($password),'is_member'=>'0','status'=>'1','date_created' => date('Y-m-d H:i:s'));
					$data_user = $this->security->xss_clean($data_user);
					$result_user = $this->common_model->add_data('users',$data_user);
					$registered_id = $this->db->insert_id();
					if($result_user == true){
						//************ thumbnail **************
						if(!empty($_FILES['thumbnail']['name'])){
							$thumbnail_path = $this->do_upload($_FILES['thumbnail']['name'],"thumbnail","church");
						}
						//**********************

						//************ feature image **************
						if(!empty($_FILES['feature_image1']['name'])){
							$feature_image1 = $this->do_upload($_FILES['feature_image1']['name'],"feature_image1","church");
						}
						if(!empty($_FILES['feature_image2']['name'])){
							$feature_image2 = $this->do_upload($_FILES['feature_image2']['name'],"feature_image2","church");	
						}
						if(!empty($_FILES['feature_image3']['name'])){
							$feature_image3 = $this->do_upload($_FILES['feature_image3']['name'],"feature_image3","church");	
						}						
						//**********************

						//************ exterior image **************
						if(!empty($_FILES['exterior_image1']['name'])){
							$exterior_image1 = $this->do_upload($_FILES['exterior_image1']['name'],"exterior_image1","church");
						}
						if(!empty($_FILES['exterior_image2']['name'])){
							$exterior_image2 = $this->do_upload($_FILES['exterior_image2']['name'],"exterior_image2","church");
						}
						if(!empty($_FILES['exterior_image3']['name'])){
							$exterior_image3 = $this->do_upload($_FILES['exterior_image3']['name'],"exterior_image3","church");
						}						
						//**********************

						//************ interior image **************
						if(!empty($_FILES['interior_image1']['name'])){
							$interior_image1 = $this->do_upload($_FILES['interior_image1']['name'],"interior_image1","church");
						}
						if(!empty($_FILES['interior_image2']['name'])){
							$interior_image2 = $this->do_upload($_FILES['interior_image2']['name'],"interior_image2","church");
						}
						if(!empty($_FILES['interior_image3']['name'])){
							$interior_image3 = $this->do_upload($_FILES['interior_image3']['name'],"interior_image3","church");
						}			
						//**********************

						$mon_start = $this->input->post('mon_start');
						$mon_end = $this->input->post('mon_end');
						$tue_start = $this->input->post('tue_start');
						$tue_end = $this->input->post('tue_end');
						$wed_start = $this->input->post('wed_start');
						$wed_end = $this->input->post('wed_end');
						$thu_start = $this->input->post('thu_start');
						$thu_end = $this->input->post('thu_end');
						$fri_start = $this->input->post('fri_start');
						$fri_end = $this->input->post('fri_end');
						$sat_start = $this->input->post('sat_start');
						$sat_end = $this->input->post('sat_end');
						$sun_start = $this->input->post('sun_start');
						$sun_end = $this->input->post('sun_end');
						$data = array(
							'user_id' => $registered_id,
							'ministry_options' => $this->input->post('ministry_options'),
							'name' => $this->input->post('name'),
							'slogan' => $this->input->post('slogan'),
			                'thumbnail' => $thumbnail_path,
			                'state' => $this->input->post('state'),
			                'mon_start' => $mon_start,
			                'mon_end' => $mon_end,
			                'tue_start' => $tue_start,
			                'tue_end' => $tue_end,
			                'wed_start' => $wed_start,
			                'wed_end' => $wed_end,
			                'thu_start' => $thu_start,
			                'thu_end' => $thu_end,
			                'fri_start' => $fri_start,
			                'fri_end' => $fri_end,
			                'sat_start' => $sat_start,
			                'sat_end' => $sat_end,
			                'sun_start' => $sun_start,
			                'sun_end' => $sun_end,
			                'address' => $this->input->post('address'),
			                'phone' => $this->input->post('phone'),
							'email' => $this->input->post('email'),
							'website' => $this->input->post('website'),
							'facebook_url' => $this->input->post('facebook_url'),
							'twitter_url' => $this->input->post('twitter_url'),
							'instagram_url' => $this->input->post('instagram_url'),
							'youtube_url' => $this->input->post('youtube_url'),
							'faq_details' => $this->input->post('faq_details'),
							'church_parking' => $this->input->post('church_parking'),
							'church_wifi' => $this->input->post('church_wifi'),
							'church_wheelchair' => $this->input->post('church_wheelchair'),
							'church_family_friendly' => $this->input->post('church_family_friendly'),
							'church_online_transfer' => $this->input->post('church_online_transfer'),
							'church_air_conditioned' => $this->input->post('church_air_conditioned'),
							'church_kids_dept' => $this->input->post('church_kids_dept'),
							'church_rest_room' => $this->input->post('church_rest_room'),
							'feature_image1' => $feature_image1,
							'feature_image2' => $feature_image2,
							'feature_image3' => $feature_image3,
							'exterior_image1' => $exterior_image1,
							'exterior_image2' => $exterior_image2,
							'exterior_image3' => $exterior_image2,
							'interior_image1' => $interior_image1,
							'interior_image2' => $interior_image2,
							'interior_image3' => $interior_image3,
			                'status' => '0',
							'date_created' => date('Y-m-d H:i:s')
						);
						$data = $this->security->xss_clean($data);
						$result = $this->common_model->add_data('listings',$data);
						if($result == true){
							$this->session->set_flashdata('msg', 'Registed Successfully. And Listing Details Added Successfully...');
							redirect(base_url('add_listing'));
						}else{
							$this->session->set_flashdata('err', 'Error in uploading Details...');
							redirect(base_url('add_listing'));							
						}						
					}else{
						$this->session->set_flashdata('err', 'Error in Registration.Please Register Again!');
						redirect(base_url('add_listing'));
					}					
				}else{
					$this->session->set_flashdata('err', 'Your Email already exist...');
					redirect(base_url('add_listing'));
				}
			}
		}else{
			if($this->input->post('submit')){
				//************ thumbnail **************
				if(empty($_FILES['thumbnail']['name'])){
					$thumbnail_path = $this->do_upload($_FILES['thumbnail']['name'],"thumbnail","church");
				}
				//**********************

				//************ feature image **************
				if(!empty($_FILES['feature_image1']['name'])){
					$feature_image1 = $this->do_upload($_FILES['feature_image1']['name'],"feature_image1","church");
				}
				if(!empty($_FILES['feature_image2']['name'])){
					$feature_image2 = $this->do_upload($_FILES['feature_image2']['name'],"feature_image2","church");	
				}
				if(!empty($_FILES['feature_image3']['name'])){
					$feature_image3 = $this->do_upload($_FILES['feature_image3']['name'],"feature_image3","church");	
				}						
				//**********************

				//************ exterior image **************
				if(!empty($_FILES['exterior_image1']['name'])){
					$exterior_image1 = $this->do_upload($_FILES['exterior_image1']['name'],"exterior_image1","church");
				}
				if(!empty($_FILES['exterior_image2']['name'])){
					$exterior_image2 = $this->do_upload($_FILES['exterior_image2']['name'],"exterior_image2","church");
				}
				if(!empty($_FILES['exterior_image3']['name'])){
					$exterior_image3 = $this->do_upload($_FILES['exterior_image3']['name'],"exterior_image3","church");
				}						
				//**********************

				//************ interior image **************
				if(!empty($_FILES['interior_image1']['name'])){
					$interior_image1 = $this->do_upload($_FILES['interior_image1']['name'],"interior_image1","church");
				}
				if(!empty($_FILES['interior_image2']['name'])){
					$interior_image2 = $this->do_upload($_FILES['interior_image2']['name'],"interior_image2","church");
				}
				if(!empty($_FILES['interior_image3']['name'])){
					$interior_image3 = $this->do_upload($_FILES['interior_image3']['name'],"interior_image3","church");
				}			
				//**********************

				$mon_start = $this->input->post('mon_start');
				$mon_end = $this->input->post('mon_end');
				$tue_start = $this->input->post('tue_start');
				$tue_end = $this->input->post('tue_end');
				$wed_start = $this->input->post('wed_start');
				$wed_end = $this->input->post('wed_end');
				$thu_start = $this->input->post('thu_start');
				$thu_end = $this->input->post('thu_end');
				$fri_start = $this->input->post('fri_start');
				$fri_end = $this->input->post('fri_end');
				$sat_start = $this->input->post('sat_start');
				$sat_end = $this->input->post('sat_end');
				$sun_start = $this->input->post('sun_start');
				$sun_end = $this->input->post('sun_end');
				$data = array(
					'user_id' => $_POST['user_id'],
					'ministry_options' => $this->input->post('ministry_options'),
					'name' => $this->input->post('name'),
					'slogan' => $this->input->post('slogan'),
	                'thumbnail' => $thumbnail_path,
	                'state' => $this->input->post('state'),
	                'mon_start' => $mon_start,
	                'mon_end' => $mon_end,
	                'tue_start' => $tue_start,
	                'tue_end' => $tue_end,
	                'wed_start' => $wed_start,
	                'wed_end' => $wed_end,
	                'thu_start' => $thu_start,
	                'thu_end' => $thu_end,
	                'fri_start' => $fri_start,
	                'fri_end' => $fri_end,
	                'sat_start' => $sat_start,
	                'sat_end' => $sat_end,
	                'sun_start' => $sun_start,
	                'sun_end' => $sun_end,
	                'address' => $this->input->post('address'),
	                'phone' => $this->input->post('phone'),
					'email' => $this->input->post('email'),
					'website' => $this->input->post('website'),
					'facebook_url' => $this->input->post('facebook_url'),
					'twitter_url' => $this->input->post('twitter_url'),
					'instagram_url' => $this->input->post('instagram_url'),
					'youtube_url' => $this->input->post('youtube_url'),
					'faq_details' => $this->input->post('faq_details'),
					'church_parking' => $this->input->post('church_parking'),
					'church_wifi' => $this->input->post('church_wifi'),
					'church_wheelchair' => $this->input->post('church_wheelchair'),
					'church_family_friendly' => $this->input->post('church_family_friendly'),
					'church_online_transfer' => $this->input->post('church_online_transfer'),
					'church_air_conditioned' => $this->input->post('church_air_conditioned'),
					'church_kids_dept' => $this->input->post('church_kids_dept'),
					'church_rest_room' => $this->input->post('church_rest_room'),
					'feature_image1' => $feature_image1,
					'feature_image2' => $feature_image2,
					'feature_image3' => $feature_image3,
					'exterior_image1' => $exterior_image1,
					'exterior_image2' => $exterior_image2,
					'exterior_image3' => $exterior_image2,
					'interior_image1' => $interior_image1,
					'interior_image2' => $interior_image2,
					'interior_image3' => $interior_image3,
	                'status' => '0',
					'date_created' => date('Y-m-d H:i:s')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->common_model->add_data('listings',$data);
				if($result == true){
					$this->session->set_flashdata('msg', 'Listing Details Added Successfully...');
					redirect(base_url('add_listing'));
				}else{
					$this->session->set_flashdata('err', 'Error in uploading Details...');
					redirect(base_url('add_listing'));							
				}						
			}
		}
		
	}


	public function add_member_data(){

			if($this->input->post('submit')){
				$name = $_POST['name'];
				$email = $_POST['email'];
				$password = $_POST['password'];
				$email_chk_query = $this->db->query("select * from users where email='".$email."'");
				$count_users = $email_chk_query->num_rows();
				echo $count_users;
				if($count_users == 0){
					$data_user = array('name'=>$name,'email'=>$email,'password'=>md5($password),'is_member'=>'1','status'=>'1','date_created' => date('Y-m-d H:i:s'));
					$data_user = $this->security->xss_clean($data_user);
					$result_user = $this->common_model->add_data('users',$data_user);
					$registered_id = $this->db->insert_id();
					if($result_user == true){

						// $this->load->library('email');			
						// $config = $this->config->item('smtp');			
						// $this->email->initialize($config);			
						// $this->email->from('kuntal.sevenstars@gmail.com', 'Wakachurch Admin');			
						// $this->email->to($email);			
						// $this->email->subject('Message');			
						// $data['bodymessage']='Message which you want on view';			
						// $template=$this->load->view('email_template/signup_mail',$data,true);			
						// $this->email->message($template);
						// if($this->email->send()){
			   //              $this->session->set_flashdata('success', 'Verification Email Is Sent Successfully');
						// }

						$msg = "";
						
						// $msg .= "Please verify your Account";
						$msg .= "<a href='".base_url('Add_listing/verifyAccount?registered_id=').$registered_id."'>Verification link </a>";
						
						$this->email->from('hello@wakachurch.com', 'Wakachurch Admin');
						//$this->email->from('kuntal.sevenstars@gmail.com', 'Wakachurch Admin');
						$this->email->to($email);
						$this->email->subject('Email Verification');
						$data['bodymessage']= $msg;			
						$data['res_user']= $name;			
						$data['email']= $email;			
						$template=$this->load->view('email_template/signup_mail',$data,true);	
						$this->email->message($template);
						$this->email->set_mailtype("html");		
						// $this->email->message($msg);
						if($this->email->send()){
			                $this->session->set_flashdata('success', 'Verification Email Is Sent Successfully');
						}




						if(isset($_POST['listings_id1']) || isset($_POST['listings_id2']) || isset($_POST['listings_id2'])){
							$data_listing_item = array($_POST['listings_id1'],$_POST['listings_id2'],$_POST['listings_id3']);
							foreach($data_listing_item as $data_listing){
								$result_item = $this->db->query("INSERT INTO members (user_id,listings_id,status,date_created) VALUES ('".$registered_id."','".$data_listing."','0','".date('Y-m-d H:i:s')."')");
							}
						}
						echo 1;
					}else{
						echo 0;							
					}						
				}else{
					echo 2;
				}
			}
	}

	public function verifyAccount(){
		$registered_id = $_GET['registered_id'];
		$this->db->where(array('user_id'=>$registered_id));
		$update = $this->db->update('users', array('is_verified'=>1));

		if ($update) {
			$this->session->set_flashdata('email_success', 'Your Account Is Verified Successfully');
			redirect(base_url());
		}else{
			$this->session->set_flashdata('errors', 'Error Occured! Try Again');
			redirect(base_url());
		}
	}

	public function do_upload($image,$post_image_field_name,$upload_folder_name){ 
        $config['upload_path']          = './uploads/'.$upload_folder_name.'/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['max_size']             = 1000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload($post_image_field_name))
        {
            $res = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('err', $res['error']);
			redirect(base_url('add_listing'));   
        }else{    
            $res = array('upload_data' => $this->upload->data());
            return base_url('uploads/').$upload_folder_name.'/'.$res['upload_data']['file_name'];
        }
    }
    
    public function register_as_a_add_admin(){
        if($this->input->post('submit')){
			$name = $_POST['name'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$user_data = array(
					'name' => $name,
					'email' => $email,
					'password' => $password
				);
		    $this->session->set_userdata('user_sess_data_for_admin',$user_data);
		    echo 1;
				
        }		
        
        
    }
   

}