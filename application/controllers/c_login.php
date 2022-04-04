<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_login');
    }
    public function index()
    {
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi!!!'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->load->view('vlogin');
        } else {
            $username = $this->input->post('username');
            $password = $this->input->post('password');
            $this->login->login($username, $password);
        }
    }
    public function logout()
    {
        $this->login->logout();
    }
}
