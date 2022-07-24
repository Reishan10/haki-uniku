<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Provinsi</span>
			<h3 class="page-title">Data Provinsi</h3>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Default Light Table -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Provinsi</h6>
					<button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalProvinsi" onclick="submit('tambah')">
						Tambah Data
					</button>
				</div>
				<div class="card-body">
					<table class="table mb-0" id="table">
						<thead class="bg-light">
							<tr>
								<th scope="col" class="border-0" style="width: 1%;">#</th>
								<th scope="col" class="border-0">Provinsi</th>
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

<!-- Modal Tambah -->
<div class="modal fade" id="modalProvinsi" role="dialog" aria-labelledby="modalProvinsiLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalProvinsiLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="provinsi">Provinsi</label>
					<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="Provinsi">
					<small class="text-danger provinsi-error"></small>
					<input type="hidden" name="id" value="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
				<button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataProvinsi()">Tambah</button>
				<button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataProvinsi()">Ubah</button>
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
			url: '<?= base_url(); ?>provinsi/ambilData',
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
						'<td>' + response[i].nama_provinsi + '</td>' +
						'<td style="width: 25%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalProvinsi" onclick="submit(' + response[i].id_provinsi + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataProvinsi(' + response[i].id_provinsi + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
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
			$('#modalProvinsiLabel').text("Tambah Data Provinsi");
		} else if (type == 'tutup') {
			$('.provinsi-error').hide();
			$('[name="provinsi"]').val("");
			$('#modalProvinsi').modal('hide');
		} else {
			$('#btn-tambah').hide();
			$('#btn-ubah').show();
			$('#modalProvinsiLabel').text("Ubah Data Provinsi");

			$.ajax({
				type: 'POST',
				data: 'id=' + type,
				url: '<?= base_url(); ?>provinsi/ambilDataById',
				dataType: 'json',
				success: function(response) {
					$('[name="id"]').val(response[0].id_provinsi);
					$('[name="provinsi"]').val(response[0].nama_provinsi);
				}
			})
		}
	}

	// Tambah Data
	function tambahDataProvinsi() {
		let provinsi = htmlspecialchars($('[name="provinsi"]').val());

		$.ajax({
			url: '<?= base_url(); ?>provinsi/tambahData',
			type: 'POST',
			dataType: 'json',
			data: {
				provinsi: provinsi,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.provinsi-error').html(data.provinsi);

					$('.provinsi-error').show();
				} else {
					$('.provinsi-error').hide();

					$('[name="provinsi"]').val("");
					$('#modalProvinsi').modal('hide');
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

	// Ubah Data
	function ubahDataProvinsi() {
		let id = htmlspecialchars($('[name="id"]').val());
		let provinsi = htmlspecialchars($('[name="provinsi"]').val());

		$.ajax({
			url: '<?= base_url(); ?>provinsi/ubahData',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				provinsi: provinsi,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.provinsi-error').html(data.provinsi);

					$('.provinsi-error').show();
				} else {
					$('.provinsi-error').hide();

					$('[name="provinsi"]').val("");
					$('#modalProvinsi').modal('hide');
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

	// Hapus Data
	function hapusDataProvinsi(id) {
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
					url: '<?= base_url(); ?>provinsi/hapusData',
					type: 'POST',
					dataType: 'json',
					data: 'id=' + id,
					success: function(response) {
						$('.provinsi-error').hide();

						$('[name="provinsi"]').val("");
						$('#modalProvinsi').modal('hide');
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
