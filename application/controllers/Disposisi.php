<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Disposisi extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') !="admin" ) {
			redirect('login','refresh');
		}
		$this->load->model('Model_klasifikasi', '_db');
	}

	public function index()
	{
		$data['title'] = ' | Data Klasifikasi';
		$data_surat_masuk = $this->db->select('tb_suratmasuk.*, tb_klasifikasi.nama as nama_klasifikasi, tb_index.nama_index ');
		$this->db->join('tb_klasifikasi', 'tb_klasifikasi.kode = tb_suratmasuk.kode_klasifikasi', 'left');
		$this->db->join('tb_index', 'tb_index.id_index = tb_suratmasuk.id_indeks', 'left');

		$this->db->from('tb_suratmasuk');
		$datas = $this->db->get()->result();

		$data['datas'] = $datas;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/disposisi/data',$data);
		$this->load->view('templates/footer');
	}

	public function set($id)
	{
		$data['title'] = ' | Disposisi Surat';

		$data_surat_masuk = $this->db->select('tb_suratmasuk.*, tb_klasifikasi.nama as nama_klasifikasi, tb_index.nama_index ');
		$this->db->join('tb_klasifikasi', 'tb_klasifikasi.kode = tb_suratmasuk.kode_klasifikasi', 'left');
		$this->db->join('tb_index', 'tb_index.id_index = tb_suratmasuk.id_indeks', 'left');
		$this->db->where('tb_suratmasuk.id_suratmasuk', $id);
		$this->db->from('tb_suratmasuk');
		$datas = $this->db->get()->result();

		$data['datas'] = $datas;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/disposisi/form',$data);
		$this->load->view('templates/footer');
	}

}

/* End of file Disposisi.php */
/* Location: ./application/controllers/Disposisi.php */