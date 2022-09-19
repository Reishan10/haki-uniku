<?php
defined('BASEPATH') or exit('No direct script access allowed');

class M_permohonan extends CI_Model
{
    public function select($permohonan_id = '', $permohonan_jenis = '', $permohonan_subjenis = '', $user_id = '', $prodi = '', $status = '', $year = '')
    {
        if ($permohonan_id != ''){
            $this->db->where('permohonan_id', $permohonan_id);
        }
        if ($permohonan_jenis != ''){
            $this->db->where('permohonan_jenis', $permohonan_jenis);
        }
        if ($permohonan_subjenis != ''){
            $this->db->where('permohonan_subjenis', $permohonan_subjenis);
        }
        if ($user_id != ''){
            $this->db->where('user_id', $user_id);
        }
        if ($prodi != ''){
            $this->db->where('tbl_user.prodi', $prodi);
        }
        if ($status != ''){
            $this->db->where('tbl_permohonan.permohonan_status', $status);
        }
        if ($year != ''){
            $this->db->where('year(tbl_permohonan.permohonan_tanggal)', $year);
        }
                    $this->db->select('*');
                    $this->db->from('tbl_permohonan');
                    $this->db->join('tbl_jenis_permohonan', 'tbl_jenis_permohonan.id_jenis_permohonan = tbl_permohonan.permohonan_jenis');
                    $this->db->join('tbl_subjenis', 'tbl_subjenis.id_subjenis = tbl_permohonan.permohonan_subjenis');
                    $this->db->join('tbl_user', 'tbl_user.id_user = tbl_permohonan.user_id');
                    $this->db->join('tbl_prodi', 'tbl_prodi.prodi_nama = tbl_user.prodi');
                    $this->db->order_by('permohonan_tanggal', 'DESC');
        $result =   $this->db->get();
        return $result;
    }

    public function selectPemohon($pemohon_id = '', $permohonan_id = '')
    {
        if ($pemohon_id != ''){
            $this->db->where('pemohon_id', $pemohon_id);
        }
        if ($permohonan_id != ''){
            $this->db->where('permohonan_id', $permohonan_id);
        }
                    $this->db->select('*');
                    $this->db->from('tbl_permohonan_pemohon');
        $result =   $this->db->get();
        return $result;
    }

    public function selectLampiran($lampiran_id = '', $permohonan_id = '')
    {
        if ($lampiran_id != ''){
            $this->db->where('lampiran_id', $lampiran_id);
        }
        if ($permohonan_id != ''){
            $this->db->where('permohonan_id', $permohonan_id);
        }
                    $this->db->select('*');
                    $this->db->from('tbl_permohonan_lampiran');
        $result =   $this->db->get();
        return $result;
    }

    public function getJenisPermohonan()
    {
        $this->db->order_by('nama_jenis_permohonan', 'asc');
        return $this->db->get('tbl_jenis_permohonan')->result();
    }

    public function getJenisCiptaan()
    {
        $this->db->order_by('nama_jenis', 'asc');
        return $this->db->get('tbl_jenis')->result();
    }

    public function getSubjenisCiptaan()
    {
        $this->db->order_by('nama_subjenis', 'asc');
        return $this->db->get('tbl_subjenis')->result();
    }

    public function getProvinsi()
    {
        $this->db->order_by('nama_provinsi', 'asc');
        return $this->db->get('tbl_provinsi')->result();
    }

    public function getNegara()
    {
        $this->db->order_by('nama_negara', 'asc');
        return $this->db->get('tbl_negara')->result();
    }

    public function getKota()
    {
        $this->db->order_by('nama_kota', 'asc');
        return $this->db->get('tbl_kota')->result();
    }

    public function save($data = null)
    {
        $arr = array(
            'permohonan_jenis'      => $data['jenis_permohonan'],
            'permohonan_subjenis'   => $data['subjenis_ciptaan'],
            'permohonan_judul'      => $data['judul'],
            'permohonan_uraian'     => $data['uraian'],
            'permohonan_tanggal'    => date('Y-m-d H:i:s'),
            'user_id'               => $this->session->userdata('id_user'),
        );

        $result = $this->db->insert('tbl_permohonan', $arr);
        return $result;
    }

    public function savePemohon($data = null)
    {
        $arr = array(
            'permohonan_id' => $data['permohonan_id'],
            'jenis_pemohon' => $data['jenis_pemohon'],
            'unique_id'     => $data['nidn'],
            'approval_status'=> $data['approval_status'],
        );

        $result = $this->db->insert('tbl_permohonan_pemohon', $arr);
        return $result;
    }

    public function saveLampiran($data = null)
    {
        $arr = array(
            'permohonan_id'         => $data['permohonan_id'],
            'contoh_ciptaan'        => @$data['contoh_ciptaan'],
            'contoh_ciptaan_url'    => $data['contoh_ciptaan_url'],
            'template_surat_pernyataan'=> @$data['template_surat_pernyataan'],
            'surat_pernyataan'      => @$data['surat_pernyataan'],
        );

        $result = $this->db->insert('tbl_permohonan_lampiran', $arr);
        return $result;
    }
    
    public function adminUpdateHaki($data = null)
    {
        $arr = array(
            'file_haki'         => @$data['file_haki'],
            'permohonan_status' => '1'
        );

        $result = $this->db->update('tbl_permohonan', $arr, ['permohonan_id' => $data['permohonan_id']]);
        return $result;
    }

    public function adminUpdateLampiran($data = null)
    {
        $arr = array(
            'template_surat_pernyataan'=> @$data['template_surat_pernyataan'],
            'surat_pernyataan'      => @$data['surat_pernyataan'],
            'surat_pengalihan_hak_cipta'      => @$data['surat_pengalihan_hak_cipta'],
        );

        $result = $this->db->update('tbl_permohonan_lampiran', $arr, ['permohonan_id' => $data['permohonan_id']]);
        return $result;
    }

    public function userUpdateLampiran($data = null)
    {
        $arr = array(
            'contoh_ciptaan'=> @$data['contoh_ciptaan'],
        );

        $result = $this->db->update('tbl_permohonan_lampiran', $arr, ['permohonan_id' => $data['permohonan_id']]);
        return $result;
    }

    public function delete($id = ''){
        $result = $this->db->delete('tbl_permohonan', ['permohonan_id' => $id]);
        return $result;
    }
}
