<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_jenis extends CI_Model
{
    public function getData()
    {
        $this->db->order_by('nama_jenis', 'asc');
        return $this->db->get('tbl_jenis')->result();
    }

    public function getDataById($id)
    {
        return $this->db->get_where('tbl_jenis', ['id_jenis' => $id])->result();
    }

    public function insertData($data)
    {
        $this->db->insert('tbl_jenis', $data);
    }

    public function updateData($id, $data)
    {
        $this->db->where($id);
        $this->db->update('tbl_jenis', $data);
    }

    public function deleteData($id)
    {
        $this->db->where($id);
        $this->db->delete('tbl_jenis');
    }
}
