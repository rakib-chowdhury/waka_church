<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Dashboard extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->model('common_model');
 		$this->load->model('admin/church_model');
 		$this->load->model('admin/choir_model');
 		$this->load->model('admin/band_model');
 		$this->load->model('admin/event_model');
		if(!$this->session->userdata('admin_sess_data'))
		{
			redirect(base_url('admin/login'), 'refresh');
		} 		
	}	
	public function index(){ 
		// church count
		$data_church =  $this->church_model->get_all_data();
		$data['count_church'] = count($data_church);
		// choir count
		$data_choir =  $this->choir_model->get_all_data();
		$data['count_choir'] = count($data_choir);	
		// band count
		$data_band =  $this->band_model->get_all_data();
		$data['count_band'] = count($data_band);
		// event count
		$data_event=  $this->event_model->get_all_data();
		$data['count_event'] = count($data_event);							
		// user count
		$data_user =  $this->common_model->get_all_data('users');
		$data['count_user'] = count($data_user);
		$data['view'] = 'admin/dashboard/dashboard_view';
		$this->load->view('admin_layout', $data);		
	}
}