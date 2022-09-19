<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_negara extends CI_Model
{
    public function getData()
    {
        $this->db->order_by('nama_negara', 'asc');
        return $this->db->get('tbl_negara')->result();
    }

    public function getDataById($id)
    {
        return $this->db->get_where('tbl_negara', ['id_negara' => $id])->result();
    }

    public function insertData($data)
    {
        $this->db->insert('tbl_negara', $data);
    }

    public function updateData($id, $data)
    {
        $this->db->where($id);
        $this->db->update('tbl_negara', $data);
    }

    public function deleteData($id)
    {
        $this->db->where($id);
        $this->db->delete('tbl_negara');
    }
}
