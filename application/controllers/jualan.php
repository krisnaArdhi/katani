<?php
class Jualan extends CI_Controller {
	 function __construct(){
  parent::__construct();

  $this->load->model('M_jual');

  $this->load->helper('html','form_helper');
  $this->load->library('table','pagination');
 // $this->auth->restrict();


 }
 function index()
 {
	 $data['toko'] = $this->M_jual->jual();
	 $this->load->view('jual/home',$data);
 }
public function detail($id_jual){
      $this->load->model('M_jual');
      $data['toko'] = $this->M_jual->show_detail($id_jual);
      $this->load->view('jual/detail_jual', $data);
    }

}
