<div class="main-content-container container-fluid px-4">
    <!-- Page Header -->
    <div class="page-header row no-gutters py-4">
        <div class="col-12 text-center mb-0">
            <!-- <span class="text-uppercase page-subtitle">Blog Posts</span> -->
            <h5 class="text-uppercase">unggah scan ktp</h5>
        </div>
    </div>
    <!-- End Page Header -->
    <div class="row">
        <div class="col-lg-12 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
                <div class="card-body">
                    <span class="text-uppercase page-subtitle p-2">Scan KTP</span>
                    <hr>
                    <form>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Nama</label>
                                    <input type="text" name="" id="" class="form-control" value="<?=$value->nama_user?>">
                                </div>
                                
                                <div class="form-group" id="photo-preview">
                                    <label for="scan_ktp" class="control-label">KTP</label>
                                    <div>
                                        <?php if ($value->scan_ktp == "") { ?>
                                            <small>(Foto tidak tersedia)</small>
                                        <?php } else { ?>
                                            <img src="<?= base_url() ?>assets/images/scan-ktp/<?= $value->scan_ktp ?>" width="20%" />
                                        <?php } ?>
                                    </div>
                                    <small class="text-danger help-block"></small>
                                </div>
                                <div class="form-group">
                                    <label for="">Scan KTP</label>
                                    <input type="file" name="before_crop_image" id="before_crop_image" accept="image/*" class="form-control">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <a href="" class="btn btn-warning mb-2 ml-2" style="float: right;" data-toggle="modal" data-target="#pertinjauModal">Submit</a>
            <a href="<?= base_url('permohonan/pemegang') ?>" class="btn btn-secondary mb-3" style="float: right;">Prev</a>
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
					url: "<?php echo base_url(); ?>daftarpermohonan/CropImageUpload/<?=$id?>",
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
</script>
