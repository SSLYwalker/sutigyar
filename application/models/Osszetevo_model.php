<?php
	/**
	*
	*/
	class Osszetevo_model extends CI_Model
	{
		public function __construct()
		{
			$this->load->database();
		}

		public function get_osszetevok($slug = FALSE)
		{

			$this->db->select('osszetevo.id as osszetevo_id, osszetevo.nev as osszetevo_nev, osszetevo.nev as osszetevo_nev, osszetevo.torzs as osszetevo_torzs, osszetevo.slug as osszetevo_slug, osszetevo.kategoria_id as osszetevo_kategoria_id, osszetevo.letrehozva as osszetevo_letrehozva, osszetevo_kategoriak.nev as osszetevo_kategoria_nev');
			$this->db->join('osszetevo_kategoriak AS osszetevo_kategoriak', 'osszetevo_kategoriak.id = osszetevo.kategoria_id');
			if ($slug === FALSE) {
				$this->db->order_by('osszetevo.nev', 'ASC');
				$query = $this->db->get('osszetevo AS osszetevo');
				return $query->result_array();
			}

			$query = $this->db->get_where('osszetevo AS osszetevo', array('slug' => $slug));
			return $query->row_array();
		}

		public function get_osszetevo_kategoriak()
		{
			$query = $this->db->get('osszetevo_kategoriak');
			return $query->result_array();
		}

		public function letrehoz_osszetevo_kategoria()
		{
			$adattomb = array('nev' => $this->input->post('osszetevo_kategoria_nev'));

			return $this->db->insert('osszetevo_kategoriak', $adattomb);
		}

		public function letrehoz_osszetevo()
		{
			$adattomb = array
			(
				'nev' => $this->input->post('osszetevo_nev'),
				'torzs' => $this->input->post('osszetevo_torzs'),
				'slug' => url_title($this->input->post('osszetevo_nev')),
				'kategoria_id' => $this->input->post('osszetevoKategoriaSelect')
			);

			return $this->db->insert('osszetevo', $adattomb);
		}
	}
