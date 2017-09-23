<?php
class kelompok_tani extends CI_Controller {
	function __construct(){
	 parent::__construct();

	 $this->load->model('M_kelompok');
	 $this->load->model('M_jual');
	 $this->load->helper('html');
	 $this->load->library('table','pagination');
	 //$this->auth->restrict();


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
	public function data_anggota()
	{
		$data['query'] = $this->M_kelompok->tampil_anggota();
		$this->load->view('kelompok_tani/data_anggota',$data);
	}
	public	function detail_anggota(){
	 $id=$this->uri->segment(3);
	 $data['data']=$this->M_kelompok->detailanggota($id);

	 $this->load->view('kelompok_tani/detail_anggota',$data);
	 }

	 public function tambah_jual()
	{
		$this->load->view('kelompok_tani/tambah_jual');
	}

	function simpan_jual()
	 {
	    if (isset($_POST['simpan'])){
	      $config['upload_path']          = './bahan_user/jual';
	        $config['allowed_types']        = 'gif|jpg|png';
	        $config['max_size']             = 0;
	        $config['max_width']            = 0;
	        $config['max_height']           = 0;

	        $this->load->library('upload', $config);
	        $this->upload->initialize($config);

	                if ( ! $this->upload->do_upload('gambar'))
	                {
	                        $error = array('error' => $this->upload->display_errors());

	                        var_dump($error);
	                }
	                else
	                {
	                        $gambar = $this->upload->data('file_name');
	                }

	  $data = array(
	  'id_jual'     => $this->input->post('id_jual'),
	  'nik'     => $this->input->post('nik'),
	  'jumlah_barang'     => $this->input->post('jumlah_barang'),
	  'harga'     => $this->input->post('harga'),
	  'gambar'           => $gambar,
		);

	   $hasil=$this->M_jual->simpan_data_jual($data);
	   echo "<script> alert('Gambar jual berhasil di tambahkan !');location='".base_url()."admin'</script>";
	 }
	  else{
	    echo  "<script> alert('data gagal Disimpan');location='".base_url()."kelompok_tani/tambah_jual'</script>";
	  }
	  
	 }


}
