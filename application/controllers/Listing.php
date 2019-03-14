<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Listing extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->model('common_model');	
	}	
	public function index($option=""){
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');
		if($option){
		$query_listing = $this->db->query("select listings.listings_id,listings.name,listings.thumbnail,listings.mon_start,listings.mon_end,listings.tue_start,listings.tue_end,listings.wed_start,listings.wed_end,listings.thu_start,listings.thu_end,listings.fri_start,listings.fri_end,listings.sat_start,listings.sat_end,listings.sun_start,listings.sun_end,users.phone_number from listings left join users on listings.user_id = users.user_id where listings.ministry_options='".$option."' and listings.status='1' order by listings.listings_id DESC limit 0,3");
		$listing_cnt_query = $this->db->query("select * from listings where ministry_options='".$option."'");
		$data['listing_count'] = $listing_cnt_query->num_rows();		
		$data['listings'] = $query_listing->result_array();
		}		 					
		$data['view'] = 'listing_view';
		$this->load->view('front_layout', $data);		
	}

	public function load_more(){
		$limit = $this->input->get('limit');
      	$offset = $this->input->get('offset');
	    $option = $this->input->get('ministry_option');
		$query_listing = $this->db->query("select listings.listings_id,listings.name,listings.thumbnail,listings.mon_start,listings.mon_end,listings.tue_start,listings.tue_end,listings.wed_start,listings.wed_end,listings.thu_start,listings.thu_end,listings.fri_start,listings.fri_end,listings.sat_start,listings.sat_end,listings.sun_start,listings.sun_end,users.phone_number from listings left join users on listings.user_id = users.user_id where listings.ministry_options='".$option."' and listings.status='1' order by listings.listings_id DESC limit ".$offset.",".$limit."");
        $listings = $query_listing->result_array();
		foreach($listings as $listing){ 
            $current_day = date('l'); 
            if($current_day == "Monday"){
              if($listing['mon_start'] && $listing['mon_end']){
                  $listing_time = 'Monday '.$listing['mon_start'].' - '.$listing['mon_end'];
              }else{
                  $listing_time = 'Monday Closed';
              }
            }elseif($current_day == "Tuesday"){
              if($listing['tue_start'] && $listing['tue_end']){
                  $listing_time = 'Tuesday '.$listing['tue_start'].' - '.$listing['tue_end'];
              }else{
                  $listing_time = 'Tuesday Closed';
              }           
            }elseif($current_day == "Wednesday"){
             if($listing['wed_start'] && $listing['wed_end']){
                  $listing_time = 'Wednesday '.$listing['wed_start'].' - '.$listing['wed_end'];
              }else{
                  $listing_time = 'Wednesday Closed';
              }  
            }elseif($current_day == "Thursday"){
             if($listing['thu_start'] && $listing['thu_end']){
                  $listing_time = 'Thursday '.$listing['thu_start'].' - '.$listing['thu_end'];
              }else{
                  $listing_time = 'Thursday Closed';
              }
            }elseif($current_day == "Friday"){
             if($listing['fri_start'] && $listing['fri_end']){
                  $listing_time = 'Friday '.$listing['fri_start'].' - '.$listing['fri_end'];
              }else{
                  $listing_time = 'Friday Closed';
              }
            }elseif($current_day == "Saturday"){
              if($listing['sat_start'] && $listing['sat_end']){
                  $listing_time = 'Saturday '.$listing['sat_start'].' - '.$listing['sat_end'];
              }else{
                  $listing_time = 'Saturday Closed';
              }
            }elseif($current_day == "Sunday"){
              if($listing['sun_start'] && $listing['sun_end']){
                  $listing_time = 'Sunday '.$listing['sun_start'].' - '.$listing['sun_end'];
              }else{
                  $listing_time = 'Sunday Closed';
              }
            }
            $listing_image = $listing["thumbnail"];
            $listing_name = $listing["name"];
            $listing_phone_number = $listing["phone_number"];?>
              <div class="col-6 col-sm-6 col-md-6 col-lg-4 my-3">
                <div class="each-choirs adjt_height"> 
                  <img src="<?php echo $listing_image; ?>" class="img-fluid mx-auto d-table" alt=""> <a href="<?php echo base_url();?>listing/details/<?php echo $listing['listings_id']; ?>" class="link-listing"><i class="fas fa-eye"></i></a>
                  <div class="choirs-describe">
                    <p class="close-notice mt-0"><?php echo $listing_time;?></p>
                    <h4 class="event-name"><?php echo $listing_name; ?></h4>
                    <ul class="event-address">
                      <li><i class="fas fa-phone"></i> <a href="tel:<?php echo str_replace(array("-"," ","(",")","_"),'',$listing_phone_number);?>"><?php echo $listing_phone_number; ?></a></li>
                    </ul>
                  </div>
                </div>
              </div>
        <?php } 
		//$data['view'] = $query_listing->result_array();
	}	

	public function details($listings_id=0){ 
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');	

		$data['listing_details'] = $this->common_model->get_data_by_id(array('listings_id'=>$listings_id),'listings');
		$cnt_query = $this->db->query("select * from listing_reviews where listings_id = '".$listings_id."' and status = '1'");
		$usr_query = $this->db->query("select name,image from users where user_id = '".$data['listing_details']['user_id']."'");
		$this->db->select('*');
		$this->db->from('members');
		$this->db->join('users','members.user_id = users.user_id');
		$this->db->where('listings_id',$listings_id);
		$member_query = $this->db->get();
		$data['members'] = $member_query->result_array();	
		
		$data['user_name'] = $usr_query->row_array();	
		$data['review_count'] = $cnt_query->num_rows();
		$data['reviews'] = $cnt_query->result_array();					
		$data['view'] = 'listing_details_view';
		$this->load->view('front_layout', $data);		
	}

	public function review_add(){
		if($_POST){					
			if (empty($_FILES['review_image']['name'])){
				$image_path = "";
			}else{
				$image_path = $this->do_upload($_FILES['review_image']['name']);
			}
			if($image_path != "0"){
				$data = array(
					'listings_id' => $this->input->post('listings_id'),
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'image' => $image_path,
					'title' => $this->input->post('title'),
	                'description' => $this->input->post('comment'),
	                'ratings' => $this->input->post('ratings'),
	                'status' => '0',
					'date_created' => date('Y-m-d H:i:s')
				);
				$data = $this->security->xss_clean($data);
				$result = $this->common_model->add_data('listing_reviews',$data);
				if($result == true){
					echo 1;
				}else{
					echo 0;
				}				
			}else{
				echo 0;
			}
		}else{
			echo 0;
		}
	}

    public function do_upload($image){
        $config['upload_path']          = './uploads/event_reviews/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload('review_image'))
        {
            echo "0";
        }else{
                $res = array('upload_data' => $this->upload->data());
                return base_url('uploads/event_reviews/').$res['upload_data']['file_name'];
        }
    }	
}