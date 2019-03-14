<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admin_cms extends CI_Controller {
	public function __construct(){
 		parent::__construct();     
		$this->load->model('common_model');  
	}	   
	public function index(){ 
		$data['details'] = $this->common_model->get_all_data('cms');
		$data['view'] = 'admin/cms/cms_list';
		$this->load->view('admin_layout', $data);	         	
	}

	public function add(){
		if($this->input->post('submit')){    
				$data = array(
					'page_slug' => $this->input->post('page_slug'),
					'page_title' => $this->input->post('page_title'),
					'page_sub_title' => $this->input->post('page_sub_title'),
					'page_content' => $this->input->post('page_content'),
                    'date_created' => date('Y-m-d H:i:s')
             	); 
				if( !empty($_FILES['page_image']['name']) ){
					$data['page_image'] = $this->do_upload($_FILES['page_image']['name']);
				}else{
					$data['page_image'] = '';
				}             	 
				$data = $this->security->xss_clean($data);
				$where = array('page_slug' => $data['page_slug']);
				$result = $this->common_model->add_data('cms',$data,$where);    
				if($result == true){
					$this->session->set_flashdata('msg', 'Record is Added Successfully!');
					redirect(base_url('admin/admin_cms'));
				}else{
					$this->session->set_flashdata('err', 'Page Name Already Exist!');   
					redirect(base_url('admin/admin_cms'));   
				}
		}else{   
			$data['view'] = 'admin/cms/cms_add';      
			$this->load->view('admin_layout', $data);
		}
	} 
    
		public function edit( $id=0 ){
			if($this->input->post('submit')){
				$data = array(
					'page_slug' => $this->input->post('page_slug'),
					'page_title' => $this->input->post('page_title'),
					'page_sub_title' => $this->input->post('page_sub_title'),
					'page_content' => $this->input->post('page_content'),
                    'date_modified' => date('Y-m-d H:i:s')
            	); 
				if( empty($_FILES['page_image']['name']) ){
					$image_path = $this->input->post('pre_page_image');
				}else{
					// exploding https path and converting folder path for unlink image
                    $exp_image = explode('/',$this->input->post('pre_page_image'));
                    $exist_image_name = end($exp_image);     
                    unlink(FCPATH .'uploads/cms/'. $exist_image_name);
                    $image_path = $this->do_upload($_FILES['page_image']['name']);
				}  
				$data['page_image'] = $image_path;            	      
				$data = $this->security->xss_clean($data);
				$where = array( 'id' => $id );   
				$result = $this->common_model->edit_data('cms',$where,$data);      
				if($result == true){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/admin_cms'));   
				}else{
					$this->session->set_flashdata('err', 'Error in updating record!');   
					redirect(base_url('admin/admin_cms'));   
				}    
			}else{   
				$where = array('id'=>$id);   
				$data['details'] = $this->common_model->get_data_by_id($where,'cms');
				$data['view'] = 'admin/cms/cms_edit';      
				$this->load->view('admin_layout', $data);      
			}
		}    
		   

	public function del($id = 0){
		$where = array('id'=>$id);
		$data['page_image_chk'] = $this->common_model->get_data_by_id($where,'cms');
		// exploding https path and converting folder path for unlink image
		if(!empty($data['page_image_chk']['page_image'])){
            $exp_del_image = explode('/',$data['page_image_chk']['page_image']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/cms/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/cms/'. $exist_del_image_name);
            }				
		}		
		$this->db->delete('cms', array('id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('admin/admin_cms'));
	}

	public function do_upload($image){
        $config['upload_path']          = './uploads/cms/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        /*$config['max_size']             = 1000;
        $config['max_width']            = 1024;
        $config['max_height']           = 768;*/
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('page_image'))
        {
                $res = array('error' => $this->upload->display_errors());
                $this->session->set_flashdata('err', $res['error']);
				redirect(base_url('admin/admin_cms'));   
        }else{    
                $res = array('upload_data' => $this->upload->data());
                return base_url('uploads/cms/').$res['upload_data']['file_name'];
        }
    }	
       
}