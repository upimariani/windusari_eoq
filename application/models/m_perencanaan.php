<?php
class m_perencanaan extends CI_Model
{
    public function barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('supplier', 'barang.id_supplier = supplier.id_supplier', 'left');
        return $this->db->get()->result();
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('perencanaan');
        $this->db->join('barang', 'perencanaan.id_barang = barang.id_barang', 'left');
        $this->db->join('supplier', 'barang.id_supplier = supplier.id_supplier', 'left');

        return $this->db->get()->result();
    }
    public function perencanaan()
    {
        $tgl1 = date('Y'); // pendefinisian tanggal awal
        $tgl2 = date('Y', strtotime('-3 year', strtotime($tgl1)));
        $data = $this->db->query("SELECT id_barang, tgl_pesan, SUM(IF(YEAR(tgl_pesan) = " . $tgl2 . " , qty, 0)) AS jml FROM pemesanan JOIN detail_order ON pemesanan.id_pemesanan=detail_order.id_pemesanan GROUP BY id_barang")->result();
        return $data;
    }
}
