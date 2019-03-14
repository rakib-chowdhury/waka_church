<?php
	class Login_model extends CI_Model{
		public function login($data){ 
			$query_admin = $this->db->get_where('admin', array('email' => $data['email'],'password' => $data['password']));
			if ($query_admin->num_rows() == 0){
				return 2;
			}
			else{
				$result = $query_admin->row_array();
				if($result && $result['status'] == 1){
					$logged_in_userID = $result['admin_id'];
				    $this->db->select('*');
				    $this->db->from('admin'); 				    
				    $this->db->where('admin_id', $logged_in_userID);
				    $logged_in_query = $this->db->get();
				    $logged_in_result = $logged_in_query->row_array();
					$admin_data = array(
						'admin_id' => $logged_in_result['admin_id'],
						'name' => $logged_in_result['name'],
						'email' => $logged_in_result['email'],
					 	'image' => $logged_in_result['image'],
					);
					//echo "<pre>"; print_r($admin_data);die;
					$this->session->set_userdata('admin_sess_data',$admin_data);					    	
					return 1;
			    }else{
			    	return 3;
			    }
			}				
		}
		public function change_pwd_model($data){
			$sess_user_data = $this->session->userdata('admin_sess_data');
			$admin_id = $sess_user_data['admin_id'];
            $query_user = $this->db->get_where('admin', array('admin_id' => $admin_id,'password' => $data['old_password']));
				if($query_user->num_rows() == 1){
					if($data['new_password'] == $data['confirm_password']){
						$data_pwd = array('password'=>$data['new_password']);
						$this->db->where('admin_id',$admin_id);
						$query_update = $this->db->update('admin', $data_pwd);
						if($query_update){
							$this->session->set_flashdata('err', 'Password changed successfully!');
							redirect('admin/login/logout');
						}else{
							$this->session->set_flashdata('err', 'Error in changing password!');
							redirect(base_url('admin/login/change_pwd'), 'refresh');
						}
					}else{
						$this->session->set_flashdata('err', 'New Password and Confirm Password Does not matched!');
						redirect(base_url('admin/login/change_pwd'), 'refresh');
					}					
				}else{
					$this->session->set_flashdata('err', 'wrong Old Password given!');
					redirect(base_url('admin/login/change_pwd'), 'refresh');
				}
		}
	}
?>