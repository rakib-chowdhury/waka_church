<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Search extends CI_Controller {
	public function __construct(){   
 		parent::__construct();
 		$this->load->model('common_model');		
	}	
	
	public function userDetails( $user_id=0 ){    
		
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');	
		$data['listing_details'] = $this->common_model->get_data_by_id(array('user_id'=>$user_id),'users');
		$data['view'] = 'user_profile';
		$this->load->view('front_layout', $data);      
		   
	}

	public function listingByCatState(){
		$addquery = '';
		if( isset($_REQUEST['state']) && !empty($_REQUEST['state']) ){
			$state = $_REQUEST['state'];
			//$state = $this->input->post("state");
			$addquery.= " and listings.state='".$state."'";
		}
		
		if( isset($_REQUEST['ministry_options']) && !empty($_REQUEST['ministry_options']) ){
			$ministry_options = $_REQUEST['ministry_options'];
			//$ministry_options = $this->input->post("ministry_options");
			$addquery.= " and listings.ministry_options='".$ministry_options."'";
		}    
		
		if( isset($_REQUEST['name']) && !empty($_REQUEST['name']) ){
			$name = $_REQUEST['name'];
			//$name = $this->input->post("name");   
			$addquery.= " and  listings.name LIKE '%".$name."%' ";  
		}  
		$queryListing = $this->db->query("select listings.listings_id,listings.name,listings.thumbnail,listings.mon_start,
		listings.mon_end,listings.tue_start,listings.tue_end,listings.wed_start,listings.wed_end,listings.thu_start,
		listings.thu_end,listings.fri_start,listings.fri_end,listings.sat_start,listings.sat_end,listings.sun_start,
		listings.sun_end,users.phone_number from listings left join users on listings.user_id = users.user_id where 
		listings.status='1' ".$addquery." order by listings.listings_id DESC");		
		$data['listings'] = 	$queryListing->result_array();
		$listing_cnt_query = $this->db->query("select * from listings where status='1' ".$addquery."");
		$data['listing_count'] = $listing_cnt_query->num_rows();					
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');				
		$data['view'] = 'search_listing_view';
		$this->load->view('front_layout', $data);
	}

	public function eventByTimeState(){
		$event_start = $this->input->post("event_start");   
		$event_end = $this->input->post("event_end");
		$event_date = $this->input->post("event_date");
		$event_date = date("Y-m-d", strtotime($_POST['event_date']));
		$state = $this->input->post("state");
		if( isset($_POST['event_date']) && !empty($_POST['event_date']) ){
			$event_cnt_query = $this->db->query("select * from event where status = '1' and DATE(event_date)= '".$event_date."'");
			$queryListing = $this->db->query("SELECT * FROM `event` where status='1' and  DATE(event_date)= '".$event_date."'");
		}
		elseif( isset($_POST['event_start']) && !empty($_POST['event_start']) ){
			$event_cnt_query = $this->db->query("select * from event where status = '1' and event_start= '".$event_start."'");
			$queryListing = $this->db->query("SELECT * FROM `event` where status='1' and  event_start= '".$event_start."'");
		}
		elseif( isset($_POST['event_end']) && !empty($_POST['event_end']) ){
			$event_cnt_query = $this->db->query("select * from event where status = '1' and event_end= '".$event_end."'");
			$queryListing = $this->db->query("SELECT * FROM `event` where status='1' and  event_end= '".$event_end."'");
		}				
		elseif( isset($_POST['state']) && !empty($_POST['state']) ){
			$event_cnt_query = $this->db->query("select * from event where status = '1' and state='".$state."'");
			$queryListing = $this->db->query("select * from event where status = '1' and state='".$state."'");
		}
		elseif(isset($event_start) && isset($event_end) && isset($event_start) && isset($event_end)){
			$event_cnt_query = $this->db->query("SELECT * FROM `event` WHERE DATE(event_date)= '".$event_date."' AND ( ( '".$event_start."' BETWEEN `event_start` AND `event_end` ) OR ( '".$event_end."' BETWEEN `event_start` AND `event_end` ) )");
			$queryListing = $this->db->query("SELECT * FROM `event` WHERE DATE(event_date)= '".$event_date."' AND ( ( '".$event_start."' BETWEEN `event_start` AND `event_end` ) OR ( '".$event_end."' BETWEEN `event_start` AND `event_end` ) )");
		}

		$data['event_count'] = $event_cnt_query->num_rows();		
		$data['events'] = 	$queryListing->result_array(); 	
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');
								
		$data['view'] = 'search_event_view';
		$this->load->view('front_layout', $data);
	}

	public function listingByNameCat(){

		$addquery = '';
		if( isset($_REQUEST['frd_cat']) && !empty($_REQUEST['frd_cat']) ){
			$ministry_options = $_REQUEST['frd_cat'];
			$addquery.= "AND listings.ministry_options='".$ministry_options."'";
		}

		if( isset($_REQUEST['frd_name']) && !empty($_REQUEST['frd_name']) ){
			$name = $_REQUEST['frd_name'];
			$addquery.= " AND users.name LIKE  '%".$name."%' ";  
		}   
		$listingSql = "SELECT listings.*,users.phone_number FROM `listings`,`users` WHERE listings.user_id =  users.user_id ".$addquery."";
		$listingQuery = $this->db->query($listingSql);   
		$data['listings'] = 	$listingQuery->result_array(); 
		$listing_cnt_query = $this->db->query("SELECT listings.*,users.phone_number FROM `listings`,`users` WHERE listings.user_id =  users.user_id ".$addquery."");
		$data['listing_count'] = $listing_cnt_query->num_rows();				
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');
								
		$data['view'] = 'search_listing_view';
		$this->load->view('front_layout', $data);
	}

	public function ajaxListingByNameCat(){

		if( isset($_REQUEST['frd_name']) && !empty($_REQUEST['frd_name']) ){
			$name = $_REQUEST['frd_name'];
			$listingSql = "SELECT * FROM `users` WHERE status = '1' AND name LIKE  '%".$name."%'"; 
		}   

		$listingQuery = $this->db->query($listingSql);
		$listings = $listingQuery->result_array();      
		if(!empty($listings)) {         
			echo '<ul class="list-group">';
			foreach ($listings as $data) {   
				echo '<li class="list-group-item">'.$data['name'].'<img src="'.$data['image'].'" width="50px;" height="10px;"><a href="'.base_url().'users/profile_view/'.$data['user_id'].'"><span class="badge">View Details</span></a></li>';	
			}            
			echo '</ul>';   
		}

	}

	public function state_listing($state=""){
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');
		if($state != ""){
		$query_listing = $this->db->query("select listings.listings_id,listings.name,listings.thumbnail,listings.mon_start,listings.mon_end,listings.tue_start,listings.tue_end,listings.wed_start,listings.wed_end,listings.thu_start,listings.thu_end,listings.fri_start,listings.fri_end,listings.sat_start,listings.sat_end,listings.sun_start,listings.sun_end,users.phone_number from listings left join users on listings.user_id = users.user_id where listings.state='".$state."' and listings.status='1' order by listings.listings_id DESC");
		$listing_cnt_query = $this->db->query("select * from listings where state='".$state."'");
		$data['listing_count'] = $listing_cnt_query->num_rows();		
		$data['listings'] = $query_listing->result_array();
		//event
		$query_events = $this->db->query("select event.*,users.phone_number from event left join users on event.user_id=users.user_id where event.status='1' and event.state = '".$state."'  order by event.event_id desc");
			$event_cnt_query = $this->db->query("select * from event where status = '1' and state = '".$state."'");
			$data['event_count'] = $event_cnt_query->num_rows();					
			$data['events'] = $query_events->result_array();
			$data['view'] = 'state_listing_view';
			$this->load->view('front_layout', $data);			
		}else{
			redirect(base_url('home'), 'refresh');
		}
	}
  
}