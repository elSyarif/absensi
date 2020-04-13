<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends Admin_Controller
{
    private $filename = "import_data";

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Login_in') != true) {
            redirect('auther/auth/login', 'refresh');
        }
        $this->load->model('Auth_model');
        $this->load->model('Absensi_model');

    }

    public function index()
    {
        $id = $this->session->userdata('id');
        $data['title'] = "Absensi";
        $data['users_auth'] = $this->Auth_model->select_by_id($id);
        $data['Absensi'] = $this->Absensi_model->select_all();

        $this->load->view('pages/absensi/index', $data);
    }

    public function dataTable()
    {
        $data['data'] = $this->Absensi_model->select_all();
        $data['row'] = json_encode($data['data']);

        echo $data['row'];
    }
    public function form()
    {

        $data = array();

        if (isset($_POST['preview'])) {

            $upload = $this->Absensi_model->upload_file($this->filename);

            if ($upload['result'] == "success") { // Jika proses upload sukses
				// Load plugin PHPExcel nya
                include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

                $excelreader = new PHPExcel_Reader_Excel2007();
                $loadexcel = $excelreader->load('excel/absensi/' . $this->filename . '.xlsx'); // Load file yang tadi diupload ke folder excel
                $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);
				
				// Masukan variabel $sheet ke dalam array data yang nantinya akan di kirim ke file form.php
				// Variabel $sheet tersebut berisi data-data yang sudah diinput di dalam excel yang sudha di upload sebelumnya
                $data['sheet'] = $sheet;
            } else { // Jika proses upload gagal
                $data['upload_error'] = $upload['error']; // Ambil pesan error uploadnya untuk dikirim ke file form dan ditampilkan
            }
        }
        $id = $this->session->userdata('id');
        $data['title'] = "Absensi";
        $data['users_auth'] = $this->Auth_model->select_by_id($id);
        $this->load->view('pages/absensi/form', $data);
    }
    public function import()
    {
        include APPPATH . 'third_party/PHPExcel/PHPExcel.php';

        $excelreader = new PHPExcel_Reader_Excel2007();
        $loadexcel = $excelreader->load('excel/absensi/' . $this->filename . '.xlsx');

        $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true, true);

        $data = array();

        $numrow = 1;
        foreach ($sheet as $row) {
            if ($numrow > 1) {
                array_push($data, array(
                    'no_akun' => $row['A'],
                    'nip' => $row['B'],
                    'nama' => $row['C'],
                    'waktu' => date('Y-m-d H:i:s', strtotime($row['D'])),
                    'kondisi' => $row['E'],
                    'kondisi_baru' => $row['F'],
                    'status' => $row['G'],
                    'operasi' => $row['H'],
                ));
            }
            $numrow++;
        }
        $this->Absensi_model->insert_multiple($data);
        redirect('Karyawan/Absensi', 'refresh');
    }
}

/* End of file Absensi.php */
