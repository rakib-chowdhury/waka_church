<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Menu extends CI_Controller {
	public function __construct(){
 		parent::__construct();     
		$this->load->model('common_model');
		$this->load->model('admin/menu_model');
		if(!$this->session->userdata('admin_sess_data'))
		{
			redirect(base_url('admin/login'), 'refresh');
		}   
	}	   
	public function index(){	
		$data['menu_list'] = $this->menu_model->get_all_data();
		$data['view'] = 'admin/menu/menu_list';
		$this->load->view('admin_layout', $data);	         	
	}

	public function add(){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required');
			$this->form_validation->set_rules('menu_category', 'Menu Category', 'trim|required');
			$this->form_validation->set_rules('menu_link', 'Menu Link', 'trim|required');
			$this->form_validation->set_rules('menu_order', 'Menu Order', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$data['view'] = 'admin/menu/menu_add';
				$this->load->view('admin_layout', $data);
			}
			else{
				$data = array(
					'menu_name' => $this->input->post('menu_name'),
					'menu_category' => $this->input->post('menu_category'),
					'menu_link' => base_url('/').$this->input->post('menu_link'),
                    'menu_order' => $this->input->post('menu_order'),
                    'status' => $this->input->post('status'),
					'date_created' => date('Y-m-d H:i:s')
				);
				$data = $this->security->xss_clean($data);
				$where = array('menu_name' => $data['menu_name'],'menu_category' => $data['menu_category']);
				$result = $this->common_model->add_data('menu',$data,$where);
				if($result == true){
					$this->session->set_flashdata('msg', 'Record is Added Successfully!');
					redirect(base_url('admin/menu'));
				}else{
					$this->session->set_flashdata('err', 'Menu Already Assigned in this Category!');
					redirect(base_url('admin/menu'));
				}
			}
		}
		else{
			$data['view'] = 'admin/menu/menu_add';
			$this->load->view('admin_layout', $data);
		}
	}

	public function edit($id = 0){
		if($this->input->post('submit')){
			$this->form_validation->set_rules('menu_name', 'Menu Name', 'trim|required');
			$this->form_validation->set_rules('menu_category', 'Menu Category', 'trim|required');
			$this->form_validation->set_rules('menu_link', 'Menu Link', 'trim|required');
			$this->form_validation->set_rules('menu_order', 'Menu Order', 'trim|required');
			$this->form_validation->set_rules('status', 'Status', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$where = array('menu_id'=>$id);
				$data['menu'] = $this->common_model->get_data_by_id($where,'menu');
				$data['view'] = 'admin/menu/menu_edit';
				$this->load->view('admin_layout', $data);
			}
			else{
				$data = array(
					'menu_name' => $this->input->post('menu_name'),
					'menu_category' => $this->input->post('menu_category'),
					'menu_link' => base_url('/').$this->input->post('menu_link'),
                    'menu_order' => $this->input->post('menu_order'),
                    'status' => $this->input->post('status'),
					'date_modified' => date('Y-m-d H:i:s')
				);
				$data = $this->security->xss_clean($data);
				$where = array('menu_id'=>$id);
				$result = $this->common_model->edit_data('menu',$where,$data);
				if($result == true){
					$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
					redirect(base_url('admin/menu'));
				}
			}
		}
		else{
			$where = array('menu_id'=>$id);
			$data['menu'] = $this->common_model->get_data_by_id($where,'menu');
			$data['view'] = 'admin/menu/menu_edit';
			$this->load->view('admin_layout', $data);
		}
	}

	public function del($id = 0){
		$this->db->delete('menu', array('menu_id' => $id));
		$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
		redirect(base_url('admin/menu'));
	}

	public function status_change($id = 0,$status){
		$data = array('status'=> $status);
		$where = array('menu_id'=>$id);
		$result = $this->common_model->edit_data('menu',$where,$data);
		if($result == true){
			$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
			redirect(base_url('admin/menu'));
		}		
	}	
       
}