<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Kota</span>
			<h3 class="page-title">Data Kota</h3>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Default Light Table -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Kota</h6>
					<button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalKota" onclick="submit('tambah')">
						Tambah Data
					</button>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Kota</th>
									<th scope="col" class="border-0">Type</th>
									<th scope="col" class="border-0">Provinsi</th>
									<th scope="col" class="border-0">Kode Pos</th>
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
</div>

<!-- Modal Tambah -->
<div class="modal fade" id="modalKota" role="dialog" aria-labelledby="modalKotaLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalKotaLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="kota">Kota</label>
					<input type="text" class="form-control" id="kota" name="kota" placeholder="Kota">
					<small class="text-danger kota-error"></small>
					<input type="hidden" name="id" value="">
				</div>
				<div class="form-group">
					<label for="type">Type</label>
					<select name="type" id="type" class="form-control select2">
						<option value="">-- Type --</option>
						<option value="Kota">Kota</option>
						<option value="Kabupaten">Kabupaten</option>
					</select>
					<small class="text-danger type-error"></small>
				</div>
				<div class="form-group">
					<label for="provinsi">Provinsi</label>
					<select name="provinsi" id="provinsi" class="form-control select2">
						<option value="">-- Provinsi --</option>
						<?php foreach ($provinsi as $row) { ?>
							<option value="<?= $row->id_provinsi ?>"><?= $row->nama_provinsi ?></option>
						<?php } ?>
					</select>
					<small class="text-danger provinsi-error"></small>
				</div>
				<div class="form-group">
					<label for="kode_pos">Kode Pos</label>
					<input type="number" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
					<small class="text-danger kode_pos-error"></small>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
					<button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataKota()">Tambah</button>
					<button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataKota()">Ubah</button>
				</div>
			</div>
		</div>
	</div>
</div>

<script>
	ambilData();

	function htmlspecialchars(str) {
		return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
	}

	function ambilData() {
		$.ajax({
			type: 'ajax',
			url: '<?= base_url(); ?>kota/ambilData',
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
						'<td style="width: 20%;">' + response[i].nama_kota + '</td>' +
						'<td>' + response[i].type + '</td>' +
						'<td>' + response[i].nama_provinsi + '</td>' +
						'<td>' + response[i].kode_pos + '</td>' +
						'<td style="width: 15%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalKota" onclick="submit(' + response[i].id_kota + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataKota(' + response[i].id_kota + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
						'</tr>';
				}
				$("#tbl_data").html(html);
			}
		});
	}

	function submit(type) {
		if (type == 'tambah') {
			$('#btn-tambah').show();
			$('#btn-ubah').hide();
			$('#modalKotaLabel').text("Tambah Data Kota");
		} else if (type == 'tutup') {
			$('.kota-error').hide();
			$('.type-error').hide();
			$('.provinsi-error').hide();
			$('.kode_pos-error').hide();

			$('[name="kota"]').val("");
			$('[name="type"]').val("");
			$('[name="provinsi"]').val("").trigger('change');
			$('[name="kode_pos"]').val("");
			$('#modalKota').modal('hide');
		} else {
			$('#btn-tambah').hide();
			$('#btn-ubah').show();
			$('#modalKotaLabel').text("Ubah Data Kota");

			$.ajax({
				type: 'POST',
				data: 'id=' + type,
				url: '<?= base_url(); ?>kota/ambilDataById',
				dataType: 'json',
				success: function(response) {
					$('[name="id"]').val(response[0].id_kota);
					$('[name="kota"]').val(response[0].nama_kota);
					$('[name="type"]').val(response[0].type).trigger('change');
					$('[name="kode_pos"]').val(response[0].kode_pos);
					$('[name="provinsi"]').val(response[0].id_provinsi).trigger('change');
				}
			})
		}
	}

	function tambahDataKota() {
		let kota = htmlspecialchars($('[name="kota"]').val());
		let type = htmlspecialchars($('[name="type"]').val());
		let provinsi = htmlspecialchars($('[name="provinsi"]').val());
		let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

		$.ajax({
			url: '<?= base_url(); ?>kota/tambahData',
			type: 'POST',
			dataType: 'json',
			data: {
				kota: kota,
				type: type,
				provinsi: provinsi,
				kode_pos: kode_pos,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.kota-error').html(data.kota);
					$('.type-error').html(data.type);
					$('.provinsi-error').html(data.provinsi);
					$('.kode_pos-error').html(data.kode_pos);

					$('.kota-error').show();
					$('.type-error').show();
					$('.provinsi-error').show();
					$('.kode_pos-error').show();
				} else {
					$('.kota-error').hide();
					$('.type-error').hide();
					$('.provinsi-error').hide();
					$('.kode_pos-error').hide();

					$('[name="kota"]').val("");
					$('[name="type"]').val("");
					$('[name="provinsi"]').val("").trigger('change');
					$('[name="kode_pos"]').val("");
					$('#modalKota').modal('hide');
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

	function ubahDataKota() {
		let id = htmlspecialchars($('[name="id"]').val());
		let kota = htmlspecialchars($('[name="kota"]').val());
		let type = htmlspecialchars($('[name="type"]').val());
		let provinsi = htmlspecialchars($('[name="provinsi"]').val());
		let kode_pos = htmlspecialchars($('[name="kode_pos"]').val());

		$.ajax({
			url: '<?= base_url(); ?>kota/ubahData',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				kota: kota,
				type: type,
				provinsi: provinsi,
				kode_pos: kode_pos,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.kota-error').html(data.kota);
					$('.type-error').html(data.type);
					$('.provinsi-error').html(data.provinsi);
					$('.kode_pos-error').html(data.kode_pos);

					$('.kota-error').show();
					$('.type-error').show();
					$('.provinsi-error').show();
					$('.kode_pos-error').show();
				} else {
					$('.kota-error').hide();
					$('.type-error').hide();
					$('.provinsi-error').hide();
					$('.kode_pos-error').hide();

					$('[name="kota"]').val("");
					$('[name="type"]').val("");
					$('[name="provinsi"]').val("").trigger('change');
					$('[name="kode_pos"]').val("");
					$('#modalKota').modal('hide');
					Swal.fire(
						'Good job!',
						'Data berhasil diubah!',
						'success'
					)
					ambilData();
				}
			}
		})
	}

	function hapusDataKota(id) {
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
					url: '<?= base_url(); ?>kota/hapusData',
					type: 'POST',
					dataType: 'json',
					data: 'id=' + id,
					success: function(response) {
						$('.kota-error').hide();
						$('.type-error').hide();
						$('.provinsi-error').hide();
						$('.kode_pos-error').hide();

						$('[name="kota"]').val("");
						$('[name="type"]').val("");
						$('[name="provinsi"]').val("").trigger('change');
						$('[name="kode_pos"]').val("");
						$('#modalKota').modal('hide');
						Swal.fire(
							'Good job!',
							'Data berhasil dihapus!',
							'success'
						)
						ambilData();
					}
				})
			}
		})
	}
</script>
