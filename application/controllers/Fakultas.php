<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Fakultas extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        } else  if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }

        $this->load->model('M_fakultas');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['title'] = "Fakultas";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_fakultas', $data);
        $this->load->view('templates/v_footer');
    }

    public function ambilDataFakultas()
    {
        $data = $this->m_fakultas->getDataFakultas();
        echo json_encode($data);
    }

    public function ambilFakultasById()
    {
        $id = $this->input->post('id');
        $data = $this->m_fakultas->getFakultasById($id);
        echo json_encode($data);
    }

    public function tambahFakultas()
    {
        $this->form_validation->set_rules('fakultas', 'fakultas', 'trim|required|is_unique[tbl_fakultas.fakultas_nama]');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi fakultas menggunakan %s lain!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'fakultas' => form_error('fakultas'),
            ];

            echo json_encode($data);
        } else {
            $fakultas = $this->input->post('fakultas');

            $data = [
                'fakultas_nama' => $fakultas
            ];

            $data = $this->m_fakultas->insertFakultas($data);

            echo json_encode('success');
        }
    }

    public function ubahFakultas()
    {
        $this->form_validation->set_rules('fakultas', 'fakultas', 'trim|required');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('is_unique', 'Silakan isi fakultas menggunakan %s lain!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'fakultas' => form_error('fakultas'),
            ];

            echo json_encode($data);
        } else {
            $id = $this->input->post('id');
            $fakultas = $this->input->post('fakultas');

            $data = [
                'fakultas_nama' => $fakultas
            ];


            $where = ['fakultas_id' => $id];

            $data = $this->m_fakultas->updateFakultas($where, $data);

            echo json_encode('success');
        }
    }

    public function hapusFakultas()
    {
        $id = $this->input->post('id');
        $where = ['fakultas_id' => $id];
        $data = $this->m_fakultas->deleteFakultas($where);
        echo json_encode($data);
    }

    public function ambilDataProdi()
    {
        $id = $this->input->post('id');
        $data = $this->m_fakultas->getProdiById($id);
        echo json_encode($data);
    }

    public function tambahProdi()
    {
        $this->form_validation->set_rules('fakultas', 'fakultas', 'trim|required');
        $this->form_validation->set_rules('prodi', 'prodi', 'trim|required');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'prodi' => form_error('prodi'),
                'fakultas' => form_error('fakultas'),
            ];

            echo json_encode($data);
        } else {
            $prodi = $this->input->post('prodi');
            $fakultas = $this->input->post('fakultas');

            $data = [
                'prodi_nama' => $prodi,
                'fakultas_nama' => $fakultas
            ];

            $data = $this->m_fakultas->insertProdi($data);

            echo json_encode('success');
        }
    }

    public function ambilProdi()
    {
        $fakultas = $this->input->post('fakultas');
        $data = $this->m_fakultas->getProdi($fakultas);
        echo json_encode($data);
    }

    public function ambilProdiById()
    {
        $id = $this->input->post('id');
        $data = $this->m_fakultas->getDataProdiById($id);
        echo json_encode($data);
    }

    public function ubahDataProdi()
    {
        $this->form_validation->set_rules('prodi', 'prodi', 'trim|required');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        if ($this->form_validation->run() == FALSE) {
            $data = [
                'prodi' => form_error('prodi'),
            ];

            echo json_encode($data);
        } else {
            $id = $this->input->post('id');
            $prodi = $this->input->post('prodi');

            $data = [
                'prodi_nama' => $prodi,
            ];

            $where = ['prodi_id' => $id];

            $data = $this->m_fakultas->updateProdi($where, $data);

            echo json_encode('success');
        }
    }

    public function hapusProdi()
    {
        $id = $this->input->post('id');
        $where = ['prodi_id' => $id];
        $data = $this->m_fakultas->deleteProdi($where);
        echo json_encode($data);
    }
}
