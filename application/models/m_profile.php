<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_profile extends CI_Model
{
    public function getDataById($id)
    {
        return $this->db->query("SELECT * FROM tbl_user LEFT JOIN tbl_kota ON tbl_user.kota = tbl_kota.id_kota LEFT JOIN tbl_negara ON tbl_user.negara = tbl_negara.id_negara WHERE id_user = '$id'")->result();
    }

    public function updateData($id, $data)
    {
        $this->db->where($id);
        $this->db->update('tbl_user', $data);
    }
}
