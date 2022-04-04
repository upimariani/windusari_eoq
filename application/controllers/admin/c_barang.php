<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_barang extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
    }
    //kelola data barang masuk
    public function barang_masuk()
    {
        $this->login->cek_halaman();
        $data = array(
            'judul' => 'Kelola Data Barang Masuk',
            'barang_masuk' => $this->m_barang->barang_masuk()
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/aside');
        $this->load->view('admin/vbarang_masuk', $data);
        $this->load->view('admin/footer');
    }


    //kelola data barang keluar
    public function barang_keluar()
    {
        $this->login->cek_halaman();
        $data = array(
            'judul' => 'Kelola Data Barang Masuk',
            'barang' => $this->m_barang->barang(),
            'barang_keluar' => $this->m_barang->barang_keluar()
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/aside');
        $this->load->view('admin/vbarang_keluar', $data);
        $this->load->view('admin/footer');
    }
    public function insert_keluar()
    {
        //operasi pengurangan stok barang masuk
        $stok_sebelumnya = $this->input->post('stok_sebelumnya');
        $stok_dipakai = $this->input->post('jml');
        $total = 0;
        $total = $stok_sebelumnya - $stok_dipakai;
        $data = array(
            'id_barang_masuk' => $this->input->post('barang'),
            'tgl_produksi' => $this->input->post('date'),
            'jumlah' => $this->input->post('jml')
        );
        $this->m_barang->insert_keluar($data);

        $data_kurang = array(
            'id_barang_masuk' => $this->input->post('barang'),
            'stok' => $total
        );
        $this->db->where('id_barang_masuk', $data['id_barang_masuk']);
        $this->db->update('barang_masuk', $data_kurang);


        $this->session->set_flashdata('pesan', 'Data Barang Keluar Berhasil Disimpan!!!');
        redirect('admin/c_barang/barang_keluar');
    }
}
