<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_petani extends CI_Model
{
     
   
 public function __construct()
 {
  parent::__construct();
 }
 function tampil_barang()
 {
 	$this->db->join('t_distributor','t_stok_distributor.id_distributor=t_distributor.id_distributor');
 	$this->db->join('t_jenis_barang','t_stok_distributor.id_jenis_barang=t_jenis_barang.id_jenis_barang');
 	//$this->db->join('t_pengepul','t_wtb_pengepul_var.id_jenis_barang=t_jenis_barang.id_jenis_barang');
 	
	$query = $this->db->get('t_stok_distributor');
		return $query->result(); 
}
 function tampil_pengepul_non_desa()
 {
 	
 	$this->db->join('t_pengepul','t_wtb_pengepul_var.id_pengepul=t_pengepul.id_pengepul');
 	$this->db->join('t_jenis_pertanian','t_wtb_pengepul_var.id_jenis_pertanian=t_jenis_pertanian.id_jenis_pertanian');

 	
	$query = $this->db->get('t_wtb_pengepul_var');
		return $query->result(); 
}
 function tampil_pengepul_desa()
 {
 	$this->db->join('t_pengepul','t_kepulan.id_pengepul=t_pengepul.id_pengepul');
 	$this->db->join('t_jenis_pertanian','t_kepulan.id_jenis_pertanian=t_jenis_pertanian.id_jenis_pertanian');

 	
	$query = $this->db->get('t_kepulan');
		return $query->result(); 
}
function daftar($data1)
    {
        $hasil=$this->db->insert('t_petani', $data1);     
        return $hasil;
    }

}
?>