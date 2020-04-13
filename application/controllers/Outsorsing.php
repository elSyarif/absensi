<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Outsorsing extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('Login_in') != true) {
            redirect('auther/auth/login', 'refresh');
        }
        $this->load->model('Auth_model');
        $this->load->model('Outsorsing_model', 'm');
    }

    public function index()
    {
        $data['judul'] = "Outsorsing";
		$this->load->view('redirect', $data);
    }
    public function list()
    {
        $id = $this->session->userdata('id');
        $data['title'] = "Outsorsing";
        $data['judul'] = "Manage Data Outsorsing";
        $data['create'] = "Tambah Outsorsing";
        $data['edit'] = "Edit";
        $data['users_auth'] = $this->Auth_model->select_by_id($id);

        $this->load->view('pages/outsorsing/list_outsorsing', $data);
        // $this->load->view('master/app', $data);
    }
    public function dataTable()
    {
        $data['data'] = $this->m->select_all();
        $data['row'] = json_encode($data['data']);

        echo $data['row'];
    }
    public function create()
    {
        $data['title'] = "Create Outsorsing";
        $data['judul'] = "Manage Data Outsorsing";
        $data['create'] = "Tambah Outsorsing";
        $data['edit'] = "Edit";
        $this->load->view('pages/outsorsing/create', $data);

    }

    public function store()
    {
        $this->_validate();
		$data = array(
			'id' => $_POST['id'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'no_telp' => $_POST['no_telp'],
			'create_at' => date('Y-m-d H:i:s'),
			'update_at' => null,
		);
		$insert = $this->m->add($data);

		echo json_encode(array("status" => true));
    }

    public function edit($id)
    {
        $dataInput = $this->input->post();
        $data['row'] = $this->m->getone($id);

        $this->load->view('pages/outsorsing/edit', $data);
    }

    public function update()
    {
        $this->_validate();
		$data = array(
			'id' => $_POST['id'],
			'nama' => $_POST['nama'],
			'alamat' => $_POST['alamat'],
			'no_telp' => $_POST['no_telp'],
			'update_at' => date('Y-m-d H:i:s'),
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

		if ($this->input->post('nama') == '') {
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama Instansi is required';
			$data['status'] = false;
		}

		if ($this->input->post('alamat') == '') {
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'Alamat is required';
			$data['status'] = false;
		}

		if ($this->input->post('no_telp') == '') {
			$data['inputerror'][] = 'no_telp';
			$data['error_string'][] = 'No Telepon is required';
			$data['status'] = false;
		}

		if ($data['status'] === false) {
			echo json_encode($data);
			exit();
		}
	}
}

/* End of file Outsorsing.php */
