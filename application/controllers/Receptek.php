<?php
	/**
	*
	*/
	class Receptek extends CI_Controller
	{
		public function index(){
			$adattomb['cim'] = 'Legutóbbi Receptek';

			$adattomb['receptek'] = $this->Recept_model->get_receptek();
			//print_r($adattomb['receptek'], FALSE);

			$this->load->view('sablonok/fejlec');
			$this->load->view('receptek/index', $adattomb);
			$this->load->view('sablonok/lablec');
		}

		public function megjelenit($slug = NULL)
		{
			$adattomb['recept'] = $this->Recept_model->get_receptek($slug);

			if(empty($adattomb['recept']))
			{
				show_404();
			}
			//print_r($adattomb);
			$adattomb['cim'] = $adattomb['recept']['cim'];
			$adattomb['torzs'] = $adattomb['recept']['torzs'];

			$this->load->view('sablonok/fejlec');
			$this->load->view('receptek/megjelenit', $adattomb);
			$this->load->view('sablonok/lablec');
		}

		public function uj()
		{
			echo 'uj';
		}
	}
