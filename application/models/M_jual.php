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

	 public function show_detail($id_jual){
		 $this->db->join('anggota','jual.nik=anggota.nik');
		 
		 $this->db->join('kelompok_tani','anggota.id_regis_tani=kelompok_tani.id_regis_tani');
		 $this->db->join('wilayah','kelompok_tani.id_wilayah=wilayah.id_wilayah');
		$this->db->where('id_jual', $id_jual);
		//

		$query = $this->db->get('jual');
		return $query->result();
 	}

 	public function simpan_data_jual($data){

   		$hasil=$this->db->insert('jual', $data);
		return $hasil;
	}
}

?>
