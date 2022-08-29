<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Jenis</span>
			<h3 class="page-title">Data Jenis</h3>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Default Light Table -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Jenis</h6>
					<button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalJenis" onclick="submit('tambah')">
						Tambah Data
					</button>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0 table-responsive" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Jenis Ciptaan</th>
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

<div class="main-content-container container-fluid px-4" id="formDataSubjenis" style="display: none;">
	<!-- Default Light Table -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Subjenis</h6>
					<button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalSubjenis" onclick="submitSubjenis('tambah',id_jenis)">
						Tambah Data
					</button>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0 table-responsive dataTablesJenis">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Subjenis Ciptaan</th>
									<th scope="col" class="border-0">Jenis Ciptaan</th>
									<th scope="col" class="border-0">Aksi</th>
								</tr>
							</thead>
							<tbody id="tbl_subjenis">
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah Jenis -->
<div class="modal fade" id="modalJenis" role="dialog" aria-labelledby="modalJenisLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalJenisLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="jenis">Jenis Ciptaan</label>
					<input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis">
					<small class="text-danger jenis-error"></small>
					<input type="hidden" name="id" value="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
				<button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataJenis()">Tambah</button>
				<button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataJenis()">Ubah</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal Tambah Subjenis -->
<div class="modal fade" id="modalSubjenis" role="dialog" aria-labelledby="modalSubjenisLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalSubjenisLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" onclick="tutup()" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="jenis">Jenis Ciptaan</label>
					<input type="text" class="form-control" id="jenis" name="jenis" placeholder="Jenis" disabled>
					<small class="text-danger jenis-error"></small>
					<input type="hidden" name="id" value="">
					<input type="hidden" name="id_jenis" value="">
				</div>
				<div class="form-group">
					<label for="subjenis">Subjenis Ciptaan</label>
					<input type="text" class="form-control" id="subjenis" name="subjenis" placeholder="Subjenis">
					<small class="text-danger subjenis-error"></small>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="tutup()">Tutup</button>
				<button type="button" class="btn btn-primary" id="btn-tambahSubjenis" onclick="tambahDataSubjenis()">Tambah</button>
				<button type="button" class="btn btn-primary" id="btn-ubahSubjenis" onclick="ubahDataSubjenis()">Ubah</button>
			</div>
		</div>
	</div>
</div>

<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/js/dataTables.responsive.min.js"></script>
<script>
	ambilData();

	function htmlspecialchars(str) {
		return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
	}

	function ambilData() {
		$.ajax({
			url: '<?= base_url(); ?>jenis/ambilData',
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
						'<td>' + response[i].nama_jenis + '</td>' +
						'<td style="width: 25%;">' + '<button class="btn btn-warning mr-2" onclick="submitSubjenis(\'' + type + '\',' + response[i].id_jenis + ');"><i class="fa-solid fa-plus"></i></button><button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalJenis" onclick="submit(' + response[i].id_jenis + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataJenis(' + response[i].id_jenis + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
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
			$('#modalJenisLabel').text("Tambah Data Jenis");
		} else if (type == 'tutup') {
			$('.jenis-error').hide();
			$('[name="jenis"]').val("");
			$('#modalJenis').modal('hide');
		} else {
			$('#btn-tambah').hide();
			$('#btn-ubah').show();
			$('#modalJenisLabel').text("Ubah Data Jenis");

			$.ajax({
				type: 'POST',
				data: 'id=' + type,
				url: '<?= base_url(); ?>jenis/ambilDataById',
				dataType: 'json',
				success: function(response) {
					$('[name="id"]').val(response[0].id_jenis);
					$('[name="jenis"]').val(response[0].nama_jenis);
				}
			})
		}
	}

	function tambahDataJenis() {
		let jenis = htmlspecialchars($('[name="jenis"]').val());

		$.ajax({
			url: '<?= base_url(); ?>jenis/tambahData',
			type: 'POST',
			dataType: 'json',
			data: {
				jenis: jenis,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.jenis-error').html(data.jenis);
					$('.jenis-error').show();
				} else {
					$('.jenis-error').hide();

					$('[name="jenis"]').val("");
					$('#modalJenis').modal('hide');
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

	function ubahDataJenis() {
		let id = htmlspecialchars($('[name="id"]').val());
		let jenis = htmlspecialchars($('[name="jenis"]').val());

		$.ajax({
			url: '<?= base_url(); ?>jenis/ubahData',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				jenis: jenis,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.jenis-error').html(data.jenis);
					$('.jenis-error').show();
				} else {
					$('.jenis-error').hide();

					$('[name="jenis"]').val("");
					$('#modalJenis').modal('hide');
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

	function hapusDataJenis(id) {
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
					url: '<?= base_url(); ?>jenis/hapusData',
					type: 'POST',
					dataType: 'json',
					data: 'id=' + id,
					success: function(response) {
						$('.jenis-error').hide();

						$('[name="jenis"]').val("");
						$('#modalJenis').modal('hide');
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

	function ambilDataSubjenis(id) {
		$.ajax({
			url: '<?= base_url(); ?>jenis/ambilSubjenis',
			data: 'id=' + id,
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
						'<td>' + response[i].nama_subjenis + '</td>' +
						'<td>' + response[i].nama_jenis + '</td>' +
						'<td style="width: 25%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalSubjenis" onclick="submitSubjenis(\'' + type + '\',' + response[i].id_subjenis + ');"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataSubjenis(' + response[i].id_subjenis + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
						'</tr>';
				}
				$("#tbl_subjenis").html(html);
			}
		})
	}

	function submitSubjenis(type, id) {
		if (type == 'tambah') {
			$('#formDataSubjenis').show();
			$('#btn-tambahSubjenis').show();
			$('#btn-ubahSubjenis').hide();
			$('#modalSubjenisLabel').text("Tambah Data Subjenis");

			$.ajax({
				type: 'POST',
				data: 'id=' + id,
				url: '<?= base_url(); ?>jenis/ambilDataById',
				dataType: 'json',
				success: function(response) {
					$('[name="id"]').val(response[0].id_jenis);
					$('[name="jenis"]').val(response[0].nama_jenis);
				}
			})
			ambilDataSubjenis(id);
		} else if (type == 'ubah') {
			$('#formDataSubjenis').show();
			$('#btn-tambahSubjenis').hide();
			$('#btn-ubahSubjenis').show();
			$('#modalSubjenisLabel').text("Ubah Data Subjenis");
			$.ajax({
				type: 'POST',
				data: 'id=' + id,
				url: '<?= base_url(); ?>jenis/ambilSubjenisById',
				dataType: 'json',
				success: function(response) {
					$('[name="id"]').val(response[0].id_subjenis);
					$('[name="id_jenis"]').val(response[0].id_jenis);
					$('[name="subjenis"]').val(response[0].nama_subjenis);
					$('[name="jenis"]').val(response[0].nama_jenis);
				}
			})
		}
	}

	function tambahDataSubjenis() {
		let id = htmlspecialchars($('[name="id"]').val());
		let jenis = htmlspecialchars($('[name="jenis"]').val());
		let subjenis = htmlspecialchars($('[name="subjenis"]').val());

		$.ajax({
			url: '<?= base_url(); ?>jenis/tambahSubjenis',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				subjenis: subjenis,
				jenis: jenis,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.subjenis-error').html(data.subjenis);
					$('.jenis-error').html(data.jenis);
					$('.subjenis-error').show();
					$('.jenis-error').show();
				} else {
					$('.subjenis-error').hide();
					$('.jenis-error').hide();
					$('[name="subjenis"]').val("");
					$('[name="jenis"]').val("");

					$('#modalSubjenis').modal('hide');
					$('#formDataSubjenis').hide();
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

	function ubahDataSubjenis() {
		let id = htmlspecialchars($('[name="id"]').val());
		let subjenis = htmlspecialchars($('[name="subjenis"]').val());

		$.ajax({
			url: '<?= base_url(); ?>jenis/ubahDataSubjenis',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				subjenis: subjenis,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.subjenis-error').html(data.subjenis);
					$('.jenis-error').html(data.jenis);
					$('.subjenis-error').show();
					$('.jenis-error').show();
				} else {
					$('.subjenis-error').hide();
					$('.jenis-error').hide();
					$('[name="subjenis"]').val("");
					$('[name="jenis"]').val("");

					$('#modalSubjenis').modal('hide');
					$('#formDataSubjenis').hide();
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

	function hapusDataSubjenis(id) {
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
					url: '<?= base_url(); ?>jenis/hapusSubjenis',
					type: 'POST',
					dataType: 'json',
					data: 'id=' + id,
					success: function(response) {
						$('.subjenis-error').hide();
						$('.jenis-error').hide();
						$('[name="subjenis"]').val("");
						$('[name="jenis"]').val("");

						$('#modalSubjenis').modal('hide');
						$('#formDataSubjenis').hide();
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

	function tutup() {
		$('[name="jenis"]').val()
		$('[name="subjenis"]').val()
		$('.jenis-error').hide();
		$('.subjenis-error').hide();
	}
</script>
