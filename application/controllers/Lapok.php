<?php
	/**
	* 
	*/
	class Lapok extends CI_Controller
	{
		public function megjelenit($oldal = 'fooldal'){
			//Fizikailag létezik-e az oldal.php
			if(!file_exists(APPPATH.'views/lapok/'.$oldal.'.php')){
				show_404();
			}

			$adattomb['cim'] = ucfirst($oldal);

			$this->load->view('sablonok/fejlec');
			$this->load->view('lapok/'.$oldal, $adattomb);
			$this->load->view('sablonok/lablec');
		}
	}