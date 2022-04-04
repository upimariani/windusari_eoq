<?php
defined('BASEPATH') or exit('No direct script access allowed');
class c_laporan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('m_kelola_data');
        $this->load->model('m_barang');
        $this->load->model('m_perencanaan');
        $this->load->library('pdf');
    }
    function barang()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN DAFTAR BARANG', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(60, 6, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Merek Barang', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Keterangan', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $barang = $this->m_kelola_data->select_barang();
        foreach ($barang as $row) {
            $pdf->Cell(60, 6, $row->nama_barang, 1, 0);
            $pdf->Cell(50, 6, $row->merek_barang, 1, 0);
            $pdf->Cell(50, 6,  $row->keterangan, 1, 1);
        }
        $pdf->Output();
    }
    function barang_masuk()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN DAFTAR BARANG MASUK', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 6, 'Nama Barang', 1, 0, 'C');
        $pdf->Cell(50, 6, 'Merek Barang', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Tgl Masuk', 1, 0, 'C');
        $pdf->Cell(30, 6, 'Stok', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $barang_masuk = $this->m_barang->barang_masuk();
        foreach ($barang_masuk as $row) {
            $pdf->Cell(50, 6, $row->nama_barang, 1, 0);
            $pdf->Cell(50, 6, $row->merek_barang, 1, 0);
            $pdf->Cell(30, 6,  $row->tgl_masuk, 1, 0);
            $pdf->Cell(30, 6,  $row->stok, 1, 1);
        }
        $pdf->Output();
    }
    function barang_keluar()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN DAFTAR TEMPAT COFFE KOLAM KITA', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 6, 'NO KURSI', 1, 0, 'C');
        $pdf->Cell(100, 6, 'NAMA KURSI', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $tempat = $this->m_tempat->select_tempat();
        foreach ($tempat as $row) {
            $pdf->Cell(50, 6, $row->no_kursi, 1, 0, 'C');
            $pdf->Cell(100, 6,  $row->nama_kursi, 1, 1, 'C');
        }
        $pdf->Output();
    }
    function transaksi()
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 16);
        // mencetak string 
        $pdf->Cell(190, 7, 'LAPORAN TRANSAKSI COFFE KOLAM KITA', 0, 1, 'C');
        // Memberikan space kebawah agar tidak terlalu rapat
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $pdf->Cell(50, 6, 'ID TRANSAKSI', 1, 0, 'C');
        $pdf->Cell(50, 6, 'ATAS NAMA', 1, 0, 'C');
        $pdf->Cell(50, 6, 'TGL PESAN', 1, 0, 'C');
        $pdf->Cell(30, 6, 'TOTAL BAYAR', 1, 1, 'C');
        $pdf->SetFont('Arial', '', 10);
        $transaksi = $this->m_order->select_transaksi();
        foreach ($transaksi as $row) {
            $pdf->Cell(50, 6, $row->id_transaksi, 1, 0, 'C');
            $pdf->Cell(50, 6,  $row->atas_nama, 1, 0, 'C');
            $pdf->Cell(50, 6,  $row->tgl_pesan, 1, 0, 'C');
            $pdf->Cell(30, 6,  'Rp. ' . number_format($row->total_bayar, 0), 1, 1, 'C');
        }
        $pdf->Output();
    }
    function struk_pembelian($id_transaksi)
    {
        $pdf = new FPDF('p', 'mm', 'A4');
        // membuat halaman baru
        $pdf->AddPage();
        // setting jenis font yang akan digunakan
        $pdf->SetFont('Arial', 'B', 20);
        // mencetak string 
        $pdf->Cell(190, 7, 'KOLAM KITA', 0, 1, 'C');
        $pdf->SetFont('Arial', '', 12);
        $pdf->Cell(190, 7, 'Kolam Kita, Jl. Pejambon, Cisantana, Kec.Cigugur', 0, 1, 'C');
        $pdf->Cell(190, 7, '-----------------------------------------------------------------------------------------------------------------------------------------------', 0, 1, 'C');
        $pdf->Cell(10, 7, '', 0, 1);
        $pdf->SetFont('Arial', '', 10);
        $transaksi = $this->m_order->detail_transaksi($id_transaksi);
        foreach ($transaksi as $value) {
            $pdf->Cell(40, 7, 'Id Transaksi', 0, 0, 'L');
            $pdf->Cell(50, 7, $value->id_transaksi, 0, 1, 'L');
            $pdf->Cell(40, 7, 'Date/Time', 0, 0, 'L');
            $pdf->Cell(50, 7, $value->time, 0, 1, 'L');
        }

        $pdf->Cell(10, 7, '', 0, 1);

        $detail = $this->m_order->detail_pemesanan($id_transaksi);
        foreach ($detail as $value) {
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(190, 7, $value->nama_produk, 0, 1, 'L');
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(50, 7, number_format($value->qty, 0), 0, 0, 'L');
            $pdf->Cell(50, 7, 'X', 0, 0, 'L');
            $pdf->Cell(50, 7, 'Rp. ' . number_format($value->harga, 0), 0, 0, 'L');
            $pdf->Cell(50, 7, 'Rp. ' . number_format($value->qty * $value->harga, 0), 0, 1, 'L');
        }

        $pdf->Cell(20, 7, '', 0, 1);
        $pdf->SetFont('Arial', 'B', 10);
        $tot = $this->m_order->detail_transaksi($id_transaksi);
        foreach ($tot as $value) {
            $pdf->Cell(150, 7, 'TOTAL : ', 0, 0, 'R');
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(30, 7, 'Rp. ' . number_format($value->total_bayar, 0), 0, 1, 'R');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(150, 7, 'BAYAR : ', 0, 0, 'R');
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(30, 7, 'Rp. ' . number_format($value->bayar, 0), 0, 1, 'R');
            $pdf->SetFont('Arial', 'B', 10);
            $pdf->Cell(150, 7, 'KEMBALI : ', 0, 0, 'R');
            $pdf->SetFont('Arial', '', 10);
            $pdf->Cell(30, 7, 'Rp. ' . number_format($value->kembali), 0, 1, 'R');
        }
        $pdf->Output();
    }
}
