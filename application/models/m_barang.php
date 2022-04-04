<?php
class m_barang extends CI_Model
{
    //barang keluar
    public function barang()
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'left');
        $this->db->where('barang_masuk.stok!=0');
        return $this->db->get()->result();
    }
    public function insert_keluar($data)
    {
        $this->db->insert('barang_keluar', $data);
    }
    public function barang_keluar()
    {
        $this->db->select('*');
        $this->db->from('barang_keluar');
        $this->db->join('barang_masuk', 'barang_keluar.id_barang_masuk = barang_masuk.id_barang_masuk', 'left');
        $this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang', 'left');
        return $this->db->get()->result();
    }

    //barang masuk
    public function barang_masuk()
    {
        $this->db->select('*');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang_masuk.id_barang = barang.id_barang', 'left');
        return $this->db->get()->result();
    }


    //pesan barang
    public function pesan_barang()
    {
        $id = '0';
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('supplier', 'barang.id_supplier = supplier.id_supplier', 'left');
        $this->db->where('barang.harga!=', $id);

        return $this->db->get()->result();
    }
    public function pemesanan()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->order_by('tgl_pesan', 'desc');

        return $this->db->get()->result();
    }
    public function detail_pemesanan($id_pemesanan)
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->join('detail_order', 'pemesanan.id_pemesanan = detail_order.id_pemesanan', 'left');
        $this->db->join('barang', 'detail_order.id_barang = barang.id_barang', 'left');
        $this->db->where('pemesanan.id_pemesanan', $id_pemesanan);
        return $this->db->get()->result();
    }
}
