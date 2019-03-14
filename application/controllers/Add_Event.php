<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Add_Event extends CI_Controller {
	public function __construct(){
 		parent::__construct();
 		$this->load->model('common_model'); 				
	}

	public function index(){ 
		if(!$this->session->userdata('user_sess_data')){
			redirect(base_url('home'), 'refresh');
		} 		
		$data['header_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'header_menu','status'=>'1'),'menu');
		$data['footer_menu'] = $this->common_model->get_data_by_where(array('menu_category'=>'footer_menu'),'menu');
		$data['settings'] = $this->common_model->get_all_data('settings');				
		$data['view'] = 'add_event_view';
		$this->load->view('front_layout', $data);		
	}

	public function add_data(){
		// echo "string"; die();
		if($this->input->post('submit')){
			//************ thumbnail **************
			if(!empty($_FILES['event_image']['name'])){
				$thumbnail_path = $this->do_upload($_FILES['event_image']['name'],"event_image","event");
			}
			//**********************														

			$data = array(
				'user_id' => $this->input->post('user_id'),
				'event_name' => $this->input->post('event_name'),
				'address' => $this->input->post('address'),
				'state' => $this->input->post('state'),
                'event_image' => $thumbnail_path,
                'event_date' => $this->input->post('event_date'),
                'event_start' => $this->input->post('event_start'),
                'event_end' => $this->input->post('event_end'),
                'details' => $this->input->post('details'),
				'host' => $this->input->post('host'),
                'status' => '0',
				'date_modified' => date('Y-m-d H:i:s')
			);
			$data = $this->security->xss_clean($data);
			$result = $this->common_model->add_data('event',$data);
			if($result == true){
				$this->session->set_flashdata('msg', 'Event Added Successfully!');
				redirect(base_url('Add_Event'));
			}
		}
	}


	public function do_upload($image,$post_image_field_name,$upload_folder_name){ 
        $config['upload_path']          = './uploads/'.$upload_folder_name.'/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        //$config['max_size']             = 1000;
        //$config['max_width']            = 1024;
        //$config['max_height']           = 768;
        $this->load->library('upload', $config);
        $this->upload->initialize($config);
        if ( ! $this->upload->do_upload($post_image_field_name))
        {
            $res = array('error' => $this->upload->display_errors());
            $this->session->set_flashdata('err', $res['error']);
			redirect(base_url('add_listing'));   
        }else{    
            $res = array('upload_data' => $this->upload->data());
            return base_url('uploads/').$upload_folder_name.'/'.$res['upload_data']['file_name'];
        }
    }

}