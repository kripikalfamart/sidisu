<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Indeks extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('level') !="admin" ) {
			redirect('login','refresh');
		}
		$this->load->model('model_klasifikasi', '_db');
	}


	public function index()
	{
		$data['title'] = ' | Data Index Surat';
		$data['klasifikasi'] = $this->_db->get('tb_index');
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/index/data',$data);
		$this->load->view('templates/footer');
	}

	public function add()
	{
		$data = [
			'id' =>	set_value(''),
			'nama' => set_value(''),
			'kode' => set_value(''),
		];
		$data['title'] = ' | Tambah Index ';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/index/tambah',$data);
		$this->load->view('templates/footer');
	}

	public function save()
	{
		if ($this->input->post('id') != null) {
			$this->form_validation->set_rules('kode', 'Kode', 'trim|required');
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning">'.validation_errors().'</div>');
				redirect('klasifikasi/edit/'.$this->input->post('id'));
			} else {
				$post =  $this->input->post(null, true);
				$data = [
					'kode' => $post['kode'],
					'nama_index' => $post['nama'],
				];
				
				$save = $this->_db->where('id_klasifikasi', $this->input->post('id'))->update($data, 'tb_index');
				if ($save) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil mengupdate data</div>');
				redirect('indeks');
				}
			}
		} else {
			$this->_validate();
			if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning">'.validation_errors().'</div>');
				redirect('indeks/add');
			} else {
				$post =  $this->input->post(null, true);
				$data = [
					'kode' => $post['kode'],
					'nama_index' => $post['nama'],
				];
				

				$save = $this->_db->create($data, 'tb_index');
				if ($save) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil menyimpan data</div>');
				redirect('indeks');
				}
			}
		}
		
	}

	public function _validate()
	{
		$this->form_validation->set_rules('kode', 'Kode', 'trim|required|is_unique[tb_index.kode]');

		return $this;
	}

	public function deleteData($id)
	{
		$row = $this->_db->where('id_index', $id)->find('tb_index');
		if ($row > 0) {
			$delete = $this->_db->where('id_index', $id)->delete('tb_index');
			if ($delete) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menghapus Data.!</div>');
				redirect('indeks','refresh');
			} else {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning">Gagal menghapus data.!</div>');
				redirect('indeks','refresh');
			}
			
		} else {
			$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Data yang di pilih tidak ditemukan</div>');
			redirect('indeks','refresh');
		}

	}

}

/* End of file Indeks.php */
/* Location: ./application/controllers/Indeks.php */