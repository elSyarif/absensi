<?php

defined('BASEPATH') or exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->add_package_path(APPPATH . 'third_party/ion_auth/');
        $this->load->database();
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->library(['ion_auth', 'form_validation']);
        $this->load->helper('url', 'form', 'session');
        $this->load->helper(['url', 'language']);
    }

}

class Admin_Controller extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();

        $data['title'] = "Absensi";

    }
}

/* End of file MY_Controller.php */
