<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan_model extends CI_Model
{
	private $table_name = 'karyawans';
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
	function join_select()
	{
		$this->db->select('karyawans.*,outsorsings.nama');
		$this->db->from('karyawans');
		$this->db->join('outsorsings', 'outsorsings.id = karyawans.kd_outsorsing', 'inner');
		return $this->db->get()->result();
	}
	function search_auto($key)
	{
		$this->db->like('nama_lengkap', $key, 'both');
		$this->db->order_by('nama_lengkap', 'ASC');
		$this->db->limit(10);
		return $this->db->get($this->table_name)->result();
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

	function cek_data($no_akun, $waktu)
	{
		$this->db->select('*');
		$this->db->from('absensis');
		$this->db->where('no_akun', $no_akun);
		$this->db->like('waktu', $waktu);
		$data = $this->db->get();
		if ($data->num_rows() > 0) {
			return true;
		} else {
			return false;
		}
	}
	function per_instansi($param)
	{
		$this->db->select('outsorsings.nama, outsorsings.alamat, karyawans.no_akun, karyawans.nama_lengkap, karyawans.nip, absensis.waktu, absensis.kondisi, absensis.kondisi_baru, absensis.status');
		$this->db->from('outsorsings');
		$this->db->join('karyawans', 'karyawans.kd_outsorsing = outsorsings.id', 'inner');
		$this->db->join('absensis', 'absensis.no_akun = karyawans.no_akun', 'inner');
		$this->db->where('outsorsings.id', $param);

		return $this->db->get()->result();
	}
	function perInstansi($param)
	{
		$this->db->select('karyawans.nama_lengkap,karyawans.alamat,karyawans.nip,karyawans.no_telp,karyawans.tmpt_lahir,karyawans.tgl_lahir,karyawans.divisi,outsorsings.nama');
		$this->db->from('karyawans');
		$this->db->join('outsorsings', 'outsorsings.id = karyawans.kd_outsorsing', 'inner');
		$this->db->where('outsorsings.id', $param);
		return $this->db->get()->result();
	}
}

/* End of file Karyawan_model.php */
