<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Model_klasifikasi extends CI_Model {

	private $table = 'tb_klasifikasi';
	private $primary_key = 'id_klasifikasi';

	public function __construct()
	{
		parent::__construct();
	}

	public function get($table = null)
    {
        if ($table != null) {
            return $this->db->get($table)->result();
            
                        
        } else {
            return $this->db->get($this->table)->result();
        }
        
    }

    public function find($table = null)
    {
        if ($table != null) {
            return $this->db->get($table)->num_rows();
            
                        
        } else {
            return $this->db->get($this->table)->num_rows();
        }
        
    }

	public function where($columns, $condition)
    {
        $this->db->where($columns, $condition);
        return $this;
    }

	public function store($data = array())
    {
        $this->db->insert($this->table, $data);
        return $this->db->insert_id();
    }

    public function from($table)
    {
        $this->db->from($table);
        return $this;
    }

    public function select($columns)
    {
        $this->db->select($columns);
        return $this;
    }

    public function first($table = null)
    {
        if ($table != null) {
            return $this->db->get($table)->row();
                        
        } else {
            return $this->db->get($this->table)->row();

        }
        
    }

    public function create($data, $table = null)
    {
        if ($table == null) {
           $this->db->insert($this->table, $data);
            return $this->db->insert_id();
        } else{
            $this->db->insert($table, $data);
            return $this->db->insert_id();
        }
        
    }

    public function update($data, $table = null)
    {
        if ($table != null) 
            return $this->db->update($table, $data);
       
         return $this->db->update($this->table, $data);
    }

    public function delete($table = null)
    {
    	if ($table == null) {
    		$this->db->delete($this->table);
    	} else {
    		$this->db->delete($table);
    	}
        
        return $this->db->affected_rows();
        
        
    }


	

}

/* End of file Model_klasifikasi.php */
/* Location: ./application/models/Model_klasifikasi.php */