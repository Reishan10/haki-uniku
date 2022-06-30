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

    public function detail()
    {
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

    public function pencipta()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['provinsi'] = $this->m_permohonan->getProvinsi();
        $data['negara'] = $this->m_permohonan->getNegara();
        $data['kota'] = $this->m_permohonan->getKota();
        $data['title'] = "Pencipta";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_pencipta');
        $this->load->view('templates/v_footer');
    }

    public function pemegang()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['title'] = "Pencipta";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_pemegang');
        $this->load->view('templates/v_footer');
    }

    public function lampiran()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['title'] = "Lampiran";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_lampiran');
        $this->load->view('templates/v_footer');
    }
}
