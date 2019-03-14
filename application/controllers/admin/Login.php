<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Login extends CI_Controller {
	public function __construct(){
		parent::__construct();
		$this->load->model('admin/login_model');
		$this->load->model('common_model');
	}	
	public function index(){
		if($this->session->userdata('admin_sess_data'))
		{
			redirect('admin/dashboard');
		}
		else{
			$this->load->view('admin/login/login_form');
		}	
	}
	public function login_chk(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('email', 'Email', 'trim|required');
			$this->form_validation->set_rules('password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/login/login_form');
			}else { 
				$data = array(
				'email' => $this->input->post('email'),
				'password' => md5($this->input->post('password'))
				);
				$result = $this->login_model->login($data);
				if ($result == 1) {
					redirect(base_url('admin/dashboard'), 'refresh');
				}elseif($result == 2){
					$data['msg'] = 'Invalid Email or Password!';
					$this->load->view('admin/login/login_form', $data);
				}elseif($result == 3){
					$data['msg'] = 'Account Inactive!';
					$this->load->view('admin/login/login_form', $data);
				}
			}
		}else{
			$this->load->view('admin/login/login_form');
		}
	}	
	public function logout(){
		//print_r($_SESSION);die;
		$this->session->unset_userdata('admin_sess_data');
		//$this->session->sess_destroy();
		redirect('admin/login', 'refresh');
	}
	public function change_pwd(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required');
            $this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data['view'] = 'admin/login/change_pwd_view';
				$this->load->view('admin_layout', $data);
			}else {
				$data = array(
				'old_password' => md5($this->input->post('old_password')),
				'new_password' => md5($this->input->post('new_password')),
				'confirm_password' => md5($this->input->post('confirm_password'))
				);
				$result = $this->login_model->change_pwd_model($data);
			}
		}else{
			$data['view'] = 'admin/login/change_pwd_view';
			$this->load->view('admin_layout', $data);
		}
	}
		public function profile(){
			$sess_user_data = $this->session->userdata('admin_sess_data');
			$admin_id = $sess_user_data['admin_id'];
			if($this->input->post('submit')){
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
				$this->form_validation->set_rules('address', 'Address', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$where = array('admin_id'=>$admin_id);
					$data['admin'] = $this->common_model->get_data_by_id($where,'admin');                
					$data['view'] = 'admin/login/profile_view';
					$this->load->view('admin_layout', $data);
				}
				else{
					$where = array('admin_id'=>$admin_id);
					$data['user_image_chk'] = $this->common_model->get_data_by_id($where,'admin');
					if(empty($_FILES['user_image']['name'])){
						$image_edit_path = $data['user_image_chk']['image'];
					}else{
						// exploding https path and converting folder path for unlink image
                        $exp_image = explode('/',$data['user_image_chk']['image']);
                        $exist_image_name = end($exp_image);
                        unlink(FCPATH .'/uploads/admin/'. $exist_image_name);
                        //===============
						$image_edit_path = $this->do_upload($_FILES['user_image']['name']);
					}
					$data = array(
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),					
						'phone_number' => $this->input->post('phone_number'),
                        'address' => $this->input->post('address'),
                        'image' => $image_edit_path,
						'date_modified' => date('Y-m-d H:i:s')
					);
					$data = $this->security->xss_clean($data);
					$where = array('admin_id'=>$admin_id);
					$result = $this->common_model->edit_data('admin',$where,$data);
					if($result == true){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/dashboard'));
					}
				}
			}else{
				$where = array('admin_id'=>$admin_id);
				$data['admin'] = $this->common_model->get_data_by_id($where,'admin');          
				$data['view'] = 'admin/login/profile_view';
				$this->load->view('admin_layout', $data);
			}			
		}
        public function do_upload($image){
            $config['upload_path']          = './uploads/admin/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 1000;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
            $this->upload->initialize($config);
            if ( ! $this->upload->do_upload('user_image'))
            {
                    $res = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('err', $res['error']);
					redirect(base_url('admin/login/profile'));
            }else{
                    $res = array('upload_data' => $this->upload->data());
                    return base_url('uploads/admin/').$res['upload_data']['file_name'];
            }
   		}	   
	
	public function forget_password(){    
		if($this->input->post('submit')){  
			$this->form_validation->set_rules('admin_email', 'Email', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/login/forget_password');
			}else {   
				$where = array('email'=> $this->input->post('admin_email'));
				$query = $this->db->get_where('admin', $where);
				$is_admin = $query->row_array();
				if( empty($is_admin) ){
					$data['msg'] = 'Email Not Found!';
					$this->load->view('admin/login/forget_password', $data);
				}else{
					// Admin Details
					$where = array('admin_id'	=>	1);
					$admin_details = $this->common_model->get_data_by_coloumn('name,email,image','admin',$where);
	                $otp = sprintf('%04d',rand(1000,9999)); 
					$data = array('fp_otp'	=>	$otp);  
					$where = array('admin_id'=>$is_admin['admin_id']);
					$result = $this->common_model->edit_data('admin',$where,$data);
					$email_data['details'] = array(
						'logo'			=>	$admin_details['image'],
						'name'			=>	$is_admin['name'],
						'email'			=>	$is_admin['email'],
						'reset_link'	=>	base_url('admin/login/reset_password/'.$is_admin['admin_id']),
						'otp'			=> $otp);
					$msg = $this->load->view('email_template/forget_password_otp_mail.php',$email_data,TRUE);
					$this->email->set_mailtype("html");
					$this->email->from($admin_details['email'], 'Conrads Fine Dryclean');
					$this->email->to($is_admin['email']);
					$this->email->subject('OTP For Forget Password Request');
					$this->email->message($msg);
					$this->email->send();    
					if($result){    
						$data['msg'] = 'OTP send in your register email!';
						$this->load->view('admin/login/forget_password', $data);
					}      
				}           
			}   
		}else{
			$this->load->view('admin/login/forget_password');
		}
	}

	public function reset_password( $id=0 ){       
		if($this->input->post('submit')){  
			$this->form_validation->set_rules('admin_otp', 'OTP', 'trim|required');
			$this->form_validation->set_rules('admin_password', 'Password', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->load->view('admin/login/reset_password');
			}else{   
				$where = array('fp_otp'=> $this->input->post('admin_otp'),'admin_id' => $this->input->post('aid'));
				$query = $this->db->get_where('admin', $where);
				$is_admin = $query->row_array();
				if( empty($is_admin) ){
					$data['msg'] = 'OTP Not Matched!';
					$this->load->view('admin/login/forget_password', $data);
				}else{
					$data = array('fp_otp'	=>	'','password' => md5($this->input->post('admin_password')));  
					$where = array('admin_id'=>$is_admin['admin_id']);
					$result = $this->common_model->edit_data('admin',$where,$data); 
					if($result){
						$data['msg'] = 'Password Reset Successfully...';
						$this->load->view('admin/login/login_form', $data);
					}    				
				}           
			}   
		}else{   
			$where = array('admin_id'=>$id);
			$admin_details = $this->common_model->get_data_by_id($where,'admin');
			if( !empty($admin_details) ){  
				$this->load->view('admin/login/reset_password');
			}else{
				$this->load->view('admin/login/forget_password');
			}
   
		}
	}

	
}