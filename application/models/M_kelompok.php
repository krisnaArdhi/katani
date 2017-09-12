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


}
?>
