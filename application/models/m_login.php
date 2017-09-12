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

    function login($username, $password)
    {
        $data = $this->db
                ->where(array('username' => $username, 'password' => $password))
                ->get($this->table);


        if ($data->num_rows() > 0)
        {
            $user = $data->row();

            $session = array(
                'logged_in' => 1,
                'password'=>$user->password,
                'akses' => $user->jenis,
                'username' => $user->username
            );
            $this->session->set_userdata($session);
            return true;
        }
        else
        {
            $this->session->set_flashdata('notification', 'Username dan Password tidak cocok');
            return false;
        }
    }

    function logout()
    {
        $this->session->sess_destroy();
    }
}
