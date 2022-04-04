<?php
class m_supplier extends CI_Model
{
    public function pesanan_masuk()
    {
        if ($this->session->userdata('username') == 'supplier') {
            $supplier = '5';
        } else {
            $supplier = '6';
        }
        $data = $this->db->query("SELECT * FROM pemesanan JOIN detail_order ON pemesanan.id_pemesanan = detail_order.id_pemesanan JOIN barang ON barang.id_barang = detail_order.id_barang JOIN supplier ON barang.id_supplier = supplier.id_supplier WHERE supplier.id_supplier='" . $supplier . "'  ORDER BY tgl_pesan DESC")->result();
        return $data;
    }
    public function detail_order($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('detail_order', 'pemesanan.id_pemesanan = detail_order.id_pemesanan', 'left');
        $this->db->join('barang', 'barang.id_barang = detail_order.id_barang', 'left');
        $this->db->where('pemesanan.id_pemesanan', $id_pemesanan);
        return $this->db->get()->result();
    }
    public function barang()
    {
        $harga = '0';
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->where('harga!=', $harga);
        return $this->db->get()->result();
    }
    public function all_barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        return $this->db->get()->result();
    }
}
