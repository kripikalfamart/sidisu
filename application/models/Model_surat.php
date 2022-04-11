<?php 


/**
 * 
 */
class Model_surat extends CI_Model
{
	


// surat masuk
	public function tsuratmasuk()
	{
		return  $this->db->get('tb_suratmasuk')->result();
	}

	
	public function edsuratmasuk($where)
	{
		$this->db->where($where);
		return $this->db->get('tb_suratmasuk', $where)->result();
	}
	public function updatesuratmasuk($where)
	{
		$data = array(
						'no_agenda' => $no_agenda,
						'no_surat' => $no_surat,
						'tujuan' => $tujuan,
						// 'modified_by' => $ses,
						'file' => $foto
					);
		$this->db->where($where);
		$this->db->update('tb_suratmasuk', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Perbarui Data.!</div>');
			redirect('surat/masuk','refresh');
	}
	public function hapussuratmasuk($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_suratmasuk');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menghapus Data.!</div>');
			redirect('surat/masuk','refresh');
	}

// akhir surat masuk



// surat keluar
	public function tsuratkeluar()
	{
		return  $this->db->get('tb_suratkeluar')->result();
	}

	
	public function edsuratkeluar($where)
	{
		$this->db->where($where);
		return $this->db->get('tb_suratkeluar', $where)->result();
	}
	public function updatesuratkeluar($where)
	{
		$data = array(
						'no_agenda' => $no_agenda,
						'no_surat' => $no_surat,
						'tujuan' => $tujuan,
						// 'modified_by' => $ses,
						'file' => $foto
					);
		$this->db->where($where);
		$this->db->update('tb_suratkeluar', $data);
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Perbarui Data.!</div>');
			redirect('surat/keluar','refresh');
	}
	public function hapussuratkeluar($where)
	{
		$this->db->where($where);
		$this->db->delete('tb_suratkeluar');
		$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menghapus Data.!</div>');
			redirect('surat/keluar','refresh');
	}
// akhir surat keluar

}