<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pemegang extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == FALSE) {
			redirect('login');
		}
		$this->load->library('upload');
	}

	public function index()
	{
		if ($this->session->userdata('role') != 'admin') {
			redirect('dosen/detail/' . $this->session->userdata('id_user'));
		}
		$data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
		$data['fakultas'] = $this->db->query("SELECT * FROM tbl_fakultas ORDER BY fakultas_nama ASC")->result();
		$data['kota'] = $this->db->query("SELECT * FROM tbl_kota ORDER BY nama_kota ASC")->result();
		$data['negara'] = $this->db->query("SELECT * FROM tbl_negara ORDER BY nama_negara ASC")->result();
		$data['pemegang']	= $this->db->get_where('tbl_permohonan_pemegang', ['pemegang_id' => '1'])->row();
		$data['title'] = "Dosen";
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_sidebar');
		$this->load->view('templates/v_navbar');
		$this->load->view('admin/v_pemegang_hki');
		$this->load->view('templates/v_footer');
	}

	public function CropImageUpload()
	{
		$data = $_POST["image"];

		$image_array_1 = explode(";", $data);

		$image_array_2 = explode(",", $image_array_1[1]);

		$data = base64_decode($image_array_2[1]);

		$imageName = 'KTP-' . time() . '.png';

		file_put_contents('assets/images/scan-ktp/' . $imageName, $data);

		$image_file = addslashes(file_get_contents($imageName));

		$datas['ktp_pemegang_hki'] = $imageName;

		$this->db->update('tbl_permohonan_pemegang', ['ktp_pemegang_hki' => $datas['ktp_pemegang_hki']], ['pemegang_id' => '1']);
	}

	public function update()
	{
		$data = $this->input->post();

		$arr = array(
			'nama'				=> $data['nama'],
			'alamat'			=> $data['alamat'],
			'kode_pos'			=> $data['kode_pos'],
			'nama_pemegang_hki'	=>$data['nama_pemegang_hki']
		);

		$result = $this->db->update('tbl_permohonan_pemegang', $arr, ['pemegang_id' => '1']);
		if ($result){
			$res = array(
				'status'	=> 1
			);
		}else{
			$res = array(
				'status'	=> 0
			);
		}

		echo json_encode($res);
	}
}
