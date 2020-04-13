<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends Admin_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model');


        $this->form_validation->set_error_delimiters($this->config->item('error_start_delimiter', 'ion_auth'), $this->config->item('error_end_delimiter', 'ion_auth'));

        $this->lang->load('auth');
        $this->data['title'] = $this->lang->line('index_heading');

        // $this->load->view('layouts/login_view', $this->data);

    }
    public function index()
    {
        if ($this->session->userdata('Login_in') == true) {
            redirect('/', 'refresh');
        } else if (!$this->ion_auth->logged_in()) {
			// redirect them to the login page
            redirect('auther/auth/login', 'refresh');
            // redirect('auther/Auth');
        } else {
            $this->data['title'] = $this->lang->line('index_heading');
			
			// set the flash data error message if there is one
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->_render_page('auth' . DIRECTORY_SEPARATOR . 'index', $this->data);
        }
    }
    public function login()
    {
        $this->data['title'] = $this->lang->line('login_heading');

        // $this->form_validation->set_rules('username', 'Username', 'required');
        // $this->form_validation->set_rules('password', 'Username', 'required');
        $this->form_validation->set_rules('identity', str_replace(':', '', $this->lang->line('login_identity_label')), 'required');
        $this->form_validation->set_rules('password', str_replace(':', '', $this->lang->line('login_password_label')), 'required');

        if ($this->form_validation->run() == true) {
            $data = array(
                'username' => $this->input->post('identity'),
                'password' => md5($this->input->post('password'))
            );
            $cek_login = $this->Auth_model->login($data);
            if ($cek_login) {
                $sesi = $this->Auth_model->login($data);

                $this->session->set_flashdata('message', $this->ion_auth->messages());
                // $this->session->set_userdata('Login_in', true);

                $sesi_data = array(
                    'Login_in' => true,
                    'id' => $sesi->id,
                    'username' => $sesi->username,
                    'nama' => $sesi->nama,
                    'role' => $sesi->role,
                    'picture' => $sesi->picture
                );

                $this->session->set_userdata($sesi_data);

                redirect('/', 'refresh');
            } else {
                $this->session->set_flashdata('message', $this->ion_auth->errors());
                redirect('auther/auth/login', 'refresh');
            }
        } else {
            $this->data['message'] = (validation_errors()) ? validation_errors() : $this->session->flashdata('message');

            $this->data['identity'] = [
                'name' => 'identity',
                'id' => 'identity',
                'type' => 'text',
                'value' => $this->form_validation->set_value('identity'),
            ];

            $this->data['password'] = [
                'name' => 'password',
                'id' => 'password',
                'type' => 'password',
            ];

            $this->_render_page('layouts' . DIRECTORY_SEPARATOR . 'login_view', $this->data);
        }


    }
    public function logout()
    {
        $this->data['title'] = "Logout";

		// log the user out
        $this->session->sess_destroy();

		// redirect them to the login page
        // echo $this->session->set_flashdata('message', 'Logout Berhasil');
        $this->session->set_flashdata('message', $this->ion_auth->messages());

        redirect('auther/auth/login', 'refresh');
    }

    public function _render_page($view, $data = null, $returnhtml = false)//I think this makes more sense
    {

        $viewdata = (empty($data)) ? $this->data : $data;

        $view_html = $this->load->view($view, $viewdata, $returnhtml);

		// This will return html on 3rd argument being true
        if ($returnhtml) {
            return $view_html;
        }
    }
}

/* End of file Auth.php */
