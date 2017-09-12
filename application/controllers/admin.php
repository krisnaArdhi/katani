<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class admin extends CI_Controller {
function __construct(){
  parent::__construct();

  $this->load->model('m_login');
  $this->load->helper('html');
  $this->load->library('table','pagination'); 
  $this->auth->restrict();
     

 }
	public function index()
	{
		$this->load->view('admin');
	}
}
