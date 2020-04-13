<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absensi_model extends CI_Model
{
	private $table_name = "absensis";
	private $id_col = "id";

	public function select_all()
	{
		return $this->db->get($this->table_name)->result();
	}

	public function upload_file($filename)
	{
		$this->load->library('upload');

		$config['upload_path'] = './excel/absensi';
		$config['allowed_types'] = 'xlsx';
		$config['max_size'] = '2048';
		$config['overwrite'] = true;
		$config['file_name'] = $filename;

		$this->upload->initialize($config);

		if ($this->upload->do_upload('file')) {
			$return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
			return $return;
		} else {
			$return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
			return $return;
		}
	}
	public function insert_multiple($data)
	{
		$this->db->insert_batch($this->table_name, $data);
	}

	public function update_multiple($no_akun, $waktu, $data)
	{
		// echo json_encode($data);die();
		$this->db->where('no_akun', $no_akun);
		$this->db->like('waktu', $waktu);
		$this->db->update_batch($this->table_name, $data, 'no_akun');
	}
	// tambah fungsi untuk inisial yang akan di updat eberupa selt kemudian masukan id yan di select sebagai parameter
	// form yang di lembar ke controller 

	public function count($date)
	{
		// echo $date;
		$select =   array(
			'no_akun',
			'nama',
			'waktu',
			'COUNT(IF(kondisi="C/In",kondisi,null)) AS cek_in',
			'COUNT(IF(kondisi="C/Out",kondisi,null)) AS cek_out',
			'COUNT(IF(status="Libur",status,null)) AS status',
			'COUNT(IF(CASE STATUS = "Alfa" WHEN kondisi_baru="null/in" THEN STATUS = "Alfa" END,STATUS,NULL)) AS alfa',
			'COUNT(IF(CASE STATUS = "Sakit" WHEN kondisi_baru="null/in" THEN STATUS = "Sakit" END,STATUS,NULL))  AS sakit',
			'COUNT(IF(CASE STATUS = "Cuti" WHEN kondisi_baru="null/in" THEN STATUS = "Cuti" END,STATUS,NULL))  AS cuti',
			'COUNT(IF(CASE STATUS = "Ijin" WHEN kondisi_baru="null/in" THEN STATUS = "Ijin" END,STATUS,NULL))  AS ijin'
		);

		// $this->db->select('no_akun,nama,COUNT(IF(kondisi="Cek/in",kondisi,null)) AS Cek_in');
		$this->db->select($select);
		$this->db->from($this->table_name);
		$this->db->like('waktu', $date, 'both');
		$this->db->group_by('no_akun');
		$this->db->order_by('nama', 'Asc');
		return $this->db->get()->result();
	}
	public function join($date)
	{
		// $tgl = date('Y-m',strtotime(date('2019-02')));

		$this->db->select('karyawans.*,absensis.waktu,absensis.kondisi,absensis.status');
		$this->db->from('karyawans');
		$this->db->join('absensis', 'absensis.no_akun = karyawans.no_akun', 'inner');
		$this->db->order_by('absensis.waktu', 'asc');
		$this->db->like('waktu', $date);
		return $this->db->get()->result();
	}

	public function count_cv($param, $date)
	{
		// echo $date;
		/*
		$this->db->select('outsorsings.nama, outsorsings.alamat, karyawans.no_akun, karyawans.nama_lengkap, karyawans.nip, absensis.waktu, absensis.kondisi, absensis.kondisi_baru, absensis.status');
		$this->db->from('outsorsings');
		$this->db->join('karyawans', 'karyawans.kd_outsorsing = outsorsings.id', 'inner');
		$this->db->join('absensis', 'absensis.no_akun = karyawans.no_akun', 'inner');
		$this->db->where('outsorsings.id', $param);
		*/
		$select =   array(
			'outsorsings.nama', 'outsorsings.alamat', 'karyawans.no_akun', ' karyawans.nama_lengkap', 'karyawans.nip', 'absensis.waktu', 'absensis.kondisi', 'absensis.kondisi_baru', 'absensis.status',
			'COUNT(IF(absensis.kondisi="C/In",absensis.kondisi,null)) AS cek_in',
			'COUNT(IF(absensis.kondisi="C/Out",absensis.kondisi,null)) AS cek_out',
			'COUNT(IF(absensis.status="Libur",absensis.status,null)) AS status',
			'COUNT(IF(CASE absensis.STATUS = "Alfa" WHEN absensis.kondisi_baru="null/in" THEN absensis.STATUS = "Alfa" END,absensis.STATUS,NULL)) AS alfa',
			'COUNT(IF(CASE absensis.STATUS = "Sakit" WHEN absensis.kondisi_baru="null/in" THEN absensis.STATUS = "Sakit" END,absensis.STATUS,NULL))  AS sakit',
			'COUNT(IF(CASE absensis.STATUS = "Cuti" WHEN absensis.kondisi_baru="null/in" THEN absensis.STATUS = "Cuti" END,absensis.STATUS,NULL))  AS cuti',
			'COUNT(IF(CASE absensis.STATUS = "Ijin" WHEN absensis.kondisi_baru="null/in" THEN absensis.STATUS = "Ijin" END,absensis.STATUS,NULL))  AS ijin'
		);

		// $this->db->select('no_akun,nama,COUNT(IF(kondisi="Cek/in",kondisi,null)) AS Cek_in');
		$this->db->select($select);
		$this->db->from('outsorsings');
		$this->db->join('karyawans', 'karyawans.kd_outsorsing = outsorsings.id', 'inner');
		$this->db->join('absensis', 'absensis.no_akun = karyawans.no_akun', 'inner');
		$this->db->where('outsorsings.id', $param);
		$this->db->like('absensis.waktu', $date, 'both');
		$this->db->group_by('karyawans.no_akun');
		$this->db->order_by('outsorsings.nama', 'Asc');
		return $this->db->get()->result();
	}
	public function join_cv($param, $date)
	{
		// $tgl = date('Y-m',strtotime(date('2019-02')));

		$this->db->select('karyawans.*,outsorsings.nama,absensis.waktu,absensis.kondisi,absensis.status');
		$this->db->from('karyawans');
		$this->db->join('outsorsings', 'outsorsings.id = karyawans.kd_outsorsing', 'inner');
		$this->db->join('absensis', 'absensis.no_akun = karyawans.no_akun', 'inner');
		$this->db->where('outsorsings.id', $param);
		$this->db->like('waktu', $date);
		$this->db->order_by('absensis.waktu', 'asc');
		return $this->db->get()->result();
	}
}

/* End of file Absensi_model.php */
