<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_staff extends CI_Model
{

 public function __construct()
 {
  parent::__construct();
 }

 public function tampil($id_user)
 {
 		$this->db->order_by('id_user','ASC');	 
	$data = $this->db->get('staff');
return $data->result(); 
 }

 public function tampil_pg($id_user,$offset)
 {
 	
	$this->db->order_by('id_user','ASC');	 
	$query = $this->db->get('staff',$id_user,$offset);
return $query->result(); 
 }





 function caridata()
 {
 		
		$c = $this->input->POST ('cari');
		$this->db->like('username', $c);
		$query = $this->db->get ('staff');
		return $query->result(); 
 } 

	public function simpan_data_staff($data)
	{
		 if ($data['mode']=='baru'){
   		unset($data['mode']);
   		$hasil=$this->db->insert('staff', $data); 
		}else{
			unset($data['mode']);
			$this->db->where('id_user',$data['id_user']);
			$hasil=$this->db->update('staff',$data);
		}
		return $hasil;
	}
	
	public function edit_data_staff($data)
	{
		 if ($data['mode']=='baru'){
   		unset($data['mode']);
   		$hasil=$this->db->insert('staff', $data); 
		}else{
			unset($data['mode']);
			$this->db->where('id_user',$data['id_user']);
			$hasil=$this->db->update('staff',$data);
		}
		return $hasil;
	}

	public function hapus_data_staff($id_user)
	{
  $this->db->where('id_user', $id_user);
  $hasil=$this->db->delete('staff');
  return $hasil;

	}

	public function konfirm_hapus($id_user)
	{
		$this->db->where('id_user',$id_user);
		$data = $this->db->get('staff');
		return $data->result();
	}
	
	}

?>