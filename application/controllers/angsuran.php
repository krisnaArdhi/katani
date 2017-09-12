<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class angsuran extends CI_Controller{
 function __construct(){
  parent::__construct();

  $this->load->model('m_angsuran');
  $this->load->helper('html');
  $this->load->library('table','pagination'); 
     
$this->auth->restrict();

 }

 function tampil()
    {
      
//anggota
            {
            //pengaturan pagination
                 $config['base_url'] = site_url ('angsuran/tampil');
                  $config['total_rows'] = $this->db->get('angsuran')->num_rows();
                 $config['per_page'] = "5";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_angsuran->tampil_pg($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampilangsurananggota',$data);
            }
            
  
    }
  

    function index()
    {
      
//admin
       if ($this->session->userdata('group') == 'anggota') 
        {
            echo "anda tidak memiliki hak untuk ini";
              //$this->load->view("akses_gagal");
            }else
            {
            //pengaturan pagination
                 $config['base_url'] = site_url ('angsuran/index');
                  $config['total_rows'] = $this->db->get('angsuran')->num_rows();
                 $config['per_page'] = "5";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_angsuran->tampil_pg2($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampilangsuran',$data);
            }
            
  
    }

     function semua()
    {
      
//admin
       if ($this->session->userdata('group') == 'anggota') 
        {
            echo "anda tidak memiliki hak untuk ini";
              //$this->load->view("akses_gagal");
            }else
            {
            //pengaturan pagination
                 $config['base_url'] = site_url ('angsuran/index');
                  $config['total_rows'] = $this->db->get('angsuran')->num_rows();
                 $config['per_page'] = "5";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_angsuran->tampil_pg($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampilangsuran',$data);
            }
            
  
    }
    function cari() 
    {
       $data['tampil_pg']=$this->m_angsuran->caridata();
       //jika data yang dicari tidak ada maka akan keluar informasi 
       //bahwa data yang dicari tidak ada
       if($data['tampil_pg']==null) 
          {
          print 'maaf data yang anda cari tidak ada atau keywordnya salah';
          print br(2);
          print anchor('angsuran','kembali');
          }
          else 
          {
             $this->load->view('tampilangsuran',$data); 
          }
    }

     

    function tambah_angsuran()
  {
    if ($this->session->userdata('group') == 'member') 
    {
    $this->load->view('akses_gagal');
    }else
    {

    $username = $this->session->userdata('username');
    $group = $this->session->userdata('group');

    if(isset($username) && $group=='anggota'){
      $this->load->model('m_transaksi');
      $data['tabel'] = $this->m_transaksi->get($id_transaksi);
      $this->load->view('tambahangsuran',$data);
    }else{
      redirect('tampil');
    }
    /*$data['tabel']=array();
    $this->load->view('angsuran2',$data);*/

    }
  }



function simpan_angsuran()
 {
    if (isset($_POST['mysubmit']))
    {
   $data = array(
  'id_angsuran'     => $this->input->post('id_angsuran'),
  'tgl_pembayaran'   => $this->input->post('tgl_pembayaran'),                                    
  'id_transaksi'       => $this->input->post('id_transaksi'),                                          
  'angsuran_ke'         => $this->input->post('angsuran_ke'),   
  'besar_angsuran'        => $this->input->post('besar_angsuran'),    
  'keterangan_angsur'        => $this->input->post('keterangan_angsur'),

  );


   $hasil=$this->m_angsuran->simpan_data_angsuran($data);
   if ($hasil){
    echo "<script> alert('data berhasil Disimpan');location='".base_url()."angsuran/tambah_angsuran'</script>";
   }else{
    echo  "<script> alert('data gagal Disimpan');location='".base_url()."anggota/tambah_angsuran'</script>";
   }
   echo "<br/>";
   echo anchor('angsuran', 'Kembali');
   }
  else{
    $this->load->view('tambahangsuran');
  }
  
 }


function terima_angsuran($id_angsuran){
  $this->m_angsuran->terima($id_angsuran); 
  $this->tampil();
  }
 function edit_angsuran()
 {
    if (isset($_POST['myedit']))
    {
      $data = array(
  'id_angsuran'     => $this->input->post('id_angsuran'),
  'jumlah_angsuran'    => $this->input->post('jumlah_angsuran'),

  );

   $hasil=$this->m_angsuran->edit_data_angsuran($data);
   if ($hasil){
    echo "Simpan data berhasil";
   }else{
    echo "Simpan data gagal";
   }
   echo "<br/>";
   echo anchor('angsuran/index', 'Kembali');
  }
  else{
    $this->load->view('tambahangsuran');
  }
  
 }

  function konfirm_hapus_angsuran($id_angsuran)
  {
    $data_angsuran['dataangsuran']=$this->m_angsuran->konfirm_hapus($id_angsuran);
    $this->load->view('konfirmhapus',$data_angsuran);
  }
  function hapus_angsuran($id_angsuran)
  {
    $hasil=$this->m_angsuran->hapus_data_angsuran($id_angsuran);
    if ($hasil){
      echo "hapus data berhasil";
    }else{
      echo "hapus data gagal";
    }
    echo "<br />";
    echo anchor('angsuran/index','kembali');
  }

}
