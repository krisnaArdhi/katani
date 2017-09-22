<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_kelompok extends CI_Model
{


 public function __construct()
 {
  parent::__construct();
 }




  public function tampil_panen()
 {
 	$this->db->join('anggota','panen.nik=anggota.nik');

 	$query = $this->db->get('panen');
	return $query->result();
 }

 public function tampil_anggota()
{


  $query = $this->db->get('anggota');
return $query->result();
}

 function caridata()
 {

		$c = $this->input->POST ('cari');
		$this->db->like('nama', $c);
		$query = $this->db->get ('simpanan');
		return $query->result();
 }
 public function detailanggota($id)
 {
   	$this->db->where('nik',$id);
  	$query = $this->db->get('anggota');
    return $query->result();
 }
}
?>
