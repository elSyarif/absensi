<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Outsorsing_model extends CI_Model
{
    private $table_name = 'outsorsings';
    private $order = 'id';
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
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
        $this->db->order_by($this->order, 'ASC');
        return $this->db->get()->result();
    }
    function getone($id)
    {
        $this->db->select('*');
        $this->db->from($this->table_name);
        $this->db->where('id', $id);
        return $this->db->get()->row_array();
    }
    function add($field)
    {
        $this->db->insert($this->table_name, $field);
        if ($this->db->affected_rows() > 0) {
            return true;
        } else {
            return false;
        }
    }
    function update($whare, $data)
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

/* End of file Outsorsing_model.php */
