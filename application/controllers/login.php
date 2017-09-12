<?php

class login extends CI_Controller
{

    function __construct()
    {
        parent::__construct();
        $this->load->helper(array('form', 'url'));
        $this->load->model('m_login');
    }
    function index()
    {
          $this->load->view('login');
    }

    function coba()
    {


        if (!empty($_POST))
        {
          $username = $_POST['username'];
          $password = $_POST['password'];
            if ($this->m_login->login($username, $Password))
            {
                if ($this->session->userdata('akses') == 'distributor') {
                    redirect('distributor');
                }
                elseif($this->session->userdata('akses') == 'admin') {
                    redirect('admin');
                }
                elseif($this->session->userdata('akses') == 'ketua') {
                    redirect('ketua');
                }
                else{
                    redirect('login/login');
                }

            }
            else
            {
                redirect('login/login');
            }
        }


    }





    function logout()
    {
        $this->m_login->logout();
        redirect('login/login');
    }
  //pembagian
    function admin()
    {
        if ($this->session->userdata('logged_in'))
        {
            if ($this->session->userdata('group') == 'admin')
            {

                $this->load->view('homepetugas');
            }
            else
            {
                redirect('login/login');
            }

        }

        else
        {
            redirect('login/login');
        }
    }

    function anggota()
    {
        if ($this->session->userdata('logged_in'))
        {
            if ($this->session->userdata('group') == 'anggota')
            {
                $this->load->view('homeanggota');
            }
            else
            {
                redirect('login/login');
            }

        }

        else
        {
            redirect('login/login');
        }
    }


}
