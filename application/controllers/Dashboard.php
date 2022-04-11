<?php 


/**
 * 
 */
class Dashboard extends CI_Controller
{
	
	function __construct()
	{
		parent:: __construct();
		if ($this->session->userdata('level') !="admin" ) {
			redirect('login','refresh');
		}
		$this->load->model('Model_dashboard');
	}

	public function index()
	{
		
		$data['title'] = ' | Dashboard';
		$data['totalsuratmasuk'] = $this->Model_dashboard->totalsuratmasuk();
		$data['totalakun'] = $this->Model_dashboard->totalakun();
		$data['totalsuratkeluar'] = $this->Model_dashboard->totalsuratkeluar();
		$this->load->view('templates/header', $data);
		$this->load->view('templates/sidebar');
		$this->load->view('backend/dashboard/data',$data);
		$this->load->view('templates/footer');
	}
	
	
}