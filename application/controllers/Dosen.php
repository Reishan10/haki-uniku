<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Dosen extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == FALSE) {
			redirect('login');
		}
		$this->load->model('m_dosen');
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
		$data['title'] = "Dosen";
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_sidebar');
		$this->load->view('templates/v_navbar');
		$this->load->view('admin/v_dosen');
		$this->load->view('templates/v_footer');
	}

	public function detail($id)
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
		$data['user_id'] = $this->m_dosen->getDataById($id);
		$data['title'] = "Dosen";
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_sidebar');
		$this->load->view('templates/v_navbar', $data);
		$this->load->view('admin/v_dosen_detail', $data);
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

		$datas['scan_ktp'] = $imageName;

		$this->db->update('tbl_user', ['scan_ktp' => $datas['scan_ktp']], ['id_user' => $this->session->userdata('id_user')]);
	}

	public function ambilDataProdi()
	{
		$fakultas_nama = trim($this->input->post('fakultas_nama'));
		$data = $this->db->order_by('prodi_nama', 'ASC')->get_where('tbl_prodi', ['fakultas_nama' => $fakultas_nama])->result();
		echo json_encode($data);
	}

	public function ajax_list()
	{
		$list = $this->m_dosen->getData();
		$data = array();
		foreach ($list as $dosen) {
			$row = [];
			if ($dosen->foto_user)
				$row[] = '<a href="' . base_url('assets/images/user-profile/' . $dosen->foto_user) . '" target="_blank"><img src="' . base_url('assets/images/user-profile/' . $dosen->foto_user) . '" class="img-responsive"/></a>';
			else
				$row[] = '(Foto tidak tersedia)';
			$row[] = '<a href="' . base_url('dosen/detail/' . $dosen->id_user) . '" class="text-dark">' . $dosen->nama_user . '</a>';
			$row[] = '<a href="' . base_url('dosen/detail/' . $dosen->id_user) . '" class="text-dark">' . $dosen->nidn . '</a>';
			$row[] = 0;
			$row[] = 0;

			//add html for action
			$row[] = '
						<a class="btn btn-sm btn-info" href="javascript:void(0)" title="Detail" data-toggle="modal" data-target="#modalDetail" onclick="detail_dosen(' . "'" . $dosen->id_user . "'" . ')"><i class="fa-solid fa-eye"></i></a>
						<a class="btn btn-sm btn-primary" href="javascript:void(0)" title="Edit" onclick="edit_dosen(' . "'" . $dosen->id_user . "'" . ')"><i class="fa-solid fa-pencil"></i></a>
						<a class="btn btn-sm btn-danger" href="javascript:void(0)" title="Hapus" onclick="hapus_dosen(' . "'" . $dosen->id_user . "'" . ')"><i class="fa-solid fa-trash"></i></a>
					';
			$data[] = $row;
		}

		$output = array(
			"data" => $data,
		);
		//output to json format
		echo json_encode($output);
	}

	public function ajax_add()
	{
		$this->_validate();

		$data = array(
			'nama_user' => str_replace("'", "", htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES)),
			'email_user' => str_replace("'", "", htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES)),
			'password' => password_hash('unikujaya', PASSWORD_DEFAULT),
			'telepon_user' => str_replace("'", "", htmlspecialchars($this->input->post('no_telepon', TRUE), ENT_QUOTES)),
			'kewarganegaraan' => str_replace("'", "", htmlspecialchars($this->input->post('kewarganegaraan', TRUE), ENT_QUOTES)),
			'alamat_user' => str_replace("'", "", htmlspecialchars($this->input->post('alamat', TRUE), ENT_QUOTES)),
			'kota' => str_replace("'", "", htmlspecialchars($this->input->post('kota', TRUE), ENT_QUOTES)),
			'negara' => str_replace("'", "", htmlspecialchars($this->input->post('negara', TRUE), ENT_QUOTES)),
			'kode_pos' => str_replace("'", "", htmlspecialchars($this->input->post('kode_pos', TRUE), ENT_QUOTES)),
			'role' => 'user',
			'nidn' => str_replace("'", "", htmlspecialchars($this->input->post('nidn', TRUE), ENT_QUOTES)),
			'prodi' => str_replace("'", "", htmlspecialchars($this->input->post('prodi', TRUE), ENT_QUOTES)),
		);

		$this->m_dosen->save($data);

		echo json_encode(array("status" => TRUE));
	}

	public function edit($id)
	{
		$data = $this->db->get_where('tbl_user', ['id_user' => $id])->row();
		echo json_encode($data);
	}

	public function ajax_update()
	{
		$this->_validate();
		$data = array(
			'nama_user' => str_replace("'", "", htmlspecialchars($this->input->post('nama', TRUE), ENT_QUOTES)),
			'email_user' => str_replace("'", "", htmlspecialchars($this->input->post('email', TRUE), ENT_QUOTES)),
			'telepon_user' => str_replace("'", "", htmlspecialchars($this->input->post('no_telepon', TRUE), ENT_QUOTES)),
			'kewarganegaraan' => str_replace("'", "", htmlspecialchars($this->input->post('kewarganegaraan', TRUE), ENT_QUOTES)),
			'alamat_user' => str_replace("'", "", htmlspecialchars($this->input->post('alamat', TRUE), ENT_QUOTES)),
			'kota' => str_replace("'", "", htmlspecialchars($this->input->post('kota', TRUE), ENT_QUOTES)),
			'negara' => str_replace("'", "", htmlspecialchars($this->input->post('negara', TRUE), ENT_QUOTES)),
			'kode_pos' => str_replace("'", "", htmlspecialchars($this->input->post('kode_pos', TRUE), ENT_QUOTES)),
			'nidn' => str_replace("'", "", htmlspecialchars($this->input->post('nidn', TRUE), ENT_QUOTES)),
			'prodi' => str_replace("'", "", htmlspecialchars($this->input->post('prodi', TRUE), ENT_QUOTES)),
		);
		
		$this->m_dosen->updateData(array('id_user' => $this->input->post('id')), $data);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_delete($id)
	{
		//delete file
		$dosen = $this->db->get_where('tbl_user', ['id_user' => $id])->row();
		if (file_exists('assets/images/scan-ktp/' . $dosen->scan_ktp) && $dosen->scan_ktp) {
			unlink('assets/images/scan-ktp/' . $dosen->scan_ktp);
		}

		$this->m_dosen->deleteData($id);
		echo json_encode(array("status" => TRUE));
	}

	public function ajax_detail($id)
	{
		$data = $this->db->query("SELECT * FROM tbl_user LEFT JOIN tbl_kota ON tbl_user.kota = tbl_kota.id_kota LEFT JOIN tbl_negara ON tbl_user.negara = tbl_negara.id_negara WHERE id_user = '$id'")->row();
		echo json_encode($data);
	}

	private function _do_upload()
	{

		$nameFile 				 = "KTP-" . time();
		$config['upload_path'] 	 = "./assets/images/scan-ktp";
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']      = 5000; //set max size allowed in Kilobyte
		$config['max_width']     = 5000; // set max width image allowed
		$config['max_height']    = 5000; // set max height allowed
		$config['file_name'] 	 = $nameFile; //just milisecond timestamp fot unique name

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('scan_ktp')) //upload and validate
		{
			$data['inputerror'][] = 'scan_ktp';
			$data['error_string'][] = 'Upload error: ' . $this->upload->display_errors('', ''); //show ajax error
			$data['status'] = FALSE;
			echo json_encode($data);
			exit();
		}
		return $this->upload->data('file_name');
	}

	private function _validate()
	{
		$data = [];
		$data['error_string'] = [];
		$data['inputerror'] = [];
		$data['status'] = TRUE;

		if ($this->input->post('nidn') == '') {
			$data['inputerror'][] = 'nidn';
			$data['error_string'][] = 'Silakan isi NIDN terlebih dahulu!';
			$data['status'] = FALSE;
		} else if (strlen($this->input->post('nidn')) > 15) {
			$data['inputerror'][] = 'nidn';
			$data['error_string'][] = 'Maksimal NIDN 15 karakter';
			$data['status'] = FALSE;
		}

		if ($this->input->post('nama') == '') {
			$data['inputerror'][] = 'nama';
			$data['error_string'][] = 'Silakan isi nama terlebih dahulu!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('email') == '') {
			$data['inputerror'][] = 'email';
			$data['error_string'][] = 'Silakan isi email terlebih dahulu!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('no_telepon') == '') {
			$data['inputerror'][] = 'no_telepon';
			$data['error_string'][] = 'Silakan isi no telepon terlebih dahulu!';
			$data['status'] = FALSE;
		} elseif (strlen($this->input->post('no_telepon')) > 13) {
			$data['inputerror'][] = 'no_telepon';
			$data['error_string'][] = 'Maksimal no telepon 13 karakter';
			$data['status'] = FALSE;
		}

		if ($this->input->post('alamat') == '') {
			$data['inputerror'][] = 'alamat';
			$data['error_string'][] = 'Silakan isi alamat terlebih dahulu!';
			$data['status'] = FALSE;
		}

		if ($this->input->post('kode_pos') == '') {
			$data['inputerror'][] = 'kode_pos';
			$data['error_string'][] = 'Silakan isi kode pos terlebih dahulu!';
			$data['status'] = FALSE;
		} elseif (strlen($this->input->post('kode_pos')) > 6) {
			$data['inputerror'][] = 'kode_pos';
			$data['error_string'][] = 'Maksimal kode pos 6 karakter';
			$data['status'] = FALSE;
		}

		if ($data['status'] === FALSE) {
			echo json_encode($data);
			exit();
		}
	}

	public function store()
	{
		$data = $_POST["image"];

		$image_array_1 = explode(";", $data);

		$image_array_2 = explode(",", $image_array_1[1]);

		$data = base64_decode($image_array_2[1]);

		$imageName = time() . '.png';

		file_put_contents($imageName, $data);

		$image_file = addslashes(file_get_contents($imageName));

		$save = $this->m_dosen->insert(['title' =>  $image_file]);

		$response = [
			'success' => true,
			'data' => $save,
			'msg' => "Crop Image has been uploaded successfully in codeigniter"
		];


		return $this->response->setJSON($response);
	}
}
