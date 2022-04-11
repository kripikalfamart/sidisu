<?php 


/**
 * 
 */
class Model_dashboard extends CI_Model
{
	
	public function totalsuratmasuk()
	{
		return $this->db->get('tb_suratmasuk')->num_rows();
	}
	public function totalsuratkeluar()
	{
		return $this->db->get('tb_suratkeluar')->num_rows();
	}

	public function totalakun()
	{
		return $this->db->get('tb_users')->num_rows();
	}
}