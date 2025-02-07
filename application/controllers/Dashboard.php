<?php
defined('BASEPATH') or exit('No direct script access allowed');

require 'vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		if ($this->session->userdata('logged') == FALSE) {
			redirect('login');
		} else  if ($this->session->userdata('role') != 'admin') {
			redirect('403-forbidden');
		}
		$this->load->model('M_permohonan');
	}

	public function index()
	{
		$data['user'] = $this->db->get_where('tbl_user', ['email_user' => $this->session->userdata('email_user')])->row();
		$data['total_permohonan'] = $this->db->get('tbl_permohonan')->num_rows();
		$data['total_diterima'] = $this->db->get_where('tbl_permohonan', ['permohonan_status' => 1])->num_rows();
		$data['data_permohonan'] = $this->m_permohonan->select()->result();
		$data['data_permohonan_diterima'] = $this->m_permohonan->select('', '', '', '', '', '1');
		$data['prodi'] = $this->db->get('tbl_prodi')->result();
		$data['title'] = "Dashboard";
		$no = 0;
		$data['chart']['label'] = null;
		foreach ($data['data_permohonan_diterima']->result() as $key) {
			if (@in_array(ucwords($key->fakultas_nama), $data['chart']['label'])){
				@$data['chart']['jumlah'][array_search(ucwords($key->fakultas), $data['chart']['label'])]++;
			}else{
				$data['chart']['label'][$no]	= ucwords($key->fakultas_nama);
				$data['chart']['jumlah'][$no]	= 1;
				$no++;
			}
		}
		$this->load->view('templates/v_header', $data);
		$this->load->view('templates/v_sidebar');
		$this->load->view('templates/v_navbar', $data);
		$this->load->view('admin/v_dashboard', $data);
		$this->load->view('templates/v_footer');
	}

	public function getProdi()
	{
		$data = $this->input->get();

		$result = $this->db->get_where('tbl_prodi', ['fakultas_nama' => $data['fakultas']]);

		if ($result->num_rows() > 0) {
			foreach ($result->result() as $key) {
				?>
				<option value="<?=$key->prodi_nama?>"><?=ucwords($key->prodi_nama)?></option>
				<?php
			}
		}else{
			?>
			<option value="0">Tidak ada data</option>
			<?php
		}
	}

	public function get_prodi_haki()
	{
		$input = $this->input->get();

		if ($input['prodi'] != "0"){
			$data = $this->m_permohonan->select('', '', '', '', $input['prodi'], '1', $input['tahun'])->result();
		}else{
			$data = $this->m_permohonan->select('', '', '', '', '', '1', $input['tahun'])->result();
		}

		if (!empty($data)) {
			$no = 1;
			foreach ($data as $row) : ?>
				<tr>
					<td><?= $no++; ?></td>
					<td class="text-left"><?= $row->permohonan_judul; ?></td>
					<td><?= $row->nama_jenis_permohonan; ?></td>
					<td><?= $row->nama_subjenis; ?></td>
					<td><?= ucwords($row->prodi); ?></td>
					<td><?= $row->permohonan_status == '0' ? 'Pending' : 'Diterima' ?></td>
					<td><?= $row->nama_user; ?></td>
				</tr>
			<?php endforeach; ?>
		<?php
		} else {
		?>
			<tr>
				<td align="center" colspan="7">Tidak ada data</td>
			</tr>
			<?php
		}
	}

	public function get_prodi_permohonan()
	{
		$input = $this->input->get();

		if ($input['prodi'] != "0"){
			$data = $this->m_permohonan->select('', '', '', '', $input['prodi'], '0', $input['tahun'])->result();
		}else{
			$data = $this->m_permohonan->select('', '', '', '', '', '0', $input['tahun'])->result();
		}

		if (!empty($data)) {
			$no = 1;
			foreach ($data as $row) : ?>
				<tr>
					<td><?= $no++; ?></td>
					<td class="text-left"><?= $row->permohonan_judul; ?></td>
					<td><?= $row->nama_jenis_permohonan; ?></td>
					<td><?= $row->nama_subjenis; ?></td>
					<td><?= ucwords($row->prodi); ?></td>
					<td><?= $row->permohonan_status == '0' ? 'Pending' : 'Diterima' ?></td>
					<td><?= $row->nama_user; ?></td>
				</tr>
			<?php endforeach; ?>
		<?php
		} else {
		?>
			<tr>
				<td align="center" colspan="7">Tidak ada data</td>
			</tr>
<?php
		}
	}

	public function export_pdf_permohonan()
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		// title dari pdf
		$this->data['title_pdf'] = 'Laporan Permohonan Diterima';

		//data pdf
		$this->data['data_permohonan'] = $this->db->query("SELECT tbl_permohonan.*, tbl_jenis_permohonan.nama_jenis_permohonan, tbl_subjenis.nama_subjenis, tbl_user.nama_user FROM `tbl_permohonan` JOIN tbl_jenis_permohonan ON tbl_jenis_permohonan.id_jenis_permohonan = tbl_permohonan.permohonan_jenis JOIN tbl_subjenis ON tbl_subjenis.id_subjenis = tbl_permohonan.permohonan_subjenis JOIN tbl_user ON tbl_user.id_user = tbl_permohonan.user_id")->result();

		// filename dari pdf ketika didownload
		$file_pdf = 'laporan-permohonan';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";

		$html = $this->load->view('laporan/laporan_pdf', $this->data, true);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function export_excel_permohonan()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Judul');
		$sheet->setCellValue('C1', 'Jenis');
		$sheet->setCellValue('D1', 'Subjenis');
		$sheet->setCellValue('E1', 'Tanggal Permohonan');
		$sheet->setCellValue('F1', 'Status');
		$sheet->setCellValue('G1', 'User');

		$data_permohonan =  $this->db->query("SELECT tbl_permohonan.*, tbl_jenis_permohonan.nama_jenis_permohonan, tbl_subjenis.nama_subjenis, tbl_user.nama_user FROM `tbl_permohonan` JOIN tbl_jenis_permohonan ON tbl_jenis_permohonan.id_jenis_permohonan = tbl_permohonan.permohonan_jenis JOIN tbl_subjenis ON tbl_subjenis.id_subjenis = tbl_permohonan.permohonan_subjenis JOIN tbl_user ON tbl_user.id_user = tbl_permohonan.user_id")->result();
		$no = 1;
		$x = 2;
		foreach ($data_permohonan as $row) {
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->permohonan_judul);
			$sheet->setCellValue('C' . $x, $row->nama_jenis_permohonan);
			$sheet->setCellValue('D' . $x, $row->nama_subjenis);
			$sheet->setCellValue('E' . $x, $row->permohonan_tanggal);
			$sheet->setCellValue('F' . $x, $row->permohonan_status == '0' ? 'Pending' : 'Diterima');
			$sheet->setCellValue('G' . $x, $row->nama_user);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-permohonan';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}


	public function export_pdf_diterima()
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		// title dari pdf
		$this->data['title_pdf'] = 'Laporan Permohonan Diterima';

		//data pdf
		$this->data['data_permohonan'] = $this->db->query("SELECT tbl_permohonan.*, tbl_jenis_permohonan.nama_jenis_permohonan, tbl_subjenis.nama_subjenis, tbl_user.nama_user FROM `tbl_permohonan` JOIN tbl_jenis_permohonan ON tbl_jenis_permohonan.id_jenis_permohonan = tbl_permohonan.permohonan_jenis JOIN tbl_subjenis ON tbl_subjenis.id_subjenis = tbl_permohonan.permohonan_subjenis JOIN tbl_user ON tbl_user.id_user = tbl_permohonan.user_id WHERE tbl_permohonan.permohonan_status = 1")->result();

		// filename dari pdf ketika didownload
		$file_pdf = 'laporan-permohonan-diterima';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";

		$html = $this->load->view('laporan/laporan_pdf', $this->data, true);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function export_excel_diterima()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Judul');
		$sheet->setCellValue('C1', 'Jenis');
		$sheet->setCellValue('D1', 'Subjenis');
		$sheet->setCellValue('E1', 'Tanggal Permohonan');
		$sheet->setCellValue('F1', 'Status');
		$sheet->setCellValue('G1', 'User');

		$data_permohonan =  $this->db->query("SELECT tbl_permohonan.*, tbl_jenis_permohonan.nama_jenis_permohonan, tbl_subjenis.nama_subjenis, tbl_user.nama_user FROM `tbl_permohonan` JOIN tbl_jenis_permohonan ON tbl_jenis_permohonan.id_jenis_permohonan = tbl_permohonan.permohonan_jenis JOIN tbl_subjenis ON tbl_subjenis.id_subjenis = tbl_permohonan.permohonan_subjenis JOIN tbl_user ON tbl_user.id_user = tbl_permohonan.user_id WHERE tbl_permohonan.permohonan_status = 1")->result();
		$no = 1;
		$x = 2;
		foreach ($data_permohonan as $row) {
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->permohonan_judul);
			$sheet->setCellValue('C' . $x, $row->nama_jenis_permohonan);
			$sheet->setCellValue('D' . $x, $row->nama_subjenis);
			$sheet->setCellValue('E' . $x, $row->permohonan_tanggal);
			$sheet->setCellValue('F' . $x, $row->permohonan_status == '0' ? 'Pending' : 'Diterima');
			$sheet->setCellValue('G' . $x, $row->nama_user);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-permohonan-diterima';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function export_pdf_haki_prodi()
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		// title dari pdf
		$this->data['title_pdf'] = 'Laporan Permohonan HAKI PRODI';

		$input = $this->input->get();
		
		if ($input['prodi'] != "0"){
			$this->data['data_permohonan'] = $this->m_permohonan->select('', '', '', '', $input['prodi'], '1', $input['tahun'])->result();
		}else{
			$this->data['data_permohonan'] = $this->m_permohonan->select('', '', '', '', '', '1', $input['tahun'])->result();
		}
		// $prodi = $_GET['prodi'];
		// $this->data['data_permohonan'] = $this->db->query("SELECT tbl_permohonan.*, tbl_jenis_permohonan.nama_jenis_permohonan, tbl_subjenis.nama_subjenis, tbl_user.nama_user FROM `tbl_permohonan` JOIN tbl_jenis_permohonan ON tbl_jenis_permohonan.id_jenis_permohonan = tbl_permohonan.permohonan_jenis JOIN tbl_subjenis ON tbl_subjenis.id_subjenis = tbl_permohonan.permohonan_subjenis JOIN tbl_user ON tbl_user.id_user = tbl_permohonan.user_id WHERE tbl_user.prodi = '$prodi' AND tbl_permohonan.permohonan_status = 1")->result();

		// filename dari pdf ketika didownload
		$file_pdf = 'laporan-haki-prodi';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";

		$html = $this->load->view('laporan/laporan_pdf', $this->data, true);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function export_excel_haki_prodi()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Judul');
		$sheet->setCellValue('C1', 'Jenis');
		$sheet->setCellValue('D1', 'Subjenis');
		$sheet->setCellValue('E1', 'Tanggal Permohonan');
		$sheet->setCellValue('F1', 'Status');
		$sheet->setCellValue('G1', 'User');

		$input = $this->input->post();
		
		if ($input['prodi'] != "0"){
			$data_permohonan = $this->m_permohonan->select('', '', '', '', $input['prodi'], '1', $input['tahun'])->result();
		}else{
			$data_permohonan = $this->m_permohonan->select('', '', '', '', '', '1', $input['tahun'])->result();
		}
		// $prodi = $this->input->post('prodi_haki');
		// $data_permohonan =  $this->db->query("SELECT tbl_permohonan.*, tbl_jenis_permohonan.nama_jenis_permohonan, tbl_subjenis.nama_subjenis, tbl_user.nama_user, tbl_user.prodi FROM `tbl_permohonan` JOIN tbl_jenis_permohonan ON tbl_jenis_permohonan.id_jenis_permohonan = tbl_permohonan.permohonan_jenis JOIN tbl_subjenis ON tbl_subjenis.id_subjenis = tbl_permohonan.permohonan_subjenis JOIN tbl_user ON tbl_user.id_user = tbl_permohonan.user_id WHERE tbl_user.prodi = '$prodi' AND tbl_permohonan.permohonan_status = 1")->result();
		$no = 1;
		$x = 2;
		foreach ($data_permohonan as $row) {
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->permohonan_judul);
			$sheet->setCellValue('C' . $x, $row->nama_jenis_permohonan);
			$sheet->setCellValue('D' . $x, $row->nama_subjenis);
			$sheet->setCellValue('E' . $x, $row->prodi);
			$sheet->setCellValue('F' . $x, $row->permohonan_status == '0' ? 'Pending' : 'Diterima');
			$sheet->setCellValue('G' . $x, $row->nama_user);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-haki-prodi';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}

	public function export_pdf_per_prodi()
	{
		// panggil library yang kita buat sebelumnya yang bernama pdfgenerator
		$this->load->library('pdfgenerator');

		// title dari pdf
		$this->data['title_pdf'] = 'Laporan Permohonan Prodi';

		//data pdf
		
		$input = $this->input->get();
		
		if ($input['prodi'] != "0"){
			$this->data['data_permohonan'] = $this->m_permohonan->select('', '', '', '', $input['prodi'], '0', $input['tahun'])->result();
		}else{
			$this->data['data_permohonan'] = $this->m_permohonan->select('', '', '', '', '', '0', $input['tahun'])->result();
		}
		// $prodi = $_GET['prodi'];
		// $this->data['data_permohonan'] = $this->db->query("SELECT tbl_permohonan.*, tbl_jenis_permohonan.nama_jenis_permohonan, tbl_subjenis.nama_subjenis, tbl_user.nama_user, tbl_user.prodi FROM `tbl_permohonan` JOIN tbl_jenis_permohonan ON tbl_jenis_permohonan.id_jenis_permohonan = tbl_permohonan.permohonan_jenis JOIN tbl_subjenis ON tbl_subjenis.id_subjenis = tbl_permohonan.permohonan_subjenis JOIN tbl_user ON tbl_user.id_user = tbl_permohonan.user_id WHERE tbl_user.prodi = '$prodi' AND tbl_permohonan.permohonan_status = 0")->result();

		// filename dari pdf ketika didownload
		$file_pdf = 'laporan-permohonan-prodi';
		// setting paper
		$paper = 'A4';
		//orientasi paper potrait / landscape
		$orientation = "portrait";

		$html = $this->load->view('laporan/laporan_prodi', $this->data, true);

		// run dompdf
		$this->pdfgenerator->generate($html, $file_pdf, $paper, $orientation);
	}

	public function export_excel_per_prodi()
	{
		$spreadsheet = new Spreadsheet();
		$sheet = $spreadsheet->getActiveSheet();
		$sheet->setCellValue('A1', 'No');
		$sheet->setCellValue('B1', 'Judul');
		$sheet->setCellValue('C1', 'Jenis');
		$sheet->setCellValue('D1', 'Subjenis');
		$sheet->setCellValue('E1', 'Prodi');
		$sheet->setCellValue('F1', 'Status');
		$sheet->setCellValue('G1', 'User');

		// $prodi = $this->input->post('prodi_permohonan');
		$input = $this->input->post();
		
		if ($input['prodi'] != "0"){
			$data_permohonan = $this->m_permohonan->select('', '', '', '', $input['prodi'], '0', $input['tahun'])->result();
		}else{
			$data_permohonan = $this->m_permohonan->select('', '', '', '', '', '0', $input['tahun'])->result();
		}
		// $data_permohonan =  $this->db->query("SELECT tbl_permohonan.*, tbl_jenis_permohonan.nama_jenis_permohonan, tbl_subjenis.nama_subjenis, tbl_user.nama_user, tbl_user.prodi FROM `tbl_permohonan` JOIN tbl_jenis_permohonan ON tbl_jenis_permohonan.id_jenis_permohonan = tbl_permohonan.permohonan_jenis JOIN tbl_subjenis ON tbl_subjenis.id_subjenis = tbl_permohonan.permohonan_subjenis JOIN tbl_user ON tbl_user.id_user = tbl_permohonan.user_id WHERE tbl_user.prodi = '$prodi' AND tbl_permohonan.permohonan_status = 0")->result();
		$no = 1;
		$x = 2;
		foreach ($data_permohonan as $row) {
			$sheet->setCellValue('A' . $x, $no++);
			$sheet->setCellValue('B' . $x, $row->permohonan_judul);
			$sheet->setCellValue('C' . $x, $row->nama_jenis_permohonan);
			$sheet->setCellValue('D' . $x, $row->nama_subjenis);
			$sheet->setCellValue('E' . $x, $row->prodi);
			$sheet->setCellValue('F' . $x, $row->permohonan_status == '0' ? 'Pending' : 'Diterima');
			$sheet->setCellValue('G' . $x, $row->nama_user);
			$x++;
		}
		$writer = new Xlsx($spreadsheet);
		$filename = 'laporan-permohonan-prodi';

		header('Content-Type: application/vnd.ms-excel');
		header('Content-Disposition: attachment;filename="' . $filename . '.xlsx"');
		header('Cache-Control: max-age=0');

		$writer->save('php://output');
	}
}
