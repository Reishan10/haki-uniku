<div class="main-content-container container-fluid px-4">
	 <!-- Page Header -->
		<div class="page-header row no-gutters py-4">
			<div class="col-12 text-center mb-0">
				<!-- <span class="text-uppercase page-subtitle">Blog Posts</span> -->
				<h5 class="text-uppercase">permohonan pencatatan ciptaan</h5>
			</div>
		</div>
		<!-- End Page Header -->
		<!-- <form method="POST" action="<?= base_url() ?>permohonan/tambahDataDetail"> -->
		<form method="POST" id="form-add-permohonan">
			<div class="row">
				<div class="col-lg-12 col-md-12">
					<!-- Add New Post Form -->
					<div class="card card-small mb-3">
						<div class="card-body">
							<span class="text-uppercase page-subtitle p-2">Detail</span>
							<hr>
							<div class="form-group row mt-3">
								<label for="staticEmail" class="col-sm-2 col-form-label">Jenis Permohonan <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<select name="jenis_permohonan" id="jenis_permohonan" class="form-control select2">
										<option value="">---</option>
										<?php foreach ($jenis_permohonan as $row) { ?>
											<option value="<?= $row->id_jenis_permohonan ?>" <?= $row->id_jenis_permohonan == $this->session->userdata('jenis_permohonan') ? 'selected' : '' ?>><?= $row->nama_jenis_permohonan ?></option>
										<?php } ?>
									</select>
									<?= form_error('jenis_permohonan', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-2 col-form-label">Jenis Ciptaan <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<select name="jenis_ciptaan" id="jenis_ciptaan" class="form-control select2">
										<option value="">---</option>
										<?php foreach ($jenis as $row) { ?>
											<option value="<?= $row->id_jenis ?>" <?= $row->id_jenis == $this->session->userdata('jenis_ciptaan') ? 'selected' : '' ?>><?= $row->nama_jenis ?></option>
										<?php } ?>
									</select>
									<?= form_error('jenis_ciptaan', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="staticEmail" class="col-sm-2 col-form-label">Sub-Jenis Ciptaan <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<select name="subjenis_ciptaan" id="subjenis_ciptaan" class="form-control select2">
										<option value="">---</option>
									</select>
									<?= form_error('subjenis_ciptaan', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="judul" class="col-sm-2 col-form-label">Judul <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="text" class="form-control" id="judul" name="judul" placeholder="Judul" value="<?= $this->session->userdata('judul') != '' ? $this->session->userdata('judul') : set_value('judul') ?>">
									<?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="uraian" class="col-sm-2 col-form-label">Uraian Singkat Ciptaan <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<textarea name="uraian" id="uraian" rows="3" na class="form-control"><?= $this->session->userdata('uraian') != '' ? $this->session->userdata('uraian') : set_value('uraian') ?></textarea>
									<?= form_error('uraian', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>
							<div class="form-group row">
								<label for="tgl_pertama" class="col-sm-2 col-form-label">Tanggal Pertama Kali Diumumkan <span class="text-danger">*</span></label>
								<div class="col-sm-10">
									<input type="date" name="tgl_pertama" id="tgl_pertama" class="form-control selector" value="<?= date("Y-m-d") ?>">
									<?= form_error('tgl_pertama', '<small class="text-danger">', '</small>'); ?>
								</div>
							</div>

						</div>
					</div>
					<!-- / Add New Post Form -->
				</div>
			</div>


			<div class="row">
				<div class="col-lg-12 col-md-12">
					<!-- Add New Post Form -->
					<div class="card card-small mb-3">
						<div class="card-body">
							<span class="text-uppercase page-subtitle p-2">Data Pencipta</span>
							<a href="" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#penciptaModal" onclick="submit('tambah')">Tambah</a>
							<hr>
							<table class="data-pencipta" id="tables">
								<thead>
									<tr>
										<th>NIDN/NIM</th>
										<th>Nama</th>
										<th>Kewarganegaraan</th>
										<th>Alamat</th>
										<th>Kode Pos</th>
										<th>Kota</th>
										<th>Provinsi</th>
										<th>Aksi</th>
									</tr>
								</thead>
								<tbody>
									<tr class="data">
										<td>dosen.<?= @$user->nidn ?></td>
										<td><?= @$user->nama_user ?></td>
										<td><?= @$user->kewarganegaraan ?></td>
										<td><?= @$user->alamat_user ?></td>
										<td><?= @$user->kode_pos ?></td>
										<td><?= @$user->nama_kota ?></td>
										<td><?= @$user->nama_provinsi ?></td>
										<td></td>
									</tr>
								</tbody>
							</table>
						</div>
					</div>
				</div>
			</div>


			<!-- <div class="row">
        <div class="col-lg-12 col-md-12">
            <div class="card card-small mb-3">
                <div class="card-body">
                    <span class="text-uppercase page-subtitle p-2">Data Pemegang Hak Cipta</span>
                    <a href="" class="btn btn-primary" style="float: right;" data-toggle="modal" data-target="#pemegangModal">Tambah</a>
                    <hr>
                    <form>
                        <table class="transaction-history d-none" id="table">
                            <thead>
                                <tr>
                                    <th>Nama</th>
                                    <th>Kewarganegaraan</th>
                                    <th>Alamat</th>
                                    <th>Kode Pos</th>
                                    <th>Kota</th>
                                    <th>Provinsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?= @$pemegangHAKI->nama ?></td>
                                    <td><?= @$pemegangHAKI->kewarganegaraan ?></td>
                                    <td><?= @$pemegangHAKI->alamat ?></td>
                                    <td><?= @$pemegangHAKI->kode_pos ?></td>
                                    <td><?= @$pemegangHAKI->kota ?></td>
                                    <td><?= @$pemegangHAKI->provinsi ?></td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
        </div>
    </div> -->

			<div class="row">
				<div class="col-lg-12 col-md-12">
					<!-- Add New Post Form -->
					<div class="card card-small mb-3">
						<div class="card-body">
							<span class="text-uppercase page-subtitle p-2">Lampiran</span>
							<hr>
							<form>
								<div class="row">
									<!-- <div class="col-md-6">
                                <div class="form-group">
                                    <label for="">Contoh Ciptaan</label>
                                    <input type="file" name="contoh_ciptaan" id="contoh_ciptaan" class="form-control">
                                </div>
                            </div> -->

									<div class="col-md-6">
										<div class="form-group">
											<label for="">Contoh Ciptaan (Link)</label>
											<textarea name="contoh_ciptaan_url" id="contoh_ciptaan_url" rows="1" class="form-control" placeholder="URL"></textarea>
										</div>
									</div>
								</div>
							</form>
						</div>
					</div>

		</form>
		<button type="button" class="btn btn-primary mb-2 ml-2" style="float: right;" onclick="preview()">Submit</button>
</div>

<!-- Modal Pencipta -->
<div class="modal fade" id="penciptaModal" role="dialog" aria-labelledby="penciptaModalLabel" aria-hidden="true">
 <div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h6 class="modal-title" id="penciptaModalLabel"></h6>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<form id="form-add-pencipta" method="post">
					<h6>Data Pencipta</h6>
					<hr>

					<div class="form-group row mt-3">
						<label for="jenis_pemohon" class="col-sm-4 col-form-label">Dosen/Mahasiswa</label>
						<div class="col-sm-8">
							<?php $arr = array('dosen', 'mahasiswa', 'umum'); ?>
							<select name="jenis_pemohon" id="jenis_pemohon" class="form-control">
								<?php for ($i = 0; $i < count($arr); $i++) { ?>
									<option value="<?= $arr[$i] ?>"><?= ucwords($arr[$i]) ?></option>
								<?php } ?>
							</select>

						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="nidn" class="col-sm-4 col-form-label" id="lblNidn">NIDN/NIM <span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="text" name="nidn" id="nidn" class="form-control" placeholder="NIDN/NIM/NIK" list="nidn_list" onchange="selectData()" autocomplete="off">
							<datalist id="nidn_list">
								<?php $dataJenis = $this->db->get('tbl_user'); ?>
								<?php foreach ($dataJenis->result() as $key) {
									// if ($key->nidn != "-" && $key->nidn != $user->nidn){
								?>
									<option value="<?= $key->nidn ?>"><?= $key->nidn ?> - <?= $key->nama_user ?></option>
								<?php }
								// }
								?>
							</datalist>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="nama" class="col-sm-4 col-form-label">Nama <span class="text-danger">*</span></label>
						<div class="col-sm-8">
							<input type="text" name="nama" id="nama" class="form-control" placeholder="Nama">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="email" class="col-sm-4 col-form-label">Email</label>
						<div class="col-sm-8">
							<input type="email" name="email" id="email" class="form-control" placeholder="Email">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="no_telepon" class="col-sm-4 col-form-label">No Telepon</label>
						<div class="col-sm-8">
							<input type="number" name="no_telepon" id="no_telepon" class="form-control" placeholder="No Telepon">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="kewarganegaraan" class="col-sm-4 col-form-label">Kewarganegaraan</label>
						<div class="col-sm-8">
							<select name="kewarganegaraan" id="kewarganegaraan" class="form-control select2">
								<option value="">---</option>
								<?php foreach ($negara as $row) { ?>
									<option value="<?= $row->id_negara ?>" <?=($row->nama_negara == "Indonesia")?'selected':''?>><?= $row->nama_negara ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<hr>
					<h6>Alamat Pencipta</h6>
					<hr>
					<div class="form-group row mt-3">
						<label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
						<div class="col-sm-8">
							<textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control" placeholder="Alamat Lengkap, Ex: Rt/Rw 004/001, Desa Ciledug, Kec. Ciledug, Kab. Cirebon"></textarea>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="provinsi" class="col-sm-4 col-form-label">Provinsi</label>
						<div class="col-sm-8">
							<select name="provinsi" id="provinsi" class="form-control select2">
								<option value="">---</option>
								<?php foreach ($provinsi as $row) { ?>
									<option value="<?= $row->id_provinsi ?>"><?= $row->nama_provinsi ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="kota" class="col-sm-4 col-form-label">Kota</label>
						<div class="col-sm-8">
							<select name="kota" id="kota" class="form-control select2">
								<option value="">---</option>
								<?php foreach ($kota as $row) { ?>
									<option value="<?= $row->id_kota ?>"><?= $row->nama_kota ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="negara" class="col-sm-4 col-form-label">Negara</label>
						<div class="col-sm-8">
							<input type="text" name="negara" id="negara" value="Indonesia" readonly class="form-control">
						</div>
					</div>
					<div class="form-group row mt-3">
						<label for="kode_pos" class="col-sm-4 col-form-label">Kode Pos</label>
						<div class="col-sm-8">
							<input type="text" name="kode_pos" id="kode_pos" class="form-control" placeholder="Kode Pos">
						</div>
					</div>
				</form>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
				<button type="button" class="btn btn-primary" id="btn-tambah" onclick="addDataPencipta()">Simpan</button>
				<button type="button" class="btn btn-primary" id="btn-ubah" onclick="ubahDataPencipta()">Ubah</button>
			</div>
		</div>
</div>
</div>

<div id="tempat-modal"></div>



<script>
    $('#jenis_pemohon').change(function(data){
        $.get('<?=base_url()?>permohonan/getPencipta', 'jenis_pemohon='+$(this).val(), function(data){
            datas = JSON.parse(data);
            html = '';
            $('#nidn').val("");
            if ($('#jenis_pemohon').val() == "dosen"){
				$('#lblNidn').html("NIDN");
                for (i = 0; i < datas.length; i++){
                    html += `<option value="${datas[i].nidn}">${datas[i].nidn} - ${datas[i].nama_user}</option>`;
                }
            }else if($('#jenis_pemohon').val() == "mahasiswa"){
				$('#lblNidn').html("NIM");
                for (i = 0; i < datas.length; i++){
                    html += `<option value="${datas[i].nim}">${datas[i].nim} - ${datas[i].nama}</option>`;
                }
            }else{
				$('#lblNidn').html("NIK");
				html += ``;
			}
            $('#nidn_list').html(html);
        });
    });
    
    let t = $('#tables').DataTable({
  		'createdRow': function( row, data, dataIndex ) {
      		$(row).attr('class', 'data');
  		},
  		'columnDefs': [
     		{
        		'targets': 7,
        		'createdCell':  function (td, cellData, rowData, row, col) {
           			$(td).attr('class', 'data'); 
        		}
     		}
  		]
    });
    $('#jenis_ciptaan').change(function() {
        $.ajax({
            url: '<?= base_url() ?>permohonan/ambilDataSubjenis',
            type: 'POST',
            data: 'jenis_id=' + $(this).val(),
            success: function(response) {
                response = JSON.parse(response);
                let html = '';
                if (response.length > 0) {
                    // swal.fire("Yeayyyy!", response.msg, "success");
                    for (i = 0; i < response.length; i++) {
                        html += `<option value="${response[i].id_subjenis}">${response[i].nama_subjenis}</option>`;
                    }
                    $('#subjenis_ciptaan').html(html);
                } else {
                    html = '<option value="">---</option>';
                    $('#subjenis_ciptaan').html(html);
                    swal.fire("Ooppsss!", response.msg, "error");
                }
            },
            error: function(err) {
                swal.fire("Ooppsss!", "Kamu tidak tersambung ke server kami.", "error");
            }
        });
    })

    function selectData(){
        nidn = $('#nidn').val();
        jenis_pemohon = $('#jenis_pemohon').val();
        $.post('<?=base_url()?>permohonan/getUser', 'nidn='+nidn+'&jenis_pemohon='+jenis_pemohon, function(data){
            datas = JSON.parse(data);
            html = '';
            if (jenis_pemohon == "dosen"){
                if (datas.succ){
                    $('#nama').val(datas.data.nama_user);
                    $('#email').val(datas.data.email_user);
                    $('#no_telepon').val(datas.data.telepon_user);
                    $('#kewarganegaraan').select2("val", datas.data.id_negara);
                    $('#alamat').val(datas.data.alamat_user);
                    $('#provinsi').val(datas.data.id_provinsi);
                    $('#kota').val(datas.data.id_kota);
                    $('#kode_pos').val(datas.data.kode_pos);
                    $('#provinsi,#kota').select2().trigger('change');
                }
            }else{
                if (datas.succ){
                    $('#nama').val(datas.data.nama);
                    $('#email').val(datas.data.email);
                    $('#no_telepon').val(datas.data.hp);
                    $('#kewarganegaraan').select2("val", "3");
                    $('#alamat').val(datas.data.alamat);
                    $('#provinsi').val("3");
                    $('#kota').val("1");
                    $('#kode_pos').val(datas.data.kodepos);
                    $('#kewarganegaraan').select2().trigger('change');
                    $('#provinsi,#kota').select2().trigger('change');
                }                
            }

        });
    }
		$('#provinsi').change(function() {
			// getCity();
		})

		function autoProvinsi() {
			let kota = $('#kota').val();
			$.get('<?= base_url() ?>permohonan/getProvinsi', 'kota_id=' + kota, function(data) {
				// alert(1);
				data = JSON.parse(data);
				alert(data);
				$('#provinsi').select2("val", data.id_provinsi.toString());
				alert(data.id_provinsi.toString());
			});
		}

		function addDataPencipta(komponen = '', parameter = '') {
			let html = '';

			let tableBody = $("table.data-pencipta tbody");
			try {
				$.post('<?= base_url() ?>permohonan/saveUser', $('#form-add-pencipta').serialize(), function(data) {
					data = JSON.parse(data);
					if (data.succ) {
						// alert(data.data);
						t.row.add([data.data.jenis_pemohon + "." + data.data.nidn, data.data.nama, data.data.kewarganegaraan, data.data.alamat, data.data.kode_pos, data.data.kota, data.data.provinsi, `<button type="button" class="btn" name="Cancel">
                        <i class="fas fa fa-fw fa-times text-danger"></i>
					</button>`]).draw(false);

						$('#penciptaModal').modal("hide");
						$('#form-add-pencipta').trigger("reset");
					}
				});
			} catch (e) {
				console.log(e);
			}
		}

		$('#tables tbody').on('click', 'button.btn', function() {
			t
				.row($(this).parents('tr'))
				.remove()
				.draw();
		});

		function preview() {
			let table = $('table tr.data');

			let form = document.getElementById('form-add-permohonan');
			let formData = new FormData(form);
			let i = 0;

			if (table.length > 0) {
				table.each(function() {
					formData.append('pencipta[' + i + '][]', this.cells[0].innerHTML);
					formData.append('pencipta[' + i + '][]', this.cells[1].innerHTML);
					formData.append('pencipta[' + i + '][]', this.cells[2].innerHTML);
					formData.append('pencipta[' + i + '][]', this.cells[3].innerHTML);
					formData.append('pencipta[' + i + '][]', this.cells[4].innerHTML);
					formData.append('pencipta[' + i + '][]', this.cells[5].innerHTML);
					formData.append('pencipta[' + i + '][]', this.cells[6].innerHTML);
					i++;
				})
			}

			// formData.append('contoh_ciptaan',       $('#contoh_ciptaan').val());
			formData.append('contoh_ciptaan_url', $('#contoh_ciptaan_url').val());
			try {
				$.ajax({
					url: '<?= site_url() ?>permohonan/preview',
					type: 'POST',
					cache: false,
					contentType: false,
					processData: false,
					data: formData,
					success: function(response) {
						data = JSON.parse(response);
						if (data.succ) {
							$('#tempat-modal').html(data.view);
							$('#pertinjauModal').modal('show');
						}
					},
					error: function(error) {
						console.log(error);
					}
				});

			} catch (error) {
				console.log(error);
			}
		}
	</script>
