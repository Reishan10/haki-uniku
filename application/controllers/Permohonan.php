<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Permohonan extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == FALSE) {
			redirect('login');
		} else {
			if (@$this->session->userdata('data')->scan_ktp == "") {

				redirect('profile');
			}
		}
		$this->load->model('m_permohonan');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
		$data['negara'] = $this->db->get_where('tbl_negara')->result();
		$data['provinsi'] = $this->db->get_where('tbl_provinsi')->result();
		$data['kota'] = $this->db->get_where('tbl_kota')->result();
		$data['jenis_permohonan'] = $this->m_permohonan->getJenisPermohonan();
		$data['jenis'] = $this->m_permohonan->getJenisCiptaan();
		$data['subjenis'] = $this->m_permohonan->getSubjenisCiptaan();
		$data['title'] = "Detail";
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_sidebar');
		$this->load->view('templates/v_navbar', $data);
		$this->load->view('admin/v_permohonan', $data);
		$this->load->view('templates/v_footer');
	}


	public function ambilDataDetail()
	{
	}

	public function tambahDataDetail()
	{
		$this->form_validation->set_rules('jenis_permohonan', 'jenis permohonan', 'trim|required');
		$this->form_validation->set_rules('jenis_ciptaan', 'jenis ciptaan', 'trim|required');
		$this->form_validation->set_rules('subjenis_ciptaan', 'subjenis ciptaan', 'trim|required');
		$this->form_validation->set_rules('judul', 'judul', 'trim|required');
		$this->form_validation->set_rules('uraian', 'uraian', 'trim|required');
		$this->form_validation->set_rules('tgl_pertama', 'tanggal', 'trim|required');

		$this->form_validation->set_message('required', 'Silakan isi %s terlebih dahulu!');
		if ($this->form_validation->run() == FALSE) {
			$data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
			$data['jenis_permohonan'] = $this->m_permohonan->getJenisPermohonan();
			$data['jenis'] = $this->m_permohonan->getJenisCiptaan();
			$data['subjenis'] = $this->m_permohonan->getSubjenisCiptaan();
			$data['title'] = "Detail";
			$this->load->view('templates/v_header', $data);
			$this->load->view('templates/v_sidebar');
			$this->load->view('templates/v_navbar', $data);
			$this->load->view('admin/v_detail', $data);
			$this->load->view('templates/v_footer');
		} else {
			$jenis_permohonan = $this->input->post('jenis_permohonan');
			$jenis_ciptaan = $this->input->post('jenis_ciptaan');
			$subjenis_ciptaan = $this->input->post('subjenis_ciptaan');
			$judul = $this->input->post('judul');
			$uraian = $this->input->post('uraian');
			$tgl_pertama = $this->input->post('tgl_pertama');
			$kuasa = $this->input->post('kuasa');

			$data = [
				'jenis_permohonan' => $jenis_permohonan,
				'jenis_ciptaan' => $jenis_ciptaan,
				'subjenis_ciptaan' => $subjenis_ciptaan,
				'judul' => $judul,
				'uraian' => $uraian,
				'tgl_pertama' => $tgl_pertama,
				'kuasa' => $kuasa,
			];

			$this->session->set_userdata($data);
			redirect('permohonan/pencipta');

			// echo json_encode('success');
		}
	}

	public function ambilDataSubjenis()
	{
		$this->load->model('m_subjenis');
		$jenis_id = $this->input->post('jenis_id');
		$data = $this->m_subjenis->getDataByJenisId($jenis_id);
		echo json_encode($data);
	}


	public function getUser()
	{
		$nidn = $this->input->post('nidn');
		$result = $this->db->select('tbl_kota.*, tbl_negara.*, tbl_user.*, tbl_user.kode_pos as kode_pos')->where('tbl_user.kota = tbl_kota.id_kota')->where('tbl_user.negara = tbl_negara.nama_negara')->get_where('tbl_user, tbl_kota, tbl_negara', ['nidn' => $nidn]);

		if ($result->num_rows() > 0) {
			$arr = array(
				'succ'      => 1,
				'data'      => $result->row(),
				'message'   => 'Data berhasil diambil.'
			);
		} else {
			$arr = array(
				'succ'      => 0,
				'data'      => null,
				'message'   => 'Data gagal diambil.'
			);
		}

		echo json_encode($arr);
	}

	public function saveUser()
	{
		$data = $this->input->post();

		$arr = array(
			'nama_user'         => $data['nama'],
			'email_user'        => $data['email'],
			'password'          => password_hash("unikujaya", PASSWORD_DEFAULT),
			'telepon_user'      => $data['no_telepon'],
			'kewarganegaraan'   => $data['kewarganegaraan'],
			'alamat_user'       => $data['alamat'],
			'kota'              => $data['kota'],
			'negara'            => $data['negara'],
			'kode_pos'          => $data['kode_pos'],
			'role'              => 'user',
			'nidn'              => $data['nidn'],
		);

		$data['kewarganegaraan']    = $this->db->get_where('tbl_negara', ['id_negara' => $data['kewarganegaraan']])->row()->nama_negara;
		$addr                       = $this->db->where('tbl_kota.id_provinsi = tbl_provinsi.id_provinsi')->get_where('tbl_kota, tbl_provinsi', ['id_kota' => $data['kota']])->row();
		$data['kota']               = $addr->nama_kota;
		$data['provinsi']           = $addr->nama_provinsi;

		$cek = $this->db->get_where('tbl_user', ['nidn' => $data['nidn']]);

		if ($cek->num_rows() == 0) {
			$result = $this->db->insert('tbl_user', $arr);
			if ($result) {
				$return = array(
					'succ'  => 1,
					'data'  => $data,
					'message'   => 'Insert data successfully.'
				);
			} else {
				$return = array(
					'succ'  => 0,
					'data'  => $data,
					'message' => 'Insert data failed.'
				);
			}
		} else {
			$return = array(
				'succ'  => 1,
				'data'  => $data,
				'message'   => 'Data successfully.'
			);
		}

		echo json_encode($return);
	}

	public function getProvinsi()
	{
		$kota = $this->input->get('kota_id');
		$result = $this->db->get_where('tbl_kota', ['id_kota' => $kota])->row();
		echo json_encode($result);
	}


	public function preview()
	{
		$data = $this->input->post();
		$data['pemegangHAKI'] = $this->db->get_where('tbl_permohonan_pemegang', ['pemegang_id' => '1'])->row();

		if ($data != null) {
			$arr = array(
				'succ'      => 1,
				'view'      => $this->load->view('admin/modal_preview', $data, true),
				'message'   => 'Modal ready!'
			);
		} else {
			$arr = array(
				'succ'      => 0,
				'view'      => null,
				'message'   => 'Modal not ready!'
			);
		}
		echo json_encode($arr);
	}

	public function prosesadd()
	{
		$input = $this->input->post();

		$result = $this->m_permohonan->save($input);

		if ($result) {
			$input['permohonan_id'] = $this->db->insert_id();

			$this->m_permohonan->saveLampiran($input);

			for ($i = 0; $i < count($input['pencipta']); $i++) {
				$approval_status = (explode(".", $input['pencipta'][$i][0])[1] == $this->session->userdata('nidn')) ? '1' : '0';
				$arr = array(
					'permohonan_id' => $input['permohonan_id'],
					'jenis_pemohon' => explode(".", $input['pencipta'][$i][0])[0],
					'nidn'          => explode(".", $input['pencipta'][$i][0])[1],
					'approval_status' => $approval_status,
				);
				$resPemohon = $this->m_permohonan->savePemohon($arr);
			}

			$arr = array(
				'succ'      => 1,
				'message'   => "Data berhasil diajukan."
			);
		} else {
			$arr = array(
				'succ'      => 0,
				'message'   => "Data gagal diajukan."
			);
		}

		echo json_encode($arr);
	}
}
