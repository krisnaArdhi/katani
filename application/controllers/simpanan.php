<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class simpanan extends CI_Controller{
 function __construct(){
  parent::__construct();

  $this->load->model('m_simpanan');
  $this->load->helper('html','my_helper');
  $this->load->library('table','pagination'); 
  $this->auth->restrict();
     

 }

 function terima_simpanan($id_anggota){
  $this->m_simpanan->terima($id_anggota); 
  $this->tampil();
  }
 function tampil()
  {
    //untuk anggota
            {
            //pengaturan pagination
                 $config['base_url'] = site_url ('simpanan/tampil');
                  $config['total_rows'] = $this->db->get('simpanan')->num_rows();
                 $config['per_page'] = "20";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_simpanan->tampil_pg($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampilsimpanananggota',$data);
            }
    }
   function semua()
    {
      //admin muncul semua
       if ($this->session->userdata('group') == 'anggota') 
        {
            echo "anda tidak memiliki hak untuk ini";
              //$this->load->view("akses_gagal");
            }else
            {
            //pengaturan pagination
                 $config['base_url'] = site_url ('simpanan/index');
                  $config['total_rows'] = $this->db->get('simpanan')->num_rows();
                 $config['per_page'] = "20";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_simpanan->tampil_pg3($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampilsimpanansemua',$data);
            }
    }

function index()
    {
      
       if ($this->session->userdata('group') == 'anggota') 
        {
            echo "anda tidak memiliki hak untuk ini";
              //$this->load->view("akses_gagal");
            }else
            {
            //pengaturan pagination
                 $config['base_url'] = site_url ('simpanan/index');
                  $config['total_rows'] = $this->db->get('simpanan')->num_rows();
                 $config['per_page'] = "5";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_simpanan->tampil_pg2($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampilsimpanan',$data);
            }
    }
   

    function cari() 
    {
       $data['tampil_pg']=$this->m_simpanan->caridata();
       if($data['tampil_pg']==null) 
          {
          print 'maaf data yang anda cari tidak ada atau keywordnya salah';
          print br(2);
          print anchor('simpanan','kembali');
          }
          else 
          {
             $this->load->view('tampilsimpanan',$data); 
          }
    }

     

    function tambah_simpanan()
  {
    if ($this->session->userdata('group') == 'member') 
    {
    $this->load->view('akses_gagal');
    }else
    {
          $this->load->view('tambahsimpanan');
    }
  }

 function koreksi_simpanan($id_simpanan){
  $data_simpanan['datasimpanan']=$this->m_simpanan->tampil($id_simpanan); 
  $this->load->view('koreksisimpanan',$data_simpanan);
  } 




   function simpan_simpanan()
 {
    if (isset($_POST['mysubmit']))
    {
  $data = array(
  'id_simpanan'     => $this->input->post('id_simpanan'),
  'id_anggota'           => $this->input->post('id_anggota'),                                       
  'tanggal_simpanan'        => $this->input->post('tanggal_simpanan'),    
  'jumlah_simpanan'        => $this->input->post('jumlah_simpanan'),   
  'ket'          => $this->input->post('ket')
  
  );


   $hasil=$this->m_simpanan->simpan_data_simpanan($data);
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




 function edit_simpanan()
 {
    if (isset($_POST['myedit']))
    {
  $data = array(
  'id_simpanan'     => $this->input->post('id_simpanan'),
  'nama_simpanan'     => $this->input->post('nama_simpanan'),
  'id_anggota'           => $this->input->post('id_anggota'),                                       
  'tanggal_simpanan'        => $this->input->post('tanggal_simpanan'),    
  'jumlah_simpanan'        => $this->input->post('jumlah_simpanan'),   
  'ket'          => $this->input->post('ket') 
  
  );


   $hasil=$this->m_simpanan->edit_data_simpanan($data);
   if ($hasil){
    echo "<script> alert('data berhasil di terima');location='".base_url()."simpanan/index'</script>";
   }else{
    echo  "<script> alert('data gagal di terima');location='".base_url()."simpanan/index'</script>";
   }
   echo "<br/>";
   echo anchor('simpanan/index', 'Kembali');
  }
  else{
    $this->load->view('tambahtransaksi');
  }
  
 }
 }

  function konfirm_hapus_simpanan($id_simpanan)
  {
    $data_simpanan['datasimpanan']=$this->m_simpanan->konfirm_hapus($id_simpanan);
    $this->load->view('konfirmhapussimpanan',$data_simpanan);
  }
  function hapus_simpanan($id_simpanan)
  {
    $hasil=$this->m_simpanan->hapus_data_simpanan($id_simpanan);
    if ($hasil){
      echo "hapus data berhasil";
    }else{
      echo "hapus data gagal";
    }
    echo "<br />";
    echo anchor('simpanan/index','kembali');
  }

