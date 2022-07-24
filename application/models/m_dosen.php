<?php
defined('BASEPATH') or exit('No direct script access allowed');

class m_dosen extends CI_Model
{
	public function getData()
	{
		return $this->db->query("SELECT * FROM tbl_user WHERE role = 'user' ORDER BY nama_user ASC")->result();
	}

	public function getDataById($id)
	{
		return $this->db->query("SELECT * FROM tbl_user LEFT JOIN tbl_kota ON tbl_user.kota = tbl_kota.id_kota LEFT JOIN tbl_negara ON tbl_user.negara = tbl_negara.id_negara WHERE id_user = '$id'")->result();
	}

	public function save($data)
	{
		$this->db->insert('tbl_user', $data);
	}

	public function updateData($where, $data)
	{
		$this->db->update('tbl_user', $data, $where);
		return $this->db->affected_rows();
	}

	public function deleteData($id)
	{
		$this->db->where('id_user', $id);
		$this->db->delete('tbl_user');
	}
}
