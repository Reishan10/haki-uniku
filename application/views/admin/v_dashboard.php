<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-4 mb-sm-0">
			<span class="text-uppercase page-subtitle">HAKI UNIKU</span>
			<h3 class="page-title">Dashboard</h3>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Small Stats Blocks -->
	<div class="row">
		<div class="col-12 col-md-6 col-lg-6 mb-4">
			<div class="stats-small card card-small">
				<div class="card-body px-0 pb-0">
					<div class="d-flex px-3">
						<div class="stats-small__data">
							<span class="stats-small__label mb-1 text-uppercase">Total Permohonan</span>
							<h6 class="stats-small__value count m-0"><?= $total_permohonan; ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-12 col-md-6 col-lg-6 mb-4">
			<div class="stats-small card card-small">
				<div class="card-body px-0 pb-0">
					<div class="d-flex px-3">
						<div class="stats-small__data">
							<span class="stats-small__label mb-1 text-uppercase">Total HAKI diterima</span>
							<h6 class="stats-small__value count m-0"><?= $total_diterima; ?></h6>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Permohonan</h6>
					<a href="<?= base_url('dashboard/export_pdf_permohonan') ?>" style="float: right;" class="btn btn-danger">
						Export PDF
					</a>
					<a href="<?= base_url('dashboard/export_excel_permohonan') ?>" style="float: right;" class="btn btn-success mr-2">
						Export Excel
					</a>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Judul</th>
									<th scope="col" class="border-0">Jenis</th>
									<th scope="col" class="border-0">Subjenis</th>
									<th scope="col" class="border-0">Tanggal Permohonan</th>
									<th scope="col" class="border-0">Status</th>
									<th scope="col" class="border-0">User</th>
								</tr>
							</thead>
							<tbody>
								<?php
								$no = 1;
								foreach ($data_permohonan as $row) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $row->permohonan_judul; ?></td>
										<td><?= $row->nama_jenis_permohonan; ?></td>
										<td><?= $row->nama_subjenis; ?></td>
										<td><?= $row->permohonan_tanggal; ?></td>
										<td><?= $row->permohonan_status == '0' ? 'Ditolak' : 'Diterima' ?></td>
										<td><?= $row->nama_user; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Permohonan Di Terima</h6>
					<a href="<?= base_url('dashboard/export_pdf_diterima') ?>" style="float: right;" class="btn btn-danger">
						Export PDF
					</a>
					<a href="<?= base_url('dashboard/export_excel_diterima') ?>" style="float: right;" class="btn btn-success mr-2">
						Export Excel
					</a>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Judul</th>
									<th scope="col" class="border-0">Jenis</th>
									<th scope="col" class="border-0">Subjenis</th>
									<th scope="col" class="border-0">Tanggal Permohonan</th>
									<th scope="col" class="border-0">Status</th>
									<th scope="col" class="border-0">User</th>
								</tr>
							</thead>
							<tbody id="tbl_data">
								<?php
								$no = 1;
								foreach ($data_permohonan_diterima as $row) : ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><?= $row->permohonan_judul; ?></td>
										<td><?= $row->nama_jenis_permohonan; ?></td>
										<td><?= $row->nama_subjenis; ?></td>
										<td><?= $row->permohonan_tanggal; ?></td>
										<td><?= $row->permohonan_status == '0' ? 'Ditolak' : 'Diterima' ?></td>
										<td><?= $row->nama_user; ?></td>
									</tr>
								<?php endforeach; ?>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">HAKI Setiap Prodi</h6>
					<div class="row mt-2">
						<div class="col-md-3">
							<select name="" id="prodi_haki" class="form-control">
								<option value="">Pilih Prodi</option>
								<?php foreach ($prodi as $row) : ?>
									<option value="<?php echo $row->prodi_nama ?>" class="text-uppercase" required><?php echo $row->prodi_nama ?></option>
								<?php endforeach ?>
							</select>
						</div>
					</div>
					<a href="#" onclick="pdf_haki_prodi()" style="float: right;" class="btn btn-danger">
						Export PDF
					</a>
					<a href="<?= base_url('dashboard/export_excel_per_prodi') ?>" style="float: right;" class="btn btn-success mr-2">
						Export Excel
					</a>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0 haki" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Judul</th>
									<th scope="col" class="border-0">Jenis</th>
									<th scope="col" class="border-0">Subjenis</th>
									<th scope="col" class="border-0">Prodi</th>
									<th scope="col" class="border-0">Status</th>
									<th scope="col" class="border-0">User</th>
								</tr>
							</thead>
							<tbody id="tbl_data"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Permohonan Setiap Prodi</h6>
					<div class="row mt-2">
						<div class="col-md-3">
							<select name="" id="prodi_permohonan" class="form-control">
								<option value="0">Pilih Prodi</option>
								<?php foreach ($prodi as $row) : ?>
									<option value="<?php echo $row->prodi_nama ?>" class="text-uppercase" required><?php echo $row->prodi_nama ?></option>
								<?php endforeach ?>
							</select>

						</div>
					</div>
					<button onclick="pdf_per_prodi()" style="float: right;" class="btn btn-danger">
						Export PDF
					</button>
					<a href="#" onclick="excel_per_prodi()" style="float: right;" class="btn btn-success mr-2">
						Export Excel
					</a>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0 permohonan" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Judul</th>
									<th scope="col" class="border-0">Jenis</th>
									<th scope="col" class="border-0">Subjenis</th>
									<th scope="col" class="border-0">Prodi</th>
									<th scope="col" class="border-0">Status</th>
									<th scope="col" class="border-0">User</th>
								</tr>
							</thead>
							<tbody id="tbl_data permohonan_prodi"></tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/js/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/js/shards.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.sharrre.min.js"></script>
<script src="<?= base_url() ?>assets/js/scripts/extras.1.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/scripts/shards-dashboards.1.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/scripts/app/app-analytics-overview.1.3.1.min.js"></script>

<script>
	$(document).ready(function() {
		// prodi();
		$('#prodi_haki').change(function() {
			prodi_haki();
		});
		$('#prodi_permohonan').change(function() {
			prodi_permohonan();
		});
	});

	function prodi_haki() {
		var prodi = $('#prodi_haki').val();
		$.ajax({
			url: "<?= site_url('dashboard/get_prodi') ?>",
			data: {
				prodi: prodi
			},
			success: function(response) {
				$('.haki tbody').html(response);
			}
		});
	}

	function prodi_permohonan() {
		var prodi = $('#prodi_permohonan').val();
		$.ajax({
			url: "<?= site_url('dashboard/get_prodi') ?>",
			data: {
				prodi: prodi
			},
			success: function(response) {
				$('.permohonan tbody').html(response);
			}
		});
	}

	function pdf_haki_prodi() {
		var prodi = $('#prodi_haki').val();
		$.ajax({
			url: "<?= site_url('dashboard/export_pdf_haki_prodi') ?>",
			data: {
				prodi: prodi
			},
			success: function(response) {
				console.log(response);
			}
		});
	}

	function pdf_per_prodi() {
		var prodi = $('#prodi_permohonan').val();
		$.ajax({
			url: "<?= site_url('dashboard/export_pdf_per_prodi') ?>",
			data: {
				prodi: prodi
			},
			success: function(response) {
				console.log(response);
			}
		});
	}

	function excel_per_prodi() {
		var prodi = $('#prodi_permohonan').val();
		$.ajax({
			type: 'post',
			url: "<?= site_url('dashboard/export_excel_per_prodi') ?>",
			data: {
				prodi: prodi
			},
			success: function(response) {
				console.log(response);
			}
		});
	}
</script>
