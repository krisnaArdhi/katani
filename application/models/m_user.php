<?php
class M_user extends CI_Model
{
    private $table = 'user'; 
 
    function __construct()
    {
        parent::__construct();
    }
 
 public function tampil_user($id_user)
    {
        if ($id_user=='all'){
           $hasil=$this->db->get('user');
            return $hasil->result();
        }else{
            $this->db->where('id_user',$id_user);
            $hasil=$this->db->get('user');
        
        return $hasil->row();
    }
    }

 public function tampil_pg($id_user,$offset)
 {
          
    $this->db->order_by('id_user','ASC');    
    $query = $this->db->get('user',$id_user,$offset);
return $query->result(); 
 }

 function caridata()
 {
        
        $c = $this->input->POST ('cari');
        $this->db->like('username', $c);
        $query = $this->db->get ('user');
        return $query->result(); 
 } 

 
    public function simpan_data_user($data)
    {
        $hasil=$this->db->insert('user', $data); 
        
        return $hasil;
    }
    
    public function edit_data_user($data)
    {
       
            $this->db->where('id_user',$data['id_user']);
            $hasil=$this->db->update('user',$data);
        return $hasil;
    }

    public function hapus_data_user($id_user)
    {
  $this->db->where('id_user', $id_user);
  $hasil=$this->db->delete('user');
  return $hasil;

    }

    public function konfirm_hapus($id_user)
    {
        $this->db->where('id_user',$id_user);
        $data = $this->db->get('user');
        return $data->result();
    }
    


}