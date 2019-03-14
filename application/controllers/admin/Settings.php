<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Settings extends CI_Controller {
	public function __construct(){
 		parent::__construct();     
		$this->load->model('common_model');
		if(!$this->session->userdata('admin_sess_data'))
		{
			redirect(base_url('admin/login'), 'refresh');
		}   
	}	   

	public function index($id = 1){
		if($this->input->post('submit')){
			$where = array('settings_id'=>$id);
			$data['set_chk'] = $this->common_model->get_data_by_id($where,'settings');

			//************ thumbnail **************
			if(empty($_FILES['logo']['name'])){
				$logo_path = $data['set_chk']['logo'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['set_chk']['logo']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/settings/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/settings/'. $exist_image_name);
            	}
                //===============
				$logo_path = $this->do_upload($_FILES['logo']['name'],"logo","settings");
			}
			//**********************
			//************ top_church_icon image **************
			if(empty($_FILES['top_church_icon']['name'])){
				$top_church_icon_path = $data['set_chk']['top_church_icon'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['set_chk']['top_church_icon']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/settings/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/settings/'. $exist_image_name);
            	}
                //===============
				$top_church_icon_path = $this->do_upload($_FILES['top_church_icon']['name'],"top_church_icon","settings");
			}
			//**********************
			//************ top_choir_icon image **************
			if(empty($_FILES['top_choir_icon']['name'])){
				$top_choir_icon_path = $data['set_chk']['top_choir_icon'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['set_chk']['top_choir_icon']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/settings/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/settings/'. $exist_image_name);
            	}
                //===============
				$top_choir_icon_path = $this->do_upload($_FILES['top_choir_icon']['name'],"top_choir_icon","settings");
			}
			//**********************
			//************ top_band_icon image **************
			if(empty($_FILES['top_band_icon']['name'])){
				$top_band_icon_path = $data['set_chk']['top_band_icon'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['set_chk']['top_band_icon']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/settings/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/settings/'. $exist_image_name);
            	}
                //===============
				$top_band_icon_path = $this->do_upload($_FILES['top_band_icon']['name'],"top_band_icon","settings");
			}
			//**********************
			//************ top_event_icon image **************
			if(empty($_FILES['top_event_icon']['name'])){
				$top_event_icon_path = $data['set_chk']['top_event_icon'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['set_chk']['top_event_icon']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/settings/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/settings/'. $exist_image_name);
            	}
                //===============
				$top_event_icon_path = $this->do_upload($_FILES['top_event_icon']['name'],"top_event_icon","settings");
			}
			//**********************
			//************ bottom_church_image image **************
			if(empty($_FILES['bottom_church_image']['name'])){
				$bottom_church_image_path = $data['set_chk']['bottom_church_image'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['set_chk']['bottom_church_image']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/settings/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/settings/'. $exist_image_name);
            	}
                //===============
				$bottom_church_image_path = $this->do_upload($_FILES['bottom_church_image']['name'],"bottom_church_image","settings");
			}
			//**********************
			//************ bottom_choir_image image **************
			if(empty($_FILES['bottom_choir_image']['name'])){
				$bottom_choir_image_path = $data['set_chk']['bottom_choir_image'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['set_chk']['bottom_choir_image']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/settings/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/settings/'. $exist_image_name);
            	}
                //===============
				$bottom_choir_image_path = $this->do_upload($_FILES['bottom_choir_image']['name'],"bottom_choir_image","settings");
			}
			//**********************																																
			//************ bottom_band_image image **************
			if(empty($_FILES['bottom_band_image']['name'])){
				$bottom_band_image_path = $data['set_chk']['bottom_band_image'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['set_chk']['bottom_band_image']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/settings/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/settings/'. $exist_image_name);
            	}
                //===============
				$bottom_band_image_path = $this->do_upload($_FILES['bottom_band_image']['name'],"bottom_band_image","settings");
			}
			//**********************
			//************ bottom_event_image image **************
			if(empty($_FILES['bottom_event_image']['name'])){
				$bottom_event_image_path = $data['set_chk']['bottom_event_image'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['set_chk']['bottom_event_image']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/settings/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/settings/'. $exist_image_name);
            	}
                //===============
				$bottom_event_image_path = $this->do_upload($_FILES['bottom_event_image']['name'],"bottom_event_image","settings");
			}
			//**********************									

			$data = array(
				'logo' => $logo_path,
                'banner_title' => $this->input->post('banner_title'),
                'banner_sub_title' => $this->input->post('banner_sub_title'),
                'top_church_icon' => $top_church_icon_path,
                'top_church_title' => $this->input->post('top_church_title'),
				'top_choir_icon' => $top_choir_icon_path,
				'top_choir_title' => $this->input->post('top_choir_title'),
				'top_band_icon' => $top_band_icon_path,
				'top_band_title' => $this->input->post('top_band_title'),
				'top_event_icon' => $top_event_icon_path,
				'top_event_title' => $this->input->post('top_event_title'),
				'section1_title' => $this->input->post('section1_title'),
				'section1_subtitile' => $this->input->post('section1_subtitile'),
				'section1_register_desc' => $this->input->post('section1_register_desc'),
				'section2_title' => $this->input->post('section2_title'),
				'section2_subtitle' => $this->input->post('section2_subtitle'),
				'section2_join_desc' => $this->input->post('section2_join_desc'),
				'section2_join_subtitle' => $this->input->post('section2_join_subtitle'),
				'section3_title' => $this->input->post('section3_title'),
				'section3_subtitle' => $this->input->post('section3_subtitle'),
				'section4_title' => $this->input->post('section4_title'),
				'section4_subtitle' => $this->input->post('section4_subtitle'),
				'section5_title' => $this->input->post('section5_title'),
				'section5_subtitle' => $this->input->post('section5_subtitle'),
				'section6_title' => $this->input->post('section6_title'),
				'section6_subtitle' => $this->input->post('section6_subtitle'),
				'bottom_church_image' => $bottom_church_image_path,
				'bottom_church_title' => $this->input->post('bottom_church_title'),
				'bottom_choir_image' => $bottom_choir_image_path,
				'bottom_choir_title' => $this->input->post('bottom_choir_title'),
				'bottom_band_image' => $bottom_band_image_path,
				'bottom_band_title' => $this->input->post('bottom_band_title'),
				'bottom_event_image' => $bottom_event_image_path,
				'bottom_event_title' => $this->input->post('bottom_event_title'),
				'section7_title' => $this->input->post('section7_title'),
				'section7_subtitle' => $this->input->post('section7_subtitle'),
				'copyright' => $this->input->post('copyright'),
				'facebook_link' => $this->input->post('facebook_link'),
				'twitter_link' => $this->input->post('twitter_link'),
				'googleplus_link' => $this->input->post('googleplus_link'),
				'instagram_link' => $this->input->post('instagram_link'),
				'youtube_link' => $this->input->post('youtube_link'),
				'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'address' => $this->input->post('address'),
				'working_hours' => $this->input->post('working_hours'),
				'map' => $this->input->post('map'),
				'date_modified' => date('Y-m-d H:i:s')
			);
			$data = $this->security->xss_clean($data);
			//echo "pre"; print_r($data); die;
			$where = array('settings_id'=>$id);
			$result = $this->common_model->edit_data('settings',$where,$data);
			//echo  $this->db->last_query();die;
			if($result == true){
				$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
				redirect(base_url('admin/settings'));
			}
		}
		else{
			$data['details'] = $this->common_model->get_data_by_id(array("settings_id"=>$id),"settings");
			$data['view'] = 'admin/settings/settings_edit';
			$this->load->view('admin_layout', $data);
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
			redirect(base_url('admin/event'));   
        }else{    
            $res = array('upload_data' => $this->upload->data());
            return base_url('uploads/').$upload_folder_name.'/'.$res['upload_data']['file_name'];
        }
    }
       
}