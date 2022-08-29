<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
<<<<<<< HEAD
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == TRUE) {
			redirect('dashboard');
		}
	}
=======
    public function __construct()
    {
        parent::__construct();
        if ($this->session->userdata('logged') == TRUE) {
            if ($this->session->userdata('role') == 'admin') {
                redirect('dashboard');
            }else{
                redirect('403-forbidden');
            }
        }
    }
>>>>>>> 4ffef4d806a9694293c3c2bcfedefdb6d94339ab

	public function index()
	{
		$data['title'] = 'Login';
		$this->load->view('admin/v_login', $data);
	}

	public function post_login()
	{
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email');
		$this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]|max_length[15]');

		$this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
		$this->form_validation->set_message('min_length', '%s terlalu pendek!');
		$this->form_validation->set_message('max_length', '%s terlalu panjang!');
		$this->form_validation->set_message('valid_email', '%s yang anda masukan tidak valid!');
		if ($this->form_validation->run() === FALSE) {
			$data['title'] = 'Login';
			$this->load->view('admin/v_login', $data);
		} else {
			$email = str_replace("'", "", htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES));
			$password = str_replace("'", "", htmlspecialchars($this->input->post('password', TRUE), ENT_QUOTES));

			$user = $this->db->get_where('tbl_user', ['email_user' => $email])->row();

            if ($user) {
                if (password_verify($password, $user->password)) {
                    $data = [
                        'logged' => TRUE,
                        'id_user' => $user->id_user,
                        'nidn'    => $user->nidn,
                        'email_user' => $user->email_user,
                        'role' => $user->role,
                    ];

					$this->session->set_userdata($data);

					if ($user->role == 'admin') {
						redirect('dashboard');
					} else {
						redirect('dosen/detail/' . $user->id_user);
					}
					redirect('dashboard');
				} else {
					$this->session->set_flashdata("error", "Password yang anda masukan salah!");
					redirect('login');
				}
			} else {
				$this->session->set_flashdata("error", "Email yang anda masukan tidak terdaftar!");
				redirect('login');
			}
		}
	}
}
