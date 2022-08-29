<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Daftarpermohonan extends CI_Controller
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
		$this->load->model('m_dosen');
		$this->load->library('upload');
	}

	public function index()
	{
		$data['user'] = $this->db->select('tbl_kota.*, tbl_provinsi.*, tbl_user.*, tbl_user.kode_pos as kode_pos')->where('tbl_user.kota = tbl_kota.id_kota')->where('tbl_kota.id_provinsi = tbl_provinsi.id_provinsi')->get_where('tbl_user, tbl_kota, tbl_provinsi', ['email_user' => $this->session->userdata('email_user')])->row();

		if ($this->session->userdata('role') == "user") {
			$data['data']   = $this->m_permohonan->select('', '', '', $this->session->userdata('id_user'))->result();
		} else {
			$data['data']   = $this->m_permohonan->select()->result();
		}
		$data['title'] = "Daftar";
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_sidebar');
		$this->load->view('templates/v_navbar', $data);
		$this->load->view('admin/v_permohonan_list', $data);
		$this->load->view('templates/v_footer');
	}

	public function uploadberkas($id = '')
	{
		$dataHaki = @$this->m_permohonan->select($id)->row();
		$dataTemplate = @$this->m_permohonan->selectLampiran('', $id)->row();
		$config['upload_path']		= './assets/files/'; //path folder
		$config['allowed_types']	= 'pdf|doc|docx'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name']		= TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);

		$data['permohonan_id']  = $id;

		if ($this->upload->do_upload("surat_pengalihan_hak_cipta")) {
			$image = $this->upload->data();
			$data['surat_pengalihan_hak_cipta'] =  $image['file_name'];
		} else {
			$data['surat_pengalihan_hak_cipta'] =  @$dataTemplate->surat_pengalihan_hak_cipta;
			// $this->session->set_flashdata("msg", swal('err', $this->upload->display_errors()));
		}

		if ($this->upload->do_upload("template_surat_pernyataan")) {
			$image = $this->upload->data();
			$data['template_surat_pernyataan'] =  $image['file_name'];
		} else {
			$data['template_surat_pernyataan'] =  @$dataTemplate->template_surat_pernyataan;
			// $this->session->set_flashdata("msg", swal('err', $this->upload->display_errors()));
		}

		$result = $this->m_permohonan->adminUpdateLampiran($data);

		if ($this->upload->do_upload("file_haki")) {
			$image = $this->upload->data();
			$data['file_haki'] =  $image['file_name'];

			$result = $this->m_permohonan->adminUpdateHaki($data);
		} else {
			$data['file_haki'] =  @$dataHaki->file_haki;
			// $this->session->set_flashdata("msg", swal('err', $this->upload->display_errors()));
		}



		if ($result) {
		}

		redirect('daftarpermohonan');
	}

	public function userUploadberkas($id = '')
	{
		$dataTemplate = @$this->m_permohonan->selectLampiran('', $id)->row();
		$config['upload_path']		= './assets/files/'; //path folder
		$config['allowed_types']	= 'pdf|doc|docx|zip|pptx|ppt|xls|xlsx|rar|jpeg|jpg|png|bmp|mp3'; //type yang dapat diakses bisa anda sesuaikan
		$config['encrypt_name']		= TRUE; //nama yang terupload nantinya

		$this->upload->initialize($config);

		$data['permohonan_id']  = $id;

		if ($this->upload->do_upload("contoh_ciptaan")) {
			$image = $this->upload->data();
			$data['contoh_ciptaan'] =  $image['file_name'];
		} else {
			$data['contoh_ciptaan'] =  @$dataTemplate->contoh_ciptaan;
			// $this->session->set_flashdata("msg", swal('err', $this->upload->display_errors()));
		}

		$result = $this->m_permohonan->userUpdateLampiran($data);

		if ($result) {
		}

		redirect('daftarpermohonan');
	}

	public function delete($id = '')
	{
		$result = $this->m_permohonan->delete($id);

		redirect('daftarpermohonan');
	}
}
