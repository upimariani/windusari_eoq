<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_perencanaan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_perencanaan');
    }
    public function index()
    {
        $this->login->cek_halaman();
        $data = array(
            'judul' => 'Perencanaan',
            'barang' => $this->m_perencanaan->barang(),
            'perencanaan' => $this->m_perencanaan->select()
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/aside');
        $this->load->view('admin/vperencanaan', $data);
        $this->load->view('admin/footer');
     }
    // public function perencanaan()
    // {
    //     $d = $this->input->post('d');
    //     $h = $this->input->post('h');
    //     $lt = $this->input->post('lt');
    //     $au = $this->input->post('au');
    //     $ss = $this->input->post('ss');
    //     $s = $this->input->post('s');

    //     //perhitungan eoq rumus = akar dari 2sd/h
    //     $eoq = 0;
    //     $eoq = (2 * $s * $d) / $h;
    //     $hasil = sqrt($eoq);
    //     $hasil_bulat = round($hasil);


    //     //perhitungan rop rumus = (lt * au) +ss
    //     $rop = 0;
    //     $rop = $ss + ($lt * $au);
    //     $hasil_rop = round($rop);


    //     $data = array(
    //         'id_barang' => $this->input->post('barang'),
    //         'tgl_perencanaan' => date('Y-m-d'),
    //         'eoq' => $hasil_bulat,
    //         'rop' => $hasil_rop
    //     );
    //     $this->db->insert('perencanaan', $data);
    //     $this->session->set_flashdata('pesan', 'Data Perencanaan Berhasil Ditambahkan!!!');
    //     redirect('admin/c_perencanaan');
    // }
    // public function hapus($id_perencanaan)
    // {
    //     $this->db->where('id_perencanaan', $id_perencanaan);
    //     $this->db->delete('perencanaan');
    //     $this->session->set_flashdata('pesan', 'Data Perencanaan Berhasil Dihapus!!!');
    //     redirect('admin/c_perencanaan');
    // }
}
