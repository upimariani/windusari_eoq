<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_pemesanansupplier extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_supplier');
    }
    public function pemesanan_masuk()
    {
        $this->login->cek_halaman();
        $data = array(
            'pesanan' => $this->m_supplier->pesanan_masuk()
        );
        $this->load->view('supplier/header');
        $this->load->view('supplier/vpesanan_supplier', $data);
        $this->load->view('supplier/footer');
    }
    public function detail_order($id_pemesanan)
    {
        $data['pemesanan'] =  $this->db->get_where('pemesanan', array('pemesanan.id_pemesanan' => $id_pemesanan))->row();
        $data['detail'] = $this->m_supplier->detail_order($id_pemesanan);
        header('Content-Type: application/json');
        echo json_encode($data);
    }
    public function konfirmasi($id_pemesanan)
    {
        $data = array(
            'status_order' => '2'
        );
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan', $data);
        $this->session->set_flashdata('pesan', 'Pesanan Berhasil Dikonfirmasi');
        redirect('supplier/c_pemesanansupplier/pemesanan_masuk', 'refresh');
    }
    public function kirim($id_pemesanan)
    {
        $data = array(
            'status_order' => '3'
        );
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan', $data);
        $this->session->set_flashdata('pesan', 'Pesanan Akan Dikirim!!!');
        redirect('supplier/c_pemesanansupplier/pemesanan_masuk', 'refresh');
    }


    //harga barang
    public function harga_barang()
    {
        $this->login->cek_halaman();
        $data = array(
            'barang' => $this->m_supplier->barang(),
            'all' => $this->m_supplier->all_barang()
        );
        $this->load->view('supplier/header');
        $this->load->view('supplier/vharga_barang', $data);
        $this->load->view('supplier/footer');
    }
    public function harga()
    {
        $data = array(
            'id_barang' => $this->input->post('barang'),
            'harga' => $this->input->post('harga')
        );
        $this->db->where('id_barang', $data['id_barang']);
        $this->db->update('barang', $data);
        redirect('supplier/c_pemesanansupplier/harga_barang', 'refresh');
    }
}
