<?php
class m_kelola_data extends CI_Model
{
    //-----------------DATA ADMIN----------------
    public function insert($data)
    {
        $this->db->insert('user', $data);
    }
    public function select()
    {
        $this->db->select('*');
        $this->db->from('user');
        return $this->db->get()->result();
    }

    //----------------------DATA SUPPLIER-------------------
    public function insert_supplier($data)
    {
        $this->db->insert('supplier', $data);
    }
    public function select_supplier()
    {
        $this->db->select('*');
        $this->db->from('supplier');
        return $this->db->get()->result();
    }


    //--------------------------DATA BARANG----------------
    public function select_barang()
    {
        $this->db->select('*');
        $this->db->from('barang');
        $this->db->join('supplier', 'barang.id_supplier = supplier.id_supplier', 'left');
        return $this->db->get()->result();
    }
    public function insert_barang($data)
    {
        $this->db->insert('barang', $data);
    }
}
