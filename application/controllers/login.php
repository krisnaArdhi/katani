<?php

class Login extends CI_Controller{

	function __construct()
  {
		parent::__construct();
		$this->load->model('m_login');

	}

	function index(){
		$this->load->view('login');
	}



  	public function cek_login() {
  		$data = array('username' => $this->input->post('username', TRUE),
  						'password' => md5($this->input->post('password', TRUE))
  			);
  		$this->load->model('model_user'); // load model_user
  		$hasil = $this->model_user->cek_user($data);
  		if ($hasil->num_rows() == 1) {
  			foreach ($hasil->result() as $sess) {
  				$sess_data['logged_in'] = 'Sudah Loggin';
  				$sess_data['uid'] = $sess->uid;
  				$sess_data['username'] = $sess->username;
  				$sess_data['level'] = $sess->level;
  				$this->session->set_userdata($sess_data);
  			}
  			if ($this->session->userdata('level')=='admin') {
  				redirect('admin/c_admin');
  			}
  			elseif ($this->session->userdata('level')=='member') {
  				redirect('member/c_member');
  			}
  		}
  		else {
  			echo "<script>alert('Gagal login: Cek username, password!');history.go(-1);</script>";
  		}
  	}

	function logout(){
		$this->session->sess_destroy();
		redirect(base_url('login'));
	}
}
