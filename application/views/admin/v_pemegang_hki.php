
<div class="main-content-container container-fluid mt-4">
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
									<label for="nama">Nama Instansi</label>
									<input type="text" class="form-control" id="nama" name="nama" placeholder="Nama Lengkap" value="<?=@$pemegang->nama?>">
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="kewarganegaraan">Kewarganegaraan</label>
									<input type="text" class="form-control" id="kewarganegaraan" name="kewarganegaraan" placeholder="Kewarganegaraan" value="<?=@$pemegang->kewarganegaraan?>" disabled>
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="alamat">Alamat</label>
									<textarea name="alamat" id="alamat" name="alamat" class="form-control" rows="1" placeholder="Alamat"><?=@$pemegang->alamat?></textarea>
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="provinsi">Provinsi</label>
									<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="provinsi" value="<?=@$pemegang->provinsi?>" disabled>
									<small class="text-danger help-block"></small>
								</div>
							</div>
							<div class="col-md-6">
								<div class="form-group">
									<label for="negara">Negara</label>
									<input type="text" class="form-control" id="provinsi" name="provinsi" placeholder="provinsi" value="Indonesia" disabled>
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="kode_pos">Kode Pos</label>
									<input type="number" class="form-control" id="kode_pos" name="kode_pos" placeholder="Kode Pos" value="<?=@$pemegang->kode_pos?>">
									<small class="text-danger help-block"></small>
								</div>
								<div class="form-group">
									<label for="nama_pemegang_hki">Nama Kepala</label>
									<input type="text" class="form-control" id="nama_pemegang_hki" name="nama_pemegang_hki" placeholder="Nama Lengkap" value="<?=@$pemegang->nama_pemegang_hki?>">
									<small class="text-danger nama_pemegang_hki-block"></small>
								</div>
                                
                                <div class="form-group" id="photo-preview">
                                    <label for="ktp_pemegang_hki" class="control-label">KTP</label>
                                    <div>
                                        <?php if ($pemegang->ktp_pemegang_hki == "") { ?>
                                            <small>(Foto tidak tersedia)</small>
                                        <?php } else { ?>
                                            <img src="<?= base_url() ?>assets/images/scan-ktp/<?= $pemegang->ktp_pemegang_hki ?>" width="20%" />
                                        <?php } ?>
                                    </div>
                                    <small class="text-danger help-block"></small>
                                </div>
								<div class="form-group">
									<label for="ktp_pemegang_hki">KTP Kepala</label>
									<input type="file" class="form-control" id="ktp_pemegang_hki" name="ktp_pemegang_hki" placeholder="Nama Lengkap">
									<small class="text-danger ktp_pemegang_hki-block"></small>
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

<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
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
		$('#ktp_pemegang_hki').on('change', function() {
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
					url: "<?php echo base_url(); ?>pemegang/CropImageUpload",
					type: 'POST',
					data: {
						"image": response
					},
					success: function(data) {
						$('#imageModel').modal('hide');
						alert('Crop image has been uploaded');
                        location.reload();
					}
				})
			});
		});
	});
    function save() {
		$('#btnSave').text('saving...'); //change button text
		$('#btnSave').attr('disabled', true); //set button disable 
		// ajax adding data to database
		let formData = new FormData($('#form')[0]);
		$.ajax({
			url: '<?= site_url('pemegang/update') ?>',
			type: "POST",
			data: formData,
			contentType: false,
			processData: false,
			dataType: "JSON",
			success: function(data) {
				if (data.status) //if success close modal and reload ajax table
				{
					Swal.fire(
						'Good job!',
						'Data berhasil disimpan!',
						'success'
					);
                    location.reload();
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
</script>
