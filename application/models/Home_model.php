<?php
	class Home_model extends CI_Model{
		public function get_events()
        {
            $this->db->select('e.event_id, e.event_name, e.event_image, e.event_date, 
            e.event_start, e.event_end, e.details, e.host, e.state, e.address, e.status');
            $this->db->from('event e');
            $this->db->where('e.status', '1');
            $this->db->order_by('e.event_id', 'desc');
            $this->db->limit(4);
            return $this->db->get();
        }
	}
?>