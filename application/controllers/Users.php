<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
class Users extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->model('common_model');	
 		// load Session Library
       $this->load->library('session');
	}	
	public function index(){ 
			if(!$this->session->userdata('user_sess_data')){
				redirect(base_url('home'), 'refresh');
			}else{
				$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
				$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
				$data['settings'] = $this->common_model->get_all_data('settings');					
				$user_sess_data = $this->session->userdata('user_sess_data');
				$query_user = $this->db->get_where('users', array('user_id' => $user_sess_data['user_id']));
				$data["res_user"] = $query_user->row_array();
				$data['view'] = 'profile/index_view';
				$this->load->view('front_layout', $data);				
			} 		
	}

	public function login(){
		$data = array(
		'email' => $this->input->post('email'),
		'password' => md5($this->input->post('password'))
		);
		$query_user = $this->db->get_where('users', array('email' => $data['email'],'password' => $data['password']));
		if ($query_user->num_rows() == 0){
			echo 2;
		}else{
			$result = $query_user->row_array();
			if($result && $result['status'] == 1 && $result['is_verified'] == 1 ){
				$logged_in_userID = $result['user_id'];
			    $this->db->select('*');
			    $this->db->from('users'); 				    
			    $this->db->where('user_id', $logged_in_userID);
			    $logged_in_query = $this->db->get();
			    $logged_in_result = $logged_in_query->row_array();
				$user_data = array(
					'user_id' => $logged_in_result['user_id'],
					'name' => $logged_in_result['name'],
					'email' => $logged_in_result['email'],
					'is_member' => $logged_in_result['is_member']
				);
		    $this->session->set_userdata('user_sess_data',$user_data);			// print_r($this->session->userdata());	
			echo 1;
		    }else if(isset($result['is_verified']) && $result['is_verified'] == 0){
		    	echo 4;
		    }else{
		    	echo 3;
		    }
		}										
	}


	public function profile_view($user_id){
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');					
		$query_user = $this->db->get_where('users', array('user_id' => $user_id));
		$data["res_user"] = $query_user->row_array();
		$data['view'] = 'profile/profile_view';
		$this->load->view('front_layout', $data);		
	}

	public function profile_edit(){
		if(!$this->session->userdata('user_sess_data')){
			redirect(base_url('home'), 'refresh');
		}else{
			$user_sess_data = $this->session->userdata('user_sess_data');
			$query_members = $this->db->get_where('members', array('user_id' => $user_sess_data['user_id']));
			$members = $query_members->result_array();
			$listings = [];
			$data['countries'] = $this->common_model->get_all_data('countries');
			$data['states'] = $this->common_model->get_all_data('states');
			
			if(!empty($members)){
				foreach($members as $member){
					$listings[] = $member['listings_id'];
				}
				foreach($members as $member){
					$members_id[] = $member['members_id'];
				}
			}
			if($this->input->post('profile_picture_submit')){
				$user_id = $_POST["user_id"];
				
					$where = array('user_id'=>$user_id);
					$data['profile_thumbnail_chk'] = $this->common_model->get_data_by_id($where,'users');

					//************ thumbnail **************
					if(empty($_FILES['profile_image']['name'])){
						$thumbnail_path = $data['profile_thumbnail_chk']['image'];
					}else{
						// exploding https path and converting folder path for unlink image
						$exp_image = explode('/',$data['profile_thumbnail_chk']['image']);
						$exist_image_name = end($exp_image);
						if($exist_image_name){
							if (file_exists(FCPATH .'/uploads/users/'. $exist_image_name)) {
								unlink(FCPATH .'/uploads/users/'. $exist_image_name);
							}			                	
						}

						//===============
						$thumbnail_path = $this->do_upload($_FILES['profile_image']['name'],"profile_image","users");
					}
				$data = array('image' => $thumbnail_path);
				$where = array('user_id'=>$user_id);
				$result = $this->common_model->edit_data('users',$where,$data);
				$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
				redirect(base_url('users/profile_edit'));
			}
			if($this->input->post('profile_submit')){
				$user_id = $_POST["user_id"];
					$where = array('user_id'=>$user_id);
					$data['profile_thumbnail_chk'] = $this->common_model->get_data_by_id($where,'users');

					//************ thumbnail **************
					if(empty($_FILES['profile_image']['name'])){
						$thumbnail_path = $data['profile_thumbnail_chk']['image'];
					}else{
						// exploding https path and converting folder path for unlink image
						$exp_image = explode('/',$data['profile_thumbnail_chk']['image']);
						$exist_image_name = end($exp_image);
						if($exist_image_name){
							if (file_exists(FCPATH .'/uploads/users/'. $exist_image_name)) {
								unlink(FCPATH .'/uploads/users/'. $exist_image_name);
							}			                	
						}

						//===============
						$thumbnail_path = $this->do_upload($_FILES['profile_image']['name'],"profile_image","users");
					}
					//**********************														
					
					if($data['profile_thumbnail_chk']['name'] != $this->input->post('fname').' '.$this->input->post('lname')){
						$name_updated_at = date('Y-m-d H:i:s');
					}else{
						$name_updated_at = $data['profile_thumbnail_chk']['name_updated_at'];
					}
					//echo '<pre>'; print_r($name_updated_at); echo '</pre>'. __FILE__; die(' ON '.__LINE__);
					$data = array(
						'name' 	=> $this->input->post('fname').' '.$this->input->post('lname'),
						'email' => $data['profile_thumbnail_chk']['email'],
						'url' 			=> $this->input->post('url'),
						'phone_number' 	=> $this->input->post('phone_number'),
						'address' => $this->input->post('address'),
						'city' => $this->input->post('city'),
						'state' => $this->input->post('state'),
						'country' => $this->input->post('country'),
						'postcode' => $this->input->post('postcode'),
						'country' => $this->input->post('country'),
						'image' => $thumbnail_path,
						'name_updated_at' => $name_updated_at,
						'date_modified' => date('Y-m-d H:i:s')
					);
					$listings_id = $_POST['listings_id'];
					foreach($listings_id as $key=>$listing_id){
						$query = "UPDATE members SET listings_id = '".$listing_id."' WHERE members_id = '".$members_id[$key]."' ";
						$result_item = $this->db->query($query);
					}
					$data = $this->security->xss_clean($data);
					$where = array('user_id'=>$user_id);
					$result = $this->common_model->edit_data('users',$where,$data);
					if($result == true){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('users/profile_edit'));
					}
			}else{
				$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
				$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
				$data['settings'] = $this->common_model->get_all_data('settings');					
				$user_sess_data = $this->session->userdata('user_sess_data');
				$query_user = $this->db->get_where('users', array('user_id' => $user_sess_data['user_id']));
				$data["res_user"] = $query_user->row_array();
				$name_updated_at = $data['res_user']['name_updated_at'];
				
				if(strtotime($name_updated_at) > 0){
					
				$d1 = new DateTime(date('Y-m-d',strtotime($name_updated_at)));
				$d2 = new DateTime(date('Y-m-d'));

				// @link http://www.php.net/manual/en/class.dateinterval.php
				$interval = $d2->diff($d1);

				if($interval->format('%y') * 12 + $interval->format('%m') > 60){
					$name_update = true;
				}else{
					$name_update = false;
				}
				
				}else{
					$name_update = true;
				}
				//echo '<pre>'; print_r($name_update); echo '</pre>'. __FILE__; die(' ON '.__LINE__);
				$data['name_update'] = $name_update;
				$data['listings'] = $listings;
				$data['view'] = 'profile/edit_view';
				$this->load->view('front_layout', $data);				
			}
		}		
	}

	public function change_password(){
		if($this->input->post('cp_submit')){
			if(!empty($_POST['old_password']) && !empty($_POST['new_password']) && !empty($_POST['confirm_password'])){
				$data = array(
				'old_password' => md5($this->input->post('old_password')),
				'new_password' => md5($this->input->post('new_password')),
				'confirm_password' => md5($this->input->post('confirm_password'))
				);
				$sess_user_data = $this->session->userdata('user_sess_data');
				$user_id = $sess_user_data['user_id'];
	            $query_user = $this->db->get_where('users', array('user_id' => $user_id,'password' => $data['old_password']));
					if($query_user->num_rows() == 1){
						if($data['new_password'] == $data['confirm_password']){
							$data_pwd = array('password'=>$data['new_password']);
							$this->db->where('user_id',$user_id);
							$query_update = $this->db->update('users', $data_pwd);
							if($query_update){
								$this->session->set_flashdata('err', 'Password changed successfully!');
								redirect('users/logout');
							}else{
								$this->session->set_flashdata('err', 'Error in changing password!');
								redirect(base_url('users/profile_edit'), 'refresh');
							}
						}else{
							$this->session->set_flashdata('err', 'New Password and Confirm Password Does not matched!');
							redirect(base_url('users/profile_edit'), 'refresh');
						}					
					}else{
						$this->session->set_flashdata('err', 'Wrong Old Password given!');
						redirect(base_url('users/profile_edit'), 'refresh');
					}
			}else{
					$this->session->set_flashdata('err', 'Invalid Password');
					redirect(base_url('users/profile_edit'), 'refresh');				
			}

		}else{
			$data['view'] = 'users/profile_edit';
			$this->load->view('front_layout', $data);
		}
	}

	public function listings(){
		$sess_user_data = $this->session->userdata('user_sess_data'); 
		$is_member = $sess_user_data["is_member"];
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');
		$query_user = $this->db->get_where('users', array('user_id' => $sess_user_data['user_id']));
		$data["res_user"] = $query_user->row_array();
		if($is_member == '0'){
			$query_listing = $this->db->query("select listings.listings_id,listings.name,listings.thumbnail,listings.mon_start,listings.mon_end,listings.tue_start,listings.tue_end,listings.wed_start,listings.wed_end,listings.thu_start,listings.thu_end,listings.fri_start,listings.fri_end,listings.sat_start,listings.sat_end,listings.sun_start,listings.sun_end,users.phone_number from listings left join users on listings.user_id = users.user_id where listings.user_id='".$sess_user_data['user_id']."' and listings.status='1' and users.is_member='0' order by listings.listings_id DESC");			
		}else{
			$query_listing = $this->db->query("select listings.listings_id,listings.name,listings.thumbnail,listings.mon_start,listings.mon_end,listings.tue_start,listings.tue_end,listings.wed_start,listings.wed_end,listings.thu_start,listings.thu_end,listings.fri_start,listings.fri_end,listings.sat_start,listings.sat_end,listings.sun_start,listings.sun_end,users.phone_number from listings right join members on listings.listings_id = members.listings_id left join users on users.user_id = members.user_id where members.user_id = '15'");
		}		
		$data['listing_count'] = $query_listing->num_rows();		
		$data['listings'] = $query_listing->result_array();	 					
		$data['view'] = 'profile/listing_view';
		$this->load->view('front_layout', $data);		
	}

	public function events(){
		$sess_user_data = $this->session->userdata('user_sess_data');
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');	
		$query_user = $this->db->get_where('users', array('user_id' => $sess_user_data['user_id']));
		$data["res_user"] = $query_user->row_array();
		$query_events = $this->db->query("select event.*,users.phone_number from event left join users on event.user_id=users.user_id where event.status='1' and users.is_member = '0' and event.user_id = '".$sess_user_data['user_id']."' order by event.event_id DESC");		
		$data['event_count'] = $query_events->num_rows();					
		$data['events'] = $query_events->result_array();	 									
		$data['view'] = 'profile/event_view';
		$this->load->view('front_layout', $data);		
	}		

	public function do_upload($image,$post_image_field_name,$upload_folder_name){ 
        $config['upload_path']          = './uploads/users/';
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
			redirect(base_url('admin/event'));   
        }else{    
            $res = array('upload_data' => $this->upload->data());
            return base_url('uploads/').$upload_folder_name.'/'.$res['upload_data']['file_name'];
        }
    }	

	public function logout(){
		$this->session->unset_userdata('user_sess_data');
		redirect(base_url(), 'refresh');
	}

//****** RESET PASSWORD REQUEST      
	public function reset_password_request(){
		$msg = "";
		if($_POST || $_GET){
			if( isset($_REQUEST['email']) && !empty($_REQUEST['email']) ){
				$email = $_REQUEST['email'];
				// Status Checking ?
				$userChecking = $this->db->query("SELECT `user_id`,`status` FROM users WHERE `email`='".$email."'");
				if($userChecking->num_rows()>0) {	
					$msg .= "Your Otp number is ".sprintf('%04d',rand(1000,9999));
					$msg .= "<a href='".base_url('users/reset_password')."'>Reset link >></a>";
					$this->email->from('kuntal.sevenstars@gmail.com', 'Wakachurch Admin');
					$this->email->to($_REQUEST['email']);
					$this->email->subject('Reset Password Request');
					$this->email->message($msg);
					if($this->email->send()){
		                echo "1";
					}
				}else{   
					echo "2";
				}  		
			}else{ 
				echo "3";  
			}  	
		}else{   
		  echo "4";
		}   	
	}

//****** RESET PASSWORD  
	public function reset_password(){
		if($_POST || $_GET){
			if( isset($_REQUEST['email']) && !empty($_REQUEST['email']) && isset($_REQUEST['new_password']) && !empty($_REQUEST['new_password']) && isset($_REQUEST['otp']) && !empty($_REQUEST['otp']) ){
				$email = $_REQUEST['email'];
				$password = $_REQUEST['new_password'];
				$otp = $_REQUEST['otp'];
				// Status Checking ?
				$userChecking = $this->db->query("SELECT `user_id`,`status`,`otp` FROM users WHERE `email`='".$email."' AND `otp` = '".$otp."'");
				if($userChecking->num_rows()>0) {
					$data = array('password'=>md5($password));
					$where = array('email'=>$email,'otp'=>$otp);
					$result = $this->common_model->edit_data('users',$where,$data);
					if($result){
						$del_query = $this->db->query("UPDATE `users` SET `otp` = '' WHERE `email`='".$email."' AND `otp` = '".$otp."'");
						if($del_query){
							echo "1";
						}
					}
				}else{   
					echo "2";   
				}  		
			}else{   
			  echo "3"; 
			}  	
		}else{ 
			$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
			$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
			$data['settings'] = $this->common_model->get_all_data('settings');			  
			$data['view'] = 'forgot_password_view';
			$this->load->view('front_layout', $data);
		}   	  
	}	

}