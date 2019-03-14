<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Faq extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->model('common_model');		
	}	
	public function index(){ 
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_type'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_type'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');
		//choir
		$query_faq = $this->db->query("select * from faq orderby faq_id DESC");
		$$data['row_faq'] = $query_cms->row_array();
		//===========							
		$data['view'] = 'faq_view';
		$this->load->view('front_layout', $data);		
	}
}