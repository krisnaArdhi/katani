<?php if(!defined('BASEPATH')) exit('Keluar dari sistem');
class M_transaksi extends CI_Model
{
     
   
 public function __construct()
 {
  parent::__construct();
 }

 public function tampil($id_transaksi)
 {
 		$this->db->order_by('id_transaksi','ASC');	 
		$data = $this->db->get('transaksi');
		return $data->result(); 
 }

public function get($id_transaksi)
{

		
	$id_session=$this->session->userdata('id_anggota');
 		$this->db->where_in('id_anggota',$id_session); 	
		 return $this->db->get('transaksi',$id_transaksi)->result();
}
 public function tampil_pg($id_transaksi,$offset)
 {
 	//anggota
	$id_session=$this->session->userdata('id_anggota');
 	$this->db->where_in('id_anggota',$id_session); 	 
	$this->db->where_in('keterangan',array('keterangan'=>'terima')); 
	$this->db->order_by('id_transaksi','ASC');	 
	$query = $this->db->get('transaksi',$id_transaksi,$offset);
	return $query->result(); 
 }

 public function tampil_pg2($id_transaksi,$offset)
 {
 	//admin sudah approve	 
	$this->db->where_in('keterangan',array('keterangan'=>'terima')); 
	$this->db->order_by('id_transaksi','ASC');	 
	$query = $this->db->get('transaksi',$id_transaksi,$offset);
return $query->result(); 
 }

  public function tampil_pg3($id_transaksi,$offset)
 {
 	//admin belum approve
	$this->db->where_in('keterangan',array('keterangan'=>'')); 
	$this->db->order_by('id_transaksi','ASC');	 
	$query = $this->db->get('transaksi',$id_transaksi,$offset);
return $query->result(); 
 }

 function caridata()
 {
 		
		$c = $this->input->POST ('cari');
		$this->db->like('nama', $c);
		$query = $this->db->get ('transaksi');
		return $query->result(); 
 } 


public function terima($id_transaksi)
	{
		$this->db->where('id_transaksi',$id_transaksi);
   		$hasil=$this->db->update('transaksi',array('keterangan'=>'terima') ); 
		
	}

	public function simpan_data_transaksi($data)
	{
   		$hasil=$this->db->insert('transaksi', $data); 
		
		return $hasil;
	}
	
	public function edit_data_transaksi($data)
	{
		 
			$this->db->where('id_transaksi',$data['id_transaksi']);
			$hasil=$this->db->update('transaksi',$data);
		
		return $hasil;
	}

	public function hapus_data_transaksi($id_transaksi)
	{
  $this->db->where('id_transaksi', $id_transaksi);
  $hasil=$this->db->delete('transaksi');
  return $hasil;

	}

	public function konfirm_hapus($id_transaksi)
	{
		$this->db->where('id_transaksi',$id_transaksi);
		$data = $this->db->get('transaksi');
		return $data->result();
	}

	function getanggota() {
        $data = array();
        $query = $this->db->get('anggota');
        if ($query->num_rows() > 0) {
            foreach ($query->result_array() as $row){
                    $data[] = $row;
                }
        }
        $query->free_result();
        return $data;
    }
}


	
?>