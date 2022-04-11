<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Klasifikasi extends CI_Controller {

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
		$data['klasifikasi'] = $this->_db->get();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/klasifikasi/data',$data);
		$this->load->view('templates/footer');
	}

	public function deleteData($id)
	{
		$row = $this->_db->where('id_klasifikasi', $id)->find();
		if ($row > 0) {
			$delete = $this->_db->where('id_klasifikasi', $id)->delete();
			if ($delete) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menghapus Data.!</div>');
				redirect('klasifikasi','refresh');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning">Gagal menghapus data.!</div>');
				redirect('klasifikasi','refresh');
			}
			
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data yang di pilih tidak ditemukan</div>');
			redirect('klasifikasi','refresh');
		}

	}

	public function add()
	{
		$data = [
			'id' =>	set_value(''),
			'nama' => set_value(''),
			'kode' => set_value(''),
			'uraian' => set_value(''),
		];
		$data['title'] = ' | Tambah Data Klasifikasi';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/klasifikasi/tambah',$data);
		$this->load->view('templates/footer');
	}

	public function edit($id)
	{
		$row = $this->_db->where('id_klasifikasi', $id)->first();

		
		$data = [
			'id' =>	$row->id_klasifikasi,
			'nama' => $row->nama,
			'kode' => $row->kode,
			'uraian' => $row->uraian,
		];
		$data['title'] = ' | Edit Data Klasifikasi';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/klasifikasi/tambah',$data);
		$this->load->view('templates/footer');
	}

	public function save()
	{
		if ($this->input->post('id') != null) {
			$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
			$this->form_validation->set_rules('nama', 'Nama Klasifikasi', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning">'.validation_errors().'</div>');
				redirect('klasifikasi/edit/'.$this->input->post('id'));
			} else {
				$post =  $this->input->post(null, true);
				$data = [
					'kode' => $post['kode'],
					'nama' => $post['nama'],
					'uraian' => $post['uraian'],
				];
				
				$save = $this->_db->where('id_klasifikasi', $this->input->post('id'))->update($data);
				if ($save) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil mengupdate data</div>');
				redirect('klasifikasi');
				}
			}
		} else {
			$this->_validate();
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning">'.validation_errors().'</div>');
				redirect('klasifikasi/add');
			} else {
				$post =  $this->input->post(null, true);
				$data = [
					'kode' => $post['kode'],
					'nama' => $post['nama'],
					'uraian' => $post['uraian'],
					'id_user'	=> $this->session->userdata('id_user')
				];
				

				$save = $this->_db->create($data);
				if ($save) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil menyimpan data</div>');
				redirect('klasifikasi');
				}
			}
		}
		
	}

	public function _validate()
	{
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required|is_unique[tb_klasifikasi.kode]');
		$this->form_validation->set_rules('nama', 'Nama Klasifikasi', 'trim|required');
		$this->form_validation->set_rules('uraian', 'Keterangan / Uraian', 'trim|required');

		return $this;
	}

}

/* End of file Klasifikasi.php */
/* Location: ./application/controllers/Klasifikasi.php */