<?php 


class Surat extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		if ($this->session->userdata('level') !="admin" ) {
			redirect('login','refresh');
		}
		$this->load->model('Model_surat');
		$this->load->model('Model_klasifikasi', '_db');
	}


// surat masuk
	public function masuk()
	{
		
		$data['title'] = ' | Data Surat';

		$data['datas'] = $this->Model_surat->tsuratmasuk();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/surat/masuk/data',$data);
		$this->load->view('templates/footer');


	}

	public function tsuratmasuk()
	{
		$data['title'] = ' | Tambah Surat ';
		

		$data = [
			'klasifikasi' => $this->_db->get(),
			'index' => $this->_db->get('tb_index'),
			'id'	=> set_value(''),
			'no_agenda'	=> set_value(''),
			'no_surat'	=> set_value(''),
			'asal_surat'	=> set_value(''),
			'tujuan'	=> set_value(''),
			'tanggal_diterima'	=> set_value(''),
			'tanggal_surat'	=> set_value(''),
			'kode_klasifikasi'	=> set_value(''),
			'index_surat'	=> set_value(''),
			'isi_ringkasan'	=> set_value(''),
			'keterangan'	=> set_value(''),
			'file'	=> set_value(''),
		];
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/surat/masuk/tambah');
		$this->load->view('templates/footer');
	}
	public function save_suratmasuk()
	{
		if ($this->input->post('id') != null) {
			$no_agenda = $this->input->post('no_agenda');
			$no_surat = $this->input->post('no_surat');
			$asal_surat = $this->input->post('asal_surat');
			$tujuan = $this->input->post('tujuan');
			$tanggal_diterima = $this->input->post('tanggal_diterima');
			$tanggal_surat = $this->input->post('tanggal_surat');
			$klasifikasi = $this->input->post('klasifikasi');
			$index_surat = $this->input->post('index_surat');
			$isi_ringkasan = $this->input->post('isi_ringkasan');
			$keterangan = $this->input->post('keterangan');
			$user = $this->session->userdata('id_user');

			$foto = $_FILES['file']['name'];
			if ($foto =''){}
			else 
			{
				$config['upload_path']='./datasurat/masuk';
				$config['allowed_types']='jpg|jpeg|png|JPEG|docx';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) 
				{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal Upload Foto.!</div>');
					redirect('surat/masuk','refresh');
				}
				else
				{
					$foto = $this->upload->data('file_name');
				}
					// $ses = $this->session->userdata('id_user');
						$data = array(
							'no_agenda' => $no_agenda,
							'no_surat' => $no_surat,
							'tujuan' => $tujuan,
							'tgl_terima' => $tanggal_diterima,
							'tgl_surat' => $tanggal_surat,
							'kode_klasifikasi' => $klasifikasi,
							'id_indeks' => $index_surat,
							'isi' => $isi_ringkasan,
							'keterangan' => $keterangan,
							'id_user' => $user,
							'asal_surat' => $this->input->post('asal_surat'),
							// 'modified_by' => $ses,
							'file' => $foto
						 );
					$this->_db->where('id_suratmasuk', $this->input->post('id'))->update($data, 'tb_suratmasuk');
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil mengupdate Data Surat Masuk.!</div>');
					redirect('surat/masuk','refresh');

			}


		} else {
			$no_agenda = $this->input->post('no_agenda');
			$no_surat = $this->input->post('no_surat');
			$asal_surat = $this->input->post('asal_surat');
			$tujuan = $this->input->post('tujuan');
			$tanggal_diterima = $this->input->post('tanggal_diterima');
			$tanggal_surat = $this->input->post('tanggal_surat');
			$klasifikasi = $this->input->post('klasifikasi');
			$index_surat = $this->input->post('index_surat');
			$isi_ringkasan = $this->input->post('isi_ringkasan');
			$keterangan = $this->input->post('keterangan');
			$user = $this->session->userdata('id_user');
		// $tujuan = $this->input->post('tujuan');
			$foto = $_FILES['file']['name'];
			if ($foto =''){}
			else 
			{
				$config['upload_path']='./datasurat/masuk';
				$config['allowed_types']='jpg|jpeg|png|JPEG|docx';

				$this->load->library('upload', $config);

				if (!$this->upload->do_upload('file')) 
				{
					$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal Upload Foto.!</div>');
					redirect('surat/masuk','refresh');
				}
				else
				{
					$foto = $this->upload->data('file_name');
				}
					// $ses = $this->session->userdata('id_user');
						$data = array(
							'no_agenda' => $no_agenda,
							'no_surat' => $no_surat,
							'tujuan' => $tujuan,
							'tgl_terima' => $tanggal_diterima,
							'tgl_surat' => $tanggal_surat,
							'kode_klasifikasi' => $klasifikasi,
							'id_indeks' => $index_surat,
							'isi' => $isi_ringkasan,
							'keterangan' => $keterangan,
							'id_user' => $user,
							'asal_surat' => $this->input->post('asal_surat'),
							// 'modified_by' => $ses,
							'file' => $foto
						 );
					$this->db->insert('tb_suratmasuk', $data);
					$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menambah Data Surat Masuk.!</div>');
					redirect('surat/masuk','refresh');

			}
		}
		
	}
	public function esuratmasuk($id_suratmasuk)
	{
		$where = array('id_suratmasuk' => $id_suratmasuk );
		$surat =  $this->Model_surat->edsuratmasuk($where);

		$data = [
			'klasifikasi' => $this->_db->get(),
			'index' => $this->_db->get('tb_index'),
			'id'				=> $surat->id_suratmasuk,
			'no_agenda'			=> $surat->no_agenda,
			'no_surat'			=> $surat->no_surat,
			'asal_surat'		=> $surat->asal_surat,
			'tujuan'			=> $surat->tujuan,
			'tanggal_diterima'	=> $surat->tgl_terima,
			'tanggal_surat'		=> $surat->tgl_surat,
			'kode_klasifikasi'		=> $surat->kode_klasifikasi,
			'index_surat'		=> $surat->id_indeks,
			'isi_ringkasan'		=> $surat->keterangan,
			'keterangan'		=> $surat->keterangan,
			'file'				=> $surat->file,
		];
		$data['title'] = ' | Edit Data surat Masuk';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/surat/masuk/tambah',$data);
		$this->load->view('templates/footer');
	}
	public function update_suratmasuk($id_suratmasuk)
	{
		$where = array('id_suratmasuk' => $id_suratmasuk);
		$this->Model_surat->updatesuratmasuk($where);
	}
	public function hsuratmasuk($id_suratmasuk)
	{
		$where = array('id_suratmasuk' => $id_suratmasuk );
		$this->Model_surat->hapussuratmasuk($where);
	}
// akhir surat masuk



// surat keluar keluar

	public function keluar()
	{
		
		$data['title'] = ' | Data Surat';
		$data['datas'] = $this->Model_surat->tsuratkeluar();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/surat/keluar/data',$data);
		$this->load->view('templates/footer');
	}

	public function tsuratkeluar()
	{
		$data['title'] = ' | Tambah Surat ';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/surat/keluar/tambah');
		$this->load->view('templates/footer');
	}
	public function save_suratkeluar()
	{
		$no_agenda = $this->input->post('no_agenda');
		$no_surat = $this->input->post('no_surat');
		$asal_surat = $this->input->post('asal_surat');
		$tujuan = $this->input->post('tujuan');
		// $tujuan = $this->input->post('tujuan');
		$foto = $_FILES['file']['name'];
		if ($foto =''){}
				else 
				{
					$config['upload_path']='./datasurat/keluar';
					$config['allowed_types']='jpg|jpeg|png|JPEG|docx';

					$this->load->library('upload', $config);

					if (!$this->upload->do_upload('file')) 
					{
						$this->session->set_flashdata('pesan', '<div class="alert alert-danger">Gagal Upload Foto.!</div>');
						redirect('surat/masuk','refresh');
					}
					else
					{
						$foto = $this->upload->data('file_name');
					}
						// $ses = $this->session->userdata('id_user');
							$data = array(
								'no_agenda' => $no_agenda,
								'no_surat' => $no_surat,
								'tujuan' => $tujuan,
								// 'modified_by' => $ses,
								'file' => $foto
							 );
						$this->db->insert('tb_suratkeluar', $data);
						$this->session->set_flashdata('pesan', '<div class="alert alert-success">Berhasil Menambah Data Surat Masuk.!</div>');
						redirect('surat/keluar','refresh');

				}
	}
	public function esuratkeluar($id_suratkeluar)
	{
		$where = array('id_suratkeluar' => $id_suratkeluar );
		$data['datas'] =  $this->Model_surat->edsuratkeluar($where);
		$data['title'] = ' | Edit Data surat Keluar';
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/surat/keluar/edit',$data);
		$this->load->view('templates/footer');
	}
	public function update_suratkeluar($id_suratkeluar)
	{
		$where = array('id_suratkeluar' => $id_suratkeluar);
		$this->Model_surat->updatesuratkeluar($where);
	}
	public function hsuratkeluar($id_suratkeluar)
	{
		$where = array('id_suratkeluar' => $id_suratkeluar );
		$this->Model_surat->hapussuratkeluar($where);
	}

// akhir surat keluar
	
}