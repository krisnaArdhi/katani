<?php
class Distributor extends CI_Controller {
	 function __construct(){
  parent::__construct();

  $this->load->model('M_distributor','M_login');

  $this->load->helper('html','form_helper');
  $this->load->library('table','pagination');
 // $this->auth->restrict();


 }
	public function index ()
	{
		if ($this->session->userdata('akses') == 'distributor')
		 {
			 	$this->load->view('upt/daftar_mantri_tani');
					 //$this->load->view("akses_gagal");
				 }
				 else {
					 echo "anda tidak memiliki hak untuk ini";

				 }
		$this->load->view('upt/daftar_mantri_tani');
	}
	public function lelang ()
	{

		$this->load->view('upt/daftar_mantri_tani');
	}

}
