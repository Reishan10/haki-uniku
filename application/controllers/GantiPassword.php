<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GantiPassword extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == FALSE) {
            redirect('login');
        }
    }

    public function index()
    {
        $data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();

        $this->form_validation->set_rules('old_password', 'password lama', 'trim|required|min_length[8]|max_length[18]');
        $this->form_validation->set_rules('password', 'password', 'trim|required|min_length[8]|max_length[18]');
        $this->form_validation->set_rules('password2', 'konfirmasi password', 'trim|required|matches[password]');

        $this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
        $this->form_validation->set_message('min_length', 'Minimal %s %s karakter');
        $this->form_validation->set_message('max_length', 'Maksimal %s %s karakter');
        $this->form_validation->set_message('matches', ' %s harus sama dengan password');
        if ($this->form_validation->run() == FALSE) {
            $data['title'] = "Ganti Password";
            $this->load->view('templates/v_header', $data);
            $this->load->view('templates/v_sidebar');
            $this->load->view('templates/v_navbar', $data);
            $this->load->view('admin/v_ganti_password', $data);
            $this->load->view('templates/v_footer');
        } else {
            $email = $this->session->userdata('email_user');
            $old_password = str_replace("'", "", htmlspecialchars($this->input->post('old_password', TRUE), ENT_QUOTES));
            $password = str_replace("'", "", htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES));

            $user = $this->db->get_where('tbl_user', ['email_user' => $email])->row();

            if (password_verify($old_password, $user->password)) {
                if ($old_password != $password) {
                    $password_hash = password_hash($password, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('id_user', $this->session->userdata('id_user'));
                    $this->db->update('tbl_user');

                    $this->session->set_flashdata("success", "Password berhasil diubah!");
                    redirect('GantiPassword');
                } else {
                    $this->session->set_flashdata("error", "Password baru tidak boleh sama dengan password lama!");
                    redirect('GantiPassword');
                }
            } else {
                $this->session->set_flashdata("error", "Password lama yang anda masukan salah!");
                redirect('GantiPassword');
            }
        }
    }
}
