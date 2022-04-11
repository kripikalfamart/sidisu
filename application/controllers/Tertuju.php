<?php 


class Tertuju extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		if ($this->session->userdata('level') !="tertuju"   ) {
			redirect('login','refresh');
		}
		$this->load->model('Model_tertuju');
	}


	public function suratmasuk()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url().'tertuju/suratmasuk';
		$config['total_rows'] = $this->Model_tertuju->totalsuratmasuk()->num_rows();
		$config['per_page'] = 10;
      	$config['first_link']       = 'First';
        $config['last_link']        = 'Last';
        $config['next_link']        = 'Selanjutnya';
        $config['prev_link']        = 'Sebelumnya';
        $config['full_tag_open']    = '<div class="pagging text-center"><nav><ul class="pagination justify-content-center">';
        $config['full_tag_close']   = '</ul></nav></div>';
        $config['num_tag_open']     = '<li class="page-item"><span class="page-link">';
        $config['num_tag_close']    = '</span></li>';
        $config['cur_tag_open']     = '<li class="page-item active"><span class="page-link">';
        $config['cur_tag_close']    = '<span class="sr-only">(current)</span></span></li>';
        $config['next_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['next_tagl_close']  = '<span aria-hidden="true">&raquo;</span></span></li>';
        $config['prev_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['prev_tagl_close']  = '</span>Next</li>';
        $config['first_tag_open']   = '<li class="page-item"><span class="page-link">';
        $config['first_tagl_close'] = '</span></li>';
        $config['last_tag_open']    = '<li class="page-item"><span class="page-link">';
        $config['last_tagl_close']  = '</span></li>';
		$this->pagination->initialize($config);
		$data['start'] = $this->uri->segment(3);
		$data['title'] = ' | Data Surat Masuk';
		$data['datas'] = $this->Model_tertuju->tsuratmasuk($config['per_page'],$data['start']);
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/tertuju/surat/masuk/data',$data);
		$this->load->view('templates/footer');
	}

}