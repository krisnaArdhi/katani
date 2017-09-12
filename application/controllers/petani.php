<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class petani extends CI_Controller{
 function __construct(){
  parent::__construct();

  $this->load->model('m_petani');
  $this->load->model('m_login');
  $this->load->helper('html');
  $this->load->library('table','pagination'); 
 // $this->auth->restrict();
     

 }

function index(){
   $data['query'] = $this->m_petani->tampil_barang();

  $this->load->view('petani/index_petani',$data);
  } 

function harga_desa(){
   $data['query'] = $this->m_petani->tampil_pengepul_non_desa();
  $this->load->view('petani/pengepuldesa',$data);
  } 
function daftar(){
   //$data['query'] = $this->m_petani->tampil_barang();
  $this->load->view('petani/daftar');
  }

 function coba(){
  //$data['query'] = $this->m_petani->tampil_barang();
  $this->load->view('grids');
  
  } 
function simpan()
 {
    if (isset($_POST['mysubmit']))
    {
   $data1 = array(
  'alamat_petani'   => $this->input->post('alamat'),
  'nama_petani'   => $this->input->post('nama')
  );
     $data2 = array(                                   
  'password'       => $this->input->post('password'),                                          
  'username'         => $this->input->post('nama'),
  'jenis'         => $this->input->post('jenis')
  );

   $hasil=$this->m_petani->daftar($data1);
  $hasil=$this->m_login->daftar($data2);
   if ($hasil){
    echo "<script> alert('data berhasil Disimpan');location='".base_url()."petani/daftar'</script>";
   }else{
    echo  "<script> alert('data gagal Disimpan');location='".base_url()."petani/daftar'</script>";
   }
   echo "<br/>";
   echo anchor('petani/daftar', 'Kembali');
   }
  else{
    $this->load->view('petani/daftar');
  }
  
 }


function terima_anggota($id_anggota){
  $this->m_anggota->terima($id_anggota); 
  $this->tampil();
  }

  function koreksi_anggota($id_anggota){
  $data_anggota['dataanggota']=$this->m_anggota->tampil($id_anggota); 
  $this->load->view('koreksianggota',$data_anggota);
  } 

 function terima()
 {
    if (isset($_POST['trima']))
    {
      

   $hasil=$this->m_anggota->terima($data);
   if ($hasil){
    echo "Simpan data berhasil";
   }else{
    echo "Simpan data gagal";
   }
   echo "<br/>";
   echo anchor('anggota/index', 'Kembali');
  }
  else{
    $this->load->view('terimaanggota');
  }
  
 }



 function edit_anggota()
 {
    if (isset($_POST['myedit']))
    {
   $data = array(
  'id_anggota'     => $this->input->post('id_anggota'),
  'nama_lengkap'   => $this->input->post('nama_lengkap'),                                    
  'password'       => $this->input->post('password'),                                          
  'alamat'         => $this->input->post('alamat'),   
  'tgl_lhr'        => $this->input->post('tgl_lhr'),    
  'tmp_lhr'        => $this->input->post('tmp_lhr'),   
  'j_kel'          => $this->input->post('j_kel'),  
  'status'         => $this->input->post('status'), 
  'no_telp'        => $this->input->post('no_telp'),
  'group'            => $this->input->post('group'),  
  'mode'           => $this->input->post('mode')

  );


   $hasil=$this->m_anggota->edit_data_anggota($data);
    if ($hasil){
    echo "<script> alert('data berhasil Disimpan');location='".base_url()."anggota/'</script>";
   }else{
    echo  "<script> alert('data gagal Disimpan');location='".base_url()."anggota/tambah_anggota'</script>";
   }
   echo "<br/>";
   echo anchor('anggota', 'Kembali');
  }
  else{
    $this->load->view('tambahanggota');
  }
  
 }

  function konfirm_hapus_anggota($id_anggota)
  {
    $data_anggota['dataanggota']=$this->m_anggota->konfirm_hapus($id_anggota);
    $this->load->view('konfirmhapusanggota',$data_anggota);
  }
  function hapus_anggota($id_anggota)
  {
    $hasil=$this->m_anggota->hapus_data_anggota($id_anggota);
     if ($hasil){
    echo "<script> alert('data berhasil Dihapus');location='".base_url()."anggota/tampilsemua'</script>";
   }else{
    echo  "<script> alert('data gagal Dihapus');location='".base_url()."anggota/tampilsemua'</script>";
   }
    echo "<br />";
    echo anchor('anggota/index','kembali');
  }

}
