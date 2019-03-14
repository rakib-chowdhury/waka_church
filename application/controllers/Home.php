<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Home extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->model('common_model');		
 		$this->load->model('home_model');
	}

	public function index(){ 
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');
		//states count
		$listing_lagos = $this->common_model->get_data_by_where(array('state'=>'lagos'),'listings');
		$event_lagos = $this->common_model->get_data_by_where(array('state'=>'lagos'),'event');
		$data['lagos_count'] = count($listing_lagos) + count($event_lagos);

		$listing_abuja = $this->common_model->get_data_by_where(array('state'=>'abuja'),'listings');
		$event_abuja = $this->common_model->get_data_by_where(array('state'=>'abuja'),'event');
		$data['abuja_count'] = count($listing_abuja) + count($event_abuja);

		$listing_oyo = $this->common_model->get_data_by_where(array('state'=>'oyo'),'listings');
		$event_oyo = $this->common_model->get_data_by_where(array('state'=>'oyo'),'event');
		$data['oyo_count'] = count($listing_oyo) + count($event_oyo);

		$listing_akwa = $this->common_model->get_data_by_where(array('state'=>'akwa ibom'),'listings');
		$event_akwa = $this->common_model->get_data_by_where(array('state'=>'akwa ibom'),'event');
		$data['akwa_count'] = count($listing_akwa) + count($event_akwa);

		$listing_ogun = $this->common_model->get_data_by_where(array('state'=>'ogun'),'listings');
		$event_ogun = $this->common_model->get_data_by_where(array('state'=>'ogun'),'event');
		$data['ogun_count'] = count($listing_ogun) + count($event_ogun);	

		$listing_kaduna = $this->common_model->get_data_by_where(array('state'=>'kaduna'),'listings');
		$event_kaduna = $this->common_model->get_data_by_where(array('state'=>'kaduna'),'event');
		$data['kaduna_count'] = count($listing_kaduna) + count($event_kaduna);											

		//=========
		//choir
		$query_choir = $this->db->query("select listings.listings_id,listings.name,listings.thumbnail,listings.mon_start,listings.mon_end,listings.tue_start,listings.tue_end,listings.wed_start,listings.wed_end,listings.thu_start,listings.thu_end,listings.fri_start,listings.fri_end,listings.sat_start,listings.sat_end,listings.sun_start,listings.sun_end,users.phone_number,listings.phone from listings left join users on listings.user_id = users.user_id where listings.ministry_options='choir' and listings.status='1' order by listings.listings_id DESC limit 0,8");
		$data['row_choir'] = $query_choir->result_array();
		//===========
		//church random
		$query_church_random = $this->db->query("select DISTINCT listings.listings_id,listings.name,listings.thumbnail,listings.mon_start,listings.mon_end,listings.tue_start,listings.tue_end,listings.wed_start,listings.wed_end,listings.thu_start,listings.thu_end,listings.fri_start,listings.fri_end,listings.sat_start,listings.sat_end,listings.sun_start,listings.sun_end,users.phone_number,listings.faq_details,listings.phone,listing_reviews.ratings from listings left join users on listings.user_id = users.user_id left join listing_reviews on listing_reviews.listings_id = listings.listings_id where listings.ministry_options='church' and listings.status='1' order by RAND() limit 0,8");
		$data['row_church_random'] = $query_church_random->result_array();
  
		$data['get_random_listing'] = $this->common_model->get_random_listing('listings');


		//===========
		//band
		$query_band = $this->db->query("select listings.listings_id,listings.name,listings.thumbnail,listings.mon_start,listings.mon_end,listings.tue_start,listings.tue_end,listings.wed_start,listings.wed_end,listings.thu_start,listings.thu_end,listings.fri_start,listings.fri_end,listings.sat_start,listings.sat_end,listings.sun_start,listings.sun_end,users.phone_number from listings left join users on listings.user_id = users.user_id where listings.ministry_options='band' and listings.status='1' order by listings.listings_id DESC limit 0,8");
		$data['row_band'] = $query_band->result_array();
		//===========
		//church desc
		$query_church = $this->db->query("select listings.listings_id,listings.name,listings.thumbnail,listings.mon_start,listings.mon_end,listings.tue_start,listings.tue_end,listings.wed_start,listings.wed_end,listings.thu_start,listings.thu_end,listings.fri_start,listings.fri_end,listings.sat_start,listings.sat_end,listings.sun_start,listings.sun_end,users.phone_number,listings.faq_details,listing_reviews.ratings,listings.phone from listings left join users on listings.user_id = users.user_id left join listing_reviews on listing_reviews.listings_id = listings.listings_id where listings.ministry_options='church' and listings.status='1' order by listings.listings_id DESC limit 0,8");
		$data['row_church'] = $query_church->result_array();
		//===========
		//events desc
		$query_events = $this->db->query("select event.*,users.phone_number,event_reviews.ratings from event left join users on event.user_id=users.user_id left join event_reviews on event_reviews.event_id = event.event_id where event.status='1' order by event.event_id DESC limit 0,8");
		//$data['row_events'] = $query_events->result_array();
		$data['row_events'] = $this->home_model->get_events()->result_array();
		//===========
		//members list
	//	$data['listing_members'] = $this->common_model->get_data_by_where(array('is_member'=>'1'),'users');
	
	  $query_members = $this->db->query("select  distinct(users.user_id),users.name,users.email ,users.password ,users.url ,	users.phone_number,users.address ,users.city ,users.state, users.country, users.postcode, users.image,users.otp, users.is_member, users.status,
	       users.date_created,users.date_modified,listings.name as church_name
         from users left join members on members.user_id = users.user_id
        left join listings on listings.listings_id = members.listings_id and listings.ministry_options ='church'where users.is_member ='1' group by users.user_id");
	
		$data['listing_members'] = $query_members->result_array();
		
		
		//===========					
		$data['view'] = 'home_view';
		//echo '<pre>';print_r($data['row_events']);die();
		$this->load->view('front_layout', $data);		
	}
}