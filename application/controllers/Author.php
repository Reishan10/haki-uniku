<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Author extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        }
        $this->load->model('m_author');
    }

    public function index()
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['fakultas'] = $this->db->query("SELECT * FROM tbl_fakultas ORDER BY fakultas_nama ASC")->result();
        $data['kota'] = $this->db->query("SELECT * FROM tbl_kota ORDER BY nama_kota ASC")->result();
        $data['negara'] = $this->db->query("SELECT * FROM tbl_negara ORDER BY nama_negara ASC")->result();
        $data['title'] = "Dosen";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_author', $data);
        $this->load->view('templates/v_footer');
    }

    public function detail($id)
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
        $data['user_id'] = $this->m_author->getDataById($id);
        $data['title'] = "Dosen";
        $this->load->view('templates/v_header', $data);
        $this->load->view('templates/v_sidebar');
        $this->load->view('templates/v_navbar', $data);
        $this->load->view('admin/v_author_detail', $data);
        $this->load->view('templates/v_footer');
    }

    public function ambilData()
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }
        $data = $this->m_author->getData();
        echo json_encode($data);
    }

    public function ambilDataProdi()
    {
        $fakultas_nama = trim($this->input->post('fakultas_nama'));
        $data = $this->db->get_where('tbl_fakultas', ['fakultas_nama' => $fakultas_nama])->result();
        echo json_encode($data);
    }

    public function ambilDataById()
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }
        $id = $this->input->post('id');
        $data = $this->m_author->getDataById($id);
        echo json_encode($data);
    }

    public function tambahData()
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }
        $newName = "KTP-" . time();
        $config['upload_path'] = "./assets/images/scan-ktp";
        $config['allowed_types'] = 'gif|jpg|png';
        $config['max_size'] = 10000;
        $config['file_name'] = $newName;

        $this->load->library('upload', $config);
        if ($this->upload->do_upload("scan_ktp")) {
            $data = array('upload_data' => $this->upload->data());

            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = password_hash('unikujaya', PASSWORD_DEFAULT);
            $no_telepon = $this->input->post('no_telepon');
            $kewarganegaraan = $this->input->post('kewarganegaraan');
            $alamat = $this->input->post('alamat');
            $kota = $this->input->post('kota');
            $negara = $this->input->post('negara');
            $kode_pos = $this->input->post('kode_pos');
            $role = 'user';
            $scan_ktp = $data['upload_data']['file_name'];

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
                'scan_ktp' => $scan_ktp,
            ];

            $data = $this->m_author->insertData($data);
            echo json_decode('success');
        } else {
            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $password = password_hash('unikujaya', PASSWORD_DEFAULT);
            $no_telepon = $this->input->post('no_telepon');
            $kewarganegaraan = $this->input->post('kewarganegaraan');
            $alamat = $this->input->post('alamat');
            $kota = $this->input->post('kota');
            $negara = $this->input->post('negara');
            $kode_pos = $this->input->post('kode_pos');
            $role = 'user';

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

            $data = $this->m_author->insertData($data);
            echo json_decode('success');
        }
    }

    public function ubahData()
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }
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
            $data = $this->m_author->updateData($where, $data);

            echo json_encode('success');
        }
    }

    public function hapusData()
    {
        if ($this->session->userdata('role') != 'admin') {
            redirect('403-forbidden');
        }
        $id = $this->input->post('id');
        $user =  $this->db->get_where('tbl_user', ['id_user' => $id])->row();

        if ($user->scan_ktp) {
            $target_file = './assets/images/scan-ktp/' . $user->scan_ktp;
            unlink($target_file);
        }

        $where = ['id_user' => $id];
        $data = $this->m_author->deleteData($where);
        echo json_encode($data);
    }
}


 // public function tambahData()
    // {
    //     if ($this->session->userdata('role') != 'admin') {
    //         redirect('403-forbidden');
    //     }
    //     $this->form_validation->set_rules('nama', 'nama', 'trim|required');
    //     $this->form_validation->set_rules('email', 'email', 'trim|required|valid_email|is_unique[tbl_user.email_user]');
    //     $this->form_validation->set_rules('no_telepon', 'no telepon', 'trim|required|numeric|max_length[13]|min_length[11]');
    //     $this->form_validation->set_rules('kewarganegaraan', 'kewarganegaraan', 'trim|required');
    //     $this->form_validation->set_rules('alamat', 'alamat', 'trim|required');
    //     $this->form_validation->set_rules('kota', 'kota', 'trim|required');
    //     $this->form_validation->set_rules('negara', 'negara', 'trim|required');
    //     $this->form_validation->set_rules('kode_pos', 'kode pos', 'trim|required|numeric|max_length[7]');

    //     $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
    //     $this->form_validation->set_message('valid_email', 'Silakan isi %s menggunakan email valid!');
    //     $this->form_validation->set_message('is_unique', 'Silakan isi %s menggunakan email lain!');
    //     $this->form_validation->set_message('numeric', 'Silakan isi %s menggunakan angka!');
    //     $this->form_validation->set_message('max_length', 'Maksimal %s %s angka!');
    //     $this->form_validation->set_message('min_length', 'Minimal %s %s angka!');

    //     if ($this->form_validation->run() == FALSE) {
    //         $data = [
    //             'nama' => form_error('nama'),
    //             'email' => form_error('email'),
    //             'no_telepon' => form_error('no_telepon'),
    //             'kewarganegaraan' => form_error('kewarganegaraan'),
    //             'alamat' => form_error('alamat'),
    //             'kota' => form_error('kota'),
    //             'negara' => form_error('negara'),
    //             'kode_pos' => form_error('kode_pos'),
    //         ];

    //         echo json_encode($data);
    //     } else {
    //         $nama = $this->input->post('nama');
    //         $email = $this->input->post('email');
    //         $password = password_hash('unikujaya', PASSWORD_DEFAULT);
    //         $no_telepon = $this->input->post('no_telepon');
    //         $kewarganegaraan = $this->input->post('kewarganegaraan');
    //         $alamat = $this->input->post('alamat');
    //         $kota = $this->input->post('kota');
    //         $negara = $this->input->post('negara');
    //         $kode_pos = $this->input->post('kode_pos');
    //         $role = 'user';

    //         $data = [
    //             'nama_user' => $nama,
    //             'email_user' => $email,
    //             'password' => $password,
    //             'telepon_user' => $no_telepon,
    //             'kewarganegaraan' => $kewarganegaraan,
    //             'alamat_user' => $alamat,
    //             'kota' => $kota,
    //             'negara' => $negara,
    //             'kode_pos' => $kode_pos,
    //             'role' => $role,
    //             'id_author' => '-',
    //         ];

    //         $data = $this->m_author->insertData($data);

    //         echo json_encode('success');
    //     }
    // }
