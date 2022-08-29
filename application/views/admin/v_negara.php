<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">Negara</span>
			<h3 class="page-title">Data Negara</h3>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Default Light Table -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Negara</h6>
					<button type="button" style="float: right;" class="btn btn-warning" data-toggle="modal" data-target="#modalNegara" onclick="submit('tambah')">
						Tambah Data
					</button>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 1%;">#</th>
									<th scope="col" class="border-0">Negara</th>
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
<div class="modal fade" id="modalNegara" role="dialog" aria-labelledby="modalNegaraLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalNegaraLabel"></h5>
				<button type="button" class="close" data-dismiss="modal" onclick="submit('tutup')" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="form-group">
					<label for="negara">Negara</label>
					<input type="text" class="form-control" id="negara" name="negara" placeholder="Negara">
					<small class="text-danger negara-error"></small>
					<input type="hidden" name="id" value="">
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="submit('tutup')">Tutup</button>
				<button type="button" class="btn btn-primary" id="btn-tambah" onclick="tambahDataNegara()">Tambah</button>
				<button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataNegara()">Ubah</button>
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
			url: '<?= base_url(); ?>negara/ambilData',
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
						'<td>' + response[i].nama_negara + '</td>' +
						'<td style="width: 25%;">' + '<button class="btn btn-primary mr-2" data-toggle="modal" data-target="#modalNegara" onclick="submit(' + response[i].id_negara + ')"><i class="fa-solid fa-pencil"></i></button><button class="btn btn-danger" onclick="hapusDataNegara(' + response[i].id_negara + ')"><i class="fa-solid fa-trash"></i></button>' + '</td>' +
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
			$('#modalNegaraLabel').text("Tambah Data Negara");
		} else if (type == 'tutup') {
			$('.negara-error').hide();
			$('[name="negara"]').val("");
			$('#modalNegara').modal('hide');
		} else {
			$('#btn-tambah').hide();
			$('#btn-ubah').show();
			$('#modalNegaraLabel').text("Ubah Data Negara");

			$.ajax({
				type: 'POST',
				data: 'id=' + type,
				url: '<?= base_url(); ?>negara/ambilDataById',
				dataType: 'json',
				success: function(response) {
					$('[name="id"]').val(response[0].id_negara);
					$('[name="negara"]').val(response[0].nama_negara);
				}
			})
		}
	}

	function tambahDataNegara() {
		let negara = htmlspecialchars($('[name="negara"]').val());

		$.ajax({
			url: '<?= base_url(); ?>negara/tambahData',
			type: 'POST',
			dataType: 'json',
			data: {
				negara: negara,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.negara-error').html(data.negara);
					$('.negara-error').show();
				} else {
					$('.negara-error').hide();

					$('[name="negara"]').val("");
					$('#modalNegara').modal('hide');
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

	function ubahDataNegara() {
		let id = htmlspecialchars($('[name="id"]').val());
		let negara = htmlspecialchars($('[name="negara"]').val());

		$.ajax({
			url: '<?= base_url(); ?>negara/ubahData',
			type: 'POST',
			dataType: 'json',
			data: {
				id: id,
				negara: negara,
			},
			success: function(data) {
				if (data !== 'success') {
					$('.negara-error').html(data.negara);
					$('.negara-error').show();
				} else {
					$('.negara-error').hide();

					$('[name="negara"]').val("");
					$('#modalNegara').modal('hide');
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

	function hapusDataNegara(id) {
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
					url: '<?= base_url(); ?>negara/hapusData',
					type: 'POST',
					dataType: 'json',
					data: 'id=' + id,
					success: function(response) {
						$('.negara-error').hide();

						$('[name="negara"]').val("");
						$('#modalNegara').modal('hide');
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
