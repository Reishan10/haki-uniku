<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Jenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        } else  if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }

        $this->load->model('m_jenis');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['title'] = "Jenis";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_jenis', $data);
        $this->load->view('templates/v_footer');
    }

    public function ambilData()
    {
        $data = $this->m_jenis->getData();
        echo json_encode($data);
    }

    public function ambilDataById()
    {
        $id = $this->input->post('id');
        $data = $this->m_jenis->getDataById($id);
        echo json_encode($data);
    }

    public function tambahData()
    {
        $this->form_validation->set_rules('jenis', 'jenis', 'trim|required|is_unique[tbl_jenis.nama_jenis]');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi jenis menggunakan %s lain!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'jenis' => form_error('jenis'),
            ];

            echo json_encode($data);
        } else {
            $jenis = $this->input->post('jenis');

            $data = [
                'nama_jenis' => $jenis
            ];

            $data = $this->m_jenis->insertData($data);

            echo json_encode('success');
        }
    }

    public function ubahData()
    {
        $this->form_validation->set_rules('jenis', 'jenis', 'trim|required');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi jenis menggunakan %s lain!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'jenis' => form_error('jenis'),
            ];

            echo json_encode($data);
        } else {
            $id = $this->input->post('id');
            $jenis = $this->input->post('jenis');

            $data = [
                'nama_jenis' => $jenis
            ];

            $where = ['id_jenis' => $id];

            $data = $this->m_jenis->updateData($where, $data);

            echo json_encode('success');
        }
    }

    public function hapusData()
    {
        $id = $this->input->post('id');
        $where = ['id_jenis' => $id];
        $data = $this->m_jenis->deleteData($where);
        echo json_encode($data);
    }
}
