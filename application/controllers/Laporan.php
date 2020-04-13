<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Laporan extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('Login_in') != true) {
			redirect('auther/auth/login', 'refresh');
		}

		$this->load->model('Auth_model');
		$this->load->model('Absensi_model');
		$this->load->model('Karyawan_model');
		$this->load->model('Outsorsing_model');
	}

	public function index()
	{
		$data['judul'] = "Laporan";
		$data['param'] = "Absensi";
		$this->load->view('redirect', $data);

		// $data['in'] = "C/In";
		// $data['out'] = "C/Out";
		// $data['bulan'] = date('F');
		// $data["judul"] ="DAFTAR APORAN ABSENSI";

		// ob_start(); // start

		// This is where your script would normally output the HTML using echo or print

		// $html = ob_get_contents();

		// $html = $this->load->view('test_html',$data, TRUE);

		// ob_end_clean(); //End  

		// $mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
		// $mpdf->AddPage('L');
		// $mpdf->SetTitle('Laporan Absensi');
		// $mpdf->WriteHTML($html);
		// $mpdf->output();
		// echo json_encode($data);
	}
	public function Karyawan()
	{
		$id = $this->session->userdata('id');
		$data['title'] = "Laporan Karyawan";
		$data['users_auth'] = $this->Auth_model->select_by_id($id);
		$data['instansi'] = $this->Outsorsing_model->select_all();

		$this->load->view('pages/laporan/v_karyawan', $data);
	}
	public function Absensi()
	{
		$id = $this->session->userdata('id');
		$data['title'] = "Laporan Absensi";
		$data['users_auth'] = $this->Auth_model->select_by_id($id);
		$data['instansi'] = $this->Outsorsing_model->select_all();

		// echo json_encode($data); die();
		$this->load->view('pages/laporan/option', $data);
	}

	public function list_laporan()
	{
		$data['date'] = date('Y-m-d');
		$data['bulan'] = $_POST['bulan'];
		$data['tahun']    = date('Y');
		$data['getBulan'] = $data['tahun'] . '-' . $data['bulan'];
		$tgl = date('Y-m', strtotime(date($data['getBulan'])));

		$data['count'] = $this->Absensi_model->count($tgl);
		$data['join'] = $this->Absensi_model->join($tgl);

		$data['in'] = "C/In";
		$data['out'] = "C/Out";
		$data['bulan'] = date('F', strtotime(date($data['getBulan'])));
		$data["judul"] = "DAFTAR LAPORAN ABSENSI";

		// ob_start(); // start

		// This is where your script would normally output the HTML using echo or print

		// $html = ob_get_contents();

		$html = $this->load->view('pages/laporan/lap_bulan', $data, true);

		// ob_end_clean(); //End  

		$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
		$mpdf->AddPage('L');
		$mpdf->SetTitle('Laporan Absensi');
		$mpdf->WriteHTML($html);
		$mpdf->output();
	}
	public function per_instansi()
	{
		$param = $_POST['instansi'];
		$getNama = $this->Outsorsing_model->getone($_POST['instansi']);

		$data['instansi'] = $getNama['nama'];
		$data['date'] = date('Y-m-d');
		$data['bulan'] = $_POST['bulan'];
		$data['tahun']    = date('Y');
		$data['getBulan'] = $data['tahun'] . '-' . $data['bulan'];
		$tgl = date('Y-m', strtotime(date($data['getBulan'])));
		$data['in'] = "C/In";
		$data['out'] = "C/Out";
		$data["judul"] = "DAFTAR LAPORAN ABSENSI";

		$data['count'] = $this->Absensi_model->count_cv($param, $tgl);
		$data['join'] = $this->Absensi_model->join_cv($param, $tgl);
		// $data['query'] = $this->Karyawan_model->per_instansi($param);

		// $html = $this->load->view('test_html',$data, TRUE);
		$html =	$this->load->view('pages/laporan/lap_instansi', $data, true);

		$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
		$mpdf->AddPage('L');
		$mpdf->SetTitle('Laporan Absensi');
		$mpdf->WriteHTML($html);
		$mpdf->output();
		// echo json_encode($data);
	}
	public function daftar_pegawai_instansi()
	{
		$param = $_POST['instansi'];
		$getNama = $this->Outsorsing_model->getone($_POST['instansi']);
		$data['instansi'] = $getNama['nama'];

		$data["judul"] = "DAFTAR LAPORAN KARYAWAN OUTSORSING";
		$data['namalengkap'] = 'Nama Lengkap';
		$data['ttl']				 = 'Tempat, Tgl Lahir';
		$data['nik']				 = 'NIK';
		$data['nolp'] 			 =	'No Telp';
		$data['alamat']			 = 'Alamat';
		$data['cv']					 = 'Instansi';
		$data['divisi'] 		 = 'Divisi';

		$data['PerInstansi'] = $this->Karyawan_model->perInstansi($param);

		$html = $this->load->view('pages/laporan/lap_karyawan', $data, true);

		$mpdf = new \Mpdf\Mpdf(['format' => 'Legal']);
		$mpdf->AddPage('L');
		$mpdf->SetTitle('Laporan Absensi');
		$mpdf->WriteHTML($html);
		$mpdf->output();
		// echo json_encode($data);
	}
}

/* End of file Laporan.php */
