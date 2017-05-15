<?php
	/**
	* 
	*/
	class Recept_model extends CI_Model
	{
		
		public function __construct()
		{
			$this->load->database();
		}

		public function get_receptek($slug = FALSE)
		{
			if ($slug === FALSE) {
				$query = $this->db->get('receptek');
				return $query->result_array();
			}

			$query = $this->db->get_where('receptek', array('slug' => $slug));
			return $query->row_array();

		}
	}