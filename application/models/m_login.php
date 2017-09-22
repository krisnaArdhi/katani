<?php
class M_login extends CI_Model
{
    private $table = 'login';

    function __construct()
    {
        parent::__construct();
    }
    function daftar($data)
    {
        $hasil=$this->db->insert('login', $data);
        return $hasil;
    }
    function register($data)
    {
        $this->db->insert($this->table, $data);
    }

  	function cek_login($table,$where)
    {
  		return $this->db->get_where($table,$where);
  	}


    function logout()
    {
        $this->session->sess_destroy();
    }
}
