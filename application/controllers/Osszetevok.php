<?php
	/**
	*
	*/
	class Osszetevok extends CI_Controller
	{

		public function index(){
			$adattomb['cim'] = 'Összetevők';

			$adattomb['osszetevok'] = $this->Osszetevo_model->get_osszetevok();

			$this->load->view('sablonok/fejlec');
			$this->load->view('osszetevok/index', $adattomb);
			$this->load->view('sablonok/lablec');
		}

		public function megjelenit($slug = NULL)
		{
			$adattomb['osszetevo'] = $this->Osszetevo_model->get_osszetevok($slug);
			$adattomb['cim'] = $adattomb['osszetevo']['osszetevo_nev'] . ' összetevő részletei';
			if(empty($adattomb))
			{
				show_404();
			}
			//print_r($adattomb);
			//$adattomb['nev'] = $adattomb['osszetevo']['osszetevo_nev'];
			//$adattomb['torzs'] = $adattomb['osszetevo']['osszetevo_torzs'];
			//$adattomb['torzs'] = $adattomb['osszetevo']['osszetevo_torzs'];

			$this->load->view('sablonok/fejlec');
			$this->load->view('osszetevok/megjelenit', $adattomb);
			$this->load->view('sablonok/lablec');
		}

		public function kategoriak(){
			$adattomb['cim'] = 'Összetevő kategóriák';

			$adattomb['osszetevo_kategoriak'] = $this->Osszetevo_model->get_osszetevo_kategoriak();

			$this->load->view('sablonok/fejlec');
			$this->load->view('osszetevok/kategoriak', $adattomb);
			$this->load->view('sablonok/lablec');
		}

		public function uj_kategoria(){
			$adattomb['cim'] = 'Új összetevő kategória felvitele';

			$this->form_validation->set_rules('osszetevo_kategoria_nev', 'Összetevő kategória neve', 'required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('sablonok/fejlec');
				$this->load->view('osszetevok/uj-kategoria', $adattomb);
				$this->load->view('sablonok/lablec');
			}
			else
			{
				$this->Osszetevo_model->letrehoz_osszetevo_kategoria();
				redirect('osszetevok/kategoriak');
			}
		}

		public function uj_osszetevo()
		{
			$adattomb['cim'] = 'Új összetvő felvitele';
			$adattomb['osszetevo_kategoriak'] = $this->Osszetevo_model->get_osszetevo_kategoriak();

			$this->form_validation->set_rules('osszetevo_nev', 'Összetevő neve', 'required');

			if($this->form_validation->run() === FALSE)
			{
				$this->load->view('sablonok/fejlec');
				$this->load->view('osszetevok/uj', $adattomb);
				$this->load->view('sablonok/lablec');
			}
			else
			{
				$this->Osszetevo_model->letrehoz_osszetevo();
				redirect('osszetevok');
			}


		}
	}
