<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 text-center mb-0">
			<!-- <span class="text-uppercase page-subtitle">Blog Posts</span> -->
			<h5 class="text-uppercase">permohonan pencatatan ciptaan secara elektronik</h5>
		</div>
	</div>
	<!-- End Page Header -->
	<form method="POST" action="<?= base_url() ?>permohonan/tambahDataDetail">
		<div class="row">
			<div class="col-lg-12 col-md-12">
				<!-- Add New Post Form -->
				<div class="card card-small mb-3">
					<div class="card-body">
						<span class="text-uppercase page-subtitle p-2">Detail</span>
						<hr>
						<div class="form-group row mt-3">
							<label for="staticEmail" class="col-sm-2 col-form-label">Jenis Permohonan <span class="text-danger">*</span></label>
							<div class="col-sm-10">
								<select name="jenis_permohonan" id="jenis_permohonan" class="form-control select2">
									<option value="">---</option>
									<?php foreach ($jenis_permohonan as $row) { ?>
										<option value="<?= $row->id_jenis_permohonan ?>"><?= $row->nama_jenis_permohonan ?></option>
									<?php } ?>
								</select>
								<?= form_error('jenis_permohonan', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-2 col-form-label">Jenis Ciptaan <span class="text-danger">*</span></label>
							<div class="col-sm-10">
								<select name="jenis_ciptaan" id="jenis_ciptaan" class="form-control select2">
									<option value="">---</option>
									<?php foreach ($jenis as $row) { ?>
										<option value="<?= $row->id_jenis ?>"><?= $row->nama_jenis ?></option>
									<?php } ?>
								</select>
								<?= form_error('jenis_ciptaan', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="staticEmail" class="col-sm-2 col-form-label">Sub-Jenis Ciptaan <span class="text-danger">*</span></label>
							<div class="col-sm-10">
								<select name="subjenis_ciptaan" id="subjenis_ciptaan" class="form-control select2">
									<option value="">---</option>
								</select>
								<?= form_error('subjenis_ciptaan', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="judul" class="col-sm-2 col-form-label">Judul <span class="text-danger">*</span></label>
							<div class="col-sm-10">
								<input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="<?= $this->session->userdata('judul') != '' ? $this->session->userdata('judul') : set_value('judul') ?>">
								<?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="uraian" class="col-sm-2 col-form-label">Uraian Singkat Ciptaan <span class="text-danger">*</span></label>
							<div class="col-sm-10">
								<textarea name="uraian" id="uraian" rows="3" na class="form-control"><?= $this->session->userdata('uraian') != '' ? $this->session->userdata('uraian') : set_value('uraian') ?></textarea>
								<?= form_error('uraian', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>
						<div class="form-group row">
							<label for="tgl_pertama" class="col-sm-2 col-form-label">Tanggal Pertama Kali Diumumkan <span class="text-danger">*</span></label>
							<div class="col-sm-10">
								<input type="date" name="tgl_pertama" id="tgl_pertama" class="form-control selector" value="<?= $this->session->userdata('tgl_pertama') != '' ? $this->session->userdata('tgl_pertama') : date("Y-m-d") ?>">
								<?= form_error('tgl_pertama', '<small class="text-danger">', '</small>'); ?>
							</div>
						</div>

					</div>
				</div>
				<!-- / Add New Post Form -->
			</div>
		</div>
	</form>


	<div class="row">
		<div class="col-lg-12 col-md-12">
			<!-- Add New Post Form -->
			<div class="card card-small mb-3">
				<div class="card-body">
					<span class="text-uppercase page-subtitle p-2">Data Pencipta</span>
					<a href="" class="btn btn-warning" style="float: right;" data-toggle="modal" data-target="#penciptaModal" onclick="submit('tambah')">Tambah</a>
					<hr>
					<form>
						<table class="transaction-history d-none" id="table">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Kewarganegaraan</th>
									<th>Alamat</th>
									<th>Kode Pos</th>
									<th>Kota</th>
									<th>Provinsi</th>
									<th>Email/No. Telp</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<!-- <tbody>
                            </tbody> -->
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>


	<div class="row">
		<div class="col-lg-12 col-md-12">
			<!-- Add New Post Form -->
			<div class="card card-small mb-3">
				<div class="card-body">
					<span class="text-uppercase page-subtitle p-2">Data Pemegang Hak Cipta</span>
					<a href="" class="btn btn-warning" style="float: right;" data-toggle="modal" data-target="#pemegangModal">Tambah</a>
					<hr>
					<form>
						<table class="transaction-history d-none" id="table">
							<thead>
								<tr>
									<th>Nama</th>
									<th>Kewarganegaraan</th>
									<th>Alamat</th>
									<th>Kode Pos</th>
									<th>Kota</th>
									<th>Provinsi</th>
									<th>Email/No. Telp</th>
									<th>Aksi</th>
								</tr>
							</thead>
							<!-- <tbody>
                                            </tbody> -->
						</table>
					</form>
				</div>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-lg-12 col-md-12">
			<!-- Add New Post Form -->
			<div class="card card-small mb-3">
				<div class="card-body">
					<span class="text-uppercase page-subtitle p-2">Lampiran</span>
					<hr>
					<form>
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Contoh Ciptaan</label>
									<input type="file" name="" id="" class="form-control">
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="">Contoh Ciptaan (Link)</label>
									<textarea name="" id="" rows="1" class="form-control" placeholder="URL"></textarea>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
			<a href="" class="btn btn-warning mb-2 ml-2" style="float: right;" data-toggle="modal" data-target="#pertinjauModal">Submit</a>
		</div>
	</div>
</div>

<!-- Modal Pencipta -->
<div class="modal fade" id="penciptaModal" role="dialog" aria-labelledby="penciptaModalLabel" aria-hidden="true">
	<<<<<<< HEAD <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="penciptaModalLabel"></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<h6>Data Pencipta</h6>
					<hr>
					<div class="form-group row mt-3">
						<label for="nama" class="col-sm-4 col-form-label">Nama <span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="email" class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-8">
							<input type="email" name="email" id="email" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="no_telepon" class="col-sm-4 col-form-label">No Telepon</label>
						<div class="col-sm-8">
							<input type="number" name="no_telepon" id="no_telepon" class="form-control" placeholder="No Telepon">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="kewarganegaraan" class="col-sm-4 col-form-label">Kewarganegaraan</label>
						<div class="col-sm-8">
							<select name="kewarganegaraan" id="kewarganegaraan" class="form-control select2">
								<option value="">---</option>
								<?php foreach ($negara as $row) { ?>
									<option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<hr>
					<h6>Alamat Pencipta</h6>
					<hr>
					<div class="form-group row mt-3">
						<label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
						<div class="col-sm-8">
							<textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" placeholder="Alamat"></textarea>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="provinsi" class="col-sm-4 col-form-label">Provinsi</label>
						<div class="col-sm-8">
							<select name="provinsi" id="provinsi" class="form-control select2">
								<option value="">---</option>
								<?php foreach ($provinsi as $row) { ?>
									<option value="<?= $row->id_provinsi ?>"><?= $row->nama_provinsi ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="kota" class="col-sm-4 col-form-label">Kota</label>
						<div class="col-sm-8">
							<select name="kota" id="kota" class="form-control select2">
								<option value="">---</option>
								<?php foreach ($kota as $row) { ?>
									<option value="<?= $row->id_kota ?>"><?= $row->nama_kota ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="negara" class="col-sm-4 col-form-label">Negara</label>
						<div class="col-sm-8">
							<select name="negara" id="negara" class="form-control select2">
								<option value="">---</option>
								<?php foreach ($negara as $row) { ?>
									<option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="kode_pos" class="col-sm-4 col-form-label">Kode Pos</label>
						<div class="col-sm-8">
							<input type="text" name="kode_pos" id="kode_pos" class="form-control" placeholder="Kode Pos">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-warning" id="btn-tambah" onclick="tambahDataPencipta()">Simpan</button>
				<button type="button" class="btn btn-warning" id="btn-ubah" onclick="ubahDataPencipta()">Ubah</button>
			</div>
		</div>
</div>
=======
<div class="modal-dialog" role="document">
	<div class="modal-content">
		<div class="modal-header">
			<h6 class="modal-title" id="penciptaModalLabel"></h6>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		<div class="modal-body">
			<form>
				<h6>Data Pencipta</h6>
				<hr>
				<div class="form-group row mt-3">
					<label for="nidn" class="col-sm-4 col-form-label">NIDN/NIM <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<input type="text" name="nidn" id="nidn" class="form-control" placeholder="NIDN" list="nidn_list" onchange="selectData()">
						<datalist id="nidn_list">
							<?php $dataJenis = $this->db->get('tbl_user'); ?>
							<?php foreach ($dataJenis->result() as $key) { ?>
								<option value="<?= $key->nidn ?>"><?= $key->nidn ?> - <?= $key->nama_user ?></option>
							<?php } ?>
						</datalist>
					</div>
				</div>
				<div class="form-group row mt-3">
					<label for="nama" class="col-sm-4 col-form-label">Nama <span class="text-danger">*</span></label>
					<div class="col-sm-8">
						<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
					</div>
				</div>
				<div class="form-group row mt-3">
					<label for="email" class="col-sm-4 col-form-label">Email</label>
					<div class="col-sm-8">
						<input type="email" name="email" id="email" class="form-control" placeholder="Email">
					</div>
				</div>
				<div class="form-group row mt-3">
					<label for="no_telepon" class="col-sm-4 col-form-label">No Telepon</label>
					<div class="col-sm-8">
						<input type="number" name="no_telepon" id="no_telepon" class="form-control" placeholder="No Telepon">
					</div>
				</div>
				<div class="form-group row mt-3">
					<label for="kewarganegaraan" class="col-sm-4 col-form-label">Kewarganegaraan</label>
					<div class="col-sm-8">
						<select name="kewarganegaraan" id="kewarganegaraan" class="form-control select2">
							<option value="">---</option>
							<?php foreach ($negara as $row) { ?>
								<option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<hr>
				<h6>Alamat Pencipta</h6>
				<hr>
				<div class="form-group row mt-3">
					<label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
					<div class="col-sm-8">
						<textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" placeholder="Alamat"></textarea>
					</div>
				</div>
				<div class="form-group row mt-3">
					<label for="provinsi" class="col-sm-4 col-form-label">Provinsi</label>
					<div class="col-sm-8">
						<select name="provinsi" id="provinsi" class="form-control select2">
							<option value="">---</option>
							<?php foreach ($provinsi as $row) { ?>
								<option value="<?= $row->id_provinsi ?>"><?= $row->nama_provinsi ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group row mt-3">
					<label for="kota" class="col-sm-4 col-form-label">Kota</label>
					<div class="col-sm-8">
						<select name="kota" id="kota" class="form-control select2">
							<option value="">---</option>
							<?php foreach ($kota as $row) { ?>
								<option value="<?= $row->id_kota ?>"><?= $row->nama_kota ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group row mt-3">
					<label for="negara" class="col-sm-4 col-form-label">Negara</label>
					<div class="col-sm-8">
						<select name="negara" id="negara" class="form-control select2">
							<option value="">---</option>
							<?php foreach ($negara as $row) { ?>
								<option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
							<?php } ?>
						</select>
					</div>
				</div>
				<div class="form-group row mt-3">
					<label for="kode_pos" class="col-sm-4 col-form-label">Kode Pos</label>
					<div class="col-sm-8">
						<input type="text" name="kode_pos" id="kode_pos" class="form-control" placeholder="Kode Pos">
					</div>
				</div>
			</form>
		</div>
		<div class="modal-footer">
			<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
			<button type="button" class="btn btn-warning" id="btn-tambah" onclick="tambahDataPencipta()">Simpan</button>
			<button type="button" class="btn btn-warning" id="btn-ubah" onclick="ubahDataPencipta()">Ubah</button>
		</div>
	</div>
</div>
>>>>>>> 6a3da398f7047cb450e1701037e562d13d6872cc
</div>

<!-- Modal Pemegang -->
<div class="modal fade" id="pemegangModal" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLongTitle">Tambah Pemegang Hak Cipta</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form>
					<h6>Data Pemegang Hak Cipta</h6>
					<hr>
					<div class="form-group row mt-3">
						<label for="staticEmail" class="col-sm-4 col-form-label">Nama <span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="text" name="" id="" class="form-control" placeholder="Nama">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="staticEmail" class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-8">
							<input type="email" name="" id="" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="staticEmail" class="col-sm-4 col-form-label">No Telepon</label>
						<div class="col-sm-8">
							<input type="number" name="" id="" class="form-control" placeholder="No Telepon">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="staticEmail" class="col-sm-4 col-form-label">Kewarganegaraan</label>
						<div class="col-sm-8">
							<select name="" id="" class="form-control select2">
								<option value="">Indonesia</option>
								<option value="">Malaysia</option>
							</select>
						</div>
					</div>
					<hr>
					<h6>Alamat Pemegang</h6>
					<hr>
					<div class="form-group row mt-3">
						<label for="staticEmail" class="col-sm-4 col-form-label">Alamat</label>
						<div class="col-sm-8">
							<textarea name="" id="" cols="30" rows="2" class="form-control" placeholder="Alamat"></textarea>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="staticEmail" class="col-sm-4 col-form-label">Provinsi</label>
						<div class="col-sm-8">
							<select name="" id="" class="form-control select2">
								<option value="">---</option>
								<option value="">Jawa Barat</option>
								<option value="">Jawa Timur</option>
							</select>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="staticEmail" class="col-sm-4 col-form-label">Kota</label>
						<div class="col-sm-8">
							<input type="text" name="" id="" class="form-control" placeholder="Kota">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="staticEmail" class="col-sm-4 col-form-label">Negara</label>
						<div class="col-sm-8">
							<select name="" id="" class="form-control select2">
								<option value="">Indonesia</option>
								<option value="">Malaysia</option>
							</select>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="staticEmail" class="col-sm-4 col-form-label">Kode Pos</label>
						<div class="col-sm-8">
							<input type="text" name="" id="" class="form-control" placeholder="Kode Pos">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-warning">Save</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Lampiran -->
<div class="modal fade" id="pertinjauModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog modal-xl" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="exampleModalLongTitle">Pertinjau Permohonan Hak Cipta</h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form action="">
					<ul class="nav nav-tabs" id="myTab" role="tablist">
						<li class="nav-item">
							<a class="nav-link active" id="detail-tab" data-toggle="tab" href="#detail" role="tab" aria-controls="detail" aria-selected="true">Detail</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="dataPencipta-tab" data-toggle="tab" href="#dataPencipta" role="tab" aria-controls="dataPencipta" aria-selected="false">Pencipta Dan Pemegang Hak Cipta</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="lampiran-tab" data-toggle="tab" href="#lampiran" role="tab" aria-controls="lampiran" aria-selected="false">Lampiran</a>
						</li>
					</ul>
					<div class="tab-content" id="myTabContent">
						<div class="tab-pane fade show active" id="detail" role="tabpanel" aria-labelledby="detail-tab">
							<table class="table mb-0 table-responsive table-bordered" style="font-size: 12px;">
								<tr>
									<th>Jenis Permohonan</th>
									<td>UMK, Lembaga Pendidikan, Lembabaga Litbang Pemerintah</td>
								</tr>
								<tr>
									<th>Jenis Ciptaan</th>
									<td>Karya Tulis</td>
								</tr>
								<tr>
									<th>Sub Jenis Ciptaan</th>
									<td>Buku</td>
								</tr>
								<tr>
									<th>Judul</th>
									<td>Buku Pembelajaran</td>
								</tr>
								<tr>
									<th>Description</th>
									<td>Sumber Belajar</td>
								</tr>
								<tr>
									<th>Tanggal Pertama Kali Diumumkan</th>
									<td><?= date("Y-m-d") ?></td>
								</tr>
								<tr>
									<th>Negara Pertama Kali Diumumkan</th>
									<td>Indonesia</td>
								</tr>
								<tr>
									<th>Kota Pertama Kali Diumumkan</th>
									<td>Kuningan</td>
								</tr>
							</table>
						</div>
						<div class="tab-pane fade" id="dataPencipta" role="tabpanel" aria-labelledby="dataPencipta-tab">
							<table class="table mb-0 table-responsive table-bordered" style="font-size: 10px;">
								<p class="mb-2">Data Pencipta</p>
								<thead>
									<tr>
										<th>Nama</th>
										<th>Kewarganegaraan</th>
										<th>Alamat</th>
										<th>Kode Pos</th>
										<th>Kota</th>
										<th>Provinsi</th>
									</tr>
									<tr>
										<td>Nunu Nugraha</td>
										<td>Indonesia</td>
										<td>Jln. cut nya dien No.36</td>
										<td>45511</td>
										<td>Kab. Kuningan</td>
										<td>Jawa Barat</td>
									</tr>
								</thead>
							</table>
							<hr>
							<table class="table mb-0 table-responsive table-bordered" style="font-size: 10px;">
								<p class="mb-2">Data Pemegang Hak Cipta</p>
								<thead>
									<tr>
										<th>Nama</th>
										<th>Kewarganegaraan</th>
										<th>Alamat</th>
										<th>Kode Pos</th>
										<th>Kota</th>
										<th>Provinsi</th>
									</tr>
									<tr>
										<td>PUSHAKI Univesitas Kuningan</td>
										<td>Indonesia</td>
										<td>Jln. cut nya dien No.36</td>
										<td>45511</td>
										<td>Kab. Kuningan</td>
										<td>Jawa Barat</td>
									</tr>
								</thead>
							</table>
						</div>
						<div class="tab-pane fade" id="lampiran" role="tabpanel" aria-labelledby="lampiran-tab">
							<table class="table mb-0 table-responsive table-bordered" style="font-size: 12px;">
								<tr>
									<th>Salinan Resmi Akta Pendirian Badan Hukum</th>
									<td>Salinan Resmi.pdf</td>
								</tr>
								<tr>
									<th>Scan KTP Pemohon Dan Pencipta</th>
									<td>Ktp.pdf</td>
								</tr>
								<tr>
									<th>Surat Pernyataan</th>
									<td>Pernyataan.pdf</td>
								</tr>
								<tr>
									<th>Contoh Ciptaan</th>
									<td>Ciptaan.pdf</td>
								</tr>
							</table>
						</div>
					</div>
				</form>
				<hr>
				<p class="m-0">Apakah data diatas sesuai ?</p>
				<button type="button" class="btn btn-secondary mt-1" data-dismiss="modal">Close</button>
				<button type="button" class="btn btn-warning mt-1">Save</button>
			</div>
		</div>
		<div class="modal-footer">

		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<script>
	$('#jenis_ciptaan').change(function() {
		$.ajax({
			url: '<?= base_url() ?>permohonan/ambilDataSubjenis',
			type: 'POST',
			data: 'jenis_id=' + $(this).val(),
			success: function(response) {
				response = JSON.parse(response);
				let html = '';
				if (response.length > 0) {
					// swal.fire("Yeayyyy!", response.msg, "success");
					for (i = 0; i < response.length; i++) {
						html += `<option value="${response[i].id_subjenis}">${response[i].nama_subjenis}</option>`;
					}
					$('#subjenis_ciptaan').html(html);
				} else {
					html = '<option value="">---</option>';
					$('#subjenis_ciptaan').html(html);
					swal.fire("Ooppsss!", response.msg, "error");
				}
			},
			error: function(err) {
				swal.fire("Ooppsss!", "Kamu tidak tersambung ke server kami.", "error");
			}
		});
	})

	function htmlspecialchars(str) {
		return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
	}

	function tambahDataJenisPermohonan() {
		let jenis_permohonan = htmlspecialchars($('[name="jenis_permohonan"]').val());
		let jenis_ciptaan = htmlspecialchars($('[name="jenis_ciptaan"]').val());
		let subjenis_ciptaan = htmlspecialchars($('[name="subjenis_ciptaan"]').val());
		let judul = htmlspecialchars($('[name="judul"]').val());
		let uraian = htmlspecialchars($('[name="uraian"]').val());
		let tgl_pertama = htmlspecialchars($('[name="tgl_pertama"]').val());
		let kuasa = htmlspecialchars($('[name="kuasa"]:checked').val());

		$.ajax({
			url: '<?= base_url(); ?>permohonan/tambahDataDetail',
			type: 'POST',
			dataType: 'json',
			data: {
				jenis_permohonan: jenis_permohonan,
				jenis_ciptaan: jenis_ciptaan,
				subjenis_ciptaan: subjenis_ciptaan,
				judul: judul,
				uraian: uraian,
				tgl_pertama: tgl_pertama,
				kuasa: kuasa,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.jenis_permohonan-error').html(data.jenis_permohonan);
					$('.jenis_ciptaan-error').html(data.jenis_ciptaan);
					$('.subjenis_ciptaan-error').html(data.subjenis_ciptaan);
					$('.judul-error').html(data.judul);
					$('.uraian-error').html(data.uraian);
					$('.tgl_pertama-error').html(data.tgl_pertama);
					$('.kuasa-error').html(data.kuasa);

					$('.jenis_permohonan-error').show();
					$('.jenis_ciptaan-error').show();
					$('.subjenis_ciptaan-error').show();
					$('.judul-error').show();
					$('.uraian-error').show();
					$('.tgl_pertama-error').show();
					$('.kuasa-error').show();
				} else {
					$('.jenis_permohonan-error').hide();
					$('.jenis_ciptaan-error').hide();
					$('.subjenis_ciptaan-error').hide();
					$('.judul-error').hide();
					$('.uraian-error').hide();
					$('.tgl_pertama-error').hide();
					$('.kuasa-error').hide();

					window.location.href = "<?= base_url('permohonan/pencipta') ?>";
				}
			}
		})
	}

	function submit(type) {
		if (type == 'tambah') {
			$('#btn-tambah').show();
			$('#btn-ubah').hide();
			$('#penciptaModalLabel').text("Tambah Data Pencipta");
		} else if (type == 'tutup') {
			$('.jenis_permohonan-error').hide();
			$('[name="jenis_permohonan"]').val("");
			$('#modalJenisPermohonan').modal('hide');
		} else {
			$('#btn-tambah').hide();
			$('#btn-ubah').show();
			$('#penciptaModalLabel').text("Ubah Data Pencipta");

			$.ajax({
				type: 'POST',
				data: 'id=' + type,
				url: '<?= base_url(); ?>JenisPermohonan/ambilDataById',
				dataType: 'json',
				success: function(response) {
					$('[name="id"]').val(response[0].id_jenis_permohonan);
					$('[name="jenis_permohonan"]').val(response[0].nama_jenis_permohonan);
				}
			})
		}
	}

	function tambahDataPencipta() {
		let nama = htmlspecialchars($('[name="nama"]').val());
		let email = htmlspecialchars($('[name="email"]').val());
		let no_telepon = htmlspecialchars($('[name="no_telepon"]').val());
		let kewarganegaraan = htmlspecialchars($('[name="kewarganegaraan"]').val());
		let alamat = htmlspecialchars($('[name="alamat"]').val());
		let provinsi = htmlspecialchars($('[name="provinsi"]').val());
		let kota = htmlspecialchars($('[name="kota"]').val());
		let negara = htmlspecialchars($('[name="negara"]').val());
		let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

		$.ajax({
			url: '<?= base_url(); ?>JenisPermohonan/tambahData',
			type: 'POST',
			dataType: 'json',
			data: {
				nama: nama,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.nama-error').html(data.nama);
					$('.nama-error').show();
				} else {
					$('.nama-error').hide();

					$('[name="nama"]').val("");
					$('#modalJenisPermohonan').modal('hide');
					Swal.fire(
						'Good job!',
						'Data berhasil ditambahkan!',
						'success'
					)
					ambilData();
				}
			}
		})
	}
</script>
