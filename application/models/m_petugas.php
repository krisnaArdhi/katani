<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_petugas extends CI_Model
{

 public function __construct()
 {
  parent::__construct();
 }

 public function tampil($id_petugas)
 {
 		$this->db->order_by('id_petugas','ASC');	 
	$data = $this->db->get('petugas');
return $data->result(); 
 }

 public function tampil_pg($id_petugas,$offset)
 {
 	
	$this->db->order_by('id_petugas','ASC');	 
	$query = $this->db->get('petugas',$id_petugas,$offset);
return $query->result(); 
 }

 function caridata()
 {
 		
		$c = $this->input->POST ('cari');
		$this->db->like('nama', $c);
		$query = $this->db->get ('petugas');
		return $query->result(); 
 } 

	public function simpan_data_petugas($data)
	{
		 if ($data['mode']=='baru'){
   		unset($data['mode']);
   		$hasil=$this->db->insert('petugas', $data); 
		}else{
			unset($data['mode']);
			$this->db->where('id_petugas',$data['id_petugas']);
			$hasil=$this->db->update('petugas',$data);
		}
		return $hasil;
	}
	
	public function edit_data_petugas($data)
	{
		 if ($data['mode']=='baru'){
   		unset($data['mode']);
   		$hasil=$this->db->insert('petugas', $data); 
		}else{
			unset($data['mode']);
			$this->db->where('id_petugas',$data['id_petugas']);
			$hasil=$this->db->update('petugas',$data);
		}
		return $hasil;
	}

	public function hapus_data_petugas($id_petugas)
	{
  $this->db->where('id_petugas', $id_petugas);
  $hasil=$this->db->delete('petugas');
  return $hasil;

	}

	public function konfirm_hapus($id_petugas)
	{
		$this->db->where('id_petugas',$id_petugas);
		$data = $this->db->get('petugas');
		return $data->result();
	}
	
	}

?>