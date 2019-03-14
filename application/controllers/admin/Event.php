<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends CI_Controller {
	public function __construct(){
 		parent::__construct();     
		$this->load->model('common_model');
		$this->load->model('admin/event_model');
		if(!$this->session->userdata('admin_sess_data'))
		{
			redirect(base_url('admin/login'), 'refresh');
		}   
	}	   
	public function index(){	
		$data['event_list'] = $this->event_model->get_all_data();
		$data['view'] = 'admin/event/event_list';
		$this->load->view('admin_layout', $data);	         	
	}

	public function edit($id = 0){
		if($this->input->post('submit')){
			$where = array('event_id'=>$id);
			$data['event_thumbnail_chk'] = $this->common_model->get_data_by_id($where,'event');

			//************ thumbnail **************
			if(empty($_FILES['event_image']['name'])){
				$thumbnail_path = $data['event_thumbnail_chk']['event_image'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['event_thumbnail_chk']['event_image']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/event/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/event/'. $exist_image_name);
            	}
                //===============
				$thumbnail_path = $this->do_upload($_FILES['event_image']['name'],"event_image","event");
			}
			//**********************														

			$data = array(
				'user_id' => $this->input->post('user_id'),
				'event_name' => $this->input->post('event_name'),
                'event_image' => $thumbnail_path,
                'event_date' => $this->input->post('event_date'),
                'event_start' => $this->input->post('event_start'),
                'event_end' => $this->input->post('event_end'),
                'details' => $this->input->post('details'),
				'host' => $this->input->post('host'),
				'state' => $this->input->post('state'),
				'address' => $this->input->post('address'),
                'status' => $this->input->post('status'),
				'date_modified' => date('Y-m-d H:i:s')
			);
			$data = $this->security->xss_clean($data);
			$where = array('event_id'=>$id);
			$result = $this->common_model->edit_data('event',$where,$data);
			if($result == true){
				$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
				redirect(base_url('admin/event'));
			}
		}
		else{
			//******** get user data for dropdown*********
			$data['all_users'] = $this->common_model->get_all_data('users'); 
			//***********************
			$data['details'] = $this->event_model->get_data_by_id($id);
			$data['view'] = 'admin/event/event_edit';
			$this->load->view('admin_layout', $data);
		}
	} 
		   
	public function do_upload($image,$post_image_field_name,$upload_folder_name){ 
        $config['upload_path']          = './uploads/event/';
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

	public function del($id = 0){
		$where = array('event_id'=>$id);
		$data['event_image_chk'] = $this->common_model->get_data_by_id($where,'event');
		// exploding https path and converting folder path for unlink image
		if(!empty($data['event_image_chk']['event_image'])){
            $exp_del_image = explode('/',$data['event_image_chk']['event_image']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/event/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/event/'. $exist_del_image_name);
            }				
		}																											
        //===============
        $del_event_reviews = $this->db->delete('event_reviews', array('event_id' => $id));
        if($del_event_reviews){
	 		$this->db->delete('event', array('event_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/event'));       	
        }
	}

	public function status_change($id = 0,$status){
		$data = array('status'=> $status);
		$where = array('event_id'=>$id);
		$result = $this->common_model->edit_data('event',$where,$data);
		if($result == true){
			$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
			redirect(base_url('admin/event'));
		}		
	}

	public function view($id = 0){
        $data['details'] = $this->event_model->get_data_by_id($id);
		$data['view'] = 'admin/event/event_view';
		$this->load->view('admin_layout', $data);
	}	
       
}