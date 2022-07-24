<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Fakultas</span>
			<h3 class="page-title">Data Fakultas</h3>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Default Light Table -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Fakultas</h6>
					<button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalFakultas" onclick="submit('tambah')">
						Tambah Data
					</button>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0 table-responsive" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Fakultas</th>
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

<div class="main-content-container container-fluid px-4" id="formDataProdi" style="display: none;">
	<!-- Default Light Table -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Program Studi</h6>
					<button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalProdi" onclick="submitProdi('tambah',id)">
						Tambah Data
					</button>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0 table-responsive dataTablesJenis">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Program Studi</th>
									<th scope="col" class="border-0">Fakultas</th>
									<th scope="col" class="border-0">Aksi</th>
								</tr>
							</thead>
							<tbody id="tbl_prodi">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Fakultas -->
<div class="modal fade" id="modalFakultas" role="dialog" aria-labelledby="modalFakultasLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalFakultasLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="fakultas">Fakultas</label>
					<input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas">
					<small class="text-danger fakultas-error"></small>
					<input type="hidden" name="id" value="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
				<button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataFakultas()">Tambah</button>
				<button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataFakultas()">Ubah</button>
			</div>
		</div>
	</div>
</div>

<div class="modal fade" id="modalProdi" role="dialog" aria-labelledby="modalProdiLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalProdiLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="fakultas">Fakultas</label>
					<input type="text" class="form-control" id="fakultas" name="fakultas" placeholder="Fakultas" disabled>
					<small class="text-danger fakultas-error"></small>
					<input type="hidden" name="id" value="">
				</div>
				<div class="form-group">
					<label for="prodi">Program Studi</label>
					<input type="text" class="form-control" id="prodi" name="prodi" placeholder="Program Studi">
					<small class="text-danger prodi-error"></small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
				<button type="button" class="btn btn-primary" id="btn-tambahProdi" onclick="tambahDataProdi()">Tambah</button>
				<button type="button" class="btn btn-primary" id="btn-ubahProdi" onclick="ubahDataProdi()">Ubah</button>
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
			url: '<?= base_url(); ?>fakultas/ambilDataFakultas',
			type: 'ajax',
			type: 'POST',
			async: false,
			dataType: 'json',
			success: function(response) {
				let i;
				let no = 0;
				let html = "";
				let type = "tambah";
				for (i = 0; i < response.length; i++) {
					no++;
					html = html + '<tr>' +
						'<td style="width: 1%;">' + no + '</td>' +
						'<td class="text-capitalize">' + response[i].fakultas_nama + '</td>' +
						'<td style="width: 25%;">' + '<button class="btn btn-warning mr-2" onclick="submitProdi(\'' + type + '\',' + response[i].fakultas_id + ',\'' + response[i].fakultas_nama + '\');"><i class="fa-solid fa-plus"></i></button><button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalFakultas" onclick="submit(' + response[i].fakultas_id + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataFakultas(' + response[i].fakultas_id + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
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
			$('#modalFakultasLabel').text("Tambah Data Fakultas");
		} else if (type == 'tutup') {
			$('.fakultas-error').hide();
			$('[name="fakultas"]').val("");
			$('#modalfakultas').modal('hide');
		} else {
			$('#btn-tambah').hide();
			$('#btn-ubah').show();
			$('#modalFakultasLabel').text("Ubah Data Fakultas");

			$.ajax({
				type: 'POST',
				data: 'id=' + type,
				url: '<?= base_url(); ?>fakultas/ambilFakultasById',
				dataType: 'json',
				success: function(response) {
					$('[name="id"]').val(response[0].fakultas_id);
					$('[name="fakultas"]').val(response[0].fakultas_nama);
				}
			})
		}
	}

	function tambahDataFakultas() {
		let fakultas = htmlspecialchars($('[name="fakultas"]').val());

		$.ajax({
			url: '<?= base_url(); ?>fakultas/tambahFakultas',
			type: 'POST',
			dataType: 'json',
			data: {
				fakultas: fakultas,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.fakultas-error').html(data.fakultas);
					$('.fakultas-error').show();
				} else {
					$('.fakultas-error').hide();

					$('[name="fakultas"]').val("");
					$('#modalFakultas').modal('hide');
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

	function ubahDataFakultas() {
		let id = htmlspecialchars($('[name="id"]').val());
		let fakultas = htmlspecialchars($('[name="fakultas"]').val());

		$.ajax({
			url: '<?= base_url(); ?>fakultas/ubahFakultas',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				fakultas: fakultas,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.fakultas-error').html(data.fakultas);
					$('.fakultas-error').show();
				} else {
					$('.fakultas-error').hide();

					$('[name="fakultas"]').val("");
					$('#modalFakultas').modal('hide');
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

	function hapusDataFakultas(id) {
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
					url: '<?= base_url(); ?>fakultas/hapusFakultas',
					type: 'POST',
					dataType: 'json',
					data: 'id=' + id,
					success: function(response) {
						$('.fakultas-error').hide();

						$('[name="fakultas"]').val("");
						$('#modalFakultas').modal('hide');
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

	function ambilDataProdi(fakultas) {
		$.ajax({
			url: '<?= base_url(); ?>fakultas/ambilProdi',
			data: {
				fakultas: fakultas,
			},
			type: 'ajax',
			type: 'POST',
			async: false,
			dataType: 'json',
			success: function(response) {
				let i;
				let no = 0;
				let html = "";
				let type = "ubah";

				for (i = 0; i < response.length; i++) {
					no++;
					html = html + '<tr>' +
						'<td style="width: 1%;">' + no + '</td>' +
						'<td class="text-capitalize">' + response[i].prodi_nama + '</td>' +
						'<td class="text-capitalize">' + response[i].fakultas_nama + '</td>' +
						'<td style="width: 25%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalProdi" onclick="submitProdi(\'' + type + '\',' + response[i].prodi_id + ');"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataProdi(' + response[i].prodi_id + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
						'</tr>';
				}
				$("#tbl_prodi").html(html);
			}
		})
	}

	function submitProdi(type, id, fakultas) {
		if (type == 'tambah') {
			$('#formDataProdi').show();
			$('#btn-tambahProdi').show();
			$('#btn-ubahProdi').hide();
			$('#modalProdiLabel').text("Tambah Data Program Studi");

			$.ajax({
				type: 'POST',
				data: 'id=' + id,
				url: '<?= base_url(); ?>fakultas/ambilFakultasById',
				dataType: 'json',
				success: function(response) {
					$('[name="id"]').val(response[0].fakultas_id);
					$('[name="fakultas"]').val(response[0].fakultas_nama);
				}
			})

			ambilDataProdi(fakultas);
		} else if (type == 'ubah') {
			$('#formDataProdi').show();
			$('#btn-tambahProdi').hide();
			$('#btn-ubahProdi').show();
			$('#modalProdiLabel').text("Ubah Data Prodi");
			$.ajax({
				type: 'POST',
				data: 'id=' + id,
				url: '<?= base_url(); ?>fakultas/ambilProdiById',
				dataType: 'json',
				success: function(response) {
					$('[name="id"]').val(response[0].prodi_id);
					$('[name="prodi"]').val(response[0].prodi_nama);
					$('[name="fakultas"]').val(response[0].fakultas_nama);
				}
			})
		} else if (type == 'tutup') {
			$('[name="fakultas"]').val()
			$('[name="prodi"]').val()
			$('.prodi-error').hide();
			$('.fakultas-error').hide();
		}
	}

	function tambahDataProdi() {
		let id = htmlspecialchars($('[name="id"]').val());
		let fakultas = htmlspecialchars($('[name="fakultas"]').val());
		let prodi = htmlspecialchars($('[name="prodi"]').val());

		$.ajax({
			url: '<?= base_url(); ?>fakultas/tambahProdi',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				prodi: prodi,
				fakultas: fakultas,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.prodi-error').html(data.prodi);
					$('.fakultas-error').html(data.fakultas);
					$('.prodi-error').show();
					$('.fakultas-error').show();
				} else {
					$('.prodi-error').hide();
					$('.fakultas-error').hide();
					$('[name="prodi"]').val("");
					$('[name="fakultas"]').val("");

					$('#modalProdi').modal('hide');
					$('#formDataProdi').hide();
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

	function ubahDataProdi() {
		let id = htmlspecialchars($('[name="id"]').val());
		let prodi = htmlspecialchars($('[name="prodi"]').val());

		$.ajax({
			url: '<?= base_url(); ?>fakultas/ubahDataProdi',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				prodi: prodi,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.prodi-error').html(data.prodi);
					$('.prodi-error').show();
				} else {
					$('.prodi-error').hide();
					$('[name="prodi"]').val("");

					$('#modalProdi').modal('hide');
					$('#formDataProdi').hide();
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

	function hapusDataProdi(id) {
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
					url: '<?= base_url(); ?>fakultas/hapusProdi',
					type: 'POST',
					dataType: 'json',
					data: 'id=' + id,
					success: function(response) {
						$('.prodi-error').hide();
						$('.fakultas-error').hide();
						$('[name="prodi"]').val("");
						$('[name="fakultas"]').val("");

						$('#modalProdi').modal('hide');
						$('#formDataProdi').hide();
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
