<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_jual extends CI_Model
{


 public function __construct()
 {
  parent::__construct();
 }


 function jual()
 {
  $this->db->join('anggota','jual.nik=anggota.nik');

 $query = $this->db->get('jual');
   return $query->result();
 }


	}

?>
