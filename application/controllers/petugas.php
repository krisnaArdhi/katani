<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class petugas extends CI_Controller{
 function __construct(){
  parent::__construct();

  $this->load->model('m_petugas');
  $this->load->helper('html');
  $this->load->library('table','pagination'); 
  $this->auth->restrict();
     

 }
    function index()
    {
      

       if ($this->session->userdata('group') == 'member') 
        {
              $this->load->view("akses_gagal");
            }else
            {
            //pengaturan pagination
                 $config['base_url'] = site_url ('petugas/index');
                  $config['total_rows'] = $this->db->get('petugas')->num_rows();
                 $config['per_page'] = "5";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_petugas->tampil_pg($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampilpetugas',$data);
            }
            
  
    }
    function cari() 
    {
       $data['tampil_pg']=$this->m_petugas->caridata();
       //jika data yang dicari tidak ada maka akan keluar informasi 
       //bahwa data yang dicari tidak ada
       if($data['tampil_pg']==null) 
          {
          print 'maaf data yang anda cari tidak ada atau keywordnya salah';
          print br(2);
          print anchor('petugas','kembali');
          }
          else 
          {
             $this->load->view('tampilpetugas',$data); 
          }
    }

     

    function tambah_petugas()
  {
    if ($this->session->userdata('group') == 'member') 
    {
    $this->load->view('akses_gagal');
    }else
    {
          $this->load->view('tambahpetugas');
    }
  }


function simpan_petugas()
 {
  if (isset($_POST['mysubmit']))
    {
  $data = array(
  'id_petugas'     => $this->input->post('id_petugas'),
  'nama_petugas'   => $this->input->post('nama_petugas'),                                       
  'alamat'         => $this->input->post('alamat'),
  'no_tlp'         => $this->input->post('no_tlp'),   
  'tmp_lhr'        => $this->input->post('tmp_lhr'),   
  'tgl_lhr'        => $this->input->post('tgl_lhr'),   
  'ket'            => $this->input->post('ket'),   
  'mode'           => $this->input->post('mode')

  );

   $hasil=$this->m_petugas->simpan_data_petugas($data);
   if ($hasil){
    echo "Simpan data berhasil";
   }else{
    echo "Simpan data gagal";
   }
   echo "<br/>";
   echo anchor('petugas/index', 'Kembali');
  }
  else{
    $this->load->view('tambahpetugas');
  }
  }
  

  function koreksi_petugas($id_petugas){
  $data_petugas['datapetugas']=$this->m_petugas->tampil($id_petugas); 
  $this->load->view('koreksipetugas',$data_petugas);
  } 

 function edit_petugas()
 {
    if (isset($_POST['myedit']))
    {
   $data = array(
    'id_petugas'      => $this->input->post('id_petugas'),
    'nama_petugas'    => $this->input->post('nama_petugas'),                                       
    'alamat'          => $this->input->post('alamat'),
    'no_tlp'          => $this->input->post('no_tlp'),   
    'tmp_lhr'         => $this->input->post('tmp_lhr'),   
    'tgl_lhr'         => $this->input->post('tgl_lhr'),   
    'ket'             => $this->input->post('ket'),   
    'mode'            => $this->input->post('mode')

  );

   $hasil=$this->m_petugas->edit_data_petugas($data);
   if ($hasil){
    echo "Simpan data berhasil";
   }else{
    echo "Simpan data gagal";
   }
   echo "<br/>";
   echo anchor('petugas/index', 'Kembali');
  }
  else{
    $this->load->view('tambahpetugas');
  }
  
 }

  function konfirm_hapus_petugas($id_petugas)
  {
    $data_petugas['datapetugas']=$this->m_petugas->konfirm_hapus($id_petugas);
    $this->load->view('konfirmhapuspetugas',$data_petugas);
  }
  function hapus_petugas($id_petugas)
  {
    $hasil=$this->m_petugas->hapus_data_petugas($id_petugas);
    if ($hasil){
      echo "hapus data berhasil";
    }else{
      echo "hapus data gagal";
    }
    echo "<br />";
    echo anchor('petugas/index','kembali');
  }

}
