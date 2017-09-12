<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_simpanan extends CI_Model
{
     
   
 public function __construct()
 {
  parent::__construct();
 }


 public function tampil_pg3($id_simpanan,$offset)
 { 	
 //admin sudah di approve
 	$this->db->where_in('ket',array('ket'=>'terima'));
	$this->db->order_by('id_simpanan','ASC');
	$query = $this->db->get('simpanan',$id_simpanan,$offset);
return $query->result(); 
 }



 public function tampil_pg2($id_simpanan,$offset)
 { 	
 	//admin belum approve
 	$this->db->where_in('ket',array('ket'=>'0')); 	
	$this->db->order_by('id_simpanan','ASC');
	$query = $this->db->get('simpanan',$id_simpanan,$offset);
return $query->result(); 
 }

 public function tampil_pg($id_simpanan,$offset)
 {
 	//menampilkan berdasar id session(untuk anggota)
	$id_session=$this->session->userdata('id_anggota');
 	$this->db->where_in('id_anggota',$id_session);
 	$this->db->where_in('ket',array('ket'=>'terima'));   	
	$this->db->order_by('id_simpanan','ASC');	 
	$query = $this->db->get('simpanan',$id_simpanan,$offset);
return $query->result(); 
 }


 function caridata()
 {
 		
		$c = $this->input->POST ('cari');
		$this->db->like('nama', $c);
		$query = $this->db->get ('simpanan');
		return $query->result(); 
 } 


public function terima($id_simpanan)
	{
		$this->db->where('id_simpanan',$id_simpanan);
   		$hasil=$this->db->update('simpanan',array('ket'=>'terima') ); 
		
	}

	public function simpan_data_simpanan($data)
	{
   		$hasil=$this->db->insert('simpanan', $data); 
		
		return $hasil;
	}
	
	public function edit_data_simpanan($data)
	{
		 
			$this->db->where('id_simpanan',$data['id_simpanan']);
			$hasil=$this->db->update('simpanan',$data);
		
		return $hasil;
	}

	public function hapus_data_simpanan($id_simpanan)
	{
  $this->db->where('id_simpanan', $id_simpanan);
  $hasil=$this->db->delete('simpanan');
  return $hasil;

	}

	public function konfirm_hapus($id_simpanan)
	{
		$this->db->where('id_simpanan',$id_simpanan);
		$data = $this->db->get('simpanan');
		return $data->result();
	}
	
	}

?>