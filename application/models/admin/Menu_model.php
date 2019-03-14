<?php
	class Menu_model extends CI_Model{
		function get_all_data(){
			$this->db->from("menu");
			$this->db->order_by("menu_order", "asc");
			$query = $this->db->get(); 
			if($query){
				return $result = $query->result_array();
			}    				
		}

		function get_data_by_id($id){
		    $this->db->select('event.*,users.user_id,users.name as user_name');
		    $this->db->from('event'); 
		    $this->db->join('users', 'users.user_id=event.user_id', 'left');
		    $this->db->where(array('event.event_id'=>$id));
			$query = $this->db->get();
			if($query){
				return $result = $query->row_array();
			}    				
		}			
	}
?>