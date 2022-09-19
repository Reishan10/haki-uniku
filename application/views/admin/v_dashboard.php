<style>
	@import url(https://fonts.googleapis.com/css?family=Droid+Serif:400,700);
	@import url(https://fonts.googleapis.com/css?family=Raleway:100,400,700);

	.pc-tab>input,
	.pc-tab section>div {
		display: none;
	}

	#tab1:checked~section .tab1,
	#tab2:checked~section .tab2,
	#tab3:checked~section .tab3 {
		display: block;
	}

	#tab1:checked~nav .tab1,
	#tab2:checked~nav .tab2,
	#tab3:checked~nav .tab3 {
		color: red;
	}

	/* Visual Styles */
	*,
	*:after,
	*:before {
		-webkit-box-sizing: border-box;
		-moz-box-sizing: border-box;
		box-sizing: border-box;
	}

	body {
		-webkit-font-smoothing: antialiased;
		background: #ecf0f1;
		font-family: "Raleway";
	}

	h1 {
		text-align: center;
		font-weight: 100;
		font-size: 60px;
		color: #e74c3c;
	}

	.pc-tab {
		width: 100%;
		max-width: 1080px;
		margin: 0 auto;
	}

	.pc-tab ul {
		list-style: none;
		margin: 0;
		padding: 0;
	}

	.pc-tab ul li label {
		font-family: "Raleway";
		float: left;
		padding: 15px 25px;
		border: 1px solid #ddd;
		border-bottom: 0;
		background: #eeeeee;
		color: #444;
	}

	.pc-tab ul li label:hover {
		background: #dddddd;
	}

	.pc-tab ul li label:active {
		background: #ffffff;
	}

	.pc-tab ul li:not(:last-child) label {
		border-right-width: 0;
	}

	.pc-tab section {
		font-family: "Droid Serif";
		clear: both;
	}

	.pc-tab section div {
		padding: 20px;
		width: 100%;
		border: 1px solid #ddd;
		background: #fff;
		line-height: 1.5em;
		letter-spacing: 0.3px;
		color: #444;
	}

	.pc-tab section div h2 {
		margin: 0;
		font-family: "Raleway";
		letter-spacing: 1px;
		color: #34495e;
	}

	#tab1:checked~nav .tab1 label,
	#tab2:checked~nav .tab2 label,
	#tab3:checked~nav .tab3 label {
		background: white;
		color: #111;
		position: relative;
	}

	#tab1:checked~nav .tab1 label:after,
	#tab2:checked~nav .tab2 label:after,
	#tab3:checked~nav .tab3 label:after {
		content: "";
		display: block;
		position: absolute;
		height: 2px;
		width: 100%;
		background: #ffffff;
		left: 0;
		bottom: -1px;
	}

</style>
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
		<div class="col-12 col-md-4 col-lg-4 mb-4">
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
		<div class="col-12 col-md-4 col-lg-4 mb-4">
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

		<div class="col-12 col-md-4 col-lg-4 mb-4">
			<div class="card ubd-stats card-small">
				<div class="card-header border-bottom">
					<h6 class="m-0">Pie Chart Fakultas</h6>
					<div class="block-handle"></div>
				</div>
				<div class="card-body d-flex flex-column">
					<canvas width="50" class="analytics-users-by-device mt-3 mb-4"></canvas>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col">
			<div class="pc-tab">
				<input checked="checked" id="tab1" type="radio" name="pct" />
				<input id="tab2" type="radio" name="pct" />
				<input id="tab3" type="radio" name="pct" />
				<nav>
					<ul>
						<li class="tab1">
							<label for="tab1">Permohonan</label>
						</li>
						<li class="tab2">
							<label for="tab2">Diterima</label>
						</li>
					</ul>
				</nav>
				<section>
					<div class="tab1">
						<div class="card">
							<div class="card-header">
								<form action="<?= base_url('dashboard/export_excel_per_prodi') ?>" method="post"
									id="frmPermohonan">

									<h6 class="m-0">Permohonan Setiap Prodi</h6>
									<div class="row">
										<div class="col-md-3">
											<select name="fakultas" id="fakultas" class="form-control fakultas">
												<option value="0">Pilih Fakultas</option>
												<?php $dataFak = $this->db->get_where('tbl_fakultas')->result();?>
												<?php foreach ($dataFak as $row) : ?>
												<option value="<?php echo $row->fakultas_nama ?>" class="" required>
													<?php echo ucwords($row->fakultas_nama) ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="col-md-3">
											<select name="prodi" id="prodi" class="form-control prodi">
												<option value="0">Pilih Prodi</option>
												<?php foreach ($prodi as $row) : ?>
												<option value="<?php echo $row->prodi_nama ?>" class="" required>
													<?php echo ucwords($row->prodi_nama) ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="col-md-3">
											<select name="tahun" id="tahun" class="form-control">
												<option value="">Pilih Tahun</option>
												<?php $date = date('Y')-1; ?>
												<?php for($i = $date; $i < $date+5; $i++){ ?>
												<option value="<?php echo $i ?>" class="" required>
													<?= $i ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-3">
											<button type="button" onclick="prodi_permohonan()" style="float: left;"
												class="btn btn-primary">
												Preview
											</button>
											<br />
											<br />
											<!-- <button type="button" onclick="pdf_per_prodi()" style="float: left;" class="btn btn-danger">
												Export PDF
											</button>
											<br/>
											<br/> -->
											<button type="submit" style="float: left;" class="btn btn-success mr-2">
												Export Excel
											</button>
										</div>
									</div>

								</form>
							</div>
							<!-- <div class="table-responsive"> -->
							<div class="card-body">
								<table class="table mb-0 permohonan" id="tabl">
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
							<!-- </div> -->
						</div>
					</div>
					<div class="tab2">
						<div class="card">
							<div class="card-header border-bottom">
								<form action="<?= base_url('dashboard/export_excel_haki_prodi') ?>" method="post"
									id="frmHaki">
									<h6 class="m-0">HAKI Setiap Prodi</h6>

									<div class="row">

										<div class="col-md-3">
											<select name="fakultas" id="fakultas_haki" class="form-control fakultas">
												<option value="0">Pilih Fakultas</option>
												<?php $dataFak = $this->db->get_where('tbl_fakultas')->result();?>
												<?php foreach ($dataFak as $row) : ?>
												<option value="<?php echo $row->fakultas_nama ?>" class="" required>
													<?php echo ucwords($row->fakultas_nama) ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="col-md-3">
											<select name="prodi" id="prodi_haki" class="form-control prodi">
												<option value="0">Pilih Prodi</option>
												<?php foreach ($prodi as $row) : ?>
												<option value="<?php echo $row->prodi_nama ?>" class="" required>
													<?php echo ucwords($row->prodi_nama) ?></option>
												<?php endforeach ?>
											</select>
										</div>
										<div class="col-md-3">
											<select name="tahun" id="tahun" class="form-control">
												<option value="">Pilih Tahun</option>
												<?php $date = date('Y')-1; ?>
												<?php for($i = $date; $i < $date+5; $i++){ ?>
												<option value="<?php echo $i ?>" class="" required>
													<?= $i ?></option>
												<?php } ?>
											</select>
										</div>
										<div class="col-md-3">

											<button type="button" onclick="prodi_hakis()" style="float: left;"
												class="btn btn-primary">
												Preview
											</button>
											<br />
											<br />
											<!-- <button type="button" onclick="pdf_haki_prodi()" style="" class="btn btn-danger">
											Export PDF
										</button>
										<br/>
										<br/> -->
											<button type="submit" style="" class="btn btn-success mr-2">
												Export Excel
											</button>
										</div>
									</div>
							</div>

							</form>
							<div class="card-body">
								<table class="table mb-0 haki" id="tabl">
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
				</section>
			</div>

		</div>
	</div>
	<div class="row">
		<div class="col">

		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/js/Chart.min.js"></script>
<script src="<?= base_url() ?>assets/js/shards.min.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.sharrre.min.js"></script>
<script src="<?= base_url() ?>assets/js/scripts/extras.1.3.1.min.js"></script>
<script src="<?= base_url() ?>assets/js/scripts/shards-dashboards.1.3.1.min.js"></script>
<!-- <script src="<?= base_url() ?>assets/js/scripts/app/app-analytics-overview.1.3.1.min.js"></script> -->

<script>
	$(document).ready(function () {
		prodi_hakis();
		prodi_permohonan();
	});

	$('#fakultas').change(function () {
		$.get('<?=base_url()?>dashboard/getProdi', 'fakultas=' + $('#fakultas').val(), function (data) {
			$('#prodi').html(data);
		})
	});
	$('#fakultas_haki').change(function () {
		$.get('<?=base_url()?>dashboard/getProdi', 'fakultas=' + $('#fakultas_haki').val(), function (data) {
			$('#prodi_haki').html(data);
		})
	});

	function prodi_hakis() {
		$.ajax({
			url: "<?= site_url('dashboard/get_prodi_haki') ?>",
			async: false,
			data: $('#frmHaki').serialize(),
			success: function (response) {
				$('.haki tbody').html(response);
			}
		});
	}

	function prodi_permohonan() {
		$.ajax({
			url: "<?= site_url('dashboard/get_prodi_permohonan') ?>",
			async: false,
			data: $('#frmPermohonan').serialize(),
			success: function (response) {
				$('.permohonan tbody').html(response);
			}
		});
	}

	function pdf_haki_prodi() {
		// var prodi = $('#prodi_haki').val();
		$.ajax({
			url: "<?= site_url('dashboard/export_pdf_haki_prodi') ?>",
			data: $('#frmHaki').serialize(),
			success: function (response) {
				console.log(response);
			}
		});
	}

	function pdf_per_prodi() {
		var prodi = $('#prodi_permohonan').val();
		$.ajax({
			url: "<?= site_url('dashboard/export_pdf_per_prodi') ?>",
			data: $('#frmPermohonan').serialize(),
			success: function (response) {
				console.log(response);
			}
		});
	}

	function excel_per_prodi() {
		var prodi = $('#prodi_permohonan').val();
		$.ajax({
			type: 'post',
			url: "<?= site_url('dashboard/export_excel_per_prodi') ?>",
			data: $('#frmPermohonan').serialize(),
			success: function (response) {
				console.log(response);
			}
		});
	}

	$('.haki, .permohonan').DataTable({
		columnDefs: [{
			className: "text-left",
			targets: [0]
		}, ]
	});
	var o = window.ShardsDashboards.colors;
	var n = {
		datasets: [{
			hoverBorderColor: o.white.toRGBA(1),
			data: <?=json_encode($chart['jumlah'])?>,
			backgroundColor: [o.primary.toRGBA(.9), o.primary.toRGBA(.5), o.primary.toRGBA(.3)]
        }],
        labels: <?=json_encode($chart['label'])?>
    }
	l = document.getElementsByClassName("analytics-users-by-device")[0];
        window.ubdChart = new Chart(l, {
            type: "doughnut",
            data: n,
            options: {
                legend: !1,
                cutoutPercentage: 80,
                tooltips: {
                    enabled: !1,
                    mode: "index",
                    position: "nearest"
                }
            }
        });
</script>
