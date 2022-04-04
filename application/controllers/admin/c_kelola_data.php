<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_kelola_data extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kelola_data');
    }
    //--------------------DATA BARANG---------------------------
    public function barang()
    {
        $this->login->cek_halaman();
        $data = array(
            'judul' => 'Kelola Data Barang',
            'barang' => $this->m_kelola_data->select_barang(),
            'supplier' => $this->m_kelola_data->select_supplier()
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/aside');
        $this->load->view('admin/vbarang', $data);
        $this->load->view('admin/footer');
    }
    public function insert_barang()
    {
        $data = array(
            'id_barang' => $this->input->post('id_produk'),
            'id_supplier' => $this->input->post('supplier'),
            'nama_barang' => $this->input->post('nama'),
            'merek_barang' => $this->input->post('merek'),
            'keterangan' => $this->input->post('keterangan'),
            'harga' => '0'
        );
        $this->m_kelola_data->insert_barang($data);

        $perencanaan= array(
            'id_barang' => $this->input->post('id_produk'),
            'tgl_perencanaan' => '0',
            'eoq' => '0',
            'rop' => '0'
        );
        
        $this->db->insert('perencanaan', $perencanaan);
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Disimpan!!!');
        redirect('admin/c_kelola_data/barang');
    }
    public function edit_barang($id_barang)
    {
        //perhitungan au (rata-rata)
        $au = 0;
        $d = $this->input->post('d');
        $au = $d / 320;

        $data = array(
            'id_supplier' => $this->input->post('supplier'),
            'nama_barang' => $this->input->post('nama'),
            'merek_barang' => $this->input->post('merek'),
            'keterangan' => $this->input->post('keterangan')
        );
        $this->db->where('id_barang', $id_barang);
        $this->db->update('barang', $data);
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Diperbaharui!!!');
        redirect('admin/c_kelola_data/barang');
    }
    public function hapus_barang($id_barang)
    {
        $this->db->where('id_barang', $id_barang);
        $this->db->delete('barang');
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Dihapus!!!');
        redirect('admin/c_kelola_data/barang');
    }


    //--------------------DATA ADMIN---------------------------
    public function admin()
    {
        $this->form_validation->set_rules('nama', 'Nama User', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('username', 'Username', 'required', array(
            'required' => '%s Harus Diisi'
        ));
        $this->form_validation->set_rules('password', 'Password', 'required', array(
            'required' => '%s Harus Diisi'
        ));

        if ($this->form_validation->run() == FALSE) {
            $this->login->cek_halaman();
            $data = array(
                'judul' => 'Kelola Data User',
                'admin' => $this->m_kelola_data->select()
            );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/nav');
            $this->load->view('admin/aside');
            $this->load->view('admin/vadmin', $data);
            $this->load->view('admin/footer');
        } else {
            $data = array(
                'nama_user' => $this->input->post('nama'),
                'username' => $this->input->post('username'),
                'password' => $this->input->post('password'),
                'level_user' => $this->input->post('level_user')
            );
            $this->m_kelola_data->insert($data);
            $this->session->set_flashdata('pesan', 'Data Admin Berhasil Disimpan!!!');
            redirect('admin/c_kelola_data/admin');
        }
    }
    public function edit_admin($id_user)
    {
        $data = array(
            'nama_user' => $this->input->post('nama'),
            'username' => $this->input->post('username'),
            'password' => $this->input->post('password'),
            'level_user' => $this->input->post('level_user')
        );
        $this->db->where('id_user', $id_user);
        $this->db->update('user', $data);
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Diperbaharui!!!');
        redirect('admin/c_kelola_data/admin');
    }
    public function hapus_admin($id_user)
    {
        $this->db->where('id_user', $id_user);
        $this->db->delete('user');
        $this->session->set_flashdata('pesan', 'Data Admin Berhasil Dihapus!!!');
        redirect('admin/c_kelola_data/admin');
    }


    //--------------------DATA SUPPLIER---------------------------
    public function supplier()
    {
        $this->login->cek_halaman();
        $data = array(
            'judul' => 'Kelola Data Supplier',
            'supplier' => $this->m_kelola_data->select_supplier()
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/aside');
        $this->load->view('admin/vsupplier', $data);
        $this->load->view('admin/footer');
    }
    public function insert_supplier()
    {
        $data = array(
            'nama_supplier' => $this->input->post('nama'),
            'nama_toko' => $this->input->post('toko'),
            'jenis_toko' => $this->input->post('jenis'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_tlp')
        );
        $this->m_kelola_data->insert_supplier($data);
        $this->session->set_flashdata('pesan', 'Data Supplier Berhasil Ditambahkan!!!');
        redirect('admin/c_kelola_data/supplier');
    }
    public function edit_supplier($id_supplier)
    {
        $data = array(
            'nama_supplier' => $this->input->post('nama'),
            'nama_toko' => $this->input->post('toko'),
            'jenis_toko' => $this->input->post('jenis'),
            'alamat' => $this->input->post('alamat'),
            'no_telp' => $this->input->post('no_tlp')
        );
        $this->db->where('id_supplier', $id_supplier);
        $this->db->update('supplier', $data);
        $this->session->set_flashdata('pesan', 'Data Supplier Berhasil Diperbaharui!!!');
        redirect('admin/c_kelola_data/supplier');
    }
    public function hapus_supplier($id_supplier)
    {
        $this->db->where('id_supplier', $id_supplier);
        $this->db->delete('supplier');
        $this->session->set_flashdata('pesan', 'Data Supplier Berhasil Dihapus!!!');
        redirect('admin/c_kelola_data/supplier');
    }
}
