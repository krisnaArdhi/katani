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
          
        $form_data = $this->input->post('data');
        if (!empty($form_data))
        {
            if ($this->m_login->login($form_data['username'], $form_data['password']))
            {
                if ($this->session->userdata('jenis') == 'distributor') {
                    redirect('distributor');
                }
                elseif($this->session->userdata('jenis') == 'petani') {
                    redirect('petani');
                }
                elseif($this->session->userdata('jenis') == 'desa') {
                    redirect('desa');
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
        $this->load->view('login');
    
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