<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Administrator extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        } else if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }
        $this->load->model('m_administrator');
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['kota'] = $this->db->query("SELECT * FROM tbl_kota ORDER BY nama_kota ASC")->result();
        $data['negara'] = $this->db->query("SELECT * FROM tbl_negara ORDER BY nama_negara ASC")->result();
        $data['title'] = "Administrator";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_administrator', $data);
        $this->load->view('templates/v_footer');
    }

    public function ambilData()
    {
        $data = $this->m_administrator->getData();
        echo json_encode($data);
    }

    public function ambilDataById()
    {
        $id = $this->input->post('id');
        $data = $this->m_administrator->getDataById($id);
        echo json_encode($data);
    }

    public function detailData()
    {
        $id = $this->input->post('id');
        $data = $this->m_administrator->getDataById($id);
        echo json_encode($data);
    }

    public function tambahData()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[tbl_user.email_user]');
        $this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required|numeric|max_length[13]|min_length[11]');
        $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('negara', 'negara', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required|numeric|max_length[7]');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('valid_email', 'Silakan isi %s menggunakan email valid!');
        $this->form_validation->set_message('is_unique', 'Silakan isi %s menggunakan email lain!');
        $this->form_validation->set_message('numeric', 'Silakan isi %s menggunakan angka!');
        $this->form_validation->set_message('max_length', 'Maksimal %s %s angka!');
        $this->form_validation->set_message('min_length', 'Minimal %s %s angka!');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'nama' => form_error('nama'),
                'email' => form_error('email'),
                'no_telepon' => form_error('no_telepon'),
                'kewarganegaraan' => form_error('kewarganegaraan'),
                'alamat' => form_error('alamat'),
                'kota' => form_error('kota'),
                'negara' => form_error('negara'),
                'kode_pos' => form_error('kode_pos'),
            ];

            echo json_encode($data);
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = password_hash('adminhaki', PASSWORD_DEFAULT);
            $no_telepon = $this->input->post('no_telepon');
            $kewarganegaraan = $this->input->post('kewarganegaraan');
            $alamat = $this->input->post('alamat');
            $kota = $this->input->post('kota');
            $negara = $this->input->post('negara');
            $kode_pos = $this->input->post('kode_pos');
            $role = 'admin';

            $data = [
                'nama_user' => $nama,
                'email_user' => $email,
                'password' => $password,
                'telepon_user' => $no_telepon,
                'kewarganegaraan' => $kewarganegaraan,
                'alamat_user' => $alamat,
                'kota' => $kota,
                'negara' => $negara,
                'kode_pos' => $kode_pos,
                'role' => $role,
                'id_author' => '-',
            ];
            $data = $this->m_administrator->insertData($data);

            echo json_encode('success');
        }
    }

    public function ubahData()
    {
        $this->form_validation->set_rules('nama', 'nama', 'trim|required');
        $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email');
        $this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required|numeric|max_length[13]|min_length[11]');
        $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim|required');
        $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
        $this->form_validation->set_rules('kota', 'kota', 'trim|required');
        $this->form_validation->set_rules('negara', 'negara', 'trim|required');
        $this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required|numeric|max_length[7]');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('valid_email', 'Silakan isi %s menggunakan email valid!');
        $this->form_validation->set_message('is_unique', 'Silakan isi %s menggunakan email lain!');
        $this->form_validation->set_message('numeric', 'Silakan isi %s menggunakan angka!');
        $this->form_validation->set_message('max_length', 'Maksimal %s %s angka!');
        $this->form_validation->set_message('min_length', 'Minimal %s %s angka!');

        if ($this->form_validation->run() == FALSE) {
            $data = [
                'nama' => form_error('nama'),
                'email' => form_error('email'),
                'no_telepon' => form_error('no_telepon'),
                'kewarganegaraan' => form_error('kewarganegaraan'),
                'alamat' => form_error('alamat'),
                'kota' => form_error('kota'),
                'negara' => form_error('negara'),
                'kode_pos' => form_error('kode_pos'),
            ];

            echo json_encode($data);
        } else {
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $no_telepon = $this->input->post('no_telepon');
            $kewarganegaraan = $this->input->post('kewarganegaraan');
            $alamat = $this->input->post('alamat');
            $kota = $this->input->post('kota');
            $negara = $this->input->post('negara');
            $kode_pos = $this->input->post('kode_pos');

            $data = [
                'nama_user' => $nama,
                'email_user' => $email,
                'telepon_user' => $no_telepon,
                'kewarganegaraan' => $kewarganegaraan,
                'alamat_user' => $alamat,
                'kota' => $kota,
                'negara' => $negara,
                'kode_pos' => $kode_pos,
                'id_author' => '-',
            ];

            $where = ['id_user' => $id];
            $data = $this->m_administrator->updateData($where, $data);

            echo json_encode('success');
        }
    }

    public function hapusData()
    {
        $id = $this->input->post('id');
        $where = ['id_user' => $id];
        $data = $this->m_administrator->deleteData($where);
        echo json_encode($data);
    }
}
