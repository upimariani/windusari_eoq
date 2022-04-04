<?php

defined('BASEPATH') or exit('No direct script access allowed');

class login
{
    protected $ci;
    public function __construct()
    {
        $this->ci = &get_instance();
        $this->ci->load->model('m_login');
    }
    public function login($username, $password)
    {
        $cek = $this->ci->m_login->login($username, $password);
        if ($cek) {
            $level_user = $cek->level_user;
            $username = $cek->username;
            //session
            $this->ci->session->set_userdata('level_user', $level_user);
            if ($level_user == '1') {
                redirect('admin/c_dashboard');
            } else if ($level_user == '2') {
                redirect('supplier/c_pemesanansupplier/pemesanan_masuk');
            }
        } else {
            //jika salah
            $this->ci->session->set_flashdata('error', 'Username Atau Password Salah');
            redirect('c_login');
        }
    }
    public function cek_halaman()
    {
        if ($this->ci->session->userdata('level_user') == '') {
            $this->ci->session->set_flashdata('error', 'Anda Belum login');

            redirect('c_login', 'refresh');
        }
    }
    public function logout()
    {
        $this->ci->session->unset_userdata('level_user');
        $this->ci->session->unset_userdata('username');
        $this->ci->session->set_flashdata('pesan', 'Anda Berhasil Logout!!');
        redirect('c_login');
    }
}

/* End of file user_login.php */
