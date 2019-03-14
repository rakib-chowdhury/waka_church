<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends CI_Controller {
	public function __construct(){
 		parent::__construct();     
		$this->load->model('common_model');  
	}	   
	public function index(){ 
		$data['details'] = $this->common_model->get_all_data('faq');
		$data['view'] = 'admin/faq/faq_list';
		$this->load->view('admin_layout', $data);	         	
	}

	public function add(){
		if($this->input->post('submit')){    
				$data = array(
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
                    'status' 		=> $this->input->post('status'),
                    'date_created' => date('Y-m-d H:i:s')
             	);  
				$data = $this->security->xss_clean($data);
				$where = array('title' => $data['title']);
				$result = $this->common_model->add_data('faq',$data,$where);    
				if($result == true){
					$this->session->set_flashdata('msg', 'Record is Added Successfully!');
					redirect(base_url('admin/faq'));
				}else{
					$this->session->set_flashdata('err', 'Faq Title Already Exist!');   
					redirect(base_url('admin/faq'));   
				}
		}else{   
			$data['view'] = 'admin/faq/faq_add';      
			$this->load->view('admin_layout', $data);
		}
	} 
    
		public function edit( $id=0 ){

			if($this->input->post('submit')){
				$data = array(
					'title' => $this->input->post('title'),
					'description' => $this->input->post('description'),
                    'status' 		=> $this->input->post('status'),
                    'date_modified' => date('Y-m-d H:i:s')
            	);       
				$data = $this->security->xss_clean($data);
				$where = array( 'faq_id' => $id );   
				$result = $this->common_model->edit_data('faq',$where,$data);      
				if($result == true){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/faq'));   
				}else{
					$this->session->set_flashdata('err', 'Error in updating record!');   
					redirect(base_url('admin/faq'));   
				}    
			}else{   
				$where = array('faq_id'=>$id);   
				$data['details'] = $this->common_model->get_data_by_id($where,'faq');
				$data['view'] = 'admin/faq/faq_edit';      
				$this->load->view('admin_layout', $data);      
			}
		}    
		   

	public function del($id = 0){	
		$this->db->delete('faq', array('faq_id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('admin/faq'));
	}
       
}