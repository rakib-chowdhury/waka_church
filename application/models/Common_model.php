<?php
	class Common_model extends CI_Model{
		public function add_data($table,$data,$where = 0){
			if($where){
				$query_user_check = $this->db->get_where($table, $where);
				$count_user = $query_user_check->num_rows();
				if($count_user == 0){
					$this->db->insert($table, $data);
					return true;				
				}else{
					return false;
				}
			}else{
				$query_insert = $this->db->insert($table, $data);
				if($query_insert){
					return true;
				}else{
					return false;
				}
			}
		}
		public function get_data_by_id($where,$table){
			$query = $this->db->get_where($table, $where);
			return $result = $query->row_array();
		}		
		public function get_data_by_where($where,$table){
			$query = $this->db->get_where($table, $where);
			return $result = $query->result_array();
		}
		function get_random_listing($table)
		{
		    // $this->db->order_by('id', 'RANDOM');
		    $this->db->order_by('rand()');
		    $this->db->limit(10);
		    $query = $this->db->get($table);
		    return $query->result_array();

		}
		public function get_data_by_coloumn($coloumn,$table,$where){
			if(!empty($where)){
				$this->db->select($coloumn);
				$this->db->from($table);
				$this->db->where($where);
				$query = $this->db->get();
				return $result = $query->row_array();				
			}else{
				$this->db->select($coloumn);
				$this->db->from($table);
				$query = $this->db->get();
				return $result = $query->result_array();				
			}
		}			
		public function get_all_data($table){
			$query = $this->db->get($table);
			return $result = $query->result_array();
		}
		public function edit_data($table, $where, $data){
			$this->db->where($where);
			$this->db->update($table, $data);
			return true;
		}
	}
?>