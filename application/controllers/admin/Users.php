<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Users extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('admin/user_model');
			$this->load->model('common_model');
			if(!$this->session->userdata('admin_sess_data'))
			{
				redirect(base_url('admin/login'), 'refresh');
			}
		}
		public function index(){
			$data['all_users'] =  $this->common_model->get_all_data("users");
			$data['view'] = 'admin/user/user_list';
			$this->load->view('admin_layout', $data);
		}
		public function add(){
			if($this->input->post('submit')){
                $this->form_validation->set_rules('user_type', 'User Type', 'trim|required');
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
				$this->form_validation->set_rules('url', 'Url', 'trim|required');
				$this->form_validation->set_rules('address', 'Address', 'trim|required');
				$this->form_validation->set_rules('city', 'City', 'trim|required');
				$this->form_validation->set_rules('state', 'State', 'trim|required');
				$this->form_validation->set_rules('country', 'Country', 'trim|required');
				$this->form_validation->set_rules('postcode', 'Postcode', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$data['view'] = 'admin/user/user_add';
					$this->load->view('admin_layout', $data);
				}
				else{
					if (empty($_FILES['user_image']['name'])){
						$image_path = "";
					}else{
						$image_path = $this->do_upload($_FILES['user_image']['name']);
					}					
                    
                    // for address lat long
					/*$address = $this->input->post('address');
					$latLong = $this->getLatLong($address);
					$latitude = $latLong[0];
					$longitude = $latLong[1];*/
                    // for address lat long
					$data = array(
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'password' =>  md5($this->input->post('password')),
						'phone_number' => $this->input->post('phone_number'),
						'url' => $this->input->post('url'),
                        'address' => $this->input->post('address'),
                        'city' => $this->input->post('city'),
                        'state' => $this->input->post('state'),
                        'country' => $this->input->post('country'),
                        'postcode' => $this->input->post('postcode'),
                        'image' => $image_path,
                        'status' => $this->input->post('status'),
						'date_created' => date('Y-m-d H:i:s')
					);
					$data = $this->security->xss_clean($data);
					$where = array('email' => $data['email']);
					$result = $this->common_model->add_data('users',$data,$where);
					$registered_id = $this->db->insert_id();
					if($result == true){
						//mail fire to registered user and admin
						//admin info
						$where_admin_info = array('admin_id'=>1);
						$res_admin_info = $this->common_model->get_data_by_coloumn('name,email,image','admin',$where_admin_info);
	                    //mail sent to user
					    $where_user_id = array('user_id'=>$registered_id);
			            $res_data['res_user'] = $this->common_model->get_data_by_coloumn('*','users',$where_user_id);
			            $res_data['admin_data'] = $res_admin_info;
		                    $msg = $this->load->view('email_template/user_registered_mail.php',$res_data,TRUE);
						$this->email->set_mailtype("html");
						$this->email->from($res_admin_info['email'], 'Conrads Fine Dryclean');
						$this->email->to($this->input->post('email'));
						//$this->email->to('kuntal@zoomwebmedia.ca');
						$this->email->subject('User Registered Successfully.');
						$this->email->message($msg);
						$this->email->send();
						//==========
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/users'));
					}else{
						$this->session->set_flashdata('err', 'Email Already Exist!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$data['view'] = 'admin/user/user_add';
				$this->load->view('admin_layout', $data);
			}
		}
		public function edit($id = 0){
			if($this->input->post('submit')){
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required');
				$this->form_validation->set_rules('url', 'Url', 'trim|required');
				$this->form_validation->set_rules('address', 'Address', 'trim|required');
				$this->form_validation->set_rules('city', 'City', 'trim|required');
				$this->form_validation->set_rules('state', 'State', 'trim|required');
				$this->form_validation->set_rules('country', 'Country', 'trim|required');
				$this->form_validation->set_rules('postcode', 'Postcode', 'trim|required');
				if ($this->form_validation->run() == FALSE) {
					$where = array('user_id'=>$id);
					$data['user'] = $this->common_model->get_data_by_id($where,'users');
					$data['view'] = 'admin/user/user_edit';
					$this->load->view('admin_layout', $data);
				}
				else{
					$where = array('user_id'=>$id);
					$data['user_image_chk'] = $this->common_model->get_data_by_id($where,'users');
					if(empty($_FILES['user_image']['name'])){
						$image_edit_path = $data['user_image_chk']['image'];
					}else{
						// exploding https path and converting folder path for unlink image
                        $exp_image = explode('/',$data['user_image_chk']['image']);
                        $exist_image_name = end($exp_image);               
                        if (file_exists(FCPATH .'/uploads/users/'. $exist_image_name)) {
		                	unlink(FCPATH .'/uploads/users/'. $exist_image_name);
		            	}
                        //===============
						$image_edit_path = $this->do_upload($_FILES['user_image']['name']);
					}
					// for address lat long
					/*$address = $this->input->post('address');
					$latLong = $this->getLatLong($address);
					$latitude = $latLong[0];
					$longitude = $latLong[1];*/
					// for address lat long
					$data = array(
						'name' => $this->input->post('name'),
						'email' => $this->input->post('email'),
						'phone_number' => $this->input->post('phone_number'),
						'url' => $this->input->post('url'),
                        'address' => $this->input->post('address'),
                        'city' => $this->input->post('city'),
                        'state' => $this->input->post('state'),
                        'country' => $this->input->post('country'),
                        'postcode' => $this->input->post('postcode'),
                        'image' => $image_edit_path,
                        'status' => $this->input->post('status'),
						'date_modified' => date('Y-m-d H:i:s')
					);
					$data = $this->security->xss_clean($data);
					$where = array('user_id'=>$id);
					$result = $this->common_model->edit_data('users',$where,$data);
					if($result == true){
						$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
						redirect(base_url('admin/users'));
					}
				}
			}
			else{
				$where = array('user_id'=>$id);
				$data['user'] = $this->common_model->get_data_by_id($where,'users');
				$data['view'] = 'admin/user/user_edit';
				$this->load->view('admin_layout', $data);
			}
		}
		public function del($id = 0){
			$where = array('user_id'=>$id);
			$data['user_image_chk'] = $this->common_model->get_data_by_id($where,'users');
			// exploding https path and converting folder path for unlink image
			if(!empty($data['user_image_chk']['image'])){
	            $exp_del_image = explode('/',$data['user_image_chk']['image']);
	            $exist_del_image_name = end($exp_del_image);
	            if (file_exists(FCPATH .'/uploads/users/'. $exist_del_image_name)) {
	            	unlink(FCPATH .'/uploads/users/'. $exist_del_image_name);
	            }				
			}
            //===============
			$this->db->delete('users', array('user_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/users'));
		}
        public function do_upload($image){
                $config['upload_path']          = './uploads/users/';
                $config['allowed_types']        = 'gif|jpg|png|jpeg';
                //$config['max_size']             = 1000;
                //$config['max_width']            = 1024;
                //$config['max_height']           = 768;
                $this->load->library('upload', $config);
                $this->upload->initialize($config);
                if ( ! $this->upload->do_upload('user_image'))
                {
                        $res = array('error' => $this->upload->display_errors());
                        $this->session->set_flashdata('err', $res['error']);
						redirect(base_url('admin/users'));
                }else{
                        $res = array('upload_data' => $this->upload->data());
                        return base_url('uploads/users/').$res['upload_data']['file_name'];
                }
        }
		public function view($id = 0){
            $where = array('user_id'=>$id);
			$data['user'] = $this->common_model->get_data_by_id($where,'users');
			$data['view'] = 'admin/user/user_view';
			$this->load->view('admin_layout', $data);
		}

		/*public function getLatLong($address){ 
			$address = str_replace(" ", "+", $address);
			$url = "https://maps.google.com/maps/api/geocode/json?address=$address&sensor=false&key=AIzaSyCPZasBNtqldi4og9IGOx-jM-jgiQqWSVA";
			$ch = curl_init();			 
			curl_setopt($ch, CURLOPT_URL, $url);			 
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);			 
			curl_setopt($ch, CURLOPT_PROXYPORT, 3128);			 
			curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);			 
			curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);			 
			$response = curl_exec($ch);			 
			curl_close($ch);			 
			$response_a = json_decode($response);			 
			$lat = $response_a->results[0]->geometry->location->lat;			 
			$long = $response_a->results[0]->geometry->location->lng;			 
			$latlon = array($lat, $long);			 
			//var_dump($response_a);
			return $latlon;
		}*/

	}
?>