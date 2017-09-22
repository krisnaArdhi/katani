<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_upt extends CI_Model
{


 public function __construct()
 {
  parent::__construct();
 }


 public function tampil_wilayah()
 {

	$query = $this->db->get('wilayah');
	return $query->result();
 }

 function wil_drop()
    {
        // ambil data dari db
        $this->db->order_by('nama_wilayah', 'asc');
        $result = $this->db->get('wilayah');

        // bikin array
        // please select berikut ini merupakan tambahan saja agar saat pertama
        // diload akan ditampilkan text please select.
        $dd[''] = 'Please Select';
        if ($result->num_rows() > 0) {
            foreach ($result->result() as $row) {
            // tentukan value (sebelah kiri) dan labelnya (sebelah kanan)
                $dd[$row->id_wilayah] = $row->nama_wilayah;
            }
        }
        return $dd;
    }

 public function tampil_mantri()
 {
 	$this->db->join('wilayah','mantri.id_wilayah=wilayah.id_wilayah');
 	$query = $this->db->get('mantri');
	return $query->result();
 }

public function tampil_kelompok()
 {
 	$this->db->join('wilayah','kelompok_tani.id_wilayah=wilayah.id_wilayah');
 	$query = $this->db->get('kelompok_tani');
	return $query->result();
 }

  public function tampil_anggaran()
 {
 	$this->db->join('kelompok_tani','anggaran_tani.id_regis_tani=kelompok_tani.id_regis_tani');

 	$query = $this->db->get('anggaran_tani');
	return $query->result();
 }

  public function tampil_ppl()
 {
 	$this->db->join('wilayah','ppl.id_wilayah=wilayah.id_wilayah');
 	$query = $this->db->get('ppl');
	return $query->result();
 }


	public function simpan_data_mantri($data)
	{
   		$hasil=$this->db->insert('mantri', $data);

		return $hasil;
	}

  public function simpan_data_ppl($data)
	{
   		$hasil=$this->db->insert('ppl', $data);

		return $hasil;
	}

	}

?>
