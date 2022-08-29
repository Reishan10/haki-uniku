<style>
	/* input#crop {
		padding: 5px 25px 5px 25px;
		background: lightseagreen;
		border: #485c61 1px solid;
		color: #FFF;
		visibility: hidden;
	} */

	#cropped_img {
		margin-top: 40px;
	}
</style>

<div class="main-content-container container-fluid px-4">
	<!-- Page Header -->
	<div class="page-header row no-gutters py-4">
		<div class="col-12 col-sm-4 text-center text-sm-left mb-0">
			<span class="text-uppercase page-subtitle">dosen</span>
			<h3 class="page-title">Data Dosen</h3>
		</div>
	</div>
	<!-- End Page Header -->
	<!-- Default Light Table -->
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0">Data Dosen</h6>
					<button type="button" style="float: right;" class="btn btn-warning" onclick="tambah_dosen()">
						Tambah Data
					</button>
				</div>
				<div class="table-responsive">
					<div class="card-body">
						<table class="table mb-0" id="table">
							<thead class="bg-light">
								<tr>
									<th scope="col" class="border-0" style="width: 3%;">#</th>
									<th scope="col" class="border-0">Nama</th>
									<th scope="col" class="border-0">NIDN</th>
									<th scope="col" class="border-0">Jumlah</th>
									<th scope="col" class="border-0">Total HAKI</th>
									<th scope="col" class="border-0" style="width: 20%;">Aksi</th>
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

<div class="main-content-container container-fluid px-4" id="formData" style="display: none;">
	<div class="row">
		<div class="col">
			<div class="card card-small mb-4">
				<div class="card-header border-bottom">
					<h6 class="m-0" id="formLabel"></h6>
				</div>
				<div class="card-body">
					<form id="form" class="form-horizontal">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group">
									<label for="nidn">NIDN</label>
									<input type="number" class="form-control" id="nidn" name="nidn" placeholder="1872xxx">
									<small class="text-danger help-block"></small>
									<input type="hidden" name="id" value="">
								</div>
								<div class="form-group">
									<label for="nama">Nama Lengkap</label>
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="email">Email</label>
									<input type="email" class="form-control" id="email" name="email" placeholder="Email">
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="no_telepon">No Telepon</label>
									<input type="number" class="form-control" id="no_telepon" name="no_telepon" placeholder="No Telepon">
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="kewarganegaraan">Kewarganegaraan</label>
									<select name="kewarganegaraan" id="kewarganegaraan" class="form-control select2" required>
										<option value="">-- Kewarganegaraan --</option>
										<?php foreach ($negara as $row) { ?>
											<option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
										<?php } ?>
									</select>
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea name="alamat" id="alamat" name="alamat" class="form-control" rows="1" placeholder="Alamat"></textarea>
									<small class="text-danger help-block"></small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="kota">Kota</label>
									<select name="kota" id="kota" class="form-control select2" required>
										<option value="">-- Kota --</option>
										<?php foreach ($kota as $row) { ?>
											<option value="<?= $row->id_kota ?>"><?= $row->type ?>. <?= $row->nama_kota ?></option>
										<?php } ?>
									</select>
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="negara">Negara</label>
									<select name="negara" id="negara" class="form-control select2" required>
										<option value="">-- Negara --</option>
										<?php foreach ($negara as $row) { ?>
											<option value="<?= $row->id_negara ?>"><?= $row->nama_negara ?></option>
										<?php } ?>
									</select>
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="kode_pos">Kode Pos</label>
									<input type="number" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="fakultas_nama">Fakultas</label>
									<select name="fakultas_nama" id="fakultas_nama" class="form-control select2" required>
										<option value="">-- Fakultas --</option>
										<?php foreach ($fakultas as $row) { ?>
											<option value="<?= $row->fakultas_nama ?>"><?= ucwords($row->fakultas_nama) ?></option>
										<?php } ?>
									</select>
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="prodi">Program Studi</label>
									<select name="prodi" id="prodi" class="form-control select2" required>
										<option value="">-- Program Studi --</option>
										<!-- <?php foreach ($prodi as $row) { ?>
											<option value="<?= $row->prodi_nama ?>"><?= ucwords($row->prodi_nama) ?></option>
										<?php } ?> -->
									</select>
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group" id="photo-preview">
									<label for="scan_ktp" class="control-label">KTP</label>
									<div>
										<small>(Foto tidak tersedia)</small>
									</div>
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="scan_ktp">Scan KTP</label>
									<input type="file" class="form-control" id="scan_ktp" name="scan_ktp">
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="scan_ktp">Scan KTP</label>
									<input type="file" name="before_crop_image" id="before_crop_image" accept="image/*" />
									<small class="text-danger help-block"></small>
								</div>
								<div class="mt-5">
									<button type="submit" class="btn btn-warning" id="btnSave" style="float: right;" onclick="save()">Simpan</button>
									<button type="button" class="btn btn-secondary mr-2" onclick="tutup()" style="float: right;">Tutup</button>
								</div>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- Modal Detail -->
<div class="modal fade" id="modalDetail" role="dialog" aria-labelledby="modalDetailLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalDetailLabel">Detail Dosen</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body table-responsive" id="modalUserDetail" style="width: 100%;">
				<table class="table" id="tblDetail" style="font-size: 12px;">
				</table>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				</div>
			</div>
		</div>
	</div>
</div>

<div id="imageModel" class="modal fade bd-example-modal-lg" role="dialog">
	<div class="modal-dialog modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">×</button>
				<h4 class="modal-title">Crop &amp; Resize Upload Image in PHP with Ajax</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-8 text-center">
						<div id="image_demo" style="width:350px; margin-top:30px"></div>
					</div>
					<div class="col-md-4" style="padding-top:30px;">
						<br />
						<br />
						<br />
						<button class="btn btn-success crop_image">Save</button>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
	$(document).ready(function() {
		$image_crop = $('#image_demo').croppie({
			enableExif: true,
			viewport: {
				width: 200,
				height: 200,
				type: 'square' //circle
			},
			boundary: {
				width: 300,
				height: 300
			}
		});
		$('#before_crop_image').on('change', function() {
			var reader = new FileReader();
			reader.onload = function(event) {
				$image_crop.croppie('bind', {
					url: event.target.result
				}).then(function() {
					console.log('jQuery bind complete');
				});
			}
			reader.readAsDataURL(this.files[0]);
			$('#imageModel').modal('show');
		});
		$('.crop_image').click(function(event) {
			$image_crop.croppie('result', {
				type: 'canvas',
				size: 'viewport'
			}).then(function(response) {
				$.ajax({
					url: "<?php echo base_url(); ?>public/index.php/CropImageUpload/store",
					type: 'POST',
					data: {
						"image": response
					},
					success: function(data) {
						$('#imageModel').modal('hide');
						alert('Crop image has been uploaded');
					}
				})
			});
		});
	});


	let save_method; //for save method string
	// let table;
	let base_url = '<?= base_url(); ?>';

	$(document).ready(function() {
		$('#table').DataTable({
			ajax: {
				url: '<?= site_url('dosen/ajax_list') ?>',
				type: 'POST',
				async: false,
				dataType: 'json',
			}
		});

		$('.select2').select2({
			dropdownCssClass: "myFont",
			selectionCssClass: "myFont"
		});

		//set input/textarea/select event when change value, remove class error and remove text help block 
		$("input").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});

		$("textarea").change(function() {
			$(this).parent().parent().removeClass('has-error');
			$(this).next().empty();
		});
	})

	$('#fakultas_nama').change(function() {
		$.ajax({
			url: '<?= base_url() ?>dosen/ambilDataProdi',
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

	function reload_table() {
		$('#table').DataTable().ajax.reload(); //reload datatable ajax 
	}

	function tambah_dosen() {
		save_method = 'add';
		$('#formData').show();
		$('#formLabel').text("Tambah Data Dosen");
		$('[name="nidn"]').focus();
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#photo-preview').hide(); // hide photo preview modal
		$('#label-photo').text('Upload Photo'); // label photo upload
		$('[name="kewarganegaraan"]').val('').trigger('change');
		$('[name="kota"]').val('').trigger('change');
		$('[name="negara"]').val('').trigger('change');
		$('[name="fakultas_nama"]').val('').trigger('change');
	}

	function tutup() {
		$('#formData').hide();
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		$('#photo-preview').hide(); // hide photo preview modal
		$('#label-photo').text('Upload Photo'); // label photo upload
		$('[name="kewarganegaraan"]').val('').trigger('change');
		$('[name="kota"]').val('').trigger('change');
		$('[name="negara"]').val('').trigger('change');
		$('[name="fakultas_nama"]').val('').trigger('change');
	}

	function edit_dosen(id) {
		save_method = 'update';
		$('#form')[0].reset(); // reset form on modals
		$('.form-group').removeClass('has-error'); // clear error class
		$('.help-block').empty(); // clear error string
		//Ajax Load data from ajax
		$.ajax({
			url: "<?= site_url('dosen/edit') ?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				$('[name="id"]').val(data.id_user);
				$('[name="nidn"]').val(data.nidn);
				$('[name="nama"]').val(data.nama_user);
				$('[name="email"]').val(data.email_user);
				$('[name="no_telepon"]').val(data.telepon_user);
				$('[name="kewarganegaraan"]').val(data.kewarganegaraan).trigger('change');
				$('[name="alamat"]').val(data.alamat_user);
				$('[name="kota"]').val(data.kota).trigger('change');
				$('[name="negara"]').val(data.negara).trigger('change');
				$('[name="kode_pos"]').val(data.kode_pos);
				$('[name="fakultas_nama"]').val(data.fakultas).trigger('change');

				$('#formData').show();
				$('#formLabel').text("Edit Data Dosen");
				$('[name="nidn"]').focus();

				$('#photo-preview').show(); // show photo preview modal

				if (data.scan_ktp) {
					$('#scan_ktp').text('Change Photo'); // label photo upload
					$('#photo-preview div').html('<img src="' + base_url + 'assets/images/scan-ktp/' + data.scan_ktp + '" class="img-responsive mb-3" style="width: 25%;"><br>'); // show photo
					$('#photo-preview div').append('<input type="checkbox" name="remove_photo" value="' + data.scan_ktp + '"/> Hapus foto saat menyimpan'); // remove photo
				} else {
					$('#scan_ktp').text('Upload KTP'); // label photo upload
					$('#photo-preview div').text('(Foto tidak tersedia!)');
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error get data from ajax');
			}
		});
	}

	function save() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		let url;

		if (save_method == 'add') {
			url = "<?= site_url('dosen/ajax_add') ?>";
		} else {
			url = "<?= site_url('dosen/ajax_update') ?>";
		}

		// ajax adding data to database
		let formData = new FormData($('#form')[0]);
		$.ajax({
			url: url,
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {
				if (data.status) //if success close modal and reload ajax table
				{
					$('[name="kewarganegaraan"]').val('').trigger('change');
					$('[name="kota"]').val('').trigger('change');
					$('[name="negara"]').val('').trigger('change');
					$('[name="fakultas_nama"]').val('').trigger('change');

					Swal.fire(
						'Good job!',
						'Data berhasil disimpan!',
						'success'
					)
					$('#formData').hide();
					reload_table();
				} else {
					for (var i = 0; i < data.inputerror.length; i++) {
						$('[name="' + data.inputerror[i] + '"]').parent().parent().addClass('has-error'); //select parent twice to select div form-group class and add has-error class
						$('[name="' + data.inputerror[i] + '"]').next().text(data.error_string[i]); //select span help-block class set text error string
					}
				}
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable 
			},
			error: function(jqXHR, textStatus, errorThrown) {
				alert('Error adding / update data');
				$('#btnSave').text('save'); //change button text
				$('#btnSave').attr('disabled', false); //set button enable 

			}
		});
	}

	function hapus_dosen(id) {
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
				// ajax delete data to database
				$.ajax({
					url: "<?= site_url('dosen/ajax_delete/') ?>" + id,
					type: "POST",
					dataType: "JSON",
					success: function(data) {
						//if success reload ajax table
						Swal.fire(
							'Good job!',
							'Data berhasil dihapus!',
							'success'
						)
						$('#formData').hide();
						reload_table();
					},
					error: function(jqXHR, textStatus, errorThrown) {
						alert('Error deleting data');
					}
				});
			}
		})
	}

	function detail_dosen(id) {
		$.ajax({
			url: "<?= site_url('dosen/ajax_detail') ?>/" + id,
			type: "GET",
			dataType: "JSON",
			success: function(data) {
				let html = "";

				html = html +
					'<tr>' +
					'<td width="30%">Nama</td>' +
					'<td>:</td>' +
					'<td>' + data.nama_user + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>Email</td>' +
					'<td>:</td>' +
					'<td>' + data.email_user + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>No Telepon</td>' +
					'<td>:</td>' +
					'<td>' + data.telepon_user + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>Alamat</td>' +
					'<td>:</td>' +
					'<td>' + data.alamat_user + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>Kota</td>' +
					'<td>:</td>' +
					'<td>' + data.type + '. ' + data.nama_kota + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>Kode pos</td>' +
					'<td>:</td>' +
					'<td>' + data.kode_pos + '</td>' +
					+'</tr>' +
					'<tr>' +
					'<td>KTP</td>' +
					'<td>:</td>' +
					'<td>' + (data.scan_ktp ? '<a href="' + base_url + 'assets/images/scan-ktp/' + data.scan_ktp + '" target="_blank"><img src="' + base_url + 'assets/images/scan-ktp/' + data.scan_ktp + '" class="img-responsive mb-3" style="width: 30%;"></a>' : 'Foto tidak tersedia!') + '</td>' +
					'<tr>';

				$("#tblDetail").html(html);
			}
		})
	}
</script>
