<div class="main-content-container container-fluid px-4">
	<div class="row mt-4">
		<div class="col-sm-12 col-lg-4">
			<!-- User Details Card -->
			<div class="card card-small mb-4 pt-3">
                <div class="card-header border-bottom text-center">
                    <div class="mb-3 mx-auto">
                      <img class="rounded-circle" src="<?=base_url()?>assets/images/user-profile/<?=$user->foto_user?>" alt="User Avatar" width="110">
                    </div>
                    <h6 class="mb-0" style=""><?= $user->nama_user ?></h6>
                    <span class="text-muted d-block mb-2"><?=ucwords($user->prodi)?></span>
                    <button type="button" class="mb-2 btn btn-sm btn-pill btn-outline-success mr-2"><i class="fa fa-circle text-success mr-1"></i>Online</button>
                </div>
				<ul class="list-group list-group-flush">
                    <li class="list-group-item p-4">
                      <strong class="text-muted d-block mb-2">Alamat</strong>
                      <span><?=$user->alamat_user?></span>
                    </li>
                  </ul>
            </div>
		</div>
		<div class="col-sm-12 col-lg-7">
			<div class="card card-small user-details mb-4">
				<div class="card-header">
					<h5><span class="">Edit Profile</span></h5>
					<hr>
				</div>
				<div class="card-body">
					<form id="formUpdate">
					<div class="row">
						<div class="col-md-6">
							<div class="form-group">
								<label for="nama">Nama Lengkap</label>
								<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap">
								<small class="text-danger nama-error"></small>
								<input type="hidden" name="id" value="<?= $this->session->userdata('id_user') ?>">
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
								<label for="alamat">Alamat</label>
								<textarea name="alamat" id="alamat" name="alamat" class="form-control" rows="1" placeholder="Alamat"></textarea>
								<small class="text-danger alamat-error"></small>
							</div>
							<div class="form-group">
								
								<label for="kota">Kota</label>
								<select name="kota" id="kota" class="form-control select2">
									<?php foreach ($kota as $row) { ?>
										<option value="<?= $row->id_kota ?>"><?= $row->type ?>. <?= $row->nama_kota ?></option>
									<?php } ?>
								</select>
								<small class="text-danger kota-error"></small>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group">
								<label for="negara">Negara</label>
								<select name="negara" id="negara" class="form-control select2">
									<option value="Indonesia">Indonesia</option>
								</select>
								<small class="text-danger negara-error"></small>
							</div>
							<div class="form-group">
								<label for="kode_pos">Kode Pos</label>
								<input type="text" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos">
								<small class="text-danger kode_pos-error"></small>
							</div>
							<div class="form-group">
								<label for="image">Image Profile</label>
								<input type="file" class="form-control" id="image" name="image" placeholder="Kode Pos">
								<small class="text-danger image-error"></small>
							</div>

							<div class="form-group" id="photo-preview">
								<label for="scan_ktp" class="control-label">KTP</label>
								<div>
									<?php if ($user->scan_ktp == "") { ?>
										<small>(Foto tidak tersedia)</small>
									<?php } else { ?>
										<img src="<?= base_url() ?>assets/images/scan-ktp/<?= $user->scan_ktp ?>" width="20%" />
									<?php } ?>
								</div>
								<small class="text-danger help-block"></small>
							</div>

							<div class="form-group">
								<label for="scan_ktp">Scan KTP</label>
								<input type="file" name="before_crop_image" id="before_crop_image" accept="image/*" />
								<small class="text-danger help-block"></small>
							</div>
						</div>
					</div>
					<div class="card-footer">
						<button type="button" class="btn btn-warning" id="btn-ubah" style="float: right;" onclick="ubahDataProfiles()">Ubah</button>
					</div>
					</form>
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
				<h4 class="modal-title">Crop &amp; Resize Image</h4>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-md-12 text-center">
						<div id="image_demo"></div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				<button class="btn btn-success crop_image">Save</button>
			</div>
		</div>
	</div>
</div>

<script>
	ambilData();

	// function htmlspecialchars(str) {
	// 	return str.replace('&', '&amp;').replace('"', '&quot;').replace("'", '&#039;').replace('<', '&lt;').replace('>', '&gt;');
	// }

	//Tampil Data
	function ambilData() {
		$.ajax({
			url: '<?= base_url(); ?>profile/ambilDataById',
			type: 'POST',
			dataType: 'json',
			success: function(response) {
				$('[name="id"]').val(response[0].id_user);
				$('[name="nama"]').val(response[0].nama_user);
				$('[name="email"]').val(response[0].email_user);
				$('[name="no_telepon"]').val(response[0].telepon_user);
				$('[name="alamat"]').val(response[0].alamat_user);
				$('[name="kota"]').val(response[0].kota).trigger('change');
				$('[name="kode_pos"]').val(response[0].kode_pos);
			}
		});
	}

	function ubahDataProfiles() {

		$.ajax({
			url: '<?= base_url(); ?>profile/ubahData',
			type: 'POST',
			dataType: 'json',
			data: $('#formUpdate').serialize(),
			success: function(data) {
				if (data !== 'success') {
					$('.nama-error').html(data.nama);
					$('.email-error').html(data.email);
					$('.no_telepon-error').html(data.no_telepon);
					$('.alamat-error').html(data.alamat);
					// $('.kota-error').html(data.kota);
					$('.kode_pos-error').html(data.kode_pos);
				} else {
					$('.nama-error').hide();
					$('.email-error').hide();
					$('.no_telepon-error').hide();
					$('.alamat-error').hide();
					// $('.kota-error').hide();
					$('.kode_pos-error').hide();

					$('[name="nama"]').val("");
					$('[name="email"]').val("");
					$('[name="no_telepon"]').val("");
					$('[name="alamat"]').val("");
					// $('[name="kota"]').val("").trigger('change');
					$('[name="kode_pos"]').val("");

					Swal.fire(
						'Good job!',
						'Data berhasil diubah!',
						'success'
					)
					setInterval('location.reload()', 1000);
				}

			}
		})
	}

	$(document).ready(function() {
		$image_crop = $('#image_demo').croppie({
			enableExif: true,
			viewport: {
				width: 380,
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
					url: "<?php echo base_url(); ?>dosen/CropImageUpload",
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
</script>
