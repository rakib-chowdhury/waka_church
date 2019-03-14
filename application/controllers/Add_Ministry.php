<?php
header('Access-Control-Allow-Origin: *');
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_Ministry extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->model('common_model'); 
 		$this->load->library('session');
	}

	public function index(){  		

		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');	

		  	
		
			if(!$this->session->userdata('user_sess_data')){
			
			  redirect(base_url('home'), 'refresh');
			}else{
				$data['view'] = 'add_ministry_view';
				$this->load->view('front_layout', $data);				
			} 		
	}
	public function send_add_ministry_link(){
		$msg = "";

		$msg .= "<a href='".base_url('Add_listing')."'>Add Listing link </a>";
		$this->email->from('hello@wakachurch.com', 'Wakachurch Admin');


		$email = $this->session->userdata('user_sess_data')['email'];
		$this->email->to($email);
		$this->email->subject('Verification For Listing Page');
		$data['bodymessage']= $msg;			
		$data['res_user']= $this->session->userdata('user_sess_data')['name'];			
		$data['email']= $email;			
		$template=$this->load->view('email_template/add_ministry_mail',$data,true);	
		$this->email->message($template);
		$this->email->set_mailtype("html");		
		// $this->email->message($msg);
		if($this->email->send()){
            $this->session->set_flashdata('success', 'Verification Link Is Sent Successfully');
            // echo "success";
			  redirect(base_url('home'), 'refresh');
		}
			  redirect(base_url('home'), 'refresh');
	}

}