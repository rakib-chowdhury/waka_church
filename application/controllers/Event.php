<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Event extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->model('common_model');		
	}	
	public function index($option=""){ 
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');	
		if($option == "event"){
			$query_events = $this->db->query("select event.*,users.phone_number from event left join users on event.user_id=users.user_id where event.status='1' order by event.event_id DESC limit 0,3");
		$event_cnt_query = $this->db->query("select * from event where status = '1'");
		$data['event_count'] = $event_cnt_query->num_rows();					
			$data['events'] = $query_events->result_array();
		}		 									
		$data['view'] = 'event_view';
		$this->load->view('front_layout', $data);		
	}

	public function load_more(){
		$limit = $this->input->get('limit');
      	$offset = $this->input->get('offset');
		$query_events = $this->db->query("select event.*,users.phone_number from event left join users on event.user_id=users.user_id where event.status='1' order by event.event_id DESC limit ".$offset.",".$limit."");
        $events = $query_events->result_array();
		foreach($events as $event){
                $old_date_timestamp = strtotime($event['event_date']);
                $new_date = date('d/m/Y', $old_date_timestamp); 
                $event_time = $new_date.' '.$event['event_start'].' - '.$event['event_end'];
                $event_image = $event["event_image"];
                $event_name = $event["event_name"];
                $event_phone_number = $event["phone_number"];?>
              <div class="col-6 col-sm-6 col-md-6 col-lg-4 my-3">
                <div class="each-choirs adjt_height"> 
                  <img src="<?php echo $event_image; ?>" class="img-fluid mx-auto d-table" alt=""> <a href="<?php echo base_url();?>event/details/<?php echo $event['event_id']; ?>" class="link-listing"><i class="fas fa-eye"></i></a>
                  <div class="choirs-describe">
                    <p class="close-notice mt-0"><?php echo $event_time;?></p>
                    <h4 class="event-name"><?php echo $event_name; ?></h4>
                    <ul class="event-address">
                      <li><i class="fas fa-phone"></i> <a href="tel:<?php echo str_replace(array("-"," ","(",")","_"),'',$event_phone_number);?>"><?php echo $event_phone_number; ?></a></li>
                    </ul>
                  </div>
                </div>
              </div>
        <?php } 
		//$data['view'] = $query_listing->result_array();
		
	}	

	public function details($event_id=0){ 
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');	

		$data['event_details'] = $this->common_model->get_data_by_id(array('event_id'=>$event_id),'event');
		$cnt_query = $this->db->query("select * from event_reviews where event_id = '".$event_id."' and status = '1'");
		$usr_query = $this->db->query("select name,image from users where user_id = '".$data['event_details']['user_id']."'");
		$data['user_name'] = $usr_query->row_array();	
		$data['review_count'] = $cnt_query->num_rows();
		$data['reviews'] = $cnt_query->result_array();
		//echo "<pre>"; print_r($data); exit;				
		$data['view'] = 'event_details_view';
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
					'event_id' => $this->input->post('event_id'),
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
				$result = $this->common_model->add_data('event_reviews',$data);
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