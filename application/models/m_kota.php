<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_kota extends CI_Model
{
    public function getData()
    {
        return $this->db->query("SELECT * FROM tbl_kota LEFT JOIN tbl_provinsi ON tbl_kota.id_provinsi = tbl_provinsi.id_provinsi ORDER BY nama_kota ASC")->result();
    }

    public function insertData($data)
    {
        $this->db->insert('tbl_kota', $data);
    }

    public function getDataById($id)
    {
        return $this->db->get_where('tbl_kota', ['id_kota' => $id])->result();
    }

    public function updateData($id, $data)
    {
        $this->db->where($id);
        $this->db->update('tbl_kota', $data);
    }

    public function deleteData($id)
    {
        $this->db->where($id);
        $this->db->delete('tbl_kota');
    }
}
