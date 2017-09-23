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

  	function ceka($data){

        // $data[2] = md5($data[2]);
        $datas = $this->db->query("SELECT * FROM login WHERE username='$data[1]' and password= '$data[2]' and `akses` = 'admin'");
 
         
        if ($datas->num_rows() > 0)
        {
            $user = $datas->row();

            $session = array(
                'logged_in' => 1,
                // 'id_anggota' => $user->id_anggota,
                // 'nama_lengkap' => $user->nama_lengkap,
                'username' => $user->username,
                'password'=>$user->password,
                // 'alamat' => $user->alamat,
                // 'tgl_lhr' => $user->tgl_lhr,
                // 'foto' => $user->foto,
                // 'ktp' => $user->ktp,
                'akses' => $user->akses                
                
            );
            $this->session->set_userdata($session);

            return true;
        }
        else
        {
            $this->session->set_flashdata('notification', 'Username dan Password tidak cocok');
            return false;
        }
        // $data[2] = md5($data[2]);

        // return $this->db->query("SELECT * FROM anggota WHERE username='$data[1]' and password= '$data[2]' and `group` = 'admin'")->num_rows();
    }
 


    function logout()
    {
        $this->session->sess_destroy();
    }
}
