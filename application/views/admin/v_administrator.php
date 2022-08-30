<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Administrator</span>
			<h3 class="page-title">Data Administrator</h3>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Default Light Table -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Administrator</h6>
					<button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalAdministrator" onclick="submit('tambah')">
						Tambah Data
					</button>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0">#</th>
									<th scope="col" class="border-0">Nama</th>
									<th scope="col" class="border-0">Email</th>
									<th scope="col" class="border-0">No Telepon</th>
									<th scope="col" class="border-0">Aksi</th>
								</tr>
							</thead>
							<tbody id="tbl_data">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- End Default Light Table -->
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalAdministrator" role="dialog" aria-labelledby="modalAdministratorLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalAdministratorLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="submit('tutup')">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<form id="formAdd">
				<div class="row">
					<div class="col-md-6">
						<div class="form-group">
							<label for="nama">Nama Lengkap</label>
							<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
							<small class="text-danger nama-error"></small>
							<input type="hidden" name="id" value="">
						</div>
						<div class="form-group">
							<label for="email">Email</label>
							<input type="email" class="form-control" id="email" name="email" placeholder="Email">
							<small class="text-danger email-error"></small>
						</div>
						<div class="form-group">
							<label for="no_telepon">No Telepon</label>
							<input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon">
							<small class="text-danger no_telepon-error"></small>
						</div>
						<div class="form-group">
							<label for="kewarganegaraan">Kewarganegaraan</label>
							<select name="kewarganegaraan" id="kewarganegaraan" class="form-control select2">
								<option value="">-- Kewarganegaraan --</option>
								<?php foreach ($negara as $row) { ?>
									<option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
								<?php } ?>
							</select>
							<small class="text-danger kewarganegaraan-error"></small>
						</div>
						<div class="form-group">
							<label for="alamat">Alamat</label>
							<textarea name="alamat" id="alamat" name="alamat" class="form-control" rows="1" placeholder="Alamat"></textarea>
							<small class="text-danger alamat-error"></small>
						</div>
					</div>
					<div class="col-md-6">
						<div class="form-group">
							<label for="kota">Kota</label>
							<select name="kota" id="kota" class="form-control select2">
								<option value="">-- Kota --</option>
								<?php foreach ($kota as $row) { ?>
									<option value="<?= $row->id_kota ?>"><?= $row->type ?>. <?= $row->nama_kota ?></option>
								<?php } ?>
							</select>
							<small class="text-danger kota-error"></small>
						</div>
						<div class="form-group">
							<label for="negara">Negara</label>
							<select name="negara" id="negara" class="form-control select2">
								<option value="">-- Negara --</option>
								<?php foreach ($negara as $row) { ?>
									<option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
								<?php } ?>
							</select>
							<small class="text-danger negara-error"></small>
						</div>
						<div class="form-group">
							<label for="kode_pos">Kode Pos</label>
							<input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
							<small class="text-danger kode_pos-error"></small>
						</div>
						<div class="form-group">
							<label for="fakultas_nama">Fakultas</label>
							<select name="fakultas_nama" id="fakultas_nama" class="form-control select2">
								<option value="">-- Fakultas --</option>
								<?php foreach ($fakultas as $row) { ?>
									<option value="<?= $row->fakultas_nama ?>"><?= ucwords($row->fakultas_nama) ?></option>
								<?php } ?>
							</select>
							<small class="text-danger fakultas_nama-error"></small>
						</div>
						<div class="form-group">
							<label for="prodi">Program Studi</label>
							<select name="prodi" id="prodi" class="form-control select2">
								<option value="">-- Program Studi --</option>
								<!-- <?php foreach ($prodi as $row) { ?>
											<option value="<?= $row->prodi_nama ?>"><?= ucwords($row->prodi_nama) ?></option>
										<?php } ?> -->
							</select>
							<small class="text-danger prodi-error"></small>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
				<button type="button" class="btn btn-warning" id="btn-tambah" onclick="tambahDataAdministrators()">Tambah</button>
				<button type="button" class="btn btn-warning" id="btn-ubah" onclick="ubahDataAdministrators()">Ubah</button>
			</div>
				</form>
		</div>
	</div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalDetailLabel">Detail Author</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body table-responsive" id="modalUserDetail">
				<table class="table" id="tblDetail" style="font-size: 12px;">
				</table>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	ambilDatas();

	function htmlspecialchars(str) {
		return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
	}

	$('#fakultas_nama').change(function() {
		$.ajax({
			url: '<?= base_url() ?>administrator/ambilDataProdi',
			type: 'POST',
			data: 'fakultas_nama=' + $(this).val(),
			success: function(response) {
				response = JSON.parse(response);
				let html = '';
				if (response.length > 0) {
					// swal.fire("Yeayyyy!", response.msg, "success");
					html = '<option value="-">-- Program Studi --</option>';
					for (i = 0; i < response.length; i++) {
						html += `<option value="${response[i].prodi_nama}">${response[i].prodi_nama}</option>`;
					}
					$('#prodi').html(html);
				} else {
					html = '<option value="">-- Program Studi --</option>';
					$('#prodi').html(html);
					// swal.fire("Ooppsss!", response.msg, "error");
				}
			},
			error: function(err) {
				swal.fire("Ooppsss!", "Kamu tidak tersambung ke server kami.", "error");
			}
		});
	});

	function ucwords(str) {
		return (str + '').replace(/^([a-z])|\s+([a-z])/g, function($1) {
			return $1.toUpperCase();
		});
	}

	//Tampil Data
	function ambilDatas() {
		$.ajax({
			url: '<?= base_url(); ?>administrator/ambilData',
			type: 'POST',
			async: false,
			dataType: 'json',
			success: function(response) {
				let i;
				let no = 0;
				let html = "";
				for (i = 0; i < response.length; i++) {
					no++;
					html = html + '<tr>' +
						'<td style="width: 1%;">' + no + '</td>' +
						'<td>' + response[i].nama_user + '</td>' +
						'<td>' + response[i].email_user + '</td>' +
						'<td>' + response[i].telepon_user + '</td>' +
						'<td style="width: 25%;">' + '<button class="btn btn-info mr-2" data-toggle="modal" data-target="#modalDetail" onclick="detailAdministrator(' + response[i].id_user + ')"><i class="fa-solid fa-eye"></i></button><button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalAdministrator" onclick="submit(' + response[i].id_user + ')" name="id"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataAdministrator(' + response[i].id_user + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
						'</tr>';
				}
				$("#tbl_data").html(html);
			}
		});
	}

	//Detail Data
	function detailAdministrator(id) {
		$.ajax({
			url: '<?= base_url(); ?>administrator/ambilDataById',
			type: 'POST',
			dataType: 'json',
			data: 'id=' + id,
			success: function(response) {
				let html = "";
				html = html +
					'<tr>' +
					'<td>Nama</td>' +
					'<td>:</td>' +
					'<td>' + response[0].nama_user + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>Email</td>' +
					'<td>:</td>' +
					'<td>' + response[0].email_user + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>No Telepon</td>' +
					'<td>:</td>' +
					'<td>' + response[0].telepon_user + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>Kewarganegaraan</td>' +
					'<td>:</td>' +
					'<td>' + response[0].nama_negara + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>Alamat</td>' +
					'<td>:</td>' +
					'<td>' + response[0].alamat_user + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>Kota</td>' +
					'<td>:</td>' +
					'<td>' + response[0].type + '. ' + response[0].nama_kota + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>Negara</td>' +
					'<td>:</td>' +
					'<td>' + response[0].nama_negara + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>Kode pos</td>' +
					'<td>:</td>' +
					'<td>' + response[0].kode_pos + '</td>' +
					+'</tr>';

				$("#tblDetail").html(html);
			}
		})
	}

	function submit(type) {
		if (type == 'tambah') {
			$('#btn-tambah').show();
			$('#btn-ubah').hide();
			$('#modalAdministratorLabel').text("Tambah Data Administrator");
		} else if (type == 'tutup') {
			$('.nama-error').hide();
			$('.email-error').hide();
			$('.no_telepon-error').hide();
			$('.kewarganegaraan-error').hide();
			$('.alamat-error').hide();
			$('.kota-error').hide();
			$('.negara-error').hide();
			$('.kode_pos-error').hide();
			$('.fakultas_nama-error').hide();
			$('.prodi-error').hide();

			$('[name="nama"]').val("");
			$('[name="email"]').val("");
			$('[name="no_telepon"]').val("");
			$('[name="kewarganegaraan"]').val("").trigger('change');
			$('[name="alamat"]').val("");
			$('[name="kota"]').val("").trigger('change');
			$('[name="negara"]').val("").trigger('change');
			$('[name="kode_pos"]').val("");
			$('[name="fakultas_nama"]').val("").trigger('change');
			$("#modalAdministrator").modal('hide');
		} else {
			$('#btn-tambah').hide();
			$('#btn-ubah').show();
			$('#modalAdministratorLabel').text("Ubah Data Administrator");

			$.ajax({
				url: '<?= base_url(); ?>administrator/ambilDataById',
				type: 'POST',
				dataType: 'json',
				data: 'id=' + type,
				success: function(response) {
					$('[name="id"]').val(response[0].id_user);
					$('[name="nama"]').val(response[0].nama_user);
					$('[name="email"]').val(response[0].email_user);
					$('[name="no_telepon"]').val(response[0].telepon_user);
					$('[name="kewarganegaraan"]').val(response[0].kewarganegaraan).trigger('change');
					$('[name="alamat"]').val(response[0].alamat_user);
					$('[name="kota"]').val(response[0].kota).trigger('change');
					$('[name="negara"]').val(response[0].negara).trigger('change');
					$('[name="kode_pos"]').val(response[0].kode_pos);
					$('[name="fakultas_nama"]').val(response[0].fakultas).trigger('change');
					$('[name="prodi"]').val(response[0].prodi).trigger('change');
				}
			})
		}
	}

	//Tambah Data
	function tambahDataAdministrators() {
		let nama = htmlspecialchars($('[name="nama"]').val());
		let email = htmlspecialchars($('[name="email"]').val());
		let no_telepon = htmlspecialchars($('[name="no_telepon"]').val());
		let kewarganegaraan = htmlspecialchars($('[name="kewarganegaraan"]').val());
		let alamat = htmlspecialchars($('[name="alamat"]').val());
		let kota = htmlspecialchars($('[name="kota"]').val());
		let negara = htmlspecialchars($('[name="negara"]').val());
		let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());
		let fakultas_nama = htmlspecialchars($('[name="fakultas_nama"]').val());
		let prodi = htmlspecialchars($('[name="prodi"]').val());
		$.ajax({
			url: '<?= base_url(); ?>administrator/tambahData',
			type: 'POST',
			dataType: 'json',
			data: $('#formAdd').serialize(),
			success: function(data) {
				if (data !== 'success') {
					$('.nama-error').html(data.nama);
					$('.email-error').html(data.email);
					$('.no_telepon-error').html(data.no_telepon);
					$('.kewarganegaraan-error').html(data.kewarganegaraan);
					$('.alamat-error').html(data.alamat);
					$('.kota-error').html(data.kota);
					$('.negara-error').html(data.negara);
					$('.kode_pos-error').html(data.kode_pos);
					$('.fakultas_nama-error').html(data.fakultas_nama);
					$('.prodi-error').html(data.prodi);

					$('.nama-error').show();
					$('.email-error').show();
					$('.no_telepon-error').show();
					$('.kewarganegaraan-error').show();
					$('.alamat-error').show();
					$('.kota-error').show();
					$('.negara-error').show();
					$('.kode_pos-error').show();
					$('.fakultas_nama-error').show();
					$('.prodi-error').show();
				} else {
					$('.nama-error').hide();
					$('.email-error').hide();
					$('.no_telepon-error').hide();
					$('.kewarganegaraan-error').hide();
					$('.alamat-error').hide();
					$('.kota-error').hide();
					$('.negara-error').hide();
					$('.kode_pos-error').hide();
					$('.fakultas_nama-error').hide();
					$('.prodi-error').hide();

					$('[name="nama"]').val("");
					$('[name="email"]').val("");
					$('[name="no_telepon"]').val("");
					$('[name="kewarganegaraan"]').val("Indonesia").trigger('change');
					$('[name="alamat"]').val("");
					$('[name="kota"]').val("").trigger('change');
					$('[name="negara"]').val("Indonesia").trigger('change');
					$('[name="kode_pos"]').val("");
					$('[name="fakultas_nama"]').val("").trigger('change');
					$("#modalAdministrator").modal('hide');
					Swal.fire(
						'Good job!',
						'Data berhasil ditambahkan!',
						'success'
					)
					ambilDatas();
				}
			}
		})
	}

	//Ubah Data
	function ubahDataAdministrators() {
		let id = htmlspecialchars($('[name="id"]').val());
		let nama = htmlspecialchars($('[name="nama"]').val());
		let email = htmlspecialchars($('[name="email"]').val());
		let no_telepon = htmlspecialchars($('[name="no_telepon"]').val());
		let kewarganegaraan = htmlspecialchars($('[name="kewarganegaraan"]').val());
		let alamat = htmlspecialchars($('[name="alamat"]').val());
		let kota = htmlspecialchars($('[name="kota"]').val());
		let negara = htmlspecialchars($('[name="negara"]').val());
		let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());
		let fakultas_nama = htmlspecialchars($('[name="fakultas_nama"]').val());
		let prodi = htmlspecialchars($('[name="prodi"]').val());

		$.ajax({
			url: '<?= base_url(); ?>administrator/ubahData',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				nama: nama,
				email: email,
				no_telepon: no_telepon,
				kewarganegaraan: kewarganegaraan,
				alamat: alamat,
				kota: kota,
				negara: negara,
				kode_pos: kode_pos,
				fakultas_nama: fakultas_nama,
				prodi: prodi
			},
			success: function(data) {
				if (data !== 'success') {
					$('.nama-error').html(data.nama);
					$('.email-error').html(data.email);
					$('.no_telepon-error').html(data.no_telepon);
					$('.kewarganegaraan-error').html(data.kewarganegaraan);
					$('.alamat-error').html(data.alamat);
					$('.kota-error').html(data.kota);
					$('.negara-error').html(data.negara);
					$('.kode_pos-error').html(data.kode_pos);
					$('.fakultas_nama-error').html(data.fakultas_nama);
					$('.prodi-error').html(data.prodi);

					$('.nama-error').show();
					$('.email-error').show();
					$('.no_telepon-error').show();
					$('.kewarganegaraan-error').show();
					$('.alamat-error').show();
					$('.kota-error').show();
					$('.negara-error').show();
					$('.kode_pos-error').show();
					$('.fakultas_nama-error').show();
					$('.prodi-error').show();
				} else {
					$('.nama-error').hide();
					$('.email-error').hide();
					$('.no_telepon-error').hide();
					$('.kewarganegaraan-error').hide();
					$('.alamat-error').hide();
					$('.kota-error').hide();
					$('.negara-error').hide();
					$('.kode_pos-error').hide();

					$('[name="nama"]').val("");
					$('[name="email"]').val("");
					$('[name="no_telepon"]').val("");
					$('[name="kewarganegaraan"]').val("").trigger('change');
					$('[name="alamat"]').val("");
					$('[name="kota"]').val("").trigger('change');
					$('[name="negara"]').val("").trigger('change');
					$('[name="kode_pos"]').val("");
					$('[name="fakultas_nama"]').val("").trigger('change');
					$("#modalAdministrator").modal('hide');

					Swal.fire(
						'Good job!',
						'Data berhasil diubah!',
						'success'
					)
					ambilDatas();
				}

			}
		})
	}

	//Hapus Data
	function hapusDataAdministrator(id) {
		Swal.fire({
			title: 'Apakah anda yakin?',
			text: "Anda tidak akan dapat mengembalikan ini!",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#3085d6',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonColor: '#d33'
		}).then((result) => {
			if (result.isConfirmed) {
				$.ajax({
					url: '<?= base_url(); ?>administrator/hapusData',
					type: 'POST',
					dataType: 'json',
					data: 'id=' + id,
					success: function(response) {
						Swal.fire(
							'Deleted!',
							'Data berhasil dihapus.',
							'success'
						)
						ambilDatas();
					}
				})
			}
		})
	}
</script>
