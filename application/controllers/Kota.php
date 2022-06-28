<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Kota extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        }

        $this->load->model('m_kota');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['provinsi'] = $this->db->get('tbl_provinsi')->result();
        $data['title'] = "Kota";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_kota', $data);
        $this->load->view('templates/v_footer');
    }

    public function ambilData()
    {
        $data = $this->m_kota->getData();
        echo json_encode($data);
    }

    public function ambilDataById()
    {
        $id = $this->input->post('id');
        $data = $this->m_kota->getDataById($id);
        echo json_encode($data);
    }

    public function tambahData()
    {
        $this->form_validation->set_rules('kota', 'kota', 'trim|required|is_unique[tbl_kota.nama_kota]');
        $this->form_validation->set_rules('type', 'type', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'kode_pos', 'trim|required|numeric');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi %s menggunakan provinsi lain!');
        $this->form_validation->set_message('numeric', 'Silakan isi %s menggunakan angka!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'kota' => form_error('kota'),
                'type' => form_error('type'),
                'kode_pos' => form_error('kode_pos'),
                'id_provinsi' => form_error('provinsi'),
            ];

            echo json_encode($data);
        } else {
            $kota = $this->input->post('kota');
            $type = $this->input->post('type');
            $kode_pos = $this->input->post('kode_pos');
            $provinsi = $this->input->post('provinsi');

            $data = [
                'nama_kota' => $kota,
                'type' => $type,
                'kode_pos' => $kode_pos,
                'id_provinsi' => $provinsi,
            ];

            $data = $this->m_kota->insertData($data);

            echo json_encode('success');
        }
    }

    public function ubahData()
    {
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('type', 'type', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'kode_pos', 'trim|required|numeric');
        $this->form_validation->set_rules('provinsi', 'provinsi', 'trim|required');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi %s menggunakan provinsi lain!');
        $this->form_validation->set_message('numeric', 'Silakan isi %s menggunakan angka!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'kota' => form_error('kota'),
                'type' => form_error('type'),
                'kode_pos' => form_error('kode_pos'),
                'id_provinsi' => form_error('provinsi'),
            ];

            echo json_encode($data);
        } else {
            $id = $this->input->post('id');
            $kota = $this->input->post('kota');
            $type = $this->input->post('type');
            $kode_pos = $this->input->post('kode_pos');
            $provinsi = $this->input->post('provinsi');

            $data = [
                'nama_kota' => $kota,
                'type' => $type,
                'kode_pos' => $kode_pos,
                'id_provinsi' => $provinsi,
            ];

            $where = ['id_kota' => $id];

            $data = $this->m_kota->updateData($where, $data);

            echo json_encode('success');
        }
    }

    public function hapusData()
    {
        $id = $this->input->post('id');
        $where = ['id_kota' => $id];
        $data = $this->m_kota->deleteData($where);
        echo json_encode($data);
    }
}
