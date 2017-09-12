<?php 
class kelompok_tani extends CI_Controller {
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
}