<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_dashboard extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_dashboard');
    }
    public function index()
    {
        $this->login->cek_halaman();
        $data = array(
            'judul' => 'Dashboard',
            'barang' => $this->m_dashboard->barang(),
            'pesanan_masuk' => $this->m_dashboard->pesanan_masuk(),
            'perencanaan' => $this->m_dashboard->perencanaan(),
            'user' => $this->m_dashboard->user(),
            'rop' => $this->m_dashboard->status_produk(),
            'belum_bayar' => $this->m_dashboard->pesanan_belum_bayar()
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/aside');
        $this->load->view('admin/vdashboard', $data);
        $this->load->view('admin/footer');
    }
}
