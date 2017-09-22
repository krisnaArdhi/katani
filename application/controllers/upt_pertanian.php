<?php
class upt_pertanian extends CI_Controller {
	 function __construct(){
  parent::__construct();

  $this->load->model('M_login');
	  $this->load->model('M_upt');

  $this->load->helper('html','form_helper');
  $this->load->library('table','pagination');
 // $this->auth->restrict();


 }
	public function index ()
	{
		if ($this->session->userdata('akses') == 'admin')
		 {
			 	$this->load->view('upt/daftar_mantri_tani');
					 //$this->load->view("akses_gagal");
				 }
				 else {
					 echo "anda tidak memiliki hak untuk ini";

				 }
		$this->load->view('upt/daftar_mantri_tani');
	}
	public function data_mantri ()
	{

		$data['query'] = $this->M_upt->tampil_mantri();
		$this->load->view('upt/daftar_mantri_tani',$data);
	}

	public function data_kelompok ()
	{

		$data['query'] = $this->M_upt->tampil_kelompok();
		$this->load->view('upt/data_kelompok',$data);
	}

	public function data_ppl ()
	{

		$data['query'] = $this->M_upt->tampil_ppl();
		$this->load->view('upt/data_ppl',$data);
	}

		public function data_anggaran_tani ()
	{

		$data['query'] = $this->M_upt->tampil_anggaran();
		$this->load->view('upt/data_anggaran_tani',$data);
	}

	public function daftar_kelompok()
	{
		$this->load->view('kelompok_tani/daftar_kelompok_tani');
	}

	public function daftar_distributor()
	{
		$this->load->view('upt/input_distributor');
	}

	public function daftar_ppl()
    {

        $data = array(
            'wilayah' => $this->M_upt->wil_drop(),
            'wilayah_ppl' => $this->input->post('id_wilayah') ? $this->input->post('nama_wilayah') : '', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
				);
       $this->load->view('upt/input_anggota_ppl', $data);
    }

		public function daftar_anggota_tani()
	    {

	        $data = array(
	            'wilayah' => $this->M_upt->wil_drop(),
	            'wilayah_ppl' => $this->input->post('id_wilayah') ? $this->input->post('nama_wilayah') : '', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
					);
	       $this->load->view('upt/input_anggota_tani', $data);
	    }


	public function daftar_mantri()
	{
		$data = array(
            'wilayah' => $this->M_upt->wil_drop(),
            'wilayah_ppl' => $this->input->post('id_wilayah') ? $this->input->post('nama_wilayah') : '', // untuk edit ganti '' menjadi data dari database misalnya $row->provinsi
			);
		$this->load->view('upt/input_mantri_tani',$data);
	}

	public function data_wilayah()
	{
		$data['query'] = $this->M_upt->tampil_wilayah();
		$this->load->view('upt/data_wilayah',$data);
	}
	function simpan_mantri()
{
	 if (isset($_POST['mysubmit']))
	 {
 $data = array(
 'nik'    							 => $this->input->post('nik'),
 'nama_mantri'         	 => $this->input->post('nama'),
 'id_wilayah'				     => $this->input->post('wil')

 );


	$hasil=$this->M_upt->simpan_data_mantri($data);
	if ($hasil){
	 echo "<script> alert('data berhasil Disimpan');location='".base_url()."transaksi/tambah_transaksi'</script>";
	}else{
	 echo  "<script> alert('data gagal Disimpan');location='".base_url()."transaksi/tambah_transaksi'</script>";
	}
	echo "<br/>";
	echo anchor('simpanan/tampil', 'Kembali');
 }
 else{
	 $this->load->view('tambahtransaksi');
 }

}

function simpan_ppl()
{
 if (isset($_POST['mysubmit']))
 {
$data = array(
'nip'    							 => $this->input->post('nip'),
'nama_ppl'         	 => $this->input->post('nama'),
'id_wilayah'				     => $this->input->post('wil'),
'telp'				     => $this->input->post('telp')


);


$hasil=$this->M_upt->simpan_data_ppl($data);
if ($hasil){
 echo "<script> alert('data berhasil Disimpan');location='".base_url()."transaksi/tambah_transaksi'</script>";
}else{
 echo  "<script> alert('data gagal Disimpan');location='".base_url()."transaksi/tambah_transaksi'</script>";
}
echo "<br/>";
echo anchor('simpanan/tampil', 'Kembali');
}
else{
 $this->load->view('tambahtransaksi');
}

}

}
