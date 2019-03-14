<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	class Event_reviews extends CI_Controller {
		public function __construct(){
			parent::__construct();
			$this->load->model('common_model');
			if(!$this->session->userdata('admin_sess_data'))
			{
				redirect(base_url('admin/login'), 'refresh');
			}
		}
		public function index($event_id=0,$event_slug=""){
			$data['all_reviews'] =  $this->common_model->get_data_by_where(array('event_id'=>$event_id),"event_reviews");
			$data['view'] = 'admin/event_reviews/event_reviews_list';
			$this->load->view('admin_layout', $data);
		}

	public function edit($id = 0,$event_id = 0,$event_slug=""){ 
		if($this->input->post('submit')){
			$where = array('event_review_id'=>$id);
			$data['review_image_chk'] = $this->common_model->get_data_by_id($where,'event_reviews');

			//************ thumbnail **************
			if(empty($_FILES['review_image']['name'])){
				$review_image_path = $data['review_image_chk']['image'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['review_image_chk']['image']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/event_reviews/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/event_reviews/'. $exist_image_name);
            	}
                //===============
				$review_image_path = $this->do_upload($_FILES['review_image']['name'],"review_image","event_reviews");
			}

			$data = array(
				'event_id' => $event_id,
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
                'image' => $review_image_path,
                'title' => $this->input->post('title'),
                'description' => $this->input->post('description'),
                'ratings' => $this->input->post('ratings'),
                'status' => $this->input->post('status'),
				'date_modified' => date('Y-m-d H:i:s')
			);
			$data = $this->security->xss_clean($data);
			 //echo "<pre>"; print_r($data);die;
			$where = array('event_review_id'=>$id);
			$result = $this->common_model->edit_data('event_reviews',$where,$data);
			if($result == true){
				$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
				redirect(base_url('admin/event_reviews/index/'.$event_id.'/'.$event_slug));
			}
		}
		else{
			$data['details'] = $this->common_model->get_data_by_id(array("event_review_id"=>$id),"event_reviews");
			$data['view'] = 'admin/event_reviews/event_reviews_edit';
			$this->load->view('admin_layout', $data);
		}
	} 
		   
	public function do_upload($image,$post_image_field_name,$upload_folder_name){ 
        $config['upload_path']          = './uploads/event_reviews/';
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
			redirect(base_url('admin/event_reviews'));   
        }else{    
            $res = array('upload_data' => $this->upload->data());
            return base_url('uploads/').$upload_folder_name.'/'.$res['upload_data']['file_name'];
        }
    }

	public function del($id = 0,$event_slug=""){
		$where = array('event_review_id'=>$id);
		$data['review_image_chk'] = $this->common_model->get_data_by_id($where,'event_reviews');
		// exploding https path and converting folder path for unlink image
		if(!empty($data['review_image_chk']['image'])){
            $exp_del_image = explode('/',$data['review_image_chk']['image']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/event_reviews/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/event_reviews/'. $exist_del_image_name);
            }				
		}
		$this->db->delete('event_reviews', array('event_review_id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('admin/event_reviews/index/'.$data['review_image_chk']['event_id'].'/'.$event_slug));
	}

	public function status_change($id = 0,$event_id = 0,$status,$event_slug = 0){
		$data = array('status'=> $status);
		$where = array('event_review_id'=>$id);
		$result = $this->common_model->edit_data('event_reviews',$where,$data);
		if($result == true){
			$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
			redirect(base_url('admin/event_reviews/index/'.$event_id.'/'.$event_slug));
		}		
	}

	}
?>