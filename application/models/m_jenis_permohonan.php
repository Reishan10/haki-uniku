<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_jenis_permohonan extends CI_Model
{
    public function getData()
    {
        $this->db->order_by('nama_jenis_permohonan', 'asc');
        return $this->db->get('tbl_jenis_permohonan')->result();
    }

    public function getDataById($id)
    {
        return $this->db->get_where('tbl_jenis_permohonan', ['id_jenis_permohonan' => $id])->result();
    }

    public function insertData($data)
    {
        $this->db->insert('tbl_jenis_permohonan', $data);
    }

    public function updateData($id, $data)
    {
        $this->db->where($id);
        $this->db->update('tbl_jenis_permohonan', $data);
    }

    public function deleteData($id)
    {
        $this->db->where($id);
        $this->db->delete('tbl_jenis_permohonan');
    }
}
