<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Karyawan extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('Login_in') != true) {
			redirect('auther/auth/login', 'refresh');
		}
		$this->load->model('Auth_model');
		$this->load->model('Karyawan_model', 'm');
		$this->load->model('Outsorsing_model', 'm_fk');
		$this->load->model('Absensi_model', 'absensi');
		error_reporting(0);
	}

	public function index()
	{
		$data['judul'] = "karyawan";
		$data['param'] = "list";
		$this->load->view('redirect', $data);
	}
	public function list()
	{
		$id = $this->session->userdata('id');
		$data['title'] = "Karyawan";
		$data['judul'] = "Manage Data Karyawan";
		$data['create'] = "Tambah Karyawan";
		$data['link'] = "Karyawan";
		$data['edit'] = "Edit";
		$data['users_auth'] = $this->Auth_model->select_by_id($id);

		$this->load->view('pages/karyawan/list_Karyawan', $data);
		// $this->load->view('master/app', $data);
	}
	public function absensi()
	{
		$id = $this->session->userdata('id');
		$data['title'] = "Karyawan";
		$data['judul'] = "Daftar Absensi";
		$data['create'] = "Import Absensi";
		$data['link'] = "Absensi";
		$data['edit'] = "Edit";
		$data['users_auth'] = $this->Auth_model->select_by_id($id);
		$data['absensii'] = $this->absensi->select_all();

		$this->load->view('pages/karyawan/list_absensi', $data);
	}
	public function libur()
	{
		$id = $this->session->userdata('id');
		$data['judul'] = "Libur Karyawan";
		$data['title'] = "Atur Libur Karyawan";
		$data['link'] = "Karyawan";
		$data['edit'] = "Edit";
		$data['users_auth'] = $this->Auth_model->select_by_id($id);

		$this->load->view('pages/karyawan/libur', $data);
	}
	public function dataTable()
	{
		$data['data'] = $this->m->join_select();
		$data['row'] = json_encode($data['data']);

		echo $data['row'];
	}
	function get_auto()
	{
		if (isset($_GET['term'])) {
			$result = $this->m->search_auto($_GET['term']);
			if (count($result) > 0) {
				foreach ($result as $row) {
					$array_res[] = array(
						'label'			=> $row->nama_lengkap,
						'akun'          => $row->no_akun,
						'nip'           => $row->nip,
					);
					echo json_encode($array_res);
				}
			}
		}
	}
	public function set_libur()
	{
		$update = array(
			array(
				'no_akun'         => $_POST['no_akun'],
				'nip'             => $_POST['nip'],
				'nama'    				=> $_POST['nama'],
				'kondisi'         => null,
				'kondisi_baru'		=> "null/in",
				'status'          => $_POST['status'],
			),
			array(
				'no_akun'         => $_POST['no_akun'],
				'nip'             => $_POST['nip'],
				'nama'    				=> $_POST['nama'],
				'kondisi'         => null,
				'kondisi_baru'		=> "null/out",
				'status'          => $_POST['status'],
			)
		);
		$insert = array(
			array(
				'no_akun'         => $_POST['no_akun'],
				'nip'             => $_POST['nip'],
				'nama'    				=> $_POST['nama'],
				'waktu'           => date('Y-m-d 07:00:00', strtotime(date($_POST['waktu']))),
				'kondisi'         => null,
				'kondisi_baru'		=> "null/in",
				'status'          => $_POST['status'],
			),
			array(
				'no_akun'         => $_POST['no_akun'],
				'nip'             => $_POST['nip'],
				'nama'    				=> $_POST['nama'],
				'waktu'           => date('Y-m-d 16:00:00', strtotime(date($_POST['waktu']))),
				'kondisi'         => null,
				'kondisi_baru'		=> "null/out",
				'status'          => $_POST['status'],
			)
		);

		$no_akun = $_POST['no_akun'];
		$waktu = $_POST['waktu'];

		$cek_data = $this->m->cek_data($no_akun, $waktu);
		if ($cek_data) {
			$this->absensi->update_multiple($no_akun, $waktu, $update);
			$this->session->set_flashdata('Sukses', 'Telah di Perbaharui');
			redirect('Karyawan/libur', 'refresh');
		} else {
			$this->absensi->insert_multiple($insert);
			$this->session->set_flashdata('Sukses', 'Telah di Tambahkan');
			redirect('Karyawan/libur', 'refresh');
		}
		// echo json_encode($data);
	}
	public function create()
	{
		$data['title'] = "Create Karyawan";
		$data['judul'] = "Manage Data Karyawan";
		$data['create'] = "Tambah Karyawan";
		$data['link'] = "Karyawan";
		$data['edit'] = "Edit";
		$data['instansi'] = $this->m_fk->select_all();

		$this->load->view('pages/karyawan/create', $data);
	}

	public function store()
	{
		$this->_validate();
		$data = array(
			'id' => $_POST['id'],
			'kd_outsorsing' => $_POST['kd_outsorsing'],
			'no_akun' => $_POST['no_akun'],
			'nama_lengkap' => $_POST['nama_lengkap'],
			'nip' => $_POST['nip'],
			'no_telp' => $_POST['no_telp'],
			'alamat' => $_POST['alamat'],
			'gol_darah' => $_POST['gol_darah'],
			'npwp' => $_POST['npwp'],
			'nik' => $_POST['nik'],
			'tmpt_lahir' => $_POST['tmpt_lahir'],
			'tgl_lahir' => $_POST['tgl_lahir'],
			'divisi' => $_POST['divisi'],
			'agama' => $_POST['agama'],
		);
		$insert = $this->m->add($data);

		echo json_encode(array("status" => true));
	}
	public function edit($id)
	{
		$data['title'] = "Create Karyawan";
		$data['judul'] = "Manage Data Karyawan";
		$data['create'] = "Tambah Karyawan";
		$data['link'] = "Karyawan";
		$data['edit'] = "Edit";

		$dataInput = $this->input->post();
		$data['row'] = $this->m->getone($id);
		$data['instansi'] = $this->m_fk->select_all();

		$this->load->view('pages/karyawan/edit', $data);
	}

	public function update()
	{
		$this->_validate();
		$data = array(
			'id' => $_POST['id'],
			'kd_outsorsing' => $_POST['kd_outsorsing'],
			'no_akun' => $_POST['no_akun'],
			'nama_lengkap' => $_POST['nama_lengkap'],
			'nip' => $_POST['nip'],
			'no_telp' => $_POST['no_telp'],
			'alamat' => $_POST['alamat'],
			'gol_darah' => $_POST['gol_darah'],
			'npwp' => $_POST['npwp'],
			'nik' => $_POST['nik'],
			'tmpt_lahir' => $_POST['tmpt_lahir'],
			'tgl_lahir' => $_POST['tgl_lahir'],
			'divisi' => $_POST['divisi'],
			'agama' => $_POST['agama'],
		);
		$insert = $this->m->update(array('id' => $_POST['id']), $data);

		echo json_encode(array("status" => true));
	}
	public function delete($id)
	{
		$this->m->delete($id);
		echo json_encode(array("status" => true));
	}
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = true;

		if ($this->input->post('kd_outsorsing') == '') {
			$data['inputerror'][] = 'kd_outsorsing';
			$data['error_string'][] = 'Instansi is required';
			$data['status'] = false;
		}

		if ($this->input->post('no_akun') == '') {
			$data['inputerror'][] = 'no_akun';
			$data['error_string'][] = 'No Akun is required';
			$data['status'] = false;
		}

		if ($this->input->post('nama_lengkap') == '') {
			$data['inputerror'][] = 'nama_lengkap';
			$data['error_string'][] = 'Nama Lengkap is required';
			$data['status'] = false;
		}
		if ($this->input->post('nip') == '') {
			$data['inputerror'][] = 'nip';
			$data['error_string'][] = 'NIP is required';
			$data['status'] = false;
		}
		if ($data['status'] === false) {
			echo json_encode($data);
			exit();
		}
	}
}

/* End of file Karyawan.php */
