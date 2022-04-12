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
		$data_surat_masuk = $this->db->select('tb_disposisi.*, tb_suratmasuk.*');
		$this->db->join('tb_suratmasuk', 'tb_suratmasuk.id_suratmasuk = tb_disposisi.id_suratmasuk', 'left');

		$this->db->from('tb_disposisi');
		$datas = $this->db->get()->result();

		$data['datas'] = $datas;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/disposisi/data',$data);
		$this->load->view('templates/footer');
	}

	public function surat($id)
	{
		$data['title'] = ' | Disposisi Surat';

		$data_surat_masuk = $this->db->select('tb_disposisi.*, tb_suratmasuk.*, tb_klasifikasi.nama as nama_klasifikasi');
		$this->db->join('tb_klasifikasi', 'tb_klasifikasi.kode = tb_suratmasuk.kode_klasifikasi', 'left');
		$this->db->where('tb_disposisi.id_suratmasuk', $id);
		$this->db->from('tb_suratmasuk');
		$datas = $this->db->get()->row();

		$riwayat = $this->db->select('tb_disposisi.*, tb_suratmasuk.*, tb_klasifikasi.nama as nama_klasifikasi');
		$this->db->join('tb_suratmasuk', 'tb_suratmasuk.id_suratmasuk = tb_disposisi.id_suratmasuk', 'left');
		$this->db->join('tb_klasifikasi', 'tb_klasifikasi.kode = tb_suratmasuk.kode_klasifikasi', 'left');
		$this->db->where('tb_disposisi.id_suratmasuk', $id);
		$this->db->from('tb_disposisi');
		$data_riwayat = $this->db->get()->result();


		$data['row'] = $datas;
		$data['datas'] = $data_riwayat;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/disposisi/surat',$data);
		$this->load->view('templates/footer');
	}

	public function surat_keluar($id)
	{
		$data['title'] = ' | Disposisi Surat';

		$data_surat_masuk = $this->db->select('tb_suratkeluar.*, tb_klasifikasi.nama as nama_klasifikasi');
		$this->db->join('tb_klasifikasi', 'tb_klasifikasi.kode = tb_suratkeluar.kode_klasifikasi', 'left');
		$this->db->where('tb_suratkeluar.id_suratkeluar', $id);
		$this->db->from('tb_suratkeluar');
		$datas = $this->db->get()->row();

		$riwayat =  $this->db->select('tb_disposisi.*, tb_suratkeluar.*, tb_klasifikasi.nama as nama_klasifikasi');
		$this->db->join('tb_suratkeluar', 'tb_suratkeluar.id_suratkeluar = tb_disposisi.id_suratkeluar', 'left');
		$this->db->join('tb_klasifikasi', 'tb_klasifikasi.kode = tb_suratkeluar.kode_klasifikasi', 'left');
		$this->db->where('tb_disposisi.id_suratkeluar', $id);
		$this->db->from('tb_disposisi');
		$data_riwayat = $this->db->get()->result();


		$data['row'] = $datas;
		$data['datas'] = $data_riwayat;

		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/disposisi/surat_keluar',$data);
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

	public function set_keluar($id)
	{
		$data['title'] = ' | Disposisi Surat';

		$data_surat_masuk = $this->db->select('tb_suratkeluar.*, tb_klasifikasi.nama as nama_klasifikasi, tb_index.nama_index ');
		$this->db->join('tb_klasifikasi', 'tb_klasifikasi.kode = tb_suratkeluar.kode_klasifikasi', 'left');
		$this->db->join('tb_index', 'tb_index.id_index = tb_suratkeluar.id_index', 'left');
		$this->db->where('tb_suratkeluar.id_suratkeluar', $id);
		$this->db->from('tb_suratkeluar');
		$datas = $this->db->get()->result();

		$data['datas'] = $datas;
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/disposisi/form_keluar',$data);
		$this->load->view('templates/footer');
	}

	public function save()
	{
		$data = [
			'tujuan_disposisi'		=> $this->input->post('tujuan'),
			'isi_disposisi'	=> $this->input->post('isi_disposisi'),
			'sifat'	=> $this->input->post('sifat'),
			'batas_waktu'	=> $this->input->post('batas_waktu'),
			'catatan'	=> $this->input->post('keterangan'),
			'id_suratmasuk'	=> $this->input->post('id'),
			'id_user'	=> $this->session->userdata('id_user'),
			'status'	=> $this->input->post('status_surat')
		];
		$this->_validate();
		if ($this->form_validation->run() == FALSE) {
				$this->session->set_flashdata('pesan', '<div class="alert alert-warning">'.validation_errors().'</div>');
				redirect('disposisi/set/'.$this->input->post('id'));
			} else {
				$save = $this->_db->create($data, 'tb_disposisi');
				if ($save) {
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Mengset Disposisi</div>');
				redirect('disposisi/surat/'.$this->input->post('id'));
				}
			}


	}


	public function _validate()
	{
		$this->form_validation->set_rules('tujuan', 'Tujuan', 'trim|required');
		$this->form_validation->set_rules('isi_disposisi', 'Isi Disposisi', 'trim|required');
		$this->form_validation->set_rules('sifat', 'Sifat', 'trim|required');
		$this->form_validation->set_rules('batas_waktu', 'Keterangan / Uraian', 'trim|required');
		$this->form_validation->set_rules('keterangan', 'Keterangan', 'trim|required');

		return $this;
	}

	public function print($id)
	{
		$data_surat_masuk = $this->db->select('tb_disposisi.*, tb_suratmasuk.*, tb_index.*, tb_klasifikasi.*');
		$this->db->join('tb_suratmasuk', 'tb_suratmasuk.id_suratmasuk = tb_disposisi.id_suratmasuk', 'left');
		$this->db->join('tb_klasifikasi', 'tb_klasifikasi.kode = tb_suratmasuk.kode_klasifikasi', 'left');
		$this->db->join('tb_index', 'tb_index.id_index = tb_suratmasuk.id_indeks', 'left');
		$this->db->where('tb_suratmasuk.id_suratmasuk', $id);
		$this->db->from('tb_disposisi');
		$datas = $this->db->get()->row();

		$data['surat'] = $datas;
		$this->load->view('templates/index', $data);
		$this->load->view('backend/disposisi/print',$data);
	}

}

/* End of file Disposisi.php */
/* Location: ./application/controllers/Disposisi.php */