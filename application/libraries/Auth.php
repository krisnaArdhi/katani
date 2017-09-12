<?php if(!defined('BASEPATH')) exit('No direct access script allowed');

class Auth
{
	var $CI = NULL;
	function __construct()
	{
		$this->CI = &get_instance();
	}
	
	// cek apakah user login apa belum
	function is_logged_in()
	{
		if($this->CI->session->userdata('logged_in') == '1')
		{
			return TRUE;
		}
		return FALSE;
	}
	
	// validasi di setiap halaman yang mengharuskan autentikasi
	function restrict()
	{	
		if($this->is_logged_in() === FALSE)
		{
			redirect(base_url().'login/login');
		}
	}
}
