<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{
	private $table_name = 'users';

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	function count($table)
    {
        return  $this->db->count_all($table);
	}
	function count_group($table)
    {	
		$select =   array(
                'no_akun',
                'nama',
                'COUNT(IF(kondisi="C/In",kondisi,null)) AS cek_in',
                'COUNT(IF(kondisi="C/Out",kondisi,null)) AS cek_out',
                'COUNT(IF(status="Libur",status,null)) AS status',
                'COUNT(IF(status="Alfa",status,null)) AS alfa',
                'COUNT(IF(status="Sakit",status,null)) AS sakit',
                'COUNT(IF(status="Cuti",status,null)) AS cuti',
                'COUNT(IF(status="Ijin",status,null)) AS ijin',
            );
		$this->db->select($select);
		$this->db->from($table);
		$this->db->group_by('no_akun');
        return  $this->db->get()->result();	
	}
	
	public function login($data)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where('username', $data['username']);
		$this->db->where('password', $data['password']);

		$data = $this->db->get();
		if ($data->num_rows() == 1) {
			return $data->row();
		} else {
			return false;
		}
	}
	function select_by_id($id)
	{
		$param = array('id' => $id);
		return $this->db->get_where($this->table_name, $param)->row_array();
	}
	function select_all()
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->order_by('create_at', 'ASC');
		return $this->db->get()->result();
	}
	function getone($id)
	{
		$this->db->select('*');
		$this->db->from($this->table_name);
		$this->db->where('id', $id);
		return $this->db->get()->row_array();
	}
	function addUser($field)
	{
		$this->db->insert($this->table_name, $field);
		if ($this->db->affected_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	function updateUser($whare, $data)
	{
		$this->db->update($this->table_name, $data, $whare);
		return $this->db->affected_rows();
	}
	function delete($id)
	{
		$this->db->where('id', $id);
		$this->db->delete($this->table_name);
	}
}

/* End of file Auth_model.php */
