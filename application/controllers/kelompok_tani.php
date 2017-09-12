<?php
class kelompok_tani extends CI_Controller {
	function __construct(){
	 parent::__construct();

	 $this->load->model('M_kelompok');
	 $this->load->helper('html');
	 $this->load->library('table','pagination');
	 $this->auth->restrict();


	}
	public function index()
	{
		$this->load->view('kelompok_tani/data_kelompok');
	}
	public function anggaran_tani()
	{
		$this->load->view('kelompok_tani/rencana_anggaran');
	}
	public function komoditas()
	{
		$this->load->view('kelompok_tani/komoditas');
	}
	public function data_panen()
	{
		$data['query'] = $this->M_kelompok->tampil_panen();
		$this->load->view('kelompok_tani/data_komoditas',$data);
	}
}
