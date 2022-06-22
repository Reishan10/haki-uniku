<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_allAuthor extends CI_Model
{
    public function getData()
    {
        return $this->db->get('tbl_user')->result();
    }

    public function getDataById($id)
    {
        // return $this->db->get_where('tbl_user', ['id_user' => $id])->result();
        return $this->db->query("SELECT * FROM tbl_user LEFT JOIN tbl_kota ON tbl_user.kota = tbl_kota.id WHERE id_user = '$id'")->result();
    }

    public function insertData($data)
    {
        $this->db->insert('tbl_user', $data);
    }

    public function updateData($id, $data)
    {
        $this->db->where($id);
        $this->db->update('tbl_user', $data);
    }

    public function deleteData($id)
    {
        $this->db->where($id);
        $this->db->delete('tbl_user');
    }
}
