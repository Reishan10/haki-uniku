<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_provinsi extends CI_Model
{
    public function getData()
    {
        $this->db->order_by('nama_provinsi', 'asc');
        return $this->db->get('tbl_provinsi')->result();
    }

    public function getDataById($id)
    {
        return $this->db->get_where('tbl_provinsi', ['id_provinsi' => $id])->result();
    }

    public function insertData($data)
    {
        $this->db->insert('tbl_provinsi', $data);
    }

    public function updateData($id, $data)
    {
        $this->db->where($id);
        $this->db->update('tbl_provinsi', $data);
    }

    public function deleteData($id)
    {
        $this->db->where($id);
        $this->db->delete('tbl_provinsi');
    }
}
