<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        }
        $this->load->model('m_permohonan');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['negara'] = $this->db->get_where('tbl_negara')->result();
        $data['provinsi'] = $this->db->get_where('tbl_provinsi')->result();
        $data['kota'] = $this->db->get_where('tbl_kota')->result();
        $data['jenis_permohonan'] = $this->m_permohonan->getJenisPermohonan();
        $data['jenis'] = $this->m_permohonan->getJenisCiptaan();
        $data['subjenis'] = $this->m_permohonan->getSubjenisCiptaan();
        $data['title'] = "Detail";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_permohonan', $data);
        $this->load->view('templates/v_footer');
    }

    public function ambilDataDetail()
    {
    }

    public function tambahDataDetail()
    {
        $this->form_validation->set_rules('jenis_permohonan', 'jenis permohonan', 'trim|required');
        $this->form_validation->set_rules('jenis_ciptaan', 'jenis ciptaan', 'trim|required');
        $this->form_validation->set_rules('subjenis_ciptaan', 'subjenis ciptaan', 'trim|required');
        $this->form_validation->set_rules('judul', 'judul', 'trim|required');
        $this->form_validation->set_rules('uraian', 'uraian', 'trim|required');
        $this->form_validation->set_rules('tgl_pertama', 'tanggal', 'trim|required');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        if ($this->form_validation->run() == FALSE) {
            $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
            $data['jenis_permohonan'] = $this->m_permohonan->getJenisPermohonan();
            $data['jenis'] = $this->m_permohonan->getJenisCiptaan();
            $data['subjenis'] = $this->m_permohonan->getSubjenisCiptaan();
            $data['title'] = "Detail";
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar');
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_detail', $data);
            $this->load->view('templates/v_footer');
        } else {
            $jenis_permohonan = $this->input->post('jenis_permohonan');
            $jenis_ciptaan = $this->input->post('jenis_ciptaan');
            $subjenis_ciptaan = $this->input->post('subjenis_ciptaan');
            $judul = $this->input->post('judul');
            $uraian = $this->input->post('uraian');
            $tgl_pertama = $this->input->post('tgl_pertama');
            $kuasa = $this->input->post('kuasa');

            $data = [
                'jenis_permohonan' => $jenis_permohonan,
                'jenis_ciptaan' => $jenis_ciptaan,
                'subjenis_ciptaan' => $subjenis_ciptaan,
                'judul' => $judul,
                'uraian' => $uraian,
                'tgl_pertama' => $tgl_pertama,
                'kuasa' => $kuasa,
            ];

            $this->session->set_userdata($data);
            redirect('permohonan/pencipta');

            // echo json_encode('success');
        }
    }

    public function ambilDataSubjenis()
    {
        $this->load->model('m_subjenis');
        $jenis_id = $this->input->post('jenis_id');
        $data = $this->m_subjenis->getDataByJenisId($jenis_id);
        echo json_encode($data);
    }

    public function getUser()
    {
        $nidn = $this->input->post('nidn');
        $result = $this->db->where('tbl_user.kota = tbl_kota.id_kota')->where('tbl_user.negara = tbl_negara.nama_negara')->get_where('tbl_user, tbl_kota, tbl_negara', ['nidn' => $nidn])->row();
        echo json_encode($result);
    }
}
