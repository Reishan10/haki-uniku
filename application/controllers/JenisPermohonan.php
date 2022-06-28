<?php
defined('BASEPATH') or exit('No direct script access allowed');

class JenisPermohonan extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        }

        $this->load->model('m_jenis_permohonan');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['title'] = "Jenis Permohonan";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_jenis_permohonan', $data);
        $this->load->view('templates/v_footer');
    }

    public function ambilData()
    {
        $data = $this->m_jenis_permohonan->getData();
        echo json_encode($data);
    }

    public function ambilDataById()
    {
        $id = $this->input->post('id');
        $data = $this->m_jenis_permohonan->getDataById($id);
        echo json_encode($data);
    }

    public function tambahData()
    {
        $this->form_validation->set_rules('jenis_permohonan', 'jenis permohonan', 'trim|required|is_unique[tbl_jenis_permohonan.nama_jenis_permohonan]');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi jenis permohonan menggunakan %s lain!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'jenis_permohonan' => form_error('jenis_permohonan'),
            ];

            echo json_encode($data);
        } else {
            $jenis_permohonan = $this->input->post('jenis_permohonan');

            $data = [
                'nama_jenis_permohonan' => $jenis_permohonan
            ];

            $data = $this->m_jenis_permohonan->insertData($data);

            echo json_encode('success');
        }
    }

    public function ubahData()
    {
        $this->form_validation->set_rules('jenis_permohonan', 'jenis permohonan', 'trim|required');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi jenis permohonan menggunakan %s lain!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'jenis_permohonan' => form_error('jenis_permohonan'),
            ];

            echo json_encode($data);
        } else {
            $id = $this->input->post('id');
            $jenis_permohonan = $this->input->post('jenis_permohonan');

            $data = [
                'nama_jenis_permohonan' => $jenis_permohonan
            ];

            $where = ['id_jenis_permohonan' => $id];

            $data = $this->m_jenis_permohonan->updateData($where, $data);

            echo json_encode('success');
        }
    }

    public function hapusData()
    {
        $id = $this->input->post('id');
        $where = ['id_jenis_permohonan' => $id];
        $data = $this->m_jenis_permohonan->deleteData($where);
        echo json_encode($data);
    }
}
