<?php
	/**
	*
	*/
	class Receptek extends CI_Controller
	{
		public function __construct()
    {
        parent::__construct();  //make sure you extend the parent constructor
				$this->lang->load('receptek');
        //Your code:
        //if( ! $this->session->userdata('lang') )
        //    $this->session->set_userdata('lang','ar');
    }

		public function index(){
			$cim = $this->lang->line('legutobbi_receptek');
			$adattomb['cim'] = $cim;
			$adattomb['receptek'] = $this->Recept_model->get_receptek();

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
			$cim = $this->lang->line('uj_recept_felvitele');
			$adattomb['cim'] = $cim;

			$this->load->view('sablonok/fejlec');
			$this->load->view('receptek/uj', $adattomb);
			$this->load->view('sablonok/lablec');
		}
	}
