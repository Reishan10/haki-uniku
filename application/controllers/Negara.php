<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Negara extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        } else  if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }

        $this->load->model('M_negara');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['title'] = "Negara";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_negara', $data);
        $this->load->view('templates/v_footer');
    }

    public function ambilData()
    {
        $data = $this->m_negara->getData();
        echo json_encode($data);
    }

    public function ambilDataById()
    {
        $id = $this->input->post('id');
        $data = $this->m_negara->getDataById($id);
        echo json_encode($data);
    }

    public function tambahData()
    {
        $this->form_validation->set_rules('negara', 'negara', 'trim|required|is_unique[tbl_negara.nama_negara]');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi negara menggunakan %s lain!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'negara' => form_error('negara'),
            ];

            echo json_encode($data);
        } else {
            $negara = $this->input->post('negara');

            $data = [
                'nama_negara' => $negara
            ];

            $data = $this->m_negara->insertData($data);

            echo json_encode('success');
        }
    }

    public function ubahData()
    {
        $this->form_validation->set_rules('negara', 'negara', 'trim|required|is_unique[tbl_negara.nama_negara]');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'negara' => form_error('negara'),
            ];

            echo json_encode($data);
        } else {
            $id = $this->input->post('id');
            $negara = $this->input->post('negara');

            $data = [
                'nama_negara' => $negara
            ];

            $where = ['id_negara' => $id];

            $data = $this->m_negara->updateData($where, $data);

            echo json_encode('success');
        }
    }

    public function hapusData()
    {
        $id = $this->input->post('id');
        $where = ['id_negara' => $id];
        $data = $this->m_negara->deleteData($where);
        echo json_encode($data);
    }
}
