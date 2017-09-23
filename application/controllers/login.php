<?php

class Login extends CI_Controller{

	function __construct()
  {
		parent::__construct();
		$this->load->model('m_login');

	}

	function index(){
		if ($this->session->userdata('akses') == 'admin') {
                    redirect('login/admin');
                }
                else{
                    redirect('login/login');
                }
	}



  	public function cek_logina()
    {

        $data = array(
        "admin",
        $this->input->post('username'),
        $this->input->post('password'));
        $this->load->model('m_login');
        $record = $this->m_login->ceka($data);
        
        if($record==0){
            $this->login();
        }else{
            $this->session->set_userdata(array('username'=>$data[1]));
            $this->session->set_userdata(array('group'=>$data[0]));
            redirect('admin');
        }
    }

public function login(){
        
        $this->load->view('login');
    }
    function admin()
    {
        if ($this->session->userdata('logged_in')) 
        {
            if ($this->session->userdata('akses') == 'admin')
            {
                
                $this->load->view('upt/daftar_mantri_tani');
            }
            else
            {
                redirect('login/login');
            }
            
        }
      }

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
