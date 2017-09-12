<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class staff extends CI_Controller{
 function __construct(){
  parent::__construct();

  $this->load->model('m_staff');
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
                 $config['base_url'] = site_url ('staff/index');
                  $config['total_rows'] = $this->db->get('staff')->num_rows();
                 $config['per_page'] = "5";
                   $config['num_links'] = "2";
                  $config['uri_segment'] = 3; //3 merupakan posisi pagination dalam url
                  $config['full_tag_open'] = '<div id="pagination">';
                  $config['full_tag_close'] = '</div>';
                  //inisialisasi config
                  $this->pagination->initialize($config);
                  //tampilkan data
                  $data['query'] = $this->m_staff->tampil_pg($config['per_page'],$this->uri->segment(3));
                  $this->load->view('tampilstaff',$data);
            }
            
  
    }
    function cari() 
    {
       $data['tampil_pg']=$this->m_staff->caridata();
       //jika data yang dicari tidak ada maka akan keluar informasi 
       //bahwa data yang dicari tidak ada
       if($data['tampil_pg']==null) 
          {
          print 'maaf data yang anda cari tidak ada atau keywordnya salah';
          print br(2);
          print anchor('staff','kembali');
          }
          else 
          {
             $this->load->view('tampilstaff',$data); 
          }
    }

     

    function tambah_staff()
  {
    if ($this->session->userdata('group') == 'member') 
    {
    $this->load->view('akses_gagal');
    }else
    {
          $this->load->view('tambahstaff');
    }
  }


function simpan_staff()
 {
  if (isset($_POST['mysubmit'])){
    $this->load->model('m_staff');
    $this->load->library('form_validation');
    $this->form_validation->set_message('required','%s harus diisi.');
    $this->form_validation->set_message('min_length','%s minimal %s karakter.');
    $this->form_validation->set_message('max_length','%s maximal %s karakter.');
    $this->form_validation->set_message('is_unique','%s telah terdaftar.');
    $this->form_validation->set_message('matches','%s tidak cocok dengan %s.');
    $this->form_validation->set_message('numeric','%s harus di isi angka.');

    $this->form_validation->set_rules('id_user', 'Id pegawai','trim|required|numeric|is_unique[staff.id_user]');
    $this->form_validation->set_rules('username', 'username','trim|required');
    $this->form_validation->set_rules('email', 'email','trim|required');
    $this->form_validation->set_rules('password', 'password','trim|required');
  
    if ($this->form_validation->run() === TRUE)
    {
  $data = array(
  'id_user'     => $this->input->post('id_user'),
  'username'    => $this->input->post('username'),                                       
  'password'      => $this->input->post('password'),
  'email'          => $this->input->post('email'),   
  'mode'          => $this->input->post('mode')

  );

   $hasil=$this->m_staff->simpan_data_staff($data);
   if ($hasil){
    echo "Simpan data berhasil";
   }else{
    echo "Simpan data gagal";
   }
   echo "<br/>";
   echo anchor('staff/index', 'Kembali');
  }
  else{
    $this->load->view('tambahstaff');
  }
  }
 }

  function koreksi_staff($id_user){
  $data_staff['datastaff']=$this->m_staff->tampil($id_user); 
  $this->load->view('koreksistaff',$data_staff);
  } 

 function edit_staff()
 {
    if (isset($_POST['myedit']))
    {
  $data = array(
  'id_user'     => $this->input->post('id_user'),
  'username'    => $this->input->post('username'),                                       
  'password'      => $this->input->post('password'),
  'email'          => $this->input->post('email'),   
  'mode'          => $this->input->post('mode')
  );

   $hasil=$this->m_staff->simpan_data_staff($data);
   if ($hasil){
    echo "Simpan data berhasil";
   }else{
    echo "Simpan data gagal";
   }
   echo "<br/>";
   echo anchor('staff/index', 'Kembali');
  }
  else{
    $this->load->view('tambahstaff');
  }
  
 }

  function konfirm_hapus_staff($id_user)
  {
    $data_staff['datastaff']=$this->m_staff->konfirm_hapus($id_user);
    $this->load->view('konfirmhapus',$data_staff);
  }
  function hapus_staff($id_user)
  {
    $hasil=$this->m_staff->hapus_data_staff($id_user);
    if ($hasil){
      echo "hapus data berhasil";
    }else{
      echo "hapus data gagal";
    }
    echo "<br />";
    echo anchor('staff/index','kembali');
  }

}
