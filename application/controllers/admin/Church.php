<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Church extends CI_Controller {
	public function __construct(){
 		parent::__construct();     
		$this->load->model('common_model');
		$this->load->model('admin/church_model');
		if(!$this->session->userdata('admin_sess_data'))
		{
			redirect(base_url('admin/login'), 'refresh');
		}   
	}	   
	public function index(){	
		$data['church_list'] = $this->church_model->get_all_data();
		$data['view'] = 'admin/church/church_list';
		$this->load->view('admin_layout', $data);	         	
	}

	public function add(){
		if($this->input->post('submit')){
                $this->form_validation->set_rules('user_id', 'User Id', 'trim|required');
                $this->form_validation->set_rules('ministry_options', 'Ministry Options', 'trim|required');
				$this->form_validation->set_rules('name', 'Name', 'trim|required');
				$this->form_validation->set_rules('slogan', 'Slogan', 'trim|required');
				$this->form_validation->set_rules('state', 'State', 'required');
				$this->form_validation->set_rules('address', 'Address', 'trim|required');
				$this->form_validation->set_rules('phone', 'phone', 'trim|required');
				$this->form_validation->set_rules('email', 'Email', 'trim|required');
				$this->form_validation->set_rules('phone', 'phone', 'trim|required');
				$this->form_validation->set_rules('phone', 'phone', 'trim|required');
				if (empty($_FILES['thumbnail']['name'])){
					$this->form_validation->set_rules('thumbnail', 'Thumbnail', 'required');
				}
				if (empty($_FILES['feature_image1']['name'])){
					$this->form_validation->set_rules('feature_image1', 'Featured Image 1', 'required');
				}
				if (empty($_FILES['feature_image2']['name'])){
					$this->form_validation->set_rules('feature_image2', 'Featured Image 2', 'required');
				}
				if (empty($_FILES['feature_image3']['name'])){
					$this->form_validation->set_rules('feature_image3', 'Featured Image 3', 'required');
				}
				if (empty($_FILES['exterior_image1']['name'])){
					$this->form_validation->set_rules('exterior_image1', 'Exterior Image 1', 'required');
				}
				if (empty($_FILES['exterior_image2']['name'])){
					$this->form_validation->set_rules('exterior_image2', 'Exterior Image 2', 'required');
				}
				if (empty($_FILES['exterior_image3']['name'])){
					$this->form_validation->set_rules('exterior_image3', 'Exterior Image 3', 'required');
				}
				if (empty($_FILES['interior_image1']['name'])){
					$this->form_validation->set_rules('interior_image1', 'Interior Image 1', 'required');
				}
				if (empty($_FILES['interior_image2']['name'])){
					$this->form_validation->set_rules('interior_image2', 'Interior Image 2', 'required');
				}
				if (empty($_FILES['interior_image3']['name'])){
					$this->form_validation->set_rules('interior_image3', 'Interior Image 3', 'required');
				}																																
				if ($this->form_validation->run() == FALSE) {
					//******** get user data for dropdown*********
					$data['all_users'] = $this->common_model->get_all_data('users'); 
					//***********************
					$data['view'] = 'admin/church/church_add';
					$this->load->view('admin_layout', $data);
				}else{
					//************ thumbnail **************
						if(empty($_FILES['thumbnail']['name'])){
							$thumbnail_path = $this->do_upload($_FILES['thumbnail']['name'],"thumbnail","church");
						}
					//**********************

					//************ feature image **************
					if(!empty($_FILES['feature_image1']['name'])){
						$feature_image1 = $this->do_upload($_FILES['feature_image1']['name'],"feature_image1","church");
					}
					if(!empty($_FILES['feature_image2']['name'])){
						$feature_image2 = $this->do_upload($_FILES['feature_image2']['name'],"feature_image2","church");	
					}
					if(!empty($_FILES['feature_image3']['name'])){
						$feature_image3 = $this->do_upload($_FILES['feature_image3']['name'],"feature_image3","church");	
					}						
					//**********************

					//************ exterior image **************
					if(!empty($_FILES['exterior_image1']['name'])){
						$exterior_image1 = $this->do_upload($_FILES['exterior_image1']['name'],"exterior_image1","church");
					}
					if(!empty($_FILES['exterior_image2']['name'])){
						$exterior_image2 = $this->do_upload($_FILES['exterior_image2']['name'],"exterior_image2","church");
					}
					if(!empty($_FILES['exterior_image3']['name'])){
						$exterior_image3 = $this->do_upload($_FILES['exterior_image3']['name'],"exterior_image3","church");
					}						
					//**********************

					//************ interior image **************
					if(!empty($_FILES['interior_image1']['name'])){
						$interior_image1 = $this->do_upload($_FILES['interior_image1']['name'],"interior_image1","church");
					}
					if(!empty($_FILES['interior_image2']['name'])){
						$interior_image2 = $this->do_upload($_FILES['interior_image2']['name'],"interior_image2","church");
					}
					if(!empty($_FILES['interior_image3']['name'])){
						$interior_image3 = $this->do_upload($_FILES['interior_image3']['name'],"interior_image3","church");
					}			
					//**********************

					$mon_start = $this->input->post('mon_start');
					$mon_end = $this->input->post('mon_end');
					$tue_start = $this->input->post('tue_start');
					$tue_end = $this->input->post('tue_end');
					$wed_start = $this->input->post('wed_start');
					$wed_end = $this->input->post('wed_end');
					$thu_start = $this->input->post('thu_start');
					$thu_end = $this->input->post('thu_end');
					$fri_start = $this->input->post('fri_start');
					$fri_end = $this->input->post('fri_end');
					$sat_start = $this->input->post('sat_start');
					$sat_end = $this->input->post('sat_end');
					$sun_start = $this->input->post('sun_start');
					$sun_end = $this->input->post('sun_end');
					$data = array(
						'user_id' => $this->input->post('user_id'),
						'ministry_options' => $this->input->post('ministry_options'),
						'name' => $this->input->post('name'),
						'slogan' => $this->input->post('slogan'),
		                'thumbnail' => $thumbnail_path,
		                'state' => $this->input->post('state'),
		                'mon_start' => $mon_start,
		                'mon_end' => $mon_end,
		                'tue_start' => $tue_start,
		                'tue_end' => $tue_end,
		                'wed_start' => $wed_start,
		                'wed_end' => $wed_end,
		                'thu_start' => $thu_start,
		                'thu_end' => $thu_end,
		                'fri_start' => $fri_start,
		                'fri_end' => $fri_end,
		                'sat_start' => $sat_start,
		                'sat_end' => $sat_end,
		                'sun_start' => $sun_start,
		                'sun_end' => $sun_end,
		                'address' => $this->input->post('address'),
		                'phone' => $this->input->post('phone'),
						'email' => $this->input->post('email'),
						'website' => $this->input->post('website'),
						'facebook_url' => $this->input->post('facebook_url'),
						'twitter_url' => $this->input->post('twitter_url'),
						'instagram_url' => $this->input->post('instagram_url'),
						'youtube_url' => $this->input->post('youtube_url'),
						'faq_details' => $this->input->post('faq_details'),
						'church_parking' => $this->input->post('church_parking'),
						'church_wifi' => $this->input->post('church_wifi'),
						'church_wheelchair' => $this->input->post('church_wheelchair'),
						'church_family_friendly' => $this->input->post('church_family_friendly'),
						'church_online_transfer' => $this->input->post('church_online_transfer'),
						'church_air_conditioned' => $this->input->post('church_air_conditioned'),
						'church_kids_dept' => $this->input->post('church_kids_dept'),
						'church_rest_room' => $this->input->post('church_rest_room'),
						'feature_image1' => $feature_image1,
						'feature_image2' => $feature_image2,
						'feature_image3' => $feature_image3,
						'exterior_image1' => $exterior_image1,
						'exterior_image2' => $exterior_image2,
						'exterior_image3' => $exterior_image2,
						'interior_image1' => $interior_image1,
						'interior_image2' => $interior_image2,
						'interior_image3' => $interior_image3,
		                'status' => $this->input->post('status'),
						'date_created' => date('Y-m-d H:i:s')
					);
					$data = $this->security->xss_clean($data);
					$result = $this->common_model->add_data('listings',$data);
					if($result == true){
						$this->session->set_flashdata('msg', 'Record is Added Successfully!');
						redirect(base_url('admin/church'));
					}					
				}
		}else{
			//******** get user data for dropdown*********
			$data['all_users'] = $this->common_model->get_all_data('users'); 
			//***********************
			$data['view'] = 'admin/church/church_add';
			$this->load->view('admin_layout', $data);
		}
	}	

	public function edit($id = 0){
		if($this->input->post('submit')){
			$where = array('listings_id'=>$id);
			$data['church_thumbnail_chk'] = $this->common_model->get_data_by_id($where,'listings');

			//************ thumbnail **************
			if(empty($_FILES['thumbnail']['name'])){
				$thumbnail_path = $data['church_thumbnail_chk']['thumbnail'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['church_thumbnail_chk']['thumbnail']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/church/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/church/'. $exist_image_name);
            	}
                //===============
				$thumbnail_path = $this->do_upload($_FILES['thumbnail']['name'],"thumbnail","church");
			}
			//**********************

			//************ feature image **************
			if(empty($_FILES['feature_image1']['name'])){
				$feature_image1 = $data['church_thumbnail_chk']['feature_image1'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['church_thumbnail_chk']['feature_image1']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/church/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/church/'. $exist_image_name);
            	}
                //===============
				$feature_image1 = $this->do_upload($_FILES['feature_image1']['name'],"feature_image1","church");
			}

			if(empty($_FILES['feature_image2']['name'])){
				$feature_image2 = $data['church_thumbnail_chk']['feature_image2'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['church_thumbnail_chk']['feature_image2']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/church/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/church/'. $exist_image_name);
            	}
                //===============
				$feature_image2 = $this->do_upload($_FILES['feature_image2']['name'],"feature_image2","church");
			}

			if(empty($_FILES['feature_image3']['name'])){
				$feature_image3 = $data['church_thumbnail_chk']['feature_image3'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['church_thumbnail_chk']['feature_image3']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/church/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/church/'. $exist_image_name);
            	}
                //===============
				$feature_image3 = $this->do_upload($_FILES['feature_image3']['name'],"feature_image3","church");
			}
			//**********************

			//************ exterior image **************
			if(empty($_FILES['exterior_image1']['name'])){
				$exterior_image1 = $data['church_thumbnail_chk']['exterior_image1'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['church_thumbnail_chk']['exterior_image1']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/church/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/church/'. $exist_image_name);
            	}
                //===============
				$exterior_image1 = $this->do_upload($_FILES['exterior_image1']['name'],"exterior_image1","church");
			}

			if(empty($_FILES['exterior_image2']['name'])){
				$exterior_image2 = $data['church_thumbnail_chk']['exterior_image2'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['church_thumbnail_chk']['exterior_image2']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/church/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/church/'. $exist_image_name);
            	}
                //===============
				$exterior_image2 = $this->do_upload($_FILES['exterior_image2']['name'],"exterior_image2","church");
			}

			if(empty($_FILES['exterior_image3']['name'])){
				$exterior_image3 = $data['church_thumbnail_chk']['exterior_image3'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['church_thumbnail_chk']['exterior_image3']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/church/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/church/'. $exist_image_name);
            	}
                //===============
				$exterior_image3 = $this->do_upload($_FILES['exterior_image3']['name'],"exterior_image3","church");
			}
			//**********************

			//************ interior image **************
			if(empty($_FILES['interior_image1']['name'])){
				$interior_image1 = $data['church_thumbnail_chk']['interior_image1'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['church_thumbnail_chk']['interior_image1']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/church/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/church/'. $exist_image_name);
            	}
                //===============
				$interior_image1 = $this->do_upload($_FILES['interior_image1']['name'],"interior_image1","church");
			}

			if(empty($_FILES['interior_image2']['name'])){
				$interior_image2 = $data['church_thumbnail_chk']['interior_image2'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['church_thumbnail_chk']['interior_image2']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/church/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/church/'. $exist_image_name);
            	}
                //===============
				$interior_image2 = $this->do_upload($_FILES['interior_image2']['name'],"interior_image2","church");
			}

			if(empty($_FILES['interior_image3']['name'])){
				$interior_image3 = $data['church_thumbnail_chk']['interior_image3'];
			}else{
				// exploding https path and converting folder path for unlink image
                $exp_image = explode('/',$data['church_thumbnail_chk']['interior_image3']);
                $exist_image_name = end($exp_image);
                if (file_exists(FCPATH .'/uploads/church/'. $exist_image_name)) {
                	unlink(FCPATH .'/uploads/church/'. $exist_image_name);
            	}
                //===============
				$interior_image3 = $this->do_upload($_FILES['interior_image3']['name'],"interior_image3","church");
			}
			//**********************

			$mon_start = $this->input->post('mon_start');
			$mon_end = $this->input->post('mon_end');
			$tue_start = $this->input->post('tue_start');
			$tue_end = $this->input->post('tue_end');
			$wed_start = $this->input->post('wed_start');
			$wed_end = $this->input->post('wed_end');
			$thu_start = $this->input->post('thu_start');
			$thu_end = $this->input->post('thu_end');
			$fri_start = $this->input->post('fri_start');
			$fri_end = $this->input->post('fri_end');
			$sat_start = $this->input->post('sat_start');
			$sat_end = $this->input->post('sat_end');
			$sun_start = $this->input->post('sun_start');
			$sun_end = $this->input->post('sun_end');
			$data = array(
				'user_id' => $this->input->post('user_id'),
				'ministry_options' => $this->input->post('ministry_options'),
				'name' => $this->input->post('name'),
				'slogan' => $this->input->post('slogan'),
                'thumbnail' => $thumbnail_path,
                'state' => $this->input->post('state'),
                'mon_start' => $mon_start,
                'mon_end' => $mon_end,
                'tue_start' => $tue_start,
                'tue_end' => $tue_end,
                'wed_start' => $wed_start,
                'wed_end' => $wed_end,
                'thu_start' => $thu_start,
                'thu_end' => $thu_end,
                'fri_start' => $fri_start,
                'fri_end' => $fri_end,
                'sat_start' => $sat_start,
                'sat_end' => $sat_end,
                'sun_start' => $sun_start,
                'sun_end' => $sun_end,
                'address' => $this->input->post('address'),
                'phone' => $this->input->post('phone'),
				'email' => $this->input->post('email'),
				'website' => $this->input->post('website'),
				'facebook_url' => $this->input->post('facebook_url'),
				'twitter_url' => $this->input->post('twitter_url'),
				'instagram_url' => $this->input->post('instagram_url'),
				'youtube_url' => $this->input->post('youtube_url'),
				'faq_details' => $this->input->post('faq_details'),
				'church_parking' => $this->input->post('church_parking'),
				'church_wifi' => $this->input->post('church_wifi'),
				'church_wheelchair' => $this->input->post('church_wheelchair'),
				'church_family_friendly' => $this->input->post('church_family_friendly'),
				'church_online_transfer' => $this->input->post('church_online_transfer'),
				'church_air_conditioned' => $this->input->post('church_air_conditioned'),
				'church_kids_dept' => $this->input->post('church_kids_dept'),
				'church_rest_room' => $this->input->post('church_rest_room'),
				'feature_image1' => $feature_image1,
				'feature_image2' => $feature_image2,
				'feature_image3' => $feature_image3,
				'exterior_image1' => $exterior_image1,
				'exterior_image2' => $exterior_image2,
				'exterior_image3' => $exterior_image2,
				'interior_image1' => $interior_image1,
				'interior_image2' => $interior_image2,
				'interior_image3' => $interior_image3,
                'status' => $this->input->post('status'),
				'date_modified' => date('Y-m-d H:i:s')
			);
			$data = $this->security->xss_clean($data);
			$where = array('listings_id'=>$id);
			$result = $this->common_model->edit_data('listings',$where,$data);
			if($result == true){
				$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
				redirect(base_url('admin/church'));
			}
		}
		else{
			//******** get user data for dropdown*********
			$data['all_users'] = $this->common_model->get_all_data('users'); 
			//***********************
			$data['details'] = $this->church_model->get_data_by_id($id);
			$data['view'] = 'admin/church/church_edit';
			$this->load->view('admin_layout', $data);
		}
	} 
		   
	public function do_upload($image,$post_image_field_name,$upload_folder_name){ 
        $config['upload_path']          = './uploads/church/';
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
			redirect(base_url('admin/church'));   
        }else{    
            $res = array('upload_data' => $this->upload->data());
            return base_url('uploads/').$upload_folder_name.'/'.$res['upload_data']['file_name'];
        }
    }

	public function del($id = 0){
		$where = array('listings_id'=>$id);
		$data['listings_image_chk'] = $this->common_model->get_data_by_id($where,'listings');
		// exploding https path and converting folder path for unlink image
		if(!empty($data['listings_image_chk']['thumbnail'])){
            $exp_del_image = explode('/',$data['listings_image_chk']['thumbnail']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/church/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/church/'. $exist_del_image_name);
            }				
		}
		if(!empty($data['listings_image_chk']['feature_image1'])){
            $exp_del_image = explode('/',$data['listings_image_chk']['feature_image1']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/church/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/church/'. $exist_del_image_name);
            }				
		}
		if(!empty($data['listings_image_chk']['feature_image2'])){
            $exp_del_image = explode('/',$data['listings_image_chk']['feature_image2']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/church/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/church/'. $exist_del_image_name);
            }				
		}
		if(!empty($data['listings_image_chk']['feature_image3'])){
            $exp_del_image = explode('/',$data['listings_image_chk']['feature_image3']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/church/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/church/'. $exist_del_image_name);
            }				
		}
		if(!empty($data['listings_image_chk']['exterior_image1'])){
            $exp_del_image = explode('/',$data['listings_image_chk']['exterior_image1']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/church/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/church/'. $exist_del_image_name);
            }				
		}
		if(!empty($data['listings_image_chk']['exterior_image2'])){
            $exp_del_image = explode('/',$data['listings_image_chk']['exterior_image2']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/church/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/church/'. $exist_del_image_name);
            }				
		}
		if(!empty($data['listings_image_chk']['exterior_image3'])){
            $exp_del_image = explode('/',$data['listings_image_chk']['exterior_image3']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/church/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/church/'. $exist_del_image_name);
            }				
		}
		if(!empty($data['listings_image_chk']['interior_image1'])){
            $exp_del_image = explode('/',$data['listings_image_chk']['interior_image1']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/church/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/church/'. $exist_del_image_name);
            }				
		}
		if(!empty($data['listings_image_chk']['interior_image2'])){
            $exp_del_image = explode('/',$data['listings_image_chk']['interior_image2']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/church/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/church/'. $exist_del_image_name);
            }				
		}
		if(!empty($data['listings_image_chk']['interior_image3'])){
            $exp_del_image = explode('/',$data['listings_image_chk']['interior_image3']);
            $exist_del_image_name = end($exp_del_image);
            if (file_exists(FCPATH .'/uploads/church/'. $exist_del_image_name)) {
            	unlink(FCPATH .'/uploads/church/'. $exist_del_image_name);
            }				
		}																											
        //===============
        $del_listing_reviews = $this->db->delete('listing_reviews', array('listings_id' => $id));
        if($del_listing_reviews){
	 		$this->db->delete('listings', array('listings_id' => $id));
			$this->session->set_flashdata('msg', 'Record is Deleted Successfully!');
			redirect(base_url('admin/church'));       	
        }
	}

	public function status_change($id = 0,$status){
		$data = array('status'=> $status);
		$where = array('listings_id'=>$id);
		$result = $this->common_model->edit_data('listings',$where,$data);
		if($result == true){
			$this->session->set_flashdata('msg', 'Record is Updated Successfully!');
			redirect(base_url('admin/church'));
		}		
	}

	public function view($id = 0){
        $data['details'] = $this->church_model->get_data_by_id($id);
		$data['view'] = 'admin/church/church_view';
		$this->load->view('admin_layout', $data);
	}	
       
}