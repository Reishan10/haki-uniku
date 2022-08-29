<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<h5 class="text-uppercase m-0">Jenis Permohonan</h5>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Default Light Table -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Jenis Permohonan</h6>
					<button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalJenisPermohonan" onclick="submit('tambah')">
						Tambah Data
					</button>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0 table-responsive" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Jenis Permohonan</th>
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
<div class="modal fade" id="modalJenisPermohonan" role="dialog" aria-labelledby="modalJenisPermohonanLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalJenisPermohonanLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="jenis_permohonan">Jenis Permohonan</label>
					<input type="text" class="form-control" id="jenis_permohonan" name="jenis_permohonan" placeholder="Jenis Permohonan">
					<small class="text-danger jenis_permohonan-error"></small>
					<input type="hidden" name="id" value="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
				<button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataJenisPermohonan()">Tambah</button>
				<button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataJenisPermohonan()">Ubah</button>
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
			url: '<?= base_url(); ?>JenisPermohonan/ambilData',
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
						'<td>' + response[i].nama_jenis_permohonan + '</td>' +
						'<td style="width: 25%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalJenisPermohonan" onclick="submit(' + response[i].id_jenis_permohonan + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataJenisPermohonan(' + response[i].id_jenis_permohonan + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
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
			$('#modalJenisPermohonanLabel').text("Tambah Data Jenis Permohonan");
		} else if (type == 'tutup') {
			$('.jenis_permohonan-error').hide();
			$('[name="jenis_permohonan"]').val("");
			$('#modalJenisPermohonan').modal('hide');
		} else {
			$('#btn-tambah').hide();
			$('#btn-ubah').show();
			$('#modalJenisPermohonanLabel').text("Ubah Data Jenis Permohonan");

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

	function tambahDataJenisPermohonan() {
		let jenis_permohonan = htmlspecialchars($('[name="jenis_permohonan"]').val());

		$.ajax({
			url: '<?= base_url(); ?>JenisPermohonan/tambahData',
			type: 'POST',
			dataType: 'json',
			data: {
				jenis_permohonan: jenis_permohonan,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.jenis_permohonan-error').html(data.jenis_permohonan);
					$('.jenis_permohonan-error').show();
				} else {
					$('.jenis_permohonan-error').hide();

					$('[name="jenis_permohonan"]').val("");
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

	function ubahDataJenisPermohonan() {
		let id = htmlspecialchars($('[name="id"]').val());
		let jenis_permohonan = htmlspecialchars($('[name="jenis_permohonan"]').val());

		$.ajax({
			url: '<?= base_url(); ?>JenisPermohonan/ubahData',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				jenis_permohonan: jenis_permohonan,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.jenis_permohonan-error').html(data.jenis_permohonan);
					$('.jenis_permohonan-error').show();
				} else {
					$('.jenis_permohonan-error').hide();

					$('[name="jenis_permohonan"]').val("");
					$('#modalJenisPermohonan').modal('hide');
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

	function hapusDataJenisPermohonan(id) {
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
					url: '<?= base_url(); ?>JenisPermohonan/hapusData',
					type: 'POST',
					dataType: 'json',
					data: 'id=' + id,
					success: function(response) {
						$('.jenis_permohonan-error').hide();

						$('[name="jenis_permohonan"]').val("");
						$('#modalJenisPermohonan').modal('hide');
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
