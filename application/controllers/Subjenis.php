<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Subjenis extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        } else  if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }

        $this->load->model('m_subjenis');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['jenis'] = $this->db->get('tbl_jenis')->result();
        $data['title'] = "Subjenis";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_subjenis', $data);
        $this->load->view('templates/v_footer');
    }

    public function ambilData()
    {
        $data = $this->m_subjenis->getData();
        echo json_encode($data);
    }


    public function ambilDataById()
    {
        $id = $this->input->post('id');
        $data = $this->m_subjenis->getDataById($id);
        echo json_encode($data);
    }

    public function tambahData()
    {
        $this->form_validation->set_rules('subjenis', 'subjenis', 'trim|required|is_unique[tbl_subjenis.nama_subjenis]');
        $this->form_validation->set_rules('jenis', 'jenis', 'trim|required');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi subjenis menggunakan %s lain!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'subjenis' => form_error('subjenis'),
                'jenis' => form_error('jenis'),
            ];

            echo json_encode($data);
        } else {
            $subjenis = $this->input->post('subjenis');
            $jenis = $this->input->post('jenis');

            $data = [
                'nama_subjenis' => $subjenis,
                'id_jenis' => $jenis
            ];

            $data = $this->m_subjenis->insertData($data);

            echo json_encode('success');
        }
    }

    public function ubahData()
    {
        $this->form_validation->set_rules('subjenis', 'subjenis', 'trim|required');
        $this->form_validation->set_rules('jenis', 'jenis', 'trim|required');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi subjenis menggunakan %s lain!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'subjenis' => form_error('subjenis'),
                'jenis' => form_error('jenis'),
            ];

            echo json_encode($data);
        } else {
            $id = $this->input->post('id');
            $subjenis = $this->input->post('subjenis');
            $jenis = $this->input->post('jenis');

            $data = [
                'nama_subjenis' => $subjenis,
                'id_jenis' => $jenis
            ];

            $where = ['id_subjenis' => $id];

            $data = $this->m_subjenis->updateData($where, $data);

            echo json_encode('success');
        }
    }

    public function hapusData()
    {
        $id = $this->input->post('id');
        $where = ['id_subjenis' => $id];
        $data = $this->m_subjenis->deleteData($where);
        echo json_encode($data);
    }
}
