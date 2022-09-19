<div class="container-fluid px-0">
	<div class="main-content-container container-fluid px-4">
		<div class="row">
			<div class="col-lg-12 mx-auto mt-1">
				<h5 class="text-uppercase mb-4"></h5>
				<!-- Edit User Details Card -->
				<div class="card card-small edit-user-details mb-4">
					<div class="card-header p-0" style="background: rgb(2,0,36);background: linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 25%, rgba(1,160,193,1) 100%);">
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12" style="height: 100px; margin-top: 60px; margin-left: 15px; margin-bottom: -20px">
										<div class="user-details__avatar"  style="margin-left: 10px; width: 70px; display: absolute;">
											<img src="<?= base_url() ?>assets/images/avatars/0.jpg" class="" alt="User Avatar" style="width: 100%">
										</div>
										<?php foreach ($user_id as $row) { ?>
											<h6 class="text-white text-uppercase" style="margin-top: -65px; margin-left: 100px;"><?= $row->nama_user ?></h6>
											<p class="text-white" style="margin-left: 100px; font-size: 12px; margin-top: -10px; font-family:Arial, Helvetica, sans-serif;"><?= ucwords($row->prodi) ?> - Universitas Kuningan</p>
											<p class="text-white" style="margin-left: 100px; font-size: 12px; margin-top: -30px; font-family:Arial, Helvetica, sans-serif;">NIDN.<?= $row->nidn ?></p>
										<?php } ?>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-12">
										<div class="card card-small col-md-5" style="margin-right: 50px; float: right; width: 130px; margin-top: 60px;">
											<div class="card-body">
												<div class="d-flex">
													<div class="stats-small__data">
														<span class="stats-small__label mb-1 text-uppercase" style="margin-right: -100px">Jumlah HKI</span>
														<?php foreach ($user_id as $key) { ?>
														<h6 class="stats-small__value count m-0"><strong><?= $this->db->get_where('tbl_permohonan', ['user_id' => $key->id_user, 'permohonan_status' => '1'])->num_rows() ?></h6>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
									
							</div>
						</div>

						
						<div class="card-body p-0">
							<div class="border-bottom clearfix d-flex">
								<ul class="nav nav-tabs border-0 mt-auto mx-4 pt-2">
									<li class="nav-item">
										<a class="nav-link active" href="<?= base_url() ?>dosen/detail/<?= $this->session->userdata('id_user') ?>">Dashboad</a>
									</li>
									<li class="nav-item">
										<a class="nav-link text-white" href="<?= base_url() ?>profile">Profile</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<!-- End Edit User Details Card -->
					<div class="row mt-3">
						<div class="col-lg-6">
							<div class="card mb-3">
								<div class="card-body">
									<span>Total HKI</span>
									<hr>
									<div class="text-center">
										<h2 class="text-warning"><strong><?= $this->db->get_where('tbl_permohonan', ['user_id' => $this->session->userdata('id_user'), 'permohonan_status' => '1'])->num_rows() ?></strong></h2>
										<p style="font-size: 10px;">HKI</p>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-6">
							<div class="card mb-3">
								<div class="card-body">
									<span>Total Permohonan</span>
									<hr>
									<div class="text-center">
										<h2 class="text-warning"><strong><?= $this->db->get_where('tbl_permohonan', ['user_id' => $this->session->userdata('id_user'), 'permohonan_status' => '0'])->num_rows() ?></strong></h2>
										<p style="font-size: 10px;">HKI</p>
									</div>
								</div>
							</div>
						</div>
						<!-- <div class="col-lg-8">
							<div class="card mb-3">
								<div class="card-body">
									<span class="mb-4">Publikasi</span>
									<hr>
									<div class="row">
										<div class="col-md-3 text-center">
											<p>Total Permohonan</p>
											<h2 class="text-warning"><strong><?= $this->db->get_where('tbl_permohonan', ['user_id' => $this->session->userdata('id_user'), 'permohonan_status' => '0'])->num_rows() ?></strong></h2>
											<p style="font-size: 10px;">HKI</p>
										</div> -->
										<!-- <div class="col-md-2 d-flex flex-column m-auto" style="font-size: 10px;">
											<table>
												<tr>
													<td>H-index</td>
													<td>:</td>
													<td>0</td>
												</tr>
												<tr>
													<td>G-index</td>
													<td>:</td>
													<td>0</td>
												</tr>
												<tr>
													<td>i10-index</td>
													<td>:</td>
													<td>0</td>
												</tr>
												<tr>
													<td>Cited Docs</td>
													<td>:</td>
													<td>0</td>
												</tr>
											</table>
										</div>
										<div class="col-md-3 text-right d-flex flex-column m-auto">
											<h4 class="text-warning mt-5">Scopus</h4>
											<p style="font-size: 11px;">Scopus ID <strong>#123456789</strong></p>
											<a href="" class="btn btn-outline-danger"><i class="fas fa-trash"></i> Reset Scopus</a>
										</div> -->
									<!-- </div>
								</div>
							</div>
						</div> -->
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
