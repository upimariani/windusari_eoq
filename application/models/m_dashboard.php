<?php
class m_dashboard extends CI_Model
{
    public function barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        return $this->db->get()->num_rows();
    }
    public function pesanan_masuk()
    {
        $order = '4';
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('status_order', $order);
        return $this->db->get()->num_rows();
    }
    public function perencanaan()
    {
        $this->db->select('*');
        $this->db->from('perencanaan');
        return $this->db->get()->num_rows();
    }
    public function user()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->num_rows();
    }

    //alert pemberitahuan barang batas rop
    public function status_produk()
    {
        $this->db->select('sum(stok) as total, barang_masuk.stok, barang.nama_barang, perencanaan.rop');
        $this->db->from('barang_masuk');
        $this->db->join('barang', 'barang.id_barang = barang_masuk.id_barang', 'left');
        $this->db->join('perencanaan', 'perencanaan.id_barang = barang_masuk.id_barang', 'left');
        $this->db->group_by('barang_masuk.id_barang');
        return $this->db->get()->result();
    }
    public function pesanan_belum_bayar()
    {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('status_order=0');
        return $this->db->get()->result();
    }
}
