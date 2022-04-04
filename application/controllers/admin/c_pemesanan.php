<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_pemesanan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_barang');
        $this->load->model('m_perencanaan');
    }
    public function index()
    {
        $this->login->cek_halaman();
        $data = array(
            'judul' => 'Pemesanan Barang',
            'barang' => $this->m_barang->pesan_barang(),
            'pesanan' => $this->m_barang->pemesanan()
        );
        $this->load->view('admin/head', $data);
        $this->load->view('admin/nav');
        $this->load->view('admin/aside');
        $this->load->view('admin/vpemesanan_barang', $data);
        $this->load->view('admin/footer');
    }
    public function pesan()
    {
        $this->login->cek_halaman();
        $data = array(
            'id' => $this->input->post('pesan_barang'),
            'qty' => $this->input->post('jml'),
            'name' => $this->input->post('nama'),
            'netto' => $this->input->post('kg'),
            'price' => $this->input->post('harga')
        );
        $this->cart->insert($data);
        redirect('admin/c_pemesanan');
    }
    public function delete($rowid)
    {
        $this->cart->remove($rowid);
        redirect('admin/c_pemesanan');
    }
    public function checkout()
    {
        $data = array(
            'id_pemesanan' => $this->input->post('id_pemesanan'),
            'tgl_pesan' => date('Y-m-d'),
            'status_order' => '0',
            'status_bayar' => '0',
            'total_bayar' => $this->input->post('total_bayar'),
        );
        $this->db->insert('pemesanan', $data);

        $i = 1;
        foreach ($this->cart->contents() as $item) {
            $data_rinci = array(
                'id_pemesanan' => $this->input->post('id_pemesanan'),
                'id_barang' => $item['id'],
                'qty' => $this->input->post('qty' . $i++)
            );
            $this->db->insert('detail_order', $data_rinci);
        }
        $this->cart->destroy();
        redirect('admin/c_pemesanan', 'refresh');
    }
    public function detail_order($id_pemesanan)
    {
        $data_view['detail'] = $this->m_barang->detail_pemesanan($id_pemesanan);
        header('Content-Type: application/json');
        echo json_encode($data_view);
    }
    public function bayar()
    {
        $config['upload_path']          = './asset/bayar/';
        $config['allowed_types']        = 'gif|jpg|png|jpeg';
        $config['max_size']             = '5000';

        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('bayar')) {
            $data = array(
                'judul' => 'Pemesanan Barang',
                'barang' => $this->m_barang->pesan_barang(),
                'error' => $this->upload->display_errors(),
                'pesanan' => $this->m_barang->pemesanan()
            );
            $this->load->view('admin/head', $data);
            $this->load->view('admin/nav');
            $this->load->view('admin/aside');
            $this->load->view('admin/vpemesanan_barang', $data);
            $this->load->view('admin/footer');
        } else {
            $upload_data =  $this->upload->data();
            $data = array(
                'id_pemesanan' => $this->input->post('id_pemesanan'),
                'status_bayar' => $upload_data['file_name'],
                'status_order' => '1'
            );
            $this->db->where('id_pemesanan', $data['id_pemesanan']);
            $this->db->update('pemesanan', $data);
            $this->session->set_flashdata('pesan', 'Data Berhasil di Simpan!!!');
            redirect('admin/c_pemesanan');
        }
    }
    public function selesai($id_pemesanan)
    {
        $barang = $this->m_barang->detail_pemesanan($id_pemesanan);
        foreach ($barang as $key => $value) {
            $data = array(
                'tgl_masuk' => date('Y-m-d'),
                'id_barang' => $value->id_barang,
                'stok' => $value->qty
            );
            $this->db->insert('barang_masuk', $data);
        }
        $data = array(
            'status_order' => '4'
        );
        $this->db->where('id_pemesanan', $id_pemesanan);
        $this->db->update('pemesanan', $data);

        //perencanaan otomatis
        $perencanaan = $this->m_perencanaan->perencanaan();
        foreach ($perencanaan as $key => $value) {
            //perhitungan au
            $au = $value->jml / 320;
            //perhitungan eoq rumus = akar dari 2sd/h

            $eoq = 0;
            $eoq = (2 * 100000 * $value->jml) / 50000;
            $hasil = sqrt($eoq);
            $hasil_bulat = round($hasil);


            //perhitungan rop rumus = (lt * au) +ss
            $rop = 0;
            $rop = 2 + (1 * $au);
            $hasil_rop = round($rop);

            $data = array(
                'id_barang' => $value->id_barang,
                'tgl_perencanaan' => date('Y-m-d'),
                'eoq' => $hasil_bulat,
                'rop' => $hasil_rop
            );
            $this->db->where('id_barang', $value->id_barang);
            $this->db->update('perencanaan', $data);
        }
        $this->session->set_flashdata('pesan', 'Pesanan Diterima!!!');
        redirect('admin/c_pemesanan');
    }
}
