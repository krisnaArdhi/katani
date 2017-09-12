<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class transaksi extends CI_Controller{
 function __construct(){
  parent::__construct();

  $this->load->model('m_transaksi');
  $this->load->helper('html');
  $this->load->library('table','pagination'); 
  $this->auth->restrict();
     

 }

  function tampil()
  {
      //angota

       
            {
                 $config['base_url'] = site_url ('transaksi/tampil');
                  $config['total_rows'] = $this->db->get('transaksi')->num_rows();
                 $config['per_page'] = "5";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_transaksi->tampil_pg($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampiltransaksianggota',$data);
            }
    }
    function index()
    {
      //admin buat belum approve

       if ($this->session->userdata('group') == 'anggota') 
        {
              $this->load->view("akses_gagal");
            }else
            {
            //pengaturan pagination
                 $config['base_url'] = site_url ('transaksi/index');
                  $config['total_rows'] = $this->db->get('transaksi')->num_rows();
                 $config['per_page'] = "5";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_transaksi->tampil_pg3($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampiltransaksi',$data);
            }
            
  
    }

function tampilterima()
    {
      //admin buat sudah approve

       if ($this->session->userdata('group') == 'anggota') 
        {
              $this->load->view("akses_gagal");
            }else
            {
            //pengaturan pagination
                 $config['base_url'] = site_url ('transaksi/index');
                  $config['total_rows'] = $this->db->get('transaksi')->num_rows();
                 $config['per_page'] = "5";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_transaksi->tampil_pg2($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampiltransaksianggota',$data);
            }
            
  
    }

    function cari() 
    {
       $data['tampil_pg']=$this->m_transaksi->caridata();
       //jika data yang dicari tidak ada maka akan keluar informasi 
       //bahwa data yang dicari tidak ada
       if($data['tampil_pg']==null) 
          {
          print 'maaf data yang anda cari tidak ada atau keywordnya salah';
          print br(2);
          print anchor('transaksi','kembali');
          }
          else 
          {
             $this->load->view('tampiltransaksi',$data); 
          }
    }

     function terima_transaksi($id_transaksi){
  $this->m_transaksi->terima($id_transaksi); 
  $this->index();
  }

    function tambah_transaksi()
  {
    if ($this->session->userdata('group') == 'member') 
    {
    $this->load->view('akses_gagal');
    }else
    {
          $this->load->view('tambahtransaksi');
    }
  }

 function koreksi_transaksi($id_transaksi){
  $data_transaksi['datatransaksi']=$this->m_transaksi->tampil($id_transaksi); 
  $this->load->view('koreksitransaksi',$data_transaksi);
  } 


  function simpan_transaksi()
 {
    if (isset($_POST['mysubmit']))
    {
  $data = array(
  'id_transaksi'          => $this->input->post('id_transaksi'),
  'nama_pinjaman'         => $this->input->post('nama_pinjaman'),    
  'id_anggota'            => $this->input->post('id_anggota'),                                       
  'besar_pinjaman'        => $this->input->post('besar_pinjaman'),                                                                            
  'tgl_pengajuan'         => $this->input->post('tgl_pengajuan'),                                      
  'tgl_acc'               => $this->input->post('tgl_acc'),
  'tgl_pinjaman'          => $this->input->post('tgl_pinjaman'),
  'tgl_pelunasan'          => $this->input->post('tgl_pelunasan'),
  
  );


   $hasil=$this->m_transaksi->simpan_data_transaksi($data);
   if ($hasil){
    echo "<script> alert('data berhasil Disimpan');location='".base_url()."transaksi/tambah_transaksi'</script>";
   }else{
    echo  "<script> alert('data gagal Disimpan');location='".base_url()."transaksi/tambah_transaksi'</script>";
   }
   echo "<br/>";
   echo anchor('transaksi/index', 'Kembali');
  }
  else{
    $this->load->view('tambahtransaksi');
  }
  
 }



 function edit_transaksi()
 {
    if (isset($_POST['myedit']))
    {
  $data = array(
  'id_transaksi'          => $this->input->post('id_transaksi'),
  'nama_pinjaman'         => $this->input->post('nama_pinjaman'),    
  'id_anggota'            => $this->input->post('id_anggota'),                                       
  'besar_pinjaman'        => $this->input->post('besar_pinjaman'),                                                                            
  'tgl_pengajuan'         => $this->input->post('tgl_pengajuan'),                                      
  'tgl_acc'               => $this->input->post('tgl_acc'),
  'tgl_pinjaman'          => $this->input->post('tgl_pinjaman'),
  'tgl_pelunasan'          => $this->input->post('tgl_pelunasan'),
  
  );


   $hasil=$this->m_transaksi->edit_data_transaksi($data);
   if ($hasil){
    echo "<script> alert('data berhasil Disimpan');location='".base_url()."transaksi/tambah_transaksi'</script>";
   }else{
    echo  "<script> alert('data gagal Disimpan');location='".base_url()."transaksi/tambah_transaksi'</script>";
   }
   echo "<br/>";
   echo anchor('transaksi/index', 'Kembali');
  }
  else{
    $this->load->view('tambahtransaksi');
  }
  
 }

  function konfirm_hapus_transaksi($id_transaksi)
  {
    $data_transaksi['datatransaksi']=$this->m_transaksi->konfirm_hapus($id_transaksi);
    $this->load->view('konfirmhapustransaksi',$data_transaksi);
  }
  function hapus_transaksi($id_transaksi)
  {
    $hasil=$this->m_transaksi->hapus_data_transaksi($id_transaksi);
    if ($hasil){
      echo "hapus data berhasil";
    }else{
      echo "hapus data gagal";
    }
    echo "<br />";
    echo anchor('transaksi/index','kembali');
  }

function dynamic_combobox(){
     // retrieve the album and add to the data array
        $this->load->model('m_transaksi');
        $data['tabelanggota'] = $this->m_transaksi->getanggota();
        $this->load->view('coba', $data);
   }




}
