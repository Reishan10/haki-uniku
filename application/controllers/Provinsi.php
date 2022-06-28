<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Provinsi extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        }

        $this->load->model('m_provinsi');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['title'] = "Provinsi";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_provinsi', $data);
        $this->load->view('templates/v_footer');
    }

    public function ambilData()
    {
        $data = $this->m_provinsi->getData();
        echo json_encode($data);
    }

    public function ambilDataById()
    {
        $id = $this->input->post('id');
        $data = $this->m_provinsi->getDataById($id);
        echo json_encode($data);
    }

    public function tambahData()
    {
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required|is_unique[tbl_provinsi.nama_provinsi]');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi %s menggunakan provinsi lain!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'provinsi' => form_error('provinsi'),
            ];

            echo json_encode($data);
        } else {
            $provinsi = $this->input->post('provinsi');

            $data = [
                'nama_provinsi' => $provinsi
            ];

            $data = $this->m_provinsi->insertData($data);

            echo json_encode('success');
        }
    }

    public function ubahData()
    {
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required|is_unique[tbl_provinsi.nama_provinsi]');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'provinsi' => form_error('provinsi'),
            ];

            echo json_encode($data);
        } else {
            $id = $this->input->post('id');
            $provinsi = $this->input->post('provinsi');

            $data = [
                'nama_provinsi' => $provinsi
            ];

            $where = ['id_provinsi' => $id];

            $data = $this->m_provinsi->updateData($where, $data);

            echo json_encode('success');
        }
    }

    public function hapusData()
    {
        $id = $this->input->post('id');
        $where = ['id_provinsi' => $id];
        $data = $this->m_provinsi->deleteData($where);
        echo json_encode($data);
    }
}
