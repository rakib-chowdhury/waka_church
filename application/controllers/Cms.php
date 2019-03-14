<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Cms extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->model('common_model');		
	}	
	public function index($slug = ""){ 
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');

		if($slug == "contact-us"){
			$data['row_cms'] = array("page_slug"=>$slug);
		}elseif($slug == "faq"){
			$query_faq = $this->db->query("select * from faq order by faq_id DESC");
			$data['row_faq'] = $query_faq->result_array();	
			$data['row_cms'] = array("page_slug"=>$slug);
		}else{
			$query_cms = $this->db->query("select * from cms where page_slug='".$slug."'");
			$data['row_cms'] = $query_cms->row_array();			
		}

		//===========							
		$data['view'] = 'cms_view';
		$this->load->view('front_layout', $data);		
	}

	public function contactfrm(){
		$settings = $this->common_model->get_all_data('settings');
		$admin_email =  $settings[0]['email'];
		$name = $_POST["name"];
		$phone = $_POST["phone"];
		$email = $_POST["email"];
		$address = $_POST["address"];
		$message = $_POST["message"];

		$msg = '<table style="width:600px; border:0px; background-color:#e3f6fa; padding-bottom:20px;" cellpadding="0" cellspacing="0">
			<tr>
			<td style="background-color:#191919"><img src="'.base_url().'uploads/settings/logo.png" alt="Header"></td>
			</tr>
			<tr>
			<td style="width:100%; padding:10px 3% 0px 3%; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333333; line-height:19px;">
			Hello Administrator
			</td>
			</tr>
			<tr>
			<td style="width:100%; padding:10px 3% 0px 3%; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333333; line-height:19px;">
			'.$message.'
			</td>
			</tr>
			<tr>
			<td style="width:100%; padding:10px 3% 0px 3%; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333333; line-height:19px;">
			My Details are given below: 
			</td>
			</tr>
			<tr>
			<td style="width:100%; padding:20px 3% 0px 3%; font-family:Arial, Helvetica, sans-serif; font-size:16px; color:#0361c1; line-height:19px; font-weight:bold;">

			<ul style="width:100%; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333333; line-height:19px; font-weight:normal;">
			<li>Name: '.$name.'</li>
			<li>Email: '.$email.'</li>
			<li>Phone: '.$phone.'</li>
			<li>Address: '.$address.'</li>
			</ul> 
			</td>
			</tr>
			<tr>
			<td style="width:100%; padding:10px 3% 0px 3%; font-family:Arial, Helvetica, sans-serif; font-size:14px; color:#333333; line-height:19px;">
			Regards<br />
			'.$name.'
			</td>
			</tr>
			<tr>
			<td style="width:100%; padding:10px 3% 10px 3%; font-family:Arial, Helvetica, sans-serif; font-size:13px; color:#fff; line-height:5px; font-weight:bold; background-color:#000000">Copyright 2018 · All rights reserved </td>
			</tr>
		</table>';		
 		if($_POST['submit']){
			$this->email->from($email, $name);
			$this->email->to($admin_email);
			//$this->email->cc('another@another-example.com');
			//$this->email->bcc('them@their-example.com');
			$this->email->subject('Waka Church Contact Mail');
			$this->email->message($msg);
			$send_mail = $this->email->send();
			if($send_mail){
				echo 1;
			}else{
				echo 0;
			}			
		}
	}
}