<?php
	class Church_model extends CI_Model{
		function get_all_data(){
		    $this->db->select('listings.*,users.user_id,users.name as user_name');
		    $this->db->from('listings'); 
		    $this->db->join('users', 'users.user_id=listings.user_id', 'left');
		    $this->db->where(array('listings.ministry_options'=>'church'));
			$query = $this->db->get();
			if($query){
				return $result = $query->result_array();
			}    				
		}

		function get_data_by_id($id){
		    $this->db->select('listings.*,users.user_id,users.name as user_name');
		    $this->db->from('listings'); 
		    $this->db->join('users', 'users.user_id=listings.user_id', 'left');
		    $this->db->where(array('listings.ministry_options'=>'church','listings.listings_id'=>$id));
			$query = $this->db->get();
			if($query){
				return $result = $query->row_array();
			}    				
		}			
	}
?>