<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends Admin_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('Login_in') != true) {
			redirect('auther/auth/login', 'refresh');
		}
		$this->load->model('Auth_model');
		$this->load->library('form_validation');

	}

	public function index()
	{
		$data['judul'] = "User";
		$this->load->view('redirect', $data);
	}

	public function list()
	{
		$id = $this->session->userdata('id');

		$data['title'] = "Users";
		$data['judul'] = "Manage Data User";
		$data['create'] = "Tambah User";
		$data['edit'] = "Edit";
		$data['users_auth'] = $this->Auth_model->select_by_id($id);

		$this->load->view('pages/users/list_user', $data);
        // $this->load->view('master/app', $data);

	}
	public function ajax_list()
	{
		$data['data'] = $this->Auth_model->select_all();
		$data['user'] = json_encode($data['data']);

		echo $data['user'];
        // $this->load->view('pages/users/list', $data);

	}
    // function membuat 
	public function create()
	{
		$data['title'] = "Users";
		$data['judul'] = "Manage User";
		$data['create'] = "Tambah User";
		$data['edit'] = "Edit";
		$this->load->view('pages/users/create', $data);
	}
    //function menambahkan 
	public function store()
	{
		$this->_validate();
		$data = array(
			'id' => $_POST['id'],
			'username' => $_POST['username'],
			'password' => md5($_POST['password']),
			'nama' => $_POST['nama'],
			'role' => $_POST['role'],
			'picture' => 'assets/images/user-avatar.png',
			'create_at' => date('Y-m-d H:i:s'),
			'update_at' => null,
		);
		$insert = $this->Auth_model->addUser($data);
		$this->session->set_flashdata('Success', 'Data Berhasil');
		echo json_encode(array("status" => true));

	}
	public function edit($id)
	{
		$dataInput = $this->input->post();
		$data['user'] = $this->Auth_model->getone($id);

		$this->load->view('pages/users/edit', $data);
	}
	public function update()
	{
		$this->_validate_update();
		$data = array(
			'id' => $_POST['id'],
			'username' => $_POST['username'],
			'nama' => $_POST['nama'],
			'role' => $_POST['role'],
			'update_at' => date('Y-m-d H:i:s'),
		);
		$insert = $this->Auth_model->updateUser(array('id' => $_POST['id']), $data);

		echo json_encode(array("status" => true));
	}

	public function delete($id)
	{
		$this->Auth_model->delete($id);
		echo json_encode(array("status" => true));
	}
	private function _validate()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = true;

		if ($this->input->post('username') == '') {
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Username is required';
			$data['status'] = false;
		}

		if ($this->input->post('password') == '') {
			$data['inputerror'][] = 'password';
			$data['error_string'][] = 'password is required';
			$data['status'] = false;
		}

		if ($this->input->post('nama') == '') {
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama is required';
			$data['status'] = false;
		}

		if ($this->input->post('role') == '') {
			$data['inputerror'][] = 'role';
			$data['error_string'][] = 'Please select role';
			$data['status'] = false;
		}

		if ($data['status'] === false) {
			echo json_encode($data);
			exit();
		}
	}
	private function _validate_update()
	{
		$data = array();
		$data['error_string'] = array();
		$data['inputerror'] = array();
		$data['status'] = true;

		if ($this->input->post('username') == '') {
			$data['inputerror'][] = 'username';
			$data['error_string'][] = 'Username is required';
			$data['status'] = false;
		}

		if ($this->input->post('nama') == '') {
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Nama is required';
			$data['status'] = false;
		}

		if ($this->input->post('role') == '') {
			$data['inputerror'][] = 'role';
			$data['error_string'][] = 'Please select role';
			$data['status'] = false;
		}

		if ($data['status'] === false) {
			echo json_encode($data);
			exit();
		}
	}

}

/* End of file User.php */
