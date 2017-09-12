<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_distributor extends CI_Model
{
     
   
 public function __construct()
 {
  parent::__construct();
 }
public function tampil_barang()
 {
	$query = $this->db->get('t_stok_distributor');
return $query->result(); 
}
function daftar($data1)
    {
        $hasil=$this->db->insert('t_distributor', $data1);     
        return $hasil;
    }




  public function tampil_pg2($id_anggota,$offset)
 {
 	$this->db->where_in('group',array('group'=>'anggota')); 	 
	$this->db->order_by('id_anggota','ASC');
	$query = $this->db->get('anggota',$id_anggota,$offset);
return $query->result(); 
 }

 public function tampil_pg($id_anggota,$offset)
 {
 	//admin belum approve
 	$this->db->where_in('group',array('group'=>'0')); 	 
	$this->db->order_by('id_anggota','ASC');
	$query = $this->db->get('anggota',$id_anggota,$offset);
return $query->result(); 
 }



 function caridata()
 {
 		
		$c = $this->input->POST ('cari');
		$this->db->like('username', $c);
		$query = $this->db->get ('anggota');
		return $query->result(); 
 } 


public function terima($id_anggota)
	{
		$this->db->where('id_anggota',$id_anggota);
   		$hasil=$this->db->update('anggota',array('group'=>'anggota') ); 
		
	}



	public function simpan_data_anggota($data)
	{
		 
   		$hasil=$this->db->insert('anggota', $data); 
		
		return $hasil;
	}
	
	public function edit_data_anggota($data)
	{
		$hasil=$this->db->update('anggota', $data); 
		
		return $hasil;
	}

	public function hapus_data_anggota($id_anggota)
	{
  $this->db->where('id_anggota', $id_anggota);
  $hasil=$this->db->delete('anggota');
  return $hasil;

	}

	public function konfirm_hapus($id_anggota)
	{
		$this->db->where('id_anggota',$id_anggota);
		$data = $this->db->get('anggota');
		return $data->result();
	}
	
	}

?>