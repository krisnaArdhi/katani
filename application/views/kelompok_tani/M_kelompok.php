<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_kelompok extends CI_Model
{


 public function __construct()
 {
  parent::__construct();
 }




  public function tampil_panen()
 {
 	$this->db->join('kelompok_tani','anggaran_tani.id_regis_tani=kelompok_tani.id_regis_tani');

 	$query = $this->db->get('anggaran_tani');
	return $query->result();
 }



?>
