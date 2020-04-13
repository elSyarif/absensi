<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Dashboard extends Admin_Controller
{

    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Login_in') != true) {
            redirect('auther/auth/login', 'refresh');
        }
        $this->load->model('Auth_model');
                
    }

    public function index()
    {
        $id = $this->session->userdata('id');

        $data['title'] = "Dashboard";
        $data['users_auth'] = $this->Auth_model->select_by_id($id);

        $data['karyawan'] ['tabel'] = 'Karyawan';
        $data['karyawan'] ['count'] = $this->Auth_model->count('karyawans');

        $data['Absensi'] ['tabel'] = 'Absensi';
        $data['Absensi'] ['count'] = $this->Auth_model->count('absensis');

        $data['Outsorsing']['tabel'] = 'Outsorsing';
        $data['Outsorsing']['count'] = $this->Auth_model->count('outsorsings');

        // echo json_encode($data); die();
        $this->load->view('layouts/dashboard_view', $data);
        // $this->load->view('master/app', $data);

    }

}

/* End of file Dashoard.php */
