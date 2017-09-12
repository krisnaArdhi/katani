<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_angsuran extends CI_Model
{
     
   
 public function __construct()
 {
  parent::__construct();
 }


 public function tampil_pg($id_angsuran,$offset)
 {
 	//anggota
 	 $this->db->join('transaksi','angsuran.id_transaksi=transaksi.id_transaksi');
 	 $id_session=$this->session->userdata('id_anggota');
 	$this->db->where('id_anggota',$id_session);
 	$this->db->where_in('keterangan_angsur',array('keterangan_angsur'=>'terima')); 
	
	$this->db->order_by('id_angsuran','ASC');	 
	$query = $this->db->get('angsuran',$id_angsuran,$offset);
		return $query->result(); 
 }

 public function tampil_pg2($id_angsuran,$offset)
 {
//admin belum approve 	
 	 $this->db->join('transaksi','angsuran.id_transaksi=transaksi.id_transaksi');
	$this->db->order_by('id_angsuran','ASC');	 
	$query = $this->db->get('angsuran',$id_angsuran,$offset);
		return $query->result(); 
 }

  public function tampil_pg3($id_angsuran,$offset)
 {
//admin semua 	
 	 $this->db->join('transaksi','angsuran.id_transaksi=transaksi.id_transaksi');
 	 $id_session=$this->session->userdata('id_anggota');
 	$this->db->where('id_anggota',$id_session); 
	
	$this->db->order_by('id_angsuran','ASC');	 
	$query = $this->db->get('angsuran',$id_angsuran,$offset);
		return $query->result(); 
 }

 function caridata()
 {
 		
		$c = $this->input->POST ('cari');
		$this->db->like('nama', $c);
		$query = $this->db->get ('angsuran');
		return $query->result(); 
 } 


	public function simpan_data_angsuran($data)
	{
   		$hasil=$this->db->insert('angsuran', $data); 
		
		return $hasil;
	}
	
public function terima($id_angsuran)
	{
		$this->db->where('id_angsuran',$id_angsuran);
   		$hasil=$this->db->update('angsuran',array('keterangan_angsur'=>'terima') ); 
		
	}
	public function edit_data_angsuran($data)
	{
			$this->db->where('id_angsuran',$data['id_angsuran']);
			$hasil=$this->db->update('angsuran',$data);
	
		return $hasil;
	}

	public function hapus_data_angsuran($id_angsuran)
	{
  $this->db->where('id_angsuran', $id_angsuran);
  $hasil=$this->db->delete('angsuran');
  return $hasil;

	}

	public function konfirm_hapus($id_angsuran)
	{
		$this->db->where('id_angsuran',$id_angsuran);
		$data = $this->db->get('angsuran');
		return $data->result();
	}
	
	}

?>